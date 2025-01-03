<?php
session_start();
ob_start();
if(!isset($_SESSION['userid'])) {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Staff Quarters</title>
<link href="pstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="topPan">	
	<img src="images/logo.gif" alt="Business Events" width="281" height="56" border="0" class="logo" title="E-Leave" />
</div>
<div id="headerPan1">
  <!--div id="headerleftPan"><img src="images/blank.gif" alt="" width="1" height="1" /></div-->
    <div id="menuPan">
        <ul>
            <li class="home"><a href="spwd.php">Change Pwd</a></li>
            <li><a href="emphome.php">Profile</a></li>
            <li><a href="einmates.php">Inmates</a></li>
            <li><a href="ecomplaint.php">Complaints</a></li>
            <li><a href="evcomp.php">Summary</a></li>
            <li><a href="eguest.php">Guest</a></li>
            <li class="contact"><a href="signout.php">SignOut</a></li>
        </ul>
    </div>
	<!--div id="headerbodyPan">
	  <div id="headerleftredPan">
	  	<h2>CIBPRE ENCR<br />
<span>in 2026</span></h2>
<p><span class="largetext">Conditional Identity-based Broadcast Proxy Re-Encryption and Its Application to Cloud Email</p>
	  </div>
	  <div id="headermiddleredPan"><img src="images/blank.gif" alt="" /></div>
	  <div id="headermorePan"><a href="#"></a></div>
	</div-->
  </div>
  <!--div id="headerrightPan"><img src="images/blank.gif" alt="" width="1" height="1" /></div-->

<div id="bodyPan">
    <?php
    include './db.php';
    ?>
    <p class="right"><i>Welcome,</i><b> <?php echo $_SESSION['ename'];?></b></p>