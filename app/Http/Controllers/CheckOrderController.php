<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CheckOrderController extends Controller
{
    public function formCheckOrder()
    {
        $list = Category::with('subcategories')->get();
        return view('check-orders.form-check-order', compact('list'));
    }
    public function checkOrder(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'code' => ['required', 'size:10', 'regex:/^[A-Za-z0-9]+$/'],
            'phone' => 'required|numeric',
        ],
            [
                'code.required' => 'Vui lòng nhập mã đơn hàng.',
                'code.size' => 'Mã đơn hàng không đúng định dạng.',
                'code.regex' => 'Mã đơn hàng không đúng định dạng.',
                'phone.required' => 'Vui lòng nhập số điện thoại.',
                'phone.numeric' => 'Số điện thoại không đúng định dạng.',
            ]
        );

        // Tìm đơn hàng dựa trên mã đơn hàng và số điện thoại
        $order = Order::with('details.product')
            ->leftJoin('provinces', 'orders.province_id', '=', 'provinces.id')
            ->leftJoin('districts', 'orders.district_id', '=', 'districts.id')
            ->leftJoin('wards', 'orders.ward_id', '=', 'wards.id')
            ->select('orders.*', 'provinces.name as province_name', 'districts.name as district_name', 'wards.name as ward_name')
            ->where('code', $request->code)
            ->where('phone', $request->phone)
            ->first();

        if ($order) {
            $list = Category::with('subcategories')->get();
            $orderDetails = OrderDetail::where('order_id', $order->id)->get();

            // Nếu tìm thấy đơn hàng, chuyển hướng tới trang chi tiết đơn hàng
            return view('check-orders.result-check-order', compact('order', 'list', 'orderDetails'));
        } else {
            // Nếu không tìm thấy, quay lại form với thông báo lỗi
            return redirect()->back()->with('alert-error', 'Không tìm thấy đơn hàng. Vui lòng kiểm tra lại thông tin!');
        }
    }
}
