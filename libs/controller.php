<?php

class Libs_Controller {

    public function __construct() {
        $this->view = new Libs_View();
    }

    /**
     * @desc: redirect to the desired URL
     * 
     * $author: ThaiNV
     * @since: 06/11/2013
     */
    public function redir($url) {
        if ($url != '') {
            echo "<script language='javascript'>window.location.href='" . $url . "'</script>";
            exit();
        }
    }
}