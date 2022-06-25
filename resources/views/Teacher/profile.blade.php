@extends('layout.app')
@section('title', 'Profile Create')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="edit-profile col-md-12">
        <div class="row">
            <div class="col-xl-12">
                <form class="card" action="{{ route('teacher.updateProfile') }}" method="post">
                    @csrf
                    <div class="card-header pb-0">
                        <h4 class="card-title mb-0">My Profile</h4>
                        <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-4 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input class="form-control" placeholder="First Name" type="text" name="first_name" value="{{ Auth::user()->first_name }}">
                                </div>
                                @if($errors->has('first_name'))
                                <label class="form-label text-danger" for="first-name">{{ $errors->first('first_name') }}</label>
                                @endif
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input class="form-control" placeholder="Last Name" type="text" name="last_name" value="{{ Auth::user()->last_name }}">
                                </div>
                                @if($errors->has('last_name'))
                                <label class="form-label text-danger" for="last-name">{{ $errors->first('last_name') }}</label>
                                @endif
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input class="form-control" placeholder="Your Email" type="email" name="email" value={{ Auth::user()->email}}>
                                </div>
                                @if($errors->has('email'))
                                <label class="form-label text-danger" for="email">{{ $errors->first('email') }}</label>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input class="form-control" placeholder="Present Address" type="text" name="address" value="{{ Auth::user()->address }}">
                                </div>
                                @if($errors->has('address'))
                                <label class="form-label text-danger" for="address">{{ $errors->first('address') }}</label>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <input class="form-control" placeholder="Your City" type="text" name="city" value="{{ Auth::user()->city }}">
                                </div>
                                @if($errors->has('city'))
                                <label class="form-label text-danger" for="city">{{ $errors->first('city') }}</label>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Zip Code</label>
                                    <input class="form-control" placeholder="Code" type="number" name="zip_code" value="{{ Auth::user()->zip_code }}">
                                </div>
                                @if($errors->has('zip_code'))
                                <label class="form-label text-danger" for="zip_code">{{ $errors->first('zip_code') }}</label>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input class="form-control" placeholder="Phone" type="text" name="phone" value="{{ Auth::user()->phone }}">
                                </div>
                                @if($errors->has('phone'))
                                <label class="form-label text-danger" for="phone">{{ $errors->first('phone') }}</label>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <div>
                                    <label class="form-label">About Me</label>
                                    <textarea class="form-control" rows="5" name="bio" placeholder="Short bio">{{ Auth::user()->bio }}</textarea>
                                </div>
                                @if($errors->has('bio'))
                                <label class="form-label text-danger" for="bio">{{ $errors->first('bio') }}</label>
                                @endif
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="form-group pull-right">
                                    <button class="btn btn-primary" type="submit">Update Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
</div>
@endsection
@section('script')
<script type="application/javascript">
    console.log('you can add your custom script here!')
    console.log($('a.nav-link.menu-title.active').offset())
</script>
@endsection