<?php
require_once("../commons/PHP/connectDB.php");
require("../commons/PHP/session.php");

function checkStateSQL($getPara) {
    if ($getPara == '') {
        return false;
    } elseif ($getPara == null) {
        return false;
    } elseif ($getPara == '0') {
        return false;
    } elseif (EMPTY($getPara)) {
        return false;
    }
    return true;
}

//---- get id itemMaster
if (!EMPTY($_GET["rId"])) {
//    echo "not Empty";
    $sql_idItem = "SELECT id FROM productstructure WHERE rowId='" . $_GET["rId"] . "'";
    $q_idItem = mysql_query($sql_idItem) or die("Error Query [" . $sql_idItem . "]");
    $rs_idItem = mysql_num_rows($q_idItem);
    if (checkStateSQL($rs_idItem)) {
        $fa_idItem = mysql_fetch_array($q_idItem);
        $idItem = $fa_idItem["id"];
        //echo $idItem;
        echo "<script type='text/javascript'>";
        echo "var idItem = '" . $idItem . "';";
        echo "</script>";
    }
}

function setPrice($getCost) {
    $setPrice0 = $getCost * 1.2;
    return $setPrice0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Item Master</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <style>
            .error {background-color: #ffd4db !important;color:maroon !important;}

            /* above Right*/
            .my_calendar{visibility:hidden}
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

        <!-- image -->
        <script type="text/javascript" src="js/canvas/jquery-1.7.2.min.js"></script>
        <!--script type="text/javascript" src="js/canvas/jquery-1.7.min.js"></script-->
        <script type="text/javascript" src="js/canvas/modernizr.custom.34982.js"></script>
        <script type="text/javascript" src="js/canvas/sketcher.js"></script>
        <!--script type="text/javascript" src="js/canvas/trigonometry.js"></script-->
        <!--script type="text/javascript" src="js/canvas/binaryajax.js"></script-->

        <!-- dhtmlxDataProcessor -->
        <!--script type="text/javascript" src="../DHX/dhtmlxConnector/codebase/connector.js"></script-->
        <script type="text/javascript" src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
        <!--script type="text/javascript" src="../DHX/dhtmlxDataStore/codebase/datastore.js"></script-->

        <!-- dhtmlxConnector -->
        <script type="text/javascript" src="../DHX/dhtmlxConnector/codebase/connector.js"></script>

        <!--  dhtmlxTabbar -->
        <script type="text/javascript" src="../DHX/dhtmlxTabbar/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxTabbar/codebase/dhtmlxtabbar.js"></script>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxTabbar/codebase/dhtmlxtabbar.css"/>

        <!-- dhtmlxCombo -->
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>

        <!-- dhtmlxForm -->
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm3.6/codebase/skins/dhtmlxform_dhx_skyblue.css"/>
        <script src="../DHX/dhtmlxForm3.6/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxForm3.6/codebase/dhtmlxform.js"></script>
        <script src="../DHX/dhtmlxForm3.6/codebase/ext/dhtmlxform_item_combo.js"></script>

        <!-- dhtmlxCalendar -->
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.css"/>
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxCalendar/codebase/skins/dhtmlxcalendar_dhx_skyblue.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_calendar.js"></script>

        <!-- dhtmlxWindows -->
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.css"/>
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxWindows/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxWindows/codebase/dhtmlxcontainer.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.js"></script>

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

        <!-- dhtmlxAccordion -->
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxAccordion/codebase/skins/dhtmlxaccordion_dhx_skyblue.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxAccordion/codebase/dhtmlxcontainer.js"></script>

        <!-- dhtmlxTreeGrid -->
        <script type="text/javascript" src="../DHX/dhtmlxTreeGrid/codebase/dhtmlxtreegrid.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_filter.js"></script>

        <!-- dhtmlxMenu -->
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxMenu/codebase/skins/dhtmlxmenu_dhx_blue.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js"></script>

        <!-- dhtmlxAjax -->
        <script type="text/javascript" src="../DHX/dhtmlxAjax/codebase/dhtmlxcommon.js"></script>

        <!-- Manage JS -->
        <script type="text/javascript" src="js/fnDateObj.js"></script>
        <script type="text/javascript" src="../commons/js/fnMainObj_DHX1.0.js"></script>
        <script type="text/javascript" src="../commons/js/retrieveParameter.js"></script>
        <script type="text/javascript" src="js/structureItem/structureItemManage.js"></script>
        <script type="text/javascript" src="js/ajaxHttp.js"></script>
    </head>
    <!--    <body onunload="doOnUnload()">-->
    <body >
        <div id="a_tabbar" style="width:auto; height:auto"/>
        <div id="myForm" style="height:auto;"></div>
        <div id="ctg"></div>
        <script type="text/javascript">
            //            var checkLanguage = (sesLanguage=="English")?'englishName':'thaiName';
            var vatOld,vatNew,newRowId="";
            
            //################################################################################
            //                                                                              ##
            //                          FUNCTION HANDLING                                   ##
            //                                                                              ##
            //################################################################################
                     
            function keyboardUp(inp, ev, id, value){
                if(id === "quantityIssue" || id === "length" || id === "thickness" || id === "volume" || id === "area" || id === "wideDiameter" || id === "height" || id === "weight" ){
                    //                    alert(inp+" : "+ev+" : "+id);
                    isNumberKey(inp,event);
                    if(id === "quantityIssue"){
                        var unitRec = myForm.getItemValue("unit");
                        var unitIss = myForm.getItemValue("unitIssue");
                        if(unitRec == unitIss){
                            //alert("Equal");
                            
                        }else{
                            //alert("Not Equal");
                            var valueIssue = myForm.getItemValue(id);
                            var checkIntFloat = isIntFloat(valueIssue);
                            if(checkIntFloat === "Int"){
                                myForm.enableItem("checkBom");
                                if(valueIssue === "0" || valueIssue === "" || valueIssue === null){
                                    myForm.disableItem("insert");
                                    myForm.disableItem("update");
                                }else{
                                    myForm.enableItem("insert");
                                    myForm.enableItem("update");
                                }
                                
                            }else if(checkIntFloat === "Float"){
                                myForm.disableItem("checkBom");
                                myForm.uncheckItem("checkBom");
                                myForm.enableItem("insert");
                                myForm.enableItem("update");
                            }
                        }
                    }
                }
            }
            
            
            
            
            
            //###############################################################
            // CHECK INT OR FLOAT
            //###############################################################
            function isIntFloat(n){
                //alert("isNaN : "+isNaN(n));alert(n%1);alert(typeof n);
                if(isNaN(n) !== true){
                    //Check Number
                    n = Number(n);
                    if(n%1 === 0){
                        return "Int";
                    }else{
                        return "Float";    
                    }   
                }else{
                    return "Not a Number(NaN)";
                }
            }
            //###############################################################
            // NUMBER KEY
            //###############################################################
            function isNumberKey(obj,evt){
                var kCode = (evt.which) ? evt.which : event.keyCode
                //alert("1 : "+kCode);
                //                if (kCode!=8 && (kCode < 48 || kCode > 57) && kCode!=190){
                obj.value=obj.value.replace(/^\.+|^0+|[^\d|^\.]/g,'');
                //                }
            }

            
            
            
            
            //###############################################################
            // ENABLE TAB
            //###############################################################
            function enableTab(gId){
                tabbar.addTab("a2", "Structure");
                tabbar.addTab("a3", "<img src='image/images1.png' style='width:15px;height:15px;left:15px;'> <span style='margin-left:5px;font-weight:bold;'>Image</span>", "100px");
                
                tabbar.setContentHref("a2","structureItem.php?rId="+gId+"&loginStatus="+loginStatus);
                tabbar.setContentHref("a3","html5.php?idItem="+gId);
                tabbar.showInnerScroll();
            }
            
            
            
            
            
            //###############################################################
            // SHOW Windows Menu(CLICK class) 'EDIT'
            //###############################################################
            function showWinsMenu(){
                var stat="ro",dhxWins,w1,grid;
                var data =[
                    {fields:'class',aligns:'left',widths:'120',types:stat,hides:false,enNames:'Class',thNames:'คลาส'},
                    {fields:'type',aligns:'left',widths:'120',types:stat,hides:false,enNames:'Type',thNames:'ชนิด'},
                    {fields:'gGroup',aligns:'left',widths:'120',types:stat,hides:false,enNames:'Group',thNames:'กรุ๊ป'}];
                var obj = new cObject;

                dhxWins = new dhtmlXWindows();
                dhxWins.enableAutoViewport(false);
                dhxWins.attachViewportTo("myForm");
                dhxWins.setImagePath("../DHX/dhtmlxWindows/codebase/imgs/");
                w1 = dhxWins.createWindow("w1", 20, 30, 400, 400);
                w1.setText("Class-Type-Group");
                dhxWins.window("w1").denyPark();
                dhxWins.window("w1").denyResize();
                w1.button("park").hide();
                w1.button("minmax1").hide();
                //dhxWins.window("w1").center();
                grid = w1.attachGrid();
                grid.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
                grid.attachHeader("#select_filter,#select_filter,#select_filter");
                obj.setBegin(grid,data,sesLanguage);
                grid.attachEvent("onRowSelect",function(id){
                    var classSp = grid.cells(id,0).getValue();
                    var typeSp = grid.cells(id,1).getValue();
                    var groupSp = grid.cells(id,2).getValue();
                    myForm.setItemValue("class",classSp);
                    myForm.setItemValue("type",typeSp);
                    myForm.setItemValue("gGroup",groupSp);
                    dhxWins.window("w1").close();
                });
                grid.init();
                grid.loadXML("load/editList/edit_LoadCTG.php");
            }
            
            
            
            
            
            //###############################################################
            // SET VALUE DATE
            //###############################################################
            function setValueDate(showD,hideD){
                if(myForm.getItemValue(showD) !== null){
                    var staS = myForm.getCalendar(showD);
                    var gDate = staS.getDate();
                    var sDate = gDate.getFullYear()+"-"+_month(gDate)+"-"+_d(gDate);
                    myForm.setItemValue(hideD,sDate);
                }
            }
            
            
            
            
            
            //###############################################################
            // CLICK BUTTON
            //###############################################################
            function buttonClick(id){
                if (id == "insert" || id == "update"){
                    //                              alert(myForm.getItemValue(id));
                    //------------------------- SET start,valid (Before insert Database) -------------------------
                    
                    //                    if(myForm.getItemValue(startDate_show) !== null){
                    //                        var date2 = startDate_show.getFormatedDate("%Y-%m-%d", date)
                    //            myForm2.setItemValue("calendar2", date2);
                    //                    }
                    setValueDate("startDate_show","startDate"); 
                    setValueDate("validUntil_show","validUntil");
                    myForm.setItemValue("quantity","1");
                    var thMes = id=="insert"? "บันทึกใหม่":"แก้ไขข้อมูล";
                    var mes = sesLanguage=="English"? id+" ?":thMes+" ?";
                    if (confirm(mes)==true){
                        var gCode = myForm.getItemValue("code");
                        if(id == "insert"){
                            var newIdStr = "stru-"+new Date().getTime()+"-"+sesUser;
                            myForm.setItemValue("id",newIdStr);
                            myForm.setItemValue("parentMain",newIdStr);
                            myForm.setItemValue("itemId",newIdStr);
                            if(myForm.getItemValue("class") != "Style"){
                                myForm.setItemValue("prefix",gCode);
                            }
                            
                            if(myForm.getItemValue("vat") == null || myForm.getItemValue("vat") == ""){
                                var value = myForm.getItemValue("vat_Show");
                                var parameter = "lang="+selLang+"&value="+value;
                                dhtmlxAjax.get("load/ajax/vat.php?"+parameter,function(loader){
                                    myForm.setItemValue("vat",loader.xmlDoc.responseText);
                                    myForm.save();
                                });
                            }else{ myForm.save();}
                        }else{
                            myForm.setItemValue("prefix",gCode);
                            myForm.save();  //--- UPDATE
                            //                            alert(myForm.getItemValue("startDate"));
                            vatNew = myForm.getItemValue("vat");
                        }
                    }

                }else if(id == "revision"){
                    var mes = sesLanguage=="English"? id:"บันทึกข้อมูลใหม่";
                    if (confirm(mes+" ?")==true){

                        //------------------------- SET start,valid Before insert Database -------------------------
                        var staS = myForm.getCalendar("startDate_show");
                        var gDate = staS.getDate();
                        var sDate = gDate.getFullYear()+"-"+_month(gDate)+"-"+_d(gDate);
                        myForm.setItemValue("startDate",sDate);
                        var valS = myForm.getCalendar("validUntil_show");
                        var gValid = valS.getDate();
                        var sValid = gValid.getFullYear()+"-"+_month(gValid)+"-"+_d(gValid);
                        myForm.setItemValue("validUntil",sValid);

                        var fields = fO.fields;
                        var parameter1 = "fields="+fields;
                        var dhxType = "form";
                        var rowId = "rowId";
                        var parameter2 = "dhxType="+dhxType+"&rowId="+rowId+"&fields="+fields;
                        myForm.send("update/revisionDB.php?"+parameter1,function(loader, response) {
                            myForm.load("update/connectorDHX.php?"+parameter2+"&id="+response);
                            alert0(mes+" Success!!");
                            myForm.attachEvent("onXLE", function (){    //when load data!!
                                var gDate = myForm.getItemValue("startDate");
                                myForm.setItemValue("startDate_show",gDate);
                                var gValid = myForm.getItemValue("validUntil");
                                myForm.setItemValue("validUntil_show",gValid);
                            });
                        });
                    }

                }else if(id == "reset"){
                    var mes = sesLanguage=="English"? id+" ?":"ตั้งค่าเริ่มต้น ?";
                    if (confirm(mes)==true){
                        myForm.setItemLabel("code","<span style='color:black;'>Code</span>");
                        myForm.setItemLabel("barcode","<span style='color:black;'>Barcode</span>");
                        myForm.setItemLabel("englishName","<span style='color:black;'>English Name</span>");
                        myForm.setItemLabel("thaiName","<span style='color:black;'>Thai Name</span>");
                        myForm.enableItem("update");
                        myForm.enableItem("revision");
                        myForm.reset();
                    }
                }else if(id == "clear"){
                    var mes = sesLanguage=="English"? "Reset ?":"ตั้งค่าเริ่มต้น ?";
                    if (confirm(mes)==true){
                        myForm.setItemLabel("code","<span style='color:black;'>Code</span>");
                        myForm.setItemLabel("barcode","<span style='color:black;'>Barcode</span>");
                        myForm.setItemLabel("englishName","<span style='color:black;'>English Name</span>");
                        myForm.setItemLabel("thaiName","<span style='color:black;'>Thai Name</span>");
                        myForm.enableItem("insert");
                        myForm.clear();
                    }
                }
            }
            
            
            
            
            
            //###############################################################
            // CHANGE VALUE
            //###############################################################
            function changeValue(id, value){
                //                if(id == "code" || id == "barcode"){
                if(id == "code"){
                    dhtmlxAjax.get("load/ajax/code.php?val="+encodeURI(value)+"&field="+id,function(loader){
                        var resText = loader.xmlDoc.responseText.split(",");
                        if(resText[0] == "NoData"){
                            //      OK! no repeat in Database
                            if(id == "code") i1="0",label="Code";
                            if(id == "barcode") i2="0",label="Barcode";
                            myForm.setItemLabel(id, label);
                            if(i1=="0" && i2=="0"){
                                myForm.enableItem("insert");
                                myForm.enableItem("update");
                            }
                            myForm.disableItem("revision");
                        }else{
                            //      Repeat in Database
                            //      alert0(resText[0]);
                            if(id == "code") i1="1",label="Code";
                            if(id == "barcode") i2="1",label="Barcode";
                            myForm.setItemLabel(id,"<span style='color:red;'>"+label+"</span>");
                            myForm.disableItem("insert");
                            myForm.disableItem("update");
                            myForm.disableItem("revision");
                        }
                    });
                    
                }else if(id == "vat_Show"){
                    var parameter = "lang="+selLang+"&value="+value;
                    dhtmlxAjax.get("load/ajax/vat.php?"+parameter,function(loader){
                        myForm.setItemValue("vat",loader.xmlDoc.responseText);
                    });
                    
                }else if(id == "unit" || id == "unitIssue"){
                    var unitRec = myForm.getItemValue("unit");
                    var unitIss = myForm.getItemValue("unitIssue");
                    var quanIssue = myForm.getItemValue("quantityIssue");
                    //                    alert(unitRec+" & "+unitIss);
                    if(unitRec == unitIss){
                        //                            alert("Equal");
                        myForm.enableItem("checkBom");
                        myForm.setItemValue("quantityIssue","");
                        myForm.enableItem("insert");
                        myForm.enableItem("update");
                    }else{
                        //                        alert("Not Equal");
                        if(quanIssue === "" || quanIssue === "0" || quanIssue === null || quanIssue === "0.0000"){
                            myForm.setItemValue("quantityIssue","");
                            myForm.disableItem("insert");
                            myForm.disableItem("update");
                            alert0("Add Quantity...Please!!!");
                            myForm.setItemFocus("quantityIssue");                            
                        }
                    }
                }else if(id == "checkBom"){
                    if(myForm.isItemChecked(id) === false){
                        //                        alert("newRowId : "+newRowId);
                        if(myForm.getItemValue("id") !== ""){
                            var setRowId = loginStatus=="blank"?newRowId:rId;
                            var paraCheckBom = "rowId="+setRowId+"&id="+myForm.getItemValue("id");
                            //                            alert(paraCheckBom);
                            dhtmlxAjax.get("load/ajax/checkBom.php?"+paraCheckBom,function(loader){
                                //                                alert(loader.xmlDoc.responseText);
                                if(loader.xmlDoc.responseText === "have"){
                                    myForm.checkItem(id);
                                    alert("มี Bom,Build...ต้องลบ Bom,Build ออกก่อนครับ");
                                }
                            });
                        }
                    }
                }
            }

            //----- loginStatus, gClass, type, group [Retrieve Parameter];
            //            function doOnUnload() {
            //                //For saving memory, we recommend to destruct dhtmlxForm instance at the end of form usage
            //                //by unload method.
            //                form.unload();
            //                form = null;
            //            }
            
            //################################################################################
            //                                                                              ##
            //                                                                              ##
            //                          OBJECT HANDLING                                     ##
            //                                                                              ##
            //                                                                              ##
            //################################################################################
            var cssInsert = "<img src='image/insert1.png' style='margin-top:0px;position:absolute;width:15px;height:15px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:13px;font-weight:bold;'>";
            var cssUpdate = "<img src='image/upData.png' style='margin-top:0px;position:absolute;width:15px;height:15px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:13px;font-weight:bold;'>";
            var cssRev = "<img src='image/rev2.gif' style='margin-top:0px;position:absolute;width:15px;height:15px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:13px;font-weight:bold;'>";
            var cssReset = "<img src='image/sfeers_by_emey87/undo.png' style='margin-top:-0.6px;position:absolute;width:16px;height:16px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:15px;font-weight:bold;'>";
            var cD = new cDateObject();         //Call Date object

            //###############################################################
            // set TABBAR (tabbar)
            //###############################################################
            tabbar = new dhtmlXTabBar("a_tabbar", "top");
            tabbar.setSkin('dhx_skyblue');
            tabbar.setImagePath("../DHX/dhtmlxTabbar/codebase/imgs/");
            tabbar.addTab("a1", "<img src='image/Doc1.png' style='margin-top:1px;width:15px;height:15px;left:15px;'> <span style='margin-left:5px;font-weight:bold;'>General & Properties</span>", "160px");
            tabbar.setHrefMode("ajax-html");
            tabbar.setContent("a1", "myForm");
            tabbar.setTabActive("a1");
            tabbar.attachEvent("onSelect",function(id){
                //reload
                if(id=="a2"){tabbar.forceLoad("a2"); }
                return true;
            })
            

            //###############################################################
            // set ADDRESS UNIT(select option) & gClass,type,group
            //###############################################################
            var selLang = sesLanguage=="English"?"englishName":"thaiName";
            var c,t,g,uCount,vatRate,sqlULength,sqlUVolume,sqlUWeight,sqlUArea;
            var selOption = "select";
            var addressOption = "load/form/selectOptions.php?";
            //            var sqlUL = "sql=SELECT name FROM unit WHERE class='standard' AND type='length' ORDER BY name ASC&state=";
            var paraULength = "tb=un&cl=standard&type=length&state=";
            var paraUVolume = "tb=un&cl=standard&type=volume&state=";
            var paraUWeight = "tb=un&cl=standard&type=weight&state=";
            var paraUArea = "tb=un&cl=standard&type=area&state=";
            var paraUCount = "tb=un&cl=count&type=count&state=";
            var paraVat = "tb=rat&lang="+selLang+"&type=vat&state=";

            if(loginStatus == "edit"){
                c="";t="";g="";
                var strEdit = loginStatus+"&rowId="+rId;
                sqlULength = addressOption+paraULength+strEdit;
                sqlUVolume = addressOption+paraUVolume+strEdit;
                sqlUWeight = addressOption+paraUWeight+strEdit;
                sqlUArea = addressOption+paraUArea+strEdit;
                uCount = addressOption+paraUCount+strEdit;
                vatRate = addressOption+paraVat+strEdit
                enableTab(idItem);
                
            }else if(loginStatus == "blank"){
                c=gClass;t=type;g=(group=="null")?"":group;
                var strBlank = loginStatus;
                sqlULength = addressOption+paraULength+strBlank;
                sqlUVolume = addressOption+paraUVolume+strBlank;
                sqlUWeight = addressOption+paraUWeight+strBlank;
                sqlUArea = addressOption+paraUArea+strBlank;
                uCount = addressOption+paraUCount+strBlank;
                vatRate = addressOption+paraVat+strBlank
            }

            //###############################################################
            //
            //  SET FORMDATA (myFormData)
            //  
            //###############################################################
            var myFormData = [
                {types:"fieldset",fields:"",keys:"main",enLabels:"Main",thLabels:"ส่วนหลัก"},
                {types:"fieldset",fields:"",keys:"det",enLabels:"Details",thLabels:"รายละเอียด"},
                {types:"fieldset",fields:"",keys:"ctg",enLabels:"CTG",thLabels:"ซีทีจี"},
                {types:"fieldset",fields:"",keys:"button",enLabels:"Button",thLabels:"ปุ่ม"},

                //-------------------- MAIN -----------------------------------------------------------------------
                {types:"input",fields:"englishName",keys:"enN",enLabels:"English Name",thLabels:"ชื่ออังกฤษ"},
                {types:"input",fields:"thaiName",keys:"thN",enLabels:"Thai Name",thLabels:"ชื่อไทย"},
                {types:"input",fields:"code",keys:"code",enLabels:"Code",thLabels:"รหัส"},
                {types:"input",fields:"barcode",keys:"bCode",enLabels:"Barcode",thLabels:"บาร์โค๊ด"},

                //-------------------- COLUMN 111 -----------------------------------------------------------------------
                {types:"input",fields:"shape",keys:"shape",enLabels:"Shape",thLabels:"รูปทรง"},
                //                {types:selOption,fields:"unitReceipt",keys:"uRe",enLabels:"Unit Receipt",thLabels:"หน่วยรับ"},
                {types:"checkbox",fields:"checkBom",keys:"chBom",enLabels:"Create Bom",thLabels:"สร้าง Bom"},
                {types:selOption,fields:"unit",keys:"uRe",enLabels:"Unit Receipt",thLabels:"หน่วยรับ"},
                {types:"input",fields:"quantity",keys:"quan",enLabels:"Quantity",thLabels:"จำนวน"},
                {types:selOption,fields:"unitIssue",keys:"uIs",enLabels:"Unit Issue",thLabels:"หน่วยจ่าย"},
                {types:"input",fields:"quantityIssue",keys:"quanIss",enLabels:"Quantity Issue",thLabels:"จำนวนจ่าย"},
                //                {types:"input",fields:"amountSubIssue",keys:"aSuIs",enLabels:" ",thLabels:" "},
                //                {types:selOption,fields:"unitSubReceipt",keys:"sURe",enLabels:"",thLabels:""},
                //                {types:selOption,fields:"unitSubIssue",keys:"sUIs",enLabels:"",thLabels:""},
                
                {types:"label",fields:"vat_Show",keys:"vaS",enLabels:"Vat",thLabels:"ภาษี"},
                {types:"hidden",fields:"vat",keys:"va",enLabels:"",thLabels:""},
                {types:"input",fields:"description",keys:"descript",enLabels:"Description",thLabels:"รายละเอียด"},

                //-------------------- COLUMN 222 -----------------------------------------------------------------------
                {types:"input",fields:"length",keys:"len",enLabels:"Length",thLabels:"ยาว"},
                {types:"input",fields:"thickness",keys:"thi",enLabels:"Thickness",thLabels:"หนา"},
                {types:"input",fields:"volume",keys:"vol",enLabels:"Volume",thLabels:"ปริมาตร"},
                {types:"input",fields:"area",keys:"area",enLabels:"Area",thLabels:"พื้นผิว"},

                {types:selOption,fields:"unitLength",keys:"uL",enLabels:"",thLabels:""},
                {types:selOption,fields:"unitThickness",keys:"uThi",enLabels:"",thLabels:""},
                {types:selOption,fields:"unitVolume",keys:"uVol",enLabels:"",thLabels:""},
                {types:selOption,fields:"unitArea",keys:"uAre",enLabels:"",thLabels:""},

                //-------------------- COLUMN 333 -----------------------------------------------------------------------
                {types:"input",fields:"wideDiameter",keys:"wideD",enLabels:"Wide-Diameter",thLabels:"กว้าง"},
                {types:"input",fields:"height",keys:"hei",enLabels:"Height",thLabels:"สูง"},
                {types:"input",fields:"weight",keys:"wei",enLabels:"Weight",thLabels:"น้ำหนัก"},
                //                {types:"input",fields:"style",keys:"sty",enLabels:"Style",thLabels:"รูปแบบ"},

                {types:selOption,fields:"unitWD",keys:"uWD",enLabels:"",thLabels:""},
                {types:selOption,fields:"unitHeight",keys:"uHei",enLabels:"",thLabels:""},
                {types:selOption,fields:"unitWeight",keys:"uWei",enLabels:"",thLabels:""},

                //---CALENDAR
                {types:"label",fields:"startDate_show",keys:"startDS",enLabels:"Start Date",thLabels:"วันที่เริ่ม"},
                {types:"hidden",fields:"startDate",keys:"startD",enLabels:"",thLabels:""},
                {types:"label",fields:"validUntil_show",keys:"validUS",enLabels:"Valid Until",thLabels:"ถึง"},
                {types:"hidden",fields:"validUntil",keys:"validU",enLabels:"",thLabels:""},

                //---CLASS , TYPE , GROUP
                {types:"input",fields:"class",keys:"cl",enLabels:"Class",thLabels:"คลาส"},
                {types:"input",fields:"type",keys:"ty",enLabels:"Type",thLabels:"ไทป์"},
                {types:"input",fields:"gGroup",keys:"gr",enLabels:"Group",thLabels:"กรุ๊ป"},

                //---HIDDEN
                {types:"hidden",fields:"parent",keys:"pr",enLabels:"",thLabels:""},
                {types:"hidden",fields:"parentMain",keys:"prMain",enLabels:"",thLabels:""},
                {types:"hidden",fields:"id",keys:"id",enLabels:"",thLabels:""},
                {types:"hidden",fields:"typeP",keys:"typeP",enLabels:"",thLabels:""},
                {types:"hidden",fields:"itemId",keys:"iId",enLabels:"",thLabels:""},
                {types:"hidden",fields:"prefix",keys:"pf",enLabels:"",thLabels:""},
                {types:"hidden",fields:"used",keys:"use",enLabels:"",thLabels:""},
                {types:"hidden",fields:"unitCost",keys:"uCost",enLabels:"",thLabels:""},

                //---BUTTON
                {types:"button",fields:"insert",keys:"added",enLabels:cssInsert+"Insert</span>",thLabels:cssInsert+"บันทึก</span>"},
                {types:"button",fields:"update",keys:"upd",enLabels:cssUpdate+"Update</span>",thLabels:cssUpdate+"แก้ไข</span>"},
                {types:"button",fields:"revision",keys:"rev",enLabels:cssRev+"Revision</span>",thLabels:cssRev+"บันทึกข้อมูลใหม่</span>"},
                {types:"button",fields:"reset",keys:"reset",enLabels:cssReset+"Reset</span>",thLabels:cssReset+"ตั้งค่าเริ่มต้น</span>"},
                {types:"button",fields:"clear",keys:"clear",enLabels:cssReset+"Reset</span>",thLabels:cssReset+"ตั้งค่าเริ่มต้น</span>"}
            ];

            //###############################################################
            //
            //  SET FORM (myForm)
            //  
            //###############################################################
            var labelW = sesLanguage=="English"?110:70;
            var myFormSet = [
                //---- main
                {
                    type:"fieldset",
                    label:"main",
                    inputWidth:"auto",
                    offsetLeft:10,
                    list:[
                        {type:"newcolumn"},{type:"input",name:"",label:"enN",value:"", validate:"NotEmpty"},
                        {type:"newcolumn",offset:10},{type:"input",name:"",label:"thN",value:"", validate:"NotEmpty"},
                        {type:"newcolumn",offset:10},{type:"input",name:"",label:"code",value:"", validate:"NotEmpty"},
                        {type:"newcolumn",offset:10},{type:"input",name:"",label:"bCode",value:""}]
                },
                //---- Details
                {
                    type:"fieldset",
                    label:"det",
                    inputWidth:"auto",
                    offsetLeft:10,
                    list: [
                        {
                            type:"settings",
                            position:"label-left",
                            labelAlign:"right",
                            labelWidth:75,
                            inputWidth:100
                        },
                        {type:"input",name:"",label:"shape",value:""},
                        {type:"input",name:"",label:"descript",value:"",rows:"4",inputWidth:"250"},
                        {type:"block", width:375, 
                            list:[
                                {type:selOption,name:"",label:"uRe",connector:uCount+"&unit=unit",inputWidth:"auto", validate:"NotEmpty"},
                                {type:selOption,name:"",label:"uIs",connector:uCount+"&unit=unitIssue",inputWidth:"auto", validate:"NotEmpty"},
                                {type:selOption,name:"",label:"vaS",connector:vatRate+"&unit=vat",inputWidth:"auto"},
                                                                                
                                {type:"newcolumn",offset:0},
                                {type:"checkbox",name:"",label:"chBom",labelWidth:71},
                                {type:"hidden",name:"",label:"quan",value:"1",inputWidth:50,labelWidth:50, validate:"NotEmpty"},
                                {type:"input",name:"",label:"quanIss",value:"",inputWidth:65,labelWidth:85},
                                {type:"hidden",name:"",label:"va",value:"",inputWidth:50,labelWidth:1},
                                                                                
                                //                                        {type:"newcolumn",offset:0},
                                //                                        {type:selOption,name:"",label:"sURe",connector:uCount+"&unit=unitSubReceipt",inputWidth:"auto",offsetLeft:5},
                                //                                        {type:selOption,name:"",label:"sUIs",connector:uCount+"&unit=unitSubIssue",inputWidth:"auto",offsetLeft:5}                                        
                            ]
                        },
                        {
                            type: "block", inputWidth: 400, 
                            list:[
                                {
                                    type:"settings",
                                    position:"label-left",
                                    labelAlign:"right"
                                },
                                {type:"calendar",name:"",label:"startDS",value:"",dateFormat:"%Y-%m-%d",serverDateFormat:"%Y-%m-%d",calendarPosition:"right",readonly:true},
                                //                                {type:"calendar",name:"startDateHide",label:"startDH",value:"",className: "my_calendar",dateFormat:"%Y-%m-%d",calendarPosition:"right",readonly:true},
                                //                                {type:"hidden",name:"",label:"startD",value:""},

                                {type:"newcolumn",offset:0},
                                {type:"calendar",name:"",label:"validUS",value:"",dateFormat:"%Y-%m-%d",serverDateFormat:"%Y-%m-%d",calendarPosition:"right",readonly:true},
                                //                                {type:"hidden",name:"",label:"validU",value:""}]
                            ]
                        },
                        {type:"newcolumn"},
                        {type:"input",name:"",label:"len",value:""},
                        {type:"input",name:"",label:"thi",value:""},
                        {type:"input",name:"",label:"vol",value:""},
                        {type:"input",name:"",label:"area",value:""},
                        
                        {type:"newcolumn"},
                        {type:selOption,name:"",label:"uL",connector:sqlULength+"&unit=unitLength",inputWidth:"auto",offsetLeft:5},
                        {type:selOption,name:"",label:"uThi",connector:sqlULength+"&unit=unitThickness",inputWidth:"auto",offsetLeft:5},
                        {type:selOption,name:"",label:"uVol",connector:sqlUVolume+"&unit=unitVolume",inputWidth:"auto",offsetLeft:5},
                        {type:selOption,name:"",label:"uAre",connector:sqlUArea+"&unit=unitArea",inputWidth:"auto",offsetLeft:5},
                        
                        {type:"newcolumn"},
                        {type:"input",name:"",label:"wideD",value:"",labelWidth:120},
                        {type:"input",name:"",label:"hei",value:"",labelWidth:120},
                        {type:"input",name:"",label:"wei",value:"",labelWidth:120},
                        //                        {type:"input",name:"",label:"sty",value:""},

                        {type:"newcolumn"},
                        {type:selOption,name:"",label:"uWD",connector:sqlULength+"&unit=unitWD",inputWidth:"auto",offsetLeft:5},
                        {type:selOption,name:"",label:"uHei",connector:sqlULength+"&unit=unitHeight",inputWidth:"auto",offsetLeft:5},
                        {type:selOption,name:"",label:"uWei",connector:sqlUWeight+"&unit=unitWeight",inputWidth:"auto",offsetLeft:5},
                        //                            ]
                        //                        },
                        
                        
                    ]
                },
                //---- CTG
                {
                    type: "fieldset",
                    label: "ctg",
                    inputWidth: "auto",
                    offsetLeft:10,
                    list:[
                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"cl",value:c,readonly:true},
                        {type:"newcolumn",offset:10},{type:"input",name:"",label:"ty",value:t,readonly:true},
                        {type:"newcolumn",offset:10},{type:"input",name:"",label:"gr",value:g,readonly:true}]
                },
                //---- Hidden
                {type:"hidden",name:"",label:"pr",value:"0"},
                {type:"hidden",name:"",label:"prMain"},
                {type:"hidden",name:"",label:"id"},
                {type:"hidden",name:"",label:"typeP",value:"item"},
                {type:"hidden",name:"",label:"iId",value:""},
                {type:"hidden",name:"",label:"pf",value:""},
                {type:"hidden",name:"",label:"use",value:""},
                {type:"hidden",name:"",label:"uCost",value:"Baht"},

                //---- Button
                {type:"fieldset",label:"button",inputWidth:"auto",offsetLeft:10,
                    list: [
                        {type:"newcolumn"},{ type:"button",name:"",label:"added", value:""},
                        {type:"newcolumn"},{ type:"button",name:"",label:"clear", value:""},
                        {type:"newcolumn"},{ type:"button",name:"",label:"upd", value:""},
                        {type:"newcolumn"},{ type:"button",name:"",label:"rev", value:""},
                        {type:"newcolumn"},{ type:"button",name:"",label:"reset", value:""}]
                }
            ];
            var fO = new fObject;
            fO.setBeginForm(myFormData,myFormSet,sesLanguage);
            var myForm = new dhtmlXForm("myForm", myFormSet);

            
            //###############################################################
            //  SET value begin (myForm)                        
            //###############################################################
            dhtmlx.skin = "dhx_skyblue";
            if(loginStatus != "view"){
                //--- Calendar setSensitiveRange
                var dateTo = null;
                window.onload = function() {
                    var Cal1 = myForm.getCalendar("startDate_show");
                    Cal1.hideTime();
                    Cal1.setWeekStartDay(7);
                    Cal1.attachEvent("onClick",function(date){
                        var dateFrom = new Date(date);
                        Cal2.setSensitiveRange(dateFrom, dateTo);
                        return true;
                    })
                    var Cal2 = myForm.getCalendar("validUntil_show");
                    Cal2.hideTime();
                    Cal2.setWeekStartDay(7);
                }
            }
            //------------------------- HIDE BUTTON -------------------------//
            if(loginStatus == "blank"){
                myForm.hideItem("update");
                myForm.hideItem("revision");
                myForm.hideItem("reset");
                //--- set quantity=1(default)
                myForm.setItemValue("used","0");
                
            }else if(loginStatus == "edit"){
                myForm.hideItem("insert");
                myForm.hideItem("clear");
                //------------------------- MENU CLASS-TYPE-GROUP -------------------------
                var inpClass = myForm.getInput("class");
                //inpClass.onclick = showWinsMenu;
                if (window.addEventListener) {
                    // all browsers except IE before version 9
                    inpClass.addEventListener("click",showWinsMenu,false);
                } else {
                    // IE before version 9
                    inpClass.attachEvent("onclick",showWinsMenu);
                }
            }
            
            //###############################################################
            //  ATTACH EVENT                      
            //###############################################################
            var i1="0",i2="0",label;
            myForm.attachEvent("onChange",changeValue);
            myForm.attachEvent("onButtonClick", buttonClick);
            myForm.attachEvent("onKeyUp",keyboardUp);
            
            //################################################################################
            //                                                                              ##
            //                                                                              ##
            //                          CONNECT DATABASE                                    ##
            //                                                                              ##
            //                                                                              ##
            //################################################################################
            var fields = fO.fields;
            //---------- EDIT ---------- 
            if(loginStatus == "edit"){
                myForm.load("update/item/connectDBForm.php?fields="+fields+"&id="+rId);

                myForm.attachEvent("onXLE", function (){    //when load data!!
                    vatOld = myForm.getItemValue("vat");
                    var gDate = myForm.getItemValue("startDate");
                    //                    alert("gDate : "+gDate)
                    if(gDate !== null){
                        myForm.setItemValue("startDateHide",gDate);
                        var oDateOne = myForm.getItemValue("startDateHide");
                        //                        alert("oDateOne : "+oDateOne);//----- 0000-00-00 == Nov 30 1899
                        var oDateTwo = new Date(0000, -1, 0);   //Nov 30 1899
                        //                        alert("2 :"+oDateTwo);
                        //                        alert(gDate - oDateTwo === 0); alert(gDate - oDateTwo < 0); alert(gDate - oDateTwo > 0);
                        if(oDateOne - oDateTwo !== 0){
                            myForm.setItemValue("startDate_show",gDate);
                        }
                    }
                    var gValid = myForm.getItemValue("validUntil");
                    if(gValid !== null){
                        myForm.setItemValue("validUntil_show",gValid);
                    }
                    
                    //CHECK USED
//                                        alert(myForm.getItemValue("used"));
                    if(myForm.getItemValue("used") === "" || myForm.getItemValue("used") == "0.0" || myForm.getItemValue("used") == null){

                    }else{
                        var disFields = ["englishName","thaiName","code","barcode","shape","unitReceipt","checkBom","unit"];
                        disFields.push("quantity","unitIssue","quantityIssue","amountSubIssue","unitSubReceipt","unitSubIssue");
                        disFields.push("length","thickness","volume","area","unitLength","unitThickness","unitVolume","unitArea");
                        disFields.push("wideDiameter","height","weight","unitWD","unitHeight","unitWeight");
                        for(var f=0;f<disFields.length;f++){
                            //                            alert(disFields[f]);
                            myForm.disableItem(disFields[f]);
                        }
                    }
                });
            }
            
            //---------- INSERT, UPDATE, DELETE ----------
            myDP = new dataProcessor("update/item/connectDBForm.php?fields="+fields);//lock feed url
            myDP.enableDataNames(true); //will use names instead of indexes
            myDP.init(myForm); //link dataprocessor to the grid            
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid){
                alert0(action);
                if(action == "inserted"){
                    //                    alert("sid : "+sid+" , tid : "+tid);
                    //--- set RowId; (for CheckBom)
                    newRowId = sid;
                    //                    myForm.setItemValue("parentMain",sid);
                    myForm.hideItem("insert");
                    myForm.hideItem("clear");
                    myForm.showItem("update");
                    enableTab(myForm.getItemValue("id"));
                    tabbar.setTabActive("a2");
                }else if(action == "updated"){
                    var getItemId = myForm.getItemValue("id");
                    //                    alert("vatOld= "+vatOld+" , vatNew= "+vatNew+" , id: "+getItemId);
                    if(vatOld != vatNew){
                        vatOld = vatNew;
                        var urlVatChange = "update/afterUpdate/vatChange.php";
                        xhr.open('POST',urlVatChange,true);
                        xhr.onload = function() {
                            alert0(this.responseText);
                        };
                                                
                        var formData = new FormData();
                        formData.append('getItemId',getItemId);
                        formData.append('vatCodeNew',vatNew);
                        xhr.send(formData);
                    }
                }
                //alert(tid);
            });
            
//            dhtmlxError.catchError("LoadXML", function(){
//
//            })
        </script>
    </body>
</html>

