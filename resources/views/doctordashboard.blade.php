
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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lrsjng.jquery-qrcode/0.13.0/jquery.qrcode.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  @stack('css')
  <style>
@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');

body {
  overflow-x: hidden;
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
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

.btn.btn-default.btn-md{

margin-top: 8px;

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
        <a href="{{ url("update_account_doc/$loginid") }}">
          <i class="zmdi zmdi-view-dashboard"></i> Update Account
        </a>
      </li>
      <li>
        <a href="{{ url("view_account_doc/$loginid") }}"" >
          <i class="zmdi zmdi-link"></i> View Account
        </a>
      </li>
      <li>
        <a href="{{ url("issue_mc/$loginid") }}">
          <i class="zmdi zmdi-widgets"></i> Issue MC
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
          <li><a href="#">Doctor</a></li>

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


    <!-- <br><br><br><br><br>
<div class="container">
<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#regModal">REGISTER ACCOUNT DR</button>
<button type="button" class="btn btn-warning btn-block" onclick="window.location='{{ route("view_doctor") }}'">VIEW ACCOUNT DR</button>
<button type="button" class="btn btn-primary btn-block"onclick="window.location='{{ route("update_doctor") }}'">UPDATE ACCOUNT DR</button>
<button type="button" class="btn btn-danger btn-block" onclick="window.location='{{ route("delete_doctor") }}'" >DELETE ACCOUNT DR </button>

</div> -->




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
  $(".loader").show()

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

// const $button  = document.querySelector('#sidebar-toggle');
// const $wrapper = document.querySelector('#wrapper');

// $button.addEventListener('click', (e) => {
//   e.preventDefault();
//   $wrapper.classList.toggle('toggled');
// });

</script>
