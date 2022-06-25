@extends('layout.frontend')
@section('title','Choose Your Subject')
@section('content')
<section class="course-player-wrapper section-py-space bg-white">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Subjects</a></li>
                    <li class="breadcrumb-item"><a href="#">My Subjects</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ $subject->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $chapter->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    @if(count($units) != 0)
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div id="eschool-video-player" class="chapter-video-player">
                    <iframe id="video_frame" width="760" height="515" src="{{ $units[0]->metarial !=NULL ?  $units[0]->metarial->video_link:'' }}" title="{{ $units[0]->description }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div id="eschool-pdf-viewer" class="eschool-pdf-box d-none">
                    <object data="" type="application/pdf" width="100%" height="600">
                        <iframe src="" width="100%" height="600">
                            <p>This browser does not support PDF!</p>
                        </iframe>
                    </object>
                </div>
                <div id="eschool-quiz-wrapper" class="d-none">
                    @foreach($units as $unit)
                    <div class="eschool-quiz" id="{{ $unit->unit_id }}">
                        <div class="quiz-header" id="{{ $unit->unit_id }}">
                            <div class="quiz-title">
                                <h6 class="text-white">{{ $unit->description }}</h6>
                                <div class="quiz-action">
                                    <button class="btn btn-light" type="button">Complete Quiz</button>
                                    <div class="quiz-timer text-white">
                                        <i class="icofont icofont-wall-clock"></i>
                                        <span id="quiz-time-count">02:50</span>
                                    </div>
                                </div>
                            </div>
                            <div class="quiz-progress">
                                <div class="progress mt-3">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <!--start quize-->
                        <div class="d-none" id="startQuizeSection{{ $unit->unit_id }}">
                            <div class="quiz-result d-flex justify-content-center text-center mt-5 mb-5">
                                <div class="result-item">
                                    <div class="result-icon">
                                        <i data-feather="star"></i>
                                    </div>
                                    <h5 id="toalQuestionOfQuize{{ $unit->unit_id }}">5</h5>
                                    <p>Total question</p>
                                </div>

                                <!--Or Please use this for Final Score Failed-->
                                <div class="result-item final-score-fail">
                                    <div class="result-icon">
                                        <i data-feather="x"></i>
                                    </div>
                                    <h5>Pass Mark</h5>
                                    <p>80%</p>
                                </div>
                            </div>
                            <div class="text-center mb-4">
                                <button class="startQuize btn btn-primary" data-subject={{ $unit->subject_id }} data-chapter={{ $unit->chapter_id }} data-id="{{ $unit->unit_id }}" class="btn btn-primary eschool-large-btn" type="button">Start Quize</button>
                            </div>
                        </div>
                        <!--//start quize-->
                        <!--Quiz result part-->
                        <div class="d-none" id="result{{$unit->unit_id}}">
                            <div class="quiz-result d-flex justify-content-center text-center mt-5 mb-5">
                                <div class="result-item">
                                    <div class="result-icon">
                                        <i data-feather="star"></i>
                                    </div>
                                    <h4 id="score{{$unit->unit_id}}">0/5</h4>
                                    <p>Your Score</p>
                                </div>
                                <div class="result-item spent-time">
                                    <div class="result-icon">
                                        <i data-feather="clock"></i>
                                    </div>
                                    <h4 id="timeSpendForQuize{{$unit->unit_id}}">02:30</h4>
                                    <p>Time Spent</p>
                                </div>
                                <!--Or Please use this for Final Score Failed-->
                                <div class="result-item final-score-fail">
                                    <div class="result-icon">
                                        <i data-feather="x"></i>
                                    </div>
                                    <h4 id="quizeStatus{{$unit->unit_id}}">Failed</h4>
                                    <p>Your Result</p>
                                </div>
                            </div>
                            <div class="text-center mb-4">
                                <button class="btn btn-primary eschool-large-btn tryAgain" data-unit="{{ $unit->unit_id }}" data-subject="{{ $unit->subject_id }}" data-chapter="{{ $unit->chapter_id }}" type="button">Try Again</button>
                            </div>
                        </div>
                        <!--End Quiz result part-->

                        <div class="d-none quiz-body" id="quizBody{{$unit->unit_id}}">
                            <ul class="quiz-questions">
                                <li class="mb-5">
                                    <div class="quiz-area">
                                        @php
                                        $question_number = 1
                                        @endphp
                                        @foreach($unit->questions as $single_question)
                                        <div class="quiz-ques-title mb-3">{{ $question_number }}.
                                            {{ $single_question->question }}
                                        </div>
                                        <div class="quiz-options">
                                            <div class="radio radio-primary mb-2">
                                                @php
                                                $question_options = json_decode($single_question->options);
                                                $alphabet = ['0','A','B','C','D'];
                                                $x = 1;
                                                @endphp

                                                @foreach($question_options as $option)

                                                <div class="d-flex">
                                                    {{ $alphabet[$x]; }}.<input type="radio" id="{{ $option }}" name="an[{{ $single_question->id }}]" value="{{ $single_question->answer }}" class="question_ans" data-subject={{ $single_question->subject_id }} data-chapter={{ $single_question->chapter_id }} data-unit={{ $single_question->unit_id }} data-question={{ $single_question->id }} data-answer="{{ $option }}" data-user={{ $single_question->user_id }}>
                                                    <label for="{{ $option }}">{{ $option }}</label><br>
                                                </div>

                                                @php $x++; @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                        @php
                                        $question_number++
                                        @endphp
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center mb-4">
                                <button class="btn btn-primary eschool-large-btn completeQuize" type="button" data-id="{{ $unit->unit_id }}" data-subject="{{ $unit->subject_id }}" data-chapter="{{ $unit->chapter_id }}">Complete Quiz</button>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="chapter-lessons-accordion">
                    <!-- <div class="progress mb-3">
                        <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 80%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    <div class="chapter-lessions-scroll">
                        <div class="default-according style-1" id="accordionoc">
                            @php $quize_number = 1 @endphp
                            @foreach($units as $unit)
                            <div class="card" id="card{{$unit->unit_id}}">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button id="unit_btn" class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseicon{{ $unit->unit_id }}" aria-expanded="false" aria-controls="collapseicon{{ $unit->unit_id }}"><i class="icofont icofont-read-book"></i> {{ $unit->name }}</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseicon{{ $unit->unit_id }}" data-bs-parent="#accordionoc">
                                    <div class="card-body">
                                        <ul class="course-each-module">
                                            <li id="lession_video" class="mb-3 lesson-video eschool-video-link" data-video-src="{{ $unit->metarial !=NULL ?  $unit->metarial->video_link:'' }}">
                                                <i class="fa fa-play-circle"></i>
                                                <span>Video {{ $quize_number }}: {{ $unit->metarial !=NULL ?  $unit->metarial->video_title:'' }}</span>
                                                <i class="fa fa-check-circle"></i>
                                            </li>
                                            <li class="mb-3 lession-doc eschool-pdf-link" data-pdf-src="{{  $unit->metarial !=NULL ?  $unit->metarial->documents:'' }}">
                                                <i class="fa fa-file-text"></i>
                                                <span>{{ $unit->metarial !=NULL ?  $unit->metarial->document_title:'' }}</span>
                                            </li>
                                            <li class="lession-quiz eschool-quiz-item" id="{{ $unit->unit_id }}" data-quiz-id="124" data-id="{{ $unit->unit_id }}" data-subject="{{ $unit->subject_id }}" data-chapter="{{ $unit->chapter_id }}">
                                                <i class="fa fa-question-circle"></i>
                                                <span>{{ $unit->description }}</span>
                                                <i class="fa fa-check-circle"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @php $quize_number++ @endphp
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else
    <div class="container" style="min-height: 300px;margin-top:200px">
        <div class="row">
            <div class="col-lg-12">
                <div class="next-btn text-center">
                    <button class="btn btn-success nextBtn eschool-large-btn">Lession not available in this chapter!!!</button>
                    <a href="{{route('chapters',$subject_id)}}" class="btn btn-primary nextBtn eschool-large-btn" type="button">Go Back</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection

