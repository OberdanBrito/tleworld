<?php
	require("../../commons/PHP/connectDB.php");
//	$res=mysql_connect($mysql_server,$mysql_user,$mysql_pass);
//	mysql_select_db($mysql_db);

	require("../../codebase/grid_connector.php");

	$grid = new GridConnector($conn);
	$grid->enable_log("temp.log",true);
	$grid->dynamic_loading(100);
	
	$filter1 = new OptionsConnector($conn);
//	$filter1->render_table("codedefinitions","id","englishName");
//	$filter1->render_sql("SELECT id,englishName as type FROM codedefinitions WHERE type='loginCompany' ","id","englishName(type)");
	$filter1->render_sql("SELECT id,thaiName as type FROM codedefinitions WHERE type='loginCompany' ","id","type");

//	$grid->render_sql("SELECT grid50000.item_id as ID , grid50000.item_nm FROM grid50000","item_id(ID)","grid50000.item_id(ID),item_nm");
	$grid->set_options("type",$filter1);
	$grid->render_table("loginCompany","rowId","type,thaiName,EnglishName,id");
?>