<div class="" id="allotment-card" role="tabpanel">
  <div class="row">
    <div class="col-auto">
      <h4>Student Details</h4>
    </div>
    <div class="col">
      <a href="<?php echo base_url('admin-releaseBed'); ?>/<?php echo (isset($all_data->id) ? $all_data->id : ''); ?>/<?php echo (isset($seatId) ? $seatId : ''); ?>/<?php echo (isset($bed) ? $bed : ''); ?>" class="btn btn-primary btn-sm float-right" style="margin-left: 15px;">Release Bed</a>                   
    </div>
  </div>
   <hr>
         
  
 <div class="row">
    <div class="col-md-3">
      <a href="javascript:void(0)" class="img-profile">
        <img src="<?php echo base_url(); ?>/<?php echo (isset($all_data->profile_image) ? 'assets/student_pics/'.$all_data->profile_image : 'assets/front/images/blank-profile-pic.jpg'); ?>" alt="" class="img-thumbnail img-fluid">
        <span class="edit-img-profile" style="display: block;">Profile Image</span>
      </a>
    </div>
    <div class="col-md-9">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>ID No.</label>
         <input type="text" class="form-control" value="<?php echo (isset($all_data->student_id) ? $all_data->student_id : ''); ?>" disabled>

        </div>
        <div class="form-group col-md-6">
          <label>Full Name</label>
          <input type="text" class="form-control" value="<?php echo (isset($all_data->full_name) ? $all_data->full_name : ''); ?>" disabled>
        </div>
      </div>
<div class="form-row">
      <div class="form-group col-md-6">
          <label>Name of Bhavana (Institute)</label>
          <?php $institute=$this->Seatmodel->get_row_data('institute',array('id'=>@$all_data->institute_id)); ?>
          <input type="text" class="form-control" value="<?php echo (isset($institute->institute_name) ? $institute->institute_name : ''); ?>" disabled>
        </div>

        <div class="form-group col-md-6">
          <label>Course</label>
           <?php $course=$this->Seatmodel->get_row_data('course',array('id'=>@$all_data->course_id)); ?>
          <input type="text" class="form-control" value="<?php echo (isset($course->course_name) ? $course->course_name : ''); ?>" disabled>
        </div>
        </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Name of Department</label>
         <?php $department=$this->Seatmodel->get_row_data('department',array('id'=>@$all_data->department_id)); ?>
          <input type="text" class="form-control" value="<?php echo (isset($department->department_name) ? $department->department_name : ''); ?>" disabled>
        </div>
        <div class="form-group col-md-6">
          <label>Academic Year</label>
          <input type="text" class="form-control" value="<?php echo (isset($all_data->academic_year) ? $all_data->academic_year : ''); ?>" disabled>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Date of Allotment</label>
          <input type="text" class="form-control" value="<?php echo (isset($all_data->date_of_allotment) ? date('d/m/Y',strtotime($all_data->date_of_allotment)) : ''); ?>" disabled>
        </div>
        <div class="form-group col-md-6">
          <label>Date of Vacating</label>
          <input type="text" class="form-control" value="<?php echo (isset($all_data->vacating_year) ? $all_data->vacating_year : ''); ?>" disabled>
        </div>
      </div>
      
     

      <div class="form-row">        
        <div class="form-group col-md-6">
          <label>Hostel Id</label>
          <input type="text" class="form-control" value="<?php echo (isset($all_data->hostel_id) ? $all_data->hostel_id : ''); ?>" disabled>
        </div>
      </div>


      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Hostel Name</label>
          <?php $hostel=$this->Seatmodel->get_row_data('hostel',array('id'=>@$all_data->hostel_name)); ?>
          <input type="text" class="form-control" value="<?php echo (isset($hostel->hostel_name) ? $hostel->hostel_name : ''); ?>" disabled>         

        </div>
        <div class="form-group col-md-6">
          <label>Hostel Code</label>
         <input type="text" class="form-control" value="<?php echo (isset($all_data->hostel_code) ? $all_data->hostel_code : ''); ?>" disabled>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Block</label>        
          <?php $block=$this->Seatmodel->get_row_data('hostel_block',array('id'=>@$all_data->block_no)); ?>
          <input type="text" class="form-control" value="<?php echo (isset($block->block_name) ? $block->block_name : ''); ?>" disabled>
        </div>
        <div class="form-group col-md-6">
          <label>Floor</label>
          <?php $floor=$this->Seatmodel->get_row_data('hostel_floor',array('id'=>@$all_data->floor_no)); ?>       
           <input type="text" class="form-control" value="<?php echo (isset($floor->floor_name) ? $floor->floor_name : ''); ?>" disabled>
        </div>
      </div>


      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Room No.</label>
       
         <input type="text" class="form-control" value="<?php echo (isset($all_data->room_no) ? $all_data->room_no : ''); ?>" disabled>


        </div>
        <div class="form-group col-md-6">
          <label>Bed No</label>
          <input type="text" class="form-control" value="<?php echo (isset($all_data->bed_no) ? $all_data->bed_no : ''); ?>" disabled>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Email Id</label>
          <input type="text" class="form-control" value="<?php echo (isset($all_data->email_id) ? $all_data->email_id : ''); ?>" disabled>
        </div>
        <div class="form-group col-md-6">
          <label>Mobile No</label>
          <input type="text" class="form-control" value="<?php echo (isset($all_data->contact_no) ? $all_data->contact_no : ''); ?>" disabled>
        </div>  
      </div>
      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" value="<?php echo (isset($all_data->address) ? $all_data->address : ''); ?>" disabled>
      </div>
      <div class="form-group">
        <label>Name of Guardian</label>
        <input type="text" class="form-control" value="<?php echo (isset($all_data->guardian_name) ? $all_data->guardian_name : ''); ?>" disabled>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Guardian Email Id</label>
         <input type="text" class="form-control" value="<?php echo (isset($all_data->guardian_email_id) ? $all_data->guardian_email_id : ''); ?>" disabled>
        </div>
        <div class="form-group col-md-6">
          <label>Guardian Contact No</label>
         <input type="text" class="form-control" value="<?php echo (isset($all_data->guardian_contact_no) ? $all_data->guardian_contact_no : ''); ?>" disabled>
        </div> 
      </div>
    </div>
  </div>

</div>