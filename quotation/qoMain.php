<?php
require("../commons/PHP/session.php");
echo "<script>";
echo "var state = '" . $_REQUEST['state'] . "';";
echo "var partnerId = '" . $_REQUEST['getId'] . "';";
echo "var getCode = '" . $_REQUEST['getCode'] . "';";
echo "var getRowId = '" . $_REQUEST['getRowId'] . "';";
echo "</script>"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>== q o ==</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <style>
                .error {background-color: #ffd4db !important;color:maroon !important;}

                /* above Right*/
                .quoDet fieldset{height:495px;}
                /* center */
                .gridCen fieldset{height:250px;width:995px}
                .totalCen fieldset{height:210px;width:995px}
                /* under Left */
                .button fieldset{height:53px;}
                .termAndCom fieldset{height:250px;}
                .termS fieldset{height:125px;width:500px !important}
                .commisS fieldset{height:55px;width:500px !important}
                /* under Right */
                .vatAndShip fieldset{height:320px;}
                .vatS fieldset{height:65px;}
                .typeS fieldset{height:100px;}
                div#grid{
                    position: absolute;
                    width: 1000px !important;
                    display:block;
                    height: 240px;
                    background: white;
                    top: 334px;
                    left: 15px;
                }
            </style>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
            <script src="../DHX/dhtmlxForm/codebase/dhtmlxcommon.js"></script>
            <script src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
            <script src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_combo.js"></script>

            <script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
            <script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>
            <script src="../DHX/dhtmlxConnector/codebase/connector.js"></script>

            <script language="JavaScript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
            <script src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>
            <script src="../commons/js/fnMainObj_DHX1.0.js" type="text/javascript"></script>
            <script src="../commons/js/toword.js" type="text/javascript"></script>


    </head>

    <body>
        <div id="formm" style="width:50%; float:left;">
            <div id="qoForm" style="height:auto;float:left;overflow:hidden;"></div>
        </div>
        <div id="gridd" style="width:50%; float:left;">
            <div id="headForm"></div>
            <div id="qoGrid" style="height:300px;"></div>
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
            var date = new Date();
            //            var priceStrId = '';
            var masterId = 'ord-' + date.getTime() + "-" + sesUser;
            //HEAD FORM
            var headData = [
                //                {types: 'input', fields: 'priceStrId', keys: 'priceStrId', enLabels: 'priceStrId', thLabels: 'priceStrId'},
                //                {type: "button", name: "add", label: "", value: "Add", offsetLeft: 15}, {type: 'newcolumn'},
                //                {type: "button", name: "delete", label: "", value: "Delete", offsetLeft: 15}
            ];
            //------------------------------------------ set FORM ------------------------------------------//
            var headForm = [
                {type: "button", name: "add", label: "", value: "Add", offsetLeft: 15}, {type: 'newcolumn'},
                {type: "button", name: "delete", label: "", value: "Delete", offsetLeft: 15}];
            var headfO = new fObject;
            headfO.setBeginForm(headData, headForm, "English");
            var headForm = new dhtmlXForm("headForm", headForm);
            headForm.attachEvent("onOptionsLoaded", function(name) {
                //                priceStrId = headForm.getItemValue(name);
                //                alert("$$$$");
            });
            headForm.attachEvent("onButtonClick", headFormButtonClick);

            //masterData
            var data = [
                //                {types:'input',fields:'rowId',keys:'rowId',enLabels:'rowId',thLabels:'rowId'},
                {types: 'input', fields: 'id', keys: 'id', enLabels: 'id', thLabels: 'id'},
                {types: 'input', fields: 'docType', keys: 'docType', enLabels: 'docType', thLabels: 'docType'},
                {types: 'input', fields: 'status', keys: 'status', enLabels: 'status', thLabels: 'status'},
                {types: 'input', fields: 'orderId', keys: 'orderId', enLabels: 'orderId', thLabels: 'orderId'},
                {types: 'input', fields: 'revision', keys: 'revision', enLabels: 'revision', thLabels: 'revision'},
                {types: 'input', fields: 'referenceId', keys: 'referenceId', enLabels: 'referenceId', thLabels: 'referenceId'},
                {types: 'input', fields: 'referenceId2', keys: 'referenceId2', enLabels: 'referenceId2', thLabels: 'referenceId2'},
                {types: 'input', fields: 'createDate', keys: 'createDate', enLabels: 'createDate', thLabels: 'createDate'},
                {types: 'input', fields: 'issueDate', keys: 'issueDate', enLabels: 'issueDate', thLabels: 'issueDate'},
                {types: 'input', fields: 'dueDate', keys: 'dueDate', enLabels: 'dueDate', thLabels: 'dueDate'},
                //                {types:'input',fields:'deliveryDate',keys:'deliveryDate',enLabels:'deliveryDate',thLabels:'deliveryDate'},
                {types: 'input', fields: 'loginCompanyId', keys: 'loginCompanyId', enLabels: 'loginCompanyId', thLabels: 'loginCompanyId'},
                {types: 'input', fields: 'loginUserId', keys: 'loginUserId', enLabels: 'loginUserId', thLabels: 'loginUserId'},
                {types: 'input', fields: 'editorId', keys: 'editorId', enLabels: 'editorId', thLabels: 'editorId'},
                {types: 'input', fields: 'editDate', keys: 'editDate', enLabels: 'editDate', thLabels: 'editDate'},
                {types: 'input', fields: 'approvePersonId', keys: 'approvePersonId', enLabels: 'approvePersonId', thLabels: 'approvePersonId'},
                {types: 'input', fields: 'approvePerson', keys: 'approvePerson', enLabels: 'approvePerson', thLabels: 'approvePerson'},
                {types: 'input', fields: 'approveDate', keys: 'approveDate', enLabels: 'approveDate', thLabels: 'approveDate'},
                {types: 'input', fields: 'customerId', keys: 'customerId', enLabels: 'customerId', thLabels: 'customerId'},
                {types: 'input', fields: 'customerName', keys: 'customerName', enLabels: 'customerName', thLabels: 'customerName'},
                {types: 'input', fields: 'contactPerson', keys: 'contactPerson', enLabels: 'contactPerson', thLabels: 'contactPerson'},
                {types: 'input', fields: 'companyAddress', keys: 'companyAddress', enLabels: 'companyAddress', thLabels: 'companyAddress'},
                {types: 'input', fields: 'shippingAddress', keys: 'shippingAddress', enLabels: 'shippingAddress', thLabels: 'shippingAddress'},
                {types: 'input', fields: 'billingAddress', keys: 'billingAddress', enLabels: 'billingAddress', thLabels: 'billingAddress'},
                {types: 'input', fields: 'tel', keys: 'tel', enLabels: 'tel', thLabels: 'tel'},
                {types: 'input', fields: 'fax', keys: 'fax', enLabels: 'fax', thLabels: 'fax'},
                {types: 'input', fields: 'email', keys: 'email', enLabels: 'email', thLabels: 'email'},
                {types: 'input', fields: 'deliverPlace', keys: 'deliverPlace', enLabels: 'deliverPlace', thLabels: 'deliverPlace'},
                {types: 'input', fields: 'employeeId', keys: 'employeeId', enLabels: 'employeeId', thLabels: 'employeeId'},
                {types: 'input', fields: 'employeeName', keys: 'employeeName', enLabels: 'employeeName', thLabels: 'employeeName'},
                {types: 'input', fields: 'employeeTel', keys: 'employeeTel', enLabels: 'employeeTel', thLabels: 'employeeTel'},
                {types: 'input', fields: 'employeeEmail', keys: 'employeeEmail', enLabels: 'employeeEmail', thLabels: 'employeeEmail'},
                {types: 'input', fields: 'priceStrId', keys: 'priceStrId', enLabels: 'priceStrId', thLabels: 'priceStrId'},
                {types: 'input', fields: 'currency', keys: 'currency', enLabels: 'currency', thLabels: 'currency'},
                {types: 'input', fields: 'discountRate', keys: 'discountRate', enLabels: '', thLabels: ''},
                {types: 'input', fields: 'discount', keys: 'discount', enLabels: '', thLabels: ''},
                {types: 'input', fields: 'includeVat', keys: 'inVat', enLabels: 'Include Vat', thLabels: 'Include Vat'},
                {types: 'input', fields: 'includeVat', keys: 'exVat', enLabels: 'Exclude Vat', thLabels: 'Exclude Vat'},
                {types: 'input', fields: 'totalBeforeVat', keys: 'totalBeforeVat', enLabels: 'totalBeforeVat', thLabels: 'totalBeforeVat'},
                //                {types:'input',fields:'vatRate',keys:'vatRate',enLabels:'vatRate',thLabels:'vatRate'},
                {types: 'input', fields: 'vatAmount', keys: 'vatAmount', enLabels: 'vatAmount', thLabels: 'vatAmount'},
                {types: 'input', fields: 'totalIncludeVatNum', keys: 'totalIncludeVatNum', enLabels: 'totalIncludeVatNum', thLabels: 'totalIncludeVatNum'},
                {types: 'input', fields: 'totalIncludeVatStrThai', keys: 'totalIncludeVatStrThai', enLabels: 'totalIncludeVatStrThai', thLabels: 'totalIncludeVatStrThai'},
                {types: 'input', fields: 'totalIncludeVatStrEnglish', keys: 'totalIncludeVatStrEnglish', enLabels: 'totalIncludeVatStrEnglish', thLabels: 'totalIncludeVatStrEnglish'},
                //                {types:'input',fields:'cash',keys:'cash',enLabels:'cash',thLabels:'cash'},
                //                {types:'input',fields:'changeDue',keys:'changeDue',enLabels:'changeDue',thLabels:'changeDue'},
                //                {types:'input',fields:'vatClaim',keys:'vatClaim',enLabels:'vatClaim',thLabels:'vatClaim'},
                {types: 'input', fields: 'footNote', keys: 'footNote', enLabels: 'footNote', thLabels: 'footNote'},
                {types: 'input', fields: 'paymentTerm', keys: 'paymentTerm', enLabels: 'paymentTerm', thLabels: 'paymentTerm'},
                {types: 'input', fields: 'deliveryTerm', keys: 'deliveryTerm', enLabels: 'deliveryTerm', thLabels: 'deliveryTerm'},
                {types: 'input', fields: 'creditTerm', keys: 'creditTerm', enLabels: 'creditTerm', thLabels: 'creditTerm'},
                //                {types: 'input', fields: 'deposit', keys: 'deposit', enLabels: 'deposit', thLabels: 'deposit'},
                {types: 'input', fields: 'commissionRate', keys: 'commissionRate', enLabels: '', thLabels: ''},
                {types: 'input', fields: 'commissionValue', keys: 'commissionValue', enLabels: '', thLabels: ''},
                {types: 'input', fields: 'shipVia', keys: 'shipVia', enLabels: 'shipVia', thLabels: 'shipVia'},
                {types: 'input', fields: 'domestic', keys: 'local', enLabels: 'Local', thLabels: 'Local'}
                //                {types:'input',fields:'domestic',keys:'export',enLabels:'Export',thLabels:'Export'},
                //                {types:'input',fields:'exportType',keys:'cif',enLabels:'CIF (Cost Insurance Freight)',thLabels:'CIF(Cost  Insurance Freight)'},
                //                {types:'input',fields:'exportType',keys:'fob',enLabels:'FOB (Free On Broad)',thLabels:'FOB(Free  On  Broad)'}
            ];
            //------------------------------------------ set FORM ------------------------------------------//
            var labelW = 100;
            var form = [
                //                {type:'input', name: 'rowId', label:'rowId',value:''},
                {type: 'input', name: '', label: 'id', value: masterId},
                {type: "fieldset", label: "Order Detail", width: 400, className: "quoDet",
                    list: [
                        {type: "settings",
                            position: "label-left",
                            labelAlign: "right",
                            labelWidth: 80
                        },
                        {type: "block",
                            list: [
                                {type: 'input', name: '', label: 'orderId', value: ''},
                                {type: 'input', name: '', label: 'referenceId', value: ''},
                                {type: 'input', name: '', label: 'referenceId2', value: ''},
                                {type: 'input', name: '', label: 'docType', value: 'quotation', disabled: true},
                                {type: 'input', name: '', label: 'status', value: 'draft', disabled: true},
                                {type: 'input', name: '', label: 'revision', value: '0'},
                                {type: 'calendar', name: '', label: 'createDate', value: '', inputWidth: 75, dateFormat: "%Y-%m-%d", serverDateFormat: "%Y-%m-%d", calendarPosition: "right", readonly: true},
                                {type: 'calendar', name: '', label: 'issueDate', value: '', inputWidth: 75, dateFormat: "%Y-%m-%d", serverDateFormat: "%Y-%m-%d", calendarPosition: "right", readonly: true},
                                {type: 'calendar', name: '', label: 'dueDate', value: '', inputWidth: 75, dateFormat: "%Y-%m-%d", serverDateFormat: "%Y-%m-%d", calendarPosition: "right", readonly: true},
                                //                                {type:'calendar', name: '', label:'deliveryDate',value:'',inputWidth:75,dateFormat:"%Y-%m-%d",serverDateFormat:"%Y-%m-%d",calendarPosition:"right",readonly:true},
                                {type: 'input', name: '', label: 'loginCompanyId', value: sesCompanyId},
                                {type: 'input', name: '', label: 'loginUserId', value: sesUserId},
                                {type: 'input', name: '', label: 'editorId', value: ''},
                                {type: 'calendar', name: '', label: 'editDate', value: '', inputWidth: 75, dateFormat: "%Y-%m-%d", serverDateFormat: "%Y-%m-%d", calendarPosition: "right", readonly: true},
                                {type: 'input', name: '', label: 'employeeId', value: ''},
                                {type: 'input', name: '', label: 'employeeName', value: ''},
                                {type: 'input', name: '', label: 'employeeTel', value: ''},
                                {type: 'input', name: '', label: 'employeeEmail', value: ''},
                            ]
                        }
                    ]
                },
                {type: 'input', name: '', label: 'customerId', value: partnerId},
                {type: 'input', name: '', label: 'customerName', value: ''}, {type: "button", name: "selCustomerName", label: "", value: "Select Customer Name", offsetLeft: 15},
                {type: 'input', name: '', label: 'contactPerson', value: ''}, {type: "button", name: "selContactPer", label: "", value: "Select Contact Person", offsetLeft: 15},
                {type: 'input', name: '', label: 'companyAddress', value: '', rows: "2", inputWidth: "250"}, {type: "button", name: "selComAddress", label: "", value: "Select Company Address", offsetLeft: 15},
                {type: 'input', name: '', label: 'shippingAddress', value: '', rows: "2", inputWidth: "250"}, {type: "button", name: "selShipAddress", label: "", value: "Select Shipping Address", offsetLeft: 15},
                {type: 'input', name: '', label: 'billingAddress', value: '', rows: "2", inputWidth: "250"}, {type: "button", name: "selBillAddress", label: "", value: "Select Billing Address", offsetLeft: 15},
                {type: 'input', name: '', label: 'tel', value: ''},
                {type: 'input', name: '', label: 'fax', value: ''},
                {type: 'input', name: '', label: 'email', value: ''},
                {type: 'input', name: '', label: 'deliverPlace', value: ''},
                //                {type: 'input', name: '', label: 'priceStrId'},
                {type: 'input', name: '', label: 'currency', value: ''},
                {type: "fieldset", label: "Discount", className: "commisS",
                    list: [
                        {type: "input", name: "", label: "discountRate", value: "0", inputWidth: "auto", disabled: true},
                        {type: "newcolumn", offset: 0},
                        {type: "label", label: "% <-->"},
                        {type: "newcolumn", offset: 0},
                        {type: "input", name: "", label: "discount", value: "0", inputWidth: "auto", disabled: true},
                        {type: "newcolumn", offset: 0},
                        {type: "label", label: "THB", name: "curr"}
                    ]
                },
                {type: "fieldset", label: "VAT", inputWidth: 345, className: "vatS",
                    list: [
                        {type: "settings",
                            position: "label-left",
                            labelAlign: "right",
                            labelWidth: 80
                        },
                        {type: "radio", name: "inVat", value: "1", label: "Included Vat", position: "label-right", checked: true},
                        {type: "radio", name: "inVat", value: "0", label: "Excluded Vat", position: "label-right"}
                    ]
                },
                {type: 'input', name: '', label: 'totalBeforeVat', value: ''},
                {type: "newcolumn", offset: 0},
                //                {type: "label", label: "", name: "curr"},
                //                {type:'input', name: '', label:'vatRate',value:''},
                {type: 'input', name: '', label: 'vatAmount', value: ''},
                {type: "newcolumn", offset: 0},
                //                {type: "label", label: "", name: "curr"},
                {type: 'input', name: '', label: 'totalIncludeVatNum', value: ''},
                {type: "newcolumn", offset: 0},
                //                {type: "label", label: "", name: "curr"},
                {type: 'input', name: '', label: 'totalIncludeVatStrThai', value: ''},
                {type: 'input', name: '', label: 'totalIncludeVatStrEnglish', value: ''},
                //                {type:'input', name: '', label:'cash',value:''},
                //                {type:'input', name: '', label:'changeDue',value:''},
                //                {type:'input', name: '', label:'vatClaim',value:''},
                //--- DOMESTIC < Shipping >
                //                {type: "fieldset",label: "Domestic Type",inputWidth: 345,className:"typeS",
                //                    list: [
                //                        {type:"settings",
                //                            position:"label-left",
                //                            labelAlign:"right",
                //                            labelWidth:80
                //                        },
                //                        {type: "input", name:"", value:"Local", label:"local",labelWidth: "auto",position: "label-left",checked: true},
                //                        //                        {type: "radio", name:"", value:"", label:"export",labelWidth: "auto",position: "label-right",
                //                        //                            list: [
                //                        //                                {type: "radio", name:"", value:"", label:"cif",labelWidth: "auto",position: "label-right"},
                //                        //                                {type: "radio", name:"", value:"", label:"fob",labelWidth: "auto",position: "label-right"}
                //                        //                            ]
                //                        ////                        },
                //                        {type:'input', name: '', label:'shipVia',value:''}
                //                    ]
                //                },

                //-------------------- Term & Commission(under LEFT) --------------------
                {type: "fieldset", label: "term", className: "termS",
                    list: [
                        {type: "settings",
                            position: "label-left",
                            labelAlign: "right",
                            labelWidth: 80
                        },
                        {type: 'select', name: '', label: 'paymentTerm', value: ''},
                        {type: 'select', name: '', label: 'deliveryTerm', value: ''},
                        {type: 'select', name: '', label: 'creditTerm', value: ''},
                        //                        {type: 'input', name: '', label: 'deposit', value: ''},
                    ]
                },
                {type: 'input', name: '', label: 'footNote', value: '', rows: "2", inputWidth: "250"},
                //-------------------- BUTTON --------------------
                {type: "fieldset", label: "Button", className: "commisS",
                    list: [
                        {type: "button", name: "draft", label: "", value: "Save Draft", offsetLeft: 15},
                        {type: "newcolumn", offset: 0},
                        {type: "button", name: "submit", label: "", value: "Submit", offsetLeft: 15},
                        {type: "newcolumn", offset: 0},
                        {type: "button", name: "cancel", label: "", value: "Cancel", offsetLeft: 15}
                    ]
                },
                {type: "fieldset", label: "Commission", className: "commisS",
                    list: [
                        {type: "input", name: "", label: "commissionRate", value: "", inputWidth: "auto"},
                        {type: "newcolumn", offset: 0},
                        {type: "label", label: "% <-->"},
                        {type: "newcolumn", offset: 0},
                        {type: "input", name: "", label: "commissionValue", value: "", inputWidth: "auto"},
                        {type: "newcolumn", offset: 0},
                        {type: "label", label: "", name: "curr"}
                    ]
                },
                {type: 'input', name: '', label: 'approvePersonId', value: ''},
                {type: 'input', name: '', label: 'approvePerson', value: ''},
                {type: 'input', name: '', label: 'approveDate', value: ''},
                {type: "fieldset", label: "For Approve Person", className: "commisS",
                    list: [
                        {type: "button", name: "approve", label: "", value: "Approve", offsetLeft: 15},
                        {type: "newcolumn", offset: 0},
                        {type: "button", name: "notApprove", label: "", value: "Not Approve", offsetLeft: 15}
                    ]
                }
            ];
            var fO = new fObject;
            fO.setBeginForm(data, form, "English");
            var myForm = new dhtmlXForm("qoForm", form);
            myForm.load("PHP/loadCustomerInfo.php?fields=customerName,fax,email,tel&partnerId=" + partnerId + "&id=");
            myForm.load("PHP/loadEmployeeInfo.php?fields=employeeId,employeeName,employeeEmail,employeeTel&id=");
            myForm.load("PHP/loadAddress.php?fields=companyAddress&id=&partnerId=" + partnerId + "&type=office");
            myForm.load("PHP/loadAddress.php?fields=shippingAddress&id=&partnerId=" + partnerId + "&type=shipping");
            myForm.load("PHP/loadAddress.php?fields=billingAddress&id=&partnerId=" + partnerId + "&type=billing");
            myForm.attachEvent("onButtonClick", onButtonClick);
            //            GRID
            var qoGrid = new dhtmlXGridObject("qoGrid");
            var detailData = [
                //                {fields: 'rowId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'rowId', thNames: 'rowId'},
                {fields: 'id', aligns: 'left', widths: '50', types: 'tree', hides: false, enNames: 'id', thNames: 'id'},
                {fields: 'orderId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'orderId', thNames: 'orderId'},
                {fields: 'jobNumber', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'jobNumber', thNames: 'jobNumber'},
                {fields: 'priceStrId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'priceStrId', thNames: 'priceStrId'},
                {fields: 'productStrId', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'productStrId', thNames: 'productStrId'},
                {fields: 'cost', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'cost', thNames: 'cost'},
                {fields: 'price', aligns: 'left', widths: '50', types: 'ed', hides: false, enNames: 'price', thNames: 'price'},
                {fields: 'total', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'total', thNames: 'total'},
                {fields: 'currency', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'currency', thNames: 'currency'},
                {fields: 'amount', aligns: 'left', widths: '50', types: 'ed', hides: false, enNames: 'amount', thNames: 'amount'},
                {fields: 'unitAmount', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'unitAmount', thNames: 'unitAmount'},
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
                {fields: 'image', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'image', thNames: 'image'},
                {fields: 'volume', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'volume', thNames: 'volume'},
                {fields: 'unitVolume', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'unitVolume', thNames: 'unitVolume'},
                {fields: 'weight', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'weight', thNames: 'weight'},
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
                {fields: 'status', aligns: 'left', widths: '50', types: 'ro', hides: false, enNames: 'status', thNames: 'status'}];
            var qoObj = new cObject;
            qoObj.setBegin(qoGrid, detailData, 0); //0=en 1=th
            qoGrid.setSkin("dhx_skyblue");
            qoGrid.setImagePath("../common/imgs/");
            qoGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            qoGrid.enableAutoWidth(true);
            qoGrid.enableHeaderMenu();
            qoGrid.attachEvent("onOpenStart", function(id,state){
                if(qoGrid.getOpenState(id) == false){
                    //-------------------------- Add Child-------------------------
                    //                        alert(allFieldsStr+" -- Add has child: "+qoGrid.hasChildren(id));
                    var strId = qoGrid.cells(id,qoObj.productStrId).getValue();
                    dhtmlxAjax.get("PHP/load_level2/load_level2_str.php?strId="+strId+"&fields="+qoObj.fields,function(loader){
//                        console.dir(loader.xmlDoc);
                        var dataJson = JSON.parse(loader.xmlDoc.responseText);
                        for(var i=0; i<dataJson.length; i++){
                            var date = new Date();
                            dataJson[i][qoObj.id] = 'ode-' + date.getTime() + "-" + sesUser;
                            var rowIndex = qoGrid.getRowIndex(id)+1;
                            qoGrid.addRow(qoGrid.uid(), dataJson[i], rowIndex, id);
                        }
                        qoGrid.expandAll();
                        return true;
                    });
                }else{
                    //-------------------------- DELETE Child-------------------------
                    qoGrid.deleteChildItems(id);
                    return true;
                }
            });
            qoGrid.init();
            //            qoGrid.loadXML("PHP/priceStrGroupLoad.php?fields="+obj.fields+"&comId=system");

            //END GRID
            //##########################################
            // DATA PROCESSOR
            // ##########################################
            qoGridDP = new dataProcessor("PHP/orderdetail.php?fields=" + qoObj.fields);//lock feed url
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
            formDP = new dataProcessor('PHP/ordermaster.php?fields='+fO.fields+"&id=");
            formDP.init(myForm);
            formDP.setUpdateMode('off','');
            formDP.attachEvent('onAfterUpdate',function(sid,action,tid,tag){
                qoGridDP.sendData();
            });
            //##########################################
            // EVENT
            //##########################################
            qoGrid.attachEvent("onRowAdded", function(rId) {
                myForm.setItemValue("currency", qoGrid.cells(rId, qoObj.currency).getValue());
                myForm.enableItem('discount');
                myForm.enableItem('discountRate');
                sumTotal();
            });
            qoGrid.attachEvent("onEditCell", function(stage, rId, cInd, nValue, oValue) {
                if (cInd == qoObj.amount && stage == 2) {
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
                alert("onFocus " + name + " " + value);
            });
            myForm.attachEvent("onInputChange", function(name, value, form) {
                //any custom logic here
                alert("onInputChange " + name + " " + value);
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
                    alert("submit");
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
                if (myForm.getItemValue('inVat') == 1) {
                    //                    alert("includedVat");
                    addIncludedVat(sum, myForm.getItemValue('discount'));
                } else if (myForm.getItemValue('inVat') == 0) {
                    //                    alert('excludedVat');
                    addExcludedVat(sum, myForm.getItemValue('discount'));
                }

                discount("discountRate");
            }
            //#####################################
            // sumOrder
            // ####################################
            function sumOrder() {
                //Sum to total
                var sum = 0;
                qoGrid.forEachRow(function(id) {
                    sum += parseFloat(qoGrid.cells(id, qoObj.price).getValue() * qoGrid.cells(id, qoObj.amount).getValue());
                });
                return sum;
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
                if (myForm.getItemValue('inVat') == 1) {
                    //                    alert("includedVat");
                    addIncludedVat(sumOrder(), myForm.getItemValue('discount'));
                } else if (myForm.getItemValue('inVat') == 0) {
                    //                    alert('excludedVat');
                    addExcludedVat(sumOrder(), myForm.getItemValue('discount'));
                }
            }
            //#####################################
            // addIncludedVat Price
            //####################################
            function addIncludedVat(price, discount) {
                //                alert(typeof discount);
                price = price - discount;
                //                alert(price);
                //Calculation part
                var vatRate = (7 / 100).toFixed(2);
                var vatAmount = (price * vatRate).toFixed(2);
                var totalBeforeVat = (price - vatAmount).toFixed(2);
                //setItemValue
                //                myForm.setItemValue("vatRate",vatRate.toFixed(2));
                myForm.setItemValue("totalIncludeVatNum", price.toFixed(2));
                myForm.setItemValue("vatAmount", vatAmount);
                myForm.setItemValue("totalBeforeVat", totalBeforeVat);
                myForm.setItemValue("totalIncludeVatStrEnglish", toWords(myForm.getItemValue("totalIncludeVatNum")) + myForm.getItemValue("currency"));
                myForm.setItemValue("totalIncludeVatStrThai", toThaiWord(myForm.getItemValue("totalIncludeVatNum"), "บาท"));
                //                console.log(vatRate+" "+vatAmount+" "+totalBeforeVat+" "+(vatAmount+totalBeforeVat));
            }
            //#####################################
            // addExcludedVat Price
            //####################################
            function addExcludedVat(price, discount) {
                var totalBeforeVat = price.toFixed(2);
                totalBeforeVat = totalBeforeVat - discount;
                //Calculation part
                var vatRate = 7 / 100;
                var vatAmount = (totalBeforeVat * (vatRate)).toFixed(2);
                var totalIncludeVatNum = (totalBeforeVat * (1 + vatRate)).toFixed(2);
                //setItemValue
                //                myForm.setItemValue("vatRate",vatRate.toFixed(2));
                myForm.setItemValue("totalIncludeVatNum", totalIncludeVatNum);
                //                console.log("$$$$$");
                myForm.setItemValue("vatAmount", vatAmount);
                myForm.setItemValue("totalBeforeVat", totalBeforeVat);
                myForm.setItemValue("totalIncludeVatStrEnglish", toWords(myForm.getItemValue("totalIncludeVatNum")) + myForm.getItemValue("currency"));
                myForm.setItemValue("totalIncludeVatStrThai", toThaiWord(myForm.getItemValue("totalIncludeVatNum"), "บาท"));
                //                console.log(vatRate+" "+vatAmount+" "+totalBeforeVat+" "+(vatAmount+totalBeforeVat));
            }
        </script>
    </body>


</html>