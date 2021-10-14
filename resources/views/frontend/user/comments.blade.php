@extends('frontend.layouts.frontend_master')
@section('title', 'Comments')
@section('master-content')
    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Post Title</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $comment->post->name }}</td>
                <td>{{ $comment->comment }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection