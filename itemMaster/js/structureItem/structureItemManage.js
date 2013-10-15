function createChildLevel2(parentRowId,typeP){
    var dataStr2=new Array();
    var cD = new cDateObject();         //Call Date object
    var dateNow = cD.dn;
    var newIdStr = "stru-"+new Date().getTime()+"-"+sesUser;
    var sibRow2 = treeGrid.getRowIndex(parentRowId)+1;
    var splitFields = obj.fields.split(",");
    //            alert(splitFields.length);
    for(var b=0 ; b<splitFields.length ; b++){
        if(b==obj.englishName){
            dataStr2[b]= typeP;
        }
        else if(b==obj.id){
            dataStr2[b]= newIdStr;
        }
        else if(b==obj.quantity){
            dataStr2[b]= "1";
        }
        else if(b==obj.loginUserId){
            dataStr2[b]= sesUserId;
        }
        else if(b==obj.loginCompanyId){
            dataStr2[b]= sesCompanyId;
        }
        else if(b==obj.startDate){
            dataStr2[b]= dateNow;
        }
        else if(b==obj.typeP){
            dataStr2[b]= typeP;
        }
        else if(b==obj.parentMain){
            dataStr2[b]= treeGrid.cells(parentRowId,obj.id).getValue();
        }
        else if(b==obj.unitCost){
            dataStr2[b]= "Baht";
        }
    }
    //var dataStr2 = dataStr.replace(/,$/g, "");
    //    alert(dataStr2);
    //dtStructure = menu+",,"+newIdStr+",,,,1,,,,,"+sesUserId+","+sesCompanyId+",,"+dateNow+","+menu+","+valueParMain+",,baht";
    treeGrid.addRow(treeGrid.uid(),dataStr2,sibRow2,parentRowId);
    //    treeGrid.addRow(treeGrid.uid(),dataStr2,"0",parentRowId);
    treeGrid.openItem(parentRowId);
}

