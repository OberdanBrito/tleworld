<?php
//require("../../commons/PHP/session.php");
?>
<html>
    <head>

    </head>
    <!--    <body onunload="doOnUnload()">-->
    <body >
        <div id="myForm" style="height:auto;"></div>
        <script type="text/javascript">
            //            alert("state="+state+"&getCode="+getCode+"&getId="+getId+"&getName="+getName+"&rowId="+rowId);
            var lang = (sesLanguage=="English")?"englishName":"thaiName";
            
            //------------------------------------------ set DATA ------------------------------------------//
            var cssInsert = "<img src='../image/insert1.png' style='margin-top:0px;position:absolute;width:15px;height:15px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:13px;font-weight:bold;'>";
            var cssUpdate = "<img src='../image/upData.png' style='margin-top:0px;position:absolute;width:15px;height:15px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:13px;font-weight:bold;'>";
            var cssRev = "<img src='../image/rev2.gif' style='margin-top:0px;position:absolute;width:15px;height:15px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:13px;font-weight:bold;'>";
            var cssReset = "<img src='../image/undo.png' style='margin-top:-0.6px;position:absolute;width:16px;height:16px;left:15px;margin-left:7px;'> <span style='font-size:12px;margin-left:15px;font-weight:bold;'>";
            
            var selOpt = "select";
            var loadSelectOpt = "PHP/personFirm/selectOptions.php?";
            var sqlThN = loadSelectOpt+"field_cod=thaiName&type_cod=firm_title&state="+state+"&gId="+getId+"&fieldP=title_th";
            var sqlEnN = loadSelectOpt+"field_cod=englishName&type_cod=firm_title&state="+state+"&gId="+getId+"&fieldP=title";
            var sqlNation = loadSelectOpt+"field_cod="+lang+"&type_cod=nationality_firm&state="+state+"&gId="+getId+"&fieldP=nationality";
            //            var sqlGen = loadSelectOpt+"field="+lang+"&type=gender&state="+state+"&gId="+getId+"&fieldP=gender";
            
            var data =[
                //----------------------------------- Type -----------------------------------
                {types:"fieldset",fields:"",keys:"fType",enLabels:getName,thLabels:getName},
                {types:"input",fields:"personType",keys:"perType",enLabels:"",thLabels:""},
                
                //---------------------------------------- idCard ----------------------------------------
                {types:"fieldset",fields:"",keys:"fCard",enLabels:"number",thLabels:"ทะเบียน"},
                {types:"input",fields:"registerId",keys:"idNum",enLabels:"No.",thLabels:"เลขทะเบียน"},
                //---Calendar
                {types:"label",fields:"issueRe_show",keys:"dateIS",enLabels:"Register Date",thLabels:"วันจดทะเบียน"},
                {types:"hidden",fields:"issuedRe",keys:"dateI",enLabels:"",thLabels:""},
                //                {types:"label",fields:"expireRe_show",keys:"dateES",enLabels:"Date of Expiry",thLabels:"วันออกบัตร"},
                //                {types:"hidden",fields:"expireRe",keys:"dateE",enLabels:"",thLabels:""},
                {types:"label",fields:"birthDate_show",keys:"bdS",enLabels:"Open Date",thLabels:"วันเริ่มกิจการ"},
                {types:"hidden",fields:"birthDate",keys:"bd",enLabels:"",thLabels:""},
                
                //---------------------------------------- THAI ----------------------------------------
                {types:"fieldset",fields:"",keys:"fThai",enLabels:"Thai",thLabels:"ชื่อไทย"},
                {types:selOpt,fields:"title_th",keys:"pref_t",enLabels:"Preface",thLabels:"คำนำ"},
                {types:"input",fields:"thaiName",keys:"thaiN_t",enLabels:"Name",thLabels:"ชื่อบริษัท"},
                {types:"input",fields:"thaiLastName",keys:"thaiLN_t",enLabels:"Branch",thLabels:"ชื่อสาขา"},
                
                //---------------------------------------- ENG ----------------------------------------
                {types:"fieldset",fields:"",keys:"fEng",enLabels:"English",thLabels:"ชื่ออังกฤษ"},
                {types:selOpt,fields:"title",keys:"pref_e",enLabels:"Preface",thLabels:"คำนำ"},
                {types:"input",fields:"englishName",keys:"thaiN_e",enLabels:"Name",thLabels:"ชื่อบริษัท"},
                {types:"input",fields:"englishLastName",keys:"thaiLN_e",enLabels:"Branch",thLabels:"ชื่อสาขา"},
                
                //---------------------------------------- OTHER ----------------------------------------
                {types:"fieldset",fields:"",keys:"other",enLabels:"Other",thLabels:"อื่นๆ"},
                {types:"label",fields:"nationality_show",keys:"nationS",enLabels:"Nation",thLabels:"สัญชาติ"},
                {types:"hidden",fields:"nationality",keys:"nation",enLabels:"",thLabels:""},
                
                //                                {types:"label",fields:"birthDate_show",keys:"bdS",enLabels:"Birth Dath",thLabels:"วันเกิด"},
                //                                {types:"hidden",fields:"birthDate",keys:"bd",enLabels:"",thLabels:""},
                //                {types:"label",fields:"gender_show",keys:"genS",enLabels:"Gender",thLabels:"เพศ"},
                //                {types:"hidden",fields:"gender",keys:"gen",enLabels:"",thLabels:""},
                //------------------ Calendar
                {types:"label",fields:"startDate_show",keys:"startDS",enLabels:"Start Date",thLabels:"วันที่เริ่ม"},
                {types:"hidden",fields:"startDate",keys:"startD",enLabels:"",thLabels:""},
                {types:"label",fields:"validUntil_show",keys:"validUS",enLabels:"Valid Until",thLabels:"ถึง"},
                {types:"hidden",fields:"validUntil",keys:"validU",enLabels:"",thLabels:""},
                //------------------ CONTACT
                {types:"input",fields:"mobile",keys:"mob",enLabels:"Mobile",thLabels:"โทรศัทพ์"},
                {types:"input",fields:"fax",keys:"fx",enLabels:"Fax",thLabels:"แฟกซ์"},
                {types:"input",fields:"email",keys:"ema",enLabels:"Email",thLabels:"อีเมล"},
                
                
                //-------------------------------------- hidden ----------------------------------------
                {types:"hidden",fields:"id",keys:"id",enLabels:"",thLabels:""},
                {types:"hidden",fields:"loginCompanyId",keys:"log_comId",enLabels:"",thLabels:""},
                {types:"hidden",fields:"loginUserId",keys:"log_user",enLabels:"",thLabels:""},
                {types:"hidden",fields:"active",keys:"act",enLabels:"",thLabels:""},
                {types:"hidden",fields:"revision",keys:"rev",enLabels:"",thLabels:""},
                {types:"hidden",fields:"editor",keys:"edTor",enLabels:"",thLabels:""},
                {types:"hidden",fields:"editTime",keys:"edTime",enLabels:"",thLabels:""},
                {types:"hidden",fields:"relType",keys:"relTy",enLabels:"",thLabels:""},
                
                //-------------------------------------- button ----------------------------------------
                {types:"fieldset",fields:"",keys:"button",enLabels:"Button",thLabels:"ปุ่ม"},
                {types:"button",fields:"insert",keys:"addB",enLabels:cssInsert+"Insert</span>",thLabels:cssInsert+"บันทึก</span>"},
                {types:"button",fields:"update",keys:"updB",enLabels:cssUpdate+"Update</span>",thLabels:cssUpdate+"แก้ไข</span>"},
                {types:"button",fields:"revisionB",keys:"revB",enLabels:cssRev+"Revision</span>",thLabels:cssRev+"บันทึกข้อมูลใหม่</span>"},
                {types:"button",fields:"reset",keys:"resetB",enLabels:cssReset+"Reset</span>",thLabels:cssReset+"ตั้งค่าเริ่มต้น</span>"},
                
            ];
            
            //------------------------------------------ set FORM ------------------------------------------//
            var labelW = "80";
            var form = [
                //-------------------- Type --------------------
                {
                    type:"fieldset",
                    label:"fType",
                    inputWidth:850,
                    className: "fMain",
                    list:[
                        //                        {type:"input",name:"",label:"perTypeS",value:getName,inputWidth:80,readonly:true},
                        {type:"hidden",name:"",label:"perType",value:getCode,inputWidth:80},
                        {
                            type:"fieldset",
                            label:"fCard",
                            inputWidth:750,
                            list:[{
                                    type: "block", inputWidth: 900, 
                                    list:[
                                        {
                                            type:"settings",
                                            position:"label-left",
                                            labelAlign:"right",
                                            labelWidth:labelW,
                                            inputWidth:130
                                        },
                                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"idNum",value:""},
                                        //---Calendar
                                        {type:"newcolumn",offset:0},
                                        {type:"calendar",name:"",label:"dateIS",value:"",dateFormat:"%Y-%m-%d",serverDateFormat:"%Y-%m-%d",calendarPosition:"right",readonly:true,inputWidth:75},
                                        {type:"hidden",name:"",label:"dateI",value:""},
                        
                                        {type:"newcolumn",offset:0},
                                        {type:"calendar",name:"",label:"bdS",value:"",dateFormat:"%Y-%m-%d",serverDateFormat:"%Y-%m-%d",calendarPosition:"right",readonly:true,inputWidth:75},
                                        {type:"hidden",name:"",label:"bd",value:""}]
                                }
                            ]
                        },
                        //-------------------- THAI --------------------
                        {
                            type:"fieldset",
                            label:"fThai",
                            inputWidth:750,
                            list:[
                                {
                                    type: "block", inputWidth: 900, 
                                    list:[
                                        {
                                            type:"settings",
                                            position:"label-left",
                                            labelAlign:"right",
                                            labelWidth:labelW,
                                            inputWidth:130
                                        },
                                        {type:"newcolumn",offset:0},{type:selOpt,name:"",label:"pref_t",connector:sqlThN,inputWidth:"auto",offsetLeft:5},
                                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"thaiN_t",value:""},
                                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"thaiLN_t",value:""}]
                                }]
                        },
                        //-------------------- ENG --------------------
                        {
                            type:"fieldset",
                            label:"fEng",
                            inputWidth:750,
                            list:[{
                                    type: "block", inputWidth: 900, 
                                    list:[
                                        {
                                            type:"settings",
                                            position:"label-left",
                                            labelAlign:"right",
                                            labelWidth:labelW,
                                            inputWidth:130
                                        },
                                        {type:"newcolumn",offset:0},{type:selOpt,name:"",label:"pref_e",connector:sqlEnN,inputWidth:"auto",offsetLeft:5},
                                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"thaiN_e",value:""},
                                        {type:"newcolumn",offset:0},{type:"input",name:"",label:"thaiLN_e",value:""}]
                                }]
                        },
                        //-------------------- OTHER --------------------
                        {
                            type:"fieldset",
                            label:"other",
                            inputWidth:750,
                            offsetLeft:0,
                            list:[
                                {
                                    type: "block", inputWidth: 900, 
                                    list:[
                                        {
                                            type:"settings",
                                            position:"label-left",
                                            labelAlign:"right",
                                            labelWidth:labelW,
                                            inputWidth:130
                                        },
                                        {type:selOpt,name:"",label:"nationS",connector:sqlNation,inputWidth:"auto",offsetLeft:5},
                                        {type:"hidden",name:"",label:"nation",value:""}]
                                },
                                {
                                    type: "block", inputWidth: 900, 
                                    list:[
                                        {
                                            type:"settings",
                                            position:"label-left",
                                            labelAlign:"right",
                                            labelWidth:labelW,
                                            inputWidth:130
                                        },
                                        {type:"input",name:"",label:"mob",value:""},
                                        {type:"calendar",name:"",label:"startDS",value:"",dateFormat:"%Y-%m-%d",serverDateFormat:"%Y-%m-%d",calendarPosition:"right",readonly:true,inputWidth:75},
                                        {type:"hidden",name:"",label:"startD",value:""},

                                        {type:"newcolumn",offset:0},
                                        {type:"input",name:"",label:"fx",value:""},
                                        {type:"calendar",name:"",label:"validUS",value:"",dateFormat:"%Y-%m-%d",serverDateFormat:"%Y-%m-%d",calendarPosition:"right",readonly:true,inputWidth:75},
                                        {type:"hidden",name:"",label:"validU",value:""},
                            
                                        {type:"newcolumn",offset:0},
                                        {type:"hidden",name:"",label:"gen",value:""},
                                        {type:"input",name:"",label:"ema",value:""}]
                                }]
                        },
                        //------------------- Hidden
                        {type:"hidden",name:"",label:"id"},
                        {type:"hidden",name:"",label:"log_comId",value:sesCompanyId},
                        {type:"hidden",name:"",label:"log_user",value:sesUserId},
                        {type:"hidden",name:"",label:"act",value:""},
                        {type:"hidden",name:"",label:"rev",value:""},
                        {type:"hidden",name:"",label:"edTor",value:""},
                        {type:"hidden",name:"",label:"edTime",value:""},
                        {type:"hidden",name:"",label:"relTy",value:""},
                
                        //------------------- Button ---------------
                        {type:"fieldset",label:"button",inputWidth:"auto",
                            list: [
                                {type:"newcolumn"},{ type:"button",name:"",label:"addB", value:""},
                                {type:"newcolumn"},{ type:"button",name:"",label:"updB", value:""},
                                {type:"newcolumn"},{ type:"button",name:"",label:"revB", value:""},
                                {type:"newcolumn"},{ type:"button",name:"",label:"resetB", value:""}]
                        }
                        
                    ]
                }
            ];
            
            //------------------------------------------ SET Begin ------------------------------------------//
            var fO = new fObject;
            fO.setBeginForm(data,form,sesLanguage);
            var myForm = new dhtmlXForm("myForm", form);
            //----- Calendar setSensitiveRange
            calendarRange("startDate_show","validUntil_show");
            
            //------------------------- HIDE BUTTON -------------------------//
            if(state == "blank"){
                myForm.hideItem("update");
                myForm.hideItem("revisionB");
                myForm.hideItem("reset");
            }else if(state == "edit"){
                myForm.hideItem("insert");
            }
            
            //------------------------- CLICK BUTTON!! -------------------------//
            myForm.attachEvent("onButtonClick",function(id){
                if (id == "insert" || id == "update"){
                    //alert(myForm.getItemValue(id));
                    //------------------------- SET start,valid Before insert Database -------------------------
                    var getNation,getGender,comValue;
                    setValueDate("issueRe_show","issuedRe");
                    //        setValueDate("expireRe_show","expireRe");
                    setValueDate("birthDate_show","birthDate");
                    setValueDate("startDate_show","startDate");
                    setValueDate("validUntil_show","validUntil");
                    
                    var thMes = id=="insert"? "บันทึกใหม่":"แก้ไขข้อมูล";
                    var mes = sesLanguage=="English"? id+" ?":thMes+" ?";
                    if (confirm(mes)==true){
                        if(id == "insert"){
                            //--- INSERT
                            var newIdPer = "per-"+new Date().getTime()+"-"+sesUser;
                            myForm.setItemValue("id",newIdPer);
                            myForm.setItemValue("relType","Customer");
                            myForm.setItemValue("active","1");
                            myForm.setItemValue("revision","0");
                            //                            alert("nation : "+myForm.getItemValue("nationality"));
                            if(myForm.getItemValue("nationality") == null ){
                                getNation = myForm.getItemValue("nationality_show")+"|nationality_firm";
                                comValue = getNation;
                                dhtmlxAjax.get("PHP/ajax/getCode.php?lang="+lang+"&getValue="+comValue,function(loader){
                                    var val = loader.xmlDoc.responseText.split(",");
                                    var valNation = val[0];
                                    myForm.setItemValue("nationality",valNation);
                                    myForm.save();
                                });
                            }         
                        }else{
                            //--- UPDATE
                            myForm.setItemValue("editor",sesUser);
                            var cD = new cDateObject();         //Call Date object
                            var dateNow = cD.dn;
                            var dateTNow = dateNow+" "+cD.tn;
                            myForm.setItemValue("editTime",dateTNow);
                
                            getNation = myForm.getItemValue("nationality_show")+"|nationality_firm";
                            comValue = getNation;
                            dhtmlxAjax.get("PHP/ajax/getCode.php?lang="+lang+"&getValue="+comValue,function(loader){
                                var val = loader.xmlDoc.responseText.split(",");
                                var valNation = val[0];
                                myForm.setItemValue("nationality",valNation);
                                myForm.save();
                            });
                        }
                    }
                }else if(id == "revisionB"){
                    var mes = sesLanguage=="English"? id:"บันทึกข้อมูลใหม่";
                    if (confirm(mes+" ?")==true){

                    }
                }else if(id == "reset"){
                    var mes = sesLanguage=="English"? id+" ?":"ตั้งค่าเริ่มต้น ?";
                    if (confirm(mes)==true){
                        myForm.reset();
                    }
                }
            });
            
            //------------------------- connect DATABASE -------------------------//
            var dhxType = "form";
            var fields = fO.fields;
            var parameter = "dhxType="+dhxType+"&fields="+fields;
            if(state == "edit"){
                enableTab(getId);
                
                myForm.load("PHP/personFirm/personFirm.php?"+parameter+"&id="+rowId);
                myForm.attachEvent("onXLE", function (){    //when load data!!
                    getValueDate("issuedRe","issueRe_show");
                    //                    getValueDate("expireRe","expireRe_show");
                    getValueDate("birthDate","birthDate_show");
                    getValueDate("startDate","startDate_show");
                    getValueDate("validUntil","validUntil_show");
                });
            }
            
            myDP = new dataProcessor("PHP/personFirm/personFirm.php?"+parameter);//lock feed url
            myDP.enableDataNames(true); //will use names instead of indexes
            myDP.init(myForm); //link dataprocessor to the grid
            myDP.attachEvent("onAfterUpdate", function(sid, action, tid){
                //alert("sid : "+sid);
                alert0(action);
                if(action == "inserted"){
                    //                    myForm.setItemValue("parentMain",sid);
                    myForm.hideItem("insert");
                    myForm.showItem("update");
                    enableTab(myForm.getItemValue("id"));
                }
            });
        </script>
    </body>
</html>