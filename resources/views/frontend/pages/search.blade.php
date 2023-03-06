@extends('frontend.layouts.main')
@section('title', 'Search Results')

@section('content')
<div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header" style="margin-bottom: 50px">
        <div class="collection-hero">
            <div class="collection-hero__image"><img class="blur-up lazyload" data-src="{{ asset('assets/frontend/images/cat-women2.jpg') }}" src="{{ asset('assets/frontend/images/cat-women2.jpg') }}" alt="Women" title="Women" /></div>
            <div class="collection-hero__title-wrapper"><h1 class="collection-hero__title page-width">Search Results like "{{$search}}"</h1></div>
          </div>
    </div>
    <!--End Collection Banner-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 main-col">
                <div class="productList">
                    <div class="grid-products grid--view-items">
                        <div class="row">
                            @forelse ($searchProducts as $product)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 grid-view-item style2 item">
                                <div class="grid-view_image">
                                    <!-- start product image -->
                                    <a href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}" class="grid-view-item__link">
                                        <!-- image -->
                                        @if ($product->productImages->count() == 1)
                                        <img class="grid-view-item__image primary blur-up lazyload" data-src="{{ asset($product->productImages[0]->image) }}" src="{{ asset("$product->productImages[0]->image") }}" alt="image" title="{{ $product->name }}">
                                        <img class="grid-view-item__image hover blur-up lazyload" data-src="{{ asset($product->productImages[0]->image) }}" src="{{ asset($product->productImages[0]->image) }}" alt="image" title="{{ $product->name }}">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        @elseif ($product->productImages->count() > 1)
                                        <img class="grid-view-item__image primary blur-up lazyload" data-src="{{ asset($product->productImages[0]->image) }}" src="{{ asset("$product->productImages[0]->image") }}" alt="image" title="{{ $product->name }}">
                                        <img class="grid-view-item__image hover blur-up lazyload" data-src="{{ asset($product->productImages[1]->image) }}" src="{{ asset($product->productImages[1]->image) }}" alt="image" title="{{ $product->name }}">
                                        @endif
                                        <!-- End hover image -->
                                        <!-- product label -->
                                            <div class="product-labels rectangular">
                                                @if ($product->quantity > 0)
                                                <span class="lbl in-stock bg-success">In Stock</span>
                                                @else
                                                <span class="lbl out-stock bg-danger">Out Of Stock</span>
                                                @endif
                                            <span class="lbl pr-label1">new</span>
                                        </div>
                                        <!-- End product label -->
                                    </a>
                                    <!-- end product image -->

                                    <!--start product details -->
                                    <div class="product-details hoverDetails text-center mobile">
                                        <!-- product name -->
                                        <div class="product-name">
                                            <a class="font-weight-bold" href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}">{{ $product->name }}</a>
                                        </div>
                                        <!-- End product name -->
                                        <!-- product price -->
                                        <div class="product-price">
                                            @if ($product->selling_price)
                                            <span class="old-price">${{ $product->original_price }}</span>
                                            <span class="price">${{ $product->selling_price }}</span>
                                            @else
                                            <span class="price text-danger">${{ $product->original_price }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            @empty
                            <div>
                                No Products Found
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ url('/collections') }}" class="btn btn-warning">View More</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
