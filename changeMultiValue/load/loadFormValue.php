<?php

require_once("../../commons/PHP/connectDB.php");

$table = $_GET['tb'];
$class = $_GET['class'];
$type = $_GET['type'];
$fieldName = $_GET['fieldName'];
//$fields2 = substr($fields, strpos($fields, ',') + 1);

$setWhere = ISSET($class)==""?"type='$type'":"class='$class' AND type='$type'";

$sql = "SELECT $fieldName FROM $table WHERE $setWhere ORDER BY rowId ASC";

require("../../DHX/dhtmlxConnector/codebase/options_connector.php");
$data = new SelectOptionsConnector($conn, "MySQL");
$data->render_sql($sql, "rowId", "name,name");
?>
