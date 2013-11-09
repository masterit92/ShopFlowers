<?php
@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Flower Shop</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <?php
        include_once 'templates/render.php';
        $render = new render();
        $arrFileCSS = array('style.css', 'style_menuLogin.css', 'content_css.css');
        $render->renderCSS('default', $arrFileCSS);
        $arrFileJS = array(
            'jquery-1.10.2.js',
            'jquery.validate.min.js',
            'messages_vi.js',
            'js_index.js',
            'defaultController.js'
        );
        $render->renderJS('default', $arrFileJS);
        ?>
        <link href="<?php echo URL_BASE ?>/favicon.ico" rel="shortcut icon" />
        <!--ThaiNV: Set root url-->
        <script type="text/javascript">
            var BASE_URL = '<?PHP echo URL_BASE ?>';
        </script>
    </head>
    <body>
        <div id="wrap">
            <div class="header">
                <div class="logo"><a href="<?php echo URL_BASE ?>"><img src="<?php echo URL_BASE ?>/templates/default/images/logo.gif" alt="" border="0"/></a></div>
                <div id="menu">
                    <?php include_once 'menu.php' ?>
                </div>
                <div class="menuLogin">
                    <?php include_once 'menuLogin.php' ?>
                </div>
            </div>
            <!--end of header-->
            <div class="center_content">
                <div class="left_content">
                    <?php include_once TEMPLATE; ?>
                </div>
                <!--end of left content-->
                <div class="right_content">
                    <div class="cart">
                        <div class="title"><span class="title_icon"><img src="<?php echo URL_BASE ?>/templates/default/images/cart.gif" alt=""/></span>My
                            cart
                        </div>
                        <!--ThaiNV: set info of shopping cart-->
                        <div class="home_cart_content">
                            <?php
                            $intIsOk = -1;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $k => $v) {
                                    if (isset($k)) {
                                        $intIsOk = 1;
                                    }
                                }
                            }

                            if ($intIsOk != 1) {
                                echo '0 x items | <span class="red">TOTAL: 0$</span>';
                            } else {
                                $items = $_SESSION['cart'];
                                echo count($items) . ' x items | <span class="red">TOTAL: ' . $_SESSION['totalMoney'] . '$' . '</span>';
                            }
                            ?>
                        </div>
                        <a href="<?php echo URL_BASE . '/shoppingCart' ?>" class="view_cart">view cart</a>
                        <!--END set info of shopping cart-->
                    </div>
                    <div class="right_content_half">
                        <div class="title">
                            <span class="title_icon"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet3.gif" alt=""/></span>
                            Search
                        </div>
                        <div class="clear"></div>
                        <div class="right_content_half_content">
                            Search
                        </div>
                    </div>
                    <div class="right_content_half">
                        <div class="title">
                            <span class="title_icon"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet4.gif" alt=""/></span>
                            Best Sellers
                        </div>
                        <div class="clear"></div>
                        <div class="right_content_half_content">
                            Best Sellers
                            <?php echo $this->test ?>
                        </div>
                    </div>
                    <div class="right_content_half">
                        <div class="title">
                            <span class="title_icon"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet5.gif" alt=""/></span>
                            Promotions
                        </div>
                        <div class="clear"></div>
                        <div class="right_content_half_box">
                            Promotions
                        </div>
                    </div>
                    <div class="right_content_half">
                        <div class="title">
                            <span class="title_icon"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet6.gif" alt=""/></span>
                            Category
                        </div>
                        <div class="clear"></div>
                        <div class="right_content_half_box">
                            <?php
                            include_once 'listCategory.php';
                            ?>  
                        </div>
                    </div>

                    <div class="clear"></div>
                    <div>
                        <div class="title">
                            <span class="title_icon"><img src="<?php echo URL_BASE ?>/templates/default/images/news.png" alt=""/></span>
                            News
                        </div>
                        <div class="clear"></div>
                        <div class="right_content_half_box">
                            Hot new
                        </div>
                    </div>
                    <div class="">
                        <div class="title">
                            <span class="title_icon"><img src="<?php echo URL_BASE ?>/templates/default/images/Online support.png" alt=""/></span>
                            Online support
                        </div>
                        <div class="clear"></div>
                        <div class="right_content_half_box">
                            Online support
                        </div>
                    </div>
                    <!--end of Search-->
                    <!--end of cart-->
                </div>
                <!--end of right content-->
                <div class="clear"></div>
                <div class=""></div>
            </div>
            <!--end of center content-->
            <div class="footer">
                <div class="left_footer"><img src="<?php echo URL_BASE ?>/templates/default/images/footer_logo.gif" alt=""/></div>
                <div class="right_footer">
                    <a href="<?php echo URL_BASE ?>/index">home</a>
                    <a href="<?php echo URL_BASE ?>/about">about us</a>
                    <a href="#">services</a>
                    <a href="#">contact us</a>
                </div>
                <div class="clear"></div>
                <div class="copy_right">&#169;Copyright, Development by trainee SmartOSC&#174; </div>
            </div>
            <!--end of footer-->
        </div>
        <!--end of warp-->
    </body>
</html>