<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMembersRequest;
use App\Models\Members;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected function fixImage(User $user)
    {
        if ($user->avatar && Storage::disk("public")->exists($user->avatar)) {
            $user->avatar = Storage::url($user->avatar);
        } else {
            $user->avatar = '/image/user_default.png';
        }
    }
    public function index()
    {
        // Điều kiện 'whereHas' chỉ lấy những 'member' có 'user' với 'status' là 1
        $listMembers = Members::whereHas('user', function ($query) {
            $query->where('status', 1);
        })->with('user')->get();
        return view('admin.members.member-index', ['members' => $listMembers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMembersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Members $member)
    {
        $member->load(['user' => function ($query) {
            $query->where('status', 1);
        }]);
        // Kiểm tra xem quan hệ 'user' có tồn tại trước khi gọi 'fixImage()'
        if ($member->user) {
            $this->fixImage($member->user); // Áp dụng sửa ảnh cho 'User'
            $user = DB::table('users')
                ->join('provinces', 'users.province_id', '=', 'provinces.id')
                ->join('districts', 'users.district_id', '=', 'districts.id')
                ->join('wards', 'users.ward_id', '=', 'wards.id')
                ->select('users.*', 'provinces.name as province_name', 'districts.name as district_name', 'wards.name as ward_name')
                ->where('users.id', $member->user_id)
                ->first();
        }
        return view('admin.members.member-show', ['member' => $member, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Members $member)
    {
        $member->load(['user' => function ($query) {
            $query->where('status', 1);
        }]);
        // Kiểm tra xem quan hệ 'user' có tồn tại trước khi gọi 'fixImage()'
        if ($member->user) {
            $this->fixImage($member->user); // Áp dụng sửa ảnh cho 'User'
            $user = DB::table('users')
                ->join('provinces', 'users.province_id', '=', 'provinces.id')
                ->join('districts', 'users.district_id', '=', 'districts.id')
                ->join('wards', 'users.ward_id', '=', 'wards.id')
                ->select('users.*', 'provinces.name as province_name', 'districts.name as district_name', 'wards.name as ward_name')
                ->where('users.id', $member->user_id)
                ->first();
        }
        $provinces = DB::table('provinces')->orderBy('name', 'ASC')->get();
        if ($member->user != null && $member->user->province_id != null) {
            $districts = DB::table('districts')
                ->where('province_id', $member->user->province_id)
                ->orderBy('name', 'ASC')
                ->get();
        } else {
            $districts = collect(); // Trả về collection rỗng
        }
        $wards = DB::table('wards')->where('district_id', $member->user->district_id)->orderBy('name', 'ASC')->get();
        $data['provinces'] = $provinces;

        return view('admin.members.member-edit', ['member' => $member, 'user' => $user, 'provinces' => $provinces, 'districts' => $districts, 'wards' => $wards]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Members $member)
    {
        try {
            $member->load(['user' => function ($query) {
                $query->where('status', 1);
            }]);
            $path = $member->user->avatar;
            if ($request->hasFile('avatar') && $request->avatar->isValid()) {
                $path = $request->avatar->store('upload/member/' . $member->id, 'public');
            }
            $member->user->update([
                'avatar' => $path,
                'name' => $request->name,
                'gender' => $request->gender,
                'birthday' => \DateTime::createFromFormat('d/m/Y', $request->birthday)->format('Y-m-d'),
                'phone' => $request->phone,
                'province_id' => $request->province_id,
                'district_id' => $request->district_id,
                'ward_id' => $request->ward_id,
                'address' => $request->address,
                'status' => $request->status,
            ]);
            $member->user->save();
            //Thành công
            return redirect()->route('members.index')->with('success', 'Cập nhật tài khoản thành công!');
        } catch (\Exception $e) {
            //Thất bại
            return redirect()->route('members.index')->with('error', 'Cập nhật tài khoản không thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Members $members)
    {
        //
    }
}
