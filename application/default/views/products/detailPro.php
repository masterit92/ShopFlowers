<?php
$pro = new Default_Models_tblProducts();
$pro = $this->proByID;
;
?>
<div class="pro_box">
    <div class="title">
        <span class="pro_box_title"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet2.gif"/> <?php echo $pro->getName(); ?></span>
    </div>
    <div class="clear"></div>
    <div class="pro_box_img_detail">
        <img src="<?php echo URL_BASE ?>/<?php echo $pro->getThumb() ?>" alt="No Image" width="130" height="130"/>
    </div>
    <div class="pro_box_content_detail">
        <div class='detail'>
            <span class='detail_title'>Detail:</span> <?php echo $pro->getDescription(); ?><br/>
            <span class='detail_title'>Price: </span> $<?php echo $pro->getPrice(); ?><br/>
        </div>
        <?php if ($pro->getStatus() == 1) { ?>
            <div class='detail_order'>
                <a href="#">
                    <img src="<?php echo URL_BASE ?>/templates/default/images/order_now.gif"/>
                </a>
            </div>
        <?php } ?>
        <!--ThaiNV: add product to cart-->
        <div class="addProToCart">
            <a onclick="DefaultController.addToCart(<?php echo $_GET['pro_id'] ?>);"><img src="<?php echo URL_BASE . '/templates/default/images/order_now.gif'; ?>"/></a>
        </div>
        <!--end add product to cart-->
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
                <img src="<?php echo URL_BASE ?>/<?php echo $img->getUrl() ?>" width="110" height="120" alt="No Image"/>
            <?php }
            ?>
        </div>

        <?php
    }
    ?>
</div>
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
                        <img src="<?php echo URL_BASE ?>/<?php echo $proR->getThumb() ?>" title="<?php echo $proR->getName(); ?>" alt="No Image" width="90" height="90"/>
                        <?php echo $proR->getName(); ?>
                    </a>
                </div>
            </div>
            <?php }
        ?>
    </div>
    <?php
}
?>
