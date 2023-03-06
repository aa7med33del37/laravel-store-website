<?php

namespace App\Http\Livewire\Frontend\Checkout;

use Exception;
use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutView extends Component
{
    public $carts, $totalProductAmount = 0;
    public $fullname, $email, $phone, $address, $city, $pincode, $notes, $payment_model = Null, $payment_id = Null;

    protected $listeners = ['validationForAll', 'transactionEmit.id' => 'paidOnlineOrder'];

    public function paidOnlineOrder($value)
    {
        $this->payment_id = $value;
        $this->payment_model = 'Paid by Paypal';

        $codOrder = $this->placeOrder();

        if ($codOrder) {
            Cart::where('user_id', Auth::user()->id)->delete();
            session()->flash('success', 'Order Placed Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200,
            ]);
            return redirect('/thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 404,
            ]);
        }
    }

    public function validationForAll()
    {
        $this->validate();
    }

    public function rules()
    {
        return [
            'fullname' => 'required|string',
            'email'     => 'required|email',
            'phone' => 'required',
            'pincode' => 'nullable|integer',
            'address' => 'required|string',
            'city' => 'required|string',
        ];
    }

    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'tracking_no' => 'funda-' . Str::random(10),
            'full_name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'city' => $this->city,
            'notes' => $this->notes,
            'status_message' => 'in progress',
            'payment_model' => $this->payment_model,
            'payment_id' => $this->payment_id,
        ]);

        foreach($this->carts as $cartItem) {
            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price ? $cartItem->product->selling_price : $cartItem->product->original_price
            ]);

            if ($cartItem->product_color_id != Null) {
                $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
            } else {
                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }
        }

        if (Auth::user()->UserDetail) {
            Auth::user()->UserDetail()->update([
                'phone' => $this->phone,
                'pincode' => $this->pincode,
                'address' => $this->address,
                'city' => $this->city,
            ]);
        } else {
            Auth::user()->UserDetail()->create([
                'phone' => $this->phone,
                'pincode' => $this->pincode,
                'address' => $this->address,
                'city' => $this->city,
            ]);
        }

        return $order;
    }

    public function codOrder()
    {
        $this->payment_model = "Cash On Delivery";
        $codOrder = $this->placeOrder();

        if ($codOrder) {
            Cart::where('user_id', Auth::user()->id)->delete();

            try{
                $order = Order::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
            }catch(\Exception $e) {
            }

            session()->flash('success', 'Order Placed Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200,
            ]);
            return redirect('/thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 404,
            ]);
        }
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach($this->carts as $cartItem) {
            $this->totalProductAmount +=  $cartItem->product->selling_price  * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', Auth::user()->id)->get();
        $this->totalProductAmount = $this->totalProductAmount();
        $this->fullname = Auth::user()->name;
        $this->email = Auth::user()->email;
        if(Auth::user()->UserDetail) {
            $this->phone = Auth::user()->UserDetail->phone ?? '';
            $this->city = Auth::user()->UserDetail->city ?? '';
            $this->address = Auth::user()->UserDetail->address ?? '';
            $this->pincode = Auth::user()->UserDetail->pincode ?? '';
        }

        return view('livewire.frontend.checkout.checkout-view', [
            'totalProductAmount' => $this->totalProductAmount,
            'cart' => $this->cart,
        ]);
    }
}
