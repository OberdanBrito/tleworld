<?php
require_once("../../commons/PHP/connectDB.php");

$fields = $_GET['fields'];
$typeP = $_GET['typeP'];
//$fields2 = substr($fields, strpos($fields, ',') + 1);
$sql = "SELECT * FROM productstructure WHERE typeP='$typeP' ORDER BY rowId ASC";

function filter_set($action) {
    $action->remove_field("checkboxes"); //the named field won't be included in CRUD operations
}

require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$grid = new GridConnector($conn);
//$grid->event->attach("beforeProcessing", "filter_set");
$grid->render_sql($sql, "rowId", $fields);
?>
