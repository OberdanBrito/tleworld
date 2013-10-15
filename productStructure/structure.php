<?php
require("cSStructure.php");

/////////////////////////////////---- SET unit ----/////////////////////////////////
$unit = array();
$sql_unit = "SELECT englishName FROM rates WHERE type='exchange'";
$q_unit = mysql_query($sql_unit);
$nr_unit = mysql_num_rows($q_unit);
if (checkStateSQL($nr_unit)) {
    while ($fa_unit = mysql_fetch_array($q_unit)) {
        array_push($unit, $fa_unit[0]);
    }
}

echo "<script type='text/javascript'>";
//echo "var sesUser = '" . $_SESSION['loginUser'] . "';";
//echo "var sesCompany = '" . $_SESSION['loginCompany'] . "';";
//echo "var sesLanguage = '" . $_SESSION['logLanguage'] . "';";
echo "var sesStatus = '" . $_SESSION['loginStatus'] . "';";
//
//-------- unit --------
echo "var unit = '" . json_encode($unit) . "';";

//-------- blank --------
//echo "var selClass = '" . $class . "';";
//echo "var selType = '" . $type . "';";
//echo "var selGroup = '" . $group . "'=='null'?'':'" . $group . "';";
//-------- selProduct(blank) --------
echo "var selRowId = '" . $rId . "';";
echo "</script>";
?>
<html>
    <head>
        <title>Product Structure</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            .error {background-color: #ffd4db !important;color:maroon !important;}
        </style>
        <script>_css_prefix = "../../DHX/dhtmlxGrid/codebase/";
            dhtmlx = {};
            function alert0(str) {
                dhtmlx.message.defPosition="bottom";
                dhtmlx.message({
                    text:str,
                    id:"s2",
                    lifetime:3000,
                    type:"error"
                });
            }
        </script> <!-- to use with alert0-->

        <!-- dhtmlxDataProcessor -->
        <script type="text/javascript" src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>

        <!-- dhtmlxConnector -->
        <script type="text/javascript" src="../DHX/dhtmlxConnector/codebase/connector.js"></script>

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
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_link.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>
        <!--script type="text/javascript" src="JS/codeBase/dhtmlxgrid_srnd.js"></script-->

        <!-- dhtmlxTreeGrid -->
        <script type="text/javascript" src="../DHX/dhtmlxTreeGrid/codebase/dhtmlxtreegrid.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxTreeGrid/sources/ext/dhtmlxtreegrid_filter.js"></script>

        <!-- dhtmlxForm -->
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css"/>
        <script src="../DHX/dhtmlxForm/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
        <script src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_combo.js"></script>

        <!--  dhtmlxTabbar -->
        <script type="text/javascript" src="../DHX/dhtmlxTabbar/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxTabbar/codebase/dhtmlxtabbar.js"></script>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxTabbar/codebase/dhtmlxtabbar.css"/>

        <!-- dhtmlxCombo -->
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>

        <!-- dhtmlxAccordion -->
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxAccordion/codebase/skins/dhtmlxaccordion_dhx_skyblue.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxAccordion/codebase/dhtmlxcontainer.js"></script>

        <!-- dhtmlxAjax -->
        <script type="text/javascript" src="../DHX/dhtmlxAjax/codebase/dhtmlxcommon.js"></script>

        <!-- dhtmlxMenu -->
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxMenu/codebase/skins/dhtmlxmenu_dhx_blue.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js"></script>

        <!-- dhtmlxWindows -->
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.css"/>
        <link rel="STYLESHEET" type="text/css" href="../DHX/dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css"/>
        <script type="text/javascript" src="../DHX/dhtmlxWindows/codebase/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxWindows/codebase/dhtmlxcontainer.js"></script>
        <script type="text/javascript" src="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.js"></script>

        <!-- Manage JS -->
        <script type="text/javascript" src="../itemMaster/js/fnDateObj.js"></script>
        <script type="text/javascript" src="../commons/js/fnMainObj_DHX1.0.js"></script>
        <script type="text/javascript" src="js/structureManage.js"></script>
        <script type="text/javascript" src="js/ajaxHttp.js"></script>
        <script type="text/javascript">

            window.onload = function() {
                if(sesStatus == "edit"){
                    document.getElementById('accordObj').style.display = "none";
                    document.getElementById('myForm').style.display = "none";
                    document.getElementById('price').style.width = "65%";
                    document.getElementById('accordObjCopy').style.width = "65%";
                    document.getElementById('accordObjCopy').style.height = "100%";
                    document.getElementById('tdCopy').style.height = "78%";
                    document.getElementById('tableMain').style.height = "100%";
                    document.getElementById('tableMain').style.marginTop = "-1em";
                }
            }
        </script>
    </head>
    <body>
        <form>  
            <table id="tableMain">
                <tr>
                    <td style="position:relative;"><div id="accordObj" style="width: 900px; height: 250px;"></div></td>
                    <td style="position:absolute;"><div id="myForm" style="width:200px; height: 250px; "></div></td>
                </tr>
                <tr >
                    <!--<td style="position:absolute;"><div id="accordObjCopy" style="border: none;"></div></td>-->
                    <td id="tdCopy" style="position:relative;"><div id="accordObjCopy" style="width: 900px; height: 150px;"></div></td>
                </tr>
                <tr>
                    <td style="position:relative;"><div id="price" style="width: 900px; height: 100px;"></div></td>
                </tr>
            </table>
            <!--input type="button" id="New" value="New" onclick="onDigit('11-15');"-->
        </form>
        <script>
            //            alert(sesLanguage);
            //where you need to parse out an object from JSON-string (like in an AJAX request), the safe way is to use JSON.parse(..) 
            var unitJson = JSON.parse(unit);
            var myForm="";
            var dhxWins,w1,gridCTG;        //windows Popup

            //####################################################################################
            //
            //--------------- FUNCTION
            //
            //####################################################################################
            function doOnEdit(stage,rId,cInd,nValue,oValue){
                var rowInd = treeGridC.getRowIndex(rId);             //get row
                var a=parseInt(objC.type, 10)-1;                     //a == return digit column of class
                if (stage == 0) {
                    //                    alert(treeGrid.getAllRowIds());
                    //First Row
                    if(cInd == obj.englishName || cInd == objC.englishName){
                        return false;
                        
                        //
                        //--------------- CLASS,TYPE,GROUP
                        //####################################################################################
                    }else if(cInd == a){
                        if(rowInd == 0){
                            dhxWins = new dhtmlXWindows();
                            dhxWins.setImagePath("../DHX/dhtmlxWindows/codebase/imgs/");
                            w1 = dhxWins.createWindow("w1", 20, 30, 430, 350);
                            w1.setText("Class / Type / Group");
                            gridCTG = w1.attachGrid();
                            var dataCTG =[
                                {fields:'class',aligns:'center',widths:'130',types:'ed',hides:false,enNames:'Class',thNames:'คลาส'},
                                {fields:'type',aligns:'center',widths:'130',types:'ro',hides:false,enNames:'Type',thNames:'ชนิด'},
                                {fields:'gGroup',aligns:'center',widths:'130',types:'ro',hides:false,enNames:'Group',thNames:'กรุ๊ป'}];
                            var objCTG = new cObject;
                            objCTG.setBegin(gridCTG,dataCTG,sesLanguage);
                            gridCTG.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
                            gridCTG.init();
                            gridCTG.loadXML("load/popupWin/psLoadCTG.php");
                            gridCTG.attachEvent("onRowSelect",function(id,ind){
                                //class, type, gGroup
                                treeGridC.cells(rId, a).setValue(this.cells(id,0).getValue());
                                treeGridC.cells(rId, a+1).setValue(this.cells(id,1).getValue());
                                treeGridC.cells(rId, a+2).setValue(this.cells(id,2).getValue());
                                if(sesStatus == "edit"){
                                    if(confirm("Update 'Class,Type,Group' in PRICE ?")==true){
                                        var p = parseInt(objP.type,10)-1;
                                        var rowIdPrice = treeGridP.getAllRowIds();
                                        treeGridP.cells(rowIdPrice, p).setValue(this.cells(id,0).getValue());
                                        treeGridP.cells(rowIdPrice, p+1).setValue(this.cells(id,1).getValue());
                                        treeGridP.cells(rowIdPrice, p+2).setValue(this.cells(id,2).getValue());
                                        myDPrice.setUpdated(treeGridP.getRowId(0),true);
                                    }
                                }else{
                                    var p = parseInt(objP.type,10)-1;
                                    var rowIdPrice = treeGridP.getAllRowIds();
                                    treeGridP.cells(rowIdPrice, p).setValue(this.cells(id,0).getValue());
                                    treeGridP.cells(rowIdPrice, p+1).setValue(this.cells(id,1).getValue());
                                    treeGridP.cells(rowIdPrice, p+2).setValue(this.cells(id,2).getValue());
                                    myDPrice.setUpdated(treeGridP.getRowId(0),true);
                                }
                                
                                dhxWins.window("w1").close();
                                myDPCopy.setUpdated(treeGridC.getRowId(0),true);
                            });
                        }
                        return false;
                    }
                } else if (stage == 1) {
                } else if(stage == 2){
                    if(rowInd == 0){
                        //
                        //--------------- COST
                        //####################################################################################
                        if(cInd == objC.cost){
                            var changeCost = treeGridC.cells(treeGridC.getRowId(0),objC.cost).getValue();
                            myDPCopy.setUpdated(treeGridC.getRowId(0),true);
                            if(sesStatus == "edit"){
                                //                            if(confirm("Update 'Cost' in PRICE ?")==true){
                                //                                treeGridP.cells(treeGridP.getRowId(0), objP.cost).setValue(changeCost);
                                //                                myDPrice.setUpdated(treeGridP.getRowId(0),true);
                                //                            }
                                //$flagU = (strpos($fa_userP[0], 'c') === false) ? "flag='" . $fa_userP[0] . "c'," : "flag='" . $fa_userP[0] . "',";
                                var gFlag = treeGridP.cells(treeGridP.getRowId(0),objP.flag).getValue();
                                var sFlag = (gFlag.search("c") === -1)? gFlag+"c":gFlag;
                                treeGridP.cells(treeGridP.getRowId(0), objP.flag).setValue(sFlag);
                                myDPrice.setUpdated(treeGridP.getRowId(0),true);
                            }else{
                                treeGridP.cells(treeGridP.getRowId(0), objP.cost).setValue(changeCost);
                                myDPrice.setUpdated(treeGridP.getRowId(0),true);
                            }
                            //                            return true;
                        }
                    }
                    
                    
                    var parentId = treeGrid.getParentId(rId);
                    if(parentId==0){
                        return true;
                    }
                    var childBB = treeGrid.getAllSubItems(parentId).split(",");
                    var sumCost=0;
                    for(var b=0;b<childBB.length;b++){
                        //                        alert("id: "+childBB[b]+" , parentId:"+treeGrid.getParentId(childBB[b])+" = "+parentId);
                        if(treeGrid.getParentId(childBB[b]) == parentId){
                                
                            var amoutBB = parseInt(treeGrid.cells(childBB[b],obj.quantity).getValue());
                            var costBB = parseFloat(treeGrid.cells(childBB[b],obj.cost).getValue());
                            sumCost += amoutBB*costBB;
                        }
                    }
                    if(treeGrid.cells(parentId,obj.typeP).getValue() == "Bom"){
                        treeGrid.cells(parentId,obj.cost).setValue(sumCost);
                    }
                    return true;
                }// end stage 2
            }

            //####################################################################################
            //--------------- [ FORM ] CODE for status='new'
            //####################################################################################
            function manageCode(gRowId){
                //--- get rowId bom
                var gRowBom = treeGrid.getParentId(gRowId);
                var gParBom,subBom,mCode="",subPar,allCode;
                if(gRowBom == "0"){
                    //parent == 0
                }else{
                    //--- get sub bom
                    subBom = treeGrid.getSubItems(gRowBom).split(",");
                    for(b=0; b<subBom.length; b++){
                        var gCode = treeGrid.cells(subBom[b],obj.code).getValue();
                        mCode += "/"+gCode;
                    }
                        
                    //--- get parent
                    gParBom = treeGrid.getParentId(gRowBom);
                    //--- get sub parent
                    subPar = treeGrid.getSubItems(gParBom).split(",");
                    for(p=0; p<subPar.length; p++){
                        //--- get bom,style
                        var gType = treeGrid.cells(subPar[p],obj.englishName).getValue();
                        var gPrefix = treeGrid.cells(gParBom,obj.prefix).getValue();
                        if(gType == "Style"){
                            //--- sub Style
                            if(treeGrid.getSubItems(subPar[p]) != ""){
                                //                                alert("have Child");
                                var subStyle = treeGrid.getSubItems(subPar[p]);
                                var gStyle = treeGrid.cells(subStyle,obj.code).getValue();
                                allCode = gPrefix+"-"+gStyle+mCode;
                            }else{
                                //                                    alert("no have child");
                                allCode = gPrefix+mCode;
                            }
                            treeGrid.cells(gParBom,obj.code).setValue(allCode);
                        }
                    }
                    manageCode(gParBom);
                }
            }

            //####################################################################################
            //--------------- [ FORM ] SET STYLE for status='new' [RIGHT]
            //####################################################################################
            function manageStyle(gId,gFields){
                gFields = gFields+",rowId";
                var countFields = gFields.split(",").length;
                var getRowInd = countFields-1;
                //                alert(getRowInd);
                if(typeof myForm != "string"){
                    //                    myForm.removeItem("detail");
                    myForm.removeItem("rStyle");
                }
                
                //                var sql = "SELECT "+gFields+" FROM productstructure WHERE parent='"+gId+"'";
                myForm = new dhtmlXForm("myForm", formData);
                myForm.loadStruct("load/form/style.php?parent="+gId+"&fields="+gFields);
                var parentId = treeGrid.getParentId(gId);
                //                var gParentE = treeGrid.cells(parentId,obj.englishName).getValue();                
                //                var gParentT = treeGrid.cells(parentId,obj.thaiName).getValue();
                //                var gPrefixCode = treeGrid.cells(parentId,obj.prefix).getValue();
                //                myForm.setItemValue("englishName",gParentE);
                //                myForm.setItemValue("thaiName",gParentT);
                //                myForm.setItemValue("code",gParentCode);
                        
                myForm.attachEvent("onButtonClick", function(id){
                    var cD = new cDateObject();         //Call Date object
                    var dateNow = cD.dn;
                    var newIdStr = "stru-"+new Date().getTime()+"-"+sesUser;
                    
                    //                    var gValE = myForm.getItemValue("englishName");
                    //                    var gValT = myForm.getItemValue("thaiName");
                    //                    var gValCode = myForm.getItemValue("code");
                    var gStyle = myForm.getItemValue("style");
                    var setRowId = gStyle.split(",")[getRowInd];
                    //                    myDP.setUpdateMode("off");
                    //--------------------------------------------- SET Child ---------------------------------------------//
                    if(treeGrid.hasChildren(gId) != "1"){
                        //no child
                        //var uId=treeGrid.uid();
                        myDP.ignore(function(){
                            treeGrid.addRow(setRowId,gStyle,"",gId);
                            treeGrid.cells(treeGrid.getAllSubItems(gId),obj.id).setValue(newIdStr);
                            treeGrid.cells(treeGrid.getAllSubItems(gId),obj.loginUserId).setValue(sesUserId);
                            treeGrid.cells(treeGrid.getAllSubItems(gId),obj.loginCompanyId).setValue(sesCompanyId);
                            treeGrid.cells(treeGrid.getAllSubItems(gId),obj.startDate).setValue(dateNow);
                            treeGrid.openItem(gId);
                        })
                    }else{
                        //have child
                        var setStyle = gStyle.split(",");
                        for(var index in setStyle){
                            if(index == getRowInd){
                                
                                treeGrid.openItem(gId);
                                alert("1 : "+treeGrid.getRowIndex(treeGrid.getAllSubItems(gId)));
                                treeGrid.setRowId(treeGrid.getRowIndex(treeGrid.getAllSubItems(gId)),setRowId);     //set NEW rowId
                                alert("2 : "+treeGrid.getRowIndex(treeGrid.getAllSubItems(gId)));
                            }else{
                                treeGrid.cells(treeGrid.getAllSubItems(gId),index).setValue(setStyle[index]);
                            }
                        }
                        treeGrid.cells(treeGrid.getAllSubItems(gId),obj.id).setValue(newIdStr);
                        treeGrid.cells(treeGrid.getAllSubItems(gId),obj.loginUserId).setValue(sesUserId);
                        treeGrid.cells(treeGrid.getAllSubItems(gId),obj.loginCompanyId).setValue(sesCompanyId);
                        treeGrid.cells(treeGrid.getAllSubItems(gId),obj.startDate).setValue(dateNow);
                        //                        treeGrid.openItem(gId);
                    }
                    
                    //--------------------------------------------- SET Parent ---------------------------------------------//
                    var codeStyle = gStyle.split(",")[obj.code];
                    //                    gValCode = (gValCode==null)?"":gValCode;
                    //                    var setCode = gPrefixCode+""+gValCode+"-"+codeColor;
                    //                    
                    var rowIdRoot = treeGrid.getParentId(gId);
                    //                    treeGrid.cells(parentId,obj.englishName).setValue(gValE);           //set new englishName
                    //                    treeGrid.cells(parentId,obj.thaiName).setValue(gValT);              //set new thaiName
                    //                    treeGrid.cells(parentId,obj.code).setValue(setCode);                //set new code
                    treeGrid.cells(rowIdRoot,obj.style).setValue(codeStyle);             //set new Style
                    //                    var subRowBom = treeGrid.getSubItems(parentId).split(",");
                    //                    var mSubCode="",gSetCode,allCode2;
                    //                    for(r=0; r<subRowBom.length; r++){
                    //                        if(treeGrid.cells(subRowBom[r],obj.englishName).getValue() == "Bom"){
                    //                            //--- open state
                    //                            if(treeGrid.getOpenState(subRowBom[r]) == true){
                    //                                var subBom2 = treeGrid.getSubItems(subRowBom[r]).split(",");
                    //                                for(s=0; s<subBom2.length; s++){
                    //                                    mSubCode += "/"+treeGrid.cells(subBom2[s],obj.code).getValue();
                    //                                }
                    //                            }
                    //                        }
                    //                    }
                    //                    //                    alert("mSubCode : "+mSubCode);
                    //                    gSetCode = treeGrid.cells(parentId,obj.code).getValue();
                    //                    allCode2 = gSetCode+mSubCode;
                    //                    //                    alert("allCode2 : "+allCode2);
                    //                    treeGrid.cells(parentId,obj.code).setValue(allCode2);
                    //                    alert(parentId);
                    //                    manageCode(parentId);
                    
                    //                    myForm.removeItem("detail");
                    myForm.removeItem("rStyle");
                });
                return true;
            }           
            
            
            //------------------------------------------ [ FORM ] set DATA------------------------------------------//
            var cssInsert = "<img src='../itemMaster/image/insert1.png' style='margin-top:0px;position:absolute;width:15px;height:15px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:13px;font-weight:bold;'>";
            var data = [
                //                {types:"fieldset",fields:"detail",keys:"det",enLabels:"Details",thLabels:"รายละเอียด"},
                //
                //                //--Detail
                //                {types:"input",fields:"englishName",keys:"enN",enLabels:"English Name",thLabels:"ชื่ออังกฤษ"},
                //                {types:"input",fields:"thaiName",keys:"thN",enLabels:"Thai Name",thLabels:"ชื่อไทย"},
                //                {types:"input",fields:"code",keys:"code",enLabels:"Code",thLabels:"รหัส"},
                //                //                {types:"input",fields:"barcode",keys:"bCode",enLabels:"Barcode",thLabels:"บาร์โค๊ด"},
                //
                //                //---hidden
                //                {types:"hidden",fields:"parent",keys:"parent",enLabels:"",thLabels:""},
                //                {types:"hidden",fields:"parentMain",keys:"parentMain",enLabels:"",thLabels:""},
                //                {types:"hidden",fields:"id",keys:"id",enLabels:"",thLabels:""},
                //                {types:"hidden",fields:"typeP",keys:"typeP",enLabels:"",thLabels:""},
                //
                //                //---button
                //                {types:"button",fields:"insert",keys:"added",enLabels:cssInsert+"Insert</span>",thLabels:cssInsert+"บันทึก</span>"},
            ];
            
            //------------------------------------------ [ FORM ] set FormData------------------------------------------//
            var labelW = sesLanguage=="English"?90:70;
            var formData = [
                {
                    //                    type:"fieldset",
                    //                    label:"det",
                    //                    inputWidth:"300",
                    //                    offsetLeft:0,
                    //                    name:"",
                    //                    list:[
                    //                        //---- Main
                    //                        {
                    //                            type:"block", inputWidth: 300,name:"detail1",
                    //                            list:[
                    //                                {
                    //                                    type:"settings",
                    //                                    position:"label-left",
                    //                                    labelAlign:"right",
                    //                                    labelWidth:labelW,
                    //                                    inputWidth:130
                    //                                },
                    //                                {type:"newcolumn",offset:0},
                    //                                {type:"input",name:"",label:"enN",value:"", validate:"NotEmpty"},
                    //                                {type:"input",name:"",label:"thN",value:"", validate:"NotEmpty"},
                    //                                {type:"input",name:"",label:"code",value:"", validate:"NotEmpty"}]
                    //                        }
                    //                    ]
                }];
            var fO = new fObject;
            fO.setBeginForm(data,formData,sesLanguage);
            
            //################################################################################
            //                                                                              ##
            //                                                                              ##
            //                          OBJECT HANDLING                                     ##
            //                                                                              ##
            //                                                                              ##
            //################################################################################
            
            //####################################################################################
            //--------------- MAIN
            //####################################################################################
            //var stat=(sesStatus == "new")?"ed":"ro";
            var data =[{fields:"englishName",aligns:'left',widths:'200',types:'tree',hides:false,enNames:'English Name',thNames:'ชื่ออังกฤษ'},
                {fields:'thaiName',aligns:'left',widths:'100',types:'ro',hides:true,enNames:'Thai Name',thNames:'ชื่อไทย'},
                {fields:'id',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'Id',thNames:'รหัส'},
                {fields:'itemId',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'itemId',thNames:'รหัสไอเทม'},
                {fields:'parentMain',aligns:'left',widths:'150',types:'ro',hides:true,enNames:'parentMain',thNames:'รหัสหลัก'},
                {fields:'prefix',aligns:'left',widths:'80',types:'ro',hides:true,enNames:'Prefix',thNames:'นำหน้ารหัส'},
                {fields:'description',aligns:'left',widths:'200',types:'ro',hides:false,enNames:'Description',thNames:'รายละเอียด'},
                {fields:'code',aligns:'center',widths:'100',types:'ro',hides:false,enNames:'Code',thNames:'รหัส'},
                {fields:'barCode',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Barcode',thNames:'บาร์โค๊ด'},
                {fields:'suffix',aligns:'left',widths:'80',types:'ro',hides:true,enNames:'Suffix',thNames:'ต่อท้ายรหัส'},
                {fields:'quantity',aligns:'right',widths:'60',types:'ro',hides:false,enNames:'Quantity',thNames:'จำนวน'},
                {fields:'unit',aligns:'left',widths:'60',types:'ro',hides:false,enNames:'Unit',thNames:'หน่วย'},
                {fields:'cost',aligns:'right',widths:'70',types:'ro',hides:false,enNames:'Cost',thNames:'ราคา'},
                {fields:'unitCost',aligns:'left',widths:'70',types:'ro',hides:false,enNames:'Unit Cost',thNames:'หน่วย'},
                {fields:'class',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Class',thNames:'คลาส'},
                {fields:'type',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Type',thNames:'ชนิด'},
                {fields:'gGroup',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Group',thNames:'กรุ๊ป'},
                {fields:'typeP',aligns:'center',widths:'50',types:'ro',hides:true,enNames:'TypeP',thNames:'ชนิดข้อมูล'},
                {fields:'weight',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Weight',thNames:'น้ำหนัก'},
                {fields:'unitWeight',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Unit Weight',thNames:'หน่วยน้ำหนัก'},
                {fields:'volume',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Volume',thNames:'ปริมาตร'},
                {fields:'unitVolume',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Unit Volume',thNames:'หน่วยปริมาตร'},
                {fields:'style',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Style',thNames:'สไตล์'},
                {fields:'vat',aligns:'left',widths:'70',types:'ro',hides:false,enNames:'Vat',thNames:'ภาษี'},
                {fields:'loginUserId',aligns:'left',widths:'50',types:'ro',hides:true,enNames:'loginUser',thNames:'ผู้ใช้ล็อกอิน'},
                {fields:'loginCompanyId',aligns:'left',widths:'50',types:'ro',hides:true,enNames:'loginCom',thNames:'บริษัทล็อกอิน'},
                {fields:'loginLevel',aligns:'center',widths:'50',types:'ro',hides:true,enNames:'loginLev',thNames:'ระดับล๊อกอิน'},
                {fields:'startDate',aligns:'center',widths:'50',types:'ro',hides:true,enNames:'startDate',thNames:'วันที่เริ่ม'},
                {fields:'used',aligns:'right',widths:'70',types:'ro',hides:false,enNames:'Used',thNames:'Used'}];
            var obj = new cObject;

            // Create Context Menu
            var menu = new dhtmlXMenuObject("accordObj","dhx_blue");
            menu.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
            menu.attachEvent("onClick", onSelectMenu);
            menu.renderAsContextMenu();
            menu.loadXML("xml/structure.xml");
            
            treeGrid = new dhtmlXGridObject('accordObj');
            treeGrid.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
            obj.setBegin(treeGrid,data,sesLanguage);
            var fields = obj.fields;
            treeGrid.setColumnIds(fields);
            //--- Menu Context
            treeGrid.enableContextMenu(menu);
            treeGrid.setNumberFormat("0,000.00",obj.cost,".",",");              //number format
            treeGrid.attachEvent("onBeforeContextMenu", onShowMenu);
            //            treeGrid.attachEvent("onOpenStart", function(id,state){
            //                //                    alert("Open : "+treeGrid.getOpenState(id));
            //                if(treeGrid.getOpenState(id) == false){
            //alert(1);
            ////                    treeGrid.kidsXmlFile = "load/blankList/load_2_level.php?rwId="+id+"&fields="+fields;
            //                    return true;
            //                }else{
            //                    alert(2);
            ////                    treeGrid.deleteChildItems(id);
            //                    return true;
            //                }
            //            });
            //            treeGrid.attachEvent("onEditCell",doOnEdit);
            //            treeGrid.setStyle("", "font-weight:bold;","", "");
            treeGrid.init();
            treeGrid.enableHeaderMenu();                    //add file 'dhtmlxgrid_hmenu.js'
            //            treeGrid.loadSizeFromCookie();                  //add file 'ext/dhtmlxgrid_ssc.js'
            //            treeGrid.enableAutoSaving();
            //            treeGrid.enableAutoSizeSaving();
            //--- END Menu Context
            
            
            //####################################################################################
            //--------------- COPY
            //####################################################################################
            
            var dataC =[{fields:"englishName",aligns:'left',widths:'200',types:'tree',hides:false,enNames:'English Name',thNames:'ชื่ออังกฤษ'},
                {fields:'thaiName',aligns:'left',widths:'100',types:'ro',hides:true,enNames:'Thai Name',thNames:'ชื่อไทย'},
                {fields:'id',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'Id',thNames:'รหัส'},
                {fields:'itemId',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'itemId',thNames:'รหัสไอเทม'},
                {fields:'parentMain',aligns:'left',widths:'150',types:'ro',hides:true,enNames:'parentMain',thNames:'รหัสหลัก'},
                {fields:'prefix',aligns:'left',widths:'80',types:'ro',hides:true,enNames:'Prefix',thNames:'นำหน้ารหัส'},
                {fields:'description',aligns:'left',widths:'200',types:'ro',hides:false,enNames:'Description',thNames:'รายละเอียด'},
                {fields:'code',aligns:'center',widths:'100',types:'ro',hides:false,enNames:'Code',thNames:'รหัส'},
                {fields:'customCode',aligns:'center',widths:'100',types:'ed',hides:false,enNames:'Custom Code',thNames:'รหัสลูกค้า'},
                {fields:'barCode',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Barcode',thNames:'บาร์โค๊ด'},
                {fields:'suffix',aligns:'left',widths:'80',types:'ro',hides:true,enNames:'Suffix',thNames:'ต่อท้ายรหัส'},
                {fields:'quantity',aligns:'right',widths:'60',types:'ro',hides:false,enNames:'Quantity',thNames:'จำนวน'},
                {fields:'unit',aligns:'left',widths:'60',types:'ro',hides:false,enNames:'Unit',thNames:'หน่วย'},
                {fields:'cost',aligns:'right',widths:'70',types:'edn',hides:false,enNames:'Cost',thNames:'ราคา'},
                //                {fields:'unitCost',aligns:'left',widths:'70',types:'coro',hides:false,enNames:'Unit Cost',thNames:'หน่วย'},
                {fields:'unitCost',aligns:'left',widths:'70',types:'ro',hides:false,enNames:'Unit Cost',thNames:'หน่วย'},
                {fields:'class',aligns:'center',widths:'70',types:'ed',hides:false,enNames:'Class',thNames:'คลาส'},
                {fields:'type',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Type',thNames:'ชนิด'},
                {fields:'gGroup',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Group',thNames:'กรุ๊ป'},
                {fields:'typeP',aligns:'center',widths:'50',types:'ro',hides:true,enNames:'TypeP',thNames:'ชนิดข้อมูล'},
                {fields:'weight',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Weight',thNames:'น้ำหนัก'},
                {fields:'unitWeight',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Unit Weight',thNames:'หน่วยน้ำหนัก'},
                {fields:'volume',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Volume',thNames:'ปริมาตร'},
                {fields:'unitVolume',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Unit Volume',thNames:'หน่วยปริมาตร'},
                {fields:'style',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Style',thNames:'สไตล์'},
                {fields:'vat',aligns:'left',widths:'70',types:'ro',hides:false,enNames:'Vat',thNames:'ภาษี'},
                {fields:'loginUserId',aligns:'left',widths:'50',types:'ro',hides:true,enNames:'loginUser',thNames:'ผู้ใช้ล็อกอิน'},
                {fields:'loginCompanyId',aligns:'left',widths:'50',types:'ro',hides:true,enNames:'loginCom',thNames:'บริษัทล็อกอิน'},
                {fields:'loginLevel',aligns:'center',widths:'50',types:'ro',hides:true,enNames:'loginLev',thNames:'ระดับล๊อกอิน'},
                {fields:'startDate',aligns:'center',widths:'50',types:'ro',hides:true,enNames:'startDate',thNames:'วันที่เริ่ม'}];            
            var objC = new cObject;
            // Create Context Menu
            var menuC = new dhtmlXMenuObject("accordObjCopy","dhx_blue");
            menuC.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
            menuC.attachEvent("onClick", onSelectMenu);
            menuC.renderAsContextMenu();
            menuC.loadXML("xml/structureCopy.xml");
            
            treeGridC = new dhtmlXGridObject('accordObjCopy');
            treeGridC.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
            objC.setBegin(treeGridC,dataC,sesLanguage);
            treeGridC.setColumnIds(objC.fields);
            //--- Menu Context
            treeGridC.enableContextMenu(menuC);
            treeGridC.attachEvent("onBeforeContextMenu", onShowMenuCopy);
            //--- END Menu Context
            treeGridC.setNumberFormat("0,000.00",obj.cost,".",",");              //number format
            treeGridC.attachEvent("onEditCell",doOnEdit);
            //            for(var u=0;u<unitJson.length;u++){
            //                treeGridC.getCombo(objC.unitCost).put(unitJson[u],unitJson[u]);
            //            }
            treeGridC.init();
            treeGridC.enableHeaderMenu();                    //add file 'dhtmlxgrid_hmenu.js'
            //            treeGridC.loadSizeFromCookie();                  //add file 'ext/dhtmlxgrid_ssc.js'
            //            treeGridC.enableAutoSaving();
            //            treeGridC.enableAutoSizeSaving();
            
            
            //####################################################################################
            //--------------- PRICE
            //####################################################################################
            //var stat=(sesStatus == "new")?"ed":"ro";
            treeGridP = new dhtmlXGridObject('price');
            var dataP =[{fields:'priceStrId',aligns:'left',widths:'100',types:'ro',hides:true,enNames:'PriceId',thNames:'รหัสราคา'},
                {fields:'productStrId',aligns:'left',widths:'200',types:'ro',hides:true,enNames:'ProductId',thNames:'รหัสสินค้า'},
                {fields:'englishName',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'English Name',thNames:'ชื่ออังกฤษ'},
                {fields:'thaiName',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'Thai Name',thNames:'ชื่อไทย'},
                {fields:'cost',aligns:'center',widths:'90',types:'ro',hides:false,enNames:'Cost',thNames:'ต้นทุน'},
                {fields:'currency',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Currency',thNames:'หน่วย'},
                {fields:'vatCode',aligns:'left',widths:'70',types:'ro',hides:false,enNames:'vatCode',thNames:'รหัสภาษี'},
                {fields:'unitAmount',aligns:'left',widths:'60',types:'ro',hides:false,enNames:'Unit',thNames:'หน่วย'},
                {fields:'itemId',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'itemId',thNames:'รหัสไอเทม'},
                {fields:'description',aligns:'left',widths:'200',types:'ro',hides:false,enNames:'Description',thNames:'รายละเอียด'},
//                {fields:'prefix',aligns:'left',widths:'80',types:'ro',hides:true,enNames:'Prefix',thNames:'นำหน้ารหัส'},
                {fields:'code',aligns:'left',widths:'60',types:'ro',hides:false,enNames:'Code',thNames:'รหัส'},
                {fields:'style',aligns:'left',widths:'60',types:'ro',hides:false,enNames:'Style',thNames:'สไตล์'},
                {fields:'barCode',aligns:'center',widths:'70',types:'ro',hides:true,enNames:'Barcode',thNames:'บาร์โค๊ด'},
                {fields:'class',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Class',thNames:'คลาส'},
                {fields:'type',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Type',thNames:'ชนิด'},
                {fields:'gGroup',aligns:'center',widths:'70',types:'ro',hides:false,enNames:'Group',thNames:'กรุ๊ป'},
                {fields:'weight',aligns:'left',widths:'80',types:'ro',hides:true,enNames:'Weight',thNames:'น้ำหนัก'},
                {fields:'unitWeight',aligns:'left',widths:'80',types:'ro',hides:true,enNames:'Unit Weight',thNames:'หน่วยน้ำหนัก'},
                {fields:'volume',aligns:'left',widths:'80',types:'ro',hides:true,enNames:'Volume',thNames:'ปริมาตร'},
                {fields:'unitVolume',aligns:'left',widths:'80',types:'ro',hides:true,enNames:'Unit Volume',thNames:'หน่วยปริมาตร'},
                {fields:'loginUserId',aligns:'center',widths:'100',types:'ro',hides:true,enNames:'Login User',thNames:'ผู้ใช้'},
                {fields:'loginCompanyId',aligns:'center',widths:'100',types:'ro',hides:true,enNames:'Login Company',thNames:'บริษัท'},
                {fields:'editorId',aligns:'center',widths:'50',types:'ro',hides:false,enNames:'Editor',thNames:'ผู้แก้ไข'},
                {fields:'startDate',aligns:'center',widths:'80',types:'ro',hides:false,enNames:'startDate',thNames:'วันที่เริ่ม'},
                {fields:'editDate',aligns:'center',widths:'80',types:'ro',hides:false,enNames:'editDate',thNames:'วันที่แก้ไข'},
                {fields:'flag',aligns:'center',widths:'50',types:'ro',hides:false,enNames:'Flag',thNames:'Flag'}];
            var objP = new cObject;
            objP.setBegin(treeGridP,dataP,sesLanguage);
            treeGridP.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
            var fieldsP = objP.fields;
            treeGridP.setColumnIds(fieldsP);
            treeGridP.init();
            treeGridP.enableHeaderMenu();                    //add file 'dhtmlxgrid_hmenu.js'
            //            treeGridP.loadSizeFromCookie();                  //add file 'ext/dhtmlxgrid_ssc.js'
            //            treeGridP.enableAutoSaving();
            //            treeGridP.enableAutoSizeSaving();

            if(sesStatus == "new"){
                treeGrid.attachEvent("onOpenStart", function(id,state){
                    var gLevel = treeGrid.getLevel(id);
                    var engValue = treeGrid.cells(id,obj.englishName).getValue();
                    if(gLevel == "1"){
                        if(engValue == "Style"){
                            //                        alert("openState : "+treeGrid.getOpenState(id));
                            if(treeGrid.getOpenState(id) == false){
                                manageStyle(id,fields);
                            }
                        }
                        treeGrid.kidsXmlFile = "load/blankList/load_2_level.php?rwId="+id+"&fields="+fields+"&value="+engValue;
                    }else{
                        if(engValue == "Style"){
                            if(treeGrid.getOpenState(id) == false){
                                manageStyle(id,fields);
                            }
                            treeGrid.kidsXmlFile = "load/blankList/load_3_levelUp.php?rwId="+id+"&fields="+fields;
                        }else if(engValue == "Bom"){
                            treeGrid.kidsXmlFile = "load/blankList/load_2_level.php?rwId="+id+"&fields="+fields+"&value="+engValue;
                        }else{
                            treeGrid.kidsXmlFile = "load/blankList/load_3_levelUp.php?rwId="+id+"&fields="+fields;
                        }
                        
                    }
                
                    return true;
                });   
            }
            
            
            //################################################################################
            //                                                                              ##
            //                                                                              ##
            //                          CONNECT DATABASE                                    ##
            //                                                                              ##
            //                                                                              ##
            //################################################################################
            
            //---------- productStructure COPY
            var paraStructC = "dhxType=treeGrid&fields="+objC.fields;
            myDPCopy = new dataProcessor("update/structureDB.php?"+paraStructC);//lock feed url
            
            //---------- Price
            var paraPrice = "dhxType=grid&fields="+fieldsP;
            myDPrice = new dataProcessor("update/structureDB.php?"+paraPrice);//lock feed url
            
            //--------------- NEW
            //####################################################################################
            if(sesStatus == "new"){
                //---------- productStructure MAIN
                var paraStruct = "dhxType=treeGrid&fields="+obj.fields;
                myDP = new dataProcessor("update/structureDB.php?"+paraStruct);//lock feed url
                myDP.init(treeGrid);
                
                //---------- productStructure COPY
                myDPCopy.init(treeGridC); //link dataprocessor to the grid
                treeGrid.kidsXmlFile="1";
                treeGrid.loadXML("load/blankList/load_1_level.php?itemId="+itemId+"&fields="+fields,function(){
                    treeGrid.expandAll();
                });
                myDPCopy.setUpdateMode("off");
                
                //---------- Price
                myDPrice.init(treeGridP);
                myDPrice.setUpdateMode("off");
                
            }else if(sesStatus == "edit"){
                //--------------- EDIT
                //####################################################################################

                //---------- COPY
                myDPCopy.init(treeGridC); //link dataprocessor to the grid
                var para_edit = "dhxType=treeGrid&fields="+objC.fields+"&getId="+getId;
                treeGridC.loadXML("load/editList/loadEditDB.php?"+para_edit,function(){
                    treeGridC.expandAll();
                });
     
                //-------- Price
                myDPrice.init(treeGridP);
                var paraP_edit = "dhxType=grid&fields="+fieldsP+"&getId="+getId;
                treeGridP.loadXML("load/editList/loadEditDB.php?"+paraP_edit);
            }
            
            //--------------- ON LOAD
            //####################################################################################
            treeGrid.attachEvent("onXLE", function (){    //when Start load data!!
                //var countChild = treeGrid.hasChildren(treeGrid.getRowId(0));
                //                treeGrid.cells(selRowId,obj.typeP).setValue("stru");

                //cut zero(0) last of FLOAT
                var parentRId = treeGrid.getAllRowIds();
                var costParent = treeGrid.cells(parentRId,obj.cost).getValue();
                costParent = costParent.replace(/[0]+$/,"");
                costParent = costParent.replace(/\.+$/,"");
                treeGrid.cells(parentRId,obj.cost).setValue(costParent);
                
                var allChild = treeGrid.getAllSubItems(parentRId).split(",");
                for(var a=0;a<allChild.length;a++){                       
                    var costItem = treeGrid.cells(allChild[a],obj.cost).getValue();
                    //                        0(zero) at last string 1 character UP --> ""
                    costItem = costItem.replace(/[0]+$/,"");
                    //                        .(point) at last string --> ""
                    costItem = costItem.replace(/\.+$/,"");
                    treeGrid.cells(allChild[a],obj.cost).setValue(costItem);
                }
            });
            
            //--------------- AFTER UPDATE
            //####################################################################################
            myDPCopy.attachEvent("onAfterUpdate", function(sid, action, tid){
                alert0(action);
                if(action == "inserted"){
                    if(treeGridC.getLevel(sid) == "0"){
                        var urlPrice = "../price/PHP/beginPrice.php";
                        xhr.open('POST',urlPrice,true);
                        xhr.onload = function() {
                            alert0(this.responseText);
                        };

                        var formData = new FormData();
                        formData.append('strId',treeGridC.cells(sid,objC.id).getValue());
                        formData.append('vatCode',treeGridC.cells(sid,objC.vat).getValue());
                        formData.append('cost',treeGridC.cells(sid,objC.cost).getValue());
                        xhr.send(formData);
                    }
                }else if(action == "deleted"){
                
                }
            });
            
        </script>
    </body>
</html>
