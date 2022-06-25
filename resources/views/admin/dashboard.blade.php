@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header pb-4">
          <h5>Dashboard</h5>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="application/javascript">
    console.log('you can add your custom script here!')
    console.log($('a.nav-link.menu-title.active').offset())
</script>
@endsection