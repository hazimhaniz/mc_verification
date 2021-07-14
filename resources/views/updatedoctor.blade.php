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
<div class="container">
  <h2>Update Doctor</h2> <br><br>
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
        <td><button type="button" class="btn btn-info"  id="btnselect" onclick="docdetail('{{$value->doctor_id}}')"data-toggle="modal" data-target="#myModal">Update</button></td>
      </tr>
    @endforeach  
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
        <label for="fname">name:</label>
        <input type="text" id="name" name="name" value="asss"><br><br>
        <label for="lname">position:</label>
        <input type="text" id="position" name="position"><br><br>
        <label for="lname">Department</label>
        <input type="text" id="department" name="department"><br><br>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnsubmit"class="btn btn-default" onclick="">Submit</button>
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
  
function docdetail (id){
$.ajax({
    url:  "{{ url('getdoc') }}/" + id,
    method: "GET",
    dataType: 'json',
    success: function(response) {
    $('#name').val(response.doc.doctor_name)
    $('#position').val(response.doc.doctor_position)
    $('#department').val(response.doc.doctor_departmentname)
    $('#id').val(response.id)
    $("#btnsubmit").attr("onclick","savedoc("+ id+ ")");
    },

});

}

function savedoc(id){

    var name = $('#name').val();
    var position = $('#position').val();
    var  department = $('#department').val();
    var id =   $('#id').val();

    $.ajax({
    url:  "{{ url('savedoc') }}/" + id,
    method: "POST",
    data : {
    name : name,
    position : position,
    department : department
            },
    dataType: 'json',

    success: function(response) {

        
        //$('#myModal').modal('hide');
        location.reload();

    },

});

};


</script>
@endpush