<?php 
$search_url = base_url('admin-payment-list');
?>
 <div class="" id="payment-status" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Payment Status Report</h4>
                  </div>
                  <div class="col">
                   <!--  <a href="<?php //echo base_url('admin-payment-mess'); ?>" class="btn btn-secondary btn-sm float-right" style="margin-left: 15px;">Mess Alert</a> 
                    <a href="<?php //echo base_url('admin-payment-hostel'); ?>" class="btn btn-secondary btn-sm float-right" style="margin-left: 15px;">Hostel Alert</a> -->
                  </div>
                </div>
                <hr>
                <span id="send_sms_msg" style="color:green"></span>
                <div class="table-responsive">

                	       <div class="asd" style="">
                      <form name="frm" id="frm" method="get" action="<?php echo $search_url; ?>">

                                      
                                          
                                          <div class="form-row">
                                              <div class="col-md-3">

                                                  <div class="form-group">
                                                   

                                                      <div class="">
                                                         <label>Bhavan </label>
                                                       <select class="custom-select" name="search_by_bhavan" id="search_by_bhavan">
                                                        <option value="" selected>Choose Bhavan...</option>

                                                          <?php

                                                          if(!empty($all_institutes))
                                                          {
                                                            foreach($all_institutes as $institute)
                                                            { ?>

                                                              <option <?php if((isset($_GET['search_by_bhavan']) && $_GET['search_by_bhavan'] == $institute->id )){ echo "selected";} ?>  value="<?php echo $institute->id; ?>"><?php echo $institute->institute_name; ?></option>
                                                           <?php 
                                                          }
                                                          }

                                                          ?>
                                                        </select>
                                                       
                                                      </div>
                                                  </div>
                                              </div>

                                              <div class="col-md-3">

                                                  <div class="form-group">
                                                   

                                                      <div class="">
                                                        <label >Course</label>
                                                       <select class="custom-select" name="search_by_course" id="search_by_course">
                                                        <option value="" selected>Choose Course...</option>

                                                          <?php

                                                          if(!empty($all_courses))
                                                          {
                                                            foreach($all_courses as $course)
                                                            { ?>

                                                              <option <?php if( (isset($_GET['search_by_course']) && $_GET['search_by_course'] == $course->id )){ echo "selected";} ?> value="<?php echo $course->id; ?>"><?php echo $course->course_name; ?></option>
                                                           <?php 
                                                          }
                                                          }

                                                          ?>
                                                        </select>
                                                       
                                                      </div>
                                                  </div>
                                              </div>

                                              <div class="col-md-3">

                                                  <div class="form-group">
                                                   

                                                      <div class="">
                                                        <label >Department </label>
                                                       <select class="custom-select" name="search_by_department" id="search_by_department">
                                                        <option value="" selected>Choose Department...</option>

                                                          <?php

                                                          if(!empty($all_departments))
                                                          {
                                                            foreach($all_departments as $department)
                                                            { ?>

                                                              <option <?php if( (isset($_GET['search_by_department']) && $_GET['search_by_department'] == $department->id )){ echo "selected";} ?> value="<?php echo $department->id; ?>"><?php echo $department->department_name; ?></option>
                                                           <?php 
                                                          }
                                                          }

                                                          ?>
                                                        </select>
                                                       
                                                      </div>
                                                  </div>
                                              </div>

                                              <div  class="col-md-3">

                                                 <div class="form-group">
                                                  <label>Gender</label>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="customRadioInline24" name="gender" class="custom-control-input" <?php if((isset($_GET['gender']) &&  $_GET['gender'] == 'male' )){ echo "checked";} ?> value="male">
                                                      <label class="custom-control-label" for="customRadioInline24">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="customRadioInline25" name="gender" class="custom-control-input" <?php if((isset($_GET['gender']) &&  $_GET['gender'] == 'female' )){ echo "checked";} ?> value="female">
                                                      <label class="custom-control-label" for="customRadioInline25">Female</label>
                                                    </div>
                                                </div>

                                              </div>

                                               

                                          </div>


                                          <div class="form-row">
                                              

                                              <div  class="col-md-3">
                                             
                                                 <div class="form-group">
                                                  <label>PWD</label>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="customRadioInline26" name="search_by_pwd" class="custom-control-input" <?php if((isset($_GET['search_by_pwd']) && $_GET['search_by_pwd'] == '1' )){ echo "checked";} ?> value="1">
                                                      <label class="custom-control-label" for="customRadioInline26">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="customRadioInline27" name="search_by_pwd" class="custom-control-input" <?php if((isset($_GET['search_by_pwd']) &&  $_GET['search_by_pwd'] == '0' )){ echo "checked";} ?> value="0">
                                                      <label class="custom-control-label" for="customRadioInline27">No</label>
                                                    </div>
                                                </div>

                                           
                                          </div>

                                           <div  class="col-md-3">
                                             
                                                 <div class="form-group">
                                                  <div class="">
                                                        <label >Nationality</label>
                                                       <select class="custom-select" name="search_nationality_type" id="search_nationality_type">
                                                          <option value="" selected>Choose...</option>
                                                          <option <?php if((isset($_GET['search_nationality_type']) &&  $_GET['search_nationality_type'] == 'indian' )){ echo "selected";} ?> value="indian">Indian</option>
                                                          <option <?php if((isset($_GET['search_nationality_type']) && $_GET['search_nationality_type'] == 'foreign_shark' )){ echo "selected";} ?> value="foreign_shark">Foreign Shark</option>
                                                          <option <?php if((isset($_GET['search_nationality_type']) && $_GET['search_nationality_type'] == 'non_foreign_shark' )){ echo "selected";} ?> value="non_foreign_shark">Non Foreign Shark</option>
                                                        </select>
                                                       
                                                      </div>
                                                </div>


                                          </div>

                                          </div>
                                       
                      </form>
                  </div>


                  <table id="example1"  class="table table-striped" style="font-size: 14px;">
                    <thead>
                      <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Student Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Institute</th>
                        <th scope="col">Department</th>
                      	<th scope="col">Course</th>
                      	<th scope="col">Gender</th>
                      	<th scope="col">Academic Year</th>
                        <th scope="col">Hostel Name</th>
                        <th scope="col">Hostel Id</th>
                        <th scope="col">Payment Date</th>
                        <th scope="col">Total Paid</th>
                        <th scope="col">Total Overdue</th>
                        <th scope="col">-</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                     <tbody>


                      <?php if(!empty($all_data)){
                          $i=1;
                          foreach($all_data as $ad)
                          { //echo "<pre>"; print_r($ad); die; ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $ad->stid; ?></td>
                                <td><?php echo $ad->full_name; ?></td>
                                <td><?php echo ucfirst($ad->institute_name); ?></td>
                                <td><?php echo ucfirst($ad->department_name); ?></td>
                                <td><?php echo ucfirst($ad->course_name); ?></td>
                                <td><?php echo ucfirst($ad->gender); ?></td>
                                <td><?php echo $ad->academic_year; ?></td>
                                <td><?php echo $ad->hostel_name; ?></td>
                                <td><?php echo $ad->hostel_code; ?></td>
                                <td><?php echo date('j M Y H:i A',strtotime($ad->payment_date)); ?></td>
                                <td><?php echo $ad->total_paid; ?></td>
                                <td><?php echo $ad->total_overdue; ?></td>

                                <td> 
                                <select name="receivePayment" onchange="receivePayment(this,'<?php echo $ad->id; ?>');">
                                  <option value=""></option>
                                  <option value="yes" <?php echo ((isset($ad->receivePayment) && $ad->receivePayment=='yes') ? 'selected' : ''); ?>>Received</option>
                                  <option value="no" <?php echo ((isset($ad->receivePayment) && $ad->receivePayment=='no') ? 'selected' : ''); ?>>Not Received</option>
                                </select>
                                <br>
                                <span style="color: green" class="rp<?php echo $ad->id; ?>"></span>
                                 
                                </td>


                                <td> 
                                <!-- <a href="#" class="btn btn-secondary btn-sm " data-toggle="modal" data-target="#add-student-data">Edit</a> -->

                                 <a onclick="SendSMS('<?php echo $ad->student_id; ?>');" name="edit_ad" class="edit_button btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#edit-admin-data">Send SMS</a> 

                                 <!--  <a href="#" name="cancel_allotment_ad" class="cancel_allotment_button btn btn-secondary btn-sm" ad_id="<?php //echo $ad->student_id; ?>" data-toggle="modal" >Allotment Cancel</a> --> 
                                 
                                </td>
                            </tr>

                          <?php 
                          $i++;
                        }

                      } ?>
                     
                    </tbody>
                  </table>
                 
              </div>







