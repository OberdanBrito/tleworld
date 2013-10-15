<?php
require("../commons/PHP/session.php");
echo "<script>";
echo "var orderId = '" . $_REQUEST['getOrderId'] . "';";
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
            <script src="../DHX/dhtmlxForm/codebase/dhtmlxcommon.js"></script>
            <script src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
            <script src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_combo.js"></script>

            <script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
            <!--<script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>-->
            <script src="../DHX/dhtmlxConnector/codebase/connector.js"></script>

            <script language="JavaScript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
            <script src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>
            <script src="../commons/js/fnMainObj_DHX1.0.js" type="text/javascript"></script>
            <script src="../commons/js/toword.js" type="text/javascript"></script>
            <script src="varForm.js" type="text/javascript"></script>
            <script src="varGrid.js" type="text/javascript"></script>


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
        <div id="genPDFbutton"></div>
        <script>
            //#################################################
            // Init
            //#################################################
            //genPDFbutton
            var PDFdata = [{type: "fieldset", label: "Button",
                    list: [
                        {type: "button", name: "genPDF", label: "Generate PDF", value: "Generate PDF", offsetLeft: 15}
                    ]
                }];
            var pdfForm = new dhtmlXForm("genPDFbutton", PDFdata);
            pdfForm.attachEvent('onButtonClick', function(id) {
                if (id == 'genPDF') {
                    // TEST getInput
                    myForm.forEachItem(function(id, radioValue) {
                        if (myForm.getItemType(id) == 'input'||myForm.getItemType(id)=='select'||myForm.getItemType(id)=='radio') {
                            console.log(id + " " + myForm.getItemType(id) + " " + myForm.getItemValue(id));
                        }
                    });
                }
            });
            var fO = new fObject;
            fO.setBeginForm(data, form, "English");
            var myForm = new dhtmlXForm("qoForm", form);
            myForm.forEachItem(function(id, radioValue) {
//                console.log(myForm.getItemType(id));
                if (myForm.getItemType(id) == 'input') {
                    myForm.setReadonly(id, true);
                }
                myForm.disableItem("includedVat");
            });

            //            GRID
            var qoGrid = new dhtmlXGridObject("qoGrid");
            var qoObj = new cObject;
            qoObj.setBegin(qoGrid, detailData, 0); //0=en 1=th
            qoGrid.setSkin("dhx_skyblue");
            qoGrid.setImagePath("../common/imgs/");
            qoGrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            qoGrid.enableAutoWidth(true);
            qoGrid.enableHeaderMenu();
            qoGrid.init();


            myForm.load('PHP/loadOrder.php?id=' + getRowId + "&fields=" + fO.fields, function() {
                if (this.readyState == 4) {
                    qoGrid.loadXML("PHP/loadOrderDetail.php?orderId=" + orderId + "&fields=" + qoObj.fields);
                }
            });
            //##########################################
            // EVENT
            //##########################################



            ////////////////////////////////////////////////////////////////
            // FUNCTION
            ////////////////////////////////////////////////////////////////


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

            function buildOrderJSON(form, grid) {
                var jsonObject = new Object();
                form.forEachItem(function(id, radioValue) {
                    if (form.getInput(id)) {
                        console.log(id + " " + form.getItemValue(id));
                    }
                });
            }
        </script>
    </body>


</html>