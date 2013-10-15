<?php

require_once("../../../commons/PHP/connectDB.php");

//require_once('../../DHX/dhtmlxConnector/codebase/options_connector.php');
//$options = new SelectOptionsConnector($conn);
////$options->enable_log("log.txt");
//$options->render_sql($sql,"","name,name");
//$sql = stripslashes($_GET['sql']);

function checkStateSQL($getPara) {
    if ($getPara == '') {
        return false;
    } else
    if ($getPara == null) {
        return false;
    } else
    if ($getPara == '0') {
        return false;
    }
    if (EMPTY($getPara)) {
        return false;
    }
    return true;
}

//------------------------------------------------------------------
function getFormFromDB($sqlDB, $state, $gPartnerId, $gCategoryEnglish) {

    $sql = $sqlDB;
    $dbQuery = mysql_query($sql) or die("Error Query [" . $sql . "]");
    $nr = mysql_num_rows($dbQuery);
    if (checkStateSQL($nr)) {
        $array = array();
//        if ($unit == "unitSubReceipt" || $unit == "unitSubIssue") {
//            print("<item value='' label='' />");
//        }
        while ($data = mysql_fetch_array($dbQuery, MYSQL_NUM)) {
//            if ($state == "edit") {
            $dataPd = "";
            $data_sort = "";
            $sql_pd = "SELECT value FROM partnerdetail WHERE type='details' AND partnerId='$gPartnerId' AND categoryEnglish='$gCategoryEnglish'";
            $dbQuery_pd = mysql_query($sql_pd) or die("Error Query [" . $sql_pd . "]");
            $nr_pd = mysql_num_rows($dbQuery_pd);
            if (checkStateSQL($nr_pd)) {
                while ($data_pd = mysql_fetch_array($dbQuery_pd, MYSQL_NUM)) {
                    $dataPd = $data_pd[0];

                    $sql_sort = "SELECT sortOrder FROM codedefinitions WHERE type='$gCategoryEnglish' AND code='$data_pd[0]'";
                    $q_sort = mysql_query($sql_sort) or die("Error Query [" . $sql_sort . "]");
                    $nr_sort = mysql_num_rows($q_sort);
                    if (checkStateSQL($nr_sort)) {
                        $data_sort = mysql_fetch_array($q_sort, MYSQL_NUM);
                        if ($data[2] > $data_sort[0]) {
                            array_push($array, $data[0] . ":" . $data[1] . ":disabled");
                        } else {
                            if ($data[0] == $dataPd) {
                                array_push($array, $data[0] . ":" . $data[1] . ":selected");
                            } else {
                                array_push($array, $data[0] . ":" . $data[1]);
                            }
                        }
                    }//sortOrder (condedefinitions)
                }
            }//value (partnerDetail)
//        }
        }

        echo json_encode($array);
    }
}

//-------------------------------------------------------------------------------
//XML HEADER

$partnerId = $_GET['partnerId'];
$type = $_GET["type"];
$lang = $_GET["lang"];
//    if($_GET["tb"] == "un"){
//        $class = $_GET["cl"];
//        $sql = "SELECT name FROM unit WHERE class='$class' AND type='$type' ORDER BY name ASC";
//    }else{
//        $lang = $_GET["lang"];
//        $sql = "SELECT $lang,code FROM rates WHERE type='$type' ORDER BY code ASC";
//    }
$sql = "SELECT code,$lang,sortOrder FROM codedefinitions WHERE type='$type' ORDER BY rowId ASC";
////print tree XML
getFormFromDB($sql, "", $partnerId, $type);
//Close db connection
mysql_close($conn);
?>