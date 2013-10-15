<?php
require("../commons/PHP/session.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>PriceGroup</title>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />


        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link type="text/css" href="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css" rel="stylesheet"/>
        <link type="text/css" href="../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css" rel="stylesheet"/>
        <link type="text/css" href="../DHX/dhtmlxMenu/codebase/skins/dhtmlxmenu_dhx_skyblue.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxLayout/codebase/dhtmlxlayout.css"/>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css"/>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.css"/>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxLayout/codebase/skins/dhtmlxlayout_dhx_skyblue.css"/>
        <link type="text/css" href="../DHX/dhtmlxAccordion/codebase/skins/dhtmlxaccordion_dhx_skyblue.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm3.6/codebase/skins/dhtmlxform_dhx_skyblue.css"/>

        <style>
            .error {background-color: #ffd4db !important;color:maroon !important;}
            #loaderImage{
                position: absolute;
                top: 50%;
                left: 50%;
                margin-top:-50px;
                margin-left:-50px;
                z-index:1000;
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
                    lifetime:5000,
                    type:"alert"
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
        <script src="../DHX/dhtmlxForm3.6/codebase/dhtmlxform.js"></script>
        <script src="../DHX/dhtmlxForm3.6/codebase/ext/dhtmlxform_dyn.js"></script>
        <script src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js" type="text/javascript"></script>
        <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_combo.js" type="text/javascript"></script>
        <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>
        <script src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>
        <script language="JavaScript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>
        <script src="js/fnMainObj_DHX.js" type="text/javascript"></script>
        <script src="js/fnDateObj.js" type="text/javascript"></script>
        <script src="../commons/js/jquery-1.9.0.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="catControl" width="100%" height="10%" style="background-color:white;overflow:hidden;margin-bottom:5px;"></div>
        <div id="gridbox" width="100%" height="80%" style="background-color:white;overflow:hidden"></div>
        <div id="loaderImage"></div>
        <div id="menuBar" width="700px" height="10%" style="float:left"></div>
        <script>
            
            console.log(window.opener.priceStrId);
            //////////////////////////////////////////////////////////////////////////
            //
            // INITIALIZE
            //
            ///////////////////////////////////////////////////////////////////////
            var addPriceCatForm,
            delimiter = window.opener.delimiter,
            targetPriceStrId = window.opener.priceStrId,
            addPriceCatForm,addPriceGrid,addPriceGridData,addPriceGridObj,addPriceStrId,newPriceStrId,
            addPriceMenuFormData,addPriceMenuForm;
            
            ///////////////////////////////////////////////////////////////////////
            // Class Type Group Control Form //
            //////////////////////////////////////////////////////////////////////
            addPriceCatFormData = [
                {type: "fieldset",  name: "mydata", label: "Category Control", width:800, list:[
                        {type:"newcolumn",offset:0},
                        {type:"select",name:"priceStr",label:"Select PriceStructure",value:"",connector:"PHP/loadPriceStr.php"},
                        {type:"select",name:"CTG",label:"Class"+delimiter+"Type"+delimiter+"Group",value:"",inputWidth:"300",disabled:true},
                        {type:"input", name:"search",label:"Search by Code",value:"",inputWidth:"300",className:"searchClass",disabled:true},
                        {type: "label",name:"result", label: "",className:"resultLabel",labelWidth:"300",labelHeight:"12"},
                        {type: "newcolumn"},
                        {type: "button", name: "selectPriceStr", value: "Go"},
                        {type: "button", name: "selectCat", value: "Select",disabled:true},
                        {type: "button", name: "searchCode", value: "Search",disabled:true}
                        
                    ]}
            ];
            addPriceCatForm = new dhtmlXForm("catControl",addPriceCatFormData);
            
            /////////////////////////////////////////////////////////////////////
            // Price Grid //
            ////////////////////////////////////////////////////////////////////
            addPriceGrid = new dhtmlXGridObject("gridbox");
            var addPriceGridData = [
                {fields:'checkbox',aligns:'left',widths:'50',types:'ch',hides:true,enNames:'',thNames:''},
                {fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'rowId',thNames:'rowId'},
                {fields:'code',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'code',thNames:'code'},
                {fields:'id',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'id',thNames:'id'},
                {fields:'priceStrId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'priceStrId',thNames:'priceStrId'},
                {fields:'productStrId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'productStrId',thNames:'productStrId'},
                {fields:'cost',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'cost',thNames:'cost'},
                {fields:'price0',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'price0',thNames:'price0'},
                {fields:'inPrice',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'inPrice',thNames:'inPrice'},
                {fields:'exPrice',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'exPrice',thNames:'exPrice'},
                {fields:'unitCost',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'unitCost',thNames:'unitCost'},
                {fields:'vatCode',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'vatCode',thNames:'vatCode'},
                {fields:'vatValue',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'vatValue',thNames:'vatValue'},
                {fields:'unit',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'unit',thNames:'unit'},
                {fields:'itemId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'itemId',thNames:'itemId'},
                {fields:'englishName',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'englishName',thNames:'englishName'},
                {fields:'thaiName',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'thaiName',thNames:'thaiName'},
                {fields:'style',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'style',thNames:'style'},
                {fields:'barCode',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'barCode',thNames:'barCode'},
                {fields:'class',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'class',thNames:'class'},
                {fields:'type',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'type',thNames:'type'},
                {fields:'gGroup',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'gGroup',thNames:'gGroup'},
                {fields:'commission',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'commission',thNames:'commission'},
                {fields:'discount',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'commission',thNames:'commission'},
                {fields:'flag',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'flag',thNames:'flag'},
                {fields:'image',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'image',thNames:'image'},
                {fields:'volume',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'volume',thNames:'volume'},
                {fields:'unitVolume',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'unitVolume',thNames:'unitVolume'},
                {fields:'weight',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'weight',thNames:'weight'},
                {fields:'unitWeight',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'unitWeight',thNames:'unitWeight'},
                {fields:'remark',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'remark',thNames:'remark'},
                {fields:'loginUserId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'loginUserId',thNames:'loginUserId'},
                {fields:'loginCompanyId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'loginCompanyId',thNames:'loginCompanyId'},
                {fields:'editorId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'editorId',thNames:'editorId'},
                {fields:'editDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'editDate',thNames:'editDate'},
                {fields:'createDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'createDate',thNames:'createDate'},
                {fields:'startDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'startDate',thNames:'startDate'},
                {fields:'validUntil',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'validUntil',thNames:'validUntil'},
                {fields:'active',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'active',thNames:'active'},
                {fields:'parentId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'parentId',thNames:'parentId'},
                {fields:'checkbox',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'checkbox',thNames:'checkbox'}
            ];
            addPriceGridObj = new cObject;
            addPriceGridObj.setBegin(addPriceGrid,addPriceGridData,0);  //0=en 1=th
            addPriceGrid.setSkin("dhx_skyblue");
            addPriceGrid.setImagePath("../common/imgs/");
            addPriceGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            addPriceGrid.enableAutoWidth(true);
            addPriceGrid.init();
            addPriceGrid.attachEvent("onXLS", function(grid_obj){
                document.getElementById("loaderImage").style.display = "block";
            });          
            addPriceGrid.enableHeaderMenu();
            addPriceGrid.enableAutoSaving("addPriceWindowGrid");
            addPriceGrid.enableAutoSizeSaving();
            addPriceGrid.loadSizeFromCookie("addPriceWindowGrid");
            
            //////////////////////////////////////////////////////////////////////
            // MenuBar Form
            // ////////////////////////////////////////////////////////////////////
            addPriceMenuFormData = [
                {type: "fieldset",  name: "mydata", label: "Control", width:500, list:[
                        {type: "newcolumn"}, {type: "button", name: "add", value: "Add Price(s)"},
                        {type: "newcolumn"}, {type: "button", name: "apply", value: "Apply Function",disabled:true}
                    ]}
            ];
            addPriceMenuForm = new dhtmlXForm("menuBar",addPriceMenuFormData);
            
            
            
            
            
            //////////////////////////////////////////////////////////////////////////
            //
            // EVENT HANDLING
            //
            ///////////////////////////////////////////////////////////////////////
       
            /////////////////////////////////////////////////////
            // Class Type Group Category Form onButtonClick() Event //
            /////////////////////////////////////////////////////
            addPriceCatForm.attachEvent("onButtonClick", function(menuitemId){
                // select Class Type Group by SelectOption
                if(menuitemId=="selectCat"){
                    var CTGarray = addPriceCatForm.getItemValue("CTG").split(delimiter);
                    addPriceCatForm.setItemValue("search","");
                    window.opener.catForm.setItemValue("search","");
                    //clearAndLoad mainWindow
                    window.opener.clearAndLoad(window.opener.priceGrid,window.opener.priceGridObj,window.opener.getLoadStr(targetPriceStrId,window.opener.priceGridObj,CTGarray));
                    
                    //clearAndLoad addPriceWindow
                    clearAndLoad(addPriceGrid,addPriceGridObj,window.opener.getLoadStr(newPriceStrId,addPriceGridObj,CTGarray));
                    
                }else if(menuitemId=="searchCode"){
                    var searchText = addPriceCatForm.getItemValue("search");
                    //clearAndLoad mainWindow
                    window.opener.clearAndLoad(window.opener.priceGrid,window.opener.priceGridObj,window.opener.getSearchStr(targetPriceStrId,window.opener.priceGridObj,searchText));
                    
                    //clearAndLoad addPriceWindow
                    clearAndLoad(addPriceGrid,addPriceGridObj,window.opener.getSearchStr(newPriceStrId,addPriceGridObj,searchText));
                    
                }else if(menuitemId=="selectPriceStr"){
                    // Get new PriceStrId
                    newPriceStrId = addPriceCatForm.getItemValue("priceStr");
                    // Clear Existing Grid Row
                    addPriceGrid.clearAll();
                    // Reload CTG
                    addPriceCatForm.reloadOptions("CTG", "PHP/loadClassTypeGroup.php?delimiter="+delimiter+"&priceStrId="+newPriceStrId);
                    addPriceCatForm.enableItem("CTG");
                    addPriceCatForm.enableItem("search");
                    addPriceCatForm.enableItem("searchCode");
                    addPriceCatForm.enableItem("selectCat");
                }
            });
            

            /////////////////////////////////////////////////////
            // Search by Code input enter event //
            /////////////////////////////////////////////////////
            $(".searchClass input").keyup(function(event){
                if(event.keyCode == 13){     
                    var searchText = $(".searchClass input").val();
                    window.opener.clearAndLoad(window.opener.priceGrid,window.opener.priceGridObj,window.opener.getSearchStr(targetPriceStrId,window.opener.priceGridObj,searchText));
                    clearAndLoad(addPriceGrid,addPriceGridObj,window.opener.getSearchStr(newPriceStrId,addPriceGridObj,searchText));
                    //clearAndLoad mainWindow
                    
                }
            });
           
            ////////////////////////////////////////////////////
            // MenuForm onButtonClick event //
            ///////////////////////////////////////////////////
            addPriceMenuForm.attachEvent("onButtonClick",function (menuitemId) {
                
                if(menuitemId=="add"){
                    if(checkDuplicate(addPriceGrid,addPriceGridObj,window.opener.priceGrid,window.opener.priceGridObj,"code")){
                        addPrice(addPriceGrid,addPriceGridObj,window.opener.priceGrid,window.opener.priceGridObj);
                    }else{
                        alert("Duplicated item(s) found.");
                    }
                
                }else if(menuitemId=="apply"){
                    
                }else{
                    alert0("Under Construction...");
                }
            });
            
           
           
           
            //////////////////////////////////////////////////////////////////////////
            //
            // DATA PROCESSOR
            //
            ///////////////////////////////////////////////////////////////////////
            
             
            //////////////////////////////////////////////////////////////////////////
            //
            // FUNCTION
            //
            ///////////////////////////////////////////////////////////////////////
            
            
            /////////////////////////////////////////////////////////////////
            // getFlag(grid,gridObj) - add style into priceGridObj
            /////////////////////////////////////////////////////////////////
            function getFlag(grid,gridObj){
                grid.forEachRow(function(id){
                    if(this.cells(id,gridObj.flag).getValue()=="CV"){
                        this.cells(id,gridObj.cost).setTextColor("red");
                        this.cells(id,gridObj.vatCode).setTextColor("red");
                    }
                    else if(this.cells(id,gridObj.flag).getValue()=="V"){
                        this.cells(id,gridObj.vatCode).setTextColor("red");
                    }
                    else if(this.cells(id,gridObj.flag).getValue()=="C"){
                        this.cells(id,gridObj.cost).setTextColor("red");
                    }
                });
            }
            
            /////////////////////////////////////////////////////////////////
            // hilightDuplicate() - hilight duplicated item between sourceGrid and targetGrid
            /////////////////////////////////////////////////////////////////
            function hilightDuplicate(s_grid,s_gridObj,t_grid,t_gridObj,compare){
                for(var i=0;i<s_grid.getRowsNum();i++){
                    var comparison = s_grid.cells(s_grid.getRowId(i),s_gridObj[compare]).getValue();
                    for(var j=0;j<t_grid.getRowsNum();j++){
                        //                        console.log(t_grid.cells(t_grid.getRowId(j),t_gridObj[compare]).getValue()+"=="+comparison);
                        if(comparison==t_grid.cells(t_grid.getRowId(j),t_gridObj[compare]).getValue()){
                            s_grid.setRowColor(s_grid.getRowId(i),"bdc3c7");
                            t_grid.setRowColor(t_grid.getRowId(j),"bdc3c7");
                            break;
                        }
                    }
                            
                }
            }
            /////////////////////////////////////////////////////////////////
            // addPrice(s_grid,s_gridObj,t_grid,t_gridObj) - addCheckedPrice from source grid to targetGrid
            /////////////////////////////////////////////////////////////////
            function addPrice(s_grid,s_gridObj,t_grid,t_gridObj){
                var checked=s_grid.getCheckedRows(0).split(',');
                var date = new Date();
                var getTime = date.getTime();
                for(var i=0;i<checked.length;i++){
                    console.dir(s_gridObj);
                    // Copy data to array
                    var tmpArray = [];
                    //                    if(t_gridObj.arrNames.toString()==s_gridObj.arrNames.toString()){
                    for(var j=0;j<t_grid.getColumnsNum();j++){
                        tmpArray[j] = s_grid.cells(checked[i],j).getValue();
                    }
                    
                    console.log(tmpArray);
                    console.log(t_gridObj.rowId);
                    // Edit data
                    var tmpId = t_grid.uid();
                    tmpArray[t_gridObj.rowId] = "";
                    tmpArray[t_gridObj["id"]] = "prc-"+getTime+"-"+sesUser;
                    tmpArray[t_gridObj["loginUserId"]] = sesUserId;
                    tmpArray[t_gridObj["loginCompanyId"]] = sesCompanyId;
                    tmpArray[t_gridObj["editorId"]] = sesUser;
                    tmpArray[t_gridObj["editDate"]] = date.getDate();
                    tmpArray[t_gridObj["priceStrId"]] = targetPriceStrId;
                    console.log(tmpArray);
                    // addRow to targetGrid
                    t_grid.addRow(getTime,tmpArray,"");
                    getTime++;
                }
                    
            }
            /////////////////////////////////////////////////////////////////
            // checkDuplicate() - check duplicated item between sourceGrid and targetGrid
            /////////////////////////////////////////////////////////////////
            function checkDuplicate(s_grid,s_gridObj,t_grid,t_gridObj,compare){
                var checked=s_grid.getCheckedRows(0).split(',');
                for(var i=0;i<checked.length;i++){
                    var comparison = s_grid.cells(checked[i],s_gridObj[compare]).getValue();
                    for(var j=0;j<t_grid.getRowsNum();j++){
                        //                        console.log(t_grid.cells(t_grid.getRowId(j),t_gridObj[compare]).getValue()+"=="+comparison);
                        if(comparison==t_grid.cells(t_grid.getRowId(j),t_gridObj[compare]).getValue()){
                            return false;
                        }
                    }
                }
                return true;
            }
            
            
            
            ////////////////////////////////////////////////////////////////
            // clearAndLoad(grid,gridObj,loaderStr) - clear grid and reload it from loaderString
            /////////////////////////////////////////////////////////////////
            function clearAndLoad(grid,gridObj,loaderStr){
                grid.clearAndLoad(loaderStr,function(){
                    document.getElementById("loaderImage").style.display = "none";
                    addPriceCatForm.setItemLabel("result","About "+addPriceGrid.getRowsNum()+" product(s)");
                    getFlag(grid,gridObj);
                    hilightDuplicate(addPriceGrid,addPriceGridObj,window.opener.priceGrid,window.opener.priceGridObj,"code");
                });
            }
            
            
            //////////////////////////////////////////////////////////////////
            // popupWindow(url,windowName) - open new popupwindow
            ///////////////////////////////////////////////////////////////////
            function popupWindow(url,windowName) {
                var newwindow=window.open(url,windowName,'height=430,width=720');
                if (window.focus) {newwindow.focus()}
                return false;
            }
        </script>
    </body>
</html>
