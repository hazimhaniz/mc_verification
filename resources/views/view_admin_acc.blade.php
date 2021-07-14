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


  
@push('css')
<style>
.modal .modal-dialog{

width:40%;
height:40%;

/* background-color:brown; */
}
.modal {
overflow-y: auto;
}
</style>
@endpush

</head>
<body>


@section('content')
<div class="container-fluid">
  <h2>Account details</h2>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th> 
        <th>NAME</th>     
        <th>IC</th>
        <th>Email</th>
         <th>PASSWORD</th> 
         <th>HP</th> 
    </thead>
    <tbody>
    
      <tr>
        <td>{{$admin->admin_id}}</td>
        <td>{{$admin->admin_name}}</td>
        <td>{{$admin->admin_ic}}</td>
        <td>{{$admin->admin_email}}</td>
        <td>{{$admin->admin_password}}</td>
        <td>{{$admin->admin_handphone}}</td>

     
    </tbody>
  </table>
</div>


  

  @endsection


</body>
</html>
