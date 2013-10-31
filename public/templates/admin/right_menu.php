<?php session_start();?>
<ul id="nav">
    <li><a href="#">
            <?php if(isset($_SESSION['full_name_admin'])) echo $_SESSION['full_name_admin'];?>
            <img src="<?php echo URL_BASE?>/templates/admin/images/down.png"/>
        </a>
        <ul>
            <li>
                <a href="#">
                    <span class="title_icon"><img src="<?php echo URL_BASE?>/templates/admin/images/changepass.png"/></span>
                    Change password
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="title_icon"><img src="<?php echo URL_BASE?>/templates/admin/images/profile_edit.png"/></span>
                    Change profile
                </a>
            </li>
            <li>
                <a href="<?php echo URL_BASE?>/admin/logout">
                    <span class="title_icon"><img src="<?php echo URL_BASE?>/templates/admin/images/log_out.png"/></span>
                    Log out
                </a>
            </li>
        </ul>
    </li>
</ul>