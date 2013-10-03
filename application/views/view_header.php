<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Placemap v2</title>
		
		<link rel="stylesheet" href="<?php echo site_url("public/css/reset.css") ?>" />
		<link rel="stylesheet" href="<?php echo site_url("public/css/mainstyle.css") ?>" />

		<!--LOAD PLUGINS -->

			<!--jQuery & jQueryUI -->
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<link rel="stylesheet" href="<?php echo site_url("public/plugins/ui-lightness/jquery-ui-1.10.3.custom.min.css") ?>" />
			<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

			<!--fancybox-->
			<link rel="stylesheet" href="<?php echo site_url("public/plugins/fancybox/source/jquery.fancybox.css?v=2.1.5") ?>" type="text/css" media="screen" />
			<script type="text/javascript" src="<?php echo site_url("public/plugins/fancybox/source/jquery.fancybox.pack.js?v=2.1.5") ?>"></script>

			<!--Google Maps API v3 w/ API key-->
			<script type="text/javascript"
		  			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD93JNhuGDGJKKgp8JGBpj60bDbbpMgJis&amp;sensor=true">
		    		</script>
		
	    <?php
	    	//Load dynamic JS files
	    	foreach($js as $jsfile){
	    		echo '<script src="'.site_url('public/js/'.$jsfile).'" ></script>';
	    	}

	    ?>
	 
	</head>

	<body>
		<div id="container">
			<header>
				<h1>Placemap poo2</h1>
				<h2>Michael Toth</h2>
			</header>

			<nav>
				<ul>
					<li><a href="<?php echo site_url("home") ?>">Home</a></li>	
					<li><a href="<?php echo site_url("map") ?>">Map</a></li>
					<?php if($this->session->userdata('userlevel')=="admin"){ ?>
						<li><a href="<?php echo site_url("admin") ?>">Admin</a></li>
					<?php } ?>
					<li><a href="<?php echo site_url("dbinit") ?>">DBINIT</a></li>
				</ul>
			</nav>
		
			
			<div id="content">
			<input id="session_email" type="hidden" value="<?php echo $this->session->userdata('email') ?>" />
