<?
ob_start(); // clear buffer
session_start();
header("Cache-Control: no-cache, must-revalidate");
require("../commons/PHP/connectDB.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>== Person==</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

            <!-- dhtmlxDataProcessor -->
            <script type="text/javascript" src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>

            <!-- dhtmlxForm -->
            <script  src="../DHX/dhtmlxForm/codebase/dhtmlxcommon.js"></script>
            <script  src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
            <script src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_combo.js"></script>
            <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css"/>
            <!-- dhtmlxCombo -->
            <script src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>
            <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.css"/>

            <!-- dhtmlxCalendar -->
            <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxCalendar/codebase/skins/dhtmlxcalendar_dhx_skyblue.css"/>
            <script src="../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.js"></script>
            <script src="../DHX/dhtmlxForm/codebase/ext/dhtmlxform_item_calendar.js"></script>
            <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxCalendar/codebase/dhtmlxcalendar.css"/>

            <!-- external -->
            <script src="js/retrieveParameter.js" type="text/javascript"></script>

            <!-- Manage JS -->
            <script src="js/functionDHX.js"></script>
            <script src="../commons/js/fnMainObj_DHX1.0.js"></script>
            <script type="text/javascript" src="js/fnDateObj.js"></script>






    </head>
    <body onload="doOnLoad()">
        <div id="form_container" width="100%" style="height:100%;"></div>
        <iframe id="iframe_target" name="iframe_target" src="" style="width:100%;height:500px;border:0px solid #fff;margin-top:50px;"></iframe>

        <script>
            var myForm,formData;
            function doOnLoad() {
                
                var codeDef = "in_option=priceStr";
                var formDataNew = [
                    {type: "fieldset",label: "<h2>PriceStructure</h2>",
                        list: [
                            { type:"select",name:"pStrType",labelLeft:"50",inputWidth: 120,label: "Type",connector: "PHP/codeDefLoad.php?"+codeDef},
                            {type: "button", value: "Proceed", name:"proceed"} 
                        ]}
                ];
                myForm = new dhtmlXForm("form_container",formDataNew);
                myForm.attachEvent("onButtonClick", function(id){
                    if(id=="proceed"){
//                        if(myForm.getItemValue("pStrType")=="STD"){
//                            document.getElementById('iframe_target').src = './pStrSTD.php';
                        if(myForm.getItemValue("pStrType")=="SPP"){
                            document.getElementById('iframe_target').src = './pStrSTD.php';
                        }else if(myForm.getItemValue("pStrType")=="CTP"){
                            document.getElementById('iframe_target').src = './pStrCTP.php';
                        }
                    }
                    
                });
            }
            
        </script>

    </body>
</html>