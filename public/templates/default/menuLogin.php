<?php if(!isset($_SESSION['user'])){?>
<a href="<?php echo URL_BASE?>/customers">Login</a> | <a href="<?php echo URL_BASE?>/customers/register">Register</a>
<?php }else{?>
<ul id="nav">
     <span class="title_icon"><img src="<?php echo URL_BASE?>/templates/default/images/thumb2.gif" width="30" height="30" alt=""></span>
    <li> <a href="#">
            <?php echo $_SESSION['fullname']?> <img src="<?php echo URL_BASE?>/templates/default/images/down.png"/>
        </a>
        <ul>
            <li>
                <a href="<?php echo URL_BASE ?>/customers/changePass">
                     <span class="title_icon"><img src="<?php echo URL_BASE?>/templates/default/images/changepass.png"/></span>
                    Change password
                </a>
            </li>
            <li>
                <a href="<?php echo URL_BASE ?>/customers/changeProfile">
                    <span class="title_icon"><img src="<?php echo URL_BASE?>/templates/default/images/profile_edit.png"/></span>
                    Change profile
                </a>
            </li>
            <li>
                <a href="<?php echo URL_BASE ?>/customers/logout">
                    <span class="title_icon"><img src="<?php echo URL_BASE?>/templates/default/images/log_out.png"/></span>
                        Log out
                </a>
            </li>
        </ul>
    </li>
</ul>
<?php }?>