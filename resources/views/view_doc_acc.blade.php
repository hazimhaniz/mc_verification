@extends('doctordashboard')
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
        <th>HP NO</th>     
        <th>Password</th>
        <th>Email</th>
         <th>Login ID</th> 
         <th>IC</th> 
         <th>Position</th>
         <th>Department</th>
         <th>Register date</th>
      </tr>
    </thead>
    <tbody>
    
      <tr>
        <td>{{$doctor->doctor_id}}</td>
        <td>{{$doctor->doctor_hpno}}</td>
        <td>{{$doctor->doctor_password}}</td>
        <td>{{$doctor->doctor_email}}</td>
        <td>{{$doctor->doctor_loginid}}</td>
        <td>{{$doctor->doctor_ic}}</td>
        <td>{{$doctor->doctor_position}}</td>
        <td>{{$doctor->doctor_departmentname}}</td>
        <td>{{$doctor->doctor_reg_date}}</td>
      </tr>
     
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
        <!-- <input type="text" id="id" name="id" value="asss" style="display:none"><br> -->
        <label for="fname">New Hp No:</label>
        <input type="text" id="hp" name="hp" value="{{$doctor->doctor_hpno}}"><br><br>
        <label for="lname">New Password:</label>
        <input type="text" id="pwd" name="pwd" value="{{$doctor->doctor_password}}"><br><br>
        <label for="lname">new Email: </label>
        <input type="text" id="email" name="email" value="{{$doctor->doctor_email}}" ><br><br>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnsubmit"class="btn btn-default" onclick="savedoc('{{$loginid}}')">Update</button>
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
  
// function docdetail (id){
// $.ajax({
//     url:  "{{ url('getdoc') }}/" + id,
//     method: "GET",
//     dataType: 'json',
//     success: function(response) {
//     $('#name').val(response.doc.doctor_name)
//     $('#position').val(response.doc.doctor_position)
//     $('#department').val(response.doc.doctor_departmentname)
//     $('#id').val(response.id)
//     $("#btnsubmit").attr("onclick","savedoc("+ id+ ")");
//     },

// });

// }

// $(document).ready(function(){

//   console.log("ssss");

// })

function savedoc(loginid){

    var hp = $('#hp').val();
    var pwd = $('#pwd').val();
    var email = $('#email').val();
    // var id =   $('#id').val();

    $.ajax({
    url:  "{{ url('update_doc') }}" + "/" + loginid,
    method: "POST",
    data : {
    hp : hp,
    password : pwd,
    email : email
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