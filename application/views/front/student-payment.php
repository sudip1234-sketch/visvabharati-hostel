 <div class="inner-page-content-sectn student-dashboard">
      <div class="container">
        <div class="row">
        
          <!-- <div class="col">
            <a href="<?php //echo base_url('logout'); ?>" class="btn btn-outline-secondary btn-sm float-right" style="margin-top: -8px;">Log out</a>
          </div> -->
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12 col-md-12" >
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="profile" role="tabpanel">
                <h4>Application ID: <?php echo (!empty($student_details->id)? $student_details->id:'');?></h4>
                <hr>                
                <div class="row">
                  <!-- <div class="col-md-3">
                    <a href="#" class="img-profile">

                      <?php if(!empty($student_details->profile_image)){ ?>
                      <img src="<?php echo base_url().'/assets/student_pics/'.$student_details->profile_image;?>" alt="" class="img-thumbnail img-fluid">
                      <?php }else{ ?>
                      <img src="<?php echo base_url().'/assets/front/images/blank-profile-pic.jpg';?>" alt="" class="img-thumbnail img-fluid">
                      <?php } ?>
                      <input type="file" class="edit-img-profile" style="display: block;" name="profile_image" id="profile_image" />
                    </a>
                  </div> -->
                  <div class="col-md-9">
                 
                      <!-- 
                        <div class="form-group col-md-6">
                           <label>Application No: </label>
                           <?php echo (!empty($student_details->id)? $student_details->id:'');?>
                        </div>
 -->
                      <?php if(!empty($payment_id)){ ?>
                        <div class="form-group col-md-6">
                           <label>Payment Id: </label>
                           <?php echo (!empty($payment_id)? $payment_id:'');?>
                        </div>
                         <?php } ?>

                        <div class="form-group col-md-6">
                           <label>Student Id: </label>
                           <?php echo (!empty($student_details->student_id)? $student_details->student_id:'');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Full Name: </label>
                          <?php echo (!empty($student_details->full_name)? $student_details->full_name:'');?>
                        </div>
                     
                        <div class="form-group col-md-6">
                          <label>Contact No: </label>
                          <?php echo (!empty($student_details->contact_no)? '+91 '.$student_details->contact_no:'');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Email Id: </label>
                          <?php echo (!empty($student_details->email_id)? $student_details->email_id:'');?>
                        </div>
                      
                        <div class="form-group col-md-6">
                          <label>Gender: </label>
                          <?php echo (!empty($student_details->gender)? $student_details->gender:'');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Blood group: </label>
                          <?php echo (!empty($student_details->bloodgroupname)? $student_details->bloodgroupname:'');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Name of Bhavana (Institute): </label>
                          <?php echo (!empty($student_details->institute_name)? $student_details->institute_name:'');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Course Type: </label>
                          <?php echo (!empty($student_details->course_name)? $student_details->course_name:'');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Name of Department: </label>
                          <?php echo (!empty($student_details->department_name)? $student_details->department_name:'');?>
                        </div>
                        <div class="form-group col-md-6">
                        <label>Date of Admission/Allotment: </label>
                          <?php echo (!empty($student_details->date_of_allotment)? date('d-m-Y',strtotime($student_details->date_of_allotment)):'');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Academic Year: </label>
                          <?php echo (!empty($student_details->academic_year)? $student_details->academic_year:'');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Vacating Year: </label>
                          <?php echo (!empty($student_details->vacating_year)? $student_details->vacating_year:'');?>
                        </div>
                        <div class="form-group col-md-6">
                        <label>Date of Birth: </label>
                          <?php echo (!empty($student_details->date_of_birth)? date('d-m-Y',strtotime($student_details->date_of_birth)):'');?>
                        </div>
                        <div class="form-group col-md-6">
                        <label>Address: </label>
                          <?php echo (!empty($student_details->address)? $student_details->address:'');?>
                        </div>
                        <div class="form-group col-md-6">
                        <label>City: </label>
                          <?php echo (!empty($student_details->city)? $student_details->city:'');?>
                        </div>
                        <div class="form-group col-md-6">
                        <label>Pin Code: </label>
                          <?php echo (!empty($student_details->pincode)? $student_details->pincode:'');?>
                        </div>

                     <a href="<?php echo base_url('index'); ?>" class="btn btn-danger" >Go To Home Page</a>

                     <!-- 30112020 -->
                     <!-- <a target="_blank" href="<?php //echo base_url('download-student-form/'.$user_id.'/00000'); ?>" class="btn btn-danger" >Download Application Slip</a> -->
                     <a target="_blank" href="<?php echo base_url('download-student-form/'.$user_id.'/'.$payment_id); ?>" class="btn btn-danger" >Download Application Slip</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>