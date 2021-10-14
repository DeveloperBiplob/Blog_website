@extends('frontend.layouts.frontend_app')
@section('title', 'User Login')
@section('app-content')
    <div class="container">
        <div class="row">
            <div style="width:400px; display:block; margin:auto; padding:180px 0">
                <div class="login-box">
                    <!-- /.login-logo -->
                    <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg text-center">User Login</p>
                
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                            </div>
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                            </div>
                        </div>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                         @enderror
                        <div class="row">
                            <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                Remember Me
                                </label>
                            </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                        </form>
                
                        <div class="social-auth-links text-center mb-3">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                        </a>
                        <a href="{{ route('social-login', 'google') }}" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a>
                        <a href="{{ route('social-login', 'github') }}" class="btn btn-block btn-info">
                            <i class="fab fa-github mr-2"></i> Sign in Github
                        </a>
                        </div>
                        <!-- /.social-auth-links -->
                
                        <p class="mb-1">
                        <a href="">I forgot my password</a>
                        </p>
                        <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center">Register</a>
                        </p>
                    </div>
                    <!-- /.login-card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection