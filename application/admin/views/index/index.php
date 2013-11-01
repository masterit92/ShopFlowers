<?php
session_start();
if (isset($_SESSION['user_admin']) && isset($_SESSION['full_name_admin'])) {
    ?>
    <meta http-equiv="refresh" content="0;url=<?php echo URL_BASE ?>/admin/home">
    <?php
}
?>

<div class="container-fluid">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="span12 center login-header">
                <h2>Welcome to Charisma</h2>
            </div><!--/span-->
        </div><!--/row-->

        <div class="row-fluid">
            <div class="well span5 center login-box">
                <div class="alert alert-info">
                    Please login with your Username and Password.
                </div>
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <div class="input-prepend" title="Username" data-rel="tooltip">
                            <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="txtUser" id="username" type="text" value="" />
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password" data-rel="tooltip">
                            <span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="txtPass" id="password" type="password" value="" />
                        </div>
                        <?php if (isset($_SESSION['confirm']) && $_SESSION['confirm'] >= 4) { ?>
                            <div class="confirm">
                                <span class="img_confirm"><img src="<?php echo URL_BASE ?>/templates/random_image.php" width="100" height="40" alt="No image" title="Confirmation code"/></span>
                                <input type="text" name="confirm" id="confirm" class="txt txtConfirm required" tabindex="3" placeholder="Confirm"/>
                            </div>
                        <?php } ?>
                        <div class="clearfix"></div>

                        <div class="input-prepend">
                            <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
                        </div>
                        <div class="clearfix"></div>

                        <p class="center span5">
                            <input type="submit" value="Login" name="btnLogin" id="tbnLogin" class="btn btn-primary" tabindex="5"/>
                        </p>
                    </fieldset>
                </form>
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/fluid-row-->

</div><!--/.fluid-container-->