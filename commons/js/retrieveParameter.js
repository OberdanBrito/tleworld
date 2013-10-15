//--------------------- Retrieve Parameter from location bar ---------------------//
var varS = unescape(self.location.search);
var qString = varS.indexOf('&')>=0?varS.substring(1).split('&'):varS.substring(1);
//parseGetVars(qString);
//function parseGetVars(str){
//    for(var i=0,len=str.length; value=str[i], i<len; i++){
//        value = value.split('=');
//        window[value[0]] = value[1];        //All global variables
//    }
//}
if(typeof qString == "object"){
    for(var i=0,len=qString.length; value=qString[i], i<len; i++){
        value = value.split('=');
        window[value[0]] = (decodeURIComponent(escape(value[1])));        //All global variables
    }
}else if(typeof qString == "string"){
    value = qString.split('=');
    window[value[0]] = (decodeURIComponent(escape(value[1])));        //All global variables
}

