<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Models\Brands;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brands::all();
        $colors = Color::where('status', '1')->get();
        return view('admin.product.create', compact('categories', 'brands', 'colors'));
    }


    public function store(ProductFormRequest $request)
    {
        $validated_data = $request->validated();
        $category = Category::findOrFail($validated_data['category_id']);

        $product = $category->products()->create([
            'category_id' => $validated_data['category_id'],
            'name' => $validated_data['name'],
            'slug' => Str::slug($validated_data['name']),
            'brand' => $validated_data['brand'],
            'small_description' => $validated_data['small_description'],
            'description' => $validated_data['description'],
            'original_price' => $validated_data['original_price'],
            'selling_price' => $validated_data['selling_price'],
            'quantity' => $validated_data['quantity'],
            'trending' => $request->trending == True ? '1' : '0',
            'featured' => $request->featured == True ? '1' : '0',
            'status' => $request->status == True ? '1' : '0',
            'meta_keyword' => $validated_data['meta_keyword'],
            'meta_title' => $validated_data['meta_title'],
            'meta_description' => $validated_data['meta_description'],
        ]);

        $i = 1;
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            foreach ($request->file('image') as $imageFile) {
                $ext = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $ext;
                $imageFile->move($uploadPath, $filename);
                $finalImagePath = $uploadPath . $filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePath,
                ]);
            }
        }

        if ($request->colors) {
            foreach($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->color_quantity[$key] ?? 0,
                ]);
            }
        }

        return redirect()->route('products.index')->with('message', 'Product added successfully !');

    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brands::all();
        $product_color = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $product_color)->get();
        return view('admin.product.edit', compact('categories', 'brands', 'product', 'colors'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $validated_data = $request->validated();
        // $product = Category::findOrFail($validated_data['category_id'])->products($product)->first();

        if ($product) {
            $product->update([
                'category_id' => $validated_data['category_id'],
                'name' => $validated_data['name'],
                'slug' => Str::slug($validated_data['name']),
                'brand' => $validated_data['brand'],
                'small_description' => $validated_data['small_description'],
                'description' => $validated_data['description'],
                'original_price' => $validated_data['original_price'],
                'selling_price' => $validated_data['selling_price'],
                'quantity' => $validated_data['quantity'],
                'trending' => $request->trending == True ? '1' : '0',
                'featured' => $request->featured == True ? '1' : '0',
                'status' => $request->status == True ? '1' : '0',
                'meta_keyword' => $validated_data['meta_keyword'],
                'meta_title' => $validated_data['meta_title'],
                'meta_description' => $validated_data['meta_description'],
            ]);

            $i = 1;
            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
                foreach ($request->file('image') as $imageFile) {
                    $ext = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $ext;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePath = $uploadPath . $filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePath,
                    ]);
                }
            }

            if ($request->colors) {
                foreach($request->colors as $key => $color) {
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->color_quantity[$key] ?? 0,
                    ]);
                }
            }

            return redirect()->route('products.index')->with('message', 'Product updated successfully !');
        } else {
            return redirect()->route('products.index')->with('message', 'No such product ID found !');
        }

    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);

        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }

        $productImage->delete();
        return redirect()->back()->with('message', 'Image deleted successfully !');
    }

    public function destroy(Product $product)
    {

        if ($product->productImages) {
            foreach($product->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }

        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully !');
    }

    public function updateProductColorQty(Request $request, $product_color_id)
    {
        $productColorData = Product::findOrFail($request->product_id)
        ->productColors()->where('id', $product_color_id)->first();

        $productColorData->update([
            'quantity' => $request->qty,
        ]);

        return response()->json(['message' => 'Product Color Quantity Updated']);
    }

    public function deleteProductColor($product_color_id)
    {
        $productColor = ProductColor::findOrFail($product_color_id);
        $productColor->delete();
        return response()->json(['message' => 'Product Color Deleted !']);
    }
}
