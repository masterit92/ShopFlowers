<?php
$array = $this->listpay;
?>
<h3>Payment Methods</h3>
<table border="1">
    <thead
        <tr>
            <td colspan="5"><a href="<?php echo URL_BASE ?>/admin/paymentMethod/loadForm?id=0" class="add">Insert</a></td>
        </tr>
        <tr>
            <th>No.</th>
            <th>Pay Name</th>
            <th>Pay Image</th>
            <th>Pay Content</th>
            <th width="100">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        $nbr = 0;
        foreach ($array as $value) {
            $nbr++
            ?>
            <tr>
                <td><?php echo $nbr; ?></td>
                <td><?php echo $value['pay_name']; ?></td>
                <td><img src="<?php echo URL_BASE ?>/templates/admin/images/<?php echo $value['pay_img'] ?>" width="100px"/></td>
                <td><?php echo $value['pay_content'] ?></td>
                <td class="action">
                    <a class="edit" href="<?php echo URL_BASE ?>/admin/paymentMethod/loadForm?id=<?php echo $value['pay_id']; ?>">Edit</a>
                    <a class="delete" href="<?php echo URL_BASE ?>/admin/paymentMethod/deletePayment?id=<?php echo $value['pay_id']; ?>">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
