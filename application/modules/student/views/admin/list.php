<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php 
$search_url = base_url('admin-student-list');
?>
<div class="tab-pane fade show active" id="student-data" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Student Data</h4>
                  </div>
                  <div class="col-auto">
                          <label>Total Applications : <?php echo (!empty($all_tot_students)?count($all_tot_students):0); ?></label>
                  </div>
                  <div class="col-auto"> 
                          <label>New Applications: <?php echo (!empty($all_new_stutents)?count($all_new_stutents):0); ?></label>
                  </div>
                  <div class="col">
                  <a href="javascript:void(0)" onclick="approve_student();" class="btn btn-sm float-right btn-warning" style="margin-left: 5px;"><span>Approve</span></a>
                    <a href="javascript:void(0)" class="btn btn-secondary btn-sm float-right sdddd" data-toggle="modal" data-target="#add-student-data" style="margin-left: 15px;">Add</a>
                    <!-- <a href="#" class="btn btn-secondary btn-sm float-right">Download</a> -->
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="add-student-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-student'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
                        <input type="hidden" name="institute_idd" id="institute_idd" value="" />
                      <input type="hidden" name="course_idd" id="course_idd" value="" />
                      <input type="hidden" name="department_idd" id="department_idd" value="" />
                      <input type="hidden" name="datepicker11" id="datepicker11" value="" />
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-3">
                              <a href="#" class="img-profile" style="overflow: hidden" >
                                <img id="show_profile_image" src="<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg" alt="" class="img-thumbnail img-fluid">
                                <input type="file" class="edit-img-profile" style="display: block;" name="profile_image" id="profile_image" />
                              </a>
                              <br><br>
                              <h5>Upload Signature</h5>
                               <a href="#" class="img-profile" style="overflow: hidden" >
                                <img id="show_student_signature"  src="<?php echo base_url().'/assets/front/images/signature.png';?>" alt="" class="img-thumbnail img-fluid">
                                <input type="file" class="edit-img-profile" style="display: block;" name="student_signature" id="student_signature" />
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

                                    <input type="text" name="student_id10" class="stid1" id="student_id10" style="display: none;">
                                    <input type="text" name="student_id11" class="stid1" id="student_id11" style="display: none;">

                                    <input type="hidden" name="student_id" id="student_id" value=""> 
                                      <input type="hidden" name="student_id_unique" id="student_id_unique" value="" > 
                                     <span style="color: red;" class="student_id_unique_err"></span>
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
                              <div class="form-group  col-md-6">
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
                                     <?php 
                                    }
                                    }

                                    ?>
                                  </select>
                                </div>
                            </div>
                              
                              <div class="form-row">

                                <div class="form-group col-md-6">
                                  <label>Name of Bhavana (Institute)</label>
                                  <select class="custom-select" name="institute_id" id="institute_id" >
                                   <option selected value="">Choose Bhavana(Institute)</option>
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
                                  <select class="custom-select" name="course_id" id="course_id">
                                  
                                   
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
                                  <input class="form-control datepicker" name="date_of_allotment" id="datepicker1" placeholder="Select date">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Academic Month/Year</label>
                               

                                  <select class="custom-select col-md-5" name="academic_month" id="academic_month" >
                                     <option value="1">Jan</option>
                                     <option value="2">Feb</option>
                                     <option value="3">Mar</option>
                                     <option value="4">Apr</option>
                                     <option value="5">May</option>
                                     <option value="6">Jun</option>
                                     <option value="7">Jul</option>
                                     <option value="8">Aug</option>
                                     <option value="9">Sept</option>
                                     <option value="10">Oct</option>
                                     <option value="11">Nov</option>
                                     <option value="12">Dec</option>
                                  </select>

                                  <select class="custom-select col-md-5" name="academic_year" id="academic_year" >

                                     <option value="2016">2016</option>
                                     <option value="2017">2017</option>
                                     <option value="2018">2018</option>
                                     <option value="2019">2019</option>
                                     <option value="2020">2020</option>
                                     <option value="2020">2021</option>
                                     <option value="2020">2022</option>
                                     <option value="2020">2023</option>
                                  </select>
                                
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Vacating Month/Year</label>

                                    <select class="custom-select col-md-5" name="vacating_month" id="vacating_month" >
                                    <option value="1">Jan</option>
                                     <option value="2">Feb</option>
                                     <option value="3">Mar</option>
                                     <option value="4">Apr</option>
                                     <option value="5">May</option>
                                     <option value="6">Jun</option>
                                     <option value="7">Jul</option>
                                     <option value="8">Aug</option>
                                     <option value="9">Sept</option>
                                     <option value="10">Oct</option>
                                     <option value="11">Nov</option>
                                     <option value="12">Dec</option>
                                    </select>
                               
                                   <select class="custom-select col-md-5" name="vacating_year" id="vacating_year" >
                                     <!-- <option value="2016">2016</option>
                                     <option value="2017">2017</option> -->
                                     <option value="2018">2018</option>
                                     <option value="2019">2019</option>
                                     <option value="2020">2020</option>
                                     <option value="2021">2021</option>
                                     <option value="2022">2022</option>
                                     <option value="2023">2023</option>

                                  </select>
                                
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
                                  <label>Aadhar No/Voter Id/Any Address Proof</label>
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
                              <div class="form-group">
                                <label>PWD Status</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline1" name="pwd_status" class="custom-control-input" value="1">
                                  <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline2" name="pwd_status" class="custom-control-input" value="0">
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
                                  <option value="indian">Indian</option>
                                  <option value="saarc_country">Saarc Country</option>
                                  <option value="non_saarc_country">Non Saarc Country</option>
                                </select>
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
                      <span id="subject_message" style="color:red;display:none">Test</span>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="subject1" value="" placeholder="Enter Subject" >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added" name="score[]" id="score1" value="" placeholder="Enter Score" >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="subject2" value="" placeholder="Enter Subject" >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added" name="score[]" id="score2" value="" placeholder="Enter Score" >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="subject3" value="" placeholder="Enter Subject" >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added" name="score[]" id="score3" value="" placeholder="Enter Score" >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="subject4" value="" placeholder="Enter Subject" >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added" name="score[]" id="score4" value="" placeholder="Enter Score" >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="subject5" value="" placeholder="Enter Subject" >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added" name="score[]" id="score5" value="" placeholder="Enter Score" >
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


                                  <label><a style="color:green" href="#" onclick="javascript:distanceScoreDetails();">Distance Score Details</a></label>

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

                                <input type="button" class="btn btn-secondary btn-sm" onclick="javascript:closeScoreDetails();"  name="distancescore" id="distancescore" value="Close" />
                                 
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
                <hr>
                <div class="table-responsive">
                    <div class="asd" style="">
                      <form name="frm" id="frm" method="get" action="<?php echo $search_url; ?>">

                                      
                                          
                                          <div class="form-row">
                                              <div class="col-md-3">

                                                  <div class="form-group">
                                                   

                                                      <div class="">
                                                         <label>Bhavana </label>
                                                       <select class="custom-select" name="search_by_bhavan" id="search_by_bhavan">
                                                        <option value="" selected>Choose Bhavana...</option>

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
                                                          <option <?php if((isset($_GET['search_nationality_type']) && $_GET['search_nationality_type'] == 'saarc_country' )){ echo "selected";} ?> value="foreign_shark">Saarc Country</option>
                                                          <option <?php if((isset($_GET['search_nationality_type']) && $_GET['search_nationality_type'] == 'non_saarc_country' )){ echo "selected";} ?> value="non_foreign_shark">Non Saarc Country</option>
                                                        </select>
                                                       
                                                      </div>
                                                </div>

                                          </div>

                                          <div  class="col-md-3">
                                             
                                                 <div class="form-group">
                                                  <label>Allotment</label>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="customRadioInline22" name="allotment_type_search" class="custom-control-input" <?php if((isset($_GET['allotment_type_search']) && $_GET['allotment_type_search'] == 'new_applied' )){ echo "checked";} ?> value="new_applied">
                                                      <label class="custom-control-label" for="customRadioInline22">New Applied </label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="customRadioInline23" name="allotment_type_search" class="custom-control-input" <?php if((isset($_GET['allotment_type_search']) && $_GET['allotment_type_search'] == 'already_alloted' )){ echo "checked";} ?> value="already_alloted">
                                                      <label class="custom-control-label" for="customRadioInline23">Alloted</label>
                                                    </div>
                                                </div>

                                           
                                          </div>




                                          </div>

                                        <!--    <div class="form-row">
                                             
                                              <div  class="col-md-4">
                                                <div class="form-group">
                                                  <label>Allotment</label><br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="customRadioInline22" name="allotment_type_search" class="custom-control-input" <?php if((isset($_GET['search_by_allotment']) && $_GET['search_by_allotment'] == 'new_applied' )){ echo "checked";} ?> value="new_applied">
                                                      <label class="custom-control-label" for="customRadioInline22">New Applied </label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="customRadioInline23" name="allotment_type_search" class="custom-control-input" <?php if((isset($_GET['search_by_allotment']) && $_GET['search_by_allotment'] == 'already_alloted' )){ echo "checked";} ?> value="already_alloted">
                                                      <label class="custom-control-label" for="customRadioInline23">Alloted</label>
                                                    </div>
                                                </div>

                                            </div>

                                          </div>
                                         -->
                                          <!-- <button class="btn btn-secondary btn-sm" id="query" >Search</button> -->
                      </form>
                  </div>


  <hr>



                <table id="example1" class="table table-striped" style="font-size: 14px;">
                  <thead>
                    <tr>
                      <th scope="col"><input onclick="CheckAllChk(this);" name="test" type="checkbox" value="all">Sl No</th>
                      <th scope="col">Student Id</th>
                      <th scope="col">Photo</th>
                      <th scope="col">Name</th>
                     <!--  <th scope="col">Address</th> -->
                      <th scope="col">Student Signature</th>
                      <th scope="col">Department</th>
                      <th scope="col">Course</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Allotment Year</th>
                      <th scope="col">Vacating Year</th>
                      <th scope="col">Final Score</th>
                      <th scope="col">Rank</th>
                      <th scope="col">Approval Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($all_data)){
                        $i =1;
                        foreach($all_data as $student)
                        { ?>

                           <tr>
                              <th scope="row">
                              <?php if($student->is_approved == '0'){ ?>
                              <input class="checkBoxClass" name="btSelectItem" type="checkbox" value="<?php echo $student->id; ?>">
                              <?php } ?>

                              <?php echo $i; ?>
                              </th>
                              <td><?php echo $student->student_id; ?></td>
                              <td>
                                <?php

                                 $image_url = '';
                                 if($student->profile_image)
                                 {
                                   $image_url = base_url().'assets/student_pics/'.$student->profile_image;
                                 }
                                 else{

                                   $image_url = base_url().'assets/front/images/blank-profile-pic.jpg';
                                 }

                                ?>
                                <img src="<?php echo $image_url; ?>" alt="" width="50px" style="border: 3px solid #fff">
                               
                              </td>

                              <td><?php echo $student->full_name; ?></td>
                             <!--  <td>
                               
                                <?php if(!empty($student->address)){ ?>
                                <p title="<?php echo $student->address; ?>">
                                  Address: <?php //echo $student->address; ?>
                                  <?php echo substr($student->address, 0, 20); ?>
                                </p>
                                <?php } ?>
                             
                                <?php if(!empty($student->contact_no)){ ?>
                                <p>
                                  Phone: <a href="tel:<?php echo $student->contact_no; ?>"><?php echo $student->contact_no; ?></a>
                                </p>
                                <?php } ?>
                              </td> -->
                              <td>
                                <?php

                                 $signature_url = '';
                                 if($student->student_signature)
                                 {
                                   $signature_url = base_url().'assets/student_signature/'.$student->student_signature;

                                   ?>
                                    <img src="<?php echo $signature_url; ?>" alt="" width="50px" style="border: 3px solid #fff">
                                    <?php
                                 }
                                 else{

                                  echo '-';
                                   //$signature_url = base_url().'assets/front/images/blank-profile-pic.jpg';
                                 }

                                ?>
                               
                               
                              </td>

                              <td><?php echo ucfirst($student->department_name); ?></td>
                              <td><?php echo ucfirst($student->course_name); ?></td>
                              <td><?php echo ucfirst($student->gender); ?></td>
                              <td><?php echo ucfirst($student->academic_year); ?></td>
                              <td><?php echo ucfirst($student->vacating_year); ?></td>
                              <td><?php echo ucfirst($student->final_score); ?></td>
                              <td><?php echo ucfirst($student->rank); ?></td>
                              <td>

                                <?php if($student->is_released == '0'){?>
                                 <?php if($student->is_approved == '1'){ ?>

                                     <a onclick="edit_approve('<?php echo $student->id; ?>');" name="edit_approve" tooltip="Read" class="edit_approve btn btn-secondary btn-sm" ad_id="<?php echo $student->id; ?>" >Approved</a>

                                    
                                 <?php }else{ ?>

                                     <a onclick="edit_approve('<?php echo $student->id; ?>');" name="edit_approve" tooltip="Not Read" class="edit_approve btn btn-danger btn-secondary btn-sm" ad_id="<?php echo $student->id; ?>" >Not Approved</a>

                                 <?php } ?>
                                 <?php } ?>
                                 <br>
                                 <br>
                                 <?php if($student->is_cancelled == '1'){ ?>

                                     <a name="edit_cancel" tooltip="Cancelled" class="edit_cancel btn btn-warning btn-sm" ad_id="<?php echo $student->id; ?>" >Cancelled</a>

                                    
                                 <?php } ?>

                                 <br>
                                 <br>
                                  <?php if($student->is_released == '1'){ ?>

                                     <a name="edit_release" tooltip="Released" class="edit_released btn btn-danger btn-sm" ad_id="<?php echo $student->id; ?>" >Released</a>

                                    
                                  <?php } ?>
                                 
                                    
                                </td>
                              <td> 

                                <a href="#" name="edit_student" title="Edit" class="edit_button1" ad_id="<?php echo $student->id; ?>" data-toggle="modal" data-target="#edit-student-data"><i class="far fa-edit"></i></a>

                                <a href="#" name="delete_ad"  title="Delete" class="delete_button" ad_id="<?php echo $student->id; ?>" data-toggle="modal" data-target="#delete-admin-data"><i class="fa fa-trash"></i></a>

                               <!--  <a href="#" class="btn btn-secondary btn-sm " data-toggle="modal" data-target="#add-student-data">Edit</a> -->
                                <!-- <a href="#" class="btn btn-secondary btn-sm " >Delete</a> -->
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
                <div class="modal fade" id="edit-student-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-student'); ?>" name="add-form" id="editform" enctype="multipart/form-data"> 
                        <input type="hidden" name="edit_id" id="edit_id" value="" />

                        <input type="hidden" name="stu_id" id="stu_id" value="" />


                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-3">
                              <a href="#" class="img-profile" style="overflow: hidden">
                                <img id="edit_profile_image" src="<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg" alt="" class="img-thumbnail img-fluid">
                                <span class="edit-img-profile" style="display: block;">Edit Profile Image</span>
                                <input type="file" class="edit-img-profile" style="display: block;" name="profile_image" id="profile_image1" />
                              </a>

                              <br><br>

                              <a href="#" class="img-profile" style="overflow: hidden">
                                <img id="student_signature_image" src="" alt="" class="img-thumbnail img-fluid">
                                <span class="edit-img-profile" style="display: block;">Edit Signature</span>
                                <input type="file" class="edit-img-profile" style="display: block;" name="student_signature" id="student_signature1" />
                              </a>

                            </div>
                            <div class="col-md-9">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Student Id</label>
                                  <input  type="text" class="form-control" name="student_id" id="edit_student_id" placeholder="Enter Student Id." value="" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Full Name</label>
                                  <input type="text" class="form-control" name="full_name" id="edit_full_name" placeholder="Enter Full Name" value="">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Contact No.</label>
                                  <input type="text" class="form-control" name="contact_no" id="edit_contact_no" placeholder="Enter Contact No." value="">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Email Id</label>
                                  <input type="text" class="form-control" name="email_id" id="edit_email_id" placeholder="Enter email id" value="">
                                </div>
                              </div>
                            
                             <div class="form-row">
                                <div class="form-group col-md-6">
                                <label>Sex</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline10" name="gender" class="edit_gender custom-control-input" value="male">
                                  <label class="custom-control-label" for="customRadioInline10">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline11" name="gender" class="edit_gender custom-control-input" value="female">
                                  <label class="custom-control-label" for="customRadioInline11">Female</label>
                                </div>
                              </div>

                             <!--  <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Blood Group</label>
                                  <input type="text" name="blood_group" id="edit_blood_group" class="form-control" placeholder="Enter blood group">
                                </div>
                              </div>
 -->
                             
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
                                  <input type="text" class="form-control" name="hostel_name" id="edit_hostel_name" placeholder="Enter hostel name" value="">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Hostel Code</label>
                                  <input type="text" class="form-control" name="hostel_code" id="edit_hostel_code" placeholder="Enter hostel code" value="">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Room No.</label>
                                  <input type="text" class="form-control" name="room_no" id="edit_room_no" placeholder="Enter room no." value="">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Hostel Wing/Block</label>
                                  <input type="text" class="form-control" name="hostel_wing" id="edit_hostel_wing" placeholder="Enter hostel wing/block" value="">
                                </div>
                              </div> -->
                              <div class="form-row">
                                   <div class="form-group col-md-6">
                                  <label>Name of Bhavana (Institute)</label>
                                  <select class="custom-select" name="institute_id" id="edit_institute_id" disabled>
                                     <option selected>Choose Bhavana(Institute)</option>
                                    <?php

                                    if($all_institutes){
                                      foreach($all_institutes as $institute)
                                      {
                                        ?>
                                        <option value="<?php echo $institute->id; ?>"><?php echo $institute->institute_name; ?></option>
                                    <?php  }

                                    }
                                     ?>

                                  </select>
                                </div>
                                <div class="form-group col-md-6">

                               
                                  <label>Course Type</label>
                                  <select class="custom-select" name="course_id" id="edit_course_id" disabled>
                                    
                                    <?php

                                    if(!empty($all_courses))
                                    {
                                      foreach($all_courses as $course)
                                      { ?>

                                        <option  value="<?php echo $course->id; ?>"><?php echo $course->course_name; ?></option>


                                     <?php }
                                    }

                                    ?>

                                  </select>
                                </div>
                                
                              </div>
                              <div class="form-row">

                                <div class="form-group col-md-6">
                                  <label>Name of Department</label>
                                  <select class="custom-select" name="department_id" id="edit_department_id" disabled>
                                    
                                    <?php

                                    if($all_departments){
                                      foreach($all_departments as $department)
                                      {
                                        ?>
                                        <option value="<?php echo $department->id; ?>"><?php echo $department->department_name; ?></option>
                                    <?php  }

                                    }
                                     ?>
                                  </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                  <label>Date of Admission/Allotment</label>
                                  <input class="form-control datepicker" name="date_of_allotment" id="edit_date_of_allotment" placeholder="Select date" disabled>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Academic Month/Year</label>

                                    <select class="custom-select col-md-5" name="academic_month" id="edit_academic_month" >
                                     <option value="1">Jan</option>
                                     <option value="2">Feb</option>
                                     <option value="3">Mar</option>
                                     <option value="4">Apr</option>
                                     <option value="5">May</option>
                                     <option value="6">Jun</option>
                                     <option value="7">Jul</option>
                                     <option value="8">Aug</option>
                                     <option value="9">Sept</option>
                                     <option value="10">Oct</option>
                                     <option value="11">Nov</option>
                                     <option value="12">Dec</option>
                                  </select>

                                   <select class="custom-select col-md-5" name="academic_year" id="edit_academic_year" disabled >
                                     <option value="2016">2016</option>
                                     <option value="2017">2017</option>
                                     <option value="2018">2018</option>
                                     <option value="2019">2019</option>
                                     <option value="2020">2020</option>
                                     <option value="2020">2021</option>
                                     <option value="2020">2022</option>
                                     <option value="2020">2023</option>
                                  </select>
                                
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Vacating Month/Year</label>

                                  <select class="custom-select col-md-5" name="vacating_month" id="edit_vacating_month" >
                                     <option value="1">Jan</option>
                                     <option value="2">Feb</option>
                                     <option value="3">Mar</option>
                                     <option value="4">Apr</option>
                                     <option value="5">May</option>
                                     <option value="6">Jun</option>
                                     <option value="7">Jul</option>
                                     <option value="8">Aug</option>
                                     <option value="9">Sept</option>
                                     <option value="10">Oct</option>
                                     <option value="11">Nov</option>
                                     <option value="12">Dec</option>
                            </select>

                                    <select class="custom-select col-md-5" name="vacating_year" id="edit_vacating_year" >
                                     <option value="2018">2018</option>
                                     <option value="2019">2019</option>
                                     <option value="2020">2020</option>
                                     <option value="2021">2021</option>
                                     <option value="2022">2022</option>
                                     <option value="2023">2023</option>
                                  </select>
                                
                                 
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>VB Registration Id</label>
                                  <input type="text" name="vb_reg_id" id="edit_vb_reg_id" class="form-control" placeholder="Enter VB registration Id">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Date of Birth</label>
                                  <input class="form-control datepicker" name="date_of_birth" id="edit_date_of_birth" placeholder="Select date">
                                </div>
                            
                              </div>

                             <!--  <div class="form-group">
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
                              </div>

                               <div class="form-group">
                                
                                   <img id="edit_identity_document_file" src="" alt="" >
                                   <input type="hidden" name="identification_card" id="identification_card" value="">
                                 
                              </div> -->
                              
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Aadhar No/Voter Id/Any Address Proof</label>
                                  <input type="text" class="form-control" name="aadhar_card_no" id="edit_aadhar_card_no" placeholder="Enter Aadhar card no.">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>State</label>
                                  <select class="custom-select" name="state_id" id="edit_state_id" >
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
                                <input type="text" name="address" id="edit_address" class="form-control" placeholder="Enter address">
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>City</label>
                                  <input type="text" name="city" id="edit_city" class="form-control" placeholder="Enter city name">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Pin Code.</label>
                                  <input type="text" name="pincode" id="edit_pincode" class="form-control" placeholder="Enter pin code">
                                  <span style="font-size: 10px;" >Example - 700104 </span>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Guardian Name</label>
                                  <input type="text" class="form-control" name="guardian_name" id="edit_guardian_name" placeholder="Enter Guardian name">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Relation with Guardian</label>
                                  <select class="custom-select" name="relation_with_guardian" id="edit_relation_with_guardian">
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
                                  <input type="text" class="form-control" name="guardian_contact_no" id="edit_guardian_contact_no" placeholder="Enter Guardian contact no.">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Guardian Email Id</label>
                                  <input type="text" class="form-control" name="guardian_email_id" id="edit_guardian_email_id"  placeholder="Enter Guardian email id">
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Guardian Address</label>
                                <input type="text" class="form-control" name="guardian_address" id="edit_guardian_address" placeholder="Enter Guardian address">
                              </div>
                              <div class="form-group">
                                <label>PWD Status</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline12" name="pwd_status" class="edit_pwd custom-control-input" value="1">
                                  <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline13" name="pwd_status" class="edit_pwd custom-control-input" value="0">
                                  <label class="custom-control-label" for="customRadioInline2">No</label>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Status Category</label>
                                <select class="custom-select" name="physically_challenged" id="edit_physically_challenged">
                                  <!-- <option selected>Choose...</option> -->
                                  <option value="blind">Blind</option>
                                  <option value="orthopedic">Orthopedic</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Caste</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="caste_type_1" name="caste_type" class="edit_caste custom-control-input" value="general">
                                  <label class="custom-control-label" for="customRadioInline3">GEN</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="caste_type_2" name="caste_type" class="edit_caste custom-control-input" value="SC">
                                  <label class="custom-control-label" for="customRadioInline4">SC</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="caste_type_3" name="caste_type" class="edit_caste custom-control-input" value="ST">
                                  <label class="custom-control-label" for="customRadioInline13">ST</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="caste_type_4" name="caste_type" class="edit_caste custom-control-input" value="OBC">
                                  <label class="custom-control-label" for="customRadioInline14">OBC</label>
                                </div>
                              </div>

                             <!--  <div class="form-group">
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
                              </div>

                               <div class="form-group">
                                
                                   <img id="edit_other_caste_document" src="" alt="" >
                                    <input type="hidden" name="other_caste_card" id="other_caste_card" value="">

                                 
                              </div> -->


                              <div class="form-group">
                                <label>Nationality</label>
                                <select class="custom-select" name="nationality_type" id="edit_nationality_type">
                                  <!-- <option selected>Choose...</option> -->
                                  
                                  <option value="indian">Indian</option>
                                  <option value="saarc_country">Saarc Country</option>
                                  <option value="non_saarc_country">Non Saarc Country</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Renewal Option</label><br>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline17" name="renewal_option" value="1" onclick="javascript:editrenewalCheck();" class="custom-control-input renewal_option">
                                    <label class="custom-control-label" for="customRadioInline17">Yes</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="edit_customRadioInline18" name="renewal_option" value="0" onclick="javascript:editrenewalCheck();" class="custom-control-input renewal_option">
                                    <label class="custom-control-label" for="customRadioInline18">No</label>
                                  </div>
                              </div>

                              <div id="edit_renewal_check" style="display:none">
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label>Enter Student Id</label>
                                              <input type="text" class="form-control" name="renewal_student_id" id="edit_renewal_student_id" value="" placeholder="Enter Student Id" >


                                      <span id="edit_renewal_msg" style="color:red;display:none"></span>
                                            
                                    </div>
                                    
                                  </div>

                                  <div class="form-row">
                                    <div class="form-group col-md-6">

                                      <input type="button" class="btn btn-danger"  name="check_student_exist" id="edit_check_student_exist" value="Check" />

                                    </div>
                                    
                                  </div>

                              </div>


                      <div class="form-group">
                        <label>Obtain Marks Type</label><br>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" onclick="javascript:edityesnoCheck();" id="customRadioInline19" name="obtain_marks_type" class="custom-control-input obtain_marks_type " value="1" disabled>
                            <label class="custom-control-label" for="customRadioInline19">CGPA</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" onclick="javascript:edityesnoCheck();" id="customRadioInline20" name="obtain_marks_type" class="custom-control-input obtain_marks_type" value="0" disabled>
                            <label class="custom-control-label" for="customRadioInline20">Best Of 5</label>
                          </div>
                      </div>


                      <div id="edit_div_for_best_of_5" style="display:none">
                      <span id="edit_subject_message" style="color:red;display:none">Test</span>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="edit_subject1" value="" placeholder="Enter Subject" readonly >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added" name="score[]" id="edit_score1" value="" placeholder="Enter Score" readonly >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="edit_subject2" value="" placeholder="Enter Subject" readonly >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added" name="score[]" id="edit_score2" value="" placeholder="Enter Score" readonly >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="edit_subject3" value="" placeholder="Enter Subject" readonly >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added" name="score[]" id="edit_score3" value="" placeholder="Enter Score" readonly >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="edit_subject4" value="" placeholder="Enter Subject" readonly >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added" name="score[]" id="edit_score4" value="" placeholder="Enter Score" readonly >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Subject</label>
                                  <input type="text" class="form-control subjects_added" name="subject[]" id="edit_subject5" value="" placeholder="Enter Subject" readonly >
                        </div>
                        <div class="form-group col-md-3">
                           <label>Score <span id="tool_tip_info"></span></label>
                           <input type="text" class="form-control scores_added" name="score[]" id="edit_score5" value="" placeholder="Enter Score" readonly >
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">

                          <input type="button" disabled class="btn btn-danger"  name="add_subject" id="edit_add_subject" value="Calculate Score" />
                           
                        </div>
                        
                      </div>

                      </div>



                               <div class="form-row">
                                

                                 <div class="form-group col-md-6">
                                  <label>Distance Score (10 Point Scale)</label>
                                  <input type="text" class="form-control" name="distance_score" id="edit_distance_score" value="" placeholder="Enter distance score (10 Point Scale)" readonly>


                                    <label><a style="color:green" href="#" onclick="javascript:editdistanceScoreDetails();">Distance Score Details</a></label>

                        <div id="edit_distance_score_details" style="display:none">


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

                                <input type="button" class="btn btn-secondary btn-sm" onclick="javascript:editcloseScoreDetails();"  name="distancescore" id="distancescore" value="Close" />
                                 
                              </div>
                              
                            </div>

                      </div>
                                </div>
                                        
                                <div class="form-group col-md-6">
                                  <label>Distance in Km <span id="tool_tip_info"></span></label>
                                  <input type="text" class="form-control" name="distance_frm" id="edit_distance_frm" value="" placeholder="Enter distance from santiniketan" readonly>
                                </div>
                              </div>
                              <div class="form-row">
                               
                               <div class="form-group col-md-6">
                                  <label>Last Final Exam Score (10 Point Scale)</label>
                                  <input type="text" class="form-control" name="last_final_exam_score" id="edit_last_final_exam_score" value="" placeholder="Enter last final exam score (10 Point Scale)">
                                 
                                </div>

                                <div class="form-group col-md-6">
                                  <label>Final Score (10 Point Scale)</label>
                                  <input type="text" class="form-control" name="final_score" id="edit_final_exam_score" value="" placeholder="Final Exam Score" disabled>
                                 
                                </div>
                              </div>

                             



                              <!-- <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Last Final Exam Score (10 Point Scale)</label>
                                  <select class="custom-select" name="last_final_exam_score" id="last_final_exam_score">
                             
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Distance from Santiniketan<span id="edit_tool_tip_info"></span></label>
                                  <input type="text" class="form-control" name="distance_frm" id="edit_distance_frm" value="" placeholder="Enter distance from santiniketan">
                                </div>
                              </div> -->
                             <!--  <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Distance Score (10 Point Scale)</label>
                                  <select class="custom-select" name="distance_score" id="distance_score">
                                    
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Final Score (10 Point Scale)</label>
                                  <select class="custom-select" name="final_score" id="final_score">
                                    
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                  </select>
                                </div>
                              </div> -->
                             <!--  <div class="form-group">
                                <label>Every Semester CGPA (Update)</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                  </div>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="cgpa_score" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                  </div>
                                </div>
                              </div> -->

                             <!--  <div class="form-group">
                                
                                  <img id="edit_cgpa_score" height="500px" width="500" src="" alt="" >
                                  <input type="hidden" name="cgpa_score_card" id="cgpa_score_card" value="">
                                 
                              </div> -->

                        
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <input type="hidden" name="student_id" id="student_id" value="">
                          <input type="hidden" name="student_profile_image" id="student_profile_image" value="">

                          <input type="hidden" name="student_signature_image" id="student_signature_image1" value="">


                          <input type="submit" name="edit_student" id="edit_student" class="btn btn-danger" value="Save" />
                          <!-- <button type="button" class="btn btn-danger">Add Student</button> -->
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


                   <div class="modal fade" id="delete-admin-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                   <form novalidate method="post" action="<?php echo base_url('admin-delete-student'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 

                   
                        <div class="modal-body">
                          <div class="row">

                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Do you want to delete this data ?</label>
                                  
                                </div>
                              </div>
                             
                            
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                         
                          <input type="hidden" name="del_ad_id" id="del_ad_id" value="">
                          <input type="submit" name="delete_ad" id="delete_ad" class="btn btn-danger" value="Confirm" />
                         
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="clearfix"></div>
                <!--<hr>
                 <nav class="float-right">
                  <ul class="pagination pagination-sm">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav> 
                <div class="clearfix"></div>-->
              </div>

<script>

jQuery.validator.addMethod("phoneno", function(phone_number, element) {
          phone_number = phone_number.replace(/\s+/g, "");
          return this.optional(element) || phone_number.length > 9 && 
          phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
}, "<br />Please specify a valid phone number..!!");

</script>




<script type="text/javascript">

function distanceScoreDetails() {
    
        $("#distance_score_details").css("display", "block");

}

</script>

<script type="text/javascript">

function editdistanceScoreDetails() {
    
        $("#edit_distance_score_details").css("display", "block");

}

</script>

<script type="text/javascript">

function closeScoreDetails() {
    
        $("#distance_score_details").css("display", "none");

}

</script>

<script type="text/javascript">

function editcloseScoreDetails() {
    
        $("#edit_distance_score_details").css("display", "none");

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
    }
    

}

</script>

<script type="text/javascript">

function edityesnoCheck() {

    var student_id = $("#stu_id").val();

     $.ajax({ 
          type: 'POST',
          url: "<?php echo base_url('get-student-subject-details');?>",
          data: {  "student_id": student_id},
          dataType: "text",
          success: function(resultData) { 

            resultData = jQuery.parseJSON(resultData);

            $("#edit_subject1").val(resultData[0].subject);
            $("#edit_score1").val(resultData[0].score);

            $("#edit_subject2").val(resultData[1].subject);
            $("#edit_score2").val(resultData[1].score);

            $("#edit_subject3").val(resultData[2].subject);
            $("#edit_score3").val(resultData[2].score);

            $("#edit_subject4").val(resultData[3].subject);
            $("#edit_score4").val(resultData[3].score);

            $("#edit_subject5").val(resultData[4].subject);
            $("#edit_score5").val(resultData[4].score);

          }                
        });




    if (document.getElementById('customRadioInline20').checked) {
       
        $("#edit_div_for_best_of_5").css("display", "block");
        $('#edit_last_final_exam_score').prop('readonly', true);
    }
  

    if (document.getElementById('customRadioInline19').checked) {
       
        $("#edit_div_for_best_of_5").css("display", "none");
        $('#edit_last_final_exam_score').prop('readonly', false);
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

<script type="text/javascript">

function editrenewalCheck() {
    if (document.getElementById('customRadioInline17').checked) {
        $("#edit_renewal_check").css("display", "block");
        $("#edit_renewal_msg").css("display", "none");
        
    }
  

    if (document.getElementById('customRadioInline18').checked) {
        
        $("#edit_renewal_check").css("display", "none");
        $("#edit_renewal_msg").css("display", "none");
    }
    

}

</script>

<script type="text/javascript">
$( ".sdddd" ).click(function() {
    $("#addform")[0].reset();
    });

</script>

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

jQuery.validator.addMethod("pincodecheck", function(pincode, element) {
          pincode = pincode.replace(/\s+/g, "");
          return this.optional(element) || pincode.length == 6 && 
          pincode.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
}, "<br />Please specify a valid 6 digit Pincode..!!");

</script>

<script>
    $("document").ready(function(){

            $("#addform").validate({
               rules:{
                  sl_no:{
                    "required":true,
                   /* remote: {
                      url:"<?php //echo base_url('admin-check-email');?>",
                      type: "post",
                      data: {
                        field:"sl_no",
                        value: function() {
                          return $( "#sl_no" ).val();
                        }
                      }
                  }*/
                  },
                   student_id_unique:{
                    "required":true
                  },
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
                      url:"<?php echo base_url('admin-check-email');?>",
                      type: "post",
                      data: {
                        field:"email_id",
                        value: function() {
                          return $( "#email_id" ).val();
                        }
                      }
                  }
                  },
                  university_id:{
                    "required":true
                  },
                  hostel_id:{
                    "required":true
                  },
                  gender:{
                    "required":true
                  },
                  hostel_name:{
                    "required":true
                  },
                  hostel_code:{
                    "required":true
                  },
                  room_no:{
                    "required":true
                  },
                  hostel_wing:{
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
                  academic_year:{
                    "required":true
                  },
                  vacating_year:{
                    "required":true
                  },
                  /*vb_reg_id:{
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
                  obtain_marks_type:{
                    "required":true
                  },
                  pincode:{
                    "required":true,
                    "pincodecheck":true
                  }
                },
               messages:{
                sl_no:{
                  "required":"Please Enter Sl No..!!",
                  "remote":"Sl No Already Exists"
                },
                student_id_unique:{
                  "required":"Please enter your Student Id last two digits"
                },
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
                university_id:{
                  "required":"Please Enter University Id..!!"
                },
                gender:{
                    "required":"Please Select Gender..!!"
                },
                hostel_name:{
                    "required":"Please Select Hostel Name..!!"
                },
                hostel_code:{
                    "required":"Please Select Hostel Code..!!"
                },
                room_no:{
                    "required":"Please Select Room No..!!"
                },
                hostel_wing:{
                    "required":"Please Select Hostel Wing..!!"
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
                academic_year:{
                    "required":"Please Select Academic Year..!!"
                },
                vacating_year:{
                    "required":"Please Select Vacating Year..!!"
                },
              /*  vb_reg_id:{
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
                obtain_marks_type:{
                    "required":"Please Select Obtain Marks Type..!!"
                },
                pincode:{
                    "required":"Please Select Pincode..!!"
                }
              }

              // errorPlacement: function(error, element) {
              //   if(element.attr("name") == "gender") {
              //     error.insertAfter( ".radio" );
              //   } else {
              //     error.insertAfter(element);
              //   }
              // }


            });

          });
        </script>


        <script>
    $("document").ready(function(){

            $("#editform").validate({
                rules:{
                  sl_no:{
                    "required":true
                  },
                  full_name:{
                    "required":true
                  },
                  contact_no:{
                    "required":true
                  },
                  email_id:{
                    "required": true,
                  },
                  university_id:{
                    "required":true
                  },
                  pincode:{
                    "required":true,
                    "pincodecheck":true
                  }
               },
               messages:{
                sl_no:{
                  "required":"Please Enter Sl No..!!"
                },
                full_name:{
                  "required":"Please Enter Full Name..!!"
                },
                contact_no:{
                  "required":"Please Enter Contact No..!!"
                },
                email_id:{
                  "required":"Please Enter Email Id..!!"
                },
                university_id:{
                  "required":"Please Enter University Id..!!"
                },
                pincode:{
                    "required":"Please Select Pincode..!!"
                }
              }

            });

});
</script>


<script>


  function generate_student_id(student_id)
  {
    $(".student_id_unique_err").html('');
      var saveData1 = $.ajax({ 
            type: 'POST',
            url: "<?php echo base_url('generate-student-id');?>",
            data: {"student_id":student_id},
            dataType: "text",
            success: function(resultData) { 
             // console.log(resultData);
              $('#student_id10').show();
              $('#student_id11').show();
              var ssp = resultData.split('');
              $('#student_id10').val(ssp[0]);
              $('#student_id11').val(ssp[1]);  

              $('#student_id10').prop('disabled',true);
              $('#student_id11').prop('disabled',true);


              $('#student_id').val(student_id);
              $('#student_id_unique').val(resultData);
            }                
        });
  }


  $("document").ready(function(){

    $("#institute_id").change(function() {
      $( 'select[name="course_id"]' ).html( '' );
      $( 'select[name="department_id"]' ).html( '' );

        var institute_id = $('option:selected', this).val();
        var institute_code = $('option:selected', this).data('code');

        var formattedNumber = ("0" + institute_code).slice(-2);
        var formattedNumber1 = formattedNumber.split('');

        $('#student_id1').val(formattedNumber1[0]);
        $('#student_id2').val(formattedNumber1[1]);

        $("#student_id1").prop('disabled', true);
        $("#student_id2").prop('disabled', true);
        $("#student_id3").prop('disabled', true);
        $("#student_id4").prop('disabled', true);
        $("#student_id5").prop('disabled', true);
        $("#student_id6").prop('disabled', true);
        $("#student_id7").prop('disabled', true);
        $("#student_id8").prop('disabled', true);
        $("#student_id9").prop('disabled', true);

        $("#student_id10").prop('disabled', true);
        $("#student_id11").prop('disabled', true);

        checkalldata();
        var saveData1 = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('get-course-list');?>",
                    data: {  "institute_id": institute_id},
                    dataType: "text",
                    success: function(resultData) { 

                      resultData = jQuery.parseJSON(resultData);
                      var optionsAsString = "<option value=''> Select Course </option>";
                      for(var i = 0; i < resultData.length; i++) {

                        optionsAsString += "<option value='" + resultData[i].id + "' data-code='" + resultData[i].course_code + "'>" + resultData[i].course_name + "</option>";
                      }
                      $( 'select[name="course_id"]' ).html( optionsAsString );

                    }                
        });

    });

    $("#course_id").change(function() {
      $( 'select[name="department_id"]' ).html( '' );


        var institute_id  = $('#institute_id').val();
        var course_id     = $('option:selected', this).val();

        var course_code = $('option:selected', this).data('code');
        var formattedNumber = ("0" + course_code).slice(-2);
        var formattedNumber1 = formattedNumber.split('');

        $('#student_id3').val(formattedNumber1[0]);
        $('#student_id4').val(formattedNumber1[1]);

        $("#student_id1").prop('disabled', true);
        $("#student_id2").prop('disabled', true);
        $("#student_id3").prop('disabled', true);
        $("#student_id4").prop('disabled', true);
        $("#student_id5").prop('disabled', true);
        $("#student_id6").prop('disabled', true);
        $("#student_id7").prop('disabled', true);
        $("#student_id8").prop('disabled', true);
        $("#student_id9").prop('disabled', true);

        $("#student_id10").prop('disabled', true);
        $("#student_id11").prop('disabled', true);


        checkalldata();
        var saveData1     = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('get-subject-list');?>",
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

        var formattedNumber = ("0" + department_code).slice(-3);
        var formattedNumber1 = formattedNumber.split('');

        $('#student_id5').val(formattedNumber1[0]);
        $('#student_id6').val(formattedNumber1[1]);
        $('#student_id7').val(formattedNumber1[2]);

         $("#student_id1").prop('disabled', true);
        $("#student_id2").prop('disabled', true);
        $("#student_id3").prop('disabled', true);
        $("#student_id4").prop('disabled', true);
        $("#student_id5").prop('disabled', true);
        $("#student_id6").prop('disabled', true);
        $("#student_id7").prop('disabled', true);
        $("#student_id8").prop('disabled', true);
        $("#student_id9").prop('disabled', true);

        $("#student_id10").prop('disabled', true);
        $("#student_id11").prop('disabled', true);

        checkalldata();

    });


    $('input[name="date_of_allotment"]').change(function() {
      //console.log($(this).val());
      var formattedNumber = $(this).val();
         var formattedNumber1 = formattedNumber.split('/');
         //console.log(formattedNumber1);
         var formattedNumber2 = formattedNumber1[2].split('');
         //console.log(formattedNumber2);
        $('#student_id8').val(formattedNumber2[2]);
        $('#student_id9').val(formattedNumber2[3]);

         $("#student_id1").prop('disabled', true);
        $("#student_id2").prop('disabled', true);
        $("#student_id3").prop('disabled', true);
        $("#student_id4").prop('disabled', true);
        $("#student_id5").prop('disabled', true);
        $("#student_id6").prop('disabled', true);
        $("#student_id7").prop('disabled', true);
        $("#student_id8").prop('disabled', true);
        $("#student_id9").prop('disabled', true);

        $("#student_id10").prop('disabled', true);
        $("#student_id11").prop('disabled', true);

               checkalldata();   
    });
    /*****************************************/


  $('#academic_year').change(function(){

    var academic_year = $('#academic_year').val();
    var vacating_year = parseInt(academic_year)+ 3;
    $("#vacating_year > [value=" + vacating_year + "]").attr("selected", "true");

   });

  $('#edit_academic_year').change(function(){

    var academic_year = $('#edit_academic_year').val();
    var vacating_year = parseInt(academic_year)+ 3;
    $("#edit_vacating_year > [value=" + vacating_year + "]").attr("selected", "true");

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

        var subject1    = $('#subject1').val();
        var subject2    = $('#subject2').val();
        var subject3    = $('#subject3').val();
        var subject4    = $('#subject4').val();
        var subject5    = $('#subject5').val();


        var score1    = $('#score1').val();
        var score2    = $('#score2').val();
        var score3    = $('#score3').val();
        var score4    = $('#score4').val();
        var score5    = $('#score5').val();

        

        if(subject1 == '' && score1 == ''){
              $("#subject_message").css("display", "block");
              $('#subject_message').html('Please fill all the fields');
              setTimeout(function(){ $("#subject_message").css("display", "none"); }, 3000);
        }

        if(subject2 == '' && score2 == ''){
              $("#subject_message").css("display", "block");
              $('#subject_message').html('Please fill all the fields');
              setTimeout(function(){ $("#subject_message").css("display", "none"); }, 3000);
        }

        if(subject3 == '' && score3 == ''){
              $("#subject_message").css("display", "block");
              $('#subject_message').html('Please fill all the fields');
              setTimeout(function(){ $("#subject_message").css("display", "none"); }, 3000);     
        }

        if(subject4 == '' && score4 == ''){
              $("#subject_message").css("display", "block");
              $('#subject_message').html('Please fill all the fields');
              setTimeout(function(){ $("#subject_message").css("display", "none"); }, 3000);     
        }

        if(subject5 == '' && score5 == ''){
              $("#subject_message").css("display", "block");
              $('#subject_message').html('Please fill all the fields');
              setTimeout(function(){ $("#subject_message").css("display", "none"); }, 3000);     
        }


        var total_score_out_of_500 = (parseFloat(score1)+parseFloat(score2)+parseFloat(score3)+parseFloat(score4)+parseFloat(score5));
        var total_score_out_of_10  = ((total_score_out_of_500/500)*10).toFixed(2);

        var last_final_exam_score = total_score_out_of_10;

        $('#last_final_exam_score').val(total_score_out_of_10);
        var distance_score = $("#distance_score").val();
       
        var total_out_of_twenty = ((parseInt(distance_score)+parseFloat(last_final_exam_score))/20);
        var total_out_of_ten = (total_out_of_twenty*10).toFixed(2);;

        $("#final_exam_score").val(total_out_of_ten);
      
    });


     $("#edit_add_subject").click(function() {

        var subject1    = $('#edit_subject1').val();
        var subject2    = $('#edit_subject2').val();
        var subject3    = $('#edit_subject3').val();
        var subject4    = $('#edit_subject4').val();
        var subject5    = $('#edit_subject5').val();


        var score1    = $('#edit_score1').val();
        var score2    = $('#edit_score2').val();
        var score3    = $('#edit_score3').val();
        var score4    = $('#edit_score4').val();
        var score5    = $('#edit_score5').val();


        if(subject1 == '' && score1 == ''){
              $("#edit_subject_message").css("display", "block");
              $('#edit_subject_message').html('Please fill all the fields');
              setTimeout(function(){ $("#edit_subject_message").css("display", "none"); }, 3000);
        }

        if(subject2 == '' && score2 == ''){
              $("#edit_subject_message").css("display", "block");
              $('#edit_subject_message').html('Please fill all the fields');
              setTimeout(function(){ $("#edit_subject_message").css("display", "none"); }, 3000);
        }

        if(subject3 == '' && score3 == ''){
              $("#edit_subject_message").css("display", "block");
              $('#edit_subject_message').html('Please fill all the fields');
              setTimeout(function(){ $("#edit_subject_message").css("display", "none"); }, 3000);     
        }

        if(subject4 == '' && score4 == ''){
              $("#edit_subject_message").css("display", "block");
              $('#edit_subject_message').html('Please fill all the fields');
              setTimeout(function(){ $("#edit_subject_message").css("display", "none"); }, 3000);     
        }

        if(subject5 == '' && score5 == ''){
              $("#edit_subject_message").css("display", "block");
              $('#edit_subject_message').html('Please fill all the fields');
              setTimeout(function(){ $("#edit_subject_message").css("display", "none"); }, 3000);     
        }


        var total_score_out_of_500 = (parseFloat(score1)+parseFloat(score2)+parseFloat(score3)+parseFloat(score4)+parseFloat(score5));
        var total_score_out_of_10  = ((total_score_out_of_500/500)*10).toFixed(2);

        var last_final_exam_score = total_score_out_of_10;

        $('#edit_last_final_exam_score').val(total_score_out_of_10);
        var distance_score = $("#edit_distance_score").val();
       
        var total_out_of_twenty = ((parseInt(distance_score)+parseFloat(last_final_exam_score))/20);
        var total_out_of_ten = (total_out_of_twenty*10).toFixed(2);;

        $("#edit_final_exam_score").val(total_out_of_ten);
      
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
                        $("#renewal_msg").html('Student Id Already Exists');
                        setTimeout(function(){ $("#renewal_msg").css("display", "none"); }, 3000);
                      }
                      else
                      {
                        $("#renewal_msg").css("display", "block");
                        $("#renewal_msg").html('Student Id Does Not Exist');
                        setTimeout(function(){ $("#renewal_msg").css("display", "none"); }, 3000);
                      }
                      
                      //$( 'select[name="department_id"]' ).html( optionsAsString );

                    }                
        });
        
        
      
    });


    $("#edit_check_student_exist").click(function() {

        var renewal_student_id    = $('#edit_renewal_student_id').val();
        var saveData1     = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('check-student-exist');?>",
                    data: {  "renewal_student_id": renewal_student_id},
                    dataType: "text",
                    success: function(resultData) { 

                     // alert(resultData);
                      if(resultData)
                      {
                        $("#edit_renewal_msg").css("display", "block");
                        $("#edit_renewal_msg").html('Student Id Matches With Existing Record');
                        setTimeout(function(){ $("#edit_renewal_msg").css("display", "none"); }, 3000);
                      }
                      else
                      {
                        $("#edit_renewal_msg").css("display", "block");
                        $("#edit_renewal_msg").html('Student Id Does Not Match');
                        setTimeout(function(){ $("#edit_renewal_msg").css("display", "none"); }, 3000);
                      }
                      
                      //$( 'select[name="department_id"]' ).html( optionsAsString );

                    }                
        });
        
        
      
    });

      var saveData1 = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('get-student-sl-no');?>",
                    dataType: "text",
                    success: function(resultData) { 

                      $('#sl_no').val(parseInt(resultData)+1);
                    }
                
                });




      

      $('.delete_button').click(function() {
                
                var ad_id = $(this).attr('ad_id');

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-student-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          //alert(resultData);
                          resultData = jQuery.parseJSON(resultData);
                          $('#del_ad_id').val(resultData.id);
                          
                  }
                
                });

                //saveData.error(function() { alert("Something went wrong"); });

        });

     

                

      $('.edit_button1').click(function() {

                var ad_id = $(this).attr('ad_id');
                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-student-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          //alert(resultData);
                          resultData = jQuery.parseJSON(resultData);


                          var src = '<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg';
                          var srcSig = '';

                          if(resultData.profile_image)
                          {
                            src = '<?php echo base_url(); ?>assets/student_pics/'+resultData.profile_image;
                          }


                          if(resultData.student_signature)
                          {
                            srcSig = '<?php echo base_url(); ?>assets/student_signature/'+resultData.student_signature;
                          }
                          
                         $("#stu_id").val(resultData.id);
                          $("#edit_profile_image").attr("src",src);

                          $("#student_signature_image").attr("src",srcSig);



                          $('#edit_sl_no').val(resultData.sl_no);
                          $('#edit_full_name').val(resultData.full_name);
                          $('#edit_contact_no').val(resultData.contact_no);
                          $('#edit_email_id').val(resultData.email_id);
                          $('#edit_university_id').val(resultData.university_id);
                          $('#edit_hostel_id').val(resultData.hostel_id);
                          $('#edit_hostel_name').val(resultData.hostel_name);
                          $('#edit_hostel_code').val(resultData.hostel_code);
                          $('#edit_room_no').val(resultData.room_no);
                          $('#edit_hostel_wing').val(resultData.hostel_wing);
                         // $('#edit_blood_group').val(resultData.blood_group);
                         

                          $('#edit_blood_group').filter(function() { 

                              return ($(this).val() == resultData.blood_group); //To select Blood Group
                          }).prop('selected', true);
                          //$('#edit_course_id').val(resultData.course_id);
                          $('#edit_date_of_allotment').val(resultData.date_of_allotment);

                          $('#edit_date_of_birth').val(resultData.date_of_birth);


                          if(resultData.pwd_status == 1)
                          {

                            $("#customRadioInline12").attr('checked','checked');
                          }
                          else
                          {
                            $("#customRadioInline13").attr('checked','checked');
                          }

                          
                          if(resultData.gender == 'male')
                          {
                           
                            $('#customRadioInline10').attr('checked','checked');
                          }
                          else
                          {  
                            $('#customRadioInline11').attr('checked','checked');
                          }

                        $("#edit_academic_month > [value=" + resultData.academic_month + "]").attr("selected", "true");
                        $("#edit_vacating_month > [value=" + resultData.vacating_month + "]").attr("selected", "true");
                          
                        $("#edit_academic_year > [value=" + resultData.academic_year + "]").attr("selected", "true");
                        $("#edit_vacating_year > [value=" + resultData.vacating_year + "]").attr("selected", "true");
                         
                        $("#edit_course_id > [value=" + resultData.course_id + "]").attr("selected", "true"); 
                        $("#edit_department_id > [value=" + resultData.department_id + "]").attr("selected", "true");
                        $("#edit_institute_id > [value=" + resultData.institute_id + "]").attr("selected", "true"); 


                        $("#edit_state_id > [value=" + resultData.state_id + "]").attr("selected", "true");


                          if(resultData.caste_type == 'general')
                          {

                            $("#caste_type_1").attr('checked','checked');
                          }
                          else if(resultData.caste_type == 'SC')
                          {
                            $("#caste_type_2").attr('checked','checked');
                          }
                          else if(resultData.caste_type == 'ST')
                          {
                            $("#caste_type_3").attr('checked','checked');
                          }
                          else if(resultData.caste_type == 'OBC')
                          {
                            $("#caste_type_4").attr('checked','checked');
                          }

                          $('#edit_nationality_type').val(resultData.nationality_type);
                          $('#edit_physically_challenged').val(resultData.physically_challenged);

                          $('#edit_vb_reg_id').val(resultData.vb_reg_id);
                          $('#edit_aadhar_card_no').val(resultData.aadhar_card_no);
                          $('#edit_address').val(resultData.address);
                          $('#edit_city').val(resultData.city);
                          $('#edit_pincode').val(resultData.pincode);
                          $('#edit_guardian_name').val(resultData.guardian_name);
                          $('#edit_relation_with_guardian').val(resultData.relation_with_guardian);
                          $('#edit_guardian_contact_no').val(resultData.guardian_contact_no);
                          $('#edit_guardian_email_id').val(resultData.guardian_email_id);
                          $('#edit_guardian_address').val(resultData.guardian_address);

                          $('#edit_distance_score').val(resultData.distance_score);
                          $('#edit_distance_frm').val(resultData.distance_frm);
                          $('#edit_last_final_exam_score').val(resultData.last_final_exam_score);
                          $('#edit_final_exam_score').val(resultData.final_score);
                          $('#student_profile_image').val(resultData.profile_image);

                          $('#student_signature_image1').val(resultData.student_signature);
                          

                          $('#edit_student_id').val(resultData.student_id);
                          $('#edit_id').val(resultData.id);

                          var src1 = '<?php echo base_url(); ?>assets/student_cgpa_scorecards/'+resultData.cgpa_score_card;
                          $("#edit_cgpa_score").attr("src",src1);
                          $('#cgpa_score_card').val(resultData.cgpa_score_card);
                          


                          var src2 = '<?php echo base_url(); ?>assets/student_identity_doc/'+resultData.identity_document;
                          $("#edit_identity_document_file").attr("src",src2);
                          $('#identification_card').val(resultData.identity_document);


                          var src3 = '<?php echo base_url(); ?>assets/student_other_caste_doc/'+resultData.other_caste_document;
                          $("#edit_other_caste_document").attr("src",src3);
                          $('#other_caste_card').val(resultData.other_caste_document);

                          
                          if(resultData.renewal_option == 1)
                          {
                            $("#edit_customRadioInline17").attr('checked','checked');
                          }
                          else
                          {
                          
                            $("#edit_customRadioInline18").attr('checked','checked');
                          }

                         console.log(resultData.obtain_marks_type);
                          if(resultData.obtain_marks_type == 1)
                          {

                            $("#customRadioInline19").attr('checked','checked');
                            $("#edit_div_for_best_of_5").hide();
                          }
                          else
                          {
                            $("#customRadioInline20").attr('checked','checked');
                            $( "#customRadioInline20" ).trigger( "click" );
                        

                          }

                          

                          
                  }
                
                });

                //saveData.error(function() { alert("Something went wrong"); });

});

});





      function edit_approve(stuid) {
                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-status-student');?>",
                    data: {  "id": stuid},
                    dataType: "text",
                    success: function(resultData) { 
                          location.reload();
                          //resultData = jQuery.parseJSON(resultData);
                          //console.log(resultData);
                          //alert(resultData);

                          // if(resultData == '1')
                          // {
                            //location.reload(true);
                            
                          //}
                  }                
                });
                //saveData.error(function() { alert("Something went wrong"); });
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
   /// $('#student_id').val(student_id);
   // $('#student_id_unique') .show();
  $('#institute_idd').val(institute_id);
  $('#course_idd').val(course_id);
  $('#department_idd').val(department_id);
  $('#datepicker11').val(date_of_admission);

    generate_student_id(student_id);
  } 
}

