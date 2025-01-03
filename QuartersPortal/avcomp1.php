<?php
include './adminheader.php';
if(!isset($_POST['submit'])) {
    $cid = $_GET['cid'];
?>
        <form name="f" action="avcomp1.php" method="post">
        <table class="center_tab">
            <thead>
                <tr>
                    <th colspan="2">REJECT COMPLAINT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Reject Reason</th>
                    <td><textarea name="cremarks" required autofocus rows="5" cols="35"></textarea><input type="hidden" name="cid" value="<?php echo $cid; ?>" required></td>
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
    mysqli_query($link, "update complaints set cstatus='Rejected',cremarks='$cremarks' where id='$cid'") or die(mysqli_error($link));
echo "<div class='center'>Complaint Rejected...!<br><a href='avcomp.php'>Back</a></div>";    
}
include './footer.php';
?>