<?php

require_once("../../../commons/PHP/connectDB.php");

$Array_CTG = "";
//----------------------------------------  CLASS  ----------------------------------------//
$sql_C = "SELECT englishName FROM codedefinitions
        WHERE type='Class' ORDER BY englishName ASC";
$dbquery_C = mysql_query($sql_C) or die("Error Query [" . $sql_C . "]");
$num_rows_C = mysql_num_rows($dbquery_C);
if (!EMPTY($num_rows_C)) {
    while ($data_C = mysql_fetch_array($dbquery_C)) {

        //----------------------------------------  TYPE  ----------------------------------------//
        $sql_T = "SELECT englishName FROM codedefinitions
                WHERE type='" . $data_C[0] . "' ORDER BY englishName ASC";
        $dbquery_T = mysql_query($sql_T) or die("Error Query [" . $sql_T . "]");
        $num_rows_T = mysql_num_rows($dbquery_T);
        if (!EMPTY($num_rows_T)) {
            while ($data_T = mysql_fetch_array($dbquery_T)) {

                //----------------------------------------  GROUP  ----------------------------------------//
                $sql_G = "SELECT englishName FROM codedefinitions
                        WHERE type='" . $data_T[0] . "' ORDER BY englishName ASC";
                $dbquery_G = mysql_query($sql_G) or die("Error Query [" . $sql_G . "]");
                $num_rows_G = mysql_num_rows($dbquery_G);
                if (!EMPTY($num_rows_G)) {
                    while ($data_G = mysql_fetch_array($dbquery_G)) {
                        $Array_CTG .= $data_C[0] . ":" . $data_T[0] . ":" . $data_G[0] . ",";
                    }
                } else {
                    $Array_CTG .= $data_C[0] . ":" . $data_T[0] . ",";
                }
            }
        } else {
            $Array_CTG .= $data_C[0] . ",";
        }
    }
}
$Ar_CTG = preg_replace('/[\,]+$/', '', $Array_CTG);
$statusSp = explode(',', $Ar_CTG);

function getData($getStatus) {
    for ($i = 0; $i < count($getStatus); $i++) {
        //echo $getStatus[$i].'<br>';
        $statusSp2 = explode(':', $getStatus[$i]);

        if (count($statusSp2) == "1") {
            print ("<row id='" . $statusSp2[0] . "::'>");
        } elseif (count($statusSp2) == "2") {
            print ("<row id='" . $statusSp2[0] . ":" . $statusSp2[1] . ":'>");
        } elseif (count($statusSp2) == "3") {
            print ("<row id='" . $statusSp2[0] . ":" . $statusSp2[1] . ":" . $statusSp2[2] . "'>");
        }
        for ($s = 0; $s < count($statusSp2); $s++) {
            print("<cell>" . $statusSp2[$s] . "</cell>");
        }
//        print("<cell>" . count($statusSp2) . " : " . $statusSp2[0] . "</cell>");
//        print("<cell>" . $statusSp2[1] . "</cell>");
//        print("<cell>" . $statusSp2[2] . "</cell>");
        print ("</row>");
    }
}

//XML HEADER
header("Content-type: text/xml");
//encoding may be different in your case
echo('<?xml version="1.0" encoding="UTF-8"?>');
echo ('<rows id="0">');

////print tree XML
getData($statusSp);

echo ('</rows>');
?>
