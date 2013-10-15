<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require("../../commons/PHP/connectDB.php");
session_start();

$oldpw = trim($_POST['oldpw']);
$newpw = trim($_POST['newpw']);
$retypepw = trim($_POST['retypepw']);
$user = $_SESSION['user_id'];

$strSQL = "SELECT * FROM loginuser WHERE id='$user'";
$objQuery = mysql_query($strSQL) or die("Error Query. $strSQL");
$nr = mysql_fetch_array($objQuery);

if ($newpw == $retypepw) {
    if ($nr['password']==$oldpw) {
        $updateSQL = "UPDATE loginuser SET password='$newpw' WHERE id='$user'";
        $updateQuery = mysql_query($updateSQL) or die("Error Query. $updateSQL");
        $affRow = mysql_affected_rows($updateQuery);
        if ($affRow != -1) {
            echo "<script>window.top.window.show('Password Changed.');</script>";
        } else {
            echo "<script>window.top.window.show('Update Error.');</script>";
        }
    } else {
        echo "<script>window.top.window.show('".$nr['password']."');</script>";
    }
} else {
    echo "<script>window.top.window.show('New password not correct.');</script>";
}


mysql_close($conn);
?>