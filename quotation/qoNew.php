<?php
require("../commons/PHP/session.php");
//echo "<script>";
//echo "var state = '" . $_REQUEST['state'] . "';";
//echo "var partnerId = '" . $_REQUEST['getId'] . "';";
//echo "var getCode = '" . $_REQUEST['getCode'] . "';";
//echo "var viewApprove ='" . $_REQUEST['viewApprove'] . "';";
//echo "var getRowId = '" . $_REQUEST['getRowId'] . "';";
//echo "</script>"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>== q o ==</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <link type="text/css" href="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css" rel="stylesheet"/>
            <link type="text/css" href="../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css" rel="stylesheet"/>
            <link type="text/css" href="../DHX/dhtmlxMenu/codebase/skins/dhtmlxmenu_dhx_skyblue.css" rel="stylesheet"/>
            <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxLayout/codebase/dhtmlxlayout.css"/>
            <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css"/>
            <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.css"/>
            <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxLayout/codebase/skins/dhtmlxlayout_dhx_skyblue.css"/>
            <link type="text/css" href="../DHX/dhtmlxAccordion/codebase/skins/dhtmlxaccordion_dhx_skyblue.css" rel="stylesheet"/>
            <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm3.6/codebase/skins/dhtmlxform_dhx_skyblue.css"/>
            <link rel="stylesheet" type="text/css" href="css/qoStyle.css"/>


            <style>
                .error {background-color: #ffd4db !important;color:maroon !important;}
            </style>
            <script>_css_prefix = "../../DHX/dhtmlxGrid/codebase/";
                dhtmlx = {};
                function alert0(str) {
                    dhtmlx.message.defPosition = "top";
                    dhtmlx.message({
                        text: str,
                        id: "s2",
                        lifetime: 3000,
                        type: "error"
                    });
                }
            </script> <!-- to use with alert0-->

            <script src="../DHX/dhtmlxLayout/codebase/dhtmlxcommon.js"></script>
            <script src="../DHX/dhtmlxLayout/codebase/dhtmlxlayout.js"></script>
            <script src="../DHX/dhtmlxLayout/codebase/dhtmlxcontainer.js"></script>
            <script src="../DHX/dhtmlxWindows/codebase/dhtmlxcommon.js"></script>
            <script src="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.js"></script>
            <script src="../DHX/dhtmlxWindows/codebase/dhtmlxcontainer.js"></script>
            <script src="../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
            <script src="../DHX/dhtmlxAccordion/codebase/dhtmlxcommon.js"></script>

            <script src="../DHX/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
            <script src="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>
            <script src="../DHX/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
            <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
            <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_link.js"></script>
            <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_filter.js"></script>	
            <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_undo.js"></script>	
            <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_group.js"></script>
            <script src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_drag.js"></script>
            <script  src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_hmenu.js"></script>
            <script  src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
            <script  src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_mcol.js"></script>
            <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_combo.js" type="text/javascript"></script>
            <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>
            <script src="../DHX/dhtmlxTreeGrid/codebase/dhtmlxtreegrid.js"></script>
            <script src="../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_filter.js"></script>
            <script src="../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_lines.js"></script>
            <!-- dhtmlxForm -->
            <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css"/>
            <script src="../DHX/dhtmlxForm3.6/codebase/dhtmlxcommon.js"></script>
            <script src="../DHX/dhtmlxForm3.6/codebase/dhtmlxform.js"></script>
            <script src="../DHX/dhtmlxForm3.6/codebase/ext/dhtmlxform_item_combo.js"></script>
            <script src="../DHX/dhtmlxForm3.6/codebase/ext/dhtmlxform_dyn.js"></script>

            <script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
            <!--<script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>-->
            <script src="../DHX/dhtmlxConnector/codebase/connector.js"></script>

            <script language="JavaScript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
            <script src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>
            <script src="../commons/js/fnMainObj_DHX1.0.js" type="text/javascript"></script>
            <script src="../commons/js/toword.js" type="text/javascript"></script>
            <!-- Variable -->
            <script src="varGrid.js" type="text/javascript"></script>
            <script src="varForm.js" type="text/javascript"></script>

    </head>

    <body>
        <div id="formm" style="width:100%; float:left;">
            <div id="qoForm" style="height:auto;float:left;overflow:hidden;"></div>
        </div>
        <div id="gridd" style="width:100%; position:absolute; top:440px; left: 30px;">
            <div id="headForm"></div>
            <div id="qoGrid" style="height:300px;width:90%;"></div>
        </div>
        <div id="addPriceWin" style="background-color:white;overflow:hidden;width:100%;float:right;">
            <div id="addCatControl" width="100%" height="10%" style="background-color:white;overflow:hidden;margin-bottom:5px;"></div>
            <div id="addGrid" width="100%" height="400px" style="background-color:white;overflow:hidden"></div>
            <div id="addForm" width="700px" height="10%" style="float:left"></div>
        </div>
        <div id="approveForm"></div>
        <script>
            //#################################################
            // Init
            //#################################################
            var state = '<?= $_REQUEST['state'] ?>';
            var getCode = '<?= $_REQUEST['getCode'] ?>';
            var viewApprove = '<?= $_REQUEST['viewApprove'] ?>';
            var getRowId = '<?= $_REQUEST['getRowId'] ?>';
            var partnerId = '<?= $_REQUEST['getId']?>';
            //HEAD FORM
            var headData = [
                //                {types: 'input', fields: 'priceStrId', keys: 'priceStrId', enLabels: 'priceStrId', thLabels: 'priceStrId'},
                //                {type: "button", name: "add", label: "", value: "Add", offsetLeft: 15}, {type: 'newcolumn'},
                //                {type: "button", name: "delete", label: "", value: "Delete", offsetLeft: 15}
            ];
            //------------------------------------------ set FORM ------------------------------------------//
            var headForm = [
                {type: "button", name: "add", label: "", value: "Add", offsetLeft: 15}, {type: 'newcolumn'},
                {type: "button", name: "delete", label: "", value: "Delete", offsetLeft: 15}
            ];
            var headfO = new fObject;
            headfO.setBeginForm(headData, headForm, "English");
            var headForm = new dhtmlXForm("headForm", headForm);
            headForm.attachEvent("onOptionsLoaded", function(name) {
                //                priceStrId = headForm.getItemValue(name);
                //                alert("$$$$");
            });
            headForm.attachEvent("onButtonClick", headFormButtonClick);
            //masterData

            //------------------------------------------ set FORM ------------------------------------------//
            //################################################################################
            //                                                                              ##
            //                          SET FORM (qoForm)                                   ##
            //                                                                              ##
            //################################################################################
            var labelW = 100;
            //var data --> include varForm.js
            //var form --> include varForm.js
            var fO = new fObject;
            fO.setBeginForm(data, form, "English");
            var myForm = new dhtmlXForm("qoForm", form);
            //            myForm.load("PHP/loadCustomerInfo.php?fields=customerName,fax,email,tel&partnerId=" + partnerId + "&id=");
            //            myForm.load("PHP/loadEmployeeInfo.php?fields=employeeId,employeeName,employeeEmail,employeeTel&id=");
            //            myForm.load("PHP/loadAddress.php?fields=companyAddress&id=&partnerId=" + partnerId + "&type=office");
            //            myForm.load("PHP/loadAddress.php?fields=shippingAddress&id=&partnerId=" + partnerId + "&type=shipping");
            //            myForm.load("PHP/loadAddress.php?fields=billingAddress&id=&partnerId=" + partnerId + "&type=billing");

            myForm.attachEvent("onButtonClick", onButtonClick);
            //################################################################################
            //                                                                              ##
            //                          SET GRID (qoGrid)                                   ##
            //                                                                              ##
            //################################################################################
            var qoGrid = new dhtmlXGridObject("qoGrid");
            //var detailData --> include varGrid.js
            var qoObj = new cObject;
            qoObj.setBegin(qoGrid, detailData, 0); //0=en 1=th
            qoGrid.setSkin("dhx_skyblue");
            qoGrid.setImagePath("../common/imgs/");
            qoGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            //            qoGrid.enableAutoWidth(true);
            qoGrid.enableHeaderMenu();
            qoGrid.attachEvent("onOpenStart", function(id, state) {
                if (qoGrid.getOpenState(id) == false) {
                    //-------------------------- Add Child-------------------------
                    //                        alert(allFieldsStr+" -- Add has child: "+qoGrid.hasChildren(id));
                    var strId = qoGrid.cells(id, qoObj.productStrId).getValue();
                    dhtmlxAjax.get("PHP/load_level2/load_level2_str.php?strId=" + strId + "&fields=" + qoObj.fields, function(loader) {
                        //                        console.dir(loader.xmlDoc);
                        var dataJson = JSON.parse(loader.xmlDoc.responseText);
                        for (var i = 0; i < dataJson.length; i++) {
                            var date = new Date();
                            dataJson[i][qoObj.id] = 'ode-' + date.getTime() + "-" + sesUser;
                            var rowIndex = qoGrid.getRowIndex(id) + 1;
                            qoGrid.addRow(qoGrid.uid(), dataJson[i], rowIndex, id);
                        }
                        qoGrid.expandAll();
                        return true;
                    });
                } else {
                    //-------------------------- DELETE Child-------------------------
                    qoGrid.deleteChildItems(id);
                    return true;
                }
            });
            qoGrid.init();
            //            qoGrid.loadXML("PHP/priceStrGroupLoad.php?fields="+obj.fields+"&comId=system");

            //END GRID
            dhtmlxAjax.get("PHP/selectOption/qoSelectOption.php?partnerId=" + partnerId + "&type=payment Term" + "&lang=" + _language, function(loader) {
                if (loader.xmlDoc.responseText) {
                    var $array = JSON.parse(loader.xmlDoc.responseText);
                    for (var i in $array) {
                        var selPay = myForm.getSelect("paymentTerm"); //htmlSelectElement
                        var opt = document.createElement("option"); //hmtlOptionElement

                        var setOpt = $array[i].split(":");
                        opt.value = setOpt[0];
                        opt.text = setOpt[1];
                        if (setOpt[2]) {
                            if (setOpt[2] == "selected") {
                                opt.selected = true;
                            } else {
                                opt.disabled = true;
                            }
                        }
                        selPay.add(opt, null);
                    }
                }
            });
            if (state == 'new') {
                var date = new Date();
                var _language = (sesLanguage == "English") ? 'englishName' : 'thaiName';
                //            var priceStrId = '';
                var masterId = 'ord-' + date.getTime() + "-" + sesUser;
                myForm.setItemValue('customerId', partnerId);
                myForm.setItemValue('id', masterId);
                myForm.setItemValue('loginCompanyId', sesCompanyId);
                myForm.setItemValue('loginUserId', sesUserId);
                dhtmlxAjax.get("PHP/loadCustomerInfo.php?partnerId=" + partnerId, function(loader) {
                    if (loader.xmlDoc.responseText) {
                        //                    console.dir(loader.xmlDoc.responseText);
                        var response = JSON.parse(loader.xmlDoc.responseText);
                        //                    console.dir(response);
                        myForm.setItemValue('customerName', response[0]);
                        myForm.setItemValue('fax', response[1]);
                        myForm.setItemValue('email', response[2]);
                        myForm.setItemValue('tel', response[3]);
                    }
                });
                dhtmlxAjax.get("PHP/loadEmployeeInfo.php", function(loader) {
                    if (loader.xmlDoc.responseText) {
                        //                    console.dir(loader.xmlDoc.responseText);
                        var response = JSON.parse(loader.xmlDoc.responseText);
                        //                    console.dir(response);
                        myForm.setItemValue('employeeId', response[0]);
                        myForm.setItemValue('employeeName', response[1]);
                        myForm.setItemValue('employeeEmail', response[2]);
                        myForm.setItemValue('employeeTel', response[3]);
                    }
                });
                dhtmlxAjax.get("PHP/loadAddress.php?partnerId=" + partnerId + "&type=office", function(loader) {
                    //                console.dir(loader);
                    if (loader.xmlDoc.responseText) {
                        //                    console.dir(loader.xmlDoc.responseText);
                        var response = JSON.parse(loader.xmlDoc.responseText);
                        //                    alert(response);
                        myForm.setItemValue('companyAddress', response[0]);
                    }
                });
                dhtmlxAjax.get("PHP/loadAddress.php?partnerId=" + partnerId + "&type=shipping", function(loader) {
                    //                console.dir(loader);
                    if (loader.xmlDoc.responseText) {
                        //                    console.dir(loader.xmlDoc.responseText);
                        var response = JSON.parse(loader.xmlDoc.responseText);
                        //                    alert(response);
                        myForm.setItemValue('shippingAddress', response[0]);
                    }
                });
                dhtmlxAjax.get("PHP/loadAddress.php?partnerId=" + partnerId + "&type=billing", function(loader) {
                    //                console.dir(loader);
                    if (loader.xmlDoc.responseText) {
                        //                    console.dir(loader.xmlDoc.responseText);
                        var response = JSON.parse(loader.xmlDoc.responseText);
                        //                    alert(response);
                        myForm.setItemValue('billingAddress', response[0]);
                    }
                });
            } else if (state == 'draft') {

            } else if (state == 'submit') {

            } else if (state == 'approved') {

            }


            //View APPROVE Checking
            if (viewApprove == 'true') {

            } else {
                myForm.hideItem("Commission");
                myForm.hideItem('')
            }
            //##########################################
            // DATA PROCESSOR
            // ##########################################
            qoGridDP = new dataProcessor("PHP/orderdetail.php?fields=" + qoObj.fields); //lock feed url
            //            qoGridDP.enableDataNames(true);
            qoGridDP.init(qoGrid); //link dataprocessor to the grid
            qoGridDP.setUpdateMode("off", "");
            qoGridDP.attachEvent("onBeforeUpdate", function(id, status) {
                //                alert(id + " " + status);
                return true;
            });
            qoGridDP.attachEvent("onRowMark", function(id, state, mode, is_invalid) {
                if (state == true) {

                } else {

                }
                return true;
            })
            qoGridDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag) {
                //                alert(sid+" "+action+" "+tid+" "+tag);  
            });
            /// FORM DP
            formDP = new dataProcessor('PHP/ordermaster.php?fields = ' + fO.fields + "&id=");
            formDP.init(myForm);
            formDP.setUpdateMode('off', '');
            formDP.attachEvent('onAfterUpdate', function(sid, action, tid, tag) {
                alert(action);
                if (action == 'inserted') {
                    qoGridDP.sendData();
                } else {

                }
            });
            //##########################################
            // EVENT
            //##########################################
            qoGrid.attachEvent("onRowAdded", function(rId) {
                myForm.setItemValue("unitCost", qoGrid.cells(rId, qoObj.unitCost).getValue());
                myForm.enableItem('discount');
                myForm.enableItem('discountRate');
                sumTotal();
            });
            qoGrid.attachEvent("onEditCell", function(stage, rId, cInd, nValue, oValue) {
                if (cInd == qoObj.quantity && stage == 2) {
                    sumTotal();
                    return true;
                }
                if (cInd == qoObj.price && stage == 2) {
                    if (nValue <= oValue) {
                        alert0("แก้เพิ่มราคาได้เท่านั้น");
                        return false;
                    } else {
                        return true;
                    }
                }
            });
            qoGrid.attachEvent("onAfterRowDeleted", function(id, pid) {
                sumTotal();
                if (qoGrid.getRowsNum() == 1) {
                    myForm.disableItem('discount');
                    myForm.disableItem('discountRate');
                }
            });
            myForm.attachEvent("onFocus", function(name, value) {
                //any custom logic here
                //                alert("onFocus " + name + " " + value);
            });
            myForm.attachEvent("onInputChange", function(name, value, form) {
                //any custom logic here
                //                alert("onInputChange " + name + " " + value);
            });
            myForm.attachEvent("onChange", function(id, value, checked) {
                //any custom logic here
                if (id == "inVat") {
                    sumTotal();
                }
                if (id == "discount" || id == "discountRate") {
                    //calculate discount
                    discount(id);
                }
            });
            function headFormButtonClick(id) {
                if (id == "add") {
                    //                    alert(myForm.getItemValue("inVat"));
                    addPrice();
                } else if (id == 'delete') {
                    if (qoGrid.getSelectedRowId()) {
                        qoGrid.deleteSelectedRows();
                    }
                }
            }

            //onMasterClick
            function onButtonClick(id) {
                if (id == 'selCustomerName' || id == 'selContactPer' || id == 'selComAddress' || id == 'selShipAddress' || id == 'selBillAddress') {
                    selWin(id);
                } else if (id == "draft") {
                    myForm.save();
                } else if (id == "submit") {
                    myForm.setItemValue('status', 'submit');
                    myForm.save();
                } else if (id == "cancel") {

                } else if (id == "approve") {

                } else if (id == "notApprove") {

                }
            }

            // Create windows for select customer name, contact person and addresses
            function selWin(id) {
                dhtmlx.skin = "dhx_skyblue";
                window.dhx_globalImgPath = "../DHX/dhtmlxCombo/codebase/imgs/";
                //---------------------------------------------------------end form
                var dhxWins = new dhtmlXWindows();
                dhxWins.setImagePath("../DHX/dhtmlxWindows/codebase/imgs");
                if (id == 'selCustomerName') {
                    var addressWindows = dhxWins.createWindow("selCustomerWin", 90, 90, 400, 400);
                    dhxWins.window("selCustomerWin").center();
                    var grid = dhxWins.window("selCustomerWin").attachGrid();
                    var customerData = [{fields: 'thaiName', aligns: 'center', widths: '100', types: 'ro', hides: false, enNames: 'ID', thNames: 'รหัส'},
                        {fields: 'englishName', aligns: 'center', widths: '200', types: 'ro', hides: false, enNames: 'Employee Name', thNames: 'ชื่อ-สกุล พนักงาน'}];
                    var obj = new cObject;
                    obj.setBegin(grid, customerData, 0);
                    grid.init();
                    grid.loadXML("PHP/windowGridLoad.php?fields=" + obj.fields + "&getId=" + partnerId + "&getType=" + id);
                    grid.attachEvent("onRowSelect", function(id, ind) {
                        myForm.setItemValue("customerName", grid.cells(id, ind).getValue());
                        grid.clearSelection();
                        dhxWins.window("selCustomerWin").close();
                    });
                } else if (id == 'selContactPer') {
                    var addressWindows = dhxWins.createWindow("selCustomerWin", 90, 90, 400, 400);
                    dhxWins.window("selCustomerWin").center();
                    var grid = dhxWins.window("selCustomerWin").attachGrid();
                    var customerData = [{fields: 'thaiName', aligns: 'center', widths: '100', types: 'ro', hides: false, enNames: 'ID', thNames: 'รหัส'},
                        {fields: 'englishName', aligns: 'center', widths: '200', types: 'ro', hides: false, enNames: 'Employee Name', thNames: 'ชื่อ-สกุล พนักงาน'}];
                    var obj = new cObject;
                    obj.setBegin(grid, customerData, 0);
                    grid.init();
                    grid.loadXML("PHP/windowGridLoad.php?fields=" + obj.fields + "&getId=" + partnerId + "&getType=" + id);
                    grid.attachEvent("onRowSelect", function(id, ind) {
                        myForm.setItemValue("contactPerson", grid.cells(id, ind).getValue());
                        grid.clearSelection();
                        dhxWins.window("selCustomerWin").close();
                    });
                } else if (id == 'selComAddress' || id == 'selBillAddress' || id == 'selShipAddress') {
                    var addressWindows = dhxWins.createWindow("selCustomerWin", 90, 90, 400, 400);
                    var addGrid = dhxWins.window("selCustomerWin").attachGrid();
                    var addData = [{fields: 'Address', aligns: 'center', widths: '400', types: 'ro', hides: false, enNames: 'ID', thNames: 'Address'}];
                    var addObj = new cObject;
                    addObj.setBegin(addGrid, addData, 0);
                    addGrid.init();
                    addGrid.loadXML("PHP/windowGridLoad.php?fields=" + addObj.fields + "&getId=" + partnerId + "&getType=" + id);
                    addGrid.attachEvent("onRowSelect", function(rowId, ind) {
                        if (id == 'selComAddress') {
                            myForm.setItemValue("companyAddress", addGrid.cells(rowId, ind).getValue());
                        } else if (id == 'selBillAddress') {
                            myForm.setItemValue("billingAddress", addGrid.cells(rowId, ind).getValue());
                        } else if (id == 'selShipAddress') {
                            myForm.setItemValue("shippingAddress", addGrid.cells(rowId, ind).getValue());
                        }
                        addGrid.clearSelection();
                        dhxWins.window("selCustomerWin").close();
                    });
                }

            }
