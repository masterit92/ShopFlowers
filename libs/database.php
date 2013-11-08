<?php


class Libs_Database {
    public function __construct(){

    }
    public function connect(){
        $conn=null;
        if($conn=mysql_connect(DB_HOST,DB_USER,DB_PASS)){
            if(!mysql_select_db(DB_DATA)){
                die('Could not connect database');
            }
        }else{
            die('Could not connect server');

        }
        return $conn;
    }

    public function disconnect($conn){
        mysql_close($conn);
    }

}