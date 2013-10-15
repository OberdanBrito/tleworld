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
//(BedA/Bom/PillowA[typeP='Bom'])
//
            //get PillowA[typeP='item']
            $sql_rId = "SELECT * FROM $gTb WHERE id='" . $fa['itemId'] . "' AND typeP='item'";
            $q_rId = mysql_query($sql_rId) or die("Error Query[" . $sql_rId . "]");
            $nr_rId = mysql_num_rows($q_rId);
            if (checkStateSQL($nr_rId)) {
                while ($fa_rId = mysql_fetch_array($q_rId)) {

                    $sql_BS2 = "SELECT $gField FROM $gTb WHERE parent='" . $fa_rId['rowId'] . "' ORDER BY englishName ";
                    $q_BS2 = mysql_query($sql_BS2) or die("Error Query[" . $sql_BS2 . "]");
                    $nr_BS2 = mysql_num_rows($q_BS2);
                    if (checkStateSQL($nr_BS2)) {
                        while ($fa_BS2 = mysql_fetch_array($q_BS2)) {
                            //--- PillowA/Bom2, PillowA/style2
//                            if ($fa_BS2['englishName'] == "Bom") {
                            //Recursive!!
//(PillowA/Bom)
//                            } elseif ($fa_BS2['englishName'] == "Style") {
//(PillowA/Style)
                            print ("<row id='" . $fa_BS2['rowId'] . "' xmlkids='1'>");
                            for ($i = 0; $i < count($gArrayField); $i++) {
                                //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                                if (strpos($gArrayField[$i], ".") !== false) {
                                    $bField = explode('.', $gArrayField[$i]);
                                    if ($bField[1] == 'rowId') {
                                        
                                    } else {
                                        print((EMPTY($fa_BS2[$bField[1]])) ? ("<cell></cell>") : ("<cell>" . $fa_BS2[$bField[1]] . "</cell>"));
                                    }
                                } else {
                                    if ($gArrayField[$i] == 'rowId') {
                                        
                                    } else {
                                        print((EMPTY($fa_BS2[$gArrayField[$i]])) ? ("<cell></cell>") : ("<cell>" . $fa_BS2[$gArrayField[$i]] . "</cell>"));
                                    }
                                }
                            }
//                            if ($fa_BS2['englishName'] == "Bom") {
//                                $sql_Bom2 = "SELECT $gField FROM $gTb WHERE parent='" . $fa_BS2['rowId'] . "'";
//                                $q_Bom2 = mysql_query($sql_Bom2) or die("Error Query[" . $sql_Bom2 . "]");
//                                $nr_Bom2 = mysql_num_rows($q_Bom2);
//                                if (checkStateSQL($nr_Bom2)) {
//                                    while ($fa_Bom2 = mysql_fetch_array($q_Bom2)) {
//                                        print ("<row id='" . $fa_Bom2['rowId'] . "' xmlkids='1'>");
//                                        for ($i = 0; $i < count($gArrayField); $i++) {
//                                            //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
//                                            if (strpos($gArrayField[$i], ".") !== false) {
//                                                $bField = explode('.', $gArrayField[$i]);
//                                                if ($bField[1] == 'rowId') {
//                                                    
//                                                } else {
//                                                    print((EMPTY($fa_Bom2[$bField[1]])) ? ("<cell></cell>") : ("<cell>" . $fa_Bom2[$bField[1]] . "</cell>"));
//                                                }
//                                            } else {
//                                                if ($gArrayField[$i] == 'rowId') {
//                                                    
//                                                } else {
//                                                    print((EMPTY($fa_Bom2[$gArrayField[$i]])) ? ("<cell></cell>") : ("<cell>" . $fa_Bom2[$gArrayField[$i]] . "</cell>"));
//                                                }
//                                            }
//                                        }
//                                        print ("</row>");
//                                    }
//                                }
//                            }
                            print ("</row>");
//                            }
                        }
                    }
                }
            }
        }
    }
}

//function getChildFromDB($strF, $tb, $pId) {
//
//    $sql_BomChild = "SELECT $strF.rowId,$strF.id,$strF.englishName,$strF.thaiName,$strF.child,$strF.code,$strF.description,$strF.quantity,$strF.unit
//                        FROM $tb AS $strF
//                        WHERE parent = '" . $pId . "' ORDER BY rowId";
//    $dbQuery_BomChild = mysql_query($sql_BomChild);
//    $result_BomChild = mysql_num_rows($dbQuery_BomChild);
//    if (checkStateSQL($result_BomChild)) {
//
//        while ($row_BomChild = mysql_fetch_array($dbQuery_BomChild)) {
//            print ("<row id='" . $row_BomChild['rowId'] . "'>");
//            print("<cell><![CDATA[" . $row_BomChild['englishName'] . "]]></cell>");
//            print("<cell><![CDATA[" . $row_BomChild['thaiName'] . "]]></cell>");
//            print("<cell><![CDATA[" . $row_BomChild['child'] . "]]></cell>");
//            print("<cell><![CDATA[" . $row_BomChild['code'] . "]]></cell>");
//            print("<cell><![CDATA[" . $row_BomChild['description'] . "]]></cell>");
//            print("<cell><![CDATA[" . $row_BomChild['quantity'] . "]]></cell>");
//            print("<cell><![CDATA[" . $row_BomChild['unit'] . "]]></cell>");
//            getChildFromDB($strF, $tb, $row_BomChild['id']);
//            print ("</row>");
//        }
//    }
//}
//---------- Edit Data(below) ----------
$rwId = stripslashes($_GET["rwId"]);
$field = "rowId," . $_GET["fields"];
$tb = $vArr[0];

$setWhere = "WHERE rowId='" . $rwId . "'";
//----------  ----------
$arrayField = explode(',', $field);

//XML HEADER
header("Content-type: text/xml");
//encoding may be different in your case
echo('<?xml version="1.0" encoding="UTF-8"?>');
echo ('<rows parent="' . $rwId . '">');

////print tree XML
getDataGroup("", $field, $tb, $arrayField, $setWhere);

//Close db connection
mysql_close($conn);

echo ('</rows>');
?>
