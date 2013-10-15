<?php
session_start();

$fields=$_GET['fields'];
//$pxcID=$_GET['pxcid'];
$cId = $_SESSION['company_id'];
$sql="SELECT * FROM loginUser WHERE companyId='$cId' AND user_code='admin'";
$rowId="rowId";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
//$tgrid->enable_log("temp.log",true); 
$tgrid->render_sql($sql,$rowId,$fields);
?>
