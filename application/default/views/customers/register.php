<div class="left_content">
      <div class="title"><span class="title_icon"><img src="<?php echo URL_BASE?>/templates/default/images/bullet1.gif" alt="" /></span>Register</div>
      <div class="feat_prod_box_details">
        <p class="details"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. </p>
        <div class="contact_form">
          <div class="form_subtitle">create new account</div>
          <div class="form_subtitle"><span> 
            <?php 
              if(isset($this->msg)){ 
                echo $this->msg;
              }    
            ?></span></div>
          <form id="registerForm" action="<?php echo URL_BASE?>/customers/postRegister" method="POST">
            <div class="form_row">
              <label class="contact"><strong>First Name:</strong></label>
              <input type="text" id="first_name" name="first_name" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Last Name:</strong></label>
              <input type="text" id="last_name" name="last_name" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="text" id="email" name="email" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Password:</strong></label>
              <input type="password" id="password" name="password" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Password Confirmation:</strong></label>
              <input type="password" id="confirm_password" name="confirm_password" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Phone:</strong></label>
              <input type="text" id="phone" name="phone" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Adrres:</strong></label>
              <input type="text" id="address" name="address" class="contact_input" />
            </div>
            <div class="form_row">
              <input type="submit" class="register" value="register" />
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div>
<!---->  
<script type="text/javascript">
    $().ready(function() {
        $("#registerForm").validate({
            rules: {
                first_name: "required",
                last_name: "required",
                email: {
                  required: true,
                  email: true
                },
                password: {
                  required: true,
                  minlength: 5
                },
                confirm_password: {
                  required: true,
                  minlength: 5,
                  equalTo: "#password"
                },
                phone: {
                  required: true,
                  phonevalidation: true
                },
                address: "required",
                //terms: "required"
            },
            messages: {
                first_name: "Please enter your first name.",
                last_name: "Please enter your last name.",
                email: "Please enter a valid email address.",
                password: {
                  required: "Please provide a password.",
                  minlength: "Your password must be at least 5 characters long."
                },
                confirm_password: {
                  required: "Please provide a password.",
                  minlength: "Your password must be at least 5 characters long.",
                  equalTo: "Please enter the same password as above."
                },
                phone: "Please enter your phone number.",
                address: "Please enter your address.",
                //terms: "Please check terms."
            }
        });
    });
</script>
<style type="text/css">
    #registerForm label.error {
        color: #FB3A3A;
        margin-left: 10px;
        width: auto;
        display: inline;
    }
    span { color: #FB3A3A;}
</style>    