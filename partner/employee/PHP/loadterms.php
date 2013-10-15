<?php
session_start();
$fields=$_GET['fields'];
$getId = $_REQUEST['getId'];
$sql="SELECT * FROM partnerdetail WHERE type='termsCondition' AND partnerId='$getId'";   
$rowId="rowId";
include ('../../../commons/PHP/connectDB.php');
require("../../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$grid = new GridConnector($conn);
$grid->enable_log("ppp.log",true); 
$grid->render_sql($sql,$rowId,$fields);


?>
