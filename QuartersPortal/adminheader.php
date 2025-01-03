<?php
session_start();
ob_start();
if(!isset($_SESSION['adminuserid'])) {
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
    <!--a href="#" style="text-align: center;"--><img src="images/logo.gif" alt="Business Events" width="281" height="56" border="0" class="logo" title="E-Leave" /><!--/a-->
</div>
<div id="headerPan1">
  <!--div id="headerleftPan"><img src="images/blank.gif" alt="" width="1" height="1" /></div-->
    <div id="menuPan">
        <ul>
            <li class="home"><a href="apwd.php">Change Pwd</a></li>
            <li><a href="quarters.php">Quarters</a></li>
            <li><a href="adminhome.php">Staff</a></li>
            <!--li><a href="viewemps.php">View Staff</a></li-->
            <li><a href="allot.php">Allot</a></li>
            <li><a href="avcomp.php">Complaints</a></li>
            <li><a href="areport.php">Report</a></li>
            <li><a href="aguest.php">Guest</a></li>
            <li class="contact"><a href="signout.php">SignOut</a></li>
        </ul>
    </div>
	
  </div>
  <!--div id="headerrightPan"><img src="images/blank.gif" alt="" width="1" height="1" /></div-->

<div id="bodyPan">
    <?php
    include './db.php';
    ?>
    <p class="right"><i>Welcome,</i><b> <?php echo $_SESSION['adminuserid'];?></b></p>