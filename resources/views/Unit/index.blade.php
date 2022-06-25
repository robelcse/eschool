@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                @php $array_of_approval_person = explode(",", Auth::user()->approve); @endphp
                @if(Auth::user()->role == 1)
                <div class="card-header pb-4">
                    <a href="{{route('admin.unit.create',[$subject_id,$grade_id, $chapter_id])}}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add unit
                    </a>
                </div>
                @elseif(Auth::user()->role == 2 && (Auth::user()->status == 3 || count($array_of_approval_person) == 3))
                <div class="card-header pb-4">
                    <a href="{{route('teacher.unit.create',[$subject_id,$grade_id, $chapter_id])}}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add unit
                    </a>
                </div>
                @endif
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
                                                <th class="text-left">Profile</th>
                                                <th width="30%">Unit</th>
                                                <th>Status</th>
                                                <th style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $approve_by_admin = App\Models\User::approveByAdmin(); @endphp
                                            @php $approve_by_teacher = App\Models\User::approveByTeacher(); @endphp
                                            @foreach($units as $unit)
                                            @php $teacher_approve = explode(",", $unit->teacher_approve); @endphp
                                            <tr>
                                                <td>
                                                    <a href="{{ Auth::user()->role == 1 ? route('admin.metarial.index', [$subject_id,$grade_id, $chapter_id, $unit->unit_id]):route('teacher.metarial.index', [$subject_id,$grade_id, $chapter_id, $unit->unit_id]) }}"> <img src="{{ asset('assets/images/dashboard/1.png') }}"></a>
                                                    <br>
                                                </td>
                                                <td valign="middle">{{ $unit->name }}</td>
                                                <td valign="middle"><span class="badge badge-{{ $unit->admin_approve != NULL || count($teacher_approve) == 3 ? 'success':'danger'}}">{{ $unit->admin_approve != NULL || count($teacher_approve) == 3 ? 'active':'Pending'}}</span></td>
                                                <td valign="middle" style="text-align: center;">


                                                    <!-- @if($unit->admin_approve != NULL || count($teacher_approve) == 3 || in_array(Auth::user()->id, $teacher_approve) )
                                                    <i class="fa fa-times-rectangle"></i>
                                                    @else
                                                    <a href="{{ Auth::user()->role == 1 ? url('admin/unit/approve/'.$unit->unit_id):url('teacher/unit/approve/'.$unit->unit_id) }}">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </a>
                                                    @endif -->
                                                    <!-- <i class="fa fa-times-rectangle"></i> -->

                                                    <?php

                                                    if ($approve_by_admin == 3 || $approve_by_teacher == 3) {

                                                        if ($unit->admin_approve == NULL) {
                                                            if (count($teacher_approve) < 3) {
                                                                if (!in_array(Auth::user()->id, $teacher_approve)) {
                                                    ?>
                                                                    <a href="{{ Auth::user()->role == 1 ? url('admin/unit/approve/'.$unit->unit_id):url('teacher/unit/approve/'.$unit->unit_id) }}">
                                                                        <i class="fa fa-check-square-o"></i>
                                                                    </a>
                                                    <?php
                                                                } else {
                                                                    echo 'x';
                                                                }
                                                            } else {
                                                                echo 'x';
                                                            }
                                                        } else {
                                                            echo 'x';
                                                        }
                                                    } else {
                                                        echo 'x';
                                                    }


                                                    ?>

                                                    <!--====delete subject by admin===-->
                                                    @if(Auth::user()->role == 1)
                                                    <button type="button" style="border: none;" onclick="deleteUnit({{ $unit->unit_id }})">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $unit->unit_id }}" action="{{ route('admin.unit.delete', $unit->unit_id) }}" method="post" style="display:none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    @endif
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

<script>
    function deleteUnit(unitId) {
        Swal.fire({
            title: 'Are your sure want to delete this?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Success!', '', 'success');
                document.getElementById('delete-form-' + unitId).submit();
            } else if (result.isDenied) {
                Swal.fire('Not deleted', '', 'info');
            }
        })

    }
</script>

@endsection