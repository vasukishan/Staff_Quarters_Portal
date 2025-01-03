<?php
include './db.php';
$roomno = $_GET['r'];
$result = mysqli_query($link, "select a.userid,ename,dept,mobile,a.id from roomallot a,employee e where a.userid=e.userid and a.roomno='$roomno'");
$s="";
if(mysqli_num_rows($result)>0) {
    $s.="<table class='report_tab'><thead><tr><th colspan='5'>ROOM INMATES LIST<tr>";
    $s.="<tr><th>Staff Id<th>Name<th>Dept<th>Mobile<th>Task<tbody>";
    while($row=  mysqli_fetch_row($result)) {
	$s.="<tr>";	
	    $s.="<td>$row[0]<td>$row[1]<td>$row[2]<td>$row[3]";
	$s.="<td><a href='allot.php?did=$row[4]' onclick=\"javascript:return confirm('Are You Sure to Delete Department ?')\">Delete</a>";
    }
    $s.="</tbody></table>";
} else {
    $s.="<br>No Members in this Room...!";
}
echo $s;
mysqli_free_result($result);
?>