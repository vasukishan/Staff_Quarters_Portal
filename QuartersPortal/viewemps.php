<?php
include './adminheader.php';
if(isset($_GET['sid'])) {
    $oid = $_GET['sid'];
    mysqli_query($link, "delete from employee where userid='$oid'");
}
$result = mysqli_query($link, "select * from employee order by dept");
    echo "<table class='report_tab'><thead><tr><th colspan='9'>STAFF LIST<tr>";
    echo "<tr><th>Name<th>Age<th>Dept<th>Designation<th>Gender<th>Mobile<th>Type<th>DOJ<th>EMail(User Id)<th>Task<tbody>";
    while($row=  mysqli_fetch_row($result)) {
	echo "<tr>";	
	    echo "<td>$row[0]<td>$row[1]<td>$row[2]<td>$row[3]<td>$row[4]<td>$row[5]<td>$row[6]<td>$row[7]<td>$row[8]";
	echo "<td><a href='viewemps.php?sid=$row[8]' onclick=\"javascript:return confirm('Are You Sure to Delete Staff ?')\">Delete</a>";
    }
    echo "</tbody></table>";
mysqli_free_result($result);
include './footer.php';
?>