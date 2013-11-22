<form id="form_data">
    <div class="clear" style="height: 100px;"></div>
    <div class="container_29">
        <div class="grid_29">
            <table cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td width="110" rowspan="9"><?php echo getResourceImage("signin-bannr.png"); ?></td>
                    <td><?php echo getResourceImage("signin.png"); ?></td>
                </tr>
                <tr>
                    <td height="30"></td>
                </tr>
                <tr>
                    <td height="20" valign="bottom" class="font12">Account Information</td>
                </tr>
                <tr>
                    <td height="35"><input type="text" id="txtUsername" name="txtUsername" value="" class="textbox" style="width: 270px;" placeholder="Enter your username" onkeypress="if(e.keyCode == 13){ doSignin(); }"/></td>
                </tr>
                <tr>
                    <td height="35"><input type="password" id="txtPassword" name="txtPassword" value="" class="textbox" style="width: 270px;" placeholder="Enter your password" onkeypress="if(e.keyCode == 13){ doSignin(); }"/></td>
                </tr>
                <tr>
                    <td height="5"></td>
                </tr>
                <tr>
                    <td align="left">
                        <div id="div_error_login"></div>
                        <a id="btnSubmit" href="javascript:;" class="m-btn blue" onclick="doSignin();">Sign In</a>
                    </td>
                </tr>
                <tr>
                    <td height="15">&nbsp;</td>
                </tr>
                <tr>
                    <td height="20" class="font12-blue"><a href="javascript:;">Forgot your password?</a></td>
                </tr>
            </table>
        </div>
    </div>
</form>