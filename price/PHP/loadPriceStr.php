<?php 
session_start();
require("../../DHX/dhtmlxConnector/codebase/options_connector.php");
include ('../../commons/PHP/connectDB.php');
$data = new SelectOptionsConnector($conn, "MySQL");
$data->render_sql("SELECT id,CONCAT(description,' - ',pricestr_en_nm) AS name FROM pricestr WHERE active=1","rowId","id, name");
 
?> 