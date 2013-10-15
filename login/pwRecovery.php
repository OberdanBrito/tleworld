<html>
    <head>
        <link href="CSS/style.css" rel="stylesheet" type="text/css">
        <title></title>
        <script>
            function showResult(result) {      
                if(result==1){
                    document.getElementById('info').innerHTML = 'Sending E-mail...';
                }else if(result==2){
                    document.getElementById('info').innerHTML = '<font color=green>E-mail sent.</font>';
                }else if(result==3){
                    document.getElementById('info').innerHTML = '<font color=red>Sending Error! Please try again.</font>';
                }else if(result==4){
                    document.getElementById('info').innerHTML = '<font color=red>Not Found Username or Email.</font>';
                }
            }
            function show(msg){
                document.getElementById('info').innerHTML = msg;
            }
        </script>
    </head>
    <body overflow="true">
        <div id="wrapper">
            <div id="login" style="width:400px;height:300px;font-size:8pt;font-family:Tahoma;">
                <form name="form1" method="post" action="PHP/sendEmail.php">

                    <table>
                        <tr>
                            <td>
                                <fieldset>
                                    <legend><font id="txtlogin" style="font-weight:bold">Password Recovery</font></legend>
                                    <table>
                                        <tr>
                                            <td colspan="2" align="center">Please enter your username or E-mail</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="text" name="usernemail" id="usernemail">
                                            </td>
                                        </tr>
                                        <tr>

                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" name="selector" id="selector" value="name" checked/>Username
                                            </td>
                                            <td>
                                                <input type="radio" name="selector" id="selector" value="email" />E-Mail
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="submit" name="send" id="Submit" value="Send to E-mail">
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
