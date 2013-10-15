<?php

session_start();
$table = "pricestr";
$rowId = "rowId";
$fields = "id,customer_id,pricestr_type,pricestr_th_nm,pricestr_en_nm,pricestr_code,currency,discount,discountmax,commission,description,loginCompany,loginUser,startDate,validUntil,revision";
include ('../../commons/PHP/connectDB.php');
require("../../DHX/dhtmlxConnector/codebase/form_connector.php");
$form = new FormConnector($conn);
$form->enable_log("temp.log", true);

//function getId($type) {
//    
//}
//
//function insert($data) {
//    $time = "SELECT CURDATE()";
//    $timeQuery = mysql_query($time);
//    $timeArray = mysql_fetch_array($timeQuery);
//    $date = $timeArray[0];
//    $data->set_value("id", "std$date");
//    $data->set_value("revision",0);
//}
//
//function bUpdate($data) {
//    $updatedId = $_GET['ids'];
//    $fields = $fields.",editor,editTime,revision";
//    $revisionSql = "SELECT id,revision FROM pricestr WHERE rowId=$updatedId";
//    $revisionQuery = mysql_query($revisionSql);
//    $revisionArray = mysql_fetch_array($revisionQuery);
//    $revision = $revisionArray[1];
//    $revisionId = $revisionArray[0];
//    $data->add_field("editor",1);
//    $data->set_value("editor",$_SESSION['user_id']);
//    $data->add_field("revision",1);
//    $data->set_value("revision",$revision);
//    $data->set_value("id", $revisionId);
//}

//$form->event->attach("beforeInsert", "insert");
//$form->event->attach("beforeUpdate", "bUpdate");
$form->render_table($table, $rowId, $fields);
?>