<?php
//include("load/loadMulti/parameter.php");
//
//$json_a = json_decode($json, true);        //(default 'false')When 'true', returned objects will be converted into associative arrays.
////print $json_a;
//if (is_array($json_a)) {
//    foreach ($json_a as $person_name => $person_a) {
//        $table = (EMPTY($person_a["table"])) ? "0" : $person_a["table"];
//        $class = (EMPTY($person_a["class"])) ? "0" : $person_a["class"];
//        $type = (EMPTY($person_a["type"])) ? "0" : $person_a["type"];
//        echo $person_name . " : " . $person_a["col"] . " : " . $table . " : " . $class . " : " . $type . "<br>";
////    echo $person_a['status'];
//    }
//}
?>
<html>
    <head>
        <title>== Change Content ==</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            .error {background-color: #ffd4db !important;color:maroon !important;}

            .columnClass {top:50%;}
            /*div.dhxlist_base {height:27px;}*/
            div.dhxform_base {height:27px;}
            div.fs_item_label_left {
                margin-left: -1px;
                margin-top: -1px;
            }
            .setValue{ margin-left:10px;}
        </style>

        <script>_css_prefix = "../DHX/dhtmlxGrid/codebase/";
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
        <script src="../DHX/dhtmlxForm3.6/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxForm3.6/codebase/dhtmlxform.js"></script>
        <script src="../DHX/dhtmlxForm3.6/codebase/ext/dhtmlxform_item_combo.js"></script>
        <script src="../DHX/dhtmlxForm3.6/codebase/ext/dhtmlxform_dyn.js"></script>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm3.6/codebase/skins/dhtmlxform_dhx_skyblue.css"/>

        <!-- external -->
        <script type="text/javascript" src="../commons/js/fnMainObj_DHX1.0.js"></script>
    </head>

    <body>
        <div id="gridMain" style="width:968px; height:80%; background-color:white;overflow:hidden"></div>
        <div id="catControl" style="width:100%; height:20%; background-color:white;overflow:hidden;margin-top:0em;" ></div>
        <!--<div id="menuBar" style="float:left; width:700px; height:10%; position:absolute; top: 79.3%; left: 60.3%; "></div>-->
        <script>
            sesLanguage = "English";
            var catControlData,catControlForm;                                  //Class,Type,Group
            var gridMainSet,gridMain,gridMainObj;                               //gridMain
            var menuFormData,menuForm;                                          //Button
            //################################################################################
            //                                                                              ##
            //                                                                              ##
            //                          FUNCTION HANDLING                                   ##
            //                                                                              ##
            //                                                                              ##
            //################################################################################
            function changeColumn(id,value){
                if(id == "column"){
                    var gCol = value.split(":")[0];
                    var gTB = value.split(":")[1];
                    var gClass = value.split(":")[2];
                    var gType = value.split(":")[3];
                    var gFieldName = value.split(":")[4];
                    
                    var fieldsAll = gridMainObj.fields.split(",");
                    var setGridIdxColumn = "";
                    for(var f=0;f<fieldsAll.length;f++){
                        if(gCol == fieldsAll[f]){
                            //alert("Find Column: "+f);
                            setGridIdxColumn = f;
                            f = fieldsAll.length;       //End Loop cause 'find column'
                        }
                    }
                    if(gTB == "0"){
                        //                        alert("input");
                        gridMain.setColumnHidden(setGridIdxColumn,false);
                        //----- Not find 'Table'
                        catControlForm.setItemValue("input1", "");
                        catControlForm.hideItem("selOptionValue");
                        catControlForm.showItem("input1");
                    
                    }else{
                        //                        alert("selectOption");
                        gridMain.setColumnHidden(setGridIdxColumn,false);
                        //----- Find 'Table'
                        catControlForm.setItemValue("input1", "");
                        catControlForm.hideItem("input1");
                        catControlForm.showItem("selOptionValue");
                        catControlForm.reloadOptions("selOptionValue", "load/loadFormValue.php?tb="+gTB+"&class="+gClass+"&type="+gType+"&fieldName="+gFieldName);
                    }
                }
            }
            

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
                {type: "fieldset",  name: "fsColumn", label: "Select Column", width:485, 
                    list:[
                        {type:"select",className:"columnClass",name:"column",label:"Column",value:"",connector:"load/loadFormColumns.php"},
                    ]
                },
                {type:"newcolumn",offset:0},
                {type: "fieldset",  name: "fsValue", label: "Set Value", width:325, 
                    list:[
                        {type:"select",className:"setValue",name:"selOptionValue",label:"value",value:""},
                        {type:"input",className:"setValue",name:"input1",label:"value",value:"222",inputWidth:"150"}
                    ]
                },
                {type:"newcolumn",offset:0},
                {type: "fieldset",  name: "fsControl", label: "Control", width:141, 
                    list:[
                        {type: "button", name: "save", value: "Process"}
                    ]
                }
            ];
            catControlForm = new dhtmlXForm("catControl",catControlData);
            catControlForm.attachEvent("onChange",changeColumn);
            catControlForm.attachEvent("onButtonClick",function (menu) {
                if(menu=="save"){
                    if(gridMain.getCheckedRows(0) == ""){
                        alert("Select product(s)...PLEASE!!!");
                        
                    }else{
                        if(catControlForm.isItemHidden("input1") == true && catControlForm.isItemHidden("selOptionValue") == true){
                            //Hidden Both
                            alert("Select Column...PLEASE!!!");
                            catControlForm.setItemFocus("column");
                            
                        }else{
                            var setGridValue = "";
                            if(catControlForm.isItemHidden("input1") == true){
                                //Hide input
                                setGridValue = catControlForm.getItemValue("selOptionValue");
                                //                                alert(setGridValue);
                            }else{
                                //Hide selectOption
                                setGridValue = catControlForm.getItemValue("input1");
                            }
                            //                            alert(catControlForm.getItemValue("column").split(":")[0]);
                            var fieldsAll = gridMainObj.fields.split(",");
                            var setGridIdxColumn = "";
                            var getFormColumn = catControlForm.getItemValue("column").split(":")[0];
                            for(var f=0;f<fieldsAll.length;f++){
                                if(getFormColumn == fieldsAll[f]){
                                    //alert("Find Column: "+f);
                                    setGridIdxColumn = f;
                                    f = fieldsAll.length;       //End Loop cause 'find column'
                                }
                            }
                            if(setGridIdxColumn == ""){
                                alert("Don't have column   ' "+getFormColumn+" '   in GRID...!!!");
                            }else{
                                //                                alert("Column @ "+setGridIdxColumn);
                                var checkedGrid = gridMain.getCheckedRows(0).split(",");
                                if(confirm("Change ' "+checkedGrid.length+" Product(s) ' ...?") == true){
                                    for(var i=0;i<checkedGrid.length;i++){
                                        gridMain.cells(checkedGrid[i],setGridIdxColumn).setValue(setGridValue); 
                                    }
                                    myDP.sendData();
                                    gridMain.uncheckAll();
                                }
                            }
                        }//Select Column
                    }//Click Product(s)
                }//save
            });
            
            catControlForm.hideItem("selOptionValue");
            catControlForm.hideItem("input1");
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
                {fields:'barcode',aligns:'center',widths:'100',types:'ro',hides:false,enNames:'Barcode',thNames:'บาร์โค้ด'},
                {fields:'description',aligns:'left',widths:'200',types:'ro',hides:false,enNames:'Description',thNames:'รายละเอียด'},
                {fields:'class',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Class',thNames:'คลาส',filter:"#select_filter"},
                {fields:'type',aligns:'center',widths:'120',types:'ro',hides:false,enNames:'Type',thNames:'ชนิด',filter:"#select_filter"},
                {fields:'gGroup',aligns:'center',widths:'120',types:'ro',hides:false,enNames:'Group',thNames:'กรุ๊ป',filter:"#select_filter"},
                {fields:'unitLength',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Unit Length',thNames:'หน่วยความยาว'},
                {fields:'unitThinkness',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Unit Thinkness',thNames:'หน่วยความหนา'},
                {fields:'unitVolume',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Unit Volume',thNames:'หน่วยปริมาตร'},
                {fields:'unitArea',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Unit Area',thNames:'หน่วยพื้นผิว'},
                {fields:'unitWD',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Unit Wide-Diameter',thNames:'หน่วยความกว้าง'},
                {fields:'unitHeight',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Unit Height',thNames:'หน่วยความสูง'},
                {fields:'unitWeight',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Unit Weight',thNames:'หน่วยน้ำหนัก'},
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
            myDP = new dataProcessor("update/connectorDB_Multi.php?fields="+gridMainObj.fields);//lock feed url
            myDP.init(gridMain);
            myDP.setUpdateMode("off");
            gridMain.loadXML("load/loadGridItem.php?fields="+gridMainObj.fields+"&typeP=item");

            
            //--------------- AFTER UPDATE
            //####################################################################################
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid){
                //                alert0(action);
            });
            
            
        </script>
    </body>
</html>