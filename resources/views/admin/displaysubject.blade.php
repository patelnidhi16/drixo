@extends('admin.layouts.master')
@section('content')
<!-- Button trigger modal -->
@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<!-- <link rel="stylesheet" href='path/to/font-awesome/css/font-awesome.min.css'> -->
<style>
    .error {
        color: red;
    }
</style>
@endpush
<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Subject Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" accept-charset="UTF-8" id="updatesubject" class="authentication-form">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="form-group mt-4">
                        <label for="subject_name" class="form-control-label">Subject Name
                        </label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text">

                                    <i class="icon-image" data-feather="lock"></i>
                                </span>
                            </div>
                            <input class="form-control" id="subject_name" placeholder="Enter your subjectname" name="subject_name" type="text" value=""><br>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="image" class="form-control-label">image</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <span class="iconify" data-icon="bi:image-fill"></span>
                                </span>
                            </div>

                            <input class="form-control" id="image" name="image" type="file" value="">
                        </div>
                        <input class="form-control" id="old_image" name="old_image" type="hidden">

                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary btn-block" type="submit" id="submit_btn"> Update Subject
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!--End  Modal -->
<br><br>
<div class="page-content-wrapper" style="margin-left:250px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                        <li class="breadcrumb-item active">Datatable</li>
                    </ol>
                </div>
                <h5 class="page-title">Subject List</h5>
                <a class="btn btn-primary float-right m-3" href="{{route('admin.subject')}}">Add Subject</a>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">


                        <div class="table-responsive">
                            {!! $dataTable->table(['class' => 'table table-striped zero-configuration dataTable']) !!}
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->

</div>
@endsection
@push('script')


<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js') }}">
</script>
<script src="{{ asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js') }}"></script>
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
<script>

</script>

{!! $dataTable->scripts() !!}
<script>
    $('.subject').validate({
        rules: {
            'question[]': {
                required: true,
            },
            'option1[]': {
                required: true,
            },
            title: {
                required: true,
            },
        },

    });

    $(document).on('click', '.delete', function() {
        var id = $(this).attr('dataid');
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{{ route("admin.delete") }}',
                        type: 'get',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });
                            $('#student-table').DataTable().ajax.reload();
                        }
                    });

                } else {
                    swal("Your imaginary file is safe!");
                }
            });

    });
    $(document).on('click', '.edit', function() {
        id = $(this).attr('dataid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route("admin.edit") }}',
            type: 'get',
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                $('#subject_name').val(data.subject_name);
                $('#id').val(data.id);
                $('#old_image').val(data.image);
            }
        });
    });
    $('#updatesubject').validate({
        rules: {
            subject_name: {
                required: true,
            },

        },
        submitHandler: function(form) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '{{ route("admin.update") }}',
                            type: 'POST',
                            data: new FormData(form),
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                $('#edit').modal('hide');
                                swal("Poof! Your imaginary file has been updated!", {
                                    icon: "success",
                                });
                                $('#student-table').DataTable().ajax.reload();
                            },
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });

        }
    });
   
    $(document).on('click','.add_question',function(){
      id=$(this).attr('dataid');
      $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "questions/" + id ,
            type: 'get',
            data: {
                id: id
            },
            success: function(data) {
                window.location.href=data;
                console.log(data);
            
            }
        });
    });
</script>
@endpush