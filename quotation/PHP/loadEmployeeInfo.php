<?php

session_start();

//$fields = $_GET['fields'];
$employeeId = $_SESSION['user_id'];
$sql = "SELECT p.id AS employeeId,CONCAT(p.title,' ',p.englishName,' ',p.englishLastname) AS employeeName,p.email AS employeeEmail,p.mobile AS employeeTel  FROM loginuser AS lo INNER JOIN partner AS p ON lo.partnerId=p.id WHERE lo.id='$employeeId'";

include ('../../commons/PHP/connectDB.php');
$rowId = "rowId";
$res = mysql_query($sql, $conn) or die("mysqlError");
$num = mysql_num_rows($res);
//$array = mysql_fetch_array($res);
if ($num > 0) {
    $array = array();
    while ($fArray = mysql_fetch_array($res)) {
        array_push($array, $fArray['employeeId']);
        array_push($array, $fArray['employeeName']);
        array_push($array, $fArray['employeeEmail']);
        array_push($array, $fArray['employeeTel']);
    }
    echo json_encode($array);
//    echo json_encode($array);
}
?>