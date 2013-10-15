<?php
header("Content-type: text/xml");
echo('<?xml version="1.0" encoding="UTF-8"?>');
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
function getFormFromDB($sqlDB, $state, $rId, $unit) {
//    $field = $fields;
//    $arrayField = explode(',', $field);
    $sql = $sqlDB;
    $dbQuery = mysql_query($sql) or die("Error Query [" . $sql . "]");
    $rs = mysql_num_rows($dbQuery);
    if (checkStateSQL($rs)) {
//        if ($unit == "unitSubReceipt" || $unit == "unitSubIssue") {
//            print("<item value='' label='' />");
//        }
        while ($data = mysql_fetch_array($dbQuery, MYSQL_NUM)) {

            if ($state == "edit") {
                $dataU = "";
                $sql_Unit = "SELECT $unit FROM productstructure WHERE rowId=$rId";
                $dbQuery_Unit = mysql_query($sql_Unit) or die("Error Query [" . $sql_Unit . "]");
                $rs_Unit = mysql_num_rows($dbQuery_Unit);
                if (checkStateSQL($rs_Unit)) {
                    while ($data_Unit = mysql_fetch_array($dbQuery_Unit, MYSQL_NUM)) {
                        $dataU = $data_Unit[0];
                        //                        if($data_Unit[0] == $data[0]) {
                        //                            print("<item value='".$data_Unit[0]."' label='".$data_Unit[0]."' selected='true' />");
                        //                        }else {
                        //                            print("<item value='".$data_Unit[0]."' label='".$data_Unit[0]."' />");
                        //                        }
                    }
                }

                $getData = ($unit == "vat") ? $data[1] : $data[0];

                if ($getData == $dataU) {
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
    $type = $_GET["type"];
    if($_GET["tb"] == "un"){
        $class = $_GET["cl"];
        $sql = "SELECT name FROM unit WHERE class='$class' AND type='$type' ORDER BY name ASC";
    }else{
        $lang = $_GET["lang"];
        $sql = "SELECT $lang,code FROM rates WHERE type='$type' ORDER BY code ASC";
    }
    
    ////print tree XML
    getFormFromDB($sql, $_GET['state'], $_GET['rowId'], $_GET['unit']);
    //Close db connection
    mysql_close($conn);
    ?>
</data>
