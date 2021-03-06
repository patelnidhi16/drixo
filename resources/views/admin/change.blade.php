<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>eLearning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link href="{{asset('front/assets/img/favicon.jpg')}}" rel="icon">

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .error,
        span {
            color: red;
            margin-left: 33px;
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
                                        <link href="{{asset('front/assets/img/favicon.jpg')}}" rel="icon">

                                        </a>
                                    </div>

                                    <h6 class="h5 mb-0 mt-4">Change Password</h6>
                                    <br><br>
                                    {{Form::open(array('route'=>'admin.change','method'=>'POST','id'=>'change','class'=>"authentication-form"))}}
                                    <div class="form-group" style="display: none;">
                                        {{Form::label('email','Email Address',array('class'=>'form-control-label'))}}
                                        <div class="input-group input-group-merge"  >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="margin-left: 0px;">
                                                    <i class="icon-dual" data-feather="mail"></i>
                                                </span>
                                            </div>
                                            {{Form::hidden('email',$value=Auth::guard('admin')->user()->email, array('class' => 'form-control','id'=>"email",'placeholder'=>"hello@coderthemes.com"))}}<br>
                                          
                                            <span id="servererror"></span>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>







                                    

                                    <div class="form-group mt-4">
                                        {{Form::label('currentpassword','Current Password',array('class'=>'form-control-label'))}}
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="margin-left: 0px;">
                                                    <i class="icon-dual" data-feather="lock"></i>
                                                </span>
                                            </div>
                                            {{Form::password('currentpassword',array('class' => 'form-control','id'=>"currentpassword",'placeholder'=>"Enter your password"))}}<br>
                                          
                                            <span id="servererror"></span>


                                            @error('currentpassword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mt-4">
                                        {{Form::label('password','Password',array('class'=>'form-control-label'))}}
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="margin-left: 0px;">
                                                    <i class="icon-dual" data-feather="lock"></i>
                                                </span>
                                            </div>

                                            {{Form::password('password',array('class' => 'form-control','id'=>"password",'placeholder'=>"Enter your password"))}}<br>
                                           
                                            <span id="servererror"></span>


                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mt-4">
                                        {{Form::label('cpassword','Confirm Password',array('class'=>'form-control-label'))}}
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="margin-left: 0px;">
                                                    <i class="icon-dual" data-feather="lock"></i>
                                                </span>
                                            </div>
                                            {{Form::password('cpassword',array('class' => 'form-control','id'=>"cpassword",'placeholder'=>"Enter your password"))}}<br>
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
                                    {{ Form::close()}}
                                </div>
                                <div class="col-lg-6 d-none d-md-inline-block">
                                    <div class="auth-page-sidebar">
                                        <div class="overlay"></div>
                                        <div class="auth-user-testimonial">
                                        <p class="font-size-24 font-weight-bold text-white mb-1">Quiz Website</p>
                                            <p class="lead">This is quiz website</p>
                                            <p class="lead">Here you will able to attempt test and view result</p>
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
                url: '{{route("admin.change")}}',
                type: 'POST',
                data: new FormData(form),
                processData: false,
                contentType: false,
                error: function(error) {
                    console.log(error);
                    $(error.responseJSON.errors).each(function(key, value) {

                        $('#cpassword').nextAll('span').html(value.cpassword[0]);
                        $('#password').nextAll('span').html(value.cpassword[0]);
                        $('#currentpassword').nextAll('span').html(value.currentpassword[0]);
                    });
php

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