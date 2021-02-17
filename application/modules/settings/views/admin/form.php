 <script>

      $( document ).ready(function() {
     
      CKEDITOR.replace( 'address' );
      CKEDITOR.replace( 'quote_context' );
      CKEDITOR.replace( 'hostel_rules_and_regulations' );
     
});


</script>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  
  <li class="nav-item">
    <a class="nav-link <?php if($this->uri->segment(1) == 'admin-add-setting') echo 'active'; ?>" id="setting-tab" href="<?php echo base_url('admin-add-setting'); ?>" aria-selected="false">Setting</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($this->uri->segment(1) == 'admin-cms-list') echo 'active'; ?>" id="cms-tab" href="<?php echo base_url('admin-cms-list'); ?>" aria-selected="false">CMS</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($this->uri->segment(1) == 'admin-notice-list') echo 'active'; ?>" id="notice-tab"  href="<?php echo base_url('admin-notice-list'); ?>"  aria-selected="false">Notice</a>
  </li>
</ul>

 <div class="" id="allotment-card" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Manage Settings</h4>
                  </div>
                  <div class="col">
                   
                  </div>
                </div>
                <hr>
               
                <form novalidate method="post" action="<?php echo base_url('admin-add-setting'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 

                <div class="row">

                  <div class="col-sm-7 col-md-8 col-lg-10">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Email Id</label>
                        <input type="text" name="email_id" id="email_id" class="form-control" placeholder="Enter Email Id." value="<?php echo (!empty($result->email_id)?$result->email_id:'') ?>" >
                      </div>
                      <div class="form-group col-md-6">
                        <label>Fax No</label>
                        <input type="text" name="fax" id="fax" class="form-control" placeholder="Enter Fax No" value="<?php echo (!empty($result->fax)?$result->fax:'') ?>" >
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Address</label>
                        <textarea class="form-control" placeholder="Enter Address" name="address" id="address"><?php echo (!empty($result->address)?$result->address:'') ?> </textarea>
                      </div>
                     
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Phone</label>
                     
                        <textarea class="form-control" placeholder="Enter Phone" name="phone" id="phone"><?php echo (!empty($result->phone)?$result->phone:'') ?> </textarea>
                      </div>
                     
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <label>Upload Image</label>
                          <input type="file" name="image" id="image" />

                          <input type="hidden" name="exist_image" id="exist_image" value="<?php echo (!empty($result->image)?$result->image:'') ?>" />

                          
                        </div>

                         <div class="form-group col-md-12">
                          
                           <img width="200px" height="200px" src="<?php echo base_url(); ?>assets/image/<?php echo (!empty($result->image)?$result->image:'') ?>" alt="" class="img-thumbnail img-fluid">
                        </div>
                               
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <label>Upload Quote Image</label>
                          <input type="file" name="quote_image" id="quote_image" />

                          <input type="hidden" name="exist_quote_image" id="exist_quote_image" value="<?php echo (!empty($result->quote_image)?$result->quote_image:'') ?>" />

                        </div>

                        <div class="form-group col-md-12">
                         
                           <img width="200px" height="200px" src="<?php echo base_url(); ?>assets/image/<?php echo (!empty($result->quote_image)?$result->quote_image:'') ?>" alt="" class="img-thumbnail img-fluid">
                        </div>
                               
                    </div>

                     <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Quote Content</label>
                     
                        <textarea class="form-control" placeholder="Enter Quote Content" name="quote_context" id="quote_context"><?php echo (!empty($result->quote_context)?$result->quote_context:'') ?> </textarea>
                      </div>
                     
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Hostel Card Rules And Regulations</label>
                     
                        <textarea class="form-control" placeholder="Enter Rules And Regulations" name="hostel_rules_and_regulations" id="hostel_rules_and_regulations"><?php echo (!empty($result->hostel_rules_and_regulations)?$result->hostel_rules_and_regulations:'') ?> </textarea>
                      </div>
                     
                    </div>

                   
           <input type="submit" name="add_admin" id="add_admin" class="btn btn-danger" value="Update Settings" />


        </div>
    </div>
  </form>

</div>



<script>
    $("document").ready(function(){

            $("#addform").validate({
               rules:{
                  email_id:{
                    "required":true,
                    "email": true
                  },
                  fax:{
                    "required":true
                  },
                  address:{
                    "required":true
                  },
                  phone:{
                    "required":true
                  },
                 /* image:{
                    "required":true
                  },
                  quote_image:{
                    "required":true
                  }*/
                },
               messages:{
                email_id:{
                  "required":"Please Enter Email Id..!!"
                },
                fax:{
                  "required":"Please Enter Fax..!!"
                },
                address:{
                  "required":"Please Enter Address..!!"
                },
                phone:{
                  "required":"Please Enter Phone..!!"
                },
                /*image:{
                  "required":"Please Enter Image..!!"
                },
                quote_image:{
                  "required":"Please Enter Quote Image..!!"
                }*/
              }

            });

});
</script>