<?php
$sale = new Models_tblSales();
$pro= new Default_Models_tblProducts();
$listSale = $sale->getAllSale();
$i = 0;
foreach ($listSale as $sale) {
    $proByID= $pro->getProByID($sale->getProId());
?>
<div class="div_pro_list">
    <div class="pro_item">
        <a href="<?php echo URL_BASE.'/products/detailPro?pro_id='.$sale->getProId()?>">
            <img src="<?php echo URL_BASE . '/' . $proByID->getThumb() ?>" alt="No Image" width="85" height="80"/>
        <?php echo $proByID->getName();?> <b>&dArr;<?php echo $sale->getPercentDecrease()?>%</b>
        </a>
    </div>
</div>
<div class="clear"></div>
<?php
    $i++;
    if ($i > 5) {
        break;
    }
}
?>