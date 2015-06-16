<?php include_once '../Master_Pages/header.php';?>
<?php include_once '../Master_Pages/sidebar.php';?>
<!-- BEGIN PAGE LEVEL STYLES -->

<link href="../assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css" />


<!-- END PAGE LEVEL STYLES -->
<div class="page-content-wrapper">
  <div class="page-content">

    <!-- BEGIN PageContent -->
    <form id="CallZoom" action="">
      <div class="profile-sidebar" style="width: 250px;">
        <!-- PORTLET MAIN -->
        <div class="portlet light profile-sidebar-portlet">
          <!-- SIDEBAR USERPIC -->
          <div class="profile-userpic">
            <img src=<?php echo $_SESSION['Patientprofilepic'];?> class="img-responsive" alt=""/>
           </div>
          <!-- END SIDEBAR USERPIC -->
          <!-- SIDEBAR USER TITLE -->
          <div class="profile-usertitle">
            <div class="profile-usertitle-name">
             <?php echo $fstPatient->fName.' '. $fstPatient->lName ; ?>
            </div>
            <div class="profile-usertitle-job">
                 <i class="fa fa-phone"></i>
                <a href="tel:<?php echo $fstPatient->phone ?>">
                <?php 
                    echo $fstPatient->phone;
                     
                    //$regex = '/^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?$/';
                    //$formatted = preg_replace($regex,'($1) $2-$3 ext. $4', $fstPatient->phone );
                    //echo $formatted;
                ?>
                </a>
            </div>
          </div>
          <!-- END SIDEBAR USER TITLE -->
          <!-- SIDEBAR BUTTONS -->
          <div class="profile-userbuttons">
              <input type="hidden" id="patientId" value=<?php echo $fstPatient->userId ?> />
               <input type="hidden" id="userId" value=<?php echo $fstPatient->relatedUsrId ?> />
            <a  id="VideoCall1" data-toggle="modal" href="#basic"  class="btn btn-circle blue-custom" >Video Call</a>
            <a  onclick="window.location.href = '../Views/Message.php'" class="btn btn-circle green-jungle-custom ">Message</a>
            
          </div>
          <br />
          <div class="profile-userbuttons">
            <a  id="PhotoGallery1" onclick="window.location.href = '../Views/Photo_Gallery.php'" class="btn btn-circle red-flamingo">
              Pictures
            </a>
              <a id="Calendar1" onclick="window.location.href = '../Views/Calendar.php'" class="btn btn-circle yellow-custom" >
              Calendar
            </a>
            <a  id="CareJournal" onclick="window.location.href = '../Views/Care_Journal.php'" class="btn btn-circle default" >
              Care Journal
            </a>
          </div>



          <!--<button class="btn blue btn-block">Button</button>
        <input type="button" class="btn red btn-block" value="Input">
        <input type="submit" class="btn purple btn-block" value="Submit">-->

          <br />
        </div>

      </div>
    </form>
  </div>
</div>
<!-- END CONTENT -->

<!--Close div from master page sidebar.php -->
</div>

    <div id="basic" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="caption-subject font-blue-madison bold"><h4 class="modal-title">Video Call</h4></span>
                    
                </div>
                <div class="modal-body">
                    <h4>Are You Sure You Want To Video Call <?php echo $fstPatient->fName.' '. $fstPatient->lName ; ?>  </h4> 
                   
                </div>
                <div class="modal-footer">
                     <button id="VideoCall"  data-dismiss="modal" class="btn blue col-md-3" >Yes</button>
                     <button  data-dismiss="modal" class="btn default col-md-3" >No</button>
                </div>
            </div>
        </div>
    </div>

<?php include_once '../Master_Pages/footer.php';?>


<script>
  $("#VideoCall").click(function(e) { 
  e.preventDefault();
  var patientID = $("#patientId").val();
  var userID = $("#userId").val();
  var dataString = 'action=VideoCall&patientID='+patientID+'&userID='+userID; 
  $.ajax({
  type:'POST',
  data:dataString,
  url:'routing.php',

  error:function(data) { alert('error Occured: '+data);},
  success:function(data) {

  var returnedData = $.parseJSON(data);
  if(returnedData!=null)
  {
    if(returnedData.status=='success')
    {
       // callOtherDomain(returnedData.Location);
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
  
   function createCrossDomainRequest(url, handler) {
    var request;
     var isIE8 = window.XDomainRequest ? true : false;
    if (isIE8) {
      request = new window.XDomainRequest();
      }
      else {
        request = new XMLHttpRequest();
      }
      alert("createCrossDomainRequest "+request);
    return request;
  }

  function callOtherDomain(url) { alert("callingother domain");
      var invocation = createCrossDomainRequest();
       var isIE8 = window.XDomainRequest ? true : false;
    if (invocation) {alert("invocation ");
      if(isIE8) {
        invocation.onload = outputResult;
        invocation.open("GET", url, true);
        invocation.send();
      }
      else {
        invocation.open('GET', url, true);
        invocation.onreadystatechange = handler;
        invocation.send();
      }
    }
    else {
      var text = "No Invocation TookPlace At All";
      var textNode = document.createTextNode(text);
      var textDiv = document.getElementById("textDiv");
      textDiv.appendChild(textNode);
    }
  }

  function handler(evtXHR) {alert("handler ");
         var invocation = createCrossDomainRequest();
    if (invocation.readyState == 4)
    {
      if (invocation.status == 200) {
          outputResult();
      }
      else {
        alert("Invocation Errors Occured");
      }
    }
  }

  function outputResult() {
         var invocation = createCrossDomainRequest();
    var response = invocation.responseText;
    var textDiv = document.getElementById("textDiv");
    textDiv.innerHTML += response;
  }
  function delay(time) {
  var d1 = new Date();
  var d2 = new Date();
  while (d2.valueOf() < d1.valueOf() + time) {
    d2 = new Date();
  }
}
   $("#PhotoGallery").click(function(e) { 
  e.preventDefault();
  var patientID = $("#patientId").val();
  var userID = $("#userId").val();
  var dataString = 'action=PhotoGallery&patientID='+patientID+'&userID='+userID; 
  $.ajax({
  type:'POST',
  data:dataString,
  url:'routing.php'
 
  });
  });
  
     
  
  
</script>