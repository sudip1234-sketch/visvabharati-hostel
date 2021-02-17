<?php 
$search_url = base_url('admin-hostel-list');
$is_subadmin = $this->session->userdata('is_subadmin'); 
?>
<script>

      $( document ).ready(function() {
     
      CKEDITOR.replace( 'hostel_description' );
    
     
});


    function edit_text()
    {
     CKEDITOR.replace( 'edit_hostel_description' );

    }
</script>
<div class="tab-pane fade show active" id="student-data" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Hostel List</h4>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New Hostel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-hostel'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">
                            
                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Hostel Name</label>
                                  <input type="text" class="form-control" name="hostel_name" id="hostel_name" placeholder="Enter New Hostel">
                                </div>
                              </div>
                          
                            
                            </div>

                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Hostel Code</label>
                                  <input type="text" class="form-control" name="hostel_code" id="hostel_code" placeholder="Enter Hostel Code">
                                </div>
                              </div>
                          
                            </div>

                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Hostel Type</label>
                                  <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline1" name="hostel_type" class="custom-control-input" value="boys">
                                  <label class="custom-control-label" for="customRadioInline1">Boys</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline2" name="hostel_type" class="custom-control-input" value="girls">
                                  <label class="custom-control-label" for="customRadioInline2">Girls</label>
                                </div>
                                </div>
                              </div>
                          
                            </div>



                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Kitchen</label>
                                  <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="kitchen1" name="kitchen" class="custom-control-input" value="yes">
                                  <label class="custom-control-label" for="kitchen1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="kitchen2" name="kitchen" class="custom-control-input" value="no" checked>
                                  <label class="custom-control-label" for="kitchen2">No</label>
                                </div>
                                </div>
                              </div>
                          
                            </div>

                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Hostel Warden</label>
                                   <select class="custom-select" name="warden[]" id="warden" multiple>
                                   
                                   <?php
                                      if(!empty($warden))
                                      {
                                        foreach($warden as $warden1)
                                        { ?>
                                          <option  value="<?php echo $warden1->id; ?>"><?php echo $warden1->name; ?></option>
                                       <?php 
                                        }
                                      }
                                      ?>
                                    </select> 
                                </div>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Upload Hostel Image</label>
                                  <input type="file" class="form-control" name="hostel_pics[]" multiple>

                                 

                                </div>
                              </div>
                          
                            </div>


                            



                            <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Hostel Description</label>
                                  
                                  <textarea class="form-control" name="hostel_description" id="hostel_description" placeholder="Enter Hostel Description"></textarea>
                                </div>
                               
                            </div>
                            </div>

                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <input type="submit" name="add_admin" id="add_admin" class="btn btn-danger" value="Add Hostel" />
                          <!-- <button type="button" class="btn btn-danger">Add Student</button> -->
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="table-responsive">

                   <div class="asd" style="">

                      <form name="frm" id="frm" method="get" action="<?php echo $search_url; ?>">

                         <div class="form-row">

                           <div class="col-md-3">

                             <div class="form-group">
                                                  <label>Hostel For</label>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="customRadioInline24" name="hostel_type" class="custom-control-input" <?php if((isset($_GET['hostel_type']) &&  $_GET['hostel_type'] == 'boys' )){ echo "checked";} ?> value="boys">
                                                      <label class="custom-control-label" for="customRadioInline24">Boys</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="customRadioInline25" name="hostel_type" class="custom-control-input" <?php if((isset($_GET['hostel_type']) &&  $_GET['hostel_type'] == 'girls' )){ echo "checked";} ?> value="girls">
                                                      <label class="custom-control-label" for="customRadioInline25">Girls</label>
                                                    </div>
                                                </div>
                           </div>

                         </div>

                      </form>

                   </div>


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
                        <th scope="col">Hostel Name</th>
                        <th scope="col">Hostel Code</th>
                        <th scope="col">Hostel Type</th>
                         <?php if($is_subadmin == 'N'){ ?>
                        <th scope="col">Action</th>
                        <?php } ?>
                        <th scope="col">Download</th>
                        <th scope="col">Seats Management</th>

                  
                      </tr>
                    </thead>
                    <tbody>


                      <?php //echo "<pre>"; print_r($all_data); die;


                      if(!empty($all_data)){
                          $i=1;
                          foreach($all_data as $ad)
                          { ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $ad->hostel_name; ?></td>
                                <td><?php echo $ad->hostel_code; ?></td>
                                <td><?php echo ucwords($ad->hostel_type); ?></td>
                               <?php if($is_subadmin == 'N'){ ?>
                                <td> 
                                <!-- <a href="#" class="btn btn-secondary btn-sm " data-toggle="modal" data-target="#add-student-data">Edit</a> -->

                                 <a href="#" name="edit_ad" class="edit_button" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#edit-admin-data"><i class="far fa-edit"></i></a> 
                                <!--  <a href="#" name="delete_ad" class="delete_button" ad_id="<?php echo $ad->id; ?>" data-toggle="modal" data-target="#delete-admin-data"><i class="fa fa-trash"></i></a>
 -->
                                  
                                </td>
                                <?php } ?>
                                <td><a onclick="getExcel(<?php echo $ad->id; ?>);" href="javascript:void(0)" ><i class="fa fa-download"></i></a></td>

                                <!-- 07122020 -->
                                <!-- <td><a href="<?php echo base_url('hostel-seat-details-by-id')."/".$ad->id; ?>"  class="edit_button"  ><i class="fa fa-link"></i></a> </td> -->
                                 <td><a href="<?php echo base_url('admin-add-seat'); ?>"  class="edit_button"  ><i class="fa fa-link"></i></a> </td>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Hostel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-add-hostel'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">

                         <!--    <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                 
                                   <label>New Hostel</label>
                                  <input type="text" class="form-control" name="hostel_name" id="edit_hostel_name" placeholder="Enter New Hostel">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                 
                                   <label>Hostel Code</label>
                                  <input type="text" class="form-control" name="hostel_code" id="edit_hostel_code" placeholder="Enter Hostel Code" readonly>
                                </div>
                              </div>

                              
                            </div> -->


                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Hostel Name</label>
                                  <input type="text" class="form-control" name="hostel_name" id="edit_hostel_name" placeholder="Enter New Hostel">
                                </div>
                              </div>
                          
                            
                            </div>

                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Hostel Code</label>
                                  <input type="text" class="form-control" name="hostel_code" id="edit_hostel_code" placeholder="Enter Hostel Code">
                                </div>
                              </div>
                          
                            </div>

                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Hostel Type</label>
                                  <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline11" name="hostel_type" class="custom-control-input edit_hostel_type boy-val" value="boys">
                                  <label class="custom-control-label" for="customRadioInline11">Boys</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline12" name="hostel_type" class="custom-control-input edit_hostel_type girl-val" value="girls">
                                  <label class="custom-control-label" for="customRadioInline12">Girls</label>
                                </div>
                                </div>
                              </div>
                          
                            </div>




                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Kitchen</label>
                                  <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="kitchen11" name="kitchen" class="custom-control-input" value="yes">
                                  <label class="custom-control-label" for="kitchen11">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="kitchen21" name="kitchen" class="custom-control-input" value="no">
                                  <label class="custom-control-label" for="kitchen21">No</label>
                                </div>
                                </div>
                              </div>
                          
                            </div>


                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Hostel Warden</label>
                                  <select class="custom-select" name="warden[]" id="hostel_warden" multiple>
                                   
                                   <?php
                                      if(!empty($warden))
                                      {
                                        foreach($warden as $warden12)
                                        { ?>
                                          <option  value="<?php echo $warden12->id; ?>"><?php echo $warden12->name; ?></option>
                                       <?php 
                                        }
                                      }
                                      ?>
                                    </select> 
                                    
                                </div>
                              </div>
                            </div>



                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Upload Hostel Image</label>
                                  <input type="file" class="form-control" name="hostel_pics[]" id="edit_hostel_pic" multiple>
                                </div>
                              </div>
                          
                            </div>


                            <div class="col-md-12" >
                              <div class="form-row" id="hostel_img_show">

                                 

                              </div>
                            </div>

                            <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Hostel Description</label>
                                  
                                  <textarea class="form-control" name="hostel_description" id="edit_hostel_description" placeholder="Enter Hostel Description"></textarea>
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
                   <form novalidate method="post" action="<?php echo base_url('admin-delete-hostel'); ?>" name="edit-form" id="editform" enctype="multipart/form-data"> 

                   
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



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>
<style type="text/css">
  .dropdown-toggle,.dropdown-menu{
    width: 754px;
  }
</style>

<script>
  function getExcel(id){
    var params   = id;
    var excelUrl = '<?php echo base_url('admin-download-hostel-report-excel'); ?>';
    var fullURL = excelUrl;
    if(params==''){
       fullURL = excelUrl ;
    }else{
       fullURL = excelUrl + '/' + params;
    }
      window.location.href = fullURL;
    }
</script>

<script>
    $("document").ready(function(){


            $("#addform").validate({
               rules:{
                  hostel_name:{
                    "required":true
                  },
                  hostel_code:{
                    "required":true,
                    remote: {
                      url:"<?php echo base_url('admin-check-hostel-code');?>",
                      type: "post",
                      data: {
                        field:"hostel_code",
                        value: function() {
                          //alert($( "#hostel_code" ).val());
                          return $( "#hostel_code" ).val();
                        }
                      }
                  }
                  },
                  hostel_type:{
                    "required":true
                  }
                },
               messages:{
                hostel_name:{
                  "required":"Please Enter Hostel Name..!!"
                },
                hostel_code:{
                    "required":"Please Enter Hostel Code..!!",
                    "remote":"Hostel Code Already Exists..!!"
                  },
                hostel_type:{
                    "required":"Please Enter Hostel Type..!!"
                }
              }

            });

});

</script>


<script>
    $("document").ready(function(){

            $("#editform").validate({
               rules:{
                  hostel_name:{
                    "required":true
                  }
                },
               messages:{
                hostel_name:{
                  "required":"Please Enter Hostel Name..!!"
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


      $( "#customRadioInline24" ).click(function() {
        $( "#frm" ).submit();
      });

      $( "#customRadioInline25" ).click(function() {
        $( "#frm" ).submit();
      });

      $('.edit_button').click(function() {
        $('#hostel_img_show').html('');
                
                var ad_id = $(this).attr('ad_id');

                //alert(cms_id);

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-hostel-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
                          //alert(resultData);

                          edit_text();
                          resultData = jQuery.parseJSON(resultData);
                          //console.log(resultData);

                          $('#edit_hostel_name').val(resultData.hostel_name);
                          $('#edit_hostel_code').val(resultData.hostel_code);
                          $('#edit_hostel_description').val(resultData.hostel_description);
                        
                         
                          // select warden
                          $("#hostel_warden").multiselect({
                             selectedText: "# of # selected"
                          });
                          var hidValue = resultData.warden;
                          
                          if(hidValue){
                           var selectedOptions = hidValue.split(",");
                          }else{
                            var selectedOptions = [];
                          }
                          for(var i in selectedOptions) {
                              var optionVal = selectedOptions[i];
                              $("#hostel_warden").find("option[value="+optionVal+"]").prop("selected", "selected");
                          }
                          $("#hostel_warden").multiselect('rebuild');
                           // end select warden

                          //alert(resultData.hostel_type);
                          
                          if(resultData.hostel_type =='boys')
                          {
                            $(".boy-val").prop("checked", true);
                          }else{
                            $(".girl-val").prop("checked", true);
                          }


                          if(resultData.kitchen =='yes')
                          {
                            $("#kitchen11").prop("checked", true);
                          }else{
                            $("#kitchen21").prop("checked", true);
                          }



                          /// hostel_pics

                          var hostel_pics_all = resultData.hostel_pics;
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
                             hostel_pics_div += '<div class="form-group col-md-3"><a href="javascript:void(0);" class="delImg" onclick="deletehostelimg('+ttt+','+tii+')"><i class="fa fa-times"></i></a><img src="<?php echo base_url(); ?>assets/hostel_pics/'+hostel_pics_arr[i]+'" alt="" class="img-thumbnail img-fluid"></div>';
                            }
                          }

                          $('#hostel_img_show').html(hostel_pics_div);
                          /// end hostel_pics

                          $('#ad_id').val(resultData.id);

                          CKEDITOR.replace('edit_hostel_description');                          
                  }
                
                });

                //saveData.error(function() { alert("Something went wrong"); });

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
    $('#warden').multiselect();
    $('#hostel_warden').multiselect();
} );

$(function() {
   
    setTimeout(function() {
        $(".show_message").hide('blind', {}, 300)
    }, 3000);
});

function deletehostelimg(imgName,hostelId){
  //console.log(imgName);
  $.ajax({ 
    type: 'POST',
    url: "<?php echo base_url('admin-delete-hostel-image');?>",
    data: {  "id": hostelId,"imgName":imgName},
    dataType: "text",
    success: function(resultData) { 
          //console.log(resultData);
          resultData = jQuery.parseJSON(resultData);
          //alert(resultData);

          /// hostel_pics

          var hostel_pics_all = resultData.hostel_pics;
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
             hostel_pics_div += '<div class="form-group col-md-3"><a href="javascript:void(0);" class="delImg" onclick="deletehostelimg('+ttt+','+tii+')"><i class="fa fa-times"></i></a><img src="<?php echo base_url(); ?>assets/hostel_pics/'+hostel_pics_arr[i]+'" alt="" class="img-thumbnail img-fluid"></div>';
            }
          }

          $('#hostel_img_show').html(hostel_pics_div);
          /// end hostel_pics         

    }

  });
}
</script>
<style type="text/css">
  .delImg{
    position: absolute;
    right: 15px;
    top: 15px;
  }
</style>