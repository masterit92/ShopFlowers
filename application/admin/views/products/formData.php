<script type="text/javascript" src="<?php echo URL_BASE . '/templates/admin/style/ckeditor/ckeditor.js' ?>"></script>
<h3>Another section</h3>
<fieldset>
    <form name="frmData" method="post">
        <p>
            <label>Name:</label>
            <input type="text" class="text-long" name="txtName"/>
        </p>
        <p>
            <label>Thumb:</label>
            <img src="" width="100" height="100" alt="No Image"/>
            <input type="file" name="thumb"/>
        </p>
        <p>
            <label>Category ID:</label>
            <select name="cat">
                <option>Cha</option>
                <optgroup>
                <option>con 1</option>
                <option>con 2</option>
                </optgroup>
                
            </select>
        </p>
        <p>
            <label>Description:</label>
            <textarea rows="1" cols="1" name="txtNews_content" id="news-content"></textarea>
            <script type="text/javascript">CKEDITOR.replace('news-content');</script>
        </p>
        <p>
            <label>Price</label>
            <input type="text" class="text-long" name="txtNews_title"/>
        </p>
        <p>
            <label>Status</label>
            <select name="status">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </p>
        <p>
            <label>Post Date</label>
            <input type="text" class="datepicker" class="text-medium" name="txtDate_start"/>
        </p>
        <input type="submit" value="Submit" name="Ok"/>
        <input type="reset" value="Reset" name="Ok"/>
    </form>
</fieldset>


