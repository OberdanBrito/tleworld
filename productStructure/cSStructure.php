<?php
//structure.php
//ob_start(); // clear buffer
//session_start();
//header("Cache-Control: no-cache, must-revalidate");
require_once("../commons/PHP/connectDB.php");
require("../commons/PHP/session.php");

//$vArr = array("", "productstructure");
//include("vari_table.php");
// Date Time
//$sesToday = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")) ;
//date("Y-m-d H:i:s",$sesToday);
//$_SESSION['loginUser'] = $_SESSION['user_id']; //loginUserId
//$_SESSION['loginCompany'] = $_SESSION['company_id'];
//$_SESSION['logLanguage'] = ($_SESSION['language'] == "English") ? 'englishName' : 'thaiName';

function checkStateSQL($getPara) {
    if ($getPara == '') {
        return false;
    } elseif ($getPara == null) {
        return false;
    } elseif ($getPara == '0') {
        return false;
    } elseif (EMPTY($getPara)) {
        return false;
    }
    return true;
}

/////////////////////////////////---- SET TIME MICRO ----/////////////////////////////////
function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float) $usec + (float) $sec);
}

function udate($format, $utimestamp = null) {
    if (is_null($utimestamp))
        $utimestamp = microtime_float();

    $timestamp = floor($utimestamp);
    $milliseconds = round(($utimestamp - $timestamp) * 10000);

    return date(preg_replace('`(?<!\\\\)u`', $milliseconds, $format), $timestamp);
}

/////////////////////////////////---- Check STATE ----/////////////////////////////////
if (iconv("TIS-620", "UTF-8", $_GET["loginStatus"]) == "blank") {
//----- get From BlankLIST -----
    $status = "new";
    $rId = $_GET["rId"];

    echo "<script type='text/javascript'>";
    echo "var itemId = '" . $_GET["itemId"] . "';";
    echo "</script>";
} elseif (iconv("TIS-620", "UTF-8", $_GET["loginStatus"]) == "newForm") {
    //----- get From NewLIST -----
    $status = "new";
    $class = iconv("TIS-620", "UTF-8", $_GET["class"]);
    $type = iconv("TIS-620", "UTF-8", $_GET["type"]);
    $group = iconv("TIS-620", "UTF-8", $_GET["group"]);
} else {
    //----- get From EditLIST -----
    $status = iconv("TIS-620", "UTF-8", $_GET["loginStatus"]);
    $rId = $_GET["rId"];

    echo "<script type='text/javascript'>";
    echo "var getId = '" . iconv("TIS-620", "UTF-8", $_GET["getId"]) . "';";
    echo "</script>";
}
$_SESSION['loginStatus'] = $status;
?>
