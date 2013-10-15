<?php
ob_start();
session_start();
header("Content-type: text/xml");
echo('<?xml version="1.0" encoding="UTF-8"?>');
require_once("../../../commons/PHP/connectDB.php");
require("../../createSession.php");
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
function check_dup(){
	$sql = "SELECT c.rowId FROM codedefinitions as c WHERE ";
	if($_POST["cd_thaiName"] != '')
	{		$sql .= " ( c.thaiName = '".$_POST["cd_thaiName"]."' ";
	}else{	$sql .= " ( c.thaiName IS NULL ";
	}	
	if($_POST["cd_englishName"] != '')
	{		$sql .= "OR c.englishName = '".$_POST["cd_englishName"]."' )";
	}else{	$sql .= "OR c.englishName IS NULL )";
	}	
	if($_POST["cd_type"] != '')
	{		$sql .= " AND c.type = '".$_POST["cd_type"]."' ";
	}else{	$sql .= " AND c.type IS NULL ";
	}
	$sql .= " LIMIT 1";
	$dbQuery = mysql_query($sql);
    $resultSel = mysql_num_rows($dbQuery);
        if($row = mysql_fetch_array($dbQuery)) {
			return true;
        }else{
			return false;
		}
}

function get_id(){
	$sql = "SELECT max(cd.id) FROM codedefinitions as cd";
	$dbQuery = mysql_query($sql);
    $resultSel = mysql_num_rows($dbQuery);
        while($row = mysql_fetch_array($dbQuery)) {
			$max_id = $row[0];
			$array_max_id = explode('-', $max_id);
			if(count($array_max_id)==3)
			{
				$new_max_id = str_pad($array_max_id[1]+1,3,'0',STR_PAD_LEFT);
				return "cod-".$new_max_id."-".$_SESSION['userName'];
			}else
			{
				return "pst-0001-".$_SESSION['userName'];
			}
        }
}

function insert_row() {
	if(check_dup())
	{
		return "insert_dup";
	}
	$insert_id = get_id();
    global $newId;
	$sql = "INSERT INTO codedefinitions (sortOrder,id,thaiName,englishName,description,type,code,groupCode,startDate,validUntil,owner,createDate,loginCompany,loginUser) VALUES (NULL";
	if ($insert_id != '')
	{ 		$sql .= ",'".$insert_id."' ";
	}else{ 	$sql .= ",NULL ";  
	}		
	if ($_POST["cd_thaiName"] != '')
	{ 		$sql .= ",'".addslashes($_POST["cd_thaiName"])."' ";
	}else{ 	$sql .= ",NULL ";  
	}	
	if ($_POST["cd_englishName"] != '')
	{ 		$sql .= ",'".addslashes($_POST["cd_englishName"])."' ";
	}else{ 	$sql .= ",NULL ";  
	}	
	if ($_POST["cd_description"] != '')
	{		$sql .= ",'".addslashes($_POST["cd_description"])."' ";
			//$sql .= ",NULL ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_POST["cd_type"] != '')
	{		$sql .= ",'".addslashes($_POST["cd_type"])."' ";
	}else{	return "insert_fail_type_null";
	}	
	if ($_POST["cd_code"] != '')
	{		$sql .= ",'".addslashes($_POST["cd_code"])."' ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_POST["cd_groupCode"] != '')
	{		$sql .= ",'".addslashes($_POST["cd_groupCode"])."' ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_POST["cd_startDate"] != '')
	{		$sql .= ",'".addslashes($_POST["cd_startDate"])."' ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_POST["cd_validUntil"] != '')
	{		$sql .= ",'".addslashes($_POST["cd_validUntil"])."' ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_SESSION['userName'] != '')
	{		$sql .= ",'".addslashes($_SESSION['userName'])."' ";
	}else{	$sql .= ",NULL ";
	}	
	$sql .= ", CURRENT_TIMESTAMP";
	if ($_SESSION['company'] != '')
	{		$sql .= ",'".addslashes($_SESSION['company'])."' ";
	}else{	$sql .= ",NULL ";
	}
	if ($_SESSION['userName'] != '')
	{		$sql .= ",'".addslashes($_SESSION['userName'])."' )";
	}else{	$sql .= ",NULL )";
	}
	//$sql .= ",NULL ";
	//$sql .= ",NULL )";
	//print($sql);
    mysql_query($sql);
    $result_update = mysql_affected_rows();
    if($result_update > 0) {
        return "insert";
    }else {
        return "insert_fail";
    }
}
//print_r($_POST);
//$mode = $_GET["!nativeeditor_status"]; //get request mode from dataprocessor
$rowId = "new"; //id or row which was updated
$newId = "new"; //will be used for insert operation

switch("insert") {
    case "inserted":
        if(checkStateSQL('rowId')) {
            $action = add_row();
        }
        break;
    default:
    //row updating request
        if(checkStateSQL($rowId)) {
            $action = insert_row();
        }
        break;
}
echo "<data>";
echo "<action type='".$action."' sid='".$rowId."' tid='".$newId."' />";
echo "</data>";

?>
