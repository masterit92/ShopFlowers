<!--Product Promotions -->
<div class="pro_box">
    <div class="title">
        <span class="pro_box_title"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet2.gif"/> Flower Promotions</span>
    </div>
    <div class="clear"></div>
    <div class="pro_box_img">
        <img src="" alt="No Image" width="120" height="120"/>
    </div>
    <div class="pro_box_content">Flower Bouquet Vincent with vase & secco Sunflowers and roses a colourful composition. Unique bouquet with 3 orange roses, 3 sunflowers and plenty of greens. Diameter about 30 cm. With a package of flower nutrients and nursing instructions. Included: Free vase and a secco 0,2l </div>
</div>
<div class="clear"></div>
<div class="pro_box">
    <div class="pro_box_img">
        <img src="" alt="No Image" width="120" height="120"/>
    </div>
    <div class="pro_box_content">Your Christmas tree: 1 Picea conica 30-40 cm, 1 red ribbon, 4 bundles of cinnamon. The tree is delivered in a pot (aprox. 50 cm) and red bag.</div>
</div>
<div class="clear"></div>

<!--Product News-->
<div class="pro_box">
    <div class="title">
        <span class="pro_box_title"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet1.gif"/> Flower News</span>
    </div>
    <div class="clear"></div>
    <?php
    $pro = new Default_Models_tblProducts();
    foreach ($this->listProNew as $key => $pro) {
        ?>
        <div class="div_pro_list">
            <div class="pro_item">
                <a href="<?php echo URL_BASE.'/products/detailPro' ?>?pro_id=<?php echo $pro->getProId(); ?>">
                    <img src="<?php echo URL_BASE ?>/<?php echo $pro->getThumb() ?>" title="<?php echo $pro->getName();?>" alt="No Image" width="90" height="90"/>
                    <?php echo $pro->getName(); ?>
                </a>
            </div>
        </div>
    <?php } ?>
</div>

