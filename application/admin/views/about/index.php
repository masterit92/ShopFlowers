<?php
$array = $this->listAbout;
?>
<html>
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE?>"/>
    <h3>About Us</h3>
    <table border ="1">
        <thead>
            <tr>
                <td colspan="4">
                    <a href="<?php echo URL_BASE ?>/admin/about/loadForm?id=0" class="add">Insert</a>
                </td>
            </tr>
            
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Content</th>
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
                    <td><?php echo $value['title']; ?></td>
                    <td><?php echo $value['content']; ?></td>
                    <td class="action">
                        <a class="edit" href="<?php echo URL_BASE ?>/admin/about/loadForm?id=<?php echo $value['about_id']; ?>">Edit</a>
                        <a class="delete" href="<?php echo URL_BASE ?>/admin/about/deleteAbout?id=<?php echo $value['about_id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </thead>
</table>
</html>
