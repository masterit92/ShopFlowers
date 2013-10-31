<?php


class Libs_View {
    public function __construct(){

    }
    public function render($name, $inc=true){
        if($inc){
            define('TEMPLATE','..'.DS.'application'.DS.MODULE.DS.'views/'.$name.EXT);
            include_once 'templates'.DS.MODULE.DS.'index'.EXT;
        }else{
            include_once '..'.DS.'application'.DS.MODULE.DS.'views/'.$name.EXT;
        }
    }
}