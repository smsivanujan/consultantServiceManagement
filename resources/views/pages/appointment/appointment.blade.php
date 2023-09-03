@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Appointments</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Appointments</li>
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
                                <th class="wd-15p border-bottom-0">Code</th>
                                <th class="wd-15p border-bottom-0">First Name</th>
                                <th class="wd-15p border-bottom-0">First Name</th>
                                <th class="wd-15p border-bottom-0">Date Of Birth</th>
                                <th class="wd-15p border-bottom-0">Nic</th>
                                <th class="wd-20p border-bottom-0">Mobile</th>
                                <th class="wd-15p border-bottom-0">Gender</th>
                                <th class="wd-10p border-bottom-0">Email</th>
                                <th class="wd-25p border-bottom-0">Location</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-10p border-bottom-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($customers as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->customer_first_name }}</td>
                            <td>{{ $row->nic }}</td>
                            <td>{{ $row->phone_number }}</td>
                            <td>
                                @if ($row->gender == 1)
                                Male
                                @elseif ($row->gender == 2)
                                Female
                                @else
                                Third gender
                                @endif
                            </td>
                            <td>{{ $row->customer_type_name }}</td>
                            <td>{{ $row->address }}</td>
                            <td>
                                @if ($row->is_active)
                                <button data-url="{{ route('customer.status-change') }}" data-id="{{ $row->id }}" data-is_active="{{ $row->is_active }}" class="btn btn-green btn-sm w-100 changeStatus">Active</button>
                                @else
                                <button data-url="{{ route('customer.status-change') }}" data-id="{{ $row->id }}" data-is_active="{{ $row->is_active }}" class="btn btn-red btn-sm w-100 changeStatus">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-blue edit" title="Edit" data-id="{{ $row->id }}" data-customer_first_name="{{ $row->customer_first_name }}" data-customer_sur_name="{{ $row->customer_sur_name }}" data-nic="{{ $row->nic }}" data-date_of_birth="{{ $row->date_of_birth }}" data-phone_number="{{ $row->phone_number }}" data-email="{{ $row->email }}" data-address="{{ $row->address }}" data-description="{{ $row->description }}" data-gender="{{ $row->gender }}" data-customer_type_id="{{ $row->customer_type_id }}">
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
                <h5 class="modal-title" id="createFormModal">Create Appointment</h5>
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
                                <label>Date and Time<span class="text-danger">*</span></label>
                                <div>
                                    <input type="date" class="form-control" id="appointment_dateTime" name="appointment_dateTime" value="{{ old('appointment_dateTime') }}" required max="{{ date('Y-m-d H:m') }}" />
                                    <p style="color:Tomato"> @error('appointment_dateTime'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Job Seeker<span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-select" required name="job_seeker_id" id="job_seeker_id">
                                        <option selected disabled value="">Choose...</option>
                                        {{-- @foreach ($jobseekers as $item)
                                        <option value="{{ $item->id }}" {{ (old('job_seeker_id') == $item->id) ? 'selected' : '' }}>{{ $item->job_seeker_first_name }} {{ $item->job_seeker_last_name }} </option>
                                        @endforeach --}}
                                    </select>
                                    <p style="color:Tomato"> @error('job_seeker_id'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Consultant<span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-select" required name="consultant_id" id="consultant_id">
                                        <option selected disabled value="">Choose...</option>
                                        {{-- @foreach ($consultants as $item)
                                        <option value="{{ $item->id }}" {{ (old('consultant_id') == $item->id) ? 'selected' : '' }}>{{ $item->consultant_first_name }} {{ $item->consultant_last_name }}</option>
                                        @endforeach --}}
                                    </select>
                                    <p style="color:Tomato"> @error('consultant_id'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Appointment Type<span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-select" required name="appointment_type_id" id="appointment_type_id">
                                        <option selected disabled value="">Choose...</option>
                                        {{-- @foreach ($appointment_types as $item)
                                        <option value="{{ $item->id }}" {{ (old('appointment_type_id') == $item->id) ? 'selected' : '' }}>{{ $item->appointment_type_name }}</option>
                                        @endforeach --}}
                                    </select>
                                    <p style="color:Tomato"> @error('appointment_type_id'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Staus<span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-select" required name="is_active" id="is_active">
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
                $('#createFormModal').html('Create Appointment');
            } else {
                $('#createFormModal').html('Update Appointment');
            }
        }

        // create
        $('#create_').click(function() {
            $("#id").val(0);
            $("#customer_first_name").val('');
            $("#customer_sur_name").val('');
            $("#nic").val('');
            $("#date_of_birth").val('');
            $("#phone_number").val('');
            $("#email").val('');
            $("#address").val('');
            $("#description").val('');
            $("#gender").val('');
            $("#customer_type_id").val('');

            $('#createFormModal').html('Create Appointment');
            $('p').html('');

            $('#createModal').modal('show');
        });

        // update
        $('.edit').click(function() {
            $("#id").val($(this).attr('data-id'));
            $("#customer_first_name").val($(this).attr('data-customer_first_name'));
            $("#customer_sur_name").val($(this).attr('data-customer_sur_name'));
            $("#nic").val($(this).attr('data-nic'));
            $("#date_of_birth").val($(this).attr('data-date_of_birth'));
            $("#phone_number").val($(this).attr('data-phone_number'));
            $("#email").val($(this).attr('data-email'));
            $("#address").val($(this).attr('data-address'));
            $("#description").val($(this).attr('data-description'));
            $("#gender").val($(this).attr('data-gender'));
            $("#customer_type_id").val($(this).attr('data-customer_type_id'));

            $('#createFormModal').html('Update Appointment');
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
                    text: 'Change Customer Status !',
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
                                swal('Poof! Change Customer Status!', {
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