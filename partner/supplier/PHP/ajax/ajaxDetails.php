<?php
require_once("../../../../commons/PHP/connectDB.php");

$value = $_GET["value"];
$type = $_GET["codef_type"];
$result = "";
//$strSQL = stripslashes($_GET['sql']);
$strSQL = "SELECT thaiName,code FROM codedefinitions WHERE type='" . $type . "' AND englishName='" . $value . "'";
$objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
$nr = mysql_num_rows($objQuery);
if (!EMPTY($nr)) {
    while ($fa = mysql_fetch_array($objQuery)) {
        $result = $fa[0] . "," . $fa[1];
    }
}

mysql_close($conn);
//$result = preg_replace('/[\,]+$/', '', $result);
echo $result;
?>