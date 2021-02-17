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
                <h4>Payment Details</h4>
                <hr>

                
                <div class="row">
                 
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
                        <div class="form-group col-md-6">
                        <label>Total Amount To Be Paid: </label>
                          <?php echo (!empty($payment_details->total_amount)? $payment_details->total_amount:'');?>
                        </div>
                        <div class="form-group col-md-6">
                        <label>Total Amount Paid: </label>
                          <?php echo (!empty($payment_details->total_paid)? $payment_details->total_paid:'');?>
                        </div>
                       <!--  <div class="form-group col-md-6">
                        <label>Total Amount OverDue: </label>
                          <?php //echo (!empty($payment_details->total_overdue)? $payment_details->total_overdue:'');?>
                        </div> -->

                  </div>

                                <p>
                                   <label>Note:-</label>
                                   <span>Within 3 days please produce your original documents. Verification needs to be done.</span>
                                </p>
                                
                      

                     <!-- <button type="submit" class="btn btn-danger" id="btn-save">Print</button>  -->
                     <a href="<?php echo base_url('index'); ?>" class="btn btn-danger" >Go To Home Page</a>
                     
                    

                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>



    






