<?php

session_start();

$fields = $_REQUEST['fields'];
$sql = "SELECT * FROM partner WHERE relType='customer' AND personType='contact'";
$rowId = "rowId";
include ('../../../commons/PHP/connectDB.php');
require("../../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
//$tgrid->enable_log("temp.log", true);
$tgrid->render_sql($sql, $rowId, $fields);
?>
