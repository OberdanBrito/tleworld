<?php

require_once("../../../commons/PHP/connectDB.php");

$dhxType = $_GET['dhxType'];
$fields = $_GET['fields'];
//$parent = $_GET['parent'];

//----- ItemMaster -----
function myInsert($action) {
    if ($action->get_value("startDate") == "") {
        $action->set_value("startDate") == NULL;
    }
    if ($action->get_value("validUntil") == "") {
        $action->set_value("validUntil") == NULL;
    }
    if ($action->get_value("issuedRe") == "") {
        $action->set_value("issuedRe") == NULL;
    }
    if ($action->get_value("expireRe") == "") {
        $action->set_value("expireRe") == NULL;
    }
    if ($action->get_value("birthDate") == "") {
        $action->set_value("birthDate") == NULL;
    }
}

//----- END -----
if ($dhxType == "form") {
    require("../../../DHX/dhtmlxConnector/codebase/form_connector.php");
    $form = new FormConnector($conn, "MySQL");
    $form->enable_log("sam.log",true);
//    $form->event->attach("beforeInsert", myInsert);
//    $form->event->attach("beforeUpdate", myInsert);
//    $form->event->attach("afterInsert", afterInsert);
    $form->render_table("address", "rowId", $fields);
    
}
?>
