@extends('frontend.layouts.main')
@section('title', 'Collections')
@section('content')
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">Collection Page</h1></div>
          </div>
    </div>
    <!--End Page Title-->

    <div class="container collection-box">
        <div class="row">
            @forelse ($categories as $category)
            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                <div class="colletion-item">
                    <a href="{{ url('collections/' . $category->slug) }}">
                        <img class="blur-up lazyload" src='{{ asset("$category->image")}}' src='{{ asset("$category->image")}}' alt="{{ $category->name }}" title="">
                        <span class="title"><span>{{ $category->name }}</span></span>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12">
                No Category Found
            </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
