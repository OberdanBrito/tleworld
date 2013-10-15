<?php

ob_start();
session_start();
header("Cache-Control: no-cache, must-revalidate");
require_once("../../../commons/PHP/connectDB.php");
require("../../../DHX/dhtmlxConnector/codebase/grid_connector.php");

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

//$treeG = new GridConnector($conn, "MySQL");
//$class = $_REQUEST['class'];
//$type = $_REQUEST['type'];
//$group = $_REQUEST['group'];
//
//$strF = "f";
//$field = "$strF.rowId,$strF.englishName,$strF.thaiName,$strF.code";
//$tb = "productstructure";
//
////Select Item
//$setWhere = "WHERE $strF.rowId = (SELECT max(rowId) FROM $tb WHERE id = $strF.id )
//             AND class='" . $class . "' AND type='" . $type . "' AND gGroup='" . $group . "' AND typeP='item'";
//$sql = "SELECT $field FROM $tb AS $strF $setWhere";
//$q = mysql_query($sql);
//$nr = mysql_num_rows($q);
//if (checkStateSQL($nr)) {
//    while ($data = mysql_fetch_array($q)) {
//        $sql_Child = "SELECT rowId FROM $tb WHERE parent='" . $data['rowId'] . "' AND loginCompany='" . $_SESSION['company'] . "' ";
////        $sql_Child = "SELECT rowId FROM $tb WHERE parent='" . $data['rowId'] . "' ";
//        $q_Child = mysql_query($sql_Child);
//        $nr_Child = mysql_num_rows($q_Child);
//        if (checkStateSQL($nr_Child)) {
//            //Have Child
//        } else {
//            //Don't have Child
////            $gCol = "englishName,thaiName,code";
////            $treeG->render_sql($sql, "rowId", $gCol, "", "parent");
//        }
//    }
//}
function getDataList($gStrF, $gField, $gTb, $gArrayField, $gSetWhere) {
    if (!EMPTY($gStrF)) {
        $sql = "SELECT $gField FROM $gTb AS $gStrF $gSetWhere";
    } else {
        $sql = "SELECT $gField FROM $gTb $gSetWhere";
    }


    $dbQuery = mysql_query($sql) or die("Error Query [" . $sql . "]");
    $resultSel = mysql_num_rows($dbQuery);
    if (checkStateSQL($resultSel)) {
        while ($row = mysql_fetch_array($dbQuery)) {
//            $sql_Child = "SELECT rowId FROM $gTb WHERE parent='" . $row['rowId'] . "' AND loginCompanyId='" . $_SESSION['company_id'] . "' ";
//            $q_Child = mysql_query($sql_Child) or die("Error Query [" . $sql_Child . "]");
//            $nr_Child = mysql_num_rows($q_Child);
//            if (checkStateSQL($nr_Child)) {
                //Have Child
                print ("<row id='" . $row['rowId'] . "|" . $row['id'] . "'>");
                for ($i = 0; $i < count($gArrayField); $i++) {
                    //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                    if (strpos($gArrayField[$i], ".") !== false) {

                        $bField = explode('.', $gArrayField[$i]);
                        if ($bField[1] == 'rowId') {
                            
                        } else {
                            print((EMPTY($row[$bField[1]])) ? ("<cell></cell>") : ("<cell>" . $row[$bField[1]] . "</cell>"));
                        }
                    } else {
                        if ($gArrayField[$i] == 'rowId') {
                            
                        } else {
                            print((EMPTY($row[$gArrayField[$i]])) ? ("<cell></cell>") : ("<cell>" . $row[$gArrayField[$i]] . "</cell>"));
                        }
                    }
                }
                print ("</row>");
//            } else {
//                //Don't have Child
//            }
        }
    }
}

//---------- Edit Data(below) ----------
$class = $_REQUEST['class'];
$type = $_REQUEST['type'];
$group = $_REQUEST['group'];

$strF = "f";
$field = "$strF.rowId,$strF.englishName,$strF.thaiName,$strF.code,$strF.id";
$tb = "productstructure";
//$setWhere = "WHERE $strF.rowId = (SELECT max(rowId) FROM $tb WHERE class='" . $class . "' AND type='" . $type . "' AND gGroup='" . $group . "' )
$setWhere = "WHERE class='" . $class . "' AND type='" . $type . "' AND gGroup='" . $group . "' AND typeP='stru' ORDER BY rowId ASC";

//----------  ----------
$arrayField = explode(',', $field);

//XML HEADER
header("Content-type: text/xml");
//encoding may be different in your case
echo('<?xml version="1.0" encoding="UTF-8"?>');
echo ('<rows id="0">');

////print tree XML
getDataList($strF, $field, $tb, $arrayField, $setWhere);

//Close db connection
mysql_close($conn);
echo ('</rows>');
?>
