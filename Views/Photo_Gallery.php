<?php include_once '../Master_Pages/header.php';?>
<?php include_once '../Master_Pages/sidebar.php';?>


<div class="page-content-wrapper">
  <div class="page-content">

    <!-- BEGIN PageContent -->
    <h3 class="page-title">
      Photo Gallery <!--<small>amazing file upload experience</small>-->
    </h3>
    <div class="portlet light">
      <div class="portlet-body">
        <div class="row">
          <div class="col-md-12">
             <input type="hidden" id="userId" value=<?php echo  $_SESSION['cpatientId'] ?> />
             <form id="fileupload" action=<?php echo '../HandleFileUpload/AddPhotos/GalleryIndex.php?UserID='. $_SESSION['cpatientId']?> method="POST" enctype="multipart/form-data">
                  <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                 <div class="row fileupload-buttonbar">
                  <div class="col-lg-7">
                    <button type="reset" class="btn warning cancel" onclick="window.location.href = '../config/routing.php?action=Landing'" >
                        <i class="fa fa-home"></i>
                        <span>
                          Home 
                        </span>
                     </button>
                     <button type="submit" Id="DeletePics" class="btn red delete">
                        <i class="fa fa-trash"></i>
                        <span>
                          Remove
                        </span>
                     </button>
                    <button type="button" onclick="window.location.href = 'Upload_Pics.php'" class="btn blue start">
                      <i class="fa fa-upload"></i>
                      <span>
                        Add More Photos
                      </span>
                    </button>
           
                  </div>
                     <div class="col-lg-7">
                         
                     </div>
                      <div class="row fileupload-buttonbar">
                    </div>
                 </div>
                
                   
                    <div class="tiles" id="tilesID">
                    </div> 
            </form>
               <div id="Wait" style="display: none">
                   <h4> Loading current pictures from <?php echo $_SESSION['cpatientName'];?>'s tablet...
                       <img src="../assets/admin/layout2/img/ajax-loading.gif" alt="Loading..." ></h4>
               </div>
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



<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script id="template-upload" type="text/x-tmpl">
  {% for (var i=0, file; file=o.files[i]; i++) {  %}

  {% } %}
</script>
<script id="template-download" type="text">

  {%  $('#Wait').hide();  for (var i=0, file; file=o.files[i]; i++) { var tiles=$('#tilesID') ; var thumbnail=file.url; var filename=file.name; var fileId=file.frameID; 
  var appenditem="<div class='tile image selected'><div class='tile-body'><img src='" +file.url+"'/> </div> <div class='tile-object'> <div class='name'>  <input type='checkbox' name='button[]' value='"+fileId+"' class='toggle'/></div></div></div> ";

  tiles.append (appenditem);

  %}


  {% } %}

</script>
<script>
    jQuery(window).load(function() {
        $('#Wait').show();

    });
  jQuery(document).ready(function() {
  // initiate layout and plugins

  FormFileUpload.init();
  

  });
  $("#DeletePics").click(function(e) {
  e.preventDefault();
  var chkboxes = $('input:checkbox:checked').map(function() {
  return this.value;
  }).get();
  var myJSONText = JSON.stringify(chkboxes); 
var user=$('#userId').val(); 
var datastring= "UserID="+user+"&button="+myJSONText;


  $.ajax({
  type:'POST',
  data:datastring, //button:myJSONText, 
  url:'../HandleFileUpload/AddPhotos/GalleryIndex.php?',
  error:function(data) { alert(data);},
  success:function(data) {

  var returnedData = $.parseJSON(data);
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
<script src="JS/Gallery.js"></script>
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
<script src="../assets/admin/pages/scripts/form-fileupload.js"></script>
<!-- The main application script -->
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
    <script src="../assets/global/plugins/../assets/global/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->
<!-- END:File Upload Plugin JS files-->





