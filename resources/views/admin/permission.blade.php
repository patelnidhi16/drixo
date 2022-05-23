@extends('admin.layouts.master')
@section('content')

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Role
    </button>

    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


                <button class="add btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">Add</button>

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
    @endsection
    @push('script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
