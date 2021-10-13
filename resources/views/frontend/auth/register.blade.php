@extends('frontend.layouts.frontend_app')
@section('title', 'User Login')
@section('app-content')
<div class="container">
  <div class="row">
      <div style="width:400px; display:block; margin:auto; padding:180px 0">
        <div class="register-box">
          <div class="card">
            <div class="card-body register-card-body">
              <p class="login-box-msg text-center">User Register</p>
        
              <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" id="registrationForm">
                  @csrf
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Full name" name="name">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
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
                  <input type="file" class="form-control" name="image">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                @error('image')
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
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Retype password" name="con-password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                @error('con-password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                      <label for="agreeTerms">
                       I agree to the <a href="#">terms</a>
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
        
              <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                  <i class="fab fa-facebook mr-2"></i>
                  Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                  <i class="fab fa-google-plus mr-2"></i>
                  Sign up using Google+
                </a>
              </div>
        
              <a href="{{ route('login') }}" class="text-center my-3">Allready Habe an Account? Login</a>
            </div>
            <!-- /.form-box -->
          </div><!-- /.card -->
        </div> 
     </div>
      </div>
  </div>
</div>
@endsection

@push('script')
    <script>
         $('#registrationForm').validate({
        rules: {
            name: {
                required: true
            },
            email :{
                required: true
            },
            image :{
                required: true
            },
            password :{
                required: true
            },
            con-password :{
                required: true
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        }
    });
    </script>
@endpush