<?php

session_start();
include ('../../connectDB/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$fields = $_REQUEST['fields'];
$companyId = $_SESSION['company_id'];
$priceStrId = $_REQUEST['priceStrId'];
$rowId = "rowId";
$sql = "SELECT $fields FROM price WHERE loginCompanyId='$companyId' AND priceStrId='$priceStrId' GROUP BY class,type,gGroup ";
$grid = new GridConnector($conn);
$grid->enable_log("price2.log");
$grid->render_sql($sql, $rowId, $fields);
?>