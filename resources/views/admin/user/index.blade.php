@extends('admin.layouts.main')
@section('title', 'Users')
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
                            <a href="{{ route('users.create') }}" class="btn btn-rounded btn-primary text-white">Add User</a>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-left">#ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-left">#{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->roles_as == 'admin')
                                                    <span class="btn btn-rounded btn-success">Admin</span>
                                                @elseif($user->roles_as == 'user')
                                                    <span class="btn btn-rounded btn-info">User</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick="return confirm('Are you sure, you want to delete this data ?')" href="{{ url('admin/users/' . $user->id . '/destroy') }}" class="btn btn-danger">Delete</a>
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{-- <div>
                                {{$brands->links()}}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
