//----- Calendar setSensitiveRange
function calendarRange(par1, par2){
    // par1[name,field] == calendar1 , par2[name,field] == calendar2
    dhtmlx.skin = "dhx_skyblue";
    if(status != "view"){
        var dateTo = null;
        window.onload = function() {
            var Cal1 = myForm.getCalendar(par1);
            Cal1.hideTime();
            Cal1.setWeekStartDay(7);
            Cal1.attachEvent("onClick",function(date){
                var dateFrom = new Date(date);
                Cal2.setSensitiveRange(dateFrom, dateTo);
                return true;
            })
            var Cal2 = myForm.getCalendar(par2);
            Cal2.hideTime();
            Cal2.setWeekStartDay(7);
        }
    }
}

//------------- set Value Date (Before INSERT INTO DB)
function setValueDate(showD,hideD){
    if(myForm.getItemValue(showD) !== null){
        var staS = myForm.getCalendar(showD);
        var gDate = staS.getDate();
        var sDate = gDate.getFullYear()+"-"+_month(gDate)+"-"+_d(gDate);
        myForm.setItemValue(hideD,sDate);
    }
}


//------------- get Value Date(After SELECT Data FROM DB)
function getValueDate(hideD,showD){
    var gDate = myForm.getItemValue(hideD);
    if(gDate !== null){
        myForm.setItemValue(showD,gDate);
    }
}
