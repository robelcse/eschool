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
                            <h3>My Subjects</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                                <li class="breadcrumb-item">My Subjects</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="subject-wrapper section-py-space bg-white">

    @if(count($mySubjects) > 0)
    <div class="title">
        <h2>Start Your Study</h2>
    </div>
    <div class="container">
        <div class="row subject-block my-subjects">
            @foreach($mySubjects as $subject)
            <div class="col-xl-3 col-md-3 col-6">
                <a href="{{ route('chapters', $subject->subject_id) }}" class="subject-box mb-25">
                    <div>
                        <div class="subject-image">
                            <img class="w-100" src="{{asset('assets/images/frontend/Business_Landscape.webp') }}" alt="">
                        </div>
                        <h6>{{ $subject->name }}</h6>
                        <!-- <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div> -->
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="next-btn text-center">
                    <button class="btn btn-success nextBtn eschool-large-btn">Subject not Available in your subject list!!!</button>
                    <a href="{{route('chooseSubject')}}" class="btn btn-primary nextBtn eschool-large-btn" type="button">Go Back</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection