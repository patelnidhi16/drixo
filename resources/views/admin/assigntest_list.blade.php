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
                        <h5 class="page-title">Assign Test</h5>
                    </div>
                </div>
                <div class="card mx-5">
                    <div class="card-body ">

                        <div class="row">
                            <div class="table-responsive">
                                <select class="form-control col-3" id="subject">
                                    <option>Select Subject Id</option>
                                    @foreach($subject as $sub)
                                    <option>{{$sub['id']}}</option>
                                    @endforeach
                                </select>
                                {!! $dataTable->table(['class' => 'table table-striped zero-configuration dataTable']) !!}
                            </div>
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
    alert(1);
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
    $(function () {
      alert($('#subject').val());
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: "{{ route('admin.assigntest_list') }}",
            data: {
                  d = $('#subject').val(),
              }
          },
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'approved', name: 'approved'},
          ]
      });
    
      $('#approved').change(function(){
          table.draw();
      });
        
    });
</script>
@endpush
