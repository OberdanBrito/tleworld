<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require("../../commons/PHP/connectDB.php");

function passwdgen($len) {
    $code = "abcdefghijklmnopqrstuvwxyz2345678910ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    srand((double) microtime() * 1000000);
    for ($i = 0; $i < $len; $i++) {
        $password .= $code[rand() % strlen($code)];
    }
    return $password;
}

$input = trim($_GET['usernemail']);
$sel = trim($_GET['selector']);
$strSQL = "SELECT * FROM loginuser WHERE $sel='$input'";
$objQuery = mysql_query($strSQL) or die("Error Query. $strSQL");
$nr = mysql_num_rows($objQuery);

if($nr == 1) {
    $newpw_gen = passwdgen(8);
    echo $newpw_gen;
    $sql = "UPDATE loginuser SET password = '$newpw_gen' WHERE $sel='$input'";
    $updateQuery = mysql_query($sql) or die ("Error Query. $sql");
	
	if ($updateQuery){
		$data = mysql_fetch_array($objQuery);
		$strTo      = $data["email"];
                echo $strTo;
        }
}
                
                	
mysql_close($conn);
?>