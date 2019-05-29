<?php echo $header; ?>
<div class="body-area">
        
        <!--start of inner top panel-->
        <div class="inner-top">
            <?php
                if($this->session->flashdata('msg'))
                {
                    echo "<span style='color:red;font-weight:bold;'>".$this->session->flashdata('msg')."</span>";
                }
            ?>
            
            <div class="status-loop">
                <form id="password_change" action="<?php echo base_url('changepassword'); ?>"  method="post">
					<ul>
						<li> 
							<label>Old Password:</label>
							<input type="password" id="old_password"  />
						</li>
					</ul>
					<ul>
						<li> 
							<label>New Password:</label>
							<input type="password" id="contact_p_password" name="contact_p_password" />
						</li>
					</ul>
					<ul>
						<li> 
							<label>Confirm Password:</label>
							<input type="password" id="contact_conf_password"  />
						</li> 
					</ul>
					<ul>
						<li>
							<div class="confirm-btn">
								<input id="savepswd"  type="submit" value="Save" class="confirmPassword btnupload">	
							</div>
						</li>
					</ul>
				</form>
            </div>
        </div>
        <!--end of inner top panel-->
   
   </div>

   <?php echo $footer; ?>

   <script type="text/javascript">
       $(document).ready(function(){
		   $("#savepswd").click(function(e){
			   e.preventDefault();
			   
			   var error_str = '';
			   var err_old_str = '';
			   var error_new_str = '';
			   var error_conf_str = '';
			   
			   var old_password = $("#old_password").val();
			   var new_password = $("#contact_p_password").val();
			   var conf_password = $("#contact_conf_password").val();
			   
			   var separator = "<br>";
			   
			   if(old_password.length == 0)
			   {
				   err_old_str = 'Old Password Required.' + separator;
			   }
			   else
			   {
				  var targeturl = '<?php echo base_url("ajax/validatepassword"); ?>';
				  var data = {password: old_password};
				  $.ajax({
					  type: "post",
					  url: targeturl,
					  data: data,
					  async: false,
					  success: function(response)
					  {
						  var res = JSON.parse(response);
						  
						  if(res.status == false)
						  {
							  err_old_str = 'You entered wrong password' + separator;
						  }
						  else
						  {
							  err_old_str = ''; 
						  }
					  }
				  });
				  
			   }
			   
			   if(new_password.length < 6)
			   {
				   error_new_str = 'New password minimum length should be 6' + separator;
			   }
			   else if(new_password.length > 16)
			   {
				   error_new_str = 'New password maximum length should be 16' + separator;
			   }
			   else
			   {
				   error_new_str = '';
			   }
			   
			   if(new_password != conf_password)
			   {
				   error_conf_str = 'Password mismatch occur.' + separator;
			   }
			   else
			   {
				   error_conf_str = '';
			   }
			   
			   error_str = err_old_str + error_new_str + error_conf_str;
			   
			   
			   
			   if(error_str.length == 0)
			   {
				   $("#password_change").submit();
			   }
			   else
			   {
				   $("#modal-content").html(error_str);
				   $("#myModal").modal();
				   return false;
			   }
			   
		   });
       });
   </script>