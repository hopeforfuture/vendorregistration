<?php echo $header; ?>
<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
		<div class="card-body">
		  <h4 class="card-title">Vendor Assign Page</h4>
		  <form style="width: 50%;" id="vendorassign" class="pt-3" method="post" action="<?php echo base_url('admin/vendor/assignprocess/'.$contact_id); ?>">
		  <ul style="list-style-type:none;">
			<li><input type="checkbox" id="select_all"/> Check/Uncheck All</li>
			<?php
				if(count($vendors) > 0)
				{
					foreach($vendors as $vendor)
					{
						
					
			?>
				<li><input <?php if($vendor->vendor_id == $vendor->contactvendor){ echo 'checked';} ?> class="checkbox" type="checkbox" name="vendorinfo[]" value="<?php echo $vendor->vendor_id; ?>"> <?php echo $vendor->company_name; ?></li>
			
			<?php
					}
				}
			?>
			<li>
				<input type="hidden" name="contact_id" id="contact_id" value="<?php echo $contact_id; ?>" />
				<button style="width:50%;" type="submit" id="btnSave" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SAVE</button>
				<!--<button style="width:50%;" type="button" id="btnBack" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">BACK</button>-->
			</li>
		 </ul>
		 </form>
		 </div>
	   </div>
	 </div>
</div>
<?php echo $footer; ?>

<script type="text/javascript">
	$(document).ready(function(){
		//select all checkboxes
		$("#select_all").change(function(){  //"select all" change 
			$(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
		});

		//".checkbox" change 
		$('.checkbox').change(function(){ 
			//uncheck "select all", if one of the listed checkbox item is unchecked
			if(false == $(this).prop("checked")){ //if this item is unchecked
				$("#select_all").prop('checked', false); //change "select all" checked status to false
			}
			//check "select all" if all checkbox items are checked
			if ($('.checkbox:checked').length == $('.checkbox').length ){
				$("#select_all").prop('checked', true);
			}
		});
		
		/*$("#btnSave").click(function(e){
			e.preventDefault();
			
			var len = $('.checkbox:checked').length;
			
			if(len == 0)
			{
				alert('Please check atleast one vendor.');
				return false;
			}
			
			$("#vendorassign").submit();
		});*/
		
		/*$("#btnBack").click(function(e){
			e.preventDefault();
			window.location.href = '<?php echo base_url('admin/contact/list'); ?>';
		});*/
	});
</script>