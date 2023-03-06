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
                            <a href="{{ route('brands.create') }}" class="btn btn-rounded btn-primary">Add Brand</a>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Brand Name</th>
                                        <th>slug</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{$brand->id}}</td>
                                        <td>{{$brand->name}}</td>
                                        <td>{{$brand->slug}}</td>
                                        <td>{{$brand->category_id ? $brand->category->name : ''}}</td>
                                        <td>
                                            @if ($brand->status == 1)
                                            <span class="btn btn-inverse-success">Visible</span>
                                            @elseif ($brand->status == 0)
                                            <span class="btn btn-inverse-dark">Hidden</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-info">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{$brands->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
