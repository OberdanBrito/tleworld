<?php
ob_start();
session_start();
header("Content-type: text/xml");
echo('<?xml version="1.0" encoding="UTF-8"?>');
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

//$newIdProd = "prod-".$_SEESION['sesDateTimeNow'];

function add_row() {
    global $newId;
    return "insert";
}

function check_dup(){
	$sql = "SELECT r.rowId FROM rates as r WHERE ( ";
	if($_POST["r_thaiName"] != '')
	{		$sql .= "r.thaiName = '".$_POST["r_thaiName"]."' ";
	}else{	$sql .= "r.thaiName IS NULL ";
	}
	if($_POST["r_englishName"] != '')
	{		$sql .= "OR r.englishName = '".$_POST["r_englishName"]."' ";
	}else{	$sql .= "OR r.englishName IS NULL ";
	}
	$sql .= " ) AND r.rowId <> ".$_GET["gr_id"]."  LIMIT 1";
	$dbQuery = mysql_query($sql);
    $resultSel = mysql_num_rows($dbQuery);
        if($row = mysql_fetch_array($dbQuery)) {
			return true;
        }else{
			return false;
		}
}

function get_id(){
	$sql = "SELECT max(r.id) FROM rates as r";
	$dbQuery = mysql_query($sql);
    $resultSel = mysql_num_rows($dbQuery);
        while($row = mysql_fetch_array($dbQuery)) {
			$max_id = $row[0];
			$array_max_id = explode('-', $max_id);
			if(count($array_max_id)==3)
			{
				$new_max_id = str_pad($array_max_id[1]+1,3,'0',STR_PAD_LEFT);
				return "rat-".$new_max_id."-".$_SESSION['userName'];
			}else
			{
				return "rat-001-".$_SESSION['userName'];
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
	$sql = "INSERT INTO rates (sortOrder,id,thaiName,englishName,description,unit,type,code,rate,upperRange,lowerRange,startDate,validUntil,owner,createDate,loginCompany,loginUser) VALUES (NULL";
	if ($insert_id != '')
	{ 		$sql .= ",'".$insert_id."' ";
	}else{ 	$sql .= ",NULL ";  
	}		
	if ($_POST["r_thaiName"] != '')
	{ 		$sql .= ",'".addslashes($_POST["r_thaiName"])."' ";
	}else{ 	$sql .= ",NULL ";  
	}	
	if ($_POST["r_englishName"] != '')
	{ 		$sql .= ",'".addslashes($_POST["r_englishName"])."' ";
	}else{ 	$sql .= ",NULL ";  
	}	
	if ($_POST["r_description"])
	{		$sql .= ",'".addslashes($_POST["r_description"])."' ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_POST["r_unit"] != '')
	{		$sql .= ",'".addslashes($_POST["r_unit"])."' ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_POST["r_type"] != '')
	{		$sql .= ",'".addslashes($_POST["r_type"])."' ";
	}else{	return "insert_fail_type_null";
	}
	if ($_POST["r_code"] != '')
	{		$sql .= ",'".addslashes($_POST["r_code"])."' ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_POST["r_rate"] != '')
	{		$sql .= ",".addslashes($_POST["r_rate"])." ";
	}else{	$sql .= ",NULL ";
	}		
	if ($_POST["r_upperRange"] != '')
	{		$sql .= ",".addslashes($_POST["r_upperRange"])." ";
	}else{	$sql .= ",NULL ";
	}		
	if ($_POST["r_lowerRange"] != '')
	{		$sql .= ",".addslashes($_POST["r_lowerRange"])." ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_POST["r_startDate"] != '')
	{		$sql .= ",'".addslashes($_POST["r_startDate"])."' ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_POST["r_validUntil"] != '')
	{		$sql .= ",'".addslashes($_POST["r_validUntil"])."' ";
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
