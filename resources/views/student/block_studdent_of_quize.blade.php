@extends('layout.app')
@section('title', 'Block Student')
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
                                                <th width="5%">SL</th>
                                                <th width="20%">Name</th>
                                                <th width="20%">Email</th>
                                                <th width="10%">Subject</th>
                                                <th width="10%">Chapter</th>
                                                <th width="10%">Unit</th>
                                                <th width="10%">Status</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $x=0; @endphp
                                            @foreach($blocked_students as $student)
                                            @php $x++; @endphp
                                            <tr>
                                                <td valign="middle">{{ $x }}</td>
                                                <td valign="middle">{{ $student->user->first_name.' '.$student->user->last_name }}</td>
                                                <td valign="middle">{{ $student->user->email }}</td>
                                                <td valign="middle">{{ $student->subject->name }}</td>
                                                <td valign="middle">{{ $student->chapter->name }}</td>
                                                <td valign="middle">{{ $student->unit->name }}</td>
                                                <td valign="middle">
                                                    @if($student->status == 1)
                                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                                    @else
                                                    <i class="fa fa-check-square-o"></i>
                                                    @endif
                                                </td>
                                                <td valign="middle" style="text-align: center;">
                                                    <a href="{{ route('teacher.unblockStudent',$student->id) }}" class="btn btn-success {{ $student->status == 0 ? 'pointer-event':''}}">
                                                        {{ $student->status == 1 ? 'Unblock':'Block'}}
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
                                {{ $blocked_students->links("pagination::bootstrap-4") }}
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