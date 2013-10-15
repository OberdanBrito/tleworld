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
	var formDataedit = [ {type:"settings",position:"label-top"},
		{ type: "fieldset",label: "PriceStructure",inputWidth: "auto",
			list: [
			{ type: "input", label: "ID", 				name: "pstr.rowId", value: "" ,readonly:true }, 
			{ type: "input", label: "PriceStrID", 		name: "pstr.id", value: "" }, 
			{ type: "input", label: "PriceStrThaiName", name: "pstr.pricestr_th_nm", value: "" }, 
			{ type: "input", label: "PriceStrEngName", 	name: "pstr.pricestr_en_nm", value: "" }, 
			{type:"newcolumn"},
			{ type: "input", label: "Code", 			name: "pstr.pricestr_code", value: "" }, 
			{ type: "input", label: "Description", 		name: "pstr.description", value: "" },
			{ type: "input", label: "Start Date",		name: "pstr.startDate", value: "" },
			{ type: "input", label: "Valid Until",		name: "pstr.validUntil", value: "" }
		]},
		{type: "button", name: "form_bt_update", value: "Update"}
        ];
	var formDatablank = [
			{ type:"label" , name:"codeDefinition", label:"<h2>Code Definition</h2>", value:"", width:200, labelWidth:"200", labelHeight:"40", inputWidth:"200", inputHeight:"40", labelLeft:"15", labelTop:"0", inputLeft:"295", inputTop:"0", position:"absolute"   },
			{ type:"input" , name:"cd.thaiName", label:"Thai Name", value:"", width:175, labelWidth:"80", labelHeight:"21", inputWidth:"90", inputHeight:"20", labelLeft:"15", labelTop:"65", inputLeft:"95", inputTop:"65", position:"absolute"  },
			{ type:"input" , name:"cd.englishName", label:"English Name", value:"", width:200, labelWidth:"80", labelHeight:"21", labelAlign:"left", inputWidth:"120", inputHeight:"20", labelLeft:"290", labelTop:"65", inputLeft:"400", inputTop:"65", position:"absolute"  },
			{ type:"input" , name:"cd.description", label:"Description", value:"", width:400, labelWidth:"80", labelHeight:"21", inputWidth:"320", inputHeight:"20", labelLeft:"15", labelTop:"90", inputLeft:"95", inputTop:"90", position:"absolute"  },
			{ type:"input" , name:"cd.code", label:"Code", value:"", width:400, labelWidth:"80", labelHeight:"21", inputWidth:"45", inputHeight:"20", labelLeft:"15", labelTop:"115", inputLeft:"95", inputTop:"115", position:"absolute"  },
			{ type:"input" , name:"cd.groupCode", label:"Group Code", value:"", width:300, labelWidth:"80", labelHeight:"21", labelAlign:"left", inputWidth:"45", inputHeight:"20", labelLeft:"15", labelTop:"140", inputLeft:"95", inputTop:"140", position:"absolute"  },
			{ type:"input" , name:"cd.type", label:"Type", value:"", width:100, labelWidth:"80", labelHeight:"21", labelAlign:"left", inputWidth:"45", inputHeight:"20", labelLeft:"15", labelTop:"165", inputLeft:"95", inputTop:"165", position:"absolute"  },
			{ type:"calendar" , name:"cd.startDate_car", label:"Start Date", dateFormat:"%Y-%m-%d", serverDateFormat:"%Y-%m-%d",labelWidth:"80", labelHeight:"21", labelAlign:"left", inputWidth:"95", inputHeight:"16", options:{	
				}, labelLeft:"215", labelTop:"165", inputLeft:"295", inputTop:"165", position:"absolute"  },
			{ type:"calendar" , name:"cd.validUntil_car", label:"Valid Until", dateFormat:"%Y-%m-%d", serverDateFormat:"%Y-%m-%d", labelWidth:"80", labelHeight:"21", labelAlign:"left", inputWidth:"95", inputHeight:"16", options:{
				}, labelLeft:"415", labelTop:"165", inputLeft:"495", inputTop:"165", position:"absolute"  },
			{ type:"button" , name:"form_bt_insert", label:"Insert", value:"Insert", width:"50", inputWidth:"75", inputHeight:"21", labelLeft:"-10", labelTop:"-10", inputLeft:"290", inputTop:"195", position:"absolute"  },
			{ type:"button" , name:"form_bt_update", label:"Update", value:"Update", width:"50", inputWidth:"75", inputHeight:"21", labelLeft:"-10", labelTop:"-10", inputLeft:"390", inputTop:"195", position:"absolute"  },
			{ type:"button" , name:"form_bt_delete", label:"Delete", value:"Delete", width:"50", inputWidth:"75", inputHeight:"21", labelLeft:"-10", labelTop:"-10", inputLeft:"490", inputTop:"195", position:"absolute"  },
			{type: "hidden", name:"cd.rowId", value:"id"},
			{type: "hidden", name:"cd.startDate", value:"start"},
			{type: "hidden", name:"cd.validUntil", value:"end"}
		];
		</script>
		<?php
		echo "<script type='text/javascript'>";
		echo "var cdid = ".$_REQUEST['cdid'].";";
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
			myform = new dhtmlXForm("divForm",formDatablank);
			myform.attachEvent("onBeforeDataLoad", function (id, values){
				return true;
			});
			myform.load("./connectDB/load_Update/CodeDefFormLoad.php?id=" +cdid+"&status="+sesStatus);
			myform.setItemValue("cd.rowId",cdid);
		};
		if(sesStatus == 'blank'){
			myform = new dhtmlXForm("divForm",formDatablank);
			//alert(myCalendar.getFormatedDate("%d/%m/%y", "2011-06-08"));
			//alert("O");
		};
		
		myform.attachEvent("onButtonClick", function (id){
		
			if(myform.getItemValue("cd.startDate_car")!="")
			{		
				myform.setItemValue("cd.startDate",myCalendar.getFormatedDate("%Y-%m-%d", myform.getItemValue("cd.startDate_car")));
			}else{
				myform.setItemValue("cd.startDate",'');
			}
			if(myform.getItemValue("cd.validUntil_car")!="")
			{
				myform.setItemValue("cd.validUntil",myCalendar.getFormatedDate("%Y-%m-%d", myform.getItemValue("cd.validUntil_car")));
			}else{
				myform.setItemValue("cd.validUntil",'');
			}
			if(id == 'form_bt_update' && sesStatus == 'edit')
			{
				myform.send("./connectDB/load_Update/CodeDefFormUpdate.php", function(loader, response) {
					alert(response);
				});
			}
			if(id == 'form_bt_insert' && sesStatus == 'blank')
			{
				myform.send("./connectDB/load_Update/CodeDefFormInsert.php", function(loader, response) {
					alert(response);
				});
			}
			if(id == 'form_bt_delete' && sesStatus == 'edit')
			{
				myform.send("./connectDB/load_Update/CodeDefFormDelete.php", function(loader, response) {
					alert(response);
					if(response == 'delete')
					{
						parent.dhxAccordR.cells("group").attachURL("../cdefinition/editList.php");
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