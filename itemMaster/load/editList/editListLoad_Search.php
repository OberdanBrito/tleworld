<?php

require_once("../../../commons/PHP/connectDB.php");
$gCode = $_REQUEST["gCode"];
$fields = $_GET['fields'];

$sql = "SELECT rowId,$fields FROM productstructure WHERE typeP='item' AND code LIKE '%$gCode%' ";

require("../../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$grid = new GridConnector($conn);
$grid->render_sql($sql, "rowId", $fields);
?>
