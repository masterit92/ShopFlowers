<script type="text/javascript">
    $().ready(function() {
        $("#frmData").validate({
        });
    });
</script>
<style>
    .error {
        color: red;
    }
</style>
<h3>
    <?php if(isset($_GET['pro_id'])){?>
    Edit Product
    <?php }else{?>
    Add Product
    <?php }?>
</h3>
<fieldset>
    <form name="frmData" id="frmData" action="<?php echo URL_BASE.'/admin/products/saveData' ?>" method="POST" enctype="multipart/form-data">
        <?php
        if (isset($_GET['pro_id'])) {
           $pro=$this->pro;
            ?>
            <input type="hidden" name="txtProID" value="<?php echo $_GET['pro_id']?>"/>
            <?php
        }
        ?>
        <p>
            <label>Name:</label>
            <input type="text" placeholder="Name..." class="text-long required" name="txtName" value="<?php if (isset($_GET['pro_id'])) echo $pro->getName(); ?>"/>
        </p>
        <p>
            <label>Thumb:</label>
            <?php if (isset($_GET['pro_id'])) { ?>
                <img src="<?php echo URL_BASE . '/' . $pro->getThumb() ?>" width="100" height="100" alt="No Image"/>
            <?php } ?>
            <input type="file" name="thumb[]"/>
        </p>
        <p>
            <label>Category ID:</label>
            <select name="catID">
                <?php
                $model = new Admin_Models_tblCategories();
                foreach ($model->getParentCat() as $key => $cat) {
                    ?>
                <option value="<?php echo $cat->getParentId();?>"><?php echo $cat->getName(); ?></option>
                    <?php
                    $child_cats = $model->getCatByParentId($cat->getCatId());
                    foreach ($child_cats as $key => $child_cat) {
                        ?>
                <option value="<?php echo $child_cat->getCatId(); ?>" <?php if (isset($_GET['pro_id'])){if($pro->getCatId()==$child_cat->getCatId()) echo 'selected';}?>>
                            ---<?php echo $child_cat->getName() ?>
                        </option>
                        <?php
                    }
                }
                ?>
            </select>
        </p>
        <p>
            <label>Description:</label>
            <textarea rows="10" placeholder="Description..." cols="10" name="txtDes" class="required"><?php if (isset($_GET['pro_id'])) echo $pro->getDescription(); ?></textarea>
        </p>
        <p>
            <label>Price $</label>
            <input type="text" placeholder="Price..." class="text-long required" name="txtPrice" value="<?php if (isset($_GET['pro_id'])) echo $pro->getPrice(); ?>"/>
        </p>
        <p>
            <label>Status</label>
            <select name="status">
                <option value="1" <?php if (isset($_GET['pro_id'])){if($pro->getStatus()==1) echo 'selected';}?>>Còn hàng</option>
                <option value="0"<?php if (isset($_GET['pro_id'])){if($pro->getStatus()==0) echo 'selected';}?>>Hết Hàng</option>
            </select>
        </p>
        <input type="submit" value="Submit" name="submit"/>
    </form>
</fieldset>


