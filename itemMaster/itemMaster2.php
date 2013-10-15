<?php
ob_start();
session_start();
header("Cache-Control: no-cache, must-revalidate");
require_once("../commons/PHP/connectDB.php");
//if(EMPTY($_GET["rId"])) {
//
////-- blank --
//    $class = iconv("TIS-620", "UTF-8", $_GET["class"]);
//    $type = iconv("TIS-620", "UTF-8", $_GET["type"]);
//    $group = $_GET["group"];
//}
//
echo "<script type='text/javascript'>";
//        echo "var pid = ".$_REQUEST['pid'].";";
//        echo "var ptype = '".$_REQUEST['ptype']."';";
//        echo "var rtype = '".$_REQUEST['rtype']."';";
//        //mock login status
//        echo "var sesStatus = '".$_REQUEST['loginStatus']."';";
echo "var sesUser = '" . $_SESSION['userName'] . "';";
//        echo "var sesCompany = '".$_SESSION['company']."';";
echo "var sesLanguage = '" . $_SESSION['logLanguage'] . "';";
echo "</script>";

echo "(TEST Product) rowId == 558 & englishName == ooo & thaiName == ppp";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Item Master</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
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

        <!-- dhtmlxDataProcessor -->
        <!--script type="text/javascript" src="../DHX/dhtmlxConnector/codebase/connector.js"></script-->
        <script type="text/javascript" src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
        <!--script type="text/javascript" src="../DHX/dhtmlxDataStore/codebase/datastore.js"></script-->

        <!--  dhtmlxTabbar -->
        <script type="text/javascript" src="../DHX/dhtmlxTabbar/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxTabbar/codebase/dhtmlxtabbar.js"></script>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxTabbar/codebase/dhtmlxtabbar.css"/>

        <!-- dhtmlxForm -->
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css"/>
        <script src="../DHX/dhtmlxForm/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
        <script src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_combo.js"></script>

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
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css"/>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_filter.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_ssc.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_hmenu.js"></script>

        <!-- dhtmlxAjax -->
        <script type="text/javascript" src="../DHX/dhtmlxAjax/codebase/dhtmlxcommon.js"></script>

        <!-- Manage JS -->
        <script type="text/javascript" src="js/fnDateObj.js"></script>
        <script type="text/javascript" src="../commons/js/fnMainObj_DHX1.0.js"></script>
        <script type="text/javascript" src="js/retrieveParameter.js"></script>
    </head>
    <body onunload="doOnUnload()">

        <div id="a_tabbar" style="width:auto; height:auto"/>
        <div id="myForm" style="height:auto;"></div>
        <div id="ctg"></div>
        <script type="text/javascript">
            //----- loginStatus, gClass, type, group [Retrieve Parameter];
