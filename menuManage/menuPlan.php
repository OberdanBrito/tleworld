<?php
ob_start(); // clear buffer
session_start();
header("Cache-Control: no-cache, must-revalidate");
require("../commons/PHP/connectDB.php");


echo "<script type='text/javascript'>";
echo "var pxcId = '" . $_SESSION['partnerxcompany_id'] . "';";
echo "var sesLoginCompany = '" . $_SESSION['company'] . "';";
echo "var sesLoginUser = '" . $_SESSION['loginUser'] . "';";
echo "</script>";
?>
<html>
    <head>
        <title>menuPlan</title>
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

        <script src="../DHX/dhtmlxTree/codebase/dhtmlxtree.js"></script>

        <script src="../DHX/dhtmlxTree/codebase/ext/dhtmlxtree_ed.js"></script>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxTree/codebase/dhtmlxtree.css">

        <script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
        <!--<script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>-->
        <script src="../DHX/dhtmlxConnector/codebase/connector.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_combo.js" type="text/javascript"></script>
        <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>
        <script language="JavaScript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>
        <script src="../commons/js/fnMainObj_DHX1.0.js" type="text/javascript"></script>
        <script src="js/fnDateObj.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="parentId" style="width:600px; height:400px;"></div>
        <div id="menubox" width="100%" height="50%" style="background-color:white;overflow:hidden"></div>
        <div id="gridbox" width="100%" height="50%" style="background-color:white;overflow:hidden"></div>
        <div style="height: 0px;"><div id="menuObj"></div></div>
        <script>
            menuSys = new dhtmlXMenuObject("menubox");
            menuSys.setIconsPath("../DHX/dhtmlxMenu/samples/common/imgD/");
            menuSys.renderAsContextMenu();
            //            menu.addContextZone("menu");
            menuSys.attachEvent("onClick", onButtonSysClick);   
            menuSys.loadXML("XML/menuMenu.xml");
            menuMenu = new dhtmlXMenuObject("menubox");
            menuMenu.setIconsPath("../DHX/dhtmlxMenu/samples/common/imgD/");
            menuMenu.renderAsContextMenu();
            //            menu.addContextZone("menu");
            menuMenu.attachEvent("onClick", onButtonMenuClick);   
            menuMenu.loadXML("XML/menuMenu.xml");
            var dhxAccord = new dhtmlXAccordion("parentId");
            dhxAccord.addItem("a1", "System Parameter");
            dhxAccord.addItem("a2","Menu");
            var dhTreeMenu = dhxAccord.cells("a2").attachTree();
            dhTreeMenu.setImagePath("../DHX/dhtmlxTree/codebase/imgs/");
            dhTreeMenu.setSkin('dhx_skyblue');
            dhTreeMenu.enableItemEditor(true);
            dhTreeMenu.loadXML("./PHP/loadTreeMenu.php");
            
            dhTreeMenu.enableDragAndDrop(true, true);
            dhTreeMenu.setDragBehavior("complex");
            dhTreeMenu.enableContextMenu(menuMenu);
            function onButtonMenuClick(menuitemId, type) {
                if(menuitemId=="insert"){

                    date = new Date();
                    tmpId = date.getDate();
                    dhTreeMenu.insertNewChild("0",tmpId,"New Folder","","folderClosed.gif","folderClosed.gif","folderOpen.gif","","");
                    dhTreeMenu.setUserData(tmpId,"href","folder");
                }else if(menuitemId=="delete"){
                    if(dhTreeMenu.hasChildren(dhTreeMenu.contextID)==0&&dhTreeMenu.getUserData(dhTreeMenu.contextID,"href")=="folder"){
                        dhTreeMenu.deleteItem(dhTreeMenu.contextID);
                    }else{
                        alert0("Delete Error.");
                    }
                }
                
                
            }
           
            dhTreeMenu.attachEvent("onDrag", function(sId,tId,id,sObject,tObject){
                if(dhTreeMenu.getUserData(tId,"href")=="folder"){
                    return true;
                }else if(tId==0){
                    return true;
                }
                else if(dhTreeMenu.getUserData(tId,"href")!="folder"){
                    return false;
                }else{
                    return true;
                }
            });
            
            
            treeMenuDP = new dataProcessor("PHP/updateTreeMenu.php");//lock feed url
            treeMenuDP.init(dhTreeMenu); //link dataprocessor to the grid
            treeMenuDP.setTransactionMode("GET", false);
            //            treeSysDP.setUpdateMode("off","");
                        
            treeMenuDP.attachEvent("onBeforeUpdate",function(id,status){
                //                alert(id+status);
                return true;
            });
            treeMenuDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag){
                //                alert(sid+action+tid);
            });
            var dhTreeSys = dhxAccord.cells("a1").attachTree();
            dhTreeSys.setImagePath("../DHX/dhtmlxTree/codebase/imgs/");
            dhTreeSys.setSkin('dhx_skyblue');
            dhTreeSys.enableItemEditor(true);
            dhTreeSys.loadXML("./PHP/loadTreeSys.php");
            
            dhTreeSys.enableDragAndDrop(true, true);
            dhTreeSys.setDragBehavior("complex");
            dhTreeSys.enableContextMenu(menuSys);
            function onButtonSysClick(menuitemId, type) {
                if(menuitemId=="insert"){

                    date = new Date();
                    tmpId = date.getDate();
                    dhTreeSys.insertNewChild("0",tmpId,"New Folder","","folderClosed.gif","folderClosed.gif","folderOpen.gif","","");
                    dhTreeSys.setUserData(tmpId,"href","folder");
                }else if(menuitemId=="delete"){
                    if(dhTreeSys.hasChildren(dhTreeSys.contextID)==0&&dhTreeSys.getUserData(dhTreeSys.contextID,"href")=="folder"){
                        dhTreeSys.deleteItem(dhTreeSys.contextID);
                    }else{
                        alert0("Delete Error.");
                    }
                }
                
                
            }
           
            dhTreeSys.attachEvent("onDrag", function(sId,tId,id,sObject,tObject){
                if(dhTreeSys.getUserData(tId,"href")=="folder"){
                    return true;
                }else if(tId==0){
                    return true;
                }
                else if(dhTreeSys.getUserData(tId,"href")!="folder"){
                    return false;
                }else{
                    return true;
                }
            });
            
            
            treeSysDP = new dataProcessor("PHP/updateTreeSys.php");//lock feed url
            treeSysDP.init(dhTreeSys); //link dataprocessor to the grid
            treeSysDP.setTransactionMode("GET", false);
            //            treeSysDP.setUpdateMode("off","");
                        
            treeSysDP.attachEvent("onBeforeUpdate",function(id,status){
                //                alert(id+status);
                return true;
            });
            treeSysDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag){
                //                alert(sid+action+tid);
            });
            
            
        </script>
    </body>
</html>