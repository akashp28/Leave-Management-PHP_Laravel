<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>

<body>
    <h2>Hello {{$user->name}}</h2>
    <h4>Please Click the below link to Reset Your Password</h4>
    <a href="{{route('reset.password',$token)}}">Reset Password</a>
</body>

</html>