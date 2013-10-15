<?php

session_start();

$fields = $_GET['fields'];
//$priceStrId = $_GET['priceStrId'];
$sql = "SELECT * FROM ordermaster";

$rowId = "rowId";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/form_connector.php");
$tgrid = new FormConnector($conn);
$tgrid->enable_log("ordermaster.log", true);
$tgrid->render_table("ordermaster", $rowId, $fields);
?>