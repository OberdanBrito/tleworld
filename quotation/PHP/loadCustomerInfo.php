<?php

session_start();

//$fields = $_GET['fields'];
$partnerId = $_REQUEST['partnerId'];
$sql = "SELECT CONCAT(title_th,' ',thaiName,' ',thaiLastName) AS customerName,fax,email,mobile AS tel FROM partner WHERE id='$partnerId'";

include ('../../commons/PHP/connectDB.php');
$rowId = "rowId";
$res = mysql_query($sql, $conn) or die("mysqlError");
$num = mysql_num_rows($res);
//$array = mysql_fetch_array($res);
if ($num > 0) {
    $array = array();
    while ($fArray = mysql_fetch_array($res)) {
        array_push($array,$fArray['customerName']);
        array_push($array,$fArray['fax']);
        array_push($array,$fArray['email']);
        array_push($array,$fArray['tel']);
    }
    echo json_encode($array);
//    echo json_encode($array);
}
?>
