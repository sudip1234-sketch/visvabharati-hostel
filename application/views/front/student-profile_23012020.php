 <div class="inner-page-content-sectn student-dashboard">
      <div class="container">
        <div class="row">
          <div class="col-auto">
             <?php
            // echo "<pre>"; print_r($student_details); die;
              if ($this->session->userdata('userFullName') != null) { ?>
              <h6>Welcome, <?php echo $this->session->userdata('userFullName'); ?></h6>
            <?php }else{?>
              <h6>Welcome</h6>
            <?php } ?>
          </div>
          <!-- <div class="col">
            <a href="<?php //echo base_url('logout'); ?>" class="btn btn-outline-secondary btn-sm float-right" style="margin-top: -8px;">Log out</a>
          </div> -->
        </div>
        <br>
        <div class="row">
          <div class="col-sm-5 col-md-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
               
              <a <?php if (@$student_details->payment_option_show > date('Y-m-d')) { ?>   style="display: none;" <?php } ?> class="nav-link" id="make-payment-tab" data-toggle="pill" href="#make-payment" role="tab" aria-controls="make-payment" aria-selected="false">Make Payment</a>
              
              <a class="nav-link" id="payment-report-tab" data-toggle="pill" href="#payment-report" role="tab" aria-controls="payment-report" aria-selected="false">Payment Report</a>
              <a class="nav-link" id="lodge-complaint-tab" data-toggle="pill" href="#lodge-complaint" role="tab" aria-controls="lodge-complaint" aria-selected="false">Lodge Complaint</a>
              <a class="nav-link" id="reissue-id-card-tab" data-toggle="pill" href="#reissue-id-card" role="tab" aria-controls="reissue-id-card" aria-selected="false">Reissue Card</a>
            </div>
          </div>
          <div class="col-sm-7 col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="profile" role="tabpanel">
                <h4>Your Profile</h4>
                <hr>

                <form novalidate method="post" action="<?php echo base_url('edit-student-profile'); ?>" name="add-form" id="editform" enctype="multipart/form-data"> 
                <div class="row">
                  <div class="col-md-3">
                    <a href="#" class="img-profile">
                      <img src="<?php echo base_url().'assets/student_pics/'.$student_details->profile_image;?>" alt="" class="img-thumbnail img-fluid">
                      <!-- <span class="edit-img-profile">Edit Profile Image</span> -->

                      <input type="hidden" name="profile_image_name" id="profile_image_name" value="<?php echo (!empty($student_details->profile_image)? $student_details->profile_image:'');?>" />
                      <input type="file" class="edit-img-profile" style="display: block;" name="profile_image" id="profile_image" />
                    </a>

                    <br><br>
                    <?php if($student_details->student_signature==''){ ?>
                    <h5>Upload Signature</h5>
                    <input type="file" class="" style="display: block;" name="student_signature" id="student_signature" />
                    <?php }else{ ?>
                    <a href="#" class="img-profile">
                      <img style="width: 169px;height: 129px;" src="<?php echo base_url().'assets/student_signature/'.$student_details->student_signature;?>" alt="" class="img-thumbnail img-fluid">
                      <input type="file" class="edit-img-profile-sig" style="display: block;" name="student_signature" id="student_signature" />
                      <input type="hidden" name="student_signature_name" id="student_signature_name" value="<?php echo (!empty($student_details->student_signature)? $student_details->student_signature:'');?>" />
                    </a>
                    <?php } ?>
                     


                  </div>
                  <div class="col-md-9">
                 
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Student Id</label>
                          <input type="text" class="form-control inputDisabled" placeholder="Enter your serial no." value="<?php echo (!empty($student_details->student_id)? $student_details->student_id:'');?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Full Name</label>
                          <input type="text" class="form-control" name="full_name" placeholder="Enter your full name" value="<?php echo (!empty($student_details->full_name)? $student_details->full_name:'');?>">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Contact No.</label>
                          <input type="text" class="form-control inputDisabled" name="contact_no" placeholder="Enter your contact no." value="<?php echo (!empty($student_details->contact_no)? $student_details->contact_no:'');?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Email Id</label>
                          <input type="text" class="form-control inputDisabled" placeholder="Enter your email id" value="<?php echo (!empty($student_details->email_id)? $student_details->email_id:'');?>" disabled>
                        </div>
                      </div>
                     <!--  <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>University Id</label>
                          <input type="text" class="form-control inputDisabled" placeholder="Enter your university id" value="<?php //echo (!empty($student_details->university_id)? $student_details->university_id:'');?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Hostel Id</label>
                          <input type="text" class="form-control inputDisabled" placeholder="Enter your hostel id" value="<?php //echo (!empty($student_details->hostel_id)? $student_details->hostel_id:'');?>" disabled>
                        </div>
                      </div> -->
                      <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Sex</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline8" name="customRadioInline8" class="custom-control-input inputDisabled" <?php echo (!empty($student_details->gender) && $student_details->gender == 'male' ? 'checked':'');?>  disabled>
                          <label class="custom-control-label" for="customRadioInline8">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline9" name="customRadioInline8" class="custom-control-input inputDisabled" <?php echo (!empty($student_details->gender) && $student_details->gender == 'female' ? 'checked':'');?>  disabled>
                          <label class="custom-control-label" for="customRadioInline9">Female</label>
                        </div>
                      </div>

                       <div class="form-group col-md-6">
                                  <label>Blood Group</label>
                                  <select class="custom-select" name="blood_group" id="edit_blood_group">
                                    <!-- <option selected>Choose...</option> -->

                                    <?php

                                    if(!empty($all_bloodgroups))
                                    {
                                      foreach($all_bloodgroups as $bloodgroup)
                                      { ?>

                                        <option  value="<?php echo $bloodgroup->id; ?>" <?php echo (!empty($student_details->blood_group) && $student_details->blood_group == $bloodgroup->id? 'selected':'');?>><?php echo $bloodgroup->name; ?></option>


                                     <?php }
                                    }

                                    ?>


                                  
                                  </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Hostel Name</label>
                          <input type="text" class="form-control inputDisabled" placeholder="Enter your hostel name" value="<?php echo (!empty($student_details->hostel_name_name)? $student_details->hostel_name_name:'');?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Hostel Code</label>
                          <input type="text" class="form-control inputDisabled" placeholder="Enter your hostel code" value="<?php echo (!empty($student_details->hostel_code)? $student_details->hostel_code:'');?>" disabled>
                        </div>
                      </div>



                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Block No.</label>
                          <input type="text" class="form-control inputDisabled"  value="<?php echo (!empty($student_details->block_name)? $student_details->block_name:'');?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Floor No.</label>
                          <input type="text" class="form-control inputDisabled" value="<?php echo (!empty($student_details->floor_name)? $student_details->floor_name:'');?>" disabled>
                        </div>
                      </div>


                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Room No.</label>
                          <input type="text" class="form-control inputDisabled" placeholder="Enter your room no." value="<?php echo (!empty($student_details->room_no)? $student_details->room_no:'');?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Bed No.</label>
                          <input type="text" class="form-control inputDisabled" value="<?php echo (!empty($student_details->bed_no)? $student_details->bed_no:'');?>" disabled>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Course Type</label>
                          <select class="custom-select" name="course_id" id="course_id"  disabled>                           
                            <?php

                              if(!empty($all_courses))
                              {
                                foreach($all_courses as $course)
                                { ?>

                                  <option <?php echo (!empty($student_details->course_id) && $student_details->course_id == $course->id ? 'selected':'');?>  value="<?php echo $course->id; ?>"><?php echo $course->course_name; ?></option>


                               <?php }
                              }

                            ?>

                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Name of Department</label>
                          <select class="custom-select" name="department_id" id="department_id" disabled >
                            <?php

                                    if($all_departments){
                                      foreach($all_departments as $department)
                                      {
                                        ?>
                                        <option <?php echo (!empty($student_details->department_id) && $student_details->department_id == $department->id ? 'selected':'');?> value="<?php echo $department->id; ?>"><?php echo $department->department_name; ?></option>
                                    <?php  }

                                    }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Name of Bhavana (Institute)</label>
                          <select class="custom-select" name="institute_id" id="institute_id" disabled>

                            <?php

                              if($all_institutes){
                                foreach($all_institutes as $institute)
                                {
                                  ?>
                                  <option <?php echo (!empty($student_details->institute_id) && $student_details->institute_id == $institute->id ? 'selected':'');?> value="<?php echo $institute->id; ?>"><?php echo $institute->institute_name; ?></option>
                              <?php  }

                              }
                            ?>
                           <!--  <option>Choose...</option>
                            <option selected value="">Bhasa</option>
                            <option value="">Siksha</option> -->
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Date of Admission/Allotment</label>
                          <input class="form-control datepicker inputDisabled" id="datepicker1" placeholder="Select date" value="<?php echo (!empty($student_details->date_of_allotment)? date('d/m/Y',strtotime($student_details->date_of_allotment)):'');?>" disabled>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">                         
                          <label>Semester</label>
                              <select class="custom-select inputDisabled" name="semester" id="semester"  >
                                     <option value="1" <?php echo (!empty($student_details->semester) && $student_details->semester == 1 ? 'selected':'');?> >1</option>
                                     <option value="2" <?php echo (!empty($student_details->semester) && $student_details->semester == 2 ? 'selected':'');?> >2</option>
                                     <option value="3" <?php echo (!empty($student_details->semester) && $student_details->semester == 3 ? 'selected':'');?> >3</option>
                                     <option value="4" <?php echo (!empty($student_details->semester) && $student_details->semester == 4 ? 'selected':'');?> >4</option>
                                     <option value="5" <?php echo (!empty($student_details->semester) && $student_details->semester == 5 ? 'selected':'');?> >5</option>
                                     <option value="6" <?php echo (!empty($student_details->semester) && $student_details->semester == 6 ? 'selected':'');?> >6</option>
                                     <option value="7" <?php echo (!empty($student_details->semester) && $student_details->semester == 7 ? 'selected':'');?> >7</option>
                                     <option value="8" <?php echo (!empty($student_details->semester) && $student_details->semester == 8 ? 'selected':'');?> >8</option>
                                     <option value="9" <?php echo (!empty($student_details->semester) && $student_details->semester == 9 ? 'selected':'');?> >9</option>
                                     <option value="10" <?php echo (!empty($student_details->semester) && $student_details->semester == 10 ? 'selected':'');?> >10</option>
                            </select>
                          
                        </div>
                        <div class="form-group col-md-6">
                          <label>Vacating Month/Year</label>
                          <div class="col-md-5" style="float: left;">
                            <select class="custom-select inputDisabled" name="vacating_month" id="vacating_month" disabled >                                     
                                     <option <?php echo (!empty($student_details->vacating_month) && $student_details->vacating_month == 5 ? 'selected':'');?> value="5">May</option>                                     
                            </select>
                            </div>
                            <div class="col-md-6" style="float: left;">
                            <input readonly class="form-control inputDisabled" name="vacating_year" id="vacating_year" placeholder="Vacating Year" value="<?php echo (!empty($student_details->vacating_year)? $student_details->vacating_year:'');?>">

                        
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>VB Registration Id</label>
                          <input name="vb_reg_id" type="text" class="form-control inputDisabled" placeholder="Enter your VB registration Id" value="<?php echo (!empty($student_details->vb_reg_id)? $student_details->vb_reg_id:'');?>" >
                        </div>
                        <div class="form-group col-md-6">
                          <label>Date of Birth(DD-MM-YYYY)</label>
                          <input name="date_of_birth" type="text" class="form-control datepicker hasDatepicker" id="datepicker2" placeholder="DD-MM-YYYY" pattern="\d{1,2}/\d{1,2}/\d{4}"  required="required" value="<?php echo (!empty($student_details->date_of_birth)? date('d/m/Y',strtotime($student_details->date_of_birth)):'');?>" >
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Aadhar No/Voter Id/Any Address Proof</label>
                          <input name="aadhar_card_no" type="text" class="form-control inputDisabled" placeholder="Enter your Aadhar card no." value="<?php echo (!empty($student_details->aadhar_card_no)? $student_details->aadhar_card_no:'');?>" >
                        </div>
                        <div class="form-group col-md-6">
                          <label>State</label>
                          <select class="custom-select inputDisabled" name="state_id" id="state_id"  >
                             <?php 
                                if(!empty($all_states))
                                {
                                    foreach($all_states as $state)
                                    { ?>

                                    <option <?php echo (!empty($student_details->state_id) && $student_details->state_id == $state->id ? 'selected':'');?> value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>

                                <?php }
                                }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input name="address" type="text" class="form-control inputDisabled" placeholder="Enter your address" value="<?php echo (!empty($student_details->address)? $student_details->address:'');?>" >
                      </div>

                      <div class="form-group">
                        <label>District</label>
                        <input name="district" type="text" class="form-control inputDisabled" placeholder="Enter your district" value="<?php echo (!empty($student_details->district)? $student_details->district:'');?>" >
                      </div>


                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>City</label>
                          <input name="city" type="text" class="form-control inputDisabled" placeholder="Enter your city name" value="<?php echo (!empty($student_details->city)? $student_details->city:'');?>" >
                        </div>
                        <div class="form-group col-md-6">
                          <label>Pin Code.</label>
                          <input type="text" class="form-control inputDisabled" placeholder="Enter your pin code" value="<?php echo (!empty($student_details->pincode)? $student_details->pincode:'');?>" disabled>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Guardian Name</label>
                          <input name="guardian_name" type="text" class="form-control inputDisabled" placeholder="Enter your gurdian name" value="<?php echo (!empty($student_details->guardian_name)? $student_details->guardian_name:'');?>" >
                        </div>
                        <div class="form-group col-md-6">
                          <label>Relation with Gurdian</label>
                          <select name="relation_with_guardian" class="custom-select inputDisabled" >
                             <option value="father" <?php echo (!empty($student_details->relation_with_guardian) && $student_details->relation_with_guardian == 'father' ? 'selected':'');?> >Father</option>
                              <option value="mother" <?php echo (!empty($student_details->relation_with_guardian) && $student_details->relation_with_guardian == 'mother' ? 'selected':'');?> >Mother</option>
                              <option value="uncle" <?php echo (!empty($student_details->relation_with_guardian) && $student_details->relation_with_guardian == 'uncle' ? 'selected':'selected');?> >Others</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Guardian Contact No</label>
                          <input name="guardian_contact_no" type="text" class="form-control inputDisabled" placeholder="Enter your Guardian contact no." value="<?php echo (!empty($student_details->guardian_contact_no)? $student_details->guardian_contact_no:'');?>" >
                        </div>
                        <div class="form-group col-md-6">
                          <label>Guardian Email Id</label>
                          <input name="guardian_email_id" type="text" class="form-control inputDisabled" placeholder="Enter your gurdian email id" value="<?php echo (!empty($student_details->guardian_email_id)? $student_details->guardian_email_id:'');?>" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Guardian Address</label>
                        <input name="guardian_address" type="text" class="form-control inputDisabled" placeholder="Enter your gurdian address" value="<?php echo (!empty($student_details->guardian_address)? $student_details->guardian_address:'');?>" >
                      </div>
                      <div class="form-group">
                        <label>PWD Status</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input name="pwd_status" type="radio" id="customRadioInline1" name="pwd_status" class="custom-control-input inputDisabled"  <?php echo ( $student_details->pwd_status == '1' ? 'checked':'');?> >
                          <label class="custom-control-label" for="customRadioInline1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input  type="radio" id="customRadioInline2" name="pwd_status" class="custom-control-input inputDisabled" <?php echo ( $student_details->pwd_status == '0' ? 'checked':'');?> >
                          <label class="custom-control-label" for="customRadioInline2">No</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Status Category</label>
                        <select class="custom-select inputDisabled" disabled>
                          <option>Choose...</option>
                           <option value="blind" <?php echo (!empty($student_details->physically_challenged) && $student_details->physically_challenged == 'blind' ? 'selected':'');?>>Blind</option>
                          <option value="Low Vision" <?php echo (!empty($student_details->physically_challenged) && $student_details->physically_challenged == 'Low Vision' ? 'selected':'');?>>Low Vision</option>
                          <option value="orthopedic" <?php echo (!empty($student_details->physically_challenged) && $student_details->physically_challenged == 'orthopedic' ? 'selected':'');?>>Orthopedic</option>
                          <option value="Deaf & Hearing Impaired" <?php echo (!empty($student_details->physically_challenged) && $student_details->physically_challenged == 'Deaf & Hearing Impaired' ? 'selected':'');?>>Deaf & Hearing Impaired</option>
                          <option value="Physically Handicapped" <?php echo (!empty($student_details->physically_challenged) && $student_details->physically_challenged == 'Physically Handicapped' ? 'selected':'');?>>Physically Handicapped</option>
                          <option value="Intellectual disability" <?php echo (!empty($student_details->physically_challenged) && $student_details->physically_challenged == 'Intellectual disability' ? 'selected':'');?>>Intellectual disability</option> 
                          <option value="Multiple Disabilities" <?php echo (!empty($student_details->physically_challenged) && $student_details->physically_challenged == 'Multiple Disabilities' ? 'selected':'');?>>Multiple Disabilities</option> 
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Caste</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline3" name="customRadioInline3" class="custom-control-input inputDisabled" <?php echo (!empty($student_details->caste_type) && $student_details->caste_type == 'general' ? 'checked':'');?> disabled>
                          <label class="custom-control-label"  for="customRadioInline3">GEN</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline4" name="customRadioInline3" class="custom-control-input inputDisabled" <?php echo (!empty($student_details->caste_type) && $student_details->caste_type == 'SC' ? 'checked':'SC');?> disabled>
                          <label class="custom-control-label" for="customRadioInline4">SC</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline13" name="customRadioInline3" class="custom-control-input inputDisabled" <?php echo (!empty($student_details->caste_type) && $student_details->caste_type == 'ST' ? 'checked':'ST');?> disabled>
                          <label class="custom-control-label" for="customRadioInline13">ST</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline14" name="customRadioInline3" class="custom-control-input inputDisabled"  <?php echo (!empty($student_details->caste_type) && $student_details->caste_type == 'OBC' ? 'checked':'OBC');?> disabled>
                          <label class="custom-control-label" for="customRadioInline14">OBC</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Nationality</label>
                        <select class="custom-select inputDisabled" disabled>
                          <option>Choose...</option>
                         <option value="indian" <?php echo (!empty($student_details->nationality_type) && $student_details->nationality_type == 'indian' ? 'selected':'');?> >Indian</option>
                          <option value="saarc_country" <?php echo (!empty($student_details->nationality_type) && $student_details->nationality_type == 'saarc_country' ? 'selected':'');?> >Saarc Country</option>
                          <option value="non_saarc_country" <?php echo (!empty($student_details->nationality_type) && $student_details->nationality_type == 'non_saarc_country' ? 'selected':'');?> >Non Saarc Country</option>
                        </select>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                          <label>Distance Score (10 Point Scale)</label>
                                  <input type="text" class="form-control" name="distance_score" id="distance_score" value="<?php echo (!empty($student_details->distance_score)? $student_details->distance_score:'');?>" placeholder="Enter distance score (10 Point Scale)" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Distance from Santiniketan</label>
                          <input type="text" class="form-control inputDisabled" placeholder="Enter distance from santiniketan" value="<?php echo (!empty($student_details->distance_frm)? $student_details->distance_frm:'');?>" disabled>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Last Final Exam Score (10 Point Scale)</label>
                                  <input type="text" class="form-control" name="last_final_exam_score" id="last_final_exam_score" value="<?php echo (!empty($student_details->last_final_exam_score)? $student_details->last_final_exam_score:'');?>" placeholder="Enter last final exam score (10 Point Scale)" readonly>
                        </div>
                        <div class="form-group col-md-6">
                           <label>Final Score (10 Point Scale)</label>
                                  <input type="text" class="form-control" name="final_score" id="final_exam_score" value="<?php echo (!empty($student_details->final_score)? $student_details->final_score:'');?>" placeholder="Final Exam Score" readonly>
                                 
                        </div>
                      </div>
                     <!--  <div class="form-group">
                        <label>Every Semister CGPA (Update)</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input inputDisabled" id="inputGroupFile01" disabled>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                          </div>
                        </div>
                      </div> -->
                      <!-- <button type="button" class="btn btn-secondary" id="btn-edit">Edit Profile</button> -->
                     <!--  <button type="submit" class="btn btn-danger" id="btn-save" style="display: none;">Save Profile</button> -->

                      
                      <a class="btn btn-secondary" href="<?php echo base_url('edit-profile'); ?>"> Edit Profile </a>
                    </form>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="make-payment" role="tabpanel">
                <h4>Make Payment</h4>
                <hr>
                <from>
                  <div class="select-option">
                    <!-- <div class="form-group">
                      <label>Select Option</label><br>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline10" name="customRadioInline10" class="custom-control-input" checked >
                        <label class="custom-control-label" for="customRadioInline10">Odd Semester</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline11" name="customRadioInline10" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline11">Even Semester </label>
                      </div>
                      
                    </div> -->
                    <div class="form-row">
                      <div class="form-group col-md-6">
                      <label>Hostel</label><br>
                         <select class="custom-select" name="hostel_name" id="hostel_name" disabled >
                                    <option value="">Choose Hostel...</option>

                                    <?php

                                    if(!empty($all_hostels))
                                    {
                                      foreach($all_hostels as $hostel)
                                      { ?>

                                        <option  value="<?php echo $hostel->id; ?>"
                                        <?php echo ((!empty($student_details->hostel_name) && ($student_details->hostel_name == $hostel->id)) ? 'selected':'');?>
                                        ><?php echo $hostel->hostel_name; ?></option>


                                     <?php }
                                    }

                                    ?>

                                  </select>
                      </div>
                      <div class="form-group col-md-6">
                        <?php echo ((empty($student_details->hostel_name)) ? '<label class="chkhostel">Your Hostel is not alloted .</label>':'');?>
                        
                      </div>
                    </div>
<?php

// get room fee


$room_fee_hostel  = $this->db->select('*')->where('hostel_id',@$student_details->hostel_name)->where('block_id',@$student_details->block_no)->where('floor_id',@$student_details->floor_no)->where('room_no',@$student_details->room_no)->get('hostel_rooms_seats')->row();
//echo @$student_details->nationality_type;
if(@$student_details->nationality_type=='Indian' || @$student_details->nationality_type=='indian'){
	
  $room_fee_charge = $room_fee_hostel->room_fee;
}else{
	
  $room_fee_charge = $room_fee_hostel->room_fee_foreigner;
}


if((@$student_details->caste_type=='SC' || @$student_details->caste_type=='ST' || @$student_details->pwd_status == 1) && @$student_details->course_name !='Ph.D' ){
  $room_fee_charge = 0;
}else{
  $room_fee_charge = $room_fee_charge;
}
//echo "<pre>"; print_r($student_details); die;

//$student_mess_fee_details = $this->db->select('*')->where('student_id',@$student_details->id)->where('form_type','mess_food')->get('payment_details')->row();


$option_amount=0.00;
//echo "<pre>"; print_r($payment_options); die;
if(!empty($payment_options))
{
    
    foreach ($payment_options as $value) {
      $chkAppFee = 'yes';
      if($value->id==5){
        $chkAppFee = (($student_details->created_by =='admin') ? 'yes':'no');
      }
     // echo "<pre>"; print_r($chkAppFee); die;
      if($chkAppFee=='yes'){
            
?>
                      <div class="form-row">
                     <div class="form-group col-md-6">
                        <label><?php echo $value->option_name;?></label>
                        
                      </div>
                      <div class="form-group col-md-6">
                       
                        <span>₹<?php echo $value->amount;?></span>
<!--                        <input type="hidden" name="application_fee_charge" id="application_fee_charge" value="50" />-->
                      </div>
                    </div>
                      <?php
                      $option_amount +=$value->amount;
    } }
}
?>



                      <input type="hidden" name="option_amount" id="option_amount" value="<?php echo $option_amount;?>" />

                      
                      <div id="amount_details" <?php if(empty($student_details->hostel_name)){?> style="display:none;" <?php } ?>>

                      <?php 
						$todays_date=$student_details->hostel_assign_date;
						$todays_date=date('Y-m-d H:i:s');
                     $stYear = (!empty($todays_date)? date('Y',strtotime($todays_date)):'');
                       $stMonth = (!empty($todays_datee)? date('m',strtotime($todays_date)):'');

                      
                      if(!empty($student_details->hostel_name)){ 
                        $kitchen = $this->Frontmodel->get_row_data('hostel', ['id' => $student_details->hostel_name]);
                       
                        $roomRent = $this->Frontmodel->load_room_rent($student_details->hostel_name,$stYear);
                       }

                     


                     
							if($stMonth=='01' || $stMonth=='02' || $stMonth=='03' || $stMonth=='04' || $stMonth=='05' || $stMonth=='06'){
								 $from_date='01-01-'.$stYear;
								 $to_date='30-06-'.$stYear;
							}else {
								 $from_date='01-07-'.$stYear;
								 $to_date='31-12-'.$stYear;
							}
                     
						//echo $from_date.''.$to_date;
						//echo "<pre>"; print_r($roomRent); //die;
						//echo $student_details->hostel_assign_date;

                       ?>

                    <div class="form-row">
                     <div class="form-group col-md-6">
                        <label>Room Rent 6 months (₹<span id="hostel_charge"> <?php echo ((!empty($room_fee_hostel) && !empty($room_fee_charge)) ? $room_fee_charge:'0.00');?></span>X6)</label>
                        
                      </div>
                      <div class="form-group col-md-6">
                       
                        <span id="total_hostel_charge_for_3_months">₹<?php echo ((!empty($room_fee_hostel) && !empty($room_fee_charge)) ? number_format(($room_fee_charge*6),2):'0.00');?></span>
                        <input type="hidden" name="room_rent_charge" id="room_rent_charge" value="<?php echo ((!empty($room_fee_hostel) && !empty($room_fee_charge)) ? ($room_fee_charge*6):'0.00');?>" />
                      </div>
                    </div> 
                    <div class="form-group col-md-6">
                        <label>Hostel assign Date</label>                        
                         <input disabled class="form-control datepicker inputDisabled" id="datepicker3" name="from_date" placeholder="From date" value="<?php echo (!empty($todays_date)? date('m-d-y',strtotime($todays_date)):'');?>">

                         <input type="hidden" id="datepicker33" name="hostel_assign_date" value="<?php echo (!empty($todays_date)? date('Y-m-d',strtotime($todays_date)):'');?>">


                        <!-- <span><small>Date Format : MM-DD-YY</small></span>-->
                         
                  </div>
                    <div class="form-row">
                    
                     <div class="form-group col-md-6">
                        <label>From Date</label>                        
                         <input disabled class="form-control datepicker inputDisabled" id="datepicker3" name="from_date" placeholder="From date" value="<?php echo $from_date;?>">

                         <input type="hidden" id="datepicker33" name="from_date1" value="<?php echo $from_date;?>">


                         <!--<span><small>Date Format : MM-DD-YY</small></span>-->
                         
                  </div>
                      <div class="form-group col-md-6">
                        <label>To Date</label>
                        
                        <input disabled class="form-control datepicker inputDisabled" id="datepicker4" name="to_date" placeholder="To date" value="<?php echo $to_date;?>">


                        <input type="hidden" id="datepicker43" name="to_date1" value="<?php echo $to_date;?>">


                       

                        


                      </div>
                    </div>
                     
                      </div>


                      
                    <input type="hidden" name="total_payment_amount" id="total_payment_amount" value="" />










                    <?php if(!empty($student_details->hostel_name)){?>

                    <a href="#" class="btn btn-danger btn-sm float-right" id="calculate_total_payment_amount" onclick="check();" style="margin-left: 15px;">Proceed</a>
                    <?php } ?>



                      <div class="modal fade" id="add-payment-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Payment Bill</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="post" action="<?php echo base_url('add-payment'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">
                           
                            <div class="col-md-9">
                           

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                   <label>Student Id:</label>
                                   <span><?php echo (!empty($student_details->student_id)? $student_details->student_id:'');?></span>

                                   <input type="hidden" name="student_id" id="student_id" value="<?php echo (!empty($student_details->id)? $student_details->id:'');?>" />

                                    <input type="hidden" name="student_hostel_name" id="student_hostel_name" value="<?php echo (!empty($student_details->hostel_name)? $student_details->hostel_name:'');?>" />
                                </div>
                                
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                   <label>Student Name:</label>
                                   <span><?php echo (!empty($student_details->full_name)? $student_details->full_name:'');?></span>

                                </div>
                                
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                   <label>Conatct No:</label>
                                   <span><?php echo (!empty($student_details->contact_no)? $student_details->contact_no:'');?></span>

                                </div>
                                
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                   <label>Student Email:</label>
                                   <span><?php echo (!empty($student_details->email_id)? $student_details->email_id:'');?></span>

                                </div>
                                
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                   <label>Assign Date:</label>
                                   <span id=""><?php echo (!empty($todays_date)? date('m-d-y',strtotime($todays_date)):'');?></span>

                                </div>
                                
                              </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                   <label>From Date:</label>
                                   <span id=""><?php echo $from_date?></span>

                                </div>
                                
                              </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                   <label>To Date:</label>
                                   <span id="new_to_date"><?php echo $to_date?></span>

                                </div>
                                
                              </div>

                            
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                   <label>Total Amount:</label>
                                  <?php  $roomRent1 = array();

                      if(!empty($student_details->hostel_name)){ 
                        $roomRent1 = $this->Frontmodel->get_row_data('hostel', ['id' => $student_details->hostel_name]);

                       }
                       if(!empty($roomRent1)) {
                        $amm = ($room_fee_charge*6) + $option_amount;
                       }else{
                        $amm = 0.00;
                       }
                       ?>
                                   <span id="total_payable_amount"><?php echo ((!empty($roomRent1) && !empty($roomRent1->hostel_charge)) ? number_format($amm,2):'0.00');?></span>
                                    <input type="hidden" name="total_amount" id="total_amount" value="<?php echo $amm;?>" />
                                    <input type="hidden" name="total_paid" id="total_paid" value="<?php echo $amm;?>" />
                                    <input type="hidden" name="total_overdue" id="total_overdue" value="0" />
                                     <input type="hidden" name="new_from_date_hidden" id="new_from_date_hidden" value="" />
                                      <input type="hidden" name="new_to_date_hidden" id="new_to_date_hidden" value="" />

                                      <input type="hidden" name="select_plan_month_checked" id="select_plan_month_checked" value="" />
                                      <input type="hidden" name="select_plan_checked" id="select_plan_checked" value="" />
                                      <input type="hidden" name="plan_type" id="plan_type" value="" />

                                      <input type="hidden" name="select_plan_month_checked_year" id="select_plan_month_checked_year" value="" />
                                      <input type="hidden" name="select_plan_month_checked_year1" id="select_plan_month_checked_year1" value="" />

                                      <input type="hidden" name="mess_value" id="mess_value" value="" />

                                      <input type="hidden" name="room_value" id="room_value" value="<?php echo ((!empty($room_fee_hostel) && !empty($room_fee_charge)) ? number_format(($room_fee_charge*6),2):'0.00');?>" />

                               <input type="hidden" name="room_value_json" id="room_value_json" value='<?php echo (!empty($room_fee_hostel) ? json_encode($room_fee_hostel) :'');?>' />

                               <input type="hidden" name="room_month_json" id="rroom_month_json" value='<?php echo (!empty($roomRent) ? json_encode($roomRent) :'');?>' />
          

                                <input type="hidden" name="month_names_breakup" id="month_names_breakup" value="" />

                                <input type="hidden" name="month_fees_breakup" id="month_fees_breakup" value="" />




                                </div>
                                
                              </div>

                            <!--   <div class="form-row">
                                <div class="form-group col-md-12">
                                   <label>Note:-</label>
                                   <span>Within 3 days please produce your original documents. Verification needs to be done.</span>
                                </div>
                                
                              </div> -->
                             
                             
                             
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <input type="submit" name="proceed_to_payment" id="proceed_to_payment" class="btn btn-danger" value="Proceed" />
                          <!-- <button type="button" class="btn btn-danger">Add Student</button> -->
                        </div>
                      </form>
                    </div>
                  </div>
                </div>



                  </div>
                  <div class="payment-option" style="display: none;">
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="btn-back-to-select-option">Back</button>
                    <br><br>
                    <div class="form-group">
                      <label>Payment Option</label><br>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline5" name="customRadioInline5" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline5">Debit Card</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline6" name="customRadioInline5" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadioInline6">Credit Card</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline7" name="customRadioInline5" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline7">Net Banking</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Type</label>
                      <select class="custom-select">
                        <option>Choose...</option>
                        <option value="">Visa</option>
                        <option value="">Master Card</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Card Number</label>
                      <input type="text" class="form-control" placeholder="Enter card number">
                    </div>
                    <div class="form-group">
                      <label>Name on Card</label>
                      <input type="text" class="form-control" placeholder="Enter name on card">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label>Valid Until</label>
                        <div class="row">
                          <div class="col" style="padding-right: 7px;">
                            <input type="text" class="form-control" placeholder="Month">
                          </div>
                          <div class="col" style="padding-left: 0;">
                            <input type="text" class="form-control" placeholder="Year">
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label>CVV</label>
                        <input type="text" class="form-control" placeholder="Enter CVV Number">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Make Payment</button>
                  </div>
                </from>
                <br>
              </div>


              <div class="tab-pane fade" id="payment-report" role="tabpanel">
                <h4>Payment Report</h4>
                <hr>
                <from>
                   <table id="example1"  class="table table-striped" style="font-size: 14px;">
                    <thead>
                      <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Hostel Name</th>
                        <!-- <th scope="col">Hostel Id</th> -->
                        <th scope="col">Last Payment Done On</th>
                        <th scope="col">Total Paid</th>
                        <th scope="col">Payment For</th>
                        <!-- <th scope="col">Total Overdue</th> -->
                      
                         <th scope="col">Action</th> 
                       <!--  <th scope="col"></th> -->
                      </tr>
                    </thead>
                     <tbody>


                      <?php if(!empty($all_data)){
                          $i=1;
                          //echo "<pre>"; print_r($all_data);  
                          foreach($all_data as $ad)
                          { ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $ad->semester; ?></td>
                                <td><?php echo $ad->hostel_name; ?></td>
                               <!--  <td><?php //echo $ad->hostel_code; ?></td> -->
                                <td><?php echo date('d-m-Y',strtotime($ad->payment_date)); ?></td>
                                <td><?php echo $ad->total_paid; ?></td>
                                <td><?php echo  ucwords(str_replace('_', ' ', $ad->form_type)); ?></td>
                                <!-- <td><?php echo $ad->total_overdue; ?></td> -->
                             <!--    <td> 
                               
                                 <a href="#" name="edit_ad" class="edit_button btn btn-secondary btn-sm" ad_id="<?php //echo $ad->id; ?>" data-toggle="modal" data-target="#edit-admin-data">Send Warning</a> 
                                 
                                </td> -->

                                 <td> 
                                
                                
                                  <!-- <a href="#" name="edit_ad" class="edit_button btn btn-secondary btn-sm" ad_id="<?php //echo $ad->id; ?>" data-toggle="modal" data-target="#edit-admin-data">Allotment Cancel</a>  -->
                                  <?php if($ad->form_type=='mess_food'){ ?>
                                  <a target="_blank" href="<?php echo base_url().'printSlip/'.base64_encode($ad->id); ?>" name="print_ad" class="edit_button btn btn-secondary btn-sm">Print</a> 
                                  <?php }else if($ad->form_type=='application_fee'){ ?>
                                  <a target="_blank" href="<?php echo base_url().'printAppSlip/'.base64_encode($ad->id); ?>" name="print_ad" class="edit_button btn btn-secondary btn-sm">Print</a>
                                  <?php } else if($ad->form_type=='hostel_fees'){ ?>
                                  <a target="_blank" href="<?php echo base_url().'print-hos-payment-invoice/'.$ad->id; ?>" name="print_ad" class="edit_button btn btn-secondary btn-sm">Print</a>
                                  <?php } ?>
                                 
                                </td> 
                            </tr>

                          <?php 
                          $i++;
                        }

                      } ?>
                     
                    </tbody>
                  </table>
                  <div class="payment-option" style="display: none;">
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="btn-back-to-select-option">Back</button>
                    <br><br>
                    <div class="form-group">
                      <label>Payment Option</label><br>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline5" name="customRadioInline5" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline5">Debit Card</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline6" name="customRadioInline5" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadioInline6">Credit Card</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline7" name="customRadioInline5" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline7">Net Banking</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Type</label>
                      <select class="custom-select">
                        <option>Choose...</option>
                        <option value="">Visa</option>
                        <option value="">Master Card</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Card Number</label>
                      <input type="text" class="form-control" placeholder="Enter card number">
                    </div>
                    <div class="form-group">
                      <label>Name on Card</label>
                      <input type="text" class="form-control" placeholder="Enter name on card">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label>Valid Until</label>
                        <div class="row">
                          <div class="col" style="padding-right: 7px;">
                            <input type="text" class="form-control" placeholder="Month">
                          </div>
                          <div class="col" style="padding-left: 0;">
                            <input type="text" class="form-control" placeholder="Year">
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label>CVV</label>
                        <input type="text" class="form-control" placeholder="Enter CVV Number">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Make Payment</button>
                  </div>
                </from>
                <br>
              </div>



              <div class="tab-pane fade" id="lodge-complaint" role="tabpanel">
                <h4>Lodge Complaint</h4>
                <br>
                <form novalidate method="post" action="<?php echo base_url('add-complaint'); ?>" name="add-complaint" id="complaintlodgeform" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Select Option</label>
                    <select class="custom-select" name="complaint_type" id="complaint_type">
                    <option value="" selected>Choose...</option>

                    <?php

                    if(!empty($complaint_types))
                    {

                      foreach($complaint_types as $complaint)
                      { ?>

                         <option value="<?php echo $complaint->id; ?>"><?php echo $complaint->complaint_name; ?></option>

                     <?php }

                    }
                    ?>

                  
                  </select>
                  <span id="complaint_types_err" style="color: red;"></span>
                  </div>
                  <div class="form-group">
                    <label>Complaint Description</label>
                    <textarea class="form-control" name="complaint_description" id="complaint_description" placeholder="Enter description" style="height: 200px;"></textarea>   
                    <span id="complaint_description_err" style="color: red;"></span>                 
                  </div>
                  
                  <input type="button" class="btn btn-danger" onclick="submit_complaint()" name="submit" value="Submit" />

                   <!-- <input type="submit" class="btn btn-danger" name="submit" value="Submit" /> -->
                </form>
              </div>



                <div class="modal fade" id="complaint-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Complaint Lodged Successfully</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                     
                        <div class="modal-body">
                          <div class="row">
                           
                            <div class="col-md-9">
                           
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                   <span>Your mail has been successfully sent to Admin</span>

                                </div>
                                
                              </div>
                            
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     
                        </div>
                     
                    </div>
                  </div>
                </div>




              <div class="tab-pane fade" id="reissue-id-card" role="tabpanel">
                <h4>Reissue Card</h4>
                <br>
               <!--  <form  onsubmit="submit_reissue_id_card()"  method="post" action="<?php //echo base_url('add-reissue-id-card'); ?>" name="reissueidcardform" id="reissueidcardform" enctype="multipart/form-data"> -->

                  <form method="post" action="<?php echo base_url('add-reissue-id-card'); ?>" name="reissueidcardform" id="reissueidcardform" enctype="multipart/form-data">

                 

                  <div class="form-group"> 
                    <label>Re-Issue Fee: <?php echo (!empty($payment_option_for_reissue->amount)? $payment_option_for_reissue->amount:'0.00'); ?></label>
                            <input readonly type="hidden" name="reissue_amount" id="reissue_amount" value="<?php echo (!empty($payment_option_for_reissue->amount)? $payment_option_for_reissue->amount:'0.00');?>">

                  </div>

                  <div class="form-group">
                    <label>Reason</label>

                    <textarea class="form-control" name="reissue_reason" id="reissue_reason" placeholder="Enter reason for reissue" style="height: 100px;"></textarea>  
                    <span id="reissue_reason_err" style="color: red;"></span> 
                   
                 
                  </div>

                  <div class="form-group">
                    <label>Upload GD File in (jpeg,png) format:  </label>

                    <input type="file" class="reissue_image" name="reissue_image" id="reissue_image" />
                    <span id="reissue_image_err" style="color: red;"></span> 
                    <br>
                    <!-- <span style="color:#007bff">File in ( jpeg,png ) format</span> -->
                  </div>
                  
                  
                  <input type="button" class="btn btn-danger" onclick = "submit_reissue_id_card()" name="submit1" value="Submit" />

                  <span id="success_message" style="color:red" ></span>

                   <!-- <input type="submit" class="btn btn-danger" name="submit" value="Submit" /> -->
                </form>
              </div>



                <div class="modal fade" id="reissue-payment-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                     <!--  <form novalidate method="post" action="<?php //echo base_url('add-reissue-payment'); ?>" name="reissue-payment" id="reissue-paymentform" > -->

                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Payment For Re-issue Of ID Card</h5>
                       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button> -->
                      </div>
                     
                        <div class="modal-body">
                          <div class="row">
                           
                            
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" id="reissue_payment" onclick="submit_reissue_form()" data-dismiss="modal">Submit</button>
                     
                        </div>
                      <!-- </form> -->
                     
                    </div>
                  </div>
                </div>


            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- sbi_payment -->
    <!-- <form id="submitPaymentGetWay" method="post" action="https://uatmerchant.onlinesbi.com/merchant/merchantprelogin.htm">  -->
    <!-- TEST URL -->
    <form id="submitPaymentGetWay" method="post" action="https://merchant.onlinesbi.com/merchant/merchantprelogin.htm">
    <!-- LIVE URL -->
       <input  name="encdata" id="encdata" value="" type="hidden">
      <input  name="merchant_code" id="merchant_code" value="" type="hidden">
      <!-- <input type="button" value="Submit" name="Submit"> -->
    </form>

    <script type="text/javascript">
  // sbi_payment
  $(function () {
    $("form").on('submit', function(e) {
              e.preventDefault();
              $.ajax({
                  url: $(this).attr('action'),
                  type: "post",
                  data: $(this).serialize(),
                  dataType: 'JSON',
                  success: function(response) {
                      if (response.res == "success") {
                        $('#encdata').val(response.encstring);
                        $('#merchant_code').val(response.merchant_code);
                        document.getElementById("submitPaymentGetWay").submit();
                      } else {
                          console.log('error')
                      }
                  }
              });
          });
    });
  </script>


<script type="text/javascript">


function selectPlan(month) {
$('#amount_details').show();

$('#monthdetails').show();

var month1_name = $('#monthStart').val();
var month2_name = $('#monthMiddle').val();
var month3_name = $('#monthEnd').val();


var plan_Months = $('#plan_Months').val();
$("#month_names_breakup").val(plan_Months);

var plan_Months_Arr = plan_Months.split("##");

//var month = 1;

var plan = 0.00;
var plan_month_details = '';
    if (document.getElementById('customRadioInline21').checked) {
        // plan = $('#amount_for_plan_one').val();
        $("#plan_type").val('Scheme A'); 
        plan = $('#p_A').val();
        plan_month_details  = $('#p_A_month').val();



    }
  
    if (document.getElementById('customRadioInline22').checked) {
        // plan = $('#amount_for_plan_two').val();
        $("#plan_type").val('Scheme B');

         plan = $('#p_B').val();
         plan_month_details  = $('#p_B_month').val();
      
    }

    if (document.getElementById('customRadioInline23').checked) {
        // plan = $('#amount_for_plan_three').val(); 
        $("#plan_type").val('Scheme C');
        plan = $('#p_C').val();
        plan_month_details  = $('#p_C_month').val();
    }

    //console.log(plan_month_details);

    //$(".select_plan_class").html(' X'+month);
//console.log(month);

     $("#total_plan_amount").html('₹'+parseFloat(plan).toFixed(2));
     $("#mess_rent_charge").val(parseFloat(plan).toFixed(2));

     $("#mess_value").val(parseFloat(plan).toFixed(2));


     $("#month_fees_breakup").val(plan_month_details);


     var plan_month_details_arr = plan_month_details.split("##");

     //console.log(plan_month_details_arr);


     $(".month1Rate").html('₹ '+plan_month_details_arr[0]);
     $(".month2Rate").html('₹ '+plan_month_details_arr[1]);
     $(".month3Rate").html('₹ '+plan_month_details_arr[2]);


     $(".month1").html(plan_Months_Arr[0]+' : ');
     $(".month2").html(plan_Months_Arr[1]+' : ');
     $(".month3").html(plan_Months_Arr[2]+' : ');



    var application_fee                 = $("#application_fee_charge").val();
    var room_rent_fee                   = $("#room_rent_charge").val();
    var mess_rent_fee                   = $("#mess_value").val();
    var option_amount                   = $("#option_amount").val();

var total_payment_amount = parseInt(option_amount)+ parseInt(room_rent_fee)+parseFloat(plan);



    $("#total_payment_amount").val(total_payment_amount.toFixed(2));
    $("#total_payable_amount").html('₹'+total_payment_amount.toFixed(2));
    $("#total_amount").val(total_payment_amount.toFixed(2));
    $("#total_paid").val(total_payment_amount.toFixed(2));

}
</script>

    <script>  

  $("document").ready(function(){

    $( "#datepicker2" ).datepicker({
          changeMonth: true,
          changeYear: true,
          yearRange: "-50:+0",
        });



      $( "#hostel_name" ).change(function() {
          $("input[name='select_plan']").prop('checked', false);
        var hostel_id = $(this).val();
        var option_amount                   = $("#option_amount").val();
 
      //  alert(hostel_id);
        var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('front-hostel-details');?>",
                    data: {  "id": hostel_id},
                    dataType: "text",
                    success: function(resultData) { 
                       
                        console.log(resultData);

                      resultData = jQuery.parseJSON(resultData);
                      $('#hostel_charge').html(parseInt(resultData.hostel_charge));
                      $('#total_hostel_charge_for_3_months').html('₹'+3*parseInt(resultData.hostel_charge));
                      $('#room_rent_charge').val(3*parseInt(resultData.hostel_charge));


                      $('#charge_for_plan_one').html(parseInt(resultData.plan_one_charge));
                      $('#charge_for_plan_two').html(parseInt(resultData.plan_two_charge));
                      $('#charge_for_plan_three').html(parseInt(resultData.plan_three_charge));

                      $('#amount_for_plan_one').val(parseInt(resultData.plan_one_charge));
                      $('#amount_for_plan_two').val(parseInt(resultData.plan_two_charge));
                      $('#amount_for_plan_three').val(parseInt(resultData.plan_three_charge));
var totalamount=  parseInt(resultData.plan_one_charge+option_amount);

                      $("#total_plan_amount").html('₹'.totalamount);
                      $("#mess_rent_charge").val(3*parseInt(resultData.plan_one_charge));
                      
$('#amount_details').show();
                    }

          });

        saveData.error(function() { alert("Something went wrong"); });

      });


});
function check(){
$('#new_from_date').html($('#datepicker3').val());
$('#new_to_date').html($('#datepicker4').val());
$('#new_from_date_hidden').val($('#datepicker33').val());
$('#new_to_date_hidden').val($('#datepicker43').val());

var planYesNo = $('#planYesNo').val();
var select_plan = $("input[name='select_plan']:checked").val(); 



$('#select_plan_checked').val(select_plan);



if($('#hostel_name').val()!=''){   

   if ($("input[name='select_plan']:checked").val()) {

  if($('#datepicker3').val()=='' || $('#datepicker4').val()==''){
      alert('Please choose from and to date');
                }else{
$('#add-payment-data').modal('show');
                }

 }
 else{
  if(planYesNo=='yes'){  
 
     alert('please choose one plan');
  }else{
     if($('#datepicker3').val()=='' || $('#datepicker4').val()==''){
      alert('Please choose from and to date');
                }
    else{
$('#add-payment-data').modal('show');
                }
  }
}
        }
        else{
            
          alert('Please choose hostel name');   
        }
    }
    
 
 //$('#datepicker3').datepicker();

