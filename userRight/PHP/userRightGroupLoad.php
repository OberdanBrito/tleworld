<?php
session_start();

$fields=$_GET['fields'];
$loginC=$_SESSION['company'];
$cId = $_SESSION['company_id'];
$uid = $_SESSION['user_id'];
$sql="SELECT * FROM loginuser WHERE companyId='$cId' AND id<>'$uid'";
$rowId="rowId";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
//$tgrid->enable_log("temp.log",true); 
$tgrid->render_sql($sql,$rowId,$fields);
?>
