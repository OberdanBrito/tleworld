<?php
/*
  Copyright DHTMLX LTD. http://www.dhtmlx.com
  This version of Software is free for using in non-commercial applications.
  For commercial use please contact sales@dhtmlx.com to obtain license
 */

//start session (see get.php for details) 
error_reporting(E_ALL ^ E_NOTICE);

ob_start();
session_start();

include ('../../commons/PHP/connectDB.php');
require_once('KLogger.php');
$log = new KLogger("log.txt", KLogger::DEBUG);

$uid = $_SESSION['user_id'];
$lang = $_SESSION['language'];
$usern = $_SESSION['loginUser'];
$company = $_SESSION['company'];
$table = "menus";
$rowId = "rowId";
$itemOrder = "menuOrder";
$pId = "parentId";
$label = "englishName";
$thLabel = "thaiName";
$code = "folder";


//FUNCTION TO USE IN THE CODE LATER
//deletes single node in db
function deleteSingleNode($id) {

}


//XML HEADER
//include XML Header (as response will be in xml format)
if (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml")) {
    header("Content-type: application/xhtml+xml");
} else {
    header("Content-type: text/xml");
}
echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n");
if (isset($_GET["!nativeeditor_status"]) && $_GET["!nativeeditor_status"] == "inserted") {

    //INSERT
    //insert new row
    $sql = "Insert into $table($label,$pId,$itemOrder,code,type,userId,thaiName,startDate,owner,createDate,loginCompany,loginUser) ";
    $sql.= "Values('" . addslashes($_GET["tr_text"]) . "'," . $_GET["tr_pid"] . "," . $_GET["tr_order"] . ",'$code','menu','$uid','". addslashes($_GET["tr_text"]) . "',NOW(),'$usern',NOW(),'$company','$usern')";
    $log->LogInfo("$sql");
    $res = mysql_query($sql);
    $newId = mysql_insert_id();
    //update items orders on the level where node was added
    $sql_uorders = "UPDATE $table SET $itemOrder=$itemOrder+1 WHERE $pId=" . $_GET["tr_pid"] . " AND $itemOrder>=" . $_GET["tr_order"] . " and $rowId!=$newId";
    $res = mysql_query($sql_uorders);

    //set value to use in response
    $action = "insert";
} else if (isset($_GET["!nativeeditor_status"]) && $_GET["!nativeeditor_status"] == "deleted") {

    //DELETE
    //updateitems order on the level where node was deleted
    $sql_uorders = "UPDATE $table SET $itemOrder=$itemOrder-1 WHERE $pId=" . $_GET["tr_pid"] . " AND $itemOrder>" . ($_GET["tr_order"]);
    $d_sql = "Delete from $table where $rowId=".$_GET["tr_id"];
    $log->LogInfo("$d_sql");
    $resDel = mysql_query($d_sql);
    $res = mysql_query($sql_uorders);
    $log->LogInfo("$sql_uorders");
    //set values to use in response
    $newId = $_GET["tr_id"];
    $action = "delete";
} else {
    //UPDATE and Drag-n-Drop
    //get information about node parent and order before update
    $sql_getoldparent = "SELECT $pId,$itemOrder FROM $table WHERE $rowId=" . $_GET['tr_id'];
    $log->LogInfo("$sql_getoldparent");
    $res = mysql_query($sql_getoldparent);
    $old_values = mysql_fetch_array($res);
    //update node info 
    $sql = "UPDATE $table SET $label = '" . addslashes($_GET["tr_text"]) . "',$thLabel='".addslashes($_GET["tr_text"])."',$pId = " . $_GET["tr_pid"] . ",$itemOrder = " . $_GET["tr_order"] . " where $rowId=" . $_GET["tr_id"];
    $log->LogInfo("$sql");
//update nodes order on old node level (after drag-n-drop node level can be changed)
    $sql_uorders_old = "UPDATE $table SET $itemOrder=$itemOrder-1 WHERE $pId=" . $old_values[0] . " AND $itemOrder>" . $old_values[1] . " and $rowId<>" . $_GET["tr_id"];
    $log->LogInfo("$sql_uorders_old");
//update nodes order on current node level
    $sql_uorders_new = "UPDATE $table SET $itemOrder=$itemOrder+1 WHERE $pId=" . $_GET["tr_pid"] . " AND $itemOrder>=" . $_GET["tr_order"] . " and $rowId<>" . $_GET["tr_id"];
    $log->LogInfo("$sql_uorders_new");
    $res = mysql_query($sql);
    $res = mysql_query($sql_uorders_old);
    $res = mysql_query($sql_uorders_new);

    //set values to include in response
    $newId = $_GET["tr_id"];
    $action = "update";
}
?>
<!-- response xml -->
<data>
    <action type='<?php echo $action; ?>' sid='<?php echo $_GET["tr_id"]; ?>' tid='<?php echo $newId; ?>'/>
</data>
