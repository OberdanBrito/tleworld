<?php
ob_start(); // clear buffer
session_start();
header("Cache-Control: no-cache, must-revalidate");
require("../commons/PHP/connectDB.php");


echo "<script type='text/javascript'>";
echo "var uId = '" . $_SESSION['user_id'] . "';";
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
        <script src="js/fnMainObj_DHX.js" type="text/javascript"></script>
        <script src="js/fnDateObj.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="parent" width="100%" height="90%" style="float:left; background-color: black"></div>
        <script>
            userRightGrid = new dhtmlXGridObject("parent");
            var data =[{fields:'id',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'ID',thNames:'รหัส'},
//                {fields:'userId',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'pxcID',thNames:'pxcID'},
                {fields:'name',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'Login User',thNames:'ชื่อ'}];
            var obj = new cObject;
            obj.setBegin(userRightGrid,data,0);  //0=en 1=th
            userRightGrid.setSkin("dhx_skyblue");
            userRightGrid.setImagePath("../common/imgs/");
            userRightGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            userRightGrid.init();
            userRightGrid.loadXML("PHP/userRightGroupLoad.php?fields="+obj.fields);
            userRightGrid.attachEvent("onRowSelect",function(id){
                parent.dhxAccordR.cells("plan").attachURL("../userRight/userRightPlan.php?userId="+userRightGrid.cells(id,obj.arrVal.indexOf("id")).getValue());
                parent.dhxAccordR.openItem("plan");
            });
        </script>
    </body>
</html>