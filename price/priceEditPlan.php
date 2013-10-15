<?php
require("../commons/PHP/session.php");
echo "<script>";
echo "var priceStrId='" . $_REQUEST['priceStrId'] . "';";
echo "</script>";
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
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css"/>

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
        <!--<script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>-->
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
        <script src="../commons/js/jquery-1.9.0.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {

            });
        </script>
    </head>
    <body>
        <div id="catControl" width="100%" height="10%" style="background-color:white;overflow:hidden;margin-bottom:5px;"></div>
        <div id="gridbox" width="100%" height="80%" style="background-color:white;overflow:hidden"></div>
        <div id="loaderImage"></div>
        <div id="menuBar" width="700px" height="10%" style="float:left"></div>
        <script>
            //////////////////////////////////////////////////////////////////////////
            //
            // INITIALIZE
            //
            ///////////////////////////////////////////////////////////////////////
            var catControlData, delimiter = " - ", catForm, priceGrid, priceGridData, priceGridObj, priceGridDP, CTGarray, searchText,
                    menuForm, menuFormData;


            ///////////////////////////////////////////////////////////////////////
            // Class Type Group Control Form //
            //////////////////////////////////////////////////////////////////////
            catControlData = [
                {type: "fieldset", name: "mydata", label: "Category Control", width: 800, list: [
                        {type: "newcolumn", offset: 0},
                        {type: "select", name: "CTG", label: "Class" + delimiter + "Type" + delimiter + "Group", value: "", connector: "PHP/loadClassTypeGroup.php?delimiter=" + delimiter + "&priceStrId=" + priceStrId},
                        {type: "input", name: "search", label: "Search by Code", value: "", inputWidth: "300", className: "searchClass"},
                        {type: "label", name: "result", label: "", className: "resultLabel", labelWidth: "300", labelHeight: "12"},
                        {type: "newcolumn"},
                        {type: "button", name: "selectCat", value: "Select"},
                        {type: "button", name: "searchCode", value: "Search"}

                    ]}
            ];
            catForm = new dhtmlXForm("catControl", catControlData);

            /////////////////////////////////////////////////////////////////////
            // Price Grid //
            ////////////////////////////////////////////////////////////////////
            priceGrid = new dhtmlXGridObject("gridbox");
            var priceGridData = [{fields: 'rowId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'rowId', thNames: 'rowId'},
                {fields: 'id', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'id', thNames: 'id'},
                {fields: 'priceStrId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'priceStrId', thNames: 'priceStrId'},
                {fields: 'productStrId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'productStrId', thNames: 'productStrId'},
                {fields: 'cost', aligns: 'left', widths: '50', types: 'ed', hides: false, enNames: 'cost', thNames: 'cost'},
                {fields: 'price0', aligns: 'left', widths: '50', types: 'ed', hides: false, enNames: 'price0', thNames: 'price0'},
                {fields: 'inPrice', aligns: 'left', widths: '50', types: 'ed', hides: false, enNames: 'inPrice', thNames: 'inPrice'},
                {fields: 'exPrice', aligns: 'left', widths: '50', types: 'ed', hides: false, enNames: 'exPrice', thNames: 'exPrice'},
                {fields: 'unitCost', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'unitCost', thNames: 'unitCost'},
                {fields: 'vatCode', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'vatCode', thNames: 'vatCode'},
                {fields: 'vatValue', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'vatValue', thNames: 'vatValue'},
                {fields: 'itemId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'itemId', thNames: 'itemId'},
                {fields: 'englishName', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'englishName', thNames: 'englishName'},
                {fields: 'thaiName', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'thaiName', thNames: 'thaiName'},
                {fields: 'code', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'code', thNames: 'code'},
                {fields: 'customCode', aligns: 'left', widths: '50', types: 'ed', hides: false, enNames: 'customCode', thNames: 'customCode'},
                {fields: 'description', aligns: 'left', widths: '50', types: 'ed', hides: false, enNames: 'description', thNames: 'description'},
                {fields: 'style', aligns: 'left', widths: '50', types: 'ed', hides: false, enNames: 'style', thNames: 'style'},
                {fields: 'barCode', aligns: 'left', widths: '50', types: 'ed', hides: false, enNames: 'barCode', thNames: 'barCode'},
                {fields: 'class', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'class', thNames: 'class'},
                {fields: 'type', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'type', thNames: 'type'},
                {fields: 'gGroup', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'gGroup', thNames: 'gGroup'},
                {fields: 'commission', aligns: 'left', widths: '50', types: 'ed', hides: false, enNames: 'commission', thNames: 'commission'},
                {fields: 'discount', aligns: 'left', widths: '50', types: 'ed', hides: false, enNames: 'discount', thNames: 'discount'},
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
                {fields: 'parentId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'parentId', thNames: 'parentId'},
                {fields: 'checkbox', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'checkbox', thNames: 'checkbox'}];
            priceGridObj = new cObject;
            priceGridObj.setBegin(priceGrid, priceGridData, 0);  //0=en 1=th
            priceGrid.setSkin("dhx_skyblue");
            priceGrid.setImagePath("../common/imgs/");
            priceGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            priceGrid.enableAutoWidth(true);
            priceGrid.init();
            priceGrid.attachEvent("onXLS", function(grid_obj) {
                document.getElementById("loaderImage").style.display = "block";
            });
            priceGrid.enableHeaderMenu();
            priceGrid.enableAutoSaving("priceGridPlan");
            priceGrid.enableAutoSizeSaving();
            priceGrid.loadSizeFromCookie("priceGridPlan");

            //////////////////////////////////////////////////////////////////////
            // MenuBar Form
            // ////////////////////////////////////////////////////////////////////
            menuFormData = [
                {type: "fieldset", name: "mydata", label: "Control", width: 500, list: [
                        //                        {type: "newcolumn"}, {type: "button", name: "selectAll", value: "Select All"},
                        //                        {type: "newcolumn"}, {type: "button", name: "deselectAll", value: "Deselect All"},
                        {type: "newcolumn"}, {type: "button", name: "save", value: "Save Changes"},
                        {type: "newcolumn"}, {type: "button", name: "add", value: "Add Price(s)"},
                        {type: "newcolumn"}, {type: "button", name: "apply", value: "Apply Function", disabled: true}
                    ]}
            ];
            menuForm = new dhtmlXForm("menuBar", menuFormData);





            //////////////////////////////////////////////////////////////////////////
            //
            // EVENT HANDLING
            //
            ///////////////////////////////////////////////////////////////////////


            /////////////////////////////////////////////////////
            // Class Type Group Category Form onButtonClick() Event //
            /////////////////////////////////////////////////////
            catForm.attachEvent("onButtonClick", function(menuitemId) {
                // select Class Type Group by SelectOption
                if (menuitemId == "selectCat") {
                    CTGarray = catForm.getItemValue("CTG").split(delimiter);
                    catForm.setItemValue("search", "");
                    clearAndLoad(priceGrid, priceGridObj, getLoadStr(priceStrId, priceGridObj, CTGarray));
                } else if (menuitemId == "searchCode") {
                    searchText = catForm.getItemValue("search");
                    clearAndLoad(priceGrid, priceGridObj, getSearchStr(priceStrId, priceGridObj, searchText));
                }

            });


            /////////////////////////////////////////////////////
            // Search by Code input enter event //
            /////////////////////////////////////////////////////
            $(".searchClass input").keyup(function(event) {
                if (event.keyCode == 13) {
                    searchText = $(".searchClass input").val();
                    clearAndLoad(priceGrid, priceGridObj, getSearchStr(priceStrId, priceGridObj, searchText));
                }
            });

            ////////////////////////////////////////////////////
            // MenuForm onButtonClick event //
            ///////////////////////////////////////////////////
            menuForm.attachEvent("onButtonClick", function(menuitemId) {
                if (menuitemId == "selectAll") {

                } else if (menuitemId == "deselectAll") {

                } else if (menuitemId == "save") {
                    priceGridDP.sendData();
                } else if (menuitemId == "add") {
                    addPrice();
                } else if (menuitemId == "apply") {

                } else {
                    alert0("Under Construction...");
                }
            });




            //////////////////////////////////////////////////////////////////////////
            //
            // DATA PROCESSOR
            //
            ///////////////////////////////////////////////////////////////////////
            priceGridDP = new dataProcessor("PHP/priceDP.php?fields=" + priceGridObj.fields);//lock feed url
            priceGridDP.enableDataNames(true);
            priceGridDP.init(priceGrid); //link dataprocessor to the grid
            priceGridDP.setUpdateMode("off", "");
            priceGridDP.attachEvent("onBeforeUpdate", function(id, status) {
                //                alert(id+" "+status);
                return true;
            });
            priceGridDP.attachEvent("onRowMark", function(id, state, mode, is_invalid) {
                if (state == true) {
                    catForm.disableItem("selectCat");
                } else {
                    catForm.enableItem("selectCat");
                }
                return true;
            })
            priceGridDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag) {
                //                alert(sid+" "+action+" "+tid+" "+tag);  
            });


            //////////////////////////////////////////////////////////////////////////
            //
            // FUNCTION
            //
            ///////////////////////////////////////////////////////////////////////


            /////////////////////////////////////////////////////////////////
            // getFlag(grid,gridObj) - add style into priceGridObj
            /////////////////////////////////////////////////////////////////
            function getFlag(grid, gridObj) {
                grid.forEachRow(function(id) {
                    if (this.cells(id, gridObj.flag).getValue() == "CV") {
                        this.cells(id, gridObj.cost).setTextColor("red");
                        this.cells(id, gridObj.vatCode).setTextColor("red");
                    }
                    else if (this.cells(id, gridObj.flag).getValue() == "V") {
                        this.cells(id, gridObj.vatCode).setTextColor("red");
                    }
                    else if (this.cells(id, gridObj.flag).getValue() == "C") {
                        this.cells(id, gridObj.cost).setTextColor("red");
                    }
                });
            }


            ////////////////////////////////////////////////////////////////
            // clearAndLoad(grid,gridObj,loaderStr) - clear grid and reload it from loaderString
            /////////////////////////////////////////////////////////////////
            function clearAndLoad(grid, gridObj, loaderStr) {
                grid.clearAndLoad(loaderStr, function() {
                    document.getElementById("loaderImage").style.display = "none";
                    catForm.setItemLabel("result", priceGrid.getRowsNum() + " product(s) found.");
                    getFlag(grid, gridObj);
                });
            }

            /////////////////////////////////////////////////////////////////
            // addPrice() - Window for adding price from other priceStructure.
            /////////////////////////////////////////////////////////////////
            function addPrice() {
                popupWindow("addPriceWindow.php", "Add Price Window");
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
        </script>
    </body>
</html>
