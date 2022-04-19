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
        
    });
    $(document).on('click', '#assign_test', function() {
        var student = [];
        $("input:checkbox[class=assign_test]:checked").each(function() {
            student.push($(this).attr('dataid'));
        });
        console.log(student);
        
        $.ajax({
            type: "GET",
            url: '/admin/displayresult',
            data: {
                id: student,
            },
            success: function(data) {
               alert(1);
                }
        });

    }); 

</script>
@endpush