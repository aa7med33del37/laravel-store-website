@extends('frontend.layouts.main')
@section('title', 'Cart')

@section('content')
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Your Orders</h1></div>
      		</div>
		</div>
        <!--End Page Title-->

        <div class="container">
            <div class="row billing-fields">
                <div class="col-12">
                    <div class="your-order-payment">
                        <div class="your-order">
                            <h2 class="order-title mb-4">Your Order</h2>

                            <div class="table-responsive-sm order-table">
                                <table class="bg-white table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Order #ID</th>
                                            <th>Tracking No</th>
                                            <th>User Name</th>
                                            <th>Payment Mode</th>
                                            <th>Order Data</th>
                                            <th>Status Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $orderItem)
                                            <tr>
                                                <td class="text-left">#{{ $orderItem->id }}</td>
                                                <td>{{ $orderItem->tracking_no }}</td>
                                                <td>{{ $orderItem->full_name }}</td>
                                                <td>{{ $orderItem->payment_model }}</td>
                                                <td>{{ $orderItem->created_at->format('Y-m-d') }}</td>
                                                <td>{{ $orderItem->status_message }}</td>
                                                <td><a href="{{ url('orders/' . $orderItem->id) }}" class="btn">View</a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    {{-- <tfoot class="font-weight-600">
                                        <tr>
                                            <td colspan="4" class="text-right">Shipping </td>
                                            <td>$50.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Total</td>
                                            <td>$845.00</td>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                                <div>{{ $orders->links() }}</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
