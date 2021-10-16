@extends('layouts.backend_master')
@section('title', 'Role Update')
@section('master-content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Update Role</h4>
        <a href="{{ route('admin.admin.index') }}" class="btn btn-success btn-sm"><i class="fa fa-angle-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $admin->name }}" id="name">
            </div>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $admin->email }}" id="email">
            </div>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">password</label>
                <input type="text" class="form-control" name="password" pl value="password" id="password">
            </div>
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $admin->phone }}" id="phone">
            </div>
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <img width="50px" src="{{ asset($admin->image) }}" alt="">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Status</label> <br>
                <input type="radio" class="" name="status" value="0" {{ $admin->status == 0 ? 'checked' : '' }} > Inactive <br>
                <input type="radio" class="" name="status" value="1" {{ $admin->status == 1 ? 'checked' : '' }}> Active
            </div>
            @error('status')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Role</label> <br>
                <select name="role" id="" class="form-control">
                    <option >Select a Role</option>
                    <option class="form-control" value="admin" @if($admin->role == 'admin') selected="selected" @endif >Admin</option>
                    <option class="form-control" value="editor" @if($admin->role == 'editor') selected="selected" @endif >Editor</option>
                    <option class="form-control" value="moderator" @if($admin->role == 'moderator') selected="selected" @endif >Moderator</option>
                </select>
            </div>
            @error('status')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-gorup">
                <button type="submit" class="btn btn-success btn-block">Update Role</button>
            </div>
        </form>
    </div>
</div>
@endsection
