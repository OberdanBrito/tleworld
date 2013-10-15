<?php

ob_start(); // clear buffer
session_start();
header("Cache-Control: no-cache, must-revalidate");
require_once("../../commons/PHP/connectDB.php");

function setPrice($getCost) {
    $setPrice0 = $getCost * 1.2;
    return $setPrice0;
}

$strId = $_POST["strId"];

//-------------------- SET id Price
//$setIdP = "prc-" . strtotime(now) . "-" . $_SESSION['userName'];
$setIdP = "prc-" . time() . "-" . $_SESSION['userName'];
//-------------------- SET vatValue
$vatCode = $_POST["vatCode"];
$vatValue = "";
$setVat = "";
$sql_vat = "SELECT rate FROM rates WHERE code='$vatCode'";
$q_vat = mysql_query($sql_vat, $conn) or die("Error Query [" . $sql_vat . "]");
$nr_vat = mysql_num_rows($q_vat);
if (!EMPTY($nr_vat)) {
    while ($fa_vat = mysql_fetch_array($q_vat)) {
        $vatValue = $fa_vat['rate'];
        $setVat = ($fa_vat['rate'] / 100) + 1.00;
    }
}
//-------------------- SET price0
$price0 = setPrice($_POST["cost"]);
//-------------------- SET inPrice
$inPrice = $price0 * $setVat;
//-------------------- SET exPrice
$exPrice = $price0;

$sql_upPrice = "UPDATE price SET id='$setIdP',vatValue='$vatValue',price0='$price0',inPrice='$inPrice',exPrice='$exPrice',active='1' WHERE productStrId='$strId'";
//$sql_upPrice = "UPDATE price SET id='$setIdP' WHERE rowId='$getRowIdP'";
$q_upPrice = mysql_query($sql_upPrice, $conn) or die("Error Query [" . $sql_upPrice . "]");

if (!EMPTY($q_upPrice)) {
    //Close db connection
    mysql_close($conn);
    echo "Success...! " . $setIdP . " : " . $vatValue . " * " . $price0 . " = " . $inPrice . " : " . $exPrice ." ,,rowId = ".$strId;
//    echo $q_upPrice;
//    echo "Success...";
} else {
    echo "error";
}
?>
