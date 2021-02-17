 <div class="banner-slider inner-page-banner">
      <div class="banner">
        <img src="<?php echo base_url().'/assets/front/images/banner/2.jpg' ?>" alt="" class="img-fluid">
        <!-- <div class="banner-info">
          <h3>Administration</h3>
        </div> -->
      </div>
    </div>

    <div class="inner-page-content-sectn">
      <div class="container">
        <div class="card-deck">

          <?php
            foreach($administration_data as $data)
            { ?>


          <!-- <div class="card">
            <img class="card-img-top" src="<?php echo base_url().'assets/front/upload/administration/'.$data->image; ?>" alt="">
            <div class="card-body">
              <h5 class="card-title"><?php echo $data->name; ?></h5>
              <h6><?php echo $data->designation; ?></h6>
              <hr>
              <h6>Email: <a href="mailto:<?php echo $data->email; ?>"><?php echo $data->email; ?></a></h6>
              <h6>Tel: <a href="tel:<?php echo $data->phone; ?>"><?php echo $data->phone; ?></a></h6>
              <h6>Fax: <a href="tel:<?php echo $data->fax; ?>"><?php echo $data->fax; ?></a></h6>
            </div>
          </div> -->

          <div class="profile-card">
            <div class="row">
              <div class="col-sm-2">
                <img class="card-img-top" src="<?php echo base_url().'assets/front/upload/administration/'.$data->image; ?>" alt="">
              </div>
              <div class="col-sm-10">
                <h5 class="card-title"><?php echo $data->name; ?></h5>
                <h6><?php echo $data->designation; ?></h6>
                <hr>
                <h6>Email: <a href="mailto:<?php echo $data->email; ?>"><?php echo $data->email; ?></a></h6>
                <h6>Tel: <a href="tel:<?php echo $data->phone; ?>"><?php echo $data->phone; ?></a></h6>
              </div>
            </div> 
          </div>



           <?php }?>


          <!-- <div class="card">
            <img class="card-img-top" src="<?php //echo base_url().'/assets/front/images/1.jpg'; ?>" alt="">
            <div class="card-body">
              <h5 class="card-title">Proctors Name</h5>
              <h6>Proctors</h6>
              <hr>
              <h6>Email: <a href="mailto:proctors@visva-bharati.ac.in">proctors@visva-bharati.ac.in</a></h6>
              <h6>Tel: <a href="tel:(91)(3463)262451">(91)(3463)262451</a></h6>
              <h6>Fax: <a href="tel:(91)(3463)262451">(91)(3463)262672</a></h6>
            </div>
          </div> -->
          <!-- <div class="card">
            <img class="card-img-top" src="<?php //echo base_url().'/assets/front/images/2.jpg'; ?>" alt="">
            <div class="card-body">
              <h5 class="card-title">Deputy Proctors Name</h5>
              <h6>Deputy Proctors</h6>
              <hr>
              <h6>Email: <a href="mailto:proctors@visva-bharati.ac.in">deputyproctors@visva-bharati.ac.in</a></h6>
              <h6>Tel: <a href="tel:(91)(3463)262451">(91)(3463)262562</a></h6>
              <h6>Fax: <a href="tel:(91)(3463)262451">(91)(3463)262783</a></h6>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="<?php //echo base_url().'/assets/front/images/3.jpg'; ?>" alt="">
            <div class="card-body">
              <h5 class="card-title">Teacher Warden Name</h5>
              <h6>Teacher Warden</h6>
              <hr>
              <h6>Email: <a href="mailto:proctors@visva-bharati.ac.in">warden@visva-bharati.ac.in</a></h6>
              <h6>Tel: <a href="tel:(91)(3463)262451">(91)(3463)262673</a></h6>
              <h6>Fax: <a href="tel:(91)(3463)262451">(91)(3463)262894</a></h6>
            </div>
          </div> -->
        </div>
      </div>
    </div>
