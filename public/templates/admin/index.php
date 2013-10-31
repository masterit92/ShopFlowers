<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style type="text/css">
            body {
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
        </style>
        <?php
        include_once 'templates/render.php';
        $render = new render();

        $arrFileCSS = array(
            'bootstrap-cerulean.css',
            'bootstrap-responsive.css',
            'charisma-app.css',
            'jquery-ui-1.8.21.custom.css',
            'fullcalendar.css',
            'fullcalendar.print.css',
            'chosen.css',
            'uniform.default.css',
            'colorbox.css',
            'jquery.cleditor.css',
            'jquery.noty.css',
            'noty_theme_default.css',
            'elfinder.min.css',
            'elfinder.theme.css',
            'jquery.iphone.toggle.css',
            'opa-icons.css',
            'uploadify.css'
        );
        $render->renderCSS('admin', $arrFileCSS);
        $arrFileJS = array(
            'jquery-1.7.2.min.js',
            'jquery-ui-1.8.21.custom.min.js',
            'bootstrap-transition.js',
            'bootstrap-alert.js',
            'bootstrap-modal.js',
            'bootstrap-dropdown.js',
            'bootstrap-scrollspy.js',
            'bootstrap-tab.js',
            'bootstrap-tooltip.js',
            'bootstrap-popover.js',
            'bootstrap-button.js',
            'bootstrap-collapse.js',
            'bootstrap-carousel.js',
            'bootstrap-typeahead.js',
            'bootstrap-tour.js',
            'jquery.cookie.js',
            'fullcalendar.min.js',
            'jquery.dataTables.min.js',
            'excanvas.js',
            'jquery.flot.min.js',
            'jquery.flot.pie.min.js',
            'jquery.flot.stack.js',
            'jquery.flot.resize.min.js',
            'jquery.chosen.min.js',
            'jquery.uniform.min.js',
            'jquery.colorbox.min.js',
            'jquery.cleditor.min.js',
            'jquery.noty.js',
            'jquery.elfinder.min.js',
            'jquery.raty.min.js',
            'jquery.iphone.toggle.js',
            'jquery.autogrow-textarea.js',
            'jquery.uploadify-3.1.min.js',
            'jquery.history.js',
            'charisma.js'
        );
        $render->renderJS('admin', $arrFileJS);
        ?>
        <link href="<?php echo URL_BASE ?>/favicon.ico" rel="shortcut icon"/>
    </head>
    <body>
        <?php
        if (!isset($_SESSION['user_admin'])) {
            if (CONTROLLER == 'Index' && ACTION == 'index') {
                include_once TEMPLATE;
            } else {
                header('Location: ' . URL_BASE . '/admin');
            }
            ?>
        <?php } else { ?>
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a class="brand" href="index.html"> <img alt="" src="<?php echo URL_BASE ?>/templates/admin/img/logo20.png" /> <span>Charisma</span></a>

                        <!-- theme selector starts -->
                        <div class="btn-group pull-right theme-container" >
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-tint"></i><span class="hidden-phone"> Change Theme / Skin</span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" id="themes">
                                <li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
                                <li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
                                <li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
                                <li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
                                <li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
                                <li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
                                <li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
                                <li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
                                <li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
                            </ul>
                        </div>
                        <!-- theme selector ends -->

                        <!-- user dropdown starts -->
                        <div class="btn-group pull-right" >
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-user"></i><span class="hidden-phone"><?php if (isset($_SESSION['full_name_admin'])) echo $_SESSION['full_name_admin']; ?></span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo URL_BASE ?>/admin/logout">Logout</a></li>
                            </ul>
                        </div>
                        <!-- user dropdown ends -->

                        <div class="top-nav nav-collapse">
                            <ul class="nav">
                                <li><a href="#">Visit Site</a></li>
                                <li>
                                    <form class="navbar-search pull-left">
                                        <input placeholder="Search" class="search-query span2" name="query" type="text">
                                    </form>
                                </li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- topbar ends -->
            <div class="container-fluid">
                <div class="row-fluid">

                    <!-- left menu starts -->
                    <div class="span2 main-menu-span">
                        <div class="well nav-collapse sidebar-nav">
                            <ul class="nav nav-tabs nav-stacked main-menu">
                                <li class="nav-header hidden-tablet">Main</li>
                                <li><a class="ajax-link" href="index.html"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
                                <li><a class="ajax-link" href="ui.html"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI Features</span></a></li>
                                <li><a class="ajax-link" href="form.html"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>
                                <li><a class="ajax-link" href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
                                <li><a class="ajax-link" href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
                                <li><a class="ajax-link" href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>
                                <li class="nav-header hidden-tablet">Sample Section</li>
                                <li><a class="ajax-link" href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>
                                <li><a class="ajax-link" href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
                                <li><a class="ajax-link" href="grid.html"><i class="icon-th"></i><span class="hidden-tablet"> Grid</span></a></li>
                                <li><a class="ajax-link" href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
                                <li><a href="tour.html"><i class="icon-globe"></i><span class="hidden-tablet"> Tour</span></a></li>
                                <li><a class="ajax-link" href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
                                <li><a href="error.html"><i class="icon-ban-circle"></i><span class="hidden-tablet"> Error Page</span></a></li>
                                <li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
                            </ul>
                            <label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
                        </div><!--/.well -->
                    </div><!--/span-->
                    <!-- left menu ends -->

                    <noscript>
                        <div class="alert alert-block span10">
                            <h4 class="alert-heading">Warning!</h4>
                            <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                        </div>
                    </noscript>

                    <div id="content" class="span10">
                        <!-- content starts -->
                        <?php include_once TEMPLATE ?>
                        <!-- content ends -->
                    </div><!--/#content.span10-->
                </div><!--/fluid-row-->

                <hr>

                    <div class="modal hide fade" id="myModal">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3>Settings</h3>
                        </div>
                        <div class="modal-body">
                            <p>Here settings can be configured...</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Close</a>
                            <a href="#" class="btn btn-primary">Save changes</a>
                        </div>
                    </div>

                    <footer>
                        <p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Muhammad Usman</a> 2012</p>
                        <p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
                    </footer>

            </div><!--/.fluid-container-->
        <?php } ?>
    </body>
</html>



