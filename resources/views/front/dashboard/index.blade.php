@extends('front.layouts.master')
@section('content')
<style>

    .box6 .title,
    .box6 img,
    .box6:after {
        transition: all .35s ease 0s
    }

    @media only screen and (max-width:990px) {
        .box5 {
            margin-bottom: 30px
        }
    }

   
    .box14,
    .box6 .icon li a,
    .box7,
    .box7 .icon li a,
    .box8,
    .box8 .icon li a {
        text-align: center
    }

   
    .box14 .icon li,
    .box14 .post {
        display: inline-block
    }

    /*********************** Demo - 14 *******************/
    .box14 {
        position: relative
    }

    .box15,
    .box17,
    .box18 {
        box-shadow: 0 0 5px #7e7d7d;
        text-align: center
    }

    .box14:before {
        content: "";
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        transition: all .35s ease 0s
    }

    .box14:hover:before {
        opacity: 1
    }

    .box14 img {
        width: 100%;
        height: 276px
    }

    .box14 .box-content {
        width: 90%;
        height: 90%;
        position: absolute;
        top: 5%;
        left: 5%
    }

    .box14 .box-content:after,
    .box14 .box-content:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        opacity: 0;
        transition: all .7s ease 0s
    }

    .box14 .box-content:before {
        border-bottom: 1px solid rgba(255, 255, 255, .5);
        border-top: 1px solid rgba(255, 255, 255, .5);
        transform: scale(0, 1);
        transform-origin: 0 0 0
    }

    .box14 .box-content:after {
        border-left: 1px solid rgba(255, 255, 255, .5);
        border-right: 1px solid rgba(255, 255, 255, .5);
        transform: scale(1, 0);
        transform-origin: 100% 0 0
    }

    .box14:hover .box-content:after,
    .box14:hover .box-content:before {
        opacity: 1;
        transform: scale(1);
        transition-delay: .15s
    }

    .box14 .title {
        font-size: 21px;
        font-weight: 700;
        color: #fff;
        margin: 15px 0;
        opacity: 0;
        transform: translate3d(0, -50px, 0);
        transition: transform .5s ease 0s
    }

    .box14:hover .title {
        opacity: 1;
        transform: translate3d(0, 0, 0)
    }

    .box14 .post {
        font-size: 14px;
        color: #fff;
        padding: 10px;
        background: #d79719;
        opacity: 0;
        border-radius: 0 19px;
        transform: translate3d(0, -50px, 0);
        transition: all .7s ease 0s
    }

    .box14 .icon,
    .box15 .icon {
        padding: 0;
        list-style: none
    }

    .box14:hover .post {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        transition-delay: .15s
    }

    .box14 .icon {
        width: 100%;
        margin: 0;
        position: absolute;
        bottom: -10px;
        left: 0;
        opacity: 0;
        z-index: 1;
        transition: all .7s ease 0s
    }

    .box14:hover .icon {
        bottom: 20px;
        opacity: 1;
        transition-delay: .15s
    }

    .box14 .icon li a {
        display: block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        border: 1px solid #fff;
        border-radius: 0 16px;
        font-size: 14px;
        color: #fff;
        margin-right: 5px;
        transition: all .4s ease 0s
    }

    .box14 .icon li a:hover {
        background: #d79719;
        border-color: #d79719
    }

    @media only screen and (max-width:990px) {
        .box14 {
            margin-bottom: 30px
        }
    }

  

</style>



<!------------------ Hover Effect Style : Demo - 14 --------------->
<div class="container mt-40">
  
    <div class="row mt-30">
        <div class="col-md-4 col-sm-6">
            <div class="box14">
                <img class="pic-1" src="https://images.unsplash.com/photo-1534644107580-3a4dbd494a95?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80">
                <div class="box-content">
                    <h3 class="title">Exam</h3>
                   
                    <ul class="icon">
                        <li><span class="post"><a href="{{route('displaytest')}}" style=" width: 150px; ">Click to View Exam</a></span></li>
                    </ul> 
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="box14">
                <img class="pic-1" src="https://www.gannett-cdn.com/presto/2021/05/24/PDEM/ba1f5eac-45ff-4cc3-a500-7e5380f93ec0-DSC_9770.jpg?crop=3853%2C2168%2Cx0%2Cy456&width=1200">
                <div class="box-content" class="aa">
                    <h3 class="title">Result</h3>
                    <ul class="icon">
                        <li><span class="post"><a href="{{route('displaystudentresult')}}" style=" width: 150px; ">Click to View Result</a></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>

  
@endsection