@extends('admin.layouts.master')
@section('content')

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <style>
            .error {
                color: red;
            }

        </style>
    </head>
    <div class="account-pages my-5" style="margin-left: 250px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-6 p-5">
                                    <div class="mx-auto mb-5">
                                        <a href="index.html">
                                            <img src="http://127.0.0.1:8000/assets/images/logo.png" alt="" height="24" />

                                        </a>
                                    </div>

                                    <h6 class="h5 mb-0 mt-4">Add Subject</h6>
                                    <br><br>
                                    <form method="POST" action="" accept-charset="UTF-8" id="subject"
                                        class="authentication-form">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <label for="subject_name" class="form-control-label">Subject Name
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">

                                                        <i class="icon-image" data-feather="lock"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control" id="subject_name"
                                                    placeholder="Enter your subjectname" name="subject_name" type="text"
                                                    value=""><br>


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

                                                <input class="form-control" id="image" name="image" type="file"
                                                    value=""><br>

                                            </div>
                                        </div>

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block" type="submit" id="submit_btn"> Add
                                                Subject
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6 d-none d-md-inline-block">
                                    <div class="auth-page-sidebar">
                                        <div class="overlay"></div>
                                        <div class="auth-user-testimonial">
                                            <p class="font-size-24 font-weight-bold text-white mb-1">I simply love it!
                                            </p>
                                            <p class="lead">"It's a elegent templete. I love it very much!"
                                            </p>
                                            <p>- Admin User</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->


                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="http://127.0.0.1:8000/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="http://127.0.0.1:8000/assets/js/app.min.js"></script>


    <script>

    </script>
@endsection
@push('script')
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js') }}">
    </script>
    <script src="{{ asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('#subject').validate({
            rules: {
                subject_name: {
                    required: true,
                },
                image: {
                    required: true,
                },

            },
            submitHandler: function(form) {
                $.ajax({
                    url: '{{ route('admin.addsubject') }}',
                    type: 'POST',
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        swal("Good job!", "You clicked the button!", "success", {
                            button: "Aww yiss!",
                        });
                    },

                });
            },

        });
    </script>
@endpush