<?php 
session_start();
require("../../DHX/dhtmlxConnector/codebase/options_connector.php");
include ('../../commons/PHP/connectDB.php');
$partnerId = $_REQUEST['partnerId'];
$data = new SelectOptionsConnector($conn, "MySQL");
$data->render_sql("SELECT id,CONCAT(description,' - ',pricestr_en_nm) AS name FROM pricestr WHERE (pricestr_type='CTP' AND customer_id='$partnerId') OR (pricestr_type='STD' OR pricestr_type='SPP') AND active=1","rowId","id, name");
 
?> 