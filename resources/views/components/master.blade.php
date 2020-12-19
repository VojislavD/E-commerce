<!DOCTYPE html>
<html>
<head>
	<title>Premium Fashion</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

	<script src="{{ asset('js/app.js') }}" defer></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/solid.min.js" integrity="sha256-JoCB3vT7DUEBtHyKsyjHG/0ab3slcq2L6QnrKf3yO1A=" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/fontawesome.min.js" integrity="sha256-7zqZLiBDNbfN3W/5aEI1OX/5uvck9V0yhwKOA9Oe49M=" crossorigin="anonymous"></script>
</head>
<body>
	{{ $slot }}

	<script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.2.0/turbolinks.js"></script>
	
</body>
</html>