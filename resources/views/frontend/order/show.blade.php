@extends('frontend.layouts.main')
@section('title', 'Cart')

@section('content')
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">Order Details</h1></div>
        </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div>
            <a href="{{ url('/orders') }}" class="btn">Back</a>
        </div>
        <br>
        <div class="row billing-fields">
            <div class="col-12 col-md-6">
                <div class="your-order-payment">
                    <div class="your-order">
                        <h2 class="order-title mb-4">Your Order</h2>

                        <div class="table-responsive-sm order-table">
                            <table class="bg-white table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-left">Order #ID</th>
                                        <th>Tracking ID/No</th>
                                        <th>Order Date</th>
                                        <th>Payment Mode</th>
                                        <th>Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">{{ $order->id }}</td>
                                        <td>{{ $order->tracking_no }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->payment_model }}</td>
                                        <td>{{ $order->status_message }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="your-order-payment">
                    <div class="your-order">
                        <h2 class="order-title mb-4">User Details</h2>

                        <div class="table-responsive-sm order-table">
                            <table class="bg-white table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-left">Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Pincode</th>
                                        <th>city</th>
                                        <th>country</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">{{ $order->full_name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->pincode }}</td>
                                        <td>{{ $order->city }}</td>
                                        <td>{{ $order->country }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="your-order-payment">
                    <div class="your-order">
                        <h2 class="order-title mb-4">Order Items</h2>

                        <div class="table-responsive-sm order-table">
                            <table class="bg-white table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-left">Item #ID</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td class="text-left">{{ $orderItem->id }}</td>
                                        <td>
                                            <img style="width: 50px; height: 50px" src="{{ asset($orderItem->product->productImages[0]->image) }}" alt="{{ $orderItem->product->name }}">
                                        </td>
                                        <td>
                                            <b>{{ $orderItem->product->name }}</b>
                                            <br>
                                            @if ($orderItem->productColor)
                                                @if ($orderItem->productColor->color)
                                                    <small>Color: {{ $orderItem->productColor->color->name }}</small>
                                                @endif
                                            @endif
                                        </td>
                                        <td>${{ $orderItem->price }}</td>
                                        <td>{{ $orderItem->quantity }}</td>
                                        <td>${{ $orderItem->price * $orderItem->quantity }}</td>
                                    </tr>
                                    @php
                                        $totalPrice += $orderItem->price * $orderItem->quantity;
                                    @endphp
                                    @endforeach


                                </tbody>
                                <tfoot class="font-weight-600">
                                    {{-- <tr>
                                        <td colspan="4" class="text-right">Shipping </td>
                                        <td>$50.00</td>
                                    </tr> --}}
                                    <tr>
                                        <td colspan="5" class="text-right">Total</td>
                                        <td>${{$totalPrice}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
