<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Please confirm your account and click on below link</h1>
	<a href="{{ url('/verify_ngo') }}/{{ $verification_string }}">{{ url('/verify_ngo') }}/{{ $verification_string }}</a>
</body>
</html>