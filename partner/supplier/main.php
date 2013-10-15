<?php
require("../../commons/PHP/session.php");
?>
<html>
    <head>
        <title>Customer</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <style>
            .error {background-color: #ffd4db !important;color:maroon !important;}
            /*.fMain div.tab {font-weight:bold;}*/
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

        <!-- image -->
        <link rel="STYLESHEET" type="text/css" href="../../itemMaster/css/itemMaster.css">
        <script type="text/javascript" src="../../itemMaster/js/canvas/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../../itemMaster/js/canvas/modernizr.custom.34982.js"></script>
        <script type="text/javascript" src="../../itemMaster/js/canvas/sketcher.js"></script>

        <!-- dhtmlxDataProcessor -->
        <script type="text/javascript" src="../../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>

        <!-- dhtmlxConnector -->
        <script type="text/javascript" src="../../DHX/dhtmlxConnector/codebase/connector.js"></script>

        <!--  dhtmlxTabbar -->
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxTabbar/codebase/dhtmlxtabbar.css"/>
        <script type="text/javascript" src="../../DHX/dhtmlxTabbar/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxTabbar/codebase/dhtmlxtabbar.js"></script>
        <!--<script type="text/javascript" src="../../DHX/dhtmlxTabbar/codebase/dhtmlxcontainer.js"></script>-->

        <!-- dhtmlxCombo -->
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxCombo/codebase/dhtmlxcombo.css"/>
        <script type="text/javascript" src="../../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>

        <!-- dhtmlxForm -->
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css"/>
        <script src="../../DHX/dhtmlxForm/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
        <script src="../../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_combo.js"></script>

        <!-- dhtmlxCalendar -->
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.css"/>
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxCalendar/codebase/skins/dhtmlxcalendar_dhx_skyblue.css"/>
        <script type="text/javascript" src="../../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_calendar.js"></script>

        <!-- dhtmlxWindows -->
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxWindows/codebase/dhtmlxwindows.css"/>
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css"/>
        <script type="text/javascript" src="../../DHX/dhtmlxWindows/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxWindows/codebase/dhtmlxcontainer.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxWindows/codebase/dhtmlxwindows.js"></script>

        <!-- dhtmlxGrid -->
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css"/>
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css"/>
        <script type="text/javascript" src="../../DHX/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_hmenu.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_drag.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_filter.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_link.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_dhxcalendar.js"></script>

        <!-- dhtmlxAccordion -->
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxAccordion/codebase/skins/dhtmlxaccordion_dhx_skyblue.css"/>
        <script type="text/javascript" src="../../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxAccordion/codebase/dhtmlxcontainer.js"></script>

        <!-- dhtmlxTreeGrid -->
        <script type="text/javascript" src="../../DHX/dhtmlxTreeGrid/codebase/dhtmlxtreegrid.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_filter.js"></script>

        <!-- dhtmlxMenu -->
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxMenu/codebase/skins/dhtmlxmenu_dhx_blue.css"/>
        <script type="text/javascript" src="../../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script type="text/javascript" src="../../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js"></script>

        <!-- dhtmlxAjax -->
        <script type="text/javascript" src="../../DHX/dhtmlxAjax/codebase/dhtmlxcommon.js"></script>

        <!-- Manage JS -->
        <script type="text/javascript" src="js/fnDateObj.js"></script>
        <script type="text/javascript" src="../../commons/js/fnMainObj_DHX1.0.js"></script>
        <script type="text/javascript" src="../../itemMaster/js/retrieveParameter.js"></script>
        <script type="text/javascript" src="js/function.js"></script>
    </head>
    <!--    <body onunload="doOnUnload()">-->
    <body >
        <div id="tab" style="width:auto; height:auto"/>
        <script type="text/javascript">
            //-------------------------- Function --------------------------
            function enableTab(gId){
                for(b=1; b<idTab.length; b++){ 
                    tabbar.enableTab(idTab[b]);
                }
                if(getCode=="contact"){
                    tabbar.disableTab("a3",true);
                }
                tabbar.setContentHref("a2", "addressTab.php");
                tabbar.setContentHref("a3", "contactPersonTab.php");
//                tabbar.setContentHref("a4", "myform");
                tabbar.setContentHref("a4", "../../itemMaster/html5.php?idItem="+gId);
                tabbar.setContentHref("a5", "details.php?codeDef="+getCode+"_detail&getId="+gId+"&gState="+state);
            }
            
            function reloadTab(gId){
                if(gId=="a2"){tabbar.forceLoad("a2"); }
                if(gId=="a3"){tabbar.forceLoad("a3"); }
                return true;
            }
            //-------------------------- END Function --------------------------
            
            var idTab = ["a1","a2","a3","a4","a5"];
            tabbar = new dhtmlXTabBar("tab", "top");
            tabbar.setSkin('dhx_skyblue');
            tabbar.setImagePath("../../DHX/dhtmlxTabbar/codebase/imgs/");
            tabbar.addTab("a1", "<img src='../image/Doc1.png' style='margin-top:1px;width:15px;height:15px;left:15px;'> <span style='margin-left:5px;font-weight:bold;'>General</span>", "160px"); 
            tabbar.addTab("a2", "<img src='../image/address.jpg' style='margin-top:1px;width:15px;height:15px;left:15px;'> <span style='margin-left:5px;font-weight:bold;'>Address</span>", "160px");
            tabbar.addTab("a3", "<img src='../image/contact.jpg' style='margin-top:1px;width:15px;height:15px;left:15px;'> <span style='margin-left:5px;font-weight:bold;'>Contact</span>", "160px");
            tabbar.addTab("a4", "<img src='../image/images1.png' style='margin-top:1px;width:15px;height:15px;left:15px;'> <span style='margin-left:5px;font-weight:bold;'>Images</span>", "160px");
            tabbar.addTab("a5", "<img src='../image/detail.png' style='margin-top:1px;width:15px;height:15px;left:15px;'> <span style='margin-left:5px;font-weight:bold;'>Detail</span>", "160px");
            tabbar.setHrefMode("ajax-html");
            tabbar.setTabActive("a1");
            for(a=1; a<idTab.length; a++){
                tabbar.disableTab(idTab[a]);
            }
            //--------------- Click Tab
            tabbar.attachEvent("onSelect",reloadTab);
            
            //--------------- CHECK Type [-Begin-]
            if(getCode == "person"){ tabbar.setContentHref("a1", "personMain.php");
            }else if(getCode == "firm"){ tabbar.setContentHref("a1", "firmMain.php");
            }else if(getCode == "contact"){
                tabbar.setContentHref("a1","personMain.php");
            }
            
            
        </script>
    </body>
</html>