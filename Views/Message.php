<?php include_once '../Master_Pages/header.php';?>
<?php include_once '../Master_Pages/sidebar.php';?>
<div class="page-content-wrapper">
  <div class="page-content">

    <!-- BEGIN PageContent -->
    <div id="MessageSuccess" class="alert alert-success display-hide">
      <button class="close" data-close="alert"></button>
      <span>
       Message Sent Successfully
      </span>
    </div>
       <div id="MessageFailed" class="alert alert-danger display-hide">
      <button class="close" data-close="alert"></button>
      <span>
       Failed To Send Message
      </span>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="portlet box blue">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-envelope"></i>Message
            </div>
          </div>
          <div class="portlet-body form">
            <form action="#" method="post" >
              <input type="hidden" id="patientId" value=<?php echo $_SESSION['cpatientId'] ?> />
               <input type="hidden" id="userId" value=<?php echo $_SESSION['cuserid'] ?> />
              <div class="form-body">
                <div class="form-group">
                  <textarea id="MsgSub" class="form-control" rows="1" placeholder="Subject" name="subject"></textarea>
                </div>
                <div class="form-group">
                    <textarea id="MsgText" class="form-control" rows="6" placeholder="Your Message" name="content"></textarea>
                </div>
              </div>

              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button id="sendMsg" type="submit" class="btn green">Send</button>
                    <button id="cancelMsg" type="button" class="btn default" >Home</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- END CONTENT -->

<!--Close div from master page sidebar.php -->
</div>

<?php include_once '../Master_Pages/footer.php';?>
<script>
     $("#sendMsg").click(function(e) { 
  e.preventDefault();
  var patientID = $("#patientId").val();
  var userID = $("#userId").val();
  var subject= $("#MsgSub").val();
  var text= $("#MsgText").val();
  var dataString = 'action=SendMessage&patientID='+patientID+'&userID='+userID+'&subject='+subject+'&content='+text; 
  $.ajax({
  type:'POST',
  data:dataString,
  url:'../config/routing.php',
  error:function(data) { $('#MessageFailed').show();},
  success:function(data) {
      var returnedData = $.parseJSON(data); 
    if(returnedData.status == "success")
      {
      $('#MessageSuccess').show();
      $('#MsgSub').val('');
       $('#MsgText').val('');
      }
      else
      {
       $('#MessageFailed').show();
      }
  }
 
  });
  });
$('#cancelMsg').click(function(e)
{
      e.preventDefault();
     $(location).attr('href','../config/routing.php?action=Landing');
});
</script>