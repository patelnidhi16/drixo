<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLearning </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('front/assets/img/favicon.jpg')}}" rel="icon">

    <link rel="preconnect" href="{{asset('front/assets/https://fonts.googleapis.com')}}">
    <link rel="preconnect" href="{{asset('front/assets/https://fonts.gstatic.com')}}" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css')}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('front/assets/lib/animate/animate.min.css" rel="stylesheet')}}">
    <link href="{{asset('front/assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('front/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{asset('front/assets/css/style.css')}}" rel="stylesheet">
    <style>
        .view:hover {
            background-color: white !important;
            color: #06bbcc !important;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    @include('front.layouts.header')

    

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{asset('front/assets/img/about.jpg')}}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Welcome </h6>
                    <h1 class="mb-4"> eLearning</h1>
                    <p class="mb-4">eLearning is really an interesting platform for testing student knowledge. </p>
                    <p>It will provide student to an online interface where they give quizzes online. It may contain MCQs format as designed by the admin .</p>
                    <p>The other interface will be controlled by the admin who will responsible to create, design and update the quizzes.</p>
                    <p> The users or students will enter their credential to login and solve a quiz of their choice. </p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Assesment</p>
                        </div> 
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Check knowledge</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Notify when Assign new Quiz</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Display correct and incorrect answer</p>
                        </div>
                       
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Display Result </i></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Download Result</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Footer Start -->
    @include('front.layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('front/assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('front/assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('front/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <!-- sudo composer update --ignore-platform-reqs -->
    <!-- Template Javascript -->
    <script src="{{asset('front/assets/js/main.js')}}"></script>
    @stack('front_script')

</body>

</html>

