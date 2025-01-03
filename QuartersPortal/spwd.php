<?php
include './empheader.php';
if(!isset($_POST['submit'])) {
    $result = mysqli_query($link, "select pwd from employee where userid='$_SESSION[userid]'");
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
?>
<form name="f" action="spwd.php" method="post" onsubmit="return check()">
<table class="center_tab">
    <thead>
        <tr>
            <th colspan="2">CHANGE PASSWORD</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Old Password</th>
            <td><input type="password" name="opwd" required autofocus><input type="hidden" name="hpwd" value="<?php echo $row[0];?>"></td>
        </tr>
        <tr>
            <th>New Password</th>
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
    if(strcmp($opwd, $hpwd)==0) {
    mysqli_query($link, "update employee set pwd='$pwd' where userid='$_SESSION[userid]'");
    echo "<div class='center'>Password Changed...!<br><a href='spwd.php'>Back</a></div>";
    } else {
        echo "<div class='center'>Invalid Old Password...!<br><a href='spwd.php'>Back</a></div>";
    }
}
include './footer.php';
?>
<script>
    function check() {
        var pwd = f.pwd.value
        var cpwd = f.cpwd.value
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
	var mp = /^[987]\d{9}$/
	return m.match(mp)
    }
</script>