<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php
    include_once 'templates/render.php';
    $render = new render();
    $arrFileCSS = array('style_login.css', 'style.css','menu.css');
    $render->renderCSS('admin', $arrFileCSS);
    $arrFileJS = array('jquery-1.10.2.js', 'jquery.validate.min.js', 'messages_vi.js', 'validate.js','js_style.js');
    $render->renderJS('admin', $arrFileJS);
    ?>
    <link href="<?php echo URL_BASE ?>/favicon.ico" rel="shortcut icon"/>
</head>
<body>
<?php
if (!isset($_SESSION['user_admin'])) {
    if(CONTROLLER=='Index' && ACTION=='index'){
        include_once TEMPLATE ;
    }else{
        header('Location: '.URL_BASE.'/admin');
    }
    ?>
<?php } else { ?>
    <div id="wrap_content">
        <div class="header">
            <div class="header_logo">
                <a href="<?php echo URL_BASE?>/admin">Admin Flowers</a>
            </div>
            <div class="header_search">
                <?php include_once 'search.php'?>
            </div>
        </div>
        <div class="container">
            <div class="container_menu">
                <div class="left_menu">
                    <?php include_once 'left_menu.php' ?>
                </div>
                <div class="right_menu">
                    <?php include_once 'right_menu.php'?>
                </div>
            </div>
            <div class="content"><?php include_once TEMPLATE ?></div>
        </div>
        <div class="footer">
            <div class="footer_logo">
                <img src="<?php echo URL_BASE ?>/templates/admin/images/footer_logo.gif">
            </div>
            <div class="footer_title">Admin Skin © Copyright, Development by trainee SmartOSC&#174;</div>
        </div>
    </div>
<?php } ?>
</body>
</html>