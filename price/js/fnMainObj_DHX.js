/////////////////////////////////---- Set Header Object DHX----/////////////////////////////////
function cObject(){
    this.setBegin = function(a,b,c){
        //alert(arguments.length);
        this.lang=c==0?"enNames":"thNames";
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
        a.setColumnIds(this.heads.fl());
        a.setColTypes(this.types.fl());
        a.setSkin("dhx_skyblue");

        a.enableAutoHiddenColumnsSaving();
        a.loadHiddenColumnsFromCookie();
    };
}

String.prototype.fl = function () {
    return this.replace(/^undefined/g, "").replace(/,$/g, "");
}
