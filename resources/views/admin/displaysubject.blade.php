@extends('admin.layouts.master')
@section('content')
    <!-- Button trigger modal -->

    <style>
        .error {
            color: red;
        }

    </style>
    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                                <input class="form-control" id="subject_name" placeholder="Enter your subjectname"
                                    name="subject_name" type="text" value=""><br>


                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label for="image" class="form-control-label">image</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-dual" data-feather="lock"></i>
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
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subject</th>
                                        <th>Image</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subject as $user)
                                        <tr>
                                            <td> {{ $user->id }}</td>
                                            <td> {{ $user->subject_name }}</td>
                                            <td><img src=" {{asset('assets/'.$user->image)}}" style="height: 50px; width:50px;">
                                            </td>
                                            <td><button dataid="{{ $user->id }}"
                                                    class="delete btn btn-danger">Delete</button>&nbsp;&nbsp;<button
                                                    data-target="#edit" data-toggle="modal" dataid="{{ $user->id }}"
                                                    class="edit btn btn-success" data-backdrop="static"
                                                    data-keyboard="false">Edit</button>&nbsp;&nbsp;<a
                                                    dataid="{{ $user->id }}" class="add btn btn-primary" href="{{url('admin/questions',['id'=> $user->id])}}">Add
                                                    Question</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('.delete').click(function() {
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
                            url: '{{ route('admin.delete') }}',
                            type: 'get',
                            data: {
                                id: id
                            },
                            success: function(data) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                            }
                        });

                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });

        });
        $('.edit').click(function() {
            id = $(this).attr('dataid');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('admin.edit') }}',
                type: 'get',
                data: {
                    id: id
                },
                success: function(data) {
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
                                url: '{{ route('admin.update') }}',
                                type: 'POST',
                                data: new FormData(form),
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    $('#edit').modal('hide');
                                    swal("Poof! Your imaginary file has been updated!", {
                                        icon: "success",
                                    });
                                },
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });

            }
        });
    </script>
@endpush