////////////////////////////////////////////////////////////////
// FUNCTION
////////////////////////////////////////////////////////////////

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
                var newwindow = window.open(url, windowName, 'height=600,width=720');
                if (window.focus) {
                    newwindow.focus()
                }
                return false;
            }
//////////////////////////////////////////////////////////////////
// sumTotal
// ####################################
            function sumTotal() {
//Sum to total
                var sum = sumOrder();
                console.log('Total :' + sum);
                var sdiscount = sumDiscount();
                console.log("Discount :" + sdiscount);
                myForm.setItemValue('totalBeforeDiscount', sum.toFixed(2));
                myForm.setItemValue('sumDiscount', sdiscount.toFixed(2));
                if (myForm.getItemValue('inVat') == 1) {
//                    alert("includedVat");
                    addIncludedVat(sum, myForm.getItemValue('discount'), sdiscount);
                } else if (myForm.getItemValue('inVat') == 0) {
//                    alert('excludedVat');
                    addExcludedVat(sum, myForm.getItemValue('discount'), sdiscount);
                }

                discount("discountRate");
//                alert(sum);
            }
//#####################################
// sumOrder
// ####################################
            function sumOrder() {
//Sum to total
                var sum = 0;
                qoGrid.forEachRow(function(id) {
                    sum += parseFloat(qoGrid.cells(id, qoObj.price).getValue() * qoGrid.cells(id, qoObj.quantity).getValue());
                });
                return sum;
            }
            function sumDiscount() {
                var discount = 0;
                qoGrid.forEachRow(function(id) {
                    console.log("Discount Value = " + qoGrid.cells(id, qoObj.discount).getValue());
                    discount += parseFloat(qoGrid.cells(id, qoObj.discount).getValue() * parseInt(qoGrid.cells(id, qoObj.quantity).getValue()));
                    console.log("Discount :" + discount);
                });
                return discount;
            }
