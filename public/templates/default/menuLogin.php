<?php if(isset($_SESSION['user'])){?>
<a href="#">Login</a> | <a href="#">Register</a>
<?php }else{?>
<ul id="nav">
     <span class="title_icon"><img src="<?php echo URL_BASE?>/templates/default/images/thumb2.gif" width="30" height="30" alt=""></span>
    <li> <a href="#">
            Phan The Binh <img src="<?php echo URL_BASE?>/templates/default/images/down.png"/>
        </a>
        <ul>
            <li>
                <a href="#">
                     <span class="title_icon"><img src="<?php echo URL_BASE?>/templates/default/images/changepass.png"/></span>
                    Change password
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="title_icon"><img src="<?php echo URL_BASE?>/templates/default/images/profile_edit.png"/></span>
                    Change profile
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="title_icon"><img src="<?php echo URL_BASE?>/templates/default/images/log_out.png"/></span>
                        Log out
                </a>
            </li>
        </ul>
    </li>
</ul>
<?php }?>