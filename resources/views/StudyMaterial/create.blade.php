@extends('layout.app')
@section('title', 'chapter Material create')
@section('content')
<style>
    table {
        border-collapse: separate;
        border-spacing: 0 1em;
        width: 100%;
    }

    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td {
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        font-size: 100%;
        vertical-align: baseline;
        background: transparent;
    }
</style>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="card">
        <div class="card-header pb-0">
            <h5>Unit Material upload </h5>
        </div>
        <form class="form theme-form" method="POST" action="{{ Auth::user()->role == 1 ? route('admin.metarial.store'):route('teacher.metarial.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-sm-7">

                        <div class="form-group">
                            <label for="validationCustom01">Document Title:</label>
                            <input class="{{ $errors->has('document_title') ? 'form-control is-invalid':'form-control' }}" type="text" name="document_title" value="{{old('document_title')}}" placeholder="Document Title">
                            @if ($errors->has('document_title'))
                            <label class="form-label text-danger" for="city">{{ $errors->first('document_title') }}</label>
                            @endif
                            <input type="hidden" name="subject_id" value="{{ $subject_id }}">
                            <input type="hidden" name="grade_id" value="{{ $grade_id }}">
                            <input type="hidden" name="chapter_id" value="{{ $chapter_id }}">
                            <input type="hidden" name="unit_id" value="{{ $unit_id }}">
                        </div>

                        <div class="form-group">
                        <label for="validationCustom01">Document (PDF):</label>
                            <div class="input-group hdtuto control-group lst increment">
                                <input type="file" name="documents" class="{{ $errors->has('document_title') ? 'myfrm form-control is-invalid':'myfrm form-control' }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                </div>
                            </div>
                            <div>
                                @if ($errors->has('documents'))
                                <label class="form-label text-danger" for="city">{{ $errors->first('documents') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01">Video Title:</label>
                            <input class="{{ $errors->has('document_title') ? 'form-control is-invalid':'form-control' }}" type="text" name="video_title" value="{{old('video_title')}}" placeholder="Video Title">
                            @if ($errors->has('video_title'))
                            <label class="form-label text-danger" for="city">{{ $errors->first('video_title') }}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01">Video Link:</label>
                            <input class="{{ $errors->has('document_title') ? 'form-control is-invalid':'form-control' }}" type="text" name="video_link" value="{{old('video_link')}}" placeholder="Video Link">
                            @if ($errors->has('video_link'))
                            <label class="form-label text-danger" for="city">{{ $errors->first('video_link') }}</label>
                            @endif
                        </div>
                        <div class="form-group pull-right">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
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
    $(document).ready(function() {
        $(".btn-success").click(function() {
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });
        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".hdtuto").remove();
        });
    });
    console.log('you can add your custom script here!')
    console.log($('a.nav-link.menu-title.active').offset())
</script>


@endsection