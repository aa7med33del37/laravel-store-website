<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('meta_title')</title>
        <meta name="description" content="@yield('meta_description')">
        <meta name="keywords" content="@yield('meta_keyword')">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('assets/frontend/images/favicon.png')}}" />
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins.css')}}">
        <!-- Bootstap CSS -->
        <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/frontend/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/frontend/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}">

        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

        {{-- Owl Carousel --}}
        <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.theme.default.min.css')}}">

        <style>
            .collection-box .colletion-item { height: 200px}
            .colletion-item a { height: 100%; width: 100%;}
            .colletion-item a img{ height: 100%; width: 100%;}

            .qtyField .quantityBtn {
                padding: 10px 6px;
                width: 30px;
                height: 42px;
                border-radius: 0;
                float: left;
            }

            .grid-view_image { height: 400px; }
            .grid-view-item.style2 .grid-view-item__link { height: 100%; }
            .grid-view-item.style2 .grid-view-item__image { height: 100% }

            .collection-grid-item {
                height: 270px;
            }

            .collection-box .collection-grid-item__link { height: 100%; }
            .collection-box .collection-grid-item__link img { height: 100%; }
        </style>
        @yield('styles')
        @livewireStyles
    </head>
    <body class="template-index belle template-index-belle">
        {{--
        <div id="pre-loader">
            <img src="{{asset('assets/frontend/images/loader.gif')}}" alt="Loading..." />
        </div>
        --}}
        <div class="pageWrapper">
            <!--Search Form Drawer-->
            <div class="search">
                <div class="search__form">
                    <form class="search-bar__form" action="{{ url('/search') }}" method="GET">
                        <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                        <input class="search__input" type="search" name="search" value="{{ Request::get('search') }}" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
                    </form>
                    <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
                </div>
            </div>
            <!--End Search Form Drawer-->
            @include('frontend.layouts.navbar')
            <!--Body Content-->
            <div style="margin-top: 70px">
                @yield('content')
            </div>
            <!--End Body Content-->
            <!--Footer-->
            @include('frontend.layouts.footer')
            <!--End Footer-->
            <!--Scoll Top-->
            <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
            <!--End Scoll Top-->
            <!--Quick View popup-->
            <div class="modal fade quick-view-popup" id="content_quickview">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div id="ProductSection-product-template" class="product-template__container prstyle1">
                                <div class="product-single">
                                    <!-- Start model close -->
                                    <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right" title="close"><span class="icon icon anm anm-times-l"></span></a>
                                    <!-- End model close -->
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="product-details-img">
                                                <div class="pl-20">
                                                    <img src="{{asset('assets/frontend/images/product-detail-page/camelia-reversible-big1.jpg')}}" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="product-single__meta">
                                                <h2 class="product-single__title">Product Quick View Popup</h2>
                                                <div class="prInfoRow">
                                                    <div class="product-stock"> <span class="instock ">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                                                    <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div>
                                                </div>
                                                <p class="product-single__price product-single__price-product-template">
                                                    <span class="visually-hidden">Regular price</span>
                                                    <s id="ComparePrice-product-template"><span class="money">$600.00</span></s>
                                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                                    <span id="ProductPrice-product-template"><span class="money">$500.00</span></span>
                                                    </span>
                                                </p>
                                                <div class="product-single__description rte">
                                                    Belle Multipurpose Bootstrap 4 Html Template that will give you and your customers a smooth shopping experience which can be used for various kinds of stores such as fashion,...
                                                </div>
                                                <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                                                    <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                                        <div class="product-form__item">
                                                            <label class="header">Color: <span class="slVariant">Red</span></label>
                                                            <div data-value="Red" class="swatch-element color red available">
                                                                <input class="swatchInput" id="swatch-0-red" type="radio" name="option-0" value="Red">
                                                                <label class="swatchLbl color medium rectangle" for="swatch-0-red" style="background-image:url(assets/images/product-detail-page/variant1-1.jpg')}});" title="Red"></label>
                                                            </div>
                                                            <div data-value="Blue" class="swatch-element color blue available">
                                                                <input class="swatchInput" id="swatch-0-blue" type="radio" name="option-0" value="Blue">
                                                                <label class="swatchLbl color medium rectangle" for="swatch-0-blue" style="background-image:url(assets/images/product-detail-page/variant1-2.jpg')}});" title="Blue"></label>
                                                            </div>
                                                            <div data-value="Green" class="swatch-element color green available">
                                                                <input class="swatchInput" id="swatch-0-green" type="radio" name="option-0" value="Green">
                                                                <label class="swatchLbl color medium rectangle" for="swatch-0-green" style="background-image:url(assets/images/product-detail-page/variant1-3.jpg')}});" title="Green"></label>
                                                            </div>
                                                            <div data-value="Gray" class="swatch-element color gray available">
                                                                <input class="swatchInput" id="swatch-0-gray" type="radio" name="option-0" value="Gray">
                                                                <label class="swatchLbl color medium rectangle" for="swatch-0-gray" style="background-image:url(assets/images/product-detail-page/variant1-4.jpg')}});" title="Gray"></label>
                                                            </div>
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
                                                    <!-- Product Action -->
                                                    <div class="product-action clearfix">
                                                        <div class="product-form__item--quantity">
                                                            <div class="wrapQtyBtn">
                                                                <div class="qtyField">
                                                                    <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                                    <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                                                    <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-form__item--submit">
                                                            <button type="button" name="add" class="btn product-form__cart-submit">
                                                            <span>Add to cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- End Product Action -->
                                                </form>
                                                <div class="display-table shareRow">
                                                    <div class="display-table-cell">
                                                        <div class="wishlist-btn">
                                                            <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End-product-single-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Quick View popup-->
            <!-- Newsletter Popup -->
            <div class="newsletter-wrap" id="popup-container">
                <div id="popup-window">
                    <a class="btn closepopup"><i class="icon icon anm anm-times-l"></i></a>
                    <!-- Modal content-->
                    <div class="display-table splash-bg">
                        <div class="display-table-cell width40"><img src="{{asset('assets/frontend/images/newsletter-img.jpg')}}" alt="Join Our Mailing List" title="Join Our Mailing List" /> </div>
                        <div class="display-table-cell width60 text-center">
                            <div class="newsletter-left">
                                <h2>Join Our Mailing List</h2>
                                <p>Sign Up for our exclusive email list and be the first to know about new products and special offers</p>
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="email" class="input-group__field newsletter__input" name="EMAIL" value="" placeholder="Email address" required="">
                                        <span class="input-group__btn">
                                        <button type="submit" class="btn newsletter__submit" name="commit" id="subscribeBtn"> <span class="newsletter__submit-text--large">Subscribe</span> </button>
                                        </span>
                                    </div>
                                </form>
                                <ul class="list--inline site-footer__social-icons social-icons">
                                    <li><a class="social-icons__link" href="#" title="Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                                    <li><a class="social-icons__link" href="#" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a class="social-icons__link" href="#" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a class="social-icons__link" href="#" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a class="social-icons__link" href="#" title="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    <li><a class="social-icons__link" href="#" title="Vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Newsletter Popup -->
            <!-- Including Jquery -->
            <script src="{{asset('assets/frontend/js/vendor/jquery-3.3.1.min.js')}}"></script>
            <script src="{{asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
            <script src="{{asset('assets/frontend/js/vendor/jquery.cookie.js')}}"></script>
            <script src="{{asset('assets/frontend/js/vendor/wow.min.js')}}"></script>
            <!-- Including Javascript -->
            <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
            <script src="{{asset('assets/frontend/js/plugins.js')}}"></script>
            <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
            <script src="{{asset('assets/frontend/js/lazysizes.js')}}"></script>
            <script src="{{asset('assets/frontend/js/main.js')}}"></script>

            {{-- OWl Carousel --}}
            <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>

            {{-- Alertify js --}}
            <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
            <script>
                window.addEventListener('message', event => {
                    if (event.detail) {
                        alertify.set('notifier','position', 'top-right');
                        alertify.notify(event.detail.text, event.detail.type);
                    }

                })
            </script>

            <!--For Newsletter Popup-->
            <script>
                jQuery(document).ready(function(){
                  jQuery('.closepopup').on('click', function () {
                	  jQuery('#popup-container').fadeOut();
                	  jQuery('#modalOverly').fadeOut();
                  });

                  var visits = jQuery.cookie('visits') || 0;
                  visits++;
                  jQuery.cookie('visits', visits, { expires: 1, path: '/' });
                  console.debug(jQuery.cookie('visits'));
                  if ( jQuery.cookie('visits') > 1 ) {
                	jQuery('#modalOverly').hide();
                	jQuery('#popup-container').hide();
                  } else {
                	  var pageHeight = jQuery(document).height();
                	  jQuery('<div id="modalOverly"></div>').insertBefore('body');
                	  jQuery('#modalOverly').css("height", pageHeight);
                	  jQuery('#popup-container').show();
                  }
                  if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
                });

                jQuery(document).mouseup(function(e){
                  var container = jQuery('#popup-container');
                  if( !container.is(e.target)&& container.has(e.target).length === 0)
                  {
                	container.fadeOut();
                	jQuery('#modalOverly').fadeIn(200);
                	jQuery('#modalOverly').hide();
                  }
                });
            </script>
        </div>

        @yield('scripts')
        @stack('scripts')
        @livewireScripts
    </body>
</html>
