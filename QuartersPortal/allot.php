<?php
include './adminheader.php';
if(!isset($_POST['submit'])) {
    $result1 = mysqli_query($link, "select userid,ename,dept from employee where userid not in(select userid from roomallot)");
    $result2 = mysqli_query($link, "select rname from quarters");
?>
    <form name="f" action="allot.php" method="post">
    <table class="center_tab">
        <thead>
            <tr>
                <th colspan="2">QUARTERS ALLOT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Room No/Name</th>
                <td>
                    <select name="roomno" onchange="call(this.value)" required>
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
                <th>Select Staff</th>
                <td>
                    <select name="userid" required>
                        <option value="">--Select Staff--</option>
                        <?php
                        while($row1=  mysqli_fetch_row($result1)) {
                            echo "<option value='$row1[0]'>$row1[0]</option>";
                        }
                        mysqli_free_result($result1);
                        ?>
                    </select>
                </td>
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
    echo "<div id='d' class='center'></div>";
mysqli_free_result($result);
} else {
    extract($_POST);
    $dt = date('Y-m-d',time());
    mysqli_query($link, "insert into roomallot(dt,roomno,userid) values ('$dt','$roomno','$userid')") or die("<div class='center'>Room Exists...!<br><a href='quarters.php'>Back</a></div>");
    echo "<div class='center'>Quarters Room Allotted...!<br><a href='allot.php'>Back</a></div>";
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