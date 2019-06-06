<div class="dash-vendor">
<?php echo $header; ?>
<div class="body-area">
        <?php
        $f_type = ($type == 'I') ? 'I' : 'Q';
        $panel_text = ($f_type == 'I') ? 'Invoice Status' : 'Quotation Status';

        ?>
        <!--start of inner top panel-->
        <div class="inner-top">
            <?php
                if($this->session->flashdata('msg'))
                {
                    echo "<span style='color:red;font-weight:bold;'>".$this->session->flashdata('msg')."</span>";
                }
            ?>
            <h2><?php echo $panel_text; ?></h2>
            <?php
                $si_no = 1;
            ?>
            <div class="status-loop">
                <?php
                if(isset($files) && count($files) > 0)
                {
                    $file_status = '';
                    $reason = '';
                    $payment_due = ''; 
                    foreach($files as $f)
                    {
                        $title = ($f->f_type == 'I') ? 'Invoice no' : 'Quotation no';
                        if($f->f_status == 'A')
                        {
                            $file_status = 'Accepted';
                        }
                        elseif($f->f_status == 'P')
                        {
                            $file_status = 'Pending';
                        }
                        elseif($f->f_status == 'R')
                        {
                            $file_status = 'Rejected';
                        }

                        $reason = (!empty($f->f_reject_reason)) ? $f->f_reject_reason : '';
                        if(!empty($f->payment_due_date))
                        {
                            $payment_due = date('d-m-Y', $f->payment_due_date);
                        }
                ?>

                <ul>
                    <li> <?php echo $title; ?>: <label><?php echo $si_no; ?></label></li>
                    <li>Status: <label><?php echo $file_status; ?></label></li>
                    <li>Reason: <label><?php echo $reason; ?></label></li>
                    <li>Payment due on: <label><?php echo $payment_due; ?></label></li>
                </ul>
                

            <?php 
                    $payment_due = '';
                    $si_no++;
                }
            } 
            ?>
            </div>
        </div>
        <!--end of inner top panel-->
        

        <div class="invoice-upload">
            <ul>
                <li>
                <a href="<?php echo base_url('vendordashboard/I'); ?>">New Invoice upload </a>

                <div id="invlist" class="row upload-list">

                <div class="subList">
                  <form action="<?php echo base_url('vendor/upload/I'); ?>" id="iform" method="post" enctype="multipart/form-data">
                    <?php for($i=1;$i<=5;$i++) {
                        $area = "img_inv_".$i; 
                        ?>
                    <section>
                        <span>Upload <?php echo $i; ?></span>
                          <img id="img_inv_<?php echo $i; ?>">
                            <div class="uploadFile">
                                <input class="inputfile" name="files[]" type="file" onchange="checkfile(this.value, '<?php echo $area; ?>')">
                                <a href="javascript:void(0)">Add</a>
                                
                            </div>
                    </section>
                <?php } ?>
                    
        
                    <div class="confirm-btn">
                        <input id="invUpload" type="submit" value="Confirm" class="confirm btnupload">
                    </div>
                </form>
            </div>

        </div>

    </li>

                
                <li>
                <a href="<?php echo base_url('vendordashboard/Q'); ?>">New quotation upload</a>

                <div id="qlist" class="row upload-list">
                 <div class="subList">
                    <form action="<?php echo base_url('vendor/upload/Q'); ?>" id="qform" method="post" enctype="multipart/form-data">

                    <?php for($i=1;$i<=5;$i++) {
                        $area = "img_quo_".$i; 
                    ?>
                    <section>
                        <span>Upload <?php echo $i; ?></span>
                            <img id="img_quo_<?php echo $i; ?>">
                            <div class="uploadFile">
                                <input class="inputfile" name="files[]" type="file" onchange="checkfile(this.value, '<?php echo $area; ?>')">
                                <a href="javascript:void(0)">Add</a>
                            </div>
                    </section>
                    <?php } ?>
            
                        <div class="confirm-btn">
                            <input id="quoUpload" type="submit" value="Confirm" class="confirm btnupload">
                        </div>
                    </div>

                    </form>
                </div>

            </li>
                
                <li><a href="javascript:void(0)">Business summary</a></li>
                <li><a href="javascript:void(0)">Service delay reporting</a></li>
            </ul>
        </div>
        <!--end of invoice upload-->
        
        <!--end of upload list-->
   </div>

   <?php echo $footer; ?>
</div>
   <script type="text/javascript">
       $(document).ready(function(){
            var type = '<?php echo $f_type; ?>';
            if(type == 'I')
            {
                $("#invlist").show();
                $("#qlist").hide();
            }
            else if(type == 'Q')
            {
                $("#qlist").show();
                $("#invlist").hide();
            }

            /* Validate on submit */
            $("body").on("click", ".btnupload", function(e){
                e.preventDefault();
                var allowed_types = ['jpeg', 'jpg', 'pdf', 'png'];
                var btnname = $(this).attr('id');
                var errstr = '';
                var ext = '';
                $(".inputfile").each(function(){
                    var filename = $(this).val();

                    if(filename.length > 0)
                    {
                        ext = filename.split('.').pop().toLowerCase();

                        if(allowed_types.indexOf(ext) == -1)
                        {
                            errstr = 'One or more files have invalid extension.';
                        }
                    }
                });

                if(errstr.length == 0)
                {
                    if(btnname == 'invUpload')
                    {
                        //alert('Upload fron invoice');
                        $("#iform").submit();
                    }
                    else if(btnname == 'quoUpload')
                    {
                        //alert('Upload fron quotation');
                        $("#qform").submit();
                    }
                }
                else
                {
                    $("#modal-content").html(errstr);
                    $("#myModal").modal();
                    return false;
                }
            });
            /* End */


       });

       function checkfile(filename, section)
       {
            var ext = filename.split('.').pop().toLowerCase();
            var allowed_types = ['jpeg', 'jpg', 'pdf', 'png'];
            var ok_img = '<?php echo base_url("assets/icons/true_1.png"); ?>';
            var cancel_img = '<?php echo base_url("assets/icons/cross-2.png"); ?>';
            if(allowed_types.indexOf(ext) == -1)
            {
                $("#"+section).attr('src', cancel_img);
            }
            else
            {
                $("#"+section).attr('src', ok_img);
            }
       }
   </script>