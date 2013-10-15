<?php
header("Content-type: text/xml");
echo('<?xml version="1.0" encoding="UTF-8"?>');
require_once("../../../../commons/PHP/connectDB.php");

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
function getFormFromDB($sqlDB, $state, $gId, $fieldP) {
    $sql = $sqlDB;
    $dbQuery = mysql_query($sql) or die("Error Query [" . $sql . "]");
    $rs = mysql_num_rows($dbQuery);
    if (checkStateSQL($rs)) {
        while ($data = mysql_fetch_array($dbQuery, MYSQL_NUM)) {
            if ($state == "edit") {

                //----- SELECT data 
                $sql_p = "SELECT $fieldP FROM partner WHERE id='" . $gId . "'";
                $q_p = mysql_query($sql_p) or die("Error Query [" . $sql_p . "]");
                $rs_p = mysql_num_rows($q_p);
                if (checkStateSQL($rs_p)) {
                    while ($data_p = mysql_fetch_array($q_p, MYSQL_NUM)) {
                        $dataP = $data_p[0];
                    }
                }
//
//                $getData = ($unit == "vat") ? $data[1] : $data[0];
//
                //----- Compare between [data(codedef.) & data(partner)]
                if ($data[0] == $dataP) {
                    print("<item value='" . $data[0] . "' label='" . $data[0] . "' selected='true' />");
                } else {
                    print("<item value='" . $data[0] . "' label='" . $data[0] . "' />");
                }
            } else if ($state == "blank") {
                print("<item value='" . $data[0] . "' label='" . $data[0] . "' />");
            }
        }
    }
}

//-------------------------------------------------------------------------------
//XML HEADER
?>
<data>
    <?php
    $field = $_GET['field_cod'];
    $type = $_GET['type_cod'];
    $sql = "SELECT " . $field . " FROM codedefinitions WHERE type='" . $type . "' ORDER BY rowId ASC";
    ////print tree XML
    getFormFromDB($sql, $_GET['state'], $_GET['gId'], $_GET['fieldP']);
    //Close db connection
    mysql_close($conn);
    ?>
</data>