$('.number').keypress(function(event) {
  if (event.which < 48 || event.which > 57) {
    event.preventDefault();
  }
});


</script>



<script>


  function get_distance_calculation(zipcode,type)
  {

     $.ajax({
       url : "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDJ7LS8lb5JcBD5gnEdFX1tzmAyYuAU3ow&components=postal_code:"+zipcode+"&sensor=false",
       method: "POST",
       success:function(data){
           
            
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

           /*if(parseFloat(dist) >= 1499.99)
           {
              dist_score = 10;
           }

*/
           if(type=='add')
           {
             $("#distance_frm").val(dist);
             $("#distance_score").val(dist_score);
             
           }
           if(type=='edit')
           {
              $("#edit_distance_frm").val(dist);
              $("#edit_distance_score").val(dist_score);
           }

           calfinal();
       }

    });

  }



  $("#last_final_exam_score").keyup(function(){

    var distance_score = $("#distance_score").val();
    var last_final_exam_score = $("#last_final_exam_score").val();
    if(distance_score!=''){
    var total_out_of_twenty = ((parseInt(distance_score)+parseFloat(last_final_exam_score))/20);
    var total_out_of_ten = (total_out_of_twenty*10).toFixed(2);

    $("#final_exam_score").val(total_out_of_ten);
    }
  });

   $("#edit_last_final_exam_score").keyup(function(){

    var distance_score = $("#edit_distance_score").val();
    var last_final_exam_score = $("#edit_last_final_exam_score").val();
    if(distance_score!=''){
    var total_out_of_twenty = ((parseInt(distance_score)+parseFloat(last_final_exam_score))/20);
    var total_out_of_ten = (total_out_of_twenty*10);

    $("#edit_final_exam_score").val(total_out_of_ten).toFixed(2);
  }
    
  });
  

  $('body').tooltip({
    selector: '.createdDiv'
  });

  $("#pincode").keyup(function(){

    var type= 'add';
    var zipcode = $("#pincode").val();
    var address = $("#address").val();

   // $("#final_exam_score").val(0);

    var tooltip_text = 'Total distance from Visvabharati to your registered address';

    get_distance_calculation(zipcode,type);
    $("#tool_tip_info").empty();
            $('<span class="createdDiv" data-toggle="tooltip" data-placement="left" title="'+tooltip_text+'"><i class="fa fa-info-circle"></i></span>').appendTo('#tool_tip_info');
     
});


