<?php

class Libs_uploadImg {

    private function checkTypeImg($nameImg) {
        $file_type = array(".jpg", ".jpeg", ".JPG", ".JPEG", ".png", ".PNG", ".gif", ".GIF");
        $img_type = strstr($nameImg, '.');
        $err = $_FILES["$nameImg"]["error"];
        if ($err > 0 || !in_array($img_type, $file_type) || $_FILES["$nameImg"]["size"] > (5 * 1024 * 1024)) {
            return FALSE;
        }
        return TRUE;
    }

    public function addImg($url_img, $name_field, $arr_file_name) {
        $arr_url_img = array();
        foreach ($arr_file_name as $key => $value) {
            try {
                if ($this->checkTypeImg($value)) {
                    $url = $url_img . "/" . $value;
                    if (file_exists($url)) {
                        srand(time());
                        $value = rand(1000, 10000) . "_" . $value;
                        $url = $url_img . "/" . $value;
                    }
                    $tmp = $_FILES["$name_field"]["tmp_name"]["$key"];
                    move_uploaded_file($tmp, $url);
                    $arr_url_img[] = $url;
                }
            } catch (Exception $ex) {
                
            }
        }
        return $arr_url_img;
    }

}
