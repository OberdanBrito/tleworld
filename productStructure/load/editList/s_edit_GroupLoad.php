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

function getDataList($gField, $gTb, $gArrayField, $gSetWhere) {
    $keepArr = array("0");
//
//    $sql = "SELECT $gField FROM $gTb $gSetWhere";
//    $dbQuery = mysql_query($sql) or die ("Error Query [".$sql."]");
//    $resultSel = mysql_num_rows($dbQuery);
//
//    if (checkStateSQL($resultSel)) {
//        //Have Child
//        while ($row = mysql_fetch_array($dbQuery)) {

    $sql_Gr = "SELECT $gField FROM $gTb $gSetWhere";
    $q_Gr = mysql_query($sql_Gr) or die("Error Query [" . $sql_Gr . "]");
    $nr_Gr = mysql_num_rows($q_Gr);
    if (checkStateSQL($nr_Gr)) {
        while ($row_gr = mysql_fetch_array($q_Gr)) {
            $data_ar = $row_gr['class'] . ":" . $row_gr['type'] . ":" . $row_gr['gGroup'];

            if (array_search($data_ar, $keepArr) == "") {
                //No data in $keepArr
                array_push($keepArr, $data_ar);
                print ("<row id='" . $row_gr['rowId'] . "'>");
                for ($i = 0; $i < count($gArrayField); $i++) {
                    //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                    if ($gArrayField[$i] == 'rowId') {
                        
                    } else {
                        print((EMPTY($row_gr[$gArrayField[$i]])) ? ("<cell></cell>") : ("<cell>" . $row_gr[$gArrayField[$i]] . "</cell>"));
                    }
                }
                print ("</row>");
            } else {
                //Have data in $keepArr
            }
        }
    }
//        }
//    }
}

//---------- Edit Data(below) ----------

$field = "rowId,class,type,gGroup";
$tb = "productstructure";
$setWhere = "WHERE typeP='stru' AND loginCompanyId='" . $_SESSION['company_id'] . "' GROUP BY class,type,gGroup ORDER BY rowId ASC";
//----------  ----------
$arrayField = explode(',', $field);

//XML HEADER
header("Content-type: text/xml");
//encoding may be different in your case
echo('<?xml version="1.0" encoding="UTF-8"?>');
echo ('<rows id="0">');

////print tree XML
getDataList($field, $tb, $arrayField, $setWhere);

//Close db connection
mysql_close($conn);
echo ('</rows>');
?>