//######################################
// discount()
//######################################
            function discount(id) {
                if (id == "discount") {
                    var discount = parseFloat(myForm.getItemValue('discount'));
                    var total = parseFloat(sumOrder());
                    var discountRate = (discount / total) * 100;
                    myForm.setItemValue('discountRate', discountRate.toFixed(2));
                } else if (id == "discountRate") {
                    var discountRate = parseFloat(myForm.getItemValue('discountRate'));
                    var total = parseFloat(sumOrder());
                    var discount = total * discountRate / 100;
                    myForm.setItemValue('discount', discount.toFixed(2));
                }
                if (myForm.getItemValue('inVat') == "included") {
                    addIncludedVat(sumOrder(), myForm.getItemValue('discount'), myForm.getItemValue('sumDiscount'));
                } else if (myForm.getItemValue('inVat') == 'excluded') {
                    addExcludedVat(sumOrder(), myForm.getItemValue('discount'), myForm.getItemValue('sumDiscount'));
                }
            }
//#####################################
// addIncludedVat Price
//####################################
            function addIncludedVat(price, discount, Discount) {
//                alert(typeof discount);
                price = price - discount - Discount;
//                alert(price);
//Calculation part
                var vatValue = 7;
                var vatRate = (vatValue / 100).toFixed(2);
                var vatAmount = (price * vatRate).toFixed(2);
                var totalBeforeVat = (price - vatAmount).toFixed(2);
//setItemValue
//                myForm.setItemValue("vatRate",vatRate.toFixed(2));
                myForm.setItemValue("totalIncludeVatNum", price.toFixed(2));
                myForm.setItemValue("vatAmount", vatAmount);
                myForm.setItemValue("totalBeforeVat", totalBeforeVat);
                myForm.setItemValue("totalIncludeVatStrEnglish", toWords(myForm.getItemValue("totalIncludeVatNum")) + myForm.getItemValue("unitCost"));
                myForm.setItemValue("totalIncludeVatStrThai", toThaiWord(myForm.getItemValue("totalIncludeVatNum"), "บาท"));
//                console.log(vatRate+" "+vatAmount+" "+totalBeforeVat+" "+(vatAmount+totalBeforeVat));
            }
