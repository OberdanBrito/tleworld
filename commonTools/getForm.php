<?php

include ('../connectDB/connectDB.php');
$table = $_REQUEST['tbl'];

$res = mysql_list_fields($db,$table);
$num = mysql_num_fields($res);
$arr = array();
$result = "var data = [";
for ($i = 0; $i < $num; $i++) {
    $field = mysql_field_name($res, $i);
    $result .= "{type:'input', name: '$field', label:'$field',value:''},<br/>";
}
$result = substr($result,0,strlen($result)-6)."];";
echo $result;
?>
