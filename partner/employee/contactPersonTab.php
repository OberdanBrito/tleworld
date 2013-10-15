<?php
require("../../commons/PHP/session.php");
?>
<html>
    <head>
        <title>List View</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link type="text/css" href="../../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css" rel="stylesheet"/>
        <link type="text/css" href="../../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css" rel="stylesheet"/>
        <link type="text/css" href="../../DHX/dhtmlxMenu/codebase/skins/dhtmlxmenu_dhx_skyblue.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxLayout/codebase/dhtmlxlayout.css">
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css">
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxWindows/codebase/dhtmlxwindows.css">
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxLayout/codebase/skins/dhtmlxlayout_dhx_skyblue.css">
        <link type="text/css" href="../../DHX/dhtmlxAccordion/codebase/skins/dhtmlxaccordion_dhx_skyblue.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css">


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

        <script src="../../DHX/dhtmlxLayout/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxLayout/codebase/dhtmlxlayout.js"></script>
        <script src="../../DHX/dhtmlxLayout/codebase/dhtmlxcontainer.js"></script>
        <script src="../../DHX/dhtmlxWindows/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxWindows/codebase/dhtmlxwindows.js"></script>
        <script src="../../DHX/dhtmlxWindows/codebase/dhtmlxcontainer.js"></script>
        <script src="../../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
        <script src="../../DHX/dhtmlxAccordion/codebase/dhtmlxcommon.js"></script>

        <script src="../../DHX/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_link.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_filter.js"></script>	
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_undo.js"></script>	
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_group.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_drag.js"></script>
        <script  src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_hmenu.js"></script>
        <script  src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script  src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_mcol.js"></script>
        <!-- dhtmlxForm -->
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css"/>
        <script src="../../DHX/dhtmlxForm/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
        <script src="../../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_combo.js"></script>

        <script src="../../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
         <!--<script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>-->
        <script src="../../DHX/dhtmlxConnector/codebase/connector.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_combo.js" type="text/javascript"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>
        <script language="JavaScript" src="../../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script src="../../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>
        <script src="../../commons/js/fnMainObj_DHX1.0.js" type="text/javascript"></script>
        <script src="js/fnDateObj.js" type="text/javascript"></script>

    </head>
    <body>

        <div id="contactPerson" width="100%" height="70%" style="float:left;"></div>
        <!--<div id="right" width="48%" height="85%" style="float:right;"></div>-->
        <!--<div id="clearfix" class="clearfix" style="clear:both;"></div>-->
        <div id="menuBar" width="500px" height="10%" style="float:left"></div>
        <script>
            var partnerId = getId;
               
            function onButtonClick(menuitemId) {
                if(menuitemId=="select"){
                    var dhxWins= new dhtmlXWindows();
                    var win = dhxWins.createWindow("selectWin",90, 90, 900,500);
                    var grid = dhxWins.window("selectWin").attachURL("../customer/contactPersonWindow.php?getId="+partnerId);
                }else if(menuitemId=="delete"){
                    var rId = lGrid.getSelectedRowId();
                    if(lGrid!=null){
                        if(confirm("Delete contact person?")){
                            lGrid.deleteRow(rId);
                        }
                    }
                }else if(menuitemId=="edit"){
                    var contactId = lGrid.cells(lGrid.getSelectedId(),obj.value).getValue();
                    var pId;
                    dhtmlxAjax.get("PHP/ajax/getRowId.php?getId="+contactId,function(loader){
                        pId = loader.xmlDoc.responseText;
                        alert(pId);
                        var dhxWins= new dhtmlXWindows();
                        var win = dhxWins.createWindow("editWin",90, 90, 900,500);
                        attachUrl = "../customer/main.php?state=edit&getCode=contact&getId="+contactId+"&getName=ContactPerson&rowId="+pId;
                        alert(attachUrl)
                        var grid = dhxWins.window("editWin").attachURL(attachUrl);
                    });
                }else if(menuitemId=="new"){
                    var dhxWins= new dhtmlXWindows();
                    var win = dhxWins.createWindow("editWin",90, 90, 900,500);
                    var grid = dhxWins.window("editWin").attachURL("../customer/main.php?state=blank&getCode=contact&getId=&getName="+name+"&rowId=");
                
                }else{
                    alert("Something went wrong.");
                }
            }
            var formData = [
                {type: "fieldset",  name: "mydata", label: "Control", width:500, list:[
                        {type: "newcolumn"}, {type: "button", name: "new", value: "New"},
                        {type: "newcolumn"}, {type: "button", name: "edit", value: "Edit"},
                        {type: "newcolumn"}, {type: "button", name: "select", value: "Insert From Existing"},
                        {type: "newcolumn"}, {type: "button", name: "delete", value: "Delete"}]}
            ];
            var myForm = new dhtmlXForm("menuBar",formData);
            myForm.attachEvent("onButtonClick", onButtonClick);
            lGrid = new dhtmlXGridObject("contactPerson");
            var data = [{fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'rowId',thNames:'rowId'},
                {fields:'id',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'id',thNames:'id'},
                {fields:'partnerId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'partnerId',thNames:'partnerId'},
                {fields:'type',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'type',thNames:'type'},
                {fields:'categoryEnglish',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'categoryEnglish',thNames:'categoryEnglish'},
                {fields:'categoryThai',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'categoryThai',thNames:'categoryThai'},
                {fields:'categoryCode',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'categoryCode',thNames:'categoryCode'},
                {fields:'value',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'value',thNames:'value'},
                {fields:'location',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'location',thNames:'location'},
                {fields:'effectiveDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'effectiveDate',thNames:'effectiveDate'},
                {fields:'endDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'endDate',thNames:'endDate'},
                {fields:'startDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'startDate',thNames:'startDate'},
                {fields:'validUntil',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'validUntil',thNames:'validUntil'},
                {fields:'externalId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'externalId',thNames:'externalId'},
                {fields:'sortOrder',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'sortOrder',thNames:'sortOrder'},
                {fields:'sortName',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'sortName',thNames:'sortName'},
                {fields:'loginCompanyId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'loginCompanyId',thNames:'loginCompanyId'},
                {fields:'loginUserId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'loginUserId',thNames:'loginUserId'},
                {fields:'createTime',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'createTime',thNames:'createTime'},
                {fields:'editor',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'editor',thNames:'editor'},
                {fields:'editTime',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'editTime',thNames:'editTime'},
                {fields:'status',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'status',thNames:'status'},
                {fields:'revision',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'revision',thNames:'revision'},
                {fields:'refId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'refId',thNames:'refId'},
                {fields:'images',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'images',thNames:'images'}];
            var obj = new cObject;
            obj.setBegin(lGrid,data,sesLanguage);  //0=en 1=th
            lGrid.setSkin("dhx_skyblue");
            lGrid.setImagePath("../../common/imgs/");
            lGrid.imgURL = "../../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            lGrid.init();
            lGrid.loadXML("PHP/contactPersonLoad.php?fields="+obj.fields+"&getId="+partnerId);
            myDP = new dataProcessor("PHP/contactPersonLoad.php?fields="+obj.fields+"&getId="+partnerId);//lock feed url
            myDP.init(lGrid); //link dataprocessor to the grid
            //            myDP.setUpdateMode("off","");
            myDP.attachEvent("onBeforeUpdate",function(rId,status){
                return true;
            });
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag){
                //                alert(action);  
            });
        </script>
    </body>
</html>