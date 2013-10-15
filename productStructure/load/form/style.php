<?php

//structure.php
//ob_start();
//session_start();
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

function getDataStyle($gParent, $gFields) {
    $sql = "SELECT $gFields FROM productstructure WHERE parent='$gParent'";
    $gFields2 = explode(',', $gFields);
    $q = mysql_query($sql) or die("Error Query [" . $sql . "]");
    $nr = mysql_num_rows($q);
    if (checkStateSQL($nr)) {
        while ($fa = mysql_fetch_array($q)) {
            $value = "";
            for ($f = 0; $f < count($gFields2); $f++) {
                $value .= $fa[$f] . ",";
            }
            $value2 = preg_replace('/[\,]+$/', '', $value);
            echo('<item type="radio" name="style" labelWidth="auto" label="' . $fa['englishName'] . '" value="' . $value2 . '"/>');
        }
    }
}

//---------- Edit Data(below) ----------
//$sql = stripslashes($_GET["sql"]);
$parent = $_GET["parent"];
$fields = $_GET["fields"];

//XML HEADER
header("Content-type: text/xml");
//encoding may be different in your case
echo('<?xml version="1.0" encoding="UTF-8"?>');
echo('<items>');
echo('<item type="fieldset" name="rStyle" inputWidth="200" label="Style">');
echo('<item type="settings" position="label-right" inputWidth="130"/>');

////print tree XML
getDataStyle($parent, $fields);

//Close db connection
mysql_close($conn);

echo('<item type="button" name="insert" value="Insert"/>');
echo('</item>');
echo('</items>');
?>
