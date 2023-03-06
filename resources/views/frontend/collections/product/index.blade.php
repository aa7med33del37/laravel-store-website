@extends('frontend.layouts.main')
@section('title', $category->meta_title . " Category")
@section('meta_keyword', $category->meta_keyword)
@section('meta_description', $category->meta_description)

@section('content')
<div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header" style="margin-bottom: 50px">
        <div class="collection-hero">
            <div class="collection-hero__image"><img class="blur-up lazyload" data-src="{{ asset('assets/frontend/images/cat-women2.jpg') }}" src="{{ asset('assets/frontend/images/cat-women2.jpg') }}" alt="Women" title="Women" /></div>
            <div class="collection-hero__title-wrapper"><h1 class="collection-hero__title page-width">Shop Fullwidth</h1></div>
          </div>
    </div>
    <!--End Collection Banner-->

    <div class="container-fluid">
        <livewire:frontend.product.index :category="$category" />
    </div>
</div>
@endsection
