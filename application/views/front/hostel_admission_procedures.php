 <div class="banner-slider inner-page-banner">
      <div class="banner">
        <img src="<?php echo base_url().'/assets/front/images/banner/5.jpg'; ?>" alt="" class="img-fluid">
        <!-- <div class="banner-info">
          <h3> <?php //if(!empty($list)){ echo $list[0]->cms_title;} ?></h3>
        </div> -->
      </div>
    </div>

    <div class="inner-page-content-sectn">
      <div class="container">
        <div class="table-responsive">
           <?php if(!empty($list)){ echo $list[0]->cms_content;} ?>
        </div>
      </div>
    </div>