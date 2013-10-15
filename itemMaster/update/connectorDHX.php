<?php
require_once("../../commons/PHP/connectDB.php");

$dhxType = $_GET['dhxType'];
$sql = stripslashes($_GET['sql']);
$rowId = $_GET['rowId'];
$fields = $_GET['fields'];
$parent = $_GET['parent'];

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

if ($dhxType == "grid") {
    require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
    $grid = new GridConnector($conn);
    $grid->render_sql($sql, $rowId, $fields);
    
} elseif ($dhxType == "treeGrid") {
    require("../../DHX/dhtmlxConnector/codebase/treegrid_connector.php");
    $treeG = new TreeGridConnector($conn, "MySQL");
    $treeG->event->attach("beforeInsert", structInsert);
    $treeG->render_sql($sql, $rowId, $fields, "", $parent);
    
} elseif ($dhxType == "tree") {
    require("../../DHX/dhtmlxConnector/codebase/tree_connector.php");
    $tree = new TreeConnector($conn, "MySQL");
    $tree->render_sql($sql, $rowId, $fields, "", $parent);
    
} elseif ($dhxType == "form") {
    require("../../DHX/dhtmlxConnector/codebase/form_connector.php");
    $form = new FormConnector($conn, "MySQL");
    $form->event->attach("beforeInsert", myInsert);
    $form->event->attach("beforeUpdate", myInsert);
    $form->render_table("productstructure", $rowId, $fields);
}
?>
