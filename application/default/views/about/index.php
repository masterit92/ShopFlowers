<?php
$array = $this->arrAbout;
foreach ($array as $value) {
    ?>
    <div class="about_header">
        <span class="about_icon">
            <img src="<?php echo URL_BASE ?>/templates/default/images/bullet1.gif" alt="" />
        </span>
        <h1><?php echo $value['title']; ?></h1>
    </div>
    <p class="about_detal"><?php echo $value['content']; ?></p>
    <div class="clear"></div>
    <?php
}
?>
