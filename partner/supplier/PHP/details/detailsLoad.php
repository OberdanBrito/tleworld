<?php
$fields = $_GET['fields'];
$getId = $_GET['getId'];
$sql = "SELECT rowId,$fields FROM partnerdetail WHERE partnerId='$getId' AND type='details' ORDER BY rowId ASC";

require_once("../../../../commons/PHP/connectDB.php");
require("../../../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$grid = new GridConnector($conn);
$grid->render_sql($sql, "rowId", $fields);
?>
