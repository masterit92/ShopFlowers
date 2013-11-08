<?php

class Libs_splitPage {

    private $arrData;
    private $numRec;

    public function __construct($arrData, $numRec) {
        $this->arrData = $arrData;
        $this->numRec = $numRec;
    }

    public function numPage() {
        return ceil(count($this->arrData) / $this->numRec);
    }

    public function getDataPage($currentPage) {
        $listData = array();
        $numElement = ($currentPage - 1) * $this->numRec;
        if (isset($this->arrData[$numElement])) {
            if ((count($this->arrData) - $numElement) - $this->numRec >= 0) {
                for ($i = $numElement; $i < ($this->numRec + $numElement); $i++) {
                    $listData[] = $this->arrData[$i];
                }
            } else {
                for ($i = $numElement; $i < count($this->arrData); $i++) {
                    $listData[] = $this->arrData[$i];
                }
            }
        }
        return $listData;
    }

    public function viewNumPage($url) {
        $view ='<div class="page">';
        $view.='<a href="' . $url . '?page=1" >Start</a>';
        $current = 1;
        if (isset($_GET['page'])) {
            $current = $_GET['page'];
        }
        $flag = TRUE;
        for ($i = 1; $i <= $this->numPage(); $i++) {
            if (isset($_GET['page']) && $_GET['page'] == $i) {
                $view.='<a href="' . $url . '?page=' . $i . '" class="current">' . $i . '</a>';
            } else {
                if ($i > ($current - 3) && $i < ($current + 3)) {
                    $flag = TRUE;
                    $view.=' <a href="'.$url.'?page='.$i.'">'.$i.'</a>';
                } else {
                    if ($flag) {
                        $flag = FALSE;
                        $view.= "<a>....</a>";
                    }
                }
            }
        }

        $view.='<a href="' . $url . '?page=' . $this->numPage() . '">End</a>';
        $view.='</div>';
        return $view;
    }

}
?>
