<?php
session_start();
if (isset($_SESSION['user_admin']) && isset($_SESSION['full_name_admin'])) {
    ?>
    <meta http-equiv="refresh" content="0;url=<?php echo URL_BASE ?>/admin/home">
    <?php
}
?>
<style>
    fieldset{
        width: 500px;
        height: 200px;
        margin: 0 auto;
        border: 1px black solid;
        margin-top: 50px;
        background: lavender;
    }
    legend{
        width: 50px;
        height: 20px;
        border: 1px black solid;
        background: yellowgreen;
        font-weight: bold;
        color: red;
        margin-left: 20px;
        padding-top: 10px;
    }
    form{
        margin: 0 auto;
        margin-top: 30px;
    }
    form label{
        float: left;
        width: 100px;
        margin-left: 100px; 
    }
    form input{
        border: 1px black solid;
        margin-bottom: 10px;
    }
    h2{
        margin-top: 100px;
    }
</style>
<center>
    <h3>Welcome to admin</h3>
</center>
<fieldset>
    <legend>Login</legend>
    <form method="post">
        <center>
            <div>
                <label>User name:</label>
                <input name="txtUser" id="username" type="text" value="" />
            </div>

            <div>
                <label>Pass word:</label>
                <input class="input-large span10" name="txtPass" id="password" type="password" value="" />
            </div>
            <?php if (isset($_SESSION['confirm']) && $_SESSION['confirm'] >= 4) { ?>
                <div>
                    <label>
                        <img src="<?php echo URL_BASE ?>/templates/random_image.php" width="100" height="40" alt="No image" title="Confirmation code"/>
                    </label>
                    <input type="text" name="confirm" id="confirm"/>
                </div>
            <?php } ?>
            <p>
                <input type="submit" value="Login" name="btnLogin" id="btnLogin"/>
            </p>
        </center>
    </form>
</fieldset>