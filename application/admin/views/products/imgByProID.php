<h3>List Album Images</h3>
<input type="button" value="Back" onclick="javascript:history.go(-1)"/>
<?php
$img = new Admin_Models_tblImages();
?> 

<b>
    <a href="<?php echo URL_BASE ?>/admin/products/imgByProID?pro_id=<?php echo $_GET['pro_id'] ?>&&action=insert">Insert</a> --
    <<a href="#"  onclick="BaseController.deleteMultiRecord('products', 'delListImg?pro_id=<?php echo $_GET['pro_id']?>');">Delete All</a></b>
</b>
<br/>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'insert') {
    ?>
    <form name="frmData" id="frmData" action="<?php echo URL_BASE ?>/admin/products/saveImg?pro_id=<?php echo $_GET['pro_id'] ?>&&action=insert" method="POST" enctype="multipart/form-data">
        Chooser Image:<input type="file" name="img[]" multiple/> <br/><input type="submit" value="Insert"/>
    </form>
    <?php
}
?>
<?php if ($this->listImg != null) { ?>
    <div>

        <table border='1' cellpadding="5" cellspacing="0" >
            <tr>
                <th>
                    <input type="checkbox" value="" id="checkAll" onclick="BaseController.checkAll();"/>
                </th>
                <th>Id Images</th>
                <th>Id Product</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($this->listImg as $key => $img) {
                ?>
                <tr>
                    <td>
                        <input type="checkbox" name="checkOne[]" value="<?php echo $img->getImgId() ?>"/>
                    </td>
                    <td><?php echo $img->getImgId(); ?></td>
                    <td><?php echo $img->getProId(); ?></td>
                    <td>
                        <img src="<?php echo URL_BASE . '/' . $img->getUrl(); ?>" width="100" height="100"/><br/>
                        <?php
                        if (isset($_GET['action']) && $_GET['action'] == 'edit'&& isset($_GET['img_id'])&& $_GET['img_id']==$img->getImgId()) {
                            ?>
                            <form name="frmData" id="frmData" action="<?php echo URL_BASE ?>/admin/products/saveImg?pro_id=<?php echo $_GET['pro_id'] ?>&&action=edit&&img_id=<?php echo $img->getImgId() ?>" method="POST" enctype="multipart/form-data">
                                Chooser Image:<input type="file" name="img[]" /> <br/><input type="submit" value="Edit"/>
                            </form>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="<?php echo URL_BASE ?>/admin/products/imgByProID?pro_id=<?php echo $_GET['pro_id'] ?>&&action=edit&&img_id=<?php echo $img->getImgId() ?>">Edit</a> | 
                        <a href="<?php echo URL_BASE ?>/admin/products/deleteImg?pro_id=<?php echo $_GET['pro_id'] ?>&&img_id=<?php echo $img->getImgId() ?>" onclick="return confirm('Delete?');">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "Product no image.";
        }
        ?>
    </table>
</div>

