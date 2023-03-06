<div id="page-content">
    <!--MainContent-->
    <div id="MainContent" class="main-content" role="main">
        <!--Breadcrumb-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="{{ url('/') }}" title="Back to the home page">Home</a>
                <span aria-hidden="true">›</span>
                <span><a href="{{ url('collections/' . $category->slug) }}">{{ $category->name }}</a></span>

                <span aria-hidden="true">›</span>
                <span>{{ $product->name }}</span>
            </div>
        </div>
        <!--End Breadcrumb-->
        <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
            <!--product-single-->
            <div class="product-single">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img">
                            <div class="product-thumb">
                                <div id="gallery" class="product-dec-slider-2 product-tab-left">
                                    @foreach ($product->productImages as $imageItem)
                                    <a data-image="{{ asset($imageItem->image) }}" data-zoom-image="{{ asset($imageItem->image) }}" class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1">
                                        <img class="blur-up lazyload" src="{{ asset($imageItem->image) }}" alt="" />
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="zoompro-wrap product-zoom-right pl-20">
                                <div class="zoompro-span">
                                    <img class="zoompro blur-up lazyload" data-zoom-image="{{ asset($product->productImages[0]->image) }}" alt="" src="{{ asset($product->productImages[0]->image) }}" />
                                </div>
                                <div class="product-labels"><span class="lbl on-sale">Sale</span><span class="lbl pr-label1">new</span></div>
                                <div class="product-buttons">
                                    {{-- <a href="https://www.youtube.com/watch?v=93A2jOW5Mog" class="btn popup-video" title="View Video"><i class="icon anm anm-play-r" aria-hidden="true"></i></a> --}}
                                    <a href="#" class="btn prlightbox" title="Zoom"><i class="icon anm anm-expand-l-arrows" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="lightboximages">
                                @foreach ($product->productImages as $imageItem)
                                <a href="{{ asset($imageItem->image) }}" data-size="1462x2048"></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-single__meta">
                            <h1 class="product-single__title">{{ $product->name }}</h1>
                            <div class="product-nav clearfix">
                                <a href="#" class="next" title="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                            <div class="prInfoRow">
                                <div class="product-stock">
                                    @if ($product->quantity > 0)
                                    <span class="text-success font-weight-bold">In Stock</span>
                                    @else
                                    <span class="text-danger font-weight-bold">Unavailable</span>
                                    @endif
                                </div>
                                <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div>
                                <div class="product-review"><a class="reviewLink" href="#tab2"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><span class="spr-badge-caption">6 reviews</span></a></div>
                            </div>
                            <p class="product-single__price product-single__price-product-template">
                                <span class="visually-hidden">Regular price</span>
                                @if ($product->selling_price)
                                    <s id="ComparePrice-product-template"><span class="money">${{ $product->original_price }}</span></s>
                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                    <span id="ProductPrice-product-template"><span class="money">${{ $product->selling_price }}</span></span>
                                    </span>
                                @else
                                <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                <span id="ProductPrice-product-template"><span class="money">${{ $product->original_price }}</span></span>
                                @endif

                                <span class="discount-badge"> <span class="devider">|</span>&nbsp;
                                <span>You Save</span>
                                <span id="SaveAmount-product-template" class="product-single__save-amount">
                                <span class="money">$100.00</span>
                                </span>
                                <span class="off">(<span>16</span>%)</span>
                                </span>
                            </p>
                            <div class="orderMsg" data-user="23" data-time="24">
                                <img src="{{ asset('assets/frontend/images/order-icon.jpg')}}" alt="" /> <strong class="items">5</strong> sold in last <strong class="time">26</strong> hours
                            </div>
                        </div>
                        <div class="product-single__description rte">
                            {{-- <ul>
                                <li>{{ $product->small_description }}</li>
                            </ul> --}}
                            <p>{{ $product->small_description }}</p>
                        </div>
                        <div id="quantity_message">Hurry! Only  <span class="items">4</span>  left in stock.</div>
                        <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                            <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                <div class="product-form__item">
                                    @if ($product->productColors->count() > 0)
                                    <label class="header">Color: <span class="slVariant">Red</span></label>
                                        @if ($product->productColors)
                                            @foreach ($product->productColors as $colorItem)
                                                <div data-value="{{ $colorItem->color->name }}" class="swatch-element color black available">
                                                    <input class="swatchInput" id="swatch-0-{{ $colorItem->color->name }}" type="radio" name="option-0" value="{{ $colorItem->color->name }}">
                                                    <label wire:click="colorSelected({{$colorItem->id}})" class="swatchLbl color small" for="swatch-0-{{ $colorItem->color->name }}" style="background-color:{{ $colorItem->color->code }};" title="{{ $colorItem->color->name }}"></label>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div>
                                            @if ($productColorSelectedQty == 'Out Of Stock')
                                                <b class="text-uppercase text-danger">Out of Stock</b>
                                            @elseif($productColorSelectedQty > 0)
                                                <b class="text-uppercase text-success">In Stock</b>
                                            @endif
                                        </div>
                                    @else
                                        @if ($product->quantity)
                                            <b class="text-uppercase text-success">In Stock</b>
                                        @else
                                            <b class="text-uppercase text-danger">Out of Stock</b>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                <div class="product-form__item">
                                    <label class="header">Size: <span class="slVariant">XS</span></label>
                                    <div data-value="XS" class="swatch-element xs available">
                                        <input class="swatchInput" id="swatch-1-xs" type="radio" name="option-1" value="XS">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-xs" title="XS">XS</label>
                                    </div>
                                    <div data-value="S" class="swatch-element s available">
                                        <input class="swatchInput" id="swatch-1-s" type="radio" name="option-1" value="S">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-s" title="S">S</label>
                                    </div>
                                    <div data-value="M" class="swatch-element m available">
                                        <input class="swatchInput" id="swatch-1-m" type="radio" name="option-1" value="M">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-m" title="M">M</label>
                                    </div>
                                    <div data-value="L" class="swatch-element l available">
                                        <input class="swatchInput" id="swatch-1-l" type="radio" name="option-1" value="L">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-l" title="L">L</label>
                                    </div>
                                </div>
                            </div>
                            <p class="infolinks"><a href="#sizechart" class="sizelink btn"> Size Guide</a> <a href="#productInquiry" class="emaillink btn"> Ask About this Product</a></p>
                            <!-- Product Action -->
                            <div class="product-action clearfix">
                                <div class="product-form__item--quantity">
                                    <div class="wrapQtyBtn">
                                        <div class="qtyField">
                                            <a wire:click="decrementQuantity" class="quantityBtn" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                            <input wire:model="quantityCount" type="text" id="Quantity" name="quantity" value="{{$this->quantityCount}}" class="product-form__input qty">
                                            <a wire:click="incrementQuantity" class="quantityBtn" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-form__item--submit">
                                    <button wire:click="addToCart({{$product->id}})" type="button" name="add" class="btn product-form__cart-submit">
                                    <span>Add to cart</span>
                                    </button>
                                </div>
                                <div class="shopify-payment-button" data-shopify="payment-button">
                                    <button wire:click="addToWishlist({{$product->id}})" type="button" class="shopify-payment-button__button shopify-payment-button__button--unbranded">
                                        <span wire:loading.remove>
                                            <i class="fa fa-heart-o"></i> Add To Wishlist
                                        </span>
                                        <span wire:loading wire:target="addToWishlist">Adding ...</span>
                                    </button>
                                </div>
                                @if (session()->has('erorr'))
                                    <div class="text-danger font-weight-bold">
                                        {{ session('erorr') }}
                                    </div>
                                @endif
                                @if (session()->has('success'))
                                    <div class="text-success font-weight-bold">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                            <!-- End Product Action -->
                        </form>
                        <div class="display-table shareRow">
                            <div class="display-table-cell medium-up--one-third">
                                <div class="wishlist-btn">
                                    <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                </div>
                            </div>
                            <div class="display-table-cell text-right">
                                <div class="social-sharing">
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                                    <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                                    </a>
                                    <a href="#" title="Share on google+" class="btn btn--small btn--secondary btn--share" >
                                    <i class="fa fa-google-plus" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Google+</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Pin on Pinterest">
                                    <i class="fa fa-pinterest" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Pin it</span>
                                    </a>
                                    <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share by Email" target="_blank">
                                    <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Email</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <p id="freeShipMsg" class="freeShipMsg" data-price="199"><i class="fa fa-truck" aria-hidden="true"></i> GETTING CLOSER! ONLY <b class="freeShip"><span class="money" data-currency-usd="$199.00" data-currency="USD">$199.00</span></b> AWAY FROM <b>FREE SHIPPING!</b></p>
                        <p class="shippingMsg"><i class="fa fa-clock-o" aria-hidden="true"></i> ESTIMATED DELIVERY BETWEEN <b id="fromDate">Wed. May 1</b> and <b id="toDate">Tue. May 7</b>.</p>
                        <div class="userViewMsg" data-user="20" data-time="11000"><i class="fa fa-users" aria-hidden="true"></i> <strong class="uersView">14</strong> PEOPLE ARE LOOKING FOR THIS PRODUCT</div>
                    </div>
                </div>
            </div>
            <!--End-product-single-->
            <!--Product Fearure-->
            <div class="prFeatures">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                        <img src="{{ asset('assets/frontend/images/credit-card.png')}}" alt="Safe Payment" title="Safe Payment" />
                        <div class="details">
                            <h3>Safe Payment</h3>
                            Pay with the world's most payment methods.
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                        <img src="{{ asset('assets/frontend/images/shield.png')}}" alt="Confidence" title="Confidence" />
                        <div class="details">
                            <h3>Confidence</h3>
                            Protection covers your purchase and personal data.
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                        <img src="{{ asset('assets/frontend/images/worldwide.png')}}" alt="Worldwide Delivery" title="Worldwide Delivery" />
                        <div class="details">
                            <h3>Worldwide Delivery</h3>
                            FREE &amp; fast shipping to over 200+ countries &amp; regions.
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                        <img src="{{ asset('assets/frontend/images/phone-call.png')}}" alt="Hotline" title="Hotline" />
                        <div class="details">
                            <h3>Hotline</h3>
                            Talk to help line for your question on 4141 456 789, 4125 666 888
                        </div>
                    </div>
                </div>
            </div>
            <!--End Product Fearure-->
            <!--Product Tabs-->
            <div class="tabs-listing">
                <ul class="product-tabs">
                    <li rel="tab1"><a class="tablink">Product Details</a></li>
                    <li rel="tab2"><a class="tablink">Product Reviews</a></li>
                    <li rel="tab3"><a class="tablink">Size Chart</a></li>
                    <li rel="tab4"><a class="tablink">Shipping &amp; Returns</a></li>
                </ul>
                <div class="tab-container">
                    <div id="tab1" class="tab-content">
                        <div class="product-description rte">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                <li>Sed ut perspiciatis unde omnis iste natus error sit</li>
                                <li>Neque porro quisquam est qui dolorem ipsum quia dolor</li>
                                <li>Lorem Ipsum is not simply random text.</li>
                                <li>Free theme updates</li>
                            </ul>
                            <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</h3>
                            <p>You can change the position of any sections such as slider, banner, products, collection and so on by just dragging and dropping.&nbsp;</p>
                            <h3>Lorem Ipsum is not simply random text.</h3>
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
                            <p>Change colors, fonts, banners, megamenus and more. Preview changes are live before saving them.</p>
                            <h3>1914 translation by H. Rackham</h3>
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
                            <h3>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                            <h3>The standard Lorem Ipsum passage, used since the 1500s</h3>
                            <p>You can use variant style from colors, images or variant images. Also available differnt type of design styles and size.</p>
                            <h3>Lorem Ipsum is not simply random text.</h3>
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
                            <h3>Proin ut lacus eget elit molestie posuere.</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
                        </div>
                    </div>
                    <div id="tab2" class="tab-content">
                        <div id="shopify-product-reviews">
                            <div class="spr-container">
                                <div class="spr-header clearfix">
                                    <div class="spr-summary">
                                        <span class="product-review"><a class="reviewLink"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i> </a><span class="spr-summary-actions-togglereviews">Based on 6 reviews456</span></span>
                                        <span class="spr-summary-actions">
                                        <a href="#" class="spr-summary-actions-newreview btn">Write a review</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="spr-content">
                                    <div class="spr-form clearfix">
                                        <form method="post" action="#" id="new-review-form" class="new-review-form">
                                            <h3 class="spr-form-title">Write a review</h3>
                                            <fieldset class="spr-form-contact">
                                                <div class="spr-form-contact-name">
                                                    <label class="spr-form-label" for="review_author_10508262282">Name</label>
                                                    <input class="spr-form-input spr-form-input-text " id="review_author_10508262282" type="text" name="review[author]" value="" placeholder="Enter your name">
                                                </div>
                                                <div class="spr-form-contact-email">
                                                    <label class="spr-form-label" for="review_email_10508262282">Email</label>
                                                    <input class="spr-form-input spr-form-input-email " id="review_email_10508262282" type="email" name="review[email]" value="" placeholder="john.smith@example.com">
                                                </div>
                                            </fieldset>
                                            <fieldset class="spr-form-review">
                                                <div class="spr-form-review-rating">
                                                    <label class="spr-form-label">Rating</label>
                                                    <div class="spr-form-input spr-starrating">
                                                        <div class="product-review"><a class="reviewLink" href="#"><i class="fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i></a></div>
                                                    </div>
                                                </div>
                                                <div class="spr-form-review-title">
                                                    <label class="spr-form-label" for="review_title_10508262282">Review Title</label>
                                                    <input class="spr-form-input spr-form-input-text " id="review_title_10508262282" type="text" name="review[title]" value="" placeholder="Give your review a title">
                                                </div>
                                                <div class="spr-form-review-body">
                                                    <label class="spr-form-label" for="review_body_10508262282">Body of Review <span class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                                    <div class="spr-form-input">
                                                        <textarea class="spr-form-input spr-form-input-textarea " id="review_body_10508262282" data-product-id="10508262282" name="review[body]" rows="10" placeholder="Write your comments here"></textarea>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="spr-form-actions">
                                                <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="spr-reviews">
                                        <div class="spr-review">
                                            <div class="spr-review-header">
                                                <span class="product-review spr-starratings spr-review-header-starratings"><span class="reviewLink"><i class="fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i></span></span>
                                                <h3 class="spr-review-header-title">Lorem ipsum dolor sit amet</h3>
                                                <span class="spr-review-header-byline"><strong>dsacc</strong> on <strong>Apr 09, 2019</strong></span>
                                            </div>
                                            <div class="spr-review-content">
                                                <p class="spr-review-content-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            </div>
                                        </div>
                                        <div class="spr-review">
                                            <div class="spr-review-header">
                                                <span class="product-review spr-starratings spr-review-header-starratings"><span class="reviewLink"><i class="fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i></span></span>
                                                <h3 class="spr-review-header-title">Lorem Ipsum is simply dummy text of the printing</h3>
                                                <span class="spr-review-header-byline"><strong>larrydude</strong> on <strong>Dec 30, 2018</strong></span>
                                            </div>
                                            <div class="spr-review-content">
                                                <p class="spr-review-content-body">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="spr-review">
                                            <div class="spr-review-header">
                                                <span class="product-review spr-starratings spr-review-header-starratings"><span class="reviewLink"><i class="fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i></span></span>
                                                <h3 class="spr-review-header-title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</h3>
                                                <span class="spr-review-header-byline"><strong>quoctri1905</strong> on <strong>Dec 30, 2018</strong></span>
                                            </div>
                                            <div class="spr-review-content">
                                                <p class="spr-review-content-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.<br>
                                                    <br>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab3" class="tab-content">
                        <h3>WOMEN'S BODY SIZING CHART</h3>
                        <table>
                            <tbody>
                                <tr>
                                    <th>Size</th>
                                    <th>XS</th>
                                    <th>S</th>
                                    <th>M</th>
                                    <th>L</th>
                                    <th>XL</th>
                                </tr>
                                <tr>
                                    <td>Chest</td>
                                    <td>31" - 33"</td>
                                    <td>33" - 35"</td>
                                    <td>35" - 37"</td>
                                    <td>37" - 39"</td>
                                    <td>39" - 42"</td>
                                </tr>
                                <tr>
                                    <td>Waist</td>
                                    <td>24" - 26"</td>
                                    <td>26" - 28"</td>
                                    <td>28" - 30"</td>
                                    <td>30" - 32"</td>
                                    <td>32" - 35"</td>
                                </tr>
                                <tr>
                                    <td>Hip</td>
                                    <td>34" - 36"</td>
                                    <td>36" - 38"</td>
                                    <td>38" - 40"</td>
                                    <td>40" - 42"</td>
                                    <td>42" - 44"</td>
                                </tr>
                                <tr>
                                    <td>Regular inseam</td>
                                    <td>30"</td>
                                    <td>30½"</td>
                                    <td>31"</td>
                                    <td>31½"</td>
                                    <td>32"</td>
                                </tr>
                                <tr>
                                    <td>Long (Tall) Inseam</td>
                                    <td>31½"</td>
                                    <td>32"</td>
                                    <td>32½"</td>
                                    <td>33"</td>
                                    <td>33½"</td>
                                </tr>
                            </tbody>
                        </table>
                        <h3>MEN'S BODY SIZING CHART</h3>
                        <table>
                            <tbody>
                                <tr>
                                    <th>Size</th>
                                    <th>XS</th>
                                    <th>S</th>
                                    <th>M</th>
                                    <th>L</th>
                                    <th>XL</th>
                                    <th>XXL</th>
                                </tr>
                                <tr>
                                    <td>Chest</td>
                                    <td>33" - 36"</td>
                                    <td>36" - 39"</td>
                                    <td>39" - 41"</td>
                                    <td>41" - 43"</td>
                                    <td>43" - 46"</td>
                                    <td>46" - 49"</td>
                                </tr>
                                <tr>
                                    <td>Waist</td>
                                    <td>27" - 30"</td>
                                    <td>30" - 33"</td>
                                    <td>33" - 35"</td>
                                    <td>36" - 38"</td>
                                    <td>38" - 42"</td>
                                    <td>42" - 45"</td>
                                </tr>
                                <tr>
                                    <td>Hip</td>
                                    <td>33" - 36"</td>
                                    <td>36" - 39"</td>
                                    <td>39" - 41"</td>
                                    <td>41" - 43"</td>
                                    <td>43" - 46"</td>
                                    <td>46" - 49"</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <img src="{{ asset('assets/frontend/images/size.jpg')}}" alt="" />
                        </div>
                    </div>
                    <div id="tab4" class="tab-content">
                        <h4>Returns Policy</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros justo, accumsan non dui sit amet. Phasellus semper volutpat mi sed imperdiet. Ut odio lectus, vulputate non ex non, mattis sollicitudin purus. Mauris consequat justo a enim interdum, in consequat dolor accumsan. Nulla iaculis diam purus, ut vehicula leo efficitur at.</p>
                        <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. In blandit nunc enim, sit amet pharetra erat aliquet ac.</p>
                        <h4>Shipping</h4>
                        <p>Pellentesque ultrices ut sem sit amet lacinia. Sed nisi dui, ultrices ut turpis pulvinar. Sed fringilla ex eget lorem consectetur, consectetur blandit lacus varius. Duis vel scelerisque elit, et vestibulum metus.  Integer sit amet tincidunt tortor. Ut lacinia ullamcorper massa, a fermentum arcu vehicula ut. Ut efficitur faucibus dui Nullam tristique dolor eget turpis consequat varius. Quisque a interdum augue. Nam ut nibh mauris.</p>
                    </div>
                </div>
            </div>
            <!--End Product Tabs-->
            <!--Related Product Slider-->
            @if ($category->relatedProducts->count() > 1)
                <div class="related-product grid-products">
                    <header class="section-header">
                        <h2 class="section-header__title text-center h2"><span>Related {{ $category ? $category->name : '' }} Products</span></h2>
                    </header>
                        <div class="grid-products grid--view-items">
                            <div class="row">
                                @forelse ($category->relatedProducts as $relatedProduct)
                                    @if ($relatedProduct->id != $product->id)
                                            <div class="col-6 col-sm-6 col-md-3 col-lg-3 grid-view-item style2 item">
                                            <div class="grid-view_image">
                                                <!-- start product image -->
                                                <a href="{{ url('collections/' . $relatedProduct->category->slug . '/' . $relatedProduct->slug) }}" class="grid-view-item__link">
                                                    <!-- image -->
                                                    @if ($relatedProduct->productImages->count() == 1)
                                                    <img class="grid-view-item__image primary blur-up lazyload" data-src="{{ asset($relatedProduct->productImages[0]->image) }}" src="{{ asset("$relatedProduct->productImages[0]->image") }}" alt="image" title="{{ $relatedProduct->name }}">
                                                    <img class="grid-view-item__image hover blur-up lazyload" data-src="{{ asset($relatedProduct->productImages[0]->image) }}" src="{{ asset($relatedProduct->productImages[0]->image) }}" alt="image" title="{{ $relatedProduct->name }}">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    @elseif ($relatedProduct->productImages->count() > 1)
                                                    <img class="grid-view-item__image primary blur-up lazyload" data-src="{{ asset($relatedProduct->productImages[0]->image) }}" src="{{ asset("$relatedProduct->productImages[0]->image") }}" alt="image" title="{{ $relatedProduct->name }}">
                                                    <img class="grid-view-item__image hover blur-up lazyload" data-src="{{ asset($relatedProduct->productImages[1]->image) }}" src="{{ asset($relatedProduct->productImages[1]->image) }}" alt="image" title="{{ $relatedProduct->name }}">
                                                    @endif
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                        <div class="product-labels rectangular">
                                                            @if ($relatedProduct->quantity > 0)
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
                                                        <a class="font-weight-bold" href="{{ url('collections/' . $relatedProduct->category->slug . '/' . $relatedProduct->slug) }}">{{ $relatedProduct->name }}</a>
                                                    </div>
                                                    <!-- End product name -->
                                                    <!-- product price -->
                                                    <div class="product-price">
                                                        @if ($relatedProduct->selling_price)
                                                        <span class="old-price">${{ $relatedProduct->original_price }}</span>
                                                        <span class="price">${{ $relatedProduct->selling_price }}</span>
                                                        @else
                                                        <span class="price text-danger">${{ $relatedProduct->original_price }}</span>
                                                        @endif

                                                    </div>
                                                </div>
                                                <!-- End product details -->
                                            </div>
                                        </div>
                                    @else
                                    @endif
                                @empty
                                <div>
                                    No Related Products Found
                                </div>
                                @endforelse
                            </div>
                        </div>
                </div>
            @endif

            <!--End Related Product Slider-->

            <!--Related Product Slider-->
            <div class="related-product grid-products">
                <header class="section-header">
                    <h2 class="section-header__title text-center h2"><span>Related {{ $product ? $product->brand : '' }} Products</span></h2>
                </header>
                <div class="grid-products grid--view-items">
                    <div class="row">
                        @forelse ($category->relatedProducts as $relatedProduct)
                        @if ($relatedProduct->brand == $product->brand)
                            @if ($relatedProduct->id != $product->id)
                                <div class="col-6 col-sm-6 col-md-3 col-lg-3 grid-view-item style2 item">
                                    <div class="grid-view_image">
                                        <!-- start product image -->
                                        <a href="{{ url('collections/' . $relatedProduct->category->slug . '/' . $relatedProduct->slug) }}" class="grid-view-item__link">
                                            <!-- image -->
                                            @if ($relatedProduct->productImages->count() == 1)
                                            <img class="grid-view-item__image primary blur-up lazyload" data-src="{{ asset($product->productImages[0]->image) }}" src="{{ asset("$relatedProduct->productImages[0]->image") }}" alt="image" title="{{ $relatedProduct->name }}">
                                            <img class="grid-view-item__image hover blur-up lazyload" data-src="{{ asset($relatedProduct->productImages[0]->image) }}" src="{{ asset($relatedProduct->productImages[0]->image) }}" alt="image" title="{{ $relatedProduct->name }}">
                                            <!-- End image -->
                                            <!-- Hover image -->
                                            @elseif ($relatedProduct->productImages->count() > 1)
                                            <img class="grid-view-item__image primary blur-up lazyload" data-src="{{ asset($relatedProduct->productImages[0]->image) }}" src="{{ asset("$relatedProduct->productImages[0]->image") }}" alt="image" title="{{ $relatedProduct->name }}">
                                            <img class="grid-view-item__image hover blur-up lazyload" data-src="{{ asset($relatedProduct->productImages[1]->image) }}" src="{{ asset($relatedProduct->productImages[1]->image) }}" alt="image" title="{{ $relatedProduct->name }}">
                                            @endif
                                            <!-- End hover image -->
                                            <!-- relatedProduct label -->
                                                <div class="product-labels rectangular">
                                                    @if ($relatedProduct->quantity > 0)
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
                                                <a class="font-weight-bold" href="{{ url('collections/' . $relatedProduct->category->slug . '/' . $relatedProduct->slug) }}">{{ $relatedProduct->name }}</a>
                                            </div>
                                            <!-- End product name -->
                                            <!-- product price -->
                                            <div class="product-price">
                                                @if ($relatedProduct->selling_price)
                                                <span class="old-price">${{ $relatedProduct->original_price }}</span>
                                                <span class="price">${{ $relatedProduct->selling_price }}</span>
                                                @else
                                                <span class="price text-danger">${{ $relatedProduct->original_price }}</span>
                                                @endif

                                            </div>
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                </div>
                            @endif
                        @endif

                        @empty
                        <div>
                            No {{ $product->brand }} Products Found
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <!--End Related Product Slider-->
        </div>
    </div>
    <!--MainContent-->
</div>
