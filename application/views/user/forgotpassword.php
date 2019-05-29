<?php echo $header ?>

 <div class="row"> 

    <div class="col-sm-6 col-sm-offset-3 form-box">
    	<form role="form" action="" method="post" class="registration-form"  id="formpassword">

    		<fieldset>
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Forgot Password</h3>
                            <?php if(isset($login_msg)){ echo '<p style="color:red;font-weight:bold;">'.$login_msg.'</p>';} ?>
                        </div>
                        <div class="form-top-right">
                            <img  src="<?php echo base_url('assets/icons/logo-ldpi.png'); ?>">
                        </div>
                    </div>

                    <div class="form-bottom">
        				<div id="credentialarea" class="form-group">
                        	<label class="sr-only" for="loginname">Email OR Phone</label>
                        	<input required="required" type="text" name="loginname" placeholder="Email OR Phone" class="form-control" id="loginname">
                        </div>
						
						<div class="form-group" id="otparea" style="display:none">
							<label class="sr-only" for="txtOtp">Enter Verification Code</label>
                        	<input required="required" type="password" name="txtOtp" placeholder="Verification Code" class="form-control" id="txtOtp">
						</div>
						
						<div class="form-group" id="passwordarea" style="display:none">
							<label class="sr-only" for="txtPassword">Password</label>
                        	<input required="required" type="password" name="txtPassword" placeholder="Password" class="form-control" id="txtPassword">
							
							<label class="sr-only" for="txtconfPassword">Confirm Password</label>
                        	<input required="required" type="password" name="txtconfPassword" placeholder="Confirm Password" class="form-control" id="txtconfPassword">
						</div>

                        <button  id="forgotsubmit" type="submit" class="btn btn-next">Next</button>
						<button id="verification" type="submit" class="btn btn-next" style="display:none;">Next</button>
						<button id="setpassword" type="submit" class="btn btn-next" style="display:none;">Next</button>
						
                    </div>

    		</fieldset>
    	</form>
    </div>
 </div>
<?php echo $footer; ?>

<script type="text/javascript">
	$(document).ready(function(){
		
		
		$("#forgotsubmit").click(function(e){
			e.preventDefault();
			var errorstr = ''; 
			var credential = $("#loginname").val().trim();
			if(credential == '')
			{
				errorstr = 'Email OR Phone required.';
			}
			else
			{
				errorstr = '';
			}
			
			if(errorstr.length > 0)
			{
				$("#modal-content").html(errorstr);
				$("#myModal").modal();
				return false;
			}
			
			var targeturl = '<?php echo base_url("ajax/forgotpassword"); ?>';
			
			$.ajax({
				type : "POST",
				data : {credential : credential},
				url: targeturl,
				success : function(response){
					var res = JSON.parse(response);
					
					if(res.status == false)
					{
						$("#modal-content").html(res.msg);
						$("#myModal").modal();
					}
					else
					{
						$("#credentialarea").hide();
						$("#otparea").show();
						$("#forgotsubmit").attr('disabled', true);
						$("#forgotsubmit").hide();
						$("#verification").show();
					}
					
				}
			});
		
		});	
		
		$("body").on("click", "#verification", function(e){
			e.preventDefault();
			var errorotp = '';
			
			var otp = $("#txtOtp").val().trim();
			
			if(otp == '')
			{
			  errorotp = 'Verification code required';
			}
			else
			{
				errorotp = '';
			}
			
			if(errorotp.length > 0)
			{
				$("#modal-content").html(errorotp);
				$("#myModal").modal();
				return false;
			}
			
			var targeturl = '<?php echo base_url("ajax/verifyotp"); ?>';
			
			$.ajax({
				type : "POST",
				data : {code : otp},
				url: targeturl,
				success : function(response){
					var res = JSON.parse(response);
					
					if(res.status == false)
					{
						$("#modal-content").html(res.msg);
						$("#myModal").modal();
					}
					else
					{
						$("#credentialarea").hide();
						$("#otparea").hide();
						$("#passwordarea").show();
						
						$("#forgotsubmit").attr('disabled', true);
						$("#forgotsubmit").hide();
						$("#verification").attr('disabled', true);
						$("#verification").hide();
						$("#setpassword").show();
					}
					
				}
			});
			
			
		});
		
		$("body").on("click", "#setpassword", function(e){
			e.preventDefault();
			var error_pswd = '';
			
			var pswd = $("#txtPassword").val();
			var confpswd = $("#txtconfPassword").val();
			
			if(pswd == '')
			{
				error_pswd = 'Password Required';
			}
			else if(pswd.length < 6)
			{
				error_pswd = 'Password minimum length should be 6.';
			}
			else if(pswd.length > 15)
			{
				error_pswd = 'Password maximum length should be 15.';
			}
			else if(pswd != confpswd)
			{
				error_pswd = 'Password mismatch occured.';
			}
			
			if(error_pswd.length > 0)
			{
				$("#modal-content").html(error_pswd);
				$("#myModal").modal();
				return false;
			}
			
			var formaction = '<?php echo base_url("forgotpassword"); ?>';
			
			$("#formpassword").attr('action', formaction);
			
			$("#formpassword").submit();
		});
		
	});
</script>