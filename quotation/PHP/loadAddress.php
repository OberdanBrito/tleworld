<?php

session_start();

//$fields = $_REQUEST['fields'];
$partnerId = $_REQUEST['partnerId'];
$addressType = $_REQUEST['type'];
$sql = "SELECT ad.address_all AS address FROM partnerdetail AS pd INNER JOIN address AS ad ON pd.value=ad.id WHERE pd.partnerId='$partnerId' AND addressType='$addressType'";

include ('../../commons/PHP/connectDB.php');
$res = mysql_query($sql, $conn) or die("mysqlError");
$num = mysql_num_rows($res);
//$array = mysql_fetch_array($res);
if ($num > 0) {
    $array = array();
    while ($fArray = mysql_fetch_array($res)) {
        array_push($array, $fArray['address']);
    }
    echo json_encode($array);
//    echo json_encode($array);
}
?>
