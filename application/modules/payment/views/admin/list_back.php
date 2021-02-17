<?php 
$search_url = base_url('admin-payment-list');
$is_subadmin = $this->session->userdata('is_subadmin'); 
?>
 <div class="" id="payment-status" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4><!-- All Payment Report --> Application Payment Report</h4>
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
                                                          <option <?php if((isset($_GET['search_nationality_type']) && $_GET['search_nationality_type'] == 'saarc_country' )){ echo "selected";} ?> value="saarc_country">Saarc Country</option>
                                                          <option <?php if((isset($_GET['search_nationality_type']) && $_GET['search_nationality_type'] == 'non_saarc_country' )){ echo "selected";} ?> value="non_saarc_country">Non Saarc Country</option>
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
                        <th scope="col">Nationality</th>
                        <th scope="col">Institute</th>
                        <th scope="col">Department</th>
                      	<th scope="col">Course</th>
                        <th scope="col">Semister</th>
                        <th scope="col">Hostel Name</th>
                        <th scope="col">Room No.</th>
                        <th scope="col">Due Amount</th>
                        <th scope="col">For the period of</th>
                         <?php if($is_subadmin == 'N'){ ?>
                        <th scope="col">Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                     <tbody>


                      <?php if(!empty($all_data)){

                        // Other charges calcution
                        $otherCharges = 0;
                        foreach ($payment_options as $value) {
                            $otherCharges += $value->amount;;
                        }

                          $i=1;
                          
                          foreach($all_data as $ad){
                            // room charge calculation start==================================
                            $room_fee_charge = 0;
                            $dueAmount = 0;
                            if(@$ad->nationality_type=='Indian' || @$ad->nationality_type=='indian'){
                                  $room_fee_charge = $ad->room_fee;
                                }else{
                                  $room_fee_charge = $ad->room_fee_foreigner;
                                }
                                if((@$ad->caste_type=='SC' || @$ad->caste_type=='ST' || @$ad->pwd_status == 1) && @$ad->course_name !='Ph.D' ){
                                  $room_fee_charge = 0;
                                }else{
                                  $room_fee_charge = $room_fee_charge;
                                }
                              // 6 month rent
                                $dueAmount = $otherCharges + ($room_fee_charge * 6);
                            // room charge calculation end==================================

                           ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $ad->stid; ?></td>
                                <td><?php echo $ad->full_name; ?></td>
                                <td><?php echo $ad->nationality_type; ?></td>
                                <td><?php echo ucfirst($ad->institute_name); ?></td>
                                <td><?php echo ucfirst($ad->department_name); ?></td>
                                <td><?php echo ucfirst($ad->course_name); ?></td>
                                <td><?php echo ucfirst($ad->semester); ?></td>
                                <td><?php echo $ad->hostel_name; ?></td>
                                <td><?php echo $ad->room_no; ?></td>
                                <td><?php echo $dueAmount; ?></td>
                                <td><?php echo 'July 2019 - Dec 2019'; ?></td>
                               <?php if($is_subadmin == 'N'){ ?>
                                <td> 
                                 <a   phone-no="<?php echo $ad->contact_no; ?>" name="edit_ad" class="edit_button btn btn-secondary btn-sm send-sms-due-payment" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#edit-admin-data">Send SMS</a> 
                                 </td>
                                 <?php } ?>
                                 
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
    <input type="hidden" name="student_phone" value="" id="stuPhone">

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

  $('.send-sms-due-payment').on('click',function(){
      let ad_id = $(this).attr('ad_id')
      let contact_no = $(this).attr('phone-no')
      $('#stuId').val(ad_id)
      $('#stuPhone').val(contact_no)
      $("#myModal").show()
  })

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
      const stuId = $('#stuId').val()
      const stuPhone = $('#stuPhone').val()
      const smsText = $('#smsText').val()
     $.ajax({
        url: "<?php echo base_url().'front/duePayment'; ?>",
        type: "post",
        data: {stuId, stuPhone, smsText},
        dataType: 'JSON',
        success: function(response) {
            if (response.res == "success") {
              alert("SMS Send.");
              $("#SendsmsText")[0].reset();
              $(".smsText_err").html("");
              $("#myModal").hide();
            } else {
                console.log('error')
            }
        }
    });
    // send sms
  }else{
    $(".smsText_err").html("SMS Text is required.");
  }
}

</script>
<style type="text/css">
  .clsred{
  color: red;
}
#example1_filter{
  float: right;
}
</style>