<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartShow extends Component
{
    public $totalPrice = 0;

    public function incrementQuantity($cartItemId)
    {
        $cartData = Cart::where('id', $cartItemId)->where('user_id', Auth::user()->id)->first();
        if($cartData) {

            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {

                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();

                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'There is only ' . $productColor->quantity . ' item Available',
                        'type' => 'error',
                        'status' => 404,
                    ]);
                }
            } else {
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'There is only ' . $cartData->product->quantity . ' item Available',
                        'type' => 'error',
                        'status' => 404,
                    ]);
                }
            }


        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 404,
            ]);
        }
    }

    public function decrementQuantity($cartItemId)
    {
        $cartData = Cart::where('id', $cartItemId)->where('user_id', Auth::user()->id)->first();

        if ($cartData->quantity > 1) {
            if($cartData) {

                if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {

                    $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();

                    if ($productColor->quantity >= $cartData->quantity) {
                        $cartData->decrement('quantity');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Quantity Updated',
                            'type' => 'success',
                            'status' => 200,
                        ]);
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'There is only ' . $productColor->quantity . ' item Available',
                            'type' => 'error',
                            'status' => 404,
                        ]);
                    }
                } else {
                    if ($cartData->product->quantity >= $cartData->quantity) {
                        $cartData->decrement('quantity');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Quantity Updated',
                            'type' => 'success',
                            'status' => 200,
                        ]);
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'There is only ' . $cartData->product->quantity . ' item Available',
                            'type' => 'error',
                            'status' => 404,
                        ]);
                    }
                }


            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Something Went Wrong',
                    'type' => 'error',
                    'status' => 404,
                ]);
            }
        } else {
            $cartData->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'Product Item Deleted From Your Cart',
                'type' => 'success',
                'status' => 200,
            ]);
        }


    }

    public function removeCartItem($cartItemId)
    {
        $cartData = Cart::where('user_id', Auth::user()->id)->where('id', $cartItemId)->first();
        if ($cartData) {
            $cartData->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'Product Deleted From Your Cart',
                'type' => 'success',
                'status' => 200,
            ]);
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 404,
            ]);
        }

    }

    public function render()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('livewire.frontend.cart.cart-show', [
            'carts' => $carts,
        ]);
    }
}
