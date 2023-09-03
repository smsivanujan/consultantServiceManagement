@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Job Seekers</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Job Seekers</li>
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
                                <button data-url="{{ route('jobseeker.status-change') }}" data-id="{{ $row->id }}" data-is_active="{{ $row->is_active }}" class="btn btn-green btn-sm w-100 changeStatus">Active</button>
                                @else
                                <button data-url="{{ route('jobseeker.status-change') }}" data-id="{{ $row->id }}" data-is_active="{{ $row->is_active }}" class="btn btn-red btn-sm w-100 changeStatus">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-blue edit" title="Edit" data-id="{{ $row->id }}" 
                                data-job_seeker_first_name="{{ $row->job_seeker_first_name }}" 
                                data-job_seeker_last_name="{{ $row->job_seeker_last_name }}" 
                                data-nic="{{ $row->nic }}" 
                                data-dateofbirth="{{ $row->dateofbirth }}" 
                                data-phone_number="{{ $row->phone_number }}" 
                                data-email="{{ $row->email }}" 
                                data-location="{{ $row->location }}" 
                                data-note="{{ $row->note }}" 
                                data-gender="{{ $row->gender }}">
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
                <h5 class="modal-title" id="createFormModal">Create Jobseeker</h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                {{-- class="needs-validation" novalidate="" --}}
                <form method="POST" {{--action="{{ route('jobseeker.store') }}"--}}>
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ old('id') }}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>First Name<span class="text-danger">*</span></label>
                                <div>
                                    <input type="text" class="form-control" id="job_seeker_first_name" name="job_seeker_first_name" placeholder="Enter the First Name" value="{{ old('job_seeker_first_name') }}" required />
                                    <p style="color:Tomato"> @error('job_seeker_first_name'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Name<span class="text-danger">*</span></label>
                                <div>
                                    <input type="text" class="form-control" id="job_seeker_last_name" name="job_seeker_last_name" placeholder="Enter the Last Name" value="{{ old('job_seeker_last_name') }}" required />
                                    <p style="color:Tomato"> @error('job_seeker_last_name'){{ $message }} @enderror</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mobile Number<span class="text-danger">*</span></label>
                                <div>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required />
                                    <p style="color:Tomato"> @error('phone_number'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nic<span class="text-danger">*</span></label>
                                <div>
                                    <input type="text" class="form-control" id="nic" name="nic" value="{{ old('nic') }}" required minlength="10" maxlength="12" />
                                    <p style="color:Tomato"> @error('nic'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date of Birth<span class="text-danger">*</span></label>
                                <div>
                                    <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{ old('dateofbirth') }}" required max="{{ date('Y-m-d') }}" />
                                    <p style="color:Tomato"> @error('dateofbirth'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <div>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                                    <p style="color:Tomato"> @error('email'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Gender<span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-select" required name="gender" id="gender">
                                        <option selected disabled value="">Choose...</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Third gender</option>
                                    </select>
                                    <p style="color:Tomato"> @error('gender'){{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Location<span class="text-danger">*</span></label>
                                <div>
                                    <textarea type="text" class="form-control" rows="1" id="location" name="location" placeholder="Enter the location">{{ old('location') }}</textarea>
                                </div>
                                <p style="color:Tomato"> @error('location'){{ $message }} @enderror
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Note</label>
                                <div>
                                    <textarea type="text" class="form-control" rows="1" id="note" name="note" placeholder="Enter the note">{{ old('note') }}</textarea>
                                </div>
                                <p style="color:Tomato"> @error('note'){{ $message }} @enderror
                                </p>
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

                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Target Countries For Job</label>
                                <ul>
                                    <li class="select-client">
                                        <select class="form-control select2-style1" data-placeholder="Choose One" multiple>
                                            <option label="Choose one"></option>
                                            <option value="1">United Kingdom</option>
                                            <option value="2">America</option>
                                            <option value="13">India</option>
                                            <option value="15">Doha</option>
                                            <option value="3">Dubai</option>

                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <!-- </div>

                    <div class="row"> -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Target Jobs</label>
                                <ul>
                                    <li class="select-client">
                                        <select class="form-control select2-style1" data-placeholder="Choose One" multiple>
                                            <option label="Choose one"></option>
                                            <option value="1">Software Engineer</option>
                                            <option value="2">Plumber</option>
                                            <option value="13">Electrician</option>
                                            <option value="15">Driver</option>
                                        </select>
                                    </li>
                                </ul>
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




<!-- SELECT2 JS -->
<script src="../assets/plugins/select2/select2.full.min.js"></script>

<!-- FORM ELEMENTS JS -->
<script src="../assets/js/formelementadvnced.js"></script>





<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {

        // show model back end validate
        if (!@json($errors -> isEmpty())) {
            $('#createModal').modal('show');

            var id = $('#id').val();

            if (id == 0) {
                $('#createFormModal').html('Create Job Seeker');
            } else {
                $('#createFormModal').html('Update Job Seeker');
            }
        }

        // create
        $('#create_').click(function() {
            $("#id").val(0);
            $("#job_seeker_first_name").val('');
            $("#job_seeker_last_name").val('');
            $("#nic").val('');
            $("#dateofbirth").val('');
            $("#phone_number").val('');
            $("#email").val('');
            $("#location").val('');
            $("#note").val('');
            $("#gender").val('');

            $('#createFormModal').html('Create Job Seeker');
            $('p').html('');

            $('#createModal').modal('show');
        });

        // update
        $('.edit').click(function() {
            $("#id").val($(this).attr('data-id'));
            $("#job_seeker_first_name").val($(this).attr('data-job_seeker_first_name'));
            $("#job_seeker_last_name").val($(this).attr('data-job_seeker_last_name'));
            $("#nic").val($(this).attr('data-nic'));
            $("#dateofbirth").val($(this).attr('data-dateofbirth'));
            $("#phone_number").val($(this).attr('data-phone_number'));
            $("#email").val($(this).attr('data-email'));
            $("#location").val($(this).attr('data-location'));
            $("#note").val($(this).attr('data-note'));
            $("#gender").val($(this).attr('data-gender'));

            $('#createFormModal').html('Update Job Seeker');
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
                    text: 'Change Job Seeker Status !',
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
                                swal('Poof! Change Job Seeker Status!', {
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