<?php
include './header.php';
if(!isset($_POST['submit'])) {
?>
<form name="f" action="login.php" method="post">
    <table class="center_tab">
	<thead>
	    <tr>
		<th colspan="2">LOGIN</th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>UserId</th>
		<td><input type="text" name="userid" required autofocus></td>
	    </tr>
	    <tr>
		<th>Password</th>
		<td><input type="password" name="pwd" required></td>
	    </tr>
	    <tr>
		<th>Type</th>
		<td>
		    <select name="utype">
			<option value="employee">Staff</option>			
                        <option value="admin">Admin</option>
		    </select>
		</td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="submit" value="Login">
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {
    extract($_POST);
     if(strcasecmp($utype, "employee")==0) {
	$result = mysqli_query($link, "select * from employee where userid='$userid' and pwd='$pwd' and desig!='hod'") or die(mysqli_error($link));
	if(mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_row($result);
            $_SESSION['userid'] = $userid;
            $_SESSION['ename'] = $row[0];
            $_SESSION['mobile']= $row[5];
	    header("Location:emphome.php");
	} else {
	    echo "<div class='center'>Invalid Userid/Password...!<br><a href='login.php'>Back</a></div>";
	}
	mysqli_free_result($result);
    } else if(strcasecmp($utype, "admin")==0) {	
	$result = mysqli_query($link, "select * from admin where userid='$userid' and 
pwd='$pwd'") or die(mysqli_error($link));
        if(mysqli_num_rows($result)>0) {
            $_SESSION['adminuserid'] = $userid;
            header("Location:adminhome.php");
        } else {
            echo "<div class='center'>Invalid Userid/Password...!<br><a href='login.php'>Back</a></div>";
        }
        mysqli_free_result($result);
    }
}
include './footer.php';
?>