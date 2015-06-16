<?php include_once '../Master_Pages/login_header.php';?>
<div class="content">
  <!-- BEGIN LOGIN FORM -->
  <div class="portlet light bg-inverse">
    <div class="portlet-title">
      <div class="caption">
        <span class="caption-subject bold" style="color: #f27600">Terms Of Use</span>
      </div>
      <div class="tools">
        <span class="caption-subject bold"  style="color: #f27600">
          <i class="fa fa-pencil"></i>
        </span>
      </div>
    </div>
    <div class="portlet-body form">
     
     
        <form class="login-form" method="get">

        <div class="form-body">
          <div class="form-group">
            <textarea class="form-control" rows="6">

            </textarea>
          </div>
            <div class="form-group">
                <a  onclick="window.location.href = '../Config/routing.php?action=AgreeTc'"  class="btn green">Agree</a>
                 <a  onclick="window.location.href = '../Config/routing.php?action=Logout'"  class="btn default">Cancel</a>
       
          </div>
        </div>

      </form>

    </div>
  </div>
  

</div>
<?php include_once '../Master_Pages/login_footer.php';?>