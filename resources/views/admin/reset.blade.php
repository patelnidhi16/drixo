<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
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
        .error {
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
                                <div class="col-6 p-5">
                                    <div class="mx-auto mb-5">
                                    <span class="logo-lg">
                                            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2>
                                        </span>
                                    </div>

                                    <h6 class="h5 mb-0 mt-4">Reset Password</h6>
                                    <p class="text-muted mt-1 mb-5">
                                        Enter your email address and we'll send you an email with instructions to reset your password.
                                    </p>
                                    {{Form::open(array('route'=>'admin.forgetmail','method'=>'POST','id'=>'sendemail','class'=>"authentication-form"))}}

                                    
                                        <div class="form-group">
                                        {{Form::label('email','Email Address',array('class'=>'form-control-label'))}}

                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="mail"></i>
                                                    </span>
                                                </div>
                                            {{Form::text('email',null, array('class' => 'form-control','id'=>"email",'placeholder'=>"hello@coderthemes.com"))}}<br>

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Back to <a href="{{route('admin.login')}}" class="text-primary font-weight-bold ml-1">Login</a></p>
                        </div> <!-- end col -->
                    </div>
                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block" type="submit" id="submit_btn"> Submit</button>
                                        </div>
                                        {{Form::close()}}

                                </div>
                                <div class="col-lg-6 d-none d-md-inline-block">
                                    <div class="auth-page-sidebar">
                                        <div class="overlay"></div>
                                        <div class="auth-user-testimonial">
                                            <p class="font-size-24 font-weight-bold text-white mb-1">I simply love it!</p>
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
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>

</body>

<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<script>
    $('#submit_btn').click(function() {
        $('span').html(" ");
    });
    $('#sendemail').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },

        },
        submitHandler: function(form) {
            $.ajax({
                url: '{{route("admin.forgetmail")}}',
                type: 'POST',
                data: new FormData(form),
                processData: false,
                contentType: false,
                error: function(error) {
                    console.log(error);
                    $(error.responseJSON.errors).each(function(key,value) {
                     
                       $('#email').nextAll('span').html(value.email[0]);
                     
                    });
                   
                },
                success: function(data) {
                    alert(data);
                    // window.location.href="{{route('admin.login')}}";

                }
            });
        }


    });
</script>


</html>