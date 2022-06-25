@extends('layout.app')
@section('title', 'question lists')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        @foreach ($questions as $question)
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="container mt-sm-5 my-1">
                        <div class="question ml-sm-5 pl-sm-5 pt-2">
                            <div class="py-2 h5"><b>{{$question->id}}.{{$question->question}}</b></div>

                            <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                                @foreach (json_decode($question->options) as $data)
                                <label class="options">{{$data}} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div class="py-2 h5"><b>Answer: {{$question->answer}}</b> </div>
                    </div>
                </div>
            </div>
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