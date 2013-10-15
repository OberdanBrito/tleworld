<?php
ob_start();
//session_start();

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

//$class = iconv("TIS-620", "UTF-8", $_REQUEST['class']);
//$type = iconv("TIS-620", "UTF-8", $_REQUEST['type']);
//$priceschedule = iconv("TIS-620", "UTF-8", $_REQUEST['priceschedule']);
//$currency = iconv("TIS-620", "UTF-8", $_REQUEST['currency']);

//---------- Edit Data(below) ----------
$field = "u.rowId,u.name,u.numerator,u.denominator,u.unit,u.abbreviation,u.class,u.type";
$tb = "unit";

//$cdtype = iconv("TIS-620", "UTF-8", $_REQUEST['cdtype'])
$setWhere = "WHERE u.class = '".addslashes($_REQUEST["utype"])."' ";

//----------  ----------

$arrayField = explode(',', $field);


function getDataGroup( $gField, $gTb, $gArrayField, $gSetWhere) {
    if(!ISSET($gStrF)) {
        $sql = "SELECT $gField FROM $gTb AS u $gSetWhere ";
    }
	//print($sql);
    $dbQuery = mysql_query($sql);
    $resultSel = mysql_num_rows($dbQuery);
    if(checkStateSQL($resultSel)) {
        while($row = mysql_fetch_array($dbQuery)) {
            print ("<row id='".$row['rowId']."'>");

            for($i=0; $i<count($gArrayField); $i++) {
            //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                if(strpos($gArrayField[$i],".") !== false) {
                    $bField = explode('.',$gArrayField[$i]);
                    print((EMPTY($row[$bField[1]]))? ("<cell></cell>"):("<cell>".$row[$bField[1]]."</cell>"));
                }else {
                    print((EMPTY($row[$gArrayField[$i]]))? ("<cell></cell>"):("<cell>".$row[$gArrayField[$i]]."</cell>"));
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
