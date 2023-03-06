<footer id="footer">
    <div class="newsletter-section">
        <div class="container">
            <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center align-items-center">
                        <div class="footer-social">
                            <ul class="list--inline site-footer__social-icons social-icons">
                                <li><a class="social-icons__link" href="{{ $appSetting->facebook ?? '' }}" target="_blank" title="Facebook Page"><i class="icon icon-facebook" style="font-size: 25px"></i></a></li>
                                <li><a class="social-icons__link" href="{{ $appSetting->twitter ?? '' }}" target="_blank" title="Twitter Page"><i class="icon icon-twitter" style="font-size: 25px"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                                <li><a class="social-icons__link" href="{{ $appSetting->instagram ?? '' }}" target="_blank" title="instagram Page"><i class="icon icon-instagram" style="font-size: 25px"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                                <li><a class="social-icons__link" href="{{ $appSetting->youtube ?? '' }}" target="_blank" title="Youtube Channel"><i class="icon icon-youtube" style="font-size: 25px"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="site-footer">
        <div class="container">
             <!--Footer Links-->
            <div class="footer-top">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 footer-links">
                        <h4 class="h4">Quick Links</h4>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Blogs</a></li>
                            <li><a href="#">Site Maps</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 footer-links">
                        <h4 class="h4">Quick Shop</h4>
                        <ul>
                            <li><a href="{{ url('/collections') }}">Collections</a></li>
                            <li><a href="{{ url('/new-arrivals') }}">New Arrivals Products</a></li>
                            <li><a href="{{ url('/featured-products') }}">Featured Products</a></li>
                            <li><a href="{{ url('/cart') }}">Cart</a></li>
                            <li><a href="{{ url('/wishlist') }}">Wishlist</a></li>
                        </ul>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 contact-box">
                        <h4 class="h4">Contact Us</h4>
                        <ul class="addressFooter">
                            <li><i class="icon anm anm-map-marker-al"></i><p>{{$appSetting->address ?? '' }}</p></li>
                            <li class="phone"><i class="icon anm anm-phone-s"></i><p>{{ $appSetting->phone ?? '' }} & {{ $appSetting->phone2 ?? '' }}</p></li>
                            <li class="email"><i class="icon anm anm-envelope-l"></i><p>{{ $appSetting->email ?? ''}}</p></li>
                            @if($appSetting)
                                @if ($appSetting->email2)
                                <li class="email"><i class="icon anm anm-envelope-l"></i><p>{{ $appSetting->email2 }}</p></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
