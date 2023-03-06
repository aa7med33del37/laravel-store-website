<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validated_data = $request->validated();
        $category = new Category;
        $category->name = $validated_data['name'];
        $category->slug = Str::slug($validated_data['name']);
        $category->description = $validated_data['description'];

        $path = 'uploads/category/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move($path, $filename);
            $category->image = $path . $filename;
        }

        $category->meta_title = $validated_data['meta_title'];
        $category->meta_keyword = $validated_data['meta_keyword'];
        $category->meta_description = $validated_data['meta_description'];
        $category->status = $request->status == True ? '1' : '0';

        $category->save();
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }


    public function update(CategoryFormRequest $request, $id)
    {
        $validated_data = $request->validated();
        $category = Category::findOrFail($id);
        $category->name = $validated_data['name'];
        $category->slug = Str::slug($validated_data['name']);
        $category->description = $validated_data['description'];

        if ($request->hasFile('image')) {
            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $path = 'uploads/category/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move($path, $filename);
            $category->image = $path . $filename;
        }

        $category->meta_title = $validated_data['meta_title'];
        $category->meta_keyword = $validated_data['meta_keyword'];
        $category->meta_description = $validated_data['meta_description'];
        $category->status = $request->status == True ? '1' : '0';

        $category->update();
        return redirect()->route('categories.index')->with('message', 'Category updated successfully !');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('message', 'Category deleted successfully !');
    }
}
