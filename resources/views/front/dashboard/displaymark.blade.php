@extends('front.layouts.master')
@section('content')
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
                        <!-- <a type="button" style="background-color:#06bbcc; color:white;" class="view" subject="{{$user['subject']}}" title="{{$user['title']}}">View Test</a> -->
                        <a type="button" style="background-color:#06bbcc; color:white;" class="view" href="{{route('viewresponse',['subject'=>$user['getslug'][0]['slug'],'title'=>$user['slug']])}}">View Mark</a>

                           
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
<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}"></script>

    <script>
        
    // $(document).on('click', '.view', function() {
    //     alert(1);
    //     var subject = $(this).attr('subject');
    //     var title = $(this).attr('title');
    //     //    alert(id);
    //     $.ajax({
    //         url: "viewresponse/" + subject + "/" + title,
    //         type: 'GET',
    //         data: {
    //             subject: subject,
    //             title: title
    //         },
    //         processData: false,
    //         contentType: false,
    //         success: function(data) {
    //             // console.log(data);
    //             window.location.href = data;
    //         },
    //     });
    // });

    </script>