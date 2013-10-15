<?php
ob_start();
session_start();
require("../commons/PHP/connectDB.php");

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
        <div id="divgrid" width="90%" height='90%' style="background-color:white;overflow:hidden"></div>

        <script>

            function doOnListSelected(id){
                parent.dhxAccordR.cells("plan").attachURL("../cdefinition/codedefinition.php?loginStatus=edit&cdid="+id+"&name=system");
                parent.dhxAccordR.openItem("plan");
            }

            function doOnGroupSelected(id){
                var dhxGridList = parent.dhxAccordR.cells("list").attachGrid();
                parent.dhxAccordR.openItem("list");
                dhxGridList.setSkin("light");
                dhxGridList.setImagePath("../imgs/");
                dhxGridList.setHeader("rowId, englishName, thaiName, Description, Type, Code, GroupCode, StartDate, ValidUntil");
                dhxGridList.attachHeader(",,,,,,,#select_filter,#select_filter");
                dhxGridList.setInitWidths("100,100,100,100,100,100,100,100,100")
                dhxGridList.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro");
                dhxGridList.attachEvent("onRowSelect",doOnListSelected);
                dhxGridList.init();
                dhxGridList.loadXML("../cdefinition/connectDB/load_Update/editListLoad.php?cdtype="+id);

            }
            mygrid = new dhtmlXGridObject('divgrid');
            mygrid.setSkin("dhx_skyblue");
            mygrid.setImagePath("../imgs/");
            mygrid.setHeader("Type,# of Records");
            mygrid.attachHeader("#select_filter,");
            mygrid.setInitWidths("150,100")
            mygrid.setColTypes("ro,ro");
            mygrid.attachEvent("onRowSelect",doOnGroupSelected);
            mygrid.init();            
            mygrid.loadXML("connectDB/load_Update/editGroupLoad.php");
        </script>
    </body>
</html>
