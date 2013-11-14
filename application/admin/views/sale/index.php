<h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">SALE</a></h2>
                
<div id="main">
<h3>SALE</h3>
<p><a href="<?php echo URL_BASE?>/admin/sale/getCreate">New Sale</a></p>
    <table cellpadding="0" cellspacing="0" border="1">
    <tr>
      <th>ID</th>
      <th>Image </th>
      <th>Date Start </th>
      <th>Date End </th>
      <th>Action</th>
    </tr> 
    <?php
    foreach($this->listSale as $key =>$sale){
    ?>    
    <tr>
      <td><?php echo $sale->getSaleId(); ?></td>
      <td> <a href="<?php echo URL_BASE?>/admin/sale/getEdit?id=<?php echo $sale->getSaleId(); ?>">
          <img src="<?php echo URL_BASE?>/<?php echo $sale->getImage(); ?>" alt=""height="70" width="70"/>
          </a>
      </td>     
      <td> <?php echo date_format(date_create($sale->getDateStart()), 'm/d/Y'); ?> </td>
      <td> <?php echo date_format(date_create($sale->getDateEnd()), 'm/d/Y'); ?> </td>
      <td class="action">
        <a href="<?php echo URL_BASE?>/admin/sale/getEdit?id=<?php echo $sale->getSaleId(); ?>" class="edit">Edit</a>
        <a href="<?php echo URL_BASE?>/admin/sale/postDelete?id=<?php echo $sale->getSaleId(); ?>" class="delete">Delete</a>
      </td>
    </tr> 
    <?php
    }
    ?>  
    </table>                
</div>


