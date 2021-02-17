<div class="tab-pane fade show active" id="student-data" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Mess Charge List</h4>
                  </div>
                  <div class="col">
                    <a href="#" class="btn btn-secondary btn-sm float-right addMchrg" data-toggle="modal" data-target="#add-admin-data" style="margin-left: 15px;">Add</a>
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="add-admin-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Mess Session<small>(July-June)</small></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-mess-session'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 

                      <input type="hidden" name="ad_id" id="ad_id" value="">

                        <div class="modal-body">
                          <div class="row">

                          <div class="col-md-4">
                              <div class="form-row">
                                <div class="form-group">
                                  <label>Select Hostel</label>
                                  <select class="form-control selectpicker" name="hostel_id[]" id="hostel_id" multiple data-live-search="true">
                                    <?php
                                      if(!empty($all_hostels))
                                      {
                                        foreach($all_hostels as $hostel)
                                        { ?>
                                          <option value="<?php echo $hostel->id; ?>"><?php echo $hostel->hostel_name; ?></option>
                                       <?php }
                                      }
                                      ?>
                                  </select>
                                </div>
                              </div>  
                            </div>
                            
                            <div class="col-md-4">
                              <div class="form-row">
                                <div class="form-group">
                                  <label>Session Start Year</label>
                                  
                                  <select class="form-control datepicker11122" name="start_year" id="start_year"></select>
                                  <input type="hidden" name="st_yr" id="st_yr" value="">
                                  <span class="error" style="display: none;">Start Year Already Exists..!!</span>
                                </div>
                              </div>  
                            </div>

                            <div class="col-md-4">
                              <div class="form-row">
                                <div class="form-group">
                                  <label>Session End Year</label>
                                  <select class="form-control datepicker11122" name="end_year" id="end_year"></select>
                                  <input type="hidden" name="en_yr" id="en_yr" value="">
                                  <span class="error" style="display: none;">End Year Already Exists..!!</span>
                                </div>
                              </div>  
                            </div>

                          </div>


                            <div class="row">
                          <div class="col-md-4">
                            <div class="form-row">
                              <div class="form-group">
                                <label>July</label>
                                <span>Plan A : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="july_A" id="july_A"></span>
                                <span>Plan B : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="july_B" id="july_B"></span>
                                <span>Plan C : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="july_C" id="july_C"></span>
                              </div>
                            </div>  
                          </div>

                          <div class="col-md-4">
                            <div class="form-row">
                              <div class="form-group">
                                <label>August</label>
                                <span>Plan A : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="august_A" id="august_A"></span>
                                <span>Plan B : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="august_B" id="august_B"></span>
                                <span>Plan C : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="august_C" id="august_C"></span>
                              </div>
                            </div>  
                          </div>


                          <div class="col-md-4">
                            <div class="form-row">
                              <div class="form-group">
                                <label>September</label>
                                <span>Plan A : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="september_A" id="september_A"></span>
                                <span>Plan B : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="september_B" id="september_B"></span>
                                <span>Plan C : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="september_C" id="september_C"></span>
                              </div>
                            </div>  
                          </div>

                          <div class="col-md-4">
                            <div class="form-row">
                              <div class="form-group">
                                <label>October</label>
                                <span>Plan A : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="october_A" id="october_A"></span>
                                <span>Plan B : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="october_B" id="october_B"></span>
                                <span>Plan C : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="october_C" id="october_C"></span>
                              </div>
                            </div>  
                          </div>

                          <div class="col-md-4">
                            <div class="form-row">
                              <div class="form-group">
                                <label>November</label>
                                <span>Plan A : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="november_A" id="november_A"></span>
                                <span>Plan B : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="november_B" id="november_B"></span>
                                <span>Plan C : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="november_C" id="november_C"></span>
                              </div>
                            </div>  
                          </div>

                          <div class="col-md-4">
                            <div class="form-row">
                              <div class="form-group">
                                <label>December</label>
                                <span>Plan A : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="december_A" id="december_A"></span>
                                <span>Plan B : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="december_B" id="december_B"></span>
                                <span>Plan C : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="december_C" id="december_C"></span>
                              </div>
                            </div>  
                          </div>

                          <div class="col-md-4">
                            <div class="form-row">
                              <div class="form-group">
                                <label>January</label>
                                <span>Plan A : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="january_A" id="january_A"></span>
                                <span>Plan B : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="january_B" id="january_B"></span>
                                <span>Plan C : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="january_C" id="january_C"></span>
                              </div>
                            </div>  
                          </div>

                          <div class="col-md-4">
                            <div class="form-row">
                              <div class="form-group">
                                <label>February</label>
                                <span>Plan A : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="february_A" id="february_A"></span>
                                <span>Plan B : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="february_B" id="february_B"></span>
                                <span>Plan C : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="february_C" id="february_C"></span>
                              </div>
                            </div>  
                          </div>

                          <div class="col-md-4">
                            <div class="form-row">
                              <div class="form-group">
                                <label>March</label>
                                <span>Plan A : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="march_A" id="march_A"></span>
                                <span>Plan B : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="march_B" id="march_B"></span>
                                <span>Plan C : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="march_C" id="march_C"></span>
                              </div>
                            </div>  
                          </div>

                          <div class="col-md-4">
                            <div class="form-row">
                              <div class="form-group">
                                <label>April</label>
                                <span>Plan A : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="april_A" id="april_A"></span>
                                <span>Plan B : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="april_B" id="april_B"></span>
                                <span>Plan C : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="april_C" id="april_C"></span>
                              </div>
                            </div>  
                          </div>

                          <div class="col-md-4">
                            <div class="form-row">
                              <div class="form-group">
                                <label>May</label>
                                <span>Plan A : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="may_A" id="may_A"></span>
                                <span>Plan B : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="may_B" id="may_B"></span>
                                <span>Plan C : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="may_C" id="may_C"></span>
                              </div>
                            </div>  
                          </div>

                          <div class="col-md-4">
                            <div class="form-row">
                              <div class="form-group">
                                <label>June</label>
                                <span>Plan A : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="june_A" id="june_A"></span>
                                <span>Plan B : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="june_B" id="june_B"></span>
                                <span>Plan C : </span><span><input onkeypress="return isNumberKey(this, event);" type="text" class="form-control" name="june_C" id="june_C"></span>
                              </div>
                            </div>  
                          </div> 
                          </div>

                        </div>
                        <div class="modal-footer">
                          <input type="submit" name="add_admin" id="add_admin" class="btn btn-danger" value="Save" />
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
                        <th scope="col">Hostel</th>
                        <th scope="col">Session<br><small>(July-June)</small></th>
                        <th scope="col">July</th>
                        <th scope="col">August</th>
                        <th scope="col">September</th>
                        <th scope="col">October</th>
                        <th scope="col">November</th>
                        <th scope="col">December</th>
                        <th scope="col">January</th>
                        <th scope="col">February</th>
                        <th scope="col">March</th>
                        <th scope="col">April</th>
                        <th scope="col">May</th>
                        <th scope="col">June</th>
                        <th scope="col">Action</th>                  
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
                                <td><?php echo $ad->t1_start_year.'-'.$ad->t1_end_year; ?></td>
                                <td><?php echo $ad->july_A.'<br>'.$ad->july_B.'<br>'.$ad->july_C; ?></td>

                                <td><?php echo $ad->august_A.'<br>'.$ad->august_B.'<br>'.$ad->august_C; ?></td>
                                <td><?php echo $ad->september_A.'<br>'.$ad->september_B.'<br>'.$ad->september_C; ?></td>
                                <td><?php echo $ad->october_A.'<br>'.$ad->october_B.'<br>'.$ad->october_C; ?></td>
                                <td><?php echo $ad->november_A.'<br>'.$ad->november_B.'<br>'.$ad->november_C; ?></td>
                                <td><?php echo $ad->december_A.'<br>'.$ad->december_B.'<br>'.$ad->december_C; ?></td>
                                <td><?php echo $ad->january_A.'<br>'.$ad->january_B.'<br>'.$ad->january_C; ?></td>
                                <td><?php echo $ad->february_A.'<br>'.$ad->february_B.'<br>'.$ad->february_C; ?></td>
                                <td><?php echo $ad->march_A.'<br>'.$ad->march_B.'<br>'.$ad->march_C; ?></td>
                                <td><?php echo $ad->april_A.'<br>'.$ad->april_B.'<br>'.$ad->april_C; ?></td>
                                <td><?php echo $ad->may_A.'<br>'.$ad->may_B.'<br>'.$ad->may_C; ?></td>
                                <td><?php echo $ad->june_A.'<br>'.$ad->june_B.'<br>'.$ad->june_C; ?></td>
                                <td> 
                                 <a href="#" name="edit_ad" class="edit_button" ad_id="<?php echo $ad->id; ?>" sess_id="<?php echo $ad->t1_id; ?>" data-toggle="modal" data-target="#add-admin-data"><i class="far fa-edit"></i></a>

                                 <a href="#" name="delete_ad"  tooltip="Delete" class="delete_button" ad_id="<?php echo $ad->t1_id; ?>" data-toggle="modal" data-target="#delete-admin-data"><i class="fa fa-trash"></i></a>



                                </td>
                            </tr>

                          <?php 
                          $i++;
                        }

                      } ?>
                     
                    </tbody>
                  </table>
                </div>







                 <div class="modal fade" id="delete-admin-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Mess Charge</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                   <form novalidate method="post" action="<?php echo base_url('admin-delete-messCharge'); ?>" name="delete-form" id="deleteform">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label>Do you want to delete this Mess Charge ?</label>
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

 $(document).ready(function() {
    $('#example1').DataTable();
    $('.datepicker11122').yearselect();
    $(".datepicker11122").prepend("<option value='' selected='selected'>Select</option>");
    //$('#end_year option[value="2001"]').attr('selected', true); 
    $('#add_admin').attr("disabled", true);
    /////////////////////////////////////////

$('.edit_button').click(function() {    
    var ad_id = $(this).attr('ad_id');
    var sess_id = $(this).attr('sess_id');
    var saveData = $.ajax({ 
        type: 'POST',
        url: "<?php echo base_url('admin-messCharge-details');?>",
        data: {  "id": ad_id,"sess_id":sess_id},
        dataType: "text",
        success: function(resultData) {               
              resultData = jQuery.parseJSON(resultData);
              //console.log(resultData);
              $('#add_admin').attr("disabled", false);

              $('#hostel_id').attr('disabled',true);
              $('#start_year').attr('disabled',true); 
              $('#end_year').attr('disabled',true); 

              $('#ad_id').val(resultData.id); 

              $('#hostel_id option[value="'+resultData.hostel_id+'"]').attr('selected', true); 
              $('.bootstrap-select .filter-option').text(resultData.hostel_name);

              $('#start_year').val(resultData.t1_start_year);
              $('#end_year').val(resultData.t1_end_year);

              $('#july_A').val(resultData.july_A);
              $('#july_B').val(resultData.july_B);
              $('#july_C').val(resultData.july_C);
              $('#august_A').val(resultData.august_A);
              $('#august_B').val(resultData.august_B);
              $('#august_C').val(resultData.august_C);
              $('#september_A').val(resultData.september_A);
              $('#september_B').val(resultData.september_B);
              $('#september_C').val(resultData.september_C);
              $('#october_A').val(resultData.october_A);
              $('#october_B').val(resultData.october_B);
              $('#october_C').val(resultData.october_C);
              $('#november_A').val(resultData.november_A);
              $('#november_B').val(resultData.november_B);
              $('#november_C').val(resultData.november_C);
              $('#december_A').val(resultData.december_A);
              $('#december_B').val(resultData.december_B);
              $('#december_C').val(resultData.december_C);
              $('#january_A').val(resultData.january_A);
              $('#january_B').val(resultData.january_B);
              $('#january_C').val(resultData.january_C);
              $('#february_A').val(resultData.february_A);
              $('#february_B').val(resultData.february_B);
              $('#february_C').val(resultData.february_C);
              $('#march_A').val(resultData.march_A);
              $('#march_B').val(resultData.march_B);
              $('#march_C').val(resultData.march_C);
              $('#april_A').val(resultData.april_A);
              $('#april_B').val(resultData.april_B);
              $('#april_C').val(resultData.april_C);
              $('#may_A').val(resultData.may_A);
              $('#may_B').val(resultData.may_B);
              $('#may_C').val(resultData.may_C);
              $('#june_A').val(resultData.june_A);
              $('#june_B').val(resultData.june_B);
              $('#june_C').val(resultData.june_C);                        
      }    
    });               
});

}); 



