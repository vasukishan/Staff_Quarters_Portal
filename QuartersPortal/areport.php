<?php
include './adminheader.php';
$result = mysqli_query($link, "select count(*) from complaints");
$row = mysqli_fetch_row($result);
echo "<table class='report_tab' style='width:95%;' border='1'><thead><tr>";
echo "<th width='50%'>Total No. of Complaints Registered<th style='text-align:center;'>$row[0]";
echo "</thead></table>";
mysqli_free_result($result);
echo "<hr>";
$result = mysqli_query($link, "select * from complaints where cstatus='InProgress'");
    echo "<table class='report_tab' style='width:95%;'><thead><tr><th colspan='8'>COMPLAINTS IN PROGRESS<tr>";
    echo "<tr><th>Date<th>User Id<th>Room No<th>Mobile<th>Category<th>Avail.Time<th>Description<tbody>";
    while($row= mysqli_fetch_row($result)) {
	echo "<tr>";
	    echo "<td>$row[1]<td>$row[3]<td>$row[2]<td>$row[4]<td>$row[5]<td>$row[6]<td>$row[7]";	
    }
    echo "</tbody></table>";
mysqli_free_result($result);
echo "<hr>";
$result = mysqli_query($link, "select * from complaints where cstatus!='InProgress'");
    echo "<table class='report_tab' style='width:95%;'><thead><tr><th colspan='8'>RESOLVED COMPLAINTS<tr>";
    echo "<tr><th>Date<th>User Id<th>Room No<th>Mobile<th>Category<th>Avail.Time<th>Description<th>Status<th>Remarks<tbody>";
    while($row= mysqli_fetch_row($result)) {
	echo "<tr>";
	echo "<td>$row[1]<td>$row[3]<td>$row[2]<td>$row[4]<td>$row[5]<td>$row[6]<td>$row[7]<td>$row[8]<td>$row[9]";	
    }
    echo "</tbody></table>";
mysqli_free_result($result);
include './footer.php';
?>