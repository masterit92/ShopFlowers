
<h3>QuaÒn lyì tin týìc</h3>

<form method="post" name="frmList_news">
    <table cellpadding="0" cellspacing="0" border="1">
        <thead>
            <tr>
                <td colspan="8">
                    <a href="<?php echo URL_BASE . '/admin/news/loadFormData&id=0' ?>" class="add">Add new</a>
                    <a href="#" onclick="BaseController.deleteMultiRecord('news', 'delete');" class="delete">Delete multi</a>
                    <span>
                        <input type="text" name="txtKey_word" id="txtKey_word" value="<?php echo $this->keyword ?>"/>
                        <input type="submit" value="Search" />
                        <input type="button" value="Reset" onclick="document.getElementById('txtKey_word').value = null;"/>
                    </span>
                </td>

            </tr>
            <tr>
                <th><input type="checkbox" name="checkAll" id="checkAll" onclick="BaseController.checkAll();"></th>
                <th>Stt</th>
                <th>Tiêu ðêÌ</th>
                <th>Nôòi dung</th>
                <th>Ngày ðãng</th>
                <th>Ngày hêìt haòn</th>
                <th>AÒnh</th>
                <th>Tùy choòn</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nbr = 0;
            if ($this->aryData !== -1) {
                foreach ($this->aryData as $value):
                    $nbr++;
                    ?>
                    <tr>
                        <td><input type="checkbox" name="checkOne[]" value="<?php echo $value['news_id'] ?>"></td>
                        <td><?php echo $nbr ?></td>
                        <td><?php echo $value['news_title'] ?></td>
                        <td><?php echo $value['news_content'] ?></td>
                        <td><?php echo $value['news_start_date'] ?></td>
                        <td><?php echo $value['news_end_date'] ?></td>
                        <td><?php echo $value['news_image'] ?></td>
                        <td class="action">
                            <a href="#" class="view">View</a>
                            <a href="<?php echo URL_BASE . '/admin/news/loadFormData&id=' . $value['news_id'] ?>" class="edit">Edit</a>
                            <a href="#" onclick="BaseController.deleteOneRecord('this new', '<?php echo URL_BASE . '/admin/news/delete&listId=' . $value['news_id'] ?>');" class="delete">Delete</a>
                        </td>
                    </tr>
                    <?php
                endforeach;
            }else {
                ?>
                <tr>
                    <td colspan="8" style="text-align: center; height: 50px;"><b>Không coì dýÞ liêòu</b></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h2><?php echo $this->pages_list ?></h2>
</form>