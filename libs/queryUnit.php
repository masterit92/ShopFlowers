<?php
class Libs_QueryUnit{
    public function __construct(){
        $this->db=new Libs_Database();
    }
    private function executeQuery($query){
        $conn=$this->db->connect();
        $result=mysql_query($query,$conn) or die('Command sql fails!');
        $this->db->disconnect($conn);
        return $result;
    }
    private function addCondition($query,$condition){
        if($condition!=null){
            $query.=" WHERE ".$condition;
        }
        return $query;
    }
    private function addOrderBy($query,$orderBy){
        if($orderBy!=null){
            $query.=" ORDER BY ".$orderBy;
        }
        return $query;
    }
    //Category   
    public function getCatByParentId($tableName, $cat_id){
        $query="SELECT * FROM ".$tableName." WHERE parent_id = '$cat_id'";
        //print_r($query);die;
        return $this->executeQuery($query);
    }
    //End    
    public function getSelect($tableName,$condition=null,$orderBy=null){
        $query="SELECT * FROM ".$tableName;
        $query=$this->addCondition($query,$condition);
        $query=$this->addOrderBy($query,$orderBy);
        //print_r($query);die;
        return $this->executeQuery($query);
    }
    public function getInsert($tableName,$arrColumnAndValue){
        $query="INSERT INTO ".$tableName."(";
        $valueInsert="";
        foreach($arrColumnAndValue as $column => $value){
            $query.=$column.',';
            $valueInsert.="'".$value."',";
        }
        $query=substr($query,0,-1).') VALUES(';
        $valueInsert=substr($valueInsert,0,-1).')';
        $query.=$valueInsert;
        return  $this->executeQuery($query);
    }
    public function getUpdate($tableName,$arrColumnAndValue,$condition){
        $query="UPDATE ".$tableName." SET ";
        foreach($arrColumnAndValue as $column => $value){
            $query.=$column."='".$value."',";
        }
        $query=substr($query,0,-1);
        $query= $this->addCondition($query,$condition);
        return  $this->executeQuery($query);
    }
    public function getDelete($tableName,$condition){
        $query="DELETE FROM ".$tableName;
        $query=$this->addCondition($query,$condition);
        return  $this->executeQuery($query);
    }
}