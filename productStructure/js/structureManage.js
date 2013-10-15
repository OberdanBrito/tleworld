//################################################################################
//                                                                              ##
//                                                                              ##
//                          Set PARENT CODE                                     ##
//                                                                              ##
//                                                                              ##
//################################################################################
function parentCode(gRowId){
    //    alert("sub 1 level : "+treeGrid.getSubItems(gRowId));
    var allCode1="";
    var mixSubCode = "";
    var gPrefix = treeGrid.cells(gRowId,obj.prefix).getValue();
    //        alert(treeGrid.getSubItems(gRowId));
    if(treeGrid.getSubItems(gRowId) != ""){
        //Have child (BOM || STYLE);
        var sub = treeGrid.getSubItems(gRowId).split(",");
        for(s1=0 ; s1<sub.length ; s1++){
            var type = treeGrid.cells(sub[s1],obj.englishName).getValue();           //------ get 'type' =bom,style
            if(type == "Bom"){
                //                alert("have child(bom) : "+treeGrid.hasChildren(sub[s1]));
                if(treeGrid.hasChildren(sub[s1]) != "-1"){                           //have child(bom) ?
                    var sub2 = treeGrid.getSubItems(sub[s1]).split(",");             //get all child's Bom
                    for(s2=0 ; s2<sub2.length ; s2++){
                        var preCode = treeGrid.cells(sub2[s2],obj.prefix).getValue();   //------ bom/item
                        if(treeGrid.hasChildren(sub2[s2]) != "-1"){                  //have child(item) ?
                            var sub3 = treeGrid.getSubItems(sub2[s2]).split(",");
                            for(s3=0 ; s3<sub3.length ; s3++){
                                var type2 = treeGrid.cells(sub3[s3],obj.englishName).getValue();           //------ bom/item/style
                                if(type2 == "Style"){
                                    if(treeGrid.hasChildren(sub3[s3]) != "-1"){      //have child(Style) ?
                                        //                                    var codeStyle2 = treeGrid.cells(treeGrid.getSubItems(sub3[s3]),obj.code).getValue();
                                        var codeStyle2 = treeGrid.cells(sub2[s2],obj.style).getValue();
                                        //                                    alert("have child STYLE : "+preCode+"-"+codeStyle2);
                                        mixSubCode += "/"+preCode+"-"+codeStyle2;
                                    }
                                }
                            }
                        }else{
                            mixSubCode += "/"+preCode;
                        //                            alert("all code : "+mixSubCode);
                        }
                    }
                }
                allCode1 = gPrefix+mixSubCode;
            }else if(type == "Style"){
                //                            alert("sub : "+treeGrid.getSubItems(sub[s1])+" , has child : "+treeGrid.hasChildren(sub[s1]));
                var parStyle = (treeGrid.hasChildren(sub[s1]) != "-1")?"-"+treeGrid.cells(gRowId,obj.style).getValue():"";
                //                            alert("style : "+parStyle);
                allCode1 = gPrefix+parStyle+mixSubCode;
            //                        alert("don't have child : "+allCode1);
            //                treeGrid.cells(gRowId,obj.code).setValue(allCode1);         //set code PARENT
            }
        }
    }else{
        //no have child (Bom || Style)
        allCode1 = gPrefix;
    }
    return allCode1;
}

//################################################################################
//                                                                              ##
//                                                                              ##
//                          Set PARENT STYLE                                    ##
//                                                                              ##
//                                                                              ##
//################################################################################
function parentStyle(gRowId){
    //    alert(treeGrid.getSubItems(gRowId));
    var getStyle="";
    if(treeGrid.getSubItems(gRowId) != ""){
        var sub = treeGrid.getSubItems(gRowId).split(",");
        for(s1=0 ; s1<sub.length ; s1++){
            var type = treeGrid.cells(sub[s1],obj.englishName).getValue();           //------ get 'type' =bom,style
            if(type == "Style"){
                getStyle = (treeGrid.hasChildren(sub[s1]) != "-1")?"-"+treeGrid.cells(gRowId,obj.style).getValue():"";  
            }
        }
    }
    return getStyle;
}


