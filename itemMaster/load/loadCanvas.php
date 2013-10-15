<?php

require_once("../../commons/PHP/connectDB.php");
$imgName = stripslashes($_GET["imgName"]);
$refId = $_GET["refId"];

$sql_Can = "SELECT canvas_blob FROM image WHERE image='$imgName' AND refId='$refId'";
$q_Can = mysql_query($sql_Can) or die("Error Query [" . $sql_Can . "]");
$nr_Can = mysql_num_rows($q_Can);

if (!EMPTY($nr_Can)) {
    $objResult = mysql_fetch_array($q_Can);

    echo $objResult[0];
}

//function getDataURI($image, $mime = '') {
//  return 'data: '.(function_exists('mime_content_type') ? mime_content_type($image) : $mime).';base64,'.base64_encode(file_get_contents($image));
//}
?>
