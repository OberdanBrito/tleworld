<?php
ob_start();
session_start();
require_once("../commons/PHP/connectDB.php");
header("Cache-Control: no-cache, must-revalidate");
//$user = iconv("TIS-620", "UTF-8", $_REQUEST["user"]);
//$company = iconv("TIS-620", "UTF-8", $_REQUEST["comp"]);
//$language = iconv("TIS-620", "UTF-8", $_REQUEST["lang"]);

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

        <div id="gridbox" width="490" height="498" style="background-color:white;overflow:hidden"></div>

        <script type="text/javascript">
            var lang = '<?php echo $_SESSION['langauge'];?>';

            function doOnListSelected(id){
                //alert(id);
                //((lang == "English")? getName= dhxGridList.cells(id,0).getValue() : getName= dhxGridList.cells(id,1).getValue());
                //alert(getName);
//                parent.dhxAccordR.cells("plan").attachURL('../itemMaster/itemMaster.php?rId='+id+'&loginStatus=newForm');
//                parent.dhxAccordR.openItem("plan");
            }

            function doOnGroupSelected(id){
                //alert(id);
                var classSp = mygrid.cells(id,0).getValue();
                var typeSp = mygrid.cells(id,1).getValue();
                var groupSp = mygrid.cells(id,2).getValue();
                paraMix = 'class='+encodeURIComponent(classSp)+'&type='+encodeURIComponent(typeSp)+'&group='+encodeURIComponent(groupSp);
                //alert(paraMix);

                dhxGridList = parent.dhxAccordR.cells("list").attachGrid();
                parent.dhxAccordR.openItem("list");
                dhxGridList.setSkin("light");
                dhxGridList.setImagePath("../imgs/");
                dhxGridList.setHeader("englishName, thaiName");
                dhxGridList.attachHeader("#select_filter,#select_filter");
                dhxGridList.setInitWidths("200,200")
                dhxGridList.setColTypes("ro,ro");
                dhxGridList.attachEvent("onRowSelect",doOnListSelected);
                dhxGridList.init();
                dhxGridList.loadXML("../productStructure/connectDB/load_Update/listLoad.php?"+paraMix);

            }

            mygrid = new dhtmlXGridObject('gridbox');
            mygrid.setSkin("light");
            mygrid.setImagePath("../imgs/");
            mygrid.setHeader("Class, Type, Group");
            mygrid.attachHeader("#select_filter,#select_filter,#select_filter");
            mygrid.setInitWidths("157,157,*")
            mygrid.setColTypes("ro,ro,ro");
            mygrid.attachEvent("onRowSelect",doOnGroupSelected);
            mygrid.init();
            mygrid.loadXML("connectDB/load_Update/groupLoad.php");

        </script>
    </body>
</html>
