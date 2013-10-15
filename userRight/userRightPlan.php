<?php
ob_start(); // clear buffer
session_start();
header("Cache-Control: no-cache, must-revalidate");
require("../commons/PHP/connectDB.php");


echo "<script type='text/javascript'>";
echo "var uId = '" . $_SESSION['user_id'] . "';";
echo "var sesLoginCompany = '" . $_SESSION['company'] . "';";
echo "var sesLoginUser = '" . $_SESSION['loginUser'] . "';";
echo "var userId = '" . $_GET['userId'] . "';";
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
        <div id="left" width="48%" height="90%" style="float:left; padding-right: 10px;"></div>
        <div id="right" width="48%" height="90%" style="float:left;padding-left: 10px;"></div>
        <script>
            lGrid = new dhtmlXGridObject("left");
            var ownerData =[{fields:'userId',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'userId',thNames:'userId'},
                {fields:'modId',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'modID',thNames:'modID'},
                {fields:'thaiName',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'thaiName',thNames:'thaiName'},
                {fields:'englishName',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'englishName',thNames:'englishName'},
                {fields:'code',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'code',thNames:'code'},
                {fields:'type',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'type',thNames:'type'},
                {fields:'startDate',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'startDate',thNames:'startDate'},
//                {fields:'validDate',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'validDate',thNames:'validDate'},
                {fields:'owner',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'owner',thNames:'owner'},
                {fields:'createDate',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'createDate',thNames:'createDate'},
                {fields:'loginCompany',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'loginCompany',thNames:'loginCompany'},
                {fields:'menuOrder',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'menuOrder',thNames:'menuOrder'}];
            var obj = new cObject;
            obj.setBegin(lGrid,ownerData,0);  //0=en 1=th
            lGrid.setSkin("dhx_skyblue");
            lGrid.setImagePath("../common/imgs/");
            lGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            lGrid.enableDragAndDrop(true);
            lGrid.enableMercyDrag(true);
            lGrid.init();
            lGrid.loadXML("PHP/userRightPlanLoad.php?fields="+obj.fields+"&userid="+uId);
            lGrid.attachEvent("onDrop", function(sId,tId,dId,sObj,tObj,sCol,tCol){
            });
            lGrid.attachEvent("onRowAdded", function(rId){
                
                lGrid.deleteRow(rId);
                
            });
            rGrid = new dhtmlXGridObject("right");
            var userData =[{fields:'userId',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'userId',thNames:'UserId'},
                {fields:'modId',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'modID',thNames:'modID'},
                {fields:'thaiName',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'thaiName',thNames:'thaiName'},
                {fields:'englishName',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'englishName',thNames:'englishName'},
                {fields:'code',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'code',thNames:'code'},
                {fields:'type',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'type',thNames:'type'},
                {fields:'startDate',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'startDate',thNames:'startDate'},
//                {fields:'validDate',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'validDate',thNames:'validDate'},
                {fields:'owner',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'owner',thNames:'owner'},
                {fields:'createDate',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'createDate',thNames:'createDate'},
                {fields:'loginCompany',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'loginCompany',thNames:'loginCompany'},
                {fields:'menuOrder',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'menuOrder',thNames:'menuOrder'}];
            var obj2 = new cObject;
            obj2.setBegin(rGrid,userData,0);  //0=en 1=th
            rGrid.setSkin("dhx_skyblue");
            rGrid.setImagePath("../common/imgs/");
            rGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            rGrid.enableDragAndDrop(true);
            rGrid.init();
            rGrid.loadXML("PHP/userRightPlanLoad.php?fields="+obj.fields+"&userid="+userId);
            rGrid.attachEvent("onBeforeDrag", function(id){
                return false;
            });
            rGrid.gridToGrid = function(rowId,sgrid,tgrid){
                
                var z=[];
                z[0] = userId;
                for (var i=1; i<sgrid.getColumnsNum(); i++){    // for each cell in the source grid
                    z[i]=sgrid.cells(rowId,i).getValue();         // prepare data for the target grid
                }
                return z;

            }
            myDP = new dataProcessor("PHP/userRightPlanLoad.php?fields="+obj2.fields);//lock feed url
            myDP.init(rGrid); //link dataprocessor to the grid
            myDP.setTransactionMode("POST",true)
            myDP.attachEvent("onBeforeUpdate",function(rId,status){
                var tmp = 0;
                var modVal = rGrid.cells(rId,1).getValue();
                rGrid.forEachRow(function(id){
                    if(modVal==rGrid.cells(id,1).getValue()){
                        tmp++;
                    }
                });
                if(tmp>1){
                    return false;
                }
                return true;
            });
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag){
                //                alert(action);  
            });
            rGrid.attachEvent("onRowAdded", function(rId){
                var tmp = 0;
                var modVal = rGrid.cells(rId,1).getValue();
                rGrid.forEachRow(function(id){
                    if(modVal==rGrid.cells(id,1).getValue()){
                        tmp++;
                    }
                });
                if(tmp>1){
                    rGrid.deleteRow(rId);
                }
            });  
        </script>
    </body>
</html>