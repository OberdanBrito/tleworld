<?php
ob_start();
//session_start();

require_once("../../../commons/PHP/connectDB.php");
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
$field = "i.rowId,i.id,i.englishName,i.thaiName,i.code,i.description,i.class,i.type";
$tb = "itemMaster";
$setwhere = " ";
//----------  ----------

$arrayfield = explode(',', $field);


function getDataGroup($gfield,$gtb,$gsetwhere,$garrayfield) {

    $sql = "SELECT $gfield FROM $gtb AS i $gsetwhere ";
    $dbQuery = mysql_query($sql);
    $resultSel = mysql_num_rows($dbQuery);
    if(checkStateSQL($resultSel)) {
        while($row = mysql_fetch_array($dbQuery)) {
            print ("<row id='".$row['rowId']."'>");

            for($i=0; $i<count($garrayfield); $i++) {
            //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                if(strpos($garrayfield[$i],".") !== false) {
                    $bField = explode('.',$garrayfield[$i]);
                    print((EMPTY($row[$bField[1]]))? ("<cell></cell>"):("<cell>".$row[$bField[1]]."</cell>"));
                }else {
                    print((EMPTY($row[$garrayfield[$i]]))? ("<cell></cell>"):("<cell>".$row[$garrayfield[$i]]."</cell>"));
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
getDataGroup($field,$tb,$setwhere,$arrayfield);
//Close db connection
mysql_close($conn);

echo ('</rows>');

?>
