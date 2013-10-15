<?php
header("Content-type: text/xml");
echo('<?xml version="1.0" encoding="UTF-8"?>');
require_once("../../../commons/PHP/connectDB.php");
//require("../../createSession.php");
function checkStateSQL($getPara) {
    if($getPara == '') {
        return false;
    }else
    if($getPara == null){
        return false;
    }else
    if($getPara == '0'){
        return false;
    }
    if(EMPTY($getPara)){
        return false;
    }
    return true;
}
//------------------------------------------------------------------
function getFormFromDB($inid) {
	if($_REQUEST['status']=='edit')
	{
		$field = "u.rowId,u.name,u.numerator,u.denominator,u.unit,u.abbreviation,u.class,u.type";
		$arrayField = explode(',', $field);
		$where = "WHERE u.rowId = ".$inid." ";
		$sql = "SELECT $field FROM unit as u $where";
		//print($sql);
		$dbQuery = mysql_query($sql);
		$resultSel = mysql_num_rows($dbQuery);
		if(checkStateSQL($resultSel)) {
			while($row = mysql_fetch_array($dbQuery,MYSQL_NUM)) {
				for($i=0; $i<count($arrayField); $i++) {
            //strpos --> Returns the position as an integer. If needle is not found, strpos() will return boolean FALSE.
					if((strpos($arrayField[$i],"Date") == false)&&(strpos($arrayField[$i],"Until") == false)) {
						$bField = explode('.',$arrayField[$i]);
						print("<".$arrayField[$i].">".$row[$i]."</".$arrayField[$i].">");
					}else{
						$bField = explode('.',$arrayField[$i]);
						print("<".$arrayField[$i]."_car>".$row[$i]."</".$arrayField[$i]."_car>");
					}
				}
			}
		}
	}
}
//-------------------------------------------------------------------------------
//XML HEADER
?>
<data>
<?php	
////print tree XML
getFormFromDB($_REQUEST['id']);
//Close db connection
mysql_close($conn);
?>
</data>

