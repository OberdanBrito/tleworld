<?php
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
	$sql = "UPDATE unit SET ";
	if ($_POST["u_name"] != '')
	{		$sql .= " name = '".addslashes($_POST["u_name"])."' ";
	}else{	$sql .= " name = NULL ";
	}			
	if ($_POST["u_numerator"] != '')
	{		$sql .= ", numerator = ".addslashes($_POST["u_numerator"])." ";
	}else{	$sql .= ", numerator = NULL ";
	}		
	if ($_POST["u_denominator"] != '')
	{		$sql .= ", denominator = ".addslashes($_POST["u_denominator"])." ";
	}else{	$sql .= ", denominator = NULL ";
	}			
	if ($_POST["u_unit"] != '')
	{		$sql .= ", unit = '".addslashes($_POST["u_unit"])."' ";
	}else{	$sql .= ", unit = NULL ";
	}	
	if ($_POST["u_abbreviation"] != '')
	{		$sql .= ", abbreviation = '".addslashes($_POST["u_abbreviation"])."' ";
	}else{	$sql .= ", abbreviation = NULL ";
	}		
	if ($_POST["u_class"] != '')
	{		$sql .= ", class = '".addslashes($_POST["u_class"])."' ";
	}else{	$sql .= ", class = NULL ";
	}	
	if ($_POST["u_type"] != '')
	{		$sql .= ", type = '".addslashes($_POST["u_type"])."' ";
	}else{	$sql .= ", type = NULL ";
	}
	$sql .= " WHERE rowId = ".$_POST["u_rowId"];
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
$rowId = $_POST["u_rowId"]; //id or row which was updated
$newId = $_POST["u_rowId"]; //will be used for insert operation

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
