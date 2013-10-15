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

function getDataGroup($gStrF, $gField, $gTb, $gArrayField, $gSetWhere) {
    if (!EMPTY($gStrF)) {
        $sql = "SELECT $gField FROM $gTb AS $gStrF $gSetWhere";
    } else {
        $sql = "SELECT $gField FROM $gTb $gSetWhere";
    }


    $q = mysql_query($sql) or die("Error Query [" . $sql . "]");
    $nr_Sel = mysql_num_rows($q);
    if (checkStateSQL($nr_Sel)) {
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
            getChildFromDB($gField, $gTb, $fa["rowId"]);
            print ("</row>");
        }
    }
}

function getChildFromDB($field, $tb, $pId) {
    $arrayField2 = explode(',', $field);

    $sql_BomChild = "SELECT $field FROM $tb WHERE parent = '" . $pId . "' ORDER BY englishName";
    $q_BomChild = mysql_query($sql_BomChild) or die("Error Query [" . $sql_BomChild . "]");
    $nr_BomChild = mysql_num_rows($q_BomChild);
    if (checkStateSQL($nr_BomChild)) {

        while ($fa_BomChild = mysql_fetch_array($q_BomChild)) {
            if ($fa_BomChild['typeP'] !== "Build") {
                //----- Don't Build
                print ("<row id='" . $fa_BomChild['rowId'] . "' xmlkids='1'>");
                for ($i = 0; $i < count($arrayField2); $i++) {
                    //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                    if (strpos($arrayField2[$i], ".") !== false) {
                        $bField = explode('.', $arrayField2[$i]);
                        if ($bField[1] == 'rowId') {
                            
                        } else {
                            print((EMPTY($fa_BomChild[$bField[1]])) ? ("<cell></cell>") : ("<cell>" . $fa_BomChild[$bField[1]] . "</cell>"));
                        }
                    } else {
                        if ($arrayField2[$i] == 'rowId') {
                            
                        } else {
                            print((EMPTY($fa_BomChild[$arrayField2[$i]])) ? ("<cell></cell>") : ("<cell>" . $fa_BomChild[$arrayField2[$i]] . "</cell>"));
                        }
                    }
                }
//            print("<cell><![CDATA[" . $row_BomChild['englishName'] . "]]></cell>");
//            print("<cell><![CDATA[" . $row_BomChild['thaiName'] . "]]></cell>");
//            print("<cell><![CDATA[" . $row_BomChild['child'] . "]]></cell>");
//            print("<cell><![CDATA[" . $row_BomChild['code'] . "]]></cell>");
//            print("<cell><![CDATA[" . $row_BomChild['description'] . "]]></cell>");
//            print("<cell><![CDATA[" . $row_BomChild['quantity'] . "]]></cell>");
//            print("<cell><![CDATA[" . $row_BomChild['unit'] . "]]></cell>");
//            getChildFromDB($strF, $tb, $row_BomChild['id']);
                print ("</row>");
            }
        }
    }
}

//---------- Edit Data(below) ----------
$itemId = stripslashes($_GET["itemId"]);
$field = "rowId," . $_GET["fields"];
$tb = $vArr[0];

$setWhere = "WHERE id='" . $itemId . "' AND typeP='item'";
//----------  ----------
$arrayField = explode(',', $field);

//XML HEADER
header("Content-type: text/xml");
//encoding may be different in your case
echo('<?xml version="1.0" encoding="UTF-8"?>');
echo ('<rows id="0">');

////print tree XML
getDataGroup("", $field, $tb, $arrayField, $setWhere);

//Close db connection
mysql_close($conn);

echo ('</rows>');
?>
