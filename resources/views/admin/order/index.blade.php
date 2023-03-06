@extends('admin.layouts.main')
@section('title', 'Orders')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            @if (session('error'))
                <h5 class="alert alert-danger">
                    {{ session('error') }}
                </h5>
            @endif
            @if (session('success'))
                <h2 class="alert alert-success">
                    {{ session('success') }}
                </h2>
            @endif
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Filter By Date</label>
                                    <input name="date" type="date" value="{{Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="">Filter By Status</label>
                                    <select name="status" id="" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        <option value="out for delivery" {{ Request::get('status') == 'out for delivery' ? 'selected' : '' }}>Out For Delivery</option>
                                    </select>
                                </div>

                                 <div class="col-md-6">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                 </div>
                            </div>
                        </form>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
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
                                            <td><a href="{{ url('admin/orders/' . $orderItem->id) }}" class="btn btn-info">View</a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{-- <div>
                                {{$brands->links()}}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
