<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">Wish List</h1></div>
          </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                <form action="#">
                    <div class="wishlist-table table-content table-responsive">
                        @if ($wishlists->count() == 0)
                        <h5>No Wishlist Found</h5>
                        @else
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="product-name text-center alt-font">Remove</th>
                                        <th class="product-price text-center alt-font">Images</th>
                                        <th class="product-name alt-font">Product</th>
                                        <th class="product-price text-center alt-font">Unit Price</th>
                                        <th class="stock-status text-center alt-font">Stock Status</th>
                                        <th class="product-subtotal text-center alt-font">Add to Cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($wishlists as $wishlistItem)
                                    @if ($wishlistItem->product)
                                        <tr>
                                            <td class="product-remove text-center" valign="middle"><a wire:click="removeWishlistItem({{ $wishlistItem->id }})" href=""><i class="icon icon anm anm-times-l text-danger" style="font-size: 25px;"></i></a></td>
                                            <td class="product-thumbnail text-center">
                                                <a href="{{ url('collections/' . $wishlistItem->product->category->slug . '/' . $wishlistItem->product->slug) }}"><img style="max-height: 150px" src="{{ asset($wishlistItem->product->productImages[0]->image) }}" alt="" title="" /></a>
                                            </td>
                                            <td class="product-name">
                                                <h4 class="no-margin font-weight-bold text-uppercase">
                                                <a href="{{ url('collections/' . $wishlistItem->product->category->slug . '/' . $wishlistItem->product->slug) }}">{{ $wishlistItem->product->name }}</a>
                                                </h4>
                                            </td>
                                            <td class="product-price text-center">
                                                @if ($wishlistItem->product->selling_price)
                                                <s class="amount">${{$wishlistItem->product->original_price}}</s>
                                                <b class="amount">${{$wishlistItem->product->selling_price}}</b>
                                                @else
                                                <b class="amount">${{$wishlistItem->product->original_price}}</b>
                                                @endif
                                            </td>
                                            <td class="stock text-center">
                                                <span class="in-stock">in stock</span>
                                            </td>
                                            <td class="product-subtotal text-center"><button type="button" class="btn btn-small">Add To Cart</button></td>
                                        </tr>
                                    @endif

                                    @empty
                                    <tr>
                                        <h5>No Wishlists Found</h5>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        @endif
                    </div>
                </form>
               </div>
        </div>
    </div>

</div>
