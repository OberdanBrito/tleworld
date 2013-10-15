<?php
require_once("../../../../commons/PHP/connectDB.php");
$getId = $_GET['getId'];
$result = "";
//$strSQL = stripslashes($_GET['sql']);
$strSQL = "SELECT rowId FROM address WHERE id='" . $getId . "'";
$objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
$nr = mysql_num_rows($objQuery);
if (!EMPTY($nr)) {
    while ($fa = mysql_fetch_array($objQuery)) {
        $result = $fa[0];
    }
}

mysql_close($conn);
//$result = preg_replace('/[\,]+$/', '', $result);
echo $result;
?>