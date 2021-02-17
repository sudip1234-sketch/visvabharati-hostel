
<style type="text/css">
  .table-bordered td, .table-bordered th {
    border: 1px solid #b1b3b5;
  }
  .table thead th{
    border: 1px solid #b1b3b5;
  }
</style>
<div class="inner-page-content-sectn student-dashboard">
      <div class="container">
         <div class="row">
          <div class="col-auto">
             <?php
              if ($this->session->userdata('userFullName') != null) { ?>
              <h6>Welcome, <?php echo $this->session->userdata('userFullName'); ?></h6>
            <?php }else{?>
              <h6>Welcome</h6>
            <?php } ?>
          </div>
         
        </div>
        <br>
        <div class="row">
          <div class="col-sm-5 col-md-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link " href="<?php echo base_url('student-profile'); ?>" >Profile</a>
              <a class="nav-link active" id="make-payment-tab" data-toggle="pill" href="#make-payment" role="tab" aria-controls="make-payment" aria-selected="true">Make Payment</a>
              <a class="nav-link " href="<?php echo base_url('student-profile'); ?>" >Payment Report</a>
              <a class="nav-link " href="<?php echo base_url('student-profile'); ?>" >Lodge Complaint</a>
              <a class="nav-link " href="<?php echo base_url('student-profile'); ?>" >Reissue Card</a>
            </div>
          </div>
          <div class="col-sm-7 col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
              
              <div class="tab-pane fade show active" id="make-payment" role="tabpanel">
                <h4>Make Payment</h4>
                <?php 
                // $ad_year = $rest = substr($student_details->student_id, -4, 2);
                // $ad_date = $rest = $ad_year.'-07-01';
                // $from = new DateTime($ad_date);
                // $to   = new DateTime('today');
                // $total_year =  $from->diff($to)->y;
                // $month = date('m');
                // $current_sem = '';
                // $total_sec =  $total_year * 2;

                // $actual_total_year =  date_diff(date_create('2019-07-01'), date_create('today'))->y;
                // $actual_payment_number = $actual_total_year * 2;


                // // actual semester calculation 
                // if($month < 7){
                //    $current_sem = $total_sec + 2;
                //    $actual_payment_number += 2;
                // } else {
                //    $current_sem = $total_sec + 1;
                //    $actual_payment_number += 1;
                // }

                // // have no payment till now
                //  if($payment_number == 0){ 
                //     $current_sem -= 1;
                //  }

                //  //if student payment current semester rent or more than
                //  if($payment_number >= $actual_payment_number){
                //     $current_sem += (($payment_number - $actual_payment_number)+ 1);
                //  }


                  ?>
                <hr>
                  <div class="form-row">
                    <div class="form-group col-md-6">

                      <label>Student Id.</label>
                      <input name="student_id" type="text" class="form-control inputDisabled" placeholder="Enter your serial no." value="<?php echo $student_details->student_id; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Student Name</label>
                      <input  type="text" class="form-control inputDisabled" placeholder="Enter your full name" value="<?php echo $student_details->full_name; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Conatct No.</label>
                      <input type="text" class="form-control inputDisabled" placeholder="Enter your serial no." value="<?php echo $student_details->contact_no; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Student Email</label>
                      <input type="text" class="form-control inputDisabled" placeholder="Enter your full name" value="<?php echo $student_details->email_id; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Hostel</label>
                      <input name="student_hostel_name" type="text" class="form-control inputDisabled" placeholder="Enter your serial no." value="<?php echo $student_details->hostel_name_name; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Hostel assign Date</label>
                      <input type="text" class="form-control inputDisabled" placeholder="Enter your full name" value="<?php echo $student_details->hostel_assign_date;?>" disabled>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Select Semester</label>
                      <select class="custom-select change-semester" >
                        <option value="0">Choose...</option>
                        <?php 
                            
                            for ($x = 1; $x <= ($student_details->total_year * 2); $x++) { 
                                if($current_sem == $x){ ?>
                                    <option  value="<?php echo $x ;?>"><?php echo $x ;?></option>
                              <?php }else{ ?>
                                    <option disabled value="<?php echo $x ;?>"><?php echo $x ;?></option>
                              <?php  }
                              ?>
                                
                            <? } 
                        ?>
                         
                        </select>
                      </div>
                    </div>  
                  
                  <div class="payment-option payment-details" style="display: none;">
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>From Date</label>
                      <?php  $year = date('Y');
                        $fromDate = '';
                        $toDate = '';
                        $fromMonth = '';
                        $toMonth = '';
                        if(($current_sem % 2) == 0){
                          $fromDate = '01-01-'.date('Y');
                          $toDate = '30-06-'.date('Y');
                          $fromMonth = 'JAN';
                          $toMonth = 'JUN';
                        }else{
                          $fromMonth = 'JUL';
                          $toMonth = 'DEC';
                          $fromDate = '01-07-'.date('Y');
                          $toDate = '31-12-'.date('Y');
                        }
                       ?>
                      <input type="text" class="form-control inputDisabled" placeholder="Enter your serial no." value="<?php echo $fromMonth; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                      <label>To Date</label>
                      <input type="text" class="form-control inputDisabled" placeholder="Enter your full name" value="<?php echo $toMonth;?>" disabled>
                    </div>
                  </div>
                  
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Particular</th>
                          <th class="text-right">Amount(₹)</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $netPay = 0;
                        if($payment_number == 0){
                          foreach ($payment_options as $key => $value) { 
                            $netPay += $value->amount;
                            ?>
                            <tr>
                              <td><?php echo $value->option_name;?></td>
                              <td class="text-right"><?php echo $value->amount;?></td>
                            </tr>
                        <?php  }
                          }
                       ?>
                        
                        <tr>
                          <td>Room Rent 6 months ( <?php echo number_format((float)$room_fee_charge, 2, '.', ''); ?>X6)</td>
                          <td class="text-right"><?php
                            $sixMonthRent =  ($room_fee_charge * 6); 
                            $netPay += $sixMonthRent;
                            echo $sixMonthRent;
                           ?></td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-right">Total</th>
                          <th class="text-right"><?php echo number_format((float)$netPay, 2, '.', '');?></th>
                        </tr>
                      </tfoot>
                    </table>

                    <input type="hidden" name="total_paid" id="total_paid" value="<?php echo $netPay; ?>" />

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Make Payment</button>
                   
                    <?php
                      // echo "<pre>";
                      // print_r($student_details);
                     ?>
                  </div>
                <br>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confrom Your Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          INR: <?php echo number_format((float)$netPay, 2, '.', '');?>
        </div>
        <div class="modal-footer">
        <form id="add_payment" action="<?php echo base_url('add-payment'); ?>" method="POST">
          
          <input name="student_id" type="hidden" class="form-control inputDisabled"  value="<?php echo $student_details->id; ?>" >
          <input type="hidden" name="student_hostel_name" id="student_hostel_name" value="<?php echo $student_details->hostel_name; ?>" />
          <input type="hidden" name="total_paid" id="total_paid" value="<?php echo $netPay; ?>" />
          <input type="hidden" name="total_amount" id="total_amount" value="<?php echo $netPay; ?>" />
          <input type="hidden" name="total_overdue" id="total_overdue" value="0" />
          <input type="hidden" name="new_from_date_hidden" id="new_from_date_hidden" value="<?php echo $fromDate; ?>" />
          <input type="hidden" name="new_to_date_hidden" id="new_to_date_hidden" value="<?php echo $toDate; ?>" />
          <input type="hidden" name="select_plan_month_checked" id="select_plan_month_checked" value="" />
          <input type="hidden" name="select_plan_checked" id="select_plan_checked" value="" />
          <input type="hidden" name="plan_type" id="plan_type" value="" />
          <input type="hidden" name="select_plan_month_checked_year" id="select_plan_month_checked_year" value="" />
          <input type="hidden" name="select_plan_month_checked_year1" id="select_plan_month_checked_year1" value="" />
          <input type="hidden" name="mess_value" id="mess_value" value="" />
          <input type="hidden" name="room_value" id="room_value" value="<?php echo $room_fee_charge; ?>" />
          
          <input type="hidden" name="room_value_json" id="room_value_json" value='<?php echo json_encode($room_fee_hostel); ?>' />
          <input type="hidden" name="room_month_json" id="room_month_json" value="" />
          <input type="hidden" name="month_names_breakup" id="month_names_breakup" value="" />
          <input type="hidden" name="month_fees_breakup" id="month_fees_breakup" value="" />
          <input type="hidden" name="payment_semester" id="payment_semester" value="" />
          <button type="submit" class="btn btn-secondary" >Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

   <form id="submitPaymentGetWay" method="post" action="https://merchant.onlinesbi.com/merchant/merchantprelogin.htm">
  <!-- LIVE URL -->
     <input  name="encdata" id="encdata" value="" type="hidden">
    <input  name="merchant_code" id="merchant_code" value="" type="hidden">
    <!-- <input type="button" value="Submit" name="Submit"> -->
  </form>

<script type="text/javascript">
   // $("form").on('submit', function(e) {
    $("#add_payment").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: "post",
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(response) {
                if (response.res == "success") {
                  $('#encdata').val(response.encstring);
                  $('#merchant_code').val(response.merchant_code);
                  document.getElementById("submitPaymentGetWay").submit();
                } else {
                    console.log('error')
                }
            }
        });
    });
</script>

    <script type="text/javascript">
      $( ".change-semester" ).on('change', (event)=>{
        if(event.target.value != 0){
          $('.payment-details').css("display", "block");
          $('#payment_semester').val(event.target.value);
        }else{
          $('.payment-details').css("display", "none");
        }
        
      });
    </script>