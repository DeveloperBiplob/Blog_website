@extends('layouts.backend_master')
@section('title', 'Admin')
@section('master-content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Admin Roles Manage</h4>
        <a href="{{ route('admin.admin.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New</a>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered" id="adminTable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>phone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $admin->name }}</td>
                        <td><img width="50px" src="{{ asset($admin->image) }}" alt=""></td>
                        <td>{{ $admin->phone }}</td>
                        <td>{{ $admin->role }}</td>
                        <td>{{ $admin->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                            @if($admin->status == 1)
                            <a href="{{ route('admin.role-action', $admin->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                            @else
                            <a href="{{ route('admin.role-action', $admin->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a> 
                            @endif

                            <a href="{{ route('admin.admin.edit', $admin->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>

                           <form action="{{ route('admin.admin.destroy', $admin->id) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick=" return confirm('Are you Sure Delete This Data?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                           </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
