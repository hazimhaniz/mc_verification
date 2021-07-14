<!DOCTYPE html>
<html lang="en">
<head>
  <title>MC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  @stack('css')
  <style>
@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');

body {
  overflow-x: hidden;
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
}

.btn.btn-default.btn-md{

margin-top: 8px;

}

/* Toggle Styles */

#viewport {
  padding-left: 250px;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#content {
  width: 100%;
  position: relative;
  margin-right: 0;
}

/* Sidebar Styles */

#sidebar {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 250px;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
  background: #37474F;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#sidebar header {
  background-color: #263238;
  font-size: 20px;
  line-height: 52px;
  text-align: center;
}

#sidebar header a {
  color: #fff;
  display: block;
  text-decoration: none;
}

#sidebar header a:hover {
  color: #fff;
}


#sidebar .nav a{
  background: none;
  border-bottom: 1px solid #455A64;
  color: #CFD8DC;
  font-size: 14px;
  padding: 16px 24px;
}

#sidebar .nav a:hover{
  background: none;
  color: #ECEFF1;
}

#sidebar .nav a i{
  margin-right: 16px;
}





    .modal .modal-dialog{

      width:80%;
      height:80%;
      
      /* background-color:brown; */
    }

    .modal {
  overflow-y: auto;
}

.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  margin-left: 40%;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
  </style>

</head>
<body>

<div id="viewport">
  <!-- Sidebar -->
  <div id="sidebar">

    <ul class="nav">


    <li>
        <a href="#">
          <i class="zmdi zmdi-view-dashboard "></i>
        </a>
      </li>
      

      <li>
        <a href="#" data-toggle="modal" data-target="#regModal">
          <i class="zmdi zmdi-view-dashboard"></i> Register Doctor
        </a>
      </li>
      <li>
      <a href='{{ route("view_doctor") }}'>
          <i class="zmdi zmdi-link"></i> View Doctor
        </a>
      </li>
      <li>
        <a href='{{ route("update_doctor") }}'>
          <i class="zmdi zmdi-widgets"></i> Update Doctor
        </a>
      </li>
      <li>
        <a href='{{ route("delete_doctor") }}'>
          <i class="zmdi zmdi-calendar"></i> Delete Doctor
        </a>
      </li>
      <li>
        <a href='{{ route("update_admin") }}'>
          <i class="zmdi zmdi-info-outline"></i> Update My Account
        </a>
      </li>
      <li>
        <a href='{{ route("view_admin") }}'>
          <i class="zmdi zmdi-settings"></i> View My Account
        </a>
      </li>
    
    </ul>
  </div>
  <!-- Content -->


  <div id="content">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="#"><i class="zmdi zmdi-notifications text-danger"></i>
            </a>
          </li>
          <li><a href="#">Admin</a></li>

          <li> 

<button type="button" class="btn btn-default btn-md" onclick="window.location='{{ url("/") }}'">
<span class=" glyphicon glyphicon-log-out
" aria-hidden="true"></span> Log out
</button> 
</li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid">
     


    @yield('content')

<!-- 
    <br><br><br><br><br>
<div class="container">
<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#regModal">REGISTER ACCOUNT DR</button>
<button type="button" class="btn btn-warning btn-block" onclick="window.location='{{ route("view_doctor") }}'">VIEW ACCOUNT DR</button>
<button type="button" class="btn btn-primary btn-block"onclick="window.location='{{ route("update_doctor") }}'">UPDATE ACCOUNT DR</button>
<button type="button" class="btn btn-danger btn-block" onclick="window.location='{{ route("delete_doctor") }}'" >DELETE ACCOUNT DR </button>

</div> -->


<form id='regdoc' role="form" method="post" action="{{ route('regdoc') }}">
@csrf
<div class="modal fade" id="regModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register doctor</h4>
        </div>
        <div class="modal-body">
        <div class="row">  <br><br><br>
        <div class="form-group">
              <label class="control-label col-sm-2" for="name" >Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Enter enter name" name="name"  required>
              </div>
            </div>


            <br><br><br><br>

            <div class="form-group">
              <label class="control-label col-sm-2" for="department">Department:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="department" placeholder="Enter department" name="department" required>
              </div>
            </div>

            <br><br><br><br>

            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
              </div>
            </div>


            <br><br><br><br>

            <div class="form-group">
              <label class="control-label col-sm-2" for="docloginid">Doctor Login ID:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="docloginid" placeholder="Enter doctor login id" name="docloginid" required>
              </div>
            </div>


           <br><br><br>
            <div id="loader" class="loader"></div>
             
      
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10"><br>
                <button type="submit" onclick="submitdoc()" class="btn btn-default">Register</button>
              </div>
            </div>
            </div>

            <br><br><br><br>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        

  </form>



    </div>
  </div>
</div>




</body>
</html>



@stack('scripts')
<script>


$(document).ready(function(){

$(".loader").hide()

});


 function submitdoc ()  {
  // $(".loader").show()

  var form = $("#regdoc");
    $.ajax({
        url:  "{{ route('regdoc') }}",
        method: "POST",
        data : new FormData(form[0]),
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(response) {
          alert(response.success)
          location.reload()
         
        },

    });


}


// @if(Session::has('loading'))       
// $(".loader").hide()
// @endif


// const $button  = document.querySelector('#sidebar-toggle');
// const $wrapper = document.querySelector('#wrapper');

// $button.addEventListener('click', (e) => {
//   e.preventDefault();
//   $wrapper.classList.toggle('toggled');
// });
</script>