<?php
require("PHP/session.php");
echo "<script>";
echo "var priceStrId='" . $_REQUEST['priceStrId'] . "';";
echo "</script>";
?>
<html>
    <head>
        <title>PriceGroup</title>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />


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
                background:url(ajax-loader.gif) no-repeat;
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

        <script src="../DHX/dhtmlxLayout/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxLayout/codebase/dhtmlxlayout.js"></script>
        <script src="../DHX/dhtmlxLayout/codebase/dhtmlxcontainer.js"></script>

        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxcontainer.js"></script>
        <!--  dhtmlxTabbar -->
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxTabbar/codebase/dhtmlxtabbar.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxTabbar/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxTabbar/codebase/dhtmlxtabbar.js"></script>
        <!--<script type="text/javascript" src="../../DHX/dhtmlxTabbar/codebase/dhtmlxcontainer.js"></script>-->

        <script src="../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
        <script src="../DHX/dhtmlxAccordion/codebase/dhtmlxcommon.js"></script>

        <script src="../DHX/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_link.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_filter.js"></script>	
        <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_srnd.js"></script>	
        <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_undo.js"></script>	
        <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_group.js"></script>
        <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_drag.js"></script>
        <script  src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_hmenu.js"></script>
        <script  src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script  src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_mcol.js"></script>
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
        <script src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>
        <script language="JavaScript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>
        <script src="js/fnMainObj_DHX.js" type="text/javascript"></script>
        <script src="js/fnDateObj.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="catControl" width="100%" height="10%" style="background-color:white;overflow:hidden;margin-bottom:5px;"></div>
        <div id="gridbox" width="100%" height="80%" style="background-color:white;overflow:hidden">

        </div>
        <div id="loaderImage"></div>

        <div id="tab1" width="100%" height="80%" style="background-color:white;overflow:hidden"></div>
        <div id="tab2" width="100%" height="80%" style="background-color:white;overflow:hidden">
            <div id="addCatControl" width="100%" height="10%" style="background-color:white;overflow:hidden;margin-bottom:5px;"></div>
            <div id="addGrid" width="100%" height="50%" style="background-color:white;overflow:hidden"></div>
            <div id="addForm" width="700px" height="10%" style="float:left"></div>
        </div>
        <div id="menuBar" width="700px" height="10%" style="float:left"></div>
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
                console.dir(catForm);
                
                dhxWins = new dhtmlXWindows();
                dhxWins.setImagePath("../DHX/dhtmlxWindows/codebase/imgs/");
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
                CTGGrid.setImagePath("../common/imgs/");
                CTGGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
                CTGGrid.enableAutoWidth(true);
                CTGGrid.init();
                CTGGrid.loadXML("PHP/loadCTG.php?fields="+ctgObj.fields+"&priceStrId="+priceStrId);
                CTGGrid.attachEvent("onRowSelect",function(id,ind){
                    catForm.setItemValue("Class", this.cells(id,0).getValue());
                    catForm.setItemValue("Type", this.cells(id,1).getValue());
                    catForm.setItemValue("Group", this.cells(id,2).getValue());
                    var loaderStr = "PHP/priceLoad.php?fields="+obj.fields+"&priceStrId="+priceStrId+"&group="+this.cells(id,2).getValue()+"&class="+this.cells(id,0).getValue()+"&type="+this.cells(id,1).getValue();
                    console.log(loaderStr);
                    priceStr.clearAndLoad(loaderStr,function(){
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
                {fields:"''",aligns:'left',widths:'50',types:'ch',hides:true,enNames:'',thNames:''},
                //                {fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'rowId',thNames:'rowId'},
                {fields:'id',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'id',thNames:'id'},
                {fields:'priceStrId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'priceStrId',thNames:'priceStrId'},
                {fields:'productStrId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'productStrId',thNames:'productStrId'},
                {fields:'cost',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'cost',thNames:'cost'},
                {fields:'price0',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'price0',thNames:'price0'},
                {fields:'inPrice',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'inPrice',thNames:'inPrice'},
                {fields:'exPrice',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'exPrice',thNames:'exPrice'},
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
            priceStr.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            priceStr.enableAutoWidth(true);
            priceStr.init();
            //            priceStr.enableSmartRendering(true);
            priceStr.attachEvent("onXLS", function(grid_obj){
                document.getElementById("loaderImage").style.display = "block";
            }); 
            //            alert(obj.fields);
            //            
            priceStr.enableHeaderMenu();
            priceStr.enableAutoSaving("pricePlan");
            priceStr.enableAutoSizeSaving();
            priceStr.loadSizeFromCookie("pricePlan");
            
            myDP = new dataProcessor("PHP/priceLoad.php?fields="+obj.fields+"&priceStrId="+priceStrId+"&group=&class=&type=");//lock feed url
            myDP.enableDataNames(true);
            myDP.init(priceStr); //link dataprocessor to the grid
            myDP.setUpdateMode("off","");
            myDP.attachEvent("onBeforeUpdate",function(id,status){
                //                alert(id+status);
                return true;
            });
            myDP.attachEvent("onRowMark",function(id,state,mode,is_invalid){
                if(state==true){
                    catForm.disableItem("selectCat");
                }else{
                    catForm.enableItem("selectCat");
                }
                return true;
            })
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag){
                //                alert(action);  
            });
            var formData = [
                {type: "fieldset",  name: "mydata", label: "Control", width:500, list:[
                        //                        {type: "newcolumn"}, {type: "button", name: "selectAll", value: "Select All"},
                        //                        {type: "newcolumn"}, {type: "button", name: "deselectAll", value: "Deselect All"},
                        {type: "newcolumn"}, {type: "button", name: "save", value: "Save Changes"},
                        {type: "newcolumn"}, {type: "button", name: "add", value: "Add Price(s)"},
                        {type: "newcolumn"}, {type: "button", name: "apply", value: "Apply Function",disabled:true},
                        {type: "newcolumn"}]}
            ];
            var myForm = new dhtmlXForm("menuBar",formData);
            myForm.attachEvent("onButtonClick", onButtonClick);
            function onButtonClick(menuitemId) {
                if(menuitemId=="selectAll"){
                    //                    priceStr.forEachRow(function(id){
                    //                        if(!this.cells(id,0).isChecked()){
                    //                            this.cells(id,0).setValue(1);
                    //                        } 
                    //                    });
                }else if(menuitemId=="deselectAll"){
                    //                    priceStr.forEachRow(function(id){
                    //                        if(this.cells(id,0).isChecked()){
                    //                            this.cells(id,0).setValue(0);
                    //                        } 
                    //                    });
                }else if(menuitemId=="save"){
                    myDP.sendData();
                }else if(menuitemId=="add"){
                    dhxWins = new dhtmlXWindows();
                    dhxWins.setImagePath("../DHX/dhtmlxWindows/codebase/imgs/");
                    w1 = dhxWins.createWindow("w1", 0, 0, 800, 600);
                    w1.setText("Add Price(s) Tab.");
                    tabbar = w1.attachTabbar();
                    tabbar.setSkin("dhx_skyblue");
                    tabbar.setImagePath("../DHX/dhtmlxTabbar/codebase/imgs/"); 
                    tabbar.addTab("a1", "Select PriceStr", "160px"); 
                    tabbar.addTab("a2", "Select Price", "160px");
                    tabbar.setTabActive("a1");
                    tabbar.disableTab("a2");
                    tabbar.setContent("a1","tab1");
                    console.trace();
                    priceStrTab = new dhtmlXGridObject("tab1");
                    var dataTab =[{fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'Row ID',thNames:'Row ID'},
                        {fields:'id',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'ID',thNames:'ID'},
                        {fields:'pricestr_en_nm',aligns:'left',widths:'500',types:'ro',hides:false,enNames:'PriceStructure Name',thNames:'PriceStructure Name'},
                        {fields:'pricestr_type',aligns:'left',widths:'100',types:'ro',hides:true,enNames:'Type',thNames:'Type'},
                        {fields:'startDate',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'Start Date',thNames:'Start Date'},
                        {fields:'validUntil',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'Valid Until',thNames:'Valid Until'},
                        {fields:'active',aligns:'left',widths:'100',types:'ch',hides:false,enNames:'Status',thNames:'Status'},
                        {fields:'description',aligns:'left',widths:'200',types:'ro',hides:false,enNames:'Description',thNames:'Description'}];
                    var objTab = new cObject;
                    objTab.setBegin(priceStrTab,dataTab,0);  //0=en 1=th
                    //            moduleGrid.attachHeader(",#select_filter,#select_filter,,,#select_filter,,,");
                    priceStrTab.setColSorting(",str,str,str");
                    priceStrTab.setSkin("dhx_skyblue");
                    priceStrTab.setImagePath("../common/imgs/");
                    priceStrTab.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
                    priceStrTab.enableAutoWidth(true);
                    priceStrTab.init();
                    priceStrTab.loadXML("PHP/priceTabLoad.php?fields="+objTab.fields+"&priceStrId="+priceStrId);
                    priceStrTab.attachEvent("onRowSelect",function(id,ind){
                        var pStrId = priceStrTab.cells(id,objTab.id).getValue();
                        tabbar.setTabActive("a2");
                        tabbar.disableTab("a1");
                        tabbar.setContent("a2","tab2");
                        addPricePanel(pStrId);
                    });
                }else if(menuitemId=="apply"){
                    
                }else{
                    alert0("Under Construction...");
                }
            }
            function addPricePanel(priceSId){
                //////////////////////////////Add Category Control//////////////////
                var catControlData = [
                    {type: "fieldset",  name: "mydata", label: "Category Control", width:800, list:[
                            {type:"newcolumn",offset:0},{type:"input",name:"Class",label:"Class",value:"",readonly:true},
                            {type:"newcolumn",offset:0},{type:"input",name:"Type",label:"Type",value:"",readonly:true},
                            {type:"newcolumn",offset:0},{type:"input",name:"Group",label:"Group",value:"",readonly:true},
                            {type: "newcolumn"}, {type: "button", name: "selectCat", value: "Select Category"}
                        ]}
                ];
                var addCatForm = new dhtmlXForm("addCatControl",catControlData);
                addCatForm.attachEvent("onChange", function (id, value){
                    alert(id+value);
                });
                addCatForm.attachEvent("onButtonClick", function(menuitemId){
                    dhxWins = new dhtmlXWindows();
                    dhxWins.setImagePath("../DHX/dhtmlxWindows/codebase/imgs/");
                    w3 = dhxWins.createWindow("w3", 0, 0, 500, 300);
                    w3.setText("Select Class/Type/Group");
                    var addCTGGrid = dhxWins.window("w3").attachGrid();;
                    var CTGdata =[
                        {fields:'class',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'Class',thNames:'Class'},
                        {fields:'type',aligns:'left',widths:'200',types:'ro',hides:false,enNames:'Type',thNames:'Type'},
                        {fields:'gGroup',aligns:'left',widths:'200',types:'ro',hides:false,enNames:'Group',thNames:'Group'}
                    ];
                    var ctgObj = new cObject;
                    ctgObj.setBegin(addCTGGrid,CTGdata,sesLanguage);  //0=en 1=th
                    addCTGGrid.setSkin("dhx_skyblue");
                    addCTGGrid.setImagePath("../common/imgs/");
                    addCTGGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
                    addCTGGrid.enableAutoWidth(true);
                    addCTGGrid.init();
                    addCTGGrid.loadXML("PHP/loadCTG.php?fields="+ctgObj.fields+"&priceStrId="+priceSId);
                    addCTGGrid.attachEvent("onRowSelect",function(id,ind){
                        addCatForm.setItemValue("Class", this.cells(id,0).getValue());
                        addCatForm.setItemValue("Type", this.cells(id,1).getValue());
                        addCatForm.setItemValue("Group", this.cells(id,2).getValue());
                        catForm.setItemValue("Class", this.cells(id,0).getValue());
                        catForm.setItemValue("Type", this.cells(id,1).getValue());
                        catForm.setItemValue("Group", this.cells(id,2).getValue());
                        var loaderStr = "PHP/priceLoad.php?fields="+obj.fields+"&priceStrId="+priceStrId+"&group="+this.cells(id,2).getValue()+"&class="+this.cells(id,0).getValue()+"&type="+this.cells(id,1).getValue();
                        priceStr.clearAndLoad(loaderStr,function(){
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
                        var loaderStr = "PHP/priceLoad.php?fields="+obj.fields+"&priceStrId="+priceSId+"&group="+this.cells(id,2).getValue()+"&class="+this.cells(id,0).getValue()+"&type="+this.cells(id,1).getValue();
                        addPriceGrid.clearAndLoad(loaderStr,function(){
                            document.getElementById('loaderImage').style.display = "none";
                            //                        priceStr.sortRows(2,"str","asc");
                            addPriceGrid.forEachRow(function(id){
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
                addPriceGrid = new dhtmlXGridObject("addGrid");
                var addGridData = [
                    {fields:"''",aligns:'left',widths:'50',types:'ch',hides:false,enNames:'',thNames:''},
                    //                    {fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'rowId',thNames:'rowId'},
                    {fields:'id',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'id',thNames:'id'},
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
                var addPriceObj = new cObject;
                addPriceObj.setBegin(addPriceGrid,addGridData,sesLanguage);  //0=en 1=th
                addPriceGrid.setSkin("dhx_skyblue");
                addPriceGrid.setImagePath("../common/imgs/");
                addPriceGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
                addPriceGrid.enableAutoWidth(true);
                addPriceGrid.init();
            
                addPriceGrid.enableHeaderMenu();
                addPriceGrid.enableAutoSaving("pricePlan");
                addPriceGrid.enableAutoSizeSaving();
                addPriceGrid.loadSizeFromCookie("pricePlan");
                //            myDP = new dataProcessor("PHP/priceGroupLoad.php?fields="+obj.fields);//lock feed url
                //            myDP.init(priceStr); //link dataprocessor to the grid
                var addPriceFormData = [
                    {type: "fieldset",  name: "mydata", label: "Control", width:500, list:[
                            {type: "newcolumn"}, {type: "button", name: "selectAll", value: "Select All"},
                            {type: "newcolumn"}, {type: "button", name: "deselectAll", value: "Deselect All"},
                            {type: "newcolumn"}, {type: "button", name: "addPrice", value: "Add Price"}
                        ]}
                ];
                var addPriceForm = new dhtmlXForm("addForm",addPriceFormData);
                addPriceForm.attachEvent("onButtonClick", function(menuItemId){
                    if(menuItemId=="selectAll"){
                        addPriceGrid.forEachRow(function(id){
                            if(!this.cells(id,0).isChecked()){
                                this.cells(id,0).setValue(1);
                            } 
                        });
                    }else if(menuItemId=="deselectAll"){
                        addPriceGrid.forEachRow(function(id){
                            if(this.cells(id,0).isChecked()){
                                this.cells(id,0).setValue(0);
                            } 
                        });
                    }else if(menuItemId=="addPrice"){
                        var checked=addPriceGrid.getCheckedRows(0).split(',');
                        
                        console.log("Checked, "+checked);
                        var isDuplicate = false;
                        //Check Duplicated
                        for(var i=0;i<checked.length;i++){
                            var checkedId = addPriceGrid.cells(checked[i],addPriceObj.id).getValue();
                            console.log(checkedId);
                            priceStr.forEachRow(function(id){
                                if(priceStr.cells(id,obj.id).getValue()==checkedId){
                                    isDuplicate = true;
                                }
                            });
                            
                        }
                        if(isDuplicate){
                            alert("Duplicated Product(s)");
                        }else{
                            //                            alert("No duplicate, adding in process.");
                            for(var i=0;i<checked.length;i++){
                                var tmpData = new Array();
                                for(var j=0;j<priceStr.getColumnsNum();j++){
                                    tmpData[j] = addPriceGrid.cells(checked[i],j).getValue();
                                }
                                var date = new Date();
                                //                                tmpData[addPriceObj.rowId] = "";
                                tmpData[addPriceObj.priceStrId] = priceStrId;
                                tmpData[addPriceObj.id] = "prc-"+date.getTime()+"-"+sesUser;
                                tmpData[addPriceObj.loginUserId] = sesUserId;
                                tmpData[addPriceObj.loginCompanyId] = sesCompanyId;
                                tmpData[addPriceObj.editorId] = sesUser;
                                tmpData[addPriceObj.editDate] = date.getDate();
                                var tmpId = priceStr.uid();
                                priceStr.addRow(tmpId,tmpData,"");
                            }
                            
                        }
                    }
                });
            };
        </script>
    </body>
</html>