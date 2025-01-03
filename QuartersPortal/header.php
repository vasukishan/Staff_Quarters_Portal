<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Staff Quarters</title>
<link href="pstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="topPan">
	<!--ul>
		<li><a href="#">login</a></li>
		<li class="register"><a href="#" class="register">resister</a></li>
	</ul-->
	<img src="images/logo.gif" alt="Business Events" width="281" height="56" border="0" class="logo" title="E-Leave" />
	</div>
<div id="headerPan">
  <div id="headerleftPan"><img src="images/blank.gif" alt="" width="1" height="1" /></div>
  <div id="headermiddlePan">
  	<div id="menuPan">
		<ul>
			<li class="home"><a href="index.php">Home</a></li>
                        <li><a href="login.php">Login</a></li>
                        <!--li><a href="register.php">Register</a></li-->
		</ul>
	</div>
	<div id="headerbodyPan">
	  <div id="headerleftredPan">
	  	<h2>Quarters<br />
<span></span></h2>
<p><span class="largetext">Staff Quarters Portal</p>
	  </div>
	  <div id="headermiddleredPan"><img src="images/blank.gif" alt="" /></div>
	  <div id="headermorePan"><a href="#"></a></div>
	</div>
  </div>
  <div id="headerrightPan"><img src="images/blank.gif" alt="" width="1" height="1" /></div>
</div>
<div id="bodyPan">
    <?php
    include './db.php';
    ?>