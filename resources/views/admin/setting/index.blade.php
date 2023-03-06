@extends('admin.layouts.main')
@section('title', "Site Settings")
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
                <div class="col-md-12 grid-margin ">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <form method="POST" action="{{ route('site_settings') }}" enctype="multipart/form-data"> @csrf
                        <div class="card mb-3">
                            <h4 class="card-header bg-primary">
                                <span class="text-white mb-0">Website</span>
                            </h4>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="website_name">Website Name</label>
                                        <input value="{{ $settings->website_name ?? '' }}" type="text" class="form-control" id="website_name" placeholder="Required *" name="website_name">
                                        @error('website_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="website_url">Website URL</label>
                                        <input value="{{ $settings->website_url ?? '' }}" type="text" class="form-control" id="website_url" placeholder="Required *" name="website_url">
                                        @error('website_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="image">Upload Website Image</label>
                                        @if ($settings)
                                            <input type="file" class="dropify" name="image" data-default-file="{{asset($settings->image)}}" value="{{asset($settings->image)}}"/>
                                        @else
                                            <input type="file" class="dropify" name="image"/>
                                        @endif
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="favicon">Upload Website Favicon</label>
                                        @if ($settings)
                                            <input type="file" class="dropify" name="favicon" data-default-file="{{asset("$settings->favicon")}}" value="{{asset("$settings->favicon")}}"/>
                                        @else
                                            <input type="file" class="dropify" name="favicon"/>
                                        @endif
                                        @error('favicon')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="page_title">Page Title</label>
                                        <input value="{{ $settings->page_title ?? '' }}" type="text" class="form-control" id="page_title" placeholder="Required *" name="page_title">
                                        @error('page_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="meta_keyword">Meta Keyword</label>
                                        <input value="{{ $settings->meta_keyword ?? '' }}" type="text" class="form-control" id="meta_keyword" placeholder="Required *" name="meta_keyword">
                                        @error('meta_keyword')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="meta_description">Meta Description</label>
                                        <input value="{{ $settings->meta_description ?? '' }}" type="text" class="form-control" id="meta_description" placeholder="Required *" name="meta_description">
                                        @error('meta_description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <h4 class="card-header bg-primary">
                                <span class="text-white mb-0">Website-Information</span>
                            </h4>
                            <div class="card-body">

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="address">Address</label>
                                        <input value="{{ $settings->address ?? '' }}" type="text" class="form-control" id="address" placeholder="Required *" name="address">
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="phone">Phone 1</label>
                                        <input value="{{ $settings->phone ?? '' }}" type="text" class="form-control" id="phone" placeholder="Required *" name="phone">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="phone2">Phone 2</label>
                                        <input value="{{ $settings->phone2 ?? '' }}" type="text" class="form-control" id="phone2" name="phone2" placeholder="Optional *">
                                        @error('phone2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input value="{{ $settings->email ?? '' }}" type="email" class="form-control" id="email" placeholder="Required *" name="email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="email2">Email 2</label>
                                        <input value="{{ $settings->email2 ?? '' }}" type="email" class="form-control" id="email2" name="email2" placeholder="Optional *">
                                        @error('email2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <h4 class="card-header bg-primary">
                                <span class="text-white mb-0">Website-Social Media</span>
                            </h4>
                            <div class="card-body">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="facebook">Facebook</label>
                                        <input value="{{ $settings->facebook ?? '' }}" type="text" class="form-control" id="facebook" placeholder="Optional *" name="facebook">
                                        @error('facebook')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="twitter">Twitter</label>
                                        <input value="{{ $settings->twitter ?? '' }}" type="text" class="form-control" id="twitter" name="twitter" placeholder="Optional *">
                                        @error('twitter')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="instagram">Instagram</label>
                                        <input value="{{ $settings->instagram ?? '' }}" type="text" class="form-control" id="instagram" placeholder="Optional *" name="instagram">
                                        @error('instagram')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="youtube">Youtube</label>
                                        <input value="{{ $settings->youtube ?? '' }}" type="text" class="form-control" id="youtube" placeholder="Optional *" name="youtube">
                                        @error('youtube')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary text-white">Update Website Settings</button>
                    </form>
                </div>

        </div>
    </div>
</div>
@endsection
