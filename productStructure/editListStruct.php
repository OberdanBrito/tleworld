<?php
require_once("../commons/PHP/connectDB.php");
require("../commons/PHP/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Item Master</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <style>
            .error {background-color: #ffd4db !important;color:maroon !important;}

            /* above Right*/
            .quoDet fieldset{height:200px; width:530px}
            #loaderImage{
                position: absolute;
                top: 50%;
                left: 50%;
                margin-top:20px;
                margin-left:-100px;
                /*z-index:100;*/
                background-color: red;
                width:100px;
                height: 100px;
                display: none;
                background:url(../commons/image/ajax-loader.gif) no-repeat;
            }
        </style>
        <!-- dhtmlxForm -->
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm3.6/codebase/skins/dhtmlxform_dhx_skyblue.css"/>
        <script src="../DHX/dhtmlxForm3.6/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxForm3.6/codebase/dhtmlxform.js"></script>
        <script src="../DHX/dhtmlxForm3.6/codebase/ext/dhtmlxform_item_combo.js"></script>

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

        <script type="text/javascript" src="../commons/js/fnMainObj_DHX1.0.js"></script>
        <script type="text/javascript" src="../commons/js/retrieveParameter.js"></script>
    </head>
    <body>
        <div id="searchForm" style="width:1005px; height:auto;"></div>
        <div id="itemGrid" style="width:1000px; height:420px; "></div>
        <div id="loaderImage"></div>
        <script type="text/javascript">
            var searchForm,searchFormData,searchFormSet,searchFormObj;
            var itemGrid,itemGridData,itemGridObj;
            
            //################################################################################
            //                                                                              ##
            //                          FUNCTION HANDLING                                   ##
            //                                                                              ##
            //################################################################################
            function clickSearch(id){
                if(id == "searchCode"){
                    var gCode = searchForm.getItemValue("code");
                    document.getElementById('loaderImage').style.display = "block"; //display image gif
                    itemGrid.clearAndLoad("load/editList/editListLoad_Search.php?gCode="+gCode+"&fields="+itemGridObj.fields, function(){
                        document.getElementById('loaderImage').style.display = "none"; //display image gif
                    });
                }
            }
            
            //###############################################################
            // OPEN --> PLAN VIEW
            //###############################################################
            function doOnListSelected(id){
                var splitId = id.split('|');
                var rowId = splitId[0],itemId = splitId[1];
                //((lang == "English")? getName= dhxGridList.cells(id,0).getValue() : getName= dhxGridList.cells(id,1).getValue());
                //alert(getName);
                parent.dhxAccordR.cells("plan").attachURL('../productStructure/structure.php?rId='+rowId+'&getId='+itemId+'&loginStatus=edit');
                parent.dhxAccordR.openItem("plan");
            }

            //################################################################################
            //                                                                              ##
            //                          OBJECT HANDLING                                     ##
            //                                                                              ##
            //################################################################################
            
            //###############################################################
            //  SET DATA & FORM (searchForm)                        
            //###############################################################
            var selOption = "select";
            searchFormData = [
                {types:"fieldset",fields:"",keys:"search",enLabels:"Search",thLabels:"ค้นหา"},

                //---CLASS , TYPE , GROUP
                {types:selOption,fields:"class",keys:"cl",enLabels:"Class",thLabels:"คลาส"},
                {types:selOption,fields:"type",keys:"ty",enLabels:"Type",thLabels:"ไทป์"},
                {types:selOption,fields:"gGroup",keys:"gr",enLabels:"Group",thLabels:"กรุ๊ป"},
                {types:"input",fields:"code",keys:"autoCode",enLabels:"Input Code : ",thLabels:"ใส่รหัส"},
                
                //---BUTTON
                {types:"button",fields:"searchCTG",keys:"searchCTG",enLabels:"Search",thLabels:"ค้นหา"},
                {types:"button",fields:"searchCode",keys:"searchCode",enLabels:"Search Code",thLabels:"ค้นหารหัส"},
            ];
            searchFormSet = [
                {   type:"fieldset",
                    label:"search", 
                    inputWidth: 1000,
                    list:[
                        //                        {type:"block",
                        //                            list:[
                        //                                {type:selOption, name:"",label:"cl",value:"",inputWidth:150},
                        //                                {type:"newcolumn"},{type:selOption, name:"",label:"ty",value:"",inputWidth:150,offsetLeft :20},
                        //                                {type:"newcolumn"},{type:selOption, name:"",label:"gr",value:"",inputWidth:150,offsetLeft :20},
                        //                                {type:"newcolumn"},{type:"button", name:"",label:"searchCTG",offsetLeft :30},
                        //                            ]
                        //                        },
                        {type:"block",
                            list:[
                                {type:"input",name:"",label:"autoCode",value:"", inputWidth: 200},
                                {type:"newcolumn"},{type:"button", name:"",label:"searchCode",offsetLeft :30},
                            ]
                        }
                    ]
                }
            ];
            searchFormObj = new fObject;
            searchFormObj.setBeginForm(searchFormData,searchFormSet,sesLanguage);
            searchForm = new dhtmlXForm("searchForm", searchFormSet);
            searchForm.attachEvent("onButtonClick", clickSearch);
            searchForm.attachEvent("onKeyUp", function(inp, ev, id, value) {
                //search By enter key
                if(ev.keyCode == "13"){
                    clickSearch("searchCode");
                }
            });
            
            //###############################################################
            //  SET GRID (itemGrid)                        
            //###############################################################
            itemGrid = new dhtmlXGridObject("itemGrid");
            itemGridData = [
                {fields:"englishName",aligns:'left',widths:'280',types:'ro',hides:false,enNames:'English Name',thNames:'ชื่ออังกฤษ'},
                {fields:'thaiName',aligns:'left',widths:'280',types:'ro',hides:false,enNames:'Thai Name',thNames:'ชื่อไทย'},
                {fields:'code',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'Code',thNames:'รหัส',filter:"#text_filter"},
                {fields:'class',aligns:'left',widths:'100',types:'ro',hides:false,enNames:'Class',thNames:'คลาส',filter:"#select_filter"},
                {fields:'type',aligns:'left',widths:'110',types:'ro',hides:false,enNames:'Type',thNames:'ชนิด',filter:"#select_filter"},
                {fields:'gGroup',aligns:'left',widths:'110',types:'ro',hides:false,enNames:'Group',thNames:'กรุ๊ป',filter:"#select_filter"}];
            itemGridObj = new cObject;
            itemGridObj.setBegin(itemGrid,itemGridData,sesLanguage);
            itemGrid.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
            itemGrid.setColSorting("str,str");
            itemGrid.attachEvent("onRowSelect",doOnListSelected);
            itemGrid.init();
            itemGrid.enableSmartRendering(true,100);
            itemGrid.enableHeaderMenu();                    //add file 'dhtmlxgrid_hmenu.js'
            itemGrid.loadSizeFromCookie();                  //add file 'ext/dhtmlxgrid_ssc.js'
            itemGrid.enableAutoSaving();
            itemGrid.enableAutoSizeSaving();
            
            //################################################################################
            //                                                                              ##
            //                          CONNECT DATABASE                                    ##
            //                                                                              ##
            //################################################################################
            //// -- if digit=0 -> no sent class,type,group
            //// -- if digit=1 -> sent class,type,group
            if(digit == "1"){
                document.getElementById('searchForm').style.display = "none"; //display image gif
                //                var searchList = ["class","type","gGroup","code","searchCTG","searchCode"];
                //                for(var s=0;s<searchList.length;s++){
                //                    searchForm.disableItem(searchList[s]);
                //                }
                itemGrid.loadXML("load/editList/s_edit_ListLoad.php?class="+gClass+"&type="+gType+"&group="+gGroup);
            }
        </script>
    </body>
</html>

