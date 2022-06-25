@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                @php $approveby = explode(",", Auth::user()->approve); @endphp
                @if(Auth::user()->role == 1)
                <div class="card-header pb-4">
                    <a href="{{ url('admin/student/create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add student
                    </a>
                </div>
                @elseif(Auth::user()->role == 2 && (Auth::user()->status == 3 || count($approveby) == 3))
                <div class="card-header pb-4">
                    <a href="{{ url('teacher/student/create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add student
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
                                                <th width="30%">Name</th>
                                                <th>Email</th>
                                                <th>City</th>
                                                <th>Status</th>
                                                <th style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $auth_user_approve_count = explode(",",Auth::user()->approve); @endphp
                                            @foreach($students as $key=>$student)
                                            <tr>
                                                <td><img src="{{ asset('assets/images/dashboard/1.png') }}"><br></td>
                                                <td valign="middle">{{ $student->first_name.' '.$student->last_name }}</td>
                                                <td valign="middle">{{ $student->email }}</td>
                                                <td valign="middle">{{ $student->city ? $student->city:'--------' }}</td>
                                                <td valign="middle"><span class="badge badge-{{ $student->status == 1 ? 'success':'danger'}}">{{ $student->status == 1 ? 'Active':'Pending'}}</span></td>
                                                <td valign="middle" style="text-align: center;">

                                                    @if($student->status == 0)
                                                    @if(Auth::user()->role == 1)
                                                    <a href="{{ url('admin/student/approve/'.$student->id) }}">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </a>
                                                    @elseif(Auth::user()->role == 2 && (count($auth_user_approve_count) == 3 || Auth::user()->status == 3))
                                                    <a href="{{ url('teacher/student/approve/'.$student->id) }}">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </a>
                                                    @else
                                                    <i class="fa fa-times-rectangle"></i>
                                                    @endif
                                                    @else
                                                    <i class="fa fa-times-rectangle"></i>
                                                    @endif

                                                    @if(Auth::user()->role == 1)
                                                    <button type="button" style="border: none;" onclick="deleteStudent({{ $student->id }})">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $student->id }}" action="{{ url('admin/student/'.$student->id.'/delete') }}" method="post" style="display:none">
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
                                {{ $students->links("pagination::bootstrap-4") }}
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
    function deleteStudent(studentId) {
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
                document.getElementById('delete-form-' + studentId).submit();
            } else if (result.isDenied) {
                Swal.fire('Not deleted', '', 'info');
            }
        })

    }
</script>

@if(Session::has('student-delete'))
<script>
    window.addEventListener('DOMContentLoaded', (event) => {

        (function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('
                student - delete ') }}'
            })
        })();
    });
</script>
@endif
@endsection