@extends('layout.app')
@section('title', 'chapter Material create')
@section('content')
<!-- <style>
    table {
        border-collapse: separate;
        border-spacing: 0 1em;
        width: 100%;
    }

    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td {
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        font-size: 100%;
        vertical-align: baseline;
        background: transparent;
    }
</style> -->
<!-- Container-fluid starts-->
<div class="container-fluid">
    <section class="registration-breadcrumb">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-8">
                                <h3>My Subjects</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                                    <li class="breadcrumb-item"> Subjects</li>
                                    <li class="breadcrumb-item"> Grdes</li>
                                    <li class="breadcrumb-item"> Chapters</li>
                                    <li class="breadcrumb-item"> Units</li>
                                    <li class="breadcrumb-item"> Study Metarials</li>
                                </ol>
                            </div>
                            <div class="col-sm-2">

                            </div>
                            <div class="col-sm-2">

                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <div class="row">
        <div class="card">
            <div class="col">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h5>Study metarial</h5>

                    @php $array_of_approval_person = explode(",", Auth::user()->approve); @endphp
                    @if(((Auth::user()->role == 1 || Auth::user()->role == 2) && (Auth::user()->status == 3)) || count($array_of_approval_person) == 3)
                    <div class="card-header pb-4">
                        <a class="btn btn-success" href="{{ Auth::user()->role == 1 ? route('admin.metarial.create',[$subject_id, $grade_id, $chapter_id, $unit_id]):route('teacher.metarial.create',[$subject_id, $grade_id, $chapter_id, $unit_id]) }}">
                            <i class="fa fa-plus"></i> Add Metarial
                        </a>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sl</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Grade</th>
                                            <th scope="col" width="11%">Chapter</th>
                                            <th scope="col">Unit</th>
                                            <th scope="col" width="15%">Document tile</th>
                                            <th scope="col">Document</th>
                                            <th scope="col" width="11%">Video title</th>
                                            <th scope="col">video link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1 @endphp
                                        @foreach($study_metarials as $metarial)
                                        <tr>
                                            <td valign="middle">{{ $i }}</td>
                                            <td valign="middle">{{ $metarial->subject->name }}</td>
                                            <td valign="middle">{{ $metarial->grade->name }}</td>
                                            <td valign="middle">{{ $metarial->chapter->name }}</td>
                                            <td valign="middle">{{ $metarial->unit->name }}</td>
                                            <td valign="middle">{{ $metarial->document_title }}</td>
                                            <td valign="middle"><a target="_blank" href="{{ url('files/',$metarial->documents) }}"> <i class="fa fa-file-pdf-o" style="font-size:36px"></i></a></td>
                                            <td valign="middle">{{ $metarial->video_title }}</td>
                                            <td valign="middle"><a href="{{ $metarial->video_link }}" target="_blank">{{ $metarial->video_link }}</a></td>
                                        </tr>
                                        @php $i++ @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card p-4">
            <div class="card-header pb-4 d-flex justify-content-between align-items-center">
                <h5>Questions List</h5>
                @php $array_of_approval_person = explode(",", Auth::user()->approve); @endphp
                @if(((Auth::user()->role == 1 || Auth::user()->role == 2) && (Auth::user()->status == 3)) || count($array_of_approval_person) == 3)
                <div class="card-header pb-4">
                    <a class="btn btn-success" href="{{ Auth::user()->role == 1 ? route('question-create',[$subject_id, $grade_id, $chapter_id, $unit_id]):route('teacher.question-create',[$subject_id, $grade_id, $chapter_id, $unit_id]) }}">
                        <i class="fa fa-plus mr-2"></i> Add Question
                    </a>
                </div>
                @endif
            </div>
            <div class="row p-4">
                @foreach($questions as $question)

                <div class="col-md-6">
                    <div class="quiz-body">
                        <ul class="quiz-questions">
                            <li class="mb-5">
                                <div class="quiz-area">
                                    @php
                                    $question_number = 1
                                    @endphp
                                    <div class="quiz-ques-title quiz_ques_title mb-3">
                                        <h5>{{ $question->id }}. {{ $question->question }}</h5>
                                    </div>

                                    <div class="quiz-options custm_margn">
                                        <div class="radio radio-primary mb-2">

                                            @php
                                            $question_options = json_decode($question->options);
                                            @endphp

                                            @foreach($question_options as $option)

                                            <input type="radio" @if ($option==$question->answer) {{ 'checked' }} @endif id="{{ $option }}" name="an[{{ $question->id }}]" value="{{ $option  }}">
                                            <label for="{{ $option }}">{{ $option }}</label><br>

                                            @endforeach
                                        </div>
                                    </div>
                                    @php
                                    $question_number++
                                    @endphp
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
<!-- Container-fluid Ends-->
</div>
@endsection
@section('script')
<script type="application/javascript">
    $(document).ready(function() {
        $(".btn-success").click(function() {
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });
        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".hdtuto").remove();
        });
    });
    console.log('you can add your custom script here!')
    console.log($('a.nav-link.menu-title.active').offset())
</script>


@endsection