<?php
session_start();
$fields=$_GET['fields'];
$comId=$_GET['comId'];
$sql="SELECT $fields FROM pricestr WHERE loginCompany = '$comId' " ;
$rowId="rowId";

include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
//$tgrid->enable_log("temp.log",true); 
$tgrid->render_sql($sql,$rowId,$fields);
?>


