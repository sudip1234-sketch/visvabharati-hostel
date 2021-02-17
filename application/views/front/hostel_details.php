 <div class="banner-slider inner-page-banner">
      <div class="banner">
        <img src="<?php echo base_url().'/assets/front/images/administration-banner-img.jpg' ?>" alt="" class="img-fluid">
        <div class="banner-info">
          <h3>Hostel Listing</h3>
        </div>
      </div>
    </div>

    <div class="inner-page-content-sectn">
      <div class="container">
        <div class="card-deck">

          <?php
            if(!empty($hostel_details)){
            foreach($hostel_details as $data)
            { ?>

          <div class="profile-card" id="hostel-group<?php echo $data->id; ?>">
            <div class="row">
              <div class="col-sm-2">

                <?php

                $hostel_pics = explode(',',$data->hostel_pics);

                $i = 0;
                foreach($hostel_pics as $pics)
                { ?>

                 
                   <a href="<?php echo base_url().'/assets/hostel_pics/'.$pics ?>"  class="group<?php echo $data->id; ?> <?php if($i!=0){ echo 'no-display';} ?>" >
                <img class="card-img-top" src="<?php echo base_url().'/assets/hostel_pics/'.$pics ?>" alt="">
                </a>



                <?php 

                if($data->hostel_pics !=''){

                  if($i==0 && count($hostel_pics) > 0){

                   echo '<span style="color: #949494">image 1 of '.count($hostel_pics).'</span>';
                  }


                }

                
                ?>
                
                <?php 

                $i++;

                }

                ?>


              <!--   <a href="<?php //echo base_url().'/assets/front/images/1.jpg'; ?>" class="group1" title="1">
                <img class="card-img-top" src="<?php //echo base_url().'/assets/front/images/1.jpg'; ?>" alt="">
                </a>
                <a href="<?php //echo base_url().'/assets/front/images/2.jpg'; ?>" class="group1 no-display" title="2">
                <img class="card-img-top" src="<?php //echo base_url().'/assets/front/images/1.jpg'; ?>" alt="">
                </a>
                <a href="<?php //echo base_url().'/assets/front/images/3.jpg'; ?>" class="group1 no-display" title="3">
                <img class="card-img-top" src="<?php //echo base_url().'/assets/front/images/1.jpg'; ?>" alt="">
                </a> -->
              </div>
              <div class="col-sm-10">
                <h5 class="card-title"><?php echo $data->hostel_name; ?></h5>
                <h6><?php echo 'Hostel Code: '.$data->hostel_code; ?></h6>
                <h6><?php echo 'Total Seats: '.(!empty($data->total_seats)?$data->total_seats:0); ?></h6>
                <hr>
                <?php //echo wordwrap($data->hostel_description,45,"<br>\n"); ?>
                 <?php echo $data->hostel_description; ?>
               <!--  <ul>
                  <li>Facilities</li>
                  <li>Facilities</li>
                  <li>Facilities</li>
                  <li>Facilities</li>
                </ul> -->
              </div>
            </div> 
          </div>



           <?php
            }
            }
            ?>


        
        </div>
      </div>
    </div>

  <script>
      $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        <?php
            if(!empty($hostel_details)){
            foreach($hostel_details as $data)
            { ?>

        $("#hostel-group<?php echo $data->id; ?> .group<?php echo $data->id; ?>").colorbox({rel:'group<?php echo $data->id; ?>'});
        <?php }} ?>
      });
    </script>