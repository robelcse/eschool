@extends('layout.frontend')
@section('title','Choose Your Subject')
@section('content')
<section class="course-player-wrapper section-py-space bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div id="eschool-video-player" class="chapter-video-player">
                    @php
                    $temp = 0
                    @endphp
                    @foreach($units as $unit)
                    @if($temp ==0)
                    <iframe width="760" height="515" src="{{ $unit->metarial !=NULL ?  $unit->metarial->video_link:'' }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @else
                    @break
                    @endif
                    @php
                    $temp++
                    @endphp

                    @endforeach
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

                        <!--Quiz result part-->
                        <div class="quiz-result d-flex justify-content-center text-center mt-5 mb-5">
                            <div class="result-item">
                                <div class="result-icon">
                                    <i data-feather="star"></i>
                                </div>
                                <h4>0/5</h4>
                                <p>Your Score</p>
                            </div>
                            <div class="result-item spent-time">
                                <div class="result-icon">
                                    <i data-feather="clock"></i>
                                </div>
                                <h4>02:30</h4>
                                <p>Time Spent</p>
                            </div>

                            <!--Please use this for Final Score Passed-->
                            <!-- <div class="result-item final-score-pass">
                                <div class="result-icon">
                                    <i data-feather="check"></i>
                                </div>
                                <h4>Passed</h4>
                                <p>Your Result</p>
                            </div> -->

                            <!--Or Please use this for Final Score Failed-->
                            <div class="result-item final-score-fail">
                                <div class="result-icon">
                                    <i data-feather="x"></i>
                                </div>
                                <h4>Failed</h4>
                                <p>Your Result</p>
                            </div>
                        </div>
                        <div class="text-center mb-4">
                            <button class="btn btn-primary eschool-large-btn" type="button">Try Again</button>
                        </div>
                        <!--End Quiz result part-->

                        <div class="quiz-body">
                            <ul class="quiz-questions">
                                <li class="mb-5">
                                    <div class="quiz-area">
                                        @php
                                        $question_number = 1
                                        @endphp
                                        @foreach($unit->questions as $single_question)
                                        <div class="quiz-ques-title mb-3">{{ $question_number }}. {{ $single_question->question }}</div>

                                        <div class="quiz-options">
                                            <div class="radio radio-primary mb-2">

                                                @php
                                                $question_options = explode (",",$single_question->options);
                                                @endphp

                                                @foreach($question_options as $option)
                                                <input id="radio1" type="radio" name="radio1" value="option1">
                                                <label for="radio1">{{ $option }}</label>
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
                                <button class="btn btn-primary eschool-large-btn" type="button">Complete Quiz</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="col-lg-4">
                <div class="chapter-lessons-accordion">
                    <div class="progress mb-3">
                        <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="chapter-lessions-scroll">
                        <div class="default-according style-1" id="accordionoc">

                            @php
                            $quize_number = 1
                            @endphp

                            @foreach($units as $unit)
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseicon{{ $unit->unit_id }}" aria-expanded="false" aria-controls="collapseicon{{ $unit->unit_id }}"><i class="icofont icofont-read-book"></i> {{ $unit->name }}</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseicon{{ $unit->unit_id }}" data-bs-parent="#accordionoc">
                                    <div class="card-body">
                                        <ul class="course-each-module">
                                            <li class="mb-3 lesson-video eschool-video-link" data-video-src="{{ $unit->metarial !=NULL ?  $unit->metarial->video_link:'' }}">
                                                <i class="fa fa-play-circle"></i>
                                                <span>Video {{ $quize_number }}: {{  $unit->metarial !=NULL ?  $unit->metarial->video_title:'' }}</span>
                                                <i class="fa fa-check-circle"></i>
                                            </li>
                                            <li class="mb-3 lession-doc eschool-pdf-link" data-pdf-src="{{  $unit->metarial !=NULL ?  $unit->metarial->documents:'' }}">
                                                <i class="fa fa-file-text"></i>
                                                <span>{{  $unit->metarial !=NULL ?  $unit->metarial->document_title:'' }}</span>
                                            </li>
                                            <li class="lession-quiz eschool-quiz-item" id="{{ $unit->unit_id }}" data-quiz-id="124">
                                                <i class="fa fa-question-circle"></i>
                                                <span>{{ $unit->description }}</span>
                                                <i class="fa fa-check-circle"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            @php
                            $quize_number++
                            @endphp
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer-js')

<script type="text/javascript">
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
            $('#eschool-pdf-viewer').removeClass('d-none');
            $('#eschool-pdf-viewer object').attr('data', pdfSrc);
            $('#eschool-pdf-viewer iframe').attr('src', pdfSrc);
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
@endsection