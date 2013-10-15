function toThaiWord(value, currency) {
    var thb = value.split('.')[0].split("");
    var ths = value.split('.')[1];
    var thaiNum = ['', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า'];
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
            unit = unitSatang[j];
            switch (true) {
                case k == 0 && num == 1 && ths.length > 1:
                    tnum = "เอ็ด";
                    break;
                case k == 1 && num == 1:
                    tnum = "";
                    break;
                case k == 1 && num == 2:
                    tnum = "ยี่";
                    break;
                case k != 0 && k != 6 && num == 0:
                    unit = '';
                    break;
            }
            var tmp2 = tnum + unit;
            satang = tmp2 + satang;
        }
    }
    console.log(string);
    console.log(satang);
    return string+"จุด"+satang+""+currency;
}