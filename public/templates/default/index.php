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
        $arrFileCSS = array(
            'style.css', 
            'style_menuLogin.css', 
            'content_css.css', 
            'jquery-ui-1.10.3.custom.css');
        $render->renderCSS('default', $arrFileCSS);
        $arrFileJS = array(
            'jquery-1.10.2.js',
            'jquery.validate.min.js',
            'messages_vi.js',
            'js_index.js',
            'defaultController.js',
            'jquery-1.8.3.min.js',
            'jquery.elevatezoom.js',
            'jquery.js',
            'jquery.validate.js',
            'jquery-ui-1.10.3.custom.js',
        );
        $render->renderJS('default', $arrFileJS);
        ?>
        <link href="<?php echo URL_BASE ?>/favicon.ico" rel="shortcut icon" />

        <script type="text/javascript">
            //ThaiNV: set datepicker for all project:
            $(window).load(function() {
                $(".datepicker").datepicker();
            });
            //ThaiNV: Set root url
            var BASE_URL = '<?PHP echo URL_BASE ?>';
        </script>

        <script>
            $(function() {
                $("#btnSearch").click(function() {
                    var txtSearch = $("#txtSearch").val();
                    if (txtSearch != '') {
                        var txtSearch = txtSearch.replace(' ', '%');
                        var url = "<?php echo URL_BASE . "/products?search="; ?>" + txtSearch;
                        $("#content_left").load(url);
                    }
                });
                $("#priceMin").click(function() {
                    var url = '<?php echo URL_BASE . '/products?order=ASC'; ?>';
                    $("#content_left").load(url);
                });
                $("#priceMax").click(function() {
                    var url = '<?php echo URL_BASE . '/products?order=DESC'; ?>';
                    $("#content_left").load(url);
                });
                $(".cat").click(function() {
                    var catID = $(this).attr('cat_id');
                    var url = '<?php echo URL_BASE . '/products?cat_id='; ?>' + catID;
                    $("#content_left").load(url);
                });

                $("#priceSmarl").click(function() {
                    var txtPrice = $("#txtPrice").val();
                    if (txtPrice != '' && !isNaN(txtPrice)) {
                        //alert(isNumber(txtPrice));
                        var url = '<?php echo URL_BASE . '/products?price='; ?>' + txtPrice + '&action=<';
                        $("#content_left").load(url);
                    }
                });
                $("#priceBig").click(function() {
                    var txtPrice = $("#txtPrice").val();
                    if (txtPrice != '' && !isNaN(txtPrice)) {
                        var url = '<?php echo URL_BASE . '/products?price='; ?>' + txtPrice + '&action=>';
                        $("#content_left").load(url);
                    }
                });

                $(".zoom_01").elevateZoom({zoomWindowPosition: 1, zoomWindowOffetx: 10});
            });
        </script>
    </head>
    <body >
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
                <div class="left_content" id="content_left">
                    <?php include_once TEMPLATE; ?>
                </div>
                <!--end of left content-->
                <div class="right_content">
                    <div class="cart">
                        <div class="title"><span class="title_icon"><img src="<?php echo URL_BASE ?>/templates/default/images/cart.gif" alt=""/></span>My
                            cart
                        </div>
                        <!--ThaiNV START: set info of shopping cart-->
                        <div class="home_cart_content">

                        </div>
                        <a class="view_cart" onclick="DefaultController.showCart()" style="cursor: pointer">View cart</a>
                        <!--ThaiNV END: set info of shopping cart-->
                    </div>
                    <div class="right_content_half">
                        <div class="title">
                            <span class="title_icon"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet3.gif" alt=""/></span>
                            Search
                        </div>
                        <div class="clear"></div>
                        <div class="right_content_half_content" >
                            <div class="contact_form form_search">
                                <div class="form_subtitle">Flower</div>
                                <input type="text" id="txtSearch" placeholder="Search..." size="12" />
                                <input type="button" id="btnSearch" value="Search" />
                            </div>
                             <div class="contact_form form_search">
                                <div class="form_subtitle">Price</div>
                                <input type="radio" name="rdb" id="priceMin"/>Min >> Max
                                <input type="radio" name="rdb" id="priceMax"/>Max >> Min <br/>
                                Order By:<input type="text" id="txtPrice" size="2" /><br/>
                                <input type="radio" name="rdb" id="priceSmarl"/>Smaller<br/>
                                <input type="radio" name="rdb" id="priceBig"/>Larger
                            </div>

                            <div class="clear"></div>
                            
                        </div>
                    </div>
                    <div class="right_content_half">
                        <div class="title">
                            <span class="title_icon"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet4.gif" alt=""/></span>
                            Best Sellers
                        </div>
                        <div class="clear"></div>
                        <div class="right_content_half_content">
                            <?php include_once 'BestSellers.php'; ?>
                        </div>
                    </div>
                    <div class="right_content_half">
                        <div class="title">
                            <span class="title_icon"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet5.gif" alt=""/></span>
                            Promotions
                        </div>
                        <div class="clear"></div>
                        <div class="right_content_half_box">
                            <?php include_once 'list_pro_sasle.php'; ?>
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
                        Quảng cáo ở đây
                        <?php
                        include_once 'listAds.php';
                        ?>
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
