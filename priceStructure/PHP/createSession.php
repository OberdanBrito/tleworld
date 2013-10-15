<?php
ob_start();// clear buffer
//session_start();

//$vArr = array("price", "productStructure", "process");
//$sesUser = $_SESSION['loginUser'];
//$sesStatus = $_SESSION['loginStatus'];
//$sesId = $_SESSION['id'];
//$sesCompany = $_SESSION['loginCompany'];
//$sesLevel = $_SESSION['loginLevel'];
//$sesLanguage = $_SESSION['language'];

/*$sesData is get data from dataBase*/
//$sesDataDB = $_SESSION['data'];

$sesToday = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")) ;
$sesDateTimeUserNow = date("Y-m-d H:i:s",$sesToday)."-".$_SESSION['userName'];
$_SESSION['sesDateNow'] = date("Y-m-d",$sesToday);
$_SESSION['sesDateTimeNow'] = date("Y-m-d H:i:s",$sesToday);
$_SESSION['sesDateTimeUserNow'] = $sesDateTimeUserNow;
?>
