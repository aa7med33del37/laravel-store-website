@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('brands.index') }}" class="btn btn-rounded btn-primary">View Brands</a>
                        </h4>
                        <p class="card-description">
                            Edit Brand ({{$brand->name}})
                        </p>
                        <form class="forms-sample" method="POST" action="{{ route('brands.update', $brand->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Category</label>
                                <select class="form-control form-control-lg" id="select_category" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $brand->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Brand Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name *" name="name" value="{{$brand->name}}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="status" value="1" {{$brand->status == 1 ? 'checked' : ''}}>
                                  Status
                                </label>
                              </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
