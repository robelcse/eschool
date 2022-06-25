@extends('layout.frontend')
@section('title', 'subject lists')
@section('content')



<section class="registration-breadcrumb">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> Subjects</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                                <li class="breadcrumb-item"> Subjects</li>
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
            @foreach ($subjects as $subject)
            <div class="col-xl-2 col-md-4 col-6">
                <a style="color: #087497;" href="{{ route('grade',$subject->subject_id) }}">
                    <div class="subject-check position-relative">
                        <label for="subject1" class="subject-box">
                            <div>
                                <div class="subject-image">
                                    <img class="w-100"
                                        src="{{asset('assets/images/frontend/Business_Landscape.webp') }}" alt="">
                                </div>
                                <h6>{{$subject->name}}</h6>
                            </div>
                        </label>
                    </div>
                </a>
            </div>
            @endforeach

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