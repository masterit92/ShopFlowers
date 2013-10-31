<?php
class render
{

    public function renderCSS($templateName, $arrFileName)
    {
        foreach ($arrFileName as $value) {
            echo '<link rel="stylesheet" type="text/css" href="'.URL_BASE.'/templates/' . $templateName . '/css/' . $value . '"/>';
        }
    }

    public function renderJS($templateName, $arrFileName)
    {
        foreach ($arrFileName as $value) {
            echo '<script type="text/javascript" src="'.URL_BASE.'/templates/'.$templateName.'/js/'.$value.'"></script>';
        }
    }

}