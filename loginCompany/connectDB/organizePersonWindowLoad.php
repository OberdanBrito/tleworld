<?php
ob_start();
session_start();
$fields = $_GET['fields'];

include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$sql = "SELECT nc.rowId, nc.id, CONCAT(nc.englishName,' ',nc.englishLastName) AS partnername 
	FROM partnerxcompany AS pxc ,( SELECT c.id FROM partner AS c) AS oc, partner AS nc, logincompany AS logc
	WHERE pxc.company_id = oc.id AND logc.partner_id=oc.id AND pxc.rel_type = 'employee' AND pxc.partner_id = nc.id AND logc.id='".$_GET['cId']."'";
$grid = new GridConnector($conn);
$grid->render_sql($sql, "rowId", $fields);
?>