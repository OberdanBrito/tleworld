<?php

if (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml")) {
    header("Content-type: application/xhtml+xml");
} else {
    header("Content-type: text/xml");
}

require("../../commons/PHP/connectDB.php");
$strUsername = trim($_GET["username"]);


$strSQL = "SELECT company FROM loginuser WHERE loginuser.name='$strUsername'";
$objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
$nr = mysql_num_rows($objQuery);
if($nr>=1){
    while ($array = mysql_fetch_array($objQuery)) {
    echo $array['company'] . ",";
}
}else{
    echo "Error,";
}

mysql_close($conn);
?>
