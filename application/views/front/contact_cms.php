 <div class="banner-slider inner-page-banner">
      <div class="banner">
        <img src="<?php echo base_url().'/assets/front/images/banner/6.jpg'; ?>" alt="" class="img-fluid">
        <!-- <div class="banner-info">
          <h3> <?php if(!empty($list)){ echo $list[0]->cms_title;} ?></h3>
        </div> -->
      </div>
    </div>

    <div class="inner-page-content-sectn">
      <div class="container">
        <!-- <div class="table-responsive"> -->
           <?php //if(!empty($list)){ echo $list[0]->cms_content;} ?>
           <div class="row">
           <div class="col-sm-6 col-md-6">
            <?php if(!empty($list)){ echo $list[0]->cms_content;} ?>
           </div>

           <div class="col-sm-6 col-md-6">
           <div class="card  bg-default mb-3">
            <div class="card-header">Message</div>
              <div class="card-body">
            <form id="messageForm" method="post" action="<?php echo base_url('front/add_message'); ?>" name="add-form"  enctype="multipart/form-data"> 
                <div id="responseStatus" class="form-group">
                                
                </div>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" required="required" name="name" id="name" class="form-control" placeholder="Enter Name" value="">                
                </div>
                <div class="form-group">
                  <label>Email Id</label>
                  <input type="email" required="required"  name="email_id" id="email_id" class="form-control" placeholder="Enter Email" value="">                
              </div>
              <div class="form-group">
                  <label>Contact Number</label>
                  <input type="text"  name="contact_number" id="contact_number" class="form-control" placeholder="Enter Contact Number" value="">                
                </div>
                <div class="form-group">
                  <label>Subject</label>
                  <input  type="text" required="required" name="subject" id="subject" class="form-control" placeholder="subject" value="">                
                </div>
              <div class="form-group">
                  <label>Message</label>   
                  <textarea required="required"  name="message" class="form-control" id="message"></textarea>        
              </div>
              <div class="form-group"> 
                <!-- <button id="btnSubmit" type="subject" class="btn btn-primary">Submit</button> -->
                <input class="btn btn-primary pull-right" type="submit" value="Submit" id="btnsubmit">
              </div>
              </form>
              </div>
           </div>
           </div>
        <!-- </div> -->
      </div>
    </div>
    <div class="googlemap">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3653.8930277622376!2d87.68778661509612!3d23.679783184624327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f9dcbc7d3f7def%3A0xa7ec725811c08522!2sVisva-Bharati!5e0!3m2!1sen!2sin!4v1529413202900" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      <div class="map-img"><img src="<?php //echo base_url().'/assets/image/'.$setting->image; ?>" alt="" class="img-thumbnail"></div>
    </div>

<script type="text/javascript">
  $("#messageForm").on('submit', function(e) {
      e.preventDefault();
      $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled')
      
      $.ajax({
          url: $(this).attr('action'),
          type: "post",
          data: $(this).serialize(),
          dataType: 'JSON',
          success: function(response) {
              console.log(response)
              if (response.res == "success") {
                $("#btnsubmit").val("Submit").removeAttr('disabled')
                $('#responseStatus').text('Successfully submit..');
              } else {
                $('#responseStatus').text('Try again..');
                  console.log('error')
              }
          }
      });
  });
</script>