<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $productColorSelectedQty, $quantityCount = 1, $productColorId;

    public function addToWishlist($productId)
    {
        $product = Product::where('id', $productId)->first();
        if (Auth::check()) {
            if(Wishlist::where(['user_id' => Auth::user()->id, 'product_id' => $productId])->exists()) {
                session()->flash('error', 'Already added in your wishlist !');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added in your wishlist !',
                    'type' => 'warning',
                    'status' => 409,
                ]);
            } else {
                Wishlist::create([
                    'user_id'    => Auth::user()->id,
                    'product_id' => $productId,
                ]);
                $this->emit('wishlistAddedUpdated');

                $this->dispatchBrowserEvent('message', [
                    'text' => $product->name . ' added to your wishlist',
                    'type' => 'success',
                    'status' => 200,
                ]);
                session()->flash('success', $product->name . ' added to your wishlist');
            }

        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to continue',
                'type' => 'info',
                'status' => 401,
            ]);
            session()->flash('error', 'Please login to continue');
            return false;
        }
    }

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productColorSelectedQty = $productColor->quantity;

        if ($this->productColorSelectedQty == 0) {
            $this->productColorSelectedQty = 'Out Of Stock';
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }

    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
           $this->quantityCount--;
        }

    }

    public function addToCart($productId)
    {
        if(Auth::check()) {
            if ($this->product->where('id', $productId)->where('status', '1')->exists())
            {
                // Check product color quantity
                if ($this->product->productColors()->count() > 0) {
                    if ($this->productColorSelectedQty != Null) {
                        $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                        // Check If This Product With This Color Exist Or Not
                        if (Cart::where('user_id', Auth::user()->id)->where('product_id', $productId)->where('product_color_id', $this->productColorId)->exists()) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product Already Exist In Your Cart',
                                'type' => 'warning',
                                'status' => 200,
                            ]);

                        // If Not Exist
                        } else {
                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity >= $this->quantityCount) {
                                    // Add Product With Color To Cart
                                    Cart::create([
                                        'user_id'           => Auth::user()->id,
                                        'product_id'        => $productId,
                                        'product_color_id'  => $this->productColorId,
                                        'quantity'          => $this->quantityCount,
                                    ]);

                                    $this->emit('cartAddedUpdated');

                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product Added Successfully To Your Cart',
                                        'type' => 'success',
                                        'status' => 200,
                                    ]);

                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only ' . $productColor->quantity . ' Quantity Available',
                                        'type' => 'warning',
                                        'status' => 404,
                                    ]);
                                    session()->flash('error', 'Only ' . $productColor->quantity . ' Quantity Available');
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'This Color Out Of Stock',
                                    'type' => 'warning',
                                    'status' => 404,
                                ]);
                                session()->flash('error', 'This Color Out Of Stock');
                            }
                        }

                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select your product color',
                            'type' => 'info',
                            'status' => 404,
                        ]);
                        session()->flash('error', 'Select your product color');
                    }
                } else {
                    // Condition if cart exist
                    if (Cart::where('user_id', Auth::user()->id)->where('product_id', $productId)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Already Exist In Your Cart',
                            'type' => 'warning',
                            'status' => 200,
                        ]);

                    // If Cart Does Not Exist
                    } else {
                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity >= $this->quantityCount) {
                                // Add Product Without Color To Cart
                                Cart::create([
                                    'user_id'           => Auth::user()->id,
                                    'product_id'        => $productId,
                                    'quantity'          => $this->quantityCount,
                                ]);

                                $this->emit('cartAddedUpdated');

                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Added Successfully To Your Cart',
                                    'type' => 'success',
                                    'status' => 200,
                                ]);
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only ' . $this->product->quantity . ' Quantity Available',
                                    'type' => 'warning',
                                    'status' => 404,
                                ]);
                                session()->flash('error', 'Only ' . $this->product->quantity . ' Quantity Available');
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out Of Stock',
                                'type' => 'warning',
                                'status' => 404,
                            ]);
                        }
                    }


                }


            } else {
               $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Does Not Exist !',
                    'type' => 'warning',
                    'status' => 404,
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to continue !',
                'type' => 'warning',
                'status' => 401,
            ]);
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product'  => $this->product,
        ]);
    }
}
