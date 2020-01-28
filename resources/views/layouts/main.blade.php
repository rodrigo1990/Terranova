<!DOCTYPE html>
<html lang="en">
<head>
	<?php header('Set-Cookie: cross-site-cookie=bar; SameSite=None; Secure'); ?>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="UTF-8">
	<title>TERRANOVA S.A</title>
	<link rel="stylesheet" href="<?php echo asset("/css/app.css") ?>">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Latest compiled and minified CSS -->
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	
</head>
<body class="">
	@yield('main')

	<div class="fixed-btn" onClick="scrollAnimate('contacto')">
		<p>DEJANOS  <br> <b>TU CONSULTA</b></p>
		<img src="<?php echo asset('/storage/img/icon-fixed-btn.svg') ?>" class="center-block red" alt="">
		<img src="<?php echo asset('/storage/img/icon-fixed-btn-red.svg') ?>" class="center-block white" alt="">
	</div>

	@include('inc.preloader')
	<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkne1gpPfJ0B3KrE4OQURwPi492LDjg8g"></script>

	<script src="<?php echo asset('/js/app.js')  ?>"></script>
	
	
	@yield('scripts')
</body>
</html>