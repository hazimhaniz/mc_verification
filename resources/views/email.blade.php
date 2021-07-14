<!DOCTYPE html>
<html>
<head>
    <title> your account have successfully activated</title>
</head>
<body>
    <h3>Hi Dr {{$details['name']}}</h3>

    <p style="color:brown">Use the detail below to login</p>
    
    <p>Login ID: {{ $details['login_id'] }}</p>
    <p>Password: {{ $details['password'] }}</p>
   
    <p>Thank you</p>
</body>
</html>