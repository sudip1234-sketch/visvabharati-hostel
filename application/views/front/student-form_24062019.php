 <div class="inner-page-content-sectn student-dashboard">
      <div class="container">
        <div class="row">
        
          <!-- <div class="col">
            <a href="<?php //echo base_url('logout'); ?>" class="btn btn-outline-secondary btn-sm float-right" style="margin-top: -8px;">Log out</a>
          </div> -->
        </div>
        <br>
        <div class="row">
          
          <div class="col-sm-12 col-md-12">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="profile" role="tabpanel">
                <h4>Fill In Your Details</h4>
                <hr>

                <form  method="post" action="<?php echo base_url('add-student-profile'); ?>" name="add-form" id="addform" enctype="multipart/form-data">  

                <input type="hidden" name="institute_idd" id="institute_idd" value="" />
                      <input type="hidden" name="course_idd" id="course_idd" value="" />
                      <input type="hidden" name="department_idd" id="department_idd" value="" />
                      <input type="hidden" name="datepicker11" id="datepicker11" value="" />
                  
                <div class="row">
                  <div class="col-md-3">
                    <a href="#" class="img-profile" style="overflow: hidden" >
                      <img id="show_profile_image"  src="<?php echo base_url().'/assets/front/images/blank-profile-pic.jpg';?>" alt="" class="img-thumbnail img-fluid">
                      <input type="file" class="edit-img-profile" style="display: block;" name="profile_image" id="profile_image" />
                     
                    </a>
                    <br><br>
                    <h5>Upload Signature</h5>
                     <a href="#" class="img-profile" style="overflow: hidden" >
                      <img id="show_student_signature"  src="<?php echo base_url().'/assets/front/images/signature.png';?>" alt="" class="img-thumbnail img-fluid">
                      <input type="file" class="edit-img-profile" style="display: block;width: 239px; margin-bottom: 0px;" name="student_signature" id="student_signature" />
                    </a>
                  </div>


                  <div class="col-md-9">
                 
                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Student Id</label>
                           
                          <input type="text" maxlength="1" class="stid" name="student_id1" id="student_id1">
                          <input type="text" maxlength="1" class="stid" name="student_id2" id="student_id2">
                          <input type="text" maxlength="1" class="stid" name="student_id3" id="student_id3">
                          <input type="text" maxlength="1" class="stid" name="student_id4" id="student_id4">
                          <input type="text" maxlength="1" class="stid" name="student_id5" id="student_id5">
                          <input type="text" maxlength="1" class="stid" name="student_id6" id="student_id6">
                          <input type="text" maxlength="1" class="stid" name="student_id7" id="student_id7">
                          <input type="text" maxlength="1" class="stid" name="student_id8" id="student_id8">
                          <input type="text" maxlength="1" class="stid" name="student_id9" id="student_id9">

                          <input required type="text" name="student_id10" class="stid" id="student_id10">
                          <input required type="text" name="student_id11" class="stid" id="student_id11">

                          <input type="hidden" name="student_id" id="student_id" value=""> 
                            <input type="hidden" name="student_id_unique" id="student_id_unique" value="" > 
                           
                           <br><br><span style="color: red;" class="student_id_unique_err"></span>
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
                        <label>Sex</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline8" name="gender" class="custom-control-input"  value="male">

                          <label class="custom-control-label" for="customRadioInline8">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline9" name="gender" class="custom-control-input" value="female">
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

                                        <option  value="<?php echo $bloodgroup->id; ?>"><?php echo $bloodgroup->name; ?></option>


                                     <?php }
                                    }

                                    ?>


                                  
                                  </select>
                        </div>


                      </div>
                     
                      
                     
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Name of Bhavana (Institute)</label>
                                  <select class="custom-select" name="institute_id" id="institute_id" >
                                    <option value="">Choose Bhavana(Institute)</option>
                                    <?php

                                    if($all_institutes){
                                      foreach($all_institutes as $institute)
                                      {
                                        ?>
                                        <option value="<?php echo $institute->id; ?>" data-code="<?php echo $institute->institute_code; ?>"><?php echo $institute->institute_name; ?></option>
                                    <?php  }

                                    }
                                     ?>

                                  </select>
                        </div>
                        <div class="form-group col-md-6">
                        <label>Course Type</label>
                        <select class="custom-select" name="course_id" id="course_id" onchange="getVacatingYear();">
                                  
                                   
                        </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                         <label>Name of Department</label>
                                  <select class="custom-select" name="department_id" id="department_id" >
                                    

                                  </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label>Date of Admission/Allotment</label>
                                  <input class="form-control datepicker" name="date_of_allotment" id="datepicker1" placeholder="Select date" onchange="getVacatingYear();">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Semester</label>
                              <select class="custom-select" name="semester" id="semester" >
                                     <option value="1">1</option>
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                     <option value="5">5</option>
                                     <option value="6">6</option>
                            </select>
                                  
                        </div>
                        <div class="form-group col-md-6">
                          <label>Vacating Month/Year</label>
                           <div class="col-md-4" style="float: left;">
                            <select class="custom-select" name="vacating_month" id="vacating_month" >
                              <option value="5" selected>May</option>
                            </select>
                            </div>
                             <div class="col-md-6" style="float: left;">
                            <input readonly class="form-control" name="vacating_year" id="vacating_year" placeholder="Vacating Year">
                            </div>
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
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Aadhar No/Voter Id/Any Address Proof</label>
                                  <input type="text" class="form-control" name="aadhar_card_no" id="aadhar_card_no" placeholder="Enter Aadhar card no." value="" >
                        </div>
                        <div class="form-group col-md-6">
                         <label>State</label>
                                  <select class="custom-select" name="state_id" id="state_id" >
                                   
                                    <?php 

                                      if(!empty($all_states))
                                      {
                                          foreach($all_states as $state)
                                          { ?>

                                          <option value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>

                                      <?php }


                                      }


                                    ?>
                                    
                                  </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter address" value="" >
                      </div>
                      <div class="form-group">
                        <label>District</label>
                                <input type="text" name="district" id="district" class="form-control" placeholder="Enter District" value="" >
                      </div>


                      <div class="form-row">
                        <div class="form-group col-md-6">
                         <label>City</label>
                                  <input type="text" name="city" id="city" class="form-control" placeholder="Enter city name" value="" >
                        </div>
                        <div class="form-group col-md-6">
                          <label>Pin Code.</label>
                          <input type="text" name="pincode" id="pincode" class="form-control" placeholder="Enter your pin code" value="" >
                          <span style="font-size: 10px;" >Example - 700104 </span>
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
                                    <option selected value="uncle">Others</option>
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

                      <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>PWD Status</label><br>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="pwd_status" class="custom-control-input" value="1">
                            <label class="custom-control-label" for="customRadioInline1">Yes</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="pwd_status" class="custom-control-input" value="0" checked>
                            <label class="custom-control-label" for="customRadioInline2">No</label>
                          </div>
                      </div>


                      <div class="form-group col-md-6">
                        <label>Status Category</label>
                        <select class="custom-select" name="physically_challenged" id="physically_challenged">
                          <option selected>Choose...</option>
                          <option value="blind">Blind</option>
                          <option value="Low Vision">Low Vision</option>
                          <option value="orthopedic">Orthopedic</option>
                          <option value="Deaf & Hearing Impaired">Deaf & Hearing Impaired</option>
                          <option value="Physically Handicapped">Physically Handicapped</option>
                          <option value="Intellectual disability">Intellectual disability</option> 
                          <option value="Multiple Disabilities">Multiple Disabilities</option> 
                        </select>
                      </div>

                      </div>

                      <div class="form-row">
                      <div class="form-group col-md-6">
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

                      <div class="form-group col-md-6">
                        <label>Nationality</label>
                        <select class="custom-select" name="nationality_type" id="nationality_type">
                                  <!-- <option selected>Choose...</option> -->
                                  <option value="indian">Indian</option>
                                  <option value="saarc_country">Saarc Country</option>
                                  <option value="non_saarc_country">Non Saarc Country</option>
                        </select>
                      </div>

                      </div>


                      
                      <div class="form-group">
                        <label>Renewal Option</label><br>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline15" name="renewal_option" value="1" onclick="javascript:renewalCheck();" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline15">Yes</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline16" name="renewal_option" value="0" onclick="javascript:renewalCheck();" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline16">No</label>
                          </div>
                      </div>


                       <div id="renewal_check" style="display:none">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Enter Student Id</label>
                                  <input type="text" class="form-control" name="renewal_student_id" id="renewal_student_id" value="" placeholder="Enter Student Id" >


                          <span id="renewal_msg" style="color:red;display:none"></span>
                                
                        </div>
                        
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">

                          <input type="button" class="btn btn-danger"  name="check_student_exist" id="check_student_exist" value="Check" />

                        </div>
                        
                      </div>

                      </div>


                      <div class="form-group">
                        <label>Obtain Marks Type</label><br>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" onclick="javascript:yesnoCheck();" id="customRadioInline5" name="obtain_marks_type" class="custom-control-input" value="1">
                            <label class="custom-control-label" for="customRadioInline5">CGPA</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" onclick="javascript:yesnoCheck();" id="customRadioInline6" name="obtain_marks_type" class="custom-control-input" value="0">
                            <label class="custom-control-label" for="customRadioInline6">Best Of 5</label>
                          </div>
                      </div>


                      <div id="div_for_best_of_5" style="display:none">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="subject1" value="" placeholder="Enter Subject" >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added numberdot" name="score[]" id="score1" value="" placeholder="Enter Score" >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="subject2" value="" placeholder="Enter Subject" >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added numberdot" name="score[]" id="score2" value="" placeholder="Enter Score" >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="subject3" value="" placeholder="Enter Subject" >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added numberdot" name="score[]" id="score3" value="" placeholder="Enter Score" >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="subject4" value="" placeholder="Enter Subject" >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added numberdot" name="score[]" id="score4" value="" placeholder="Enter Score" >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="subject5" value="" placeholder="Enter Subject" >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added numberdot" name="score[]" id="score5" value="" placeholder="Enter Score" >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">

                          <input type="button" class="btn btn-danger"  name="add_subject" id="add_subject" value="Calculate Score" />
                           
                        </div>
                        
                      </div>

                      </div>

                   

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Distance Score (10 Point Scale)</label>
                                  <input type="text" class="form-control" name="distance_score" id="distance_score" value="" placeholder="Enter distance score (10 Point Scale)" readonly>


                       <label><a style="color:green" href="javascript:void(0)" onclick="javascript:distanceScoreDetails();">Distance Score Details</a></label>

                        <div id="distance_score_details" style="display:none">


                            <table class="table table-striped" style="font-size: 14px;">
                  <thead>
                    <tr>
                      <th scope="col">Distance (Km)</th>
                      <th scope="col">Distance Score</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                     <tr>
                      <th scope="col">0 - 7.99</th>
                      <th scope="col">0</th>
                     
                    </tr>
                    <tr>
                      <th scope="col">7.99 - 49.99</th>
                      <th scope="col">1</th>
                     
                    </tr>
                    <tr>
                      <th scope="col">49.99 - 99.99</th>
                      <th scope="col">2</th>
                     
                    </tr>
                    <tr>
                      <th scope="col">99.99 - 149.99</th>
                      <th scope="col">3</th>
                     
                    </tr>
                     <tr>
                      <th scope="col">149.99 - 199.99</th>
                      <th scope="col">4</th>
                     
                    </tr>
                     <tr>
                      <th scope="col">199.99 - 249.99</th>
                      <th scope="col">5</th>
                     
                    </tr>
                     <tr>
                      <th scope="col">249.99 - 299.99</th>
                      <th scope="col">6</th>
                     
                    </tr>
                    <tr>
                      <th scope="col">299.99 - 499.99</th>
                      <th scope="col">7</th>
                     
                    </tr>
                     <tr>
                      <th scope="col">499.99 - 999.99</th>
                      <th scope="col">8</th>
                     
                    </tr>
                    <tr>
                      <th scope="col">999.99 - 1499.99</th>
                      <th scope="col">9</th>
                     
                    </tr>
                    <tr>
                      <th scope="col">1499.99 </th>
                      <th scope="col">10</th>
                     
                    </tr>
                  </tbody>
                </table>



                           <!--  <div class="form-row">
                              <div class="form-group col-md-6">
                                 <label>Subject</label>
                                        <input type="text" class="form-control subjects_added" name="subject[]" id="subject5" value="" placeholder="Enter Subject" >
                              </div>
                              <div class="form-group col-md-3">
                                 <label>Score <span id="tool_tip_info"></span></label>
                                 <input type="text" class="form-control scores_added" name="score[]" id="score5" value="" placeholder="Enter Score" >
                              </div>
                            </div> -->

                            <div class="form-row">
                              <div class="form-group col-md-6">

                                <!-- <input type="button" class="btn btn-secondary btn-sm" onclick="javascript:closeScoreDetails();"  name="distancescore" id="distancescore" value="Close" /> -->

                                <a href="javascript:void(0)" class="btn btn-secondary btn-sm" onclick="javascript:closeScoreDetails();" name="distancescore" id="distancescore" >Close</a>
                                 
                              </div>
                              
                            </div>

                      </div>



                        </div>
                        <div class="form-group col-md-6">
                           <label>Distance in Km <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control" name="distance_frm" id="distance_frm" value="" placeholder="Enter distance from santiniketan" readonly>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Last Final Exam Score (10 Point Scale)</label>
                                  <input max='10' type="text" class="form-control numberdot" name="last_final_exam_score" id="last_final_exam_score" value="" placeholder="Enter last final exam score (10 Point Scale)">
                        </div>
                        <div class="form-group col-md-6">
                           <label>Final Score (10 Point Scale)</label>
                                  <input type="text" class="form-control" name="final_score" id="final_exam_score" value="" placeholder="Final Exam Score" readonly>
                                 
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



                     <!-- <div class="form-group">
                        <label>Upload Student Signature</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" name="student_signature" class="custom-file-input inputDisabled" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                          </div>
                        </div>
                      </div>  -->

                      <div class="form-group">
                        <label>Declaration</label>
                        <div class="custom-control custom-checkbox custom-control-inline">
                          <input type="checkbox" id="declaration" name="declaration" class="custom-control-input" value="general">
                          <label class="custom-control-label" for="declaration">I hereby declare that the details furnished above are true and correct to the best of my knowledge
and belief. </label>
                        </div>
                        <br><a href="#javascript:void(0)" data-toggle="modal" data-target="#add-payment-data" style="font-size: 14px;">Rules And Regulations</a>
                       
                      </div>

                     <!--  <button type="submit" class="btn btn-danger" id="btn-save">Apply For Hostel</button> -->
                      <input type="submit" class="btn btn-danger" id="btn-save" value="Apply For Hostel" />
                    </form>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>


<div class="modal fade" id="add-payment-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"> 
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Rules And Regulations</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>     
        <div class="modal-body">
          <div class="row">           
            <div class="col-md-12">  
              <div class="form-row">
                <div class="form-group ">                   
                   <span><?php if(!empty($list)){ echo $list[0]->cms_content;} ?></span>
                </div>                
              </div>
            </div>
          </div>
        </div>      
    </div>
  </div>
</div>




<script type="text/javascript">

function distanceScoreDetails() {
    
        $("#distance_score_details").css("display", "block");

}

</script>

<script type="text/javascript">

function closeScoreDetails() {
    
        $("#distance_score_details").css("display", "none");

}

</script>


<script type="text/javascript">



function yesnoCheck() {
    if (document.getElementById('customRadioInline6').checked) {
        //document.getElementById('div_for_best_of_5').style.visibility = 'visible';
        //$('#div_for_best_of_5').show();
        $("#div_for_best_of_5").css("display", "block");
        $('#last_final_exam_score').prop('readonly', true);
    }
  

    if (document.getElementById('customRadioInline5').checked) {
        //document.getElementById('div_for_best_of_5').style.visibility = 'hidden';
        //$('#div_for_best_of_5').hide();
        $("#div_for_best_of_5").css("display", "none");
        $('#last_final_exam_score').prop('readonly', false);
        $('#last_final_exam_score').val('');
         $('#final_exam_score').val('');
    }
    

}

