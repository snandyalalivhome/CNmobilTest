<?php include_once '../Master_Pages/header.php';?>
<?php include_once '../Master_Pages/sidebar.php';?>

<div class="page-content-wrapper">

  <div class="page-content">
    <button type="reset" class="btn warning cancel" onclick="window.location.href = '../config/routing.php?action=Landing'" >
       <i class="fa fa-home"></i>
         <span>
            Home
         </span>
    </button>
    <button type="button" onclick="window.location.href = '../config/routing.php?action=Calendar'"class="btn blue start">
      <i class="fa fa-calendar"></i>
      <span>
        Add More Events
      </span>
    </button>
   
    <input type="hidden" id="patientId" value=<?php echo  $_SESSION['cpatientId'] ?> />
    <input type="hidden" id="hdncalId"/> <!-- can be used to del cal event. sn -->

    <!-- BEGIN PageContent -->
	<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box green-meadow calendar">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>Calendar
								</div>
							</div>
							<div class="portlet-body">
								<div class="row">
								
									<div class="col-md-9 col-sm-12">
            
										<div id="calendar" class="has-toolbar">
										</div>
									</div>
								</div>
								<!-- END CALENDAR PORTLET-->
							</div>
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->
  </div>
   </div>
<!-- END CONTENT -->

    <div id="basic" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="caption-subject font-blue-madison bold"><h4 class="modal-title">Event Details</h4></span>
                    
                </div>
                <div class="modal-body">
                    <h4>Name: <label id="eventDetailTitle"> </label> </h4> 
                    <h4>Description:  <label id="eventDetailDesc"> </label></h4> 
                    <h4>Location:  <label id="eventDetailLocation"> </label></h4> 
                </div>
                <div class="modal-footer">
                     <button  data-dismiss="modal" class="btn blue col-md-3" >OK</button>
                </div>
            </div>
        </div>
    </div>
<!--Close div from master page sidebar.php -->
</div>

<?php include_once '../Master_Pages/footer.php';?>

<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet"/>
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="../assets/global/plugins/moment.min.js"></script>
<script src="../assets/global/plugins/fullcalendar/fullcalendar.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/admin/pages/scripts/calendar.js"></script>


<script>
  jQuery(document).ready(function() {
  // initiate layout and plugins

  //Calendar.init();
     var datastring=$('#patientId').val(); 
    // var dd = $.fullCalendar.formatDate(date,"yyyy-MM-dd"); 
    // start = $.fullCalendar.formatDate(start, "YYYY-MM-dd HH:mm:ss");
      var calendar = $('#calendar').fullCalendar({

                    header: {
                        center: 'prev,next today',

                        right: 'month,agendaWeek,agendaDay'
                    },
                    theme: false,
                    allDayDefault: false,
                    defaultView: 'month',
                    selectable: true,
                    selectHelper: true,
                    editable: true,
                    data:datastring,
                    events: "../Controller/renderEvents.php?UserID="+datastring,
                    eventRender: function (event, element, view) {
                       // alert(event.id);  
                       // var txt='<button id="delete" class="close" aria-hidden="true" onclick="sendCalId('+event.id + ')" type="button" data-toggle="modal" href="#basic"></button>';
                       var title=event.title;
                       var eTitle = title.replace(/\s+/g, "-");
                       var desc=event.description;
                       var eDesc = desc.replace(/\s+/g, "-");
                       var location=event.location;
                       var eLoc = location.replace(/\s+/g, "-");
                       var onclickevt= "expandDetail('"+eTitle +"','"+eDesc+"','"+eLoc+"')";
                       //alert(onclickevt);
                        // var txt='<span class="fc-title"><a id="expand"  onclick='+onclickevt+' data-toggle="modal" href="#basic" style="Color: white">'+event.title+'</a></span>';
                       // alert(txt);
                       // var divhref="href='#basic'";
                        // element.find(".fc-content").attr('#basic');//(divhref);
                      //element.find(".fc-title").replaceWith(txt);
                       element.find("div.fc-content").attr("href","#basic");
                       element.find("div.fc-content").attr("data-toggle","modal");
                       element.find(".fc-content").click(function() {
                          expandDetail(eTitle,eDesc,eLoc);
                          });

                       // element.find("#DeleteEntryConfirm").click(function () {
                           // deleteEntry();
                           // alert(event.id);
                           // $("#hdncalId").val()= event.id;
                            
                          // document.getElementById('hdncalId').value = event.id;
                     
                        //});
                    }
                });
                
                // $('div.fc-content').attr("href","#basic");
              //   $('div.fc-content').attr("data-toggle","modal");
   
// var startDate = calendar.formatDate( start, "yyyy-MM-dd"); 
  //  var endDate = calendar.formatDate( end, "yyyy-MM-dd");
  
  });
  
  function sendCalId(eventID)
  {
    //alert("sendCalId "+eventID);
      document.getElementById('hdncalId').value = eventID;
     // $('#hdncalId').val()=eventID;
     // alert(( document.getElementById('hdncalId').value ))
      
  }
   function expandDetail(eventTitle,eventDesc,eventLocation)
  {
     // alert(eventLocation);
      var origTitle=eventTitle.replace(/-/g,' ');
      // alert("eventTitle: "+origTitle);
      var origDesc=eventDesc.replace(/-/g,' '); 
      var origLoc=eventLocation.replace(/-/g,' '); 
     // alert("eventDesc: "+origDesc);
    //alert("evantTitle: "+evantTitle+" expandDetail: "+expandDetail);
      document.getElementById('eventDetailTitle').innerHTML = origTitle;
      document.getElementById('eventDetailDesc').innerHTML = origDesc; 
      document.getElementById('eventDetailLocation').innerHTML = origLoc; 
      // $('#basic').show();
     // $('#hdncalId').val()=eventID;
     // alert(( document.getElementById('hdncalId').value ))
      
  }
  // removed delete event feature- sn
//   $("#DeleteEntryConfirm").click(function(e) {
//  e.preventDefault();
//
//var CalId=$('#hdncalId').val(); 
//var PatientId=$('#patientId').val(); 
//var datastring= "action=DeleteEvent&EventID="+CalId+"&PatientID="+PatientId;
//
//
//  $.ajax({
//  type:'POST',
//  data:datastring, //button:myJSONText, 
//  url:'../config/routing.php',
//  error:function(data) { alert(data);},
//  success:function(data) {
//
//  var returnedData = $.parseJSON(data);
//    if(returnedData.status == "success")
//      {
//       location.reload();
//      }
//    else
//      {
//        alert("Failed to delete Event");
//      }
//
//
//  }
//  });
//  });
</script>

