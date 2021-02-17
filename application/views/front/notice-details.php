 <style>
 .card-img-top {
    width: 10%;
    border-top-left-radius: calc(.25rem - 1px);
    border-top-right-radius: calc(.25rem - 1px);
}

.notice_date{
  background-color: #4a473d;
  color: #fff;
}
</style>
 <div class="banner-slider inner-page-banner">
      <div class="banner">
        <img src="<?php echo base_url().'/assets/front/images/rules-banner-img.jpg'; ?>" alt="" class="img-fluid">
        <div class="banner-info">
          <h3> Notice</h3> 
        </div>
      </div>
    </div>

    <div class="inner-page-content-sectn">
      <div class="container">
        <?php if(!empty($notice_details)){ 

          foreach($notice_details as $notice){

        ?>
        <div>
        <span class="notice_date"><?php if(!empty($notice->notice_date)){ echo date('d F, Y',strtotime($notice->notice_date));} ?></span> | 
           <?php if(!empty($notice->notice_heading)){ echo $notice->notice_heading;} ?>
           <?php 
           if(!empty($notice->notice_attachment)){ ?>

           <?php if(!empty($notice->notice_attachment)){

                $attachments = explode(',',$notice->notice_attachment);
                $i = 0;
                foreach($attachments as $attachment)
                { ?>
               <a target="_blank" height="100px" width="100px" href="<?php echo base_url().'/assets/notice_attachments/'.$attachment; ?>" title="1">
                  Click Here To View PDF
                </a>
                <?php 
                $i++;
                }

                ?>
           

           <?php } ?>

           <?php }

           ?>
        </div>
        <?php }} ?>
      </div>
</div>



<script>
      $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        <?php
            if(!empty($notice_details)){
            foreach($notice_details as $data)
            { ?>

        $("#notice-group<?php echo $data->id; ?> .group<?php echo $data->id; ?>").colorbox({rel:'group<?php echo $data->id; ?>'});
        <?php }} ?>
      });
    </script>


