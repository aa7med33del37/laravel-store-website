@extends('admin.layouts.main')
@section('title', 'Order No.' . $order->id)

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            @if (session('success_message'))
                <h2 class="alert alert-success">
                    {{ session('success_message') }}
                </h2>
            @endif

            @if (session('error_message'))
                <h2 class="alert alert-danger">
                    {{ session('error_message') }}
                </h2>
            @endif


            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-header">
                        <a href="{{url('admin/orders')}}" class="btn btn-danger btn-sm text-white">
                            Back
                        </a>
                        <a href="{{url('admin/invoice/' . $order->id . '/generate')}}" class="btn btn-primary btn-sm text-white float-end max-1">
                            Download Invoice
                        </a>
                        <a href="{{url('admin/invoice/' . $order->id)}}" target="_blank" class="btn btn-danger btn-sm text-white float-end max-1">
                            View Invoice
                        </a>
                        <a href="{{url('admin/invoice/' . $order->id . '/mail')}}" class="btn btn-info btn-sm text-white float-end max-1">
                            Send Invoice Via Mail
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 class="card-title">Order Details</h5>
                                <h6 class="card-text">Order ID: <span class="text-primary">#{{ $order->id }}</span></h6>
                                <h6 class="card-text">Tracking ID/No: <span class="text-primary">{{ $order->tracking_no }}</span></h6>
                                <h6 class="card-text">Order Date: <span class="text-primary">{{ $order->created_at->format('Y-m-d') }}</span></h6>
                                <h6 class="card-text">Payment Mode: <span class="text-primary">{{ $order->payment_model }}</span></h6>
                                <br>
                                    @if ($order->status_message == 'in progress')
                                        <h5 class="card-text text-uppercase text-primary">Order Status Message: <span>{{ $order->status_message }}</span></h5>
                                    @elseif ($order->status_message == 'completed')
                                        <h5 class="card-text text-uppercase text-success">Order Status Message: <span>{{ $order->status_message }}</span></h5>
                                    @elseif ($order->status_message == 'cancelled')
                                        <h5 class="card-text text-uppercase text-danger">Order Status Message: <span>{{ $order->status_message }}</span></h5>
                                    @elseif ($order->status_message == 'pending')
                                        <h5 class="card-text text-uppercase text-warning">Order Status Message: <span>{{ $order->status_message }}</span></h5>
                                        @elseif ($order->status_message == 'out for delivery')
                                        <h5 class="card-text text-uppercase text-info">Order Status Message: <span>{{ $order->status_message }}</span></h5>
                                    @endif
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 class="card-title">Customer Details</h5>
                                <h6 class="card-text">Full Name: <span class="text-primary">#{{ $order->full_name }}</span></h6>
                                <h6 class="card-text">Email: <span class="text-primary">{{ $order->email }}</span></h6>
                                <h6 class="card-text">Phone: <span class="text-primary">{{ $order->phone }}</span></h6>
                                <h6 class="card-text">Address: <span class="text-primary">{{ $order->address }}</span></h6>
                                <h6 class="card-text">Pincode: <span class="text-primary">{{ $order->pincode }}</span></h6>
                                <h6 class="card-text">City: <span class="text-primary">{{ $order->city }}</span></h6>
                                <h6 class="card-text">Country: <span class="text-primary">{{ $order->country }}</span></h6>
                                <h6 class="card-text">Notes: <span class="text-primary">{{ $order->notes }}</span></h6>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>


            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Items In Order</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
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

            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Order Status</h5>
                        <div class="row">
                            <div class="col-md-5">
                                <form action="{{url('admin/orders/' . $order->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group">
                                        <select class="form-select" id="order_status" name="order_status">
                                            <option>Select Order Status</option>
                                            <option value="in progress" {{ $order->status_message == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="completed" {{ $order->status_message == 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="pending" {{ $order->status_message == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="cancelled" {{ $order->status_message == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            <option value="out for delivery" {{ $order->status_message == 'out for delivery' ? 'selected' : '' }}>Out For Delivery</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary text-white">Update</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-7">
                                <br>
                                @if ($order->status_message == 'in progress')
                                    <h5 class="card-text text-uppercase text-primary">Order Status Message: <span>{{ $order->status_message }}</span></h5>
                                @elseif ($order->status_message == 'completed')
                                    <h5 class="card-text text-uppercase text-success">Order Status Message: <span>{{ $order->status_message }}</span></h5>
                                @elseif ($order->status_message == 'cancelled')
                                    <h5 class="card-text text-uppercase text-danger">Order Status Message: <span>{{ $order->status_message }}</span></h5>
                                @elseif ($order->status_message == 'pending')
                                    <h5 class="card-text text-uppercase text-warning">Order Status Message: <span>{{ $order->status_message }}</span></h5>
                                @elseif ($order->status_message == 'out for delivery')
                                    <h5 class="card-text text-uppercase text-info">Order Status Message: <span>{{ $order->status_message }}</span></h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
