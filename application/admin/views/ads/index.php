<h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">ADS</a></h2>
                
<div id="main">
<h3>ADS</h3>
<p><a href="<?php echo URL_BASE?>/admin/ads/getCreate">New Ads</a></p>
    <table cellpadding="0" cellspacing="0" border="1">
    <tr>
      <th>ID</th>
      <th>Tên </th>
      <th>Ảnh minh họa </th>
      <th>Ngày bắt đầu </th>
      <th>Ngày kết thúc </th>
      <th>Thao tác</th>
    </tr> 
    <?php
    foreach($this->listAds as $key =>$ads){
    ?>    
    <tr>
            <td><?php echo $ads->getAdsId(); ?></td>
      <td> <?php echo $ads->getName(); ?> </td>
      <td> <a href="<?php echo URL_BASE?>/admin/ads/getEdit?id=<?php echo $ads->getAdsId(); ?>">
          <img src="<?php echo URL_BASE?>/<?php echo $ads->getImage(); ?>" alt=""height="70" width="70"/>
          </a>
      </td>     
      <td> <?php echo date_format(date_create($ads->getDateStart()), 'm/d/Y'); ?> </td>
      <td> <?php echo date_format(date_create($ads->getDateEnd()), 'm/d/Y'); ?> </td>
            <td class="action">
        <a href="<?php echo URL_BASE?>/admin/ads/getEdit?id=<?php echo $ads->getAdsId(); ?>" class="edit">Edit</a>
        <a href="<?php echo URL_BASE?>/admin/ads/postDelete?id=<?php echo $ads->getAdsId(); ?>" class="delete">Delete</a></td>
        </tr> 
    <?php
    }
    ?>  
    </table>                
</div>


