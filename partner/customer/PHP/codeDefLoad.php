<?php
require_once("../../../connectDB/connectDB.php");
require_once('../../../DHX/dhtmlxConnector/codebase/options_connector.php');

	

$typeCodef = $_REQUEST['in_option'];    //type of codedefinitions (person_title, person_type_TH, ...)
$sesLang = $_SESSION['language'];   //language (thaiName,englishName)
if($sesLang=="thai"){
    $lang = "thaiName";
}else{
    $lang = "englishName";
}
//$state = $_REQUEST['state'];            //state = blank , edit
$options = new SelectOptionsConnector($conn);
$sql = "SELECT $lang,code FROM codedefinitions WHERE type='$typeCodef'";
$options->render_sql($sql,"rowId","code,$lang");
?>