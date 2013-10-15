/////////////////////////////////---- Set Date & Time Object----/////////////////////////////////
function cDateObject(){
    this.d = new Date();
    this._month = function(){
        this.m = this.d.getMonth()+1;
        return this.m < 10 ? '0' + this.m : this.m;
    }
    this.pad2 = function(num){
        return (num < 10 ? '0' : '') + num;
    }
    this._d = function(){
        return this.pad2(this.d.getDate());
    }
    this._h = function(){
        return this.pad2(this.d.getHours());
    }
    this._min = function(){
        return this.pad2(this.d.getMinutes());
    }
    this._s = function(){
        return this.pad2(this.d.getSeconds());
    }
    this._mil = function(){
        return this.pad2(this.d.getMilliseconds());
    }
    this.dn = this.d.getFullYear()+"-"+this._month()+"-"+this._d();
    this.tn = this._h()+":"+this._min()+":"+this._s();
}