@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('sliders.index') }}" class="btn btn-rounded btn-primary">View Sliders</a>
                        </h4>
                        <p class="card-description">
                            Add New Color
                        </p>
                        <form class="forms-sample" method="POST" action="{{ route('sliders.update', $slider->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" class="form-control" placeholder="Required *" name="title" value="{{ $slider->title }}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ $slider->description }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="dropify" name="image" value="{{ $slider->image }}" data-default-file="{{ asset("$slider->image") }}" />
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="status" value="1" {{$slider->status == 1 ? 'checked' : ''}}>
                                  Status
                                </label>
                              </div>

                            <button type="submit" class="btn btn-primary me-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
