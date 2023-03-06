<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Brands;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalBrands = Brands::count();
        $totalAllUsers = User::count();
        $totalUsers = User::where('roles_as', 'user')->count();
        $totalAdmins = User::where('roles_as', 'admin')->count();

        $totalOrders = Order::count();
        $todayDate = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $todayOrders = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrders = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrders = Order::whereYear('created_at', $thisYear)->count();

        return view('admin.index',
                compact('totalCategories', 'totalProducts', 'totalBrands',
                'totalAllUsers', 'totalUsers', 'totalAdmins', 'totalOrders', 'todayOrders',
                'thisMonthOrders', 'thisYearOrders'
                ));
    }
}