</script>

<script type="text/javascript">

function renewalCheck() {
    if (document.getElementById('customRadioInline15').checked) {
        $("#renewal_check").css("display", "block");
        $("#renewal_msg").css("display", "none");
        
    }
  

    if (document.getElementById('customRadioInline16').checked) {
        
        $("#renewal_check").css("display", "none");
        $("#renewal_msg").css("display", "none");
    }
    

}

</script>


<script>

jQuery.validator.addMethod("phoneno", function(phone_number, element) {
          phone_number = phone_number.replace(/\s+/g, "");
          return this.optional(element) || phone_number.length > 9 && 
          phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
}, "<br />Please specify a valid phone number..!!");

</script>

<script>

jQuery.validator.addMethod("pincodecheck", function(pincode, element) {
          pincode = pincode.replace(/\s+/g, "");
          return this.optional(element) || pincode.length == 6 && 
          pincode.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
}, "<br />Please specify a valid 6 digit Pincode..!!");

</script>

    <script>
    $("document").ready(function(){

         
          $( "#datepicker1" ).datepicker({
          changeMonth: true,
          changeYear: true,
          yearRange: "-50:+0",
        });

          $( "#datepicker2" ).datepicker({
          changeMonth: true,
          changeYear: true,
          yearRange: "-50:+0",
        });



          
            $("#addform").validate({
               rules:{
                  // student_id_unique:{
                  //   "required":true
                  // },
                  full_name:{
                    "required":true
                  },
                  contact_no:{
                    "required":true,
                    "phoneno":true
                  },
                  email_id:{
                    "required": true,
                   // "email": true,
                     remote: {
                      url:"<?php echo base_url('front-check-email');?>",
                      type: "post",
                      data: {
                        field:"email_id",
                        value: function() {
                          return $( "#email_id" ).val();
                        }
                      }
                  }
                  },
                  gender:{
                    "required":true
                  },
                  course_id:{
                    "required":true
                  },
                  department_id:{
                    "required":true
                  },
                  institute_id:{
                    "required":true
                  },
                 
                  vacating_year:{
                    "required":true
                  },/*,
                  vb_reg_id:{
                    "required":true
                  },*/
                  /*aadhar_card_no:{
                    "required":true
                  },*/
                  state_id:{
                    "required":true
                  },
                  pwd_status:{
                    "required":true
                  },
                  caste_type:{
                    "required":true
                  },
                  profile_image:{
                    "required":true
                  },
                  student_signature:{
                    "required":true
                  },
                  declaration:{
                    "required":true
                  },
                  obtain_marks_type:{
                    "required":true
                  },
                  date_of_allotment:{
                    "required":true
                  },
                  pincode:{
                    "required":true,
                    "pincodecheck":true
                  }
                },
               messages:{
                // student_id_unique:{
                //   "required":"Please enter your Student Id last two digits"
                // },
                full_name:{
                  "required":"Please Enter Full Name..!!"
                },
                contact_no:{
                  "required":"Please Enter Contact No..!!"
                },
                email_id:{
                  "required":"Please Enter Email Id..!!",
                  "remote":"Email Already Exists"
                },
                gender:{
                    "required":"Please Select Gender..!!"
                },
                course_id:{
                    "required":"Please Select Course Id..!!"
                },
                department_id:{
                    "required":"Please Select Department Id..!!"
                },
                institute_id:{
                    "required":"Please Select Institute Id..!!"
                },                
                vacating_year:{
                    "required":"Please Select Vacating Year..!!"
                },
                /*vb_reg_id:{
                    "required":"Please Select Registration Id..!!"
                },*/
                /*aadhar_card_no:{
                    "required":"Please Select Aadhar Card No..!!"
                },*/
                state_id:{
                    "required":"Please Select State Id..!!"
                },
                pwd_status:{
                    "required":"Please Select PWD Status..!!"
                },
                caste_type:{
                    "required":"Please Select Caste Type..!!"
                },
                profile_image:{
                   "required":"Please Select Student Image..!!"
                  },
                student_signature:{
                    "required":"Please Select Student Signature..!!"
                },
                declaration:{
                    "required":"Please Check Declaration..!!"
                },
                obtain_marks_type:{
                    "required":"Please Select Obtain Marks Type..!!"
                },
                date_of_allotment:{
                  "required":"Please Select Date of Admission/Allotment..!!"
                },
                pincode:{
                    "required":"Please Select Pincode..!!"
                }
              }           

            });

          });
        </script>


     <script>

     function check_student_id(student_id){
      $(".student_id_unique_err").html('');
      $.ajax({ 
            type: 'POST',
            url: "<?php echo base_url('check-student-id-front');?>",
            data: {"student_id":student_id},
            dataType: "text",
            success: function(resultData) { 
             // console.log(resultData);

              if(resultData=='true'){
                $(".student_id_unique_err").html('Student Id Already Exists!!');
              }else{
                $("#student_id10").removeAttr("style");
                $("#student_id11").removeAttr("style");

                $('#student_id10').prop('disabled',true);
                $('#student_id11').prop('disabled',true);
                $('#student_id').val(student_id);
                $('#student_id_unique').val(resultData);
              }

            }                
        });
     }


  // function generate_student_id(student_id)
  // {
    
  //   $(".student_id_unique_err").html('');

  //     var saveData1 = $.ajax({ 
  //                   type: 'POST',
  //                   url: "<?php //echo base_url('generate-student-id-front');?>",
  //                   data: {"student_id":student_id},
  //                   dataType: "text",
  //                   success: function(resultData) { 
  //                     //console.log(resultData);
  //                   $('#student_id10').show();
  //                   $('#student_id11').show();
  //                   var ssp = resultData.split('');
  //                   $('#student_id10').val(ssp[0]);
  //                   $('#student_id11').val(ssp[1]);  

  //                   $('#student_id10').prop('disabled',true);
  //                   $('#student_id11').prop('disabled',true);

  //                   $('#student_id').val(student_id);
  //                   $('#student_id_unique').val(resultData);
  //                   }                
  //       });

  // }


  $("document").ready(function(){

    $("#institute_id").change(function() {

        var institute_id = $('option:selected', this).val();
        var institute_code = $('option:selected', this).data('code');

        var formattedNumber = ("0" + institute_code).slice(-2);
        var formattedNumber1 = formattedNumber.split('');

        $('#student_id1').val(formattedNumber1[0]);
        $('#student_id2').val(formattedNumber1[1]);

        $('#student_id3').val('');
        $('#student_id4').val('');
        $('#student_id5').val('');
        $('#student_id6').val('');
        $('#student_id7').val('');
        $('#student_id8').val('');
        $('#student_id9').val('');
        $('#student_id10').val('');
        $('#student_id11').val('');




        $("#student_id1").prop('disabled', true);
        $("#student_id2").prop('disabled', true);
        $("#student_id3").prop('disabled', true);
        $("#student_id4").prop('disabled', true);
        $("#student_id5").prop('disabled', true);
        $("#student_id6").prop('disabled', true);
        $("#student_id7").prop('disabled', true);
        $("#student_id8").prop('disabled', true);
        $("#student_id9").prop('disabled', true);

       // $("#student_id10").prop('disabled', true);
       // $("#student_id11").prop('disabled', true);

        checkalldata();

        var saveData1 = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('get-course-front-list');?>",
                    data: {  "institute_id": institute_id},
                    dataType: "text",
                    success: function(resultData) { 

                      resultData = jQuery.parseJSON(resultData);
                      var optionsAsString = "<option value=''> Select Course </option>";
                      for(var i = 0; i < resultData.length; i++) {

                        optionsAsString += "<option value='" + resultData[i].id + "' data-code='" + resultData[i].course_code + "'  data-year='"+resultData[i].total_year+"'>" + resultData[i].course_name + "</option>";
                      }
                      $( 'select[name="course_id"]' ).html( optionsAsString );


                      var optionsAsString11 = "<option value=''> Select Department </option>";
                      $( 'select[name="department_id"]' ).html( optionsAsString11 );

                      $("#datepicker1").val();

                    }                
        });

    });

    $("#course_id").change(function() {

        var institute_id  = $('#institute_id').val();
        var course_id     = $('option:selected', this).val();

        var course_code = $('option:selected', this).data('code');
        var formattedNumber = ("0" + course_code).slice(-2);
        var formattedNumber1 = formattedNumber.split('');

        $('#student_id3').val(formattedNumber1[0]);
        $('#student_id4').val(formattedNumber1[1]);

        if(institute_id!=''){
          $('#student_id5').val('');
          $('#student_id6').val('');
          $('#student_id7').val('');
          $('#student_id8').val('');
          $('#student_id9').val('');
          $('#student_id10').val('');
          $('#student_id11').val('');
        }
        

        $("#student_id1").prop('disabled', true);
        $("#student_id2").prop('disabled', true);
        $("#student_id3").prop('disabled', true);
        $("#student_id4").prop('disabled', true);
        $("#student_id5").prop('disabled', true);
        $("#student_id6").prop('disabled', true);
        $("#student_id7").prop('disabled', true);
        $("#student_id8").prop('disabled', true);
        $("#student_id9").prop('disabled', true);

       // $("#student_id10").prop('disabled', true);
       // $("#student_id11").prop('disabled', true);


        checkalldata();

        var saveData1     = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('get-subject-front-list');?>",
                    data: {  "institute_id": institute_id,"course_id":course_id},
                    dataType: "text",
                    success: function(resultData) { 

                      //alert(resultData);
                      resultData = jQuery.parseJSON(resultData);
                      var optionsAsString = "<option value=''> Select Department </option>";
                      for(var i = 0; i < resultData.length; i++) {

                        optionsAsString += "<option value='" + resultData[i].id + "' data-code='" + resultData[i].subject_code + "'>" + resultData[i].department_name + "</option>";
                      }
                      $( 'select[name="department_id"]' ).html( optionsAsString );

                    }                
        });


    });

    $("#department_id").change(function() {

        var institute_id  = $('#institute_id').val();
        var course_id     = $('#course_id').val();
        var department_id = $('#department_id').val();

        var department_code = $('option:selected', this).data('code');

        var formattedNumber   = ("0" + department_code).slice(-3);
        var formattedNumber1  = formattedNumber.split('');

        $('#student_id5').val(formattedNumber1[0]);
        $('#student_id6').val(formattedNumber1[1]);
        $('#student_id7').val(formattedNumber1[2]);


        if(institute_id!='' && course_id!=''){
          $('#student_id8').val('');
          $('#student_id9').val('');
          $('#student_id10').val('');
          $('#student_id11').val('');
        }

        $("#student_id1").prop('disabled', true);
        $("#student_id2").prop('disabled', true);
        $("#student_id3").prop('disabled', true);
        $("#student_id4").prop('disabled', true);
        $("#student_id5").prop('disabled', true);
        $("#student_id6").prop('disabled', true);
        $("#student_id7").prop('disabled', true);
        $("#student_id8").prop('disabled', true);
        $("#student_id9").prop('disabled', true);

       // $("#student_id10").prop('disabled', true);
      //  $("#student_id11").prop('disabled', true);

        checkalldata();



    });

   


    $('input[name="date_of_allotment"]').change(function() {

        var formattedNumber = $(this).val();
        var formattedNumber1 = formattedNumber.split('/');
         //console.log(formattedNumber1);
        var formattedNumber2 = formattedNumber1[2].split('');
         //console.log(formattedNumber2);
        $('#student_id8').val(formattedNumber2[2]);
        $('#student_id9').val(formattedNumber2[3]);

        var institute_id111  = $('#institute_id').val();
        var course_id111     = $('#course_id').val();
        var department_id111 = $('#department_id').val();

       

        if(institute_id111!='' && course_id111!='' && department_id111!=''){
          $('#student_id10').val('');
          $('#student_id11').val('');
        }


         $("#student_id1").prop('disabled', true);
        $("#student_id2").prop('disabled', true);
        $("#student_id3").prop('disabled', true);
        $("#student_id4").prop('disabled', true);
        $("#student_id5").prop('disabled', true);
        $("#student_id6").prop('disabled', true);
        $("#student_id7").prop('disabled', true);
        $("#student_id8").prop('disabled', true);
        $("#student_id9").prop('disabled', true);

      //  $("#student_id10").prop('disabled', true);
      //  $("#student_id11").prop('disabled', true);

               checkalldata(); 
    });

   




    // $('.yearselect').yearselect({
    //   start: 2018,
    //   end: 2020
    // });

    // $('.yearselect1').yearselect({
    //   start: 2020,
    //   end: 2022
    // });


    $("#add_subject").click(function() {
        //var subjects  = $('.subjects_added').val();
        var score1    = $('#score1').val();
        var score2    = $('#score2').val();
        var score3    = $('#score3').val();
        var score4    = $('#score4').val();
        var score5    = $('#score5').val();

        var total_score_out_of_500 = (parseFloat(score1)+parseFloat(score2)+parseFloat(score3)+parseFloat(score4)+parseFloat(score5));
        //console.log(total_score_out_of_500);
        var total_score_out_of_10  = ((total_score_out_of_500/500)*10).toFixed(2);
//console.log(total_score_out_of_10);
        var last_final_exam_score = total_score_out_of_10;
//console.log(last_final_exam_score);
        $('#last_final_exam_score').val(total_score_out_of_10);
        var distance_score = $("#distance_score").val();
        if(distance_score==''){
          distance_score = 0;
        }else{
          distance_score = distance_score;
        }
       
        var total_out_of_twenty = ((parseInt(distance_score)+parseFloat(last_final_exam_score))/20);
        var total_out_of_ten = (total_out_of_twenty*10).toFixed(2);;
        //console.log(total_out_of_ten);
        $("#final_exam_score").val(total_out_of_ten);
      
    });

    $("#check_student_exist").click(function() {

        var renewal_student_id    = $('#renewal_student_id').val();
        var saveData1     = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('check-student-exist');?>",
                    data: {  "renewal_student_id": renewal_student_id},
                    dataType: "text",
                    success: function(resultData) { 

                     // alert(resultData);
                      if(resultData)
                      {
                        $("#renewal_msg").css("display", "block");
                        $("#renewal_msg").html('Student Id Matches With Existing Record');
                        setTimeout(function(){ $("#renewal_msg").css("display", "none"); }, 3000);
                      }
                      else
                      {
                        $("#renewal_msg").css("display", "block");
                        $("#renewal_msg").html('Student Id Does Not Match');
                        setTimeout(function(){ $("#renewal_msg").css("display", "none"); }, 3000);
                      }
                      
                      //$( 'select[name="department_id"]' ).html( optionsAsString );

                    }                
        });
        
        
      
    });

    

});
</script>



<script>


  function get_distance_calculation(zipcode,type)
  {

     $.ajax({
       url : "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDJ7LS8lb5JcBD5gnEdFX1tzmAyYuAU3ow&components=postal_code:"+zipcode+"&sensor=false",
       //url: "https://maps.googleapis.com/maps/api/geocode/json?origins="+zipcode+"&destinations=731235&mode=driving&language=en-EN&sensor=false&key=AIzaSyDJ7LS8lb5JcBD5gnEdFX1tzmAyYuAU3ow",
       method: "POST",
       //dataType: "jsonp",
       success:function(data){
           
           //alert(data);
           //alert(data.results[0].geometry.location.lat);

          // data = jQuery.parseJSON(data);
           //alert(data);
            
           from_latitude = data.results[0].geometry.location.lat;
           from_longitude= data.results[0].geometry.location.lng;
          // alert("Lat = "+latitude+"- Long = "+longitude);


           to_latitude  = '23.6825';
           to_longitude = '87.6905';

           var dist = distance(from_latitude,from_longitude,to_latitude,to_longitude,'K').toFixed(2);

           //dist = parseFloat(dist) + 30;

           //////////////////// CALCULATE DISTANCE SCORE ////////////////////////

           var dist_score = 0;

           if(parseFloat(dist) > 0 && parseFloat(dist) < 7.99)
           {
              dist_score = 0;
           }

           if(parseFloat(dist) >= 7.99 && parseFloat(dist) < 49.99)
           {
              dist_score = 1;
           }

           if(parseFloat(dist) >= 49.99 && parseFloat(dist) < 99.99)
           {
              dist_score = 2;
           }

           if(parseFloat(dist) >= 99.99 && parseFloat(dist) < 149.99)
           {
              dist_score = 3;
           }

           if(parseFloat(dist) >= 149.99 && parseFloat(dist) < 199.99)
           {
              dist_score = 4;
           }

           if(parseFloat(dist) >= 199.99 && parseFloat(dist) < 249.99)
           {
              dist_score = 5;
           }

           if(parseFloat(dist) >= 249.99 && parseFloat(dist) < 299.99)
           {
              dist_score = 6;
           }

           if(parseFloat(dist) >= 299.99 && parseFloat(dist) < 499.99)
           {
              dist_score = 7;
           }

           if(parseFloat(dist) >= 499.99 && parseFloat(dist) < 999.99)
           {
              dist_score = 8;
           }

           if(parseFloat(dist) >= 999.99 && parseFloat(dist) < 1499.99)
           {
              dist_score = 9;
           }

           if(parseFloat(dist) >= 1499.99)
           {
              dist_score = 10;
           }

           if(type=='add')
           {
             $("#distance_frm").val(dist);
             $("#distance_score").val(dist_score);
             
           }
           calfinal();
       }

    });

  }

  $("document").ready(function(){

  $("#last_final_exam_score").keyup(function(){

    var distance_score = $("#distance_score").val();
    var last_final_exam_score = $("#last_final_exam_score").val();
    if(distance_score!=''){
    var total_out_of_twenty = ((parseInt(distance_score)+parseFloat(last_final_exam_score))/20);
    var total_out_of_ten = (total_out_of_twenty*10).toFixed(2);;

    $("#final_exam_score").val(total_out_of_ten);
  }
    //alert(total_out_of_ten);
  });


 
  

  $('body').tooltip({
    selector: '.createdDiv'
  });

  $("#pincode").keyup(function(){

   // alert('test');

    var type= 'add';
    var zipcode = $("#pincode").val();
    var address = $("#address").val();

    var tooltip_text = 'Total distance from Viswabharati to your registered address';

  
    get_distance_calculation(zipcode,type);
    $("#tool_tip_info").empty();
            $('<span class="createdDiv" data-toggle="tooltip" data-placement="left" title="'+tooltip_text+'"><i class="fa fa-info-circle"></i></span>').appendTo('#tool_tip_info');
     
});

  });


  //This function takes in latitude and longitude of two location and returns the distance between them as the crow flies (in km)
  function distance(lat1, lon1, lat2, lon2, unit) {
  var radlat1 = Math.PI * lat1/180
  var radlat2 = Math.PI * lat2/180
  var theta = lon1-lon2
  var radtheta = Math.PI * theta/180
  var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
  if (dist > 1) {
    dist = 1;
  }
  dist = Math.acos(dist)
  dist = dist * 180/Math.PI
  dist = dist * 60 * 1.1515
  if (unit=="K") { dist = dist * 1.609344 }
  if (unit=="N") { dist = dist * 0.8684 }
  return dist
}


