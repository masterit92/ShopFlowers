<script type="text/javascript" src="<?php echo URL_BASE . '/templates/admin/style/ckeditor/ckeditor.js' ?>"></script>
<script type="text/javascript" src="<?php echo URL_BASE . '/templates/admin/style/js/news/NewsController.js' ?>"></script>
<h3>Another section</h3>
<fieldset>
    <form name="frmData" method="post" action="<?php echo URL_BASE . '/admin/news/save' ?>" onsubmit=" return NewsController.validateFormData();">
        <?php
        if ($this->aryData == -1) {//------------ADD------------
            ?>
            <p>
                <label>Ngày đăng:</label>
                <input type="text" class="datepicker" class="text-medium" name="txtDate_start" id="date-start" />
            </p>
            <p>
                <label>Ngày hết hạn:</label>
                <input type="text" class="datepicker" class="text-medium" name="txtDate_end" id="date-end" />
            </p>
            <p>
                <label>Tiêu đề:</label>
                <input type="text" class="text-long" name="txtNews_title" id="news-title" />
            </p>
            <p>
                <label>Ảnh:</label>
                <input type="file" name="txtNews_file" id="news-file" multiple="" />
            </p>
            <p>
                <label>Nội dung:</label>
                <textarea rows="1" cols="1" name="txtNews_content" id="news-content" ></textarea>
                <script type="text/javascript">CKEDITOR.replace('news-content');</script>
            </p>
            <?php
        } else {
            foreach ($this->aryData as $value) {//------------EDIT------------
                ?>
                <input type="hidden" name="news_id" value="<?php echo $value['news_id'] ?>">
                <p>
                    <label>Ngày đăng:</label>
                    <input type="text" class="datepicker" class="text-medium" name="txtDate_start" id="date-start" value="<?php echo $value['news_start_date'] ?>"/>
                </p>
                <p>
                    <label>Ngày hết hạn:</label>
                    <input type="text" class="datepicker" class="text-medium" name="txtDate_end" id="date-end" value="<?php echo $value['news_end_date'] ?>"/>
                </p>
                <p>
                    <label>Tiêu đề:</label>
                    <input type="text" class="text-long" name="txtNews_title" id="news-title" value="<?php echo $value['news_title'] ?>"/>
                </p>
                <p>
                    <label>Nội dung:</label>
                    <textarea rows="1" cols="1" name="txtNews_content" id="news-content" ><?php echo $value['news_content'] ?></textarea>
                    <script type="text/javascript">CKEDITOR.replace('news-content');</script>
                </p>
                <?php
            }
        }
        ?>
        <input type="submit" value="Submit Query" name="Ok"/>
        <input type="reset" value="Reset"/>
        <input type="button" value="Back" onclick="window.location.href = '<?php echo URL_BASE . '/admin/news' ?>';"/>
    </form>
</fieldset>



