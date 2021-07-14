
@extends("doctordashboard")
<!DOCTYPE html>
<html lang="en">
<head>

  <title>MC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lrsjng.jquery-qrcode/0.13.0/jquery.qrcode.min.js"></script>
  

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  @push('css')
<style>

.modal.modal-wide  {
  width: 80%;
}
/* .modal-wide .modal-body {
  overflow-y: auto;
}
.modal-wide .modal-body {
  overflow-y: auto;
} */

.qr-code-generator {
width: 500px;
margin: 0 auto;
}

.qr-code-generator * {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

#qrcode {
width: 128px;
height: 128px;
margin: 0 auto;
text-align: center;
}

#qrcode a {
font-size: 0.8em;
}

.qr-url, .qr-size {
padding: 0.5em;
border: 1px solid #ddd;
border-radius: 2px;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

.qr-url {
width: 79%;
}

.qr-size {
width: 20%;
}

.generate-qr-code {
display: block;
width: 100%;
margin: 0.5em 0 0;
padding: 0.25em;
font-size: 1.2em;
border: none;
cursor: pointer;
background-color: #e5554e;
color: #fff;
}

</style>  
@endpush

</head>
<body>




<!-- <div id="qrcode"></div> -->

@section('content')
<br> <br><br><br><br><br>


<div class="container">
<form id='issuemc' role="form" method="post" action="{{ url('submit_mc') }}">
@csrf
<div class="row">
        <div class="form-group">
              <label class="control-label col-sm-2" for="patient_name">Patient Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="patient_name" placeholder="Enter enter name" name="patient_name" required> 
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="IC">No I/C:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="IC" placeholder="Enter No I/C" name="IC" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="HP">No H/P:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="HP" placeholder="Enter No H/P" name="HP" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="email">HR Department E-mail:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="">Admission Date:</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="admission_date" placeholder="" name="admission_date" required>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="">Discharge Date:</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="discharge_date" placeholder="" name="discharge_date" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="">issued Date:</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="admission_date" placeholder="" name="issued_date" value="{{date('Y-m-d')}}" required>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Doctor ID:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="doctor_id" placeholder="Enter ID" name="doctor_id" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="">Doctor name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="doctor_name" placeholder="Enter name" name="doctor_name" required> 
              </div>
            </div>


            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10"><br>
                <button type="button" class="btn btn-default" onclick="showotp();">Submit</button>
              </div>
            </div>
            </div>
        </form>
        </div>



 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-body">
                  


        <div class="alert alert-danger" id="error" style="display: none;"></div>

<h3 > One time password authentication </h3>

<div class="alert alert-success" id="successAuth" style="display: none;"></div>

<form> 
    <label id="phonelabel">Phone Number:</label>

    <input type="text" id="number" class="form-control" placeholder="+60 ********"> <br>

    <div id="recaptcha-container"></div> <br>

    <button type="button" id="reqotp" class="btn btn-warning mt-3" onclick="sendOTP();">Request OTP</button> <br><br>
</form>


<div id="enterotp" class="mb-5 mt-5">
    <p>Enter OTP password that is sent to you</p>

    <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>

    <form>
        <input type="text" id="verification" class="form-control" placeholder="Verification code"> <br>
        <button type="button" class="btn btn-primary mt-3" onclick="verify()">Submit</button>
    </form>
</div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



  @endsection


</body>


</html>

@push('scripts')

    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

<script>

//sx = "sssss";
var $j = jQuery.noConflict();
$j(document).ready(function() {
   //$j("#qrcode").qrcode({text: sx});
   $('#enterotp').children().hide(); 
   

});



var verified = false;
function authenticate(){

  $('#myModal').modal('show'); 
  

}

function showotp(){

  $j('#myModal').modal('show'); 
}

 function submitmc()  {

  var form = $("#issuemc");
  

    $.ajax({
        url:  "{{ url('regmc') }}",
        method: "POST",
        data : new FormData(form[0]),
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(response) {
          console.log(response.qr_link);
          //$j("#qrcode").qrcode({text: response.qr_link});
          // alert(response.success)
         
        },

    });

  
}




var firebaseConfig = {
    apiKey: "AIzaSyC8Shl-gOCb29j8uYz89FX91r0HW7FQAes",
    authDomain: "mc-verification.firebaseapp.com",
    projectId: "mc-verification",
    storageBucket: "mc-verification.appspot.com",
    messagingSenderId: "1041107983901",
    appId: "1:1041107983901:web:0af48d8909a96a9dbc70f4"
        };
        firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript">
        window.onload = function () {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        function sendOTP() {
            var number = $("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("Message sent");
                $("#successAuth").show();
                $('#phonenum').children().hide(); 
                $('#recaptcha-container').hide();
                $('#number').hide();
                $('#phonelabel').hide();
                $('#reqotp').hide();
   
                $('#enterotp').children().show();
                
                

            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }

        function verify() {
            var code = $("#verification").val();
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(user);
                $("#successOtpAuth").text("Auth is successful");
                $("#successOtpAuth").show();
                $j('#myModal').modal('hide'); 
                alert("success");
                submitmc();
                location.reload();


            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }




@if(Session::has('2fa'))       
$('#myModal').modal('show'); 
@endif


</script>

@endpush