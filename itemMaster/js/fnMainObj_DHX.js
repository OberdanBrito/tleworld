/////////////////////////////////---- Set Header Object DHX----/////////////////////////////////
//////////////////---- Set Grid,treeGrid----//////////////////
function cObject(){
    this.setBegin = function(a,b,c){
        //alert(arguments.length);
        this.lang=c=="englishName"?"enNames":"thNames";
        this.arrVal = new Array();
        this.arrNames = new Array();
        for(var index in b){
            for(var key in b[index]){
                this.values = b[index][key];
                if(key.search(/(fields|enNames)/) !== -1){
                    //Found
                    if(key == "fields")
                        this.arrVal[index] = this.values;
                    if(key == "enNames"){
                        this.arrNames[index] = this.values;
                    }
                }
                if(key == this.lang) this.heads += this.values+",";
                if(key == "aligns") this.aligns += this.values+",";
                if(key == "widths") this.widths += this.values+",";
                if(key == "types") this.types += this.values+",";
                if(key == "hides") {
                    a.setColumnHidden(index,this.values);
                }
            }
        }
        for(var i=0;i<this.arrVal.length;i++){
            this[this.arrVal[i]] = this.arrVal.indexOf(this.arrVal[i]);
            this[this.arrNames[i]] = this.arrNames.indexOf(this.arrNames[i]);
        }
        this.fields = this.arrVal.join();
        a.setHeader(this.heads.fl());
        a.setColAlign(this.aligns.fl());
        a.setInitWidths(this.widths.fl());
        a.setColTypes(this.types.fl());
        a.setSkin("dhx_skyblue");

        //add file
        //1. '../DHX/dhtmlxGrid/codebase/ext/dhtmlxgrid_hmenu.js'
        //2. '../DHX/dhtmlxGrid/codebase/ext/ext/dhtmlxgrid_ssc.js'
        a.enableAutoHiddenColumnsSaving();
        a.loadHiddenColumnsFromCookie();

    //And add Page Main
    //            treeGrid.enableHeaderMenu();                    //add file 'dhtmlxgrid_hmenu.js'
    //            treeGrid.loadSizeFromCookie();                  //add file 'ext/dhtmlxgrid_ssc.js'
    //            treeGrid.enableAutoSaving();
    //            treeGrid.enableAutoSizeSaving();
    };
}

//////////////////---- Set Form----//////////////////
function fObject(){
    this.enLabel = new Array();
    this.setLabelNames = new Array();
    this.fields = new Array();

    this.setBeginForm = function(a,b,c){
        this.lang=c=="englishName"?"enLabels":"thLabels";
        for(var index in a){
            this.i = "0";
            for(var key in a[index]){
                this.values = a[index][key];

                if(this.values.search(/(fieldset|label|button)/) == -1){
                    //Not Found
                    if(key == "fields")
                        this.fields[index]=this.i=="1"?"":this.values;
                }else{
                    //Found
                    this.i = "1";
                }

                if(key == "keys") this.setLabelName(this.values,a[index].fields,a[index][this.lang],b);
                if(key == this.lang) this.setLabelNames[index] = this.values;
                if(key == "enLabels") this.enLabel[index] = this.values;
            }
        }
        for(var i=0;i<this.enLabel.length;i++){
            this[this.enLabel[i]] = this.setLabelNames[i].fl();
        }
        this.fields = this.fields.join().sp();
    };

    this.setLabelName = function(valA,fieldA,labelA,d){
        for(var i in d){
            for(var key in d[i]){
                if(key == "label"){
                    if(valA == d[i].label){     //key(data) == lable(form)
                        d[i].name = fieldA;
                        d[i].label = labelA;
                    }
                }else if(d[i].type == "button"){    //type(form) == "button"
                    if(valA == d[i].label){
                        d[i].value = labelA;
                    }
                }else if(key == "list"){            //attribute list(form)
                    this.list = d[i][key];
                    this.setLabelName(valA,fieldA,labelA,this.list);
                }
            }
        }
    }
}

String.prototype.fl = function () {
    return this.replace(/^undefined/g, "").replace(/,$/g, "");
}

String.prototype.sp = function () {
    return this.replace(/^,+/g, "").replace(/,+/g, ",").replace(/,+$/g, "");
}
