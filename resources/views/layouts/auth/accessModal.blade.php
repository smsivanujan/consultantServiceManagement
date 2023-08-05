@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Access Models</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Auth</a></li>
            <li class="breadcrumb-item active" aria-current="page">Access Models</li>
        </ol>
    </div>
</div>

<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header border-bottom">
                <a class="btn btn-blue" id="create_">
                    <span class="btn-icon-wrapper pr-2"> </span>
                    Create Access Model
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">No</th>
                                <th class="wd-15p border-bottom-0">Model</th>
                                <th class="wd-15p border-bottom-0">Action</th>
                                <th class="wd-15p border-bottom-0">Routes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model_list as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <a class="btn btn-blue edit" title="Edit" data-id="{{ $row->id }}" data-name="{{ $row->name }}">
                                        <i style="color:rgb(226, 210, 210);cursor: pointer" class="fa fa-edit"></i>
                                    </a>
                                    <!-- <a class="btn btn-red delete" title="Delete" data-id="{{ $row->id }}">
                                        <i style="color:rgb(226, 210, 210);cursor: pointer" class="fa fa-edit"></i>
                                    </a> -->
                                </td>
                                <td>
                                    <a href="{{ route('access_point.index', ['id' => $row->id]) }}" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i>
                                        Route(s)
                                    </a>
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
                <h5 class="modal-title" id="createFormModal">Create Acess Model</h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                {{-- class="needs-validation" novalidate="" --}}
                <form method="POST" action="{{ route('access_model.store') }}">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ old('id') }}">

                    <div class="row">

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Acess Model</label>
                                <div>
                                    <input type="text" class="form-control" rows="1" id="name" name="name" placeholder="Enter the Access Model">{{ old('description') }}</input>
                                </div>
                                <p style="color:Tomato"> @error('name')
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
                $('#createFormModal').html('Create Access Model');
            } else {
                $('#createFormModal').html('Update Access Model');
            }
        }

        // create
        $('#create_').click(function() {
            $("#id").val(0);
            $("#name").val('');

            $('#createFormModal').html('Create Access Model');
            $('p').html('');

            $('#createModal').modal('show');
        });

        // update
        $('.edit').click(function() {
            $("#id").val($(this).attr('data-id'));
            $("#name").val($(this).attr('data-name'));

            $('#createFormModal').html('Update Access Model');
            $('p').html('');

            $('#createModal').modal('show');
        });
    });
</script>

@endsection