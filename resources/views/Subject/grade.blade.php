@extends('layout.frontend')
@section('title','Choose Your Subject')
@section('content')
<section class="registration-breadcrumb">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Select Grade</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                                <li class="breadcrumb-item">Subjects</li>
                                <li class="breadcrumb-item">Grade</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="grade-wrapper core-feature section-py-space bg-white">
    <div class="title">
        <h2>Select Grade</h2>
    </div>
    <div class="custom-container">
        <div class="row feature-block">
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="grade-check position-relative">
                        <input type="checkbox" id="grade1">
                        <label for="grade1" class="feature-box d-block">
                            <div>
                                <div class="icon-wrraper">1</div>
                                <a href="{{ url('/student/my-subjects/3/grade/4/chapter') }}">
                                <h6>Grade: 01</h6>
                                </a>
                                
                            </div>
                        </label>
                    </div>
                </div>
            
            <div class="col-xl-2 col-md-4 col-6">
                <div class="grade-check position-relative">
                    <input type="checkbox" id="grade2">
                    <label for="grade2" class="feature-box d-block">
                        <div>
                            <div class="icon-wrraper">2</div>
                            <h6>Grade: 02</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="grade-check position-relative">
                    <input type="checkbox" id="grade3">
                    <label for="grade3" class="feature-box d-block">
                        <div>
                            <div class="icon-wrraper">3</div>
                            <h6>Grade: 03</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="grade-check position-relative">
                    <input type="checkbox" id="grade4">
                    <label for="grade4" class="feature-box d-block">
                        <div>
                            <div class="icon-wrraper">4</div>
                            <h6>Grade: 04</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="grade-check position-relative">
                    <input type="checkbox" id="grade5">
                    <label for="grade5" class="feature-box d-block">
                        <div>
                            <div class="icon-wrraper">5</div>
                            <h6>Grade: 05</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="grade-check position-relative">
                    <input type="checkbox" id="grade6">
                    <label for="grade6" class="feature-box d-block">
                        <div>
                            <div class="icon-wrraper">6</div>
                            <h6>Grade: 06</h6>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="next-btn text-center">
                    <button class="btn btn-primary nextBtn eschool-large-btn" type="button">Start Your Journey</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection