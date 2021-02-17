<?php 
$search_url = base_url('admin-payment-report-list');
?>
 <div class="" id="payment-status" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Mess Payment Report </h4>
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



                      <form name="payment_search_frm" id="payment_search_frm" method="get" action="<?php echo $search_url; ?>">
                                <div class="form-row">
                                          <div class="col-md-3">

                                                  <div class="form-group">
                                                   
                                                      <input class="form-control datepicker" name="from_date" id="datepicker1" placeholder="From Date" value="<?php if( (isset($_GET['from_date']))){ echo $_GET['from_date'];} ?>">
                                                       
                                                  </div>
                                          </div>

                                           <div class="col-md-3">

                                                  <div class="form-group">
                                                   
                                                      <input class="form-control datepicker" name="to_date" id="datepicker2" placeholder="To Date" value="<?php if( (isset($_GET['to_date']))){ echo $_GET['to_date'];} ?>">
                                                       
                                                  </div>
                                          </div>

                                          <!-- <div class="col-md-3">
                                           <select class="custom-select" name="search_by_bhavan" id="search_by_bhavan">
                                                  <option value="" selected>Choose Type...</option>
                                                  <option value="due">Due</option>
                                                  <option value="paid">Paid</option>
                                                  <option value="both">Both</option>
                                          </select>
                                          </div> -->

                                          <div class="col-md-3">
                                            <input type="submit" class="btn btn-secondary" name="submit" value="submit" />
                                          </div>

                                </div>

                      </form>
                  </div>


                  <table id="example1" class="table table-striped" style="font-size: 14px;">
                    <thead>
                      <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Student Id</th>
                        <th scope="col">Name</th>
                        <!-- <th scope="col">Institute</th>
                        <th scope="col">Department</th>
                      	<th scope="col">Course</th>
                      	<th scope="col">Gender</th>
                        <th scope="col">Hostel Name</th> -->
                        <th scope="col">Payment Date</th>
                        <th scope="col">Total Paid</th>
                        <th scope="col">Mess Charge</th>
                        <th scope="col">Room Rent</th>
                        <th scope="col">Other Charge</th>
                        <th scope="col">Plan Month</th>
                        <th scope="col">Plan Start Month</th>
                        <th scope="col">Plan End Month</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>


                      <?php if(!empty($all_data)){
                          $i=1;
                          foreach($all_data as $ad)
                          { //echo "<pre>"; print_r($ad); die;

                           ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $ad->stid; ?></td>
                                <td><?php echo $ad->full_name; ?></td>
                               <!--  <td><?php //echo ucfirst($ad->institute_name); ?></td>
                                <td><?php //echo ucfirst($ad->department_name); ?></td>
                                <td><?php //echo ucfirst($ad->course_name); ?></td>
                                <td><?php //echo ucfirst($ad->gender); ?></td>
                                <td><?php //echo $ad->hostel_name; ?></td> -->
                                <td><?php echo date('j M Y H:i A',strtotime($ad->payment_date)); ?></td>
                                <td>
                                  <?php echo $ad->total_paid; ?>
                                 <!--    <a href="#" name="edit_ad" tooltip="View Details" class="edit_button" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#edit-admin-data"><i class="fas fa-eye"></i></a> -->
                                  </td>
                                   <td>
                                  <?php echo $ad->plan_month_amount; ?>
                               
                                  </td>
                                  <td>
                                  <?php echo $ad->room_value; ?>
                               
                                  </td>
                                  <td>
                                  <?php echo $ad->other_value; ?>
                               
                                  </td>
                                <td><?php echo $ad->plan_month; ?>
                                  
                                </td>
                                <td><?php echo $ad->plan_month_start; ?></td>
                                <td><?php echo $ad->plan_month_end; ?></td>

                                <td> 

                                  <?php

                                    $this->load->model('admin/Paymentmodel');
                                    $check_last_inserted_data   = $this->Paymentmodel->payment_data($ad->student_id);

                                    ?>

                                  <?php 
                                    $currentmonthyear = date("Y-m"); 
                                    $plan_month = date("Y-m",strtotime($ad->plan_month_end));

                                    $last_plan_month = date("Y-m",strtotime($check_last_inserted_data->plan_month_end));

                                    
                                    if ($currentmonthyear <= $plan_month && $last_plan_month <= $plan_month && $currentmonthyear >= $last_plan_month) {
                                     ?>

                                 <span style="background:red; padding: 5px 10px;">Due</span> 
                                   <?php  }
                                   ?>
                               

                                
                                </td>
                            </tr>

                          <?php 
                          $i++;
                        }

                      } ?>
                     
                    </tbody>
                  </table>


              </div>



 <!-- Modal -->
                <div class="modal fade" id="edit-admin-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Amount Paid</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-administration'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">



                            <div class="col-md-12">
                             
                               <div class="form-row">
                                  <label>Mess Food : <span id="mess_food"></span></label>
                                  
                                  
                              </div>

                              <div class="form-row">
                             
                                  
                                  <label>Room Rent : <span id="room_rent"></span></label>
                                 
                                  
                              </div>
                              
                              <div class="form-row">
                                 
                                  <label>Other Charges : <span id="other_value"></span></label>
                              
                                  
                              </div>
                              <hr>
                              <div class="form-row">
                                  
                                  <label>Total Amount : <span id="total_amount"></span></label>
                                  
                              </div>
                              
                              
                            
                            
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                        
                          <input type="hidden" name="ad_id" id="ad_id" value="">

                        
                        </div>
                      </form>
                    </div>
                  </div>
                </div>



<script type="text/javascript">



   $("document").ready(function(){

      $('.edit_button').click(function() {

                var ad_id = $(this).attr('ad_id');

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-total-payment-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          //alert(resultData);
                        
                          resultData = jQuery.parseJSON(resultData);

                         // alert(resultData.plan_month_amount);

                          $('#mess_food').html('&#8377;'+ resultData.plan_month_amount);
                          $('#room_rent').html('&#8377;'+ resultData.room_value);
                          $('#other_value').html('&#8377;'+ resultData.other_value);
                          $('#total_amount').html('&#8377;'+ resultData.total_amount);

                          
                          $('#ad_id').val(resultData.id);
                          
                  }
                
                });

                saveData.error(function() { alert("Something went wrong"); });

});

});

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


$(document).ready(function() {

   $('#example2').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { 
                extend: 'excel',
                text: 'Download'
             }
        ]
    });


  $( "#datepicker1" ).datepicker({
          changeMonth: true,
          changeYear: true,
          minDate: new Date(year, 0, 1),
          maxDate: new Date(year, 11, 31)
        });


  $( "#datepicker2" ).datepicker({
          changeMonth: true,
          changeYear: true,
          minDate: new Date(year, 0, 1),
          maxDate: new Date(year, 11, 31)
        });


   
});


</script>
<style type="text/css">
  .clsred{
  color: red;
}
</style>

