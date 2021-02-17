<!--  <script src="https://cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script> -->
<script>

      $( document ).ready(function() {
     
      CKEDITOR.replace( 'cms_content' );
     // CKEDITOR.replace( 'edit_cms_content' );
      //edit_text();
     
});


    function edit_text()
    {
     CKEDITOR.replace( 'edit_cms_content' );

    }
</script>
<!-- 
    <script>
      CKEDITOR.replace('cms_content');
</script>

<script>
      CKEDITOR.replace('edit_cms_content');
</script> -->

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


 <div class="tab-pane fade show active" id="student-data" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>CMS List</h4>
                  </div>
                  <div class="col">
                    <!-- <a href="#" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#add-student-data" style="margin-left: 15px;">Add</a> -->
                    <!-- <a href="#" class="btn btn-secondary btn-sm float-right">Download</a> -->
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="add-student-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add CMS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-cms'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">

                         
                            
                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>CMS Title</label>
                                  <input type="text" class="form-control" name="cms_title" id="cms_title" placeholder="Enter CMS Title">
                                </div>
                              </div>

                                <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Category Type</label>
                                  <select class="custom-select" name="parent_category" id="parent_category">

                                    <?php if(!empty($main_group)) {

                                      foreach($main_group as $category){ ?>

                                         <option value="<?php echo $category->id; ?>"><?php echo $category->cms_title; ?></option>

                                     <?php }
                                    }?>
                                  
                                   
                                  </select>
                                </div>
                              </div>
                            <!--   <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>CMS Slug</label>
                                  <input type="text" class="form-control" name="cms_slug" id="cms_slug" placeholder="Enter CMS Slug">
                                </div>
                              </div> -->
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>CMS Content</label>
                                  
                                  <textarea class="form-control" name="cms_content" id="cms_content" placeholder="Enter CMS Content"></textarea>
                                </div>
                               
                              </div>
                            
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <input type="submit" name="add_student" id="add_student" class="btn btn-danger" value="Add CMS" />
                          <!-- <button type="button" class="btn btn-danger">Add Student</button> -->
                        </div>
                      </form>
                    </div>
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
             

                  <table id="example1" class="table table-striped  nowrap" style="font-size: 14px;">
                    <thead>
                      <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">CMS Tilte</th>
                        <!-- <th scope="col">CMS Description</th> -->
                        <!-- <th scope="col">Status</th> -->
                        <th scope="col">Action</th>
                  
                      </tr>
                    </thead>
                    <tbody>


                      <?php if(!empty($all_data)){
                          $i=1;
                          foreach($all_data as $cms)
                          { ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $cms->cms_title; ?></td>
                              
                                <td> 
                                
                                 <a href="#" name="edit_notice" class="edit_button btn btn-secondary btn-sm" cms_id="<?php echo $cms->id; ?>" data-toggle="modal" data-target="#edit-student-data"><i class="far fa-edit"></i></a> 

                                 <?php if($cms->parent_id != 0){?>
                                 
                                 <a href="#" name="delete_ad" class="delete_button btn btn-secondary btn-sm" cms_id="<?php echo $cms->id; ?>" data-toggle="modal" data-target="#delete-admin-data"><i class="fa fa-trash"></i></a>

                                 <?php } ?>
                                  
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
                <div class="modal fade" id="edit-student-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit CMS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-cms'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">

                            <div class="col-md-12">

                              <div class="form-row">
                               
                              </div>




                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>CMS Title</label>
                                  <input type="text" class="form-control" name="cms_title" id="edit_cms_title" placeholder="Enter CMS Title" value="">
                                </div>
                              </div>

                              <div class="form-row" id="cms_category_div" >
                               <div class="form-group col-md-12">
                                  <label>Category Type</label>
                                  <select class="custom-select" name="parent_category" id="edit_parent_category">

                                    <?php if(!empty($main_group)) {

                                      foreach($main_group as $category){ ?>

                                         <option value="<?php echo $category->id; ?>"><?php echo $category->cms_title; ?></option>

                                     <?php }
                                    }?>
                                  
                                   
                                  </select>
                                </div>

                              </div>
                              <!--  <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>CMS Slug</label>
                                  <input type="text" class="form-control" name="cms_slug" id="edit_cms_slug" placeholder="Enter CMS Slug" readonly="">
                                </div>
                              </div> -->
                              <div class="form-row" id="cms_description_div">
                                <div class="form-group col-md-12">
                                  <label>CMS Description</label>
                                  
                                  <textarea class="form-control" name="cms_content" id="edit_cms_content" placeholder="Enter CMS Content"></textarea>
                                </div>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->

                          <input type="hidden" name="cms_id" id="cms_id" value="">

                          <input type="submit" name="edit_cms" id="edit_cms" class="btn btn-danger" value="Save" />
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
                   <form novalidate method="post" action="<?php echo base_url('admin-delete-cms'); ?>" name="edit-form" id="deleteform" enctype="multipart/form-data"> 

                   
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
                  cms_title:{
                    "required":true
                  },
                  cms_slug:{
                    "required":true
                  },
                  cms_content:{
                    "required":true
                  }
                },
               messages:{
                cms_title:{
                  "required":"Please Enter CMS Title..!!"
                },
                cms_slug:{
                  "required":"Please Enter CMS Slug..!!"
                },
                cms_content:{
                  "required":"Please Enter CMS Content..!!"
                }
              }

            });

});
</script>


