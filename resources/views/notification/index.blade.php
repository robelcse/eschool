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
                            <h3>My Marks</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                                <li class="breadcrumb-item">Notification</li>
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
            <div class="row">

                @if(count($notifications) > 0)

                @foreach($notifications as $notification)
                <div class="col-lg-4">
                    <div class="chapter-lessons-accordion subject-wise-marks">
                        <div class="subject-marks-units">
                            <div class="default-according style-1" id="accordionoc">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseicon{{$notification->id}}" aria-expanded="false"><i class="icofont icofont-read-book"></i>{{ $notification->title }}</button>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="collapseicon{{$notification->id}}" aria-labelledby="headingeight" data-bs-parent="#accordionoc">
                                        <div class="card-body">
                                            <ul class="chapter-units-marks">
                                                <li class="d-flex justify-content-between mb-2 pb-2">{{ $notification->message }}<span>10(15)</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-lg-12">
                     <p>Notification not available</p>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>
@endsection