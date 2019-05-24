<!DOCTYPE html>
<html>
<head>
    <title>Verification in process</title>
</head>
<body>
<img src="{{ asset('img/logo-my-robock-violet.png') }}" alt="My Robock">
<br>
Your company has not been validated, you can contact us through the following link:
<a href="{{ route('messenger.create') }}">Go to the link</a>
Or you can see all the information you provided through the link:
<a href="{{ route('certificate.index') }}">Go to the link</a>
</body>
</html>