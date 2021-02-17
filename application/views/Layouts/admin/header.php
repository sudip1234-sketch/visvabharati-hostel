<?php

$this->load->model('front/Frontmodel');
$main_heading     = $this->Frontmodel->load_main_menus();

/*echo "<pre>";
print_r($main_heading);
exit;
*/
$administration = $main_heading[1]->cms_title;
$hostel = $main_heading[2]->cms_title;

?>
<header>
      <div class="headerTop">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-7 col-md-8">
              <!-- <a href="<?php //echo base_url('admin-student-list'); ?>" id="brand-logo"> -->
              <a href="<?php echo base_url('index'); ?>" target="_blank" id="brand-logo">
                <img src="<?php echo base_url(); ?>assets/admin/images/Visva_bharati_logo.jpg" alt="Visva Bharati" class="brand-img">
                <h5 class="brand-name">Visva-Bharati</h5>
                <p class="brand-tagline"><small>A Central University & an Institution of National Importance</small></p>
              </a>
            </div>
            <!-- <div class="col-sm-5 col-md-4">
              <div class="search_sectn">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
</header>

 <!-- /top navigation -->

<div class="inner-page-content-sectn student-dashboard">
      <div class="container-fluid">
        <div class="row">
          <div class="col-auto">
            <h6>Welcome, Admin</h6>
          </div>
          <div class="col">
            <!-- <a href="<?php echo base_url('admin_logout'); ?>" class="btn btn-outline-secondary btn-sm float-right" style="margin-top: -8px;">Log out</a> -->
                <div style="margin-top: -8px;" class="nav-item dropdown float-right">
                  <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a data-toggle="modal" data-target="#change_password" class="dropdown-item btn-sm" href="javascript:void(0)">Change Password</a>
                     <!-- <a href="#" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#change_password" style="margin-left: 15px;">Change Password</a> -->

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item btn-sm" href="<?php echo base_url('admin_logout'); ?>">Log out</a>
                  </div>
                </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-4 col-md-2">

              <?php if(backend_user_type()=='Admin'){ ?>


            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
             <!--  <a class="nav-link active" id="student-data-tab" data-toggle="pill" href="#student-data" role="tab" aria-controls="student-data" aria-selected="true">Student Data</a> -->
             <!--  <a class="nav-link <?php if($this->uri->segment(1) == 'admin-student-list') echo 'active'; ?>" id="student-data-tab" href="<?php echo base_url('admin-student-list'); ?>" role="tab" aria-controls="student-data" aria-selected="true">Applicants</a> -->
             
               <!-- <a class="nav-link" id="allotment-tab" data-toggle="pill" href="#allotment-card" role="tab" aria-controls="allotment" aria-selected="false">Allotment</a> -->
            
              <a class="nav-link <?php if($this->uri->segment(1) == 'admin-allotment-list') echo 'active'; ?>" id="allotment-tab" href="<?php echo base_url('admin-allotment-list'); ?>" role="tab" aria-controls="allotment" aria-selected="false">Allotment/Student Data</a>

              <a class="nav-link <?php if($this->uri->segment(1) == 'completed-students') echo 'active'; ?>" id="allotment-tab" href="<?php echo base_url('completed-students'); ?>" role="tab" aria-controls="allotment" aria-selected="false">Completed Students</a>
             
             <!--  <a class="nav-link <?php //if($this->uri->segment(1) == 'admin-payment-list') echo 'active'; ?>" id="payment-status-tab" href="<?php //echo base_url('admin-payment-list'); ?>" role="tab" aria-controls="payment-status" aria-selected="false">Payment Status</a> -->
              
              <a class="nav-link <?php if($this->uri->segment(1) == 'admin-allotmentcard-list') echo 'active'; ?>" id="allotment-card-tab" href="<?php echo base_url('admin-allotmentcard-list'); ?>" role="tab" aria-controls="allotment-card" aria-selected="false">Allotment Card</a>

             <!--  <a class="nav-link <?php //if($this->uri->segment(1) == 'admin-hostelcard-list') echo 'active'; ?>" id="hostel-card-tab" href="<?php //echo base_url('admin-hostelcard-list'); ?>" role="tab" aria-controls="hostel-card" aria-selected="false">Hostel Card</a> -->

             <!--  <a class="nav-link <?php if($this->uri->segment(1) == 'admin-notice-list') echo 'active'; ?>" id="notice-tab" href="<?php echo base_url('admin-notice-list'); ?>" role="tab" aria-controls="notice" aria-selected="false">Notice</a> -->

            <!--   <a class="nav-link <?php if($this->uri->segment(1) == 'admin-cms-list') echo 'active'; ?>" id="cms-tab" href="<?php echo base_url('admin-cms-list'); ?>" role="tab" aria-controls="cms" aria-selected="false">CMS</a> -->

              <!-- 04122020 -->
              <!--  <a class="nav-link <?php if($this->uri->segment(1) == 'admin-reissue-card-list') echo 'active'; ?>" id="card-reissue-tab" href="<?php echo base_url('admin-reissue-card-list'); ?>" role="tab" aria-controls="card-reissue" aria-selected="false">Reissue Card</a> -->

                <a class="nav-link <?php if($this->uri->segment(1) == 'admin-add-seat') echo 'active'; ?>" id="seat-tab" href="<?php echo base_url('admin-add-seat'); ?>" role="tab" aria-controls="seat" aria-selected="false">Seats <!-- Available --> Management </a>


                 <a class="nav-link <?php if($this->uri->segment(1) == 'admin-hostel-list') echo 'active'; ?>" id="hostel-tab" href="<?php echo base_url('admin-hostel-list'); ?>" role="tab" aria-controls="hostel" aria-selected="false"><?php //echo $hostel; ?> Hostel Details</a>
                 

                  <a class="nav-link <?php if($this->uri->segment(1) == 'admin-paymentoption-list') echo 'active'; ?>" id="role-tab" href="<?php echo base_url('admin-paymentoption-list'); ?>" role="tab" aria-controls="role" aria-selected="false">Payment Option</a>

              <a class="nav-link <?php if($this->uri->segment(1) == 'admin-payment-list') echo 'active'; ?>" id="payment-tab" href="<?php echo base_url('admin-payment-list'); ?>" role="tab" aria-controls="payment" aria-selected="false"><!-- All --> Defaulter Payment Report</a>
              
           
               <a class="nav-link <?php if($this->uri->segment(1) == 'admin-payment-report-list') echo 'active'; ?>" id="mess-payment-tab" href="<?php echo base_url('admin-payment-report-list'); ?>" role="tab" aria-controls="mess-payment" aria-selected="false">All Payment Report</a>

               <a class="nav-link <?php if($this->uri->segment(1) == 'admin-notice-send') echo 'active'; ?>" id="mess-payment-tab" href="<?php echo base_url('admin-notice-send'); ?>" role="tab" aria-controls="mess-payment" aria-selected="false">Bulk Notice</a>


              <a class="nav-link <?php if($this->uri->segment(1) == 'admin-complaint-list') echo 'active'; ?>" id="complaint-tab" href="<?php echo base_url('admin-complaint-list'); ?>" role="tab" aria-controls="complaint" aria-selected="false">Complaint</a>
              <a class="nav-link <?php if($this->uri->segment(1) == 'admin-role-list') echo 'active'; ?>" id="role-tab" href="<?php echo base_url('admin-role-list'); ?>" role="tab" aria-controls="role" aria-selected="false">Role Management</a>

              <a class="nav-link <?php if($this->uri->segment(1) == 'admin-administration-list') echo 'active'; ?>" id="administration-tab" href="<?php echo base_url('admin-administration-list'); ?>" role="tab" aria-controls="adminstration" aria-selected="false"><?php //echo $administration; ?> Administration</a>


             
              <a class="nav-link <?php if($this->uri->segment(1) == 'admin-add-setting') echo 'active'; ?>" id="setting-tab" href="<?php echo base_url('admin-add-setting'); ?>" role="tab" aria-controls="setting" aria-selected="false">Setting</a>



             
               

              
               
            </div>

            <?php }else{
              $backend_user_role = backend_user_role();
              //echo "<pre>"; print_r($backend_user_role); //die;
             ?>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <?php if(in_array('Student', $backend_user_role)){ ?>
              <a class="nav-link <?php if($this->uri->segment(1) == 'admin-allotment-list') echo 'active'; ?>" id="allotment-tab" href="<?php echo base_url('admin-allotment-list'); ?>" role="tab" aria-controls="allotment" aria-selected="false">Allotment/Student Data</a>
              <?php }if(in_array('Allotment', $backend_user_role)){ ?>                           
              <a class="nav-link <?php if($this->uri->segment(1) == 'admin-allotmentcard-list') echo 'active'; ?>" id="allotment-card-tab" href="<?php echo base_url('admin-allotmentcard-list'); ?>" role="tab" aria-controls="allotment-card" aria-selected="false">Allotment Card</a>
              <?php }if(in_array('Reissue', $backend_user_role)){ ?> 
              <a class="nav-link <?php if($this->uri->segment(1) == 'admin-reissue-card-list') echo 'active'; ?>" id="card-reissue-tab" href="<?php echo base_url('admin-reissue-card-list'); ?>" role="tab" aria-controls="card-reissue" aria-selected="false">Reissue Card</a>
              <?php }if(in_array('Application Payment', $backend_user_role)){ ?> 
               <a class="nav-link <?php if($this->uri->segment(1) == 'admin-payment-list') echo 'active'; ?>" id="payment-tab" href="<?php echo base_url('admin-payment-list'); ?>" role="tab" aria-controls="payment" aria-selected="false"><!-- All --> Defaulter Payment Report</a>
              <?php }if(in_array('All Payment', $backend_user_role)){ ?> 
              <a class="nav-link <?php if($this->uri->segment(1) == 'admin-payment-report-list') echo 'active'; ?>" id="mess-payment-tab" href="<?php echo base_url('admin-payment-report-list'); ?>" role="tab" aria-controls="mess-payment" aria-selected="false">All Payment Report</a>
              <?php } ?> 

            </div>
            <?php } ?>


