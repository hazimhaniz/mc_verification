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


<style>

/* 
.qr-code-generator {
width: 250px;
margin: 0 auto;
}

.qr-code-generator * {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

#qrcode {
width: 64px;
height: 64px;
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
width: 59%;
}

.qr-size {
width: 10%;
}

.generate-qr-code {
display: block;
width: 50%;
margin: 0.5em 0 0;
padding: 0.25em;
font-size: 1.2em;
border: none;
cursor: pointer;
background-color: #e5554e;
color: #fff;
}  */

.container .col-lg-8{
    background-color:	#E8E8E8;
    padding-top: 10px;
    font-size: 18px;

}

/* #qrcode {  
            width: 64px;  
            height: 64px;  
            margin-right: 14px;  
        }  
     */

</style>  

</head>
<body>
<br><br><br>


<br><br><br><br>

<div class="container">

  <div class="row">
    <div class="col-lg-8">
    
    <P>No: {{ $details['mcid'] }}</P>
    <p>Nama: {{ $details['name'] }}</p>
    <p>No IC: {{ $details['ic'] }}</p>
    <p>HP: {{ $details['HP'] }}</p>
    <p>HR E-mail:  {{ $details['emel'] }}</p>
    <P>Pesakit di atas menerima cuti sakit pada  {{ date("d M Y", strtotime( $details['admission_date'])) }} hingga {{  date("d M Y",strtotime( $details['discharge_date'])) }} Tempoh cuti sakit selama {{$diff}} Hari.</P>
    <p>Nama Doktor: {{$details['doktor_name']}}</p>
    <p>Tarikh: {{date("d M Y",strtotime($details['date_issued']))}}</p>
    <br>
    <div id="qrcode"></div>
    
    
    </div>

</div>


</body>
</html>
<script>

$(document).ready(function() {
  $("#qrcode").qrcode({text:"http://localhost/mc_verification/public/mcqr/" + {{$details['mcid'] }}} );

});



@if(Session::has('2fa'))       
$('#myModal').modal('show'); 
@endif


</script>