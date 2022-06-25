@extends('layout.guest')
@section('title','Login')
@section('content')
<div class="col-12">
  <div class="login-card">

    <form class="theme-form login-form" method="POST" action="{{ route('login') }}">
      @csrf
      <h4>Login</h4>
      <h6>Welcome back! Log in to your account.</h6>
      {{session('status')}}
      @if(Session::has('message'))
      <p class="alert alert-danger">{{ Session::get('message') }}</p><br /><br />
      @endif

      <div class="form-group">
        <label>Email Address</label>
        <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
          <input class="{{ $errors->has('email') ? 'form-control is-invalid':'form-control' }}" type="text" name="email" placeholder="jhondoe@gmail.com" />
        </div>
        @if ($errors->has('email'))
        <label class="form-label text-danger" for="email">{{ $errors->first('email') }}</label>
        @endif
      </div>
      <div class="form-group">
        <label>Password</label>
        <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
          <input class="{{ $errors->has('password') ? 'form-control is-invalid':'form-control' }}" id="password" type="password" name="password" autocomplete="current-password" placeholder="**********">
          <!-- <div class="show-hide"><span class="show"></span></div> -->
        </div>
        @if ($errors->has('password'))
        <label class="form-label text-danger" for="password">{{ $errors->first('password') }}</label>
        @endif
      </div>
      <div class="form-group">
        <div class="checkbox">
          <input id="checkbox1" type="checkbox" name="remember">

          <label for="checkbox1">Remember password</label>
        </div>
        @if (Route::has('password.request'))

        <a class="link" href="{{ route('password.request') }}">Forgot password?</a>
        @endif

      </div>
      <div class="form-group text-center">
        <button class="btn btn-primary btn-block d-inline" type="submit">Log in</button>
      </div>
      <p style="font-size: 12px;">Don't have account?<a class="ms-2" href="{{ route('register') }}">Sign Up</a></p>
    </form>
  </div>
</div>
@endsection