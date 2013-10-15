<?php
ob_start();
header("Cache-Control: no-cache, must-revalidate");
//session_start();

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
$class = $_REQUEST['class'];
$type = $_REQUEST['type'];
$group = $_REQUEST['group'];



//------------------------------- Edit Data(below) -------------------------------
$strF = "f";
$field = "$strF.rowId,$strF.id,$strF.englishName,$strF.thaiName,$strF.code";
$tb = $vArr[1];


if($class == '' && $type == '' && $group == '') {
//----------------------- class,type,group Dont'Have data
    $setWhere = "WHERE $strF.rowId = (SELECT max(rowId) FROM $tb WHERE id = $strF.id )
                AND class IS NULL AND type IS NULL AND gGroup IS NULL";
//$setWhere = "WHERE class IS NULL AND type IS NULL AND gGroup IS NULL";
}
else if($type == '' && $group == '') {

    //----------------------- class HAVE data
        $setWhere = "WHERE $strF.rowId = (SELECT max(rowId) FROM $tb WHERE id = $strF.id )
                    AND class = '".$class."' AND type IS NULL AND gGroup IS NULL";
    //$setWhere = "WHERE class = '".$class."' AND type IS NULL AND gGroup IS NULL";
    }
    else if($group == '') {

        //----------------------- class,type HAVE data
            $setWhere = "WHERE $strF.rowId = (SELECT max(rowId) FROM $tb WHERE id = $strF.id )
                        AND class = '".$class."' AND type = '".$type."' AND gGroup IS NULL";
        //$setWhere = "WHERE class = '".$class."' AND type = '".$type."' AND gGroup IS NULL";
        }
        else {

        //----------------------- class,type,group HAVE data
            $setWhere = "WHERE $strF.rowId = (SELECT max(rowId) FROM $tb WHERE id = $strF.id )
                        AND class = '".$class."' AND type = '".$type."' AND gGroup = '".$group."'";
        //$setWhere = "WHERE class = '".$class."' AND type = '".$type."' AND gGroup = '".$group."'";
        }

//------------------------------- END -------------------------------

$arrayField = explode(',', $field);


function getDataGroup($gStrF, $gField, $gTb, $gArrayField, $gSetWhere, $strucTable) {
    if(ISSET($gStrF)) {
        $sql = "SELECT $gField FROM $gTb AS $gStrF $gSetWhere ";
    }else {
        $sql = "SELECT $gField FROM $gTb $gSetWhere ";
    }


    $dbQuery = mysql_query($sql) or die("Error Query [" . $sql . "]");
    $resultSel = mysql_num_rows($dbQuery);
    if(checkStateSQL($resultSel)) {
        while($row = mysql_fetch_array($dbQuery)) {

        //Check data!! that have in Structure Table ?
            $sql_CheckId = "SELECT rowId FROM $strucTable WHERE parent = '".$row['id']."'";
            $dbQuery_CheckId = mysql_query($sql_CheckId) or die("Error Query [" . $sql_CheckId . "]");
            $rs_CheckId = mysql_num_rows($dbQuery_CheckId);
            if(!EMPTY($rs_CheckId)) {
                //Have --> Show
                print ("<row id='".$row['rowId']."'>");

                for($i=0; $i<count($gArrayField); $i++) {
                //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                    if(strpos($gArrayField[$i],".") !== false) {

                        $bField = explode('.',$gArrayField[$i]);
                        if($bField[1] == 'rowId' || $bField[1] == 'id') {   }else {
                            print((EMPTY($row[$bField[1]]))? ("<cell></cell>"):("<cell>".$row[$bField[1]]."</cell>"));
                        }
                    }else {
                        if($gArrayField[$i] == 'rowId' || $gArrayField[$i] == 'id') {   }else {
                            print((EMPTY($row[$gArrayField[$i]]))? ("<cell></cell>"):("<cell>".$row[$gArrayField[$i]]."</cell>"));
                        }
                    }
                }
                print ("</row>");
            }
    }//--while_1
    }
}

//XML HEADER
header("Content-type: text/xml");

//encoding may be different in your case
echo('<?xml version="1.0" encoding="UTF-8"?>');
echo ('<rows id="0">');

////print tree XML
getDataGroup($strF, $field, $tb, $arrayField, $setWhere, $vArr[1]);

//Close db connection
mysql_close($conn);

echo ('</rows>');

?>
