<?php
include("../../../commons/PHP/connectDB.php");
$dhxType = $_GET['dhxType'];
//$sql = stripslashes($_GET['sql']);
$fields = $_GET['fields'];
$getId = $_GET['getId'];


if ($dhxType == "grid") {
    //---------- PRICE
    require("../../../DHX/dhtmlxConnector/codebase/grid_connector.php");
    $grid = new GridConnector($conn);
    $grid->render_sql("SELECT * FROM price WHERE productStrId='$getId'", "rowId", $fields);
    
} elseif ($dhxType == "treeGrid") {
    //---------- productStructure
    require("../../../DHX/dhtmlxConnector/codebase/treegrid_connector.php");
    $treeG = new TreeGridConnector($conn, "MySQL");
    $treeG->render_sql("SELECT * FROM productstructure WHERE parentMain='$getId' ORDER BY rowId ASC ", "rowId", $fields, "", "parent");
    
}
?>