<?php include_once '../Master_Pages/login_header.php';?>
<div class="page-content-wrapper">
  <div class="page-content" >
  
      <div class="col-md-12">
        <div class="portlet box blue">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-lock"></i>Security Questions
            </div>
          </div>
          <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form id="SecurityQuestionForm" action="../config/routing.php?action=SaveSecurityQuestions" method="post" class="form-horizontal form-row-sepe">
              <div class="form-body">
                All fields are required
                 <div id="ShowMsg" class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                        <span>
                        Please Answer All Questions
                        </span>
                  </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Security Question 1</label>
                  <div class="col-md-4">
                   <?php
                       
                        echo "<select name='Q1' class='form-control input-large select2me' data-placeholder='Select...'>";
                        for ($i = 0; $i < count($rows); $i++) {
                            $row = $rows[$i];
                            if ($row->group == 1){
                                echo "<option value='" . $row->Id . "'>" . $row->question . "</option>";
                            }   
                        }
                        echo "</select>";

                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Answer</label>
                  <div class="col-md-4">
                    <input type="text" id="Ans1" name="A1"> </input>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Security Question 2</label>
                  <div class="col-md-4">
                   <?php
                       
                        echo "<select name='Q2' id='Q2' class='form-control input-large select2me' data-placeholder='Select...'>";
                        for ($i = 0; $i < count($rows); $i++) {
                            $row = $rows[$i];
                            if ($row->group == 2){
                                echo "<option value='" . $row->Id . "'>" . $row->question . "</option>";
                            }   
                        }
                        echo "</select>";

                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Answer</label>
                  <div class="col-md-2" id="ansTxtbox">
                    <input type="text" id="Ans2" name="A2"> </input>
                    
                  </div>
                   <div class="col-md-2" id="ansMnthddl">
                   <select  name='AMonth2' id='AMonth2' class='form-control input-small select2me' data-placeholder='Select...'>
                    <?php 
                   
                    for ($m=1; $m<=12; $m++) {
                        echo '  <option value="' . $m . '">' . date('M', mktime(0,0,0,$m)) . '</option>' ;
                    }
                   
                   ?>
                   </select>
                  </div>
                
                  <div class="col-md-2" id="ansYearddl">
                    <select  name='AYear2' id='AYear2' class='form-control input-small select2me' data-placeholder='Select...'>
                    <?php 
                    
                    for($starting_year; $starting_year <= $ending_year; $starting_year++) {
                    if($starting_year == date('Y')) {
                        echo '<option value="'.$starting_year.'" selected="selected">'.$starting_year.'</option>';
                    } else {
                        echo '<option value="'.$starting_year.'">'.$starting_year.'</option>';
                    }
                } 
                    ?>
                    </select>   
                  </div>
                       
                  
                </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Security Question 3</label>
                    <div class="col-md-4">
                   <?php
                       
                        echo "<select name='Q3' class='form-control input-large select2me' data-placeholder='Select...'>";
                        for ($i = 0; $i < count($rows); $i++) {
                            $row = $rows[$i];
                            if ($row->group == 3){
                                echo "<option value='" . $row->Id . "'>" . $row->question . "</option>";
                            }   
                        }
                        echo "</select>";

                    ?>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Answer</label>
                  <div class="col-md-4">
                    <input type="text" id="Ans3" name="A3"> </input>
                  </div>
                </div>
                </div>
            <div class="form-actions right">
              
              <button type="submit" class="btn green" id="SaveQuestions" >Save</button>
            </div>
            </form>


          </div>

          
        </div>
      </div>

  </div>
</div>
<?php include_once '../Master_Pages/login_footer.php';?>
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
  // .page-content { color: red; background: pink; }
  //$(".page-content").css("min-height","500px";"background-color","#364150 !important");
  //$(".page-content").css("min-height","500px");
  //$(".page-content").css("background-color","#364150 !important");

   var Q2=  $("#Q2 option:selected").text();
   if(Q2.indexOf('month') == -1)
   {
       
       $('#ansTxtbox').show();
       $('#ansMnthddl').hide();
       $('#ansYearddl').hide();
   }
   else
   {
       $('#ansTxtbox').hide();
       $('#ansMnthddl').show();
       $('#ansYearddl').show();
       
   }

  });
  $("#Q2").change(function () {
        var Q2=  $("#Q2 option:selected").text();
      if(Q2.indexOf('month') == -1)
   {
       
       $('#ansTxtbox').show();
       $('#ansMnthddl').hide();
       $('#ansYearddl').hide();
   }
   else
   {
        $('#ansTxtbox').hide();
        $('#ansMnthddl').show();
        $('#ansYearddl').show();
   }
    });
 
  $('#SecurityQuestionForm').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                A1: {
                    required: true
                },
                A2: {
                    required: true
                },
                A3: {
                    required: true
                }
            },
         invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.SecurityQuestionForm')).show();
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
                if ($('#ansTxtbox').is(':visible') ==false ) {
                     var valA2=$('#AYear2').val()+'-'+$('#AMonth2').val();
                    $('#Ans2').val(valA2);
                }
                form.submit(); // form validation success, call ajax form submit
            },
            

});

 $('.SecurityQuestionForm input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.SecurityQuestionForm').validate().form()) {
                    $('.SecurityQuestionForm').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
</script>