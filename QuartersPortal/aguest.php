<?php
include './adminheader.php';
if(!isset($_POST['submit'])) {    
    $result2 = mysqli_query($link, "select rname from quarters");
?>
<div class="right">
    <a href="viewinout.php" class="btn">View In/Out</a>
</div>
    <form name="f" action="aguest.php" method="post">
    <table class="center_tab">
        <thead>
            <tr>
                <th colspan="2">GUEST IN DETAILS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Room No/Name</th>
                <td>
                    <select name="roomno" required>
                        <option value="">--Select Quarters--</option>
                        <?php
                        while($row2=  mysqli_fetch_row($result2)) {
                            echo "<option value='$row2[0]'>$row2[0]</option>";
                        }
                        mysqli_free_result($result2);
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Guest Name</th>
                <td><input type="text" name="gname" required></td>
            </tr>
            <tr>
                <th>Purpose</th>
                <td><textarea name="purpose" required></textarea></td>
            </tr>
            <tr>
                <th>In Time</th>
                <td><input type="datetime-local" name="intime" required></td>
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
if(isset($_GET['gid'])) {
    $gid = $_GET['gid'];
    date_default_timezone_set("Asia/Kolkata");
    $dt = date('Y-m-d h:i a');
    mysqli_query($link, "update guest set outtime='$dt' where id='$gid'");
}
echo "<div id='d' class='center'></div>";
$result = mysqli_query($link, "select * from guest where outtime=''");
    echo "<table class='report_tab'><thead><tr><th colspan='4'>GUEST OUT<tr>";
    echo "<tr><th>Room No/Name<th>Guest<th>Intime<th>Task<tbody>";
    while($row=  mysqli_fetch_row($result)) {
	echo "<tr>";	
	    echo "<td>$row[1]<td>$row[2]<td>$row[4]";
	echo "<td><a href='aguest.php?gid=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Proceed ?')\">Guest Out</a>";
    }
    echo "</tbody></table>";
mysqli_free_result($result);
} else {
    extract($_POST);
    $date = DateTime::createFromFormat('Y-m-d\TH:i', $intime);
    // Format the datetime
    $fd = $date->format('Y-m-d h:i a'); // Output format
    mysqli_query($link, "insert into guest(roomno,gname,purpose,intime) values ('$roomno','$gname','$purpose','$fd')");
    echo "<div class='center'>Guest Details Stored...!<br><a href='aguest.php'>Back</a></div>";
}
include './footer.php';
?>
<script>
    function getObj() {
        if(window.ActiveXObject)
            return new ActiveXObject("Microsoft.XMLHTTP")
        else
            return new XMLHttpRequest()
    }
    function call(p) {
        if(p!="") {
            ob = getObj()
            ob.onreadystatechange=doWork
            ob.open("GET","getrm.php?r="+p,true)
            ob.send()
        } else {
            document.getElementById("d").innerHTML=""
        }
    }
    function doWork() {
        if(ob.readyState==4 && ob.status==200) {
            document.getElementById("d").innerHTML=ob.responseText
        }
    }
</script>