<?php
ob_start();
session_start();
header("Content-type: text/xml");
echo('<?xml version="1.0" encoding="UTF-8"?>');
require_once("../../../commons/PHP/connectDB.php");
//require("./createSession.php");
//include("./function.php");
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

//$newIdProd = "prod-".$_SEESION['sesDateTimeNow'];

function add_row() {
    global $newId;
    return "insert";
}

function update_row() {
    global $newId;
	$sql = "UPDATE rates SET ";
	if ($_POST["r_thaiName"] != '')
	{		$sql .= " thaiName = '".addslashes($_POST["r_thaiName"])."' ";
	}else{	$sql .= " thaiName = NULL ";
	}	
	if ($_POST["r_englishName"] != '')
	{		$sql .= ", englishName = '".addslashes($_POST["r_englishName"])."' ";
	}else{	$sql .= ", englishName = NULL ";
	}		
	if ($_POST["r_description"] != '')
	{		$sql .= ", description = '".addslashes($_POST["r_description"])."' ";
	}else{	$sql .= ", description = NULL ";
	}		
	if ($_POST["r_type"] != '')
	{		$sql .= ", type = '".addslashes($_POST["r_type"])."' ";
	}else{	$sql .= ", type = NULL ";
	}
	if ($_POST["r_code"] != '')
	{		$sql .= ", code = '".addslashes($_POST["r_code"])."' ";
	}else{	$sql .= ", code = NULL ";
	}		
	if ($_POST["r_lowerRange"] != '')
	{		$sql .= ", lowerRange = ".addslashes($_POST["r_lowerRange"])." ";
	}else{	$sql .= ", lowerRange = NULL ";
	}		
	if ($_POST["r_upperRange"] != '')
	{		$sql .= ", upperRange = ".addslashes($_POST["r_upperRange"])." ";
	}else{	$sql .= ", upperRange = NULL ";
	}		
	if ($_POST["r_rate"] != '')
	{		$sql .= ", rate = ".addslashes($_POST["r_rate"])." ";
	}else{	$sql .= ", rate = NULL ";
	}		
	if ($_POST["r_unit"] != '')
	{		$sql .= ", unit = '".addslashes($_POST["r_unit"])."' ";
	}else{	$sql .= ", unit = NULL ";
	}	
	if ($_POST["r_startDate"] != '')
	{		$sql .= ", startDate = '".addslashes($_POST["r_startDate"])."' ";
	}else{	$sql .= ", startDate = NULL ";
	}	
	if ($_POST["r_validUntil"] != '')
	{		$sql .= ", validUntil = '".addslashes($_POST["r_validUntil"])."' ";
	}else{	$sql .= ", validUntil = NULL ";
	}
	$sql .= " WHERE rowId = ".$_POST["r_rowId"];
	//print($sql);
    mysql_query($sql);
    $result_update = mysql_affected_rows();
    if($result_update > 0) {
        return "update";
    }else {
        return "update_fail";
    }
}

//$mode = $_GET["!nativeeditor_status"]; //get request mode from dataprocessor
//print_r($_POST);
$rowId = $_POST["r_rowId"]; //id or row which was updated
$newId = $_POST["r_rowId"]; //will be used for insert operation

            $action = update_row();

echo "<data>";
echo "<action type='".$action."' sid='".$rowId."' tid='".$newId."' />";
echo "</data>";

?>
