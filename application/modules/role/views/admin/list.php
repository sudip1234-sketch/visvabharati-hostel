<?php 
$is_subadmin = $this->session->userdata('is_subadmin'); 
?>
<div class="tab-pane fade show active" id="student-data" role="tabpanel">
  <div class="row">
    <div class="col-auto">
      <h4>Role Management</h4>
    </div>
    <div class="col">
       <?php if($is_subadmin == 'N'){ ?>
      <a href="#" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#add-admin-data" style="margin-left: 15px;">Add</a>
    <?php } ?>
     <!--  <a href="#" class="btn btn-secondary btn-sm float-right">Download</a> -->
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="add-admin-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form novalidate method="post" action="<?php echo base_url('admin-add-role'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
          <div class="modal-body">
            <div class="row">
              
              <div class="col-md-12">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Name</label>
                    <select class="form-control" name="is_subadmin" id="is_subadmin" placeholder="Please Select">
                      <option value="N">Admin</option>
                      <option value="Y">Subadmin</option>
                    </select>
                  </div>
                </div>
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
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
                  </div>
                </div>
               <!-- <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Fax</label>
                    <input type="text" class="form-control" name="fax" id="fax" placeholder="Enter Fax">
                  </div>
                </div>-->
             

               <!-- <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Roles</label>

                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customCheckboxInline8" name="role[]" class="custom-control-input" value="Student" >
                      <label class="custom-control-label" for="customCheckboxInline8">Allotment/Student Data</label>
                    </div>

                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customCheckboxInline9" name="role[]" class="custom-control-input" value="Allotment">
                      <label class="custom-control-label" for="customCheckboxInline9">Allotment Card</label>
                    </div>

                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customCheckboxInline10" name="role[]" class="custom-control-input" value="Reissue">
                      <label class="custom-control-label" for="customCheckboxInline10">Reissue Card</label>
                    </div>

                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customCheckboxInline11" name="role[]" class="custom-control-input" value="All Payment">
                      <label class="custom-control-label" for="customCheckboxInline11">All Payment Report</label>
                    </div>

                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customCheckboxInline12" name="role[]" class="custom-control-input" value="Application Payment">
                      <label class="custom-control-label" for="customCheckboxInline12">Application Payment Report </label>
                    </div>



                  </div>
                 
                </div>-->

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image" id="image" />
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
      <table id="example1" class="table table-striped" style="font-size: 14px;">
      <thead>
        <tr>
          <th scope="col">SL No</th>
          <th scope="col">Name</th>
          <th scope="col">Designation</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <!--<th scope="col">Fax</th>-->
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
                  <td><?php echo $ad->emailid; ?></td>
                  <td><?php echo $ad->phoneno; ?></td>
                  <!--<td><?php echo $ad->fax; ?></td>-->
                   <?php if($is_subadmin == 'N'){ ?>
                  <td>
                   <?php if($ad->status == '1'){ ?>
                       <a href="<?php echo base_url('admin-status-role');?>/<?php echo $ad->id; ?>" name="edit_status" class="edit_status btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" >Deactivate</a>                   
                   <?php }else{ ?>
                       <a href="<?php echo base_url('admin-status-role');?>/<?php echo $ad->id; ?>" name="edit_status" class="edit_status btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" >Activate</a>
                   <?php } ?>
                   
                      
                  </td>
                  <td> 
                   <a href="javascript:void(0)" onclick="getEdit('<?php echo $ad->id; ?>')" name="edit_ad" class="edit_button btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#edit-admin-data">Edit</a> 

                   <a href="javascript:void(0)" onclick="getDelete('<?php echo $ad->id; ?>')"  name="delete_ad" class="delete_button btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#delete-admin-data">Delete</a>

                    
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
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form novalidate method="post" action="<?php echo base_url('admin-add-role'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 
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
                     <input disabled type="email" class="form-control" name="email" id="edit_email" placeholder="Enter Email" >
                  
                  </div>
                 
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" id="edit_phone" placeholder="Enter Email" >
                    
                  </div>
                 
                </div>
                <!--<div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Fax</label>
                    
                    <input type="text" class="form-control" name="fax" id="edit_fax" placeholder="Enter Fax" >
                  </div>
                 
                </div>-->


                 <!--<div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Roles</label>

                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customCheckboxInline8_edit" name="role[]" class="custom-control-input roleCls" value="Student" >
                      <label class="custom-control-label" for="customCheckboxInline8_edit">Allotment/Student Data</label>
                    </div>

                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customCheckboxInline9_edit" name="role[]" class="custom-control-input roleCls" value="Allotment">
                      <label class="custom-control-label" for="customCheckboxInline9_edit">Allotment Card</label>
                    </div>

                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customCheckboxInline10_edit" name="role[]" class="custom-control-input roleCls" value="Reissue">
                      <label class="custom-control-label" for="customCheckboxInline10_edit">Reissue Card</label>
                    </div>

                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customCheckboxInline11_edit" name="role[]" class="custom-control-input roleCls" value="All Payment">
                      <label class="custom-control-label" for="customCheckboxInline11_edit">All Payment Report</label>
                    </div>

                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customCheckboxInline12_edit" name="role[]" class="custom-control-input roleCls" value="Application Payment">
                      <label class="custom-control-label" for="customCheckboxInline12_edit">Application Payment Report </label>
                    </div>



                  </div>
                 
                </div>-->

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Image</label>
                    <input type="file" name="image" id="edit_image" />
                  </div>
                  <div class="form-group col-md-12">

                   <img width="200px;" height="200px;" id="edit_admin_image" src="<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg" alt="" class="img-thumbnail img-fluid" >

                   <input type="hidden" name="admin_image_exist" id="admin_image_exist" value="" />

                  </div>
                 
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->

            <input type="hidden" name="ad_id" id="ad_id" value="">

            <input type="submit" name="edit_ad" id="edit_ad" class="btn btn-danger" value="Edit Role" />
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
     <form novalidate method="post" action="<?php echo base_url('admin-delete-role'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 

     
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
                  // email:{
                  //   "required":true,
                  //   "email": true
                  // },
                  email:{
                    "required": true,
                   // "email": true,
                     remote: {
                      url:"<?php echo base_url('admin-check-email-sub');?>",
                      type: "post",
                      data: {
                        field:"emailid",
                        value: function() {
                          return $( "#email" ).val();
                        }
                      }
                  }
                  },
                  phone:{
                    "required":true
                  },
                  fax:{
                    "required":true
                  },
                  image:{
                    "required":true
                  },
                  'role[]': {
                    required: true
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
                  "required":"Please Enter Email..!!",
                  "remote":"Email Already Exists"
                },
                phone:{
                  "required":"Please Enter Phone..!!"
                },
                fax:{
                  "required":"Please Enter Fax..!!"
                },
                image:{
                  "required":"Please Enter Image..!!"
                },
                'role[]': {
                  required: "You must check at least 1 box"
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
                  // email:{
                  //   "required":true,
                  //   "email": true
                  // },
                  phone:{
                    "required":true
                  },
                  fax:{
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
                // email:{
                //   "required":"Please Enter Email..!!"
                // },
                phone:{
                  "required":"Please Enter Phone..!!"
                },
                fax:{
                  "required":"Please Enter Fax..!!"
                }
              }

            });

});


