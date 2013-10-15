<?php
require_once("../commons/PHP/connectDB.php");

function checkStateSQL($getPara) {
    if ($getPara == '') {
        return false;
    } elseif ($getPara == null) {
        return false;
    } elseif ($getPara == '0') {
        return false;
    } elseif (EMPTY($getPara)) {
        return false;
    }
    return true;
}

function getItemId($gItemId) {
    echo '<script type="text/javascript">';
    echo 'var itemId = "' . $gItemId . '";';
    echo '</script>';

    $sql_img = "SELECT * FROM image WHERE refId='$gItemId' ORDER BY rowId ASC";
    $query_img = mysql_query($sql_img) or die("Error Query [" . $sql_img . "]");
    $rs_img = mysql_num_rows($query_img);
    if (checkStateSQL($rs_img)) {
        $arrayImg = array();
        while ($fa_imag = mysql_fetch_array($query_img)) {
            array_push($arrayImg, $fa_imag["image"]);
        }
        echo '<script type="text/javascript">';
        echo 'var arrayImg = new Array("', join('","', $arrayImg), '");';
        echo '</script>';
    }
}

$itemId = stripslashes($_GET["idItem"]);
//$sql = stripslashes($_GET['sql']);
//echo "0 : ".$sql."<br/>";
//echo "itemId : ".$itemId."<br/>";
//echo $sql;
//echo $rId."<br>";
//echo "ISSET : ".isset($rId)."<br>";
if (!EMPTY($itemId) == "1") {
    //Have id
//    echo "11 : ".$itemId;
    getItemId($itemId);
} else {
//    if (!empty($sql)) {
////        echo "22 : ".$sql;
////select ID item
//        $query_item = mysql_query($sql) or die("Error Query [" . $sql . "]");
//        $rs_item = mysql_num_rows($query_item);
//        if (checkStateSQL($rs_item)) {
//            $fa_item = mysql_fetch_array($query_item);
//            $itemId = $fa_item["id"];
//        }
//        getItemId($itemId);
//    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Image</title>
        <script type="text/javascript" src="js/canvas/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/canvas/modernizr.custom.34982.js"></script>
        <script type="text/javascript" src="js/canvas/sketcher.js"></script>
        <!--script type="text/javascript" src="js/canvas/jquery-1.7.min.js"></script-->
        <!--script type="text/javascript" src="js/canvas/trigonometry.js"></script-->
        <!--script type="text/javascript" src="js/canvas/binaryajax.js"></script-->


        <style type='text/css'>

            canvas {
                border: 1px solid #ccc;
                width:620px;
                height:450px;
                position: fixed;
                z-index:2;
                margin: 30px 0 0 200px;
            }

            /*            pre.source {
                            background: #e5eeee;
                            padding: 10px 20px;
                            width: 760px;
                            overflow-x: auto;
                            border: 1px solid #acc;
                        }
            
                        code { background: #cff; }
            
                        .tools { margin-bottom: 10px; }
                        .tools a {
                            border: 1px solid black; height: 30px; line-height: 30px; padding: 0 10px; vertical-align: middle; text-align: center; text-decoration: none; display: inline-block; color: black; font-weight: bold;
                        }*/
            #s1 {
                position:fixed;
                margin: 345px 0 0 70px;
            }
            #b1 {
                position:fixed;
                margin: 345px 0 0 20px;
            }
            /*      #b2 {
                            position:absolute;
                            left:20px;
                            top:380px;
                  }
                   #b3 {
                            position:absolute;
                            left:60px;
                            top:380px;
                  }
                   #b4 {
                            position:absolute;
                            left:120px;
                            top:380px;
                  }
                  #c1 {
                            position:absolute;
                            left:20px;
                            top:410px;
                  }
                  #c2 {
                            position:absolute;
                            left:60px;
                            top:410px;
                  }
                   #c3 {
                            position:absolute;
                            left:120px;
                            top:410px;
                   }
                  #d1 {
                            position:absolute;
                            left:20px;
                            top:440px;
                  }
                  #d2 {
                            position:absolute;
                            left:60px;
                            top:440px;
                  }
                   #d3 {
                            position:absolute;
                            left:120px;
                            top:440px;
                   }*/
        </style>
        <link rel="STYLESHEET" type="text/css" href="css/itemMaster.css">
        <script type="text/javascript" src="js/fnDateObj.js"></script>

    </head>
    <body>
        <article>
            <div id="show" style="position: fixed;"></div>
            <div id="main">

                <div id="left" style="position: fixed;">
                    <div>
                        <input name="fileUpload" type="file" id="file" >
                        <input name="fileUpload" type="file" id="file" class="realupload" multiple/>
                        <div id="folderSearch" onclick="getFilePathFromDialog();"></div>
                    </div>
                    <!--div id="holder">Drop Area</div-->
                    <div id="bin"></div>
                </div>

                <div id="center" style="position: fixed;" z-index=1></div>
                <input type='button' id='b1' value='clear' onclick="cl();">
                <input type='button' id='s1' value='Save' onclick="save();">
                <canvas id="sketch" width="600" height="430" ></canvas>

                <!--p id="status">File API &amp; FileReader API not supported</p-->
                <div class="info" id="info">
                    <div id="img" ></div>
                </div>

            </div>

