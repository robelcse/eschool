@extends('layout.app')
@section('title', 'create')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
            <div class="row justify-content-center">
                    <div class="col-sm-6">
                    <h5>Grade create </h5>
                    </div>
                </div>
                
            </div>
            <div class="card-body add-post">
            <div class="row justify-content-center">
                    <div class="col-sm-10">
                <form class="row needs-validation justify-content-center" method="POST" action="{{ Auth::user()->role == 1 ? route('admin.post-grade-create-page',[$subject_id]):route('teacher.post-grade-create-page',[$subject_id]) }}">
                    @csrf
                    <div class="col-sm-7">


                        <div class="form-group">
                            <label for="validationCustom01">Grade Title:</label>
                            <input class="{{ $errors->has('grade') ? 'form-control is-invalid':'form-control' }}" type="text" name="grade" value="{{old('grade')}}">
                            @if ($errors->has('grade'))
                               <label class="form-label text-danger" for="city">{{ $errors->first('grade') }}</label>
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="btn-showcase pull-right pb-3">
                            <button class="btn btn-primary" style="margin-right: 0px;" type="submit">Post</button>
                        </div>
                    </div>
                </form>
                    </div>
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