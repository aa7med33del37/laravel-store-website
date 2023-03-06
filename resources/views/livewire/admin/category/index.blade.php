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
                            <a href="{{ route('categories.create') }}" class="btn btn-rounded btn-primary">Add Category</a>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Meta Title</th>
                                        <th>Meta Keyword</th>
                                        <th>Meta Description</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td>
                                            <img src="{{asset("$category->image")}}" alt="">
                                        </td>
                                        <td>{{$category->meta_title}}</td>
                                        <td>{{$category->meta_keyword}}</td>
                                        <td>{{$category->meta_description}}</td>
                                        <td>
                                            @if ($category->status == 1)
                                            <span class="btn btn-inverse-success">Visible</span>
                                            @elseif ($category->status == 0)
                                            <span class="btn btn-inverse-dark">Hidden</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{$categories->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
