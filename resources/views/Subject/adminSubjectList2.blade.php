@extends('layout.app')
@section('title', 'create')
@section('content')


<section class="registration-breadcrumb">
    <div class="custom-container">
        <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h3>My Subjects</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                            <li class="breadcrumb-item"> Subjects</li>
                        </ol>
                    </div>
                    <div class="col-sm-2">
                        
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Container-fluid starts-->
<div class="container-fluid bg-white p-4">
   
    <div class="custom-container">
        <div class="row subject-block justify-content-around">
            <div class="col-12 pb-4">
                <div class="title pl-5 d-flex justify-content-between">
                <h2 style="font-size: 26px; line-height: 32px; font-weight: 600; color: #1b4c43;">Select Subject</h2>
                <a  href="{{route('subject-create-page')}}" >
                            <button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Add Subject</button>
                    </a>
                </div>
            </div>

            @foreach ($subjects as $subject)
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{ route('subject-grades',$subject) }}"> 
                    <div class="subject-check position-relative">
                        <label for="subject1" class="subject-box pb-4" style="cursor: pointer;">
                            <div class="text-center">
                                <div class="subject-image">
                                    <img class="img-fluid"
                                        src="{{asset('assets/images/frontend/Business_Landscape.webp') }}" alt="Subject Images" style="width: 80%;">
                                </div>
                                <h6 class="mt-3">{{$subject->name}}</h6>
                            </div>
                        </label>
                    </div>
                </a>
            </div>
            @endforeach
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