function checkalldata(){
  $(".student_id_unique_err").html('');
  var date_of_admission = $('#datepicker1').val();
  var institute_id      = $('#institute_id').val();
  var course_id         = $('#course_id').val();
  var department_id     = $('#department_id').val();

  var institute_id_code      = $('option:selected', '#institute_id').data('code'); 
  var course_id_code         = $('option:selected', '#course_id').data('code'); 
  var department_id_code     = $('option:selected', '#department_id').data('code'); 

  if((date_of_admission!='') && (institute_id!='Choose Bhavana(Institute)') && (course_id!='null') && (department_id!='null')){
    var date_of_yr = date_of_admission.split('/');
    var student_id = (("0" + institute_id_code).slice(-2))+''+(("0" + course_id_code).slice(-2))+''+(("00" + department_id_code).slice(-3))+''+(("0" + date_of_yr[2]).slice(-2));
   $('#student_id').val(student_id);
   // $('#student_id_unique') .show();

  $('#institute_idd').val(institute_id);
  $('#course_idd').val(course_id);
  $('#department_idd').val(department_id);
  $('#datepicker11').val(date_of_admission);
    //generate_student_id(student_id); 

    // start check student id -- 04.12.18
    $(".student_id_unique_err").html('Enter last two digit of your student Id!!');
    $("#student_id10").css('border-color', 'red');
    $("#student_id11").css('border-color', 'red');
    $("#student_id10").val('');
    $("#student_id11").val('');
    $('#student_id10').prop('disabled',false);
    $('#student_id11').prop('disabled',false);
    $('#student_id').val('');
    $('#student_id_unique').val('');
    // end check student id -- 04.12.18



  } 
}

$('.number').keypress(function(event) {
  if (event.which < 48 || event.which > 57) {
    event.preventDefault();
  }
});
function calfinal(){
  var distance_score = $("#distance_score").val();
    var last_final_exam_score = $("#last_final_exam_score").val();
    if(distance_score!=''){
    var total_out_of_twenty = ((parseInt(distance_score)+parseFloat(last_final_exam_score))/20);
    var total_out_of_ten = (total_out_of_twenty*10).toFixed(2);

    if(isNaN(total_out_of_ten)) {
      var total_out_of_ten = 0;
    }

    $("#final_exam_score").val(total_out_of_ten);
    }
}

/******************* 25.09.18 *****************************/

$(".stid").keyup(function() {
    //console.log($(this).val());
    var that = $(this);
    var flag = 0;

     $(".stid").each(function(){
      var that1 = $(this);
        if(!that1.val()){
          flag = 1;
          //that.val('');
          that1.focus();
          return false;
        }else{
          that.next('.stid').val('');
          that.next('.stid').focus();
        }
    });   

});

$("#student_id2").keyup(function() {

var st1 = $('#student_id1').val();
var st2 = $('#student_id2').val();

// check bhavan
if(st1!='' && st2!=''){
  $.post("<?php echo base_url('check-bhavanCode'); ?>", {st1: st1,st2: st2}, function(result){
    //console.log(result);
      if(result=='0'){
        //$(".student_id_unique_err").html('Bhavan Code not match.');
        $("#student_id1,#student_id2").val('').css("background-color","#ff3300");
        $( "#student_id1" ).focus();
        $("#institute_id").val('');
      }else{

        $("#student_id1,#student_id2").css({ 'background-color' : '' });
        //$("#student_id1,#student_id2").css("background-color"," ");
        result00 = result.split('##');
        $(".student_id_unique_err").html('');
        $("#institute_id").val(result00[0]);
        $("#institute_id").prop('disabled', true);

        //bhavan = result;
        $.ajax({ 
          type: 'POST',
          url: "<?php echo base_url('get-course-front-list');?>",
          data: {  "institute_id": result00[0]},
          dataType: "text",
          success: function(resultData) { 
            resultData = jQuery.parseJSON(resultData);
            var optionsAsString = "<option value=''> Select Course </option>";
            for(var i = 0; i < resultData.length; i++) {
              optionsAsString += "<option value='" + resultData[i].id + "' data-code='" + resultData[i].course_code + "' data-year='"+resultData[i].total_year+"'>" + resultData[i].course_name + "</option>";
            }
            $( 'select[name="course_id"]' ).html( optionsAsString );
          }                
        });

      }
    });
}

});


