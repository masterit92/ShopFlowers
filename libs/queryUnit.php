<?php

class Libs_QueryUnit {

    public function __construct() {
        $this->db = new Libs_Database();
    }

    public function executeQuery($query, &$lastId) {
        $conn = $this->db->connect();
        $result = mysql_query($query, $conn) or die($query . 'Command sql fails!');
        //ThaiNV: get last insert Id
        $lastId = mysql_insert_id($conn);
        $this->db->disconnect($conn);
        return $result;
    }

    private function addCondition($query, $condition) {
        if ($condition != null) {
            $query.=" WHERE " . $condition;
        }
        return $query;
    }

    private function addOrderBy($query, $orderBy) {
        if ($orderBy != null) {
            $query.=" ORDER BY " . $orderBy;
        }
        return $query;
    }

    public function getSelect($tableName, $condition = null, $orderBy = null, $offset = 0, $limit = null) {
        $query = "SELECT * FROM " . $tableName;
        $query = $this->addCondition($query, $condition);
        $query = $this->addOrderBy($query, $orderBy);
        if ($limit !== null) {
            $query = $this->addLimit($query, $offset, $limit);
        }

        return $this->executeQuery($query);
    }

    public function getInsert($tableName, $arrColumnAndValue, &$lastId) {
        $query = "INSERT INTO " . $tableName . "(";
        $valueInsert = "";
        foreach ($arrColumnAndValue as $column => $value) {
            $query.=$column . ',';
            $valueInsert.="'" . $value . "',";
        }
        $query = substr($query, 0, -1) . ') VALUES(';
        $valueInsert = substr($valueInsert, 0, -1) . ')';
        $query.=$valueInsert;
        return $this->executeQuery($query, $lastId);
    }

    public function getUpdate($tableName, $arrColumnAndValue, $condition) {
        $query = "UPDATE " . $tableName . " SET ";
        foreach ($arrColumnAndValue as $column => $value) {
            $query.=$column . "='" . $value . "',";
        }
        $query = substr($query, 0, -1);
        $query = $this->addCondition($query, $condition);
        return $this->executeQuery($query);
    }

    public function getDelete($tableName, $condition) {
        $query = "DELETE FROM " . $tableName;
        $query = $this->addCondition($query, $condition);
        return $this->executeQuery($query);
    }

    /**
     * @desc: fetch all sql
     * 
     * @author: ThaiNV
     * @since: 05/11/2013 
     */
    public function fetchAll($rs) {
        $arr = array();
        if (isset($rs)) {
            while ($row = mysql_fetch_array($rs, MYSQL_ASSOC)) {
                array_push($arr, $row);
            }
        }
        if (!empty($arr)) {
            return $arr;
        } else {
            return -1;
        }
    }

    /**
     * @desc: fetch one sql
     * 
     * @author: ThaiNV
     * @since: 05/11/2013 
     */
    public function fetchOne($sql) {
        $out = $this->fetchAll($sql);
        return array_shift($out);
    }

    private function addLimit($query, $offSet, $limit) {
        if ($offSet != '' && $limit != '') {
            $query.=" LIMIT $offSet,$limit";
        }
        return $query;
    }

    public function getCatByParentId($tableName, $cat_id) {
        $query = "SELECT * FROM " . $tableName . " WHERE parent_id = '$cat_id'";
        //print_r($query);die;
        return $this->executeQuery($query);
    }

}