<?php

session_start();

$fields = $_GET['fields'];
$orderId = $_REQUEST['orderId'];
$sql = "SELECT $fields FROM orderdetail WHERE orderId='$orderId'";

$rowId = "rowId";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
$tgrid->enable_log("orderdetailload.log", true);
//
//function filter_set($action) {
//    $action->remove_field("checkbox"); //the named field won't be included in CRUD operations
//}

//$tgrid->event->attach("beforeProcessing", "filter_set");
$tgrid->render_sql($sql, $rowId, $fields);
?>