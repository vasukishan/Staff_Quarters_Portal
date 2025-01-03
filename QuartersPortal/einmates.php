<?php
include './empheader.php';
    $res0 = mysqli_query($link, "select roomno from roomallot where userid='$_SESSION[userid]'");
    if(mysqli_num_rows($res0)>0) {
        $r0 = mysqli_fetch_row($res0);
    $result1 = mysqli_query($link, "select userid,ename,dept from employee where userid in (select userid from roomallot where roomno='$r0[0]' and userid!='$_SESSION[userid]')") or die(mysqli_error($link));
?>
    <form name="f" action="" method="post">
    <table class="center_tab">
        <thead>
            <tr>
                <th colspan="2">INMATES DETAILS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Select Inmate</th>
                <td>
                    <select name="iuserid" required>                        
                        <?php
                        while($row2=mysqli_fetch_row($result1)) {
                            echo "<option value='$row2[0]'>$row2[1]-$row2[2]</option>";
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
                    <input type="submit" name="submitt" value="View">
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
    echo "<div id='d' class='center'></div>";
    } else {
    echo "<div class='center'>Quarters Not Allotted...!<br></div>";    
    }
if(isset($_POST['submitt'])) {
    extract($_POST);
$result = mysqli_query($link, "select * from employee where userid='$iuserid'");
    echo "<table class='report_tab'><thead><tr><th colspan='6'>INMATE DETAILS<tr>";
    echo "<tr><th>Name<th>Age<th>Dept<th>Designation<th>Mobile<th>DOJ<tbody>";
    while($row=  mysqli_fetch_row($result)) {
	echo "<tr>";	
	echo "<td>$row[0]<td>$row[1]<td>$row[2]<td>$row[3]<td>$row[5]<td>$row[7]";
    }
    echo "</tbody></table>";
mysqli_free_result($result);
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