@extends('frontend.layouts.frontend_master')
@section('title', 'Bookmarks')
@section('master-content')
    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Post Name</th>
                <th>View Post</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookmarks as $bookmark)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $bookmark->name }}</td>
                <td><a href="{{ route('single-post', $bookmark->slug) }}" class="btn btn-block btn-info"><i class="fa fa-eye"> View Post</i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection