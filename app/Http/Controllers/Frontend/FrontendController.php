<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '1')->get();
        $categories = Category::where('status', '1')->latest()->take(10)->get();
        $trendingProducts = Product::where('trending', '1')->where('status', '1')->latest()->take(15)->get();
        $newArrivalsProduct = Product::where('status', '1')->latest()->get();
        $featuredProducts = Product::where('featured', '1')->where('status', '1')->latest()->take(12)->get();
        return view('frontend.index', compact('sliders', 'trendingProducts', 'newArrivalsProduct','featuredProducts', 'categories'));
    }

    public function searchProducts(Request $request)
    {
        if ($request->search) {
            $search = $request->search;
            $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->get();
            return view('frontend.pages.search', compact('searchProducts', 'search'));
        } else {
            return 'No';
        }
    }

    public function newArrivals()
    {
        $newArrivalsProduct = Product::where('status', '1')->latest()->get();
        return view('frontend.pages.new_arrivals', compact('newArrivalsProduct'));
    }

    public function featuredProducts()
    {
        $featuredProducts = Product::where('featured', '1')->where('status', '1')->get();
        return view('frontend.pages.featured_products', compact('featuredProducts'));
    }

    public function categories()
    {
        $categories = Category::where('status', '1')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $products = $category->products()->get();
            return view('frontend.collections.product.index', compact('products', 'category'));
        } else {
            return redirect()->back();
        }
    }

    public function productView($category_slug, $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where(['slug' => $product_slug,'status' => '1'])->first();
            if($product) {
                return view('frontend.collections.product.view', compact('category', 'product'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function thankYou()
    {
        return view('frontend.thank_you');
    }
}
