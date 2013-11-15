<script type="text/javascript">
    $().ready(function() {

        $("#btnSearch").click(function() {
            var txtSearch = $("#txtSearch").val();
            if (txtSearch != '') {
                var url = '<?php echo URL_BASE . '/admin/products?search='; ?>' + txtSearch;
                $("#main").load(url);
            }
        });
    });
</script>
<style>
    .error {
        color: red;
    }
</style>
<?php
$page = new Libs_splitPage($this->listAllPro, 10);
?>
<h3>List All Products</h3>
<b><a href="<?php echo URL_BASE ?>/admin/products/formData">Insert</a> ---
    <a href="#"  onclick="BaseController.deleteMultiRecord('products', 'delListPro');">Delete All</a></b>
<table cellpadding="5" cellspacing="0" border="1">
    <thead>
        <tr>
            <td colspan="10">
                Search: <input type="text" name="txtSearch" placeholder="Search..." id="txtSearch" class="required"/>
                <input type="button" value="Search" id="btnSearch"/>
            </td>
        </tr>
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
            <th>Sale</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $pro = new Admin_Models_tblProduct();
        $dataPage = array();
        if (isset($_GET['page'])) {
            $dataPage = $page->getDataPage($_GET['page']);
        } else {
            $dataPage = $page->getDataPage(1);
        }

        if (empty($dataPage)) {
            echo '<tr><td colspan="9">No data!</td></tr>';
        } else {
            foreach ($dataPage as $key => $pro) {
                ?>
                <tr>
                    <td><input type="checkbox" name="checkOne[]" value="<?php echo $pro->getProId() ?>"/></td>
                    <td><?php echo $pro->getProId(); ?></td>
                    <td><?php echo $pro->getName(); ?></td>
                    <td><img src="<?php echo URL_BASE . '/' . $pro->getThumb(); ?>" width="100" height="100" alt="No Img" title="<?php echo $pro->getDescription(); ?>"/></td>
                    <td><?php echo '$' . $pro->getPrice(); ?></td>
                    <td><?php echo $pro->getPostDate(); ?></td>
                    <td><?php
                        if ($pro->getStatus() == 1)
                            echo 'Còn hàng';
                        else
                            echo 'Hết Hàng';
                        ?></td>
                    <td>
                        <a href="<?php echo URL_BASE ?>/admin/products/imgByProID?pro_id=<?php echo $pro->getProId(); ?>">View</a>
                    </td>
                    <td>
                        <a href="<?php echo URL_BASE.'/admin/sale?pro_id='.$pro->getProId();?>">View</a>
                    </td>
                    <td>
                        <a href="<?php echo URL_BASE ?>/admin/products/formData?pro_id=<?php echo $pro->getProId() ?>&page=<?php echo $_GET['page'] ?>">Edit</a>
                        <a href="<?php echo URL_BASE ?>/admin/products/delete?pro_id=<?php echo $pro->getProId() ?>&page=<?php echo $_GET['page'] ?>" onclick="return confirm('Delete?');">Delete</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<?php
if ($page->numPage() > 1) {
    $url = URL_BASE . '/admin/products/index';
    echo $page->viewNumPage($url);
}
?>
