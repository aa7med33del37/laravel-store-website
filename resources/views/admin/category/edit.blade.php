@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('categories.index') }}" class="btn btn-rounded btn-primary">View Categories</a>
                        </h4>
                        <p class="card-description">
                            Edit Category
                        </p>
                        <form class="forms-sample" method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name *" name="name" value="{{$category->name}}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="decription">Decription</label>
                                <textarea class="form-control" id="decription" rows="4" name="description">{{$category->description}}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">File upload</label>
                                <input type="file" class="dropify" name="image" value="{{$category->image}}" data-default-file="{{asset("$category->image")}}"/>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{$category->meta_title}}">
                            </div>

                            <div class="form-group">
                                <label for="meta_key">Meta Keyword</label>
                                <input type="text" class="form-control" id="meta_key" name="meta_keyword" value="{{$category->meta_keyword}}">
                            </div>

                            <div class="form-group">
                                <label for="meta_description">Meta Decription</label>
                                <textarea class="form-control" id="meta_description" rows="4" name="meta_description">{{$category->meta_description}}</textarea>
                            </div>

                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="status" value="1" @if ($category->status == 1)
                                      checked
                                  @endif>
                                  <input type="checkbox" class="form-check-input" name="status" value="1" {{ $category->status == 1 ? 'checked' : '' }}>
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
