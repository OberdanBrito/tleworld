<?php

ob_start();
session_start();
require_once("../../../commons/PHP/connectDB.php");
include("../tableDB.php");

function checkStateSQL($getPara) {
    if ($getPara == '') {
        return false;
    } else
    if ($getPara == null) {
        return false;
    } else
    if ($getPara == '0') {
        return false;
    }
    if (EMPTY($getPara)) {
        return false;
    }
    return true;
}

function getDataGroup($gStrF, $gField, $gTb, $gArrayField, $gSetWhere, $gValue) {
    if (!EMPTY($gStrF)) {
        $sql = "SELECT $gField FROM $gTb AS $gStrF $gSetWhere";
    } else {
        $sql = "SELECT $gField FROM $gTb $gSetWhere";
    }


    $q = mysql_query($sql) or die("Error Query [" . $sql . "]");
    $nr_Sel = mysql_num_rows($q);
    if (checkStateSQL($nr_Sel)) {
        if ($gValue != "Style") {
            while ($fa = mysql_fetch_array($q)) {
                print ("<row id='" . $fa['rowId'] . "' xmlkids='1'>");

                for ($i = 0; $i < count($gArrayField); $i++) {
                    //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                    if (strpos($gArrayField[$i], ".") !== false) {
                        $bField = explode('.', $gArrayField[$i]);
                        if ($bField[1] == 'rowId') {
                            
                        } else {
                            print((EMPTY($fa[$bField[1]])) ? ("<cell></cell>") : ("<cell>" . $fa[$bField[1]] . "</cell>"));
                        }
                    } else {
                        if ($gArrayField[$i] == 'rowId') {
                            
                        } else {
                            print((EMPTY($fa[$gArrayField[$i]])) ? ("<cell></cell>") : ("<cell>" . $fa[$gArrayField[$i]] . "</cell>"));
                        }
                    }
                }
                print ("</row>");
            }
        }
    }
}

//---------- Edit Data(below) ----------
$rwId = stripslashes($_GET["rwId"]);
$value = stripslashes($_GET["value"]);
$field = "rowId," . $_GET["fields"];
$tb = $vArr[0];

$setWhere = "WHERE parent='" . $rwId . "'";
//----------  ----------
$arrayField = explode(',', $field);

//XML HEADER
header("Content-type: text/xml");
//encoding may be different in your case
echo('<?xml version="1.0" encoding="UTF-8"?>');
echo ('<rows parent="' . $rwId . '">');

////print tree XML
getDataGroup("", $field, $tb, $arrayField, $setWhere, $value);

//Close db connection
mysql_close($conn);

echo ('</rows>');
?>