var rId="558"; var loginStatus="edit";
            function doOnUnload() {
                //For saving memory, we recommend to destruct dhtmlxForm instance at the end of form usage
                //by unload method.
                form.unload();
                form = null;
            }

            var cssInsert = "<img src='image/insert1.png' style='margin-top:0px;position:absolute;width:15px;height:15px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:13px;font-weight:bold;'>";
            var cssUpdate = "<img src='image/upData.png' style='margin-top:0px;position:absolute;width:15px;height:15px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:13px;font-weight:bold;'>";
            var cssRev = "<img src='image/rev2.gif' style='margin-top:0px;position:absolute;width:15px;height:15px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:13px;font-weight:bold;'>";
            var cssReset = "<img src='image/sfeers_by_emey87/undo.png' style='margin-top:-0.6px;position:absolute;width:16px;height:16px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:15px;font-weight:bold;'>";
            var cD = new cDateObject();         //Call Date object

            //------------------------------------------ set TABBAR ------------------------------------------//
            tabbar = new dhtmlXTabBar("a_tabbar", "top");
            tabbar.setSkin('dhx_skyblue');
            tabbar.setImagePath("../DHX/dhtmlxTabbar/codebase/imgs/");
            tabbar.addTab("a1", "<img src='image/Doc1.png' style='margin-top:1px;width:15px;height:15px;left:15px;'> <span style='margin-left:5px;font-weight:bold;'>General & Properties</span>", "160px");
            tabbar.setHrefMode("ajax-html");
            tabbar.setContent("a1", "myForm");
            tabbar.setTabActive("a1");
            function addTabImage(para){
//                var sql = "SELECT id FROM productstructure WHERE rowId='"+para+"'";
                tabbar.addTab("a2", "<img src='image/images1.png' style='width:15px;height:15px;left:15px;'> <span style='margin-left:5px;font-weight:bold;'>Image</span>", "100px");
                tabbar.setContentHref("a2","html6.php");
                //tabbar.setContentHref("a2","html5.php?rowId="+para);
                tabbar.showInnerScroll();
            }

            //------------------ select OPTION & gClass,type,group -
            var c,t,g;
            var selOption = "select";
            var partSelOption = "load/selectOptions.php?";
            var sqlUL = "sql=SELECT name FROM unit WHERE class='standard' AND type='length' ORDER BY name ASC&state=";
            var sqlUVo = "sql=SELECT name FROM unit WHERE class='standard' AND type='volume' ORDER BY name ASC&state=";
            var sqlUWei = "sql=SELECT name FROM unit WHERE class='standard' AND type='weight' ORDER BY name ASC&state=";
            var sqlUAr = "sql=SELECT name FROM unit WHERE class='standard' AND type='area' ORDER BY name ASC&state=";
            var sqlUCt = "sql=SELECT name FROM unit WHERE class='count' AND type='count' ORDER BY name ASC&state=";

            if(loginStatus == "edit"){
                c="";t="";g="";
                var stR = loginStatus+"&rowId="+rId;
                var sqlULen = sqlUL+stR;
                var sqlUVolume = sqlUVo+stR;
                var sqlUWeight = sqlUWei+stR;
                var sqlUArea = sqlUAr+stR;
                var sqlUCount = sqlUCt+stR;
                var html5RowId = rId;
                addTabImage(html5RowId);

            }else if(loginStatus == "blank"){
                c=gClass;t=type;g=(group=="null")?"":group;
                var sqlULen = sqlUL+loginStatus;
                var sqlUVolume = sqlUVo+loginStatus;
                var sqlUWeight = sqlUWei+loginStatus;
                var sqlUArea = sqlUAr+loginStatus;
                var sqlUCount = sqlUCt+loginStatus;
            }

            //------------------------------------------ set DATA ------------------------------------------//
            var data = [
                {types:"fieldset",fields:"",keys:"main",enLabels:"Main",thLabels:"ส่วนหลัก"},
                {types:"fieldset",fields:"",keys:"det",enLabels:"Details",thLabels:"รายละเอียด"},
                {types:"fieldset",fields:"",keys:"ctg",enLabels:"CTG",thLabels:"ซีทีจี"},
                {types:"fieldset",fields:"",keys:"button",enLabels:"Button",thLabels:"ปุ่ม"},

                {types:"input",fields:"englishName",keys:"enN",enLabels:"English Name",thLabels:"ชื่ออังกฤษ"},
                {types:"input",fields:"thaiName",keys:"thN",enLabels:"Thai Name",thLabels:"ชื่อไทย"},
                {types:"input",fields:"code",keys:"code",enLabels:"Code",thLabels:"รหัส"},
                {types:"input",fields:"barcode",keys:"bCode",enLabels:"Barcode",thLabels:"บาร์โค๊ด"},

                {types:"input",fields:"shape",keys:"shape",enLabels:"Shape",thLabels:"รูปทรง"},
                {types:selOption,fields:"unitReceipt",keys:"uRe",enLabels:"Unit Receipt",thLabels:"หน่วยรับ"},
                {types:selOption,fields:"unitIssue",keys:"uIs",enLabels:"Unit Issue",thLabels:"หน่วยจ่าย"},
                {types:"input",fields:"amountSubReceipt",keys:"aSuRe",enLabels:" ",thLabels:" "},
                {types:"input",fields:"amountSubIssue",keys:"aSuIs",enLabels:" ",thLabels:" "},
                {types:selOption,fields:"unitSubReceipt",keys:"sURe",enLabels:"",thLabels:""},
                {types:selOption,fields:"unitSubIssue",keys:"sUIs",enLabels:"",thLabels:""},
                
                {types:"input",fields:"unitTranslate",keys:"uTr",enLabels:"Unit Translate",thLabels:"หน่วยแปลง"},
                {types:"input",fields:"description",keys:"descript",enLabels:"Description",thLabels:"รายละเอียด"},

                {types:"input",fields:"length",keys:"len",enLabels:"Length",thLabels:"ยาว"},
                {types:"input",fields:"thinkness",keys:"thi",enLabels:"Thinkness",thLabels:"หนา"},
                {types:"input",fields:"volume",keys:"vol",enLabels:"Volume",thLabels:"ปริมาตร"},
                {types:"input",fields:"area",keys:"area",enLabels:"Area",thLabels:"พื้นผิว"},

                {types:selOption,fields:"unitLength",keys:"uL",enLabels:"",thLabels:""},
                {types:selOption,fields:"unitThinkness",keys:"uThi",enLabels:"",thLabels:""},
                {types:selOption,fields:"unitVolume",keys:"uVol",enLabels:"",thLabels:""},
                {types:selOption,fields:"unitArea",keys:"uAre",enLabels:"",thLabels:""},

                {types:"input",fields:"wideDiameter",keys:"wideD",enLabels:"Wide-Diameter",thLabels:"กว้าง"},
                {types:"input",fields:"height",keys:"hei",enLabels:"Height",thLabels:"สูง"},
                {types:"input",fields:"weight",keys:"wei",enLabels:"Weight",thLabels:"น้ำหนัก"},
                {types:"input",fields:"style",keys:"sty",enLabels:"Style",thLabels:"รูปแบบ"},

                {types:selOption,fields:"unitWD",keys:"uWD",enLabels:"",thLabels:""},
                {types:selOption,fields:"unitHeight",keys:"uHei",enLabels:"",thLabels:""},
                {types:selOption,fields:"unitWeight",keys:"uWei",enLabels:"",thLabels:""},

                //---Calendar
                {types:"label",fields:"startDate_show",keys:"startDS",enLabels:"Start Date",thLabels:"วันที่เริ่ม"},
                {types:"hidden",fields:"startDate",keys:"startD",enLabels:"",thLabels:""},
                {types:"label",fields:"validUntil_show",keys:"validUS",enLabels:"Valid Until",thLabels:"ถึง"},
                {types:"hidden",fields:"validUntil",keys:"validU",enLabels:"",thLabels:""},

                //---class,type,group
                {types:"input",fields:"class",keys:"cl",enLabels:"Class",thLabels:"คลาส"},
                {types:"input",fields:"type",keys:"ty",enLabels:"Type",thLabels:"ไทป์"},
                {types:"input",fields:"gGroup",keys:"gr",enLabels:"Group",thLabels:"กรุ๊ป"},

                //---hidden
                {types:"hidden",fields:"parent",keys:"parent",enLabels:"",thLabels:""},
                {types:"hidden",fields:"parentMain",keys:"parentMain",enLabels:"",thLabels:""},
                {types:"hidden",fields:"id",keys:"id",enLabels:"",thLabels:""},
                {types:"hidden",fields:"typeP",keys:"typeP",enLabels:"",thLabels:""},

                //---button
                {types:"button",fields:"insert",keys:"added",enLabels:cssInsert+"Insert</span>",thLabels:cssInsert+"บันทึก</span>"},
                {types:"button",fields:"update",keys:"upd",enLabels:cssUpdate+"Update</span>",thLabels:cssUpdate+"แก้ไข</span>"},
                {types:"button",fields:"revision",keys:"rev",enLabels:cssRev+"Revision</span>",thLabels:cssRev+"บันทึกข้อมูลใหม่</span>"},
                {types:"button",fields:"reset",keys:"reset",enLabels:cssReset+"Reset</span>",thLabels:cssReset+"ตั้งค่าเริ่มต้น</span>"},
                {types:"button",fields:"clear",keys:"clear",enLabels:cssReset+"Reset</span>",thLabels:cssReset+"ตั้งค่าเริ่มต้น</span>"}
            ];

            //------------------------------------------ set FORM ------------------------------------------//
            var labelW = sesLanguage=="englishName"?90:70;
            var formData = [
                //---- main
                {
                    type:"fieldset",
                    label:"main",
                    inputWidth:"auto",
                    offsetLeft:0,
                    list:[
                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"enN",value:"", validate:"NotEmpty"},
                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"thN",value:"", validate:"NotEmpty"},
                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"code",value:"", validate:"NotEmpty"},
                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"bCode",value:"", validate:"NotEmpty"}]
                },
                //---- Details
                {
                    type:"fieldset",
                    label:"det",
                    inputWidth:"auto",
                    offsetLeft:0,
                    list: [
                        {type: "block", width:965, 
                            list:[
                                {
                                    type:"settings",
                                    position:"label-left",
                                    labelAlign:"right",
                                    labelWidth:labelW,
                                    inputWidth:130
                                },
                                {type:"input",name:"",label:"shape",value:""},                                
                                {type:"input",name:"",label:"uTr",value:""},
                                {type:"block", width:300, 
                                    list:[
                                        {type:selOption,name:"",label:"uRe",connector:partSelOption+sqlUCount+"&unit=unitReceipt",inputWidth:"auto",offsetLeft:5},
                                        {type:selOption,name:"",label:"uIs",connector:partSelOption+sqlUCount+"&unit=unitIssue",inputWidth:"auto",offsetLeft:5},
                                        
                                        {type:"newcolumn",offset:0},
                                        {type:"input",name:"",label:"aSuRe",value:"",inputWidth:50,labelWidth:1},
                                        {type:"input",name:"",label:"aSuIs",value:"",inputWidth:50,labelWidth:1},
                                        
                                        {type:"newcolumn",offset:0},
                                        {type:selOption,name:"",label:"sURe",connector:partSelOption+sqlUCount+"&unit=unitSubReceipt",inputWidth:"auto",offsetLeft:5},
                                        {type:selOption,name:"",label:"sUIs",connector:partSelOption+sqlUCount+"&unit=unitSubIssue",inputWidth:"auto",offsetLeft:5}                                        
                                    ]
                                },
                                {type:"newcolumn",offset:0},
                                {type:"input",name:"",label:"len",value:""},
                                {type:"input",name:"",label:"thi",value:""},
                                {type:"input",name:"",label:"vol",value:""},
                                {type:"input",name:"",label:"area",value:""},

                                {type:"newcolumn",offset:0},
                                {type:selOption,name:"",label:"uL",connector:partSelOption+sqlULen+"&unit=unitLength",inputWidth:"auto",offsetLeft:5},
                                {type:selOption,name:"",label:"uThi",connector:partSelOption+sqlULen+"&unit=unitThinkness",inputWidth:"auto",offsetLeft:5},
                                {type:selOption,name:"",label:"uVol",connector:partSelOption+sqlUVolume+"&unit=unitVolume",inputWidth:"auto",offsetLeft:5},
                                {type:selOption,name:"",label:"uAre",connector:partSelOption+sqlUArea+"&unit=unitArea",inputWidth:"auto",offsetLeft:5},

                                {type:"newcolumn",offset:0},
                                {type:"input",name:"",label:"wideD",value:""},
                                {type:"input",name:"",label:"hei",value:""},
                                {type:"input",name:"",label:"wei",value:""},
                                {type:"input",name:"",label:"sty",value:""},

                                {type:"newcolumn",offset:0},
                                {type:selOption,name:"",label:"uWD",connector:partSelOption+sqlULen+"&unit=unitWD",inputWidth:"auto",offsetLeft:5},
                                {type:selOption,name:"",label:"uHei",connector:partSelOption+sqlULen+"&unit=unitHeight",inputWidth:"auto",offsetLeft:5},
                                {type:selOption,name:"",label:"uWei",connector:partSelOption+sqlUWeight+"&unit=unitWeight",inputWidth:"auto",offsetLeft:5},
                            ]
                        },
                        {type: "block", inputWidth: 900, 
                            list:[
                                {
                                    type:"settings",
                                    position:"label-left",
                                    labelAlign:"right",
                                    labelWidth:labelW,
                                    inputWidth:130
                                },
                                {type:"input",name:"",label:"descript",value:"",rows:"4",inputWidth:"180"}
                            ]
                        },
                        {type: "block", inputWidth: 900, 
                            list:[
                                {
                                    type:"settings",
                                    position:"label-left",
                                    labelAlign:"right",
                                    labelWidth:labelW,
                                    inputWidth:130
                                },
                                {type:"calendar",name:"",label:"startDS",value:"",dateFormat:"%Y-%m-%d",serverDateFormat:"%Y-%m-%d",calendarPosition:"right",readonly:true},
                                {type:"hidden",name:"",label:"startD",value:""},

                                {type:"newcolumn",offset:0},
                                {type:"calendar",name:"",label:"validUS",value:"",dateFormat:"%Y-%m-%d",serverDateFormat:"%Y-%m-%d",calendarPosition:"right",readonly:true},
                                {type:"hidden",name:"",label:"validU",value:""},
                            ]
                        }
                    ]
                },
                //---- CTG
                {
                    type: "fieldset",
                    label: "ctg",
                    inputWidth: "auto",
                    offsetLeft:0,
                    list:[
                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"cl",value:c,readonly:true},
                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"ty",value:t,readonly:true},
                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"gr",value:g,readonly:true}]
                },
                //---- Hidden
                {type:"hidden",name:"",label:"parent",value:"0"},
                {type:"hidden",name:"",label:"parentMain"},
                {type:"hidden",name:"",label:"id"},
                {type:"hidden",name:"",label:"typeP",value:"item"},

                //---- Button
                {type:"fieldset",label:"button",inputWidth:"auto",
                    list: [
                        {type:"newcolumn"},{ type:"button",name:"",label:"added", value:""},
                        {type:"newcolumn"},{ type:"button",name:"",label:"clear", value:""},
                        {type:"newcolumn"},{ type:"button",name:"",label:"upd", value:""},
                        {type:"newcolumn"},{ type:"button",name:"",label:"rev", value:""},
                        {type:"newcolumn"},{ type:"button",name:"",label:"reset", value:""}
                    ]
                }
            ];
            //------------------------------------------ END set FORM ------------------------------------------//



            var fO = new fObject;
            fO.setBeginForm(data,formData,sesLanguage);
            var myForm = new dhtmlXForm("myForm", formData);

            //----- Calendar setSensitiveRange
            dhtmlx.skin = "dhx_skyblue";
            if(loginStatus != "view"){
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

            //------------------------- Show Windows Menu(CLICK class) 'EDIT' -------------------------//
            function showWinsMenu(){
                var stat="ro",dhxWins,w1,grid;
                var data =[
                    {fields:'class',aligns:'right',widths:'120',types:stat,hides:false,enNames:'Class',thNames:'คลาส'},
                    {fields:'type',aligns:'right',widths:'120',types:stat,hides:false,enNames:'Type',thNames:'ชนิด'},
                    {fields:'gGroup',aligns:'right',widths:'120',types:stat,hides:false,enNames:'Group',thNames:'กรุ๊ป'}];
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
                grid.loadXML("load/blank_G.php");
            }

            //------------------------- AJAX(code,barcode) FOR enable,disable(BUTTON) -------------------------//
            var i1="0",i2="0",label;
            myForm.attachEvent("onChange", function (id, value){
                if(id == "code" || id == "barcode"){
                    dhtmlxAjax.get("load/ajax/code.php?val="+encodeURI(value)+"&field="+id,function(loader){
                        var resText = loader.xmlDoc.responseText.split(",");
                        if(resText[0] == "NoData"){
                            //OK! no repeat in Database
                            if(id == "code") i1="0",label="Code";
                            if(id == "barcode") i2="0",label="Barcode";
                            myForm.setItemLabel(id, label);
                            //alert("i1 :"+i1+" ,i2 :"+i2);
                            if(i1=="0" && i2=="0"){
                                myForm.enableItem("insert");
                                myForm.enableItem("update");
                            }
                            myForm.disableItem("revision");
                        }else{
                            //Repeat in Database
                            alert0(resText[0]);
                            if(id == "code") i1="1",label="Code";
                            if(id == "barcode") i2="1",label="Barcode";
                            myForm.setItemLabel(id,"<span style='color:red;'>"+label+"</span>");
                            myForm.disableItem("insert");
                            myForm.disableItem("update");
                            myForm.disableItem("revision");
                        }
                    });
                }else if(id == "unitReceipt" || id == "unitIssue"){
                    var unitSub=(id=="unitReceipt")?"unitSubReceipt":"unitSubIssue";
                    var opts = myForm.getSelect(unitSub);
                    opts.innerHTML = "";
                    
                    dhtmlxAjax.get("load/ajax/unitSub.php?id="+id+"&value="+value,function(loader){
                        var text;
                        if(loader.xmlDoc.responseText.search(",") == "-1"){
                            //not found
                            text = loader.xmlDoc.responseText;
                            opts.options[1] = new Option(text,text);     //new Option(text, value)
                        }else{
                            text = loader.xmlDoc.responseText.split(",");
                            opts.options[0] = new Option("","");     //new Option(text, value)
                            for(var i=0;i<text.length;i++){
                                opts.options[i+1] = new Option(text[i],text[i]);     //new Option(text, value)
                            }
                        }
                    });
                    
                }
            });

            //------------------------- CLICK BUTTON!! -------------------------//
            myForm.attachEvent("onButtonClick", function(id) {
                if (id == "insert" || id == "update"){
                    //alert(myForm.getItemValue(id));
                    var thMes = id=="insert"? "บันทึกใหม่":"แก้ไขข้อมูล";
                    var mes = sesLanguage=="englishName"? id+" ?":thMes+" ?";
                    if (confirm(mes)==true){
                        if(id == "insert"){
                            var newIdStr = "stru-"+cD.dn+" "+cD.tn+":"+cD._mil()+"-"+sesUser;
                            myForm.setItemValue("id",newIdStr);
                        }

                        //------------------------- SET start,valid Before insert Database -------------------------
                        if(myForm.getItemValue("startDate_show") !== null){
                            var staS = myForm.getCalendar("startDate_show");
                            var gDate = staS.getDate();
                            var sDate = gDate.getFullYear()+"-"+_month(gDate)+"-"+_d(gDate);
                            myForm.setItemValue("startDate",sDate);
                        }
                        if(myForm.getItemValue("validUntil_show") !== null){
                            var valS = myForm.getCalendar("validUntil_show");
                            var gValid = valS.getDate();
                            var sValid = gValid.getFullYear()+"-"+_month(gValid)+"-"+_d(gValid);
                            myForm.setItemValue("validUntil",sValid);
                        }
                        myForm.save();
                    }

                }else if(id == "revision"){
                    var mes = sesLanguage=="englishName"? id:"บันทึกข้อมูลใหม่";
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

                        var sql = "productstructure";
                        var fields = fO.fields;
                        var parameter1 = "sql="+sql+"&fields="+fields;
                        var dhxType = "form";
                        var rowId = "rowId";
                        var parameter2 = "dhxType="+dhxType+"&sql="+sql+"&rowId="+rowId+"&fields="+fields;
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
                        //                        myForm.send("update/revisionDB.php?"+parameter,"post",function(xml) {
                        //                            myForm.clear();
                        //                            alert(xml.xmlDoc.responseXML.xml);
                        //                            xml.xmlDoc.responseText or xml.xmlDoc.responseXML.xml
                        //                        })
                    }

                }else if(id == "reset"){
                    var mes = sesLanguage=="englishName"? id+" ?":"ตั้งค่าเริ่มต้น ?";
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
                    var mes = sesLanguage=="englishName"? "Reset ?":"ตั้งค่าเริ่มต้น ?";
                    if (confirm(mes)==true){
                        myForm.setItemLabel("code","<span style='color:black;'>Code</span>");
                        myForm.setItemLabel("barcode","<span style='color:black;'>Barcode</span>");
                        myForm.setItemLabel("englishName","<span style='color:black;'>English Name</span>");
                        myForm.setItemLabel("thaiName","<span style='color:black;'>Thai Name</span>");
                        myForm.enableItem("insert");
                        myForm.clear();
                    }
                }
            });

            //------------------------- connect DATABASE -------------------------//
            var dhxType = "form";
            var sql = "productstructure";
            var rowId = "rowId";
            var fields = fO.fields;
            var parameter = "dhxType="+dhxType+"&sql="+sql+"&rowId="+rowId+"&fields="+fields;

            if(loginStatus == "edit"){
                myForm.load("update/connectorDHX.php?"+parameter+"&id="+rId);

                myForm.attachEvent("onXLE", function (){    //when load data!!
                    var gDate = myForm.getItemValue("startDate");
                    if(gDate !== null){
                        myForm.setItemValue("startDate_show",gDate);
                    }
                    var gValid = myForm.getItemValue("validUntil");
                    if(gValid !== null){
                        myForm.setItemValue("validUntil_show",gValid);
                    }
                });
            }
            myDP = new dataProcessor("update/connectorDHX.php?"+parameter);//lock feed url
            myDP.enableDataNames(true); //will use names instead of indexes
            myDP.init(myForm); //link dataprocessor to the grid
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid){
                //alert("sid : "+sid);
                alert0(action);
                if(action == "inserted"){
                    myForm.setItemValue("parentMain",sid);
                    myForm.hideItem("insert");
                    myForm.hideItem("clear");
                    myForm.showItem("update");
                    addTabImage(sid);
                }
                //alert(tid);
            });
        </script>
    </body>
</html>

