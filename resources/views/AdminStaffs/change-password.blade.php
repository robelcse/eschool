@extends('layout.app')
@section('title', 'Change Password')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Change Password </h5>
            </div>
            <div class="card-body add-post">
                 <!-- @if(Session::has('error'))
                        <p style="color:red">{{ Session::get('error') }}</p>
                 @endif -->
                <form class="row needs-validation justify-content-center" method="POST" action="{{ route('admin.updatePassword') }}">
                    @csrf
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="validationCustom01">Old Password:</label>
                            <input class="{{ $errors->has('old_password') ? 'form-control is-invalid':'form-control' }}" type="password" id="old_password" name="old_password" value="{{old('old_password')}}" placeholder="Old Password">
                            @if ($errors->has('old_password'))
                            <label class="form-label text-danger" for="city">{{ $errors->first('old_password') }}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01">New Password:</label>
                            <input class="{{ $errors->has('password') ? 'form-control is-invalid':'form-control' }}" type="password" id="password" name="password" value="{{old('password')}}" placeholder="New Password">
                            @if ($errors->has('password'))
                            <label class="form-label text-danger" for="city">{{ $errors->first('password') }}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01">Confirm Password:</label>
                            <input class="{{ $errors->has('password_confirmation') ? 'form-control is-invalid':'form-control' }}" type="password" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Confirm Password">
                            @if ($errors->has('password_confirmation'))
                            <label class="form-label text-danger" for="city">{{ $errors->first('password_confirmation') }}</label>
                            @endif
                        </div>
                        <div class="form-gruop">
                            <div class="btn-showcase pull-right">
                                <button class="btn btn-primary" type="submit" style="margin-right: 0px;">Change Password</button>
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