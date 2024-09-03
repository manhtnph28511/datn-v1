<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function index(Request $request)
        {
            
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
    


            // Tổng số đơn hàng đã được đặt
            $totalOrdersQuery = Order::query();
            if ($startDate && $endDate) {
                $totalOrdersQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
            $totalOrders = $totalOrdersQuery->count();
    



            // Người đặt hàng nhiều nhất
            $topCustomerQuery = Order::select('user_id')
                ->selectRaw('COUNT(*) as order_count')
                ->groupBy('user_id')
                ->orderBy('order_count', 'desc');
            if ($startDate && $endDate) {
                $topCustomerQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
            $topCustomer = $topCustomerQuery->first();
            $topCustomerName = $topCustomer ? User::find($topCustomer->user_id)->name : 'N/A';
    


            // Tổng số tiền thu được
            $totalRevenueQuery = OrderDetail::query();
            if ($startDate && $endDate) {
                $totalRevenueQuery->whereHas('order', function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                });
            }
            $totalRevenue = $totalRevenueQuery->sum('total_price');
    


            // Sản phẩm bán nhiều nhất
            $topProductQuery = OrderDetail::select('pro_id')
                ->selectRaw('SUM(quantity) as total_quantity')
                ->groupBy('pro_id')
                ->orderBy('total_quantity', 'desc');
            if ($startDate && $endDate) {
                $topProductQuery->whereHas('order', function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                });
            }
            $topProduct = $topProductQuery->first();
            $topProductName = $topProduct ? Product::find($topProduct->pro_id)->name : 'N/A';




            $topViewedProductQuery = Product::query()
            ->orderBy('view', 'desc');
            if ($startDate && $endDate) {
                $topViewedProductQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
            $topViewedProduct = $topViewedProductQuery->first();
            $topViewedProductName = $topViewedProduct ? $topViewedProduct->name : 'N/A';
            $topViewedProductViews = $topViewedProduct ? $topViewedProduct->view : 0;



            $topRatedProductQuery = Product::select('products.*')
            ->join('ratings', 'products.id', '=', 'ratings.product_id')
            ->selectRaw('AVG(ratings.rating) as avg_rating')
            ->groupBy('products.id')
            ->orderBy('avg_rating', 'desc');
    
        if ($startDate && $endDate) {
            $topRatedProductQuery->whereBetween('products.created_at', [$startDate, $endDate]);
        }
    
        $topRatedProduct = $topRatedProductQuery->first();
        $topRatedProductName = $topRatedProduct ? $topRatedProduct->name : 'N/A';
        $topRatedProductRating = $topRatedProduct ? number_format($topRatedProduct->avg_rating, 2) : 'N/A';
            
            return view('admin.pages.dashboard', [
                'totalOrders' => $totalOrders,
                'topCustomerName' => $topCustomerName,
                'totalRevenue' => $totalRevenue,
                'topProductName' => $topProductName,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'topViewedProductName' => $topViewedProductName,
                'topViewedProductViews' => $topViewedProductViews,
                'topRatedProductName' => $topRatedProductName,
                'topRatedProductRating' => $topRatedProductRating,
            ]);
        }
    }


