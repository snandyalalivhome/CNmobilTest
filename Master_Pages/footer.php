<div class="page-footer">
  <div class="page-footer-inner">
    2015 &copy; CareNetwork.
  </div>
  <div class="pull-right">
    <img src="../assets/admin/layout2/img/CARE Network Logo 120x34.png" alt="CARE Network" />
  </div>
  <div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
  </div>
</div>
<!-- END FOOTER -->
</div>



<!-- Java Script -->

<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
 <script>
                     $("#CallZoom").click(function(e) { 
                        e.preventDefault();
                        var patientID = $("#patientId").val();
                        var userID = $("#userId").val();
                        var dataString = 'action=VideoCall&patientID='+patientID+'&userID='+userID; 
                        $.ajax({
                        type:'POST',
                        data:dataString,
                        url:'../config/routing.php',
                        error:function(data) { },
                        success:function(data) {

                        var returnedData = $.parseJSON(data);
                        if(returnedData!=null)
                        {
                          if(returnedData.status=='success')
                          {
                           window.open(returnedData.Location);  
                          }
                          else if(returnedData.status == 'failed')
                          {

                          alert(returnedData.message);

                          }
                        }
                        }
                        });
                        });
  
                </script>