/////////////////////////////////---- Select Context Menu ----/////////////////////////////////
function onSelectMenu(menu,ind,object){
    //    alert(menu);
    var cD = new cDateObject();         //Call Date object
    var dateNow = cD.dn;
    var dateTNow = dateNow+" "+cD.tn;
    var newIdStr = "stru-"+new Date().getTime()+"-"+sesUser;
    
    var rInd = ind.split("_")[0];
    var cInd = ind.split("_")[1];
    var sibRow = treeGrid.getRowIndex(rInd)+1;
    var valType = treeGrid.cells(rInd,cInd).getValue();//value of row&column that select
    
    var valueParMain = treeGrid.cells(rInd,obj.parentMain).getValue();
    if(menu=="Id"){
        //###############################################################
        // CHECK ID
        //###############################################################
        alert("rowId="+rInd+", pId="+treeGrid.getParentId(rInd));
        
    }else if(menu == "Bom" || menu == "Build" || menu == "Style" || menu == "Buy"){
        //###############################################################
        // Add --> BOM,BUILD,STYLE
        //###############################################################
        if(treeGrid.cells(rInd,obj.checkBom).getValue() == "0"){
            if(menu == "Style"){
                createChildLevel2(rInd,menu);
            }else{
                alert("Can't insert child...!!! ( Check Bom = 0 )");
            }
        }else{
            //Check duplicate
            if(treeGrid.findCell(menu, obj.englishName, true).length==0){
                createChildLevel2(rInd,menu);
            }else{
                alert("Duplicated.");
            }   
        }
        
    }else if(menu == "costBom" || menu == "costBuild" || menu == "costBuy"){
        //###############################################################
        // CHOSE COST --> BOM,BUILD
        //###############################################################
        //for 'First Parent' only
        var menuChild;
        switch (menu)
        {
            case "costBom":
                menuChild="Bom";
                break;
            case "costBuild":
                menuChild="Build";
                break;
            case "costBuy":
                menuChild="Buy";
                break;
        }
        var countChild = treeGrid.hasChildren(rInd);
        for(var c=0;c<countChild;c++){
            //get rowId(database)
            var rowIdChild = treeGrid.getChildItemIdByIndex(rInd,c);
            //get englishName
            var nameChild = treeGrid.cells(rowIdChild,obj.englishName).getValue();
            //compare menu == value
            if(menuChild == nameChild){
                //###########
                //# SET Cost itemMain--> Bom,Build
                //###########
                var numChild = treeGrid.hasChildren(rowIdChild);
                var sumCost=0;
                for(var n=0;n<numChild;n++){
                    var idChild = treeGrid.getChildItemIdByIndex(rowIdChild,n);
                    var costChild = treeGrid.cells(idChild,obj.cost).getValue();
                    sumCost += parseFloat(costChild);
                }
                //                alert(sumCost.toFixed(4));
                treeGrid.cells(rInd,obj.cost).setValue(sumCost.toFixed(4));
                //                treeGrid.cells(rInd,obj.quantity).setValue("1");
                //                treeGrid.cells(rInd,obj.unit).setValue("piece");
                //                treeGrid.cells(rInd,obj.unitCost).setValue("Baht");
                myDP.setUpdated(rInd,true);                         // for change no edit
            }
        }
        
    }else if(menu=="Data"){
        //###############################################################
        // ADD PRODUCT...
        //###############################################################
        var rowIdFirstRow = treeGrid.getParentId(rInd);        //rowId 'FIRST ROW'
        var uReceipt = treeGrid.cells(rowIdFirstRow,obj.unit).getValue();
        var uIssue = treeGrid.cells(rowIdFirstRow,obj.unitIssue).getValue();
        var hasChild = treeGrid.hasChildren(rInd);
        if(uReceipt != uIssue){
            if(hasChild == "1"){
                alert("ONLY ONE CHILD...!!! ( unitReceipt != unitIssue )");
                return true;
            }
        }
        
        var parent= treeGrid.cells(rInd,obj.englishName).getValue();
        //        var objItem = new cObject;
        dhxWins = new dhtmlXWindows();
        //        dhxWins.enableAutoViewport(false);
        //        dhxWins.attachViewportTo("menu");
        dhxWins.setImagePath("../DHX/dhtmlxWindows/codebase/imgs/");
        w1 = dhxWins.createWindow("w1", 0, 0, 805, 450);
        w1.setText("ItemMaster");
        dhxWins.window("w1").denyPark();
        //        dhxWins.window("w1").denyResize();
        //        dhxWins.window("w1").denyMove();
        dhxWins.window("w1").center();
        dhxWins.window("w1").bringToTop();
        w1.button("park").hide();
        w1.button("minmax1").hide();
        var grid = w1.attachGrid();
        var gridSet =[{
            fields:"englishName",
            aligns:'left',
            widths:'200',
            types:'tree',
            hides:false,
            enNames:'English Name',
            thNames:'ชื่ออังกฤษ',
            filter:"#text_filter"
        },

        {
            fields:'thaiName',
            aligns:'left',
            widths:'100',
            types:'ro',
            hides:false,
            enNames:'Thai Name',
            thNames:'ชื่อไทย',
            filter:"#text_filter"
        },

        {
            fields:'id',
            aligns:'center',
            widths:'200',
            types:'ro',
            hides:true,
            enNames:'Id',
            thNames:'รหัส'
        },

        {
            fields:'itemId',
            aligns:'center',
            widths:'200',
            types:'ro',
            hides:true,
            enNames:'itemId',
            thNames:'รหัสไอเทม'
        },

        {
            fields:'prefix',
            aligns:'center',
            widths:'200',
            types:'ro',
            hides:true,
            enNames:'Prefix',
            thNames:'คำนำหน้า'
        },

        {
            fields:'code',
            aligns:'center',
            widths:'100',
            types:'ro',
            hides:false,
            enNames:'Code',
            thNames:'รหัส',
            filter:"#text_filter"
        },

        {
            fields:'barcode',
            aligns:'center',
            widths:'100',
            types:'ro',
            hides:true,
            enNames:'Barcode',
            thNames:'บาร์โค้ด'
        },

        {
            fields:'description',
            aligns:'left',
            widths:'150',
            types:'ro',
            hides:true,
            enNames:'Description',
            thNames:'รายละเอียด'
        },

        {
            fields:'quantity',
            aligns:'right',
            widths:'60',
            types:'ed',
            hides:true,
            enNames:'Quantity',
            thNames:'จำนวน'
        },

        {
            fields:'unit',
            aligns:'left',
            widths:'60',
            types:'ed',
            hides:true,
            enNames:'Unit',
            thNames:'หน่วย'
        },

        {
            fields:'quantityIssue',
            aligns:'right',
            widths:'60',
            types:'ro',
            hides:true,
            enNames:'Quantity Issue',
            thNames:'จำนวนจ่าย'
        },

        {
            fields:'unitIssue',
            aligns:'left',
            widths:'100',
            types:'ed',
            hides:true,
            enNames:'Unit Issue',
            thNames:'หน่วยจ่าย'
        },

        {
            fields:'class',
            aligns:'center',
            widths:'70',
            types:'ro',
            hides:false,
            enNames:'Class',
            thNames:'คลาส',
            filter:"#select_filter"
        },

        {
            fields:'type',
            aligns:'center',
            widths:'70',
            types:'ro',
            hides:false,
            enNames:'Type',
            thNames:'ชนิด',
            filter:"#select_filter"
        },

        {
            fields:'gGroup',
            aligns:'center',
            widths:'70',
            types:'ro',
            hides:false,
            enNames:'Group',
            thNames:'กรุ๊ป',
            filter:"#select_filter"
        },

        {
            fields:'loginUserId',
            aligns:'left',
            widths:'50',
            types:'ro',
            hides:true,
            enNames:'loginUser',
            thNames:'ผู้ใช้ล็อกอิน'
        },

        {
            fields:'loginCompanyId',
            aligns:'left',
            widths:'50',
            types:'ro',
            hides:true,
            enNames:'loginCompany',
            thNames:'บริษัทล็อกอิน'
        },

        {
            fields:'loginLevel',
            aligns:'center',
            widths:'50',
            types:'ro',
            hides:true,
            enNames:'loginLev',
            thNames:'ระดับล๊อกอิน'
        },

        {
            fields:'startDate',
            aligns:'center',
            widths:'50',
            types:'ro',
            hides:true,
            enNames:'startDate',
            thNames:'วันที่เริ่ม'
        },

        {
            fields:'typeP',
            aligns:'center',
            widths:'50',
            types:'ro',
            hides:true,
            enNames:'typeP',
            thNames:'ชนิดข้อมูล'
        },

        {
            fields:'parentMain',
            aligns:'left',
            widths:'50',
            types:'ro',
            hides:true,
            enNames:'parentMain',
            thNames:'รหัสหลัก'
        },

        {
            fields:'cost',
            aligns:'right',
            widths:'90',
            types:'edn',
            hides:false,
            enNames:'Cost',
            thNames:'ราคา'
        },

        {
            fields:'unitCost',
            aligns:'left',
            widths:'65',
            types:'coro',
            hides:false,
            enNames:'Unit Cost',
            thNames:'หน่วย'
        }];
        var gridObj = new cObject;
        //#### data (of structureItem)
        gridObj.setBegin(grid,gridSet,sesLanguage);
        grid.setImagePath("../DHX/dhtmlxGrid/codebase/imgs/");
        grid.attachEvent("onRowSelect",function(id){
            var findDup = treeGrid.findCell(grid.cells(id,gridObj.code).getValue(),obj.code,true);
            if(findDup.length==0&&treeGrid.getLevel(findDup[0])!=0){
                var addData = new Array();
                grid.forEachCell(id,function(cellObj,ind){
                    addData[ind] = cellObj.getValue();
                });
                addData[gridObj.typeP] = parent;
                addData[gridObj.itemId] = addData[gridObj.id];
                addData[gridObj.id] = newIdStr;
                addData[gridObj.loginUserId] = sesUserId;
                addData[gridObj.loginCompanyId] = sesCompanyId;
                addData[gridObj.unitCost] = "Baht";
                addData[gridObj.parentMain] = valueParMain;
                if(uReceipt != uIssue){
                    if(parent == "Bom" || parent == "Build"){
                        addData[gridObj.quantity] = parseInt(treeGrid.cells(rowIdFirstRow,obj.quantityIssue).getValue());
                        addData[gridObj.unit] = treeGrid.cells(rowIdFirstRow,obj.unitIssue).getValue();
                    }else{
                        addData[gridObj.quantity] = 1;
                    }
                }else{
                    addData[gridObj.quantity] = 1;
                }
                treeGrid.addRow(treeGrid.uid(),addData,sibRow,rInd);
                dhxWins.window("w1").close();
                treeGrid.expandAll();
                
                //#### SET Cost itemMain--> Bom,Build
                var numChild = treeGrid.hasChildren(rInd);
                var sumCost=0;
                for(var n=0;n<numChild;n++){
                    var idChild = treeGrid.getChildItemIdByIndex(rInd,n);
                    var costChild = treeGrid.cells(idChild,obj.cost).getValue();
                    sumCost += parseFloat(costChild);
                }
                //                alert(sumCost.toFixed(4));
                treeGrid.cells(rInd,obj.cost).setValue(sumCost.toFixed(4));
                myDP.setUpdated(rInd,true);                         // for change no edit
            }else{
                alert("Duplicated Data");
            }
        });
        grid.init();
        grid.enableSmartRendering(true,100);
        grid.enableHeaderMenu();
        //        var where = "AS f WHERE rowId = (SELECT max(rowId) FROM productstructure WHERE id = f.id )";
        var dhxType = "grid";
        var sql = "";
        if(parent == "Bom"){
            sql = "SELECT * FROM productstructure WHERE typeP='item' AND class!='RawMat' AND class !='Style' ORDER BY rowId ASC";
                
        }else if(parent == "Build"){
            //            sql = "SELECT * FROM productstructure "+where+" AND typeP='item' AND class ='RawMat' ORDER BY rowId ASC";
            sql = "SELECT * FROM productstructure WHERE typeP='item' AND class ='RawMat' ORDER BY rowId ASC";
                
        }else if(parent == "Style"){
            //            sql = "SELECT * FROM productstructure "+where+" AND typeP='item' AND class ='Style' ORDER BY rowId ASC";
            sql = "SELECT * FROM productstructure WHERE typeP='item' AND class ='Style' ORDER BY rowId ASC";
        }
        var fields = gridObj.fields;
        var para = "dhxType="+dhxType+"&sql="+sql+"&rowId=rowId&fields="+fields+"&parent=parent";
        grid.loadXML("update/connectorDHX.php?"+para);
        
    }else if(menu == "save"){
        //###############################################################
        // SAVE
        //###############################################################
        var checkDigit="";
        if(treeGrid.hasChildren(rInd) != "0"){
            //            alert("has child");
            var getSubRid = treeGrid.getSubItems(rInd).split(",");
            for(var r=0;r<getSubRid.length;r++){
                //                                alert("rowId : "+getSubRid[r]+" & has child : "+treeGrid.hasChildren(getSubRid[r]));
                checkDigit += treeGrid.hasChildren(getSubRid[r]);
                if(treeGrid.hasChildren(getSubRid[r]) == "0"){
                    treeGrid.selectRow(treeGrid.getRowIndex(getSubRid[r]));
                    alert("Add Child... '"+treeGrid.cells(getSubRid[r],obj.englishName).getValue()+"' ...PLEASE!!!");
                    return true;
                }
            }
        }
        if(checkDigit.search(/0/) == "-1"){
            if (confirm("Save ?")==true){
                alert0("OK...!!!");
                myDP.sendData();
            }
        //        }else{
        //            alert("Add Child...PLEASE!!!");
        }
        
    }else if(menu == "del"){
        //###############################################################
        // DELETE
        //###############################################################
        treeGrid.deleteRow(rInd);
    }
//    return true;
}
    
