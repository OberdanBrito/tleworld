<?php
session_start();

$fields=$_GET['fields'];
$companyId = $_SESSION['company_id'];
$sql="SELECT * FROM pricestr WHERE loginCompanyId='$companyId'";
$rowId="rowId";
include ('../../connectDB/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
//$tgrid->enable_log("temp.log",true); 
$tgrid->render_sql($sql,$rowId,$fields);
?>