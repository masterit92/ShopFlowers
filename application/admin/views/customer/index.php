<?php
$page = new Libs_splitPage($this->listAllCus, 10);
?>
<div>
  <h1>CUSTOMERS</h1>
    <p><label>Search:</label>
    <form method="get" action="">
      <input type="text" value="<?php echo !empty($keyword) ? $keyword : '' ?>" id="keyword" name="keyword"/>
    </form>
    </p>
  <table border="1">
    <thead>
      <tr>
        <th>ID</th>
        <th>Email</th>
        <th>FullName</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>      
      <?php
        $dataPage = array();
        if (isset($_GET['page'])) {
            $dataPage = $page->getDataPage($_GET['page']);
        } else {
            $dataPage = $page->getDataPage(1);
        }      
      foreach($dataPage as $key =>$cus){
      ?>
      <tr>
        <td> <?php echo $cus->getCusId(); ?> </td>
        <td> <?php echo $cus->getEmail(); ?>  </td>
        <td> <?php echo $cus->getFirstName().$cus->getLastName(); ?>  </td>
        <td> <?php echo $cus->getPhone(); ?> </td>
        <td> <?php echo $cus->getAddress(); ?> </td>
        <td><a href="<?php echo URL_BASE?>/admin/customers/postDelete?id=<?php echo $cus->getCusId(); ?>">Delete</a></td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php
$url = URL_BASE . '/admin/customer/index';
echo $page->viewNumPage($url);
?>
</div>
