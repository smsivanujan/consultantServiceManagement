@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Appointments Deviations</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Appointments Deviations</li>
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
                                <th class="wd-15p border-bottom-0">Appointment Code</th>
                                <th class="wd-15p border-bottom-0">Deviation DateTime</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-10p border-bottom-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($appoinment_deviations as $row)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->appointment_code }}</td>
                            <td>{{ $row->deviation_dateTime }}</td>
                            <td>
                                @if ($row->is_active)
                                <button data-url="{{ route('appoinment_deviation.status-change') }}" data-id="{{ $row->id }}" data-is_active="{{ $row->is_active }}" class="btn btn-green btn-sm w-100 changeStatus">Active</button>
                                @else
                                <button data-url="{{ route('appoinment_deviation.status-change') }}" data-id="{{ $row->id }}" data-is_active="{{ $row->is_active }}" class="btn btn-red btn-sm w-100 changeStatus">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-blue edit" title="Edit" data-id="{{ $row->id }}" data-appointment_id="{{ $row->appointment_id }}" data-deviation_dateTime="{{ $row->deviation_dateTime }}" data-is_active="{{ $row->is_active }}">
                                    <i style="color:rgb(226, 210, 210);cursor: pointer" class="fa fa-edit"></i>
                                </a>
                            </td>
                            </tr>
                            @endforeach --}}
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
                <h5 class="modal-title" id="createFormModal">Create Appointment  Deviation</h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                {{-- class="needs-validation" novalidate="" --}}
                <form method="POST" {{--action="{{ route('customer.store') }}"--}}>
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ old('id') }}">
                    <div class="row">



                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Deviation Date & Time<span class="text-danger">*</span></label>
                                <div>
                                    <input type="datetime-local" class="form-control" id="appointment_dateTime" name="appointment_dateTime" value="{{ old('appointment_dateTime') }}" required max="{{ date('Y-m-d H:m') }}" />
                                    <p style="color:Tomato"> @error('appointment_dateTime'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Appointment<span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-select" required name="appointment_id" id="appointment_id">
                                        <option selected disabled value="">Choose...</option>
                                        {{-- @foreach ($appointments as $item)
                                        <option value="{{ $item->id }}" {{ (old('appointment_id') == $item->id) ? 'selected' : '' }}>{{ $item->appointment_code }} </option>
                                        @endforeach --}}
                                    </select>
                                    <p style="color:Tomato"> @error('appointment_id'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Staus<span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-select" required name="is_active" id="appointment_id">
                                        <option selected value="1">Active</option>
                                        <option value="2">Inactive</option>
                                        <option value="3">Blocked</option>
                                    </select>
                                    <p style="color:Tomato"> @error('is_active')
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
                $('#createFormModal').html('Create Appointment Deviation');
            } else {
                $('#createFormModal').html('Update Appointment Deviation');
            }
        }

        // create
        $('#create_').click(function() {
            $("#id").val(0);
            $("#appointment_dateTime").val('');
            $("#appointment_id").val('');
            $("#is_active").val('');

            $('#createFormModal').html('Create Appointment Deviation');
            $('p').html('');

            $('#createModal').modal('show');
        });

        // update
        $('.edit').click(function() {
            $("#id").val($(this).attr('data-id'));
            $("#appointment_dateTime").val($(this).attr('data-appointment_dateTime'));
            $("#appointment_id").val($(this).attr('data-appointment_id'));
            $("#is_active").val($(this).attr('data-is_active'));

            $('#createFormModal').html('Update Appointment Deviation');
            $('p').html('');

            $('#createModal').modal('show');
        });

        // change status
        $('#responsive-datatable').on('click', '.changeStatus', function() {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            var status = $(this).attr('data-is_active');

            swal({
                    title: 'Are you sure?',
                    text: 'Change Appointment Deviation Status !',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url,
                            method: 'get',
                            data: {
                                status: status,
                                id: id
                            },
                            success: function(res) {
                                swal('Poof! Change Appointment Deviation Status!', {
                                    icon: 'success',
                                    timer: 1000,
                                });
                                location.reload();
                            }
                        });
                    }
                });
        });

    });
</script>

@endsection