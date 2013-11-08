<div class="span9 crud">
	<h2><?php echo ( $this->create ? 'New Category' : 'Edit Category' )?> </h2>
        <form action="<?php echo URL_BASE?>/admin/category/<?php echo ( $this->create ? 'postCreate' : 'postEdit' )?>" method="POST" class="form-horizontal">                    
	<input type="hidden" name="catId" value="<?php echo ( $this->create ? '' : $this->categories->getCatId() )?>" />
    <fieldset><legend>Basic Information</legend>

    <div class="control-group">			
        <label class="control-label" for="name">Category Name</label>              
		<div class="controls">
            <input type="text" id="name" name="name" value="<?php echo ( $this->create ? '' : $this->categories->getName() ); ?>" placeholder="Category Name...">
		</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="parentId">Parent Category</label>             
      	<div class="controls">         
			<select name="parentId" id="parentId">
				<option value="0">Nhóm mới</option>
                <?php
                    foreach($this->parents as $key =>$parent){
                ?>                 
				<option value="<?php echo $parent->getCatId() ?>"
                <?php if($this->id === $parent->getCatId()){
                    echo 'selected';
                }?>
                ><?php echo $parent->getName() ?></option>
                <?php
                    }
                ?>                
			</select>             
		</div>
    </div>

    </fieldset>
    <div class="form-actions">
        <a href="<?php echo URL_BASE?>/admin/category" class="btn">Back</a>
        <input type="submit" value="<?php echo ( $this->create ? 'New Category' : 'Save' )?>" class="btn btn-primary">
    </div>
       </form>   
</div>