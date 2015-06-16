<?php include_once '../Master_Pages/header.php';?>
<?php include_once '../Master_Pages/sidebar.php';?>

<div class="page-content-wrapper">
  <div class="page-content">

    <!-- BEGIN PageContent -->
    <div class="row">
      <div class="col-md-12">
        <div class="portlet box red-sunglo">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-gift"></i>Add Calendar Event
            </div>
            <div class="tools">
              <a href="javascript:;" class="collapse">
              </a>
              <a href="javascript:;" class="reload">
              </a>
            </div>
          </div>
          <div class="portlet-body form">
            <!-- BEGIN FORM-->

            <form id="AddCalEventForm" action="#" class="form-horizontal form-bordered">
                
              <div class="form-body">
                <div class="form-group">
                  <label class="control-label col-md-3">Title</label>
                  <div class="col-md-4">
                    <input class="form-control" id="title" name="Title" type="text" />

                  </div>
                </div>

<!--                <div class="form-group">
                  <label class="control-label col-md-3">Event Type</label>
                  <div class="col-md-4">
                    <select class="form-control input-medium select2me" name="EventType" id="type" data-placeholder="Select...">
                      <option value="">Select Event Type</option>
                      <?php //foreach($eventTypes as $eventType) {   ?>
                      <option value=<?php //echo $eventType['Value']  ?> > <?php// echo $eventType['Title'] ?>  </option>
                     <?php //} ?>
                     
                    </select>

                  </div>
                </div>-->
                <div class="form-group">
                  <label class="control-label col-md-3">Description</label>
                  <div class="col-md-4">
                    <textarea class="form-control" id="description" ></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Location</label>
                  <div class="col-md-4">
                    <input class="form-control" id="location" type="text" />

                  </div>
                </div>
              
            <div class="form-group">
              
                    <label class="control-label col-md-3">Start Date</label>
                    <div class="col-md-3">
			<input class="form-control input-medium date-picker" size="16" data-date-format="yyyy-mm-dd" type="text" value="" id="startDate" name="Start" />
                    </div>
		
               
                    <label class="control-label col-md-3">Start Time</label>
                    <div class="col-md-3">
			<div class="input-group">
                            <input type="text" id="startTime" class="form-control timepicker timepicker-no-seconds">
				<span class="input-group-btn">
                                    <button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
				</span>
			</div>
                    </div>
                
            </div>
            <div class="form-group">
                    <label class="control-label col-md-3">End Date</label>
                    <div class="col-md-3">
			<input class="form-control input-medium date-picker" size="16" data-date-format="yyyy-mm-dd" type="text" value="" id="endDate" name="End" />
                    </div>
                    <label class="control-label col-md-3">End Time</label>
                    <div class="col-md-3">
			<div class="input-group">
                            <input type="text" id="endTime" class="form-control timepicker timepicker-no-seconds">
				<span class="input-group-btn">
                                    <button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
				</span>
			</div>
                    </div>
                
            </div>
<!--                <div class="form-group">
                  <label class="control-label col-md-3">Start Date Time</label>
                  <div class="col-md-4">
                    <div class="input-group date form_datetime">
                      <input type="text" id="starttime" name="Start" data-format="dd/MM/yyyy hh:mm:ss" size="16" readonly="" class="form-control">
                        <span class="input-group-btn">
                          <button class="btn default date-set" type="button">
                            <i class="fa fa-calendar"></i>
                          </button>
                        </span>
                      </div>
                     /input-group 
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">End Date Time</label>
                  <div class="col-md-4">
                    <div class="input-group date form_datetime">
                      <input type="text" id="endtime" name="End" size="16" readonly="" class="form-control">
                        <span class="input-group-btn">
                          <button class="btn default date-set" type="button">
                            <i class="fa fa-calendar"></i>
                          </button>
                        </span>
                      </div>
                     /input-group 
                  </div>
                </div>-->

        
              </div>
                <div class="form-actions right">
                    <button class="btn" id="cancelAddEvent" data-dismiss="modal" aria-hidden="true" >Home</button>
                    <button id="AddEvent" type="submit" class="btn green" data-dismiss="modal">Add</button>
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
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/jquery-tags-input/jquery.tagsinput.css"/>
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/global/plugins/typeahead/typeahead.css">
    <link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>

    <!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="../assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="../assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../assets/global/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/components-pickers.js"></script>
<script type="text/javascript" src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
  jQuery(document).ready(function() {
  ComponentsPickers.init();
 
 //datetimepicker.init();
  });

  

   $("#AddCalEventForm").validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                Title: {
                    required: true
                },
                Start: {
                    required: true
                },
                End: {
                    required: true
                }
                       
            },
         invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.AddCalEventForm')).show();
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


        
   
   $("#AddEvent").click(function(e) { 
  e.preventDefault();
  var title= $('#title').val();
  var desc= $('#description').val();
  var location=$('#location').val();
  var startdate=$('#startDate').val();
  var enddate=$('#endDate').val();
  var starttime=convertTo24Hour($("#startTime").val().toLowerCase());
  var endtime=convertTo24Hour($("#endTime").val().toLowerCase());
 
  var dataString = 'action=AddEvent&Event=true&Title='+title+'&Description='+desc+"&Location="+location+"&StartDate="+startdate+"&EndDate="+enddate+"&StartTime="+starttime+"&EndTime="+endtime;
 
  //if(title!=='' && starttime !=='' && endtime!=='' )
  if ($('#AddCalEventForm').validate().form()) 
  {
      
     $.ajax({
  type:'POST',
  data:dataString,
  url:'routing.php',
  error:function(data) { alert('error Occured: '+data);},
  success:function(data) {

   top.location.href = '../Views/Calendar.php';
  
  }
  });  
  }

  });
  $('#cancelAddEvent').click(function(e)
{
      e.preventDefault();
     // onclick="window.location.href = '../config/routing.php?action=Landing'"
     $(location).attr('href','../config/routing.php?action=Landing');
});

function convertTo24Hour(time) {
    var hours = parseInt(time.substr(0, 2));
    if(time.indexOf('am') != -1 && hours == 12) {
        time = time.replace('12', '0');
    }
    if(time.indexOf('pm')  != -1 && hours < 12) {
        time = time.replace(hours, (hours + 12));
    }
    return time.replace(/(am|pm)/, '');
}
</script>

