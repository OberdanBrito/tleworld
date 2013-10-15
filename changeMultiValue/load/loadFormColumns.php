<?php
include("parameter.php");
header("Content-type: text/xml");
echo('<?xml version="1.0" encoding="UTF-8"?>');
//require_once("../../../commons/PHP/connectDB.php");

//###############################################################
// function getFormFromDB              
//###############################################################
function getFormFromDB($gJson) {

    $json_a = json_decode($gJson, true);        //(default 'false')When 'true', returned objects will be converted into associative arrays.
//print $json_a;
    if (is_array($json_a)) {
        foreach ($json_a as $person_name => $person_a) {
            $table = (EMPTY($person_a["table"])) ? "0" : $person_a["table"];
            $class = (EMPTY($person_a["class"])) ? "0" : $person_a["class"];
            $type = (EMPTY($person_a["type"])) ? "0" : $person_a["type"];
            $fieldName = (EMPTY($person_a["fieldName"])) ? "0" : $person_a["fieldName"];
            
            $value = $person_a["col"] . ":" . $table . ":" . $class . ":" . $type. ":" . $fieldName;
//    echo $person_a['status'];
            print("<item value='" . $value . "' label='" . $person_a["col"] . "' />");
        }
    }
}
?>


<data>
    <?php
    ////print tree XML
    getFormFromDB($json);
    ?>
</data>
