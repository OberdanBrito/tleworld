<?php

ob_start();
session_start();
$fields = $_GET['fields'];
$comId = $_SESSION['company_id'];
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$sql = "SELECT * FROM partner WHERE loginCompanyId='$comId' AND relType='customer' AND personType<>'contact'";
$grid = new GridConnector($conn);
//$grid->enable_log("log.log", true);
$grid->render_sql($sql, "rowId", $fields);
?>