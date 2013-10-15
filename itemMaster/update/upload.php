<?php
//echo php_uname();   //Windows NT POP 5.1 build 2600, 
//                    //Linux hawaii 2.6.26-2-686 #1 SMP Wed Feb 10 08:59:21 UTC 2010 i686
//echo "<br>";
//echo PHP_OS;        //WINNT, Linux

require_once("../../commons/PHP/connectDB.php");

$upload_dir = 'image/';
$gTime = $_POST["getTime"];
$refId = $_POST["refId"];
$pic = $_FILES['myfile'];
$name = $pic['name'];

$spF = explode('.', $name);
//for take a photo OF 'IOS6'
if($spF[0] == "image" || $spF[0] == "Image"){
    $name = $spF[0]."".$gTime.".".$spF[1];
}


//Check Windows ?
if (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") {
    //WINDOWS 'convert' but [ LINUX don't ]
    if (preg_match("/[ก-๙]/", $name)) {//Check Thai Language?
        $name = iconv("UTF-8", "TIS-620", $name);
    }
}


if(move_uploaded_file($pic['tmp_name'], $upload_dir.$name)) {
    
    //Check Windows ?
    if (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") {
        //WINDOWS 'convert' but [ LINUX don't ]
        $name = iconv("TIS-620","UTF-8",$name);
    }
    $sql_Up = "INSERT INTO image(refId,image) VALUES ('$refId','$name')";
    $query_Up = mysql_query($sql_Up, $conn) or die ("Error Query [".$sql_Up."]");
    if($query_Up) {
        mysql_close($conn);
        echo 'File was uploaded successfully! :'.$name;
    }
}else {
    echo "fail : ".$pic;
}
?>
