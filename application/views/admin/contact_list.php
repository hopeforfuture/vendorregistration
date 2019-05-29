<?php echo $header; ?>
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Contact List&nbsp;
					<?php if($this->session->flashdata('msg')) { echo "<span style='color:red; font-weight: bold;'>".$this->session->flashdata('msg')."</span>";} ?>
				  </h4>
                  <!--<p class="card-description">
                    Add class <code>.table-striped</code>
                  </p>-->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Serial No</th>
                          <th>Contact Name</th>
                          <th>Contact Email</th>
                          <th>Phone No</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php
                      		$si_no = 1;
                      		if(count($contacts) > 0)
                      		{
                      			foreach($contacts as $contact)
                      			{
                                
                      	?>
									<tr>
									  <td class="py-1"><?php echo $si_no; ?></td>
									  <td><?php echo ucwords($contact->contact_name); ?></td>
									  <td><?php echo $contact->contact_email; ?></td>
									  <td><?php echo $contact->contact_phone; ?></td>
									  <td>
										
										<a href="<?php echo base_url('admin/contact/edit/'.$contact->contact_id); ?>">
											<img title="EDIT" src="<?php echo base_url('assets/icons/editicon.png'); ?>" />
										</a>
										<a href="<?php echo base_url('admin/vendor/assign/'.$contact->contact_id); ?>">
											<img title="Assign Vendor" src="<?php echo base_url('assets/icons/assign.png'); ?>" />
										</a>
									  </td>
									</tr>

                    <?php 
                    		$si_no++;
								} 
							
							}
							else
							{
							 ?>
								<tr>
									<td colspan="5" align="center">
										<span style="color:red; font-weight:bold;">No record found</span>
									</td>
								</tr>
							 <?php
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
              
          });
        </script>
