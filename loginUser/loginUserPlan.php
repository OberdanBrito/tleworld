<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
    <head>

        <title>Test2</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />


        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" href="../DHX/dhtmlxGrid/codebase/dhtmlxgrid.css" rel="stylesheet"/>
        <link type="text/css" href="../DHX/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css" rel="stylesheet"/>
        <link type="text/css" href="../DHX/dhtmlxMenu/codebase/skins/dhtmlxmenu_dhx_skyblue.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxLayout/codebase/dhtmlxlayout.css">
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css">
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.css">
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxLayout/codebase/skins/dhtmlxlayout_dhx_skyblue.css">
        <link type="text/css" href="../DHX/dhtmlxAccordion/codebase/skins/dhtmlxaccordion_dhx_skyblue.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../DHX/dhtmlxForm/codebase/skins/dhtmlxform_dhx_skyblue.css">

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

        <script src="../DHX/dhtmlxLayout/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxLayout/codebase/dhtmlxlayout.js"></script>
        <script src="../DHX/dhtmlxLayout/codebase/dhtmlxcontainer.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxcommon.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxwindows.js"></script>
        <script src="../DHX/dhtmlxWindows/codebase/dhtmlxcontainer.js"></script>
        <script src="../DHX/dhtmlxAccordion/codebase/dhtmlxaccordion.js"></script>
        <script src="../DHX/dhtmlxAccordion/codebase/dhtmlxcommon.js"></script>
        <script  src="../DHX/dhtmlxAccordion/codebase/dhtmlxmenu.js"></script>

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
        <script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>
        <script src="../DHX/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>
        <script src="../DHX/dhtmlxConnector/codebase/connector.js"></script>
        <script src="../DHX/dhtmlxTreeGrid/codebase/dhtmlxtreegrid.js"></script>
        <script src="../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_filter.js"></script>
        <script src="../DHX/dhtmlxTreeGrid/codebase/ext/dhtmlxtreegrid_lines.js"></script>
        <script src="../DHX/dhtmlxForm/codebase/dhtmlxform.js"></script>
        <script src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js" type="text/javascript"></script>
        <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_combo.js" type="text/javascript"></script>
        <script src="../DHX/dhtmlxGrid/codebase/excells/dhtmlxgrid_excell_grid.js"></script>
        <script src="../DHX/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>
        <script language="JavaScript" src="../DHX/dhtmlxMenu/codebase/dhtmlxmenu.js"></script>
        <script src="../DHX/dhtmlxMenu/codebase/ext/dhtmlxmenu_ext.js" type="text/javascript"></script>
        <script src="../commons/js/fnMainObj_DHX1.0.js" type="text/javascript"></script>

    </head>
    <body>

        <div id="testlogin" style="width:100%;height:100%"></div>
        <!--        <div style="height: 0px; position: relative;">
                    <div id="contextArea" style="position: absolute; left: 100px; top: 100px; width: 100px; height: 60px; border: #C1C1C1 1px solid; background-color: #E7F4FF;"></div>
                </div>-->

        <script>
            

            function onButtonClick(menuitemId, type) {
                rrId=type.split('_')[0];
                ccId=type.split('_')[1];
                if(menuitemId=="insert"){
                    //                    var date = new cDateObject();                   
                    //                    var dateTNow = date.dn+" "+date.tn;
                    tmpId = loginUgrid.uid();
                    loginUgrid.addRow(tmpId,"","");
                    
                   
                }else if(menuitemId=="delete"){
                    if(confirm("Delete module?")){
                        loginUgrid.deleteRow(rrId);
                    }else{
                        
                    }
                }if(menuitemId=="save"){
                    myDP.sendData();
                }
            }
            menu = new dhtmlXMenuObject();
            menu.setIconsPath("../DHX/dhtmlxMenu/samples/common/imgD/");
            menu.renderAsContextMenu();
            menu.attachEvent("onClick", onButtonClick);
            menu.loadXML("XML/loginUserMenu.xml");

       
            loginUgrid = new dhtmlXGridObject("testlogin");
            var data = [{fields:'rowId',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'rowId',thNames:'rowId'},
                {fields:'sortOrder',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'sortOrder',thNames:'sortOrder'},
                {fields:'id',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'id',thNames:'id'},
                {fields:'companyId',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'companyId',thNames:'companyId'},
                {fields:'name',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'name',thNames:'name'},
                {fields:'password',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'password',thNames:'password'},
                {fields:'language',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'language',thNames:'language'},
                {fields:'currency',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'currency',thNames:'currency'},
                {fields:'thaiName',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'thaiName',thNames:'thaiName'},
                {fields:'englishName',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'englishName',thNames:'englishName'},
                {fields:'description',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'description',thNames:'description'},
                {fields:'company',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'company',thNames:'company'},
                {fields:'user_code',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'user_code',thNames:'user_code'},
                {fields:'user_group',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'user_group',thNames:'user_group'},
                {fields:'email',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'email',thNames:'email'},
                {fields:'pop3Password',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'pop3Password',thNames:'pop3Password'},
                {fields:'pop3',aligns:'left',widths:'50',types:'ed',hides:false,enNames:'pop3',thNames:'pop3'},
                {fields:'smtp',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'smtp',thNames:'smtp'},
                {fields:'www',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'www',thNames:'www'},
                {fields:'active',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'active',thNames:'active'},
                {fields:'startDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'startDate',thNames:'startDate'},
                {fields:'validUntil',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'validUntil',thNames:'validUntil'},
                {fields:'owner',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'owner',thNames:'owner'},
                {fields:'createDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'createDate',thNames:'createDate'},
                {fields:'editor',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'editor',thNames:'editor'},
                {fields:'editDate',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'editDate',thNames:'editDate'},
                {fields:'revision',aligns:'left',widths:'50',types:'ro',hides:false,enNames:'revision',thNames:'revision'}];
        
       
      
            obj = new cObject();
            obj.setBegin(loginUgrid,data,0);
            
            loginUgrid.setSkin("dhx_skyblue");
            loginUgrid.setImagePath("../common/imgs/");
            loginUgrid.imgURL = "../DHX/dhtmlxGrid/codebase/imgs/icons_greenfolders/";
            loginUgrid.enableContextMenu(menu);
            loginUgrid.init();
            loginUgrid.loadXML("connectDB/loadLoginUserPlan.php?fields="+obj.fields);
            
            myDP = new dataProcessor("connectDB/loadLoginUserPlan.php?fields="+obj.fields);//lock feed url
            myDP.init(loginUgrid); //link dataprocessor to the grid
            
            myDP.setUpdateMode("off","");
            
          
        
        </script>
    </body>
</html>
