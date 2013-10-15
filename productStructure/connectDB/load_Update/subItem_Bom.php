<?php
ob_start();
session_start();
header("Cache-Control: no-cache, must-revalidate");

require_once("../../../commons/PHP/connectDB.php");
require("../../../itemMaster/variables.php");

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

if($_SESSION["logLanguage"] == "englishName") {
    $sLang[0] = $_SESSION["logLanguage"]; $sLang[1]="thaiName";
}else {
    $sLang[0] = $_SESSION["logLanguage"]; $sLang[1]="englishName";
}

//------------------------------- Edit Data(below) -------------------------------
$field = "rowId,id,$sLang[0],$sLang[1],code,description,style,class,type,gGroup";
$tb = $vArr[0];
$setWhere = "WHERE class='Goods'";
$arrayField = explode(',', $field);
//------------------------------- END -------------------------------


function getDataGroup($gStrF, $gField, $gTb, $gArrayField, $gSetWhere) {

    
        $sql = "SELECT $gField FROM $gTb $gSetWhere";
    

    $dbQuery = mysql_query($sql);
    $resultSel = mysql_num_rows($dbQuery);
    if(checkStateSQL($resultSel)) {
        while($row = mysql_fetch_array($dbQuery)) {
            print ("<row id='".$row['rowId']."|".$row['id']."|".$row['class']."|".$row['type']."|".$row['gGroup']."'>");
            for($i=0; $i<count($gArrayField); $i++) {
            //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                if(strpos($gArrayField[$i],".") !== false) {

                    $bField = explode('.',$gArrayField[$i]);
                    if($bField[1] == 'rowId' || $bField[1] == 'id' || $bField[1] == 'type' ) {   }else {
                        print((EMPTY($row[$bField[1]]))? ("<cell></cell>"):("<cell>".$row[$bField[1]]."</cell>"));
                    }
                }else {
                    if($gArrayField[$i] == 'rowId' || $gArrayField[$i] == 'id' || $gArrayField[$i] == 'type') {   }else {
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


