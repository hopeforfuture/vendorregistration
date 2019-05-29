<?php echo $header; ?>

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	
                        	<form enctype="multipart/form-data" action="<?php echo base_url('vendor/createprocess/'.$step.'/'.$vendor_id); ?>" role="form"  method="post" id="step2" class="registration-form">
                        	
			                    <fieldset>
			                    	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 2 / 4</h3>
		                            		<p>Personal details</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<!--<i class="fa fa-user"></i>-->
		                        			<img  src="<?php echo base_url('assets/icons/logo-ldpi.png'); ?>">
		                        		</div>
		                            </div>

		                            <div class="form-bottom">

		                        		<div class="form-group">
		                        			<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                        	<label class="sr-only" for="company_name">Company Name</label>
				                        	<input value="<?php echo $company_name; ?>" type="text" name="company_name" placeholder="Company Name" class="form-control" id="company_name">
				                        </div>

				                        <div class="form-group">
				                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                    		<label class="sr-only" for="company_type_id">Select Company Type</label>
				                        	<select name="company_type_id" id="company_type_id" class="form-control">
				                        		<option value="">---Select Company Type---</option>
				                        		<?php
				                        		if(isset($companytypelist) && count($companytypelist) > 0)
				                        		{
				                        			foreach($companytypelist as $ctl)
				                        			{
				                        			?>
				                        			<option <?php if($ctl->ctype_id == $company_type_id) { echo 'selected';} ?> value="<?php echo $ctl->ctype_id; ?>"><?php echo $ctl->ctype_name; ?></option>
				                        			<?php
				                        			}
				                        		}
				                        		?>
				                        	</select>
				                        </div>

				                        <div class="form-group">
				                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                        	<label class="sr-only" for="company_address">Company Address</label>
				                        	<textarea name="company_address" class="form-control" id="company_address" placeholder="Registered Office"><?php echo $company_address; ?></textarea>
				                        </div>

				                        <div class="form-group">
				                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                    		<label class="sr-only" for="state_id">Select State</label>
				                        	<select name="state_id" id="state_id" class="form-control">
				                        		<option value="">---Select State---</option>
				                        		<?php
				                        		if(isset($statelist) && count($statelist) > 0)
				                        		{
				                        			foreach($statelist as $sl)
				                        			{
				                        			?>
				                        			<option <?php if($sl->StateID == $state_id) { echo 'selected';} ?> value="<?php echo $sl->StateID; ?>"><?php echo $sl->StateName; ?></option>
				                        			<?php
				                        			}
				                        		}
				                        		?>				                  
				                        	</select>
				                        </div>

				                        <div class="form-group">
				                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                        	<label class="sr-only" for="city_name">City</label>
				                        	<input value="<?php echo $city_name; ?>" type="text" name="city_name" placeholder="City Name" class="form-control" id="city_name">
				                        </div>

				                        <div class="form-group">
				                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                        	<label class="sr-only" for="company_pin">Pin Code</label>
				                        	<input value="<?php echo $company_pin; ?>" type="number" maxlength="6" name="company_pin" placeholder="Pin Code" class="form-control" id="company_pin"
				                        	oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
				                        </div>

				                        <div class="form-group">
				                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                        	<label class="sr-only" for="company_tel1">Company Telephone 1</label>
				                        	<input value="<?php echo $company_tel1; ?>" type="text" name="company_tel1" placeholder="Company Telephone 1" class="form-control" id="company_tel1">
				                        </div>

				                        <div class="form-group">
				                        	<label class="sr-only" for="company_tel2">Company Telephone 2</label>
				                        	<input value="<?php echo $company_tel2; ?>" type="text" name="company_tel2" placeholder="Company Telephone 2" class="form-control" id="company_tel2">
				                        </div>

				                        <div class="form-group">
				                        	<label class="sr-only" for="company_url">Company Url</label>
				                        	<input value="<?php echo $company_url; ?>" type="text" name="company_url" placeholder="Company URL" class="form-control" id="company_url">
				                        </div>

				                        <div class="form-group">
				                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                        	<label class="sr-only" for="contact_p_name">Contact Person Name</label>
				                        	<input value="<?php echo $contact_p_name; ?>" type="text" name="contact_p_name" placeholder="Contact Person Name" class="form-control" id="contact_p_name">
				                        </div>

				                        <div class="form-group">
				                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                        	<label class="sr-only" for="contact_p_post">Contact Person Designation</label>
				                        	<input value="<?php echo $contact_p_post; ?>" type="text" name="contact_p_post" placeholder="Designation" class="form-control" id="contact_p_post">
				                        </div>

				                        <div class="form-group">
				                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                        	<label class="sr-only" for="contact_p_mob">Contact Person Mobile</label>
				                        	<input value="<?php echo $contact_p_mob; ?>" type="text" name="contact_p_mob" placeholder="Mobile No" class="form-control" id="contact_p_mob">
				                        </div>

				                        <div class="form-group">
				                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
				                        	<label class="sr-only" for="contact_p_email">Contact Person Emal</label>
				                        	<input value="<?php echo $contact_p_email; ?>" type="text" name="contact_p_email" placeholder="Email Address" class="form-control" id="contact_p_email">
				                        </div>

				                        <button id="prev" type="button" class="btn btn-previous">Previous</button>
				                        <button type="submit" id="next" class="btn btn-next">Next</button>

				                    </div>

			                    </fieldset>			        
		                    </form>

		                    </div>
                        </div>
                    
