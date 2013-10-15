<?php
require("../../commons/PHP/session.php");

echo "<script type='text/javascript'>";
//echo 'var partnerId ="' . $_GET["getId"] . '";';
echo "</script>";
?>

<html>
    <head>
        <title>Test</title>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />


        <!-- DHTMLX - GRID -->
        <link type="text/css" href="../../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css" rel="stylesheet"/>
        <link type="text/css" href="../../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css" rel="stylesheet"/>

        <!-- DHTMLX - WINDOWS -->
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css">
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxWindows/codebase/dhtmlxwindows.css">

        <!-- DHTML - MENU -->
        <link type="text/css" href="../../DHX/dhtmlxMenu/codebase/skins/dhtmlxmenu_dhx_skyblue.css" rel="stylesheet"/>


        <!-- DHTMLX - LAYOUT -->
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxLayout/codebase/dhtmlxlayout.css">
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxLayout/codebase/skins/dhtmlxlayout_dhx_skyblue.css">

        <link type="text/css" href="../../DHX/dhtmlxAccordion/codebase/skins/dhtmlxaccordion_dhx_skyblue.css" rel="stylesheet"/>

        <!-- DHTMLX - FORM -->
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css">

        <!-- DHTMLX - CALENDAR -->
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.css">
        <link rel="stylesheet" type="text/css" href="../../DHX/dhtmlxCalendar/codebase/skins/dhtmlxcalendar_dhx_skyblue.css">

        <!-- SCRIPT -->
        <script src="../../DHX/dhtmlxLayout/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxLayout/codebase/dhtmlxlayout.js"></script>
        <script src="../../DHX/dhtmlxLayout/codebase/dhtmlxcontainer.js"></script>
        <script src="../../DHX/dhtmlxWindows/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxWindows/codebase/dhtmlxwindows.js"></script>
        <script src="../../DHX/dhtmlxWindows/codebase/dhtmlxcontainer.js"></script>
        <script src="../../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
        <script src="../../DHX/dhtmlxAccordion/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_link.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_filter.js"></script>	
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_undo.js"></script>	
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_group.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_drag.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_hmenu.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_mcol.js"></script>
        <script src="../../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
        <script src="../../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>
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
        <script src="../../commons/js/fnMainObj_DHX1.0.js" type="text/javascript"></script>


    </head>

    <body>
        <div id="addressGrid" style="width:49%;height:100%;float:left;"></div>
        <div id="addressForm" style="width:49%;height:100%;float:right;"></div>

        <script>
            
            
            function onButtonClick(menuitemId, type) {
                //                alert(menuitemId);
                rrId=type.split('_')[0];
                ccId=type.split('_')[1];
                if(menuitemId=="insert"){
                    //                  parent.dhxAccordR.cells("list").attachURL("../");
                    //                  parent.dhxAccordR.openItem("list");
                    
                    //                    var date = new cDateObject();                   
                    //                    var dateTNow = date.dn+" "+date.tn;
                    
                    tmpId = addressGridData.uid();
                    
                    var now = new Date();
                    addressGridData.addRow(tmpId,"","");
                    addressGridData.cells(tmpId,obj.id).setValue("psd-"+now.getTime()+"-"+sesUser);
                    addressGridData.cells(tmpId,obj.partnerId).setValue(getId);
                    addressGridData.cells(tmpId,obj.type).setValue("address");
                    addressGridData.cells(tmpId,obj.value).setValue("add-"+now.getTime()+"-"+sesUser);
                    addressGridData.cells(tmpId,obj.loginCompanyId).setValue(sesCompanyId);
                    addressGridData.cells(tmpId,obj.loginUserId).setValue(sesUserId);
                    addressGridData.cells(tmpId,obj.editor).setValue(sesUserId);
                    addressGridData.cells(tmpId,obj.createTime).setValue(now.getTime());
                    
                    
                    
                   
                }else if(menuitemId=="delete"){
                    
                    if(confirm("Delete this row?")){
                        addressGridData.deleteRow(rrId);
                    }       
                }else if(menuitemId=="select"){
                    //                    alert("%%%%%%%%%%%%%");
                    var dhxWins= new dhtmlXWindows();
                    dhxWins.setImagePath("../../DHX/dhtmlxWindows/codebase/imgs");
                    var addressWindows = dhxWins.createWindow("addressWin",90, 90, 400,400);
                    var addrWin = dhxWins.window("addressWin").attachGrid();
                    var addrData =[{fields:'address_all',aligns:'center',widths:'400',types:'ro',hides:false,enNames:'address_all',thNames:'address_all'},
                        {fields:'id',aligns:'center',widths:'400',types:'ro',hides:false,enNames:'id',thNames:'id'}];
                   
                    var obj2 = new cObject; 
                    var getVal ="";
                    obj2.setBegin(addrWin,addrData,0);
                    addrWin.init();            
                    addrWin.loadXML("PHP/testLoadWindows.php?fields="+obj2.fields);
                    dhxWins.window("addressWin").setText("Address");
                    addrWin.attachEvent("onRowSelect",function(rId,cInd){
                        
                        var addId = addrWin.cells(rId,obj2.id).getValue();
                        addressGridData.forEachRow(function(id){
                            getVal += addressGridData.cells(id,obj.value).getValue()+",";
                        });
                        alert(getVal);
                        if(getVal.search(addId) !== -1){
                            //Found
                            alert("Duplicate");
                        }else{
                            tmpId = addressGridData.uid();
                            var now = new Date();
                            addressGridData.addRow(tmpId,"","");
                            addressGridData.cells(tmpId,obj.id).setValue("psd-"+now.getTime()+"-"+sesUser);
                            addressGridData.cells(tmpId,obj.partnerId).setValue(getId);
                            addressGridData.cells(tmpId,obj.type).setValue("address");
                            addressGridData.cells(tmpId,obj.value).setValue(addId);
                            addressGridData.cells(tmpId,obj.loginCompanyId).setValue(sesCompanyId);
                            addressGridData.cells(tmpId,obj.loginUserId).setValue(sesUserId);
                            addressGridData.cells(tmpId,obj.editor).setValue(sesUserId);
                            //                        alert(sesCompanyId);
        
                            dhxWins.window("addressWin").close();   
                        }                     
                    });
                                        
                    //                    addrWin.attachURL("htpp://www.google.com");
                        
                    //                        var addrGrid = dhxWins.window("addrSelWin").attachURL("www.google.com");
                    //                        var addressData =[{fields:'Test',aligns:'center',widths:'100',types:'ro',hides:false,enNames:'Test',thNames:'ทดสอบ'},
                    //                            {fields:'Test',aligns:'center',widths:'200',types:'ro',hides:false,enNames:'Test',thNames:'ทดสอบ'}];
                    //                        var addrObj = new cObject;
                    //                        addressObj.setBegin(addrGrid,addressData,0);
                    //                        addrgrid.init();            
                    //                        addrgrid.loadXML("PHP/testLoadWindows.php?fields="+addrObj.fields);
                        
                    
                    
                }else if(menuitemId=="save"){
                    myDP.sendData();
                }else{
                    alert("Something wrong");
                }
            }
            menu = new dhtmlXMenuObject();
            menu.setIconsPath("../../DHX/dhtmlxMenu/samples/common/imgD/");
            menu.renderAsContextMenu();
            menu.attachEvent("onClick", onButtonClick);
            menu.loadXML("XML/addressMenu.xml");
            //            var getId='per-1361415542-system';
            addressGridData = new dhtmlXGridObject("addressGrid");
            var data = [{fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'rowId',thNames:'rowId'},
                {fields:'id',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'id',thNames:'id'},
                {fields:'partnerId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'partnerId',thNames:'partnerId'},
                {fields:'type',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'type',thNames:'type'},
                {fields:'categoryEnglish',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'categoryEnglish',thNames:'categoryEnglish'},
                {fields:'categoryThai',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'categoryThai',thNames:'categoryThai'},
                {fields:'categoryCode',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'categoryCode',thNames:'categoryCode'},
                {fields:'value',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'value',thNames:'value'},
                {fields:'location',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'location',thNames:'location'},
                {fields:'effectiveDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'effectiveDate',thNames:'effectiveDate'},
                {fields:'endDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'endDate',thNames:'endDate'},
                {fields:'startDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'startDate',thNames:'startDate'},
                {fields:'validUntil',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'validUntil',thNames:'validUntil'},
                {fields:'externalId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'externalId',thNames:'externalId'},
                {fields:'sortOrder',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'sortOrder',thNames:'sortOrder'},
                {fields:'sortName',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'sortName',thNames:'sortName'},
                {fields:'loginCompanyId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'loginCompanyId',thNames:'loginCompanyId'},
                {fields:'loginUserId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'loginUserId',thNames:'loginUserId'},
                {fields:'createTime',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'createTime',thNames:'createTime'},
                {fields:'editor',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'editor',thNames:'editor'},
                {fields:'editTime',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'editTime',thNames:'editTime'},
                {fields:'status',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'status',thNames:'status'},
                {fields:'revision',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'revision',thNames:'revision'},
                {fields:'refId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'refId',thNames:'refId'},
                {fields:'images',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'images',thNames:'images'}];
                
            obj = new cObject();
            obj.setBegin(addressGridData,data,0);
            //            alert(getId);
            
            addressGridData.setSkin("dhx_skyblue");
            addressGridData.setImagePath("../../common/imgs/");
            addressGridData.imgURL = "../../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            
            addressGridData.init();
            addressGridData.loadXML("PHP/loadAddress.php?fields="+obj.fields+"&getId="+getId,function(){
                if (!addressGridData.getRowsNum()) {
                    addressGridData.entBox.id="menu_context_id";
                    menu.addContextZone("menu_context_id");
                }else{
                    addressGridData.enableContextMenu(menu);
                }
            });
            
            
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
                        { type: "hidden",name:"",label:"aId",value:""}]},
                //=================================================================================================
                {type: "fieldset",label: "add",inputWidth: "auto",
                    list: [{type: "newcolumn"},{ type:"button" ,name:"",label:"inser",value:"",inputLeft:"290"}]},
            ];

            //---------------------------------------------------------end form
            var fO = new fObject;
            fO.setBeginForm(addFormData,addData,"thaiName");
            addrForm = new dhtmlXForm("addressForm", addData); 
//            alert(fO.fields);
            
            
            var date = new Date();
            var time = date.getTime();
            var newAddId = "add-"+time+"-"+sesUser;
            addrForm.attachEvent("onChange", function (id, value){
                //                alert(id);
                //                alert(value);
                var addrAll = "";
                if(id != "address_all"){
                    //                    
                    addrForm.forEachItem(function(id){
//                        alert(id);
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
                //                alert(id);
                //                alert("Clicked");
                if(id == "insert"){
                    
                    addrForm.save();
                   
                }
            });
            
            formDP = new dataProcessor("PHP/addressLoad.php?dhxType=form&fields="+fO.fields);
            formDP.enableDataNames(true); 
            formDP.init(addrForm); 
            formDP.attachEvent("onAfterUpdate", function(sid, action, tid){
                
                addressGridData.cells(rowId,obj.addressId).setValue(newAddId);
                myDP.setUpdated(rowId,true);
                myDP.sendData();
            });
            
           
            addressGridData.attachEvent('onRowSelect',function(id){
//                alert(addressGridData.cells(id,obj.value).getValue());
                //                alert(id);
                var addressId = addressGridData.cells(id,obj.value).getValue();
//                                alert("address id : "+addressId);
                var pId;
//                addrForm.clear();
                dhtmlxAjax.get("PHP/ajax/getRowAddressId.php?getId="+addressId,function(loader){
                    pId = loader.xmlDoc.responseText;
//                   alert(pId);
                    if(pId != ""){
                        
//                        alert("not empty");
                    addrForm.load("PHP/addressLoad.php?dhxType=form&fields="+fO.fields+"&id="+pId);
                    }else{
                        addrForm.clear();
                        
                   addrForm.setItemValue("id",addressId);
//                        alert("Empty");
                    }
                    
                });
                
            });
            
            myDP = new dataProcessor("PHP/loadAddress.php?fields="+obj.fields+"&getId="+getId);//lock feed url
            myDP.init(addressGridData); //link dataprocessor to the grid
            
            myDP.setUpdateMode("off","");
            
            
            
            
             
        </script>
    </body>
</html>
