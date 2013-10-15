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

$input = trim($_POST['usernemail']);
$sel = trim($_POST['selector']);
$strSQL = "SELECT * FROM loginuser WHERE $sel='$input'";
$objQuery = mysql_query($strSQL) or die("Error Query. $strSQL");
$nr = mysql_num_rows($objQuery);
$data = mysql_fetch_array($objQuery);
$cpwd = $data["password "];
echo $cpwd;

    if($nr == 1) {
   
    $newpw_gen = passwdgen(8);
    echo $newpw_gen ;
    $sql = "UPDATE loginuser SET password = '$newpw_gen' WHERE $sel='$input'";
    $updateQuery = mysql_query($sql) or die ("Error Query. $sql");
	
	if ($updateQuery){
		$strTo      = $data["email"];
		$strSubject = "Your Account information username and password.";
		$strHeader = "Content-type: text/html; charset=iso-8859-1\n"; // or UTF-8 //
		$strHeader .= "From: webmaster@hawaii.com\nReply-To: webmaster@hawaii.com";
		$strMessage = "";
                $strMessage .= "Username : " . $data["name"] . "<br>";
		$strMessage .= "Password : " . $newpw_gen . "<br>";
                $strMessage .= "E-mail : " . $data["email"] . "<br>";
                
            	$strMessage .= "=================================<br>";
		$strMessage = str_replace("\n.", "\n..", $strMessage);
		
		$flgSend = mail($strTo, $strSubject, $strMessage, $strHeader);
		if ($flgSend) {
                    echo "sent ";
		} else {
                    echo "not sent"; 
		} 
	 
        }
}else{
    echo 'tle';
}
mysql_close($conn);
?>