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
        <th>Email</th>
         <th>PASSWORD</th> 
         <th>HP</th>
         <th>Action</th>  
    </thead>
    <tbody>
    
      <tr>
        <td>{{$admin->admin_email}}</td>
        <td>{{$admin->admin_password}}</td>
        <td>{{$admin->admin_handphone}}</td>
        <td><button type="button" class="btn btn-info"  id="btnselect" data-toggle="modal" data-target="#myModal">Update</button></td>
     
    </tbody>
  </table>
</div>



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update</h4>
        </div>
        <div class="modal-body">
        <input type="text" id="id" name="id" value="asss" style="display:none"><br>
        <label for="fname">email:</label>
        <input type="email" id="email" name="email" value="{{$admin->admin_email}}"><br><br>
        <label for="lname">password:</label>
        <input type="number" maxlength="8" id="password" name="password" value="{{$admin->admin_password}}"><br><br>
        <label for="lname">HP: </label>
        <input type="number" id="hp" name="hp" value="{{$admin->admin_handphone}}"><br><br>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnsubmit"class="btn btn-default" onclick="saveadmin({{$admin->admin_id}})">Submit</button>
        </div>
      </div>
    </div>
  </div>
  

  @endsection


</body>
</html>




@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
// function admindetail (emel){
// $.ajax({
//     url:  "{{ url('getadmin') }}/" + emel,
//     method: "GET",
//     dataType: 'json',
//     success: function(response) {
//     $('#email').val(response.doc.doctor_name)
//     $('#password').val(response.doc.doctor_position)
//     $('#hp').val(response.doc.doctor_departmentname)
//     $("#btnsubmit").attr("onclick","savedoc("+ emel+ ")");
//     },

// });

// }

function saveadmin(id){

    var email = $('#email').val();
    var password = $('#password').val();
    var hp = $('#hp').val();
    // var id =   $('#id').val();

    $.ajax({
    url:  "{{ url('update_admin') }}/" + id,
    method: "POST",
    data : {
    email : email,
    password : password,
    hp : hp
            },
    dataType: 'json',

    success: function(response) {

        console.log(response.success)
        //$('#myModal').modal('hide');
        location.reload();

    },

});

};


</script>
@endpush
