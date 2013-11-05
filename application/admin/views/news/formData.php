<script type="text/javascript" src="<?php echo URL_BASE . '/templates/admin/style/ckeditor/ckeditor.js' ?>"></script>
<h3>Another section</h3>
<fieldset>
    <form name="frmData" method="post">
        <p>
            <label>Ngày đăng:</label>
            <input type="text" class="datepicker" class="text-medium" name="txtDate_start"/>
        </p>
        <p>
            <label>Ngày hết hạn:</label>
            <input type="text" class="datepicker" class="text-medium" name="txtDate_end"/>
        </p>
        <p>
            <label>Tiêu đề:</label>
            <input type="text" class="text-long" name="txtNews_title"/>
        </p>
        <p>
            <label>Nội dung:</label>
            <textarea rows="1" cols="1" name="txtNews_content" id="news-content"></textarea>
            <script type="text/javascript">CKEDITOR.replace('news-content');</script>
        </p>
        <input type="submit" value="Submit Query" name="Ok"/>
    </form>
</fieldset>


