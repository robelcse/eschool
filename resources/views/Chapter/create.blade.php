@extends('layout.app')
@section('title', 'chapter create')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">
            <div class="col-xl-3">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Subject : Physics</h5>
                            <p class="card-text">Subject description .</p>
                        </div>
                        <!-- <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add Chapter</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="card" action="{{ route('chapter-insert') }}" method="post">
                                    @csrf
                                    <div class="card-header pb-0">
                                        <h4 class="card-title mb-0">Add Chapter</h4>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Chapter Name</label>
                                                    <input class="form-control" type="text" name="name" placeholder="Enter Chapter name">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Select Subject</label>
                                                    <select class="form-control" id="subject_id" name="subject_id">
                                                    <option selected disabled>Select Subject</option>
                                                        @foreach($subjects as $sub)
                                                          <option value="{{ $sub->subject_id }}">{{ $sub->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">save</button>
                                        <!-- Button trigger modal -->

                                    </div>
                                </form>
                            </div>
                            <!-- <div class="modal-footer">
                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-secondary" type="button">Save changes</button>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="container-fluid" style="margin-top: 40px;">
                    <div class="row">


                        <div class="card shadow bg-white rounde" style="width: 337px; height: 100px; padding: 4px; margin: 4px;">
                            <div class="card-body">
                                <div class="media">
                                    <img class="card-img-top rounded-circle" src="https://picsum.photos/200/150/?random" alt="Card image cap" style="width:50px;height: 40px;">
                                    <div class="media-body">
                                        <p>chapter 01.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

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