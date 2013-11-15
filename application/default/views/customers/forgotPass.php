      <div class="title"><span class="title_icon"><img src="<?php echo URL_BASE?>/templates/default/images/bullet1.gif" alt="" /></span>Forgot Password</div>
      <div class="feat_prod_box_details">
        <span> 
            <?php 
              if(isset($this->msg)){ 
                echo $this->msg;
              }    
            ?></span>
       <div class="contact_form">
          <div class="form_subtitle">Forgot Password</div>
          <form id="formForgot" name="formForgot" action="<?php echo URL_BASE?>/customers/postForgotPass" method="POST">
            <div class="form_row">
              <label class="contact"><strong>Enter your email:</strong></label>
              <input type="text" id="email" name="email" class="contact_input" />
            </div>

            <div class="form_row">
              <input type="submit" name="btnForgot" class="register" value="Send" />
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
<script type="text/javascript">
    $().ready(function() {
        $("#formForgot").validate({
            rules: {
                email: {
                  required: true,
                  email: true
                },
            },
            messages: {
                email: "Please enter a valid email address.",
            }
        });
    });
</script>
<style type="text/css">
    #formForgot label.error {
        color: #FB3A3A;
        margin-left: 0px;
        width: auto;
        display: inline;
    }
    span { color: #FB3A3A;}
</style>    