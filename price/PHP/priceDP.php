<?php

session_start();

$fields = $_GET['fields'];
//$priceStrId = $_GET['priceStrId'];
$sql = "SELECT $fields FROM price";

$rowId = "rowId";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
$tgrid->enable_log("price.log", true);

function filter_set($action) {
    $action->remove_field("checkbox"); //the named field won't be included in CRUD operations
}

//$tgrid->event->attach("beforeProcessing", "filter_set");
$tgrid->render_sql($sql, $rowId, $fields);
?>