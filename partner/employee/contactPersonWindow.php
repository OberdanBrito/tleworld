<?php
require("../../commons/PHP/session.php");
echo "<script>";
echo "var partnerId = '" . $_REQUEST['getId'] . "';";
echo "</script>";
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
        <!-- dhtmlxForm -->
        <link rel="STYLESHEET" type="text/css" href="../../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css"/>
        <script src="../../DHX/dhtmlxForm/codebase/dhtmlxcommon.js"></script>
        <script src="../../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
        <script src="../../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_combo.js"></script>

        <script src="../../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
        <script src="../../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>
        <script src="../../DHX/dhtmlxConnector/codebase/connector.js"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_combo.js" type="text/javascript"></script>
        <script src="../../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>
        <script language="JavaScript" src="../../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script src="../../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>
        <script src="../../commons/js/fnMainObj_DHX1.0.js" type="text/javascript"></script>
        <script src="js/fnDateObj.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="left" width="48%" height="90%" style="float:left;"></div>
        <div id="right" width="48%" height="90%" style="float:right;"></div>
        <div id="confirm" width="300px" style="float:right;width:500px;"></div>
        <script>
            lGrid = new dhtmlXGridObject("right");
            var ownerData =[{fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'rowId',thNames:'rowId'},
                {fields:'id',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'id',thNames:'id'},
                {fields:'relType',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'relType',thNames:'relType'},
                {fields:'personType',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'personType',thNames:'personType'},
                {fields:'registerId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'registerId',thNames:'registerId'},
                {fields:'issuedRe',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'issuedRe',thNames:'issuedRe'},
                {fields:'expireRe',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'expireRe',thNames:'expireRe'},
                {fields:'title_th',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'title_th',thNames:'title_th'},
                {fields:'thaiName',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'thaiName',thNames:'thaiName'},
                {fields:'thaiLastName',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'thaiLastName',thNames:'thaiLastName'},
                {fields:'title',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'title',thNames:'title'},
                {fields:'englishName',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'englishName',thNames:'englishName'},
                {fields:'englishLastName',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'englishLastName',thNames:'englishLastName'},
                {fields:'gender',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'gender',thNames:'gender'},
                {fields:'nationality',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'nationality',thNames:'nationality'},
                {fields:'birthDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'birthDate',thNames:'birthDate'},
                {fields:'email',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'email',thNames:'email'},
                {fields:'fax',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'fax',thNames:'fax'},
                {fields:'mobile',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'mobile',thNames:'mobile'},
                {fields:'company_id',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'company_id',thNames:'company_id'},
                {fields:'externalId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'externalId',thNames:'externalId'},
                {fields:'sortOrder',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'sortOrder',thNames:'sortOrder'},
                {fields:'loginCompanyId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'loginCompanyId',thNames:'loginCompanyId'},
                {fields:'loginUserId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'loginUserId',thNames:'loginUserId'},
                {fields:'createTime',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'createTime',thNames:'createTime'},
                {fields:'editor',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'editor',thNames:'editor'},
                {fields:'editTime',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'editTime',thNames:'editTime'},
                {fields:'active',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'active',thNames:'active'},
                {fields:'revision',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'revision',thNames:'revision'},
                {fields:'code',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'code',thNames:'code'},
                {fields:'startDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'startDate',thNames:'startDate'},
                {fields:'validUntil',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'validUntil',thNames:'validUntil'},
                {fields:'businessType',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'businessType',thNames:'businessType'},
                {fields:'department',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'department',thNames:'department'}];
            var obj = new cObject;
            obj.setBegin(lGrid,ownerData,0);  //0=en 1=th
            lGrid.setSkin("dhx_skyblue");
            lGrid.setImagePath("../common/imgs/");
            lGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            lGrid.enableDragAndDrop(true);
            lGrid.enableMercyDrag(true);
            lGrid.init();
            lGrid.loadXML("PHP/contactPersonWindowLoad.php?fields="+obj.fields);
            lGrid.attachEvent("onDrop", function(sId,tId,dId,sObj,tObj,sCol,tCol){
            });
            lGrid.attachEvent("onRowAdded", function(rId){
                lGrid.deleteRow(rId);
            });
            rGrid = new dhtmlXGridObject("left");
            var userData = [{fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'rowId',thNames:'rowId'},
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
            var obj2 = new cObject;
            obj2.setBegin(rGrid,userData,0);  //0=en 1=th
            rGrid.setSkin("dhx_skyblue");
            rGrid.setImagePath("../../common/imgs/");
            rGrid.imgURL = "../../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            rGrid.enableDragAndDrop(true);
            rGrid.init();
            rGrid.loadXML("PHP/contactPartnerDetailLoad.php?fields="+obj2.fields+"&getId="+partnerId);
            rGrid.attachEvent("onBeforeDrag", function(id){
                return false;
            });
            rGrid.gridToGrid = function(rowId,sgrid,tgrid){
                var time = new Date();
                var z=[];
                //                z[obj2.rowId] = rowId;
                z[obj2.id] = "psd-"+time.getTime()+"-"+sesUser;
                z[obj2.partnerId] = partnerId;
                z[obj2.type] = "contact";
                z[obj2.category] = "customer";
                z[obj2.value] = sgrid.cells(rowId,obj.id).getValue();
                z[obj2.loginCompanyId] = sesCompanyId;
                z[obj2.loginUserId] = sesUserId;
                z[obj2.editor] = sesUserId;
                z[obj2.status] = 1;
                z[obj2.revision] = 0;
                return z;

            }
            myDP = new dataProcessor("PHP/contactPartnerDetailLoad.php?fields="+obj2.fields+"&getId="+partnerId);//lock feed url
            myDP.init(rGrid); //link dataprocessor to the grid
            myDP.setUpdateMode("off","");
            myDP.attachEvent("onBeforeUpdate",function(rId,status){
                return true;
            });
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag){
                //                alert(action);  
            });
            rGrid.attachEvent("onRowAdded", function(rId){
                var modVal = rGrid.findCell(rGrid.cells(rId,obj2.value).getValue(), obj2.value, false);
                if(modVal.length>1){
                    rGrid.deleteRow(rId);
                }
            });  
            
            var formData = [
                {type: "fieldset",  name: "mydata", label: "Control", width:400, list:[
                      {type:"newcolumn"}, {type: "button", name: "del", value: "Delete"},                        
                        {type: "newcolumn"},{type: "button", name: "save", value: "Save Changes"},
                        {type: "newcolumn"},{type:"button",name:"cancel", value:"Reset"}]}
            ];
            var myForm = new dhtmlXForm("confirm",formData);
            myForm.attachEvent("onButtonClick", function(id){
                if(id=="save"){
                    if(confirm("Save Changes?")){
                        myDP.sendData();
                        reloadTab("a3");
                        //                        parent.dhxAccordR.cells("group").attachURL("../partner/customer/contactPersonTab.php?getId="+partnerId);
                        //                        parent.dhxAccordR.openItem("group");
                    }else{
                        
                    }
                }if(id=="cancel"){
                    
                }
            })
        </script>
    </body>
</html>