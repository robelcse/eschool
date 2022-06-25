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
                            <h3>{{ $subject->name }}</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="">My Subjects</a></li>
                                <li class="breadcrumb-item">{{ $subject->name }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="core-feature subject-wrapper section-py-space bg-white">

    @if(count($chapters) != 0)
    <div class="container">
        <!-- <div class="row justify-content-center">
            <div class="col-lg-6">
                <h6>Chapter Progression</h6>
            </div>
            <div class="col-lg-6 text-end">
                <p class="fw-bold m-0">30%</p>
            </div>
            <div class="col-lg-12">
                <div class="progress mb-5">
                    <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div> -->
        <div class="row subject-block">

            <!-- @foreach($chapters as $chapter)

            <div class="col-xl-3 col-md-4 col-6" >
                <a href="{{ route('chapterLesson',[$subject_id,$chapter->chapter_id]) }}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3 completed-chapter">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="check"></i></div>
                    <div class="chapter-text text-start">
                        <h6>{{ $chapter->name }}</h6>
                        <p class="m-0">Introduction to Computer.</p>
                    </div>
                </a>
            </div>

            @endforeach -->


            @foreach($chapters as $chapter)

            <div class="col-xl-3 col-md-4 col-6" >
                <a href="{{ route('chapterLesson',[$subject_id,$chapter->chapter_id]) }}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3 completed-chapter">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="check"></i></div>
                    <div class="chapter-text text-start">
                        <h6 data-toggle="tooltip" title="Introduction to Computer.">{{ $chapter->name }}</h6>
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
                    <button class="btn btn-success nextBtn eschool-large-btn">Chapter not available in this subject!!!</button>
                    <a href="{{route('mySubjects')}}" class="btn btn-primary nextBtn eschool-large-btn" type="button">Go Back</a> 
                </div>
            </div>
        </div>
    </div>
    @endif


</section>
@endsection


@section('footer-js')
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
@endsection