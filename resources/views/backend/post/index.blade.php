<style>
    div#postTable_paginate {
        display: inline-block;
        float: right;
    }
    div#postTable_filter {
        display: inline-block;
        float: right;
    }
</style>
@extends('layouts.backend_master')
@section('title', 'Post')
@push('css')
<!-- Bootstrap Datatabel-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush
@section('master-content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Manage Posts</h4>
        <a href="{{ route('admin.post.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Post</a>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered" id="postTable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>View</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->author->name }}</td>
                        <td><img src="{{ asset($post->image) }}" alt="" width="100px"></td>
                        <td>{{ $post->view }}</td>
                        <td>{{ $post->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                            @if($post->status == 1)
                            <a href="{{ route('status-action', $post->slug) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                            @else
                            <a href="{{ route('status-action', $post->slug) }}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a> 
                            @endif

                            <a href="{{ route('admin.post.show',$post->slug) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            @can('update', $post)
                            <a href="{{ route('admin.post.edit', $post->slug) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            @endcan

                            @can('delete', $post)
                            <form action="{{ route('admin.post.destroy', $post->slug) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick=" return confirm('Are you Sure Delete This Data?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                               </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('script')
<!-- Bootstrap datatable-->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
@endpush
@push('script')
<script>
    $(document).ready( function () {
        $('#postTable').DataTable();
    } );
    </script>
@endpush

