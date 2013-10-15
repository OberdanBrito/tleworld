<?php
include("../../commons/PHP/connectDB.php");

$dhxType = $_GET['dhxType'];
$sql = stripslashes($_GET['sql']);
$rowId = $_GET['rowId'];
$fields = $_GET['fields'];
$parent = $_GET['parent'];

if($dhxType == "grid") {
    require("../../DHX/dhtmlxConnector/codebase/grid_connector.php");
    $grid = new GridConnector($conn);
    $grid->render_sql($sql,$rowId,$fields);

}elseif($dhxType == "treeGrid") {
    require("../../DHX/dhtmlxConnector/codebase/treegrid_connector.php");
    $treeG = new TreeGridConnector($conn,"MySQL");
    $treeG->render_sql($sql,$rowId,$fields,"",$parent);
    
}elseif($dhxType == "tree") {
    require("../../DHX/dhtmlxConnector/codebase/tree_connector.php");
    $tree = new TreeConnector($conn,"MySQL");
    $tree->render_sql($sql,$rowId,$fields,"",$parent);
}

?>
