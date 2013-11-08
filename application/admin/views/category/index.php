<div>    
    <h2>CATEGORIES</h2> 
    <p><a href="<?php echo URL_BASE?>/admin/category/getCreate">New Category</a></p>
                 
	<table>
    <thead>
      <tr>
			  <th>ID</th>
        <th>Name </th>
        <th>Action</th>
      </tr>
    </thead><tbody>
      <?php
      foreach($this->categories as $key =>$cat){
      ?>      
      <tr>
        <td> <strong><?php echo $cat->getCatId(); ?></strong> </td>
        <td> <strong><?php echo $cat->getName(); ?></strong> </td>
        <td><a href="<?php echo URL_BASE?>/admin/category/getEdit?id=<?php echo $cat->getCatId(); ?>">Edit</a>
            <a href="<?php echo URL_BASE?>/admin/category/postDelete?id=<?php echo $cat->getCatId(); ?>" onclick="confirm('Delete?');">Delete</a>
        </td>
      </tr>
      <?php
        $model = new Admin_Models_tblCategories();
        $child_cats = $model->getCatByParentId($cat->getCatId());
        foreach($child_cats as $key =>$child_cat){
      ?>
      <tr>
        <td> <?php echo $child_cat->getCatId(); ?> </td>
        <td> <?php echo $child_cat->getName(); ?> </td>
        <td><a href="<?php echo URL_BASE?>/admin/category/getEdit?id=<?php echo $child_cat->getCatId(); ?>">Edit</a>
            <a href="<?php echo URL_BASE?>/admin/category/postDelete?id=<?php echo $child_cat->getCatId(); ?>">Delete</a>
        </td>
      </tr>      
      <?php
        }
      }  
      ?>			
	</tbody></table>
</div><br/><br/>
