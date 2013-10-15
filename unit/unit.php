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
		{ type:"label" , name:"PlanviewUnit", label:"<h2>Unit</h2>", value:"", width:150, labelWidth:"200", labelHeight:"40", inputWidth:"70", inputHeight:"21", labelLeft:"15", labelTop:"0", inputLeft:"95", inputTop:"0", position:"absolute"  },
		{ type:"input" , name:"u.class", label:"Class", value:"", width:225, labelWidth:"80", labelHeight:"21", inputWidth:"145", inputHeight:"21", labelLeft:"15", labelTop:"65", inputLeft:"95", inputTop:"65", position:"absolute"  },
		{ type:"input" , name:"u.type", label:"Type", value:"", width:225, labelWidth:"80", labelHeight:"21", inputWidth:"145", inputHeight:"21", labelLeft:"360", labelTop:"65", inputLeft:"440", inputTop:"65", position:"absolute"  },
		{ type:"input" , name:"u.name", label:"Name", value:"", width:225, labelWidth:"80", labelHeight:"21", inputWidth:"145", inputHeight:"21", labelLeft:"15", labelTop:"90", inputLeft:"95", inputTop:"90", position:"absolute"  },
		{ type:"input" , name:"u.abbreviation", label:"Abbreviation", value:"", width:225, labelWidth:"80", labelHeight:"21", inputWidth:"120", inputHeight:"21", labelLeft:"360", labelTop:"90", inputLeft:"440", inputTop:"90", position:"absolute"  },
		{ type:"input" , name:"u.numerator", label:"Numerator", value:"", width:150, labelWidth:"80", labelHeight:"21", inputWidth:"150", inputHeight:"21", labelLeft:"15", labelTop:"115", inputLeft:"95", inputTop:"115", position:"absolute"  },
		{ type:"input" , name:"u.denominator", label:"Denominator", value:"", width:150, labelWidth:"80", labelHeight:"21", inputWidth:"150", inputHeight:"21", labelLeft:"260", labelTop:"115", inputLeft:"350", inputTop:"115", position:"absolute"  },
		{ type:"input" , name:"u.unit", label:"Unit", value:"", width:150, labelWidth:"80", labelHeight:"21", inputWidth:"150", inputHeight:"21", labelLeft:"520", labelTop:"115", inputLeft:"580", inputTop:"115", position:"absolute"  },
		{ type:"button" , name:"form_bt_update", label:"Update", value:"Update", width:"50", inputWidth:"75", inputHeight:"21", labelLeft:"-10", labelTop:"-10", inputLeft:"290", inputTop:"160", position:"absolute"  },
		{ type:"button" , name:"form_bt_insert", label:"Insert", value:"Insert", width:"50", inputWidth:"75", inputHeight:"21", labelLeft:"-10", labelTop:"-10", inputLeft:"390", inputTop:"160", position:"absolute"  },
		{ type:"button" , name:"form_bt_delete", label:"Delete", value:"Delete", width:"50", inputWidth:"75", inputHeight:"21", labelLeft:"-10", labelTop:"-10", inputLeft:"490", inputTop:"160", position:"absolute"  },
		{ type: "hidden", name:"u.rowId", value:"id"},
		];
	</script>
		<?php
		echo "<script type='text/javascript'>";
		echo "var uid = ".$_REQUEST['uid'].";";
		//mock login status
		echo "var sesStatus = '".$_REQUEST['loginStatus']."';";
		echo "var sesUser = '".$_SESSION['userName']."';";
		echo "var sesCompany = '".$_SESSION['company']."';";
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
			myform.load("./connectDB/load_Update/UnitFormLoad.php?id=" +uid+"&status="+sesStatus);
			myform.setItemValue("u.rowId",uid);
		};
		if(sesStatus == 'blank'){
			myform = new dhtmlXForm("divForm",formDataNew);
		};
		
		myform.attachEvent("onButtonClick", function (id){
			/*
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
			*/
			if(id == 'form_bt_update' && sesStatus == 'edit')
			{
				myform.send("./connectDB/load_Update/UnitFormUpdate.php", function(loader, response) {
					alert(response);
				});
			}
			if(id == 'form_bt_insert' && sesStatus == 'blank')
			{
				myform.send("./connectDB/load_Update/UnitFormInsert.php", function(loader, response) {
					alert(response);
				});
			}
			if(id == 'form_bt_delete' && sesStatus == 'edit')
			{
				//alert("k");
				myform.send("./connectDB/load_Update/UnitFormDelete.php", function(loader, response) {
					alert(response);
					if(response == 'delete')
					{
						parent.dhxAccordR.cells("group").attachURL("../unit/editList.php");
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