<div class="tab-pane fade show active" id="student-data" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Complaints List</h4>
                  </div>
                  <div class="col">
                    <a href="#" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#add-admin-data" style="margin-left: 15px;">Add</a>
                    <!-- <a href="#" class="btn btn-secondary btn-sm float-right">Download</a> -->
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="add-admin-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New Complaint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-newcomplaint'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">
                            
                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>New Complaint</label>
                                  <input type="text" class="form-control" name="complaint_name" id="complaint_name" placeholder="Enter New Complaint">
                                </div>
                              </div>
                          
                            
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <input type="submit" name="add_admin" id="add_admin" class="btn btn-danger" value="Add Complaint" />
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
                  <!-- <table id="example1" class="table table-striped nowrap" style="font-size: 14px;"> -->
                    <table id="example1" class="table table-striped" style="font-size: 14px;">
                    <thead>
                      <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Complaint Name</th>
                       
                  
                      </tr>
                    </thead>
                    <tbody>


                      <?php if(!empty($all_data)){
                          $i=1;
                          foreach($all_data as $ad)
                          { ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $ad->complaint_name; ?></td>
                              
                              
                                <td> 
                                <!-- <a href="#" class="btn btn-secondary btn-sm " data-toggle="modal" data-target="#add-student-data">Edit</a> -->

                                 <a href="#" name="edit_ad" class="edit_button" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#edit-admin-data"><i class="far fa-edit"></i></a> 
                                 <a href="#" name="delete_ad" class="delete_button" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#delete-admin-data"><i class="fa fa-trash"></i></a>

                                  
                                </td>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Complaint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-newcomplaint'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">

                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                 
                                   <label>New Complaint</label>
                                  <input type="text" class="form-control" name="complaint_name" id="edit_complaint_name" placeholder="Enter New Complaint">
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
                   <form novalidate method="post" action="<?php echo base_url('admin-delete-newcomplaint'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 

                   
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
                  complaint_name:{
                    "required":true
                  }
                },
               messages:{
                complaint_name:{
                  "required":"Please Enter Complaint Name..!!"
                }
              }

            });

});
</script>


<script>
    $("document").ready(function(){

            $("#editform").validate({
               rules:{
                  complaint_name:{
                    "required":true
                  }
                },
               messages:{
                complaint_name:{
                  "required":"Please Enter Complaint Name..!!"
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
                    url: "<?php echo base_url('admin-newcomplaint-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                         
                          resultData = jQuery.parseJSON(resultData);
                         
                         
                          $('#edit_complaint_name').val(resultData.complaint_name);
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
                    url: "<?php echo base_url('admin-newcomplaint-details');?>",
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
                    url: "<?php echo base_url('admin-status-newcomplaint');?>",
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






              