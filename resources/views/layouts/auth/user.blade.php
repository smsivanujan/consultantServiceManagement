@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Users</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </div>
</div>

<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom">
                <a class="btn btn-blue" id="create_">
                    <span class="btn-icon-wrapper pr-2"> </span>
                    Create
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">No</th>
                                <th class="wd-10p border-bottom-0">User</th>
                                <th class="wd-15p border-bottom-0">Action</th>
                                <th class="wd-15p border-bottom-0">Permision</th>
                            </tr>
                        </thead>
                        <tbody>
                           {{-- @foreach ($users as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>
                                    <a class="btn btn-blue edit" title="Edit" data-id="{{ $row->id }}" data-name="{{ $row->name }}" data-email="{{ $row->email }}">
                                        <i style="color:rgb(226, 210, 210);cursor: pointer" class="fa fa-edit"></i>
                                    </a>

                                    <!-- <a class="btn btn-red delete" title="Delete" data-id="{{ $row->id }}">
                                        <i style="color:rgb(226, 210, 210);cursor: pointer" class="fa fa-delete"></i>
                                    </a> -->
                                </td>
                                <td>
                                    <a href="{{ route('permission.index', ['id' => $row->id]) }}" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i>Permission</a>
                                </td>
                            </tr>
                            @endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
{{-- create & update model --}}
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createFormModal">Create User</h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                {{-- class="needs-validation" novalidate="" --}}
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ old('id') }}">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <div>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter the  Name" value="{{ old('name') }}" required />
                                    <p style="color:Tomato"> @error('name')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email<span class="text-danger">*</span></label>
                                <div>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter the Email" value="{{ old('email') }}" required />
                                    <p style="color:Tomato"> @error('email')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password<span class="text-danger">*</span></label>
                                <div>
                                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required />
                                    <p style="color:Tomato"> @error('password')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group" align="right">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {
        // show model back end validate
        if (!@json($errors -> isEmpty())) {
            $('#createModal').modal('show');
            var id = $('#id').val();
            if (id == 0) {
                $('#createFormModal').html('Create User');
            } else {
                $('#createFormModal').html('Update User');
            }
        }
        // create
        $('#create_').click(function() {
            console.log("ss");
            $("#id").val(0);
            $("#name").val('');
            $("#email").val('');
            $("#password").val('');

            $('#createFormModal').html('Create User');
            $('p').html('');
            // showDepartment(); // call function
            $('#createModal').modal('show');
        });
        // update
        $('#responsive-datatable').on('click', '.edit', function() {
            $("#id").val($(this).attr('data-id'));
            $("#name").val($(this).attr('data-name'));
            $("#email").val($(this).attr('data-email'));
            $("#password").val($(this).attr('data-password'));

            $('#createFormModal').html('Update User');
            $('p').html('');
            // showDepartment(); // call function
            $('#createModal').modal('show');
        });
        // change status
        // $('#responsive-datatable').on('click', '.changeStatus', function() {
        //     var id = $(this).attr('data-id');
        //     var url = $(this).attr('data-url');
        //     var status = $(this).attr('data-is_active');
        //     swal({
        //             title: 'Are you sure?',
        //             text: 'Change Member Status !',
        //             icon: 'warning',
        //             buttons: true,
        //             dangerMode: true,
        //         })
        //         .then((willDelete) => {
        //             if (willDelete) {
        //                 $.ajax({
        //                     url: url,
        //                     method: 'get',
        //                     data: {
        //                         status: status,
        //                         id: id
        //                     },
        //                     success: function(res) {
        //                         swal('Poof! Change Member Status!', {
        //                             icon: 'success',
        //                             timer: 1000,
        //                         });
        //                         location.reload();
        //                     }
        //                 });
        //             }
        //         });
        // });
        //Dropdown change -Property -> Department
        // $("#property_id").change(function() {
        //     showDepartment();
        // });

        // function showDepartment() {
        //     $('.departments').hide();
        //     var category_id = $("#property_id").val();
        //     $('.department_' + category_id).show();
        // }
    });
</script>
@endsection