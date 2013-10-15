// Convert numbers to words
// copyright 25th July 2006, by Stephen Chapman http://javascript.about.com
// permission to use this Javascript on your web page is granted
// provided that all of the code (including this copyright notice) is
// used exactly as shown (you can change the numbering system if you wish)

// American Numbering System
var th = ['', 'thousand', 'million', 'billion', 'trillion'];
// uncomment this line for English Number System
// var th = ['','thousand','million', 'milliard','billion'];

var dg = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
var tn = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
var tw = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
function toWords(s) {
    s = s.toString();
    s = s.replace(/[\, ]/g, '');
    if (s != parseFloat(s))
        return 'not a number';
    var x = s.indexOf('.');
    if (x == -1)
        x = s.length;
    if (x > 15)
        return 'too big';
    var n = s.split('');
    var str = '';
    var sk = 0;
    for (var i = 0; i < x; i++) {
        if ((x - i) % 3 == 2) {
            if (n[i] == '1') {
                str += tn[Number(n[i + 1])] + ' ';
                i++;
                sk = 1;
            } else if (n[i] != 0) {
                str += tw[n[i] - 2] + ' ';
                sk = 1;
            }
        } else if (n[i] != 0) {
            str += dg[n[i]] + ' ';
            if ((x - i) % 3 == 0)
                str += 'hundred ';
            sk = 1;
        }
        if ((x - i) % 3 == 1) {
            if (sk)
                str += th[(x - i - 1) / 3] + ' ';
            sk = 0;
        }
    }
    if (x != s.length) {
        var y = s.length;
        str += 'point ';
        for (var i = x + 1; i < y; i++)
            str += dg[n[i]] + ' ';
    }
    return str.replace(/\s+/g, ' ');
}

// function toThaiWord by Tle
function toThaiWord(value, currency) {
    var thb, ths;
    if (value.split(".").length == 1) {
        thb = value;
        ths = "00";
    } else {
        thb = value.split('.')[0].split("");
        ths = value.split('.')[1];
    }
    var thaiNum = ['ศูนย์', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า'];
    var unitBaht = ['', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน'];
    var unitSatang = ['สตางค์', 'สิบ'];
    var string = "";
    var satang = "";
    var j = 0;
    for (var i = thb.length - 1; i >= 0; i--, j++) {
        var num = thb[i];
        var tnum = thaiNum[num];
        var unit = unitBaht[j];
        switch (true) {
            case num == 0:
                tnum = "";
                unit = "";
                break;
            case j == 0 && num == 1 && thb.length > 1 :
                tnum = "เอ็ด";
                break;
            case j == 1 && num == 1 :
                tnum = "";
                break;
            case j == 1 && num == 2:
                tnum = "ยี่";
                break;
            case j == 6 && num == 1 && thb.length > 7 :
                tnum = "เอ็ด";
                break;
            case j == 7 && num == 1 :
                tnum = "";
                break;
            case j == 7 && num == 2:
                tnum = "ยี่";
                break;
            case j != 0 && j != 6 && num == 0 :
                unit = "";
                break;
        }
        var tmp = tnum + unit;
        string = tmp + string;
    }
    if (ths == "00") {
        satang = '';
    } else {
        ths.split("");
        var k = 0;
        satang = "";
        for (var i = ths.length - 1; i >= 0; i--, k++) {
            num = ths[i];
            tnum = thaiNum[num];
            var tmp2 = tnum;
            satang = tmp2 + satang;
        }
    }
//                console.log(string);
//                console.log(satang);
    if (satang == "") {
        return string + currency;
    } else {
        return string + "จุด" + satang + " " + currency;
    }
}
            