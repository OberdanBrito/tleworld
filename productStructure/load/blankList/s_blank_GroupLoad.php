<?php

ob_start();
session_start();
header("Cache-Control: no-cache, must-revalidate");
require_once("../../../commons/PHP/connectDB.php");

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

function getDataGroup($gField, $gTb, $gArrayField, $gSetWhere) {
    $keepArr = array("0");
    $sql = "SELECT $gField FROM $gTb $gSetWhere";
    $dbQuery = mysql_query($sql) or die ("Error Query [".$sql."]");
    $resultSel = mysql_num_rows($dbQuery);

    if (checkStateSQL($resultSel)) {
        //Have item
        while ($row = mysql_fetch_array($dbQuery)) {

//            $sql_Gr = "SELECT rowId FROM $gTb WHERE parent='" . $row['rowId'] . "' AND loginCompany='" . $_SESSION['company'] . "'";
//            $q_Gr = mysql_query($sql_Gr);
//            $nr_Gr = mysql_num_rows($q_Gr);
//            if (checkStateSQL($nr_Gr)) {
//                //Have child
//            } else {
                //No Have child
                $data_ar = $row['class'] . ":" . $row['type'] . ":" . $row['gGroup'];
                if (array_search($data_ar, $keepArr) == "") {
                    //No data in $keepArr
                    array_push($keepArr, $data_ar);
                    print ("<row id='" . $row['rowId'] . "'>");
                    for ($i = 0; $i < count($gArrayField); $i++) {
                        //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                        if ($gArrayField[$i] == 'rowId') {
                            
                        } else {
                            print((EMPTY($row[$gArrayField[$i]])) ? ("<cell></cell>") : ("<cell>" . $row[$gArrayField[$i]] . "</cell>"));
                        }
                    }
                    print ("</row>");
                } else {
                    //Have data in $keepArr
                }
//            }
        }
    }
}

//---------- Edit Data(below) ----------
$field = "rowId,class,type,gGroup";
$tb = "productstructure";
$setWhere = "WHERE typeP='item' ORDER BY class,type,gGroup ASC";
//$setWhere = "WHERE typeP='item' AND class!='Style' ";
//----------  ----------
$arrayField = explode(',', $field);

//XML HEADER
header("Content-type: text/xml");
//encoding may be different in your case
echo('<?xml version="1.0" encoding="UTF-8"?>');
echo ('<rows id="0">');

////print tree XML
getDataGroup($field, $tb, $arrayField, $setWhere);

//Close db connection
mysql_close($conn);
echo ('</rows>');
?>
