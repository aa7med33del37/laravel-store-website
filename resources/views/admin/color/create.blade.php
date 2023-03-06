@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('colors.index') }}" class="btn btn-rounded btn-primary">View Colors</a>
                        </h4>
                        <p class="card-description">
                            Add New Color
                        </p>
                        <form class="forms-sample" method="POST" action="{{ route('colors.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Color</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Required *" name="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Code</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Required *" name="code">
                                @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="status" value="1" checked>
                                  Status
                                </label>
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
