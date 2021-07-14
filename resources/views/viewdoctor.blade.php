@extends('admindashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  

</head>
<body>

@section('content')

<div class="container">
  <h2>Doctor list</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Doctor ID</th>     
        <th>Name</th>
        <th>Position</th>
        <th>Department</th>
        <!-- <th>Action</th> -->
      </tr>
    </thead>
    <tbody>
    @foreach($doctor as $key => $value)
      <tr>
        <td>{{$value->doctor_id}}</td>
        <td>{{$value->doctor_name}}</td>
        <td>{{$value->doctor_position}}</td>
        <td>{{$value->doctor_departmentname}}</td>
      </tr>
    @endforeach  
    </tbody>
  </table>
</div>
@endsection



</body>
</html>


</script>
