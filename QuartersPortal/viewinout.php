<?php
include './adminheader.php';
if(isset($_GET['sid'])) {
    $sid = $_GET['sid'];
    mysqli_query($link, "delete from guest where id='$sid'");
}
$result = mysqli_query($link, "select * from guest where outtime!=''");
    echo "<table class='report_tab'><thead><tr><th colspan='9'>GUEST IN/OUT LIST<tr>";
    echo "<tr><th>Room No<th>Guest<th>Purpose<th>In Time<th>Out Time<th>Task<tbody>";
    while($row=  mysqli_fetch_row($result)) {
	echo "<tr>";	
	    echo "<td>$row[1]<td>$row[2]<td>$row[3]<td>$row[4]<td>$row[5]";
	echo "<td><a href='viewinout.php?sid=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Delete Record ?')\">Delete</a>";
    }
    echo "</tbody></table>";
mysqli_free_result($result);
include './footer.php';
?>