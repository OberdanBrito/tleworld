<?php
ob_start();
session_start();
//require("checkState.php");
/*
echo "<script type='text/javascript'>";
echo "var sesUser = '".$_SESSION['loginUser']."';";
echo "var sesCompany = '".$_SESSION['loginCompany']."';";
echo "var sesLanguage = '".$_SESSION['logLanguage']."';";
//echo "var sesStatus = '".$_SESSION['loginStatus']."';";
echo "var selClass = '".$class."';";
echo "var selType = '".$type."';";
//echo "var sesLevel = '".$_SESSION['loginLevel']."';";
echo "var name ='".$_SESSION['name']."';";
echo "</script>";
*/
?>
<html>
    <head>
        <title>GRID</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link type="text/css" href="../DHX/dhtmlxMenu/codebase/skins/dhtmlxmenu_dhx_blue.css" rel="stylesheet"/>
        <link type="text/css" href="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.css"  rel="stylesheet"/>
        <link type="text/css" href="../DHX/dhtmlxAccordion/codebase/skins/dhtmlxaccordion_dhx_skyblue.css" rel="stylesheet"/>

        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
        <!--script type="text/javascript" src="JS/codeBase/dhtmlxgrid_srnd.js"></script-->
        <script type="text/javascript" src="../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxAccordion/codebase/dhtmlxcontainer.js"></script>

        <script type="text/javascript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js"></script>

        <script type="text/javascript" src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
		
		<link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css">
		<script type="text/javascript" src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
		
		<link rel="stylesheet" type="text/css" href="../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.css">
		<link rel="stylesheet" type="text/css" href="../DHX/dhtmlxCalendar/codebase/skins/dhtmlxcalendar_dhx_skyblue.css">
		<script type="text/javascript" src="../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.js"></script>
		<script type="text/javascript" src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_calendar.js"></script>

    </head>
    <body onload="init();">
        <form>
            <div id="divForm" style="position: relative; width: '95%'; height: '95%';"></div>
        </form>

        <script type="text/javascript">
            //////////////////////////////////////////////// START ACCORDION /////////////////////////////////
	var myform;
	var myCalendar
	var formDataNew = [
		{ type:"label" , name:"planViewRate", label:"<h2>Rate</h2>", value:"", width:200, labelWidth:"150", labelHeight:"40", inputWidth:"150", inputHeight:"40", labelLeft:"15", labelTop:"0", inputLeft:"295", inputTop:"0", position:"absolute"   },
		{ type:"input" , name:"r.thaiName", label:"Thai Name", value:"", width:175, labelWidth:"80", labelHeight:"21", inputWidth:"90", inputHeight:"20", labelLeft:"15", labelTop:"65", inputLeft:"95", inputTop:"65", position:"absolute"  },
		{ type:"input" , name:"r.englishName", label:"English Name", value:"", width:200, labelWidth:"80", labelHeight:"21", labelAlign:"left", inputWidth:"120", inputHeight:"20", labelLeft:"290", labelTop:"65", inputLeft:"400", inputTop:"65", position:"absolute"  },
		{ type:"input" , name:"r.description", label:"Description", value:"", width:400, labelWidth:"80", labelHeight:"21", inputWidth:"320", inputHeight:"20", labelLeft:"15", labelTop:"90", inputLeft:"95", inputTop:"90", position:"absolute"  },
		{ type:"input" , name:"r.unit", label:"Unit", value:"", width:110, labelWidth:"80", labelHeight:"21", labelAlign:"left", inputWidth:"30", inputHeight:"20", labelLeft:"290", labelTop:"115", inputLeft:"400", inputTop:"115", position:"absolute"  },
		{ type:"input" , name:"r.code", label:"Code", value:"", width:175, labelWidth:"80", labelHeight:"21", inputWidth:"95", inputHeight:"20", labelLeft:"15", labelTop:"115", inputLeft:"95", inputTop:"115", position:"absolute"  },
		{ type:"input" , name:"r.type", label:"Type", value:"", width:110, labelWidth:"80", labelHeight:"21", inputWidth:"110", inputHeight:"20", labelLeft:"550", labelTop:"115", inputLeft:"650", inputTop:"115", position:"absolute"  },
		{ type:"input" , name:"r.rate", label:"Rate", value:"", width:125, labelWidth:"80", labelHeight:"21", inputWidth:"45", inputHeight:"20", labelLeft:"15", labelTop:"140", inputLeft:"95", inputTop:"140", position:"absolute"  },
		{ type:"input" , name:"r.upperRange", label:"Upper Range", value:"", width:125, labelWidth:"80", labelHeight:"21", labelAlign:"left", inputWidth:"45", inputHeight:"20", labelLeft:"290", labelTop:"140", inputLeft:"400", inputTop:"140", position:"absolute"  },
		{ type:"input" , name:"r.lowerRange", label:"Lower Range", value:"", width:125, labelWidth:"80", labelHeight:"21", labelAlign:"left", inputWidth:"45", inputHeight:"20", labelLeft:"550", labelTop:"140", inputLeft:"650", inputTop:"140", position:"absolute"  },
		{ type:"calendar" , name:"r.startDate_car", label:"Start Date", dateFormat:"%Y-%m-%d", labelWidth:"80", labelHeight:"21", labelAlign:"left", inputWidth:"95", inputHeight:"20", options:{
			
		}, labelLeft:"15", labelTop:"165", inputLeft:"95", inputTop:"165", position:"absolute"  },
		{ type:"calendar" , name:"r.validUntil_car", label:"Valid Until", dateFormat:"%Y-%m-%d", labelWidth:"80", labelHeight:"21", labelAlign:"left", inputWidth:"95", inputHeight:"20", options:{
			
		}, labelLeft:"290", labelTop:"165", inputLeft:"400", inputTop:"165", position:"absolute"  },
		{ type:"button" , name:"form_bt_update", label:"Update", value:"Update", width:"50", inputWidth:"75", inputHeight:"21", labelLeft:"-10", labelTop:"-10", inputLeft:"290", inputTop:"190", position:"absolute"  },
		{ type:"button" , name:"form_bt_insert", label:"Insert", value:"Insert", width:"50", inputWidth:"75", inputHeight:"21", labelLeft:"-10", labelTop:"-10", inputLeft:"390", inputTop:"190", position:"absolute"  },
		{ type:"button" , name:"form_bt_delete", label:"Delete", value:"Delete", width:"50", inputWidth:"75", inputHeight:"21", labelLeft:"-10", labelTop:"-10", inputLeft:"490", inputTop:"190", position:"absolute"  },
		{type: "hidden", name:"r.rowId", value:"id"},
		{type: "hidden", name:"r.startDate", value:"start"},
		{type: "hidden", name:"r.validUntil", value:"end"}
	];
		</script>
		<?php
		echo "<script type='text/javascript'>";
		echo "var rid = ".$_REQUEST['rid'].";";
		//mock login status
		echo "var sesStatus = '".$_REQUEST['loginStatus']."';";
		echo "</script>";
		?>
		<script type="text/javascript">

	function init(){
        /////////////////////////////////////////// TOP /////////////////////////////////////////
		//myform = new dhtmlXForm('divForm',formDatablank);
		//myform.unload();
        /////////////////////////////////////////// END /////////////////////////////////////////
		myCalendar = new dhtmlXCalendarObject();
        if(sesStatus == 'edit'){
			myform = new dhtmlXForm("divForm",formDataNew);
			myform.attachEvent("onBeforeDataLoad", function (id, values){
				return true;
			});
			myform.load("./connectDB/load_Update/RateFormLoad.php?id=" +rid+"&status="+sesStatus);
			myform.setItemValue("r.rowId",rid);
		};
		if(sesStatus == 'blank'){
			myform = new dhtmlXForm("divForm",formDataNew);
		};
		
		myform.attachEvent("onButtonClick", function (id){
			if(myform.getItemValue("r.startDate_car")!="")
			{		
				myform.setItemValue("r.startDate",myCalendar.getFormatedDate("%Y-%m-%d", myform.getItemValue("r.startDate_car")));
			}else{
				myform.setItemValue("r.startDate",'');
			}
			if(myform.getItemValue("r.validUntil_car")!="")
			{
				myform.setItemValue("r.validUntil",myCalendar.getFormatedDate("%Y-%m-%d", myform.getItemValue("r.validUntil_car")));
			}else{
				myform.setItemValue("r.validUntil",'');
			}
			
			if(id == 'form_bt_update' && sesStatus == 'edit')
			{
				myform.send("./connectDB/load_Update/RateFormUpdate.php", function(loader, response) {
					alert(response);
				});
			}
			
			if(id == 'form_bt_insert' && sesStatus == 'blank')
			{
				myform.send("./connectDB/load_Update/RateFormInsert.php", function(loader, response) {
					alert(response);
				});
			}			
			if(id == 'form_bt_delete' && sesStatus == 'edit')
			{
				myform.send("./connectDB/load_Update/RateFormDelete.php", function(loader, response) {
					alert(response);
					if(response == 'delete')
					{
						parent.dhxAccordR.cells("group").attachURL("../rate/editList.php");
						parent.dhxAccordR.openItem("group");
					}
				});
			}	
	
		});
		
        
	};
			
            function popupCenter(url,name,windowWidth,windowHeight){
                myleft=(screen.width)?(screen.width-windowWidth)/2:100;
                mytop=(screen.height)?(screen.height-windowHeight)/2:100;
                properties = "width="+windowWidth+",height="+windowHeight;
                properties +=",scrollbars=yes, top="+mytop+",left="+myleft;
                window.open(url,name,properties);
            };

        </script>        
    </body>
</html>