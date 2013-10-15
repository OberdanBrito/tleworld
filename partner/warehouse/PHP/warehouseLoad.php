<?php

session_start();

$fields = $_GET['fields'];
$rowId = "rowId";
$parent = "parentId";
$companyId = $_SESSION['company_id'];
$sql = "SELECT * FROM location WHERE loginCompanyId='$companyId'";
include ('../../../commons/PHP/connectDB.php');
require("../../../DHX/dhtmlxConnector/codebase/treegrid_connector.php");
$tgrid = new TreeGridConnector($conn);
$tgrid->enable_log("temp.log", true);
//$tgrid->dynamic_loading();

function custom_define($item) {
    $item->set_kids(true);
}

//$tgrid->event->attach("beforeRender", "custom_define");
$tgrid->render_sql($sql, $rowId, $fields, "", $parent);
?>