<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Please click on below button to verify your email.</p>
	<a href="{{ url('/reset_password') }}/{{ $verification_string }}" type="button">Reset Password</a>
</body>
</html>