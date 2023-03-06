@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="alert alert-warning">:message</div>')) !!}
                        @endif

                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif

                        <h4 class="card-title">
                            <a href="{{ route('products.index') }}" class="btn btn-rounded btn-primary">View Products</a>
                        </h4>

                        <form class="forms-sample" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">Home</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#seo-tab-pane" type="button" role="tab"
                                        aria-controls="seo-tab-pane" aria-selected="false">SEO Tags</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#details-tab-pane" type="button" role="tab"
                                        aria-controls="details-tab-pane" aria-selected="false">Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="false">Image</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                    data-bs-target="#color-tab-pane" type="button" role="tab"
                                    aria-controls="color-tab-pane" aria-selected="false">Color</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <br/> <br/>
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select class="form-control" id="category_id" name="category_id">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                        <select class="form-control" id="brand" name="brand">
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Product Name</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name *" name="name">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="decription">Small Decription</label>
                                        <textarea class="form-control" id="decription" rows="4" name="small_description"></textarea>
                                        @error('small_description')
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
                                </div>
                                <div class="tab-pane fade" id="seo-tab-pane" role="tabpanel" aria-labelledby="seo-tab" tabindex="0">
                                    <br/> <br/>

                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity">
                                        @error('quantity')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="original_price">Original Price</label>
                                        <input type="text" class="form-control" id="original_price" name="original_price">
                                        @error('original_price')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="selling_price">Selling Price</label>
                                        <input type="text" class="form-control" id="selling_price" name="selling_price">
                                        @error('selling_price')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                    <br/> <br/>
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
                                    <div class="form-check form-check-success">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="1" name="trending">
                                        Is Trending ?
                                        </label>
                                    </div>
                                    <div class="form-check form-check-success">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="1" name="featured">
                                        Featured
                                        </label>
                                    </div>
                                    <div class="form-check form-check-success">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="status" value="1" checked>
                                        Status
                                        </label>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                    <div class="form-group">
                                        <label for="image">Upload Product Image</label>
                                        <input type="file" multiple class="dropify" name="image[]" />
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                    <br /> <br />
                                    <div class="form-group">
                                        <label for="color">Select Color</label>
                                        <div class="row">
                                            @forelse ($colors as $colorItem)
                                                <div class="col-md-3">
                                                    <div class="p-2 border">
                                                        <div class="form-check form-check-success">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="colors[{{$colorItem->id}}]" value="{{$colorItem->id}}" />
                                                                {{$colorItem->name}}
                                                            </label>
                                                        </div>
                                                        <br>
                                                        Quantity :
                                                        <input type="number" name="color_quantity[{{$colorItem->id}}]" style="width: 70px; border: 1px solid; "/>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="col-md-12">
                                                    No Color Found
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
