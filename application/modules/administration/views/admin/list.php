<?php 
$is_subadmin = $this->session->userdata('is_subadmin'); 
?>
<script>
$( document ).ready(function() {
    CKEDITOR.replace( 'cms_content' );
});


function edit_text() {
    CKEDITOR.replace( 'edit_cms_content' );
}

</script>

<div class="tab-pane fade show active" id="student-data" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Administration List</h4>
                  </div>
                  <div class="col">
                  <?php if($is_subadmin == 'N'){ ?>
                    <a href="#" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#add-admin-data" style="margin-left: 15px;">Add</a>
                    <?php } ?>
                    <!-- <a href="#" class="btn btn-secondary btn-sm float-right">Download</a> -->
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="add-admin-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Administration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-administration'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">
                            
                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Name</label>
                                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Designation</label>
                                  <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Designation">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Email</label>
                                  <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Phone</label>
                                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Fax</label>
                                  <input type="text" class="form-control" name="fax" id="fax" placeholder="Enter Fax">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Administration Type</label>
                                  <select class="custom-select" name="administration_type" id="administration_type">
                                    <option selected>Choose...</option>

                                        <option  value="warden">Warden</option>
                                        <option  value="faculty">Faculty</option>
                                   
                                  </select>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Image</label>
                                  <input type="file" class="form-control" name="image" id="image" />
                                  <span style="color:#007bff">Image Size (460 X 460)px</span>
                                </div>
                               
                              </div>

                             
                            
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <input type="submit" name="add_admin" id="add_admin" class="btn btn-danger" value="Add Administrator" />
                          <!-- <button type="button" class="btn btn-danger">Add Student</button> -->
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="table-responsive">
                  <?php 

                  if($this->session->flashdata('successmessage'))
                  {
                    echo '<span class="show_message" style="color:green;">'.$this->session->flashdata('successmessage').'</span>'; 
                  }
                  
                  ?>

                  <?php 

                  if($this->session->flashdata('errormessage'))
                  {
                    echo '<span class="show_message" style="color:red;">'.$this->session->flashdata('errormessage').'</span>'; 
                  }
                  
                  ?>
                  <table id="example1" class="table table-striped nowrap" style="font-size: 14px;">
                    <thead>
                      <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Fax</th>
                        <?php if($is_subadmin == 'N'){ ?>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>


                      <?php if(!empty($all_data)){
                          $i=1;
                          foreach($all_data as $ad)
                          { ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $ad->name; ?></td>
                                <td><?php echo $ad->designation; ?></td>
                                <td><?php echo $ad->email; ?></td>
                                <td><?php echo $ad->phone; ?></td>
                                <td><?php echo $ad->fax; ?></td>
                                <?php if($is_subadmin == 'N'){ ?>
                                <td>
                                 <?php if($ad->is_active == '1'){ ?>

                                     <a href="#" name="edit_stat" class="edit_status btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" >Deactivate</a>

                                    <!--  <i title="Deactivate" class="fa fa-close" aria-hidden="false" class="edit_status" ad_id="<?php //echo $ad->id; ?>" ></i>
 -->
                                 <?php }else{ ?>

                                     <a href="#" name="edit_stat" class="edit_status btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" >Activate</a>

                                    <!--  <i title="Activate" class="fa fa-check" aria-hidden="false" class="edit_status" ad_id="<?php //echo $ad->id; ?>" ></i> -->


                                 <?php } ?>
                                 
                                    
                                </td>
                                <td> 
                                <!-- <a href="#" class="btn btn-secondary btn-sm " data-toggle="modal" data-target="#add-student-data">Edit</a> -->

                                 <a href="#" name="edit_ad" class="edit_button btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#edit-admin-data"><i class="far fa-edit"></i></a> 
                                 <a href="#" name="delete_ad" class="delete_button btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#delete-admin-data"><i class="fa fa-trash"></i></a>

                                  
                                </td>
                                <?php } ?>
                            </tr>

                          <?php 
                          $i++;
                        }

                      } ?>
                     
                    </tbody>
                  </table>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="edit-admin-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Administration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-administration'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">

                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Name</label>
                                  <input type="text" class="form-control" name="name" id="edit_name" placeholder="Enter Name" value="">
                                </div>
                              </div>
                               <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Designation</label>
                                  <input type="text" class="form-control" name="designation" id="edit_designation" placeholder="Enter Designation" >
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Email</label>
                                   <input type="text" class="form-control" name="email" id="edit_email" placeholder="Enter Email" >
                                
                                </div>
                               
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Phone</label>
                                  <input type="text" class="form-control" name="phone" id="edit_phone" placeholder="Enter Email" >
                                  
                                </div>
                               
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Fax</label>
                                  
                                  <input type="text" class="form-control" name="fax" id="edit_fax" placeholder="Enter Fax" >
                                </div>
                               
                              </div>

                               <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Administration Type</label>
                                  <select class="custom-select" name="administration_type" id="edit_administration_type">
                                   
                                        <option value="warden">Warden</option>
                                        <option value="faculty">Faculty</option>
                                   
                                  </select>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Image</label>
                                  <input type="file" name="image" id="edit_image" />
                                  <span style="color:#007bff">Image Size (460 X 460)px</span>
                                </div>
                                <div class="form-group col-md-12">

                                 <img id="edit_admin_image" src="<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg" alt="" class="img-thumbnail img-fluid">

                                 <input type="hidden" name="admin_image_exist" id="admin_image_exist" value="" />

                                </div>
                               
                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->

                          <input type="hidden" name="ad_id" id="ad_id" value="">

                          <input type="submit" name="edit_ad" id="edit_ad" class="btn btn-danger" value="Save" />
                          <!-- <button type="button" class="btn btn-danger">Add Student</button> -->
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


              <div class="modal fade" id="delete-admin-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                   <form novalidate method="post" action="<?php echo base_url('admin-delete-administration'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 

                   
                        <div class="modal-body">
                          <div class="row">

                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Do you want to delete this data ?</label>
                                  
                                </div>
                              </div>
                             
                            
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                         
                          <input type="hidden" name="del_ad_id" id="del_ad_id" value="">
                          <input type="submit" name="delete_ad" id="delete_ad" class="btn btn-danger" value="Confirm" />
                         
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


               
                <div class="clearfix"></div>
              </div>


<script>
    $("document").ready(function(){

            $("#addform").validate({
               rules:{
                  name:{
                    "required":true
                  },
                  designation:{
                    "required":true
                  },
                  email:{
                    "required":true,
                    "email": true
                  },
                  phone:{
                    "required":true
                  },
                  fax:{
                    "required":true
                  },
                  administration_type:{
                    "required":true
                  },
                  image:{
                    "required":true
                  }
                },
               messages:{
                name:{
                  "required":"Please Enter Name..!!"
                },
                designation:{
                  "required":"Please Enter Designation..!!"
                },
                email:{
                  "required":"Please Enter Email..!!"
                },
                phone:{
                  "required":"Please Enter Phone..!!"
                },
                fax:{
                  "required":"Please Enter Fax..!!"
                },
                administration_type:{
                  "required":"Please Select Administration Type..!!"
                },
                image:{
                  "required":"Please Enter Image..!!"
                }
              }

            });

});
</script>


<script>
    $("document").ready(function(){

            $("#editform").validate({
               rules:{
                  name:{
                    "required":true
                  },
                  designation:{
                    "required":true
                  },
                  email:{
                    "required":true,
                    "email": true
                  },
                  phone:{
                    "required":true
                  },
                  fax:{
                    "required":true
                  },
                  administration_type:{
                    "required":true
                  }
                },
               messages:{
                name:{
                  "required":"Please Enter Name..!!"
                },
                designation:{
                  "required":"Please Enter Designation..!!"
                },
                email:{
                  "required":"Please Enter Email..!!"
                },
                phone:{
                  "required":"Please Enter Phone..!!"
                },
                fax:{
                  "required":"Please Enter Fax..!!"
                },
                administration_type:{
                  "required":"Please Select Administration Type..!!"
                }
              }

            });

});
</script>



<script>

  $(document).ready(function() {
    $('#example').DataTable();
  });


  $("document").ready(function(){

      $('.edit_button').click(function() {
                
                var ad_id = $(this).attr('ad_id');

                //alert(cms_id);

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-administration-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          //alert(resultData);
                          resultData = jQuery.parseJSON(resultData);
                          var src = '<?php echo base_url(); ?>assets/front/upload/administration/'+resultData.image;
                          $("#edit_admin_image").attr("src",src);
                          $("#admin_image_exist").val(resultData.image);
                          $('#edit_name').val(resultData.name);
                          $('#edit_designation').val(resultData.designation);
                          $('#edit_email').val(resultData.email);
                          $('#edit_phone').val(resultData.phone);
                          $('#edit_fax').val(resultData.fax);


                          $('#edit_administration_type').filter(function() { 

                              return ($(this).val() == resultData.administration_type); //To select Administration Type
                          }).prop('selected', true);


                          $('#ad_id').val(resultData.id);

                          
                  }
                
                });

                saveData.error(function() { alert("Something went wrong"); });

});

});

$("document").ready(function(){

      $('.delete_button').click(function() {
                
                var ad_id = $(this).attr('ad_id');

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-administration-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          //alert(resultData);
                          resultData = jQuery.parseJSON(resultData);
                          $('#del_ad_id').val(resultData.id);
                          
                  }
                
                });

                saveData.error(function() { alert("Something went wrong"); });

});

});


  $("document").ready(function(){

      $('.edit_status').click(function() {
                
                var ad_id = $(this).attr('ad_id');

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-status-administration');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                         // alert(resultData);
                          resultData = jQuery.parseJSON(resultData);
                          //alert(resultData);

                          if(resultData == '1')
                          {
                            location.reload(true);
                          }
                          

                  }
                
                });

                saveData.error(function() { alert("Something went wrong"); });

});

});

</script>

<script>

$(document).ready(function() {
    $('#example1').DataTable();
} );


$(function() {
   
    setTimeout(function() {
        $(".show_message").hide('blind', {}, 300)
    }, 3000);
});

</script>