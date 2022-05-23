@extends('admin.layouts.master')
@section('content')

<!-- Button trigger modal -->

<div id="wrapper">
    <div class="content-page">
        <div class="content">


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Admin User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="" id="addadmin">
                                @csrf
                                <div class="form-group ">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" placeholder="Enter Email" class="form-control " id="email">

                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" placeholder="Enter password" class="form-control " id="password">

                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control " name="role">
                                        <option value="">Select Role</option>
                                        @foreach($roles as $role)
                                        <option>
                                            {{$role['name']}}
                                        </option>
                                        @endforeach
                                    </select>

                                </div>
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
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Add Admin User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="" id="updateadmin">
                                @csrf
                                <input type="hidden" id="id" name="id">
                                <div class="form-group ">
                                    <label for="email">Email</label>
                                    <input type="text" name="update_email" placeholder="Enter Email" class="form-control " id="update_email">

                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control " name="update_role">
                                        <option value="">Select Role</option>
                                        @foreach($roles as $role)
                                        <option>
                                            {{$role['name']}}
                                        </option>
                                        @endforeach
                                    </select>

                                </div>
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
            <!-- Start Content-->
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


            </div> <!-- container-fluid -->

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
    $('#addadmin').validate({
        rules: {
            email: {
                required: true,

            },
            password: {
                required: true,
            },
            role: {
                required: true,
            },

        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element.parents('.input-group-merge'));
        },
        submitHandler: function(form) {
            $.ajax({
                url: "{{ route('admin.addadmin') }}",
                type: 'POST',
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(data) {

                    $('#exampleModal').hide();
                    swal("admin user added successfully");
                },


            });
        },
    });

    $(document).on('click', '.delete', function() {
        var id = $(this).attr('dataid');
        alert(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route("admin.admindelete") }}',
            type: 'get',
            data: {
                id: id
            },
            success: function(data) {
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });

            },

        });
    });

    $(document).on('click', '.update', function() {
        var id = $(this).attr('dataid');
        alert(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route("admin.adminedit") }}',
            type: 'get',
            data: {
                id: id
            },
            success: function(data) {

                $('#id').val(data.id);
                $('#update_email').val(data.email);
                $('#update_role').val(data.role);
            },

        });
    });

    $('#updateadmin').validate({
        rules: {
            update_email: {
                required: true,
            },
            update_role: {
                required: true,
            },
        },


        submitHandler: function(form) {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route("admin.adminupdate") }}',
                type: 'POST',
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#exampleModal1').hide();
                    $(document).find('.modal-backdrop fade show').remove();
                    swal("Poof! Your imaginary file has been updated!", {
                        icon: "success",
                    });
                },

            });

        }
    });
</script>
@endpush