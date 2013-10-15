<?php
require_once("../../commons/PHP/connectDB.php");

$table = "productstructure";
$fields = $_GET['fields'];

function revision_row($gTable,$gFields) {
    global $newId;
    $spF = explode(',', $gFields);

    //Get data one by one
    for($i=0; $i<count($spF); $i++) {
        if($_POST[$spF[$i]] != "") {
            $data .= "'".addslashes($_POST[$spF[$i]])."',";
        }else {
            $data .= "NULL,";
        }
    }
    $data = preg_replace('/[\,]+$/','',$data);

    $sql = "INSERT INTO $gTable($gFields) VALUES ($data)";
    mysql_query($sql) or die("Error Query [" . $sql . "]");
    $result_update = mysql_affected_rows();
    if($result_update > 0) {
    $newId = mysql_insert_id();
        return "insert";
    }else {
        return "insert_fail:".$sql;
    }
}
//$mode = $_GET["!nativeeditor_status"]; //get request mode from dataprocessor
//$rowId = $_GET["gr_id"];; //id or row which was updated
$newId = $_GET["gr_id"];; //will be used for insert operation

$action = revision_row($table,$fields);

//echo "<data>";
//echo "<action type='".$action."' sid='".$newId."' tid='".$newId."' />";
//echo "</data>";
echo "$newId";
?>
