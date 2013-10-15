<?php ?>
<html>
    <head>
        <title>== Class,Type,Group ==</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            .error {background-color: #ffd4db !important;color:maroon !important;}

            .ctg {top:50%;}
            div.dhxlist_base {height:27px;}
            div.fs_item_label_left {
                margin-left: -1px;
                margin-top: -1px;
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
        <!-- dhtmlxDataProcessor -->
        <script type="text/javascript" src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>

        <!-- dhtmlxConnector -->
        <script type="text/javascript" src="../DHX/dhtmlxConnector/codebase/connector.js"></script>

        <!-- dhtmlxGrid -->
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css"/>
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_hmenu.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_drag.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_filter.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_srnd.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_link.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>

        <!-- Combo -->
        <script src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.css"/>

        <!-- Form -->
        <script  src="../DHX/dhtmlxForm/codebase/dhtmlxcommon.js"></script>
        <script  src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
        <script src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_combo.js"></script>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css"/>

        <!-- external -->
        <script type="text/javascript" src="../commons/js/fnMainObj_DHX1.0.js"></script>
    </head>

    <body >

        <div id="gridMain" style="width:968px; height:80%; background-color:white;overflow:hidden"></div>
        <div id="loaderImage"></div>
        <div id="catControl" style="width:100%; height:10%; background-color:white;overflow:hidden;margin-top:0em;" ></div>
        <!--<div id="menuBar" style="float:left; width:700px; height:10%; position:absolute; top: 79.3%; left: 60.3%; "></div>-->
        <script>
            sesLanguage = "English";
            var catControlData,catControlForm;                                  //Class,Type,Group
            var gridMainSet,gridMain,gridMainObj;                               //gridMain
            var menuFormData,menuForm;                                          //Button
            

            //################################################################################
            //                                                                              ##
            //                                                                              ##
            //                          OBJECT HANDLING                                     ##
            //                                                                              ##
            //                                                                              ##
            //################################################################################
            
            //###############################################################
            // Form (catControl)               
            //###############################################################
            catControlData = [
                {type: "fieldset",  name: "mydata", label: "Category Control", width:800, 
                    list:[
                        {type:"newcolumn",offset:0},
                        {type:"select",className:"ctg",name:"CTG",label:"Class - Type - Group",value:"",inputWidth:"300",connector:"load/changeCTG/loadCTG.php"},
            
                    ]
                },
                {type:"newcolumn",offset:0},
                {type: "fieldset",  name: "fsControl", label: "Control", width:141, 
                    list:[
                        {type: "button", name: "save", value: "Process"}
                    ]}
            ];
            catControlForm = new dhtmlXForm("catControl",catControlData);
            catControlForm.attachEvent("onButtonClick",function (menu) {
                if(menu=="save"){
                    var digitFields = gridMainObj.type;
                    if(gridMain.getCheckedRows(0) == ""){
                        alert("Select product(s)...PLEASE!!!");
                    }else{
                        var checked = gridMain.getCheckedRows(0).split(",");
                        var CTGarray = catControlForm.getItemValue("CTG").split("-");
                        if(confirm("Change ' "+checked.length+" Product(s) ' ...?") == true){
                            for(var i=0;i<checked.length;i++){
                                gridMain.cells(checked[i],digitFields-1).setValue(CTGarray[0]);
                                gridMain.cells(checked[i],digitFields).setValue(CTGarray[1]);
                                gridMain.cells(checked[i],digitFields+1).setValue(CTGarray[2]);
                            }
                            myDP.sendData();
                            gridMain.uncheckAll();
                        }
                    }
                }
            });
            
            //###############################################################
            // GRID (gridMain)                     
            //###############################################################
            gridMain = new dhtmlXGridObject('gridMain');
            gridMainSet =[
                {fields:'checkboxes',aligns:'left',widths:'40',types:'ch',hides:false,enNames:'Add',thNames:'เพิ่ม',filter:'#master_checkbox'},
                {fields:"englishName",aligns:'left',widths:'150',types:'ro',hides:false,enNames:'English Name',thNames:'ชื่ออังกฤษ'},
                {fields:'thaiName',aligns:'left',widths:'150',types:'ro',hides:false,enNames:'Thai Name',thNames:'ชื่อไทย'},
                {fields:'id',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'Id',thNames:'รหัส'},
                //                {fields:'itemId',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'itemId',thNames:'รหัสไอเทม'},
                {fields:'code',aligns:'center',widths:'100',types:'ro',hides:false,enNames:'Code',thNames:'รหัส',filter:"#text_filter"},
                //                //                {fields:'barcode',aligns:'center',widths:'100',types:'ro',hides:true,enNames:'Barcode',thNames:'บาร์โค้ด'},
                {fields:'description',aligns:'left',widths:'200',types:'ro',hides:false,enNames:'Description',thNames:'รายละเอียด'},
                {fields:'class',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Class',thNames:'คลาส',filter:"#select_filter"},
                {fields:'type',aligns:'center',widths:'120',types:'ro',hides:false,enNames:'Type',thNames:'ชนิด',filter:"#select_filter"},
                {fields:'gGroup',aligns:'center',widths:'120',types:'ro',hides:false,enNames:'Group',thNames:'กรุ๊ป',filter:"#select_filter"}
            ];
            gridMainObj = new cObject;
            gridMainObj.setBegin(gridMain,gridMainSet,sesLanguage);
            gridMain.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
            //            gridMain.setColumnIds(gridMainObj.fields);
            //            gridM.attachEvent("onEditCell",doOnEdit);
            gridMain.init();
            gridMain.enableSmartRendering(true,100);
            gridMain.enableHeaderMenu();                    //add file 'dhtmlxgrid_hmenu.js'
            //                itemGrid.loadSizeFromCookie();                  //add file 'ext/dhtmlxgrid_ssc.js'
            //                itemGrid.enableAutoSaving();
            //                itemGrid.enableAutoSizeSaving();


            //################################################################################
            //                                                                              ##
            //                                                                              ##
            //                          CONNECT DATABASE                                    ##
            //                                                                              ##
            //                                                                              ##
            //################################################################################
            
            //####################################################################################
            myDP = new dataProcessor("update/changeCTG/connectorDB_CTG.php?fields="+gridMainObj.fields);//lock feed url
            myDP.init(gridMain);
            myDP.setUpdateMode("off");
            gridMain.loadXML("load/changeCTG/loadItem.php?fields="+gridMainObj.fields+"&typeP=item");

            
            //--------------- AFTER UPDATE
            //####################################################################################
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid){
                alert0(action);
            });
        </script>
    </body>
</html>