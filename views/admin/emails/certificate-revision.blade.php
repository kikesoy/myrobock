<!DOCTYPE html>
<html>
<head>
    <title>Verification in process</title>
</head>
<body>
<img src="{{ asset('img/logo-my-robock-violet.png') }}" alt="My Robock">
<br>
One or more of the data provided is not valid, please edit the information of
your company to validate it:
<a href="{{ route('certificate.edit') }}">Go to the link</a>

You can see the information of your company in the following link:
<a href="{{ route('certificate.index') }}">Go to the link</a>

</body>
</html>