@extends('frontend.layouts.main')
@section('title', 'HOME')
@section('content')
<div id="page-content">
    <!--Home slider-->
    <div class="slideshow slideshow-wrapper pb-section sliderFull">
        <div class="home-slideshow">
            @if ($sliders)
                @foreach ($sliders as $slider)
                <div class="slide">
                    <div class="blur-up lazyload bg-size">
                        <img class="blur-up lazyload bg-img" data-src='{{asset("$slider->image")}}' src='{{asset("$slider->image")}}' alt="Shop Our New Collection" title="Shop Our New Collection" />
                        <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                            <div class="slideshow__text-content bottom">
                                <div class="wrap-caption center">
                                        <h2 class="h1 mega-title slideshow__title">{{ $slider->title }}</h2>
                                        <span class="mega-subtitle slideshow__subtitle">{{ $slider->description }}</span>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
    <!--End Home slider-->
    <!--Collection Tab slider-->
    <div class="product-rows section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">Trending Products</h2>
                        <p>Our trending products based on sales</p>
                        <a href="{{url('/collections')}}" class="btn btn-warning">View More</a>

                    </div>
                </div>
            </div>
            <div class="grid-products grid--view-items">
                <div class="row">
                    @forelse ($trendingProducts as $product)
                    <div class="col-6 col-sm-6 col-md-3 grid-view-item style2 item">
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
    </div>
    <!--Collection Tab slider-->

    <!--Collection Box slider-->
    <div class="collection-box section">
        <div class="container-fluid">
            <div class="collection-grid">
                @foreach ($categories as $category)
                    <div class="collection-grid-item">
                        <a href="{{ url('collections/' . $category->slug) }}" class="collection-grid-item__link">
                            <img data-src="{{asset($category->image)}}" src="{{asset($category->image)}}" alt="{{$category->name}}" class="blur-up lazyload"/>
                            <div class="collection-grid-item__title-wrapper">
                                <h3 class="collection-grid-item__title btn btn--secondary no-border">Fashion</h3>
                            </div>
                        </a>
                    </div>
                @endforeach

                </div>
        </div>
    </div>
    <!--End Collection Box slider-->

    <!--New Arrivals Product-->
    <div class="product-rows section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">New Arrivals collection</h2>
                        <p>Our new arrivals products</p>
                        <a href="{{url('/new-arrivals')}}" class="btn btn-warning">View More</a>
                    </div>
                </div>
            </div>
            <div class="grid-products">
                <div class="row">
                    @forelse ($newArrivalsProduct as $product)
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 grid-view-item style2 item">
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
    </div>
    <!--End New Arrivals Product-->

    <!--Featured Product-->
    <div class="product-rows section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">Featured collection</h2>
                        <p>Our most featured products</p>
                        <a href="{{url('/featured-products')}}" class="btn btn-warning">View More</a>
                    </div>
                </div>
            </div>
            <div class="grid-products">
                <div class="row">
                    @forelse ($featuredProducts as $product)
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 grid-view-item style2 item">
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
    </div>
    <!--End Featured Product-->
</div>
@endsection
