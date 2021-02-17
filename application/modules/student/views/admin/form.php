 <div id="add-student-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" >
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-student'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-3">
                              <a href="#" class="img-profile">
                                <img src="<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg" alt="" class="img-thumbnail img-fluid">
                                <!-- <span class="edit-img-profile" style="display: block;">Add Profile Image</span> -->

                                <input type="file" class="edit-img-profile" style="display: block;" name="profile_image" id="profile_image" />
                              </a>
                            </div>
                            <div class="col-md-9">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Sl. No.</label>
                                  <input  type="text" class="form-control" name="sl_no" id="sl_no" placeholder="Enter Serial No." value="" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Full Name</label>
                                  <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Enter Full Name" value="" >
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Contact No.</label>
                                  <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Contact No." value="" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Email Id</label>
                                  <input type="text" class="form-control" name="email_id" id="email_id" placeholder="Enter email id" value="" >
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>University Id</label>
                                  <input type="text" class="form-control" name="university_id" id="university_id" placeholder="Enter university id" value="" >
                                </div>
                              
                              </div>
                              <div class="form-group">
                                <label>Sex</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline8" name="gender" class="custom-control-input" value="male">
                                  <label class="custom-control-label" for="customRadioInline8">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline9" name="gender" class="custom-control-input" value="female">
                                  <label class="custom-control-label" for="customRadioInline9">Female</label>
                                </div>
                              </div>

                           
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Blood Group</label>
                                  <select class="custom-select" name="blood_group" id="edit_blood_group">
                                    <!-- <option selected>Choose...</option> -->

                                    <?php

                                    if(!empty($all_bloodgroups))
                                    {
                                      foreach($all_bloodgroups as $bloodgroup)
                                      { ?>

                                        <option  value="<?php echo $bloodgroup->id; ?>"><?php echo $bloodgroup->name; ?></option>


                                     <?php }
                                    }

                                    ?>


                                  
                                  </select>
                                </div>
                            </div>
                              <!-- <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Hostel Name</label>
                                  <input type="text" class="form-control" name="hostel_name" id="hostel_name" placeholder="Enter hostel name" value="" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Hostel Code</label>
                                  <input type="text" class="form-control" name="hostel_code" id="hostel_code" placeholder="Enter hostel code" value="" >
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Room No.</label>
                                  <input type="text" class="form-control" name="room_no" id="room_no" placeholder="Enter room no." value="" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Hostel Wing/Block</label>
                                  <input type="text" class="form-control" name="hostel_wing" id="hostel_wing" placeholder="Enter hostel wing/block" value="" >
                                </div>
                              </div> -->
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Course Type</label>
                                  <select class="custom-select" name="course_id" id="course_id">
                                    <!-- <option selected>Choose...</option> -->

                                    <?php

                                    if(!empty($all_courses))
                                    {
                                      foreach($all_courses as $course)
                                      { ?>

                                        <option  value="<?php echo $course->id; ?>"><?php echo $course->course_name; ?></option>


                                     <?php }
                                    }

                                    ?>


                                    <!-- <option  value="">UG[Prep]</option>
                                    <option value="">PG</option>
                                    <option value="">M.Phil</option>
                                    <option value="">P.hd</option> -->
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Name of Department</label>
                                  <select class="custom-select" name="department_id" id="department_id" >
                                    <!-- <option selected>Choose...</option> -->

                                    <?php

                                    if($all_departments){
                                      foreach($all_departments as $department)
                                      {
                                        ?>
                                        <option value="<?php echo $department->id; ?>"><?php echo $department->department_name; ?></option>
                                    <?php  }

                                    }
                                     ?>

                                   <!--  <option value="">Benagali</option>
                                    <option value="">Chinese</option>
                                    <option value="">Botany</option> -->
                                  </select>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Name of Bhavana (Institute)</label>
                                  <select class="custom-select" name="institute_id" id="institute_id" >
                                    <!-- <option selected>Choose...</option> -->

                                    <?php

                                    if($all_institutes){
                                      foreach($all_institutes as $institute)
                                      {
                                        ?>
                                        <option value="<?php echo $institute->id; ?>"><?php echo $institute->institute_name; ?></option>
                                    <?php  }

                                    }
                                     ?>

                                   <!--  <option value="">Bhasa</option>
                                    <option value="">Siksha</option> -->
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Date of Admission/Allotment</label>
                                  <input class="form-control datepicker" name="date_of_allotment" id="datepicker1" placeholder="Select date">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Academic Year</label>
                                  <input class="form-control yearselect" name="academic_year" id="academic_year"  placeholder="Select year">
                                
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Vacating Year</label>

                                  <input class="form-control yearselect1" name="vacating_year" id="vacating_year"  placeholder="Select year">
                                
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>VB Registration Id</label>
                                  <input type="text" name="vb_reg_id" id="vb_reg_id" class="form-control" placeholder="Enter VB registration Id" value="" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Date of Birth</label>
                                  <input class="form-control datepicker" name="date_of_birth" id="datepicker2" placeholder="Select date">
                                </div>
                              </div>


                            <!--   <div class="form-group">
                                <label>Identification Document Upload</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                  </div>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="identity_document" id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                  </div>
                                </div>
                              </div> -->



                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Aadhar No(UID)</label>
                                  <input type="text" class="form-control" name="aadhar_card_no" id="aadhar_card_no" placeholder="Enter Aadhar card no." value="" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label>State</label>
                                  <select class="custom-select" name="state_id" id="state_id" >
                                    <!-- <option selected>Choose...</option> -->
                                    <?php 

                                      if(!empty($all_states))
                                      {
                                          foreach($all_states as $state)
                                          { ?>

                                          <option value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>

                                      <?php }


                                      }


                                    ?>
                                    <!-- <option value="">West Bengal</option> -->
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter address" value="" >
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>City</label>
                                  <input type="text" name="city" id="city" class="form-control" placeholder="Enter city name" value="" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Pin Code.</label>
                                  <input type="text" name="pincode" id="pincode" class="form-control" placeholder="Enter pin code" value="" >
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Guardian Name</label>
                                  <input type="text" class="form-control" name="guardian_name" id="guardian_name" placeholder="Enter Guardian name" value="" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Relation with Guardian</label>
                                  <select class="custom-select" name="relation_with_guardian" id="relation_with_guardian">
                                    <!-- <option>Choose...</option> -->
                                    <option selected value="father">Father</option>
                                    <option selected value="mother">Mother</option>
                                    <option selected value="uncle">Uncle</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Guardian Contact No</label>
                                  <input type="text" class="form-control" name="guardian_contact_no" id="guardian_contact_no" placeholder="Enter Guardian contact no.">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Guardian Email Id</label>
                                  <input type="text" class="form-control" name="guardian_email_id" id="guardian_email_id"  placeholder="Enter Guardian email id">
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Guardian Address</label>
                                <input type="text" class="form-control" name="guardian_address" id="guardian_address" placeholder="Enter Guardian address">
                              </div>
                              <div class="form-group">
                                <label>PWD Status</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline1" name="pwd_status" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline2" name="pwd_status" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline2">No</label>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Status Category</label>
                                <select class="custom-select" name="physically_challenged" id="physically_challenged">
                                  <option selected>Choose...</option>
                                  <option value="blind">Blind</option>
                                  <option value="orthopedic">Orthopedic</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Caste</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline3" name="caste_type" class="custom-control-input" value="general">
                                  <label class="custom-control-label" for="customRadioInline3">GEN</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline4" name="caste_type" class="custom-control-input" value="SC">
                                  <label class="custom-control-label" for="customRadioInline4">SC</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline13" name="caste_type" class="custom-control-input" value="ST">
                                  <label class="custom-control-label" for="customRadioInline13">ST</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline14" name="caste_type" class="custom-control-input" value="OBC">
                                  <label class="custom-control-label" for="customRadioInline14">OBC</label>
                                </div>
                              </div>

                              <!-- <div class="form-group">
                                <label>Other Caste Document</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                  </div>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="other_caste_document" id="inputGroupFile03">
                                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                  </div>
                                </div>
                              </div> -->


                              <div class="form-group">
                                <label>Nationality</label>
                                <select class="custom-select" name="nationality_type" id="nationality_type">
                                  <!-- <option selected>Choose...</option> -->
                                  <option value="">Indian</option>
                                </select>
                              </div>

                              
                              <div class="form-row">
                                

                                 <div class="form-group col-md-6">
                                  <label>Distance Score (10 Point Scale)</label>
                                  <input type="text" class="form-control" name="distance_score" id="distance_score" value="" placeholder="Enter distance score (10 Point Scale)" readonly>
                                 
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Distance in Km <span id="tool_tip_info"></span></label>
                                  <input type="text" class="form-control" name="distance_frm" id="distance_frm" value="" placeholder="Enter distance from santiniketan" readonly>
                                </div>
                              </div>
                              <div class="form-row">
                               
                               <div class="form-group col-md-6">
                                  <label>Last Final Exam Score (10 Point Scale)</label>
                                  <input type="text" class="form-control" name="last_final_exam_score" id="last_final_exam_score" value="" placeholder="Enter last final exam score (10 Point Scale)">
                                 
                                </div>

                                <div class="form-group col-md-6">
                                  <label>Final Score (10 Point Scale)</label>
                                  <input type="text" class="form-control" name="final_score" id="final_exam_score" value="" placeholder="Final Exam Score" readonly>
                                 
                                </div>
                              </div>
                              <!-- <div class="form-group">
                                <label>Every Semester CGPA (Update)</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                  </div>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                  </div>
                                </div>
                              </div> -->
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <input type="submit" name="add_student" id="add_student" class="btn btn-danger" value="Add Student" />
                          <!-- <button type="button" class="btn btn-danger">Add Student</button> -->
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


