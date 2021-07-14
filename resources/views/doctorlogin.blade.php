<!DOCTYPE html>
<html lang="en">
<head>
  <title>MC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
  
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);

  </style>
</head>
<body>



<!-- <div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div> -->


<div class="container">
  <h2>Doctor login</h2>
  
    <div class="form-group">
      <label for="email">Login ID:</label>
      <input type="number" class="form-control" id="login_id" placeholder="Enter email" name="login_id">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="button" class="btn btn-default" id="btnsubmit">Login</button>
    <div id="result"> </div>
  
</div>


</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $('#btnsubmit').click(function ()  {

    var login_id = $('#login_id').val();
    var pwd = $('#pwd').val();

    $.ajax({
        url:  "{{ url('doctorLoginCheck') }}/",
        method: "GET",
        data : {
                login_id : login_id,
                pwd : pwd
            },
        dataType: 'json',
        success: function(response) {

          if (response.success){
          window.location.replace("{{ url('doctor_dashboard')}}" + "/" + response.loginid)}

          else if  (response.failed){

            alert("wrong username or password")
            location.reload()

          }
         
        },

    });
});
</script>
