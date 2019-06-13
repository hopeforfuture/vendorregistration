<?php echo $header; ?>
<!-- Orders -->
    <div class="orders">
          <div class="row">
        <div class="col-xl-8">
              <div class="card">
            <div class="custom-tab">
                  <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist"> <a class="vendor-title" id="custom-nav-vendor-tab">Vendor</a> </div>
              </nav>
                  <div class="tab-content pl-3 pt-3 pr-3 main-qt-table" id="nav-tabContent">
                <div class="tab-pane fade active show" id="custom-nav-vendor" role="tabpanel" aria-labelledby="custom-nav-vendor-tab">
                      <div class="table-stats order-table ov-h"> <!-- vendor table -->
                    <table class="table vendor-table">
                          <thead>
                        <tr>
                              <th class="serial" width="10%">Sl No.</th>
                              <th width="10%">SI NO.</th>
                              <th width="30%">Vendor Name</th>
                              <!--<th width="15%">Invoice</th>
                              <th width="15%">Payment</th>-->
                              <th width="20%">Status</th>
                            </tr>
                      </thead>
                          <tbody>
                        <tr class="inner-tr">
                              <td colspan="50"><div class="accordion" id="accordionExample">
								<?php
							    if(!empty($venddata))
							    {
									$serial = 1;
									$vend_invoices = array();
									$vend_quotes = array();
									$vend_payments = array();
									$parent_div_id = '';
									$child_div_id = '';
									$heading = '';
									
									
									
									foreach($venddata as $key=>$vnd)
									{
										if(array_key_exists($key, $invoice))
										{
											$vend_invoices = $invoice[$key];
										}
										else
										{
											$vend_invoices = array();
										}
										if(array_key_exists($key, $quotes))
										{
											$vend_quotes = $quotes[$key];
										}
										else
										{
											$vend_quotes = array();
										}
										if(array_key_exists($key, $payments))
										{
											$vend_payments = $payments[$key];
										}
										else
										{
											$vend_payments = array();
										}
										
										if($serial == 1)
										{
											$class = "show";
										}
										else
										{
											$class = '';
										}
										
										/*if($key == 6)
										{
											echo "<pre>";
											print_r($vend_invoices);
											echo "</pre>";
											die;
										}*/
										
										$parent_div_id = "#collapse".$serial;
										$child_div_id = "collapse".$serial;
										$heading = "heading".$serial;
										
								?>
                                  <div class="card z-depth-0 bordered">
                                  <div class="card-header accordion-header" id="<?php echo $heading; ?>">
                                      <h5 class="mb-0">
                                      <div class="btn btn-link inner-colaps" data-toggle="collapse" data-target="<?php echo $parent_div_id; ?>"
          aria-expanded="true" aria-controls="<?php echo $child_div_id; ?>">
                                          <table width="100%">
										  
                                          <tr>
                                              <td width="10%" class="serial"><?php echo $serial; ?></td>
                                              <!--<td width="10%"> #5469 </td>-->
                                              <td width="30%"><span class="name"><?php echo $vnd['name']; ?></span></td>
                                              <!--<td width="15%"><span class="product">iMax</span></td>
                                              <td width="15%"><span>Paid</span></td>-->
                                              <td width="20%"><button type="button" class="badge badge-complete" data-toggle="modal" data-target="#smallmodal">Complete</button>
                                              <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                                    </div>
                                                      <div class="modal-body">
                                                      <ul class="list-group list-group-flush text-left">
                                                          <li class="list-group-item"> <strong>Name:</strong> <span>Ranja paul</span> </li>
                                                          <li class="list-group-item"> <strong>Company:</strong> <span>Farm Need</span> </li>
                                                          <li class="list-group-item"> <strong>Address:</strong> <span>Shop No A, Shantiniketan Complex, Near Newtown Bridge, DLF 1, New Town, Kolkata</span> </li>
                                                          <li class="list-group-item"> <strong>Details:</strong> <span>Restaurants in Kolkata, Kolkata Restaurants, New Town restaurants, Best New Town restaurants, Rajarhat restaurants, Casual Dining in Kolkata, Casual Dining near me, Casual Dining in Rajarhat.</span> </li>
                                                        </ul>
                                                    </div>
                                                      <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                      <!--<button type="button" class="btn btn-primary">Confirm</button>-->
                                                    </div>
                                                    </div>
                                                </div>
                                                </div></td>
                                            </tr>
											
											
                                        </table>
                                        </div>
                                    </h5>
                                    </div>
									
                                  <div id="<?php echo $child_div_id; ?>" class="collapse <?php if(!empty($class)) {echo $class;} ?>" aria-labelledby="<?php echo $heading; ?>"
      data-parent="#accordionExample">
                                      <div class="card-body">
                                      <div class="open-details"> 
                                          <!-- start of custom-tab -->
                                          <div class="card-body innre-card-body">
                                          <div class="custom-tab">
                                              <nav>
												  <div class="nav nav-tabs" id="nav-tab" role="tablist"> 
												  <a class="nav-item nav-link active show" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home<?php echo $serial; ?>" role="tab" aria-controls="custom-nav-home" aria-selected="true">Quotes
												  </a> 
												  <a class="nav-item nav-link " id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile<?php echo $serial; ?>" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Invoice
												  </a> 
												  <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact<?php echo $serial; ?>" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Payment
												  </a> 
												  </div>
                                              </nav>
                                              <div class="tab-content" id="nav-tabContent">
                                              <div class="tab-pane fade active show" id="custom-nav-home<?php echo $serial; ?>" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                  <table class="table">
                                                  <thead>
                                                      <tr>
														  <th scope="col" width="70">Sl No.</th>
														  <th scope="col">Quotation Status</th>
														  <th scope="col">Reject Reason</th>
													  </tr>
                                                    </thead>
                                                  <tbody>
												     <?php
													 if(!empty($vend_quotes))
													 {
														 foreach($vend_quotes as $vq)
														 {
															 $status = '';
															 $reject_cause = 'NA';
															 if($vq['quote_status'] == 'A')
															 {
																 $status = 'Accepted';
															 }
															 elseif($vq['quote_status'] == 'P')
															 {
																 $status = 'Pending';
															 }
															 elseif($vq['quote_status'] == 'R')
															 {
																 $status = 'Rejected';
															 }
															 
															 if(!empty($vq['reject_reason']))
															 {
																 $reject_cause = $vq['reject_reason'];
															 }
													 ?>
														 <tr>
														  <th scope="row"><?php echo $vq['si_no']; ?></th>
														  <td><?php echo $status; ?></td>
														  <td><?php echo $reject_cause; ?></td>
														 </tr>
													 <?php } ?>
                                                     
													 <?php 
													 } 
													 else
													 {
														 echo "<tr><td colspan='3' align='center'>"."No data found."."</td></tr>";
													 }
													 
													 ?>
                                                      
                                                    </tbody>
                                                </table>
                                                </div>
                                              <div class="tab-pane fade" id="custom-nav-profile<?php echo $serial; ?>" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                                  <table class="table">
                                                  <thead>
                                                      <tr>
                                                      <th scope="col" width="70">Sl No.</th>
                                                      <!--<th scope="col">Invoice No</th>-->
                                                      <th scope="col">Invoice Status</th>
													  <th scope="col">Payment Status</th>
													  <th scope="col">Reject Reason</th>
                                                      <!--<th scope="col">Date</th>-->
                                                    </tr>
                                                    </thead>
                                                  <tbody>
												  <?php 
													if(!empty($vend_invoices)) 
													{
													   foreach($vend_invoices as $vi)
													   {
														   $status = '';
														   $paid = '';
														   $reject_cause = 'NA';
														   if($vi['inv_status'] == 'A')
														   {
															 $status = 'Accepted';
														   }
														   elseif($vi['inv_status'] == 'P')
														   {
															 $status = 'Pending';
														   }
														   elseif($vi['inv_status'] == 'R')
														   {
															 $status = 'Rejected';
														   }
														   
														   if($vi['paid'] == 1)
														   {
															   $paid = 'Paid';
														   }
														   else
														   {
															   $paid = 'Not Paid';
														   }
														 
														   if(!empty($vi['reject_reason']))
														   {
															 $reject_cause = $vi['reject_reason'];
														   }
												  ?>
                                                      <tr>
														  <th scope="row"><?php echo $vi['si_no']; ?></th>
														  <td><?php echo $status; ?></td>
														  <td><?php echo $paid; ?></td>
														  <td><?php echo $reject_cause; ?></td>
													  </tr>
                                                   
												  <?php 
													   }
												  }
												  
												  else
													 {
														 echo "<tr><td colspan='3' align='center'>"."No data found."."</td></tr>";
													 }

												  ?>
                                                      
                                                    </tbody>
                                                </table>
                                                </div>
                                              <div class="tab-pane fade" id="custom-nav-contact<?php echo $serial; ?>" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                                  <table class="table">
                                                  <thead>
                                                      <tr>
                                                      <th scope="col" width="70">Sl No.</th>
                                                      <!--<th scope="col">Payment date</th>-->
                                                      <th scope="col">Payment Status</th>
                                                    </tr>
                                                    </thead>
                                                  <tbody>
												  <?php
												  if(!empty($vend_payments))
												  {
													  foreach($vend_payments as $vp)
													  {
												  ?>
                                                      <tr>
                                                      <th scope="row"><?php echo $vp['si_no']; ?></th>
                                                      <!--<td>Mark</td>-->
                                                      <td>Paid</td>
                                                      </tr>
                                                  <?php
									                  }
								                   }
												   
												   else
													 {
														 echo "<tr><td colspan='3' align='left'>"."No data found."."</td></tr>";
													 }
												  ?>
                                                      
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                          <!-- end of custom-tab --> 
                                        </div>
                                    </div>
                                    </div>
                                </div>
								
								
								<?php 
									
									$serial++;
									}   
								 } 
								?>
								
								
								
								
                                </div>
							</td>
                          </tr>
                      </tbody>
                        </table>
                  </div>
                      <!-- /.table-stats --> 
                    </div>
              </div>
                </div>
          </div>
              <!-- /.card --> 
            </div>
        <!-- /.col-lg-8 -->
        <div class="col-xl-4">
              <div class="card">
            <div class="card-body">
                  <div class="calender-cont widget-calender">
                <div id="calendar"></div>
              </div>
                </div>
          </div>
              <!-- /.card --> 
            </div>
      </div>
        </div>
    <!-- /.orders --> 
<?php echo $footer; ?>