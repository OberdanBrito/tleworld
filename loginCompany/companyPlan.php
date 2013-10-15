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
                   
                }else if(menuitemId=="delete"){
                    if(confirm("Delete module?")){
                        
                    
                    }else{
                        
                    }
                }if(menuitemId=="save"){
                    
                }
            }
            menu = new dhtmlXMenuObject("menuObj");
            menu.setIconsPath("../DHX/dhtmlxMenu/samples/common/imgD/");
            menu.renderAsContextMenu();
            menu.attachEvent("onClick", onButtonClick);   
            menu.loadXML("XML/companyMenu.xml");
            
            companyGrid = new dhtmlXGridObject("gridbox");
            var data =[{fields:'id',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'ID',thNames:'ID'},
                {fields:'thaiName',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'thaiName',thNames:'thaiModule'},
                {fields:'englishName',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'englishName',thNames:'englishModule'},
                {fields:'description',aligns:'left',widths:'100',types:'txt',hides:false,enNames:'Description',thNames:'Description'},
                {fields:'code',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'Code',thNames:'Code'},
                {fields:'type',aligns:'left',widths:'200',types:'ed',hides:false,enNames:'Type',thNames:'Type'},
                {fields:'startDate',aligns:'left',widths:'200',types:'ed',hides:false,enNames:'Type',thNames:'Type'},
                {fields:'validUntil',aligns:'left',widths:'200',types:'ed',hides:false,enNames:'Type',thNames:'Type'},
                {fields:'createDate',aligns:'left',widths:'200',types:'ed',hides:false,enNames:'Type',thNames:'Type'},
                {fields:'editor',aligns:'left',widths:'200',types:'ed',hides:false,enNames:'Type',thNames:'Type'},
                {fields:'editDate',aligns:'left',widths:'200',types:'ed',hides:false,enNames:'Type',thNames:'Type'},
                {fields:'revision',aligns:'left',widths:'200',types:'ed',hides:false,enNames:'Type',thNames:'Type'}];         
                var obj = new cObject;
            obj.setBegin(companyGrid,data,0);  //0=en 1=th
            //            moduleGrid.attachHeader(",#select_filter,#select_filter,,,#select_filter,,,");
            //            companyGrid.setColSorting("str,str,str,,str,str,str,str,");
            companyGrid.setSkin("dhx_skyblue");
            companyGrid.setImagePath("../common/imgs/");
            companyGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            companyGrid.enableContextMenu(menu);
            companyGrid.enableAutoWidth(true);
            companyGrid.init();
            companyGrid.loadXML("PHP/companyLoad.php?fields="+obj.fields);
            companyGrid.attachEvent("onXLE", function(){
                companyGrid.sortRows(obj.arrVal.indexOf("id"),"str","asc");
            });
            companyGrid.enableHeaderMenu();
            companyGrid.enableAutoSaving("companyPlan");
            companyGrid.enableAutoSizeSaving();
            companyGrid.loadSizeFromCookie("companyPlan");
            
             loginUgrid = new dhtmlXGridObject("menubox");
            var data2 =[{fields:'id',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'id',thNames:'loginU'},
                {fields:'companyId',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'companyId',thNames:'sDate'},
                {fields:'name',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'name',thNames:'pId'},
                {fields:'password',aligns:'left',widths:'200',types:'ed',hides:false,enNames:'password',thNames:'บริษัท'},
                {fields:'language',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'language',thNames:'lang'},
                {fields:'currency',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'currency',thNames:'รหัสบริษัท'},
                {fields:'thaiName',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'thaiName',thNames:'รหัสบริษัท'},
                {fields:'englishName',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'englishName',thNames:'รหัสบริษัท'},
                {fields:'description',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'description',thNames:'รหัสบริษัท'},
                {fields:'company',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'company',thNames:'รหัสบริษัท'},
                {fields:'user_code',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'user_code',thNames:'รหัสบริษัท'},
                {fields:'user_group',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'user_group',thNames:'รหัสบริษัท'},
                {fields:'email',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'email',thNames:'รหัสบริษัท'},
                {fields:'pop3Password',aligns:'center',widths:'200',types:'ed',hides:true,enNames:'pop3password',thNames:'รหัสบริษัท'},
                {fields:'pop3',aligns:'center',widths:'200',types:'ed',hides:true,enNames:'pop3',thNames:'รหัสบริษัท'},
                {fields:'smtp',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'smtp',thNames:'รหัสบริษัท'},
                {fields:'www',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'www',thNames:'รหัสบริษัท'},
                {fields:'active',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'active',thNames:'รหัสบริษัท'},
                {fields:'startDate',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'startDate',thNames:'รหัสบริษัท'},
                {fields:'validUntil',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'validUntil',thNames:'รหัสบริษัท'},
                {fields:'owner',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'owner',thNames:'รหัสบริษัท'},
                {fields:'createDate',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'createDate',thNames:'รหัสบริษัท'},
                {fields:'editor',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'editor',thNames:'รหัสบริษัท'},
                {fields:'editDate',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'editDate',thNames:'รหัสบริษัท'},
                {fields:'revision',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'revision',thNames:'รหัสบริษัท'},
                {fields:'currency',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'currency',thNames:'รหัสบริษัท'},
                {fields:'loginCompany',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'loginCompany',thNames:'รหัสบริษัท'},
                {fields:'loginUser',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'loginUser',thNames:'รหัสบริษัท'},
                {fields:'loginLevel',aligns:'center',widths:'200',types:'ed',hides:false,enNames:'loginLevel',thNames:'รหัสบริษัท'}];
        
       
      
            obj2 = new cObject();
            obj2.setBegin(loginUgrid,data2,0);
            loginUgrid.setSkin("dhx_skyblue");
            loginUgrid.setImagePath("../common/imgs/");
            loginUgrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
//            loginUgrid.enableContextMenu(menu);
            loginUgrid.init();
            loginUgrid.loadXML("PHP/loadLoginUser.php?fields="+obj2.fields);
            
        </script>
    </body>
</html>