$("document").ready(function(){

 $('#example1').DataTable();

   
  setTimeout(function() {
      $(".show_message").hide('blind', {}, 300)
  }, 3000);


});

function getEdit(ad_id) {
   var roleArr = [];
             
   $.ajax({ 
        type: 'POST',
        url: "<?php echo base_url('admin-role-details');?>",
        data: {  "id": ad_id},
        dataType: "text",
        success: function(resultData) {              
              resultData = jQuery.parseJSON(resultData);
              var src = '<?php echo base_url(); ?>assets/front/upload/administration/'+resultData.image;
              $("#edit_admin_image").attr("src",src);
              $("#admin_image_exist").val(resultData.image);
              $('#edit_name').val(resultData.name);
              $('#edit_designation').val(resultData.designation);
              $('#edit_email').val(resultData.emailid);
              $('#edit_phone').val(resultData.phoneno);
              //$('#edit_fax').val(resultData.fax);
              $('#ad_id').val(resultData.id); 

              var roleData = resultData.role;
              var roleArr = roleData.split("##");
             

               $(".roleCls").each(function(){
                  if (roleArr.indexOf($(this).val()) > -1) {
                      $(this).prop('checked', true);
                  } else {
                      $(this).prop('checked', false);
                  }
              });



      }
    
    });
}


function getDelete(id) {
  $('#del_ad_id').val(id); 
}

</script>






              