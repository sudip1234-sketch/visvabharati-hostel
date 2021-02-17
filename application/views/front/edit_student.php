<?php
$student_profile_image_url = base_url() . "assets/admin/images/blank-profile-pic.jpg";
$student_signature_image_url = base_url() . "assets/admin/images/sample_signature.png";

if(!empty($student->student_signature)) {
    $student_signature_image_url = base_url().'assets/student_signature/'. $student->student_signature;
}

if(!empty($student->profile_image)) {
    $student_profile_image_url = base_url().'assets/student_pics/'. $student->profile_image;
}
?>

<script type="text/javascript" src="<?php echo base_url(); ?>/js/admin/edit_student.js"></script>

<div id="edit_student_info" style="margin: 0 10%;">
    <h3>Edit Profile</h3>
    <form method="post" action="<?php echo base_url('update-student-info') ."/" . $student->id; ?>" name="add-form" id="editformstd" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3">
                    <a href="#" class="img-profile" style="overflow: hidden; max-width: 250px;">
                        <img id="edit_profile_image" src="<?php echo $student_profile_image_url ?>" alt="" class="img-thumbnail img-fluid" style="max-width: 250px;">
                        <input type="file" class="edit-img-profile" style="display: block; position: unset;" name="profile_image" id="profile_image" />
                    </a>
                    <br><br>
                    <a href="#" class="img-profile" style="overflow: hidden; max-width: 250px;">
                        <img id="student_signature_image" src="<?php echo $student_signature_image_url ?>" alt="" class="img-thumbnail img-fluid" style="max-width: 250px;">
                        <input type="file" class="edit-img-profile" style="display: block;  position: unset;" name="student_signature" id="student_signature" />
                    </a>
                </div>
                <div class="col-md-9">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Student Id</label>
                            <input readonly="readonly"  type="text" class="form-control" name="student_id" id="edit_student_id" placeholder="Enter Student Id." value="<?php echo $student->student_id; ?>" >
                        </div>
                        <div class="form-group col-md-6">
                            <label>Full Name</label>
                            <input readonly="readonly" type="text" class="form-control" name="full_name" id="edit_full_name" placeholder="Enter Full Name" value="<?php echo $student->full_name; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Contact No.</label>
                            <input type="text" class="form-control" name="contact_no" id="edit_contact_no" placeholder="Enter Contact No." value="<?php echo $student->contact_no; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email Id</label>
                            <input type="text" class="form-control" name="email_id" id="edit_email_id" placeholder="Enter email id" value="<?php echo $student->email_id; ?>">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Sex</label><br>
                            <?php if(strcasecmp($student->gender, "male") == 0){ ?>
                            <div class="form-check form-check-inline">
                                <input  type="radio" id="customRadioInline10" name="gender" class="edit_gender form-check-input" value="male" 
                                    <?php if(strcasecmp($student->gender, "male") == 0) echo "checked"; ?>
                                >
                                <label class="form-check-label" for="customRadioInline10">Male</label>
                            </div>
                            <?php } ?>
                             <?php if(strcasecmp($student->gender, "female") == 0) { ?>
                            <div class="form-check form-check-inline">
                                <input  type="radio" id="customRadioInline11" name="gender" class="edit_gender form-check-input" value="female"
                                    <?php if(strcasecmp($student->gender, "female") == 0) echo "checked"; ?>
                                >
                                <label class="form-check-label" for="customRadioInline11">Female</label>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Blood Group</label>
                            <select class="custom-select" name="blood_group" id="edit_blood_group12">
                                <?php
                                if(!empty($all_bloodgroups)) {
                                    foreach($all_bloodgroups as $bloodgroup) {
                                ?>
                                        <option
                                            value="<?php echo $bloodgroup->id; ?>"
                                            <?php if($student->blood_group == $bloodgroup->id) echo "selected"; ?>
                                        >
                                            <?php echo $bloodgroup->name; ?>
                                        </option>
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
                            <select class="custom-select" name="institute_id" id="edit_institute_id" disabled>
                                <option selected>Choose Bhavana(Institute)</option>
                                <?php
                                if($all_institutes) {
                                    foreach($all_institutes as $institute) {
                                ?>
                                        <option
                                            value="<?php echo $institute->id; ?>"
                                            <?php if($student->institute_id == $institute->id) echo "selected"; ?>
                                        >
                                            <?php echo $institute->institute_name; ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <input type="hidden" id="institute_id_validation" name="institute_id_validation" value="<?php echo $student->institute_id; ?>" >
                        </div>
                        <div class="form-group col-md-6">
                            <label>Course Type</label>
                            <select class="custom-select" name="course_id" id="edit_course_id" disabled="true">
                                <?php
                                if(!empty($all_courses_edit)) {
                                    foreach($all_courses_edit as $course) {
                                ?>
                                    <option
                                        value="<?php echo $course->id; ?>"
                                        data-course-code="<?php echo $course->course_code; ?>"
                                        <?php if($student->course_id == $course->id) echo "selected"; ?>
                                    >
                                        <?php echo $course->course_name; ?>
                                    </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <input type="hidden" id="course_id_validation" name="course_id_validation" value="<?php echo $student->course_id; ?>" >
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Name of Department</label>
                            <select class="custom-select" name="department_id" id="edit_department_id" disabled>
                                <?php
                                if($all_departments_edit) {
                                    foreach($all_departments_edit as $department) {
                                ?>
                                    <option
                                        value="<?php echo $department->id; ?>"
                                        data-subject-code="<?php echo $department->subject_code; ?>"
                                        <?php if($student->department_id == $department->id) echo "selected"; ?>
                                    >
                                        <?php echo $department->department_name; ?>
                                    </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <input type="hidden" id="department_id_validation" name="department_id_validation" value="<?php echo $student->department_id; ?>" >
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label>Date of Admission</label>
                            <input readonly="readonly" class="form-control datepicker" name="date_of_admission" 
                                id="edit_date_of_allotment1" placeholder="Select date"
                                value="<?php echo date_format(date_create($student->hostel_assign_date), "m/d/Y"); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Semester</label>
                            <select disabled class="custom-select" name="semester" id="edit_semester" >
                                <?php
                                    //current semester
                                    $ad_year = substr($student->student_id, -4, 2);
                                    $ad_date = '20'.$ad_year.'-07-01';
                                    $start = new DateTime($ad_date);
                                    $end   = new DateTime('today');
                                    $diff  = $start->diff($end);
                                    $month =  $diff->format('%y') * 12 + $diff->format('%m');
                                    $semester = ceil($month/6);
                                    echo "<option value=\"$semester\" $selected>$semester</option>";


                                    // for($idx = 1; $idx < 11; $idx++) {
                                    //     $selected = "";
                                    //     if($idx == $student->semester) {
                                    //         $selected = "selected";
                                    //     }
                                    //     echo "<option value=\"$idx\" $selected>$idx</option>";
                                    // }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Vacating Month/Year</label>
                            <div class="col-md-5" style="float: left;">
                                <select disabled class="custom-select inputDisabled" name="vacating_month" id="edit_vacating_month" >
                                    <?php
                                    $months = array("Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec");
                                    for($idx = 1; $idx < 13; $idx++) {
                                    ?>
                                        <option
                                            value="<?php echo $idx; ?>"
                                            <?php if($student->vacating_month == $idx) echo "selected"; ?>
                                        >
                                            <?php echo $months[$idx-1]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6" style="float: left;">
                                <input readonly class="form-control" name="vacating_year" id="edit_vacating_year1" placeholder="Vacating Year" value="<?php echo $student->vacating_year ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>VB Registration Id</label>
                            <input type="text" name="vb_reg_id" id="edit_vb_reg_id" class="form-control" placeholder="Enter VB registration Id" value="<?php echo $student->vb_reg_id ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Date of Birth</label>
                            <input class="form-control datepicker" name="date_of_birth" id="edit_date_of_birth" placeholder="Select date" 
                                value="<?php
                                    $dob = date_create($student->date_of_birth);
                                    if($dob)
                                        echo date_format($dob, "m/d/Y");
                                ?>">
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Aadhar No/Voter Id/Any Address Proof</label>
                            <input type="text" class="form-control" name="aadhar_card_no" id="edit_aadhar_card_no" placeholder="Enter Aadhar card no." value="<?php echo $student->aadhar_card_no; ?>">
                        </div>
                        <?php if(strtolower(@$student->nationality_type) == 'indian'){ ?>
                        <div class="form-group col-md-6">
                            <label>State</label>
                            <select class="custom-select" name="state_id" id="edit_state_id" >
                                <?php
                                if(!empty($all_states))
                                {
                                foreach($all_states as $state)
                                { ?>
                                <option value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>
                                <?php }
                                }
                                ?>
                                <?php
                                if($all_states) {
                                    foreach($all_states as $state) {
                                ?>
                                    <option
                                        value="<?php echo $state->id; ?>"
                                        <?php if($student->state_id == $state->id) echo "selected"; ?>
                                    >
                                        <?php echo $state->name; ?>
                                    </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" id="edit_address" class="form-control" placeholder="Enter address" value="<?php echo $student->address ?>">
                    </div>
                    <div class="form-group">
                        <label>District</label>
                        <input type="text" name="district" id="edit_district" class="form-control" placeholder="Enter District" value="<?php echo $student->district ?>" >
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" name="city" id="edit_city" class="form-control" placeholder="Enter city name" value="<?php echo $student->city ?>">
                        </div>
                        <?php if(strtolower(@$student->nationality_type) == 'indian'){ ?>
                        <div class="form-group col-md-6">
                            <label>Pin Code.</label>
                            <input type="text" name="pincode" id="edit_pincode" class="form-control" placeholder="Enter pin code" value="<?php echo $student->pincode ?>">
                            <span style="font-size: 10px;" >Example - 700104 </span>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Guardian Name</label>
                            <input type="text" class="form-control" name="guardian_name" id="edit_guardian_name" placeholder="Enter Guardian name" value="<?php echo $student->guardian_name ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Relation with Guardian</label>
                            <select class="custom-select" name="relation_with_guardian" id="edit_relation_with_guardian">
                                <option value="father" <?php if($student->relation_with_guardian == "father") echo "selected" ?>>Father</option>
                                <option value="mother" <?php if($student->relation_with_guardian == "mother") echo "selected" ?>>Mother</option>
                                <option value="uncle" <?php if($student->relation_with_guardian == "uncle") echo "selected" ?>>Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Guardian Contact No</label>
                            <input type="text" class="form-control" name="guardian_contact_no" id="edit_guardian_contact_no" placeholder="Enter Guardian contact no." value="<?php echo $student->guardian_contact_no ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Guardian Email Id</label>
                            <input type="text" class="form-control" name="guardian_email_id" id="edit_guardian_email_id"  placeholder="Enter Guardian email id" value="<?php echo $student->guardian_email_id; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Guardian Address</label>
                        <input type="text" class="form-control" name="guardian_address" id="edit_guardian_address" placeholder="Enter Guardian address" value="<?php echo $student->guardian_address; ?>">
                    </div>
                    <div class="form-group">
                        <label>PWD Status</label><br>
                        <?php if($student->pwd_status == 1){ ?>
                        <div class="form-check form-check-inline">
                            <input  type="radio" id="customRadioInline12" name="pwd_status" class="edit_pwd form-check-input" value="1" <?php if($student->pwd_status == 1) echo "checked"; ?> >
                            <label class="form-check-label" for="customRadioInline1">Yes</label>
                        </div>
                        <?php } ?>
                        <?php if($student->pwd_status == 0) {?>
                        <div class="form-check form-check-inline">
                            <input  type="radio" id="customRadioInline13" name="pwd_status" class="edit_pwd form-check-input" value="0" <?php if($student->pwd_status == 0) echo "checked"; ?>>
                            <label class="form-check-label" for="customRadioInline2">No</label>
                        </div>
                        <?php } ?>
                    </div>
                    <?php if($student->pwd_status == 1){ ?>
                    <div class="form-group">
                        <label>PWD Status Category</label>
                        <select class="custom-select" name="physically_challenged" id="edit_physically_challenged">
                            <option value="blind" <?php if($student->physically_challenged == "blind") echo "selected"; ?> >Blind</option>
                            <option value="orthopedic" <?php if($student->physically_challenged == "orthopedic") echo "selected"; ?> >Orthopedic</option>
                        </select>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label>Caste</label><br>
                        <?php switch ($student->caste_type) {
                            case 'general': ?>
                                <div class="form-check form-check-inline">
                                    <input  type="radio" id="caste_type_1" name="caste_type" class="edit_caste form-check-input" value="general" <?php if($student->caste_type == "general") echo "checked"; ?> >
                                    <label class="form-check-label" for="customRadioInline3">GEN</label>
                                </div>
                               <?php break;
                            case 'SC': ?>
                                 <div class="form-check form-check-inline">
                                    <input  type="radio" id="caste_type_2" name="caste_type" class="edit_caste form-check-input" value="SC" <?php if($student->caste_type == "SC") echo "checked"; ?> >
                                    <label class="form-check-label" for="customRadioInline4">SC</label>
                                </div>
                                <?php break;
                            case 'ST': ?>
                                <div class="form-check form-check-inline">
                                    <input  type="radio" id="caste_type_3" name="caste_type" class="edit_caste form-check-input" value="ST" <?php if($student->caste_type == "ST") echo "checked"; ?> >
                                    <label class="form-check-label" for="customRadioInline13">ST</label>
                                </div>
                                <?php break;
                            case 'OBC': ?>
                                <div class="form-check form-check-inline">
                                    <input  type="radio" id="caste_type_4" name="caste_type" class="edit_caste form-check-input" value="OBC" <?php if($student->caste_type == "OBC") echo "checked"; ?> >
                                    <label class="form-check-label" for="customRadioInline14">OBC</label>
                                </div>
                            <?php    break;

                            default: ?>
                                <div class="form-check form-check-inline">
                                    <input  type="radio" id="caste_type_1" name="caste_type" class="edit_caste form-check-input" value="general" <?php if($student->caste_type == "general") echo "checked"; ?> >
                                    <label class="form-check-label" for="customRadioInline3">GEN</label>
                                </div>
                                <?php break;
                        } ?>
                        
                    </div>
                    <div class="form-group">
                        <label>Nationality</label>
                        <select class="custom-select" name="nationality_type" id="edit_nationality_type">
                            <option id="nationality_type_indian" value="indian" <?php if(strtolower($student->nationality_type) == "indian") echo "selected"; ?>>Indian</option>
                            <option id="nationality_type_foreign" value="foreign" <?php if(strtolower($student->nationality_type) != "indian") echo "selected"; ?>>Other Nations</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Distance in Km <span id="tool_tip_info"></span></label>
                            <input type="text" class="form-control" name="distance_frm" id="edit_distance_frm" value="<?php echo$student->distance_frm; ?>" placeholder="Enter distance from santiniketan">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Distance Score (Calculated)</label>
                            <input type="text" class="form-control" name="distance_score" id="edit_distance_score" value="<?php echo $student->distance_score; ?>" placeholder="Enter distance score (calculated)" disabled>
                            <input type="hidden" id="distance_score_validation" name="distance_score_validation" value="<?php echo $student->distance_score; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Last Final Exam Score (10 Point Scale)</label>
                            <input type="text" class="form-control" name="last_final_exam_score" id="edit_last_final_exam_score" value="<?php echo $student->last_final_exam_score; ?>" placeholder="Enter last final exam score (10 Point Scale)">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Final Score (Calculated)</label>
                            <input type="text" class="form-control" name="final_score" id="edit_final_exam_score" value="<?php echo $student->final_score; ?>" placeholder="Final Exam Score" disabled>
                            <input type="hidden" id="final_score_validation" name="final_score_validation" value="<?php echo $student->final_score; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="student_profile_image" id="student_profile_image11" value="<?php $student->profile_image ?>">
            <input type="hidden" name="student_signature_image" id="student_signature_image1" value="<?php $student->student_signature ?>">
            <input type="submit" name="edit_student" id="edit_student" class="btn btn-danger" value="Save" />
        </div>
    </form>
</div>