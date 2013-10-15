<?php

define(DB_HOST,'localhost');    //hostName
define(DB_USERNAME,'erp');     //userName
define(DB_PASS,'utech');        //password
define(DB_NAME,'erp');        //databaseName

//define(DB_HOST,'hawaii.icthub.biz');    //hostName
//define(DB_USERNAME,'erp');     //userName
//define(DB_PASS,'utech');        //password
//define(DB_NAME,'hawaii');        //databaseName

//$vArr = array("itemMaster", "productStructure", "process");

//connect DB
$conn = mysql_connect( DB_HOST, DB_USERNAME, DB_PASS) or die ("Error Connect to Database");
mysql_select_db(DB_NAME) or die("Error select to Database");//select DB Name
mysql_query("SET NAMES UTF8");  //set Thai Language in Database

?>
