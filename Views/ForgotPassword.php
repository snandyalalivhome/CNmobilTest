<?php include_once '../Master_Pages/login_header.php';?>

<div class="content">

 
    <form class="login-form" action="../Views/Landing_Page.php" method="get">
      <h3 class="form-title">Forgot Password</h3>
      <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span>
          Email Address Cannot be blank
        </span>
      </div>
      <div class="form-group">


        <label >
          Please fill out the following form with your email address:</label>
        <br/>


          <label > Fields with <span style="color:red"> *</span> are required</label>

        <br/>
        <label >
          <b> Email Address  <span style="color:red"> *</span>
          </b>
        </label>
        <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="abc@livhome.com" name="EmailAddress"/>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn green">Submit</button>
        <button type="button" onclick="window.location.href = '../Views/login.php'" class="btn cancel">Back</button>

      </div>
      <div class="logo">
        <a href="login.php">
          <img src="../assets/admin/layout2/img/CARE Network Logo 120x34.png" alt="CARE Network" />
        </a>
      </div>
    </form>

</div>
<?php include_once '../Master_Pages/login_footer.php';?>
