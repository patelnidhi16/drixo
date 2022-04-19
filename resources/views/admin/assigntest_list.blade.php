@extends('admin.layouts.master')
@push('style')
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endpush
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
                                <select class="form-control col-3" id="subject_filter">
                                    <option>Select Subject </option>
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

   <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{!! $dataTable->scripts() !!}
<script>
    $(document).ready(function(){
        
        $('#assigntestlist-table').on('preXhr.dt', function(e, settings, data) {
           console.log(data);
            data.subject_id = $('#subject_filter').val();
            console.log('=================', $('#subject_filter').val());
        });
        $("#subject_filter").change(function(){
        
            window.LaravelDataTables['assigntestlist-table'].draw();
            
        });
    })
    
</script>

@endpush