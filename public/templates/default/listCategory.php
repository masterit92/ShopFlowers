
    <?php
    $model= new Admin_Models_tblCategories();
        foreach($model->getParentCat() as $key =>$cat){
    ?>
        <b><?php echo $cat->getName().'<br/>'; ?></b>
    <?php
        $child_cats = $model->getCatByParentId($cat->getCatId());
        foreach($child_cats as $key =>$child_cat){
    ?>
        <img src="<?php echo URL_BASE?>/templates/default/images/flowers.png" width="16" height="16"/>
        <a href="#?cat_id=<?php echo $child_cat->getCatId(); ?>"><?php echo $child_cat->getName().'<br/>'; ?></a>
    <?php
        }
      }  
    ?>