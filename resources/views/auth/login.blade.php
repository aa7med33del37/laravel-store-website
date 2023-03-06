@extends('frontend.layouts.main')
@section('meta_title', 'Login')
@section('content')
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">{{ __('Login') }}</h1></div>
          </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4">
                   <form method="POST" action="{{ route('login') }}" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="CustomerEmail">{{ __('Email Address') }}</label>
                                <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="CustomerPassword">{{ __('Password') }}</label>
                                <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="submit" class="btn mb-3" value="{{ __('Login') }}">
                            <p class="mb-4">
                                @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    &nbsp; | &nbsp;
                                @endif
                                <a href="{{ url('/register') }}" id="customer_register_link">Create account</a>
                            </p>
                        </div>
                     </div>
                 </form>
                </div>
               </div>
        </div>
    </div>

</div>
@endsection
