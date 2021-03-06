@extends('front.layouts.master')
@section('content')
<!-- Service Start -->
<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    <h6 class="section-title bg-white text-center text-primary px-3">Your Test</h6>
    <h1 class="mb-5">Remaining Test</h1>
</div>
<div class="container-xxl">
    <div class="container">
        <div class="row g-4">

            @if(count($test)>0)
            @foreach($test as $user )
            @if($user['status']==1)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">{{$user['getsubject'][0]['subject_name']}}</h5>
                        <p>{{$user['title']}}</p>
                        <a type="button" style="background-color:#06bbcc; color:white;" class="view" href="{{route('test',['id'=>$user['subject_id'],'title'=>$user['title']])}}">View Test</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @else
            <h3 style="text-align:center">No test is assign</h3>
            @endif


        </div>
    </div>
</div>
<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    <h6 class="section-title bg-white text-center text-primary px-3">Your Marks</h6>
    <h1 class="mb-5">View Mark</h1>
</div>
<div class="container-xxl">
    <div class="container">
        <div class="row g-4">
            @if(count($result)>0)
            @foreach($result as $user )
            @if($user['status']==1)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">{{$user['subject']}}</h5>
                        <p>{{$user['title']}}</p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @else
            <h3 style="text-align:center">You have not attempt any test yet</h3>
            @endif

        </div>
    </div>
</div>
@endsection