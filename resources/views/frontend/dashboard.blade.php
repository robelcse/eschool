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
              <h3>My Dashboard</h3>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-py-space bg-white pb-0">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-xl-3 col-lg-6">
        <div class="card o-hidden border-0">
          <div class="bg-primary b-r-4 card-body">
            <div class="media static-top-widget">
              <div class="align-self-center text-center"><i data-feather="book"></i></div>
              <div class="media-body"><span class="m-0">Enrolled Subject</span>
                <h4 class="mb-0 counter">
                  @if(count($selected_subjects) < 9) 0{{count($selected_subjects)}} @else {{ count($selected_subjects) }} @endif </h4><i class="icon-bg" data-feather="book"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 col-lg-6">
        <div class="card o-hidden border-0">
          <div class="bg-primary b-r-4 card-body">
            <div class="media static-top-widget">
              <div class="align-self-center text-center"><i data-feather="book-open"></i></div>
              <div class="media-body"><span class="m-0">Complete Chapter</span>
                <h4 class="mb-0 counter">20</h4><i class="icon-bg" data-feather="book-open"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 col-lg-6">
        <div class="card o-hidden border-0">
          <div class="bg-primary b-r-4 card-body">
            <div class="media static-top-widget">
              <div class="align-self-center text-center"><i data-feather="database"></i></div>
              <div class="media-body"><span class="m-0">Total Quiz</span>
                <h4 class="mb-0 counter">
                  @if($total_quize <= 9) 0{{ $total_quize }} @else {{ $total_quize }} @endif </h4><i class="icon-bg" data-feather="database"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 col-lg-6">
        <div class="card o-hidden border-0">
          <div class="bg-primary b-r-4 card-body">
            <div class="media static-top-widget">
              <div class="align-self-center text-center"><i data-feather="activity"></i></div>
              <div class="media-body"><span class="m-0">Quiz Marks</span>
                <h4 class="mb-0 counter">{{ round($quize_mark,2) }}%</h4><i class="icon-bg" data-feather="activity"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-py-space bg-white">

  @if(count($selected_subjects) != 0)
  <div class="container">
    <div class="title ms-0">
      <h2>My Subjects</h2>
    </div>
    <div class="row">
      @foreach($selected_subjects as $subject)
      @php
      $subject_id = (int) $subject;
      $subject = App\Models\Subject::getSubjectByid($subject_id);
      @endphp
      <div class="col-xl-3 col-md-3 col-6">
        <a href="{{ route('chapters', $subject_id) }}" class="subject-box mb-25">
          <div>
            <div class="subject-image">
              <img class="w-100" src="{{asset('assets/images/frontend/Enigineering_Landscape.webp') }}" alt="">
            </div>
            <h6>

              {{ $subject }}
            </h6>
            <!-- <div class="progress">
              <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">50%</div>
            </div> -->
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
          <button class="btn btn-success nextBtn eschool-large-btn">Subject not Available in your subject list!!!</button>
          <!-- <a href="{{route('chooseSubject')}}" class="btn btn-primary nextBtn eschool-large-btn" type="button">Go Back</a>  -->
        </div>
      </div>
    </div>
  </div>
  @endif
</section>
@endsection