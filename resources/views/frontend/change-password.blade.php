@extends('layout.frontend')
@section('title','Choose Your Subject')
@section('content')
<section class="registration-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Change Password</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                                <li class="breadcrumb-item">Change Password</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="my-account-wrapper change-password-wrapper section-py-space bg-white">
    <div class="container">
        <div class="edit-profile">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Change Password</h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                        @if(Session::has('error'))
                        <p style="color:red">{{ Session::get('error') }}</p>
                        @endif
                            <form method="post" action="{{ route('updatePassword') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Old Password</label>
                                    <input class="{{ $errors->has('old_password') ? 'form-control is-invalid':'form-control' }}" id="old_password" type="password" name="old_password" placeholder="Old Password" />
                                    @if ($errors->has('old_password'))
                                    <label class="form-label text-danger" for="city">{{ $errors->first('old_password') }}</label>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input class="{{ $errors->has('password') ? 'form-control is-invalid':'form-control' }}" id="password" type="password" name="password" placeholder="New Password" />
                                    @if ($errors->has('password'))
                                    <label class="form-label text-danger" for="city">{{ $errors->first('password') }}</label>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input class="{{ $errors->has('password') ? 'form-control is-invalid':'form-control' }}" id="confirm_password" type="password" name="password_confirmation" placeholder="Confirm Password" />
                                    @if ($errors->has('password_confirmation'))
                                    <label class="form-label text-danger" for="city">{{ $errors->first('password_confirmation') }}</label>
                                    @endif
                                </div>
                                <div class="form-footer">
                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection