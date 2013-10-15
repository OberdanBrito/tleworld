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
        <link type="text/css" href="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css" rel="stylesheet"/>
        <link type="text/css" href="../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css" rel="stylesheet"/>

        <script src="../DHX/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_link.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_filter.js"></script>	
        <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_undo.js"></script>	
        <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_group.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_drag.js"></script>
        <script  src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_hmenu.js"></script>
        <script  src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script  src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_mcol.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxAccordion/codebase/dhtmlxcontainer.js"></script>

        <script type="text/javascript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js"></script>

        <script type="text/javascript" src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
        <!--<script type="text/javascript" src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>-->

        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css">
        <script type="text/javascript" src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>

        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.css">
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxCalendar/codebase/skins/dhtmlxcalendar_dhx_skyblue.css">
        <script type="text/javascript" src="../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_calendar.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxcontainer.js"></script>
        <script src="../commons/js/fnMainObj_DHX1.0.js"></script>
<script src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_combo.js"></script>
    </head>
    <body onload="init();">
        <form>
            <div id="divForm" style="position: relative; width: '80%'; height: '80%';"></div>
        </form>

        <script type="text/javascript">
            //////////////////////////////////////////////// START ACCORDION /////////////////////////////////
            var myform;
            var formDataNew = [
                {type:"fieldset", label:"STD Price", 
                    list:[
                        
             {type:"fieldset", label:"", inputWidth: 400,  
                 list:[
                      {type:"hidden", name:"pricestr_type", label:"Type", value:"CTP", readonly:true},
                       {type:"newcolumn"}, {type:"input", name:"customer_id", label:"Customer ID", value:"", readonly:true},
                        {type:"newcolumn"},{type:"button", name:"selectCustomer", value:"Customer"},
                      
                        
                 ]},     
            {type:"fieldset",label:"",inputWidth: 700,       
                list:[
                        {type:"newcolumn"},{type:"input", name:"pricestr_th_nm", label:"Thainame", value:""},
                        {type:"newcolumn"},{type:"input", name:"pricestr_en_nm", label:"Englishname", value:""},
                       {type:"newcolumn"}, {type:"input", name:"pricestr_code", label:"Function", value:"$C"},
                ]}, 
              {type:"fieldset",label:"",inputWidth: 700,       
                list:[
                       {type:"newcolumn"}, {type:"input", name:"currency", label:"Currency", value:""},                     
                       {type:"newcolumn"}, {type:"input", name:"discount", label:"Discount", value:""},
                       {type:"newcolumn"}, {type:"input", name:"discountmax", label:"Max Discount", value:""},
                ]},
              {type:"fieldset",label:"",inputWidth: 700,       
                list:[
                        {type:"newcolumn"},{type:"input", name:"commission", label:"Commission", value:""},
                        {type:"newcolumn"},{type:"input", name:"description", label:"Description", value:"", rows:4},
                ]}, 
              {type:"fieldset",label:"",inputWidth: 700,       
                list:[
                        {type:"newcolumn"},{type:"calendar", dateFormat:"%Y-%m-%d", name:"startDate_car", label:"Start Date"},
                       {type:"newcolumn"}, {type:"calendar", dateFormat:"%Y-%m-%d", name:"validUntil_car", label:"Valid Until"},
                       
                ]},
            {type:"fieldset",label:"control",inputWidth:150,
                list:[
                         {type:"newcolumn"},{type:"button", name:"proceed", value:"Insert"},
                ]},      
                        {type:"hidden", name:"id", value:""},
                        {type:"hidden", name:"loginCompany", value:sesLoginCompany},
                        {type:"hidden", name:"loginUser", value:sesUser},
                        {type:"hidden", name:"startDate", value:""},
                        {type:"hidden", name:"validUntil", value:""}
                    ]}
            ];
            
            function init(){
                myCalendar = new dhtmlXCalendarObject();
                myform = new dhtmlXForm("divForm",formDataNew);
                var dp = new dataProcessor("PHP/priceStrInsert.php");//instatiate dataprocessor
                dp.init(myform);//link form to dataprocessor
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
                    }if(id == 'selectCustomer'){
                        selectCustomer();
                    }
                    
                });
        
            }
            function selectCustomer(){
                //                alert("SelectCustomer");
                var dhxWins= new dhtmlXWindows();
                var win = dhxWins.createWindow("personWin",0, 0, 450,500);
                var grid = dhxWins.window("personWin").attachGrid();
                var personData =[{fields:'id',aligns:'center',widths:'100',types:'ro',hides:true,enNames:'ID',thNames:'รหัส'},
                    {fields:'englishName',aligns:'center',widths:'200',types:'ro',hides:false,enNames:'Customer Name',thNames:'ชื่อลูกค้า'},
                    {fields:'thaiName',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'Customer Name',thNames:'ชื่อลูกค้า'},
                    {fields:'personType',aligns:'center',widths:'200',types:'ro',hides:false,enNames:'Type',thNames:'Type'}];
                var obj2 = new cObject;
                obj2.setBegin(grid,personData,0);
                grid.attachHeader(",#select_filter,#select_filter");
                grid.init();            
                grid.loadXML("PHP/customerLoad.php?fields="+obj2.fields);
                dhxWins.window("personWin").setText("Customer");
                grid.attachEvent("onRowDblClicked",function(rId,cInd){
                    myform.setItemValue("customer_id",grid.cells(rId,0).getValue());
                    myform.setItemValue("pricestr_en_nm", grid.cells(rId,1).getValue());
                    myform.setItemValue("pricestr_th_nm", grid.cells(rId,2).getValue());
                    dhxWins.window("personWin").close();
                });
            }
			

        </script>        
    </body>
</html>