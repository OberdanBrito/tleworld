<?php

include ('../../commons/PHP/connectDB.php');


$sql = "SELECT * FROM codedefinitions WHERE type='organize' AND code!='company'";

$res = mysql_query($sql)
        or die(mysql_error());



$xml_output = "<?xml version=\"1.0\"?>\n";

$xml_output .= "<menu>\n";
$xml_output .= "<item text='Insert' id='Insert' img='onebit_31.png'>\n";

for ($x = 0; $x < mysql_num_rows($res); $x++) {

    $row = mysql_fetch_assoc($res);

    $xml_output .= "\t<item text='".$row['englishName']."' id='".$row['code']."' img='onebit_27.png'>\n";
    $xml_output .= "\t</item>\n";

}

$xml_output .= "</item>\n";
$xml_output .= "<item text='Delete' id='delete' img='onebit_33.png'/>\n";
//$xml_output .= "<item text='Undo' id='undo'/>\n";
//$xml_output .= "<item text='Redo' id='redo'/>\n";
$xml_output .= "<item id='file_sep_1' type='separator'/>\n";
$xml_output .= "<item text='Expand All' id='expAll' img='onebit_28.png' imgdis='open_dis.gif'/>\n";
$xml_output .= "<item text='Collapse All' id='colAll' img='onebit_30.png' imgdis='close_dis.gif'/>\n";

$xml_output .= "</menu>";


header("Content-type: text/xml");
echo $xml_output;
?>
