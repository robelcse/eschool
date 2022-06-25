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
                            <h3>Select Grade</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                                <li class="breadcrumb-item">Subjects</li>
                                <li class="breadcrumb-item">Grade</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="grade-wrapper core-feature section-py-space bg-white">
    <div class="title">
        <h2>Select Your Grade</h2>
    </div>
    <div class="container">
        <form action="{{ route('updateGrade') }}" method="post">
            @csrf
            <div class="row feature-block">

                @for($i = 1; $i <=6; $i++) <div class="col-xl-2 col-md-4 col-6">
                    <div class="grade-check position-relative">
                        @php
                        $temp = false
                        @endphp

                        @foreach($selected_grades as $grade)

                        @if($grade == $i)
                        @php
                        $temp = true
                        @endphp
                        @break
                        @endif

                        @endforeach


                        @if($temp)
                        <input type="checkbox" name="grade[]" id="grade{{ $i }}" value="{{ $i }}" checked />
                        @else
                        <input type="checkbox" name="grade[]" id="grade{{ $i }}" value="{{ $i }}" />
                        @endif

                        <label for="grade{{$i}}" class="feature-box d-block">
                            <div>
                                <div class="icon-wrraper">{{ $i }}</div>
                                <h6>Grade: 0{{ $i }}</h6>
                            </div>
                        </label>
                    </div>
            </div>
            @endfor
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="next-btn text-center">
                <button class="btn btn-primary nextBtn eschool-large-btn" type="submit">Start Your Journey</button>
            </div>
        </div>
    </div>
    </form>
    </div>
</section>
@endsection