<?php
include './adminheader.php';
if(isset($_GET['cid'])) {
    $cid = $_GET['cid'];
    mysqli_query($link, "update complaints set cstatus='Accepted' where id='$cid'");
}
$result = mysqli_query($link, "select * from complaints where cstatus='InProgress'");
    echo "<table class='report_tab'><thead><tr><th colspan='9'>COMPLAINTS LIST<tr>";
    echo "<tr><th>Date<th>User Id<th>Room No<th>Mobile<th>Category<th>Avail.Time<th>Description<th>Task<tbody>";
    while($row= mysqli_fetch_row($result)) {
	echo "<tr>";
	    echo "<td>$row[1]<td>$row[3]<td>$row[2]<td>$row[4]<td>$row[5]<td>$row[6]<td>$row[7]";
	echo "<td><a href='avcomp.php?cid=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Accept ?')\">Accept</a> | <a href='avcomp1.php?cid=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Reject ?')\">Reject</a>";
    }
    echo "</tbody></table>";
mysqli_free_result($result);
include './footer.php';
?>