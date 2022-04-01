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
                <div class="row">

                   
                    <div class="table-responsive">
                        {!! $dataTable->table(['class' => 'table table-striped zero-configuration dataTable']) !!}
                    </div>
                    <!-- end col-12 -->
                </div> <!-- end row -->
                <!-- modals -->

            </div> <!-- container-fluid -->

        </div> <!-- content -->
    </div>
</div>
</div>
@endsection
@push('script')
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">

{!! $dataTable->scripts() !!}
<script>
    $(document).on('click', '.request', function() {
        var id = $(this).attr('dataid');
        var a = $(this);
        $.ajax({
            type: "GET",
            url: 'status',
            data: {

                id: id
            },
            success: function(data) {
                console.log(data.status);
                if (data.status == 0) {
                    a.html("Rejected");
                    a.removeClass("badge-success");
                    a.addClass("badge-danger");
                } else {

                    a.html("Approve");
                    a.removeClass("badge-danger");
                    a.addClass("badge-success");
                }
            }
        });

    });
</script>
@endpush