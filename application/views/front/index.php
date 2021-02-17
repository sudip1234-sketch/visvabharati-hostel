<?php
  $where = array();
  $where['id'] = '1';
  $setting = $this->Frontmodel->load_settings($where);
?>
<style type="text/css">
  .slick-dots{display: none !important;}
</style>

<div class="banner-slider">
      <div class="banner">
        <img src="<?php echo base_url().'/assets/front/images/banner-img1.jpg';?>" alt="" class="img-fluid">
        <div class="banner-info">
         
          <p class="d-none d-sm-block"><b><i>“Yes, we must know that within us we have that where space and time cease to rule and where the links of evolution are merged in unity”.</i></b> <i> Rabindranath Tagore</i </p>
        </div>
      </div>
      <div class="banner">
        <img src="<?php echo base_url().'/assets/front/images/banner-img2.jpg';?>" alt="" class="img-fluid">
        <div class="banner-info">
          
          <p class="d-none d-sm-block"><b><i>“The highest education is that which does not merely give us information but makes our life in harmony with all existence”.</i></b> <i> Rabindranath Tagore</i></p>
        </div>
      </div>
      <div class="banner">
        <img src="<?php echo base_url().'/assets/front/images/banner-img3.jpg';?>" alt="" class="img-fluid">
        <div class="banner-info">
          
          <p class="d-none d-sm-block"><b><i>“You can't cross the sea merely by standing and staring at the water.” </i></b> <i> Rabindranath Tagore</i></p>
        </div>
      </div>
      <div class="banner">
        <img src="<?php echo base_url().'/assets/front/images/banner-img4.jpg';?>" alt="" class="img-fluid">
        <div class="banner-info">
          
          <p class="d-none d-sm-block"><b><i>“Everything comes to us that belongs to us if we create the capacity to receive it.” </i></b> <i> Rabindranath Tagore</i></p>
        </div>
      </div>
      <div class="banner">
        <img src="<?php echo base_url().'/assets/front/images/banner-img5.jpg';?>" alt="" class="img-fluid">
        <div class="banner-info">
          
          <p class="d-none d-sm-block"><b><i>“By plucking her petals you do not gather the beauty of the flower.”</i></b>  <i> Rabindranath Tagore</i></p>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <?php if($this->session->userdata('front') == null){ ?>
            <div class="col-md-7 col-lg-8">
        <?php }else{ ?>
            <div class="col-md-12 col-lg-12">
        <?php } ?>
       
          <div class="card text-white bg-info mb-3 notice_sectn">
            <div class="card-header">Important Notice</div>
            <div class="card-body">
              <div class="notice-slider">


                <?php if(!empty($notice_list)){ 
                    foreach($notice_list as $notice)
                    { ?>

                      <div class="notice">
                        <p class="notice-date"><i><?php echo date('j F, Y',strtotime($notice->notice_date)); ?></i></p>
                        <h6 class="notice-heading"><?php echo $notice->notice_heading; ?></h6>
                        <p class="notice-short-info"><?php echo $string = (strlen($notice->notice_content) > 100) ? substr($notice->notice_content,0,100).'...' : $notice->notice_content; ?></p>
                        <a href="<?php echo base_url('notice-details/'); ?>"><u>Read more</u></a>  
                      </div>


                    <?php }
                  } ?>


                  
              </div> 
              <br>
                <div class="notice">
                      <p class="notice-date"><i><?php echo date('j F, Y',strtotime(@$notice_list[0]->notice_date)); ?></i></p>
                      <h6 class="notice-heading"><?php echo @$notice_list[0]->notice_heading; ?></h6>
                      <?php
                          $attachments = explode(',',@$notice_list[0]->notice_attachment);
                       ?>
                      <a target="_blank" href="<?php echo base_url().'assets/notice_attachments/'.@$attachments[0]; ?>"><u>View PDF</u></a> 
                </div>
            </div>
          </div>
        </div>

        <?php if ($this->session->userdata('front') == null) { ?>
        <div class="col-md-5 col-lg-4">
          <div class="card text-white bg-primary mb-3 login_sectn">
            <div class="card-header">Student Login 
             <a class="btn btn-sm btn-light float-right" href="<?php echo base_url('student-form'); ?>"> Apply For Hostel </a> 
            </div>
            <div class="card-body">
              <form method="post" action="<?php echo base_url('login'); ?>">
                <div class="form-group">
                  <label>Student Id</label>
                  <input type="text" name="student_id" id="student_id" class="form-control" placeholder="Enter Id" value="">                
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="">                
                </div>
                <button type="submit" class="btn btn-light">Login</button>
                <!-- <a href="student-dashboard.html" class="btn btn-light">Login</a> -->
                &nbsp; 
                <!-- <a href="#" class="forgot-password" style="color: #fff;"><small><u>Forgot Password?</u></small></a> -->
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <!-- <div class="card text-white bg-secondary mb-3 quote_sectn ">
        <div class="card-header">Quote</div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3 col-lg-2">
              <img src="<?php echo base_url().'/assets/image/'.$setting->quote_image; ?>" alt="" class="img-thumbnail img-fluid">
            </div>
            <div class="col-sm-9 col-lg-10">  -->
              <!-- <h3 class="quote">“Visva-Bharati represents India where she has her wealth of mind which is for all. Visva-Bharati acknowledges India's obligation to offer to others the hospitality of her best culture and India's right to accept from others their best”</h3> -->

              <!-- <h3 class="quote">“<?php echo (!empty($setting->quote_context)?$setting->quote_context:'');?>”</h3>
              <img src="images/Rabindranath-Tagore_sign-white.png" alt="" class="sign float-right" height="50px">
            </div>
          </div>
        </div>
      </div> -->
    </div>
 