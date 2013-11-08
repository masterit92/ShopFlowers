    <?php
    $model= new Admin_Models_tblCategories();

        foreach($model->getParentCat() as $key =>$cat){
    ?>
        <b><?php echo $cat->getName().'<br/>'; ?></b>
    <?php
        $child_cats = $model->getCatByParentId($cat->getCatId());
        foreach($child_cats as $key =>$child_cat){
    ?>
        <a href="#?cat_id=<?php echo $child_cat->getCatId(); ?>"><?php echo $child_cat->getName().'<br/>'; ?></a>
    <?php
        }
      }  
    ?>