$("#student_id4").keyup(function() {
   
var st1 = $('#student_id1').val();
var st2 = $('#student_id2').val();
var st3 = $('#student_id3').val();
var st4 = $('#student_id4').val();

// check Course Type
if(st1!='' && st2!='' && st3!='' && st4!=''){
  $.post("<?php echo base_url('check-courseType'); ?>", {st3: st3,st4: st4,"institute_id": $('#institute_id').val()}, function(result1){
      if(result1=='0'){
        //$(".student_id_unique_err").html('Course Type not match.');
        $("#student_id3,#student_id4").val('').css("background-color","#ff3300");
        $( "#student_id3" ).focus();
        $("#course_id").val();
      }else{

        $("#student_id3,#student_id4").css({ 'background-color' : '' });
        result001 = result1.split('##');
        $(".student_id_unique_err").html('');
        $('#course_id option[value="'+result001[0]+'"]').attr('selected', true);
        $("#course_id").prop('disabled', true);

        $.ajax({ 
          type: 'POST',
          url: "<?php echo base_url('get-subject-front-list');?>",
          data: {  "institute_id": $('#institute_id').val(),"course_id":result001[0]},
          dataType: "text",
          success: function(resultData) { 
            //alert(resultData);
            resultData = jQuery.parseJSON(resultData);
             var optionsAsString = "<option value=''> Select Department </option>";
            if(resultData){
            for(var i = 0; i < resultData.length; i++) {

              optionsAsString += "<option value='" + resultData[i].id + "' data-code='" + resultData[i].subject_code + "'>" + resultData[i].department_name + "</option>";
            }
          }
            $( 'select[name="department_id"]' ).html( optionsAsString );
          }                
        });

      }
    });
}


});


