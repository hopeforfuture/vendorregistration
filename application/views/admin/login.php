<?php echo $header; ?>
<?php
  $email = isset($loginname) ? $loginname : '';
?>
<form id="login" class="pt-3" method="post" action="<?php echo base_url('admin'); ?>">
                <?php if(isset($login_msg)) { echo "<p style='text-align:center; color:red;font-weight:bold;'>".$login_msg."</p>";} ?>
                <div class="form-group">
                  <input value="<?php echo $email; ?>" required="required" type="email" class="form-control form-control-lg" id="u_email" name="u_email" placeholder="Email">
                </div>

                <div class="form-group">
                  <input required="required" type="password" class="form-control form-control-lg" id="u_pswd" name="u_pswd" placeholder="Password">
                </div>

                <div class="mt-3">
                  <!--<a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</a>-->
                  <button type="submit" id="btnLogin" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>

                <!--<div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>-->

</form>
<?php echo $footer; ?>