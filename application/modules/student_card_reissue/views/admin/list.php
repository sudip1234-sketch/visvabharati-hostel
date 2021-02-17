<?php 
$is_subadmin = $this->session->userdata('is_subadmin'); 
?>
<div class="tab-pane fade show active" id="student-data" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Reissue Card List</h4>
                  </div>
                  <div class="col">
                    <!-- <a href="#" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#add-admin-data" style="margin-left: 15px;">Add</a>
                    <a href="#" class="btn btn-secondary btn-sm float-right">Download</a> -->
                  <!--   <a href="<?php //echo base_url('admin-newcomplaint-list'); ?>" class="btn btn-secondary btn-sm float-right" style="margin-left: 15px;">Add Complaint</a> -->
                  </div>
                </div>
               
                <hr>
                <div class="">
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
                        <th scope="col">Student Id</th>
                        <th scope="col">Name</th>
                       <!--  <th scope="col">Reason</th> -->
                        <th scope="col">Re Issue Count</th>
                        <th scope="col">View Details</th>
                         <?php if($is_subadmin == 'N'){ ?>
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
                                <td><?php echo $ad->studentid; ?></td>
                                <td><?php echo $ad->full_name; ?></td>
                                <!-- <td><?php //echo $ad->reason; ?></td> -->
                                <td><?php echo $ad->reissue_count; ?></td>
                                <td>
                                 <a href="#" name="edit_ad" tooltip="View Details" class="edit_button" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#edit-admin-data"><i class="fas fa-eye"></i></a>
                               </td>


                               <!--   <td>
                                 <?php if($ad->is_read == '1'){ ?>

                                     <a href="#" name="edit_read" tooltip="Read" class="edit_read btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" ><i class="fa fa-envelope-open" aria-hidden="true"></i></a>

                                    
                                 <?php }else{ ?>

                                     <a href="#" name="edit_read" tooltip="Not Read" class="edit_read btn btn-danger btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" ><i class="fa fa-envelope" aria-hidden="true"></i></a>

                                 <?php } ?>
                                 
                                    
                                </td> -->


                            <!--     <td>
                                 <?php if($ad->is_active == '1'){ ?>

                                     <a href="#" name="edit_stat" class="edit_status btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" >Deactivate</a>

                                 <?php }else{ ?>

                                     <a href="#" name="edit_stat" class="edit_status btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" >Activate</a>


                                 <?php } ?>
                                 
                                    
                                </td> -->
                                 <?php if($is_subadmin == 'N'){ ?>
                                <td> 
                               
                                 <?php if($ad->is_new == '1'){ ?>

                                    <!--  <a href="#" name="edit_stat" class="btn btn-danger btn-sm" ad_id="<?php echo $ad->id; ?>" >New</a>
 -->
 <span style="background:#FF5050; padding: 5px 10px; height: 15px;">New</span>

                                     <a href="#" name="reissue_card" class="reissue_card btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" >Reissue</a>

                                 <?php } ?>

                                  <?php if($ad->is_issued == '1'){ ?>

                                    
                                     <a href="#" name="reissued_card" class="btn btn-secondary btn-sm" ad_id="<?php echo $ad->id; ?>" >Reissued</a>

                                 <?php } ?>
                                 

                                 <!-- <a href="#" name="delete_ad" tooltip="Delete" class="" ad_id="<?php //echo $ad->id; ?>" data-toggle="modal" data-target="#delete-admin-data"><i class="fa fa-trash"></i></a> -->

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
                        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
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
                                  <label>Reason</label>
                                  <input type="text" class="form-control" name="reason" id="edit_reason" placeholder="Enter Reason" disabled >
                                </div>
                              </div>
                              
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Uploaded GD File </label>
                                  
                                  <img id="edit_profile_image" src="" alt="" class="img-thumbnail img-fluid">
                                </div>
                               
                              </div>
                          

                            
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" id="complaint_read"  onClick="window.location.reload()" class="btn btn-danger" data-dismiss="modal">Re-Issue</button>
 -->
                         <!--  <button type="button" id="complaint_already_read"   onClick="window.location.reload()" class="btn btn-secondary" data-dismiss="modal">Already Re-</button> -->

                          <input type="hidden" name="ad_id" id="ad_id" value="">

                         <!--  <input type="submit" name="edit_ad" id="edit_ad" class="btn btn-danger" value="Edit Administration" /> -->
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                   <form novalidate method="post" action="<?php echo base_url('admin-delete-complaint'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 

                   
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
                    "required":true
                  },
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
                email:{
                  "required":"Please Enter Email..!!"
                },
                phone:{
                  "required":"Please Enter Phone..!!"
                },
                fax:{
                  "required":"Please Enter Fax..!!"
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
                  cms_content:{
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

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-reissue-card-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                        
                          resultData = jQuery.parseJSON(resultData);

                          $('#edit_reason').val(resultData.reason);
                          if(resultData.image)
                          {
                            src = '<?php echo base_url(); ?>assets/reissue_doc/'+resultData.image;
                          }

                          $("#edit_profile_image").attr("src",src);

                          
                        
                        /*  $('#edit_reason').val(resultData.reason);
                          $('#edit_complaint').val(resultData.complaint_name);
                          $('#edit_description').val(resultData.complaint_description);

                          if(resultData.is_read == 1)
                          { 
                            $('#complaint_read').css('display','none');
                            $('#complaint_already_read').css('display','block');
                          }
                          if(resultData.is_read == 0)
                          { 
                            $('#complaint_read').css('display','block');
                            $('#complaint_already_read').css('display','none');
                          }*/
                          
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
                    url: "<?php echo base_url('admin-complaint-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          resultData = jQuery.parseJSON(resultData);
                          $('#del_ad_id').val(resultData.id);
                          
                  }
                
                });

                saveData.error(function() { alert("Something went wrong"); });

});

});


 $("document").ready(function(){

      $('.reissue_card').click(function() {


                var ad_id = $(this).attr('ad_id');

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-reissue-card');?>",
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


  $("document").ready(function(){

      $('.edit_read').click(function() {
                
                var ad_id = $(this).attr('ad_id');

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-status-student');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          //alert(resultData);
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








              