@extends('admin.layouts.master')
@section('content')
<style>
    .error{
        color: red;
    }
    </style>
    <div class="account-pages my-5" style="margin-left: 250px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-12 p-5">
                                    <h6 class="h5 mb-0 mt-4">Add Subject</h6>
                                    @php
                                        $i = 1;
                                    @endphp
                                    <form method="POST" action="" accept-charset="UTF-8" class="subject"
                                        class="authentication-form">
                                        @csrf
                                        <div class="form-group mt-4" id="parent">
                                            <div class="input-group input-group-merge" >
                                                  <div class="input-group-prepend" style=" height: 40px;">
                                                            <span class="input-group-text">
                                                                <b>1</b>
                                                            </span>
                                                        </div>
                                                <input class="form-control"  placeholder="Enter Question"
                                                name="question[]" type="text"style="margin-right: 10px;">
                                                
                                                <button type="button" class="add btn btn-primary float-right mb-2" style="width:35px;">+</button>
                                                    
                                            </div>
                                            @for ($i = 1; $i <= 4; $i++)
                                                <div class="form-group">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <b>O</b>
                                                            </span>
                                                        </div>
                                                        <input class="option form-control "
                                                            placeholder="option {{ $i }}" name="option1[{{$i}}]"
                                                            type="text" >
                                                            <input type="radio" name="ans" value="{{$i}}">
                                                    </div>
                                                </div>
                                            @endfor
                                              <div class="input-group input-group-merge" >
                                                  <div class="input-group-prepend" style=" height: 40px;">
                                                            <span class="input-group-text">
                                                                <b>A</b>
                                                            </span>
                                                        </div>
                                                        <input class="form-control mb-3"  placeholder="Enter Correct Answer"
                                                        name="answer[]" type="text"style="margin-right: 10px;">
                                                        
                                                    
                                            </div>
                                              <div class="input-group input-group-merge" >
                                                  <div class="input-group-prepend" style=" height: 40px;">
                                                            <span class="input-group-text">
                                                                <b>M</b>
                                                            </span>
                                                        </div>
                                                        <input class="form-control mb-3"  placeholder="Enter  Mark"
                                                        name="mark[]" type="text"style="margin-right: 10px;">
                                                        
                                                    
                                            </div>
                                        </div>
                                       
                                       

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block col-2" type="submit" id="submit_btn">
                                                Add Quiz
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
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js')}}"></script>

    <script>
        $('.subject').validate({
            rules:{
                'question[]':{
                    required:true,
                },
                'option[]':{
                    required:true,
                },
                'answer[]':{
                    required:true,
                },
                'mark[]':{
                    required:true,
                    digits:true,
                },
            }
        }); 
         $('form.subject').on('click', function(event) {
                $('.question').each(function() {
                    $(this).rules("add", {
                        required: true
                    })
                });
                $('.option').each(function() {
                    $(this).rules("add", {
                        required: true
                    })
                });
                $('.answer').each(function() {
                    $(this).rules("add", {
                        required: true
                    })
                });
                $('.mark').each(function() {
                    $(this).rules("add", {
                        required: true
                    })
                });
               
            });
        var q = 1;
        $('.add').click(function() {
            q++;
            var question = `<div class="r`+q+`"><div class="input-group input-group-merge" >
                                                  <div class="input-group-prepend" style=" height: 40px;">
                                                            <span class="input-group-text">
                                                              `+q+`
                                                            </span>
                                                        </div>
                                                <input class="question form-control"  placeholder="Enter Question"
                                                name="question[`+q+`]" type="text" style="margin-right: 10px;">
                                                <button type="button" class="remove btn btn-danger float-right mb-2" style="width:35px;" dataid=`+q+`>-</button>
                                                    
                                            </div>

                                            @for ($i = 1; $i <= 4; $i++)
                                                <div class="form-group">
                                            
                                                    <div class="input-group input-group-merge">
                                            
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <b>O</b>
                                                            </span>
                                                        </div>
                                                        <input class="option form-control"  placeholder="option {{ $i }}" name="option`+q+`[{{$i}}]"
                                                            type="text">
                                            
                                                    </div>
                                                </div>
                                            @endfor
                                            <div class="input-group input-group-merge" >
                                                  <div class="input-group-prepend" style=" height: 40px;">
                                                            <span class="input-group-text">
                                                                <b>A</b>
                                                            </span>
                                                        </div>
                                                        <input class="answer form-control mb-3"  placeholder="Enter Correct Answer"
                                                        name="answer[`+q+`]" type="text"style="margin-right: 10px;">
                                                        
                                                    
                                            </div>
                                              <div class="input-group input-group-merge" >
                                                  <div class="input-group-prepend" style=" height: 40px;">
                                                            <span class="input-group-text">
                                                                <b>M</b>
                                                            </span>
                                                        </div>
                                                        <input class="mark form-control mb-3"  placeholder="Enter Mark"
                                                        name="mark[`+q+`]" type="text"style="margin-right: 10px;">
                                                        
                                                    
                                            </div>
                                             </div>`;
                                           
            $('#parent').append(question);
        });

        $(document).on('click','.remove',function(e){
               e.preventDefault();
               
            var id=$(this).attr('dataid');
            $(document).find('.r'+id).remove();
        });
    </script>
@endpush

{{-- <div class="input-group input-group-merge" style="margin-bottom: 10px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">` + q + `
                                                    </span>
                                                </div>
                                                <input class="form-control" id="question" placeholder="Enter Question"
                                                    name="question" type="text" value="">
                                                     <button type="button" class="btn btn-danger mx-3">-</button> 
                                            </div> --}}