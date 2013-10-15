<?php
ob_start();

require_once("../../../commons/PHP/connectDB.php");
//include("../function.php");
function checkStateSQL($getPara) {
    if($getPara == '') {
        return false;
    }else
    if($getPara == null){
        return false;
    }else
    if($getPara == '0'){
        return false;
    }
    if(EMPTY($getPara)){
        return false;
    }
    return true;
}



//---------- Edit Data(below) ----------
$field = "u.class,count(*)";
$tb = "unit";

$setWhere = " ";
//----------  ----------

$arrayField = explode(',', $field);


function getDataGroup( $gField, $gTb, $gArrayField, $gSetWhere) {
    if(!ISSET($gStrF)) {
		$sql = "SELECT $gField FROM $gTb AS u GROUP BY u.class";
    }

    $dbQuery = mysql_query($sql);
    $resultSel = mysql_num_rows($dbQuery);
    if(checkStateSQL($resultSel)) {
        while($row = mysql_fetch_array($dbQuery)) {
            print ("<row id='".$row['class']."'>");

            for($i=0; $i<count($gArrayField); $i++) {
            //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                if(strpos($gArrayField[$i],".") !== false) {

                    $bField = explode('.',$gArrayField[$i]);
                    print((EMPTY($row[$bField[1]]))? ("<cell></cell>"):("<cell>".$row[$bField[1]]."</cell>"));
                }else {
                    print((EMPTY($row[$gArrayField[$i]]))? ("<cell></cell>"):("<cell>".$row[$i]."</cell>"));
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
getDataGroup( $field, $tb, $arrayField, $setWhere);

//Close db connection
mysql_close($conn);

echo ('</rows>');

?>

