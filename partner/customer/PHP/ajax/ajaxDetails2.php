<?php

require_once("../../../../commons/PHP/connectDB.php");
$lang = $_GET["lang"];
$compare = $_GET["compare"];
$type = stripslashes($_GET["type"]);

if ($compare == "all") {
    $result = array();
    $strSQL = "SELECT $lang,code FROM codedefinitions WHERE type='$type';";
    $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
    $nr = mysql_num_rows($objQuery);
    if (!EMPTY($nr)) {
        while ($fa = mysql_fetch_array($objQuery)) {
            array_push($result, $fa[0] . ":" . $fa[1]);
        }
    }
    mysql_close($conn);
//$result = preg_replace('/[\,]+$/', '', $result);
    echo json_encode($result);
} elseif ($compare == "one") {
    $result = "";
    $code = stripslashes($_GET["code"]);
    $strSQL = "SELECT $lang FROM codedefinitions WHERE code='$code' AND type='$type';";
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
}
?>