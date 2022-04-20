@extends('front.layouts.master')
@section('content')
<a class="btn btn-primary" href="{{route('result',[$subject_name,$title])}}">Result</a>
@endsection
