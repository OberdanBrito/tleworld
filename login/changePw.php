<html>
    <head>
        <link href="CSS/style.css" rel="stylesheet" type="text/css">
        <title></title>
        <script>
            function show(msg){
                document.getElementById('info').innerHTML = msg;
            }
        </script>
    </head>
    <body>
        <div id="wrapper">
            <div id="login" style="width:400px;height:300px;font-size:8pt;font-family:Tahoma;">
                <form name="form1" method="post" action="PHP/chPw.php" target="iframe_target">
<!--                    onsubmit="return show('Changing Password...');-->

                    <table>
                        <tr>
                            <td>
                                <fieldset>
                                    <legend><font id=lTitle>Change Password</font></legend>
                                    <table>
                                        <tr>
                                            <!--<td colspan="2" align="center">Please enter your username or E-mail</td>-->
                                        </tr>

<!--                                        Old-Password-->
                                        <tr>
                                            <td align="center">Old-password :</td>
                                            <td align="center">
                                                <input type="text" name="oldpw" id="oldpw"/>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                        
<!--                                        nPassword-->
                                        </tr>
                                        <tr>
                                            <td align="center">New-password :</td>
                                            <td align="center">
                                                <input type="password" name="newpw" id="newpw"/>
                                            </td>
                                        </tr>
                                        
<!--                                        Retype-nPassword-->
                                        <tr>
                                            <td align="center">Retype New-password :</td>
                                            <td align="center">
                                                <input type="password" name="retypepw" id="retypepw"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <input type="submit" name="send" id="Submit" value="Submit">
                                            </td>
                                            <td align="center">
                                                <input type="Reset" name="reset" id="reset" value="Reset">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <span id="info"/>
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
