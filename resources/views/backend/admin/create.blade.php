@extends('layouts.backend_master')
@section('title', 'Role Create')
@section('master-content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Add New Role</h4>
        <a href="{{ route('admin.admin.index') }}" class="btn btn-success btn-sm"><i class="fa fa-angle-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" id="name">
            </div>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" id="email">
            </div>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">password</label>
                <input type="text" class="form-control" name="password" placeholder="Enter Password" id="password">
            </div>
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter phone" id="phone">
            </div>
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Enter image" id="image">
            </div>
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Status</label> <br>
                <input type="radio" class="" name="status" value="0"> Inactive <br>
                <input type="radio" class="" name="status" value="1"> Active
            </div>
            @error('status')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Role</label> <br>
                <select name="role" id="" class="form-control">
                    <option >Select a Role</option>
                    <option class="form-control" value="admin">Admin</option>
                    <option class="form-control" value="editor">Editor</option>
                    <option class="form-control" value="moderator">Moderator</option>
                </select>
            </div>
            @error('status')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-gorup">
                <button type="submit" class="btn btn-success btn-block">Create Role</button>
            </div>
        </form>
    </div>
</div>
@endsection
