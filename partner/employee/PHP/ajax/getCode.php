<?php

require_once("../../../../commons/PHP/connectDB.php");

$lang = $_GET["lang"];
$getValue = $_GET["getValue"];
$field = explode(",", $getValue);
$result = "";
for ($i = 0; $i < count($field); $i++) {
    $spF = explode("|", $field[$i]);
    $value = $spF[0];
    $type = $spF[1];
    //$strSQL = stripslashes($_GET['sql']);
    $strSQL = "SELECT code FROM codedefinitions WHERE type='" . $type . "' AND " . $lang . "='" . $value . "'";
    $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
    $nr = mysql_num_rows($objQuery);
    if (!EMPTY($nr)) {
        while ($fa = mysql_fetch_array($objQuery)) {
            $result .= $fa[0].",";
        }
    }
}

mysql_close($conn);
$result = preg_replace('/[\,]+$/','',$result);
echo $result;
?>
