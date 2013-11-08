<script type="text/javascript">
    $().ready(function() {
        $("#adsForm").validate({
            rules: {
                name: "required",
                ads_url: "required",
                date_start: "required",
                date_end: "required"
            },
            messages: {
                name: "Please enter name.",
                ads_url: "Please enter url.",
                date_start: "Please enter date start.",
                date_end: "Please enter date end."
            }
        });
    });
</script>
<style type="text/css">
    #adsForm label.error {
        color: #FB3A3A;
        margin-left: 10px;
        width: auto;
        display: inline;
    }
</style>
<div>
	<h2><?php echo ( $this->create ? 'New Ads' : 'Edit Ads' )?> </h2>
        <form id="adsForm" action="<?php echo URL_BASE?>/admin/ads/<?php echo ( $this->create ? 'postCreate' : 'postEdit' )?>" method="POST" enctype="multipart/form-data">                    
	<input type="hidden" name="adsId" value="<?php echo ( $this->create ? '' : $this->ads->getAdsId() )?>" />
    <fieldset><legend>Upload Picture</legend>
    <div>
        <div>
            <div>
                <label for="picture"></label>                  
				<div>
					<input type="file" value="" id="image" name="image[]" multiple/>
                </div>
            </div> 
            <div><img src="<?php echo URL_BASE?>/<?php echo ( $this->create ? '' : $this->ads->getImage() )?>" alt=""height="70" width="70"/></div>
        </div>
    </div></fieldset>     
	
    <fieldset><legend>Basic Information</legend>			
        <p><label for="name">Name</label>              
		    <input class="text-long" type="text" id="name" name="name" value="<?php echo ( $this->create ? '' : $this->ads->getName() ); ?>" placeholder="Ads Name...">
        </p>    
        <p><label for="ads_url">Ads Url</label>              
            <input class="text-long" type="text" id="ads_url" name="ads_url" value="<?php echo ( $this->create ? '' : $this->ads->getUrl() ); ?>" placeholder="Ads url...">
		</p>  
        <p><label for="date_start">Date Start</label>              
            <input class="datepicker" type="text" id="date_start" name="date_start" value="<?php echo ( $this->create ? '' : date_format(date_create($this->ads->getDateStart()), 'm/d/Y')); ?>" placeholder="Date start...">
		</p>    
        <p><label for="date_end">Date End</label>              
            <input class="datepicker" type="text" id="date_end" name="date_end" value="<?php echo ( $this->create ? '' : date_format(date_create($this->ads->getDateEnd()), 'm/d/Y')); ?>" placeholder="Date end...">
		</p>
        <p>
            <a href="<?php echo URL_BASE?>/admin/ads" class="btn">Back</a>
            <input type="submit" id="submit" value="<?php echo ( $this->create ? 'New Ads' : 'Save' )?>" class="btn btn-primary">
        </p> 
    </fieldset>
        </form>          
</div>


