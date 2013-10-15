<?php


//$host="localhost"; // Host name
//$username="root"; // Host name
//$pass_word="12345";// Mysql password
//$db="tasks";// Database name

$host='localhost';    //hostName
$username='root';     //userName
$pass_word='';        //password
$db='hawaii';        //databaseName

//connect DB
$conn = mysql_connect( $host,$username,$pass_word) or die ("Error Connect to Database");
mysql_select_db($db) or die("Error select to Database");//select DB Name
mysql_query("SET NAMES UTF8");  //set Thai Language in Database
?>