<!--div><input type="button" value="upload" onclick="uploadFile()"/></div>
<div><input value="Submit" type="submit"></div-->
        </article>
        <script type="text/javascript">
            var sketcher = null;
            //
            //            function st(){
            //                sketcher = new Sketcher("sketch");
            //            }
            $(document).ready(function(e) {
                /*	brush = new Image();
                                            brush.src = 'draw/brush1.png';
                                            brush.onload = function(){
                                            sketcher = new Sketcher( "sketch", brush );
                                            }
                 */
                //alert("1");
                sketcher = new Sketcher("sketch");
                //alert("#");
                //                sketcher.lineWidth=2;
                //                sketcher.globalAlpha = 1;
            });
            function cl(){
                //sketcher.clear();
                sketcher.clearRect( 0, 0, 600, 430 );
            }
            //            st();
            
            //            document.getElementById("s1").onclick = function(){save();};
            function save(){
                var selImg = document.getElementById("filmStrip");
                if(selImg == null){
                    alert("Please Select Image...");
                }else{
                    //                    var imgName = decodeURIComponent(selImg.src.split("/update/image/")[1]);
                    var imgName = selImg.name;
                    //                alert(imgName);
                    var canvas1 = document.getElementById("sketch");
                    var dataURLCanvas = canvas1.toDataURL("image/png");
                                    
                    //                //save ลงเป็น file
                    //                myElement.replace('image/png', 'image/octet-stream');
                    //                document.location.href=dataURL;
                    var urlCanvas = "update/insertCanvas.php";
                    var xhr2= new XMLHttpRequest();
                    xhr2.open('POST',urlCanvas,true);
                    xhr2.onload = function() {
                        document.getElementById("show").innerHTML = this.responseText;
                        //                        alert(this.responseText);
                    };
                    xhr2.onerror = function() {
                        alert("2 :"+this.responseText);
                        //                    show.textContent = this.responseText;
                    };
                    // prepare FormData
                    var formData = new FormData();
                    formData.append('data',dataURLCanvas);
                    formData.append('imgName',imgName);
                    formData.append('refId',itemId);
                    xhr2.send(formData);
                }
            }
            
            //---------------------------------------- LOAD ----------------------------------------//
            function startLoadCanvas(imgName){
                var urlCanvas = "load/loadCanvas.php?imgName="+imgName+"&refId="+itemId;
                var xhr2= new XMLHttpRequest();
                xhr2.open('GET',urlCanvas,true);
                xhr2.onload = function() {
                    loadCanvas(this.responseText);
                };
                xhr2.onerror = function() {
                    alert("2 :"+this.responseText);
                    //show.textContent = this.responseText;
                };
                var formData = new FormData();
                xhr2.send(formData);
            }
            
            function loadCanvas(dataURL){
                var can = document.getElementById('sketch');
                
                // load image from data url
                var imgObj = new Image();
                imgObj.onload = function(){
                    //                    //make sure the canvases are the same size as the source image.
                    //                    can.width = imgObj.width;
                    //                    can.height = imgObj.height;
                    //                    
                    //                    //draw the source image to the source canvas
                    var ctx = can.getContext("2d");
                    ctx.drawImage(imgObj, 0, 0, imgObj.width, imgObj.height);
                };
                imgObj.src = dataURL;
            }
        </script>



        <script type="text/javascript">
            
            
            //Click image search file
            function getFilePathFromDialog() {
                document.getElementById('file').click();
            }
            
            //var list = [];
            var show = document.getElementById("show"),
            upload = document.getElementById("file"),
            info = document.getElementById('info'),
            img = document.getElementById('img'),
            bin = document.getElementById('bin');


            //Create Method uniqueId()
            (function() {
                if ( typeof Object.prototype.uniqueId == "undefined" ) {
                    var id = 0;
                    Object.prototype.uniqueId = function() {
                        if ( typeof this.__uniqueid == "undefined" ) {
                            this.__uniqueid = ++id;
                        }
                        return this.__uniqueid;
                    };
                }
            })();

            //---------------------------------------- SET Height element 'INFO' ----------------------------------------//
            function setHeightInfo(imageLen){
                //alert(info.clientHeight);
                if(imageLen >= 4){
                    info.style.height = "";
                    info.style.height = 140*parseInt(imageLen);
                    //var curr_height = info.clientHeight;
                    //alert(curr_height);
                }else{
                    //imageLen <= 3
                    info.style.height = "";
                    info.style.height = 440;
                }
            }
            
            //---------------------------------------- LOAD ----------------------------------------//
            //check if a variable exist(Global scope)
            if(window['arrayImg'] != undefined){
                //there's any "value" stored in it?(autocasts to true)
                if(undefined != arrayImg){
                    if(arrayImg.length !== 0){
                        //alert("a");
                        loadImageDB(arrayImg);
                    }
                }
            }
            
            //---------- SET IMAGE FROM 'LOAD image Database'
            function loadImageDB(imageDB){
                for(var a=0;a<imageDB.length;a++){
                    var obj1 = {};//var obj2 = new Object();
                    var image = new Image();
                    image.id = "image"+obj1.uniqueId();
                    image.className = "image";
                    image.tabIndex = obj1.uniqueId();
                    image.title = imageDB[a];
                    image.value = imageDB[a];
                    image.name = "image[]";
                    image.src = decodeURIComponent("update/image/"+imageDB[a]);
                    //                alert(decodeURIComponent("update/image/"+imageDB[a]));
                    //                                    alert(image.src);
                    //                                    alert(image.name);
                    img.appendChild(image);
                }
                setHeightInfo(imageDB.length);
                //startLoadCanvas();
            }

            //---------------------------------------- UPLOAD ----------------------------------------//
            //upload file to 'Directory & DataBase'
                        var cD = new cDateObject();
            //                        alert(cD.d.getTime());
            
            var urlUpload = "update/upload.php";
            function uploadFile(fileInput){
                if(window['itemId'] != undefined){
                    for(var i=0;i<fileInput.length;i++){
                        
                        var file = fileInput[i];
                        //                        var cD = new cDateObject();
                        //                        alert(file.size+" : "+file.path+" : "+file.name+" : "+file.type);
                        //                        file.name = cD.d.getTime();
                        //                        alert(file.length+" : "+file.mode+" : "+file.canRead+" : "+file.canWrite);
                        //                        alert(file.value);
                        // prepare XMLHttpRequest
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST',urlUpload,true);
                        xhr.onload = function() {
                            show.innerHTML = "";
                            show.innerHTML += this.responseText;
                        };
                        xhr.onerror = function() {
                            show.textContent = this.responseText;
                        };
                        xhr.upload.onprogress = function(event) {}
                        xhr.upload.onloadstart = function(event) {}
                        // prepare FormData
                        var formData = new FormData();
                        formData.append('myfile',file);
                        formData.append('getTime',cD.d.getTime());
                        formData.append('refId',itemId);

                        xhr.send(formData);
                    }
                }
            }

            //---------- check Image
            function checkImage(f){
                // Only process image files.
                if (!f.type.match('image.*')) {
                    return;
                }
                // Continue only if we have file API proper support on this browser yet
                if ( window.FileReader ) {
                    // Create a reader for this particular file
                    var reader = new FileReader();
                    // Closure to capture the file information.
                    reader.onload = (function (file) {
                        return function(event){
                            setImage(event,file);
                        };
                    })(f);
                    // Read in the image file as a data URL.
                    reader.readAsDataURL(f);
                }
                var countTagImg = img.getElementsByTagName('img').length+1;
                setHeightInfo(countTagImg);
            }

            //---------- set image
            function setImage(event,f){
                var obj1 = {};//var obj2 = new Object();
                var image = new Image();
                image.id = "image"+obj1.uniqueId();
                image.className = "image";
                image.tabIndex = obj1.uniqueId();
                
                var spf = f.name.split(".");
                var name;
                //for take a photo OF 'IOS6' of Iphone
                if(spf[0] == "image" || spf[0] == "Image"){
                    name = spf[0]+""+cD.d.getTime()+"."+spf[1];
                }else{
                    name = f.name;
                }
                image.title = name;
                image.value = name;
                image.name = "image[]";
                image.src = event.target.result;
                img.appendChild(image);
            }

            //---------- Upload SELECT 'FILE Image'
            upload.onchange = function (e) {
                e.preventDefault();
                e.stopPropagation();
                if ('files' in upload){
                    for (var i = 0; i < upload.files.length; i++){
                        var f = upload.files[i];
                        checkImage(f);
                    };
                }
                uploadFile(upload.files);
                return false;
            }
            //---------- Upload DRAG & DROP 'FILE Image'
            info.ondragover = function(){this.className = 'hover'; return false;};
            info.ondragend = function(){this.className = ''; return false;};
            info.ondragleave = function(){this.className = 'leave'; return false;};
            info.ondrop = function (e) {
                this.className = '';
                e.stopPropagation();
                // cancel default actions
                e.preventDefault();
                var file = e.dataTransfer.files;
                if(img.childNodes.length < 100){
                    // Loop through the FileList and render image files as thumbnails.
                    for (var i=0; i<file.length; i++) {
                        var f = file[i];
                        checkImage(f);
                    }
                    uploadFile(file);
                }else{
                    alert("Max!! 100 Images");
                }
                return false;
            };

            //        holder.ondragover = function () {this.className = 'hover'; return false; };
            //        holder.ondragend = function () { this.className = ''; return false; };
            //        holder.ondragleave = function () {this.className = 'leave'; return false;};
            //        holder.ondrop = function (e) {
            //            this.className = '';
            //            e.stopPropagation();
            //            // cancel default actions
            //            e.preventDefault();
            //            var file = e.dataTransfer.files;
            //            if(img.childNodes.length < 100){
            //                // Loop through the FileList and render image files as thumbnails.
            //                for (var i=0; i<file.length; i++) {
            //                    var f = file[i];
            //                    checkImage(f);
            //                }
            //                uploadFile(file);
            //            }else{
            //                alert("Max!! 100 Images");
            //            }
            //            return false;
            //        };

            //---------- Drag Image
            //            var fadeEffect=function(){
            //                return{
            //                    init:function(id, flag, target){
            //                        this.elem = document.getElementById(id);
            //                        clearInterval(this.elem.si);
            //                        this.target = target ? target : flag ? 100 : 0;
            //                        this.flag = flag || -1;
            //                        this.alpha = this.elem.style.opacity ? parseFloat(this.elem.style.opacity) * 100 : 0;
            //                        this.si = setInterval(function(){fadeEffect.tween()}, 50);
            //                    },
            //                    tween:function(){
            //                        if(this.alpha == this.target){
            //                            clearInterval(this.si);
            //                        }else{
            //                            var value = Math.round(this.alpha + ((this.target - this.alpha) * .05)) + (1 * this.flag);
            //                            this.elem.style.opacity = value / 100;
            //                            this.elem.style.filter = 'alpha(opacity=' + value + ')';
            //                            this.alpha = value
            //                        }
            //                    }
            //                }
            //            }();
         
            //---------------------------------------- CENTER ----------------------------------------//
            img.onclick = function(e){
//                alert(e.target.getAttribute('id'));
                var tmp = document.getElementById(e.target.getAttribute('id')).src;
                var elem = document.getElementById(e.target.getAttribute('id'));
                var _filmStrip = document.getElementById("center");
                
                var maxWidth = 580,
                maxHeight = 452,
                imageWidth = elem.width,
                imageHeight = elem.height;

                if (imageWidth > imageHeight) {
                    if (imageWidth > maxWidth) {
                        imageHeight *= maxWidth / imageWidth;
                        imageWidth = maxWidth;
                    }else{
                        if(imageHeight <= 110){
                            imageWidth = imageWidth*4;
                            imageHeight = imageHeight*4;
                        }else{
                            imageWidth = imageWidth*3.2;
                            imageHeight = imageHeight*3.2;
                        }
                    }
                }
                else {
                    if (imageHeight > maxHeight) {
                        imageWidth *= maxHeight / imageHeight;
                        imageHeight = maxHeight;
                        imageHeight = imageHeight;
                    }else{
                        imageWidth = imageWidth*3.3;
                        imageHeight = imageHeight*3.25;}
                }
                //alert(elem.height);
                _filmStrip.innerHTML = '<img src="'+tmp+'" name="'+elem.value+'" id="filmStrip" style="width:'+imageWidth+'px;height:'+imageHeight+'px;">';
                //fadeEffect.init('filmStrip', 1);
                
                //----- Clear Canvas -----
                cl();
                //----- Load Canvas -----
                startLoadCanvas(elem.value);
            }
            //Select image and Start Drag
            img.ondragstart = function(e){
                e.dataTransfer.effectAllowed = 'move'; // only dropEffect='move' will be dropable
                e.dataTransfer.setData('text/plain', e.target.getAttribute('id')); // required otherwise doesn't work
            };

            //---------------------------------------- DELETE ----------------------------------------//
            var urlSubtract = "update/delete.php";
            function subtractFile(fileValue){
                // prepare XMLHttpRequest
                var xhr = new XMLHttpRequest();
                xhr.open('POST',urlSubtract,true);
                xhr.onload = function() {
                    show.innerHTML = "";
                    show.innerHTML += this.responseText;
                };
                xhr.onerror = function() {
                    show.textContent = this.responseText;
                };
                xhr.upload.onprogress = function(event) {}
                xhr.upload.onloadstart = function(event) {}

                // prepare FormData
                var formData = new FormData();
                formData.append('val',fileValue);
                formData.append('refId',itemId);
                xhr.send(formData);
            }

            //Drag the list items over the bin, and drop them to the bin
            bin.ondragover = function () { this.className = 'hover'; return false; };
            bin.ondragleave = function () {this.className = 'leave'; return false;};
            bin.ondrop = function (e) {
                
                e.stopPropagation();
                e.preventDefault();
                //effect normal(return to begin)
                bin.className = '';

                //----- Right block ------
                var el = document.getElementById(e.dataTransfer.getData('text/plain'));
                el.parentNode.removeChild(el);

                //----- Database ------
                subtractFile(el.value);
                
                var countTagImg = img.getElementsByTagName('img').length;
                //alert(countTagImg);
                setHeightInfo(countTagImg);
            };
        </script>

    </body>
</html>
