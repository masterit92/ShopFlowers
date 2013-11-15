
<?php
$pro = new Default_Models_tblProducts();
$sale_model = new Models_tblSales();
$sale = $sale_model->getSaleByProID($_GET['pro_id']);
$pro = $this->proByID;
?>
<div class="pro_box">
    <div class="title">
        <span class="pro_box_title"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet2.gif"/> <?php echo $pro->getName(); ?></span>
    </div>
    <div class="clear"></div>
    <div class="pro_box_img_detail">
        <img  src='<?php echo URL_BASE ?>/<?php echo $pro->getThumb() ?>' width="100" height="100"/>
    </div>
    <div class="pro_box_content_detail">
        <div class='detail'>
            <span class='detail_title'>Detail:</span> <?php echo $pro->getDescription(); ?><br/>
            <span class='detail_title'>Price: </span> $<?php echo $pro->getPrice(); ?><br/>
            <?php if ($sale != NULL) {
                ?>
                <span class='detail_title'>Date: </span><b><?php echo $sale->getDateStart(); ?></b>  To <b><?php echo $sale->getDateEnd(); ?></b><br/>
                <span class='detail_title'>Content:</span> <?php echo $sale->getContent(); ?>
                <span class='detail_title'>Sale:</span> <b><?php echo $sale->getPercentDecrease() ?>%</b><br/>
                <span class='detail_title'>Price Sale:</span> <b>$<s><?php echo $pro->getPrice() ?></s></b> --> <b>$<?php echo ($pro->getPrice() * ($sale->getPercentDecrease() / 100)); ?></b>
                <?php
            }
            ?>

        </div>
        <?php if ($pro->getStatus() == 1) {
            ?>
            <div class='detail_order'>
                <!--ThaiNV: add product to cart-->
                <div class="addProToCart">
                    <a onclick="DefaultController.addToCart(<?php echo $_GET['pro_id'] ?>);"><img src="<?php echo URL_BASE . '/templates/default/images/order_now.gif'; ?>"/></a>
                </div>
                <!--end add product to cart-->
            </div>
        <?php } else { ?>
            <div class='detail_order'>
                <b style="color: red">Sold Out</b>
            </div>
        <?php } ?>

    </div>
    <div class="clear"></div>
    <?php
    $img = new Models_tblImages();
    $listImgByPro = $img->getAllImageByIDPro($pro->getProId());
    if (count($listImgByPro) > 0) {
        ?>
        <div class="detail_img">
            <?php
            foreach ($listImgByPro as $key => $img) {
                ?>

                <img class="zoom_01" src="<?php echo URL_BASE ?>/<?php echo $img->getUrl() ?>" data-zoom-image="<?php echo URL_BASE ?>/<?php echo $img->getUrl() ?>" width="100" height="100"/>


            <?php } ?>
        </div>

        <?php
    }
    ?>
</div>
<div class="clear"></div>
<!-- comment-->
<div id="fb-root">
    <div class="fb-comments" data-href="<?php echo URL_BASE ?>/detailPro?pro_id=<?php echo $pro->getProId(); ?>" data-numposts="5" data-width="450"></div>
</div>
<script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>

<div class="clear"></div>
<!--Products -->
<?php
$proR = new Default_Models_tblProducts();
$listProR = $proR->getProRelated($pro->getCatId(), $pro->getPrice(), $pro->getProId());
if (count($listProR) > 0) {
    ?>
    <div class="pro_box">
        <div class="title">
            <span class="pro_box_title"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet4.gif"/> Related Flowers</span>
        </div>
        <div class="clear"></div>
        <?php
        foreach ($listProR as $key => $proR) {
            ?>
            <div class="div_pro_list">
                <div class="pro_item">
                    <a href="<?php echo URL_BASE . '/products/detailPro' ?>?pro_id=<?php echo $proR->getProId(); ?>">
                        <img src="<?php echo URL_BASE ?>/<?php echo $proR->getThumb() ?>" title="<?php echo $proR->getName(); ?>" alt="No Image" width="100" height="100"/>
                        <?php echo $proR->getName(); ?>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php
}
?>
