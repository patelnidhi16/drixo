@extends('admin.layouts.master')
@section('content')
    <div id="wrapper">
        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row page-title">
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb" class="float-right mt-1">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Shreyu</a></li>
                                    <li class="breadcrumb-item"><a href="#">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Calendar</li>
                                </ol>
                            </nav>
                            <h4 class="mb-1 mt-0">User</h4>
                        </div>
                    </div>
                    <div class="row">
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>


                                </tr>
                                @foreach ($data as $user)
                                    <tr>
                                        <td> {{ $user->id }}</td>
                                        <td> {{ $user->name }}</td>
                                        <td> {{ $user->email }}</td>
                                        <td>
                                           @if($user->status==0)
                                               <button class="request badge badge-pill badge-danger" dataid="{{$user->id}}">Rejected</button>
                                               @else
                                               <button class="request badge badge-pill badge-success" dataid="{{$user->id}}">Approve</button>
                                               @endif                                       
                                            </td>
                                     
                                    </tr>
                                @endforeach
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
    
        $(document).on('click','.request',function() {
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
                    if(data.status == 0)
                    {
                        a.html("Rejected");
                        a.removeClass("badge-success");
                        a.addClass("badge-danger");
                    }
                    else{
                        
                        a.html("Approve");
                        a.removeClass("badge-danger");
                        a.addClass("badge-success");
                    }
                }
            });

        });
    </script>
@endpush
