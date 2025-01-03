<?php
include './empheader.php';
if(isset($_GET['sid'])) {
    $oid = $_GET['sid'];
    mysqli_query($link, "delete from employee where userid='$oid'");
}
$res0 = mysqli_query($link, "select roomno from roomallot where userid='$_SESSION[userid]'");
$r0 = mysqli_fetch_row($res0);
mysqli_free_result($res0);
$result = mysqli_query($link, "select * from complaints where userid='$_SESSION[userid]' or userid in(select userid from roomallot where roomno='$r0[0]')");
    echo "<table class='report_tab'><thead><tr><th colspan='8'>COMPLAINTS LIST<tr>";
    echo "<tr><th>Date<th>User Id<th>Complaint Id<th>Category<th>Description<th>Status<th>Remarks<tbody>";
    while($row= mysqli_fetch_row($result)) {
	echo "<tr>";	
	    echo "<td>$row[1]<td>$_SESSION[ename]<br>[$row[3]]<td>$row[0]<td>$row[5]<td>$row[7]<td>$row[8]<td>$row[9]";
	//echo "<td><a href='viewemps.php?sid=$row[8]' onclick=\"javascript:return confirm('Are You Sure to Delete Staff ?')\">Delete</a>";
    }
    echo "</tbody></table>";
mysqli_free_result($result);
include './footer.php';
?>