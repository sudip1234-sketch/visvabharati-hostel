<div class="" id="allotment" role="tabpanel">
  <div class="row">
    <div class="col-auto">
      <h4>Bulk Notice</h4>
    </div>
    <div class="col">                                     
    </div>
  </div>

  <div class="table-responsive">
    <div class="asd" style="">
        <form name="frm" id="frm" method="get" onsubmit="return validateForm()" action="<?php echo base_url('admin-notice-send'); ?>">
            <div class="form-row">
                <div class="col-md-3">
                    <div class="form-group">                                  

                        <div class="">
                           <label>Bhavana </label>
                         <select class="custom-select frmfield" name="search_by_bhavan" id="search_by_bhavan" onchange="getCourse(this.value);">
                          <option value="" selected>Choose Bhavana...</option>

                            <?php

                            if(!empty($all_institutes))
                            {
                              foreach($all_institutes as $institute)
                              { ?>

                                <option <?php if((isset($_GET['search_by_bhavan']) && $_GET['search_by_bhavan'] == $institute->id )){ echo "selected";} ?>  value="<?php echo $institute->id; ?>"><?php echo $institute->institute_name; ?></option>
                             <?php 
                            }
                            }

                            ?>
                          </select>
                         
                        </div>
                    </div>
                </div>

                <div class="col-md-3">

                    <div class="form-group">
                     

                        <div class="">
                          <label >Course</label>
                         <select class="custom-select frmfield" name="search_by_course" id="search_by_course" onchange="getDept(this.value);">
                          <option value="" selected>Choose Course...</option>

                            <?php

                            if(!empty($all_courses))
                            {
                              foreach($all_courses as $course)
                              { ?>

                                <option <?php if( (isset($_GET['search_by_course']) && $_GET['search_by_course'] == $course->id )){ echo "selected";} ?> value="<?php echo $course->id; ?>"><?php echo $course->course_name; ?></option>
                             <?php 
                            }
                            }

                            ?>
                          </select>
                         
                        </div>
                    </div>
                </div>

                <div class="col-md-3">

                  <div class="form-group">
                     

                        <div class="">
                          <label >Department </label>
                         <select class="custom-select frmfield" name="search_by_department" id="search_by_department">
                          <option value="" selected>Choose Department...</option>

                            <?php

                            if(!empty($all_departments))
                            {
                              foreach($all_departments as $department)
                              { ?>

                                <option <?php if( (isset($_GET['search_by_department']) && $_GET['search_by_department'] == $department->id )){ echo "selected";} ?> value="<?php echo $department->id; ?>"><?php echo $department->department_name; ?></option>
                             <?php 
                            }
                            }

                            ?>
                          </select>
                         
                        </div>
                    </div>
                </div>



                <div  class="col-md-3">

                   <div class="form-group">
                    <label>Gender</label>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline24" name="gender" class="custom-control-input frmfield" <?php if((isset($_GET['gender']) &&  $_GET['gender'] == 'male' )){ echo "checked";} ?> value="male">
                        <label class="custom-control-label" for="customRadioInline24">Male</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline25" name="gender" class="custom-control-input frmfield" <?php if((isset($_GET['gender']) &&  $_GET['gender'] == 'female' )){ echo "checked";} ?> value="female">
                        <label class="custom-control-label" for="customRadioInline25">Female</label>
                      </div>
                  </div>

                </div>

           

             

                <div  class="col-md-3">
               
                   <div class="form-group">
                    <label>PWD</label>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline26" name="search_by_pwd" class="custom-control-input frmfield" <?php if((isset($_GET['search_by_pwd']) && $_GET['search_by_pwd'] == '1' )){ echo "checked";} ?> value="1">
                        <label class="custom-control-label" for="customRadioInline26">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline27" name="search_by_pwd" class="custom-control-input frmfield" <?php if((isset($_GET['search_by_pwd']) &&  $_GET['search_by_pwd'] == '0' )){ echo "checked";} ?> value="0">
                        <label class="custom-control-label" for="customRadioInline27">No</label>
                      </div>
                  </div>

             
            </div>

             <div  class="col-md-3">
               
                   <div class="form-group">
                       <div class="">
                          <label >Nationality</label>
                         <select class="custom-select frmfield" name="search_nationality_type" id="search_nationality_type">
                            <option value="" selected>Choose...</option>
                            <option <?php if((isset($_GET['search_nationality_type']) &&  $_GET['search_nationality_type'] == 'indian' )){ echo "selected";} ?> value="indian">Indian</option>
                            <option <?php if((isset($_GET['search_nationality_type']) && $_GET['search_nationality_type'] == 'saarc_country' )){ echo "selected";} ?> value="saarc_country">Saarc Country</option>
                            <option <?php if((isset($_GET['search_nationality_type']) && $_GET['search_nationality_type'] == 'non_saarc_country' )){ echo "selected";} ?> value="non_saarc_country">Non Saarc Country</option>
                          </select>
                         
                        </div>
                  </div>


            </div>

             <div  class="col-md-3">
               
                   <div class="">
                          <label >Hostel</label>
                         <select class="custom-select frmfield" name="search_by_hostel" id="search_by_hostel">
                          <option value="" selected>Choose Hostel...</option>

                            <?php

                            if(!empty($all_hostels))
                            {
                              foreach($all_hostels as $hostel)
                              { ?>

                                <option <?php if( (isset($_GET['search_by_hostel']) && $_GET['search_by_hostel'] == $hostel->id )){ echo "selected";} ?> value="<?php echo $hostel->id; ?>"><?php echo $hostel->hostel_name; ?></option>
                             <?php 
                            }
                            }

                            ?>
                          </select>
                         
                  </div>


            </div>

             <div  class="col-md-3">
               
                   <div class="">
                          <label >Category</label>
                         <select class="custom-select frmfield" name="search_by_category" id="search_by_category">
                           <option value="" selected>Choose...</option>
                          <!--  <option value="" >All</option> -->
                          <option <?php if( (isset($_GET['search_by_category']) && $_GET['search_by_category'] == 'general' )){ echo "selected";} ?> value="general" >Gen</option>
                          <option <?php if( (isset($_GET['search_by_category']) && $_GET['search_by_category'] == 'SC' )){ echo "selected";} ?> value="SC" >SC</option>
                          <option <?php if( (isset($_GET['search_by_category']) && $_GET['search_by_category'] == 'ST' )){ echo "selected";} ?> value="ST" >ST</option>
                          <option <?php if( (isset($_GET['search_by_category']) && $_GET['search_by_category'] == 'OBC' )){ echo "selected";} ?> value="OBC" >OBC</option>

                            
                          </select>
                         
                  </div>


            </div>





            <div  class="col-md-3">
               
                   <div class="form-group">
                       <div class="">
                          <label >Semester</label>
                         <select class="custom-select frmfield" name="search_semester" id="search_semester">
                            <option value="" selected>Choose...</option>
                            <option <?php if((isset($_GET['search_semester']) &&  $_GET['search_semester'] == '1' )){ echo "selected";} ?> value="1">1</option>
                            <option <?php if((isset($_GET['search_semester']) && $_GET['search_semester'] == '2' )){ echo "selected";} ?> value="2">2</option>
                            <option <?php if((isset($_GET['search_semester']) && $_GET['search_semester'] == '3' )){ echo "selected";} ?> value="3">3</option>
                            <option <?php if((isset($_GET['search_semester']) &&  $_GET['search_semester'] == '4' )){ echo "selected";} ?> value="4">4</option>
                            <option <?php if((isset($_GET['search_semester']) && $_GET['search_semester'] == '5' )){ echo "selected";} ?> value="5">5</option>
                            <option <?php if((isset($_GET['search_semester']) && $_GET['search_semester'] == '6' )){ echo "selected";} ?> value="6">6</option>
                          </select>
                         
                        </div>
                  </div>


            </div>
        

            <div  class="col-md-3">
               
                   <div class="form-group">
                       <div class="">
                          <label>Allotment Year</label>
                          <input class="form-control datepicker frmfield" name="search_by_year" id="search_by_year" placeholder="Select Yeat" value="<?php if((isset($_GET['search_by_year']) &&  $_GET['search_by_year'] != '' )){ echo $_GET['search_by_year'];} ?>">
                        </div>
                  </div>


            </div>

             <!--  <div  class="col-md-3" style="margin-top: 20px;margin-left: 34px;">
               
                   <div class="form-group">
                       <div class="">
                        <input type="submit" class="btn btn-secondary1" name="search" id="search" value="Search">
                        
                        </div>
                  </div>


            </div> -->

            

           <span style="color: red;margin: 0 0 0 238px;" class="errShow"></span>


            </div>
            <div class="row">
              <div class="col-md-8">
                  <div class="form-group">
                          <label>Message</label>
                         <textarea class="form-control" name="mes"></textarea>
                  </div>
              </div>
              <div class="col-md-4">
                  
              </div>
            </div> 
            <div class="row">
              
              <div class="col-md-4">
                  <div class="form-group">
                    <label></label>
                    <input disabled="disabled" type="submit" class="btn btn-secondary1" name="search" id="search" value="Send">
                </div>
              </div>
              <div class="col-md-8">
                  
              </div>
            </div>     

        
        </form>
    </div>
    <div>
      <?php
        if($success != ''){
          echo $success;
        }
       ?>
    </div> 

  </div>

  <div class="clearfix"></div>
