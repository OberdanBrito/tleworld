<?php

include ('../connectDB/connectDB.php');
$sTbl = $_REQUEST['sTbl'];
$tTbl = $_REQUEST['tTbl'];
$arrName = $_REQUEST['arrName'];
$sObj = $_REQUEST['sObj'];
$sGrid = $_REQUEST['sGrid'];
$tObj = $_REQUEST['tObj'];
$res = mysql_list_fields($db, $sTbl);
$res2 = mysql_list_fields($db, $tTbl);
$num = mysql_num_fields($res);
$num2 = mysql_num_fields($res2);
$arr = array();
$result = "";
$not = "";
$not2 = "";
for ($i = 0; $i < $num; $i++) {
    $same = false;
    $sField = mysql_field_name($res,$i);
    for($j = 0; $j < $num2; $j++){
        $tField = mysql_field_name($res2, $j);
        if($sField==  $tField){
            $result .= $arrName."[".$tObj.".".$tField."] = ".$sGrid.".cells(rowId,".$sObj.".".$sField.").getValue();//$sField<br/>";
            $same = true;
        }
    }
    if(!$same){
        $not .= $sField;
    }
}
for ($i = 0; $i < $num2; $i++) {
    $same = false;
    $sField = mysql_field_name($res2,$i);
    for($j = 0; $j < $num; $j++){
        $tField = mysql_field_name($res, $j);
        if($sField==  $tField){
            $same = true;
        }
    }
    if(!$same){
//        $not2 .= $sField;
        $not2 .= $arrName."[".$tObj.".".$sField."] =".'""'."<br/>";
    }
}
//$result = substr($result, 0, strlen($result) - 6) . "];";
echo $result;
echo $not."<br/>";
echo $not2;
?>