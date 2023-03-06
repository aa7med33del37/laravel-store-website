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
                            <a href="{{ route('colors.create') }}" class="btn btn-rounded btn-primary">Add Color</a>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Color</th>
                                        <th>Color Code</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($colors as $color)
                                    <tr>
                                        <td>{{$color->id}}</td>
                                        <td>{{$color->name}}</td>
                                        <td>{{$color->code}}</td>
                                        <td>
                                            @if ($color->status == 1)
                                            <span class="btn btn-inverse-success">Visible</span>
                                            @elseif ($color->status == 0)
                                            <span class="btn btn-inverse-dark">Hidden</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('colors.destroy', $color->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('colors.edit', $color->id) }}" class="btn btn-info">Edit</a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td>
                                                <span class="btn btn-info btn-rounded">No Color Found</span>
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
