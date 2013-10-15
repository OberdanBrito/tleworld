<?php
ob_start();

require_once("../../commons/PHP/connectDB.php");
require("../variables.php");

function checkStateSQL($getPara) {
    if($getPara == '') {
        return false;
    }else
        if($getPara == null) {
            return false;
        }else
            if($getPara == '0') {
                return false;
            }
    if(EMPTY($getPara)) {
        return false;
    }
    return true;
}



//---------- Edit Data(below) ----------
$strF = "f";
$field = "$strF.rowId,$strF.class,$strF.type,$strF.gGroup";
$tb = $vArr[1];

$setWhere = "WHERE $strF.rowId = (SELECT max(rowId) FROM $tb
            WHERE class = 'Template' AND (type = $strF.type OR type IS NULL) AND (gGroup = $strF.gGroup OR gGroup IS NULL))
            OR $strF.rowId = (SELECT max(rowId) FROM $tb WHERE class IS NULL AND type IS NULL AND gGroup IS NULL)
            ORDER BY class , type , gGroup ASC";
//----------  ----------

$arrayField = explode(',', $field);


function getDataGroup($gStrF, $gField, $gTb, $gArrayField, $gSetWhere) {
    if(ISSET($gStrF)) {
        $sql = "SELECT $gField FROM $gTb AS $gStrF $gSetWhere";
    }else {
        $sql = "SELECT $gField FROM $gTb $gSetWhere";
    }


    $dbQuery = mysql_query($sql) or die("Error Query [" . $sql . "]");
    $resultSel = mysql_num_rows($dbQuery);
    if(checkStateSQL($resultSel)) {
        while($row = mysql_fetch_array($dbQuery)) {
            print ("<row id='".$row['rowId']."'>");

            for($i=0; $i<count($gArrayField); $i++) {
            //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                if(strpos($gArrayField[$i],".") !== false) {

                    $bField = explode('.',$gArrayField[$i]);
                    if($bField[1] == 'rowId') {   }else {
                        print((EMPTY($row[$bField[1]]))? ("<cell></cell>"):("<cell>".$row[$bField[1]]."</cell>"));
                    }
                }else {
                    if($gArrayField[$i] == 'rowId') {   }else {
                        print((EMPTY($row[$gArrayField[$i]]))? ("<cell></cell>"):("<cell>".$row[$gArrayField[$i]]."</cell>"));
                    }
                }

            }

            print ("</row>");
        }
    }
}

//XML HEADER
header("Content-type: text/xml");

//encoding may be different in your case
echo('<?xml version="1.0" encoding="UTF-8"?>');
echo ('<rows id="0">');

////print tree XML
getDataGroup($strF, $field, $tb, $arrayField, $setWhere);

//Close db connection
mysql_close($conn);

echo ('</rows>');

?>

