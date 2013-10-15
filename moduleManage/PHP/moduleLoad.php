<?php
session_start();

$fields=$_GET['fields'];
$sql="SELECT * FROM modules";
$rowId="rowId";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
$tgrid->enable_log("module.log",true); 
$tgrid->render_sql($sql,$rowId,$fields);
?>