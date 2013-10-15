<?php

session_start();

$fields = $_GET['fields'];
$cId = $_SESSION['company_id'];
$target = $_REQUEST['target'];
if ($target == "group") {
    $sql = "SELECT $fields FROM codedefinitions WHERE type='partner_type'";
}elseif($target == "list"){
    $code = $_REQUEST['code'];
    $sql = "SELECT $fields FROM partner WHERE loginCompanyId='$cId' AND relType='customer' AND personType='$code'";
}
$rowId = "rowId";
include ('../../../commons/PHP/connectDB.php');
require("../../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
//$tgrid->enable_log("blankList.log",true); 
$tgrid->render_sql($sql, $rowId, $fields);
?>
