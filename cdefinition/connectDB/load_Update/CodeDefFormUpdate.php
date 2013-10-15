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
    //if(addslashes($_POST["amphur_code"]) != "" ||addslashes($_POST["amphur_name"]) != ""||addslashes($_POST["geo_id"]) != ""||addslashes($_POST["province_id"]) != "") 
	//{
    //}
    return "insert";
}

function update_row() {
    global $newId;
	$sql = "UPDATE codedefinitions SET ";
	if ($_POST["cd_thaiName"] != '')
	{		$sql .= " thaiName = '".addslashes($_POST["cd_thaiName"])."' ";
	}else{	$sql .= " thaiName = NULL ";
	}	
	if ($_POST["cd_englishName"] != '')
	{		$sql .= ", englishName = '".addslashes($_POST["cd_englishName"])."' ";
	}else{	$sql .= ", englishName = NULL ";
	}	
	if ($_POST["cd_code"] != '')
	{		$sql .= ", code = '".addslashes($_POST["cd_code"])."' ";
	}else{	$sql .= ", code = NULL ";
	}		
	if ($_POST["cd_description"] != '')
	{		$sql .= ", description = '".addslashes($_POST["cd_description"])."' ";
	}else{	$sql .= ", description = NULL ";
	}		
	if ($_POST["cd_type"] != '')
	{		$sql .= ", type = '".addslashes($_POST["cd_type"])."' ";
	}else{	$sql .= ", type = NULL ";
	}		
	if ($_POST["cd_groupCode"] != '')
	{		$sql .= ", groupCode = '".addslashes($_POST["cd_groupCode"])."' ";
	}else{	$sql .= ", groupCode = NULL ";
	}	
	if ($_POST["cd_startDate"] != '')
	{		$sql .= ", startDate = '".addslashes($_POST["cd_startDate"])."' ";
	}else{	$sql .= ", startDate = NULL ";
	}	
	if ($_POST["cd_validUntil"] != '')
	{		$sql .= ", validUntil = '".addslashes($_POST["cd_validUntil"])."' ";
	}else{	$sql .= ", validUntil = NULL ";
	}
	$sql .= " WHERE rowId = ".$_POST["cd_rowId"];
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
$rowId = $_POST["cd_rowId"]; //id or row which was updated
$newId = $_POST["cd_rowId"]; //will be used for insert operation

switch("updated") {
    case "inserted":
        if(checkStateSQL('rowId')) {
            $action = add_row();
        }
        break;
    default:
        if(checkStateSQL($rowId)) {
            $action = update_row();
        }
        break;
}
echo "<data>";
echo "<action type='".$action."' sid='".$rowId."' tid='".$newId."' />";
echo "</data>";

?>
