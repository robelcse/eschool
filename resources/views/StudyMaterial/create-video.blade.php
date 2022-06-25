@extends('layout.app')
@section('title', 'chapter Material create')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="card">
        <div class="card-header pb-0">
            <h5>Chapter Material upload video</h5>
        </div>
        <form class="form theme-form" method="POST" action="{{ route('chapter-material-post-video') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col">
                    
                        <div class="input-group hdtuto control-group lst ">
                            <input type="file" name="filenames[]" class="myfrm form-control" multiple>
                            <div class="input-group-btn">
                                <!-- <button class="btn btn-success" type="button"><i
                                        class="fldemo glyphicon glyphicon-plus"></i>Add</button> -->
                            </div>
                        </div>

                        <br>
                        
                        <div class="mb-3 row">
                            <div class="col-sm-9">
                            <label class="col-sm-3 col-form-label">link</label>

                                <input class="form-control" type="text" name="video_link" value="{{old('video_link')}}"  placeholder="">
                            </div>
                        </div>
                        <!-- <div class="clone hide">
                            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                <input type="file" name="filenames[]" class="myfrm form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button"><i
                                            class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="col-sm-9 offset-sm-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <input class="btn btn-light" type="reset" value="Cancel">
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
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
      });
    });
console.log('you can add your custom script here!')
console.log($('a.nav-link.menu-title.active').offset())
</script>


@endsection