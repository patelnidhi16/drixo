<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<a class="btn btn primary" href="{{route('pdf')}}">Download</a>

<div class="card m-5">
  <div class="card-body">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Subject</th>
      <th scope="col">Title</th>
      <th scope="col">result</th>
      <th scope="col">Total Mark</th>
    </tr>
  </thead>
  <tbody>
   @foreach($result as $data)
    <tr>
      <td >{{$data->id}}</td>
      <td >{{$data->subject}}</td>
      <td >{{$data->title}}</td>
      <td >{{$data->result}}</td>
      <td >{{$data->total_mark}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
  </div>
</div>



</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>