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
                              <th width="10%">ID</th>
                              <th width="30%">Vendor Name</th>
                              <th width="15%">Invoice</th>
                              <th width="15%">Payment</th>
                              <th width="20%">Status</th>
                            </tr>
                      </thead>
                          <tbody>
                        <tr class="inner-tr">
                              <td colspan="50"><div class="accordion" id="accordionExample">
                                  <div class="card z-depth-0 bordered">
                                  <div class="card-header accordion-header" id="headingOne">
                                      <h5 class="mb-0">
                                      <div class="btn btn-link inner-colaps" data-toggle="collapse" data-target="#collapseOne"
          aria-expanded="true" aria-controls="collapseOne">
                                          <table width="100%">
                                          <tr>
                                              <td width="10%" class="serial">1.</td>
                                              <td width="10%"> #5469 </td>
                                              <td width="30%"><span class="name">Louis Stanley</span></td>
                                              <td width="15%"><span class="product">iMax</span></td>
                                              <td width="15%"><span>Paid</span></td>
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
                                                      <button type="button" class="btn btn-primary">Confirm</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div></td>
                                            </tr>
                                        </table>
                                        </div>
                                    </h5>
                                    </div>
									
                                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
      data-parent="#accordionExample">
                                      <div class="card-body">
                                      <div class="open-details"> 
                                          <!-- start of custom-tab -->
                                          <div class="card-body innre-card-body">
                                          <div class="custom-tab">
                                              <nav>
												  <div class="nav nav-tabs" id="nav-tab" role="tablist"> 
												  <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="false">Quotes
												  </a> 
												  <a class="nav-item nav-link active show" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="true">Invoice
												  </a> 
												  <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Payment
												  </a> 
												  </div>
                                              </nav>
                                              <div class="tab-content" id="nav-tabContent">
                                              <div class="tab-pane fade" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                  <table class="table">
                                                  <thead>
                                                      <tr>
                                                      <th scope="col" width="70">Sl No.</th>
                                                      <th scope="col">Upload Status</th>
                                                      <th scope="col">Payment Status</th>
                                                    </tr>
                                                    </thead>
                                                  <tbody>
                                                      <tr>
                                                      <th scope="row">1</th>
                                                      <td>Mark</td>
                                                      <td>Otto</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">2</th>
                                                      <td>Jacob</td>
                                                      <td>Thornton</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">3</th>
                                                      <td>Larry</td>
                                                      <td>the Bird</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                              <div class="tab-pane fade active show" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                                  <table class="table">
                                                  <thead>
                                                      <tr>
                                                      <th scope="col" width="70">Sl No.</th>
                                                      <th scope="col">Invoice No</th>
                                                      <th scope="col">Uploda Status</th>
                                                      <th scope="col">Date</th>
                                                    </tr>
                                                    </thead>
                                                  <tbody>
                                                      <tr>
                                                      <th scope="row">1</th>
                                                      <td>Mark a as </td>
                                                      <td>Otto</td>
                                                      <td>10/06/2019</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">2</th>
                                                      <td>Jacob</td>
                                                      <td>Thornton</td>
                                                      <td>10/06/2019</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">3</th>
                                                      <td>Larry</td>
                                                      <td>the Bird</td>
                                                      <td>10/06/2019</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                              <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                                  <table class="table">
                                                  <thead>
                                                      <tr>
                                                      <th scope="col" width="70">Sl No.</th>
                                                      <th scope="col">Payment date</th>
                                                      <th scope="col">Payment Status</th>
                                                    </tr>
                                                    </thead>
                                                  <tbody>
                                                      <tr>
                                                      <th scope="row">1</th>
                                                      <td>Mark</td>
                                                      <td>payment</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">2</th>
                                                      <td>Jacob</td>
                                                      <td>payment</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">3</th>
                                                      <td>Larry</td>
                                                      <td>payment</td>
                                                    </tr>
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
                                  <div class="card z-depth-0 bordered">
                                  <div class="card-header accordion-header" id="headingTwo">
                                      <h5 class="mb-0">
                                      <div class="btn btn-link collapsed inner-colaps" data-toggle="collapse"
          data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          <table width="100%">
                                          <tbody>
                                              <tr>
                                              <td width="10%" class="serial">1.</td>
                                              <td width="10%"> #5469 </td>
                                              <td width="30%"><span class="name">Louis Stanley</span></td>
                                              <td width="15%"><span class="product">iMax</span></td>
                                              <td width="15%"><span>Paid</span></td>
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
                                                          <button type="button" class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </h5>
                                    </div>
                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                      <div class="card-body">
                                      <div class="open-details"> 
                                          <!-- start of custom-tab -->
                                          <div class="card-body innre-card-body">
                                          <div class="custom-tab">
                                              <nav>
                                              <div class="nav nav-tabs" id="nav-tab" role="tablist"> <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="false">Quotes</a> <a class="nav-item nav-link active show" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="true">Invoice</a> <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Payment</a> </div>
                                            </nav>
                                              <div class="tab-content" id="nav-tabContent">
                                              <div class="tab-pane fade" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                  <table class="table">
                                                  <thead>
                                                      <tr>
                                                      <th scope="col" width="70">Sl No.</th>
                                                      <th scope="col">Upload Status</th>
                                                      <th scope="col">Payment Status</th>
                                                    </tr>
                                                    </thead>
                                                  <tbody>
                                                      <tr>
                                                      <th scope="row">1</th>
                                                      <td>Mark</td>
                                                      <td>Otto</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">2</th>
                                                      <td>Jacob</td>
                                                      <td>Thornton</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">3</th>
                                                      <td>Larry</td>
                                                      <td>the Bird</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                              <div class="tab-pane fade active show" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                                  <table class="table">
                                                  <thead>
                                                      <tr>
                                                      <th scope="col" width="70">Sl No.</th>
                                                      <th scope="col">Invoice No</th>
                                                      <th scope="col">Uploda Status</th>
                                                      <th scope="col">Date</th>
                                                    </tr>
                                                    </thead>
                                                  <tbody>
                                                      <tr>
                                                      <th scope="row">1</th>
                                                      <td>Mark a as </td>
                                                      <td>Otto</td>
                                                      <td>10/06/2019</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">2</th>
                                                      <td>Jacob</td>
                                                      <td>Thornton</td>
                                                      <td>10/06/2019</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">3</th>
                                                      <td>Larry</td>
                                                      <td>the Bird</td>
                                                      <td>10/06/2019</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                              <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                                  <table class="table">
                                                  <thead>
                                                      <tr>
                                                      <th scope="col" width="70">Sl No.</th>
                                                      <th scope="col">Payment date</th>
                                                      <th scope="col">Payment Status</th>
                                                    </tr>
                                                    </thead>
                                                  <tbody>
                                                      <tr>
                                                      <th scope="row">1</th>
                                                      <td>Mark</td>
                                                      <td>payment</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">2</th>
                                                      <td>Jacob</td>
                                                      <td>payment</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">3</th>
                                                      <td>Larry</td>
                                                      <td>payment</td>
                                                    </tr>
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
                                  <div class="card z-depth-0 bordered">
                                  <div class="card-header accordion-header" id="headingThree">
                                      <h5 class="mb-0">
                                      <div class="btn btn-link collapsed inner-colaps" data-toggle="collapse"
          data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          <table width="100%">
                                          <tbody>
                                              <tr>
                                              <td width="10%" class="serial">1.</td>
                                              <td width="10%"> #5469 </td>
                                              <td width="30%"><span class="name">Louis Stanley</span></td>
                                              <td width="15%"><span class="product">iMax</span></td>
                                              <td width="15%"><span>Paid</span></td>
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
                                                          <button type="button" class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </h5>
                                    </div>
                                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                      <div class="card-body">
                                      <div class="open-details"> 
                                          <!-- start of custom-tab -->
                                          <div class="card-body innre-card-body">
                                          <div class="custom-tab">
                                              <nav>
                                              <div class="nav nav-tabs" id="nav-tab" role="tablist"> <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="false">Quotes</a> <a class="nav-item nav-link active show" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="true">Invoice</a> <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Payment</a> </div>
                                            </nav>
                                              <div class="tab-content" id="nav-tabContent">
                                              <div class="tab-pane fade" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                  <table class="table">
                                                  <thead>
                                                      <tr>
                                                      <th scope="col" width="70">Sl No.</th>
                                                      <th scope="col">Upload Status</th>
                                                      <th scope="col">Payment Status</th>
                                                    </tr>
                                                    </thead>
                                                  <tbody>
                                                      <tr>
                                                      <th scope="row">1</th>
                                                      <td>Mark</td>
                                                      <td>Otto</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">2</th>
                                                      <td>Jacob</td>
                                                      <td>Thornton</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">3</th>
                                                      <td>Larry</td>
                                                      <td>the Bird</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                              <div class="tab-pane fade active show" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                                  <table class="table">
                                                  <thead>
                                                      <tr>
                                                      <th scope="col" width="70">Sl No.</th>
                                                      <th scope="col">Invoice No</th>
                                                      <th scope="col">Uploda Status</th>
                                                      <th scope="col">Date</th>
                                                    </tr>
                                                    </thead>
                                                  <tbody>
                                                      <tr>
                                                      <th scope="row">1</th>
                                                      <td>Mark a as </td>
                                                      <td>Otto</td>
                                                      <td>10/06/2019</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">2</th>
                                                      <td>Jacob</td>
                                                      <td>Thornton</td>
                                                      <td>10/06/2019</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">3</th>
                                                      <td>Larry</td>
                                                      <td>the Bird</td>
                                                      <td>10/06/2019</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                              <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                                  <table class="table">
                                                  <thead>
                                                      <tr>
                                                      <th scope="col" width="70">Sl No.</th>
                                                      <th scope="col">Payment date</th>
                                                      <th scope="col">Payment Status</th>
                                                    </tr>
                                                    </thead>
                                                  <tbody>
                                                      <tr>
                                                      <th scope="row">1</th>
                                                      <td>Mark</td>
                                                      <td>payment</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">2</th>
                                                      <td>Jacob</td>
                                                      <td>payment</td>
                                                    </tr>
                                                      <tr>
                                                      <th scope="row">3</th>
                                                      <td>Larry</td>
                                                      <td>payment</td>
                                                    </tr>
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
                                </div></td>
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