//################################################################################
//                                                                              ##
//                                                                              ##
//                          Select Context Menu                                 ##
//                                                                              ##
//                                                                              ##
//################################################################################
function onSelectMenu(menu,ind,object){
    //    alert("menu : "+menu);
    var cD = new cDateObject();         //Call Date object
    var dateNow = cD.dn;
    var newIdStr = "stru-"+new Date().getTime()+"-"+sesUser;

    var id=treeGrid.uid();
    var data=treeGrid.contextID.split("_"); //rowInd_colInd
    var rInd = data[0];//number of rowInd   == treeGrid.getSelectedId();
    var cInd = data[1];//number of columnInd
    var sibRow = treeGrid.getRowIndex(rInd)+1;
    var parentId = treeGrid.getParentId(rInd);
    var valType = treeGrid.cells(rInd,cInd).getValue();//value of row&column that select
    //    var valueParMain = treeGrid.cells(rInd,"16").getValue();
    //    



    //--------------------------------------------- Menu ---------------------------------------------//
    //###############################################################
    //  ID                     
    //###############################################################
    if(menu == "Id"){
        //        alert("rInd : "+rInd);
        //        var setCode = parentCode(rInd);
        //        treeGrid.cells(rInd,obj.code).setValue(setCode);
        alert("ID : "+rInd+" , parentID : "+parentId+" , parentID : "+treeGrid.getOpenState(rInd));
    //        alert("list all child : "+treeGrid.getAllSubItems(rInd));       //get list all child row
    //        alert("count child : "+treeGrid.hasChildren(rInd));            //child 1 level (no all level) return count
    //            alert(treeGridP.getAllRowIds());
    
    //###############################################################
    //  Delete                     
    //###############################################################
    }else if(menu == "del"){
        if(treeGridC.getAllRowIds() != ""){
            //have structure COPY!!
            if (confirm("Delete ?")==true){
                //--------------- set used Structure
                var usedMain = parseInt(treeGrid.cells(rInd,obj.used).getValue())-1;
                treeGrid.cells(rInd,obj.used).setValue(usedMain);
                myDP.setUpdated(rInd,true);
                
                //-------------------------- DELETE structure COPY--------------------------
                var gFirstRow = treeGridC.getAllRowIds().split(",");
                for(i=0 ; i<gFirstRow.length ; i++){
                    treeGridC.deleteRow(gFirstRow[i]);
                }
                myDPCopy.sendData();
                //-------------------------- DELETE Price --------------------------
                treeGridP.deleteRow(treeGridP.getAllRowIds());
                myDPrice.sendData();
            }
        }
        
    //###############################################################
    //  Save                     
    //###############################################################
    }else if(menu == "save"){
        if(sesStatus == "new"){
            //            alert(treeGrid.getOpenState(rInd));
            //--------------- Check Child
            //####################################################################################
            var checkDigit="";
            
            if(treeGrid.getOpenState(rInd) == false){
            //                alert(1);
            }else{
                //                alert(treeGrid.hasChildren(rInd));
                if(treeGrid.hasChildren(rInd) != "0"){
                    //                    alert("has child : "+treeGrid.getSubItems(rInd));
                    var getSubRid = treeGrid.getSubItems(rInd).split(",");
                    for(var r=0;r<getSubRid.length;r++){
                        //                    alert("rowId : "+getSubRid[r]+" & has child : "+treeGrid.hasChildren(getSubRid[r]));
                        checkDigit += treeGrid.hasChildren(getSubRid[r]);
                        //-1 , 0 = don't have child
                        //since 1 up = have child
                        if(treeGrid.hasChildren(getSubRid[r]) == "-1"){
                            treeGrid.selectRow(treeGrid.getRowIndex(getSubRid[r]));
                            alert("Expand Child... '"+treeGrid.cells(getSubRid[r],obj.englishName).getValue()+"' ...PLEASE!!!");
                            return true;
                        }
                    }
                }
            }
            
            
            //--------------- SAVE
            //####################################################################################
            if(checkDigit.search(/-1/) == "-1"){
                alert0("Save...?");
                
                var allRowId,allRowIdC,colNum,gItemId,gItemIdCo,gCodePCo,text;
            
                //--------------- set PARENT 'code'
                var setCode = parentCode(rInd);
                //                alert(setCode);
                //                treeGrid.cells(rInd,obj.code).setValue(setCode);
                //                var gCodeP = treeGrid.cells(rInd,obj.code).getValue();
            
                //--------------- set unitCost
                if(treeGrid.cells(rInd,obj.unitCost).getValue() == ""){
                    treeGrid.cells(rInd,obj.unitCost).setValue("Baht");
                }
            
                var gItemIdP = treeGrid.cells(rInd,obj.itemId).getValue();
                dhtmlxAjax.get("load/ajax/checkCode.php?code="+setCode+"&itemId="+encodeURI(gItemIdP)+"&companyId="+sesCompanyId,function(loader){
                    text = loader.xmlDoc.responseText;
                    if(text == "NoData"){
                        if (confirm(menu+" ?")==true){
                            //--------------------------------------------- Don't have data
                            allRowId = treeGrid.getAllRowIds().split(",");
                            for(a=0 ; a<allRowId.length ; a++){
                            
                                var fMain = obj.fields.split(",");
                                var newIdStr2 = "stru-"+new Date().getTime()+"-"+sesUser;
                                if(treeGrid.getRowIndex(allRowId[a]) == "0"){
                                    var parentMainC = newIdStr2;
                                }
                                var cD2 = new cDateObject();         //Call Date object
                                var dateNow2 = cD2.dn;
                                
                                //--------------- SET STRUCTURE COPY
                                //####################################################################################
//                                var addCopy = "";
                                var addCopy = [];
                                var fCopy = objC.fields.split(",");
                                for(var c in fCopy){
                                    var nameFieldC = fCopy[c];
                                    var indexMainC = fMain.indexOf(nameFieldC);
                                    if(indexMainC != "-1"){
                                        //---- Find Columns
                                        if(nameFieldC == "id"){
                                            addCopy.push(newIdStr2);
//                                            addCopy += newIdStr2+",";
                                        }else if(nameFieldC == "code"){
                                            if(treeGrid.getRowIndex(allRowId[a]) == "0"){
                                                addCopy.push(setCode);
//                                                addCopy += setCode+",";
                                            }else{
                                                addCopy.push(treeGrid.cells(allRowId[a],indexMainC).getValue());
//                                                addCopy += treeGrid.cells(allRowId[a],indexMainC).getValue()+",";
                                            }
                                        }else if(nameFieldC == "typeP"){
                                            if(treeGrid.getRowIndex(allRowId[a]) == "0"){
                                                addCopy.push("stru");
//                                                addCopy += "stru,";
                                            }else{
                                                addCopy.push(treeGrid.cells(allRowId[a],indexMainC).getValue());
//                                                addCopy += treeGrid.cells(allRowId[a],indexMainC).getValue()+",";
                                            }
                                        }else if(nameFieldC == "parentMain"){
                                            addCopy.push(parentMainC);
//                                            addCopy += parentMainC+",";
                                        }else if(nameFieldC == "startDate"){
                                            addCopy.push(dateNow2);
//                                            addCopy += dateNow2+",";
                                        }else if(nameFieldC == "loginUserId"){
                                            addCopy.push(sesUserId);
//                                            addCopy += sesUserId+",";
                                        }else if(nameFieldC == "loginCompanyId"){
                                            addCopy.push(sesCompanyId);
//                                            addCopy += sesCompanyId+",";
                                        }else{
                                            addCopy.push(treeGrid.cells(allRowId[a],indexMainC).getValue());
//                                            addCopy += treeGrid.cells(allRowId[a],indexMainC).getValue()+",";
                                        }
                                    }else{
                                        //---- Not Find Columns
                                        addCopy.push("");
//                                        addCopy += ",";
                                    }
                                }
//                                var addCopy2 =  addCopy.replace(/,$/, "");
                                treeGridC.addRow(allRowId[a],addCopy,null,treeGrid.getParentId(allRowId[a]));


                                //--------------- SET PRICE
                                //####################################################################################
                                if(treeGrid.getParentId(allRowId[a]) == "0"){
                                    //---------- setName (structure copy)
                                    var parStyle = parentStyle(rInd);
                                    var getEnName = treeGrid.cells(rInd,obj.englishName).getValue()+parStyle;
                                    var getThName = treeGrid.cells(rInd,obj.thaiName).getValue()+parStyle;
                                    //                            alert(getEnName +" : "+getThName);
                                    treeGridC.cells(allRowId[a],objC.englishName).setValue(getEnName);            //set NEW englishName+style
                                    treeGridC.cells(allRowId[a],objC.thaiName).setValue(getThName);            //set NEW thaiName+style
                                                        
                                    //---------- set price
                                    var addPrice = [];
                                    //                                var fMain = obj.fields.split(",");
                                    var fPrice = objP.fields.split(",");
                                    for(var p in fPrice){
                                        //                                alert("field price : "+fPrice[p]);
                                        var nameField = fPrice[p];
                                        var indexMain = fMain.indexOf(nameField);
                                        if(indexMain != "-1"){
                                            //---- Find Columns
                                            if(nameField == "englishName"){
                                                addPrice.push(getEnName);
                                            }else if(nameField == "thaiName"){
                                                addPrice.push(getThName);
                                            }else if(nameField == "code"){
                                                addPrice.push(setCode);
                                            }else if(nameField == "startDate"){
                                                addPrice.push(dateNow2);
                                            }else if(nameField == "loginUserId"){
                                                addPrice.push(sesUserId);
                                            }else if(nameField == "loginCompanyId"){
                                                addPrice.push(sesCompanyId);
                                            }else{
                                                addPrice.push(treeGrid.cells(allRowId[a],indexMain).getValue());
                                            }
                                        }else{
                                            //---- Not Find Columns
                                            if(nameField == "priceStrId"){
                                                addPrice.push("pst-0001-system");
                                            }else if(nameField == "productStrId"){
                                                addPrice.push(treeGridC.cells(allRowId[a],obj.id).getValue());
                                            }else if(nameField == "vatCode"){
                                                addPrice.push(treeGrid.cells(allRowId[a],obj.vat).getValue());
                                            }else if(nameField == "currency"){
                                                addPrice.push(treeGrid.cells(allRowId[a],obj.unitCost).getValue());
                                            }else if(nameField == "unitAmount"){
                                                addPrice.push(treeGrid.cells(allRowId[a],obj.unit).getValue());
                                            }else{
                                                addPrice.push("");
                                            }
                                        }
                                    }
                                    treeGridP.addRow(treeGridP.uid(),addPrice);
                                }
                            //----------------------------- END SET PRICE -----------------------------
                            }

                            //--------------- SET new rowId
                            //####################################################################################
                            treeGridC.expandAll();
                            treeGridC.forEachRow(function(rId_1){
                                treeGridC.setRowId(treeGridC.getRowIndex(rId_1),treeGrid.uid());
                            
                            });

                            //--------------- SAVE
                            //####################################################################################
                            //--------------- set used
                            var usedMain = parseInt(treeGrid.cells(rInd,obj.used).getValue())+1;
                            treeGrid.cells(rInd,obj.used).setValue(usedMain);
                            treeGrid.cells(rInd,obj.style).setValue("");
                            myDP.setUpdated(rInd,true);
                            myDPCopy.sendData();
                            myDPrice.sendData();
                        
                            //                        myDPCopy.setUpdated(treeGridC.getRowId(0),true);
                            //                        myDPrice.setUpdated(treeGridP.getRowId(0),true);
                            alert0("Success");
                        }
                    }else{
                        alert0(text);
                    }
                });
            }
        }else if(sesStatus == "edit"){
            
            if (confirm(menu+" ?")==true){
                var cD2 = new cDateObject();         //Call Date object
                var dateNowE = cD2.dn;
                treeGridP.cells(treeGridP.getAllRowIds(),objP.editorId).setValue(sesUserId);
                treeGridP.cells(treeGridP.getAllRowIds(),objP.editDate).setValue(dateNowE);
                
                var row_edit = treeGrid.getAllRowIds().split(",");
                for(a=0 ; a<row_edit.length ; a++){
                    if(treeGrid.getParentId(row_edit[a]) == "0"){
                    
                        var fMain = obj.fields.split(",");
                        var fPrice_e = objP.fields.split(",");
                        for(var p in fPrice_e){
                            var nameField = fPrice_e[p];
                            var indexMain = fMain.indexOf(nameField);
                            var gValue;
                            //                        alert(indexMain);
                            if(indexMain != "-1"){
                                //                                    alert(nameField);
                                gValue = treeGrid.cells(row_edit[a],indexMain).getValue();
                                treeGridP.cells(treeGridP.getAllRowIds(),p).setValue(gValue);
                            }else{
                                //---- Not Find
                                if(nameField == "vatCode"){
                                    gValue = treeGrid.cells(row_edit[a],obj.vat).getValue();
                                    treeGridP.cells(treeGridP.getAllRowIds(),p).setValue(gValue);
                                }else if(nameField == "currency"){
                                    gValue = treeGrid.cells(row_edit[a],obj.unitCost).getValue();
                                    treeGridP.cells(treeGridP.getAllRowIds(),p).setValue(gValue);
                                }
                            }
                        }
                    }
                }
                myDPCopy.sendData();
                myDPrice.setUpdated(treeGridP.getAllRowIds(),true);
            //                myDPrice.sendData();
            }
        } 
        
    //###############################################################
    //  Detail                     
    //###############################################################
    }else if(menu == "Detail"){
        var nameHead = "Detail ItemMaster";
        popupCenter("../itemMaster/itemMaster.php?rId="+rInd+"&loginStatus=edit",nameHead,'1055','515');
        
    //###############################################################
    //  Cost                     
    //###############################################################
    }else if(menu == "costBom" || menu == "costBuild" || menu == "costBuy"){
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
            var rowIdChild = treeGrid.getChildItemIdByIndex(treeGrid.getRowId(0),c);
            //get englishName
            var valueChild = treeGrid.cells(rowIdChild,obj.englishName).getValue();
            //compare menu == value
            if(menuChild == valueChild){
                var costMenu = treeGrid.cells(rowIdChild,obj.cost).getValue();
                treeGrid.cells(rInd,obj.cost).setValue(costMenu);
                treeGrid.cells(rInd,obj.quantity).setValue("1");
                treeGrid.cells(rInd,obj.unitCost).setValue("baht");
                myDPCopy.setUpdated(rInd,true);
            }
        }
        
    //###############################################################
    //  SAVE STRUCTURE COPY                     
    //###############################################################
    }else if(menu == "saveCopy"){
        if (confirm("Save ?")==true){
            myDPCopy.sendData();
            myDPrice.sendData();
        }
    //        treeGrid.getRowIndex(rInd);
    //        alert(rInd);
    //        alert(treeGridP.getRowId(0));
    //        myDPCopy.setUpdated(treeGridC.getRowId(0),true);
    //        myDPrice.setUpdated(treeGridP.getRowId(0),true);
    }
    return true;
}