<?php echo $footer; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#prev").click(function(){
			var step = '<?php echo $step; ?>';
			var vendor_id = '<?php echo $vendor_id; ?>';
			var prev_step = step - 1;

			var targeturl = '<?php echo base_url(); ?>' + 'vendor/create/'+prev_step+'/'+vendor_id; 

			window.location.href  = targeturl;
		});

		$("#next").click(function(e){
			e.preventDefault();
			var e_str = '';
			var e_company_name = '';
			var e_company_type_id = '';
			var e_company_address = '';
			var e_state_id = '';
			var e_city_name = '';
			var e_company_pin = '';
			var e_company_tel1 = '';
			var e_company_tel2 = '';
			var e_company_url = '';
			var e_contact_p_name = '';
			var e_contact_p_post = '';
			var e_contact_p_mob = '';
			var e_contact_p_email = '';

			var separator = "<br/>";

			var company_name = $("#company_name").val().trim();
			var company_type_id = $("#company_type_id").val().trim();
			var company_address = $("#company_address").val().trim();
			var state_id = $("#state_id").val();
			var city_name = $("#city_name").val();
			var company_pin = $("#company_pin").val();
			var company_tel1 = $("#company_tel1").val().trim();
			var company_tel2 = $("#company_tel2").val();
			var company_url = $("#company_url").val().trim();
			var contact_p_name = $("#contact_p_name").val().trim();
			var contact_p_post = $("#contact_p_post").val().trim();
			var contact_p_mob = $("#contact_p_mob").val().trim();
			var contact_p_email = $("#contact_p_email").val().trim();

			if(company_name == '')
			{
				e_company_name = 'Company name required' + separator;
			}
			else
			{
				e_company_name = '';
			}
			if(company_type_id == '')
			{
				e_company_type_id = 'Company type required' + separator;
			}
			else
			{
				e_company_type_id = '';
			}
			if(company_address == '')
			{
				e_company_address = 'Company address required' + separator;
			}
			else
			{
				e_company_address = '';
			}
			if(state_id == '')
			{
				e_state_id = 'State required' + separator;
			}
			else
			{
				e_state_id = '';
			}
			if(city_name == '')
			{
				e_city_name = 'City required' + separator;
			}
			else
			{
				e_city_name = '';
			}
			if(company_pin == '')
			{
				e_company_pin = 'Pin code required' + separator;
			}
			else
			{
				e_company_pin = '';
			}
			if(company_tel1 == '')
			{
				e_company_tel1 = 'Telephone required' + separator;
			}
			else
			{
				e_company_tel1 = '';
			}
			if(company_url.length > 0)
			{
				var regForUrl = /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

				if (!regForUrl.test(company_url)) 
				{
				    e_company_url = 'Not a valid url' + separator;
				}
				else
				{
					e_company_url = '';
				}
			}
			if(contact_p_name == '')
			{
				e_contact_p_name = 'Contact person name required' + separator;
			}
			else
			{
				e_contact_p_name = '';
			}
			if(contact_p_post == '')
			{
				e_contact_p_post = 'Contact person post required' + separator;
			}
			else
			{
				e_contact_p_post = '';
			}
			if(contact_p_mob == '')
			{
				e_contact_p_mob = 'Contact person mobile no required' + separator;
			}
			else if(contact_p_mob.length > 0)
			{
				var targeturl = '<?php echo base_url("ajax/checkduplicate"); ?>';
				var data = {contact_mob:contact_p_mob, val_type: 'mob'};
				$.ajax({
					type: "POST",
					url: targeturl,
					data: data,
					async: false,
					success: function(response)
					{
						var res = JSON.parse(response);

						if(res.status)
						{
							e_contact_p_mob= '';
						}
						else
						{
							e_contact_p_mob= 'Contact mobile already exists' + separator;
						}
					}
				});
			}
			
			//contact_p_email
			if(contact_p_email == '')
			{
				e_contact_p_email = 'Email required.' + separator;
			}
			else if(contact_p_email.length > 0)
			{
				var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				if(!contact_p_email.match(mailformat))
				{
					e_contact_p_email= 'Not a valid email' + separator;

				}
				else
				{
					var targeturl = '<?php echo base_url("ajax/checkduplicate"); ?>';
					var data = {contact_email:contact_p_email, val_type: 'email'};
					$.ajax({
						type: "POST",
						url: targeturl,
						data: data,
						async: false,
						success: function(response)
						{
							var res = JSON.parse(response);

							if(res.status)
							{
								e_contact_p_email= '';
							}
							else
							{
								e_contact_p_email= 'Email already exists' + separator;
							}
						}
					});


					//e_contact_p_email= '';
				}
			}
			

			e_str = e_company_name + e_company_type_id + e_company_address + e_state_id + e_city_name + e_company_pin + e_company_tel1 + 
			e_company_url + e_contact_p_name + e_contact_p_post + e_contact_p_mob + e_contact_p_email;

			if(e_str.length == 0)
			{
				$("#step2").submit();
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
        