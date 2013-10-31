<?php session_start();
if(isset( $_SESSION['user_admin']) && isset( $_SESSION['full_name_admin'])){?>
    <meta http-equiv="refresh" content="0;url=<?php echo URL_BASE?>/admin/home">
<?php
}
?>
<div id="wrap">
    <div class="center">
        <span class="title">
            <img src="<?php echo URL_BASE ?>/templates/admin/images/signature.png"/>
            Login
        </span>

        <div class="login">
            <form action="" method="post" id="frmLogin">
                Username: <input type="text" name="txtUser" id="txtUser" class="txt txtUser required" minlength="6" tabindex="1" placeholder="UseName"/><br/>
                Password: <input type="password" name="txtPass" id="txtPass" class="txt txtPass required" minlength="6" tabindex="2" placeholder="Password"/><br/>
                <?php if (isset($_SESSION['confirm']) && $_SESSION['confirm'] >= 4) { ?>
                    <div class="confirm">
                        <span class="img_confirm"><img src="<?php echo URL_BASE?>/templates/random_image.php" width="100" height="40" alt="No image" title="Confirmation code"/></span>
                        <input type="text" name="confirm" id="confirm" class="txt txtConfirm required" tabindex="3" placeholder="Confirm"/>
                    </div>
                <?php } ?>
                <div class="clear"></div>
                <div class="btnLogin">
                    <input type="checkbox" name="cbRe" id="cbRe" tabindex="4"/>
                    Remember me.| <a href="#" tabindex="7">Forgot Password.</a><br/>
                    <input type="submit" value="Login" name="btnLogin" id="tbnLogin" class="btn" tabindex="5"/>
                    <input type="reset" value="Reset" class="btn" tabindex="6"/>
                </div>
            </form>
        </div>
    </div>
</div>