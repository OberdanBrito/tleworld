<?php

session_start();

$fields = $_GET['fields'];
//$fields = substr($fields, strpos($fields, ',')+1);
$status = $_GET['status'];
$loginCompany = $_SESSION['company_id'];
$sql = "SELECT $fields FROM ordermaster WHERE docType='quotation' AND status='$status' AND loginCompanyId='$loginCompany'";

$rowId = "rowId";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
$tgrid->enable_log("loadOrderMaster.log", true);

$tgrid->render_sql($sql, $rowId, $fields, '');
?>