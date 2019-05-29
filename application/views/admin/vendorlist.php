<?php echo $header; ?>
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Vendor List</h4>
                  <!--<p class="card-description">
                    Add class <code>.table-striped</code>
                  </p>-->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Serial No</th>
                          <th>Company Name</th>
                          <th>Vendor Type</th>
                          <th>Status</th>
                          <th>Contact No</th>
						  <th>Documents</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php
                      		$si_no = 1;
                      		if(count($vendors) > 0)
                      		{
                      			foreach($vendors as $vendor)
                      			{

                                $status = '';
                                if($vendor->vendor_status == 1)
                                {
                                   $status = 'Active';
                                   $style="color:green;font-weight:bold;";
                                }
                                else
                                {
                                  $status = 'Inactive';
                                  $style="color:red;font-weight:bold;";
                                }
                      	?>
                        <tr>
                          <td class="py-1"><?php echo $si_no; ?></td>
                          <td><?php echo ucwords($vendor->company_name); ?></td>
                          <td><?php echo ucwords($types[$vendor->vendor_type_id]); ?></td>
                          <td style="<?php echo $style; ?>" id="sv_<?php echo $vendor->vendor_id; ?>"><?php echo $status; ?></td>
                          <td><?php echo $vendor->contact_p_mob; ?></td>
						  <td>
							<a href="<?php echo base_url('allfiledownloads/'.$vendor->vendor_id); ?>">Downloads</a>
						  </td>
                          <td>
                            <?php
                              if($status == 'Active')
                              {
                              ?>
                                <a class="changestatus" id="<?php echo $vendor->vendor_id; ?>" status="0"  href="Javascript:void(0)">
                                  <img src="<?php echo base_url('assets/icons/inactive.png'); ?>" />
                                </a>
                              <?php
                              }
                              else
                              {
                              ?>
                                <a class="changestatus" id="<?php echo $vendor->vendor_id; ?>" status="1"  href="Javascript:void(0)">
                                  <img src="<?php echo base_url('assets/icons/active.png'); ?>" />
                                </a>

                                <?php
                              }
                            ?>
							<!--<a href="Javascript:void(0)">
								<img title="EDIT" src="<?php echo base_url('assets/icons/editicon.png'); ?>" />
							</a>-->
                          </td>
                        </tr>

                    <?php 
                    		$si_no++;
                			} 

                	}
                    ?>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
		  
        <?php echo $footer; ?>

        <script type="text/javascript">
          $("body").on("click", ".changestatus", function(){
              var id = $(this).attr('id');
              var status = $(this).attr('status');

              var targetUrl = '<?php echo base_url("ajax/updatevendorstatus"); ?>';
              var data = {v_id: id, newstatus: status};
              

              $.ajax({
                type: "POST",
                url: targetUrl,
                data: data,
                success: function(response)
                {
                  var res = JSON.parse(response);
                  var statustext = '';
                  var imgsrc = '';
                  var newstatus = '';
                  if(status == 0)
                  {
                     imgsrc = '<?php echo base_url("assets/icons/active.png"); ?>';
                     statustext = '<b style="color:red;">Inactive</b>';
                     newstatus = 1;
                  }
                  else
                  {
                    imgsrc = '<?php echo base_url("assets/icons/inactive.png"); ?>';
                    statustext = '<b style="color:green;">Active</b>';
                    newstatus = 0;
                  }
                  $("#"+id).attr('status', newstatus);
                  $("#"+id).children().attr('src', imgsrc);
                  $("#" + "sv_" + id).html(statustext);
                }

              });


          });
        </script>
