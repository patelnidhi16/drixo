<!DOCTYPE html>
<html>

<head>
    <title>eLearning</title>
    <link href="{{asset('front/assets/img/favicon.jpg')}}" rel="icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<style>
    @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");

    .login-block {
        background: #DE6262;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to bottom, #FFB88C, #DE6262);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        float: left;
        width: 100%;
        height: 960px;
        padding: 150px 0px;
    }

    .banner-sec {
        background: url(https://static.pexels.com/photos/33972/pexels-photo.jpg) no-repeat left bottom;
        background-size: cover;
        min-height: 500px;
        border-radius: 0 10px 10px 0;
        padding: 0;
    }

    .container {
        background: #fff;
        border-radius: 10px;
        box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1);
    }

    .carousel-inner {
        border-radius: 0 10px 10px 0;
    }

    .carousel-caption {
        text-align: left;
        left: 5%;
    }

    .login-sec {
        padding: 50px 30px;
        position: relative;
    }

    .login-sec .copy-text {
        position: absolute;
        width: 80%;
        bottom: 20px;
        font-size: 13px;
        text-align: center;
    }

    .login-sec .copy-text i {
        color: #FEB58A;
    }

    .login-sec .copy-text a {
        color: #E36262;
    }

    .login-sec h2 {
        margin-bottom: 30px;
        font-weight: 800;
        font-size: 30px;
        color: #DE6262;
    }

    .login-sec h2:after {
        content: " ";
        width: 100px;
        height: 5px;
        background: #FEB58A;
        display: block;
        margin-top: 20px;
        border-radius: 3px;
        margin-left: auto;
        margin-right: auto
    }

    .btn-login {
        background: #DE6262;
        color: #fff;
        font-weight: 600;
    }

    .banner-text {
        width: 70%;
        position: absolute;
        bottom: 40px;
        padding-left: 20px;
    }

    .banner-text h2 {
        color: #fff;
        font-weight: 600;
    }

    .banner-text h2:after {
        content: " ";
        width: 100px;
        height: 5px;
        background: #FFF;
        display: block;
        margin-top: 20px;
        border-radius: 3px;
    }

    .banner-text p {
        color: #fff;
    }

    .form-check-input {
        height: 10px;
        width: 10px;
        margin-top: 9px;
    }

    .error {
        color: red;
    }
</style>

<body>

    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Login Now</h2>

                    <form method="POST" class="login-form" action="{{route('login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="text-uppercase">Username</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="password" class="text-uppercase">Password</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-check">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}" style="margin-left: 30px;">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif

                            @if (Route::has('register'))
                            <div class="row">
                                <div class="col-8">
                                Don't have an account?
                                </div>
                                <div class="col-4">
                                <a class="nav-link" href="http://127.0.0.1:8000/register" style="margin-left: -64px;margin-top: -8px;"> Register</a>
                                </div>
                            </div>
                            <!-- <p>Don't have an account?
                                <a class="nav-link" href="{{ route('register') }}"> {{ __('Register') }}</a>
                            </p> -->
                            @endif
                            <!-- <button type="submit" class="btn btn-login ">Submit</button> -->
                        </div>
                        <button type="submit" class="btn btn-login float-center  ">
                            {{ __('Login') }}
                        </button>

                    </form>
                    <div class="copy-text">Created with <i class="fa fa-heart"></i> by Grafreez</div>
                </div>
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <div class="banner-text">
                                            <h2 style="color: black;">Quiz Website</h2>
                                            <h4 style="color: black;">This is quiz website</h4>

                                            <h6 style="color: black;">Here you will able to attempt test and view your result</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
    </section>

</body>

</html>
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js')}}"></script>

<script>
    $('.login-form').validate({
        rules: {
            email: {
                required: true,
            },
            password: {
                required: true,
            },
        },

    });
</script>