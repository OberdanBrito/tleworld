<?php
ob_start();
session_start();

echo "<script type='text/javascript'>";
echo "var sesUser = '" . $_SESSION['userName'] . "';";
echo "var sesLoginCompany = '" . $_SESSION['company'] . "';";
echo "var userId = '" . $_SESSION['user_id'] . "';";
echo "var sesCompanyId = '" . $_SESSION['company_id'] . "';";
echo "</script>";
?>
<html>
    <head>
        <title>GRID</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link type="text/css" href="../DHX/dhtmlxMenu/codebase/skins/dhtmlxmenu_dhx_blue.css" rel="stylesheet"/>
        <link type="text/css" href="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.css"  rel="stylesheet"/>
        <link type="text/css" href="../DHX/dhtmlxAccordion/codebase/skins/dhtmlxaccordion_dhx_skyblue.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css">
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.css">

        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxAccordion/codebase/dhtmlxcontainer.js"></script>

        <script type="text/javascript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js"></script>

        <script type="text/javascript" src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>

        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css">
        <script type="text/javascript" src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>

        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.css">
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxCalendar/codebase/skins/dhtmlxcalendar_dhx_skyblue.css">
        <script type="text/javascript" src="../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_calendar.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxcontainer.js"></script>

    </head>
    <body onload="init();">
        <form>
            <div id="divForm" style="position: relative; width: '80%'; height: '80%';"></div>
        </form>

        <script type="text/javascript">
            //////////////////////////////////////////////// START ACCORDION /////////////////////////////////
            var myform;
            var formDataNew = [
                {type:"fieldset", label:"New Price Structure", 
                    list:[
                        {type:"input", name:"pricestr_type", label:"Type", value:"", readonly:true},
                        {type:"input", name:"pricestr_th_nm", label:"Thainame", value:""},
                        {type:"input", name:"pricestr_en_nm", label:"Englishname", value:""},
                        {type:"input", name:"pricestr_code", label:"Function", value:"$C"},
                        {type:"input", name:"currency", label:"Currency", value:""},
                        {type: "newcolumn", offset:20},
                        {type:"input", name:"discount", label:"Discount", value:""},
                        {type:"input", name:"discountmax", label:"Max Discount", value:""},
                        {type:"input", name:"commission", label:"Commission", value:""},
                        {type:"input", name:"description", label:"Description", value:"", rows:4},
                        {type: "newcolumn", offset:20},
                        {type:"calendar", dateFormat:"%Y-%m-%d", name:"startDate_car", label:"Start Date"},
                        {type:"calendar", dateFormat:"%Y-%m-%d", name:"validUntil_car", label:"Valid Until"},
                        {type:"button", name:"proceed", value:"Insert"},
                        {type:"hidden", name:"id", value:""},
                        {type:"hidden", name:"loginCompany", value:sesLoginCompany},
                        {type:"hidden", name:"loginUser", value:sesUser},
                        {type:"hidden", name:"startDate", value:""},
                        {type:"hidden", name:"validUntil", value:""}
                    ]}
            ];
        </script>

        <script type="text/javascript">

            function init(){
                myCalendar = new dhtmlXCalendarObject();
                myform = new dhtmlXForm("divForm",formDataNew);
                var dp = new dataProcessor("PHP/priceStrInsert.php");//instatiate dataprocessor
                dp.init(myform);//link form to dataprocessor
                myform.setItemValue("pricestr_type",parent.myForm.getItemValue("pStrType"));
                myform.attachEvent("onButtonClick", function (id){
                    if(myform.getItemValue("startDate_car")!=""){		
                        myform.setItemValue("startDate",myCalendar.getFormatedDate("%Y-%m-%d", myform.getItemValue("startDate_car")));
                    }else{
                        myform.setItemValue("startDate",'');
                    }
                    if(myform.getItemValue("validUntil_car")!=""){
                        myform.setItemValue("validUntil",myCalendar.getFormatedDate("%Y-%m-%d", myform.getItemValue("validUntil_car")));
                    }else{
                        myform.setItemValue("validUntil",'');
                    }
                    if(id == 'proceed') {
                        
                        myform.save(); 
                    }
                    
                });
        
            }
			

        </script>        
    </body>
</html>