<?php
include './adminheader.php';
if(!isset($_POST['submit'])) {
?>
    <form name="f" action="quarters.php" method="post">
    <table class="center_tab">
        <thead>
            <tr>
                <th colspan="2">NEW QUARTERS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Room No/Name</th>
                <td><input type="text" name="rname" required autofocus></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="center">
                    <input type="submit" name="submit" value="Submit">
                </td>
            </tr>
        </tfoot>
    </table>
    </form><br>
<hr>
<?php
if(isset($_GET['did'])) {
    $oid = $_GET['did'];
    mysqli_query($link, "delete from quarters where rname='$oid'");
}
$result = mysqli_query($link, "select * from quarters");
    echo "<table class='report_tab'><thead><tr><th colspan='2'>QUARTERS ROOM LIST<tr>";
    echo "<tr><th>Room No/Name<th>Task<tbody>";
    while($row=  mysqli_fetch_row($result)) {
	echo "<tr>";	
	    echo "<td>$row[0]";
	echo "<td><a href='quarters.php?did=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Delete Department ?')\">Delete</a>";
    }
    echo "</tbody></table>";
mysqli_free_result($result);
} else {
    extract($_POST);    
    mysqli_query($link, "insert into quarters(rname) values ('$rname')") or die("<div class='center'>Room Exists...!<br><a href='quarters.php'>Back</a></div>");
    echo "<div class='center'>Quarters Room Created...!<br><a href='quarters.php'>Back</a></div>";
}
include './footer.php';
?>