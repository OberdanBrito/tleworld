<?php
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
	$sql = "SELECT u.rowId FROM unit as u WHERE u.name = '".$_POST["u_name"]."' OR u.name is null LIMIT 1";
	$dbQuery = mysql_query($sql);
    $resultSel = mysql_num_rows($dbQuery);
        if($row = mysql_fetch_array($dbQuery)) {
			return true;
        }else{
			return false;
		}
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

function insert_row() {
	if(check_dup())
	{
		return "insert_dup";
	}
	$insert_id = get_id();
    global $newId;
	$sql = "INSERT INTO unit (id,name,numerator,denominator,unit,abbreviation,class,type) VALUES (";
	if ($insert_id != '')
	{ 		$sql .= "'".$insert_id."' ";
	}else{ 	$sql .= "NULL ";  
	}		
	if ($_POST["u_name"] != '')
	{ 		$sql .= ",'".addslashes($_POST["u_name"])."' ";
	}else{ 	$sql .= ",NULL ";  
	}	
	if ($_POST["u_numerator"] != '')
	{ 		$sql .= ",".addslashes($_POST["u_numerator"])." ";
	}else{ 	$sql .= ",NULL ";  
	}	
	if ($_POST["u_denominator"] != '')
	{		$sql .= ",".addslashes($_POST["u_denominator"])." ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_POST["u_unit"] != '')
	{		$sql .= ",'".addslashes($_POST["u_unit"])."' ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_POST["u_abbreviation"] != '')
	{		$sql .= ",'".addslashes($_POST["u_abbreviation"])."' ";
	}else{	$sql .= ",NULL ";
	}	
	if ($_POST["u_class"] != '')
	{		$sql .= ",'".addslashes($_POST["u_class"])."' ";
	}else{	return "insert_fail_class_null";
	}		
	if ($_POST['u_type'] != '')
	{		$sql .= ",'".addslashes($_POST['u_type'])."' )";
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
