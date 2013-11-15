<?php

$model_pro = new Default_Models_tblProducts();
$list_pro = $model_pro->getProBestSellers();
foreach ($list_pro as $pro_ByID) {
?>
    <div class="best">
        <a href="<?php echo URL_BASE . '/products/detailPro?pro_id=' . $pro_ByID->getProId() ?>">
            <img src="<?php echo URL_BASE . '/' . $pro_ByID->getThumb() ?>" alt="No Image" width="100" height="100"/><br/>
        <?php echo $pro_ByID->getName(); ?>
    </a>
</div>
<?php } ?>