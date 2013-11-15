<?php
$array = $this->listCon;
?>
    <h3>Contact</h3>
    <table border ="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Content</th>
                <th>Post Date</th>
                <th width="100">Action</th>
            </tr>
        <tbody>
            <?php
            $nbr = 0;
            foreach ($array as $value) {
                $nbr++;
                ?>
                <tr>
                    <td><?php echo $nbr; ?></td>
                    <td><?php echo $value['full_name']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td><?php echo $value['content']; ?></td>
                    <td><?php echo $value['post_date']; ?></td>
                    <td class="action">
                        <a class="delete" href="<?php echo URL_BASE ?>/admin/contact/deleteCon?id=<?php echo $value['con_id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </thead>
</table>
