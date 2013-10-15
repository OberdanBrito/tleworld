<?php
include("../../commons/PHP/connectDB.php");
$dhxType = $_GET['dhxType'];
//$sql = stripslashes($_GET['sql']);
$fields = $_GET['fields'];

//----- treeGrid,Grid -----
function myInsert($action) {
    if ($action->get_value("englishName") == "")
        $action->invalid();
}

if ($dhxType == "grid") {
    require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
    $grid = new GridConnector($conn);
    $grid->event->attach("beforeInsert", myInsert);
    $grid->render_sql("SELECT * FROM price", "rowId", $fields);
    
} elseif ($dhxType == "treeGrid") {
    require("../../DHX/dhtmlxConnector/codebase/treegrid_connector.php");
    $treeG = new TreeGridConnector($conn, "MySQL");
    $treeG->event->attach("beforeInsert", myInsert);
    $treeG->render_sql("SELECT * FROM productstructure ORDER BY rowId ASC", "rowId", $fields, "", "parent");
    
}
//elseif ($dhxType == "tree") {
//    require("../../DHX/dhtmlxConnector/codebase/tree_connector.php");
//    $tree = new TreeConnector($conn, "MySQL");
//    $tree->render_sql($sql, "rowId", $fields, "", "parent");
//}
?>