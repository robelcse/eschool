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
                            <h3>Computer Science</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('mySubjects')}}">My Subjects</a></li>
                                <li class="breadcrumb-item">Computer Science</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="core-feature subject-wrapper section-py-space bg-white">
    <div class="custom-container">
        <div class="row justify-content-center">
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
        </div>
        <div class="row subject-block">
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{url('/student/my-subjects/3/grade/4/chapter/1/units')}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3 completed-chapter">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="check"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 01</h6>
                        <p class="m-0">Introduction to Computer.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3 completed-chapter">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="check"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 02</h6>
                        <p class="m-0">The Computer System Hardware.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3 completed-chapter">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="check"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 03</h6>
                        <p class="m-0">Computer Memory.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 04</h6>
                        <p class="m-0">Input and Output Devices.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 05</h6>
                        <p class="m-0">Data Representation.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 06</h6>
                        <p class="m-0">Central Processing Unit.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 07</h6>
                        <p class="m-0">Introduction to Computer.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 08</h6>
                        <p class="m-0">Input Devices.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 09</h6>
                        <p class="m-0">Memory.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 10</h6>
                        <p class="m-0">Introduction to Computer.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 11</h6>
                        <p class="m-0">Random Access Memory.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 12</h6>
                        <p class="m-0">Read Only Memory.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 13</h6>
                        <p class="m-0">Memory Units.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 14</h6>
                        <p class="m-0">Hardware & Software.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 15</h6>
                        <p class="m-0">Number System.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route('chapterLesson',[1,1])}}" class="chapter-box subject-box feature-box mb-25 d-flex p-3 gap-3">
                    <div class="icon-wrraper m-0 rounded-circle"><i data-feather="book-open"></i></div>
                    <div class="chapter-text text-start">
                        <h6>Chapter: 16</h6>
                        <p class="m-0">Number Conversion.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection


 