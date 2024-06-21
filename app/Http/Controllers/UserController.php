<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Members;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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
        $lst = User::whereNot('role', 2)->where('status', 1)->get();
        return view('admin.accounts.account-index', ['lst' => $lst]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = DB::table('provinces')->orderBy('name', 'ASC')->get();
        $data['provinces'] = $provinces;
        // dd($data);
        return view('admin.accounts.account-create', $data);
    }
    public function fetchDistricts($province_id = null)
    {
        $districts = DB::table('districts')->where("province_id", $province_id)->get();

        return response()->json(['districts' => $districts]);
    }
    public function fetchWards($district_id = null)
    {
        $wards = DB::table('wards')->where("district_id", $district_id)->get();

        return response()->json(['wards' => $wards]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try
        {
            $characterSet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $acc = User::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'birthday' => \DateTime::createFromFormat('d/m/Y', $request->birthday)->format('Y-m-d'),
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'province_id' => $request->province_id,
                'district_id' => $request->district_id,
                'ward_id' => $request->ward_id,
                'address' => $request->address,
                'role' => $request->role,
            ]);
            // Save the account
            $acc->save();

            if ($acc->role == 2) {
                $member = Members::create([
                    'code' => substr(str_shuffle($characterSet), 0, 10), // Tạo mã ngẫu nhiên
                    'name' => $acc->name, // Sử dụng tên từ tài khoản
                    'start_day' => Carbon::now(), // Ngày bắt đầu là ngày hiện tại
                    'end_day' => Carbon::now()->addYear(), // Ngày kết thúc là một năm sau
                    'score' => 0, // Điểm ban đầu
                    'user_id' => $acc->id, // ID của người dùng
                ]);
                $member->save();
            }
            // Thành cônng -> Redirect sang trang index
            return redirect()->route('accounts.index')->with('success', 'Thêm tài khoản thành công!');
        } catch (\Exception $e) {
            // Thất bại -> Redirect sang trang index
            return redirect()->route('accounts.index')->with('error', 'Thêm tài khoản không thành công!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $account = User::find($id);
        if (!$account) {
            abort(404, 'Tài khoản không tồn tại');
        }
        $this->fixImage($account);
        $user = DB::table('users')
            ->join('provinces', 'users.province_id', '=', 'provinces.id')
            ->join('districts', 'users.district_id', '=', 'districts.id')
            ->join('wards', 'users.ward_id', '=', 'wards.id')
            ->select('users.*', 'provinces.name as province_name', 'districts.name as district_name', 'wards.name as ward_name')
            ->where('users.id', $id)
            ->first();
        // dd($user);
        return view('admin.accounts.account-show', ['acc' => $account, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $account = User::find($id);
        $this->fixImage($account);
        $user = DB::table('users')
            ->join('provinces', 'users.province_id', '=', 'provinces.id')
            ->join('districts', 'users.district_id', '=', 'districts.id')
            ->join('wards', 'users.ward_id', '=', 'wards.id')
            ->select('users.*', 'provinces.name as province_name', 'districts.name as district_name', 'wards.name as ward_name')
            ->where('users.id', $id)->where('users.role','!=', 2)
            ->first();
        //dd($data);
        $provinces = DB::table('provinces')->orderBy('name', 'ASC')->get();
        if ($account != null && $account->province_id != null) {
            $districts = DB::table('districts')
                ->where('province_id', $account->province_id)
                ->orderBy('name', 'ASC')
                ->get();
        } else {
            $districts = collect(); // Trả về collection rỗng
        }
        $wards = DB::table('wards')->where('district_id', $account->district_id)->orderBy('name', 'ASC')->get();

        $data['provinces'] = $provinces;
        //dd($provinces);
        return view('admin.accounts.account-edit', ['acc' => $account, $user, 'provinces'=>$provinces, 'districts'=>$districts, 'wards'=>$wards]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $account = User::find($id);
            if (!$account) {
                return redirect()->route('accounts.index')->with('error', 'Không tìm thấy tài khoản!');
            }
            $path = $account->avatar;
            if ($request->hasFile('avatar') && $request->avatar->isValid()) {
                $path = $request->avatar->store('upload/user/' . $account->id, 'public');
            }
            $account->update([
                'avatar'=>$path,
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
            $account->save();
            //Thành công
            return redirect()->route('accounts.index')->with('success', 'Cập nhật tài khoản thành công!');
        } catch (\Exception $e) {
            //Thất bại
            return redirect()->route('accounts.index')->with('error', 'Cập nhật tài khoản không thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}
