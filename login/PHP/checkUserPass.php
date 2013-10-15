<?php
ob_start(); // clear buffer
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require("../../commons/PHP/connectDB.php");
$usern = trim($_REQUEST['usern']);
$pass = trim($_REQUEST['password']);
$company = trim($_REQUEST['companyList']);
$lang = $_REQUEST['language'];
$strSQL = "SELECT * FROM loginuser WHERE name='$usern' AND password='$pass' AND company='$company'";
$objQuery = mysql_query($strSQL) or die("Error Query. $strSQL");
$nr = mysql_num_rows($objQuery);
if ($nr == 1) {
    $data = mysql_fetch_array($objQuery);
    $_SESSION['userName'] = $data['name'];
    $_SESSION['company'] = $data['company'];
    if ($lang!="") {
        $_SESSION['language'] = $lang;
    } else {
        $_SESSION['language'] = $data['language'];
    }
    $_SESSION['user_id'] = $data['id'];
    $_SESSION['company_id'] = $data['companyId']; 
    echo "<script>window.top.window.showResult(2);</script>";
} else {
    echo "<script>window.top.window.showResult(3);</script>";
}
mysql_close($conn);
?>