<?php
ob_start();
session_start();

$fields=$_GET['fields'];
//$pxcID=$_GET['pxcid'];
//$pId = $_GET[''];
//$sql="SELECT * FROM partnerdetail WHERE partnerId = '$pId' AND type = 'address'";
//$sql="SELECT ad.address_all FROM partnerdetail as pd INNER JOIN address as ad ON pd.value = ad.id WHERE pd.type = 'address'";
$sql="SELECT $fields FROM address";
//$sql="SELECT * FROM partnerdetail WHERE type = 'address'";
$rowId="rowId";
include ('../../../commons/PHP/connectDB.php');
require("../../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
//$tgrid->enable_log("temp.log",true); 
//
$tgrid->render_sql($sql,$rowId,$fields);
?>