$('#hostel_id').on('change', function() {
  //alert( this.value );
  $('#start_year option[value=""]').attr('selected', true);
  $('#end_year option[value=""]').attr('selected', true);

  $('#start_year').attr('disabled', false);
  $('#end_year').attr('disabled', false);
  $('#st_yr').val(''); 
  $('#en_yr').val(''); 
  $('#add_admin').attr("disabled", true);
  
});



$(function() {   
    setTimeout(function() {
        $(".show_message").hide('blind', {}, 300)
    }, 3000);
});

$('.addMchrg').on('click', function() {
  $("#addform")[0].reset();
});

$('#start_year').on('change', function() {
  //$('#end_year').val(parseInt(this.value)+1).trigger('change');
  $('#end_year option[value='+(parseInt(this.value)+1)+']').attr('selected', true);
  $('#st_yr').val(parseInt(this.value));
  $('#en_yr').val(parseInt(this.value)+1);


  $('#end_year').attr("disabled", true);
   $.post("<?php echo base_url('admin-check-year');?>", {"field":"start_year","value": $('#start_year').val(),"ad_id":$('#ad_id').val(),"hostel":$('#hostel_id').val()}, function(result){    
        console.log(result);
        if(result=='false'){
          $(".error").show();
          $('#add_admin').attr("disabled", true);
        }else{
          $(".error").hide();
          $('#add_admin').attr("disabled", false);
        }
    });

  
});

