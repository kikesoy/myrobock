<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
<img src="{{ asset('img/logo-my-robock-violet.png') }}" alt="My Robock">
<br>
<h2>Welcome to the site {{$user['name']}}</h2>
<br/>
Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
<br/>
<a href="{{ route('users.verification', $user->userVerification->token) }}">Verify Email</a>
</body>
</html>