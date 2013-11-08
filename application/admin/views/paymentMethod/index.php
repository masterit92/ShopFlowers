<?php
$array = $this->listpay;
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>/templates/admin/css/layout.css"/>
    </head>
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
                <th>Action</th>
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
                    <td><?php echo $value['pay_img'] ?></td>
                    <td><?php echo $value['pay_content'] ?></td>
                    <td class="action">
                        <a class="view" href="#">View</a>
                        <a class="edit" href="<?php echo URL_BASE ?>/admin/paymentMethod/loadForm?id=<?php echo $value['pay_id']; ?>">Edit</a>
                        <a class="delete" href="<?php echo URL_BASE ?>/admin/paymentMethod/deletePayment?id=<?php echo $value['pay_id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</html>
