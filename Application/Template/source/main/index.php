<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		
		<!-- Title -->
		<title>Empty WebPackage</title>
		
		<!-- CSS -->
		<link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
		<link rel="stylesheet" media="screen" href="css/style.css" >
		
		<!-- PRELOAD SCRIPTS -->
		<script src="js/external/matchmedia.js"></script>
		<script src="js/picturefill.js"></script>
		
		<!-- Alternative HTML5 Modernizr -->
		<!--[if lt IE 9]>
		<script src="scripts/dist/html5shiv.js"></script>
		<![endif]-->
		
	</head>
	<body>
	
		<div class="container">
			<div class="row">
				<h1 class="span12">Welcome to WebPackage!</h1>
				<h2 class="span12">A Web-Lab Framework based package.</h2>
			</div>
		</div>
	
		<!-- START CONTENT -->
		<?php echo $content; ?>
	
	
		<!-- END PAGE -->	
		<!-- SCRIPTS -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<script>!window.jQuery && document.write('<script src="js/jquery-1.8.2.min.js"><\/script>')</script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>

	</body>
</html>