<h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">SALE</a></h2>
                
<div id="main">
<h3>SALE</h3>
<p><a href="<?php echo URL_BASE?>/admin/sale/getCreate?pro_id=<?php echo $_GET['pro_id']?>">New Sale</a></p>
    <table cellpadding="0" cellspacing="0" border="1">
    <tr>
      <th>ID</th>
      <th>Product ID</th>
      <th>Date Start</th>
      <th>Date End</th>
      <th>Content</th>
      <th>Percent Decrease</th>
      <th>Action</th>
    </tr> 
    <?php
    if(count($this->listSale)>0){
    foreach($this->listSale as $key =>$sale){
    ?>    
    <tr>
      <td><?php echo $sale->getSaleId(); ?></td>     
      <td><?php echo $sale->getProId(); ?></td>
      <td> <?php echo date_format(date_create($sale->getDateStart()), 'm/d/Y'); ?> </td>
      <td> <?php echo date_format(date_create($sale->getDateEnd()), 'm/d/Y'); ?> </td>
      <td><?php echo $sale->getContent(); ?></td>
      <td><?php echo $sale->getPercentDecrease(); ?>%</td>
      <td class="action">
        <a href="<?php echo URL_BASE?>/admin/sale/getEdit?id=<?php echo $sale->getSaleId(); ?>&pro_id=<?php echo $_GET['pro_id']?>" class="edit">Edit</a>
        <a href="<?php echo URL_BASE?>/admin/sale/postDelete?id=<?php echo $sale->getSaleId(); ?>&pro_id=<?php echo $_GET['pro_id']?>" class="delete">Delete</a>
      </td>
    </tr> 
    <?php
    }
    }else{
    ?>  
    <tr>
        <td colspan="7">No data</td>
    </tr>
    <?php }?>
    </table>                
</div>


