@extends('layout.app')
@section('title', 'create')
@section('content')


<section class="registration-breadcrumb">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>My Subjects</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
                                <li class="breadcrumb-item"> Subjects</li>
                                <li class="breadcrumb-item"> Grades</li>
                                <li class="breadcrumb-item"> Chapters</li>
                                <li class="breadcrumb-item"> Units</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- Container-fluid starts-->
<section class="container bg-white p-4">
    <div class="title d-flex justify-content-between align-items-center">
        <h2 style="font-size: 26px; line-height: 32px; font-weight: 600; color: #1b4c43;">Select Unit</h2>
        <a href="{{route('unit.create',[$subject_id,$grade_id, $chapter_id])}}">
                                <button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Add Unit</button>
                            </a>
    </div>
    <div class="container mx-auto text-center pt-4 pb-3">
        <div class="row">
            @foreach ($units as $unit)

            <div class="col-sm-6 col-xl-3 col-lg-6">
                <a href="{{ route('metarial.index', [$subject_id,$grade_id, $chapter_id, $unit->unit_id]) }}">
                    <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                        <div class="media-body" style="padding-left: 0px;">
                            <span>{{ substr($unit->description, 0,20)}}</span>
                            <h4 class="mb-0 counter mt-2">{{$unit->name}}</h4>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>

                        </div>
                        </div>
                    </div>
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