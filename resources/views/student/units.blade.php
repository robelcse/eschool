@extends('layout.app')
@section('title', 'Units')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="customer-table-search product_table_search">
                                    <form>
                                        <div class="d-flex flex-wrap justify-content-end align-items-center">
                                            <div class="pro_name">
                                                <input type="search" name="" placeholder="search..">
                                            </div>
                                            <button type="submit" class="btn btn-success">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-table table-responsive">
                                    <table class="table" id="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">SL</th>
                                                <th style="text-align: center;">Subject</th>
                                                <th style="text-align: center;">Chapter</th>
                                                <th style="text-align: center;">Unit name</th>
                                                <th style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $x=0; @endphp
                                            @foreach($units as $unit)
                                            @php $x++; @endphp
                                            <tr>
                                                <td valign="middle">{{ $x }}</td>
                                                <td valign="middle">{{ $unit->subject->name }}</td>
                                                <td valign="middle">{{ $unit->chapter->name }}</td>
                                                <td valign="middle">{{ $unit->name }}</td>
                                                <td valign="middle" style="text-align: center;">
                                                    <a href="{{ url('teacher/block-student/'.$unit->subject_id.'/'.$unit->chapter_id.'/'.$unit->unit_id) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end mt-4">
                            <div class="col-xl-2 text-right">
                                {{ $units->links("pagination::bootstrap-4") }}
                            </div>
                        </div>
                    </div>
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