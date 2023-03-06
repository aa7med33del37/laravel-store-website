@extends('admin.layouts.main')
@section('content')
@section('title', 'Create User')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('users.index') }}" class="btn btn-rounded btn-primary text-white">View Users</a>
                        </h4>
                        <p class="card-description">
                            Add New User
                        </p>
                        <form class="forms-sample" method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Required *" name="name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Required *" name="email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Required *" name="password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="roles_as">Select Role</label>
                                    <select class="form-control form-control-lg" id="roles_as" name="roles_as">
                                        <option value="">Select Role</option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
