<?php
require("../../commons/PHP/session.php");
echo "<script>";
echo "var priceStrId='" . $_REQUEST['priceStrId'] . "';";
echo "</script>";
?>
<html>
    <head>
        <title>PriceGroup</title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" href="../../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css" rel="stylesheet"/>
        <link type="text/css" href="../../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css" rel="stylesheet"/>
        <link type="text/css" href="../../DHX/dhtmlxMenu/codebase/skins/dhtmlxmenu_dhx_skyblue.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxLayout/codebase/dhtmlxlayout.css">
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css">
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxWindows/codebase/dhtmlxwindows.css">
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxLayout/codebase/skins/dhtmlxlayout_dhx_skyblue.css">
        <link type="text/css" href="../../DHX/dhtmlxAccordion/codebase/skins/dhtmlxaccordion_dhx_skyblue.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css">

        <style>
            .error {background-color: #ffd4db !important;color:maroon !important;}
        </style>
        <script>_css_prefix = "../../../DHX/dhtmlxGrid/codebase/";
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

        <script src="../../DHX/dhtmlxLayout/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxLayout/codebase/dhtmlxlayout.js"></script>
        <script src="../../DHX/dhtmlxLayout/codebase/dhtmlxcontainer.js"></script>
        <script src="../../DHX/dhtmlxWindows/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxWindows/codebase/dhtmlxwindows.js"></script>
        <script src="../../DHX/dhtmlxWindows/codebase/dhtmlxcontainer.js"></script>
        <script src="../../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
        <script src="../../DHX/dhtmlxAccordion/codebase/dhtmlxcommon.js"></script>

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
        <script src="../../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
<!--        <script src="../../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>-->
        <script src="../../DHX/dhtmlxConnector/codebase/connector.js"></script>
        <script src="../../DHX/dhtmlxTreeGrid/codebase/dhtmlxtreegrid.js"></script>
        <script src="../../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_filter.js"></script>
        <script src="../../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_lines.js"></script>
        <script src="../../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
        <script src="../../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js" type="text/javascript"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_combo.js" type="text/javascript"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>
        <script src="../../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>
        <script language="JavaScript" src="../../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script src="../../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>
        <script src="../js/fnMainObj_DHX.js" type="text/javascript"></script>
        <script src="../js/fnDateObj.js" type="text/javascript"></script>

        <style>
            
            .error {background-color: #ffd4db !important;color:maroon !important;}
            #loaderImage{
                position: absolute;
                top: 50%;
                left: 50%;
                margin-top:-50px;
                margin-left:-50px;
                z-index:1000;
                background-color: red;
                width:100px;
                height: 100px;
                display: none;
                background:url(../ajax-loader.gif) no-repeat;
            }
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



    </head>
    <body>
        <div id="catControl" width="100%" height="10%" style="background-color:white;overflow:hidden;margin-bottom:5px;"></div>
        <div id="gridbox" width="100%" height="80%" style="background-color:white;overflow:hidden">

        </div>
        <div id="loaderImage"></div>
        <script>
            var catControlData = [
                {type: "fieldset",  name: "mydata", label: "Category Control", width:800, list:[
                        {type:"newcolumn",offset:0},{type:"input",name:"Class",label:"Class",value:"",readonly:true},
                        {type:"newcolumn",offset:0},{type:"input",name:"Type",label:"Type",value:"",readonly:true},
                        {type:"newcolumn",offset:0},{type:"input",name:"Group",label:"Group",value:"",readonly:true},
                        {type: "newcolumn"}, {type: "button", name: "selectCat", value: "Select Category"}
                    ]}
            ];
            var catForm = new dhtmlXForm("catControl",catControlData);
            catForm.attachEvent("onChange", function (id, value){
                alert(id+value);
            });
            catForm.attachEvent("onButtonClick", function(menuitemId){
                dhxWins = new dhtmlXWindows();
                dhxWins.setImagePath("../../DHX/dhtmlxWindows/codebase/imgs/");
                w2 = dhxWins.createWindow("w2", 0, 0, 500, 300);
                w2.setText("Select Class/Type/Group");
                var CTGGrid = dhxWins.window("w2").attachGrid();;
                var CTGdata =[
                    {fields:'class',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'Class',thNames:'Class'},
                    {fields:'type',aligns:'left',widths:'200',types:'ro',hides:false,enNames:'Type',thNames:'Type'},
                    {fields:'gGroup',aligns:'left',widths:'200',types:'ro',hides:false,enNames:'Group',thNames:'Group'}
                ];
                var ctgObj = new cObject;
                ctgObj.setBegin(CTGGrid,CTGdata,sesLanguage);  //0=en 1=th
                CTGGrid.setSkin("dhx_skyblue");
                CTGGrid.setImagePath("../../common/imgs/");
                CTGGrid.imgURL = "../../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
                CTGGrid.enableAutoWidth(true);
                CTGGrid.init();
                CTGGrid.loadXML("../PHP/loadCTG.php?fields="+ctgObj.fields+"&priceStrId="+priceStrId);
                CTGGrid.attachEvent("onRowSelect",function(id,ind){
                    catForm.setItemValue("Class", this.cells(id,0).getValue());
                    catForm.setItemValue("Type", this.cells(id,1).getValue());
                    catForm.setItemValue("Group", this.cells(id,2).getValue());
                    priceStr.clearAndLoad("../PHP/priceLoad.php?fields="+obj.fields+"&priceStrId="+priceStrId+"&group="+this.cells(id,2).getValue()+"&class="+this.cells(id,0).getValue()+"&type="+this.cells(id,1).getValue(),function(){
                        document.getElementById('loaderImage').style.display = "none";
                        //                        priceStr.sortRows(2,"str","asc");
                        priceStr.forEachRow(function(id){
                            if(this.cells(id,obj.flag).getValue()=="CV"){
                                this.cells(id,obj.cost).setTextColor("red");
                                this.cells(id,obj.vatCode).setTextColor("red");
                            }
                            else if(this.cells(id,obj.flag).getValue()=="V"){
                                this.cells(id,obj.vatCode).setTextColor("red");
                            }
                            else if(this.cells(id,obj.flag).getValue()=="C"){
                                this.cells(id,obj.cost).setTextColor("red");
                            }
                        });
                    });
                    
                });
            });
            priceStr = new dhtmlXGridObject("gridbox");
            var data = [
                {fields:'checkboxes',aligns:'left',widths:'50',types:'ch',hides:true,enNames:'',thNames:''},
                //                {fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'rowId',thNames:'rowId'},
                {aligns:'left',fields:'id',widths:'50',types:'ro',hides:false,enNames:'id',thNames:'id'},
                {fields:'priceStrId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'priceStrId',thNames:'priceStrId'},
                {fields:'productStrId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'productStrId',thNames:'productStrId'},
                {fields:'cost',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'cost',thNames:'cost'},
                {fields:'price0',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'price0',thNames:'price0'},
                {fields:'inPrice',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'inPrice',thNames:'inPrice'},
                {fields:'exPrice',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'exPrice',thNames:'exPrice'},
                {fields:'currency',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'currency',thNames:'currency'},
                {fields:'vatCode',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'vatCode',thNames:'vatCode'},
                {fields:'vatValue',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'vatValue',thNames:'vatValue'},
                {fields:'itemId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'itemId',thNames:'itemId'},
                {fields:'englishName',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'englishName',thNames:'englishName'},
                {fields:'thaiName',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'thaiName',thNames:'thaiName'},
                {fields:'code',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'code',thNames:'code'},
                {fields:'style',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'style',thNames:'style'},
                {fields:'barCode',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'barCode',thNames:'barCode'},
                {fields:'class',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'class',thNames:'class'},
                {fields:'type',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'type',thNames:'type'},
                {fields:'gGroup',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'gGroup',thNames:'gGroup'},
                {fields:'commission',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'commission',thNames:'commission'},
                {fields:'flag',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'flag',thNames:'flag'},
                {fields:'remark',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'remark',thNames:'remark'},
                {fields:'loginUserId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'loginUserId',thNames:'loginUserId'},
                {fields:'loginCompanyId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'loginCompanyId',thNames:'loginCompanyId'},
                {fields:'editorId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'editorId',thNames:'editorId'},
                {fields:'editDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'editDate',thNames:'editDate'},
                {fields:'createDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'createDate',thNames:'createDate'},
                {fields:'startDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'startDate',thNames:'startDate'},
                {fields:'validUntil',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'validUntil',thNames:'validUntil'},
                {fields:'active',aligns:'left',widths:'50',types:'ch',hides:false,enNames:'active',thNames:'active'},
                {fields:'parentId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'parentId',thNames:'parentId'}
            ];
            var obj = new cObject;
            obj.setBegin(priceStr,data,0);  //0=en 1=th
            //            obj.fields = obj.fields.substring(1);
            
            priceStr.setSkin("dhx_skyblue");
            priceStr.setImagePath("../common/imgs/");
            priceStr.imgURL = "../../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            priceStr.enableAutoWidth(true);
            priceStr.init();
            //            priceStr.enableSmartRendering(true);
            priceStr.attachEvent("onXLS", function(grid_obj){
                document.getElementById("loaderImage").style.display = "block";
            }); 
            //            alert(obj.fields);
            //            
            priceStr.enableHeaderMenu();
            priceStr.enableAutoSaving("priceReadOnlyPlan");
            priceStr.enableAutoSizeSaving();
            priceStr.loadSizeFromCookie("priceReadOnlyPlan");
            
            
        </script>
    </body>
</html>