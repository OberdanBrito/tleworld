<?php
require_once("../commons/PHP/connectDB.php");
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" href="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css" rel="stylesheet"/>
        <link type="text/css" href="../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css" rel="stylesheet"/>

        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_filter.js"></script>
    </head>
    <body>

        <div id="gridbox" width="490" height="95.5%" style="background-color:white;overflow:hidden"></div>
        <input type="button" value="search" onclick="javascript:listLoad();">

        <script type="text/javascript">

            //###############################################################
            //LIST
            //###############################################################
            function listLoad(id){
                //alert(id);
                if(id == undefined){
                    paraMix = "digit=0";
                }else{
                    var classSp = mygrid.cells(id,0).getValue();
                    var typeSp = mygrid.cells(id,1).getValue();
                    var groupSp = mygrid.cells(id,2).getValue();
//                    paraMix = 'class='+encodeURIComponent(classSp)+'&type='+encodeURIComponent(typeSp)+'&group='+encodeURIComponent(groupSp);
                    //alert(paraMix);
                    paraMix = 'digit=1&gClass='+classSp+'&gType='+typeSp+'&gGroup='+groupSp;
                }
                //                dhxGridList = parent.dhxAccordR.cells("list").attachGrid();
                dhxGridList = parent.dhxAccordR.cells("list").attachURL("../productStructure/editListStruct.php?"+paraMix);
                parent.dhxAccordR.openItem("list");

            }

            //###############################################################
            //GROUP
            //###############################################################
            mygrid = new dhtmlXGridObject('gridbox');
            mygrid.setSkin("dhx_skyblue");
            mygrid.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
            mygrid.setHeader("Class, Type, Group");
            mygrid.attachHeader("#select_filter,#select_filter,#select_filter");
            mygrid.setInitWidths("157,157,*")
            mygrid.setColTypes("ro,ro,ro");
            mygrid.attachEvent("onRowSelect",listLoad);
            mygrid.init();            
            mygrid.loadXML("load/editList/s_edit_GroupLoad.php");

        </script>
    </body>
</html>
