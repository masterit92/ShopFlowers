      <div class="title"><span class="title_icon"><img src="<?php echo URL_BASE?>/templates/default/images/bullet1.gif" alt="" /></span>Login</div>
      <div class="feat_prod_box_details">
        <span> 
            <?php 
              if(isset($this->msg)){ 
                echo $this->msg;
              }    
            ?></span>
       <div class="contact_form">
          <div class="form_subtitle">login into your account</div>
          <form id="formLogin" name="formLogin" action="<?php echo URL_BASE?>/customers/postLogin" method="POST">
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="text" id="email" name="email" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Password:</strong></label>
              <input type="password" id="password" name="password" class="contact_input" />
            </div>
            <div class="form_row">
              <div class="terms">
                <input type="checkbox" name="terms" />
                Remember me </div>
            </div>
            <div class="form_row">
              <input type="submit" name="btnLogin" class="register" value="login" />
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
<script type="text/javascript">
    $().ready(function() {
        $("#formLogin").validate({
            rules: {
                email: {
                  required: true,
                  email: true
                },
                password: {
                  required: true,
                  minlength: 5
                }
            },
            messages: {
                email: "Please enter a valid email address.",
                password: {
                  required: "Please provide a password.",
                  minlength: "Your password must be at least 5 characters long."
                }
            }
        });
    });
</script>
<style type="text/css">
    #formLogin label.error {
        color: #FB3A3A;
        margin-left: 80px;
        width: auto;
        display: inline;
    }
    span { color: #FB3A3A;}
</style>    