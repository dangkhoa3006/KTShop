<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderCount = Order::all()->count();
        $memberCount = User::where('role', 2)->where('status', 1)->count();
        $invoiceIncompleteCount = Order::where('status', 0)->count();
        $totalAmount = Order::where('status', 1)->sum('total');

        // Tính tổng tiền theo tháng
        $monthlyTotals = Order::where('status', 1)
            ->selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Đảm bảo rằng tất cả các tháng đều có giá trị
        $monthlyData = array_fill(1, 12, 0);
        foreach ($monthlyTotals as $month => $total) {
            $monthlyData[$month] = $total;
        }
        // Lấy ra top 10 sản phẩm bán chạy nhất
        $bestSellingProducts = OrderDetail::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'desc')
            ->with('product')
            ->take(7)
            ->get();

        return view("admin.dashboard", compact('orderCount', 'memberCount', 'invoiceIncompleteCount', 'totalAmount', 'monthlyData', 'bestSellingProducts'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
