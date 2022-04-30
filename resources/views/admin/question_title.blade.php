@extends('admin.layouts.master')
@section('content')
<!-- Button trigger modal -->


<head>
      <link href="{{asset('/admin/assets/css/datetimepicker.css')}}" rel="stylesheet">

      <style>
            .error {
                  color: red;
            }
      </style>
</head>

<!-- Button trigger modal -->
<br>
<br>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <form method="POST" accept-charset="UTF-8" class="question_update authentication-form">
                              @csrf
                              <div class="form-group">
                                    <div class="input-group input-group-merge">
                                          <input type="text" class="launch_date_time form-control mb-0" name="start_time" id="start_time" autocomplete="off" placeholder="Select start date and time">
                                    </div>
                              </div>
                              <div class="form-group">
                                    <div class="input-group input-group-merge">
                                          <input type="text" class="launch_date_time form-control mb-0" name="end_time" id="end_time" autocomplete="off" placeholder="Select end date and time">
                                    </div>
                              </div>


                              <div class="form-group mt-4" id="parent">
                                    <input type="hidden" class="id" name="id">
                                    <div class="input-group input-group-merge">
                                          <div class="input-group-prepend" style=" height: 40px;">
                                                <span class=" input-group-text">
                                                      <b>Q</b>
                                                </span>
                                          </div>
                                          <input class="question form-control mb-3" name="question" type="text">
                                    </div>
                                    @for ($i = 1; $i <= 4; $i++) <div class="form-group">
                                          <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <input type="radio" name="answer" class="answer{{$i}} ans" value="{{$i}}">
                                                      </span>
                                                </div>
                                                <input class="option{{$i}} form-control " name="option[{{$i}}]" type="text">
                                          </div>
                              </div>
                              @endfor

                  </div>
                  <div class="form-group mb-0 text-center row">
                        <button class="btn btn-primary btn-block col-4 ml-3" type="submit" id="submit_btn">
                              Update
                        </button>
                        <button type="button" class="btn btn-secondary col-2 mx-1 exit" data-dismiss="modal">Close</button>

                  </div>
                  </form>
            </div>

      </div>
</div>
</div>


<div class="page-content-wrapper" style="margin-left:250px;">
      <div class="container-fluid">
            <div class="row">
                  <div class="col-sm-12">
         <h5 class="page-title">Title:-{{$question[0]['title']}}</h5>
                  </div>
            </div>

            <div class="row">
                  <div class="col-12">
                        <div class="card m-b-30">
                              <div class="card-body">
                                    <table id="datatable-buttons abc" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                          <thead>
                                                <tr>
                                                      <th>ID</th>
                                                      <th>Question</th>
                                                      <th>Option1</th>
                                                      <th>Option2</th>
                                                      <th>Option3</th>
                                                      <th>Option4</th>
                                                      <th>Answer</th>
                                                      <th>Start Time</th>
                                                      <th>End Time</th>
                                                      <th>Action</th>
                                                </tr>
                                          </thead>
                                          <tbody>

                                                @foreach($question as $key=>$questions)
                                                <tr>

                                                      <td>{{$questions['id']}}</td>

                                                      <td>{{$questions['question']}}</td>
                                                      @foreach($question[$key]['getoption'] as $x)
                                                      <td>
                                                            {{$x['option']}}
                                                      </td>
                                                      @endforeach
                                                      <td>
                                                            {{$question[$key]['getans'][0]['answer']}}
                                                      </td>
                                                      <td>

                                                            {{$question[0]['start_time']}}
                                                      </td>
                                                      <td>
                                                            {{$question[0]['end_time']}}

                                                      </td>
                                                      <td><button type="button" class="edit btn btn-success" data-toggle="modal" data-target="#exampleModal" dataid="{{$questions['id']}}">Edit</button></td>
                                                </tr>
                                                @endforeach



                                          </tbody>

                                    </table>

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

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

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
      $(document).on('click', '.edit', function() {
            var id = $(this).attr('dataid');
            $.ajax({
                  headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: '{{ route("admin.editquestion") }}',
                  type: 'get',
                  data: {
                        id: id
                  },
                  success: function(data) {
                        $('.question').val(data.question);
                        $('.id').val(data.id);
                        $('.option1').val(data.getoption[0].option);
                        $('.option2').val(data.getoption[1].option);
                        $('.option3').val(data.getoption[2].option);
                        $('.option4').val(data.getoption[3].option);
                        $('#start_time').val(data.start_time);
                        $('#end_time').val(data.end_time);
                        $(".answer" + data.getans[0].answer).each(function() {
                              $(this).attr('checked', true);
                        });
                  }
            });
            });
      
      $('.question_update').validate({

            submitHandler: function(form) {
                  swal({
                              title: "Are you sure?",
                              text: "Once deleted, you will not be able to recover this imaginary file!",
                              icon: "warning",
                              buttons: true,
                              dangerMode: true,

                        })
                        .then((willDelete) => {
                              if (willDelete) {
                                    $.ajax({
                                          headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          },
                                          url: '{{ route("admin.updatequestion") }}',
                                          type: 'POST',
                                          data: new FormData(form),
                                          processData: false,
                                          contentType: false,
                                          success: function(data) {
                                                $('#exampleModal').modal('hide');

                                          },
                                    });
                                    swal("Poof! Your imaginary file has been deleted!", {
                                          icon: "success",
                                    });
                              } else {
                                    swal("Your imaginary file is safe!");
                                    $('#exampleModal').modal('hide');
                              }
                        });

            }
      });
</script>
@endpush