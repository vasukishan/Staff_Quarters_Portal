<?php
include './adminheader.php';
if(!isset($_POST['submit'])) {
    $result = mysqli_query($link, "select * from quarters");
    mysqli_free_result($result);
?>
<div class="right">
    <a href="viewemps.php" class="btn">View Staff</a>
</div>
<form name="f" action="adminhome.php" method="post" enctype="multipart/form-data" onsubmit="return check()">
<table class="center_tab">
    <thead>
        <tr>
            <th colspan="2">NEW STAFF</th>
        </tr>
    </thead>
    <tbody>
        <!--tr>
            <th>Quarters</th>
            <td>
                <select name="qname" class="menu">
                    <?php
                    /*
                    while($row = mysqli_fetch_row($result)) {
                        echo "<option value='$row[0]'>$row[0]</option>";
                    }
                    mysqli_free_result($result);
                     */
                    ?>                    
                </select>
            </td>
        </tr-->
        <tr>
            <th>Staff Name</th>
            <td><input type="text" name="ename" required autofocus></td>
        </tr>
        <tr>
            <th>Age</th>
            <td><input type="text" name="age" required></td>
        </tr>
        <tr>
            <th>Dept</th>
            <td><input type="text" name="dept" required></td>
        </tr>
        <tr>
            <th>Designation</th>
            <td><input type="text" name="desig" required></td>
        </tr>                
        <tr>
            <th>Gender</th>
            <td><input type="radio" name="gender" value="Male" checked> Male &nbsp;
            <input type="radio" name="gender" value="Female"> Female</td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td><input type="text" name="mobile" required maxlength="10" pattern="[9876]\d{9}"></td>
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
            <td><input type="date" name="doj" required></td>
        </tr>
        <tr>
            <th>EMail (User Id)</th>
            <td><input type="text" name="email" required></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="password" name="pwd" required></td>
        </tr>
        <tr>
            <th>Confirm Pwd</th>
            <td><input type="password" name="cpwd" required></td>
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
</form>
<?php
} else {
    extract($_POST);    
    mysqli_query($link, "insert into employee(ename,age,dept,desig,gender,mobile,stype,doj,userid,pwd) values ('$ename','$age','$dept','$desig','$gender','$mobile','$stype','$doj','$email','$pwd')");
    echo "<div class='center'>Staff Record Created...!<br><a href='adminhome.php'>Back</a></div>";
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