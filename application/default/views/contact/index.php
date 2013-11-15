<form action="<?php echo URL_BASE?>/default/contact/insertAction" method="post">
    <div class="contact_form">
        <div class="form_subtitle">Send Me Your Contact</div>
        <div class="form_row">
            <label class="contact"><strong>Full Name:</strong></label>
            <input type="text" class="contact_input" name="full_name" />
        </div>
        <div class="form_row">
            <label class="contact"><strong>Email:</strong></label>
            <input type="text" class="contact_input" name="email"/>
        </div>
        <div class="form_row">
            <label class="contact"><strong>Title:</strong></label>
            <input type="text" class="contact_input" name="title"/>
        </div>
        <div class="form_row">
            <label class="contact"><strong>Content:</strong></label>
            <textarea class="contact_textarea" name="content"></textarea>
        </div>
         <div class="form_row">
            <input type="hidden" value="" name="post_date" />
        </div>
        <div class="form_row">
            <input type="hidden" value="" name="statut" value="0"/>
        </div>
        <div class="form_row"><input type="submit" value="Send"></div>
    </div>
</form>