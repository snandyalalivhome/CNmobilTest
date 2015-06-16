<?php include_once '../Master_Pages/login_header.php';

?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
<link href="../assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="../assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>
<!-- END PAGE LEVEL STYLES -->
<div class="page-content-wrapper">
  <div class="page-content" >
  
      <div class="col-md-12">
        <div class="portlet box blue">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-user"></i>Complete Profile
            </div>
          </div>
          <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <br/>
          <?php   if(isset($_GET["UserID"]))
       {
           $currentUserId=$_GET["UserID"];
       }?>
             
            <form id="fileupload" action=<?php echo '../HandleFileUpload/UploadProfilePic/index.php?UserID='. $currentUserId?>  method="POST" enctype="multipart/form-data" class="form-horizontal form-row-sepe">
                <input type="hidden" name="UserID" value=<?php echo $currentUserId ?> />
              <div class="row fileupload-buttonbar">
                <div class="col-lg-7">
                  <!-- The fileinput-button span is used to style the file input field as button -->
                  <span class="btn green fileinput-button">
                    <i class="fa fa-plus"></i>
                    <span>
                      Choose Profile Pic
                    </span>
                    <input type="file" name="files[]" multiple=""/>
                  </span>

                </div>
          
              </div>
                    <div id="Wait" style="display: none">
                       <h4> Please wait while your full profile loads completely...
                           <img src="../assets/admin/layout2/img/ajax-loading.gif" alt="Loading..." ></h4>
                   </div>
                <div class="col-lg-5 fileupload-progress fade" style="display:none">
                  <!-- The global progress bar -->
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;">
                    </div>
                  </div>
                  <!-- The extended global progress information -->
                  <div class="progress-extended">
                    &nbsp;
                  </div>
                </div>
                <table role="presentation" class="table table-striped clearfix" id="presentation">
                  <tbody class="files"></tbody>
                </table>
                  <ul>
                    <li>
                     File Restrictions: Dimensions should not be more than 150 x 150. Must Be .jpg or .png. Must be less than 200kb 
                    </li>
                  </ul>
                  <div class="col-md-4" id="tilesID">
                   
                  </div>
                
               </form> 
            <form id="profileForm" action="../config/routing.php?action=CompleteProfile" method="Post" class="form-horizontal form-row-sepe" >
             <div class="form-body">
              
                <div class="form-group">
                  <div class="col-md-4">
                      <select id="gender" name="gender" class="form-control input-large select2me" data-placeholder="Select..." >
                      <option value="-1">Gender *</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="3">Don't Disclose</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                <div class="col-md-4">
                    <select  id="timeZone" name="timeZone" class="form-control input-large select2me" data-placeholder="Select..." required="true">
                        <option value='-1'>Select...</option>
                        <option value='America/New_York'>Eastern</option>
                        <option value='America/Chicago'>Central</option>
                        <option value='America/Denver'>Mountain</option>
                        <option value='America/Phoenix'>Mountain no DST</option>
                        <option value='America/Los_Angeles'>Pacific </option>
                        <option value='America/Adak'>Hawaii</option>
                        <option value='Pacific/Honolulu'>Hawaii no DST</option>
                    </select>
<!--               <select  id="timeZone" name="timeZone" class="form-control input-large select2me" data-placeholder="Select...">
                      <?php //$timeZones = DateTimeZone::listIdentifiers(); 
                     // for($i=0;$i<count($timeZones)/30;$i++){   $tz=$timeZones[$i];  ?>
                  <option value=<?php// echo $tz?>> <?php //echo $tz?></option>
                   <?php// }?>
                    </select>-->
                </div>
              </div>
              </div>
                <div class="form-actions right">
                  <button type="submit" class="btn green" onclick="checkProfPic();" id="SaveProfile" >Ok</button>
            </div>
            </form>
       
          </div>
          </div>
        </div>
      </div>
  </div>
 <div id="basic" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="caption-subject font-blue-madison bold"><h4 class="modal-title">Pending Profile Pic</h4></span>
                    
                </div>
                <div class="modal-body">
                    <h4> Do you want to upload the profile pic you have chosen </h4> 
                    
                </div>
                <div class="modal-footer">
                     <button  data-dismiss="modal" class="btn blue col-md-3" id="uploadConfirm" >OK</button>
                     <button  data-dismiss="modal" class="btn blue col-md-3" >Cancel</button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include_once '../Master_Pages/login_footer.php';?>

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script id="template-upload" type="text/x-tmpl">
  {% 
              for (var i=0, file; file=o.files[i]; i++) {  %}
  <tr class="template-upload fade">
    <td>
      <span class="preview"></span>
    </td>
    <td>
      <p class="name">{%=file.name%}</p>
      <strong class="error text-danger label label-danger"></strong>
    </td>
    <td>
      <p class="size">Processing...</p>
      <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
      </div>
    </td>
    <td>
      {% if (!i && !o.options.autoUpload) { %}
      <button id="uploadpic" class="btn blue start" disabled="">
        <i class="fa fa-upload"></i>
        <span>Start</span>
      </button>
      {% } %}
      {% if (!i) { %}
      <button class="btn red cancel">
        <i class="fa fa-ban"></i>
        <span>Cancel</span>
      </button>
      {% } %}
    </td>
  </tr>
  {% } %}
