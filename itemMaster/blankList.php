<?php
//ob_start();
//session_start();
//header("Cache-Control: no-cache, must-revalidate");
require_once("../commons/PHP/session.php");
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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

        <div id="gridBox" width="490" height="100%" style="background-color:white;overflow:hidden"></div>

        <script type="text/javascript">            
            var gridBox,gridBoxSet,gridBoxObj;
            
            var paraCTG = "<?= $Ar_CTG; ?>";
            function doOnListSelected(id){
                //      alert(id);
                var classSp,typeSp,groupSp;
                var splitId = id.split(':');
                var classSp = splitId[0];
                ((splitId[1] == '')? typeSp = null:typeSp = splitId[1]);
                ((splitId[2] == '')? groupSp = null:groupSp = splitId[2]);
                paraMix = 'loginStatus=blank&gClass='+classSp+'&type='+typeSp+'&group='+groupSp;
                //      alert(paraMix);
                parent.dhxAccordR.cells("plan").attachURL('../itemMaster/itemMaster.php?'+paraMix);
                parent.dhxAccordR.openItem("plan");

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
            gridBox.attachEvent("onRowSelect",doOnListSelected);
            gridBox.enableTooltips("false");
            gridBox.init(); 
            gridBox.loadXML("load/blankList/blank_GroupLoad.php");
        </script>
    </body>
</html>
