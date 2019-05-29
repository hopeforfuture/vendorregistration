<?php echo $header; ?>
			
                    <div class="row">
                    	
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	
                        	<form role="form" action="<?php echo base_url('vendor/createprocess/'.$step.'/'.$vendor_id); ?>" method="post" class="registration-form" enctype="multipart/form-data" id="step1">
                        		
                        		<fieldset>
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 1 / 4</h3>
		                            		<p>Country & Type</p>
		                            		<?php
		                            			if($this->session->flashdata('msg'))
		                            			{
		                            			echo "<p style='color:red; font-weight:bold;'>".$this->session->flashdata('msg')."</p>";
		                            			}
		                            		?>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<!--<i class="fa fa-user"></i>-->
		                        			<img  src="<?php echo base_url('assets/icons/logo-ldpi.png'); ?>">
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
				                    	<div class="form-group">
				                    		<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                    		<label class="sr-only" for="vendor_country">Select Country</label>
				                        	<select  name="vendor_country" id="vendor_country" class="form-control">
				                        		<option value="">---Select Country---</option>
				                        		<?php
				                        		if(isset($countrylist) && count($countrylist) > 0)
				                        		{
				                        			foreach($countrylist as $cl)
				                        			{
				                        			?>
				                        			<option <?php if($cl->country_id == $vendor_country){ echo 'selected';} ?> value="<?php echo $cl->country_id; ?>"><?php echo $cl->country_name; ?></option>
				                        			<?php
				                        			}
				                        		}
				                        		?>
				                        	</select>
				                        </div>


				                        <div class="form-group">
				                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                    		<label class="sr-only" for="vendor_type_id">Select Vendor Type</label>
				                        	<select name="vendor_type_id" id="vendor_type_id" class="form-control">
				                        		<option value="">---Select Type---</option>
				                        		<?php
				                        		if(isset($vendors) && count($vendors) > 0)
				                        		{
				                        			foreach($vendors as $v)
				                        			{
				                        			?>
				                        			<option <?php if($v->vtype_id == $vendor_type_id){ echo 'selected';} ?> value="<?php echo $v->vtype_id; ?>"><?php echo ucwords($v->vtype_name); ?></option>
				                        			<?php
				                        			}
				                        		}
				                        		?>
				                        	</select>
				                        </div>

				                        <button id="next" type="submit" class="btn btn-next">Next</button>
				                    </div>
			                    </fieldset>
			                    
		                    </form>
		                    
                        </div>
                    </div>

<?php echo $footer; ?>

<script type="text/javascript">
	$(document).ready(function(){
		
		$("#next").click(function(e){
			e.preventDefault();
			var e_str = '';
			var e_vendor_country = '';
			var e_vendor_type_id = '';

			var separator = "<br/>";
			
			var vendor_country = $("#vendor_country").val();
			var vendor_type_id = $("#vendor_type_id").val();
			
			if(vendor_country == '')
			{
				e_vendor_country = 'Country required' + separator;
			}
			else
			{
				e_vendor_country = '';
			}

			if(vendor_type_id == '')
			{
				e_vendor_type_id = 'Vendor type required' + separator;
			}
			else
			{
				e_vendor_type_id = '';
			}

			e_str = e_vendor_country + e_vendor_type_id;

			if(e_str.length == 0)
			{
				$('#step1').submit();
			}
			else
			{
				$("#modal-content").html(e_str);
				$("#myModal").modal();
				return false;
			}
			
		});

	});


</script>
        