</script>

<script id="template-download" type="text">

  {%
         
   // var json = JSON.parse(o);
      // var returnedData = $.parseJSON(o);
  $('#Wait').hide();
      for (var i=0, file; file=o.files[i]; i++) {  var tiles=$('#tilesID') ; var url=file.url; var filename=file.name; 
  var appenditem="<div class='tiles'> <div class='tile image selected'><div class='tile-body'><img src='" +file.url+"'/></div><div class='tile-object'></div></div> </div>";
 tiles.replaceWith(appenditem);
 // tiles.innerHTML = appenditem;
  if(file.timeZone !='')
  {
      // alert(file.timeZone);
    
    $("#timeZone").val(file.timeZone);
  }
    if(file.gender !='')
  {
      // alert(file.gender);
    
    $("#gender").val(file.gender);
  }
  if(file.new != '')
  {
       if(file.new == 'True')
       {
           //alert("reload");
            location.reload();
       }
  }
  %}


  {% } %}
  

</script>

<!-- The template to display files available for download -->
<script id="template-download" type="text">

  {% 
          
         for (var i=0, file; file=o.files[i]; i++)  { %}
  <tr class="template-download fade">
    <td>
      <span class="preview">
        {% if (file.thumbnailUrl) { %}
        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery="">
          <img src="{%=file.thumbnailUrl%}">
        </a>
        {% } %}
      </span>
    </td>
    <td>
      <p class="name">
        {% if (file.url) { %}
        <a href="{%=file.url%}" title="{%=file.name%}">{%=file.name%}</a>
        {% } else { %}
        <span>{%=file.name%}</span>
        {% } %}
      </p>
      {% if (file.error) { %}
      <div>
        <span class="label label-danger">Error</span> {%=file.error %}
      </div>
      {% } %}
    </td>
    <td>
      <span class="size">{%=o.formatFileSize(file.size)%}</span>
    </td>
    <td>
      {% if (file.deleteUrl) { %}
      <button class="btn btn-success" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"  disabled=''>
        <i class="fa fa-check"></i>
        <span>Uploaded Successfully</span>
      </button>
      <input type="checkbox" name="delete" value="1" class="toggle"/>
      {% } else { %}
      <button class="btn yellow cancel btn-sm">
        <i class="fa fa-ban"></i>
        <span>Cancel</span>
      </button>
      {% } %}
    </td>
  </tr>
  {% } %}

</script>
<script>

 
  $("#uploadpic").click(function(e) { alert("onclick");
  e.preventDefault();

  $.ajax({
  type:'POST',

  url:'../HandleFileUpload/UploadProfilePic/Index.php',
  error:function(data) { alert(data);},
  success:function(data) {

  var returnedData = $.parseJSON(data);alert(returnedData); 
    if(returnedData.status == "True")
      {
       location.reload();
      }
    else
      {
        alert("Failed to delete pics");
      }


  }
  });
  });

  $('#profileForm').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                gender: {
                    required: {
                                depends: function(element){
                                if( $('#gender').val() == '-1'){
                                    $('#gender').val('');
                                }
                                return true;
                                }
                    }
                 },
                timeZone: {
                    required: {
                                depends: function(element){
                                if( $('#timeZone').val() == '-1'){
                                    $('#timeZone').val('');
                                }
                                return true;
                                }
                    }
                }
               
            },
         invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.profileForm')).show();
            },
            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            

            submitHandler: function(form) {
                
                form.submit(); // form validation success, call ajax form submit
            },
            

});

 $('.profileForm input').keypress(function(e) {
            if (e.which == 13) {
             
                if ($('.profileForm').validate().form()) {
                    $('.profileForm').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
        


 
function checkProfPic(){
  
    var pendingFiles=$('.files').html(); 
  if(pendingFiles != null || pendingFiles != '')
  {
     // $('#SaveProfile').attr('href','#basic');
      //$('#SaveProfile').attr('data-toggle','modal');
    $('#uploadpic').trigger('click');
   // $('#uploadprofPic').trigger('click');
  }
}

</script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<!-- END PAGE LEVEL PLUGINS-->
<!-- BEGIN:File Upload Plugin JS files-->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="../assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="../assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="../assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="../assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="../assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="../assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="../HandleFileUpload/UploadProfilePic/js/main.js"></script>
<script src="../assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="../assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="../assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="../assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="../assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="../assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="../assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
    <script src="../assets/global/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->
<!-- END:File Upload Plugin JS files-->

<script src="../assets/admin/pages/scripts/form-fileupload.js"></script>
<script>
     jQuery(window).load(function() {
        $('#Wait').show();

    });
  jQuery(document).ready(function() {

  FormFileUpload.init();
  });
</script>
<style>
  .override{
  background-color: #364150;
  min-height:500px;
  }

</style>
<script>
  $(document).ready(function(){
  $(".page-content").addClass("override");
  $(".page-content").css("min-height","500px");

  });
</script>