<?php

require_once("../../../commons/PHP/connectDB.php");

$fields = $_GET['fields'];

//----- treeGrid -----
function structInsert($action) {
    if ($action->get_value("englishName") == "")
        $action->invalid();
}

//----- form -----
function myInsert($action) {
    if ($action->get_value("startDate") == "") {
        $action->set_value("startDate") == NULL;
    }
    if ($action->get_value("validUntil") == "") {
        $action->set_value("validUntil") == NULL;
    }
}

//----- END -----

require("../../../DHX/dhtmlxConnector/codebase/form_connector.php");
$form = new FormConnector($conn, "MySQL");
$form->enable_log("form.log", true);
$form->event->attach("beforeInsert", myInsert);
$form->event->attach("beforeUpdate", myInsert);
$form->render_table("productstructure", "rowId", $fields);
?>
