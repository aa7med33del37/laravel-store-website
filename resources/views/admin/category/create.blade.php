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
                            Add New Category
                        </p>
                        <form class="forms-sample" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name *" name="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="decription">Decription</label>
                                <textarea class="form-control" id="decription" rows="4" name="description"></textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">File upload</label>
                                <input type="file" class="dropify" name="image" />
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title">
                            </div>

                            <div class="form-group">
                                <label for="meta_key">Meta Keyword</label>
                                <input type="text" class="form-control" id="meta_key" name="meta_keyword">
                            </div>

                            <div class="form-group">
                                <label for="meta_description">Meta Decription</label>
                                <textarea class="form-control" id="meta_description" rows="4" name="meta_description"></textarea>
                            </div>

                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="status" value="1" checked>
                                  Status
                                </label>
                              </div>

                            <button type="submit" class="btn btn-primary me-2">Add</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
