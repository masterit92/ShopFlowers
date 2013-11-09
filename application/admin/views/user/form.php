<!---->  
<script type="text/javascript">
    $().ready(function() {
        $("#regForm").validate({
            rules: {
                email: {
					required: true,
					email: true
				},
				fullname: "required",
				phone: {
                       required: true,
                       phonevalidation: true
                },
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				}
            },
            messages: {
                email: "Please enter a valid email address.",
                fullname: "Please enter your fullname.",
                phone: "Please enter your phone number.",
                password: {
					required: "Please provide a password.",
					minlength: "Your password must be at least 5 characters long."
				},
				confirm_password: {
					required: "Please provide a password.",
					minlength: "Your password must be at least 5 characters long.",
					equalTo: "Please enter the same password as above."
				}
            }
        });
    });
</script>
<style type="text/css">
    #regForm label.error {
        color: #FB3A3A;
        margin-left: 10px;
        width: auto;
        display: inline;
    }
    span { color: #FB3A3A;}
</style>
<div>
    <h1><?php echo ( $this->create ? 'New User' : 'Edit User' )?></h1>
    <span><?php 
    	if(isset($this->msg)){ 
    		echo $this->msg;
    	}		 
    	?> </span>
    <div id="info" class=""> </div>
    <form id="regForm"  action="<?php echo URL_BASE?>/admin/user/<?php echo ( $this->create ? 'postCreate' : 'postEdit' )?>" method="POST" >                      
	<input type="hidden" name="userId" value="<?php echo ( $this->create ? '' : $this->users->getUserId() )?>" />
        
    <fieldset><legend>Basic Information</legend>

    <div>
        <label for="email">Email Address</label>              
        <div>
            <input type="text" id="email" name="email" value="<?php echo ( $this->create ? '' : $this->users->getEmail() ); ?>" placeholder="Enter Email Address...">       
				<span id="email1"></span>				
        </div>
    </div>

    <div>
        <label for="fullname">Full Name</label>              
        <div>
            <input type="text" id="fullname" name="fullname" value="<?php echo ( $this->create ? '' : $this->users->getFullName() ); ?>" placeholder="Enter Full Name...">              
			<span id="fullname1"></span>
		</div>
    </div>

    <div>
        <label for="phone">Phone</label>              
        <div>
            <input type="text" id="phone" name="phone" value="<?php echo ( $this->create ? '' : $this->users->getPhone() ); ?>" placeholder="Enter Phone Number...">              
			<span id="phone1"></span>
		</div>
    </div>

    </fieldset>
    <fieldset><legend>Authentication</legend>
    <div>
        <label for="password">Password</label>              
        <div>
			<input type="password" name="password" id="password" placeholder="Enter New Password..." >
            <input type="hidden" name="pwd" value="<?php echo ( $this->create ? '' : $this->users->getPassword() ); ?>" />    
			<span id="pwd1"></span>
      	</div>
    </div>
    <div>
        <label for="confirm_password">Password Confirmation</label>              
        <div>
			<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm New Password...">
			<span id="pwdcon1"></span>
        </div>
    </div>

    </fieldset>

    <fieldset><legend>Roles</legend>
    <div>           
      	<div>  
<?php
	$usrRole = array();
	foreach($this->rolesUserID as $key =>$roleUser){
		$usrRole[] = $roleUser->getRoleId();
	}
?>      		
		<?php
		foreach($this->roles as $key =>$role){
		?>      		
			<input type="checkbox" name="roleUser[]" value="<?php echo $role->getRoleId(); ?>"
			<?php 
			if(in_array($role->getRoleId(),$usrRole) ){
				echo 'checked';
			}?>
			/>
			<?php echo $role->getName(); ?>  	         
		<?php
		}
		?>                
			           
		</div>
    </div>    
	</fieldset>          
        <div>         	
            <a href="<?php echo URL_BASE?>/admin/user/index" class="btn">Go Back</a>
            <input type="submit" name="btnCreate" id="x" value="<?php echo ( $this->create ? 'Create User' : 'Save User' )?>" />
        </div>
    </form>
</div>