/////////////////////////////////---- Set Copy Structure [Num row Of 'MAIN' & 'Copy' ==] ----/////////////////////////////////
function setCopyStruct(gAllMain,gAllCopy,gMenu){
    //    alert("function : "+gAllMain.length);
    for(a=0; a<gAllMain.length; a++){
        var gItemId = treeGrid.cells(gAllMain[a],obj.itemId).getValue(); 
        var gItemIdCo = treeGridC.cells(gAllCopy[a],obj.itemId).getValue();
        //        alert(gItemId+" : "+gItemIdCo);
        if(gItemId == gItemIdCo){
            //--- itemId same
            var colNum=treeGrid.getColumnsNum();
            for(i=0;i<colNum;i++){
                if(i==obj.id || i==obj.loginUserId || i==obj.loginCompanyId || i==obj.startDate || i==obj.itemId || i==obj.parentMain){
                //                    alert(obj.parentMain);
                }else{
                    var getTG = treeGrid.cells(gAllMain[a],i).getValue();
                    treeGridC.cells(gAllCopy[a],i).setValue(getTG);
                }
            }
            myDPCopy.setUpdated(gAllCopy[a],true);
        }else{}//--- itemId not same[for change style]}
    }
    if (confirm(gMenu+" ?")==true){
        myDPCopy.sendData();
    }
}

