<?php
require("../commons/PHP/session.php");
?>
<html>
    <head>
        <title>PriceGroup</title>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />


        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" href="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css" rel="stylesheet"/>
        <link type="text/css" href="../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css" rel="stylesheet"/>
        <link type="text/css" href="../DHX/dhtmlxMenu/codebase/skins/dhtmlxmenu_dhx_skyblue.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxLayout/codebase/dhtmlxlayout.css">
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css">
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.css">
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxLayout/codebase/skins/dhtmlxlayout_dhx_skyblue.css">
        <link type="text/css" href="../DHX/dhtmlxAccordion/codebase/skins/dhtmlxaccordion_dhx_skyblue.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css">

        <style>
            .error {background-color: #ffd4db !important;color:maroon !important;}
        </style>
        <script>_css_prefix = "../../DHX/dhtmlxGrid/codebase/";
            dhtmlx = {};
            function alert0(str) {
                dhtmlx.message.defPosition="top";
                dhtmlx.message({
                    text:str,
                    id:"s2",
                    lifetime:3000,
                    type:"error"
                });
            }
        </script> <!-- to use with alert0-->

        <script src="../DHX/dhtmlxLayout/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxLayout/codebase/dhtmlxlayout.js"></script>
        <script src="../DHX/dhtmlxLayout/codebase/dhtmlxcontainer.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxcontainer.js"></script>
        <script src="../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
        <script src="../DHX/dhtmlxAccordion/codebase/dhtmlxcommon.js"></script>

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
        <script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
<!--        <script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>-->
        <script src="../DHX/dhtmlxConnector/codebase/connector.js"></script>
        <script src="../DHX/dhtmlxTreeGrid/codebase/dhtmlxtreegrid.js"></script>
        <script src="../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_filter.js"></script>
        <script src="../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_lines.js"></script>
        <script src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
        <script src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js" type="text/javascript"></script>
        <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_combo.js" type="text/javascript"></script>
        <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>
        <script src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>
        <script language="JavaScript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>
        <script src="js/fnMainObj_DHX.js" type="text/javascript"></script>
        <script src="js/fnDateObj.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="gridbox" width="100%" height="100%" style="background-color:white;overflow:hidden"></div>
        <script>
            priceStr = new dhtmlXGridObject("gridbox");
            var data =[{fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'Row ID',thNames:'Row ID'},
                {fields:'id',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'ID',thNames:'ID'},
                {fields:'pricestr_en_nm',aligns:'left',widths:'500',types:'ro',hides:false,enNames:'PriceStructure Name',thNames:'PriceStructure Name'},
                {fields:'pricestr_type',aligns:'left',widths:'100',types:'ro',hides:true,enNames:'Type',thNames:'Type'},
                {fields:'startDate',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'Start Date',thNames:'Start Date'},
                {fields:'validUntil',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'Valid Until',thNames:'Valid Until'},
                {fields:'active',aligns:'left',widths:'100',types:'ch',hides:false,enNames:'Status',thNames:'Status'},
                {fields:'description',aligns:'left',widths:'200',types:'ro',hides:false,enNames:'Description',thNames:'Description'}];
            var obj = new cObject;
            obj.setBegin(priceStr,data,0);  //0=en 1=th
            //            moduleGrid.attachHeader(",#select_filter,#select_filter,,,#select_filter,,,");
            priceStr.setColSorting(",str,str,str");
            priceStr.setSkin("dhx_skyblue");
            priceStr.setImagePath("../common/imgs/");
            priceStr.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            priceStr.enableAutoWidth(true);
            priceStr.init();
            priceStr.loadXML("PHP/priceGroupLoad.php?fields="+obj.fields);
            priceStr.attachEvent("onRowSelect",function(id,ind){
                var priceStrId = priceStr.cells(id,obj.id).getValue();
                parent.dhxAccordR.cells("plan").attachURL("../price/priceEditPlan.php?priceStrId="+priceStrId);
                parent.dhxAccordR.openItem("plan");
            });
            priceStr.attachEvent("onXLE", function(){
                priceStr.sortRows(0,"str","asc");
                //                priceStr.setEditable(false);
            });
            priceStr.enableHeaderMenu();
            priceStr.enableAutoSaving("priceEditGroup");
            priceStr.enableAutoSizeSaving();
            priceStr.loadSizeFromCookie("priceEditGroup");
            myDP = new dataProcessor("PHP/priceGroupLoad.php?fields="+obj.fields);//lock feed url
            myDP.init(priceStr); //link dataprocessor to the grid
        </script>
    </body>
</html>