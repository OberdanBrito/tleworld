<?php
require_once("../../../commons/PHP/connectDB.php");

if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) {
    header("Content-type: application/xhtml+xml"); } else {
    header("Content-type: text/xml");
}

$val = trim($_GET["val"]);
$field = trim($_GET["field"]);

$strSQL = "SELECT id FROM productstructure WHERE $field='$val'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$nr = mysql_num_rows($objQuery);
if(EMPTY($nr)) {
    echo "NoData,cod";
//    if($field == "thaiName") {
//        echo "NoData,thai,eng";
//    }else {
//        echo "NoData,eng,thai";
//    }
}else {
    echo $field." '".$val."' ซ้ำกับฐานข้อมูล,".$field;
//    if($field == "thaiName") {
//        echo "ชื่อ '".$str."' ซ้ำกับฐานข้อมูล,thai,eng";
//    }else {
//        echo "ชื่อ '".$str."' ซ้ำกับฐานข้อมูล,eng,thai";
//    }
}
?>
