<?php
session_start();

$fields=$_GET['fields'];
$getId = $_REQUEST['getId'];
$sql="SELECT $fields FROM partnerdetail WHERE partnerId='$getId' AND type='contact'";
$rowId="rowId";
include ('../../../commons/PHP/connectDB.php');
require("../../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
//$tgrid->enable_log("temp.log",true); 
$tgrid->render_sql($sql,$rowId,$fields);
?>
