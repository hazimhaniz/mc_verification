
@extends("admindashboard")
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

.swal2-popup {
  font-size: 1.5rem !important;
}
  
  </style>

  @endpush
</head>
<body>


@section('content')
<div class="container">
  <h2>Delete Doctor</h2> <br><br>
  <table id="del" class="table">
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
        <td id="del"><button type="button" class="btn btn-danger" id="btnselect" onclick="deletedoc('{{$value->doctor_id}}')">Delete</button></td>
      </tr>
    @endforeach  
    </tbody>
  </table>
</div>

  @endsection


</body>
</html>


@push('scripts')

<script>
$(document).ready(function(){
  

});

$("#del").on('click', '#btnselect', function () {
    $(this).closest('tr').remove();
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
function deletedoc (id){
$.ajax({
    url:  "{{ url('delete_doctor') }}/" + id,
    method: "DELETE",
    dataType: 'json',
    success: function(response) {
      console.log(response.success)
      Swal.fire('deleted', 'Doctor deleted', 'success')
      $('#ss').hide()

    },

});

}

</script>
@endpush