function submit_complaint(){


  var complaint_type = $('#complaint_type').val();  
  var complaint_description = $('#complaint_description').val();

  // console.log(complaint_type);
  // console.log(complaint_description);
  $('#complaint_types_err').html(''); 
  $('#complaint_description_err').html('');  

  if(complaint_type==''){
    $('#complaint_types_err').html('Select Complaint Type');  
  }else if(complaint_description==''){
    $('#complaint_description_err').html('Fill Complaint Description');  
  }else{
    //$( "#complaintlodgeform" ).submit();
    //$('#complaint-data').modal('show');

    $.post("<?php echo base_url('add-complaint'); ?>", {complaint_type: complaint_type,complaint_description:complaint_description}, function(result){
        //console.log(result);
        $("#complaintlodgeform")[0].reset();
        $('#complaint-data').modal('show');
    });




  }

}


function submit_reissue_id_card(){


  var reissue_reason = $('#reissue_reason').val();  
  var reissue_image = $('#reissue_image').val(); 
  var reissue_amount = $('#reissue_amount').val();   
  

  $('#reissue_reason_err').html(''); 
 
  if(reissue_reason==''){
    $('#reissue_reason_err').html('Fill Your Reason For Reissue');  
    //return false;
  }else if(reissue_image==''){
    $('#reissue_image_err').html('Please Upload File');  
    //return false;
  }else{

    //return true;
    //alert('Form Has been submitted successfully');
    $('#success_message').html('Your Card Has Been Reissued Successfully'); 

    setTimeout( function () { 
        $("#reissueidcardform").submit();
    }, 300);

    
    // $.post("<?php //echo base_url('add-reissue-id-card'); ?>", {reissue_amount: reissue_amount,reissue_reason:reissue_reason,reissue_image: reissue_image}, function(result){
    //     //console.log(result);
    //    // $("#complaintlodgeform")[0].reset();
    //     //$('#complaint-data').modal('show');
    // });
  }

}



function submit_reissue_form(){
  
    var reissue_amount = $('#reissue_amount').val();  
    $('#total_reissue_amount').val(reissue_amount);

    //alert('datatest');
    $('#reissue-payment-data').modal('hide');

  // $("#reissueidcardform").submit();



}
</script>
<style type="text/css">
  .chkhostel{
    color: red;
margin-top: 9px;
  }

  .custom-select-new {
    display: inline-block;
    height: calc(2.25rem + 2px);
    padding: .375rem 1.75rem .375rem .75rem;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
    
    background-size: 8px 10px;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    -webkit-appearance: none;
    background: #fff;
}
.mess_months{width: 120px; display: inline-block;}


.student-dashboard .img-profile .edit-img-profile-sig {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 5px 10px;
    background-color: #6c757d;
    border-radius: 0 0 .25rem .25rem;
    text-align: center;
    color: #fff;
    display: none;
}


</style>

