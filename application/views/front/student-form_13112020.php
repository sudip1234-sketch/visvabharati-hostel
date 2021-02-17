<script type="text/javascript" src="<?php echo base_url(); ?>js/allotment_form.js"></script>

<div class="inner-page-content-sectn student-dashboard">
    <div class="container">
        <div class="row">
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel">
                        <h4>Fill In Your Details</h4>
                        <hr>
                        <form method="post" action="<?php echo base_url('add-student-profile'); ?>" name="add-form" id="addform" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="#" class="img-profile" style="overflow: hidden; max-width: 250px;" >
                                        <img id="show_profile_image"  src="<?php echo base_url().'/assets/front/images/blank-profile-pic.jpg';?>" alt="" class="img-thumbnail img-fluid" style="max-width: 250px;">
                                        <input type="file" class="edit-img-profile" style="display: block; position: unset;" name="profile_image" id="profile_image" />
                                    </a>
                                    <br><br>
                                    <h5>Upload Signature</h5>
                                    <a href="#" class="img-profile" style="overflow: hidden; max-width: 250px;" >
                                        <img id="show_student_signature"  src="<?php echo base_url().'/assets/front/images/signature.png';?>" alt="" class="img-thumbnail img-fluid" style="max-width: 250px;">
                                        <input type="file" class="edit-img-profile" style="display: block; position: unset;" name="student_signature" id="student_signature" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Student Id</label>
                                            <input class="form-control" name="student_id" id="student_id" placeholder="Enter student id" value="">
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
                                            <select class="custom-select" name="institute_id" id="institute_id" disabled="true">
                                                <?php
                                                if($all_institutes) {
                                                    foreach($all_institutes as $institute) {
                                                ?>
                                                        <option
                                                            value="<?php echo $institute->id; ?>">
                                                            <?php echo $institute->institute_name; ?>
                                                        </option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <input type="hidden" id="institute_id_validation" name="institute_id_validation" value="" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Course Type</label>
                                            <select class="custom-select" name="course_id" id="course_id" disabled="true" onchange="getVacatingYear()">
                                                <?php
                                                if(!empty($all_courses)) {
                                                    foreach($all_courses as $course) {
                                                ?>
                                                    <option
                                                        value="<?php echo $course->id; ?>"
                                                        data-duration="<?php echo $course->total_year; ?>"
                                                        data-course-code="<?php echo $course->course_code; ?>"
                                                    >
                                                        <?php echo $course->course_name; ?>
                                                    </option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <input type="hidden" id="course_id_validation" name="course_id_validation" value="" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Name of Department</label>
                                            <select class="custom-select" name="department_id" id="department_id" disabled>
                                                <?php
                                                if($all_departments) {
                                                    foreach($all_departments as $department) {
                                                ?>
                                                    <option
                                                        value="<?php echo $department->id; ?>"
                                                        data-subject-code="<?php echo $department->subject_code; ?>"
                                                    >
                                                        <?php echo $department->department_name; ?>
                                                    </option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <input type="hidden" id="department_id_validation" name="department_id_validation" value="" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of Admission</label>
                                            <input class="form-control datepicker" name="date_of_allotment" id="date_of_allotment" placeholder="Select date" onchange="getVacatingYear()">
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
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
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
                                            <input class="form-control datepicker" name="date_of_birth" id="date_of_birth" placeholder="Select date">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Aadhar No/Voter Id/Any Address Proof</label>
                                            <input type="text" class="form-control" name="aadhar_card_no" id="aadhar_card_no" placeholder="Enter Aadhar card no." value="" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Nationality</label>
                                            <select class="custom-select" name="nationality_type" id="nationality_type">
                                                <option id="nationality_type_indian" value="indian">Indian</option>
                                                <option id="nationality_type_foreign" value="foreign">Other Nations</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter address" value="" >
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>District</label>
                                            <input type="text" name="district" id="district" class="form-control" placeholder="Enter District" >
                                        </div>
                                        <div class="form-group col-md-6" id="state_div">
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
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>City</label>
                                            <input type="text" name="city" id="city" class="form-control" placeholder="Enter city name" value="" >
                                        </div>
                                        <div class="form-group col-md-6" id="pincode_div">
                                            <label>Pin Code.</label>
                                            <input type="text" name="pincode" autocomplete="off" id="pincode" class="form-control" placeholder="Enter your pin code" value="" >
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
                                    <div class="form-row" id="div_pwd_status">
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
                                        <div class="form-group col-md-6" id="div_physically_challenged" style="display: none">
                                            <label>Status Category</label>
                                            <select class="custom-select" name="physically_challenged" id="physically_challenged" readonly="true">
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
                                        <div class="form-group col-md-6" id="div_caste_type">
                                            <label>Caste</label><br>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline3" name="caste_type" class="custom-control-input" value="general" checked>
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
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Renewal Option</label><br>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline15" name="renewal_option" value="1" onclick="javascript:renewalCheck();" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline15">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline16" name="renewal_option" value="0" onclick="javascript:renewalCheck();" class="custom-control-input" checked>
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
                                            <div class="form-group col-md-6">
                                                <label>Hostel Name</label>
                                                <select class="custom-select" name="hostel_name" id="hostel_name">
                                                    <?php
                                                    foreach ($all_hostels as $key => $hostel) { ?>
                                                    <option value="<?php echo $hostel->hostel_code; ?>"><?php echo $hostel->hostel_name; ?></option>
                                                    <?php  }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="button" class="btn btn-danger"  name="check_student_exist" id="check_student_exist" value="Check" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group" id="div_obtain_marks_type">
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

                                    <div id="div_cgpa_entry_field" style="display: none">
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <input type="number"class="form-control" name="cgpa_entry_field" id="cgpa_entry_field" step="0.01" placeholder="Enter you CGPA (10 Point Scale)">
                                            </div>
                                        </div>
                                    </div>

                                    <div id="div_for_best_of_5" style="display:none">
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <input type="number"class="form-control" name="best_of_5" id="best_of_5" step="0.01" placeholder="Enter your percentage.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="div_distance_score">
                                        <div class="form-group col-md-6">
                                            <label>Distance Score (10 Point Scale)</label>
                                            <input type="text" class="form-control" name="distance_score" id="distance_score" value="" placeholder="Enter pincode above to calculate" disabled>
                                            <input type="hidden" id="distance_score_validation" name="distance_score_validation" value="">
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
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <a href="javascript:void(0)" class="btn btn-secondary btn-sm" onclick="javascript:closeScoreDetails();" name="distancescore" id="distancescore" >Close</a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Distance in Km <span id="tool_tip_info"></span></label>
                                            <input type="text" class="form-control" name="distance_frm" id="distance_frm" value="" placeholder="Enter pincode above to calculate" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row" id="div_final_score">
                                        <div class="form-group col-md-6">
                                            <label>Last Final Exam Score</label>
                                            <input max='10' type="text" class="form-control numberdot" name="last_final_exam_score" id="last_final_exam_score" value="" placeholder="Enter CGPA or marks to Calculate" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Final Score (Calculated)</label>
                                            <input type="text" class="form-control" name="final_score" id="final_exam_score" value="" placeholder="Final Exam Score" disabled>
                                            <input type="hidden" id="final_score_validation" name="final_score_validation" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Declaration</label>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" id="declaration" name="declaration" class="custom-control-input" value="general">
                                            <label class="custom-control-label" for="declaration">I hereby declare that the details furnished above are true and correct to the best of my knowledge
                                            and belief. </label>
                                        </div>
                                        <br><a href="#javascript:void(0)" data-toggle="modal" data-target="#add-payment-data" style="font-size: 14px;">Rules And Regulations</a>
                                        
                                    </div>
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

<style type="text/css">
    .error{
        color: red;
    }
</style>