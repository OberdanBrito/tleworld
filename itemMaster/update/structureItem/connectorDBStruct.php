<?php
require_once("../../../commons/PHP/connectDB.php");

$sql = stripslashes($_GET['sql']);
$fields = $_GET['fields'];

//----- treeGrid -----
function structInsert($action) {
    if ($action->get_value("englishName") == "")
        $action->invalid();
}

require("../../../DHX/dhtmlxConnector/codebase/treegrid_connector.php");
$treeG = new TreeGridConnector($conn, "MySQL");
$treeG->event->attach("beforeInsert", structInsert);
$treeG->render_sql($sql, "rowId", $fields, "", "parent");
?>
