<?php echo $header; ?>

                    <!-- Start Form -->
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	
                        	<form id="step3" role="form" action="<?php echo base_url('vendor/createprocess/'.$step.'/'.$vendor_id); ?>" method="post" class="registration-form">
                        		
			                    <fieldset>
			                    		<div class="form-top">
			                        		<div class="form-top-left">
			                        			<h3>Step 3 / 4</h3>
			                            		<p>Compliance & Finance</p>
			                        		</div>
			                        		<div class="form-top-right">
			                        			<!--<i class="fa fa-user"></i>-->
			                        			<img  src="<?php echo base_url('assets/icons/logo-ldpi.png'); ?>">
			                        		</div>
		                            	</div>

		                            	<div class="form-bottom">
			                        		<div class="form-group">
			                        			<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
					                        	<label class="sr-only" for="pan_info">Pan</label>
					                        	<input value="<?php echo $pan_info; ?>" type="text" name="pan_info" placeholder="PAN" class="form-control" id="pan_info">
					                        </div>

					                        <div class="form-group">
					                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
					                        	<label class="sr-only" for="gst_info">Pan</label>
					                        	<input value="<?php echo $gst_info; ?>" type="text" name="gst_info" placeholder="GST" class="form-control" id="gst_info">
					                        </div>

					                        <div class="form-group">
					                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
					                    		<label class="sr-only" for="bank_id">Select Bank</label>
					                        	<select name="bank_id" id="bank_id" class="form-control">
					                        		<option value="">---Select Bank---</option>
					                        		<?php
					                        		if(isset($banklist) && count($banklist) > 0)
					                        		{
					                        			foreach($banklist as $bl)
					                        			{
					                        			?>
					                        			<option <?php if($bl->bankid == $bank_id) { echo 'selected';} ?> value="<?php echo $bl->bankid; ?>"><?php echo $bl->bank_name; ?></option>
					                        			<?php
					                        			}
					                        		}
					                        		?>			                  
					                        	</select>
					                        </div>

					                        <div class="form-group">
					                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
					                        	<label class="sr-only" for="branch_name">Branch Name</label>
					                        	<input value="<?php echo $branch_name; ?>" type="text" name="branch_name" placeholder="Branch Name" class="form-control" id="branch_name">
					                        </div>

					                        <div class="form-group">
					                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
					                        	<label class="sr-only" for="acc_no">A/C No</label>
					                        	<input value="<?php echo $acc_no; ?>" type="text" name="acc_no" placeholder="A/C No" class="form-control" id="acc_no">
					                        </div>

					                        <div class="form-group">
					                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
					                        	<label class="sr-only" for="ifsc_code">IFSC</label>
					                        	<input value="<?php echo $ifsc_code; ?>" type="text" name="ifsc_code" placeholder="IFSC" class="form-control" id="ifsc_code">
					                        </div>

					                        <div class="form-group">
					                        	<div><img width="10" height="10" src="<?php echo base_url('assets/icons/asterisk.jpg'); ?>"></div>
					                    		<label class="sr-only" for="acc_type">Select A/C Type</label>
					                        	<select name="acc_type" id="acc_type" class="form-control">
					                        		<option value="">---Select A/C Type---</option>
					                        		<option <?php if($acc_type == 'S') { echo 'selected';} ?> value="S">Savings Account</option>
					                        		<option <?php if($acc_type == 'C') { echo 'selected';} ?> value="C">Current Account</option>
					                        		<option <?php if($acc_type == 'CCR') { echo 'selected';} ?> value="CCR">Cash Credit</option>			                  
					                        	</select>
					                        </div>

					                        <button id="prev" type="button" class="btn btn-previous">Previous</button>
					                        <button id="next" type="submit" class="btn btn-next">Next</button>
				                    </div>

			                    </fieldset>
		                    	
		                    </form>

                        </div>

                    </div>
                    <!-- End Form -->

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
			var e_pan_info = '';
			var e_gst_info = '';
			var e_bank_id = '';
			var e_branch_name = '';
			var e_acc_no = '';
			var e_ifsc_code = '';
			var e_acc_type = '';

			var separator = "<br/>";

			if($("#pan_info").val().trim() == '')
			{
				e_pan_info = 'Pan details required.' + separator;
			}
			else
			{
				e_pan_info = '';
			}

			if($("#gst_info").val().trim() == '')
			{
				e_gst_info = 'GST details required.' + separator;
			}
			else
			{
				e_gst_info = '';
			}

			if($("#bank_id").val().trim() == '')
			{
				e_bank_id = 'Bank required.' + separator;
			}
			else
			{
				e_bank_id = '';
			}

			if($("#branch_name").val().trim() == '')
			{
				e_branch_name = 'Branch required.' + separator;
			}
			else
			{
				e_branch_name = '';
			}

			if($("#acc_no").val().trim() == '')
			{
				e_acc_no = 'A/C no required.' + separator;
			}
			else
			{
				e_acc_no = '';
			}

			if($("#ifsc_code").val().trim() == '')
			{
				e_ifsc_code = 'IFSC code required.' + separator;
			}
			else
			{
				e_ifsc_code = '';
			}

			if($("#acc_type").val().trim() == '')
			{
				e_acc_type = 'A/C type required.' + separator;
			}
			else
			{
				e_acc_type = '';
			}

			e_str = e_pan_info + e_gst_info + e_bank_id + e_branch_name + e_acc_no + e_ifsc_code + e_acc_type;

			if(e_str.length == 0)
			{
				$("#step3").submit();
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
        