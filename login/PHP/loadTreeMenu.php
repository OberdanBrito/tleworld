<?php

ob_start();
session_start();

require("../../commons/PHP/connectDB.php");

$uid = $_SESSION['user_id'];
$lang = $_SESSION['language'];

function formatting($row) {
    if ($row->get_value("modId"))
        $row->set_kids(false);
    else
        $row->set_kids(true);
    $row->set_userdata("href",$row->get_value("code"));
    if($row->get_value("code")=="folder"){
        $row->set_image("folderOpen.gif","folderOpen.gif","folderClosed.gif"); 
    }
}

function custom_sort($sorted_by) {
    //SORT BY some_field ASC
    if (!sizeof($sorted_by->rules))
        $sorted_by->add("menuOrder", "ASC");
}

require("../../DHX/dhtmlxConnector/codebase/tree_connector.php");
$tree = new TreeConnector($conn);
//   
$tree->event->attach("beforeSort", "custom_sort");
$tree->event->attach("beforeRender", "formatting");

//   
//$tree->render_sql($sql, "rowId", $fields,"","parentId");
//$tree->enable_log("temp.log", true);
if ($lang == "English") {
    $tree->render_sql("SELECT * FROM menus WHERE userId='$uid' AND type='menu'", "rowId", "englishName", "", "parentId");
} else if ($lang == "Thai") {
    $tree->render_sql("SELECT * FROM menus WHERE userId='$uid' AND type='menu'", "rowId", "thaiName", "", "parentId");
}
?>