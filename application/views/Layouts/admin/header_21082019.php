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
            <a href="<?php echo base_url('admin_logout'); ?>" class="btn btn-outline-secondary btn-sm float-right" style="margin-top: -8px;">Log out</a>
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
             
             <!--  <a class="nav-link <?php //if($this->uri->segment(1) == 'admin-payment-list') echo 'active'; ?>" id="payment-status-tab" href="<?php //echo base_url('admin-payment-list'); ?>" role="tab" aria-controls="payment-status" aria-selected="false">Payment Status</a> -->
              
              <a class="nav-link <?php if($this->uri->segment(1) == 'admin-allotmentcard-list') echo 'active'; ?>" id="allotment-card-tab" href="<?php echo base_url('admin-allotmentcard-list'); ?>" role="tab" aria-controls="allotment-card" aria-selected="false">Allotment Card</a>

             <!--  <a class="nav-link <?php //if($this->uri->segment(1) == 'admin-hostelcard-list') echo 'active'; ?>" id="hostel-card-tab" href="<?php //echo base_url('admin-hostelcard-list'); ?>" role="tab" aria-controls="hostel-card" aria-selected="false">Hostel Card</a> -->

             <!--  <a class="nav-link <?php if($this->uri->segment(1) == 'admin-notice-list') echo 'active'; ?>" id="notice-tab" href="<?php echo base_url('admin-notice-list'); ?>" role="tab" aria-controls="notice" aria-selected="false">Notice</a> -->

            <!--   <a class="nav-link <?php if($this->uri->segment(1) == 'admin-cms-list') echo 'active'; ?>" id="cms-tab" href="<?php echo base_url('admin-cms-list'); ?>" role="tab" aria-controls="cms" aria-selected="false">CMS</a> -->

               <a class="nav-link <?php if($this->uri->segment(1) == 'admin-reissue-card-list') echo 'active'; ?>" id="card-reissue-tab" href="<?php echo base_url('admin-reissue-card-list'); ?>" role="tab" aria-controls="card-reissue" aria-selected="false">Reissue Card</a>

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

       <div class="col-sm-8 col-md-10">
            <div class="tab-content" id="v-pills-tabContent" style="min-height: 600px;">

