@extends('layout.app')
@section('title', 'Profile')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title mb-0">{{$user->name}}'s Profile</h4>
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <form class="form theme-form" method="POST" action="{{ route('profile-store') }}">
                            @csrf
                            <div class="row mb-2">
                                <div class="profile-title">
                                    <div class="media"> <img class="img-70 rounded-circle" alt=""
                                            src="{{asset('/assets/images/dashboard/1.png')}}">
                                        <div class="media-body">
                                            <h3 class="mb-1 f-20 txt-primary">{{$user->name}}</h3>
                                            <p class="f-12">{{$user->email}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6 class="form-label">Bio</h6>
                                <input class="form-control" name="bio" value="{{old('bio')}}" placeholder="{{$user->bio}}">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email-Address</label>
                                <input class="form-control" placeholder="{{$user->email}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" value="password">
                            </div>
                            <!-- <div class="mb-3">
                                <label class="form-label">Website</label>
                                <input class="form-control" placeholder="http://Uplor .com">
                            </div> -->
                            <div class="form-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <form class="card" method="POST" action="{{ route('profile-store') }}">
                    @csrf
                    <div class="card-header pb-0">
                        <h4 class="card-title mb-0">Edit Profile</h4>
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input class="form-control" name="first_name" value="{{old('first_name')}}" placeholder="{{$user->first_name}}">

                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input class="form-control" name="last_name" value="{{old('last_name')}}" placeholder="{{$user->last_name}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input class="form-control" name="address" value="{{old('address')}}" placeholder="{{$user->address}}">                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <input class="form-control" name="city" value="{{old('city')}}" placeholder="{{$user->city}}">                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Postal Code</label>
                                    <input class="form-control" name="zip_code" value="{{old('zip_code')}}" placeholder="{{$user->zip_code}}">                                </div>
                                </div>
                            </div>

                            <div class="col-md-6" style="margin-left: 5%;">
                                <label class="form-label">Role</label>
                                <div class="col-xxl-4 col-md-6 col-sm-12">
                                    <div class="btn-group btn-group-square" role="group" aria-label="Basic example">
                                        <button class="btn btn-outline-primary active" type="button">Teacher </button>
                                        <button class="btn btn-outline-primary" type="button">Student </button>
                                    </div>
                                </div>
                            </div>
                            <br />
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
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