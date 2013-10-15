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

$unit = array();
//$sql_unit = "SELECT name FROM unit WHERE class='cost'";
$sql_unit = "SELECT englishName FROM rates WHERE type='exchange'";
$q_unit = mysql_query($sql_unit);
$nr_unit = mysql_num_rows($q_unit);
if (checkStateSQL($nr_unit)) {
    while ($fa_unit = mysql_fetch_array($q_unit)) {
        array_push($unit, $fa_unit[0]);
    }
}

echo "<script type='text/javascript'>";
//-------- unit --------
echo "var unit = '" . json_encode($unit) . "';";

//-------- selProduct(blank) --------
echo "var selRowId = '" . $_GET["rId"] . "';";
echo "</script>";

?>
<html>
    <head>
        <title>Product Structure</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            .error {background-color: #ffd4db !important;color:maroon !important;}

            /* above Right*/
            /*.menu{z-index:100}*/
        </style>

        <script type="text/javascript" src="../commons/js/retrieveParameter.js"></script>
    </head>
    <body>
        <form>
            <!--<div id="menu" style="width: 1100px; height: 350px; position: absolute;background-color:#C0C0C0"></div>-->
            <!--<div id="accordObj" style="width: 1100px; height: 450px; position:absolute"></div>-->
            <div id="accordObj" style="width: 100%; height: 96%; "></div>

            <!--input type="button" id="New" value="New" onclick="onDigit('11-15');"-->
        </form>
        <script>            
            //where you need to parse out an object from JSON-string (like in an AJAX request), the safe way is to use JSON.parse(..) 
            var unitJson = JSON.parse(unit);
            //            alert(unit[0]);
            var oldCost,newCost;

            /////////////////////////////////---- onEdit ----/////////////////////////////////
            function doOnEdit(stage,rId,cInd,nValue,oValue){
                var selectId = treeGrid.getSelectedId();
                var engValue = treeGrid.cells(selectId,obj.englishName).getValue();

                var parentId = treeGrid.getParentId(selectId);
                var parent;
                ((parentId == "0")? "":parent = treeGrid.cells(parentId,0).getValue());
                var rowInd = treeGrid.getRowIndex(rId);             //get row
                if (stage == 0) {
                    //First Row
                    if(rowInd == 0){
                        if(cInd==obj.unit || cInd==obj.cost || cInd==obj.unitCost ){
                    
                        }else{
                            return false;
                        }
                    }else if(rowInd == "1"){
                        //Second Row (engValue = Bom,Build,Style)
                        return false;
                    }else{
                        //Other Row (parent = Bom,Build,Style)
                        if(cInd==obj.quantity || cInd==obj.unit){
                    
                        }else{
                            return false;
                        }
                    }
                } else if (stage == 1) {
                } else if(stage == 2){
                    if(rowInd == 0){
                        if(cInd == obj.cost){
                            oldCost=oValue;
                            newCost=nValue;
                            //                            alert("old cost : "+oValue+" , new cost : "+nValue);
                        }
                    }
                    return true;
                }// end stage 2
                return true;
            }
            
            //            var stat=(sesStatus == "new")?"ed":"ro";
            var data =[{fields:"englishName",aligns:'left',widths:'200',types:'tree',hides:false,enNames:'English Name',thNames:'ชื่ออังกฤษ'},
                {fields:'thaiName',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'Thai Name',thNames:'ชื่อไทย'},
                {fields:'id',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'Id',thNames:'รหัส'},
                {fields:'itemId',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'itemId',thNames:'รหัสไอเทม'},
                {fields:'prefix',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'Prefix',thNames:'คำนำหน้า'},
                {fields:'code',aligns:'center',widths:'100',types:'ro',hides:false,enNames:'Code',thNames:'รหัส'},
                {fields:'barcode',aligns:'center',widths:'100',types:'ro',hides:false,enNames:'Barcode',thNames:'บาร์โค้ด'},
                {fields:'description',aligns:'left',widths:'150',types:'ro',hides:false,enNames:'Description',thNames:'รายละเอียด'},
                {fields:'quantity',aligns:'right',widths:'60',types:'ed',hides:false,enNames:'Quantity',thNames:'จำนวน'},
                {fields:'unit',aligns:'left',widths:'60',types:'ed',hides:false,enNames:'Unit',thNames:'หน่วย'},
                {fields:'quantityIssue',aligns:'right',widths:'100',types:'ro',hides:false,enNames:'Quantity Issue',thNames:'จำนวนจ่าย'},
                {fields:'unitIssue',aligns:'left',widths:'100',types:'ed',hides:false,enNames:'Unit Issue',thNames:'หน่วยจ่าย'},
                {fields:'class',aligns:'center',widths:'70',types:'ro',hides:true,enNames:'Class',thNames:'คลาส'},
                {fields:'type',aligns:'center',widths:'70',types:'ro',hides:true,enNames:'Type',thNames:'ชนิด'},
                {fields:'gGroup',aligns:'center',widths:'70',types:'ro',hides:true,enNames:'Group',thNames:'กรุ๊ป'},
                {fields:'loginUserId',aligns:'left',widths:'50',types:'ro',hides:true,enNames:'loginUser',thNames:'ผู้ใช้ล็อกอิน'},
                {fields:'loginCompanyId',aligns:'left',widths:'50',types:'ro',hides:true,enNames:'loginCompany',thNames:'บริษัทล็อกอิน'},
                {fields:'loginLevel',aligns:'center',widths:'50',types:'ro',hides:true,enNames:'loginLev',thNames:'ระดับล๊อกอิน'},
                {fields:'startDate',aligns:'center',widths:'50',types:'ro',hides:true,enNames:'startDate',thNames:'วันที่เริ่ม'},
                {fields:'typeP',aligns:'center',widths:'50',types:'ro',hides:true,enNames:'typeP',thNames:'ชนิดข้อมูล'},
                {fields:'parentMain',aligns:'left',widths:'50',types:'ro',hides:true,enNames:'parentMain',thNames:'รหัสหลัก'},
                {fields:'cost',aligns:'right',widths:'70',types:'edn',hides:false,enNames:'Cost',thNames:'ราคา'},
                //                {fields:'unitCost',aligns:'left',widths:'80',types:'coro',hides:false,enNames:'Unit Cost',thNames:'หน่วย'},
                {fields:'unitCost',aligns:'left',widths:'80',types:'ro',hides:false,enNames:'Unit Cost',thNames:'หน่วย'},
                {fields:'checkBom',aligns:'right',widths:'70',types:'ro',hides:false,enNames:'Check Bom',thNames:'เช็ค Bom'}];
            var obj = new cObject;

            //--------------- Create Context Menu ---------------
            var menu = new dhtmlXMenuObject("accordObj","dhx_blue");
            menu.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
            menu.attachEvent("onClick", onSelectMenu);
            menu.renderAsContextMenu();
            menu.loadXML("xml/structure.xml");
            //            menu.addNewChild(menu.topId, 3, sesCompany, sesCompany, false); // adding a new child item
            //alert(selRowId);

            //--------------- TreeGrid ---------------
            treeGrid = new dhtmlXGridObject('accordObj');
            treeGrid.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
            obj.setBegin(treeGrid,data,sesLanguage);
            treeGrid.setColumnIds(obj.fields);
            treeGrid.enableContextMenu(menu);
            treeGrid.setNumberFormat("0,000.00",obj.cost,".",",");              //number format
            treeGrid.attachEvent("onBeforeContextMenu", onShowMenu);            //--- Menu Context
            treeGrid.attachEvent("onEditCell",doOnEdit);
            //            for(var u=0;u<unitJson.length;u++){
            //                treeGrid.getCombo(obj.unitCost).put(unitJson[u],unitJson[u]);
            //            }
            treeGrid.enableTooltips("false");
            treeGrid.init();
            treeGrid.enableHeaderMenu();                    //add file 'dhtmlxgrid_hmenu.js'
            treeGrid.loadSizeFromCookie();                  //add file 'ext/dhtmlxgrid_ssc.js'
            treeGrid.enableAutoSaving();
            treeGrid.enableAutoSizeSaving();
            //            alert(selRowId);
            
            

            //################################################################################
            //                                                                              ##
            //                                                                              ##
            //                          CONNECT DATABASE                                    ##
            //                                                                              ##
            //                                                                              ##
            //################################################################################
            var pr = "parent";
            var sql = "SELECT * FROM productstructure ORDER BY rowId ASC";
            var fieldsGrid = obj.fields;
            var para = "sql="+sql+"&fields="+fieldsGrid;
            //For inserted,updated
            myDP = new dataProcessor("update/structureItem/connectorDBStruct.php?"+para);//lock feed url
            myDP.init(treeGrid); //link dataprocessor to the grid
            myDP.setUpdateMode("off");
            
            var sql_edit = "SELECT * FROM productstructure WHERE parentMain='"+selRowId+"' ORDER BY englishName ASC";
            var para_edit = "sql="+sql_edit+"&fields="+fieldsGrid;
            treeGrid.loadXML("update/structureItem/connectorDBStruct.php?"+para_edit,function(){
                treeGrid.expandAll();
            });
            
            
            //###############################################################
            //  onXLE                     
            //###############################################################
            treeGrid.attachEvent("onXLE", function (){    //when Start load data!!
                //                var countChild = treeGrid.hasChildren(treeGrid.getRowId(0));
                //---getAllRowIds() check that display
                var parentRId = treeGrid.getAllRowIds();
                if(loginStatus == "blank"){
                    treeGrid.cells(parentRId,obj.unitCost).setValue("Baht");
                }
                var costParent = treeGrid.cells(parentRId,obj.cost).getValue();
                costParent = costParent.replace(/[0]+$/,"");
                costParent = costParent.replace(/\.+$/,"");
                treeGrid.cells(parentRId,obj.cost).setValue(costParent);
                
                if(treeGrid.getAllSubItems(parentRId) !== ""){
                    //alert("Have CHILD");
                    var allChild = treeGrid.getAllSubItems(parentRId).split(",");
                    for(var a=0;a<allChild.length;a++){
                        var costItem = treeGrid.cells(allChild[a],obj.cost).getValue();
                        //0(zero) at last string = 1 character UP --> ""
                        costItem = costItem.replace(/[0]+$/,"");
                        //.(point) at last string --> ""
                        costItem = costItem.replace(/\.+$/,"");
                        treeGrid.cells(allChild[a],obj.cost).setValue(costItem);
                    }
                    
                    //-------------- create BOM
                    var subItem = treeGrid.getSubItems(parentRId).split(",");
                    var haveBom = "";
                    //                    alert(subItem.length);
                    for(var i=0;i<subItem.length;i++){
                        //                        alert(subItem[i]+" : "+treeGrid.cells(subItem[i],obj.englishName).getValue());
                        if(treeGrid.cells(subItem[i],obj.englishName).getValue() == "Bom"){
                            haveBom+="1";
                        }else{
                            haveBom+="0";
                        }
                    }
                    if(haveBom.search(/1/) == "-1"){
                        //                        alert("Don't have child 'Bom'");
                        var cBom = treeGrid.cells(parentRId,obj.checkBom).getValue();
                        if(cBom === "1"){
                            //cBom=1 --> Create Bom
                            createChildLevel2(parentRId,"Bom");
                        }
                    }
                }else{
                    //alert("Don't have CHILD");
                    var cBom2 = treeGrid.cells(parentRId,obj.checkBom).getValue();
                    if(cBom2 === "1"){
                        //cBom=1 --> Create Bom
                        createChildLevel2(parentRId,"Bom");
                    }
                }
            });


            //###############################################################
            //  AFTER UPDATE                  
            //###############################################################
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid){
                alert0(action);
                //                alert("old cost : "+oldCost+" , new cost : "+newCost);
                if(treeGrid.getLevel(sid) == "0"){
                    if(oldCost != newCost){
                        var getItemId = treeGrid.cells(sid,obj.id).getValue();
                        var urlCostChange = "update/afterUpdate/costChange.php";
                        xhr.open('POST',urlCostChange,true);
                        xhr.onload = function() {
                            alert0(this.responseText);
                        };
                        var formData = new FormData();
                        formData.append('getItemId',getItemId);
                        formData.append('newCost',newCost);
                        xhr.send(formData);
                    }
                }
            });
        </script>
    </body>
</html>