@section('footer-js')

<script>
    $(document).ready(function() {
        //script for quize management
        let eSchoolQuize = $(".eschool-quiz");
        let lessionQuize = $(".lession-quiz");
        $.each(lessionQuize, function(key, quize) {
            $(quize).on("click", function(event) {
                let unitId = event.target.parentElement.id
                for (var i = 0; i < eSchoolQuize.length; i++) {
                    if (eSchoolQuize[i].id != unitId) {
                        eSchoolQuize[i].style.display = 'none'
                    } else {
                        eSchoolQuize[i].style.display = 'block'
                    }
                }

            })
        });
    });
</script>
<script>
    $(document).ready(function() {
        //video link
        $('.eschool-video-link').click(function() {
            $(this).addClass('active');
            $('.eschool-pdf-link').removeClass('active');
            $('.eschool-quiz-item').removeClass('active');
            //remove pdf
            $('#eschool-pdf-viewer').addClass('d-none');
            $('#eschool-pdf-viewer object').attr('data', '');
            $('#eschool-pdf-viewer iframe').attr('src', '');
            //remove Quiz
            $('#eschool-quiz-wrapper').addClass('d-none');
            //Add video
            var videoSrc = $(this).attr('data-video-src');
            $('#eschool-video-player').removeClass('d-none');
            $('#eschool-video-player iframe').attr('src', videoSrc);
        });
        //pdf
        $('.eschool-pdf-link').click(function() {
            $(this).addClass('active');
            $('.eschool-video-link').removeClass('active');
            $('.eschool-quiz-item').removeClass('active');
            //remove video
            $('#eschool-video-player iframe').attr('src', '');
            $('#eschool-video-player').addClass('d-none');
            //remove Quiz
            $('#eschool-quiz-wrapper').addClass('d-none');
            //show pdf
            var pdfSrc = $(this).attr('data-pdf-src');
            var baseUrl = window.location.origin;
            var pdfLink = baseUrl + '/files//' + pdfSrc;

            $('#eschool-pdf-viewer').removeClass('d-none');
            $('#eschool-pdf-viewer object').attr('data', pdfSrc);
            $('#eschool-pdf-viewer iframe').attr('src', pdfLink);
        });
        //Quiz
        $('.eschool-quiz-item').click(function() {
            $(this).addClass('active');
            $('.eschool-video-link').removeClass('active');
            $('.eschool-pdf-link').removeClass('active');
            //remove video
            $('#eschool-video-player iframe').attr('src', '');
            $('#eschool-video-player').addClass('d-none');
            //remove pdf
            $('#eschool-pdf-viewer').addClass('d-none');
            $('#eschool-pdf-viewer object').attr('data', '');
            $('#eschool-pdf-viewer iframe').attr('src', '');
            //show quiz
            var quizId = $(this).attr('data-quiz-id');
            $('#eschool-quiz-wrapper').removeClass('d-none');
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('.startQuize').on('click', function(event) {

            var subjectId = $(this).data("subject")
            var chapterId = $(this).data("chapter")
            var unitId = $(this).data("id")

            $.ajax({
                method: 'post',
                url: "{{ route('startQuize') }}",
                data: {
                    subjectId,
                    chapterId,
                    unitId,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        $("#startQuizeSection" + unitId).addClass("d-none")
                        $("#quizBody" + unitId).removeClass("d-none")
                    } else {
                        // alert('You can not attend the quize now!Please contact with your teacher');
                        toastr.options.closeButton = true;
                        toastr.options.progressBar = true;
                        toastr.error('You can not attend the quize now! Please contact with your teacher', 'Error')
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        $('.completeQuize').on('click', function(event) {

            var subjectId = $(this).data("subject");
            var chapterId = $(this).data("chapter");
            var unitId = $(this).data("id");

            $("#result" + unitId).removeClass("d-none")
            $("#quizBody" + unitId).addClass("d-none")

            $.ajax({
                type: 'get',
                url: "{{ route('completeQuize') }}",
                data: {
                    subjectId,
                    chapterId,
                    unitId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                    $("#quizeStatus" + unitId).text(data[0]);
                    $("#score" + unitId).text(data[2] + '/' + data[1]);
                    $("#timeSpendForQuize" + unitId).text(data[3]);
                    //uncheck all readio button after complete the quiz
                    $(".question_ans").prop('checked', false);
                }
            });
        });

        $('.lession-quiz').on('click', function(event) {
            var unitId = $(this).data("id");
            var subjectId = $(this).data("subject");
            var chapterId = $(this).data("chapter");

            $("#startQuizeSection" + unitId).removeClass("d-none");
            $("#quizBody" + unitId).addClass("d-none");
            $("#result" + unitId).addClass("d-none");

            $.ajax({
                type: 'get',
                url: "{{ route('totalQuestionOfQuize') }}",
                data: {
                    subjectId,
                    chapterId,
                    unitId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // console.log(response);
                    $("#toalQuestionOfQuize" + unitId).text(response);
                },
                error: function(response) {
                    //console.log(response);
                }
            });

        });
    });
</script>

<script>
    $(document).ready(function() {
        $(".question_ans").on('click', function(event) {

            var subjectId = $(this).data("subject");
            var chapterId = $(this).data("chapter");
            var unitId = $(this).data("unit");
            var userId = $(this).data("user");

            var question = $(this).data("question");
            var answer = $(this).data("answer");
            var correctAns = $(this).val();

            // console.log('Your answer = '+ans);
            // console.log('Correct answer = '+correctAns);

            $.ajax({
                type: 'post',
                url: '/my-courses/quize-submit',
                data: {
                    subjectId,
                    chapterId,
                    unitId,
                    userId,
                    question,
                    answer,
                    correctAns
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // console.log(data);
                }
            });
        })
    });
</script>

<script>
    $(document).ready(function() {
        $(".tryAgain").on("click", function(event) {
            var subjectId = $(this).data("subject");
            var chapterId = $(this).data("chapter");
            var unitId = $(this).data("unit");

            $.ajax({
                type: "get",
                url: "{{ route('deleteQuize') }}",
                data: {
                    subjectId,
                    chapterId,
                    unitId
                },
                success: function(response) {
                     console.log(response);
                    if (response.status == 200) {
                        //uncheck all readio button after complete the quiz
                        $(".question_ans").prop('checked', false);
                        // console.log(response);
                        $("#result" + unitId).addClass("d-none")
                        $("#quizBody" + unitId).removeClass("d-none")
                    } else {
                        toastr.options.closeButton = true;
                        toastr.options.progressBar = true;
                        toastr.error('You can not attend the quize now! Please contact with your teacher', 'Error')
                    }

                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>

@endsection