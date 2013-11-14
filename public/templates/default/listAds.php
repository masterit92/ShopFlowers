<?php
$model= new Admin_Models_tblAds();

foreach($model->getAllAds() as $key =>$ads){
	echo $ads->getName();
}


?>