<?php
$array = $this->listPay;
?>
<?php
$array = $this->listAbout;
?>
<html>
    <h2>About Us</h2>
    <table border ="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th width="100">Action</th>
            </tr>
        <tbody>
            <?php
            foreach ($array as $value) {
                ?>
                <tr>
                    <td class="center"><?php echo $value['pay_id']; ?></td>
                    <td><?php echo $value['pay_name']; ?></td>
                    <td><?php echo $value['pay_img']; ?></td>
                    <td><?php echo $value['pay_content']; ?></td>
                    <td class="center">
                        <a>View</a>
                        <a class="btn btn-info" href="#">
                            <i class="icon-edit icon-white"></i>  
                            Edit                                            
                        </a>
                        <a class="btn btn-danger" href="#">
                            <i class="icon-trash icon-white"></i> 
                            Delete
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </thead>
</table>
</html>