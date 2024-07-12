<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showProfile()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        // Lấy thông tin chi tiết của người dùng từ cơ sở dữ liệu
        $userDetails = DB::table('users')
            ->join('provinces', 'users.province_id', '=', 'provinces.id')
            ->join('districts', 'users.district_id', '=', 'districts.id')
            ->join('wards', 'users.ward_id', '=', 'wards.id')
            ->select('users.*', 'provinces.name as province_name', 'districts.name as district_name', 'wards.name as ward_name')
            ->where('users.id', $user->id)
            ->first();
        // Lấy danh sách các tỉnh
        $provinces = DB::table('provinces')->orderBy('name', 'ASC')->get();

        // Lấy danh sách các huyện nếu người dùng đã chọn tỉnh
        if ($user->province_id != null) {
            $districts = DB::table('districts')
                ->where('province_id', $user->province_id)
                ->orderBy('name', 'ASC')
                ->get();
        } else {
            $districts = collect(); // Trả về collection rỗng nếu không có tỉnh
        }
        // Lấy danh sách các xã nếu người dùng đã chọn huyện
        $wards = DB::table('wards')
            ->where('district_id', $user->district_id)
            ->orderBy('name', 'ASC')
            ->get();

        return view('profile.user-profile', [
            'user' => $user,
            'userDetails' => $userDetails,
            'provinces' => $provinces,
            'districts' => $districts,
            'wards' => $wards,
        ]);
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
    public function updateAvatar(Request $request)
    {
        try
        {
            $user = Auth::user();
            $path = $user->avatar;
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                // Xóa avatar cũ nếu có
                if ($user->avatar) {
                    Storage::disk('public')->delete($user->avatar);
                }
                // Lưu avatar mới
                $path = $request->avatar->store('upload/avatar/' . $user->id, 'public');
            }
            // Cập nhật đường dẫn avatar trực tiếp vào cơ sở dữ liệu
            DB::table('users')
                ->where('id', $user->id)
                ->update(['avatar' => $path]);
            return redirect()->route('showProfile')->with('success', 'Cập nhật ảnh đại diện thành công!');
        } catch (\Exception $e) {
            return redirect()->route('showProfile')->with('error', 'Cập nhật ảnh đại diện không thành công!');
        }
    }

    public function updateProfile(Request $request)
    {
        try
        {
            $user = Auth::user();
            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'name' => $request->name,
                    'gender' => $request->gender,
                    'phone' => $request->phone,
                    'province_id' => $request->province_id,
                    'district_id' => $request->district_id,
                    'ward_id' => $request->ward_id,
                    'address' => $request->address,
                ]);
            return redirect()->route('showProfile')->with('success', 'Cập nhật tài khoản thành công!');
        } catch (\Exception $e) {
            return redirect()->route('showProfile')->with('error', 'Cập nhật tài khoản không thành công!');
        }
    }

 

}
