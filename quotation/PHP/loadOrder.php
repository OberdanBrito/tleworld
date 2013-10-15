<?php

require_once("../../commons/PHP/connectDB.php");

$fields = $_GET['fields'];

require("../../DHX/dhtmlxConnector/codebase/form_connector.php");
$form = new FormConnector($conn, "MySQL");
$form->enable_log("loadOrder.log", true);
//    $form->event->attach("beforeInsert", myInsert);
//    $form->event->attach("beforeUpdate", myInsert);
//    $form->event->attach("afterInsert", afterInsert);
$form->render_table("ordermaster", "rowId", $fields);
?>
