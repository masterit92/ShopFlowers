<!--Product Promotions -->
<?php
$sale = new Models_tblSales();
$pro = new Default_Models_tblProducts();
if (count($this->listSale) > 0) {
    ?>
    <div class="pro_box">
        <div class="title">
            <span class="pro_box_title"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet2.gif"/> Flower Promotions</span>
        </div>
        <div class="clear"></div>
        <?php
        foreach ($this->listSale as $sale) {
            $proByID = $pro->getProByID($sale->getProId());
            ?>
            <div class="pro_box_img">
                <img src="<?php echo URL_BASE . '/' . $proByID->getThumb() ?>" alt="No Image" width="120" height="120"/>
            </div>
            <div class="pro_box_content">
                <div class="pro_box_content_sale">
                    <span class='detail_title'>Product:</span> <b><?php echo $proByID->getName(); ?>.</b><br/>
                    <span class='detail_title'>Date: </span><b><?php echo $sale->getDateStart(); ?></b>  To <b><?php echo $sale->getDateEnd(); ?></b><br/>
                    <span class='detail_title'>Content:</span> <?php echo $sale->getContent(); ?>
                    <span class='detail_title'>Sale:</span> <b><?php echo $sale->getPercentDecrease() ?>%</b><br/>
                    <span class='detail_title'>Price:</span> <b>$<s><?php echo $proByID->getPrice() ?></s></b> --> <b>$<?php echo ($proByID->getPrice() * ($sale->getPercentDecrease() / 100)); ?></b>
                </div>
                <div class='detail_order'>
                    <a href="<?php echo URL_BASE . '/products/detailPro?pro_id=' . $sale->getProId(); ?>">Click here view product</a>
                </div>
            </div>

        <?php }
        ?>
    </div>
    <div class="clear"></div><?php
}
?>


<!--Product News-->
<div class="pro_box">
    <div class="title">
        <span class="pro_box_title"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet1.gif"/> Flower News</span>
    </div>
    <div class="clear"></div>
    <?php
    $pro = new Default_Models_tblProducts();
    $i=0;
    foreach ($this->listProNew as $pro) {
        $i++;
        ?>
        <div class="div_pro_list">
            <div class="pro_item">
                <a href="<?php echo URL_BASE . '/products/detailPro' ?>?pro_id=<?php echo $pro->getProId(); ?>">
                    <img src="<?php echo URL_BASE ?>/<?php echo $pro->getThumb() ?>" title="<?php echo $pro->getName(); ?>" alt="No Image" width="110" height="100"/>
                    <?php echo $pro->getName(); ?>
                </a>
            </div>
        </div>
        <?php
        if ($i === 3) {
            $i = 0;
            ?>
            <div class="clear"></div>
            <?php
        }
    }
    ?>
</div>

