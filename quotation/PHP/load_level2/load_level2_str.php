<?php

ob_start();
session_start();
require_once("../../../commons/PHP/connectDB.php");
header('content-type:text/plain; charset=UTF-8');

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

function getDataGroup($gStrF, $gField, $gTb, $gArrayField, $gSetWhere, $gStrId, $gfieldsOrd) {
    if (!EMPTY($gStrF)) {
        $sql = "SELECT $gField FROM $gTb AS $gStrF $gSetWhere";
    } else {
        $sql = "SELECT $gField FROM $gTb $gSetWhere";
    }


//----- Select Bom (TABLE productStructure)
    $sql_Bom = "SELECT rowId FROM productstructure WHERE parentMain='$gStrId' AND englishName='Bom'";
    $q_Bom = mysql_query($sql_Bom) or die("Error Query [" . $sql_Bom . "]");
    $nr_Bom = mysql_num_rows($q_Bom);
    if (checkStateSQL($nr_Bom)) {
        while ($fa_Bom = mysql_fetch_Array($q_Bom)) {

//----- Select child Bom (TABLE productStructure)
            $sql .= "WHERE parent='" . $fa_Bom[0] . "' ORDER BY rowId ASC";
            $q = mysql_query($sql) or die("Error Query [" . $sql . "]");
            $nr = mysql_num_rows($q);
            if (checkStateSQL($nr)) {
                $arrayChild = array();
                for ($n = 0; $n < $nr; $n++) {
                    array_push($arrayChild, $n);
                    $arrayChild[$n] = array();
// array_push($arrayChild[0], "111");
                    $fa = mysql_fetch_array($q);

//strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
                    for ($e = 0; $e < count($gfieldsOrd); $e++) {
//                        echo $fa["rowId"]." : ".$fa["id"]." : ".$fa["vat"];
//                                    echo $i." : ".$gArrayField[$i]." : ".count($gExFields)."<br>";
                        if (strpos($gField, $gfieldsOrd[$e]) == true) {
//                                    echo "true<br>";
                            array_push($arrayChild[$n], (EMPTY($fa[$gfieldsOrd[$e]])) ? ("") : ($fa[$gfieldsOrd[$e]]));
                        } else {
                            if ($gfieldsOrd[$e] == "productStrId") {
                                array_push($arrayChild[$n], $fa["id"]);
                            } elseif ($gfieldsOrd[$e] == "vatCode") {
                                array_push($arrayChild[$n], $fa["vat"]);
//                                
                            } else {
//                                    echo "false<br>";
                                array_push($arrayChild[$n], "");
                            }
                        }
                    }
                }
                echo json_encode($arrayChild);
            }
        }//----- Select child Bom
    }
}

//----- All Fields of structure TABLE
$fieldsStr = "";
$sql = "show columns from productstructure";
$objQuery = mysql_query($sql) or die("Error Query [" . $sql . "]");
$nr = mysql_num_rows($objQuery);
if (!EMPTY($nr)) {
//    echo "have" . $nr . "<br>";
    for ($i = 0; $i < $nr; $i++) {
        while ($fa = mysql_fetch_array($objQuery)) {
            $fieldsStr.= $fa[$i] . ",";
        }
    }
}
$allFieldsStr = preg_replace('/[\,]+$/', '', $fieldsStr);


//----- get Fields of orderdetail TABLE
$getFieldsOrd = explode(',', $_GET["fields"]);
//$fieldsOrd2 = "";
//for ($f = 0; $f < count($getFieldsOrd); $f++) {
//    if ($getFieldsOrd[$f] == "amount" || $getFieldsOrd[$f] == "createDate") {
//        
//    } else {
//        if (strpos($allFieldsStr, $getFieldsOrd[$f]) == true) {
//            $fieldsOrd2 .= $getFieldsOrd[$f] . ",";
//        }
//    }
//}
//$fieldsOrd3 = preg_replace('/[\,]+$/', '', $fieldsOrd2);
//----- Send Parameter
$field = $allFieldsStr;
$tb = "productstructure";
$setWhere = "";
$arrayField = explode(',', $field);
$strId = stripslashes($_GET["strId"]);

//JSON ENCODE
getDataGroup("", $field, $tb, $arrayField, $setWhere, $strId, $getFieldsOrd);
////Close db connection
mysql_close($conn);
?>
