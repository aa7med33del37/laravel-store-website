<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brands;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandFormRequest;
use App\Http\Requests\BrandUpdateRequest;

class BrandsController extends Controller
{

    public function index()
    {
        return view('admin.brand.index');
    }

    public function create()
    {
        $categories = Category::where('status', '1')->get();
        return view('admin.brand.create', compact('categories'));
    }

    public function store(BrandFormRequest $request)
    {
        $validated_data = $request->validated();
        $brand = new Brands;
        $brand->category_id = $validated_data['category_id'];
        $brand->name = $validated_data['name'];
        $brand->slug = Str::slug($validated_data['name']);
        $brand->status = $request->status == True ? '1' : '0';

        $brand->save();
        return redirect()->route('brands.index')->with('message', 'Brand added successfully !');
    }


    public function edit(Brands $brand)
    {
        $categories = Category::where('status', '1')->get();
        return view('admin.brand.edit', compact('brand', 'categories'));
    }

    public function update(BrandUpdateRequest $request, $id)
    {
        $validated_data = $request->validated();
        $brand = Brands::findOrFail($id);;
        $brand->category_id = $validated_data['category_id'];
        $brand->name = $validated_data['name'];
        $brand->slug = Str::slug($validated_data['name']);

        $brand->update();
        return redirect()->route('brands.index')->with('message', 'Brand updated successfully !');
    }
    public function destroy(Brands $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('message', 'Brand deleted successfully !');
    }
}
