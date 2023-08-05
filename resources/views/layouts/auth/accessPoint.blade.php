@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Access Points</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Auth</a></li>
            <li class="breadcrumb-item active" aria-current="page">Access Points</li>
        </ol>
    </div>
</div>

<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header border-bottom">
                <div class="btn-list">
                    <a href="{{ route('access_model.index') }}" class="btn btn-yellow">Back</a>
                    <a href="javascript:void(0)" class="btn btn-blue" id="create_">Create Access Point</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">No</th>
                                <th class="wd-15p border-bottom-0">Display Name</th>
                                <th class="wd-15p border-bottom-0">Value</th>
                                <th class="wd-15p border-bottom-0">Description</th>
                                <th class="wd-10p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($access_point as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->display_name }}</td>
                                <td>{{ $row->value }}</td>
                                <td>{{ $row->description }}</td>
                                <td>
                                    <a class="btn btn-blue edit" title="Edit" data-id="{{ $row->id }}" data-display_name="{{ $row->display_name }}" data-value="{{ $row->value }}" data-description="{{ $row->description }}">
                                        <i style="color:rgb(226, 210, 210);cursor: pointer" class="fa fa-edit"></i>
                                    </a>
                                    <!-- <a class="btn btn-red delete" title="Delete" data-id="{{ $row->id }}">
                                        <i style="color:rgb(226, 210, 210);cursor: pointer" class="fa fa-edit"></i>
                                    </a> -->
                                </td>
                            </tr>
                            @endforeach
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
                <h5 class="modal-title" id="createFormModal">Create Acess Points</h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                {{-- class="needs-validation" novalidate="" --}}
                <form method="POST" action="{{ route('access_point.store') }}">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ old('id') }}">

                    <div class="row">
                        <input type="text" name="access_model_id" value="{{ $access_model->id }}" hidden>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Display Name</label>
                                <div>
                                    <input type="text" class="form-control" rows="1" id="display_name" name="display_name" placeholder="Enter the Display Name">{{ old('display_name') }}</input>
                                </div>
                                <p style="color:Tomato"> @error('display_name')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Value</label>
                                <div>
                                    <input type="text" class="form-control" rows="1" id="value" name="value" placeholder="Enter the Value">{{ old('value') }}</input>
                                </div>
                                <p style="color:Tomato"> @error('value')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Description</label>
                                <div>
                                    <input type="text" class="form-control" rows="1" id="description" name="description" placeholder="Enter the Description">{{ old('description') }}</input>
                                </div>
                                <p style="color:Tomato"> @error('description')
                                    {{ $message }}
                                    @enderror
                                </p>
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
                $('#createFormModal').html('Create Access Points');
            } else {
                $('#createFormModal').html('Update Access Points');
            }
        }

        // create
        $('#create_').click(function() {
            $("#id").val(0);
            $("#display_name").val('');
            $("#value").val('');
            $("#description").val('');

            $('#createFormModal').html('Create Access Points');
            $('p').html('');

            $('#createModal').modal('show');
        });

        // update
        $('.edit').click(function() {
            $("#id").val($(this).attr('data-id'));
            $("#display_name").val($(this).attr('data-display_name'));
            $("#value").val($(this).attr('data-value'));
            $("#description").val($(this).attr('data-description'));

            $('#createFormModal').html('Update Access Points');
            $('p').html('');

            $('#createModal').modal('show');
        });
    });
</script>

@endsection