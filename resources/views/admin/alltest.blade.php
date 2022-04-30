@extends('admin.layouts.master')
@section('content')
<!-- Button trigger modal -->
@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<!-- <link rel="stylesheet" href='path/to/font-awesome/css/font-awesome.min.css'> -->
<style>
    .error {
        color: red;
    }
</style>
@endpush
<!-- Modal -->

<!--End  Modal -->
<br><br>
<div class="page-content-wrapper" style="margin-left:250px;">
    <div class="container-fluid">
        <div class="row">
           
            
            <div class="col-sm-12">
            @if($title==[])
                
           <center> <h5 class="page-title mx-auto" >No Test is created Yet!!</h5></center>
            @else
           
            <h5 class="page-title">Subject Name:-{{$title[0]['getsubject'][0]['subject_name']}}</h5>
            @endif
            </div>
        </div>
        @if($title!=[])
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-responsive">
                          
                                {!! $dataTable->table(['class' => 'table table-striped zero-configuration dataTable']) !!}

                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
@endif
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->

</div>
@endsection
@push('script')


<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js') }}">
    </script>
<script src="{{ asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js') }}"></script>
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{!! $dataTable->scripts() !!}
<script>
   
</script>

@endpush