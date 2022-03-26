@extends('admin.layouts.master')
@section('content')
    <div class="account-pages my-5" style="margin-left: 250px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-12 p-5">


                                    <h6 class="h5 mb-0 mt-4">Add Subject</h6>
                                    @php
                                        $i = 1;
                                    @endphp
                                    <form method="POST" action="" accept-charset="UTF-8" id="subject"
                                        class="authentication-form">
                                        <button type="button" class="add btn btn-primary float-right mb-2">+</button>
                                        <div class="form-group mt-4" id="parent">
                                            <div class="input-group input-group-merge" style="margin-bottom: 10px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">

                                                        {{ $i }}
                                                        @php
                                                            $i++;
                                                        @endphp
                                                    </span>
                                                </div>
                                                <input class="form-control" id="question" placeholder="Enter Question"
                                                    name="question" type="text" value="">
                                            </div>

                                            @for ($i = 1; $i <= 4; $i++)
                                                <div class="form-group">
                                                    <div class="input-group input-group-merge">

                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <b>O</b>
                                                            </span>
                                                        </div>
                                                        <input class="form-control" id="question"
                                                            placeholder="option {{ $i }}" name="question"
                                                            type="text" >

                                                    </div>
                                                </div>
                                            @endfor
                                             {{-- <div class="form-group">
                                                    <div class="input-group input-group-merge">

                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                
                                                            </span>
                                                        </div>
                                                        <input class="form-control" id="question"
                                                            placeholder="option {{ $i }}" name="question"
                                                            type="text" >

                                                    </div>
                                                </div> --}}
                                        </div>
                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block col-2" type="submit" id="submit_btn"> Add
                                                Quiz
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->


                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
@push('script')
    <script>
        var q=1;
$('.add').click(function () {
  q++;
    var question=`<div class="input-group input-group-merge" style="margin-bottom: 10px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">`+q+`
                                                    </span>
                                                </div>
                                                <input class="form-control" id="question" placeholder="Enter Question"
                                                    name="question" type="text" value="">
                                            </div>

                                            @for ($i = 1; $i <= 4; $i++)
                                                <div class="form-group">

                                                    <div class="input-group input-group-merge">

                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <b>O</b>
                                                            </span>
                                                        </div>
                                                        <input class="form-control" id="question"
                                                            placeholder="option {{ $i }}" name="question"
                                                            type="text" >

                                                    </div>
                                                </div>
                                            @endfor`;
   $('#parent').append(question);
  });
    </script>
@endpush
