<?php

//ISSUE --> have '*' important
//*col == Column,field
// table == Table in database               (Don't set will return 0(zero))
// class == WHERE class=""                  (Don't set will return 0(zero))
// type == WHERE type=""                    (Don't set will return 0(zero))
// fieldName == SELECT fieldName            (Don't set will return 0(zero))
//
//Example '{
//          "1": {"col":"unitLength", "table":"unit", "class":"standard", "type":"length"},
//          "2": {"col":"description"}
//          }'

$json = '{
"1": {"col":"unitLength", "table":"unit", "class":"standard", "type":"length", "fieldName":"name"},
"2": {"col":"unitThinkness", "table":"unit", "class":"standard", "type":"length", "fieldName":"name"},
"3": {"col":"unitVolume", "table":"unit", "class":"standard", "type":"volume", "fieldName":"name"},
"4": {"col":"unitArea", "table":"unit", "class":"standard", "type":"area", "fieldName":"name"},
"5": {"col":"unitWD", "table":"unit", "class":"standard", "type":"length", "fieldName":"name"},
"6": {"col":"unitHeight", "table":"unit", "class":"standard", "type":"length", "fieldName":"name"},
"7": {"col":"unitWeight", "table":"unit", "class":"standard", "type":"weight", "fieldName":"name"},
"8": {"col":"description"},
"9": {"col":"barcode"}
}';
?>
