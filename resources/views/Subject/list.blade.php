@extends('layout.frontend')
@section('title', 'my subjects')
@section('content')

<section class="registration-breadcrumb">
    <div class="custom-container">
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
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="title">
        <h2>Choose Subjects To Continue</h2>
    </div>
    <div class="custom-container">
        <div class="row subject-block">


            <div class="col-xl-2 col-md-4 col-6">
                <a href="{{ route('grade',3) }}">
                    <div class="subject-check position-relative">

                        <label for="subject1" class="subject-box">
                            <div>
                                <div class="subject-image">
                                    <img class="w-100"
                                        src="{{asset('assets/images/frontend/Business_Landscape.webp') }}" alt="">
                                </div>
                                <h6>Bangla</h6>
                            </div>
                        </label>
                    </div>
                </a>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject2" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100"
                                    src="{{asset('assets/images/frontend/Enigineering_Landscape.webp') }}" alt="">
                            </div>
                            <h6>English</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject3" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100" src="{{asset('assets/images/frontend/Humanities2_Landscape.webp') }}"
                                    alt="">
                            </div>
                            <h6>Maths</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject4" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100" src="{{asset('assets/images/frontend/Huminities_Landscape.webp') }}"
                                    alt="">
                            </div>
                            <h6>Science</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject5" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100" src="{{asset('assets/images/frontend/Medical_Landscape.webp') }}"
                                    alt="">
                            </div>
                            <h6>Social Sciences</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject6" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100" src="{{asset('assets/images/frontend/Medical2_Landscape.webp') }}"
                                    alt="">
                            </div>
                            <h6>Physical Education</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject7" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100" src="{{asset('assets/images/frontend/Science_Landscape.webp') }}"
                                    alt="">
                            </div>
                            <h6>Computer Basics</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject8" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100" src="{{asset('assets/images/frontend/Business_Landscape.webp') }}"
                                    alt="">
                            </div>
                            <h6>Bangla</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject9" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100"
                                    src="{{asset('assets/images/frontend/Enigineering_Landscape.webp') }}" alt="">
                            </div>
                            <h6>English</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject10" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100" src="{{asset('assets/images/frontend/Humanities2_Landscape.webp') }}"
                                    alt="">
                            </div>
                            <h6>Maths</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject11" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100" src="{{asset('assets/images/frontend/Huminities_Landscape.webp') }}"
                                    alt="">
                            </div>
                            <h6>Science</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject12" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100" src="{{asset('assets/images/frontend/Medical_Landscape.webp') }}"
                                    alt="">
                            </div>
                            <h6>Social Sciences</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject13" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100" src="{{asset('assets/images/frontend/Medical2_Landscape.webp') }}"
                                    alt="">
                            </div>
                            <h6>Physical Education</h6>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="subject-check position-relative">

                    <label for="subject14" class="subject-box">
                        <div>
                            <div class="subject-image">
                                <img class="w-100" src="{{asset('assets/images/frontend/Science_Landscape.webp') }}"
                                    alt="">
                            </div>
                            <h6>Computer Basics</h6>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="next-btn text-center">
                    <a href="{{route('selectGrade')}}" class="btn btn-primary nextBtn eschool-large-btn"
                        type="button">Go To Next Step</a>
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
console.log('you can add your custom script here!')
console.log($('a.nav-link.menu-title.active').offset())
</script>
@endsection