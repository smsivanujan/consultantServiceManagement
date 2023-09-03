@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Jobs</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jobs</li>
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
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">No</th>
                                <th class="wd-15p border-bottom-0">Job Name</th>
                                <th class="wd-15p border-bottom-0">Job Type</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-10p border-bottom-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--@foreach ($jobs as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->job_name }}</td>
                                <td>{{ $row->job_type_name }}</td>
                                <td>
                                @if ($row->is_active)
                                <button data-url="{{ route('job.status-change') }}" data-id="{{ $row->id }}" data-is_active="{{ $row->is_active }}" class="btn btn-green btn-sm w-100 changeStatus">Active</button>
                                @else
                                <button data-url="{{ route('job.status-change') }}" data-id="{{ $row->id }}" data-is_active="{{ $row->is_active }}" class="btn btn-red btn-sm w-100 changeStatus">Deactive</button>
                                @endif
                            </td>
                                <td>
                                    <a class="btn btn-blue edit" title="Edit" data-id="{{ $row->id }}" data-job_name="{{ $row->job_name }}" data-job_type_id="{{ $row->job_type_id }}" data-is_active="{{ $row->is_active }}">
                                        <i style="color:rgb(226, 210, 210);cursor: pointer" class="fa fa-edit"></i>
                                    </a>
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
                <h5 class="modal-title" id="createFormModal">Create Job</h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                {{-- class="needs-validation" novalidate="" --}}
                <form method="POST" action="{{ route('job.store') }}">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ old('id') }}">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Job Name<span class="text-danger">*</span></label>
                                <div>
                                    <input type="text" class="form-control" id="job_name" name="job_name" placeholder="Enter the Job Name" value="{{ old('job_name') }}" required />
                                    <p style="color:Tomato"> @error('job_name'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Job Type<span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-select" required name="job_type_id" id="job_type_id">
                                        <option selected disabled value="">Choose...</option>
                                        {{-- @foreach ($job_types as $item)
                                        <option value="{{ $item->id }}" {{ (old('job_type_id') == $item->id) ? 'selected' : '' }}>{{ $item->job_type_name }}</option>
                                        @endforeach --}}
                                    </select>
                                    <p style="color:Tomato"> @error('job_type_id'){{ $message }} @enderror</p>
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
                $('#createFormModal').html('Create Job');
            } else {
                $('#createFormModal').html('Update Job');
            }
        }

        // create
        $('#create_').click(function() {
            $("#id").val(0);
            $("#job_name").val('');
            $("#job_type_id").val('');
            $("#is_active").val('');

            $('#createFormModal').html('Create Job');
            $(' ').html('');

            $('#createModal').modal('show');
        });

        // update
        $('.edit').click(function() {
            $("#id").val($(this).attr('data-id'));
            $("#job_type_name").val($(this).attr('data-job_type_name'));
            $("#is_active").val($(this).attr('data-is_active'));

            $('#createFormModal').html('Update Job');
            $('p').html('');

            $('#createModal').modal('show');
        });
    });
</script>

@endsection