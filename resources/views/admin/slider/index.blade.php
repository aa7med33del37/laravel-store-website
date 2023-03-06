@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            @if (session('message'))
                <h2 class="alert alert-success">
                    {{ session('message') }}
                </h2>
                @endif
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('sliders.create') }}" class="btn btn-rounded btn-primary">Add Slider</a>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>status</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sliders as $slider)
                                    <tr>
                                        <td>{{$slider->id}}</td>
                                        <td>{{$slider->title}}</td>
                                        <td>
                                            <img src="{{asset("$slider->image")}}" alt="{{ $slider->title }}">
                                        </td>
                                        <td>{{$slider->description}}</td>
                                        <td>
                                            @if ($slider->status == 1)
                                            <span class="btn btn-inverse-success">Visible</span>
                                            @elseif ($slider->status == 0)
                                            <span class="btn btn-inverse-dark">Hidden</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-info">Edit</a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td>
                                                <span class="btn btn-info btn-rounded">No Sliders Found</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
