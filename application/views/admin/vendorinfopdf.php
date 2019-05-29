<!Doctype html>
<html>
	<head>
		<title>Vendor PDF</title>
	</head>
	<body>
		<table align="center">
			<tr>
				<td>Vendor Name</td>
				<td>:</td>
				<td><?php echo ucwords(strip_tags($vendorinfo->company_name)); ?></td>
			</tr>
			
			<tr>
				<td>Vendor Type</td>
				<td>:</td>
				<td><?php echo  ucwords($vendorinfo->vtype_name); ?></td>
			</tr>
			
			<tr>
				<td>Company Type</td>
				<td>:</td>
				<td><?php echo ucwords($vendorinfo->ctype_name); ?></td>
			</tr>
			
			<tr>
				<td>Vendor Address</td>
				<td>:</td>
				<td><?php echo  ucwords(strip_tags($vendorinfo->company_address)); ?></td>
			</tr>
			
			<tr>
				<td>State Name</td>
				<td>:</td>
				<td><?php echo ucwords($vendorinfo->StateName); ?></td>
			</tr>
			
			<tr>
				<td>City Name</td>
				<td>:</td>
				<td><?php echo ucwords(strip_tags($vendorinfo->city_name)); ?></td>
			</tr>
			
			<tr>
				<td>Pin Code</td>
				<td>:</td>
				<td><?php echo $vendorinfo->company_pin; ?></td>
			</tr>
			
			<tr>
				<td>Primary Tel No</td>
				<td>:</td>
				<td><?php echo strip_tags($vendorinfo->company_tel1); ?></td>
			</tr>
			
			<tr>
				<td>Alternate Tel No</td>
				<td>:</td>
				<td><?php echo empty($vendorinfo->company_tel2) ? 'Does not exists' : strip_tags($vendorinfo->company_tel2); ?></td>
			</tr>
			
			<tr>
				<td>Company URL</td>
				<td>:</td>
				<td><?php echo empty($vendorinfo->company_url) ? 'Does not exists' : strip_tags($vendorinfo->company_url); ?></td>
			</tr>
			
			<tr>
				<td>Contact Person Name</td>
				<td>:</td>
				<td><?php echo ucwords(strip_tags($vendorinfo->contact_p_name)); ?></td>
			</tr>
			
			<tr>
				<td>Contact Person Post</td>
				<td>:</td>
				<td><?php echo ucwords(strip_tags($vendorinfo->contact_p_post)); ?></td>
			</tr>
			
			<tr>
				<td>Contact Person Mobile</td>
				<td>:</td>
				<td><?php echo strip_tags($vendorinfo->contact_p_mob); ?></td>
			</tr>
			
			<tr>
				<td>Contact Person Email</td>
				<td>:</td>
				<td><?php echo $vendorinfo->contact_p_email; ?></td>
			</tr>
			
			<tr>
				<td>PAN</td>
				<td>:</td>
				<td><?php echo strip_tags($vendorinfo->pan_info); ?></td>
			</tr>
			
			<tr>
				<td>GST</td>
				<td>:</td>
				<td><?php echo strip_tags($vendorinfo->gst_info); ?></td>
			</tr>
			
			<tr>
				<td>Bank Name</td>
				<td>:</td>
				<td><?php echo ucwords($vendorinfo->bank_name); ?></td>
			</tr>
			
			<tr>
				<td>Branch Name</td>
				<td>:</td>
				<td><?php echo ucwords(strip_tags($vendorinfo->branch_name)); ?></td>
			</tr>
			
			<tr>
				<td>A/C No</td>
				<td>:</td>
				<td><?php echo $vendorinfo->acc_no; ?></td>
			</tr>
			
			<tr>
				<td>IFSC</td>
				<td>:</td>
				<td><?php echo strip_tags($vendorinfo->ifsc_code); ?></td>
			</tr>
			
			<tr>
				<td>A/C Type</td>
				<td>:</td>
				<td>
					<?php 
						if($vendorinfo->acc_type == 'S')
						{
							echo "Savings Account";
						}
						elseif($vendorinfo->acc_type == 'C')
						{
							echo "Current Account";
						}
						elseif($vendorinfo->acc_type == 'CCR')
						{
							echo "Cash Credit";
						}
					?>
				</td>
			</tr>
			
			<tr>
				<td>Creation Time</td>
				<td>:</td>
				<td><?php echo date("F j, Y, g:i a", $vendorinfo->created_at); ?></td>
			</tr>
			
		</table>
	</body>
</html>