<script>

      $( document ).ready(function() {
     
      CKEDITOR.replace( 'notice_content' );
     // CKEDITOR.replace( 'edit_cms_content' );
      //edit_text();
     
});


    function edit_text()
    {
     CKEDITOR.replace( 'edit_notice_content' );

    }
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
  <div class="tab-pane fade show active" id="student-data" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Notice List</h4>
                  </div>
                  <div class="col">
                    <a href="#" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#add-student-data" style="margin-left: 15px;">Add</a>
                    <!-- <a href="#" class="btn btn-secondary btn-sm float-right">Download</a> -->
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="add-student-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Notice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-notice'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">
                            
                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Notice Heading</label>
                                  <input type="text" class="form-control" name="notice_heading" id="notice_heading" placeholder="Enter Notice Heading">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Notice Description</label>
                                  
                                  <textarea class="form-control" name="notice_content" id="notice_content" placeholder="Enter Notice Description"></textarea>
                                </div>
                               
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Upload Attachment(PDF)</label>
                                  <input type="file" class="form-control" name="notice_attachments[]" id="notice_attachment" onchange="validate_file();" multiple>
                                  
                                 

                                </div>
                              </div>

                            
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <input type="submit" name="add_student" id="add_student" class="btn btn-danger" value="Add Notice" />
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
                        <th scope="col">Notice</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                  
                      </tr>
                    </thead>
                    <tbody>


                      <?php if(!empty($all_data)){
                          $i=1;
                          foreach($all_data as $notice)
                          { ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td>
                                  <?php //echo $notice->notice_heading; ?>
                                  <?php echo $notice->notice_heading = (strlen($notice->notice_heading) > 20) ? substr($notice->notice_heading,0,60).'...' : $notice->notice_heading; ?>
                                    
                                  </td>
                                <td><?php echo date('j F, Y',strtotime($notice->notice_date)); ?></td>

                                 <td>
                                 <?php if($notice->is_active == '1'){ ?>

                                     <a href="#" name="edit_stat" class="edit_status btn btn-secondary btn-sm" ad_id="<?php echo $notice->id; ?>" >Deactivate</a>

                                    <!--  <i title="Deactivate" class="fa fa-close" aria-hidden="false" class="edit_status" ad_id="<?php //echo $ad->id; ?>" ></i>
 -->
                                 <?php }else{ ?>

                                     <a href="#" name="edit_stat" class="edit_status btn btn-secondary btn-sm" ad_id="<?php echo $notice->id; ?>" >Activate</a>

                                    <!--  <i title="Activate" class="fa fa-check" aria-hidden="false" class="edit_status" ad_id="<?php //echo $ad->id; ?>" ></i> -->


                                 <?php } ?>
                                 
                                    
                                </td>
                              
                                <td> 
                               
                                 <a href="#" name="edit_notice" class="edit_button btn btn-secondary btn-sm" notice_id="<?php echo $notice->id; ?>" data-toggle="modal" data-target="#edit-student-data"><i class="far fa-edit"></i></a> 
                                 <a href="#" name="delete_ad" class="delete_button btn btn-secondary btn-sm" ad_id="<?php echo $notice->id; ?>" data-toggle="modal" data-target="#delete-admin-data"><i class="fa fa-trash"></i></a>
                                  
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Notice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-notice'); ?>" name="add-form" id="editform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Notice Heading</label>
                                  <input type="text" class="form-control" name="notice_heading" id="edit_notice_heading" placeholder="Enter Notice Heading" value="">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Notice Description</label>
                                  
                                  <textarea class="form-control" name="notice_content" id="edit_notice_content" placeholder="Enter Notice Description"></textarea>
                                </div>
                               
                              </div>
                              
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Upload Attachment(PDF)</label>
                                  <input type="file" class="form-control" name="notice_attachments[]" id="edit_notice_attachment" onchange="edit_validate_file();" multiple>
                                  
                                </div>
                              </div>

                               
                              <div class="form-row" id="notice_attachment_show">

                                 

                              </div>
                           
                          
                            
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->

                          <input type="hidden" name="notice_id" id="notice_id" value="">

                          <input type="submit" name="edit_notice" id="edit_notice" class="btn btn-danger" value="Save" />
                          <!-- <button type="button" class="btn btn-danger">Add Student</button> -->
                        </div>
                      </form>
                    </div>
                  </div>
                </div>





  <!-- Modal -->
      

                 <div class="modal fade" id="delete-admin-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                   <form novalidate method="post" action="<?php echo base_url('admin-delete-notice'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 

                   
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
                  notice_heading:{
                    "required":true
                  },
                  notice_content:{
                    "required":true
                  }
                },
               messages:{
                notice_heading:{
                  "required":"Please Enter Notice Heading..!!"
                },
                notice_content:{
                  "required":"Please Enter Notice Content..!!"
                }
              }

             
            });

           

});
</script>

