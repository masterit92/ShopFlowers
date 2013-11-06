<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <?php
        include_once 'templates/render.php';
        $render = new render();
        $arrFileCSS = array(
            'transdmin.css',
            'jquery-ui-1.10.3.custom.css',
        );
        $render->renderCSS('admin/style', $arrFileCSS);
        $arrFileJS = array(
            'jquery-1.9.1.js',
            'jquery-ui-1.10.3.custom.js',
            'jNice.js',
            'base.js'
        );
        $render->renderJS('admin/style', $arrFileJS);
        ?>
        <script type="text/javascript">
            //ThaiNV: set datepicker for all project:
            $(window).load(function() {
                $(".datepicker").datepicker();
            });
            //Set root url:
            var ROOT_URL = '<?PHP echo URL_BASE ?>';
        </script>
    </head>
    <body>
        <?php
        if (!isset($_SESSION['user_admin'])) {
            if (CONTROLLER == 'Index' && ACTION == 'index') {
                include_once TEMPLATE;
            } else {
                header('Location: ' . URL_BASE . '/admin');
            }
            ?>
        <?php } else { ?>
            <div id="wrapper">
                <h1><a href="#"><span>Shop Flowers</span></a></h1>

                <ul id="mainNav">
                    <li><a href="#" class="active">DASHBOARD</a></li>
                    <li><a href="#">ADMINISTRATION</a></li>
                    <li><a href="#">DESIGN</a></li>
                    <li><a href="#">OPTION</a></li>
                    <li class=""><a href="<?php echo URL_BASE ?>/admin/logout">LOGOUT</a></li>
                    <li class="logout"><a href="#">Xin chào: <?php if (isset($_SESSION['full_name_admin'])) echo $_SESSION['full_name_admin']; ?></a></li>
                </ul>

                <div id="containerHolder">
                    <div id="container">
                        <div id="sidebar">
                            <ul class="sideNav">
                                <li><a href="#">Exchange</a></li>
                                <li><a href="#">Print resources</a></li>
                                <li><a href="#">Training &amp; Support</a></li>
                                <li><a href="#">Books</a></li>
                                <li><a href="#">Safari books online</a></li>
                                <li><a href="#">Events</a></li>
                            </ul>
                        </div>    

                        <div id="main">
                            <?php include_once TEMPLATE ?>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>	

                <p id="footer"></p>
            </div>
        <?php } ?>
    </body>
</html>



