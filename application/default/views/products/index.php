<!--Products -->
<?php
$page = new Libs_splitPage($this->listAllPro, 9);
if(!empty($this->listAllPro)){
?>
<div class="pro_box">
    <div class="title">
        <span class="pro_box_title"><img src="<?php echo URL_BASE ?>/templates/default/images/bullet1.gif"/> Flowers</span>
    </div>
    <div class="clear"></div>
    <?php
    $pro = new Default_Models_tblProducts();
    $dataPage = array();
    if (isset($_GET['page'])) {
        $dataPage = $page->getDataPage($_GET['page']);
    } else {
        $dataPage = $page->getDataPage(1);
    }
    $i=0;
    foreach ($dataPage as $key => $pro) {
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
    if($i===3){
        $i=0;
        ?>
    <div class="clear"></div>
            <?php
        
    }
    } ?>
    <div class="clear"></div>
    <?php
    if ($page->numPage() > 1) {
        $url = URL_BASE . '/products/index';
        echo $page->viewNumPage($url);
    }
    ?>
</div>
<?php }else{
    echo "<b>No data!</b>";
}
?>