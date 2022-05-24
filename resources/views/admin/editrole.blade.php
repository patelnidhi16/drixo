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

            <form method="POST" action="" id="updaterole">
                @csrf
                <input type="hidden" name="id"  class="form-control " id="id" value="{{$roles['id']}}">

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
                        <td><b><input type="checkbox" class="checkallrow" name="" id="{{$roles['id']}}"> &nbsp; </b></td>
                        @endif
                        @if(isset($rolePermissions))
                        <td>
                            <input type="checkbox" class="permision_check" name="permissions[]" value="{{$permission['id']}}" {{in_array($permission['id'], $rolePermissions) ? 'checked' : ''}}> &nbsp;{{ $permission['name'] }}
                        </td>
                        @endif
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


<script>
    $('#edit_role_form').on('click', '#globalCheckbox', function() {
        if ($(this).prop("checked")) {
            $('#edit_role_form').find("input[type=checkbox]").prop("checked", true);
        } else {
            $('#edit_role_form').find("input[type=checkbox]").prop("checked", false);
        }
    });
    $('#edit_role_form').on('click', '.permision_check', function() {
        $('#edit_role_form').find('#globalCheckbox').prop("checked", false);
        if ($('.permision_check:checked').length == $('.permision_check').length) {
            $('#edit_role_form').find('#globalCheckbox').prop("checked", true);
        }
    });

    $('.checkallrow').on('change', function() {
        if ($(this).prop("checked")) {
            $(this).parents("tr.multipleCheckbox").find("input[type=checkbox]").prop("checked", true);
        } else {
            $(this).parents("tr.multipleCheckbox").find("input[type=checkbox]").prop("checked", false);
        }
    });
    $('#updaterole').validate({
        rules: {
            role: {
                required: true,
            },
           
        },


        submitHandler: function(form) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route("admin.editrole",6) }}',
                type: 'POST',
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(data) {
                   swal("your role permission is updated successfully");
                   window.location.href='/admin/permission';
                },
            });

        }
    });
</script>
@endpush