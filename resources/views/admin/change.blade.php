<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shreyu - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .error,
        span {
            color: red;
        }
    </style>
</head>

<body class="authentication-bg">

    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-6 p-5">
                                    <div class="mx-auto mb-5">
                                        <a href="index.html">
                                            <img src="{{asset('assets/images/logo.png')}}" alt="" height="24" />

                                        </a>
                                    </div>

                                    <h6 class="h5 mb-0 mt-4">Change Password</h6>
                                    <br><br>
                                    <form action="{{route('admin.change')}}" class="authentication-form" method="POST" id="change">
                                        @csrf
                                        <div class="form-group" style="display:none;">
                                            <label class="form-control-label">Email Address</label>
                                            <div class="input-group input-group-merge" style="display:none;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="mail"></i>
                                                    </span>
                                                </div>
                                                <input type="hidden" class="form-control" id="email" name="email" placeholder="hello@coderthemes.com" value="{{Auth::guard('admin')->user()->email}}">
                                                <span id="servererror"></span>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group mt-4">
                                            <label class="form-control-label">Current Password</label>

                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" id="currentpassword" name="currentpassword" placeholder="Enter your currentpassword">
                                                <span id="servererror"></span>


                                                @error('currentpassword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <label class="form-control-label">Password</label>

                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                                                <span id="servererror"></span>


                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <label class="form-control-label">Confirm Password</label>

                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter your password">
                                                <span id="servererror"></span>


                                                @error('cpassword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block" type="submit" id="submit_btn"> Log In
                                            </button>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-lg-6 d-none d-md-inline-block">
                                    <div class="auth-page-sidebar">
                                        <div class="overlay"></div>
                                        <div class="auth-user-testimonial">
                                            <p class="font-size-24 font-weight-bold text-white mb-1">I simply love it!</p>
                                            <p class="lead">"It's a elegent templete. I love it very much!"</p>
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
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>


    <script>

    </script>
</body>

<!-- jQuery Validate Plugin -->
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js')}}"></script>

<script>
    $('#submit_btn').click(function() {
        $('span').html(" ");
    });
    $('#change').validate({
        rules: {
            currentpassword: {
                required: true,
            },
            password: {
                required: true,
            },
            cpassword: {
                required: true,
                equalTo: '#password'
            },
        },
        submitHandler: function(form) {

            $.ajax({
                url: '{{route("admin.change")}}',
                type: 'POST',
                data: new FormData(form),
                processData: false,
                contentType: false,
                error: function(error) {
                    console.log(error);
                    $(error.responseJSON.errors).each(function(key,value) {
                     
                       $('#cpassword').nextAll('span').html(value.cpassword[0]);
                       $('#password').nextAll('span').html(value.cpassword[0]);
                       $('#currentpassword').nextAll('span').html(value.currentpassword[0]); 
                    });
                   

                },
                success: function(data) {
                    var display = "";
                    if (data.error) {
                        $.each(data.error, function(key, value) {
                            $('#' + key).nextAll('span').html(value);
                        });
                    } else {
                        alert("your password change successfully");
                        window.location.href = "{{route('admin.dashboard')}}";

                    }

                }
            });
        }


    });
</script>

</html>