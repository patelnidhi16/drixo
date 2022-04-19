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
                        <a type="button" style="background-color:#06bbcc; color:white;" class="view" dataid="{{$user['subject_id']}}" title="{{$user['title']}}">View Test</a>
                        <!-- <a type="button" style="background-color:#06bbcc; color:white;" class="view" href="{{route('test',['id'=>$user['subject_id'],'title'=>$user['title']])}}">View Test</a> -->
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

<script>
    $(document).on('click', '.view', function() {
        var id = $(this).attr('dataid');
        var title = $(this).attr('title');
        //    alert(id);
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
                // console.log(data);
                window.location.href = data;
            },
        });
    });
</script>