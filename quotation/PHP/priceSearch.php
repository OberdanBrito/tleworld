<?php

session_start();

$fields = $_REQUEST['fields'];
//$fields = substr($fields, strpos($fields, ',')+1);
$priceStrId = $_REQUEST['priceStrId'];
$searchText = $_REQUEST['searchText'];

$sql = "SELECT $fields FROM price WHERE priceStrId='$priceStrId' AND code LIKE '%$searchText%'";

$rowId = "rowId";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
$tgrid->enable_log("priceSearch.log", true);

function filter_set($action) {
    $action->remove_field("checkbox"); //the named field won't be included in CRUD operations
}

//$tgrid->event->attach("beforeProcessing", "filter_set");
$tgrid->render_sql($sql, $rowId, $fields, '');
?>