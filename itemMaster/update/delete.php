<?php
require_once("../../commons/PHP/connectDB.php");

function checkStateSQL($getPara) {
    if($getPara == '') {
        return false;
    }elseif($getPara == null) {
        return false;
    }elseif($getPara == '0') {
        return false;
    }elseif(EMPTY($getPara)) {
        return false;
    }
    return true;
}

$imgName = $_POST["val"];
$refId = $_POST["refId"];
$sql_Del = "DELETE FROM image WHERE image='$imgName' AND refId='$refId'";
$query_Del = mysql_query($sql_Del, $conn) or die ("Error Query [".$sql_Del."]");
if($query_Del) {
    $sql_checkImg = "SELECT rowId FROM image WHERE image='$imgName'";
    $query_checkImg = mysql_query($sql_checkImg, $conn) or die ("Error Query [".$sql_checkImg."]");
    $rs_checkImg = mysql_num_rows($query_checkImg);
    //Check ImageName in Database[table image]?
    if(checkStateSQL($rs_checkImg)) {
        echo "Delete Database only Cause : --> ".$imgName." : have ".$rs_checkImg." pic";
    }else{
        if(preg_match("/[ก-๙]/", $imgName)) {   //Check Thai Language?
            $imgName = iconv("UTF-8","TIS-620",$imgName);
            $check = unlink("image/".$imgName);
            $imgName = iconv("TIS-620","UTF-8",$imgName);
        }else {// no thai file
            $check = unlink("image/".$imgName);     //if delete will return '1',if not will return ''
        }
        echo "Record Deleted.!! : 1.".$check." : 2.".$imgName;
    }
}
else {
    echo "Error Delete [".$sql_Del."]";
}
mysql_close($conn);
?>