$("#edit_pincode").keyup(function(){
    var type= 'edit';
    var zipcode = $("#edit_pincode").val();
    var address = $("#edit_address").val();

    var tooltip_text = 'Total distance from Visvabharati to your registered address';
   
    get_distance_calculation(zipcode,type);
    $("#edit_tool_tip_info").empty();
            $('<span class="createdDiv" data-toggle="tooltip" data-placement="top" title="'+tooltip_text+'"><i class="fa fa-info-circle"></i></span>').appendTo('#edit_tool_tip_info');
   
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

</script>

<script>
$(document).ready(function() {
    $('#example1').DataTable({
        "scrollY": 400,
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [
            { 
                extend: 'excel',
                text: 'Download'
             }
        ]
    });
} );


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

/******************* 24.09.18 *****************************/

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
  $.post("<?php echo base_url('admin-check-bhavanCode'); ?>", {st1: st1,st2: st2}, function(result){
    //console.log(result);
      if(result=='0'){
        //$(".student_id_unique_err").html('Bhavan Code not match.');
        $("#student_id1,#student_id2").val('').css("background-color","#ff3300");
        $( "#student_id1" ).focus();
        $("#institute_id").val('');
      }else{

        $("#student_id1,#student_id2").css({ 'background-color' : '' });

        result00 = result.split('##');
        $(".student_id_unique_err").html('');
        $("#institute_id").val(result00[0]);
        $("#institute_id").prop('disabled', true);

        $( 'select[name="course_id"]' ).html( '' );
        $( 'select[name="department_id"]' ).html( '' );

        //bhavan = result;
        $.ajax({ 
          type: 'POST',
          url: "<?php echo base_url('get-course-list');?>",
          data: {  "institute_id": result00[0]},
          dataType: "text",
          success: function(resultData) { 
            resultData = jQuery.parseJSON(resultData);
            var optionsAsString = "<option value=''> Select Course </option>";
            for(var i = 0; i < resultData.length; i++) {
              optionsAsString += "<option value='" + resultData[i].id + "' data-code='" + resultData[i].course_code + "'>" + resultData[i].course_name + "</option>";
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
  $.post("<?php echo base_url('admin-check-courseType'); ?>", {st3: st3,st4: st4,"institute_id": $('#institute_id').val()}, function(result1){
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

        $( 'select[name="department_id"]' ).html( '' );
        $.ajax({ 
          type: 'POST',
          url: "<?php echo base_url('get-subject-list');?>",
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
  console.log('fhj');
  $.post("<?php echo base_url('admin-check-Department'); ?>", {st5: st5,st6: st6,st7: st7,"institute_id": $('#institute_id').val(),"course_id":$('#course_id').val()}, function(result3){
    //console.log(result3);
      if(result3=='0'){
        $(".student_id_unique_err").html('Department not match.');
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

$('#academic_year').val(year);
$("#academic_year").prop('disabled', true);


$('#institute_idd').val($('#institute_id').val());
$('#course_idd').val($('#course_id').val());
$('#department_idd').val($('#department_id').val());
$('#datepicker11').val($('#datepicker1').val());

  generate_student_id(student_id112);


}
});

function CheckAllChk(all){
    $(".checkBoxClass").prop('checked', $(all).prop('checked'));
}

function approve_student(){
  var student_app = [];
    $.each($(".checkBoxClass:checked"), function(){            
        student_app.push($(this).val());
    });
    console.log(student_app);
    if(typeof student_app !== 'undefined' && student_app.length > 0) {
      // approve student
     $('body').addClass('bodyCls');
     $('.loader-wrapper').show(); //assets/image/ajax-loader.gif (front/layout/index.php)
      $.post("<?php echo base_url('admin-approved-student'); ?>", {student_app:student_app}, function(result){
    //console.log(result);
    location.reload();     
    });




    }else{
      alert('Student not selected.')
    }
}
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
</script>



<style type="text/css">
  .student-dashboard .img-profile .edit-img-profile {
    position: inherit;
  }
  
  .stid,.stid1 {
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

.dataTables_filter{
  float: right;
}
.table-responsive{
  overflow-x: hidden;
}

</style>            