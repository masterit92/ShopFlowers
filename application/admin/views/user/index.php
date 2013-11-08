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
      foreach($this->listAllUser as $key =>$usr){
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
  
</div>
