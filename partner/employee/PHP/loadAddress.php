<?php
session_start();

$fields=$_GET['fields'];
$getId=$_REQUEST['getId'];
//$pxcID=$_GET['pxcid'];
//$pId = $_GET[''];
$sql="SELECT * FROM partnerdetail WHERE type = 'address' AND partnerId='$getId'";
//$sql="SELECT * FROM partnerdetail as pd INNER JOIN address as ad ON pd.value = ad.id WHERE pd.type = 'address'";
$rowId="rowId";
include ('../../../commons/PHP/connectDB.php');
require("../../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
$tgrid->enable_log("samm.log",true); 
//
$tgrid->render_sql($sql,$rowId,$fields);
?>
