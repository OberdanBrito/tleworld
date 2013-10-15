<?php

require_once("../../../commons/PHP/connectDB.php");

$id = trim($_GET["id"]);
$val = trim($_GET["value"]);
$value = "";
$strSQL = "SELECT name FROM unit WHERE class='count' AND type='count' ORDER BY name ASC";
$objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
$nr = mysql_num_rows($objQuery);
if (!EMPTY($nr)) {
    while ($fa = mysql_fetch_array($objQuery)) {
        if ($fa[0] != $val) {
            $value .= $fa[0] . ",";
        }
    }
    $value = preg_replace('/[\,]+$/', '', $value);
    echo $value;
}
?>
