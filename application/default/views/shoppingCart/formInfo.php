<script type="text/javascript">
    $('#areaDelivery').hide();
    $("#payment").click(function() {
        $("#areaDelivery").hide();
    });
    $("#delivery").click(function() {
        $("#areaDelivery").show();
    });
</script>
<div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" /></span>Register</div>
<div class="feat_prod_box_details">
    <p class="details"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. </p>
    <div class="contact_form">
        <div class="form_subtitle">Customers infomation</div>
        <form name="frmCustomer" id="frm-Customer">
            <p style="border-bottom: 1px black dashed; width: 100%; text-align: center"><span style="color: #A81F22;">Payment adrres</span></p>
            <div class="form_row">
                <label class="contact"><strong>First name:</strong></label>
                <input type="text" class="contact_input" name="txtCus_firtName"/>
            </div>
            <div class="form_row">
                <label class="contact"><strong>Last name:</strong></label>
                <input type="text" class="contact_input" name="txtCus_lastName"/>
            </div>
            <div class="form_row">
                <label class="contact"><strong>Email:</strong></label>
                <input type="text" class="contact_input" name="txtCus_email"/>
            </div>
            <div class="form_row">
                <label class="contact"><strong>Phone:</strong></label>
                <input type="text" class="contact_input" name="txtCus_phone"/>
            </div>
            <div class="form_row">
                <label class="contact"><strong>Adrres:</strong></label>
                <input type="text" class="contact_input" name="txtCus_adrres"/>
            </div>
            <div class="form_row">
                <label class="contact"><strong>Requirement:</strong></label>
                <textarea class="contact_textarea" name="txtRequirement"></textarea>
            </div>
            <p>
                <label>Payment and Delivery in an one adrres</label>
                <input type="radio" name="checkAdrres" checked="true" id="payment">True
                <input type="radio" name="checkAdrres" id="delivery" >False
            </p>
            <br>
            <div id='areaDelivery'>
                <p style="border-bottom: 1px black dashed; width: 100%;text-align: center"><span style="color: #A81F22;">Delivery adrres</span></p>
                <div class="form_row">
                    <label class="contact"><strong>Name:</strong></label>
                    <input type="text" class="contact_input" name="txtRec_name"/>
                </div>
                <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input type="text" class="contact_input" name="txtRec_email"/>
                </div>
                <div class="form_row">
                    <label class="contact"><strong>Phone:</strong></label>
                    <input type="text" class="contact_input" name="txtRec_phone"/>
                </div>
                <div class="form_row">
                    <label class="contact"><strong>Adrres:</strong></label>
                    <input type="text" class="contact_input" name="txtRec_adress"/>
                </div>
            </div>
            <div class="form_row">
                <input type="button" class="register" value="Next" onclick="DefaultController.saveOrder();" />
            </div>
        </form>
    </div>
</div>
<div class="clear"></div>
</div>