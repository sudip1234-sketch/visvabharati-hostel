<?php

$this->load->model('front/Frontmodel');
$main_heading     = $this->Frontmodel->load_main_menus();

?>
<header>
      <div class="headerTop">
        <div class="container">
          <div class="row">
            <div class="col-sm-7 col-md-8">
              <a  href="<?php echo base_url('index'); ?>"  id="brand-logo">
                <img src="<?php echo base_url().'/assets/front/images/Visva_bharati_logo.jpg'; ?>" alt="Visva Bharati" class="brand-img">
                <h5 class="brand-name">Visva-Bharati</h5>
                <p class="brand-tagline"><small>A Central University & an Institution of National Importance</small></p>
              </a>
            </div>
            <div class="col-sm-5 col-md-4">
              <!-- <div class="search_sectn">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div> -->
            </div>
            <?php if ($this->session->userdata('front') != null) { ?>
            <!-- <div class="col">
              <i class="float-right" class="fa fa-user" aria-hidden="true"></i>
           
          </div> -->
            <div class="col">

            <div style="margin-top: -8px;" class="nav-item dropdown float-right">
              <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $this->session->userdata('userFullName'); ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item btn-sm" href="<?php echo base_url('edit-profile'); ?>">Edit Profile</a>
                <a data-toggle="modal" data-target="#change_password" class="dropdown-item btn-sm" href="<?php echo base_url('edit-profile'); ?>">Change Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item btn-sm" href="<?php echo base_url('logout'); ?>">Log out</a>
              </div>
            </div>
            <a href="<?php echo base_url('student-profile'); ?>" class="btn btn-outline-secondary btn-sm float-right log-user" style="margin-top: -8px;"><i class="fa fa-user float-right" aria-hidden="true"></i></a>
            <!-- <a href="<?php echo base_url('logout'); ?>" class="btn btn-outline-secondary btn-sm float-right" style="margin-top: -8px;">Log out</a> -->
          </div>
          <?php } ?>
          </div>
        </div>
      </div>
      <div class="container">
        <nav class="navbar theme-navbar navbar-expand-lg navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

              <?php if(!empty($main_heading)){ 

                foreach($main_heading as $heading){ ?>


                <li class="nav-item dropdown">


                  <?php if($heading->cms_slug == 'home'){ ?>

                    <li class="nav-item <?php if($this->uri->segment(1) == ''){ echo 'active';} ?>">
                      <a class="nav-link" href="<?php echo base_url(''); ?>"><?php echo $heading->cms_title; ?></a>
                    </li>

                  <?php }elseif($heading->cms_slug == 'about'){ ?>

                    <li class="nav-item <?php if($this->uri->segment(1) == 'about'){ echo 'active';} ?>">
                        <a class="nav-link" href="<?php echo base_url('about'); ?>"><?php echo $heading->cms_title; ?></a>
                    </li>

                  <?php }elseif($heading->cms_slug == 'administration'){ ?>

                    <li class="nav-item <?php if($this->uri->segment(1) == 'administration'){ echo 'active';} ?>">
                        <a class="nav-link" href="<?php echo base_url('administration'); ?>"><?php echo $heading->cms_title; ?></a>
                    </li>

                  <?php }elseif($heading->cms_slug == 'hostels'){ ?>

                    <li class="nav-item <?php if($this->uri->segment(1) == 'hostels'){ echo 'active';} ?>">
                      <a class="nav-link" href="<?php echo base_url('hostels'); ?>"><?php echo $heading->cms_title; ?></a>
                    </li>

                    <?php }elseif($heading->cms_slug == 'rules-and-regulations'){ ?>

                    <li class="nav-item <?php if($this->uri->segment(1) == 'rulesandregulations'){ echo 'active';} ?>">
                      <a class="nav-link" href="<?php echo base_url('rulesandregulations'); ?>"><?php echo $heading->cms_title; ?></a>
                    </li>

                    <?php }elseif($heading->cms_slug == 'hostel-admission-procedures'){ ?>

                    <li class="nav-item <?php if($this->uri->segment(1) == 'hostelallotment'){ echo 'active';} ?>">
                      <a class="nav-link" href="<?php echo base_url('hostelallotment'); ?>"><?php echo $heading->cms_title; ?></a>
                    </li>

                    <?php }elseif($heading->cms_slug == 'contact-us'){ ?>

                    <li class="nav-item <?php if($this->uri->segment(1) == 'contact'){ echo 'active';} ?>">
                      <a class="nav-link" href="<?php echo base_url('contact'); ?>"><?php echo $heading->cms_title; ?></a>
                    </li>

                  <?php }else{ ?>

                    <li class="nav-item <?php if($this->uri->segment(1) == 'download-details'){ echo 'active';} ?>">
                      <a class="nav-link" href="<?php echo base_url('download-details'); ?>">Download</a>
                    </li>

                  <?php } ?>


              
                <?php
               
                 }
                 } ?>

            </ul>
          </div>


         <!--  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item <?php if($this->uri->segment(1) == ''){ echo 'active';} ?>">
                <a class="nav-link" href="<?php echo base_url(''); ?>">Home</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == 'about'){ echo 'active';} ?>">
                <a class="nav-link" href="<?php echo base_url('about'); ?>">About</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == 'administration'){ echo 'active';} ?>">
                <a class="nav-link" href="<?php echo base_url('administration'); ?>">Administration</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == 'hostels'){ echo 'active';} ?>">
                <a class="nav-link" href="<?php echo base_url('hostels'); ?>">Hostels</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == 'rulesandregulations'){ echo 'active';} ?>">
                <a class="nav-link" href="<?php echo base_url('rulesandregulations'); ?>">Rules & Regulations</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(1) == 'admission'){ echo 'active';} ?>" href="<?php echo base_url('admission'); ?>">Admission</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Downloads
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Download link</a>
                  <a class="dropdown-item" href="#">Download link</a>
                  <a class="dropdown-item" href="#">Download link</a>
                </div>
              </li>
              <li class="nav-item">
                 <a class="nav-link <?php if($this->uri->segment(1) == 'contact-us'){ echo 'active';} ?>" href="<?php echo base_url('contact-us'); ?>">Contact Us</a>
              </li>
            </ul>
          </div> -->
        </nav>
      </div>
    </header>

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
       <form novalidate method="post" action="<?php echo base_url('student_change_password'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
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