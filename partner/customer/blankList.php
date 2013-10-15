<?php
require("../../commons/PHP/session.php");
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" href="../../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css" rel="stylesheet"/>
        <link type="text/css" href="../../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css" rel="stylesheet"/>

        <script src="../../DHX/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_link.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_filter.js"></script>	
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_undo.js"></script>	
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_group.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_drag.js"></script>
        <script  src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_hmenu.js"></script>
        <script  src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script  src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_mcol.js"></script>
        <script src="../../commons/js/fnMainObj_DHX1.0.js" type="text/javascript"></script>
        <script src="js/fnDateObj.js" type="text/javascript"></script>

    </head>
    <body>
        <!--<div id="gridboxDB" width="490" height:100% style="background-color:white;overflow:hidden"></div>-->
         <div id="gridboxDB" style="width:100%; height:100%;background-color:white;overflow:hidden"></div>



        <script type="text/javascript">
            var code="";
            var partnerId="";
            var name="";
            function planLoad(id){
                code= mygridDB.cells(id,1).getValue();
                name = (sesLanguage=="English")?mygridDB.cells(id,3).getValue():mygridDB.cells(id,2).getValue();
                parent.dhxAccordR.cells("plan").attachURL('../partner/customer/main.php?state=blank&getCode='+code+"&getId="+partnerId+"&getName="+name+"&rowId=");
                parent.dhxAccordR.openItem("plan");
            }
            mygridDB = new dhtmlXGridObject('gridboxDB');
            groupLoad(mygridDB,"boxDB");
            
            function groupLoad(grid,div){
                var data =[{fields:"rowId",aligns:'left',widths:'50',types:'ro',hides:false,enNames:'rowId',thNames:'ลำดับ'},
                    {fields:'code',aligns:'center',widths:'300',types:'ro',hides:false,enNames:'Code',thNames:'โค๊ด'},
                    {fields:'thaiName',aligns:'center',widths:'300',types:'ro',hides:false,enNames:'Thai name',thNames:'ไทย'},
                    {fields:'englishName',aligns:'center',widths:'100',types:'ro',hides:false,enNames:'English name',thNames:'อังกฤษ'}];
                var obj = new cObject;
                obj.setBegin(grid,data,sesLanguage);  //0=en 1=th
                grid.setSkin("dhx_skyblue");
                grid.setImagePath("../../common/imgs/");
                grid.imgURL = "../../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
                grid.attachEvent("onRowSelect",planLoad);
                grid.init();
                grid.loadXML("PHP/blankListLoad.php?fields="+obj.fields+"&target=group");
            }
        </script>
    </body>
</html>
