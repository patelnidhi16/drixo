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
                                                 <input data-id="{{ $user->id }}" class="toggle-class" type="checkbox"
                                                    data-onstyle="success" data-offstyle="danger"
                                                   data-toggle="toggle" data-on="Approve"  data-off="Requested" {{ $user->status ? 'checked' : '' }}>
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
    
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: 'status',
                data: {
                    status: status,
                    user_id: user_id
                },
                success: function(data) {
                    window.location = '{{ route('admin.approve') }}'
                    // window.location.href = "/student";
                }
            });

        });
    </script>
@endpush
