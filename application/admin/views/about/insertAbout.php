<script type="text/javascript" src="<?php echo URL_BASE . '/templates/admin/style/ckeditor/ckeditor.js' ?>"></script>
<html>
    <h3> Form Insert About</h3>
    <fieldset>
        <form action="<?php echo URL_BASE ?>/admin/about/insertAboutAction" method="post">
            <p>
                <label>Title</label>
                <input type="text" class="text-long">
            </p>
            <p>
                <label>Content</label>
                <textarea rows="1" cols="1" name="txtAbout_content" id="about-content"></textarea>
                <script type="text/javascript">CKEDITOR.replace('about-content');</script>
            </p>
            <input type="submit" value="Insert">
            <input type="reset" value="Reset">
        </form>   
    </fieldset>
</html>