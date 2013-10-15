<?php
//ob_start();
//header("Cache-Control: no-cache, must-revalidate");
require_once("../commons/PHP/session.php");
//require("vari.php");
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- dhtmlxForm -->
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css"/>
        <script src="../DHX/dhtmlxForm/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
        <script src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_combo.js"></script>

        <!-- dhtmlxGrid -->
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css"/>
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_hmenu.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_filter.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_link.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>

        <script type="text/javascript" src="../commons/js/fnMainObj_DHX1.0.js"></script>
    </head>
    <body>

        <div id="gridBox" width="490" height="95.5%" style="background-color:white;overflow:hidden"></div>
        <input type="button" value="search" onclick="javascript:doOnGroupSelected();">

        <script type="text/javascript">
            //            var lang = '<?php // echo $_SESSION['langauge'];          ?>';
            var gridBox,gridBoxSet,gridBoxObj;
            var paraMix;

            //###############################################################
            //PLAN
            //###############################################################
            //            function doOnListSelected(id){
            //                                alert(id);
            //                //((lang == "English")? getName= dhxGridList.cells(id,0).getValue() : getName= dhxGridList.cells(id,1).getValue());
            //                //alert(getName);
            //                parent.dhxAccordR.cells("plan").attachURL('../itemMaster/itemMaster.php?rId='+id+'&loginStatus=edit');
            //                parent.dhxAccordR.openItem("plan");
            //            }


            //###############################################################
            //LIST
            //###############################################################
            function doOnGroupSelected(id){
                if(id == undefined){
                    paraMix = "digit=0";
                }else{
                    var classSp = gridBox.cells(id,0).getValue();
                    var typeSp = gridBox.cells(id,1).getValue();
                    var groupSp = gridBox.cells(id,2).getValue();
                    //paraMix = 'class='+encodeURIComponent(classSp)+'&type='+encodeURIComponent(typeSp)+'&group='+encodeURIComponent(groupSp);
                    paraMix = 'digit=1&gClass='+classSp+'&gType='+typeSp+'&gGroup='+groupSp;
                    //                    alert(paraMix);
                }             

                //                dhxGridList = parent.dhxAccordR.cells("list").attachGrid();
                dhxGridList = parent.dhxAccordR.cells("list").attachURL("../itemMaster/editListManage.php?"+paraMix);
                parent.dhxAccordR.openItem("list");
                //                dhxGridList.setSkin("light");
                //                dhxGridList.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
                //                dhxGridList.setHeader("englishName, thaiName, code");
                //                dhxGridList.attachHeader("#select_filter,#select_filter,");
                //                dhxGridList.setInitWidths("150,150,100")
                //                dhxGridList.setColTypes("ro,ro,ro");
                //                dhxGridList.attachEvent("onRowSelect",doOnListSelected);
                //                dhxGridList.enableTooltips("false");
                //                dhxGridList.init();
                //                dhxGridList.loadXML("../itemMaster/load/new_ListLoad.php?"+paraMix);
            }
            
            //###############################################################
            //GROUP
            //###############################################################
            gridBox = new dhtmlXGridObject('gridBox');
            gridBoxSet = [
                {fields:'class',aligns:'left',widths:'157',types:'ro',hides:false,enNames:'Class',thNames:'คลาส',filter:"#select_filter"},
                {fields:'type',aligns:'left',widths:'157',types:'ro',hides:false,enNames:'Type',thNames:'ชนิด',filter:"#select_filter"},
                {fields:'gGroup',aligns:'left',widths:'*',types:'ro',hides:false,enNames:'Group',thNames:'กรุ๊ป',filter:"#select_filter"}];
            gridBoxObj = new cObject
            gridBoxObj.setBegin(gridBox,gridBoxSet,sesLanguage);
            gridBox.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
            gridBox.attachEvent("onRowSelect",doOnGroupSelected);
            gridBox.enableTooltips("false");
            gridBox.init();       
            gridBox.loadXML("load/editList/editGroupLoad.php");

        </script>
    </body>
</html>