</div>


 <!-- Modal -->
 <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form novalidate method="post" action="<?php echo base_url('change_password'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
         <div class="modal-body">
           <div class="row">
             
             <div class="col-md-12">
               <div class="form-row">
                 <div class="form-group col-md-12">
                   <label>Old Password</label>
                   <input type="text" class="form-control" name="old_password" id="old_password" placeholder="Enter Old Password">
                 </div>
               </div>
               <div class="form-row">
                 <div class="form-group col-md-12">
                   <label>New Password</label>
                   <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
                 </div>
               </div>
               <div class="form-row">
                 <div class="form-group col-md-12">
                   <label>Confirm Password</label>
                   <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="modal-footer">
           <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
           <input type="submit" name="add_save" id="add_save" class="btn btn-danger" value="Save" />
           <!-- <button type="button" class="btn btn-danger">Add Student</button> -->
         </div>
       </form>
     </div>
   </div>
 </div>

 <script>
 //validation for change password
   $("document").ready(function(){

           $("#addform").validate({
              rules:{
                 old_password:{
                   "required":true,
                   maxlength : 8
                 },
                 new_password:{
                   "required":true,
                     minlength : 6,
                     maxlength : 8
                 },
                 confirm_password:{
                   "required": true,
                   minlength : 6,
                   maxlength : 8,
                   equalTo : "#new_password"
                 }
               },
              messages:{
               old_password:{
                 "required":"Please Enter Old Password..!!"
               },
               new_password:{
                 "required":"Please Enter New Password..!!"
               },
               email:{
                 "required":"Please Enter Email..!!",
                 "remote":"Email Already Exists"
               },
               confirm_password:{
                 "required":"Please Enter Confirm Password..!!"
               } 
             }

           });

});
</script>



       <div class="col-sm-8 col-md-10">
            <div class="tab-content" id="v-pills-tabContent" style="min-height: 600px;">




