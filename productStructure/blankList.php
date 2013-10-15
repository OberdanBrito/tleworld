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
        <div id="gridBox" width="490" height="95.5%" style="background-color:white;overflow:hidden"></div></td>
    <input type="button" value="search" onclick="javascript:listLoad();">
    <!--td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>Insert Item<div id="gridboxBlank" width="490" height="492" style="background-color:white;overflow:hidden"></div></td-->



    <script type="text/javascript">
        var gridBox,gridBoxSet,gridBoxObj;

        //###############################################################
        //LIST
        //###############################################################
        function listLoad(id){
            //            alert(id);
            if(id == undefined){
                paraMix = "digit=0";
            }else{
                var classSp = gridBox.cells(id,0).getValue();
                var typeSp = gridBox.cells(id,1).getValue();
                var groupSp = gridBox.cells(id,2).getValue();
                //                paraMix = 'class='+encodeURIComponent(classSp)+'&type='+encodeURIComponent(typeSp)+'&group='+encodeURIComponent(groupSp);
                paraMix = 'digit=1&gClass='+classSp+'&gType='+typeSp+'&gGroup='+groupSp;
                //                alert(paraMix);
            }
            dhxGridList = parent.dhxAccordR.cells("list").attachURL("../productStructure/blankListStruct.php?"+paraMix);
            parent.dhxAccordR.openItem("list");
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
        gridBox.attachEvent("onRowSelect",listLoad);
        gridBox.enableTooltips("false");
        gridBox.init();
        gridBox.loadXML("load/blankList/s_blank_GroupLoad.php");
    </script>
</body>
</html>
