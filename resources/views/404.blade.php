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
                                <li class="breadcrumb-item">My(Student) Profile</li>
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
        <h2>404 not found!</h2>
    </div>
</section>
@endsection