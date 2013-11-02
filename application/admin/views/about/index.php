<?php
$array = $this->listAbout;
?>
<html>    
    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-user"></i> About Us</h2>
                <div class="box-icon">
                    <!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
                    <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                    <!--<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        foreach ($array as $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['about_id']; ?></td>
                                <td class="center"><?php echo $value['title']; ?></td>
                                <td class="center"><?php echo $value['content']; ?></td>

                                <td class="center">
                                    <a class="btn btn-success" href="#">
                                        <i class="icon-zoom-in icon-white"></i>  
                                        View                                            
                                    </a>
                                    <a class="btn btn-info" href="#">
                                        <i class="icon-edit icon-white"></i>  
                                        Edit                                            
                                    </a>
                                    <a class="btn btn-danger" href="#">
                                        <i class="icon-trash icon-white"></i> 
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->
    </div><!--/row-->
</html>