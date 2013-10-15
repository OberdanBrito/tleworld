<?php
//require("../../commons/PHP/session.php");
require_once("../../commons/PHP/connectDB.php");

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

$category = array();
$sql_category = "SELECT englishName FROM codedefinitions WHERE type='" . $_GET["codeDef"] . "'";
$q_category = mysql_query($sql_category) or die("Error Query [" . $sql_category . "]");
$nr_category = mysql_num_rows($q_category);
if (checkStateSQL($nr_category)) {
    while ($fa_category = mysql_fetch_array($q_category)) {
        array_push($category, $fa_category[0]);
    }
}

echo "<script type='text/javascript'>";
//-------- Type CodeDef --------
echo "var categoryName = '" . json_encode($category) . "';";
echo "var codef_type = '" . $_GET["codeDef"] . "';";
echo "var getId = '" . $_GET["getId"] . "';";
echo "var getState = '" . $_GET["gState"] . "';";
echo "</script>";
?>
<html >
    <head>   
        <style>
            .even{
                background-color:#F0F8FF;
            }
            .uneven{
                background-color:#E6E6FA;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <!--<td style="position:relative;"><div id="termGrid" style="width:700px;height:450px;float:left; padding-right: 10px;"></div>  </td>-->
                <td style="position:relative;"><div id="detGrid" style="width:700px;height:450px;"></div>  </td>
                <td style="position:absolute;"><table>
                        <tr><td ><input type="button" onClick="addTo();" value="&lt; Add Row" /></td></tr>
                        <!--<tr><td ><input type="button" onClick="delTo()" value="&lt; Delete" /></td></tr>-->
                        <tr><td ><input type="button" onClick="saveTo()" value="&lt; Save" /></td></tr>
                    </table>
                </td>
            </tr>
        </table>

        <script>
            var lang = (sesLanguage=="English")?"englishName":"thaiName";
            //where you need to parse out an object from JSON-string (like in an AJAX request), the safe way is to use JSON.parse(..) 
            var categName = JSON.parse(categoryName);
            
            //--------------------- function ----------------------------
            function addTo(){
                detGrid.addRow(detGrid.uid(),'',detGrid.getRowsNum());
            }
            
            function saveTo(){
                myDP.sendData();
            }
    
            function cellEdit(stage,rId,cInd,nValue,oValue){
                if (stage == 0) {
                } else if (stage == 1) {
                } else if(stage == 2){
                    if(cInd == obj.categoryEnglish){
                        if(nValue != null){
                            dhtmlxAjax.get("PHP/ajax/ajaxDetails.php?value="+nValue+"&codef_type="+codef_type,function(loader){
                                var arAjax = loader.xmlDoc.responseText.split(",");
                                detGrid.cells(rId,obj.categoryThai).setValue(arAjax[0]);
                                detGrid.cells(rId,obj.categoryCode).setValue(arAjax[1]);
                            
                            });
                        }
                    }
                    
                    var newIdPsd = "psd-"+new Date().getTime()+"-"+sesUser;
                    detGrid.cells(rId,obj.id).setValue(newIdPsd);
                    detGrid.cells(rId,obj.loginCompanyId).setValue(sesCompanyId);
                    detGrid.cells(rId,obj.loginUserId).setValue(sesUserId);
                    detGrid.cells(rId,obj.partnerId).setValue(getId);
                    detGrid.cells(rId,obj.type).setValue("details");
                    if(getState == "edit"){
                        detGrid.cells(rId,obj.editor).setValue(sesUserId);
                        var cD2 = new cDateObject();         //Call Date object
                        var dateNow2 = cD2.dn;
                        var dateTNow2 = dateNow2+" "+cD2.tn;
                        detGrid.cells(rId,obj.editTime).setValue(dateTNow2);
                    }
                    return true;
                }//end satge2
            }
    
            //--------------------- SET Term ----------------------------
            var detGrid = new dhtmlXGridObject('detGrid'); 
            var data =[
                {fields:'categoryEnglish',aligns:'center',widths:'100',types:'coro',hides:false,enNames:'English',thNames:'อังกฤษ'},
                {fields:'categoryThai',aligns:'center',widths:'100',types:'ro',hides:false,enNames:'Thai',thNames:'ไทย'},
                {fields:'categoryCode',aligns:'center',widths:'100',types:'ro',hides:false,enNames:'Code',thNames:'รหัส'},
                {fields:'value',aligns:'center',widths:'100',types:'ed',hides:false,enNames:'Value',thNames:'ข้อมูล'},
                {fields:'location',aligns:'center',widths:'100',types:'ed',hides:false,enNames:'Location',thNames:'สถานที่'},
                {fields:'effectiveDate',aligns:'center',widths:'100',types:'dhxCalendar',hides:false,enNames:'Effective Date',thNames:'เริ่ม'},
                {fields:'endDate',aligns:'center',widths:'100',types:'dhxCalendar',hides:false,enNames:'End Date',thNames:'สุดท้าย'},
                {fields:'type',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'Type',thNames:'ประเภท'},
                {fields:'loginCompanyId',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'Company Id',thNames:'ไอดีบริษัท'},
                {fields:'loginUserId',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'User Id',thNames:'ไอดีบุคคล'},
                {fields:'editor',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'Editor',thNames:'บุคคลแก้ไข'},
                {fields:'editTime',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'Edit Time',thNames:'เวลาแก้ไข'},
                {fields:'id',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'Id',thNames:'ไอดี'},
                {fields:'partnerId',aligns:'center',widths:'200',types:'ro',hides:true,enNames:'Partner Id',thNames:'ไอดีอ้างอิง'}];
            var obj = new cObject;  
            obj.setBegin(detGrid,data,sesLanguage);
            detGrid.setImagePath("../../DHX/dhtmlxGrid/codebase/imgs/");
            detGrid.setSkin("dhx_skyblue");
            
            //----------- categoryEnglish -----------
            for(var u=0; u<categName.length; u++){
                detGrid.getCombo(obj.categoryEnglish).put(categName[u],categName[u]);
            }
            detGrid.setDateFormat("%Y-%m-%d");
            //SET color styles for even/uneven rows grid
            detGrid.enableAlterCss("even", "uneven");
            detGrid.attachEvent("onEditCell",cellEdit);
            detGrid.init();
            
            //------------------------- connect DATABASE -------------------------//
            var para = "fields="+obj.fields;
            myDP = new dataProcessor("PHP/details/detailsUp.php?"+para);//lock feed url
            myDP.setUpdateMode("off");
            myDP.init(detGrid); //link dataprocessor to the grid
            
            if(getState == "edit"){
                detGrid.loadXML("PHP/details/detailsLoad.php?"+para+"&getId="+getId);
            }
        </script>
    </body>
</html>
