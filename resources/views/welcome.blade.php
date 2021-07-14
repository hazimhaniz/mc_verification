<!DOCTYPE html>
<html lang="en">
<head>
  <title>MC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <style>
  .swal2-popup {
  font-size: 1.6rem !important;
}
  
  </style>
</head>
<body>


<div class="container">
  <h2>Log in as:</h2>
  <button type="button" class="btn btn-info" onclick="window.location='{{ route("adminLogin") }}'"> Admin </button>
  
  
  <button type="button" class="btn btn-primary" onclick="window.location='{{ url("doctor_login") }}'" >Doctor</button>

    

    <form method="get" action =" {{url("checkmc")}}" >
  <br><br><br><br>
  <h3>Check Medical certificate:</h3>
  <div class="form-group">
      <label for="mc">MC ID:</label>
      <input type="number" class="form-control" id="mc" placeholder="Enter MC ID" name="mc" required> 
    </div>
    <label for="mcd">MCd ID:</label>
      <input type="number" class="form-control" id="mcd" placeholder="Enter MC ID" name="mcd" required> 
    <button type="submit" class="btn btn-default" >Check</button>
    </form>


</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
<script>

@if(session()->has('fail'))

Swal.fire('Ooooops', 'MC ID not exist !', 'error').then((result) => {
  // Reload the Page
  location.reload();
});
@endif
</script>