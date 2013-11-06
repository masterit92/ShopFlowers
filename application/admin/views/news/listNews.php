
<h3>Quản lý tin tức</h3>

<form method="post" name="frmList_news">
    <table cellpadding="0" cellspacing="0" border="1">
        <thead>
            <tr>
                <td colspan="8">
                    <a href="#" class="add">Add new</a>
                    <span>
                        <input type="text" name="txtKey_word" id="txtKey_word" value="<?php echo $this->keyword ?>"/>
                        <input type="submit" value="Search" />
                        <input type="button" value="Reset" onclick="document.getElementById('txtKey_word').value = null;"/>
                    </span>
                </td>

            </tr>
            <tr>
                <th><input type="checkbox"></th>
                <th>Stt</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Ngày đăng</th>
                <th>Ngày hết hạn</th>
                <th>Ảnh</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nbr = 0;
            foreach ($this->aryData as $value):
                $nbr++;
                ?>
                <tr>
                    <td><input type="checkbox"></td>
                    <td><?php echo $nbr ?></td>
                    <td><?php echo $value['news_title'] ?></td>
                    <td><?php echo $value['news_content'] ?></td>
                    <td><?php echo $value['news_start_date'] ?></td>
                    <td><?php echo $value['news_end_date'] ?></td>
                    <td><?php echo $value['news_image'] ?></td>
                    <td class="action">
                        <a href="#" class="view">View</a>
                        <a href="#" class="edit">Edit</a>
                        <a href="#" class="delete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <?php echo $this->paging ?>
</form>