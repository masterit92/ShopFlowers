<script type="text/javascript" src="<?php echo URL_BASE . '/templates/admin/style/ckeditor/ckeditor.js' ?>"></script>
<fieldset>
    <h3><a href="<?php echo URL_BASE ?>/admin/paymentMethod/index">Back</a></h3>
    <?php
    if ($this->listpay == NULL) {
        ?>
        <form action="<?php echo URL_BASE; ?>/admin/paymentMethod/insertPayAction" method="post">
            <p>
                <label>Name</label>
                <input type="text" class="text-long" name="pay_name">
            </p>
            <p>
                <label>Image</label>
                <input type="file" class="text-long" name="pay_img">
            </p>
            <p>
                <label>Content</label>
                <textarea rows="1" cols="1" name="pay_content" id="pay-content"></textarea>
                <script type="text/javascript">CKEDITOR.replace('pay-content');</script>
            </p>
            <input type="submit" value="Insert">
            <input type="reset" value="Reset">
        </form>
        <?php
    } else {
        foreach ($this->listpay as $value) {
            ?>
            <h3>Form Edit Payment Method</h3>
            <form action="<?php echo URL_BASE; ?>/admin/paymentMethod/editPayAction" method="post">
                <p><input type="hidden" name="pay_id" value="<?php echo $value['pay_id']; ?>"></p>
                <p>
                    <label>Name</label>
                    <input type="text" class="text-long" name="pay_name" value="<?php echo $value['pay_name']; ?>">
                </p>
                <p>
                    <label>Image</label>
                    <input type="file" class="text-long" name="pay_img" value="<?php echo $value['pay_img'] ?>">
                </p>
                <p>
                    <label>Content</label>
                    <textarea rows="1" cols="1" name="pay_content" id="pay-content"><?php echo $value['pay_content']; ?></textarea>
                    <script type="text/javascript">CKEDITOR.replace('pay-content');</script>
                </p>
                <input type="submit" value="Update">
                <input type="reset" value="Reset">
            </form>
            <?php
        }
    }
    ?>
</fieldset>