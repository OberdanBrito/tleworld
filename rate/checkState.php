<?php
ob_start();// clear buffer
session_start();
require_once("../commons/PHP/connectDB.php");
require("createSession.php");
//require("connectDB/function.php");
function checkStateSQL($getPara) {
    if($getPara == '') {
        return false;
    }else
    if($getPara == null){
        return false;
    }else
    if($getPara == '0'){
        return false;
    }
    if(EMPTY($getPara)){
        return false;
    }
    return true;
}

$name = iconv("TIS-620", "UTF-8", $_GET["name"]);

if(iconv("TIS-620", "UTF-8", $_GET["loginStatus"]) == "blank") {
    $status = "new";
//    $class = iconv("TIS-620", "UTF-8", $_GET["class"]);
//    $type = iconv("TIS-620", "UTF-8", $_GET["type"]);
}else if(iconv("TIS-620", "UTF-8", $_GET["loginStatus"]) == "newForm") {
        $status = "new";
        $class = iconv("TIS-620", "UTF-8", $_GET["class"]);
        $type = iconv("TIS-620", "UTF-8", $_GET["type"]);

    }else {
        $status = iconv("TIS-620", "UTF-8", $_GET["loginStatus"]);
    }

if(checkStateSQL($name)) {
    $sql = "select rowId,id from $vArr[0] WHERE (englishName='$name' OR thaiName='$name') ORDER BY rowId DESC LIMIT 1";
    $dbquery = mysql_query($sql);
    $num_rows_model = mysql_num_rows($dbquery);
    if(empty($num_rows_model)) {
        echo "";
    }else {
        $data = mysql_fetch_array($dbquery);
        $_SESSION['id'] = $data['id'];
        $_SESSION['rowId'] = $data['rowId'];
    }
}


$_SESSION['loginUser'] = $_SESSION['userName'];
$_SESSION['loginCompany'] = $_SESSION['company'];
(($_SESSION['langauge'] == "English")?$_SESSION['logLanguage'] = 'englishName':$_SESSION['logLanguage'] = 'thaiName');
$_SESSION['loginStatus'] = $status;
//$_SESSION['loginLevel'] = $_GET['loginLevel'];

//echo "language : ".$_SESSION['langauge']." , Status : ".$_SESSION['loginStatus']." , name : ".$name."<br>";
//echo "class : ".$class." , type : ".$type."<br>";

if($_SESSION['loginStatus'] == "edit" || $_SESSION['loginStatus'] == "view") {

    $sql = "select * from $vArr[0] WHERE id='".$_SESSION['id']."' ORDER BY rowId DESC LIMIT 1";
    $dbquery = mysql_query($sql);
    $num_rows = mysql_num_rows($dbquery);
    if($num_rows) {
        $data_Init = mysql_fetch_array($dbquery);
    }
}else {
    echo "<h2><center>New Form</center></h2>";
}


?>
