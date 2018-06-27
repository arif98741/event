<?php
ob_start();
date_default_timezone_set('Asia/Dhaka');
define("BASE_URL", 'http://localhost/event/');
//case control
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$path = __DIR__;

function __autoload($class) {
    $path = __DIR__;
    include_once $path . '/classes/' . $class . '.php';
}

include_once $path . '/helper/Helper.php';

error_reporting(E_ALL);

$db = new Database();
$help = new Helper();
$man = new Manage();

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>CGSA</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- Bootstrap Core CSS -->
		<link href="asset/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="asset/css/style.css" rel='stylesheet' type='text/css' />
		<!-- Graph CSS -->
		<link href="asset/css/font-awesome.css" rel="stylesheet"> 
		<!-- jQuery -->
		<!-- lined-icons -->
		<link rel="stylesheet" href="asset/css/icon-font.min.css" type='text/css' />
		<!-- //lined-icons -->
		<!-- chart -->
		<script src="asset/js/Chart.js"></script>
		<!-- //chart -->
		<!--animate-->
		<link href="asset/css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="asset/js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>
		<!--//end-animate--> 
		<!-- Meters graphs -->
		<script src="asset/js/jquery-1.10.2.min.js"></script>
		<!-- Placed js at the end of the document so the pages load faster -->
		
	</head> 	
<nav class="navbar navbar-default">

	    <div class="container">

	        <div class="navbar-header">

	        <a href="index.php" class="navbar-brand">CGSA College</a>

	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">

	           <span class="sr-only">Toggle navigation</span>

		        <span class="icon-bar" ></span>

		        <span class="icon-bar"  ></span>

		        <span class="icon-bar" ></span>

	        </button>

	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->

	    <div class="collapse navbar-collapse pull-right" id="navbar-collapse">

	     <ul class="nav navbar-nav pull-right">
	        <li><a href="index.php"><i class="fa fa-home">&nbsp;</i>Home</a></li>
			        <li><a href="rules.php?action=view&name=history&loc=home">Rules</a></li>
	        <li><a href="registration.php">Registration</a></li>
	
			   <li><a href="payment.php">Payment</a></li>
	         <li><a href="invitationcard.php">Invitation Card</a></li>
	     
	        <li><a href="committee.php">Committee</a></li>
	        <li><a href="newsandevent.php">News & Events</a></li>
	        <li><a href="contact.php">Contact</a></li>
	        
	      </ul>

	    </div>
	</div>
</nav>       