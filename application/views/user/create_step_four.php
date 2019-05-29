<?php echo $header; ?>
<?php
	switch($company_type_id)
	{
		case 1:
			$style = "display:none;";
		break;

		case 2:
			$style = "display:block;";
		break;

		case 3:
			$style = "display:none;";
		break;
	}
?>
	<!-- Start Form -->
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	
                        	<form id="step4" role="form" action="<?php echo base_url('vendor/createprocess/'.$step.'/'.$vendor_id); ?>" method="post" class="registration-form" enctype="multipart/form-data">
                        		
			                    <fieldset>
			                    		<div class="form-top">
			                        		<div class="form-top-left">
			                        			<h3>Step 4 / 4</h3>
			                            		<p>Uploads(.pdf, .jpg and .png only)</p>
			                        		</div>
			                        		<div class="form-top-right">
			                        			<!--<i class="fa fa-user"></i>-->
			                        			<img  src="<?php echo base_url('assets/icons/logo-ldpi.png'); ?>">
			                        		</div>
		                            	</div>

		                            	<div class="form-bottom">
			                        		<div class="form-group">
			                        			<?php
			                        			if($company_type_id == 1 || $company_type_id == 3)
			                        			{
			                        			?>
			                        				<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
			                        			<?php
			                        			}
			                        			?>
			                        			
					                        	<label class="btn custom-input-btn"  for="trade_file">
						                        	<input style="display:none" type="file" name="trade_file" title="Current Trade License" class="form-control" id="trade_file" onchange="checkfiletype(this.value, 'trade_img_status')">
						                        	<i class="fa fa-cloud-upload"></i>&nbsp;Current Trade License
						                        	<img id="trade_img_status" >
					                        	</label>
					                        </div>
					                   
					                        <div class="form-group" style="<?php echo $style; ?>" >
					                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
					                        	<label class="btn custom-input-btn" for="cert_file">
					                        		<input style="display:none" type="file" name="cert_file" title="Certificate of incoporation" class="form-control" id="cert_file" onchange="checkfiletype(this.value, 'cert_img_status')">
					                        		<i class="fa fa-cloud-upload"></i>&nbsp;Certificate of incoporation
					                        		<img id="cert_img_status" >
					                        	</label>
					                        </div>

					                        <div class="form-group">
					                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
					                        	<label class="btn custom-input-btn" for="pan_file">
					                        		<input onchange="checkfiletype(this.value, 'pan_img_status')" style="display:none" type="file" name="pan_file" title="PAN" class="form-control" id="pan_file">
					                        		<i class="fa fa-cloud-upload"></i>&nbsp;PAN
					                        		<img id="pan_img_status" >
					                        	</label>
					                        </div>

					                        <div class="form-group">
					                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
					                        	<label class="btn custom-input-btn" for="gst_file">
					                        		<input onchange="checkfiletype(this.value, 'gst_img_status')" style="display:none" type="file" name="gst_file" title="GST" class="form-control" id="gst_file">
					                        		<i class="fa fa-cloud-upload"></i>&nbsp;GST
					                        		<img id="gst_img_status" >
					                        	</label>
					                        </div>

					                        <div class="form-group">
					                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
					                        	<label class="btn custom-input-btn" for="cancelled_cheque_file">
					                        		<input onchange="checkfiletype(this.value, 'cancelled_img_status')" style="display:none" type="file" name="cancelled_cheque_file" title="Cancelled Cheque" class="form-control" id="cancelled_cheque_file">
					                        		<i class="fa fa-cloud-upload"></i>&nbsp;Cancelled Cheque
					                        		<img id="cancelled_img_status" >
					                        	</label>
					                        </div>

					                   <input type="hidden" name="company_type_id" id="company_type_id" value="<?php echo $company_type_id; ?>">
					                   <button id="prev" type="button" class="btn btn-previous">Previous</button>
					                   <button id="next" type="submit" class="btn btn-next">Next</button>

					                   </div> 

		                        </fieldset>

		                    </form>

		                </div>

		           </div>
<?php echo $footer; ?>

<script type="text/javascript">

	function checkfiletype(filename, area)
	{
		var iconok = '<?php echo base_url("assets/icons/tick-32x32.png"); ?>';
		var iconcancel = '<?php echo base_url("assets/icons/close-32x32.png"); ?>'; 
		var allowed_types = ['jpeg', 'jpg', 'png', 'pdf'];

		var ext = filename.split('.').pop().toLowerCase();

		if(allowed_types.indexOf(ext) == -1)
		{
			$("#"+area).attr('src', iconcancel);
		}
		else
		{
			$("#"+area).attr('src', iconok);
		}
	}

	$(document).ready(function(){
 
		var allowed_types = ['jpeg', 'jpg', 'png', 'pdf'];

		$("#prev").click(function(){
			var step = '<?php echo $step; ?>';
			var vendor_id = '<?php echo $vendor_id; ?>';
			var prev_step = step - 1;

			var targeturl = '<?php echo base_url(); ?>' + 'vendor/create/'+prev_step+'/'+vendor_id; 

			window.location.href  = targeturl;
		});

		$("#next").click(function(e){
			e.preventDefault();
			var company_type = $("#company_type_id").val();
			var e_str = '';
			var e_trade_file = '';
			var e_cert_file = '';
			var e_pan_file = '';
			var e_gst_file = '';
			var e_cancelled_cheque_file = '';
			var separator = "<br/>";

			var trade_extension = $('#trade_file').val().split('.').pop().toLowerCase();
			var cert_extension = '';
			var pan_extension = $('#pan_file').val().split('.').pop().toLowerCase();
			var gst_extension = $('#gst_file').val().split('.').pop().toLowerCase();
			var cancelled_cheque_file_extension = $('#cancelled_cheque_file').val().split('.').pop().toLowerCase();

			if(company_type == 2)
			{
				cert_extension = $('#cert_file').val().split('.').pop().toLowerCase();
			}

			
			if((company_type == 1) || (company_type == 3))
			{
				if(allowed_types.indexOf(trade_extension) != -1)
				{
					e_trade_file = '';
				}
				else
				{
					e_trade_file = 'Trade License document invalid' + separator;
				}

			}
			else if(company_type == 2)
			{
				if(trade_extension.length > 0)
				{
					if(allowed_types.indexOf(trade_extension) != -1)
					{
						e_trade_file = '';
					}
					else
					{
						e_trade_file = 'Trade License document invalid' + separator;
					}
				}
				if(allowed_types.indexOf(cert_extension) != -1)
				{
					e_cert_file = '';
				}
				else
				{
					e_cert_file = 'Trade License document invalid' + separator;
				}

			}
			

			if(allowed_types.indexOf(pan_extension) != -1)
			{
				e_pan_file = '';
			}
			else
			{
				e_pan_file = 'PAN document invalid' + separator;
			}

			if(allowed_types.indexOf(gst_extension) != -1)
			{
				e_gst_file = '';
			}
			else
			{
				e_gst_file = 'GST document invalid' + separator;
			}

			if(allowed_types.indexOf(cancelled_cheque_file_extension) != -1)
			{
				e_cancelled_cheque_file = '';
			}
			else
			{
				e_cancelled_cheque_file = 'Cancelled cheque  document invalid' + separator;
			}

			e_str = e_trade_file +  e_pan_file + e_gst_file + e_cancelled_cheque_file;

			if(e_str.length == 0)
			{
				$("#step4").submit();
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