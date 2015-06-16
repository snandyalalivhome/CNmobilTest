<?php include_once '../Master_Pages/header.php';?>
<?php include_once '../Master_Pages/sidebar.php';?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
<link href="../assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="../assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>
<!-- END PAGE LEVEL STYLES -->
<div class="page-content-wrapper">
  <div class="page-content">

    <!-- BEGIN PageContent -->

    <h3 class="page-title">
      Photo Upload <!--<small>amazing file upload experience</small>-->
    </h3>
    <div class="portlet light">
      <div class="portlet-body">
        <div class="row">
          <div class="col-md-12">
            <!--<div class="note note-danger">
									<p>
										 File Upload widget with multiple file selection, drag&amp;drop support, progress bars and preview images for jQuery.<br>
										 Supports cross-domain, chunked and resumable file uploads and client-side image resizing.<br>
										 Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.
									</p>
								</div>-->
           
            <form id="fileupload" action="../HandleFileUpload/AddPhotos/index.php" method="POST" enctype="multipart/form-data">
                
              <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
         
              <div class="row fileupload-buttonbar">
                <div class="col-lg-7">
            
                      
                
                  <button type="reset" class="btn warning cancel" onclick="window.location.href = '../config/routing.php?action=Landing'" >
                    <i class="fa fa-home"></i>
                    <span>
                      Home
                    </span>
                  </button>
                  <!-- The fileinput-button span is used to style the file input field as button -->
             <input type="hidden" name="PatientID" value=<?php echo $_SESSION['cpatientId'] ?> />
                     
                    <input type="hidden" name="UserID" value=<?php echo $_SESSION['cuserid'] ?> />
<!--                  <span  class="btn green fileinput-button">
                    <i class="fa fa-plus"></i>
                     <span> Add files</span>
                    <input type="file" name="files[]" multiple="" />
                 
                     <input type="hidden" name="UserID" value=1106 />
                     </span>-->
                    <span class="fileUpload btn btn-primary">
                        <i class="fa fa-plus"></i>
                       <span> Add Pics</span>
                        <input type="file" class="upload" />
                    </span>
                  <button type="submit" class="btn blue start">
                    <i class="fa fa-upload"></i>
                    <span>
                      Start upload
                    </span>
                  </button>
                  <button type="reset" class="btn warning cancel">
                    <i class="fa fa-ban-circle"></i>
                    <span>
                      Cancel upload
                    </span>
                  </button>
                  <button type="button"  onclick="window.location.href = 'Photo_Gallery.php'" class="btn blue start">
                    <i class="fa fa-picture-o"></i>
                    <span>
                      Gallery
                    </span>
                  </button>
                  <!--<input type="checkbox" class="toggle">
                                            <!-- The global file processing state -->
                  <span class="fileupload-process">
                  </span>
                </div>
                <!-- The global progress information -->
                <div class="col-lg-5 fileupload-progress fade">
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
              </div>
              <!-- The table listing the files available for upload/download -->
              <table role="presentation" class="table table-striped clearfix">
                <tbody class="files"></tbody>
              </table>
            </form>
            <div class="panel panel-success">

              <div class="panel-body">
                <ul>
                  <li>
                    Each file may not exceed <strong>3 MB</strong> in size, total upload may not exceed <strong>8 MB</strong>
                  </li>
                  <li>
                    Only image files (<strong>JPG, GIF, PNG</strong>) are allowed.
                  </li>

                </ul>
              </div>
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


<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
  <div class="slides">
  </div>
  <h3 class="title"></h3>
  <a class="prev">
    ‹
  </a>
  <a class="next">
    ›
  </a>
  <a class="close white">
  </a>
  <a class="play-pause">
  </a>
  <ol class="indicator">
  </ol>
</div>
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
      <button class="btn blue start" disabled="">
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
<!-- The template to display files available for download -->
<script id="template-download" type="text">

  {% for (var i=0, file; file=o.files[i]; i++)  { %}
  <tr class="template-download fade">
    <td>
      <span class="preview">
        {% if (file.thumbnailUrl) { %}
        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery="">
         
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
<script src="JS/Upload_Pics.js"></script>
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
  jQuery(document).ready(function() {

  FormFileUpload.init();
  });
</script>