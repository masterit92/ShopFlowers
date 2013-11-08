<h3>List Album Images</h3>
<?php
$img = new Admin_Models_tblImages();
?> 


<?php
if($this->listImg!=null){?>
<div>
    <table border='1'>
        <tr>
            <th>Check</th>
            <th>Id Images</th>
            <th>Id Product</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
<?php
foreach ($this->listImg as $key => $img) {
    ?>
<tr>
    <td>
        <input type="checkbox" name="cbPro[]" value="<?php echo $img->getImgId() ?>"/>
    </td>
    <td><?php echo $img->getImgId();?></td>
    <td><?php echo $img->getProId();?></td>
    <td><img src="<?php echo URL_BASE.'/'.$img->getProId();?>" width="100" height="100"/></td>
    <td>
        <a href="#?img_id=<?php echo $img->getImgId()?>">Edit</a> | 
        <a href="#?img_id=<?php echo $img->getImgId()?>" onclick="confirm('Delete?');">Delete</a>
    </td>
</tr>
<?php } }
else{
    echo "Product no image.";
}
?>
    </table>
</div>
