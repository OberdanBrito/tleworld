<?php
session_start();

$fields=$_GET['fields'];
$loginC=$_SESSION['company'];
$cId = $_SESSION['company_id'];
$sql="SELECT * FROM logincompany";
$rowId="rowId";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/treegrid_connector.php");
$tgrid = new TreeGridConnector($conn);
$tgrid->enable_log("temp.log",true); 
$tgrid->render_sql($sql,$rowId,$fields,"","parentCompId");
?>