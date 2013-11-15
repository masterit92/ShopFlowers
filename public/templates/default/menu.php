
<ul>
    <li <?php if( strtolower(CONTROLLER)=='index') echo "class='selected'"?>>
        <a href="<?php echo URL_BASE?>/index">
            <img src="<?php echo URL_BASE?>/templates/default/images/home.png"/> Home
        </a>
    </li>
    <li <?php if(strtolower(CONTROLLER)=='products') echo "class='selected'"?>>
        <a href="<?php echo URL_BASE?>/products/index?page=1">
            <img src="<?php echo URL_BASE?>/templates/default/images/flowers.png"/> Flowers
        </a>
    </li>
    <li <?php if(strtolower(CONTROLLER)=='news') echo "class='selected'"?>>
        <a href="<?php echo URL_BASE?>/news">
            <img src="<?php echo URL_BASE?>/templates/default/images/menu_news.png"/> News
        </a>
    </li>
    <li <?php if(strtolower(CONTROLLER)=='about') echo "class='selected'"?>>
        <a href="<?php echo URL_BASE?>/about">
            <img src="<?php echo URL_BASE?>/templates/default/images/about.png"/> About
        </a>
    </li>
    <li <?php if(strtolower(CONTROLLER)=='service') echo "class='selected'"?>>
        <a href="#">
            <img src="<?php echo URL_BASE?>/templates/default/images/service.png"/>Services
        </a>
    </li>
    <li <?php if(strtolower(CONTROLLER)=='buyingtip') echo "class='selected'"?>>
        <a href="<?php echo URL_BASE?>/buyingtip">
            <img src="<?php echo URL_BASE?>/templates/default/images/buying.png"/> Buying tips
        </a>
    </li>
    <li <?php if(strtolower(CONTROLLER)=='contact') echo "class='selected'"?>>
        <a href="<?php echo URL_BASE?>/contact">
            <img src="<?php echo URL_BASE?>/templates/default/images/contact.png"/> Contact
        </a>
    </li>
	
</ul>
<!--trangvt insert link of contact and buyingtip, news-->
