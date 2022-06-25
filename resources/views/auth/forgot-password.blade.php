@extends('layout.guest')
@section('title','Forget Password')
@section('content')
<section>
  <div class="container-fluid p-0">
    <div class="row m-0">
      <div class="col-12 p-0">
        <div class="login-card">
          <div class="login-main">
            <form method="POST" class="theme-form login-form" action="{{ route('password.email') }}">
              @csrf
              <h4>Create your account</h4>
              <h6>Enter your personal details to create account</h6>
              <div>
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                    <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}" required autofocus placeholder="test@gmail.com">
                  </div>
                </div>
              </div>
              <div>
                <button class="btn btn-primary btn-block" type="submit">Email Password Reset Link</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection