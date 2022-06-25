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
                        <h5>Unit create </h5>
                    </div>
                </div>
            </div>
            <div class="card-body add-post">
            <div class="row justify-content-center">
                    <div class="col-sm-10">
                <form class="row needs-validation justify-content-center" method="POST" action="{{ Auth::user()->role == 1 ? route('admin.unit.store'):route('teacher.unit.store') }}">
                    @csrf
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="validationCustom01">Unit Name:</label>
                            <input class="{{ $errors->has('name') ? 'form-control is-invalid':'form-control' }}" type="text" name="name" value="{{old('name')}}" placeholder="Unit Name">
                     

                            <input type="hidden" name="subject_id" value="{{ $subject_id }}"/>
                            <input type="hidden" name="grade_id" value="{{ $grade_id }}"/>
                            <input type="hidden" name="chapter_id" value="{{ $chapter_id }}"/>


                            @if ($errors->has('name'))
                            <label class="form-label text-danger" for="city">{{ $errors->first('name') }}</label>
                            @endif
                        </div>
                        <div class="form-group">


                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="{{ $errors->has('description') ? 'form-control is-invalid':'form-control' }}" cols="5" rows="5" name="description" id="description" placeholder="Description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            @if ($errors->has('description'))
                            <label class="form-label text-danger" for="city">{{ $errors->first('description') }}</label>
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