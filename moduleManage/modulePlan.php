<?php
ob_start(); // clear buffer
session_start();
header("Cache-Control: no-cache, must-revalidate");
require("../commons/PHP/connectDB.php");


echo "<script type='text/javascript'>";
echo "var uId = '" . $_SESSION['user_id'] . "';";
echo "var sesLoginCompany = '" . $_SESSION['company'] . "';";
echo "var sesLoginUser = '" . $_SESSION['userName'] . "';";
echo "</script>";
?>
<html>
    <head>
        <title>ModulePlan</title>

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
        <script src="../commons/js/fnMainObj_DHX1.0.js" type="text/javascript"></script>
        <script src="js/fnDateObj.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="gridbox" width="100%" height="50%" style="background-color:white;overflow:hidden"></div>
        <div id="menubox" width="100%" height="50%" style="background-color:white;overflow:hidden"></div>
        <div style="height: 0px;"><div id="menuObj"></div></div>
        <script>
            
            function onButtonClick(menuitemId, type) {
                rrId=type.split('_')[0];
                ccId=type.split('_')[1];
                if(menuitemId=="insert"){
                    var date = new cDateObject();                   
                    var dateTNow = date.dn+" "+date.tn;
                    tmpId = moduleGrid.uid();
                    var rId = moduleGrid.getRowId(moduleGrid.getRowsNum()-1);
                    var maxId = moduleGrid.cells(rId,obj.arrVal.indexOf("id")).getValue();
                    maxId = maxId.split("-");
                    var nxtId = parseInt(maxId[1])+1;
                    moduleGrid.addRow(tmpId,"","");
                    menuGrid.addRow(tmpId,"","");
                    
                    menuGrid.cells(tmpId,obj2.arrVal.indexOf("userId")).setValue(uId);
                    menuGrid.cells(tmpId,obj2.arrVal.indexOf("startDate")).setValue(date.dn);
                    menuGrid.cells(tmpId,obj2.arrVal.indexOf("parentId")).setValue("0");
                    menuGrid.cells(tmpId,obj2.arrVal.indexOf("createDate")).setValue(dateTNow);
//                    menuGrid.cells(tmpId,obj2.arrVal.indexOf("editDate")).setValue(dateTNow);
                    menuGrid.cells(tmpId,obj2.arrVal.indexOf("owner")).setValue("system");
                    menuGrid.cells(tmpId,obj2.arrVal.indexOf("loginUser")).setValue("system");
                    menuGrid.cells(tmpId,obj2.arrVal.indexOf("loginCompany")).setValue("system");
                    
                    moduleGrid.cells(tmpId,obj.arrVal.indexOf("id")).setValue("mod-"+nxtId+"-system");
                    moduleGrid.cells(tmpId,obj.arrVal.indexOf("createDate")).setValue(dateTNow);
                    
                }else if(menuitemId=="delete"){
                    if(confirm("Delete module?")){
                        moduleGrid.deleteRow(rrId);
                    }else{
                        
                    }
                }if(menuitemId=="save"){
                    myDP.sendData();
                }
            }
            menu = new dhtmlXMenuObject("menuObj");
            menu.setIconsPath("../DHX/dhtmlxMenu/samples/common/imgD/");
            menu.renderAsContextMenu();
            menu.attachEvent("onClick", onButtonClick);   
            menu.loadXML("XML/moduleMenu.xml");
            
            moduleGrid = new dhtmlXGridObject("gridbox");
            var data =[{fields:'id',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'ID',thNames:'ID'},
                {fields:'thaiModule',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'thaiModule',thNames:'thaiModule'},
                {fields:'englishModule',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'englishModule',thNames:'englishModule'},
                {fields:'description',aligns:'left',widths:'100',types:'txt',hides:false,enNames:'Description',thNames:'Description'},
                {fields:'code',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'CodePath',thNames:'CodePath'},
                {fields:'type',aligns:'left',widths:'200',types:'ed',hides:false,enNames:'Type',thNames:'Type'},
                {fields:'createDate',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'CreateDate',thNames:'CreateDate'},
                {fields:'editDate',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'EditDate',thNames:'EditDate'},
                {fields:'revision',aligns:'left',widths:'200',types:'ed',hides:false,enNames:'Revision',thNames:'Revision'}];
            var obj = new cObject;
            obj.setBegin(moduleGrid,data,0);  //0=en 1=th
            //            moduleGrid.attachHeader(",#select_filter,#select_filter,,,#select_filter,,,");
            moduleGrid.setColSorting("str,str,str,,str,str,str,str,");
            moduleGrid.setSkin("dhx_skyblue");
            moduleGrid.setImagePath("../common/imgs/");
            moduleGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            moduleGrid.enableContextMenu(menu);
            moduleGrid.enableAutoWidth(true);
            moduleGrid.init();
            moduleGrid.loadXML("PHP/moduleLoad.php?fields="+obj.fields);

            moduleGrid.attachEvent("onXLE", function(){
                moduleGrid.sortRows(0,"str","asc");
            });
            moduleGrid.enableHeaderMenu();
            moduleGrid.enableAutoSaving("modulePlan");
            moduleGrid.enableAutoSizeSaving();
            moduleGrid.loadSizeFromCookie("modulePlan");
            //            moduleGrid.enableDragAndDrop(true);
            //            moduleGrid.attachEvent("onDrag", function(sId,tId,sObj,tObj,sInd,tInd){
            //                
            //                
            //            });
            
            
            menuGrid = new dhtmlXGridObject("menubox");
            var menuData =[{fields:'userId',aligns:'left',widths:'100',types:'ed',hides:true,enNames:'uId',thNames:'ID'},
                {fields:'modId',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'modId',thNames:'thaiModule'},
                {fields:'thaiName',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'thaiName',thNames:'englishModule'},
                {fields:'englishName',aligns:'left',widths:'100',types:'txt',hides:false,enNames:'engName',thNames:'Description'},
                {fields:'code',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'CodePath',thNames:'CodePath'},
                {fields:'parentId',aligns:'left',widths:'200',types:'ed',hides:false,enNames:'pId',thNames:'Type'},
                {fields:'type',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'type',thNames:'CreateDate'},
                {fields:'startDate',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'startDate',thNames:'EditDate'},
                {fields:'validUntil',aligns:'left',widths:'200',types:'ro',hides:false,enNames:'ValidUntil',thNames:'Revision'},
                {fields:'owner',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'owner',thNames:'CodePath'},
                {fields:'createDate',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'createDate',thNames:'CodePath'},
                {fields:'loginCompany',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'loginCompany',thNames:'CodePath'},
                {fields:'loginUser',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'loginUser',thNames:'CodePath'}];
            var obj2 = new cObject;
            obj2.setBegin(menuGrid,menuData,0);  //0=en 1=th
            
            menuGrid.init();
            menuGrid.loadXML("PHP/menuLoad.php?fields="+obj2.fields);
            moduleGrid.attachEvent("onCellChanged", function(rId,cInd,nValue){
         
                
            });
            menuDP = new dataProcessor("PHP/menuLoad.php?fields="+obj2.fields);//lock feed url
            menuDP.init(menuGrid); //link dataprocessor to the grid
            menuDP.setUpdateMode("off","");
            
            menuDP.attachEvent("onBeforeUpdate",function(id,status){
                return true;
            });
            menuDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag){
            });
            
            myDP = new dataProcessor("PHP/moduleLoad.php?fields="+obj.fields);//lock feed url
            myDP.init(moduleGrid); //link dataprocessor to the grid
            myDP.setUpdateMode("off","");
            
            myDP.attachEvent("onBeforeUpdate",function(id,status){
                if(status=="updated"){
                    var date = new cDateObject();                   
                    moduleGrid.cells(id,obj.arrVal.indexOf("editDate")).setValue(date.dn);
                    for(var i=0;i<menuGrid.getRowsNum();i++){
                        var tRowId = menuGrid.getRowId(i);
                        if(moduleGrid.cells(id,obj.arrVal.indexOf("id")).getValue()==menuGrid.cells(tRowId,obj2.arrVal.indexOf("modId")).getValue()){
                            menuGrid.cells(tRowId,obj2.arrVal.indexOf("thaiName")).setValue(moduleGrid.cells(id,obj.arrVal.indexOf("thaiModule")).getValue());
                            menuGrid.cells(tRowId,obj2.arrVal.indexOf("englishName")).setValue(moduleGrid.cells(id,obj.arrVal.indexOf("englishModule")).getValue());
                            menuGrid.cells(tRowId,obj2.arrVal.indexOf("code")).setValue(moduleGrid.cells(id,obj.arrVal.indexOf("code")).getValue());
                            menuDP.setUpdated(tRowId,true);
                        }
                    }
                }else if(status=="inserted"){
                    var ids = menuGrid.getChangedRows(true).split(",");
                    for(var i=0;i<ids.length;i++){
                        var ind = ids[i];
                        menuGrid.cells(ind,obj2.arrVal.indexOf("modId")).setValue(moduleGrid.cells(id,obj.arrVal.indexOf("id")).getValue());
                        menuGrid.cells(ind,obj2.arrVal.indexOf("thaiName")).setValue(moduleGrid.cells(id,obj.arrVal.indexOf("thaiModule")).getValue());
                        menuGrid.cells(ind,obj2.arrVal.indexOf("englishName")).setValue(moduleGrid.cells(id,obj.arrVal.indexOf("englishModule")).getValue());
                        menuGrid.cells(ind,obj2.arrVal.indexOf("type")).setValue(moduleGrid.cells(id,obj.arrVal.indexOf("type")).getValue());
                        menuGrid.cells(ind,obj2.arrVal.indexOf("code")).setValue(moduleGrid.cells(id,obj.arrVal.indexOf("code")).getValue());
                    }
                    
                }else if(status=="deleted"){
                    for(var i=0;i<menuGrid.getRowsNum();i++){
                        var tRowId = menuGrid.getRowId(i);
                        if(moduleGrid.cells(id,obj.arrVal.indexOf("id")).getValue()==menuGrid.cells(tRowId,obj2.arrVal.indexOf("modId")).getValue()){
                            menuGrid.deleteRow(tRowId);
                            menuDP.setUpdated(tRowId,true);
                        }
                    }
                }
                
                return true;
            });
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag){
                if(action=="inserted"){
                    menuDP.sendData();
                }else if(action=="updated"){
                    menuDP.sendData();
                }else if(action=="deleted"){
                    menuDP.sendData();
                }
            });
            
        </script>
    </body>
</html>