$('#end_year').on('change', function() {
  //$('#start_year').val(parseInt(this.value)-1).trigger('change');
  $('#start_year option[value='+(parseInt(this.value)-1)+']').attr('selected', true)
  $('#st_yr').val(parseInt(this.value)-1);
  $('#en_yr').val(parseInt(this.value));

  $('#start_year').attr("disabled", true);

  $.post("<?php echo base_url('admin-check-year');?>", {"field":"end_year","value": $('#end_year').val(),"ad_id":$('#ad_id').val(),"hostel":$('#hostel_id').val()}, function(result){
        //console.log(result);
        if(result=='false'){
          $(".error").show();
          $('#add_admin').attr("disabled", true);
        }else{
          $(".error").hide();
          $('#add_admin').attr("disabled", false);
        }
    });



});



function isNumberKey(txt, evt) {

var charCode = (evt.which) ? evt.which : evt.keyCode;
if (charCode == 46) {
    //Check if the text already contains the . character
    if (txt.value.indexOf('.') === -1) {
        return true;
    } else {
        return false;
    }
} else {
    if (charCode > 31
         && (charCode < 48 || charCode > 57))
        return false;
}
return true;
}




$('.delete_button').click(function() {
  var ad_id = $(this).attr('ad_id');
  $('#del_ad_id').val(ad_id); 
});



</script>
<style type="text/css">
  .error {
    color: red;
}
.btn-light{
  width: 250px !important;
}
.filter-option{
  background-color: #e2e2e2 !important;
}
</style>