@extends('layout.app')
@section('title', 'chapter create')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="card">
        <div class="card-header pb-4 d-flex justify-content-between align-items-center">
            <h5>Add Question</h5>

            <a href="{{ route('question-show') }}" class="btn btn-primary">Questions List</a>
        </div>
        <form class="form theme-form" method="POST" action="{{ Auth::user()->role == 1 ? route('question-store',[$subject_id, $grade_id, $chapter_id, $unit_id]):route('teacher.question-store',[$subject_id, $grade_id, $chapter_id, $unit_id]) }}">


            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @csrf
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-sm-9">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Question </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="question" value="{!! old('question') !!}" placeholder="">
                                @if ($errors->has('question'))
                                <label class="form-label text-danger" for="question">{{ $errors->first('question') }}</label>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">option 1 </label>
                            <div class="col-sm-10">
                                @php
                                $optios = old("options");
                                @endphp

                                <input class="form-control" type="text" name="options[]" value="{{ $optios ? $optios[0] : ''}}" placeholder="" required="required">
                                @if ($errors->has('options'))
                                <label class="form-label text-danger" for="options">{{ $errors->first('options') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">option 2 </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="options[]" value="{{ $optios ? $optios[1] : ''}}" placeholder="" required="required">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">option 3 </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="options[]" value="{{ $optios ? $optios[2] : ''}}" placeholder="" required="required">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">option 4 </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="options[]" value="{{ $optios ? $optios[3] : ''}}" placeholder="" required="required">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Answer</label>
                            <div class="col-sm-10">
                                <select name="answer" class="form-control">
                                    <option value="">Select Asnwer</option>
                                    <option value="1">option 1</option>
                                    <option value="2">option 2</option>
                                    <option value="3">option 3</option>
                                    <option value="4">option 4</option>
                                </select>
                                <!-- <input class="form-control" type="text" name="answer" value="{{old('answer')}}"  placeholder=""> -->
                                @if ($errors->has('answer'))
                                <label class="form-label text-danger" for="answer">{{ $errors->first('answer') }}</label>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="col-sm-9 offset-sm-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
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