<?php
ob_start(); // clear buffer
session_start();
header("Cache-Control: no-cache, must-revalidate");
require("../commons/PHP/connectDB.php");


echo "<script type='text/javascript'>";
echo "var sesUser = '" . $_SESSION['userName'] . "';";
echo "var sesLoginCompany = '" . $_SESSION['company'] . "';";
echo "var sesLoginUser = '" . $_SESSION['loginUser'] . "';";
echo "var sesCompanyId = '" . $_SESSION['company_id'] . "';";
echo "</script>";
?>
<html>
    <head>
        <title>organizeGroup</title>

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
        <script src="fnDateObj.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="gridbox" width="100%" height="100%" style="background-color:white;overflow:hidden"></div>
        <div style="height: 0px;"><div id="menuObj"></div></div>
        <script>
            
            function onButtonClick(menuitemId, type) {
                rrId=type.split('_')[0];
                ccId=type.split('_')[1];
                if(menuitemId=="division"){
                    alert0("division");
                    var date = new cDateObject();                   
                    var dateTNow = date.dn+" "+date.tn;
                    var orgId = "org-"+dateTNow+"-"+sesUser;
                    var dataString = "";
                    dataString += orgId+","; //id
                    dataString += sesLoginCompany+","; //loginCompany
                    dataString += sesUser+",";  //loginUser
                    dataString += dateTNow+","; //createDate
                    dataString += date.dn+",";  //startDate
                    //                    dataString += rrId+",";  //parentId
                    dataString += ","; //positionName
                    dataString += menu.getItemText(menuitemId)+",";   //organizeType
                    dataString += sesCompanyId;    //companyId
                    tmpId = orgPGrid.uid();
                    orgPGrid.addRow(tmpId,dataString,"",rrId);
                    orgPGrid.expandAll(orgPGrid.getParentId(rrId));
                }else if(menuitemId=="position"){
                    var date = new cDateObject();                   
                    var dateTNow = date.dn+" "+date.tn;
                    var orgId = "org-"+dateTNow+"-"+sesUser;
                    var dataString = "";
                    dataString += orgId+","; //id
                    dataString += sesLoginCompany+","; //loginCompany
                    dataString += sesUser+",";  //loginUser
                    dataString += dateTNow+","; //createDate
                    dataString += date.dn+",";  //startDate
                    //                    dataString += rrId+",";  //parentId
                    dataString += ","; //positionName
                    dataString += menu.getItemText(menuitemId)+",";   //organizeType
                    dataString += sesCompanyId;    //companyId
                    tmpId = orgPGrid.uid();
                    orgPGrid.addRow(tmpId,dataString,"",rrId);
                    orgPGrid.expandAll(orgPGrid.getParentId(rrId));
                }else if(menuitemId=="person"){
                    if(orgPGrid.cells(rrId,6).getValue()!="Position"){
                        alert0("Access Denied: Person must be added below the Position");
                    }else{
                        var dhxWins= new dhtmlXWindows();
                        var win = dhxWins.createWindow("personWin",90, 90, 750,500);
                        var grid = dhxWins.window("personWin").attachGrid();
                        var personData =[{fields:'id',aligns:'center',widths:'100',types:'ro',hides:false,enNames:'ID',thNames:'รหัส'},
                            {fields:'partnername',aligns:'center',widths:'200',types:'ro',hides:false,enNames:'Employee Name',thNames:'ชื่อ-สกุล พนักงาน'}];
                        var obj2 = new cObject;
                        obj2.setBegin(grid,personData,0);
                        grid.init();            
                        grid.loadXML("connectDB/organizePersonWindowLoad.php?fields="+obj2.fields+"&cId="+sesCompanyId);
                        grid.attachEvent("onRowDblClicked",function(rId,cInd){
                            var c = orgPGrid.findCell(grid.cells(rId,1).getValue(),8);
                            if(c.length>0){
                                alert0("Duplicate Entry.");
                            }
                            //                        
                            else{
                                var date = new cDateObject();
                                var dateTNow = date.dn+" "+date.tn;
                                var orgId = "org-"+dateTNow+"-"+sesUser;
                                var cName = grid.cells(rId, 1).getValue();
                                var dataString = "";
                                dataString += orgId+",";
                                dataString += sesLoginCompany+",";
                                dataString += sesUser+",";
                                dataString += dateTNow+",";
                                dataString += date.dn+",";
                                dataString += cName+",";
                                dataString += menu.getItemText(menuitemId)+",";   //organizeType
                                dataString += sesCompanyId;
                                //                            alert(dataString);
                                tmpId = orgPGrid.uid();
                                orgPGrid.addRow(tmpId, dataString, null,rrId);
                                orgPGrid.lockRow(tmpId,true);
                                orgPGrid.expandAll(orgPGrid.getParentId(rrId));
                                dhxWins.window("personWin").hide();
                            }
                        });
                        dhxWins.window("personWin").setText("Select Employee");
                    }
                }else if(menuitemId=="delete"){
                    if(orgPGrid.getLevel(rrId)==0){
                        alert0("Access Denied: Cannot delete company.");
                    }else if(orgPGrid.hasChildren(rrId)>0){
                        alert0("Access Denied: Can't delete the node which has child.");
                    }
                    else{
                        orgPGrid.deleteRow(rrId);
                    }
                    
                }else if(menuitemId=="expAll"){
                    orgPGrid.expandAll();
                    
                }else if(menuitemId=="colAll"){
                    orgPGrid.collapseAll();
                    
                }else if(menuitemId=="undo"){
                    alert0("..."+orgPGrid.getUndo().length);
                    orgPGrid.doUndo();
                }else if(menuitemId=="redo"){
                    orgPGrid.doRedo();
                }
            }
            menu = new dhtmlXMenuObject("menuObj");
            menu.setIconsPath("../DHX/dhtmlxMenu/samples/common/imgD/");
            menu.renderAsContextMenu();
            menu.attachEvent("onClick", onButtonClick);   
            menu.loadXML("connectDB/loadPlanMenu.php");
            
            orgPGrid = new dhtmlXGridObject("gridbox");
            var data =[{fields:'id',aligns:'left',widths:'100',types:'tree',hides:false,enNames:'id',thNames:'รหัส'},
                {fields:'loginCompany',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'loginCompany',thNames:'loginC'},
                {fields:'loginUser',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'loginUser',thNames:'loginU'},
                {fields:'createDate',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'createDate',thNames:'cDate'},
                {fields:'startDate',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'startDate',thNames:'sDate'},
                //                {fields:'parentId',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'parentId',thNames:'pId'},
                {fields:'positionName',aligns:'left',widths:'200',types:'ed',hides:false,enNames:'positionName',thNames:'บริษัท'},
                {fields:'organizeType',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'organizeType',thNames:'organizeType'},
                {fields:'companyId',aligns:'center',widths:'200',types:'ro',hides:false,enNames:'companyId',thNames:'รหัสบริษัท'}];
            var obj = new cObject;
            obj.setBegin(orgPGrid,data,0);  //0=en 1=th
            
            orgPGrid.setSkin("dhx_skyblue");
            orgPGrid.setImagePath("../common/imgs/");
            orgPGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            orgPGrid.enableContextMenu(menu);
            orgPGrid.init();
            orgPGrid.loadXML("connectDB/organizeLoad.php?fields="+obj.fields);
            orgPGrid.attachEvent("onXLE", function(){
                //                alert(orgPGrid.getRowsNum());
                if(orgPGrid.getRowsNum()==0){
                    //                    alert("Add Row");
                    var date = new cDateObject();                   
                    var dateTNow = date.dn+" "+date.tn;
                    //                    alert(dateTNow);
                    var orgId = "org-"+dateTNow+"-"+sesUser;
                    //                    alert(orgId);
                    var dataString = "";
                    dataString += orgId+","; //id
                    //                    alert(dataString);
                    dataString += sesLoginCompany+","; //loginCompany
                    //                    alert(dataString);
                    dataString += sesUser+",";  //loginUser
                    //                    alert(dataString);
                    dataString += dateTNow+","; //createDate
                    //                    alert(dataString);
                    dataString += date.dn+",";  //startDate
                    //                    alert(dataString);
                    //                    dataString += rrId+",";  //parentId
                    dataString += sesLoginCompany+","; //positionName
                    dataString += "Company,";   //organizeType
                    dataString += sesCompanyId;    //companyId
                    //                    alert(dataString);
                    tmpId = orgPGrid.uid();
                    orgPGrid.addRow(tmpId,dataString,"");
                    
                }
            });
            orgPGrid.enableHeaderMenu();
            orgPGrid.enableAutoSaving("orgPlan");
            orgPGrid.enableAutoSizeSaving();
            orgPGrid.loadSizeFromCookie("orgPlan");
            orgPGrid.enableDragAndDrop(true);
            orgPGrid.attachEvent("onDrag", function(sId,tId,sObj,tObj,sInd,tInd){
                if(orgPGrid.cells(sId,obj.arrVal.indexOf("organizeType")).getValue()=="Person"&&orgPGrid.cells(tId,6).getValue()=="Person"){
                    alert0("Wrong Move.");
                    return false;
                }else if(orgPGrid.cells(sId,obj.arrVal.indexOf("organizeType")).getValue()=="Person"){
                    if(orgPGrid.cells(tId,obj.arrVal.indexOf("organizeType")).getValue()=="Position"){
                        return true;
                    }else if(orgPGrid.cells(orgPGrid.getParentId(tId),obj.arrVal.indexOf("organizeType")).getValue()=="Position"){
                        return true;
                    }else{
                        alert0("Wrong Move.");
                        return false;
                    }
                }else{
                    return true;
                }
            
            
            });
            
            myDP = new dataProcessor("connectDB/organizeLoad.php?fields="+obj.fields);//lock feed url
            myDP.init(orgPGrid); //link dataprocessor to the grid
            myDP.attachEvent("onBeforeUpdate",function(id,status){
                //                alert(id+status);
                return true;
            });
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag){
                //                alert(action);  
            });
            
        </script>
    </body>
</html>