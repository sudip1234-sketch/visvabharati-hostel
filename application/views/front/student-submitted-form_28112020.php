 <div class="inner-page-content-sectn student-dashboard">
      <div class="container">
        <div class="row">
        
          <!-- <div class="col">
            <a href="<?php //echo base_url('logout'); ?>" class="btn btn-outline-secondary btn-sm float-right" style="margin-top: -8px;">Log out</a>
          </div> -->
        </div>
        <br>
        <div class="row">

         <div class="col-sm-12 col-md-12 profileOTP"  <?php if(!empty($student_details->id) && $student_details->otp_confirm==1){ ?> style="display: none;" <?php } ?>>
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="profileOTP" role="tabpanel">
                <h4>Confirm OTP</h4>
                <hr>                
                <div class="row">
                <form  method="post" name="add-form" id="addform"> 
                      <div class="form-row">
                        <div class="form-group">
                           <label>OTP</label>
                           <input  type="text" class="form-control" name="student_otp" id="student_otp" value="" >
                           <small>OTP sent to your registred mobile number and email Id.</small>
                           <br>
                           <span id="student_otp_err" style="color: red;"></span>
                        </div>
                      </div>                   
                <input onclick="checkOTP();" type="button" class="btn btn-danger" id="btn-save" value="Confirm OTP" />

                <a href="<?php echo base_url('resend-otp'); ?>/<?php echo $user_id; ?>" class="btn btn-danger" />Resend</a>
              </form>

                </div>
              </div>
            </div>
          </div>
                  




           <!-- after opt confirm -->


          <div class="col-sm-12 col-md-12 profileAll" <?php if(!empty($student_details->id) && $student_details->otp_confirm==0){ ?> style="display: none;" <?php } ?>>
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="profile" role="tabpanel">
                <h4>Application ID: <?php echo (!empty($student_details->id)? $student_details->id:'');?></h4>
                <hr>
              
                <div class="row">
                <form method="post">
                  <div class="col-md-12">                    
                    <div class="form-group">
                       <label>Application Fee: </label>
                       <input readonly type="text" name="application_amount" value="<?php echo (!empty($payment_options->amount)? $payment_options->amount:'0.00');?>">

                       <input type="hidden" name="student_id" value="<?php echo (!empty($student_details->id)? $student_details->id:'');?>">
                    </div>

                    <div class="form-group">
                       <input type="submit" class="btn btn-danger" name="pay_fee" id="btn-save" value="Pay">
                    </div>                                         
                  </div>
                  </form>
                </div>
              </div>
             
            </div>
          </div>
          <!-- ********************** -->

        </div>
      </div>
    </div>

<script type="text/javascript">
function checkOTP(){
  $('#student_otp_err').html('');
var otpval = $('#student_otp').val();
  if(otpval!=''){
    $.post("<?php echo base_url('check-otp'); ?>/<?php echo $user_id; ?>", {otpval: otpval}, function(result){
      //console.log(result);
       if(result!='done'){
        $('#student_otp_err').html(result);
       }else{
        <?php if(@$payment_options->is_active==0){ ?>
         // redirect('student-form-done/'.$user_id);
        var  url= '<?php  echo base_url().'student-form-done/'.$user_id; ?>';
        window.location = url; 
         <?php }else{ ?>
            $('.profileOTP').hide();
            $('.profileAll').show();
          <?php } ?>
       }

    });
  }else{
    $('#student_otp_err').html('OTP field not be Null.');
  }
}
</script>