<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Send SMS</h4>
        <button type="button" class="close" data-dismiss="modal" onclick="CloseSendSMS();">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form id="SendsmsText">

      <div class="form-row">
      <div class="form-group col-md-12">
        <label>SMS Text</label>
        <textarea class="form-control" name="smsText" id="smsText"></textarea>        
        <span class="smsText_err clsred"></span> 
      </div>
    </div>
    <input type="hidden" name="student_id" value="" id="stuId">


<input onclick="sendSMSS();"  type="button" name="add_admin_edit" id="add_admin_edit" class="btn btn-danger" value="Send" />

</form>
      </div>

     

    </div>
  </div>
</div>















<script type="text/javascript">

 $("document").ready(function(){

    $( "#customRadioInline22" ).click(function() {
      $( "#frm" ).submit();
    });

    $( "#customRadioInline23" ).click(function() {
      $( "#frm" ).submit();
    });

    $( "#search_by_bhavan" ).change(function() {
      $( "#frm" ).submit();
    });

    $( "#search_by_department" ).change(function() {
      $( "#frm" ).submit();
    });

    $( "#search_by_course" ).change(function() {
      $( "#frm" ).submit();
    });

    $( "#customRadioInline24" ).click(function() {
      $( "#frm" ).submit();
    });

    $( "#customRadioInline25" ).click(function() {
      $( "#frm" ).submit();
    });

    $( "#customRadioInline26" ).click(function() {
      $( "#frm" ).submit();
    });

    $( "#customRadioInline27" ).click(function() {
      $( "#frm" ).submit();
    });

    $( "#search_nationality_type" ).change(function() {
      $( "#frm" ).submit();
    });


});

