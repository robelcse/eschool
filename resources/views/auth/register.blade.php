@extends('layout.guest')
@section('title','Registration')
@section('content')
<section>
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-12 p-0">
        <div class="login-card">
          <form method="POST" class="theme-form login-form registration" action="{{ route('register') }}">
            @csrf
            <h4>Create your account</h4>
            <h6>Enter your personal details to create account</h6>
            <div class="form-group">
              <label for="name">First Name</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                <input class="{{ $errors->has('first_name') ? 'form-control is-invalid':'form-control' }}" type="text" name="first_name" value="{{old('first_name')}}" id="first_name" autofocus placeholder="First name">
              </div>
              @if($errors->has('first_name'))
              <label class="form-label text-danger" for="first-name">{{ $errors->first('first_name') }}</label>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Last Name</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                <input class="{{ $errors->has('last_name') ? 'form-control is-invalid':'form-control' }}" type="text" name="last_name" value="{{old('last_name')}}" id="name" autofocus placeholder="last name">
              </div>
              @if($errors->has('last_name'))
              <label class="form-label text-danger" for="last-name">{{ $errors->first('last_name') }}</label>
              @endif
            </div>
            <div class="form-group">
              <label for="email">Email Address</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                <input class="{{ $errors->has('email') ? 'form-control is-invalid':'form-control' }}" type="text" name="email" id="email" value="{{old('email')}}" autofocus placeholder="test@gmail.com">
              </div>
              @if($errors->has('email'))
              <label class="form-label text-danger" for="email">{{ $errors->first('email') }}</label>
              @endif
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-mobile"></i></span>
                <input class="{{ $errors->has('phone') ? 'form-control is-invalid':'form-control' }}" type="text" name="phone" id="phone" value="{{old('phone')}}" autofocus placeholder="">
              </div>
              @if($errors->has('phone'))
              <label class="form-label text-danger" for="phone">{{ $errors->first('phone') }}</label>
              @endif
            </div>
            <div class="form-group">
           
              <label for="">Role</label>
              <br>
              <input type="radio" id="student" checked name="role" value="3">
              <label for="student">Student</label><br>
              <input type="radio" id="teacher" name="role" value="2">
              <label for="teacher">Teacher</label><br>
             
              @if($errors->has('role'))
              <label class="form-label text-danger" for="role">{{ $errors->first('role') }}</label>
              @endif
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input id="password" class="{{ $errors->has('password') ? 'is-invalid form-control':'form-control' }}" value="{{old('password')}}" type="password" name="password" autocomplete="new-password" placeholder="*********">
                <!-- <div class="show-hide"><span class="show"></span></div> -->
              </div>
              @if($errors->has('password'))
              <label class="form-label text-danger" for="password">{{ $errors->first('password') }}</label>
              @endif
            </div>
            <div class="form-group">
              <label for="password_confirmation">Password</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input id="password_confirmation" class="{{ $errors->has('password_confirmation') ? 'is-invalid form-control':'form-control' }}" type="password" name="password_confirmation" autocomplete="new-password" placeholder="*********">
                <!-- <div class="show-hide"><span class="show"></span></div> -->
              </div>
              @if($errors->has('password_confirmation'))
              <label class="form-label text-danger" for="password">{{ $errors->first('password_confirmation') }}</label>
              @endif
            </div>

            <div class="form-group text-center">
              <button class="btn btn-primary btn-block d-inline" type="submit">Sign Up</button>
            </div>
            <p style="font-size: 12px;">Already have an account?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection