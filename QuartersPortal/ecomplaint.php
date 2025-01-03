<?php
include './empheader.php';
if(!isset($_POST['submit'])) {
    $res0 = mysqli_query($link, "select roomno from roomallot where userid='$_SESSION[userid]'");
    if(mysqli_num_rows($res0)>0) {
        $r0 = mysqli_fetch_row($res0);
?>
    <form name="f" action="ecomplaint.php" method="post">
    <table class="center_tab">
        <thead>
            <tr>
                <th colspan="2">NEW COMPLAINT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Room No/Name</th>
                <td><input type="text" name="roomno" value="<?php echo $r0[0];?>" required readonly></td>
            </tr>
            <tr>
                <th>User Id</th>
                <td><input type="text" name="userid" value="<?php echo $_SESSION['userid'];?>" required readonly></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><input type="text" name="ename" value="<?php echo $_SESSION['ename'];?>" required readonly></td>
            </tr>
            <tr>
                <th>Mobile No</th>
                <td><input type="text" name="mobile" value="<?php echo $_SESSION['mobile'];?>" required readonly></td>
            </tr>
            <tr>
                <th>Category</th>
                <td>
                    <select name="catname">
			<option value="Plumbing">Plumbing</option>			
                        <option value="Electrical">Electrical</option>
                        <option value="Carpentry">Carpentry</option>
                        <option value="Garden">Garden</option>
                        <option value="Others">Others</option>
		    </select>
                </td>
            </tr>
            <tr>
                <th>Availability Time</th>
                <td><input type="text" name="atime" required autofocus></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><textarea name="descr" rows="4" cols="25" required></textarea></td>
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
    } else {
        echo "<div class='center'>Quarters Not Allotted...!<br></div>";
    }
    mysqli_free_result($res0);
} else {
    extract($_POST);
    $dt = date('Y-m-d',time());
    mysqli_query($link, "insert into complaints(dt,roomno,userid,mobile,catname,atime,descr) values ('$dt','$roomno','$userid','$mobile','$catname','$atime','$descr')");
    echo "<div class='center'>Complaint Registered Successfully...!<br><a href='ecomplaint.php'>Back</a></div>";
}
include './footer.php';
?>