<?php
$array = $this->listAbout;
?>
<html>
    <h3>About Us</h3>
    <table border ="1">
        <thead>
            <tr>
                <td colspan="8">
                    <a href="<?php echo URL_BASE ?>/admin/about/loadForm?id=0" class="add">Insert</a>
                    <span>
                        <input type="text" name="txtKey_word" id="txtKey_word" value="<?php echo $this->keyword ?>"/>
                        <input type="submit" value="Search" />
                        <input type="button" value="Reset" onclick="document.getElementById('txtKey_word').value = null;"/>
                    </span>
                </td>
            </tr>
            
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Content</th>
                <th width="120">Action</th>
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
                        <a class="view" href="#">View</a>
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
