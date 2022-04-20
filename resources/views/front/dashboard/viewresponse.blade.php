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
    .label{
      font-weight: 900 !important;
    }
    .mark{
      background-color: #06BBCC;
    font-size: 30px;
    margin-left: 1024px;
}
    
  </style>
</head>
<div class="container-xxl">
  <div class="container">
    <div class="row g-4">
      <div class="card">
      <div class="card-header text-center text-capitalize" style="color:#181d38; font-size: x-large;">{{$question[0]['getsubject'][0]['subject_name']}}</div>
      
        <div class="card-body">
          <div class="mark btn btn-primary lg-5 d-none d-lg-block col-2" style="background-color: #06BBCC;">Total Mark:{{$result[0]['result']}}</div>
          <span id=displayTime style="color: red; margin-left:570px; font-size:20px;"></span>
          <form id="exam" method="POST" action="/storerecord">
            @csrf
          @php
          
        
        
        @endphp
        @foreach($question as $questions)
        <div class="privew">
          <div class="questionsBox">
            <div class="questions">{{$questions['question']}}</div>
            <ul class="answerList">
              @php $i=1; @endphp
              
              @foreach($questions['getoption'] as $opt)
              <li>
                <label class="label">
               
             
                      <input type="radio" name="answer[{{$questions['id']}}]" value="{{$i}}" class="answer" disabled  @if( $questions["getans"][0]["answer"]==$i) id="abc"  @endif  @foreach($questions['getanswer'] as $abc) @if($abc['user_id']==$id) @if($abc['answer'] == $i)checked @endif @endif  @endforeach > {{$opt['option']}}</label>
                  </li>
                  @php $i++; @endphp
                  @endforeach
                </ul>
              </div>
            </div>
            @endforeach
          </form>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('front_script')
<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}"></script>
<script>
    $('input:radio[class="answer"]:checked').each(function(){
    $(this).parent('label').css("border", "3px solid red");
    console.log($(this).attr('dataid'));
  });
  $('input:radio[id="abc"]').each(function() {
    $(this).parent('label').css("border", "3px solid green");
      console.log($(this).val());
  });
</script>
@endpush