//################################################################################
//                                                                              ##
//                                                                              ##
//                          Show Context Menu                                   ##
//                                                                              ##
//                                                                              ##
//################################################################################
function onShowMenu(rowId, celInd, grid) {
    var val = treeGrid.cells(rowId,0).getValue();
    var arr = ["Id","costBom","costBuild","costBuy","Detail","save","del"];
    for (var i = 0; i < arr.length; i++) {
        menu.hideItem(arr[i]);
    }
    
    //--------- parent ---------
    if(treeGrid.getRowIndex(rowId) == "0"){
        if(val.search(/\S/i) !== -1){
            //----- row=0 & Column='cost'
            if(celInd == obj.englishName || celInd == obj.thaiName || celInd == obj.id || celInd == obj.itemId || celInd == obj.prefix || celInd == obj.code ){
                if(treeGridC.getAllRowIds() != ""){
                    //have structure COPY
                    menu.showItem("del");
                }else{
                    menu.showItem("save");
                }
                
            }else if(celInd == obj.cost){
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
            }
        }else{
            //Not Found
            //            alert0("Input Data");
            return false;
        }
    }
    //    else if(val == "Bom" || val == "Build"){
    menu.showItem("Id");
    ////        menu.showItem("Data");
    //    }
    return true;
}

//################################################################################
//                                                                              ##
//                                                                              ##
//                          Show Context Menu (COPY)                            ##
//                                                                              ##
//                                                                              ##
//################################################################################
function onShowMenuCopy(rowId, celInd, grid){
    var valC = treeGridC.cells(rowId,objC.englishName).getValue();
    var arr = ["Id","saveCopy"];
    for (var i = 0; i < arr.length; i++) {
        menuC.hideItem(arr[i]);
    }
    
    //--------- parent ---------
    if(treeGridC.getRowIndex(rowId) == "0"){
        //        alert(typeof -1+" , "+typeof valC.search(/\S/i));
        if(valC.search(/\S/i) !== -1){
            //----- row=0 & Column='cost'
            if(celInd == objC.englishName || celInd == objC.thaiName || celInd == objC.id || celInd == objC.itemId || celInd == objC.prefix || celInd == objC.code ){
                menuC.showItem("saveCopy");
            }
        }else{
            //Not Found
            //            alert0("Input Data");
            return false;
        }
    }
    menuC.showItem("Id");
    return true;
}