<script>


$(document).ready(function(){


       $( "#hostel_name" ).change(function() {
        var hostel_id = $(this).val();
        var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-hostel-seat-details');?>",
                    data: {  "id": hostel_id},
                    dataType: "text",
                    success: function(resultData) { 


                      resultData = jQuery.parseJSON(resultData);
                      if(resultData)
                      {
                        $('#total_seats').val(resultData.total_seats);
                        $('#total_seats_booked').val(resultData.total_seats_booked);
                        $("#seats_remaining").val(resultData.total_seats_remaining);
                        $('#total_seats_remaining').val(resultData.total_seats_remaining);
                        $("#release_seats_in_percent").val(resultData.release_seats_in_percent);
                        $("#seats_not_released").val(resultData.seats_not_released);
                        $("#total_released_seats").val(resultData.seats_available_after_release);
                        $("#seats_available_after_release").val(resultData.seats_available_after_release);
                      }
                      else
                      {

                        $('#total_seats').val('');
                        $('#total_seats_booked').val('');
                        $('#seats_booked').val('');
                        $("#seats_remaining").val('');
                        $('#total_seats_remaining').val('');
                        $("#release_seats_in_percent").val('');
                        $("#seats_not_released").val('');
                        $("#total_released_seats").val('');
                        $("#seats_available_after_release").val('');

                      }
                     

                     

                    }

          });

        saveData.error(function() { alert("Something went wrong"); });

      });




      $("#total_seats").keyup(function(){
        var total_seats           = $("#total_seats").val();
        var seats_booked          = $("#seats_booked").val();
        var seats_remaining       = $("#seats_remaining").val();

        if(total_seats)
        {
          seats_remaining = total_seats - seats_booked;
        }
        
        if(seats_remaining > 0)
        {
          $("#seats_remaining").val(seats_remaining);
          $("#total_seats_remaining").val(seats_remaining);
        }
      });


       $("#release_seats_in_percent").keyup(function(){

          var tot_available_seats                   = $("#seats_remaining").val();
          var percent_of_seats_to_be_released       = $("#release_seats_in_percent").val();
          var seats_released                        = parseInt((percent_of_seats_to_be_released/100)*tot_available_seats);
          var seats_not_available_after_release     = tot_available_seats - seats_released;
          
          $("#seats_not_released").val(seats_not_available_after_release);
          $("#total_released_seats").val(seats_released);
          $("#seats_available_after_release").val(seats_released);

      });


  });

</script>