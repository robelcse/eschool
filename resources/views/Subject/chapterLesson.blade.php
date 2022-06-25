@extends('layout.frontend')
@section('title','Choose Your Subject')
@section('content')
<section class="course-player-wrapper section-py-space bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div id="eschool-video-player" class="chapter-video-player">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ISv22NNL-aE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div id="eschool-pdf-viewer" class="eschool-pdf-box d-none">
                    <object data="" type="application/pdf" width="100%" height="600">
                        <iframe src="" width="100%" height="600">
                        <p>This browser does not support PDF!</p>
                        </iframe>
                    </object>
                </div>
                <div id="eschool-quiz-wrapper" class="eschool-quiz d-none">
                    <div class="quiz-header">
                        <div class="quiz-title">
                            <h6 class="text-white">Quiz</h6>
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
                    <div class="quiz-body">
                        <ul class="quiz-questions">
                            <li class="mb-5">
                                <div class="quiz-area">
                                    <div class="quiz-ques-title mb-3">1. She was really worried about her final exam, but in the end, she ______ it with no problems.</div>
                                    <div class="quiz-options">
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio1" type="radio" name="radio1" value="option1">
                                            <label for="radio1">got through</label>
                                        </div>
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio2" type="radio" name="radio1" value="option1">
                                            <label for="radio2">got over</label>
                                        </div>
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio3" type="radio" name="radio1" value="option1">
                                            <label for="radio3">got under</label>
                                        </div>
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio4" type="radio" name="radio1" value="option1">
                                            <label for="radio4">got on with</label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-5">
                                <div class="quiz-area">
                                    <div class="quiz-ques-title mb-3">2. She was really worried about her final exam, but in the end, she ______ it with no problems.</div>
                                    <div class="quiz-options">
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio21" type="radio" name="radio2" value="option1">
                                            <label for="radio21">got through</label>
                                        </div>
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio22" type="radio" name="radio2" value="option1">
                                            <label for="radio22">got over</label>
                                        </div>
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio23" type="radio" name="radio2" value="option1">
                                            <label for="radio23">got under</label>
                                        </div>
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio24" type="radio" name="radio2" value="option1">
                                            <label for="radio24">got on with</label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-5">
                                <div class="quiz-area">
                                    <div class="quiz-ques-title mb-3">3. She was really worried about her final exam, but in the end, she ______ it with no problems.</div>
                                    <div class="quiz-options">
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio31" type="radio" name="radio3" value="option1">
                                            <label for="radio31">got through</label>
                                        </div>
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio32" type="radio" name="radio3" value="option1">
                                            <label for="radio32">got over</label>
                                        </div>
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio33" type="radio" name="radio3" value="option1">
                                            <label for="radio33">got under</label>
                                        </div>
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio34" type="radio" name="radio3" value="option1">
                                            <label for="radio34">got on with</label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-5">
                                <div class="quiz-area">
                                    <div class="quiz-ques-title mb-3">4. She was really worried about her final exam, but in the end, she ______ it with no problems.</div>
                                    <div class="quiz-options">
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio41" type="radio" name="radio4" value="option1">
                                            <label for="radio41">got through</label>
                                        </div>
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio42" type="radio" name="radio4" value="option1">
                                            <label for="radio42">got over</label>
                                        </div>
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio43" type="radio" name="radio4" value="option1">
                                            <label for="radio43">got under</label>
                                        </div>
                                        <div class="radio radio-primary mb-2">
                                            <input id="radio44" type="radio" name="radio4" value="option1">
                                            <label for="radio44">got on with</label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center mb-4">
                            <button class="btn btn-primary eschool-large-btn" type="button">Complete Quiz</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="chapter-lessons-accordion">
                    <div class="progress mb-3">
                        <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="chapter-lessions-scroll">
                        <div class="default-according style-1" id="accordionoc">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseicon" aria-expanded="false"><i class="icofont icofont-read-book"></i> Unit 1</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseicon" aria-labelledby="headingeight" data-bs-parent="#accordionoc">
                                    <div class="card-body">
                                        <ul class="course-each-module">
                                            <li class="mb-3 lesson-video eschool-video-link completed" data-video-src="https://www.youtube.com/embed/MO4vEAu3hKE">
                                                <i class="fa fa-play-circle"></i>
                                                <span>Video</span>
                                                <i class="fa fa-check-circle"></i>
                                            </li>
                                            <li class="mb-3 lession-doc eschool-pdf-link" data-pdf-src="https://pdfjs-express.s3-us-west-2.amazonaws.com/docs/choosing-a-pdf-viewer.pdf">
                                                <i class="fa fa-file-text"></i>
                                                <span>Note </span>
                                            </li>
                                            <li class="lession-quiz eschool-quiz-item completed" data-quiz-id="124">
                                                <i class="fa fa-question-circle"></i>
                                                <span>Quiz</span>
                                                <i class="fa fa-check-circle"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseicon1" aria-expanded="false"><i class="icofont icofont-read-book"></i> Unit :<span>2</span></button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseicon1" aria-labelledby="headingeight" data-bs-parent="#accordionoc">
                                    <div class="card-body">
                                        <ul class="course-each-module">
                                            <li class="mb-3 lesson-video eschool-video-link" data-video-src="https://www.youtube.com/embed/MO4vEAu3hKE">
                                                <i class="fa fa-play-circle"></i>
                                                <span>Video</span>
                                                <i class="fa fa-check-circle"></i>
                                            </li>
                                            <li class="mb-3 lession-doc eschool-pdf-link" data-pdf-src="https://pdfjs-express.s3-us-west-2.amazonaws.com/docs/choosing-a-pdf-viewer.pdf">
                                                <i class="fa fa-file-text"></i>
                                                <span>Note </span>
                                            </li>
                                            <li class="lession-quiz eschool-quiz-item" data-quiz-id="124">
                                                <i class="fa fa-question-circle"></i>
                                                <span>Quiz</span>
                                                <i class="fa fa-check-circle"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="false" aria-controls="collapseicon2"><i class="icofont icofont-read-book"></i> Unit  :<span>3</span></button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseicon2" data-bs-parent="#accordionoc">
                                    <div class="card-body">
                                        <ul class="course-each-module">
                                            <li class="mb-3 lesson-video eschool-video-link" data-video-src="https://www.youtube.com/embed/MO4vEAu3hKE">
                                                <i class="fa fa-play-circle"></i>
                                                <span>Video</span>
                                                <i class="fa fa-check-circle"></i>
                                            </li>
                                            <li class="mb-3 lession-doc eschool-pdf-link" data-pdf-src="https://pdfjs-express.s3-us-west-2.amazonaws.com/docs/choosing-a-pdf-viewer.pdf">
                                                <i class="fa fa-file-text"></i>
                                                <span>Note </span>
                                            </li>
                                            <li class="lession-quiz eschool-quiz-item" data-quiz-id="124">
                                                <i class="fa fa-question-circle"></i>
                                                <span>Quiz</span>
                                                <i class="fa fa-check-circle"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    
                            
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
        //video link
        $('.eschool-video-link').click(function(){
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
        $('.eschool-pdf-link').click(function(){
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
        $('.eschool-quiz-item').click(function(){
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