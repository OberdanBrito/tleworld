<?php
require_once("../../../commons/PHP/connectDB.php");

if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) {
    header("Content-type: application/xhtml+xml"); } else {
    header("Content-type: text/xml");
}

$code = trim($_GET["code"]);
$itemId = trim($_GET["itemId"]);
$companyId = trim($_GET["companyId"]);

$strSQL = "SELECT rowId FROM productstructure WHERE code='$code' AND itemId='$itemId' AND typeP='stru' AND loginCompanyId='$companyId'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$nr = mysql_num_rows($objQuery);
if(EMPTY($nr)) {
    echo "NoData";
//    if($field == "thaiName") {
//        echo "NoData,thai,eng";
//    }else {
//        echo "NoData,eng,thai";
//    }
}else {
    echo "code: '".$code."' ซ้ำกับฐานข้อมูล";
//    if($field == "thaiName") {
//        echo "ชื่อ '".$str."' ซ้ำกับฐานข้อมูล,thai,eng";
//    }else {
//        echo "ชื่อ '".$str."' ซ้ำกับฐานข้อมูล,eng,thai";
//    }
}
?>
