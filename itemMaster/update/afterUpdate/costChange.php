<?php

ob_start(); // clear buffer
session_start();
header("Cache-Control: no-cache, must-revalidate");
require_once("../../../commons/PHP/connectDB.php");

$itemId = $_POST["getItemId"];
$newCost = $_POST["newCost"];

function setPrice($getCost) {
    $setPrice0 = $getCost * 1.2;
    return $setPrice0;
}

//-------------------- UPDATE cost in structure
$sql_stru = "UPDATE productstructure SET cost='$newCost' WHERE itemId='$itemId'";
$q_stru = mysql_query($sql_stru, $conn) or die("Error Query [" . $sql_stru . "]");

if (!EMPTY($q_stru)) {
//    //-------------------- CHANGE cost in price
//    $sql_price = "UPDATE price SET active='0' WHERE itemId='$itemId' AND priceStrId='prc-0001-system'";
//    $q_price = mysql_query($sql_price, $conn) or die("Error Query [" . $sql_price . "]");
//    if (!EMPTY($q_price)) {
//        mysql_close($conn);
//        echo "Success...! ";
//    } else {
//        echo "error Update PRICE";
//    }
    //-------------------- SELECT price USER
    $sql_userP = "SELECT flag FROM price WHERE active='1' AND itemId='$itemId' AND priceStrId='pst-0001-system'";
    $q_userP = mysql_query($sql_userP, $conn) or die("Error Query [" . $sql_userP . "]");
    $nr_userP = mysql_num_rows($q_userP);
    if ($nr_userP != "0") {
        //------ Found
        while ($fa_userP = mysql_fetch_array($q_userP)) {
            $flagU = (strpos($fa_userP[0], 'c') === false) ? "flag='" . $fa_userP[0] . "c'," : "flag='" . $fa_userP[0] . "',";
//            $costU = "cost='" . $newCost . "',";
            $editorU = "editorId='" . $_SESSION['user_id'] . "',";
            $editDateU = "editDate='" . date("Y-m-d") . "'";
//            $combiU = $flagU . $costU . $editorU . $editDateU;
            $combiU = $flagU . $editorU . $editDateU;

            //-------------------- UPDATE price USER
            $sql_updateP = "UPDATE price SET $combiU WHERE active='1' AND itemId='$itemId' AND priceStrId='pst-0001-system'";
            $q_updateP = mysql_query($sql_updateP, $conn) or die("Error Query [" . $sql_updateP . "]");
            if (!EMPTY($q_updateP)) {
                echo "Update user... success!!!";
            } else {
                echo "error Update User PRICE...";
            }
        }
    }
    //************************************************************************
    //
    //-------------------- SELECT price Main
//    $sql_selP = "SELECT * FROM price WHERE active='1' AND
//                priceStrId='pst-0001-system' AND itemId='$itemId'";
//    $q_selP = mysql_query($sql_selP, $conn) or die("Error Query [" . $sql_selP . "]");
//    $nField_selP = mysql_num_fields($q_selP);
//    $nRow_selP = mysql_num_rows($q_selP);
//    if ($nRow_selP != "0") {
//        for ($r = 0; $r < $nRow_selP; $r++) {
//            //---------- Check Rows
//            $fPrice = "";
//            $vPrice = "";
//            for ($f = 0; $f < $nField_selP; $f++) {
//                //---------- Check Fields
//                $fn_Price = mysql_field_name($q_selP, $f);
//
//                if ($fn_Price == "rowId") {
//                    
//                } elseif ($fn_Price == "flag") {
//                    $fPrice .= $fn_Price . ",";
//                    $flag = mysql_db_name($q_selP, $r, $f);
//                    $vPrice .= (strpos($flag, 'c') === false) ? "'" . $flag . "c'," : "'" . $flag . "',";
//                } elseif ($fn_Price == "cost") {
//                    $fPrice .= $fn_Price . ",";
//                    $vPrice .= "'" . $newCost . "', ";
//                } elseif ($fn_Price == "price0") {
//                    $fPrice .= $fn_Price . ",";
//                    $vPrice .= "'" . setPrice($newCost) . "', ";
//                } elseif ($fn_Price == "editorId") {
//                    $fPrice .= $fn_Price . ",";
//                    $vPrice .= "'" . $_SESSION['user_id'] . "',";
//                } elseif ($fn_Price == "editDate") {
//                    $fPrice .= $fn_Price . ",";
//                    $vPrice .= "'" . date("Y-m-d") . "',";
//                } else {
//                    $fPrice .= $fn_Price . ",";
//                    $checkValue = mysql_db_name($q_selP, $r, $f);
//                    $vPrice .= (($checkValue == "") ? "NULL" : "'" . $checkValue . "'") . ",";
//                }
//            }
//            $fPrice2 = preg_replace('/[\,]+$/', '', $fPrice);
//            $vPrice2 = preg_replace('/[\,]+$/', '', $vPrice);
//
//            //-------------------- UPDATE active FROM 1->0
//            $sql_upP = "UPDATE price SET active = '0' WHERE priceStrId='prc-0001-system' AND itemId='$itemId' AND rowId='" . mysql_db_name($q_selP, $r, 0) . "'";
////        echo "Run SQL UPDATE : <br>".$sql_upP;
//            $q_upP = mysql_query($sql_upP, $conn) or die("Error Query [" . $sql_upP . "]");
//            if (!EMPTY($q_upP)) {
//                //-------------------- INSERT price MAIN
//                $sql_newP = "INSERT INTO price($fPrice2) VALUES($vPrice2)";
////            echo $sql_newP . "<br>";
//                $q_newP = mysql_query($sql_newP, $conn) or die("Error Query [" . $sql_newP . "]");
//                if (!EMPTY($q_newP)) {
//                    echo "Insert Row... success!!!";
//                } else {
//                    echo "error Insert New row PRICE...";
//                }
//            } else {
//
//                echo "error update Active PRICE...";
//            }
//        }
//    }else{
//        echo "Don't have in price";
//    }
} else {
    echo "error Update STRUCTURE";
}
mysql_close($conn);
?>