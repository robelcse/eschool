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
                            <h3>Select Subjects</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                                <li class="breadcrumb-item">Subjects</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="subject-wrapper section-py-space bg-white">
    @if(count($subjects) != 0)
    <div class="title">
        <h2>Choose Subjects To Continue</h2>
    </div>
    <div class="container">
        <form method="post" action="{{ route('insertSubjects') }}">
            @csrf
            <div class="row subject-block">
                @foreach($subjects as $subject)
                <div class="col-xl-2 col-md-4 col-6 sub">
                    <div class="subject-check position-relative">

                        @php
                        $temp = false
                        @endphp

                        @foreach($selected_subjects as $s_sub)

                        @if($subject->subject_id == $s_sub)
                        @php
                        $temp = true
                        @endphp
                        @break
                        @endif

                        @endforeach


                        @if($temp)
                        <input type="checkbox" id="1" name="subject[]" value="{{ $subject->subject_id }}" checked>
                        @else
                        <input type="checkbox" id="1" name="subject[]" value="{{ $subject->subject_id }}">
                        @endif


                        <label for="subject1" class="subject-box">
                            <div>
                                <div class="subject-image">
                                    <img class="w-100" src="{{asset('assets/images/frontend/Business_Landscape.webp') }}" alt="">
                                </div>
                                <h6>{{ $subject->name }}</h6>
                            </div>
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="next-btn text-center">
                        <!-- <a href="{{route('selectGrade')}}" class="btn btn-primary nextBtn eschool-large-btn" type="button">Go To Next Step</a> -->
                        <button class="btn btn-success nextBtn eschool-large-btn" type="submit">Go To Next Step</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @else
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="next-btn text-center">
                    <button class="btn btn-success nextBtn eschool-large-btn">Subject Not Available!!!</button>
                    <a href="{{route('landing')}}" class="btn btn-primary nextBtn eschool-large-btn" type="button">Go Back</a> 
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection

@section('footer-js')

<script type="text/javascript">
    $(document).ready(function() {

        let allSubject = $(".sub");
        $.each(allSubject, function(key, subject) {
            $(subject).on("click", function(event) {
                let toggleSubject = subject.firstElementChild.firstElementChild.checked
                subject.firstElementChild.firstElementChild.checked = !toggleSubject
            })
        });
    })
</script>
@endsection