<?php

require_once("../../../commons/PHP/connectDB.php");

$lang = $_GET["lang"];
$value = $_GET["value"];
$strSQL = "SELECT code FROM rates WHERE type='vat' AND $lang = '$value'";

$objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
$nr = mysql_num_rows($objQuery);
if (!EMPTY($nr)) {
    while ($fa = mysql_fetch_array($objQuery)) {
        echo $fa[0];
    }
}
?>