$("#student_id7").keyup(function() {

var st1 = $('#student_id1').val();
var st2 = $('#student_id2').val();
var st3 = $('#student_id3').val();
var st4 = $('#student_id4').val();
var st5 = $('#student_id5').val();
var st6 = $('#student_id6').val();
var st7 = $('#student_id7').val();


// check Department
if(st1!='' && st2!='' && st3!='' && st4!='' && st5!='' && st6!='' && st7!=''){
 // console.log('fhj');
  $.post("<?php echo base_url('check-Department'); ?>", {st5: st5,st6: st6,st7: st7,"institute_id": $('#institute_id').val(),"course_id":$('#course_id').val()}, function(result3){
    //console.log(result3);
      if(result3=='0'){
        //$(".student_id_unique_err").html('Department not match.');
        $("#student_id5,#student_id6,#student_id7").val('').css("background-color","#ff3300");
        $( "#student_id5" ).focus();

        $("#department_id").val();
      }else{

        $("#student_id5,#student_id6,#student_id7").css({ 'background-color' : '' });

        result3 = result3.split('##');

        $(".student_id_unique_err").html('');
        $('#department_id option[value="'+result3[0]+'"]').attr('selected', true);

        $("#department_id").prop('disabled', true);


      }
    });
}

});


$("#student_id9").keyup(function() {

var st1 = $('#student_id1').val();
var st2 = $('#student_id2').val();
var st3 = $('#student_id3').val();
var st4 = $('#student_id4').val();
var st5 = $('#student_id5').val();
var st6 = $('#student_id6').val();
var st7 = $('#student_id7').val();
var st8 = $('#student_id8').val();
var st9 = $('#student_id9').val();


// check Department
if(st1!='' && st2!='' && st3!='' && st4!='' && st5!='' && st6!='' && st7!='' && st8!='' && st9!=''){
  $('#datepicker1').datepicker('destroy');
  var year = "20"+st8+st9;
  $( "#datepicker1" ).datepicker({
          changeMonth: true,
          changeYear: true,
          minDate: new Date(year, 0, 1),
          maxDate: new Date(year, 11, 31)
        });

var student_id112 = st1+''+st2+''+st3+''+st4+''+st5+''+st6+''+st7+''+st8+''+st9;



$('#institute_idd').val($('#institute_id').val());
$('#course_idd').val($('#course_id').val());
$('#department_idd').val($('#department_id').val());
$('#datepicker11').val($('#datepicker1').val());

  //generate_student_id(student_id112);


}
});




$("#student_id11").keyup(function() {

var st1 = $('#student_id1').val();
var st2 = $('#student_id2').val();
var st3 = $('#student_id3').val();
var st4 = $('#student_id4').val();
var st5 = $('#student_id5').val();
var st6 = $('#student_id6').val();
var st7 = $('#student_id7').val();
var st8 = $('#student_id8').val();
var st9 = $('#student_id9').val();
var st10 = $('#student_id10').val();
var st11 = $('#student_id11').val();

// check Department
if(st1!='' && st2!='' && st3!='' && st4!='' && st5!='' && st6!='' && st7!='' && st8!='' && st9!='' && st10!='' && st11!=''){

  // check student id 
  var student_id112 = st1+''+st2+''+st3+''+st4+''+st5+''+st6+''+st7+''+st8+''+st9+''+st10+''+st11;

  check_student_id(student_id112);


}
});



</script>

<script>
  function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#show_profile_image').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

function signaturereadURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#show_student_signature').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#profile_image").change(function() {
  readURL(this);
});

$("#student_signature").change(function() {
  signaturereadURL(this);
});



$(".numberdot").keydown(function (event) {


        if (event.shiftKey == true) {
            event.preventDefault();
        }

        if ((event.keyCode >= 48 && event.keyCode <= 57) || 
            (event.keyCode >= 96 && event.keyCode <= 105) || 
            event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
            event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

        } else {
            event.preventDefault();
        }

        if($(this).val().indexOf('.') !== -1 && event.keyCode == 190){
          event.preventDefault();
        }             
        //if a decimal has been added, disable the "."-button
       
    });


function getVacatingYear() {
  var allotdate = $('#datepicker1').val(); 
  var course_year = $('#course_id :selected').attr('data-year');
  var vacYear = '';
  
  //console.log(allotdate);  
 // console.log(course_year);
  if((allotdate!='' && typeof allotdate != "undefined") && (course_year!='' && typeof course_year != "undefined")){
    var allotYear = allotdate.split('/');
    //console.log(allotYear[2]);
    var vacYear = parseInt(course_year) + parseInt(allotYear[2]);
  }
  $("#vacating_year").val(vacYear);
}
</script>


<style type="text/css">
  .error{
    color: red;
  }
  .stid {
    display: block;
    width: 7.5%;
    float: left;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

</style>