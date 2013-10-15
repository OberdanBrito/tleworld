<?php

session_start();

$fields = $_GET['fields'];
//$fields = substr($fields, strpos($fields, ',')+1);
$priceStrId = $_GET['priceStrId'];
$group = $_REQUEST['group'];
$class = $_REQUEST['class'];
$type = $_REQUEST['type'];
$sql = "SELECT $fields FROM price WHERE priceStrId='$priceStrId' AND gGroup='$group' AND class='$class' AND type='$type'";

$rowId = "rowId";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
$tgrid->enable_log("priceLoad.log", true);

function filter_set($action) {
    $action->remove_field("checkbox"); //the named field won't be included in CRUD operations
}

//$tgrid->event->attach("beforeProcessing", "filter_set");
$tgrid->render_sql($sql, $rowId, $fields, '');
?>