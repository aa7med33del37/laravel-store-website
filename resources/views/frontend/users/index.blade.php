@extends('frontend.layouts.main')
@section('meta_title', 'Profile')
@section('content')
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Update Profile</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->
    <div class="container">
        @if (session('success_message'))
                <div class="alert alert-success text-center">{{ session('success_message') }}</div>
            @endif
            @if (session('error_message'))
                <div class="alert alert-danger text-center">{{ session('error_message') }}</div>
            @endif
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col">
                <div class="mb-4">
                    <form method="post" action="{{ route('profile.update') }}" id="CustomerLoginForm" class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="" id="name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="CustomerEmail">Email</label>
                                    <input type="email" name="email" placeholder="" readonly value="{{ Auth::user()->email }}" id="CustomerEmail">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->UserDetail->phone ?? '' }}" placeholder="Must be 11 character" id="phone">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" placeholder="" id="city" value="{{ Auth::user()->UserDetail->city ?? '' }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="pincode">Pincode</label>
                                    <input type="text" name="pincode" placeholder="(Optional)" id="pincode" value="{{ Auth::user()->UserDetail->pincode ?? '' }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address">{{ Auth::user()->UserDetail->address ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" class="btn mb-3">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col">
                <div class="mb-4">
                    <form method="post" action="{{ route('profile.update.password') }}" id="CustomerLoginForm" class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" name="current_password" id="current_password" required>
                                </div>
                                @error('current_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" id="password" required>
                                </div>
                                @error('new_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                                </div>
                                @error('confirm_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" class="btn mb-3">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
