@extends('layout.app')
@section('title', 'subject lists')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-7">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Z0ezbwXsaaA"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <div class="default-according style-1" id="accordionoc">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="mb-0">
                                    <button class="btn btn-link text-white" data-bs-toggle="collapse"
                                        data-bs-target="#collapseicon" aria-expanded="true"
                                        aria-controls="collapse11"><i class="icofont icofont-briefcase-alt-2"></i>
                                        Unit  #<span>1</span></button>
                                </h5>
                            </div>
                            <div class="collapse show" id="collapseicon" aria-labelledby="collapseicon"
                                data-bs-parent="#accordionoc">
                                <div class="card-body">Contents.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse"
                                        data-bs-target="#collapseicon1" aria-expanded="false"><i
                                            class="icofont icofont-support"></i> Unit 
                                        #<span>2</span></button>
                                </h5>
                            </div>
                            <div class="collapse" id="collapseicon1" aria-labelledby="headingeight"
                                data-bs-parent="#accordionoc">
                                <div class="card-body">Contents.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse"
                                        data-bs-target="#collapseicon2" aria-expanded="false"
                                        aria-controls="collapseicon2"><i class="icofont icofont-tasks-alt"></i>
                                        Unit  #<span>3</span></button>
                                </h5>
                            </div>
                            <div class="collapse" id="collapseicon2" data-bs-parent="#accordionoc">
                                <div class="card-body">Contents.
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