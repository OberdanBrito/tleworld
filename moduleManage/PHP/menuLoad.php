<?php

session_start();
$uid = $_SESSION['user_id'];
$fields = $_GET['fields'];
$sql = "SELECT * FROM menus WHERE userId='$uid'";
$rowId = "rowId";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$tgrid = new GridConnector($conn);
$tgrid->enable_log("menu.log",true); 
$tgrid->render_sql($sql, $rowId, $fields);
?>