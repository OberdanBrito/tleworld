<?php
require("../commons/PHP/session.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Add Price.</title>

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
                dhtmlx.message.defPosition = "top";
                dhtmlx.message({
                    text: str,
                    id: "s2",
                    lifetime: 5000,
                    type: "alert"
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
        <script src="../commons/js/fnMainObj_DHX1.0.js" type="text/javascript"></script>
        <script src="../commons/js/jquery-1.9.0.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="catControl" width="100%" height="10%" style="background-color:white;overflow:hidden;margin-bottom:5px;"></div>
        <div id="gridbox" width="100%" height="500px" style="background-color:white;overflow:hidden"></div>
        <div id="loaderImage"></div>
        <div id="menuBar" width="700px" height="10%" style="float:left"></div>
        <script>

//            console.log(window.opener.priceStrId);
            //////////////////////////////////////////////////////////////////////////
            //
            // INITIALIZE
            //
            ///////////////////////////////////////////////////////////////////////
            var addPriceCatForm,
                    delimiter = " - ",
                    partnerId = window.opener.partnerId,
                    addPriceCatForm, addPriceGrid, addPriceGridData, addPriceGridObj, priceStrId,
                    addPriceMenuFormData, addPriceMenuForm, currency;


            ///////////////////////////////////////////////////////////////////////
            // Class Type Group Control Form //
            //////////////////////////////////////////////////////////////////////
            addPriceCatFormData = [
                {type: "fieldset", name: "mydata", label: "Category Control", width: 800, list: [
                        {type: "newcolumn", offset: 0},
                        {type: "select", name: "priceStr", label: "Select PriceStructure", value: "", connector: "PHP/loadPriceStr.php?partnerId=" + partnerId},
                        {type: "select", name: "CTG", label: "Class" + delimiter + "Type" + delimiter + "Group", value: "", inputWidth: "300", disabled: true},
                        {type: "input", name: "search", label: "Search by Code", value: "", inputWidth: "300", className: "searchClass", disabled: true},
                        {type: "label", name: "result", label: "", className: "resultLabel", labelWidth: "300", labelHeight: "12"},
                        {type: "newcolumn"},
                        {type: "button", name: "selectPriceStr", value: "Go"},
                        {type: "button", name: "selectCat", value: "Select", disabled: true},
                        {type: "button", name: "searchCode", value: "Search", disabled: true}

                    ]}
            ];
            addPriceCatForm = new dhtmlXForm("catControl", addPriceCatFormData);

            /////////////////////////////////////////////////////////////////////
            // Price Grid //
            ////////////////////////////////////////////////////////////////////
            addPriceGrid = new dhtmlXGridObject("gridbox");
            var addPriceGridData = [
//                {fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'rowId',thNames:'rowId'},
                {fields: 'checkbox', aligns: 'left', widths: '50', types: 'ch', hides: false, enNames: 'checkbox', thNames: 'checkbox'},
                {fields: 'id', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'id', thNames: 'id'},
                {fields: 'priceStrId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'priceStrId', thNames: 'priceStrId'},
                {fields: 'productStrId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'productStrId', thNames: 'productStrId'},
                {fields: 'cost', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'cost', thNames: 'cost'},
                {fields: 'price0', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'price0', thNames: 'price0'},
                {fields: 'inPrice', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'inPrice', thNames: 'inPrice'},
                {fields: 'exPrice', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'exPrice', thNames: 'exPrice'},
                {fields: 'unitCost', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'unitCost', thNames: 'unitCost'},
                {fields: 'vatCode', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'vatCode', thNames: 'vatCode'},
                {fields: 'vatValue', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'vatValue', thNames: 'vatValue'},
                {fields: 'itemId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'itemId', thNames: 'itemId'},
                {fields: 'englishName', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'englishName', thNames: 'englishName'},
                {fields: 'thaiName', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'thaiName', thNames: 'thaiName'},
                {fields: 'code', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'code', thNames: 'code'},
                {fields: 'customCode', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'customCode', thNames: 'customCode'},
                {fields: 'description', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'description', thNames: 'description'},
                {fields: 'style', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'style', thNames: 'style'},
                {fields: 'barCode', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'barCode', thNames: 'barCode'},
                {fields: 'class', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'class', thNames: 'class'},
                {fields: 'type', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'type', thNames: 'type'},
                {fields: 'gGroup', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'gGroup', thNames: 'gGroup'},
                {fields: 'commission', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'commission', thNames: 'commission'},
                {fields: 'discount', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'discount', thNames: 'discount'},
                {fields: 'flag', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'flag', thNames: 'flag'},
                {fields: 'image', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'image', thNames: 'image'},
                {fields: 'volume', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'volume', thNames: 'volume'},
                {fields: 'unitVolume', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'unitVolume', thNames: 'unitVolume'},
                {fields: 'weight', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'weight', thNames: 'weight'},
                {fields: 'unit', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'unit', thNames: 'unit'},
                {fields: 'unitWeight', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'unitWeight', thNames: 'unitWeight'},
                {fields: 'remark', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'remark', thNames: 'remark'},
                {fields: 'loginUserId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'loginUserId', thNames: 'loginUserId'},
                {fields: 'loginCompanyId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'loginCompanyId', thNames: 'loginCompanyId'},
                {fields: 'editorId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'editorId', thNames: 'editorId'},
                {fields: 'editDate', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'editDate', thNames: 'editDate'},
                {fields: 'createDate', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'createDate', thNames: 'createDate'},
                {fields: 'startDate', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'startDate', thNames: 'startDate'},
                {fields: 'validUntil', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'validUntil', thNames: 'validUntil'},
                {fields: 'active', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'active', thNames: 'active'},
                {fields: 'parentId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'parentId', thNames: 'parentId'}

            ];
            addPriceGridObj = new cObject;
            addPriceGridObj.setBegin(addPriceGrid, addPriceGridData, 0);  //0=en 1=th
            addPriceGrid.setSkin("dhx_skyblue");
            addPriceGrid.setImagePath("../common/imgs/");
            addPriceGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            addPriceGrid.enableAutoWidth(true);
            addPriceGrid.init();
            addPriceGrid.attachEvent("onXLS", function(grid_obj) {
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
                {type: "fieldset", name: "mydata", label: "Control", width: 500, list: [
                        {type: "fieldset", label: "VAT", inputWidth: 345, className: "vatS",
                            list: [
                                {type: "settings",
                                    position: "label-left",
                                    labelAlign: "right",
                                    labelWidth: 80
                                },
                                {type: "radio", name: "inVat", value: "0", label: "Included Vat", position: "label-right", checked: true},
                                {type: "radio", name: "inVat", value: "1", label: "Excluded Vat", position: "label-right"}
                            ]
                        },
                        {type: "newcolumn"}, {type: "button", name: "add", value: "Add Price(s)"},
                        {type: "newcolumn"}, {type: "button", name: "apply", value: "Apply Function", disabled: true}
                    ]}
            ];
            addPriceMenuForm = new dhtmlXForm("menuBar", addPriceMenuFormData);





            //////////////////////////////////////////////////////////////////////////
            //
            // EVENT HANDLING
            //
            ///////////////////////////////////////////////////////////////////////

            /////////////////////////////////////////////////////
            // Class Type Group Category Form onButtonClick() Event //
            /////////////////////////////////////////////////////
            addPriceCatForm.attachEvent("onButtonClick", function(menuitemId) {
                // select Class Type Group by SelectOption
                if (menuitemId == "selectCat") {
                    var CTGarray = addPriceCatForm.getItemValue("CTG").split(delimiter);
                    addPriceCatForm.setItemValue("search", "");
                    //clearAndLoad addPriceWindow
                    clearAndLoad(addPriceGrid, addPriceGridObj, getLoadStr(priceStrId, addPriceGridObj, CTGarray));

                } else if (menuitemId == "searchCode") {
                    var searchText = addPriceCatForm.getItemValue("search");
                    //clearAndLoad addPriceWindow
                    clearAndLoad(addPriceGrid, addPriceGridObj, getSearchStr(priceStrId, addPriceGridObj, searchText));
                } else if (menuitemId == "selectPriceStr") {
                    // Get PriceStrId
                    priceStrId = addPriceCatForm.getItemValue("priceStr");
                    // Clear Existing Grid Row
                    addPriceGrid.clearAll();
                    // Reload CTG
                    addPriceCatForm.reloadOptions("CTG", "PHP/loadClassTypeGroup.php?delimiter=" + delimiter + "&priceStrId=" + priceStrId);
                    addPriceCatForm.enableItem("CTG");
                    addPriceCatForm.enableItem("search");
                    addPriceCatForm.enableItem("searchCode");
                    addPriceCatForm.enableItem("selectCat");
                }
            });


            /////////////////////////////////////////////////////
            // Search by Code input enter event //
            /////////////////////////////////////////////////////
            $(".searchClass input").keyup(function(event) {
                if (event.keyCode == 13) {
                    var searchText = $(".searchClass input").val();
                    clearAndLoad(addPriceGrid, addPriceGridObj, getSearchStr(priceStrId, addPriceGridObj, searchText));
                    //clearAndLoad mainWindow

                }
            });

            ////////////////////////////////////////////////////
            // MenuForm onButtonClick event //
            ///////////////////////////////////////////////////
            addPriceMenuForm.attachEvent("onButtonClick", function(menuitemId) {
                if (menuitemId == "add") {
                    addPrice(addPriceGrid, addPriceGridObj, window.opener.qoGrid, window.opener.qoObj);
                } else if (menuitemId == "apply") {

                } else {
                    alert0("Under Construction...");
                }
            });
            ///////////////////////////////////////////////////
            // onRowDblClicked Event - Occur when user dblclick on row grid, add that row into target grid
            ///////////////////////////////////////////////////
            addPriceGrid.attachEvent("onRowDblClicked", function(rId, cInd) {
                addRowGrid(rId, addPriceGrid, addPriceGridObj, window.opener.qoGrid, window.opener.qoObj, (new Date()).getTime());
//                window.close();
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
            ////////////////////////////////////////////////////////////////////
            // getLoadStr() - return load String
            //////////////////////////////////////////////////////////////////
            function getLoadStr(id, gridObj, loadArray) {
                return "PHP/priceLoad.php?fields=" + gridObj.fields + "&priceStrId=" + id + "&group=" + loadArray[2] + "&class=" + loadArray[0] + "&type=" + loadArray[1];
            }

            ////////////////////////////////////////////////////////////////////
            // getSearchStr() - return search String
            //////////////////////////////////////////////////////////////////
            function getSearchStr(id, gridObj, searchText) {
                return "PHP/priceSearch.php?fields=" + gridObj.fields + "&priceStrId=" + id + "&searchText=" + searchText;
            }
            /////////////////////////////////////////////////////////////////
            // getFlag(grid,gridObj) - add style into priceGridObj
            /////////////////////////////////////////////////////////////////
            function getFlag(grid, gridObj) {
                grid.forEachRow(function(id) {
                    if (this.cells(id, gridObj.flag).getValue() === "CV") {
                        this.cells(id, gridObj.cost).setTextColor("red");
                        this.cells(id, gridObj.vatCode).setTextColor("red");
                    }
                    else if (this.cells(id, gridObj.flag).getValue() === "V") {
                        this.cells(id, gridObj.vatCode).setTextColor("red");
                    }
                    else if (this.cells(id, gridObj.flag).getValue() === "C") {
                        this.cells(id, gridObj.cost).setTextColor("red");
                    }
                });
            }

            /////////////////////////////////////////////////////////////////
            // hilightDuplicate() - hilight duplicated item between sourceGrid and targetGrid
            /////////////////////////////////////////////////////////////////
            function hilightDuplicate(s_grid, s_gridObj, t_grid, t_gridObj, compare) {
//                alert("s_Grid : " + s_grid.getRowsNum());
                for (var i = 0; i < s_grid.getRowsNum(); i++) {
                    var comparison = s_grid.cells(s_grid.getRowId(i), s_gridObj[compare]).getValue();
//                    alert("t_gridObj : " + t_gridObj);
//                    console.dir(t_gridObj);
                    for (var j = 0; j < t_grid.getRowsNum(); j++) {
                        //                        console.log(t_grid.cells(t_grid.getRowId(j),t_gridObj[compare]).getValue()+"=="+comparison);
                        if (comparison == t_grid.cells(t_grid.getRowId(j), t_gridObj[compare]).getValue()) {
                            s_grid.setRowColor(s_grid.getRowId(i), "bdc3c7");
                            t_grid.setRowColor(t_grid.getRowId(j), "bdc3c7");
                            break;
                        }
                    }

                }
            }
            /////////////////////////////////////////////////////////////////
            // addPrice(s_grid,s_gridObj,t_grid,t_gridObj) - addCheckedPrice from source grid to targetGrid
            /////////////////////////////////////////////////////////////////
            function addPrice(s_grid, s_gridObj, t_grid, t_gridObj) {
                var checked = s_grid.getCheckedRows(0).split(',');
                var date = new Date();
                var getTime = date.getTime();
                for (var i = 0; i < checked.length; i++) {
//                    alert(checked[i]);
                    // Copy data to array
                    var rowId = checked[i];
                    addRowGrid(rowId, s_grid, s_gridObj, t_grid, t_gridObj, getTime);
                    getTime++;
                }
                s_grid.uncheckAll();
//                window.close();
            }
            /////////////////////////////////////////////////////////////////
            // addRowGrid(s_grid,s_gridObj,t_grid,t_gridObj) - add that rowId from source grid to targetGrid
            /////////////////////////////////////////////////////////////////
            function addRowGrid(rowId, s_grid, s_gridObj, t_grid, t_gridObj, getTime) {
                console.log('addRowGrid getTime:' + getTime);
                var date = new Date();
                // Copy data to array
                var tmpArray = [];
                // Edit data
                var tmpId = t_grid.uid();
                //
                tmpArray[t_gridObj.id] = 'ode-' + getTime + "-" + sesUser; //id
                tmpArray[t_gridObj.priceStrId] = s_grid.cells(rowId, s_gridObj.priceStrId).getValue();//priceStrId
                tmpArray[t_gridObj.productStrId] = s_grid.cells(rowId, s_gridObj.productStrId).getValue();//productStrId
                tmpArray[t_gridObj.cost] = s_grid.cells(rowId, s_gridObj.cost).getValue();//cost
                tmpArray[t_gridObj.unitCost] = s_grid.cells(rowId, s_gridObj.unitCost).getValue();//currency
                tmpArray[t_gridObj.vatCode] = s_grid.cells(rowId, s_gridObj.vatCode).getValue();//vatCode
                tmpArray[t_gridObj.vatValue] = s_grid.cells(rowId, s_gridObj.vatValue).getValue();//vatValue
                tmpArray[t_gridObj.itemId] = s_grid.cells(rowId, s_gridObj.itemId).getValue();//itemId
                tmpArray[t_gridObj.englishName] = s_grid.cells(rowId, s_gridObj.englishName).getValue();//englishName
                tmpArray[t_gridObj.thaiName] = s_grid.cells(rowId, s_gridObj.thaiName).getValue();//thaiName
                tmpArray[t_gridObj.code] = s_grid.cells(rowId, s_gridObj.code).getValue();//code
                tmpArray[t_gridObj.customCode] = s_grid.cells(rowId, s_gridObj.customCode).getValue();//customCode
                tmpArray[t_gridObj.description] = s_grid.cells(rowId, s_gridObj.description).getValue();//description
                tmpArray[t_gridObj.style] = s_grid.cells(rowId, s_gridObj.style).getValue();//style
                tmpArray[t_gridObj.barCode] = s_grid.cells(rowId, s_gridObj.barCode).getValue();//barCode
                tmpArray[t_gridObj.class] = s_grid.cells(rowId, s_gridObj.class).getValue();//class
                tmpArray[t_gridObj.type] = s_grid.cells(rowId, s_gridObj.type).getValue();//type
                tmpArray[t_gridObj.gGroup] = s_grid.cells(rowId, s_gridObj.gGroup).getValue();//gGroup
                tmpArray[t_gridObj.commission] = s_grid.cells(rowId, s_gridObj.commission).getValue();//commission
                tmpArray[t_gridObj.discount] = s_grid.cells(rowId, s_gridObj.discount).getValue();//discount
                tmpArray[t_gridObj.image] = s_grid.cells(rowId, s_gridObj.image).getValue();//image
                tmpArray[t_gridObj.volume] = s_grid.cells(rowId, s_gridObj.volume).getValue();//volume
                tmpArray[t_gridObj.unitVolume] = s_grid.cells(rowId, s_gridObj.unitVolume).getValue();//unitVolume
                tmpArray[t_gridObj.weight] = s_grid.cells(rowId, s_gridObj.weight).getValue();//weight
                tmpArray[t_gridObj.unit] = s_grid.cells(rowId, s_gridObj.unit).getValue();//unitAmount
                tmpArray[t_gridObj.unitWeight] = s_grid.cells(rowId, s_gridObj.unitWeight).getValue();//unitWeight
                tmpArray[t_gridObj.remark] = s_grid.cells(rowId, s_gridObj.remark).getValue();//remark
                tmpArray[t_gridObj.loginUserId] = sesUserId;//loginUserId
                tmpArray[t_gridObj.loginCompanyId] = sesCompanyId;//loginCompanyId
                tmpArray[t_gridObj.editorId] = sesUserId;//editorId
                tmpArray[t_gridObj.editDate] = date.getDate() + "-" + date.getUTCMonth() + "-" + date.getUTCFullYear();
//                ;//editDate
                tmpArray[t_gridObj.createDate] = date.getDate() + "-" + date.getUTCMonth() + "-" + date.getUTCFullYear();
//                ;//createDate
                tmpArray[t_gridObj.startDate] = "";//startDate
                tmpArray[t_gridObj.validUntil] = "";//validUntil
                tmpArray[t_gridObj.active] = "1";//active
                tmpArray[t_gridObj.parentId] = 0;//parentId
                tmpArray[t_gridObj.orderId] = window.opener.masterId; //orderId;
                tmpArray[t_gridObj.jobNumber] = "";
                //price
                if (addPriceMenuForm.isItemChecked('inVat', "0")) {
                    tmpArray[t_gridObj.price] = s_grid.cells(rowId, s_gridObj.inPrice).getValue(); //price
                } else if (addPriceMenuForm.isItemChecked('inVat', "1")) {
                    tmpArray[t_gridObj.price] = s_grid.cells(rowId, s_gridObj.exPrice).getValue(); //price
                } else {
                    alert("vatIncluded wrong." + addPriceMenuForm.getItemValue('inVat'));
                }
                tmpArray[t_gridObj.total] = "";
                tmpArray[t_gridObj.quantity] = "1";
                tmpArray[t_gridObj.status] = "1";
                tmpArray[t_gridObj.parent] = "1111";
//                console.dir(tmpArray);
                // addRow to targetGrid
                t_grid.kidsXmlFile = "1";
                t_grid.addRow(getTime, tmpArray,null, "0", "", true);
//                console.log('row added.');
                s_grid.uncheckAll();
            }

            ////////////////////////////////////////////////////////////////
            // clearAndLoad(grid,gridObj,loaderStr) - clear grid and reload it from loaderString
            /////////////////////////////////////////////////////////////////
            function clearAndLoad(grid, gridObj, loaderStr) {
                grid.clearAndLoad(loaderStr, function() {
                    document.getElementById("loaderImage").style.display = "none";
                    addPriceCatForm.setItemLabel("result", "About " + addPriceGrid.getRowsNum() + " product(s)");
                    getFlag(grid, gridObj);
                    hilightDuplicate(addPriceGrid, addPriceGridObj, window.opener.qoGrid, window.opener.qoObj, "code");
                });
            }


            //////////////////////////////////////////////////////////////////
            // popupWindow(url,windowName) - open new popupwindow
            ///////////////////////////////////////////////////////////////////
            function popupWindow(url, windowName) {
                var newwindow = window.open(url, windowName, 'height=430,width=720');
                if (window.focus) {
                    newwindow.focus()
                }
                return false;
            }
        </script>
    </body>
</html>
