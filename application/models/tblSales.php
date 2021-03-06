<?php

class Models_tblSales extends Libs_Model {

    public function __construct() {
        parent::__construct();
        $this->queryUnit = new Libs_QueryUnit();
    }

    private $sale_id;
    private $pro_id;
    private $date_start;
    private $date_end;
    private $content;
    private $percent_decrease;

    /**
     * @param mixed $content
     */
    public function setContent($content) {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @param mixed $date_end
     */
    public function setDateEnd($date_end) {
        $this->date_end = $date_end;
    }

    /**
     * @return mixed
     */
    public function getDateEnd() {
        return $this->date_end;
    }

    /**
     * @param mixed $date_start
     */
    public function setDateStart($date_start) {
        $this->date_start = $date_start;
    }

    /**
     * @return mixed
     */
    public function getDateStart() {
        return $this->date_start;
    }

   

    /**
     * @param mixed $percent_decrease
     */
    public function setPercentDecrease($percent_decrease) {
        $this->percent_decrease = $percent_decrease;
    }

    /**
     * @return mixed
     */
    public function getPercentDecrease() {
        return $this->percent_decrease;
    }

    /**
     * @param mixed $pro_id
     */
    public function setProId($pro_id) {
        $this->pro_id = $pro_id;
    }

    /**
     * @return mixed
     */
    public function getProId() {
        return $this->pro_id;
    }

    /**
     * @param mixed $sale_id
     */
    public function setSaleId($sale_id) {
        $this->sale_id = $sale_id;
    }

    /**
     * @return mixed
     */
    public function getSaleId() {
        return $this->sale_id;
    }

   

    public function setSaleValues($row) {
        $sale = new Models_tblSales();
        $sale->setSaleId($row['sale_id']);
        $sale->setProId($row['pro_id']);
        $sale->setDateStart($row['date_start']);
        $sale->setDateEnd($row['date_end']);
        $sale->setContent($row['content']);
        $sale->setPercentDecrease($row['percent_decrease']);
        return $sale;
    }

    public function getColumnAndValue(Models_tblSales $sale, $isKey = false) {
        $arr_data = array();
        if ($isKey) {
            $arr_data['sale_id'] = $sale->getSaleId();
        }
        $arr_data['pro_id'] = $sale->getProId();
        $arr_data['date_start'] = $sale->getDateStart();
        $arr_data['date_end'] = $sale->getDateEnd();
        $arr_data['content'] = $sale->getContent();
        $arr_data['percent_decrease'] = $sale->getPercentDecrease();
        return $arr_data;
    }

    public function getAllSale() {
        $listSale = array();
        $execute = $this->queryUnit->getSelect('tbl_sales','date_end > now()');
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $sale = $this->setSaleValues($row);
                $listSale[] = $sale;
            }
        }
        return $listSale;
    }

    public function getTopSale() {
        $listSale = array();
        $execute = $this->queryUnit->getSelect('tbl_sales', ' date_end > now()', ' date_start  DESC limit 0,2');
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $sale = $this->setSaleValues($row);
                $listSale[] = $sale;
            }
        }
        return $listSale;
    }

    public function getSaleByProID($pro_id) {
        $sale = NULL;
        $execute = $this->queryUnit->getSelect("tbl_sales", "pro_id='$pro_id' and date_end > now()", ' date_start  DESC limit 0,1');
        if (mysql_num_rows($execute) > 0) {
            $row = mysql_fetch_assoc($execute);
            $sale = $this->setSaleValues($row);
        }
        return $sale;
    }

    public function getSaleByDateStart($date_start) {
        
    }

    public function getSaleByID($sale_id) {
        $sale = null;
        $execute = $this->queryUnit->getSelect("tbl_sales", "sale_id='$sale_id'");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $sale = $this->setSaleValues($row);
            }
        }
        return $sale;
    }

    public function getListSaleByProID($pro_id) {
        $listSale = array();
        $execute = $this->queryUnit->getSelect('tbl_sales', " pro_id=$pro_id");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $sale = $this->setSaleValues($row);
                $listSale[] = $sale;
            }
        }
        return $listSale;
    }

}