//#####################################
// addExcludedVat Price
//####################################
            function addExcludedVat(price, discount, Discount) {
                var totalBeforeVat = price.toFixed(2);
                var dis = discount;
                var sDis = Discount;
                totalBeforeVat = totalBeforeVat - dis - sDis;
//Calculation part
                var vatValue = 7;
                var vatRate = (vatValue / 100).toFixed(2);
                var vatAmount = (totalBeforeVat * (vatRate)).toFixed(2);
                var totalIncludeVatNum = (totalBeforeVat * (1 + vatRate)).toFixed(2);
//setItemValue
//                myForm.setItemValue("vatRate",vatRate.toFixed(2));
                myForm.setItemValue("totalIncludeVatNum", totalIncludeVatNum);
//                console.log("$$$$$");
                myForm.setItemValue("vatAmount", vatAmount);
                myForm.setItemValue("totalBeforeVat", totalBeforeVat);
                myForm.setItemValue("totalIncludeVatStrEnglish", toWords(myForm.getItemValue("totalIncludeVatNum")) + myForm.getItemValue("unitCost"));
                myForm.setItemValue("totalIncludeVatStrThai", toThaiWord(myForm.getItemValue("totalIncludeVatNum"), "บาท"));
//                console.log(vatRate+" "+vatAmount+" "+totalBeforeVat+" "+(vatAmount+totalBeforeVat));
            }
//###############################################################
// SET VALUE DATE
//###############################################################
            function setValueDate(showD, hideD) {
                if (myForm.getItemValue(showD) !== null) {
                    var staS = myForm.getCalendar(showD);
                    var gDate = staS.getDate();
                    var sDate = gDate.getFullYear() + "-" + _month(gDate) + "-" + _d(gDate);
                    myForm.setItemValue(hideD, sDate);
                }
            }
        </script>
    </body>


</html>