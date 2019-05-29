<?php echo $header ?>
<?php
    $loginname = isset($loginname) ? $loginname : '';
?>
 <div class="row"> 

    <div class="col-sm-6 col-sm-offset-3 form-box">
    	<form role="form" action="<?php echo base_url('login'); ?>" method="post" class="registration-form"  id="login">

    		<fieldset>
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login with Username and Password</h3>
                            <?php if(isset($login_msg)){ echo '<p style="color:red;font-weight:bold;">'.$login_msg.'</p>';} ?>
							<?php
								if($this->session->flashdata('msg'))
								{
									echo '<p style="color:green;font-weight:bold;">'.$this->session->flashdata('msg').'</p>';
								}
							?>
                        </div>
                        <div class="form-top-right">
                            <img  src="<?php echo base_url('assets/icons/logo-ldpi.png'); ?>">
                        </div>
                    </div>

                    <div class="form-bottom">
        				<div class="form-group">
                        	<label class="sr-only" for="loginname">Company Name</label>
                        	<input required="required" type="text" name="loginname" placeholder="Email OR Phone" class="form-control" id="loginname" value="<?php echo $loginname; ?>">
                        </div>

                        <div class="form-group">
                        	<label class="sr-only" for="loginpassword">Password</label>
                        	<input required="required" type="password" name="loginpassword" placeholder="Password" class="form-control" id="loginpassword">
                        </div>

                        <button id="loginsubmit" type="submit" class="btn btn-next">Login</button>&nbsp;
						<button type="button" id="forgotpswd" class="btn btn-next">
							Forgot Password
						</button>
                    </div>

    		</fieldset>
    	</form>
    </div>
 </div>
<?php echo $footer; ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#loginsubmit").click(function(e){
            e.preventDefault();
            var e_str = '';
            var e_username = '';
            var e_password = '';
            var separator = "<br>";
            var username = $("#loginname").val().trim();
            var password = $("#loginpassword").val();

            if(username == '')
            {
              e_username = 'Username required' + separator;  
            }
            else
            {
                e_username = '';
            }

            if(password == '')
            {
                e_password = 'Password required' + separator;  
            }
            else
            {
                e_password = '';
            }

            e_str = e_username + e_password;


            if(e_str.length == 0)
            {
                $("#login").submit();
            }
            else
            {
                $("#modal-content").html(e_str);
                $("#myModal").modal();
                return false;
            }
            
        });
		
		$("#forgotpswd").click(function(e){
			var targeturl = '<?php echo base_url("forgotpassword"); ?>';
			window.location.href = targeturl;
		});
    });
</script>