@extends('admin.layouts.master')
@section('content')
<!-- Button trigger modal -->
@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" href='path/to/font-awesome/css/font-awesome.min.css'>
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
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                        <li class="breadcrumb-item active">Datatable</li>
                    </ol>
                </div>
                <h5 class="page-title">Subject Name:-{{$subject_name}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Id</th>
                                    
                                    <th>Test Title</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    @foreach($title as $user)
                                    <td>{{$user->id}}</td>
                                   
                                    <td>{{$user->title}}</td>
                                    <td><a class="display_title btn btn-primary" title="{{$user->title}}" dataid="{{$user->subject_id}}" href="{{route('admin.display_title',[$user->subject_id,$user->title])}}">View Question</a></td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->

</div>
@endsection
@push('script')


<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js') }}">
</script>
<script src="{{ asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js') }}"></script>
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
   
</script>

@endpush