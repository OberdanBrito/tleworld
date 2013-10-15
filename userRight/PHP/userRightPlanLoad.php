<?php
session_start();

$fields=$_GET['fields'];
$userid=$_GET['userid'];
$sql="SELECT * FROM menus WHERE userId='$userid' AND code<>'folder'";
$rowId="rowId";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
//$tgrid->enable_log("temp.log",true); 
$tgrid->render_sql($sql,$rowId,$fields);
?>
