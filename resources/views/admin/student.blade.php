@extends('admin.layouts.master')
@section('content')
<div id="wrapper">
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-0">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="float-right page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active">Datatable</li>
                            </ol>
                        </div>
                        <h5 class="page-title">User</h5>
                    </div>
                </div>
                <div class="card mx-5">
                    <div class="card-body ">
                        <select class="subject form-control mb-3" name="subject_id" id="subject_id">
                            <option value=''>Select Subject</option>
                        </select>
                        @error('subject_id')
                                                <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                                </span>
                                                @enderror
                        <select class="title form-control mb-3" name="title" id="title">
                            <option value=''>Select Subject First</option>
                        </select>
                        @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                                </span>
                                                @enderror
                        <div class="row">
                            <div class="table-responsive">
                                {!! $dataTable->table(['class' => 'table table-striped zero-configuration dataTable']) !!}
                            </div>
                            <button type="button" class="float-right btn btn-primary " id="assign_test" >Send Mail</button>
                            <!-- end col-12 -->
                        </div>
                    </div>
                </div>

                <!-- end row -->


            </div> <!-- container-fluid -->

        </div> <!-- content -->
    </div>
</div>
</div>
@endsection
@push('script')
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script> -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{!! $dataTable->scripts() !!}
<script>
    // $(document).on('click', '.request', function() {
    //     var id = $(this).attr('dataid');
    //     var a = $(this);
    //     $.ajax({
    //         type: "GET",
    //         url: 'status',
    //         data: {

    //             id: id
    //         },
    //         success: function(data) {
    //             console.log(data.status);
    //             if (data.status == 0) {
    //                 a.html("Rejected");
    //                 a.removeClass("badge-success");
    //                 a.addClass("badge-danger");
    //             } else {

    //                 a.html("Approve");
    //                 a.removeClass("badge-danger");
    //                 a.addClass("badge-success");
    //             }
    //         }
    //     });

    // });

           $(document).on('click','#All',function(){
        if ($(this).prop('checked')==true){
            $("input:checkbox[class=assign_test]").each(function() {
            $(this).prop('checked', true);
        });
        }else{
            $("input:checkbox[class=assign_test]").each(function() {
            $(this).prop('checked', false);
        });
        }
        
    })
  
    $.ajax({
        type: "GET",
        url: '{{route("admin.select_subject")}}',
        data: {
            subject: true,
        },
        success: function(data) {
            display = "<option value=''>Select Subject</option>";
            $.each(data, function(key, value) {
                // console.log(key);
                // console.log(value.id);
                // console.log(value.subject_name);

                display += "<option value=" + value.id + ">" + value.subject_name +
                    "</option>";
            });
            $('.subject').html(display);
        }
    });
    $(document).on('change', '.subject', function() {
        var id = $(this).val();
        $.ajax({
            type: "GET",
            url: '{{route("admin.select_title")}}',
            data: {
                id: id,
            },
            success: function(data) {
                // console.log(data);
                display = "<option value=''>Select title</option>";
                $.each(data, function(key, value) {
                    // console.log(key);
                    // console.log(value.id);
                    console.log(value.title);

                    display += '<option value="' + value.title + '">' + value.title +
                        "</option>";
                });
                $('.title').html(display);
            }
        });
    });
$('#assign_test').click(function(){
  
if($('#subject_id').val()==''){
   swal("Please select subject name")
}
else {

    if($('#title').val()==''){
       swal("Please select title ")
    }
    else{
        $(document).on('click', '#assign_test', function() {
        var student = [];
        $("input:checkbox[class=assign_test]:checked").each(function() {
            student.push($(this).attr('dataid'));
        });
        // console.log(student);
        var subject_name = $('.subject').val();
        var title = $('.title').val();
        $.ajax({
            type: "GET",
            url: 'assign_test',
            data: {
                id: student,
                subject_id: subject_name,
                title: title,
            },
            success: function(data) {
               
                var user=[];
                $.each(data, function(key, value) {
                    // console.log(key);
                    // console.log(value);
                    user.push(value);
                });
                swal("you already assign this test for "+user+" id user. so you are not able to reasign this test. remaining student have assign test");
            }
        });

    }); 
    }
}

});
</script>
@endpush