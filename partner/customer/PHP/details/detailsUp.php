<?php
$fields = $_GET['fields'];
$sql = "SELECT rowId,$fields FROM partnerdetail";

require_once("../../../../commons/PHP/connectDB.php");
require("../../../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$grid = new GridConnector($conn);
$grid->render_sql($sql, "rowId", $fields);
?>