<script>
    $("document").ready(function(){

            $("#editform").validate({
               rules:{
                  cms_title:{
                    "required":true
                  },
                  cms_slug:{
                    "required":true
                  },
                  cms_content:{
                    "required":true
                  }
                },
               messages:{
                cms_title:{
                  "required":"Please Enter CMS Title..!!"
                },
                cms_slug:{
                  "required":"Please Enter CMS Slug..!!"
                },
                cms_content:{
                  "required":"Please Enter CMS Content..!!"
                }
              }

            });

});
</script>



<script>
  $("document").ready(function(){

      $('.edit_button').click(function() {
                
                $("#editform")[0].reset();
                var cms_id = $(this).attr('cms_id');

                //alert(cms_id);

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-cms-details');?>",
                    data: {  "id": cms_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          resultData = jQuery.parseJSON(resultData);

                          $('#edit_parent_category').val(resultData.parent_id);
                          $('#edit_cms_title').val(resultData.cms_title);
                          $('#edit_cms_slug').val(resultData.cms_slug);
                          $('#edit_cms_content').val(resultData.cms_content);
                          $('#cms_id').val(resultData.id);

                          if(resultData.parent_id == '0' && (resultData.id == '17' || resultData.id == '18' || resultData.id == '19' || resultData.id == '21'))
                          {
                           
                            $('#cms_category_div').hide();
                            $('#cms_description_div').hide();

                          }else if(resultData.parent_id == '0' && (resultData.id == '1' || resultData.id == '2' || resultData.id == '4' || resultData.id == '6'))
                          {
                            
                            $('#cms_category_div').hide();
                            if (CKEDITOR.instances['edit_cms_content']) CKEDITOR.instances['edit_cms_content'].destroy();
                            edit_text();
                            $('#cms_description_div').show();

                          }
                          else
                          {
                                                       
                            if (CKEDITOR.instances['edit_cms_content']) CKEDITOR.instances['edit_cms_content'].destroy();
                            edit_text();
                            $('#cms_category_div').show();
                            $('#cms_description_div').show();
                          }
                        
                         
                  }
                
                });

              

});

});


$("document").ready(function(){

      $('.delete_button').click(function() {
                
                var cmd_id = $(this).attr('cms_id');

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-cms-details');?>",
                    data: {  "id": cmd_id},
                    dataType: "text",
                    success: function(resultData) { 

                          resultData = jQuery.parseJSON(resultData);
                          $('#del_ad_id').val(resultData.id);
                          
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






              