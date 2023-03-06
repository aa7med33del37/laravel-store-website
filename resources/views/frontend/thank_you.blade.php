@extends('frontend.layouts.main')
@section('meta_title', 'Thank You')
@section('content')
<div id="page-content">
    <!-- Lookbook Start -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif
                <div class="empty-page-content text-center">
                    <h1>Thank You</h1>
                    <p>Your order is placed</p>
                    <p><a href="{{ url('collections') }}" class="btn btn--has-icon-after">Continue shopping <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Lookbook Start -->
</div>
@endsection