</div>
<script type="text/javascript">





  $('.datepicker').yearselect({
        start: 2000,
        end: new Date(new Date().getFullYear()),
        step: 1,
        order: 'asc',
        selected: "",
        formatDisplay: null,
        displayAsValue: true
    });

  $(".datepicker").prepend("<option value='' selected='selected'>Select</option>");

<?php if(isset($_GET['search_by_year']) && $_GET['search_by_year']!=''){ ?>
    $(".datepicker").val('<?php echo $_GET['search_by_year']; ?>');
<?php } ?>
  

function validateForm()
    {
      $(".errShow").html('');

      var instId     = $('#search_by_bhavan option:selected').val();
      var courId     = $('#search_by_course option:selected').val();
      var deptId     = $('#search_by_department option:selected').val();
      var gender     = $("input[name='gender']:checked").val();   
      var pwd        = $("input[name='search_by_pwd']:checked").val();
      var nation     = $('#search_nationality_type option:selected').val();
      var hostel     = $('#search_by_hostel option:selected').val();
      var category     = $('#search_by_category option:selected').val();
      var sem     = $('#search_semester option:selected').val();
      var yearsearch     = $('#search_by_year option:selected').val();

      
    if (instId == '' && courId == '' && deptId == '' &&  nation  == '' && hostel == '' && category == '' && sem == '' && yearsearch  == '')
    {
        $(".errShow").html('Select atleast one option for search result!!!')
        return false;
    }
 }




 function getCourse(instId) {

   $.ajax({ 
        type: 'POST',
        url: "<?php echo base_url('get-course-list');?>",
        data: {  "institute_id": instId},
        dataType: "text",
        success: function(resultData) { 

          resultData = jQuery.parseJSON(resultData);
          var optionsAsString = "<option value=''> Select Course </option>";
          for(var i = 0; i < resultData.length; i++) {

            optionsAsString += "<option value='" + resultData[i].id + "' data-code='" + resultData[i].course_code + "'>" + resultData[i].course_name + "</option>";
          }
          $( 'select[name="search_by_course"]' ).html( optionsAsString );

        }                
   });

   if(instId){
    document.getElementById("search").disabled = false; 
   }else{
    document.getElementById("search").disabled = true; 
   }
   
 }

 function getDept(couId) {
  var instId     = $('#search_by_bhavan option:selected').val();

     $.ajax({ 
          type: 'POST',
          url: "<?php echo base_url('get-subject-list');?>",
          data: {  "institute_id": instId,"course_id":couId},
          dataType: "text",
          success: function(resultData) { 

            //alert(resultData);
            resultData = jQuery.parseJSON(resultData);
            var optionsAsString = "<option value=''> Select Department </option>";
            for(var i = 0; i < resultData.length; i++) {

              optionsAsString += "<option value='" + resultData[i].id + "' data-code='" + resultData[i].subject_code + "'>" + resultData[i].department_name + "</option>";
            }
            $( 'select[name="search_by_department"]' ).html( optionsAsString );

          }                
        });
 }
</script>
<style type="text/css">
  .btn-secondary1 {
    color: #fff;
    background-color: #1482e4;
    border-color: #1482e4;
}
#example1_filter{
  float: right;
}
.table-responsive{
  overflow-x: hidden !important;
}
</style>