<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>ERP</title>
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
                                <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_hmenu.js"></script>
                                <script  src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
                                <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_mcol.js"></script>
                                <script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
                                <script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>
                                <script src="../DHX/dhtmlxConnector/codebase/connector.js"></script>
                                <script src="../DHX/dhtmlxTreeGrid/codebase/dhtmlxtreegrid.js"></script>
                                <script src="../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_filter.js"></script>
                                <script src="../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_lines.js"></script>
                                <script src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
                                <script src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js" type="text/javascript"></script>
                                <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_combo.js" type="text/javascript"></script>
                                <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>
                                <script src="../DHX/dhtmlxTree/codebase/dhtmlxtree.js"></script>

                                <script src="../DHX/dhtmlxTree/codebase/ext/dhtmlxtree_ed.js"></script>
                                <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxTree/codebase/dhtmlxtree.css"/>
                                <script src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>
                                <script language="JavaScript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
                                <script src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>

                                </head>
                                <body overflow="auto" onLoad="doOnLoad();">

                                    <div id="parentId" style="position: absolute; top: 2px; left: 4px; width: 99%; height: 99%; aborder: #B5CDE4 1px solid;"></div>
                                    <script>

                                        function doOnMenuSelected(id){ 
                                            //alert(id);
            
                                        }

                                        var dhxLayout, dhxAccord,dhxAccordR,dhxGrid,dhxList;        
                                        var user = '<?php echo $_SESSION['userName']; ?>';
                                        var comp = '<?php echo $_SESSION['company']; ?>';
                                        var lang = '<?php echo $_SESSION['language']; ?>';
                                        var rel_id = '<?php echo $_SESSION['user_id']; ?>';
                                        var dhUrl;
                                        function doOnLoad() {
                                            dhxLayout = new dhtmlXLayoutObject("parentId", "2U");
                                            dhxLayout.cells("a").hideHeader();
                                            dhxLayout.cells("a").setWidth(200);
                                            dhxLayout.cells("b").setText("Task list");
                                            dhxLayout.cells("b").hideHeader();
                                           
                                            dhxAccord = dhxLayout.cells("a").attachAccordion();
                                            dhxAccord.addItem("a1", "System Parameter");
                                            dhxAccord.addItem("a2","Menu");
                                            var dhTreeSys = dhxAccord.cells("a1").attachTree();
                                            dhTreeSys.setImagePath("../DHX/dhtmlxTree/codebase/imgs/");
                                            dhTreeSys.setSkin('dhx_skyblue');
                                            dhTreeSys.loadXML("./PHP/loadTreeSys.php");
                                            dhTreeSys.attachEvent("onXLS",function(tree,id){
                                                
                                            });
                                            dhTreeSys.attachEvent("onClick",function(id){
                                                if(dhTreeSys.getUserData(id,"href")!="folder"){
                                                    dhxAccordR.cells("group").attachURL("../"+dhTreeSys.getUserData(id,"href"));
                                                    dhxAccordR.openItem("group");
                                                }
                                            });
                                            var dhTreeMenu = dhxAccord.cells("a2").attachTree();
                                            dhTreeMenu.setImagePath("../DHX/dhtmlxTree/codebase/imgs/");
                                            dhTreeMenu.setSkin('dhx_skyblue');
                                            dhTreeMenu.loadXML("./PHP/loadTreeMenu.php");
                                            dhTreeMenu.attachEvent("onXLS",function(tree,id){
                                                
                                            });
                                            dhTreeMenu.attachEvent("onClick",function(id){
                                                if(dhTreeMenu.getUserData(id,"href")!="folder"){
                                                    dhxAccordR.cells("group").attachURL("../"+dhTreeMenu.getUserData(id,"href"));
                                                    dhxAccordR.openItem("group");
                                                }
                                            });
                                            statusBar = dhxLayout.cells("a").attachStatusBar();
                                            var link = "newPopup('changePw.php');";
                                            statusBar.setText('<a href="JavaScript:'+link+'"><text id="forgotp">Change password</text></a>, <a href="./logout.php">Log out</a>');
                                            // View
                                            dhxAccordR = dhxLayout.cells("b").attachAccordion();
                                            // Group View 
                                            dhxAccordR.addItem("group", 'Group View');
                                            dhxGrid = dhxAccordR.cells("group").attachGrid();
                                            dhxGrid.setImagePath("../codebase/imgs/");
                                            // List View
                                            dhxAccordR.addItem("list", 'List View');
                                            dhxList=dhxAccordR.cells("list").attachGrid();
                                            dhxList.setImagePath("../codebase/imgs/");
                                            // Plan View
                                            dhxAccordR.addItem("plan", 'Plan View');
                                            dhUrl=dhxAccordR.cells("plan").attachURL("news.html");
                                            dhxAccordR.openItem("plan");
                                        }
                                    </script>
                                    <script type="text/javascript">
                                        // Popup window code
                                        function newPopup(url) {
                                            popupWindow = window.open(
                                            url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes');
                                        }
                                    </script>
                                </body>
                                </html>
