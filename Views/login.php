<?php 


include_once '../Master_Pages/login_header.php';

if (isset($_SESSION['error']) ) {
  // $_SESSION['flash_error'] = "Please sign in";
    if($_SESSION['error']==true)
        {
        $exists=1;
        }
    else
        {
         $exists=0;
        }
}
else
{
    $exists=0;
}
if (isset($_SESSION['noemailexists']) ) {
  // $_SESSION['flash_error'] = "Please sign in";
    if($_SESSION['noemailexists']==true)
        {
        $noemail=1;
        }
    else
        {
         $noemail=0;
        }
}
else
        {
         $noemail=0;
        }

?>


<div class="content">

  <!-- BEGIN LOGIN FORM -->
  <form class="login-form" action="../config/routing.php" method="post">
       <input type="hidden"  name="action" value="Login"/>
      <input type="hidden" id="validUser" value=<?php echo $exists?> >
    <h3 class="form-title">Sign In</h3>

       <div id="errorinvalid" class="alert alert-danger display-hide">
      <button class="close" data-close="alert"></button>
      <span>
        Enter valid username and password.
      </span>
    </div>
    <div class="form-group">
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Username</label>
      <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
      
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-success uppercase" >Login</button>
      <label class="rememberme check">
        <input type="checkbox" name="remember" value="1"/>Remember
      </label>
      <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
      <!-- <a href="../Views/ForgotPassword.php" id="forget-password" class="forget-password">Forgot Password?</a> -->

    </div>
    <!--
    <div class="logo">
      <a href="login.php">
        <img src="../assets/admin/layout2/img/CARE Network Logo 120x34.png" alt="CARE Network" />
      </a>
    </div>
    -->
  </form>
<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="../config/routing.php?action=forgotPswd" method="post">
                  <input type="hidden" id="validemail" value=<?php echo $noemail?> >
                  <div id="errorinvalid1" class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>
                     E-mail address does not exist 
                    </span>
                  </div>
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->

</div>
<?php include_once '../Master_Pages/login_footer.php';?>
<script>
$( document ).ready(function() {  
  $('#errorinvalid').hide(); 
  if($('#validUser').val()==1)
  {
        $('#errorinvalid').show();
  }
  if($('#validemail').val()==1)
  {
       jQuery('.login-form').hide();
            jQuery('.forget-form').show();
        $('#errorinvalid1').show();
  }
});    
</script>