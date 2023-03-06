@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            @if (session('message'))
                <h2 class="alert alert-success">
                    {{ session('message') }}
                </h2>
                @endif
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('products.create') }}" class="btn btn-rounded btn-primary">Add Product</a>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Category</th>
                                        <th>Product</th>
                                        <th>Brand</th>
                                        <th>Original Price</th>
                                        <th>Selling Price</th>
                                        <th>Quantity</th>
                                        <th>Is Trading</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>
                                            @if ($product->category)
                                            {{$product->category->name}}
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->brand}}</td>
                                        <td>{{$product->original_price}}</td>
                                        <td>{{$product->selling_price}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>
                                            @if ($product->trending == 1)
                                            <span class="btn btn-inverse-success">Trending</span>
                                            @elseif ($product->trending == 0)
                                            <span class="btn btn-inverse-dark">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->status == 1)
                                            <span class="btn btn-inverse-success">Visible</span>
                                            @elseif ($product->status == 0)
                                            <span class="btn btn-inverse-dark">Hidden</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>
                                            <span class="btn btn-info btn-rounded">No Products Available</span>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{-- {{$categories->links()}} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
