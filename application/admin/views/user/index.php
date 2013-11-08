<?php
$page = new Libs_splitPage($this->listAllUser, 2);
?>
<div>
  <h1>USERS</h1>
    <p><label>Search:</label>
    <form method="get" action="">
      <input type="text" value="<?php echo !empty($keyword) ? $keyword : '' ?>" id="keyword" name="keyword"/>
    </form>
    </p>
    <p> <a href="<?php echo URL_BASE?>/admin/user/getCreate">New User</a> </p>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Email</th>
        <th>FullName</th>
        <th>Phone</th>
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
      foreach($dataPage as $key =>$usr){
      ?>
      <tr>
        <td> <?php echo $usr->getUserId(); ?> </td>
        <td> <?php echo $usr->getEmail(); ?>  </td>
        <td> <?php echo $usr->getFullName(); ?>  </td>
        <td> <?php echo $usr->getPhone(); ?> </td>
        <td><a href="<?php echo URL_BASE?>/admin/user/getEdit?id=<?php echo $usr->getUserId(); ?>">Edit</a> 
            <a href="<?php echo URL_BASE?>/admin/user/postDelete?id=<?php echo $usr->getUserId(); ?>">Delete</a></td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php
$url = URL_BASE . '/admin/user/index';
echo $page->viewNumPage($url);
?>
</div>
