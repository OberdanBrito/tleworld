<?php
ob_start(); // clear buffer
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require("../../commons/PHP/connectDB.php");
$pass = "system";
$passw = md5($pass);
$strSQL = "SELECT * FROM loginuser WHERE name='system' AND password='54b53072540eeeb8f8e9343e71f28176'";
$objQuery = mysql_query($strSQL) or die("Error Query. $strSQL");
$row = mysql_fetch_array($objQuery) or die(mysql_error());
mysql_close($conn);
?>