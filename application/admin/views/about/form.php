<script type="text/javascript" src="<?php echo URL_BASE . '/templates/admin/style/ckeditor/ckeditor.js' ?>"></script>
<fieldset>
    <h3><a href="<?php echo URL_BASE ?>/admin/about/index">Back</a></h3>
    <?php
    if ($this->listAbout == NULL) {
        ?>
        <h3>Form Insert About</h3>
        <form action="<?php echo URL_BASE ?>/admin/about/insertAboutAction" method="post">
            <p>
                <label>Title</label>
                <input type="text" class="text-long" name="title">
            </p>
            <p>
                <label>Content</label>
                <textarea rows="1" cols="1" name="content" id="about-content"></textarea>
                <script type="text/javascript">CKEDITOR.replace('about-content');</script>
            </p>
            <input type="submit" value="Insert">
            <input type="reset" value="Reset">
        </form>   
        <?php
    } else {
        foreach ($this->listAbout as $value) {
            ?>
            <h3>Form Edit About</h3>
            <form action="<?php echo URL_BASE ?>/admin/about/editAboutAction" method="post">
                <p><input type="hidden" value="<?php echo $value['about_id']; ?>" name="about_id"></p>
                <p>
                    <label>Title</label>
                    <input type="text" class="text-long" name="title" value="<?php echo $value['title']; ?>">
                </p>
                <p>
                    <label>Content</label>
                    <textarea rows="1" cols="1" name="content" id="about-content"><?php echo $value['content']; ?></textarea>
                    <script type="text/javascript">CKEDITOR.replace('about-content');</script>
                </p>
                <input type="submit" value="Update">
                <input type="reset" value="Reset">
            </form>  
            <?php
        }
    }
    ?>
</fieldset>