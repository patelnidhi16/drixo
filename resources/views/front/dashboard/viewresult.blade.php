<!DOCTYPE html>
<html>

<head>
  <title>eLearning</title>
  <style>
   .asd {
    box-shadow: -4px -3px 45px 21px rgba(0,0,0,0.15);
    /* box-shadow: -5px -4px 46px 22px rgb(0 0 0 / 13%); */

   }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

  <a class="btn btn-primary float-right m-3" href="{{route('pdf')}}">Download</a>

<br>
  <center>
    <h1>Result</h1>
    <center>
      @if(isset($result[0]))
     
      <div class="card m-4">
        <div class="card-body">
          <div class="card border-2">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Id</th>
                    <td>{{$result[0]['user_id']}}</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Name</th>
                    <td>{{$name}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <br>
          <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Subject</th>
                    <th>Title</th>
                    <th>Result</th>
                    <th>Total Mark</th>

                  </tr>
                </thead>
                <tbody>
                  @php $i=1 @endphp
                  @foreach($result as $data)
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$data->subject}}</td>
                    <td>{{$data->title}}</td>
                    <td><span class="tag tag-success">{{$data->result}}</span></td>
                    <td>{{$data->total_mark}}</td>
                   
                  </tr>
                  @php $i++ @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      @else
      <div class="card mx-5">
  <div class="card-body ">
  You have not attempt any  test yet!! or admin can not return result yet!.
  </div>
</div>
      

      @endif
    



      <!-- ---------------------------------------------------------------------------------------------------------- -->
      



</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>