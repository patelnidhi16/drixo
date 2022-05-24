@extends('admin.layouts.master')
@push('style')
<style>
    .modal.modal-fullscreen .modal-dialog {
        width: 100vw;
        height: 100vh;
        margin: 0;
        padding: 0;
        max-width: none;
    }

    .modal.modal-fullscreen .modal-content {
        height: auto;
        height: 100vh;
        border-radius: 0;
        border: none;
    }

    .modal.modal-fullscreen .modal-body {
        overflow-y: auto;
    }
</style>
<link rel="stylesheet" href="/path/to/dist/bootstrap4-modal-fullscreen.css" />
@endpush
@section('content')


<div id="wrapper">
    <div class="content-page">
        <div class="content">
            <div class="modal fade modal-fullscreen" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Roles</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" action="" id="addroles">
                                @csrf

                                <div class="form-group m-3">
                                    <label for="role">Role</label>
                                    <input type="text" name="role" placeholder="Enter Role" class="form-control " id="role">

                                </div>
                                <table class="table" id="permission">
                                    <tr>
                                        <td><b>Module Name</b></td>
                                        <td><b>Create</b></td>
                                        <td><b>Update</b></td>
                                        <td><b>View</b></td>
                                        <td><b>Delete</b></td>
                                        <td><b>Status</b></td>
                                    </tr>
                                    @php $row=1; @endphp
                                    @foreach ($permissions as $id => $permission)
                                    @if($row == 1)
                                    <tr class="multipleCheckbox">
                                        <td><b><input type="checkbox" class="checkallrow" name="" id="{{$permission->module}}"> &nbsp; <label>{{($permission->module)}}</b></td>
                                        @endif

                                        <td>
                                            <input type="checkbox" class="permision_check" name="permissions[]" value="{{$permission->id}}" id="{{$permission->id}}"><label for="{{$permission->id}}">{{ $permission->name }}</label>
                                        </td>

                                        @if($row == 5)
                                    </tr>
                                    @php $row=0; @endphp
                                    @endif
                                    @php $row++; @endphp
                                    @endforeach
                                </table>
                                <input type="submit" class="btn btn-primary">

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
          

            <div class="container-fluid mt-0">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="float-right page-breadcrumb">

                        </div>
                        @if(auth()->user()->can('role_create'))
                        <button class="add btn btn-success float-right" data-toggle="modal" data-target="#add">Add</button>
                        @endif
                        <h5 class="page-title">Admin List</h5>
                    </div>
                </div>
                <div class="card mx-5">
                    <div class="card-body ">
                        <div class="row">
                            <div class="table-responsive">
                                {!! $dataTable->table(['class' => 'table table-striped zero-configuration dataTable']) !!}
                            </div>

                            <!-- end col-12 -->
                        </div>
                    </div>
                </div>

                <!-- end row -->


            </div>

        </div> <!-- content -->
    </div>
</div>

@endsection
@push('script')
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js') }}">
</script>
<script src="{{ asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{!! $dataTable->scripts() !!}
<script>
    $('#add_role_modal').on('click', '#globalCheckbox', function() {
        if ($(this).prop("checked")) {
            $('#add_role_modal').find("input[type=checkbox]").prop("checked", true);
        } else {
            $('#add_role_modal').find("input[type=checkbox]").prop("checked", false);
        }
    });
    $('#add_role_modal').on('click', '.permision_check', function() {
        $('#add_role_modal').find('#globalCheckbox').prop("checked", false);
        if ($('.permision_check:checked').length == $('.permision_check').length) {
            $('#add_role_modal').find('#globalCheckbox').prop("checked", true);
        }
    });
    // Seperate row checkboxes
    $('.checkallrow').on('change', function() {
        if ($(this).prop("checked")) {
            $(this).parents("tr.multipleCheckbox").find("input[type=checkbox]").prop("checked", true);
        } else {
            $(this).parents("tr.multipleCheckbox").find("input[type=checkbox]").prop("checked", false);
        }
    });
   
</script>
@endpush