function popupCenter(url,name,windowWidth,windowHeight){
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;
    properties = "width="+windowWidth+",height="+windowHeight;
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;
    window.open(url,name,properties);
}

/////////////////////////////////---- Show Context Menu ----/////////////////////////////////
function onShowMenu(rowId, celInd, grid) {
    var selectId = treeGrid.getSelectedId();    //get rowId Database
    //    alert(treeGrid.getRowIndex(rowId));
    var getParRId = treeGrid.getParentId(selectId);   //get rowId of PARENT
    var getParVal;
    if(getParRId != "0"){
        getParVal = treeGrid.cells(getParRId,obj.englishName).getValue();    //get englishName of parent
    }
    
    var val = treeGrid.cells(rowId,obj.englishName).getValue();
    var arr = ["Bom","Build","Id","Data","costBom","costBuild","costBuy","Style","del","save"];
    for (var i = 0; i < arr.length; i++) {
        menu.hideItem(arr[i]);
    }
    //if(celInd == 0){
    //--------- parent ---------
    if(treeGrid.getRowIndex(rowId) == "0"){
        //            var valParent = treeGrid.cells(rowId,celInd).getValue();
        if(val.search(/\S/i) !== -1){
            //Found -->englishName no empty
                                        
            //            var countChild = treeGrid.hasChildren(treeGrid.getRowId(0));
            //                        for(var c=0;c<countChild;c++){
            //                                        var idChild = treeGrid.getChildItemIdByIndex(treeGrid.getRowId(0),c);
            //                                        var valueChild = treeGrid.cells(idChild,0).getValue();
            //                            if(valueChild == "Cost"){
            //                                //                    alert(valueChild+" baht");
            //                                for(var a=0;a<arr.length;a++){
            //                                    if(arr[a] == valueChild){
            //                                        arr.splice(a,1);
            //                                    }
            //                                }
            //                            }
            //                        }
            if(celInd == obj.cost){
                var countChild = treeGrid.hasChildren(treeGrid.getRowId(0));
                if(countChild > 0){
                    for(var c=0;c<countChild;c++){
                        var idChild = treeGrid.getChildItemIdByIndex(treeGrid.getRowId(0),c);
                        var valueChild = treeGrid.cells(idChild,obj.englishName).getValue();
                        var menuChild;
                        switch (valueChild)
                        {
                            case "Bom":
                                menuChild="costBom";
                                break;
                            case "Build":
                                menuChild="costBuild";
                                break;
                            case "Buy":
                                menuChild="costBuy";
                                break;
                        }
                        menu.showItem(menuChild);
                    }
                }
            }else{             
                //                for(var ar=0;ar<arr.length;ar++){
                //                    menu.showItem(arr[ar]);
                //                }   
                menu.showItem("Id");
                menu.showItem("Bom");
                menu.showItem("Build");
                menu.showItem("Style");
                menu.showItem("save");
            }
            menu.hideItem("Data");            
        }else{
            //Not Found
            alert0("Input Data");
            return false;
        }
       
    //            for(var ar=0;ar<arr.length;ar++){
    //                if(arr[ar] == "Bom" || arr[ar] == "Buy" || arr[ar] == "Build"){
    //                    menu.hideItem(arr[ar]);
    //                }else{
    //                    menu.showItem(arr[ar]);
    //                }
    //            }
    }else if(val == "Bom" || val == "Build" || val == "Style"){
        menu.showItem("Id");
        menu.showItem("Data");
        menu.showItem("del");
    //        menu.showItem("save");
    //                for(var ar=0;ar<arr.length;ar++){
    //                    if(arr[ar] == "Bom" || arr[ar] == "Buy" || arr[ar] == "Build"){
    //                        menu.showItem(arr[ar]);
    //                    }else{
    //                        menu.hideItem(arr[ar]);
    //                    }
    //                }
    }else if(getParVal == "Bom"|| getParVal == "Build" || getParVal == "Style"){
        menu.showItem("Id");
        menu.showItem("del");
    //        menu.showItem("save");
    }
    //}
    return true;
}