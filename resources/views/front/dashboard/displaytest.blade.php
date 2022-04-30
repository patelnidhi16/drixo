@extends('front.layouts.master')
@section('content')
<!-- Service Start -->
<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    <h6 class="section-title bg-white text-center text-primary px-3">Your Test</h6>
    <h1 class="mb-5">Remaining Test</h1>
</div>

@php
use Carbon\Carbon;
$today_date = Carbon::now('Asia/Kolkata');
$today_date = Carbon::now('Asia/Kolkata')->format('M d,Y H:i:s');
@endphp

<div class="container-xxl">
    <div class="container">
        <div class="row g-4">

            @if(count($test))
            @foreach($test as $key=>$a)

            @if($a['status']==1 && $today_date>=$a['gettime'][0]['start_time'] && $today_date<=$a['gettime'][0]['end_time']) <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">{{$a['getsubject'][0]['subject_name']}}</h5>
                        <p>{{$a['title']}}</p>

                        <a type="button" style="background-color:#06bbcc; color:white;" class="view" dataid="{{$a['getsubject'][0]['slug']}}" title="{{$a['slug']}}">View Test</a>

                    </div>
                </div>
        </div>
        @else
        @if($loop->first)
        <h4 style="text-align:center">No test is assign</h3>
            @endif
            @endif
            @endforeach
            @else
            <h4 style="text-align:center">No test is assign</h3>
                @endif
    </div>
</div>
</div>





@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('/admin/assets/js/datetimepicker.js')}}"></script>


<script>
    $(document).on('click', '.view', function() {
        var id = $(this).attr('dataid');
        var title = $(this).attr('title');

        $.ajax({
            url: "test/" + id + "/" + title,
            type: 'GET',
            data: {
                id: id,
                title: title
            },
            processData: false,
            contentType: false,
            success: function(data) {

                window.location.href = data;
            },
        });
    });
</script>