<script>
    $("document").ready(function(){

            $("#editform").validate({
               rules:{
                  notice_heading:{
                    "required":true
                  },
                  notice_content:{
                    "required":true
                  }
                },
               messages:{
                notice_heading:{
                  "required":"Please Enter Notice Heading..!!"
                },
                notice_content:{
                  "required":"Please Enter Notice Content..!!"
                }
              }

             
            });

           

});
</script>


<script>
  $("document").ready(function(){

      $('.edit_button').click(function() {

        $('#notice_attachment_show').html('');
                
                var notice_id = $(this).attr('notice_id');

                //alert(notice_id);

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-notice-details');?>",
                    data: {  "id": notice_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          //alert(resultData);
                          resultData = jQuery.parseJSON(resultData);
                         /* resultData.notice_heading;
                          resultData.notice_content;*/
                          $('#edit_notice_heading').val(resultData.notice_heading);
                          $('#edit_notice_content').val(resultData.notice_content);

                          /// hostel_pics

                          var notice_attachments_all = resultData.notice_attachment;
                          //console.log(resultData.hostel_pics);
                          var notice_attachments_div = '';
                          if(resultData.notice_attachment!=''){
                            var notice_attachments_arr = notice_attachments_all.split(',');
                            var i;
                            //console.log(hostel_pics_arr);
                            for (i = 0; i < notice_attachments_arr.length; i++) { 
                              //console.log(hostel_pics_arr[i]);
                              var ttt = "'"+notice_attachments_arr[i]+"'";
                              var tii = "'"+resultData.id+"'";
                         /*    notice_attachments_div += '<div class="form-group col-md-3"><a href="javascript:void(0);" class="delImg" onclick="deletenoticeattachment('+ttt+','+tii+')"><i class="fa fa-times"></i></a><img src="<?php echo base_url(); ?>assets/notice_attachments/'+notice_attachments_arr[i]+'" alt="" class="img-thumbnail img-fluid"></div>';*/


                                notice_attachments_div += '<div class="form-group col-md-3"><a href="javascript:void(0);" class="delImg" onclick="deletenoticeattachment('+ttt+','+tii+')"><i class="fa fa-times"></i></a><a target="_blank" href="<?php echo base_url(); ?>assets/notice_attachments/'+notice_attachments_arr[i]+'">&nbsp;View PDF File</a></div>';


                            }
                          }



                          $('#notice_attachment_show').html(notice_attachments_div);


                          $('#notice_id').val(resultData.id);

                          CKEDITOR.replace('edit_notice_content');
                  }
                
                });

               // saveData.error(function() { alert("Something went wrong"); });

});

});


  $("document").ready(function(){

      $('.delete_button').click(function() {
                
                var ad_id = $(this).attr('ad_id');

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-notice-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          resultData = jQuery.parseJSON(resultData);
                          $('#del_ad_id').val(resultData.id);
                          
                  }
                
                });

                //saveData.error(function() { alert("Something went wrong"); });

});

});
</script>


<script>

   $("document").ready(function(){

      $('.edit_status').click(function() {
                
                var ad_id = $(this).attr('ad_id');

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-status-notice');?>",
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

               // saveData.error(function() { alert("Something went wrong"); });

});

});
</script>


<script>

