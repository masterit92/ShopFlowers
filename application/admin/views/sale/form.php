<script type="text/javascript" src="<?php echo URL_BASE . '/templates/admin/style/ckeditor/ckeditor.js' ?>"></script>
<div>
    <h2><?php echo ( $this->create ? 'New Sale' : 'Edit Sale' )?> </h2>
        <form id="saleForm" action="<?php echo URL_BASE?>/admin/sale/<?php echo ( $this->create ? 'postCreate' : 'postEdit' )?>" method="POST" enctype="multipart/form-data">                    
    <input type="hidden" name="saleId" value="<?php echo ( $this->create ? '' : $this->sale->getSaleId() )?>" />
    <fieldset><legend>Upload Image</legend>
    <div>
        <div>
            <div>
                <label for="image"></label>                  
                <div>
                    <input type="file" value="" id="image" name="image[]" multiple/>
                    <input type="text" name="saleImage" value="<?php echo ( $this->create ? '' : $this->sale->getImage() )?>" />
                </div>
            </div> 
            <div><img src="<?php echo URL_BASE?>/<?php echo ( $this->create ? '' : $this->sale->getImage() )?>" alt=""height="70" width="70"/></div>
        </div>
    </div></fieldset>     
    
    <fieldset><legend>Basic Information</legend>            
        <p><label for="date_start">Date Start</label>              
            <input class="datepicker" type="text" id="date_start" name="date_start" value="<?php echo ( $this->create ? '' : date_format(date_create($this->sale->getDateStart()), 'm/d/Y')); ?>" placeholder="Date start...">
        </p>    
        <p><label for="date_end">Date End</label>              
            <input class="datepicker" type="text" id="date_end" name="date_end" value="<?php echo ( $this->create ? '' : date_format(date_create($this->sale->getDateEnd()), 'm/d/Y')); ?>" placeholder="Date end...">
        </p>
        <p><label for="percent">Percent decrease</label>              
            <input class="text-long" type="text" id="percent" name="percent" value="<?php echo ( $this->create ? '' : $this->sale->getPercentDecrease() ); ?>" placeholder="Percent decrease...">
        </p>
        <p><label>Content</label>
            <textarea rows="1" cols="1" name="content" id="about-content"><?php echo ( $this->create ? '' : $this->sale->getContent() ); ?></textarea>
            <script type="text/javascript">CKEDITOR.replace('about-content');</script>
        </p>
        <p>
            <a href="<?php echo URL_BASE?>/admin/sale" class="btn">Back</a>
            <input type="submit" id="submit" value="<?php echo ( $this->create ? 'New Sale' : 'Save' )?>" class="btn btn-primary">
        </p> 
    </fieldset>
        </form>          
</div>

<script type="text/javascript">
    $().ready(function() {
        $("#saleForm").validate({
            rules: {
                percent: "required",
                date_start: "required",
                date_end: "required"
            },
            messages: {
                percent: "Please enter percent decrease.",
                date_start: "Please enter date start.",
                date_end: "Please enter date end."
            }
        });
    });
</script>
<style type="text/css">
    #saleForm label.error {
        color: #FB3A3A;
        margin-left: 10px;
        width: auto;
        display: inline;
    }
</style>
