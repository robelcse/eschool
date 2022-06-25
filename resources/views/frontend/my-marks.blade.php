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
                                <li class="breadcrumb-item">My Marks</li>
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
               @if(count($subjects) > 0)
               @foreach($subjects as $subject)
                <div class="col-lg-4">
                    <div class="chapter-lessons-accordion subject-wise-marks">
                        <div class="subject-total-marks d-flex align-items-center justify-content-between">
                            <h6 class="subject-name m-0">{{ $subject->name }}</h6>
                            <div class="total-marks"><i data-feather="award"></i>490 (Out of 500)</div>
                        </div>
                        @foreach($subject->chapters as $chapter)
                        <div class="subject-marks-units">
                            <div class="default-according style-1" id="accordionoc">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseicon" aria-expanded="false"><i class="icofont icofont-read-book"></i>{{ $chapter->name }}</button>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="collapseicon" aria-labelledby="headingeight" data-bs-parent="#accordionoc">
                                        <div class="card-body">
                                            <ul class="chapter-units-marks">
                                                @foreach($chapter->units as $unit)
                                                <li class="d-flex justify-content-between mb-2 pb-2"><span class="fw-bold">{{ $unit->name }}</span><span>
                                                      @php
                                                         $length_of_mark_arr =  count($unit->marks);
                                                      @endphp
                                                      
                                                {{ $length_of_mark_arr > 0 ? json_decode($unit->marks[0]->mark)[0]->total_mark.'('.json_decode($unit->marks[0]->mark)[0]->score.')' : 0 }} 
      
                                                </span></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
               @else
                    <p>You don't attend the any quize yet!</p>
               @endif
            </div>
        </div>
    </div>
</section>
@endsection