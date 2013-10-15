<?php
session_start();
header("Content-type: text/xml");
require_once("../../../commons/PHP/connectDB.php");
require("../../createSession.php");
function checkStateSQL($getPara) {
    if($getPara == '') {
        return false;
    }else
    if($getPara == null){
        return false;
    }else
    if($getPara == '0'){
        return false;
    }
    if(EMPTY($getPara)){
        return false;
    }
    return true;
}

function add_row() {
    global $newId;
    return "insert";
}

function get_id(){
	$sql = "SELECT max(u.id) FROM unit as u";
	$dbQuery = mysql_query($sql);
    $resultSel = mysql_num_rows($dbQuery);
        while($row = mysql_fetch_array($dbQuery)) {
			$max_id = $row[0];
			$array_max_id = explode('-', $max_id);
			if(count($array_max_id)==3)
			{
				$new_max_id = str_pad($array_max_id[1]+1,3,'0',STR_PAD_LEFT);
				return "uni-".$new_max_id."-".$_SESSION['userName'];
			}else
			{
				return "uni-001-".$_SESSION['userName'];
			}
        }
}

function delete_row($del_id) {
	$sql = "DELETE FROM codedefinitions WHERE rowId = ".$del_id;
    mysql_query($sql);
    $result_update = mysql_affected_rows();
    if($result_update > 0) {
        return "delete";
    }else {
        return "delete_fail";
    }
}
//print_r($_POST);
//$mode = $_GET["!nativeeditor_status"]; //get request mode from dataprocessor
$rowId = $_POST["cd_rowId"]; //id or row which was updated
$newId = $_POST["cd_rowId"]; //will be used for insert operation

if(checkStateSQL($rowId)) {
   $action = delete_row($rowId);
}
echo $action;

?>
