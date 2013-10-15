<?php
require("../../commons/PHP/session.php");
?>
<html>
    <head>
        <title>List View</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
        <script src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_combo.js" type="text/javascript"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>
        <script src="../../DHX/dhtmlxTreeGrid/codebase/dhtmlxtreegrid.js"></script>
        <script src="../../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_filter.js"></script>
        <script src="../../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_lines.js"></script>
        <!-- dhtmlxForm -->
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css"/>
        <script src="../../DHX/dhtmlxForm/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
        <script src="../../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_combo.js"></script>

        <script src="../../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
         <!--<script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>-->
        <script src="../../DHX/dhtmlxConnector/codebase/connector.js"></script>

        <script language="JavaScript" src="../../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script src="../../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>
        <script src="../../commons/js/fnMainObj_DHX1.0.js" type="text/javascript"></script>
        <script src="js/fnDateObj.js" type="text/javascript"></script>

    </head>
    <body>

        <div id="left" width="100%" height="70%" style="float:left;"></div>
        <div id="addressForm" style="width:49%;height:100%;float:right;display:none;"></div>
        <!--<div id="right" width="48%" height="85%" style="float:right;"></div>-->
        <!--<div id="clearfix" class="clearfix" style="clear:both;"></div>-->
        <script>
            
            menu = new dhtmlXMenuObject("menuObj");
            menu.setIconsPath("../../DHX/dhtmlxMenu/samples/common/imgD/");
            menu.renderAsContextMenu();
            menu.attachEvent("onClick", onButtonClick);   
            menu.loadXML("XML/warehouseMenu.xml");
            menu.attachEvent("onBeforeContextMenu", function(zoneId){
                if(zoneId=="menu_context_id"){
                    disableAllMenu();
                    disableMenu("editAdd");
                    disableMenu("delete");
                    //                    disableMenu("save");
                    enableMenu("insertWarehouse");
                }
                return true;
            });
            function disableMenu(id){
                if(menu.isItemEnabled(id)){
                    menu.setItemDisabled(id);
                }
            }
            function enableMenu(id){
                if(!menu.isItemEnabled(id)){
                    menu.setItemEnabled(id);
                }
            }
            function disableAllMenu(){
                enableMenu("editAdd");
                enableMenu('delete');
                enableMenu("save");
                menu.forEachItem(function(itemId){
                    if(itemId!="editAdd"&&itemId!="delete"&&itemId!="save"&&itemId!="insert"){
                        disableMenu(itemId); 
                    }
                });
            }
            lGrid = new dhtmlXGridObject("left");
            var data = [
                //                {fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'rowId',thNames:'rowId'},
                {fields:'id',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'id',thNames:'id'},
                //                {fields:'parentId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'parentId',thNames:'parentId'},
                //                {fields:'refId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'refId',thNames:'refId'},
                {fields:'name',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'name',thNames:'name'},
                {fields:'type',aligns:'left',widths:'50',types:'tree',hides:false,enNames:'type',thNames:'type'},
                {fields:'description',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'description',thNames:'description'},
                {fields:'width',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'width',thNames:'width'},
                {fields:'height',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'height',thNames:'height'},
                {fields:'length',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'length',thNames:'length'},
                {fields:'bearing',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'bearing',thNames:'bearing'},
                {fields:'addressId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'addressId',thNames:'addressId'},
                {fields:'loginCompanyId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'loginCompanyId',thNames:'loginCompanyId'},
                {fields:'loginUserId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'loginUserId',thNames:'loginUserId'},
                {fields:'createDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'createDate',thNames:'createDate'}];
            var obj = new cObject;
            obj.setBegin(lGrid,data,sesLanguage);  //0=en 1=th
            lGrid.setSkin("dhx_skyblue");
            lGrid.setImagePath("../../common/imgs/");
            lGrid.imgURL = "../../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            lGrid.init();
            lGrid.loadXML("PHP/warehouseLoad.php?fields="+obj.fields,function(){
                if (!lGrid.getRowsNum()) {
                    lGrid.entBox.id="menu_context_id";
                    menu.addContextZone("menu_context_id");
                }else{
                    lGrid.enableContextMenu(menu);
                    lGrid.expandAll();
                }
            });
            lGrid.enableHeaderMenu();
            lGrid.enableAutoSaving("warehouse");
            lGrid.enableAutoSizeSaving();
            lGrid.loadSizeFromCookie("warehouse");
            lGrid.attachEvent("onBeforeContextMenu", function(id,ind,objj){
                disableAllMenu();
                type = lGrid.cells(id,obj.type).getValue();
                //                alert(type);
                if(type=="warehouse"){
                    enableMenu("insert");
                    enableMenu("insertWarehouse");
                    enableMenu("insertSite");
                }else if(type=="site"){
                    enableMenu("insert");
                    enableMenu("insertLocation");
                }else if(type=="location"){
                    disableMenu("insert");
                }
                return true;
            });
            
            myDP = new dataProcessor("PHP/warehouseLoad.php?fields="+obj.fields);//lock feed url
            myDP.init(lGrid); //link dataprocessor to the grid
            myDP.setUpdateMode("off","");
            myDP.attachEvent("onBeforeUpdate",function(rId,status){
                return true;
            });
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag){
                //                alert(action);  
            });
            function onButtonClick(menuitemId, type) {
                rrId=type.split('_')[0];
                ccId=type.split('_')[1];
                if(menuitemId=="insertWarehouse"){
                    if(menu.isContextZone("menu_context_id")){
                        menu.removeContextZone("menu_context_id");
                        lGrid.enableContextMenu(menu);
                    }
                    var tmpId = lGrid.uid();
                    var date = new Date();
                    var time = date.getTime();
                    var newId = "war-"+time+"-"+sesUser;
                    lGrid.addRow(tmpId,"","",0);
                    lGrid.cells(tmpId,obj.id).setValue(newId);
                    //                    lGrid.cells(tmpId,obj.refId).setValue(sesCompanyId);
                    lGrid.cells(tmpId,obj.type).setValue("warehouse");
                    lGrid.cells(tmpId,obj.loginCompanyId).setValue(sesCompanyId);
                    lGrid.cells(tmpId,obj.loginUserId).setValue(sesUserId);
                    lGrid.selectRowById(tmpId,false,true,true);
                }else if(menuitemId=="insertSite"){
                    alert0(lGrid.cells(rrId,obj.type).getValue());
                    if(lGrid.cells(rrId,obj.type).getValue()=="warehouse"){
                        var tmpId = lGrid.uid();
                        var date = new Date();
                        var time = date.getTime();
                        var newId = "war-"+time+"-"+sesUser;
                        lGrid.addRow(tmpId,"","",rrId);
                        lGrid.cells(tmpId,obj.id).setValue(newId);
                        //                        lGrid.cells(tmpId,obj.refId).setValue(sesCompanyId);
                        lGrid.cells(tmpId,obj.type).setValue("site");
                        lGrid.cells(tmpId,obj.loginCompanyId).setValue(sesCompanyId);
                        lGrid.cells(tmpId,obj.loginUserId).setValue(sesUserId);
                        lGrid.selectRowById(tmpId,false,true,true);
                    }else{
                        //                        alert0("Warehouse > Site");
                    }
                }else if(menuitemId=="insertLocation"){
                    var tmpId = lGrid.uid();
                    var date = new Date();
                    var time = date.getTime();
                    var newId = "war-"+time+"-"+sesUser;
                    lGrid.addRow(tmpId,"","",rrId);
                    lGrid.cells(tmpId,obj.id).setValue(newId);
                    //                    lGrid.cells(tmpId,obj.refId).setValue(sesCompanyId);
                    lGrid.cells(tmpId,obj.type).setValue("location");
                    lGrid.cells(tmpId,obj.loginCompanyId).setValue(sesCompanyId);
                    lGrid.cells(tmpId,obj.loginUserId).setValue(sesUserId);
                    lGrid.selectRowById(tmpId,false,true,true);
                }else if(menuitemId=="editAdd"){
                    editAddressWindows(rrId,lGrid.cells(rrId,obj.addressId).getValue());
                }else if(menuitemId=="delete"){
                    if(confirm("Delete?")){
                        if(lGrid.hasChildren(rrId)==0){
                            lGrid.deleteRow(rrId);
                            if (!lGrid.getRowsNum()) {
                                lGrid.entBox.id="menu_context_id";
                                menu.addContextZone("menu_context_id");
                            }else{
                                lGrid.enableContextMenu(menu);
                                lGrid.expandAll();
                            }
                        }else{
                            alert0("Have to remove children first.");
                        }
                    }else{
                        
                    }
                }else if(menuitemId=="save"){
                    myDP.sendData();
                }
                lGrid.expandAll();
            }
            function editAddressWindows(rowId,pId){
                // Form
                var addFormData = [  	
                    {types:"fieldset",fields:"",keys:"place",enLabels:"Place",thLabels:"สถานที่"},
                    {types:"input",fields:"id",keys:"aId",enLabels:"id",thLabels:"ไอดี"},
                    {types:"input",fields:"addressType",keys:"addtype",enLabels:"addressType",thLabels:"ประเภท"},
                    {types:"input",fields:"placeName",keys:"pla",enLabels:"PlaceName",thLabels:"ชื่อสถานที่ตั้ง"},				
                    {types:"input",fields:"groupName",keys:"gro",enLabels:"GroupName",thLabels:"สถานที่"},
                    //------------------------===================================================================================================== 
                    {types:"fieldset",fields:"",keys:"detail",enLabels:"AddressDetail",thLabels:"รายละเอียด"},
                    {types:"input",fields:"building",keys:"bui",enLabels:"Building",thLabels:"ตึก"},
                    {types:"input",fields:"mooban",keys:"moob",enLabels:"Mooban",thLabels:"หมู่บ้าน"},
                    {types:"input",fields:"no",keys:"no",enLabels:"No.",thLabels:"เลขที่"},
                    //------------------------============================================================================================
                    {types:"fieldset",fields:"",keys:"",enLabels:"",thLabels:""},				
                    {types:"input",fields:"moo",keys:"moo",enLabels:"Moo",thLabels:"หมู่ที่"},
                    {types:"input",fields:"floor",keys:"flo",enLabels:"Floor",thLabels:"ชั้น"},
                    {types:"input",fields:"road",keys:"roa",enLabels:"Road",thLabels:"ถนน"},
                    //--------------------------=========================================================================================
                    {types:"fieldset",fields:"",keys:"",enLabels:"",thLabels:""},				
                    {types:"input",fields:"soi",keys:"soi",enLabels:"Soi",thLabels:"ซอย"},
                    {types:"input",fields:"tumbol",keys:"tum",enLabels:"Tumbol",thLabels:"ตำบล/แขวง"},
                    {types:"input",fields:"amphur",keys:"amp",enLabels:"Amphur",thLabels:"อำเภอ/เขต"},
                    //--------------------------=========================================================================================
                    {types:"fieldset",fields:"",keys:"",enLabels:"",thLabels:""},
                    {types:"input",fields:"province",keys:"pro",enLabels:"",thLabels:"จังหวัด"},
                    {types:"input",fields:"zipcode",keys:"zi",enLabels:"ZIP",thLabels:"รหัสไปรษณีย์"},
                    //--------------------------==========================================================================================
                    {types:"fieldset",fields:"",keys:"tor",enLabels:"",thLabels:"ติดต่อ"},
                    {types:"input",fields:"telephone",keys:"tel",enLabels:"Telephone",thLabels:"โทรศัพท์"},
                    {types:"input",fields:"mobile",keys:"mobi",enLabels:"Mobile",thLabels:"มือถือ"},
                    {types:"input",fields:"fax",keys:"fax",enLabels:"Fax",thLabels:"แฟกซ์"},
                    //---------------------------------------------------------------------------
                    {types:"fieldset",fields:"",keys:"allDet",enLabels:"",thLabels:"ข้อมูลที่อยู่รวม"},               
                    {types:"input",fields:"address_all",keys:"addrall",enLabels:"Detail",thLabels:"รายละเอียด"},
                    //-------------------------------------------------------button 
                    {types:"fieldset",fields:"",keys:"add",enLabels:"InsertData",thLabels:"เพิ่มข้อมูล"},
                    {types:"button",fields:"insert",keys:"inser",enLabels:"Insert",thLabels:"บันทึก"}]; 
                //------------------------------------------------------------------       
                dhtmlx.skin = "dhx_skyblue";
                window.dhx_globalImgPath = "../DHX/dhtmlxCombo/codebase/imgs/";               
                addData = [
                    {type: "fieldset",label: "place",inputWidth: 700,
                        list: [{type: "newcolumn"},
                            //                    { type:type_Form,name:"",labelLeft:"50",inputWidth: 100,label: "addtype",connector: "connectDB/load_Update/partneroption.php?"+para_addtypeE},
                            {type: "newcolumn"},{  type: "input",inputWidth: 200,value:"",name:"",label: "pla"},                        
                            {type: "newcolumn"},{  type: "input",inputWidth: 150 ,value:"",name:"",label: "gro"}]},
                    //-----------------------------------------------------------------------------------------------
                    {type: "fieldset",label: "detail",inputWidth: 700,offsetLeft:0,
                        list: [{type: "newcolumn"},{ type: "input",name:"",labelLeft:"50",label: "bui",value:""},
                            {type: "newcolumn"},{ type: "input",name:"",labelLeft:"50",label: "moob",value:""},
                            {type: "newcolumn"},{ type: "input",name:"",labelLeft:"50",label: "no",value:""}]},
                    //-------------------------------------------------------------------------------------------------
                    {type: "fieldset",label: "detail",inputWidth: 700,offsetLeft:0,
                        list: [{type: "newcolumn"},{ type: "input",name:"",labelLeft:"50",label: "moo",value:""},
                            {type: "newcolumn"},{ type: "input",name:"",labelLeft:"50",label: "flo",value:""},
                            {type: "newcolumn"},{ type: "input",name:"",labelLeft:"50",label: "roa",value:""}]},	
                    //-----------------------------------------------------------------------------------------------
                    {type: "fieldset",label: "detail",inputWidth: 700,offsetLeft:0,
                        list: [{type: "newcolumn"},{ type: "input",name:"",labelLeft:"50",label: "soi",value:""},
                            {type: "newcolumn"},{ type:  "input",inputWidth:100,name:"",labelLeft:"50",label: "tum",value:""},
                            {type: "newcolumn"},{ type: "input",inputWidth:100,name:"",labelLeft:"50",label: "amp",value:""}]},	
                    //------------------------------------------------------------------------------------------------
                    {type: "fieldset",label: "detail",inputWidth: 700,offsetLeft:0,
                        list: [{type: "newcolumn"},{ type: "input",name:"",inputWidth:100,labelLeft:"50",label: "pro",value:""},
                            {type: "newcolumn"},{ type: "input",name:"",labelLeft:"50",label: "zi",value:""}]},	
                    //--------------------------------------------------------------------------------------------------	
                    {type: "fieldset",label: "tor",inputWidth: 700,
                        list: [{type: "newcolumn"},{ type: "input",name:"",value:"",label: "tel"},
                            {type: "newcolumn"},{ type: "input",name:"",label: "mobi",value:""},                
                            {type: "newcolumn"},{ type: "input",name:"",label: "fax",value:""}]},                
                    //===================================================================================
                    {type: "fieldset",label: "allDet",inputWidth: 700,
                        list: [{type: "newcolumn"},{ type: "input",name:"",rows:3,value:"",inputWidth:500,label: "addrall"},
                            { type: "hidden",name:"",label:"aId",value:""},{type:"hidden",name:"",label:"addtype",value:"warehouse"}]},
                    //=================================================================================================
                    {type: "fieldset",label: "add",inputWidth: "auto",
                        list: [{type: "newcolumn"},{ type:"button" ,name:"",label:"inser",value:"",inputLeft:"290"}]},
                ];

                //---------------------------------------------------------end form
                var fO = new fObject;
                fO.setBeginForm(addFormData,addData,"thaiName");
                var dhxWins= new dhtmlXWindows();
                dhxWins.setImagePath("../../DHX/dhtmlxWindows/codebase/imgs");
                var addressWindows = dhxWins.createWindow("addressWin",90, 90, 400,400);
                var addrForm = addressWindows.attachForm(addData);
                if(pId==""){
                    var date = new Date();
                    var time = date.getTime();
                    var newAddId = "add-"+time+"-"+sesUser;
                }else{
                    //                    alert(pId);
                    var newAddId = pId;
                    dhtmlxAjax.get("../customer/PHP/ajax/getRowAddressId.php?getId="+pId,function(loader){
                        addressId = loader.xmlDoc.responseText;
                        alert(addressId);
                        addrForm.load("PHP/addressLoad.php?dhxType=form&fields="+fO.fields+"&id="+addressId);
                    
                    });
                }
                addrForm.attachEvent("onChange", function (id, value){
                    var addrAll = "";
                    if(id != "address_all"){
                        //                    
                        addrForm.forEachItem(function(id){
                            if(addrForm.getItemType(id) == "input" && id != "address_all"){
                                if(addrForm.getItemValue(id) != null && addrForm.getItemValue(id) != ""  ){
                                    addrAll += addrForm.getItemLabel(id)+" "+addrForm.getItemValue(id)+" ";
                                }
                            }
                        });
                        addrForm.setItemValue("address_all",addrAll);
                    }
                });
                addrForm.attachEvent("onButtonClick",function(id){
                    if(id=="insert"){
                        addrForm.setItemValue("id",newAddId);
                        addrForm.save();
                    }
                });
                formDP = new dataProcessor("PHP/addressLoad.php?dhxType=form&fields="+fO.fields);//lock feed url
                formDP.enableDataNames(true); //will use names instead of indexes
                formDP.init(addrForm); //link dataprocessor to the grid
                formDP.attachEvent("onAfterUpdate", function(sid, action, tid){
                    //alert("sid : "+sid);
                    alert0(action);
                    lGrid.cells(rowId,obj.addressId).setValue(newAddId);
                    myDP.setUpdated(rowId,true);
                    myDP.sendData();
                });
            }
        </script>
    </body>
</html>