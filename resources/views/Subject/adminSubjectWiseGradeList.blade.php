@extends('layout.app')
@section('title', 'Grade create')
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
                                <li class="breadcrumb-item"> Subjects</li>
                                <li class="breadcrumb-item"> Grades</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- Container-fluid starts-->
<section class="container bg-white p-4">
    <div class="title d-flex justify-content-between">
        <h2 style="font-size: 26px; line-height: 32px; font-weight: 600; color: #1b4c43;">Select Grade</h2>
        <a href="{{route('get-grade-create-page',[$subject_id])}}">
                <button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Add Grade</button>
            </a>
    </div>
    <div class="container mx-auto text-center pt-4 pb-5">
        <div class="row justify-content-between">
            @php $i = 0; @endphp
            @foreach ($grades as $grade)
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <a href="{{ route('subject-grade-chapter',[$subject_id,$grade->grade_id]) }}">
                <div class="geade_view_wrap">
                
                    <h4>{{ ++$i }}</h4>
                    <h6>{{$grade->name}}</h6>
               
                </div>
                </a>
            </div>
            @endforeach
        </div>
        
    </div>
</section>
<!-- Container-fluid Ends-->
</div>
@endsection
@section('script')
<script type="application/javascript">
console.log('you can add your custom script here!')
console.log($('a.nav-link.menu-title.active').offset())
</script>
@endsection