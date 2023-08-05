@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Permissions</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Report</a></li>
            <li class="breadcrumb-item active" aria-current="page">Setting</li>
            <li class="breadcrumb-item active" aria-current="page">Permissions</li>
        </ol>
    </div>
</div>


<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div style="padding: 10px;">

                <div class="btn-list">
                    <a href="{{ route('user.index') }}" class="btn btn-yellow">Back</a>
                </div>

                <h3 align="center" class="pt-2">
                    <u> Gate Permission for {{ $user->name }}</u>
                </h3>

            </div>
            <div class="card-body">
                <form method='POST' action="{{ route('permission.store') }}">
                    @csrf
                    <input type="text" name="user" value="{{ $user->id }}" hidden>
                    <div class="card-body">
                        @foreach ($access_model as $rowx)
                        <h5 class="card-title"><u>{{ $rowx->name }}</u></h5>
                        <div class="row">
                            @foreach ($access_point as $row)
                            @if ($rowx->id == $row->access_model_id)
                            <div class="col-2">
                                <div class="position-relative form-group">
                                    <div class="custom-checkbox custom-control">
                                        @if ($permission)

                                        <?php
                                        $val = json_decode($permission->permision);
                                        if (in_array($row->id, $val)) {
                                        ?>
                                            <input type="text" name="permission_id" value="{{ $permission->id }}" hidden>
                                            <input type="checkbox" checked name='checkboxvar[]' id={{ $row->id }} value={{ $row->id }} class="custom-control-input">
                                            <label class="custom-control-label" for={{ $row->id }}>
                                                {{ $row->display_name }}
                                            </label>
                                        <?php
                                        } else {
                                        ?>
                                            <input type="text" name="permission_id" value="{{ $permission->id }}" hidden>
                                            <input type="checkbox" name='checkboxvar[]' id={{ $row->id }} value={{ $row->id }} class="custom-control-input">
                                            <label class="custom-control-label" for={{ $row->id }}>
                                                {{ $row->display_name }}
                                            </label>
                                        <?php
                                        }
                                        ?>
                                        @else
                                        <input type="text" name="permission_id" value="0" hidden>
                                        <input type="checkbox" name='checkboxvar[]' id={{ $row->id }} value={{ $row->id }} class="custom-control-input">
                                        <label class="custom-control-label" for={{ $row->id }}>
                                            {{ $row->display_name }}
                                        </label>
                                        @endif

                                    </div>

                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        @endforeach

                        <button type="submit" class="btn btn-sm btn-info float-right">Update </button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        $('.edit').click(function() {
            $('#id').val($(this).attr('data-id'));
            $('#name').val($(this).attr('data-title'));
        });

        $('.delete').click(function() {
            $('#delete_id').val($(this).attr('data-id'));
        });
    });
</script>
@endsection