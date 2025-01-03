<?php
include './empheader.php';
if(!isset($_POST['submit'])) {
    $result = mysqli_query($link, "select * from employee where userid='$_SESSION[userid]'");
    $r = mysqli_fetch_row($result);
    mysqli_free_result($result);
?>
        <form name="f" action="emphome.php" method="post" onsubmit="return check()">
        <table class="center_tab">
            <thead>
                <tr>
                    <th colspan="2">PROFILE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
            <th>Staff Name</th>
            <td><input type="text" name="ename" value="<?php echo $r[0];?>" required autofocus></td>
        </tr>
        <tr>
            <th>Age</th>
            <td><input type="text" name="age" value="<?php echo $r[1];?>" required></td>
        </tr>
        <tr>
            <th>Dept</th>
            <td><input type="text" name="dept" value="<?php echo $r[2];?>" required></td>
        </tr>
        <tr>
            <th>Designation</th>
            <td><input type="text" name="desig" value="<?php echo $r[3];?>" required></td>
        </tr>                
        <tr>
            <th>Gender</th>
            <td><input type="radio" name="gender" value="Male" checked> Male &nbsp;
            <input type="radio" name="gender" value="Female"> Female</td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td><input type="text" name="mobile" required value="<?php echo $r[5];?>" maxlength="10" pattern="[9876]\d{9}"></td>
        </tr>
        <tr>
            <th>Type</th>
            <td>
                <select name="stype" class="menu">
                    <option value="teaching">Teaching</option>
                    <option value="nonteaching">Non-Teaching</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Date of Join</th>
            <td><input type="date" name="doj" value="<?php echo $r[7];?>" required></td>
        </tr>
        <tr>
            <th>EMail (User Id)</th>
            <td><input type="text" name="email" value="<?php echo $r[8];?>" required readonly></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="password" name="pwd" value="<?php echo $r[9];?>" required></td>
        </tr>
        <tr>
            <th>Confirm Pwd</th>
            <td><input type="password" name="cpwd" value="<?php echo $r[9];?>" required></td>
        </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="center">
                        <input type="submit" name="submit" value="Update">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
<?php
} else {
    extract($_POST);
    $b = mysqli_query($link, "update employee set ename='$ename',age='$age',dept='$dept',desig='$desig',gender='$gender',mobile='$mobile',stype='$stype',doj='$doj',pwd='$pwd' where userid='$email'");
    if($b) {
    echo "<div class='center'>Profile Updated...!<br><a href='emphome.php'>Back</a></div>";
    } else {
    echo "<div class='center'>".  mysqli_error($link)."...!<br><a href='emphome.php'>Back</a></div>";
    }
}
include './footer.php';
?>
<script>
    function check() {
        var email = f.email.value
        var pwd = f.pwd.value
        var cpwd = f.cpwd.value
	if(!check_email(email)) {
	    alert("Invalid Email/Userid")
	    return false
	}
        if(pwd!=cpwd) {
            alert("Invalid Confirm Password")
            f.cpwd.focus()
            return false
        }
	return true
    }
            
    function check_email(e) {
	var ep = /^\w+\.{0,1}\w+\@[a-z]+\.([a-z]{3}|[a-z]{2}\.[a-z]{2}){1}$/
	return e.match(ep)
    }
    function check_mobile(m) {
	var mp = /^[9876]\d{9}$/
	return m.match(mp)
    }
</script>