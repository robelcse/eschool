@extends('layout.app')
@section('title', 'Profile Create')
@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
    <div class="edit-profile col-md-12">
        <div class="row">
        <div class="col-xl-12">
            <form class="card">
            <div class="card-header pb-0">
                <h4 class="card-title mb-0">Create Profile</h4>
                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
                <div class="row">
                
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input class="form-control" type="email" placeholder="Email" value=''>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input class="form-control" type="text" placeholder="Company">
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input class="form-control" type="text" placeholder="Last Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input class="form-control" type="text" placeholder="Home Address">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select class="form-control btn-square">
                        <option value="0">--Select--</option>
                        <option value="1">Teacher</option>
                        <option value="2">Student</option>
                    </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">City</label>
                    <input class="form-control" type="text" placeholder="City">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="mb-3">
                    <label class="form-label">Postal Code</label>
                    <input class="form-control" type="number" placeholder="ZIP Code">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                    <label class="form-label">Country</label>
                    <select class="form-control btn-square">
                        <option value="0">--Select--</option>
                        <option value="1">Germany</option>
                        <option value="2">Canada</option>
                        <option value="3">Usa</option>
                        <option value="4">Aus</option>
                    </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div>
                    <label class="form-label">About Me</label>
                    <textarea class="form-control" rows="5" placeholder="Enter About your description"></textarea>
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
    <!-- Container-fluid Ends-->
</div>
@endsection
@section('script')
<script type="application/javascript">
    console.log('you can add your custom script here!')
    console.log($('a.nav-link.menu-title.active').offset())
</script>
@endsection