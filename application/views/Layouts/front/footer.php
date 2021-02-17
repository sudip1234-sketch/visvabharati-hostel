  <?php

$where = array();
$where['id'] = '1';
$setting = $this->Frontmodel->load_settings($where);

$this->load->model('front/Frontmodel');
$main_heading     = $this->Frontmodel->load_main_menus();

?>
  <!-- <div class="googlemap">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3653.8930277622376!2d87.68778661509612!3d23.679783184624327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f9dcbc7d3f7def%3A0xa7ec725811c08522!2sVisva-Bharati!5e0!3m2!1sen!2sin!4v1529413202900" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      <div class="map-img"><img src="<?php //echo base_url().'/assets/image/'.$setting->image; ?>" alt="" class="img-thumbnail"></div>
    </div> -->




 <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <ul class="footer-links">

            <?php if(!empty($main_heading)){ 

                foreach($main_heading as $heading){ ?>

                    <?php if($heading->cms_slug == 'home'){ ?>

                   <li><a href="<?php echo base_url(''); ?>"><?php echo $heading->cms_title; ?></a></li>

                  <?php }elseif($heading->cms_slug == 'administration'){ ?>

                   <li><a href="<?php echo base_url('administration'); ?>"><?php echo $heading->cms_title; ?></a></li>

                  <?php }elseif($heading->cms_slug == 'hostels'){ ?>

                   <li><a href="<?php echo base_url('hostels'); ?>"><?php echo $heading->cms_title; ?></a></li>

                  <?php }else{ 

                      $parent_id   = $heading->id;
                      $sub_heading     = $this->Frontmodel->get_result_data('cms', ['parent_id' => $parent_id,'is_active' => '1']);

                    ?>

                     <?php foreach($sub_heading as $subheading){?>

                     <li><a href="<?php echo base_url('index/').$subheading->cms_slug; ?>"><?php echo $subheading->cms_title; ?></a></li>

                     <?php } ?>

                  <?php } ?>


                <?php } } ?>


           <!--    <li><a href="<?php //echo base_url(''); ?>">Home</a></li>
              <li><a href="<?php //echo base_url('about'); ?>">About</a></li>
              <li><a href="<?php //echo base_url('administration'); ?>">Administration</a></li>
              <li><a href="<?php //echo base_url('hostels'); ?>">Hostels</a></li>
              <li><a href="<?php //echo base_url('rulesandregulations'); ?>">Rules & Regulations</a></li> -->
            </ul>
          </div>
          <div class="col-sm-6 col-md-3">
            <ul class="footer-links">
             <!--  <li><a href="<?php echo base_url('admission'); ?>">Admission</a></li> -->

              <?php if(!empty($main_heading)){ 

                foreach($main_heading as $heading){ ?>

                    <?php if($heading->cms_slug == 'downloads'){

                      $parent_id   = $heading->id;
                      $sub_heading     = $this->Frontmodel->get_result_data('cms', ['parent_id' => $parent_id,'is_active' => '1']);

                    ?>

                     <?php foreach($sub_heading as $subheading){?>

                     <li><a href="<?php echo base_url('index/').$subheading->cms_slug; ?>"><?php echo $subheading->cms_title; ?></a></li>

                     <?php } ?>

                  <?php } ?>


                <?php } } ?>




              <!-- <li><a href="#">Downloads</a></li> -->
             <!--  <li><a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li> -->
            </ul>
          </div>
          <div class="col-sm-6 col-md-3">
            <!-- <p>
              Address :<br>
              VISVA-BHARATI<br>
              PO : Santiniketan<br>
              West Bengal, India<br>
              Pin 731235
            </p> -->

            <p>
              <?php echo (!empty($setting->address)?$setting->address:'');?>
            </p>
          </div>
          <div class="col-sm-6 col-md-3">  
           <!--  <p>
              Telephone :<br>
              EPABX +91(3463)262751 to 262756 (6 lines)
            </p> -->
             <p>
              Telephone :<br>
              <?php echo (!empty($setting->phone)?$setting->phone:'');?>
            </p>
           
            <p>
              Email:<br>
              <!-- <a href="mailto:info@visva-bharati.ac.in">info@visva-bharati.ac.in</a> -->
              <a href="mailto:<?php echo (!empty($setting->email_id)?$setting->email_id:'');?>"><?php echo (!empty($setting->email_id)?$setting->email_id:'');?></a>
            </p>
          </div>
        </div>
        <hr>
        <span class="copyright">Visva-Bharati, Official Site, Copyright © <?php echo  date('Y'); ?></span>
      </div>
    </footer>