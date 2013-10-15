<?php

ob_start();
session_start();
$fields = $_REQUEST['fields'];
$getId = $_REQUEST['getId'];
$getType = $_REQUEST['getType'];

if ($getType == 'selCustomerName') {
    $sql = "SELECT CONCAT(title_th,thaiName,' ',thaiLastName) AS thaiName,CONCAT(title,englishName,' ',englishLastName) AS englishName FROM partner WHERE id='$getId'";
} else if ($getType == 'selContactPer') {
    $sql = "SELECT CONCAT(title_th,thaiName,' ',thaiLastName) AS thaiName,CONCAT(title,englishName,' ',englishLastName) AS englishName FROM  partnerdetail AS pd INNER JOIN partner AS p ON pd.value=p.id WHERE pd.partnerId='$getId'";
}else if($getType == 'selComAddress'||$getType == 'selShipAddress'||$getType == 'selBillAddress'){
    if($getType=='selComAddress'){
        $addressType = 'office';
    }else if($getType == 'selShipAddress'){
        $addressType = 'shipping';
    }else if($getType=='selBillAddress'){
        $addressType = 'billing';
    }else{
        echo "Error Query.";
    }
    $sql = "SELECT ad.address_all AS Address FROM partnerdetail AS pd INNER JOIN address AS ad ON pd.value=ad.id WHERE pd.partnerId='$getId' AND addressType='$addressType'";
}
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
$grid = new GridConnector($conn);
$grid->render_sql($sql, "rowId", $fields);
?>