<?php
require_once("../../commons/PHP/connectDB.php");
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");

$treeG = new GridConnector($conn,"MySQL");

$strF = "f";
$field = "$strF.rowId,$strF.class,$strF.type,$strF.gGroup";
$tb = "productstructure";

$setWhere = "WHERE typeP='item' GROUP BY class,type,gGroup ASC";
$sql = "SELECT $field FROM $tb AS $strF $setWhere";

$gCol = "class,type,gGroup";
$treeG->render_sql($sql,"rowId",$gCol,"","parent");
?>
