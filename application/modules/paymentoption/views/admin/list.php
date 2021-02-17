<?php 
$is_subadmin = $this->session->userdata('is_subadmin'); 
?>
<div class="tab-pane fade show active" id="student-data" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Payment Option List</h4>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New Payment Option</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-paymentoption'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">
                            
                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>New Payment Option</label>
                                  <input type="text" class="form-control" name="option_name" id="option_name" placeholder="Enter New Payment Option">
                                </div>
                              </div>
                                <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Amount</label>
                                  <input type="text" class="form-control amount" onkeyup="numeric(this);" name="amount" id="amount" placeholder="Enter Amount">
                                </div>
                              </div>
                          
                            
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <input type="submit" name="add_admin" id="add_admin" class="btn btn-danger" value="Add Option" />
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
                        <th scope="col">Option Name</th>
                        <th scope="col">Amount</th>
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
                                <td><?php echo @$ad->option_name; ?></td>
                              
                              <td><?php echo @$ad->amount; ?></td>
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

                                 <a href="#" name="edit_ad" class="edit_button" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#edit-admin-data"><i class="far fa-edit"></i></a> 
                                 <!-- <a href="#" name="delete_ad" class="delete_button" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#delete-admin-data"><i class="fa fa-trash"></i></a> -->

                                  
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Payment Option</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-paymentoption'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">

                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                 
                                   <label>New Option</label>
                                  <input type="text" class="form-control" name="option_name" id="edit_option_name" placeholder="Enter New Option">
                                </div>
                              </div>
<div class="form-row">
                                <div class="form-group col-md-12">
                                 
                                   <label>Amount</label>
                                  <input type="text" class="form-control amount" name="amount" onkeyup="numeric(this);" id="edit_amount" placeholder="Enter New Amount">
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
                   <form novalidate method="post" action="<?php echo base_url('admin-delete-paymentoption'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 

                   
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
                  option_name:{
                    "required":true
                  }
                },
               messages:{
                option_name:{
                  "required":"Please Enter Option Name..!!"
                }
              }

            });

});
</script>


<script>
    $("document").ready(function(){

            $("#editform").validate({
               rules:{
                  option_name:{
                    "required":true
                  }
                },
               messages:{
                option_name:{
                  "required":"Please Enter Option Name..!!"
                }
              }

            });

});
</script>

<script>

   $("document").ready(function(){

      $('.edit_status').click(function() {
                
                var ad_id = $(this).attr('ad_id');

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-status-paymentoption');?>",
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
    $('#example').DataTable();
  });


  $("document").ready(function(){

      $('.edit_button').click(function() {
        //  alert(1);
                
                var ad_id = $(this).attr('ad_id');

               // alert(ad_id);

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-paymentoption-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
        // console.log(resultData);
                         
                          resultData = jQuery.parseJSON(resultData);
                         
                         
                          $('#edit_option_name').val(resultData.option_name);
                           $('#edit_amount').val(resultData.amount);
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
                    url: "<?php echo base_url('admin-paymentoption-details');?>",
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
                    url: "<?php echo base_url('admin-status-paymentoption');?>",
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


$(function() {
   
    setTimeout(function() {
        $(".show_message").hide('blind', {}, 300)
    }, 3000);
});

</script>


<script>
$(document).ready(function() {
    $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { 
                extend: 'excel',
                text: 'Download'
             }
        ]
    });
} );
function numeric(e) {
        e.value = e.value.replace(/[^-+0-9.]+/g, '');

    }
</script>





              