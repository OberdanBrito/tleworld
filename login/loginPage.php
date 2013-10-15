<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title></title>
        <script src="js/jquery-1.8.1.min.js"></script>
        <script src="js/jstorage.js"></script>
        <link href="CSS/style.css" rel="stylesheet" type="text/css">

            <script>
                function showResult(result) {      
                    if(result==1){
                        document.getElementById('info').innerHTML = 'Loging in....';
                    
                    }else if(result==2){
                        document.getElementById('info').innerHTML = '<font color=green>Login Successful</font>';
                        window.location='../manage.php';
                    }else if(result==3){
                        document.getElementById('info').innerHTML = '<font color=red>Login Error!</font>';
                    }else{
                        $('#info').val(result);
                    }
                }
                function setFocus(){
                    if(document.getElementById("usern").value==""){
                        document.getElementById("usern").focus();
                    }else{
                        document.getElementById('password').focus();
                    }
                }
            </script>

    </head>

    <body style="overflow: hidden" onLoad="setFocus()">
        <script>
            
            var companyText;
            var selIdx;
            function ajaxFunction(){
                //            alert("ajaxFunction() invoked.");
                var ajaxRequest;  // The variable that makes Ajax possible!

                try{
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequest = new XMLHttpRequest();
                } catch (e){
                    // Internet Explorer Browsers
                    try{
                        ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try{
                            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e){
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }
                ajaxRequest.onreadystatechange = function(){
                    if(ajaxRequest.readyState == 4){
                        companyText = ajaxRequest.responseText;
                        var resText = companyText.split(",");
                        //                    alert(resText);
                        var selbox = document.form1.companyList;
                        selbox.options.length = 0;
                        for(i=0;i<resText.length-1;i++){
                            selbox.options[i] = new Option(resText[i],resText[i]);
                        }
                    }
                }
                ajaxRequest.open("GET", "PHP/companyList.php?username="+document.getElementById('usern').value, true);
                ajaxRequest.send(null); 
            }
            // start this when DOM is ready
            $(document).ready(function(){
                selIdx = 0;
                var checkbox = $('#remember'),
                userField = $('#usern'),
                companyKey = 'savedCompany',
                companyIndex = 'indCompany',
                companyField = document.form1.companyList,
                key = 'savedUsername',
                username = $.jStorage.get(key),
                company = $.jStorage.get(companyKey),
                companySelected = $.jStorage.get(companyIndex);
                if (username&&company) {
                    companyText = company;
                    userField.val(username);
                    var rText = company.split(",");
                    companyField.options.length = 0;
                    for(i=0;i<rText.length-1;i++){
                        companyField.options[i] = new Option(rText[i],rText[i]);
                        
                    }
                    companyField.options[companySelected].selected = true;
                    checkbox.prop('checked', true);
                }else {
                    checkbox.prop('checked', false);
                }
                $('#form1').submit(function(e){
                    console.log("loginform submitted.");
                    if (checkbox.prop('checked')) {
                        
                        $.jStorage.set(key, userField.val());
                        $.jStorage.set(companyKey, companyText);
                        $.jStorage.set(companyIndex, selIdx);
                    }
                    else {
                        $.jStorage.deleteKey(key);
                        $.jStorage.deleteKey(companyKey);
                        $.jStorage.deleteKey(companyIndex);
                    }
                });
            });
            function chk(obj){
                selIdx = obj.selectedIndex;
            }
            
        </script>
        <div id="wrapper">
            <div id="login" style="width:400px;height:200px;font-size:8pt;font-family:Tahoma;">
                <form name="form1" id="form1" method="get" action="PHP/checkUserPass.php" onsubmit="return showResult(1);" target="iframe_target">

                    <table>
                        <tr>
                            <td>
                                <fieldset>
                                    <legend><font id="txtlogin" style="font-weight:bold">Hawaii Groups</font></legend>
                                    <table>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td id="txtlogin">Username</td>
                                            <td>
                                                <input class="usern" onChange="ajaxFunction()" type="text" name="usern" id="usern"  placeholder="Username" autocomplete="off" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="txtlogin" align="right">Password</td>
                                            <td>
                                                <input class="password" type="password" name="password" id="password" autocomplete="off" placeholder="Password">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="radio" name="language" id="language" value="English" checked/><text id="en">English</text>
                                                <input type="radio" name="language" id="language" value="Thai" /><text id="th">Thai</text>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <select name="companyList" id="companyList" onchange="chk(this)">
                                                    <option value="company">--Company--</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="checkbox" name="remember" value="remember" id="remember"/>Remember username.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> 
                                            </td>
                                            <td>
                                                <input type="submit" name="Login" id="Submit" value="Login">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center"><a href="pwRecovery.php" onClick="window.open(this.href, 'Password Recovery', 'height=400,width=400,scrollbars,location=false'); return false"><text id="forgotp">Forgot Password?</text></a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <span id="info"/>&nbsp;
                                            </td>
                                        </tr>
                                    </table>

                                </fieldset>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
    </body>
</html>