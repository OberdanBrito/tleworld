<?php
header("Content-type: text/xml");
echo('<?xml version="1.0" encoding="UTF-8"?>');
require_once("../../../commons/PHP/connectDB.php");

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

//###############################################################
// function getFormFromDB              
//###############################################################
function getFormFromDB() {

    //----------------------------------------  CLASS  ----------------------------------------//
    $sql_C = "SELECT englishName FROM codedefinitions WHERE type='Class' ORDER BY englishName ASC";
    $dbquery_C = mysql_query($sql_C) or die("Error Query [" . $sql_C . "]");
    $num_rows_C = mysql_num_rows($dbquery_C);
    if (checkStateSQL($num_rows_C)) {
        while ($data_C = mysql_fetch_array($dbquery_C)) {

            //----------------------------------------  TYPE  ----------------------------------------//
            $sql_T = "SELECT englishName FROM codedefinitions
                WHERE type='" . $data_C[0] . "' ORDER BY englishName ASC";
            $dbquery_T = mysql_query($sql_T) or die("Error Query [" . $sql_T . "]");
            $num_rows_T = mysql_num_rows($dbquery_T);
            if (checkStateSQL($num_rows_T)) {
                while ($data_T = mysql_fetch_array($dbquery_T)) {

                    //----------------------------------------  GROUP  ----------------------------------------//
                    $sql_G = "SELECT englishName FROM codedefinitions
                        WHERE type='" . $data_T[0] . "' ORDER BY englishName ASC";
                    $dbquery_G = mysql_query($sql_G) or die("Error Query [" . $sql_G . "]");
                    $num_rows_G = mysql_num_rows($dbquery_G);
                    if (checkStateSQL($num_rows_G)) {
                        while ($data_G = mysql_fetch_array($dbquery_G)) {
                            //---------------------------------------- class-type-group ----------------------------------------//
                            print("<item value='" . $data_C[0] . "-" . $data_T[0] . "-" . $data_G[0] . "' label='" . $data_C[0] . "-" . $data_T[0] . "-" . $data_G[0] . "' />");
                        }
                    } else {
                        //---------------------------------------- class-type ----------------------------------------//
                        print("<item value='" . $data_C[0] . "-" . $data_T[0] . "' label='" . $data_C[0] . "-" . $data_T[0] . "' />");
                    }
                }
            } else {
                //---------------------------------------- class ----------------------------------------//
                print("<item value='" . $data_C[0] . "' label='" . $data_C[0] . "' />");
            }
        }
    }
}
?>


<data>
    <?php
    ////print tree XML
    getFormFromDB();
    //Close db connection
    mysql_close($conn);
    ?>
</data>
