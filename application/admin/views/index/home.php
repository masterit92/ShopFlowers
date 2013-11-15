List all user.
<?php
$ad= new Admin_Models_tblUsers();
foreach($this->listAllUser as $key =>$ad){
    echo '<br/>'.$ad->getUserId().'---'.$ad->getEmail().'----'.$ad->getFullName().'<br/>';
}
?>