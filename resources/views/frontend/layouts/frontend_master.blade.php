@extends('frontend.layouts.frontend_app')
@section('app-content')
<div class="container mt-5" style="min-height: 80vh">
    <div class="row">
        <div class="col-md-4 mt-3">
            <ul class="list-group">
                <li class="list-group-item active"><a href="" class="text-light">Dashboard</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Brookmarks</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Coments</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Profile</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Setting</a></li>
              </ul>
        </div>
        <div class="col-md-8 mt-3">
            @yield('master-content')
        </div>
    </div>
</div>
@endsection