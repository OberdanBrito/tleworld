<?php
require_once("../../../commons/PHP/connectDB.php");

$id = trim($_GET["id"]);
$rowId = trim($_GET["rowId"]);

$strSQL = "SELECT id,englishName FROM productstructure WHERE parent='$rowId' AND parentMain='$id'";
$objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
$nr = mysql_num_rows($objQuery);
if (EMPTY($nr)) {
    echo "no";
} else {
    $digit = array();
    while ($fa = mysql_fetch_array($objQuery)) {
        if ($fa["englishName"] == "Bom" || $fa["englishName"] == "Build") {
            array_push($digit, "y");
        } else {
            array_push($digit, "n");
        }
    }
    
    if (gettype(array_search("y", $digit)) === "boolean") {
        echo "no";
    }else{
        echo "have";
    }
}
?>
