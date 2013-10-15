<?php

ob_start(); // clear buffer
session_start();
header("Cache-Control: no-cache, must-revalidate");
require_once("../../../commons/PHP/connectDB.php");

$itemId = $_POST["getItemId"];
$vatCodeNew = $_POST["vatCodeNew"];

//-------------------- CHANGE vat in structure
$sql_stru = "UPDATE productstructure SET vat='$vatCodeNew' WHERE itemId='$itemId'";
$q_stru = mysql_query($sql_stru, $conn) or die("Error Query [" . $sql_stru . "]");

if (!EMPTY($q_stru)) {
    //-------------------- SELECT vat value in Table rates
    $sql_vat = "SELECT rate FROM rates WHERE code='$vatCodeNew'";
    $q_vat = mysql_query($sql_vat, $conn) or die("Error Query [" . $sql_vat . "]");
    if (!EMPTY($q_vat)) {
        while ($fa_vat = mysql_fetch_array($q_vat)) {

            //-------------------- SELECT flag in price
            $sql_selP = "SELECT flag FROM price WHERE active='1' AND
                priceStrId='pst-0001-system' AND itemId='$itemId'";
            $q_selP = mysql_query($sql_selP, $conn) or die("Error Query [" . $sql_selP . "]");
            if (!EMPTY($q_selP)) {
                while ($fa_selP = mysql_fetch_array($q_selP)) {
                    $flagP = $fa_selP['flag'];
                    $flagP2 = (strpos($flagP, 'v') === false) ? "'" . $flagP . "v'" : "'" . $flagP . "'";


                    //-------------------- CHANGE vat in price
//                    $sql_price = "UPDATE price SET vatCode='$vatCodeNew',vatValue='$fa_vat[0]',flag=$flagP2 WHERE itemId='$itemId' AND active='1'";
                    $sql_price = "UPDATE price SET flag=$flagP2 WHERE itemId='$itemId' AND active='1'";
                    $q_price = mysql_query($sql_price, $conn) or die("Error Query [" . $sql_price . "]");
                    if (!EMPTY($q_price)) {

                        echo "Success...! ";
                        //mysql_close($conn);
                    } else {
                        echo "error Update PRICE";
                    }
                }
            } else {
                echo "error SELECT PRICE";
            }
        }
    } else {
        echo "error Select RATE";
    }
} else {
    echo "error Update STRUCTURE";
}
mysql_close($conn);
?>