<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $list = DB::table('orders')
            ->leftJoin('provinces', 'orders.province_id', '=', 'provinces.id')
            ->leftJoin('districts', 'orders.district_id', '=', 'districts.id')
            ->leftJoin('wards', 'orders.ward_id', '=', 'wards.id')
            ->select('orders.*', 'provinces.name as province_name', 'districts.name as district_name', 'wards.name as ward_name')
            ->whereNull('deleted_at')->orderBy('orders.created_at', 'desc')
            ->get();
        return view('admin.invoices.invoice-index', compact('list'));
    }
    public function show($id)
    {
        $list = DB::table('orders')
            ->leftJoin('provinces', 'orders.province_id', '=', 'provinces.id')
            ->leftJoin('districts', 'orders.district_id', '=', 'districts.id')
            ->leftJoin('wards', 'orders.ward_id', '=', 'wards.id')
            ->select('orders.*', 'provinces.name as province_name', 'districts.name as district_name', 'wards.name as ward_name')
            ->where('orders.id', $id)
            ->first();

        $orderDetails = OrderDetail::where('order_id', $list->id)->get();

        if (!$list) {
            return redirect()->route('invoices.index')->with('error', 'Hóa đơn không tồn tại.');
        }

        return view('admin.invoices.invoice-show', compact('list', 'orderDetails'));
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return redirect()->route('invoices.index')->with('success', 'Hóa đơn đã được hủy.');
        }
        return redirect()->route('invoices.index')->with('error', 'Không tìm thấy hóa đơn.');
    }

    public function restore($id)
    {
        $order = Order::withTrashed()->findOrFail($id);
        $order->restore();
        return redirect()->back()->with('success', 'Hóa đơn đã được khôi phục.');
    }
    public function trash()
    {
        $trashedOrders = Order::onlyTrashed()->get();
        return view('admin.invoices.invoice-deleted', compact('trashedOrders'));
    }

    public function printInvoice($id)
    {
        try {
            // Lấy thông tin order cùng với chi tiết và thông tin sản phẩm
            $order = Order::with('details.product')
                ->leftJoin('provinces', 'orders.province_id', '=', 'provinces.id')
                ->leftJoin('districts', 'orders.district_id', '=', 'districts.id')
                ->leftJoin('wards', 'orders.ward_id', '=', 'wards.id')
                ->select('orders.*', 'provinces.name as province_name', 'districts.name as district_name', 'wards.name as ward_name')
                ->find($id);

            // Kiểm tra nếu đơn hàng không tồn tại
            if (!$order) {
                return redirect()->route('invoices.index')->with('error', 'Hóa đơn không tồn tại.');
            }

            // Kiểm tra nếu chi tiết đơn hàng không tồn tại
            if ($order->details->isEmpty()) {
                return redirect()->route('invoices.index')->with('error', 'Chi tiết đơn hàng không tồn tại.');
            }
            // return view('admin.invoices.print', compact('order'));

            // Tạo file PDF từ view
            $pdf = PDF::loadView('admin.invoices.print', compact('order'))->setPaper('a4');
            // Tải file PDF về
            return $pdf->download('invoice_' . $order->code . '.pdf');
        } catch (\Exception $e) {
            // Ghi lại lỗi nếu có
            return redirect()->route('invoices.index')->with('error', 'Lỗi khi tạo file PDF: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $invoice = Order::with('details.product')
            ->leftJoin('provinces', 'orders.province_id', '=', 'provinces.id')
            ->leftJoin('districts', 'orders.district_id', '=', 'districts.id')
            ->leftJoin('wards', 'orders.ward_id', '=', 'wards.id')
            ->select('orders.*', 'provinces.name as province_name', 'districts.name as district_name', 'wards.name as ward_name')
            ->findOrFail($id);
        $orderDetails = OrderDetail::where('order_id', $invoice->id)->get();

        // Thực hiện các thao tác cần thiết để hiển thị form chỉnh sửa
        return view('admin.invoices.invoice-edit', compact('invoice', 'orderDetails'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('invoices.index')->with('error', 'Đơn hàng không tồn tại.');
        }
        $order->status = $request->status;
        $order->delivery_status = $request->delivery_status;
        $order->save();
        return redirect()->route('invoices.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }

}
