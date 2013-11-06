<?php
$array = $this->listAbout;
?>


<html>
    <h3> Form Edit About</h3>

    <form action="<?php echo URL_BASE ?>/admin/about/editAboutAction" method="post">
        <fieldset>
            <legend>Insert About</legend>
            <?php
            foreach ($array as $value) {
                ?>
                <label>Title</label>
                <input type="text" value="<?php echo $value['title']; ?>">
                <label>Content</label>
                <textarea></textarea>
                <?php
            }
            ?>
            <input type="submit" class="btn btn-primary" value="Update">
            <input type="reset" class="btn" value="Reset">
        </fieldset>
    </form>   
</html>