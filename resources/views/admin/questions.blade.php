@extends('admin.layouts.master')
@push('style')
<link href="{{asset('/admin/assets/css/datetimepicker.css')}}" rel="stylesheet">

@endpush
@section('content')
<style>
    .error {
        color: red;
    }
</style>


<div class="page-content-wrapper" style="margin-left:250px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <br>
                <br>
                <h5 class="page-title m-3">Add Question</h5>

            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-12 p-5">

                                    <form method="POST" action="" accept-charset="UTF-8" class="subject authentication-form" id="add_question">
                                        @csrf

                                        <input type="hidden" id="id" value="{{$id}}" name="subject_name">

                                        <input  type='text' class="launch_date_time form-control mb-3" name="start_time" placeholder="Select start date and time">
                                        <input  type='text' class="launch_date_time form-control mb-3" name="end_time" placeholder="Select end date and time">


                                        <div class="input-group input-group-merge">
                                            <input class="form-control mb-3" id="title" placeholder="Enter Test Title" name="title" type="text"><br>
                                            <span style="color: red;"></span>
                                        </div>
                                        @error('title')
                                        <span style="color:red;">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                        <input type="number" class="total form-control mb-3" name="no_of_question" id="no_of_question" min="1" max="100" placeholder="Select or enter the number of question">

                                        <span></span> @error('no_of_question')
                                        <span style="color:red;">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                        <div id="parents">
                                        </div>
                                        <button type="button" class="enter btn btn-primary">Enter</button>
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
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection
@push('script')
<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}"></script>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>

<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js') }}"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('/admin/assets/js/datetimepicker.js')}}"></script>
<script>
    $('.launch_date_time').datetimepicker({
        
        format: 'M d,Y H:i:s',
        formatTime: 'H:i:s',
        formatDate: 'M d,Y',
        startDate: new Date(),
        minDate: 0
    });

    $(document).on('click', '.add_question', function() {
        id = $('#id').val();

        $('.subject').validate({
            rules: {
                'question[]': {
                    required: true,
                },
                'option1[]': {
                    required: true,
                },

            },
            submitHandler: function(form) {
                $.ajax({
                    url: "/admin/question/" + id,
                    type: 'POST',
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        swal({
                                title: "Deleted!",
                                text: "Your row has been deleted.",
                                type: "success",
                            }),
                            window.setTimeout(function() {
                                window.location.href = "/admin/displaysubject";
                            }, 5000);

                    },
                    error: function(error) {
                        // console.log(error.responseJSON.errors.no_of_question[0]);
                        $('#add_question').find('[name=title]').nextAll('span').html(error.responseJSON.errors.title[0]);


                    }
                });

            },

        });
    });
    $(document).on('click', '.add_question', function(event) {

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
    });


    $i = 0;

    $('.enter').click(function(e) {
        if ($('#title').val() == '' || $('#no_of_question').val() == '') {
            if ($('#title').val() == '') {
                swal('please enter title');
            } else {
                swal('please enter no of question');

            }
        } else {


            $(this).hide();
            e.preventDefault();

            var total = $('.total').val();

            display = "";
            if ($i == 0) {
                for (var i = 1; i <= total; i++) {
                    display += ` <div class="input-group input-group-merge mb-3" >
                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                ` + i + `
                                                </span>
                                            </div>
                                      <div class="input-group-prepend" style=" height: 40px;"></div>
                                    <input class="question form-control"  placeholder="Enter Question ` +
                        i + `" name="question[` + i + `]" type="text"style="margin-right: 10px;" value="{{old('question[` + i + `]')}}">
                                </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                <input type="radio" name="ans[` + i + `]" value="1" class="answer">
                                                </span>
                                            </div>
                                            <input class="option form-control "
                                                placeholder="option1" name="option1[` + i + `]"
                                                type="text" >
                                        </div>
                                        </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                <input type="radio" name="ans[` + i + `]" value="2" class="answer">
                                                    
                                                </span>
                                            </div>
                                            <input class="option form-control "
                                                placeholder="option2" name="option2[` + i + `]"
                                                type="text" >
                                        </div>
                                        </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                <input type="radio" name="ans[` + i + `]" value="3" class="answer">
                                                    
                                                </span>
                                            </div>
                                            <input class="option form-control "
                                                placeholder="option3" name="option3[` + i + `]"
                                                type="text" >
                                        </div>
                                        </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                <input type="radio" name="ans[` + i + `]" value="4" class="answer">
                                                    
                                                </span>
                                            </div>
                                            <input class="option form-control "
                                                placeholder="option4" name="option4[` + i + `]"
                                                type="text" >
                                        </div>
                                    </div>
                           
                                  `;


                }
                display += ` <button class="add_question btn btn-primary" type="submit">Submit</button>`;

                $('#parents').append(display);
            }
            $i++;;
        }

    });
</script>
@endpush