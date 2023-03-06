@extends('frontend.layouts.main')
@section('meta_title', 'Register')
@section('content')
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">{{ __('Register') }}</h1></div>
          </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4">
                   <form method="POST" action="{{ route('register') }}" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
                        @csrf
                    <div class="row">
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="FirstName">{{ __('Name') }}</label>
                                <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                           </div>
                           @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="CustomerEmail">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="CustomerPassword">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="submit" class="btn mb-3" value="{{ __('Register') }}">
                            <p class="mb-4">
                                Already have an account? <a href="{{ url('/login') }}" id="customer_register_link"><b>Login now</b></a>
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
