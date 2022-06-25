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
                            <h3>My Profile</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                                <li class="breadcrumb-item">My Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="my-account-wrapper section-py-space bg-white">
    <div class="container">
        <div class="edit-profile">
            <div class="row justify-content-center">
                <div class="col-xl-8">

                    @if(Session::has('toast'))
                    <p class="alert alert-success" style="text-align: center;">{{ Session::get('toast') }}</p>
                    @endif

                    <form class="card" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">My Profile</h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="profile-title mb-4">
                                <div class="media">


                                    @if($user->image != NULL)
                                    <img class="img-70 rounded-circle" alt="" src="{{ url('files/students', $user->image ) }}" />
                                    @else
                                    <img class="img-70 rounded-circle" alt="" src="{{ asset('/assets/images/user/eschool.png') }}" />
                                    @endif
                                    <div class="media-body">
                                        <h3 class="mb-1 f-20 txt-primary">{{ $user->first_name.' '.$user->last_name }}</h3>
                                        <p class="f-12">Student</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input class="{{ $errors->has('first_name') ? 'form-control is-invalid':'form-control' }}" type="text" placeholder="First Name" value="{{ $user->first_name}}" name="first_name" />
                                        @if ($errors->has('first_name'))
                                        <label class="form-label text-danger" for="city">{{ $errors->first('first_name') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input class="{{ $errors->has('last_name') ? 'form-control is-invalid':'form-control' }}" type="text" placeholder="Last Name" value="{{ $user->last_name}}" name="last_name" />
                                        @if ($errors->has('last_name'))
                                        <label class="form-label text-danger" for="city">{{ $errors->first('last_name') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input class="{{ $errors->has('email') ? 'form-control is-invalid':'form-control' }}" value="{{ $user->email }}" type="email" placeholder="Email" name="email" />
                                        @if ($errors->has('email'))
                                        <label class="form-label text-danger" for="city">{{ $errors->first('email') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input class="{{ $errors->has('address') ? 'form-control is-invalid':'form-control' }}" type="text" placeholder="Home Address" value="{{ $user->address}}" name="address" />
                                        @if ($errors->has('address'))
                                        <label class="form-label text-danger" for="city">{{ $errors->first('address') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input class="{{ $errors->has('city') ? 'form-control is-invalid':'form-control' }}" value="{{ $user->city}}" type="text" placeholder="City" name="city" />
                                        @if ($errors->has('city'))
                                        <label class="form-label text-danger" for="city">{{ $errors->first('city') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Zip Code</label>
                                        <input class="{{ $errors->has('zip_code') ? 'form-control is-invalid':'form-control' }}" value="{{ $user->zip_code}}" type="number" placeholder="ZIP Code" name="zip_code" />
                                        @if ($errors->has('zip_code'))
                                        <label class="form-label text-danger" for="city">{{ $errors->first('zip_code') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <label class="form-label">About Me</label>
                                        <textarea class="{{ $errors->has('bio') ? 'form-control is-invalid':'form-control' }}" rows="5" placeholder="Enter About your description" name="bio">{{ $user->bio}}</textarea>
                                        @if ($errors->has('bio'))
                                        <label class="form-label text-danger" for="city">{{ $errors->first('bio') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6"><br/>
                                    <div>
                                        <input class="{{ $errors->has('image') ? 'form-control is-invalid':'form-control' }}" type="file" aria-label="file example" name="image" />
                                        @if ($errors->has('image'))
                                        <label class="form-label text-danger" for="city">{{ $errors->first('image') }}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection