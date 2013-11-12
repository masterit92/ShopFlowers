      <div class="title"><span class="title_icon"><img src="<?php echo URL_BASE?>/templates/default/images/bullet1.gif" alt="" /></span>Change Password</div>
      <div class="feat_prod_box_details">
        <span>  <?php 
                  if(isset($this->msg)) echo $this->msg; 
                ?> 
        </span>
        <div class="contact_form">
          <div class="form_subtitle">change password</div>
          <form id="formChangePass" name="formChangePass" action="<?php echo URL_BASE?>/customers/postChangePass" method="POST">
            <div class="form_row">
              <label class="contact"><strong>Old Password:</strong></label>
              <input type="password" id="old_pass" name="old_pass" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>New Password:</strong></label>
              <input type="password" id="new_pass" name="new_pass" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Password Confirmation:</strong></label>
              <input type="password" id="confirm_pass" name="confirm_pass" class="contact_input" />
            </div>

            <div class="form_row">
              <input type="submit" name="btnChangePass" class="register" value="Save" />
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
<script type="text/javascript">
    $().ready(function() {
        $("#formChangePass").validate({
            rules: {
                old_pass: {
                  required: true,
                  minlength: 5
                },
                new_pass: {
                  required: true,
                  minlength: 5
                },
                confirm_pass: {
                  required: true,
                  minlength: 5,
                  equalTo: "#new_pass"
                }
            },
            messages: {
                old_pass: {
                  required: "Please provide old password.",
                  minlength: "Your password must be at least 5 characters long."
                },
                new_pass: {
                  required: "Please provide new password.",
                  minlength: "Your password must be at least 5 characters long."
                },
                confirm_pass: {
                  required: "Please provide confirm password.",
                  minlength: "Your password must be at least 5 characters long.",
                  equalTo: "Please enter the same password as above."
                }
            }
        });
    });
</script>
<style type="text/css">
    #formChangePass label.error {
        color: #FB3A3A;
        margin-left: 0px;
        width: auto;
        display: inline;
    }
    span { color: #FB3A3A;}
</style>    