<?php

require_once("../../../commons/PHP/connectDB.php");
$data = $_POST["data"];
$imgName = stripslashes($_POST["imgName"]);
$refId = $_POST["refId"];
//echo filesize($data);

//$data1 = fread($data,50);

//echo $data;
//$img = str_replace(' ','+', $img);
//$data = base64_decode($data);

//echo $data;

//$sql = "INSERT INTO image(img_blob) VALUES('$data')";
$sql = "UPDATE image SET canvas_blob='$data' WHERE image='$imgName' AND refId='$refId'";
$q_blob = mysql_query($sql) or die("Error Query [" . $sql . "]");

if (!EMPTY($q_blob)) {
    echo "OK...! ".$imgName;
} else {
    echo "error";
}
?>
