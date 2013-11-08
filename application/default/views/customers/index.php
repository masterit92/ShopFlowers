<form action="<?php echo URL_BASE ?>/customers/login" method="post" id="frmLoginCus">
    <table>
        <tr>
            <td>UserName:</td>
            <td>
                <input type="text" name="txtUser"/>
            </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td>
                <input type="password" name="txtPass"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Login" name="btnLogin"/>
            </td>
        </tr>
    </table>
</form>