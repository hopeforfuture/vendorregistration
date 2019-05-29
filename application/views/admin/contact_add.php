<?php echo $header; ?>

<?php
	$action = base_url('admin/contact/add');
	$contact_name = '';
	$contact_email = '';
	$contact_phone = '';
	if(isset($contact_id) && ($contact_id > 0) && (!empty($contactinfo)))
	{
		$action = base_url('admin/contact/edit/'.$contact_id);
		
		$contact_name = $contactinfo->contact_name;
		$contact_email = $contactinfo->contact_email;
		$contact_phone = $contactinfo->contact_phone;
	}
?>



<form style="width: 50%;" id="contact" class="pt-3" method="post" action="<?php echo $action; ?>">
	<?php if(isset($msg)) { echo "<p style='text-align:center; color:red;font-weight:bold;'>".$msg."</p>";} ?>

	<div class="form-group">
	  <input value="<?php echo $contact_name;  ?>" required="required" type="text" class="form-control form-control-lg" id="contact_name" name="contact_name" placeholder="Name">
	</div>

	<div class="form-group">
	  <input value="<?php echo $contact_email;  ?>" required="required" type="email" class="form-control form-control-lg" id="contact_email" name="contact_email" placeholder="Email">
	</div>
	
	<div class="form-group">
	  <input value="<?php echo $contact_phone;  ?>" required="required" type="text" class="form-control form-control-lg" id="contact_phone" name="contact_phone" placeholder="Phone">
	</div>

	<div class="mt-3">
	  <input type="hidden" name="contact_id" id="contact_id" value="<?php echo (isset($contact_id)) ? $contact_id : 0; ?>" />
	  <button type="submit" id="btnSave" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SAVE</button>
	</div>

</form>
<?php echo $footer; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#btnSave").click(function(e){
			//alert('Submitted');
			e.preventDefault();
			
			var e_str = '';
			var e_contact_name = '';
			var e_contact_email = '';
			var e_contact_phone = '';
			var separator = "\n";
			
			var contact_name = $("#contact_name").val().trim();
			var contact_email = $("#contact_email").val().trim();
			var contact_phone = $("#contact_phone").val().trim();
			var contact_id = $("#contact_id").val();
			
			if(contact_name == '')
			{
				e_contact_name = 'Name required.' + separator;
			}
			else
			{
				e_contact_name = '';
			}
			
			if(contact_email == '')
			{
				e_contact_email = 'Email required.' + separator;
			}
			else if(contact_email.length > 0)
			{
				var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				if(!contact_email.match(mailformat))
				{
					e_contact_email= 'Not a valid email' + separator;
				}
				else
				{
					var targeturl = '<?php echo base_url("ajax/checkduplicateemail"); ?>';
					var data = {contact_email:contact_email, contact_id : contact_id};
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
								e_contact_email= '';
							}
							else
							{
								e_contact_email = 'Email already exists' + separator;
							}
						}
					});
				}
				
			}
			if(contact_phone == '')
			{
				e_contact_phone = 'Phone required' + separator;
			}
			else
			{
				e_contact_phone = '';
			}
					
			e_str = e_contact_name + e_contact_email + e_contact_phone;
			
			if(e_str.length > 0)
			{
				alert(e_str);
				return false;
			}
			else
			{
				$("#contact").submit();
			}
			
		});
	});
</script>