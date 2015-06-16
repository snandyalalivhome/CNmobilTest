<?php include_once '../Master_Pages/login_header.php';?>
<div class="content">
  <!-- BEGIN LOGIN FORM -->
  <div class="portlet light bg-inverse">
    <div class="portlet-title">
      <div class="caption">
        <span class="caption-subject bold" style="color: #f27600">No CareNetwork Contacts</span>
      </div>

    </div>
    <div class="portlet-body form">
     
     
        <form class="login-form" method="get">

        <div class="form-body">
          <div class="form-group">
               Unable to find a member associated with you. Please contact customer support.
          </div>
            <div class="form-group">
                 <a  onclick="window.location.href = '../Config/routing.php?action=Logout'"  class="btn default">Log Out</a>
       
          </div>
        </div>

      </form>

    </div>
  </div>
  
  <div class="logo">
    <a href="login.html">
      <img src="../assets/admin/layout2/img/CARE Network Logo 120x34.png" alt="LivHOME" />
    </a>
  </div>
</div>
<?php include_once '../Master_Pages/login_footer.php';?>
