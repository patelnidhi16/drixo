@extends('front.layouts.master')
@section('content')

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <style>
    .privew {
      margin-bottom: 20px;
    }

    .questionsBox {
      display: block;
      border: solid 1px #e3e3e3;
      padding: 10px 20px 0px;
      box-shadow: inset 0 0 30px rgba(000, 000, 000, 0.1), inset 0 0 4px rgba(255, 255, 255, 1);
      border-radius: 3px;
      margin: 0 10px;
    }

    .questions {
      background: #06BBCC;
      color: #FFF;
      font-size: 22px;
      padding: 8px 30px;
      font-weight: 300;
      margin: 0 -30px 10px;
      position: relative;
    }

    .questions:after {
      background: url(../img/icon.png) no-repeat left 0;
      display: block;
      position: absolute;
      top: 100%;
      width: 9px;
      height: 7px;
      content: '.';
      left: 0;
      text-align: left;
      font-size: 0;
    }

    .questions:after {
      left: auto;
      right: 0;
      background-position: -10px 0;
    }

    .questions:before,
    .questions:after {
      background: #2d5c61;
      display: block;
      position: absolute;
      top: 100%;
      width: 9px;
      height: 7px;
      content: '.';
      left: 0;
      text-align: left;
      font-size: 0;
    }

    .answerList {
      margin-bottom: 15px;
    }


    ol,
    ul {
      list-style: none;
    }

    .answerList li:first-child {
      border-top-width: 0;
    }

    .answerList li {
      padding: 3px 0;
    }

    .answerList label {
      display: block;
      padding: 6px;
      border-radius: 6px;
      border: solid 1px #dde7e8;
      font-weight: 400;
      font-size: 13px;
      cursor: pointer;
      font-family: Arial, sans-serif;
    }

    input[type=checkbox],
    input[type=radio] {
      margin: 4px 0 0;
      margin-top: 1px;
      line-height: normal;
    }

    .questionsRow {
      background: #dee3e6;
      margin: 0 -20px;
      padding: 10px 20px;
      border-radius: 0 0 3px 3px;
    }

    .button,
    .greyButton {
      background-color: #f2f2f2;
      color: #888888;
      display: inline-block;
      border: solid 3px #cccccc;
      vertical-align: middle;
      text-shadow: 0 1px 0 #ffffff;
      line-height: 27px;
      min-width: 160px;
      text-align: center;
      padding: 5px 20px;
      text-decoration: none;
      border-radius: 0px;
      text-transform: capitalize;
    }

    .questionsRow span {
      float: right;
      display: inline-block;
      line-height: 30px;
      border: solid 1px #aeb9c0;
      padding: 0 10px;
      background: #FFF;
      color: #06BBCC;
    }
  </style>
</head>
<div class="container-xxl">
  <div class="container">
    <div class="row g-4">
      <div class="card">
        <div class="card-header text-center text-capitalize" style="color:#181d38; font-size: x-large;">{{$question[0]['getsubject'][0]['subject_name']}}</div>
        <div class="card-body">
          <span id=displayTime style="color: red; margin-left:570px; font-size:20px;"></span>
          <center>
            <p id="demo" style="color:red;"></p>
          </center>
          <form id="exam" method="POST" action="/storerecord">
            @csrf
            <input type="hidden" value="{{$question[0]['getsubject'][0]['subject_name']}}" name="subject_name">
            <input type="hidden" value="{{$question[0]['subject_id']}}" name="subject_id">
            <input type="hidden" value="{{$question[0]['title']}}" name="title">
            <input type="hidden" value="{{$end_time}}" name="end_time" id='end_time'>
            @foreach($question as $questions)
            <div class="privew">
              <div class="questionsBox">
                <div class="questions">{{$questions['question']}}</div>
                <ul class="answerList">
                  @php $i=1; @endphp
                  @foreach($questions['getoption'] as $opt)
                  <li>
                    <label>
                      <input type="radio" name="answer[{{$questions['id']}}]" value="{{$i}}" id="answerGroup_0"> {{$opt['option']}}</label>
                  </li>
                  @php $i++; @endphp
                  @endforeach
                </ul>
              </div>
            </div>
            @endforeach
            <div class="card-footer text-muted"> <button class="btn btn-primary btn-block" type="submit" id="submit_btn">Submit
              </button> </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}"></script>
<script>
  $(document).ready(function() {
    var a = $('#end_time').val();
    var countDownDate = new Date(a).getTime();
    var x = setInterval(function() {
      var now = new Date().getTime();
      var distance = countDownDate - now;
      // console.log(distance);
      if (distance <=0) {
        alert("your test time is over. your exam is submitted");
        $('#exam').submit();
      }
      // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      else{
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("demo").innerHTML =hours+":"+ minutes + ":" + seconds ;
      }
    });
//     setTimeout(function() {
//       alert(1);
//       var now = new Date().getTime();
//       var distance = countDownDate - now;
      
//       $('#exam').submit();
//       alert("your test time is over. your exam is submitted");
 
// },distance);
  
  });
</script>