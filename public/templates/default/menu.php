<ul>
    <li <?php if(CONTROLLER=='index') echo "class='selected'";?>>
        <a href="<?php echo URL_BASE?>/index">
            <img src="<?php echo URL_BASE?>/templates/default/images/home.png"/> Home
        </a>
    </li>
    <li <?php if(CONTROLLER=='products') echo "class='selected'";?>>
        <a href="<?php echo URL_BASE?>/products/index?page=1">
            <img src="<?php echo URL_BASE?>/templates/default/images/flowers.png"/> Flowers
        </a>
    </li>
    <li <?php if(CONTROLLER=='news') echo "class='selected'";?>>
        <a href="#">
            <img src="<?php echo URL_BASE?>/templates/default/images/menu_news.png"/> News
        </a>
    </li>
    <li <?php if(CONTROLLER=='about') echo "class='selected'";?>>
        <a href="<?php echo URL_BASE?>/about">
            <img src="<?php echo URL_BASE?>/templates/default/images/about.png"/> About
        </a>
    </li>
    <li <?php if(CONTROLLER=='service') echo "class='selected'";?>>
        <a href="#">
            <img src="<?php echo URL_BASE?>/templates/default/images/service.png"/>Services
        </a>
    </li>
    <li <?php if(CONTROLLER=='buying') echo "class='selected'";?>>
        <a href="#">
            <img src="<?php echo URL_BASE?>/templates/default/images/buying.png"/> Buying tips
        </a>
    </li>
    <li <?php if(CONTROLLER=='contact') echo "class='selected'";?>>
        <a href="#">
            <img src="<?php echo URL_BASE?>/templates/default/images/contact.png"/> Contact
        </a>
    </li>
</ul>