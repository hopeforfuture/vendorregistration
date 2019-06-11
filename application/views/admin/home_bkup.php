<?php echo $header; ?>
  <div align="center">
    <p style="color:red; font-weight: bold;">Administrator Dashboard</p>
  </div>

  <div>
    <p>Employee ID: <span style="color: red; font-weight: bold;"><?php echo $sessdata['u_id']; ?></span></p>
    <p>Employee Name: <span style="color: red; font-weight: bold;"><?php echo $sessdata['u_name']; ?></span></p>
  </div>
  <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $var; ?></h4>
                  <!--<p class="card-description">
                    Add class <code>.table-striped</code>
                  </p>-->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Serial No</th>
                          <th>Vendor Name</th>
                          <th>Upload Type</th>
                          <th>Upload Status</th>
                          <th>Payment Status</th>
                          <th>Cause for Rejection</th>
                          <th>Download</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $si_no = 1;
                          $upload_type = '';
                          $upload_status = '';
                          $payment_status = '';
                          $panel_id = '';
                          if(count($fileslist) > 0)
                          {

                            foreach($fileslist as $fl)
                            {

                                $panel_id = "panel_".$fl->f_id;

                                if($fl->f_type == 'I')
                                {
                                    $upload_type = 'Invoice';
                                }
                                elseif($fl->f_type == 'Q')
                                {
                                    $upload_type = 'Quotation';
                                }

                                if($fl->f_status == 'A')
                                {
                                   $upload_status = 'Accepted';
                                }
                                elseif($fl->f_status == 'P')
                                {
                                   $upload_status = 'Pending';

                                }
                                elseif($fl->f_status == 'R')
                                {
                                   $upload_status = 'Rejected';
                                }
                                if($fl->paid_status == 0)
                                {
                                   $payment_status = 'Unpaid';
                                }
                                elseif($fl->paid_status == 1)
                                {
                                   $payment_status = 'Paid';
                                }
                                elseif($fl->paid_status == 'NA')
                                {
                                   $payment_status = 'Not Applicable';
                                }

                                $timestamp = $fl->created_at;
                        ?>
                        <tr>
                          <td class="py-1"><?php echo $si_no; ?></td>
                          <td><?php echo ucwords($fl->company_name); ?></td>
                          <td><?php echo $upload_type; ?></td>
                          <td><?php echo $upload_status; ?></td>
                          <td><?php echo $payment_status; ?></td>
                          <td><?php echo ucwords($fl->f_reject_reason); ?></td>
                          <td>
                            <a href="<?php echo base_url('download/'.base64_encode($fl->f_name)); ?>">Download</a>
                          </td>
                          <td valign="top">
                            <?php
                            if($fl->f_status == 'P')
                            {
                            ?>
                               <a href="Javascript:void(0);"  class="accept_file" id="accept_<?php echo $fl->f_id; ?>">Accept</a>&nbsp;
                               <a class="rejectlink" id="reject_link_<?php echo $fl->f_id; ?>"  href="Javascript:void(0);">Reject</a>&nbsp;
                               <div id="<?php echo $panel_id ?>" style="display: none;">
                                 Cause for Rejection:<textarea rows="10" cols="30" name="reject_cause" id="reject_txt_<?php echo $fl->f_id; ?>"></textarea><br/>
                                 <button class="btnsubmit" type="submit" id="btn_submit_<?php echo $fl->f_id; ?>">Submit</button>&nbsp;
                                 <button class="btncancel" type="button" id="btn_cancel_<?php echo $fl->f_id; ?>" >cancel</button>&nbsp;
                               </div>
                            <?php
                            }

                            if($fl->f_status == 'A' && $fl->f_type == 'I' && $fl->paid_status == 0)
                            {
                            ?>
                              <a href="Javascript: void(0);" class="payment" id="paid_<?php echo $fl->f_id; ?>">Paid</a>
                              <div style="display: none;" id="pay_panel_<?php echo $fl->f_id; ?>">
                                <table>
                                  <tr>
                                    <td>Payment Due Date</td>
                                    <td>:</td>
                                    <td>
                                      <input type="date" id="payment_due_date_<?php echo $fl->f_id; ?>" class="due_date_class">
                                    </td>
                                  </tr>
                                  <tr>
                                      <td>
                                        <button type="submit" class="btnpay" id="btn_pay_<?php echo $fl->f_id; ?>">Next</button>
                                      </td>
                                      <td>
                                        <button type="button" class="btnpaycancel" id="btn_pay_cancel_<?php echo $fl->f_id; ?>">Cancel</button>
                                      </td>
                                  </tr>
                                </table>
                              </div>
                            <?php
                            }

                            ?>
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
                        <td colspan="8" align="center">
                          <p style="color: red; font-weight: bold;">No record found</p>
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
  $(document).ready(function(){

    /* reject panel show and hide */
    $("body").on("click",".rejectlink", function(){
       var link_id = $(this).attr('id');
       var file_id = link_id.split('_').pop();
       var panel_id = "#panel_"+file_id;
       $(panel_id).show();
    });

    $("body").on("click", ".btncancel", function(){
       var file_id = $(this).attr('id').split('_').pop();
       var panel_id = "#panel_"+file_id;
       $(panel_id).hide();
    });
    /* End */

    /* File reject section */
    $("body").on("click", ".btnsubmit", function(){

       var file_id = $(this).attr('id').split('_').pop();
       var reject_text = $("#reject_txt_"+file_id).val().trim();

       var targeturl = '<?php echo base_url('ajax/updatefilestatus'); ?>';
       var data = {file_id: file_id, reject_cause: reject_text, status: 'R'};

       $.ajax({

          type: "POST",
          url: targeturl,
          data: data,
          success: function(response)
          {
             window.location.href = '<?php echo base_url("admin/dashboard"); ?>';
          }

       });

    });
    /* End */

    /* File accept section */
    $("body").on("click", ".accept_file", function(e){
        var confirm_status = confirm('Confirm Accept?');
        if(confirm_status == false)
        {
          return false;
        }
        var file_id = $(this).attr('id').split('_').pop();
        var reject_text = '';

        var targeturl = '<?php echo base_url('ajax/updatefilestatus'); ?>';
        var data = {file_id: file_id, reject_cause: reject_text, status: 'A'};


        $.ajax({

            type: "POST",
            url: targeturl,
            data: data,
            success: function(response)
            {
               window.location.href = '<?php echo base_url("admin/dashboard"); ?>';
            }

         });

    });
    /* End */

    /* Due date panel show hide */
    $("body").on("click", ".payment", function(){
       var file_id = $(this).attr('id').split('_').pop();
       $("#pay_panel_"+file_id).show();

    });

    $("body").on("click", ".btnpaycancel", function(){
        var file_id = $(this).attr('id').split('_').pop();
        $("#payment_due_date_" + file_id).val('');
       $("#pay_panel_"+file_id).hide();
    });
    /* End */


    /*  Due date update section */
    $("body").on("click", ".btnpay", function(){

      var file_id = $(this).attr('id').split('_').pop();
      var due_date = $("#payment_due_date_" + file_id).val();

      if(due_date == '')
      {
        alert('Due date required.');
        return false;
      }
      else
      {
          var targeturl = '<?php echo base_url('ajax/updatepaidstatus'); ?>';
          var data = {file_id: file_id, due_date: due_date};


          $.ajax({

              type: "POST",
              url: targeturl,
              data: data,
              success: function(response)
              {
                 window.location.href = '<?php echo base_url("admin/dashboard"); ?>';
              }

           });
      }

    });
    /* End */


  });
</script>