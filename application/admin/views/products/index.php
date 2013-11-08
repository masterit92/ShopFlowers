<?php
$page = new Libs_splitPage($this->listAllPro, 10);
?>
<h3>List All Products</h3>
<table cellpadding="0" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" onclick="BaseController.checkAll();"/>
            </th>
            <th>ID</th>
            <th>Name</th>
            <th>Thumb</th>
            <th>Price</th>
            <th>Post Date</th>
            <th>Status</th>
            <th>Album Images</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $pro = new Default_Models_tblProducts();
        $dataPage = array();
        if (isset($_GET['page'])) {
            $dataPage = $page->getDataPage($_GET['page']);
        } else {
            $dataPage = $page->getDataPage(1);
        }
        foreach ($dataPage as $key => $pro) {
            $i++;
            ?>
        <tr>
                <td><input type="checkbox" name="checkOne[]" value="<?php echo $pro->getProId() ?>"/></td>
                <td><?php echo $pro->getProId(); ?></td>
                <td><?php echo $pro->getName(); ?></td>
                <td><img src="<?php echo URL_BASE . '/' . $pro->getThumb(); ?>" width="100" height="100" title="<?php echo $pro->getDescription(); ?>"/></td>
                <td><?php echo '$' . $pro->getPrice(); ?></td>
                <td><?php echo $pro->getPostDate(); ?></td>
                <td><?php echo $pro->getStatus(); ?></td>
                <td>
                    <a href="<?php echo URL_BASE ?>/admin/products/imgByProID?pro_id=<?php echo $pro->getProId(); ?>">View</a>
                </td>
                <td>
                    <a href="<?php echo URL_BASE ?>/admin/products/formData?pro_id=<?php echo $pro->getProId() ?>">Edit</a> | 
                    <a href="#?pro_id=<?php echo $pro->getProId() ?>" onclick="confirm('Delete?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
$url = URL_BASE . '/admin/products/index';
echo $page->viewNumPage($url);
?>
