<?php

session_start();
require("../../DHX/dhtmlxConnector/codebase/options_connector.php");
include ('../../commons/PHP/connectDB.php');
$priceStrId = $_REQUEST['priceStrId'];
$delimiter = $_REQUEST['delimiter'];
$companyId = $_SESSION['company_id'];
$data = new SelectOptionsConnector($conn, "MySQL");
$data->render_sql("SELECT CONCAT(class,'$delimiter',type,'$delimiter',gGroup) AS CTGId,CONCAT(class,'$delimiter',type,'$delimiter',gGroup) AS CTG FROM price WHERE loginCompanyId='$companyId' AND priceStrId='$priceStrId' GROUP BY class,type,gGroup", "rowId", "CTGId,CTG");
?> 