function deletenoticeattachment(imgName,noticeId){

  //alert('test');
  //console.log(imgName);
  $.ajax({ 
    type: 'POST',
    url: "<?php echo base_url('admin-delete-notice-attachment');?>",
    data: {  "id": noticeId,"imgName":imgName},
    dataType: "text",
    success: function(resultData) { 
          //console.log(resultData);

          //alert(resultData);
          resultData = jQuery.parseJSON(resultData);
          //alert(resultData);
          //console.log(resultData);
          /// hostel_pics

          var hostel_pics_all = resultData.notice_attachment;
          //console.log(resultData.hostel_pics);
          var hostel_pics_div = '';
          if(resultData.hostel_pics!=''){
            var hostel_pics_arr = hostel_pics_all.split(',');
            var i;
            //console.log(hostel_pics_arr);
            for (i = 0; i < hostel_pics_arr.length; i++) { 
              //console.log(hostel_pics_arr[i]);
              var ttt = "'"+hostel_pics_arr[i]+"'";
              var tii = "'"+resultData.id+"'";
              if(hostel_pics_arr[i]!=''){

             hostel_pics_div += '<div class="form-group col-md-3"><a href="javascript:void(0);" class="delImg" onclick="deletenoticeattachment('+ttt+','+tii+')"><i class="fa fa-times"></i></a><a target="_blank" href="<?php echo base_url(); ?>assets/notice_attachments/'+hostel_pics_arr[i]+'">View PDF File</a></div>';

           }

            }
          }

          $('#notice_attachment_show').html(hostel_pics_div);
          /// end hostel_pics         

    }

  });
}
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


<script type="text/javascript">
    //form validation
    function validate(){
        return validate_file();
    }
    function validate_file(){ 

        var file_err = 'file_err';
        var notice_attachment = $('#notice_attachment');
        var file = $('#notice_attachment')[0].files[0]
        //hide previous error
        $("#"+file_err).html("");
        
        if(file == undefined){
            notice_attachment.parent().after('<span id='+file_err+'><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> Please upload CV(.doc, .docx, .pdf) File</p></span>');
            return false;
        }else{
              $("#"+file_err).html("");
        }
        console.log(file.size);
        var fileType    = file.type; // holds the file types
        var match       = ["application/pdf"];
        //var match       = ["image/gif","image/jpg","image/jpeg","image/png","image/bmp"];  
        // defined the file types
        var fileSize    = file.size; // holds the file size
        var maxSize     = 2*1024*1024; // defined the file max size
        //var maxSize     = 2*1024; // defined the file max size
         // Checking the Valid Image file types  
        if(!((fileType==match[0])))
        {
            notice_attachment.val("");
            notice_attachment.parent().after('<span id='+file_err+'><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> Please select a valid (.pdf) file.</p></span>');
            return false;
        }else{
              $("#"+file_err).html("");
        }
         // Checking the defined image size
        if(fileSize > maxSize)
        {
            notice_attachment.val("");
            notice_attachment.parent().after('<span id='+file_err+'><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> Please select a file less than 2mb of size.</p></span>');
            return false;
        }else{
            $("#"+file_err).html("");
        }
    }
 </script>

 <script type="text/javascript">
    //form validation
    function validate(){
        return edit_validate_file();
    }
    function edit_validate_file(){ 

        var file_err = 'file_err';
        var notice_attachment = $('#edit_notice_attachment');
        var file = $('#edit_notice_attachment')[0].files[0]
        //hide previous error
        $("#"+file_err).html("");
        
        if(file == undefined){
            notice_attachment.parent().after('<span id='+file_err+'><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> Please upload CV(.doc, .docx, .pdf) File</p></span>');
            return false;
        }else{
              $("#"+file_err).html("");
        }
        console.log(file.size);
        var fileType    = file.type; // holds the file types
        var match       = ["application/pdf"];
       // var match       = ["image/gif","image/jpg","image/jpeg","image/png","image/bmp"];  
        // defined the file types
        var fileSize    = file.size; // holds the file size
        var maxSize     = 2*1024*1024; // defined the file max size
        //var maxSize     = 2*1024; // defined the file max size
         // Checking the Valid Image file types  
        if(!((fileType==match[0])))
        {
            notice_attachment.val("");
            notice_attachment.parent().after('<span id='+file_err+'><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> Please select a valid (.pdf) file.</p></span>');
            return false;
        }else{
              $("#"+file_err).html("");
        }
         // Checking the defined image size
        if(fileSize > maxSize)
        {
            notice_attachment.val("");
            notice_attachment.parent().after('<span id='+file_err+'><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> Please select a file less than 2mb of size.</p></span>');
            return false;
        }else{
            $("#"+file_err).html("");
        }
    }
 </script>


              