<script type="text/javascript">
    $('#areaDelivery').hide();
    $("#payment").click(function() {
        $("#areaDelivery").hide();
    });
    $("#delivery").click(function() {
        $("#areaDelivery").show();
    });
    $(".datepicker").datepicker();
</script>
<div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" /></span>Register</div>
<div class="feat_prod_box_details">
    <p class="details"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. </p>
    <div class="contact_form">
        <div class="form_subtitle">Customers infomation</div>
        <form name="frmCustomer" id="frm-Customer">
            <p style="border-bottom: 1px black dashed; width: 100%; text-align: center"><span style="color: #A81F22;">Payment adrres</span></p>
            <div class="customerInformation">

            </div>
            <div class="guestInfomartion">
                <div class="form_row">
                    <label class="contact"><strong>First name:</strong></label>
                    <input type="text" class="contact_input txtCus_firtName" name="txtCus_firtName" id="txtCus_firtName"/>
                </div>
                <div class="form_row">
                    <label class="contact"><strong>Last name:</strong></label>
                    <input type="text" class="contact_input txtCus_lastName" name="txtCus_lastName" id="txtCus_lastName"/>
                </div>
                <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input type="text" class="contact_input txtCus_email" name="txtCus_email" id="txtCus_email"/>
                </div>
                <div class="form_row">
                    <label class="contact"><strong>Phone:</strong></label>
                    <input type="text" class="contact_input txtCus_phone" name="txtCus_phone" id="txtCus_phone"/>
                </div>
                <div class="form_row">
                    <label class="contact"><strong>Adrres:</strong></label>
                    <input type="text" class="contact_input txtCus_adrres" name="txtCus_adrres" id="txtCus_adrres"/>
                </div>
            </div>
            <div class="form_row">
                <label class="contact"><strong>Requirement:</strong></label>
                <textarea class="contact_textarea" name="txtRequirement"></textarea>
            </div>
            <div class="form_row">
                <label class="contact"><strong>Delivery date: </strong></label>
                <input type="datetime" class="contact_input txtDelivery_date datepicker" name="txtDelivery_date" id="txtDelivery_date"/>
            </div>
            <br><br>
            <p>
                <label><strong>Payment and Delivery in an one adrres: </strong></label>
                <input type="radio" name="checkAdrres" checked="true" id="payment"><strong>True</strong>
                <input type="radio" name="checkAdrres" id="delivery" ><strong>False</strong>
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
                <input type="button" class="register" value="Next" onclick="DefaultController.loadPaymentMethod();" />
                <input type="button" class="register" value="Back" onclick="DefaultController.showCart();" style="margin-right: 15px;"/>
            </div>
        </form>
    </div>
</div>
<div class="clear"></div>
</div>