</script>


<script>


$(document).ready(function() {

	$('.edit_button').click(function() {

                var ad_id = $(this).attr('ad_id');
                //alert(ad_id);
                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-send-sms');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          //alert(resultData);
                          /*resultData = jQuery.parseJSON(resultData);
                          if(send_sms_msg)
                          {
                          	
                          	$('#send_sms_msg').html('SMS has been sent successfully.');
                          	setTimeout(function(){ $('#send_sms_msg').hide(); }, 3000);

                          }*/
                          
                  }
                
    			});
        });

});

$(document).ready(function() {

  $('.cancel_allotment_button').click(function() {

                var ad_id = $(this).attr('ad_id');
                //alert(ad_id);
                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-allotment-cancel');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          //alert(resultData);
                          resultData = jQuery.parseJSON(resultData);
                          if(send_sms_msg)
                          {
                            
                            $('#send_sms_msg').html('SMS has been sent successfully.');
                            setTimeout(function(){ $('#send_sms_msg').hide(); }, 3000);

                          }
                          
                  }
                
          });
        });

});

/*$(document).ready(function() {
 
	$('.edit_button').click(function() {

                var ad_id = $(this).attr('ad_id');
                alert(ad_id);
                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-send-sms');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          //alert(resultData);
                          resultData = jQuery.parseJSON(resultData);
                          
                  }
                
                });

                saveData.error(function() { alert("Something went wrong"); });



});*/

$(document).ready(function() {
    $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { 
                extend: 'excel',
                text: 'Download'
             }
        ]
    });
});

function receivePayment(all,id){
  if($(all).val()){
    var pay_status = $(all).val();
    $.post("<?php echo base_url('admin-pay-status');?>", {pay_status: pay_status,id:id}, function(result){
        console.log(result);
        $('.rp'+id).html('Saved');
    });
  }
}

function SendSMS(id){
  $("#stuId").val(id);
  $("#myModal").show();
}

function CloseSendSMS(){
  $("#SendsmsText")[0].reset();
  $(".smsText_err").html("");
  $("#myModal").hide();
}

function sendSMSS(){

  if($('#smsText').val()){
    // send sms
    alert("SMS Send.");
    $("#SendsmsText")[0].reset();
    $(".smsText_err").html("");
  $("#myModal").hide();
  }else{
    $(".smsText_err").html("SMS Text is required.");
  }
}

</script>
<style type="text/css">
  .clsred{
  color: red;
}
</style>