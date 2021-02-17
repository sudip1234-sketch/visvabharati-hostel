<?php 
$search_url = base_url('completed-students');
$is_subadmin = $this->session->userdata('is_subadmin'); 
?>

<style type="text/css">
  .clsred{
  color: red;
}
#example1_filter{
  float: right;
}
.asd{ background-color: #fff;
    padding: 25px 10px; 
  }
</style>
 <div class="" id="payment-status" role="tabpanel">
  <div class="row">
    <div class="col-auto">
      <h4><!-- All Payment Report --> Completed Students</h4>
    </div>
    <div class="col">
  
    </div>
  </div>
  <hr>
  <span id="send_sms_msg" style="color:green"></span>
    <!-- <div class="table-responsive"> -->
    <div class="asd " style="">
      <form name="frm" id="frm" method="get" action="<?php echo $search_url; ?>">
      <div class="row">
        <div  class="col-md-12">
            <div class="">
                <label >Hostel</label>
                <select class="custom-select" name="search_by_hostel" id="search_by_hostel">
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
        
        </form>
    </div>
    
    </br>
    <div style="display: <?php echo !empty($all_data)? 'block': 'none'; ?>" id="addRoomDivTable"  class="">
    <table  id="example1"  class="table table-striped" style="font-size: 14px;">
      <thead>
        <tr>
          <th scope="col">SL No</th>
          <th scope="col">Course Name</th>
          <th scope="col">Student Id</th>
          <th scope="col">Name</th>
          <th scope="col">Total Course Year</th>
          
        </tr>
      </thead>
       <tbody>
       <?php 
        foreach ($all_data as $key => $value) { ?>
         <tr>
           <td><?php echo $key + 1; ?></td>
           <td><?php echo @$value['course_name']; ?></td>
           <td><?php echo @$value['student_id']; ?></td>
           <td><?php echo @$value['full_name']; ?></td>
           <td><?php echo @$value['course_total_year']; ?></td>
          
         </tr>
        <?php }
       ?>
        
      </tbody>
    </table>
    </div>
    <!-- STUDENT DETAILS START-->
    <div style="display: <?php echo !empty($all_data_student)? 'block': 'none'; ?>" id="addRoomDivTable"  class="">
    <table  id="example1"  class="table table-striped" style="font-size: 14px;">
      <thead>
        <tr>
          <th scope="col">SL No</th>
          <th scope="col">Hostel Name</th>
          <th scope="col">Student Id</th>
          <th scope="col">Name</th>
          <th scope="col">Semester</th>
          <th scope="col">Year</th>
          <th scope="col">Amount</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
       <tbody>
       <?php 
          // $semester_count = ($all_data_student->total_count + $all_data_student->semester);
         for ($x = $from_semester_due; $x <= (@$all_data_student->total_year * 2); $x++) {
          $i = 1;
          $sem_year = 0;
          $year = (int)'20'.substr($all_data_student->student_id,7,2);
          $increment = floor($x/2);
          $sem_year =  $year + $increment;
       ?>
         <tr>
           <td><?php echo $i; ?></td>
           <td><?php echo @$all_data_student->HostelName; ?></td>
           <td><?php echo @$all_data_student->student_id; ?></td>
           <td><?php echo @$all_data_student->full_name; ?></td>
           <td><?php echo $x; ?></td>
           <td><?php echo $sem_year; ?></td>
           <td><?php echo $room_fee_charge * 6; ?></td>
           <td>

           
           <button 
                stid="<?php echo @$all_data_student->id; ?>"
                amount="<?php echo $room_fee_charge * 6; ?>"
                roomFee="<?php echo $room_fee_charge; ?>"
                year="<?php echo $sem_year; ?>"
                semester="<?php echo $x; ?>"
                hostelName="<?php echo @$all_data_student->hostel_name; ?>"
            type="button" class="btn btn-primary payment-modal"  data-toggle="modal" >
            Payment
            </button>
            </td>
         </tr>
        <?php 
        $i++;
      }
       ?>
        
      </tbody>
    </table>
    </div>
    <!-- STUDENT DETAILS START-->
    <!-- </div> -->
</div>


<!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="paymentByAdmin" id="paymentByAdmin" method="post" action="<?php echo  base_url('payment-by-admin'); ?>" >
      <form id="paymentByAdmin">
      <div class="modal-body">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-4"><label>Semester: <span id="semester-label"></span></label></div>
        <div class="col-md-4"><label>Year: <span id="year-label"></span></label> </div>
      </div>
      <div class="row">
        <div class="col-md-4"><label>Transaction No.:</label> <input class="form-control" type="text" name="transaction_no"></div>
        <div class="col-md-8">
          <div class="form-group">
              <label>Allotment</label>
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline22" name="search_by_allotment" class="custom-control-input" value="0">
                  <label class="custom-control-label" for="customRadioInline22">VB Account </label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline23" name="search_by_allotment" class="custom-control-input" value="1">
                  <label class="custom-control-label" for="customRadioInline23">SBI Collect </label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline232" name="search_by_allotment" class="custom-control-input" value="2">
                  <label class="custom-control-label" for="customRadioInline232">Online Potal </label>
              </div>
          </div>
      </div>
      </div>
      <br>
      <div class="row">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Particular</th>
              <th class="text-right">Amount(₹)</th>
            </tr>
          </thead>
          <tbody>
                                  
            <tr>
              <td>Room Rent 6 months<span class="amount-label-des">( 400.00X6)</span> </td>
              <td  class="text-right amount-label"></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th class="text-right">Total</th>
              <th  class="text-right amount-label"></th>
            </tr>
          </tfoot>
        </table>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="student_id" name="student_id" value="">
        <input type="hidden" id="student_hostel_name" name="student_hostel_name" value="">
        <input type="hidden" id="total_amount" name="total_amount" value="">
        <input type="hidden" id="room_fee" name="room_fee" value="">
        <input type="hidden" id="payment_semester" name="payment_semester" value="">
        <input type="hidden" id="year" name="year" value="">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input  id="submitButton"  type="submit" class="btn btn-primary" value="submit">
        <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
      </div>
      </form>
    </div>
  </div>
</div>



<script type="text/javascript">

 $("document").ready(function(){
    $( "#search_by_hostel" ).change(function() {
      $( "#frm" ).submit();
    });
    
    $( "#search_by_semester" ).change(function() {
      // $('#addRoomDivTable').show();
      $( "#frm" ).submit();
    });



    $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { 
                extend: 'excel',
                text: 'Download'
             }
        ]
    });




    $(".payment-modal").click(function(){
      const stid = $(this).attr('stid');
      const amount = $(this).attr('amount');
      const roomFee = $(this).attr('roomFee');
      const year = $(this).attr('year');
      const semester = $(this).attr('semester');
      const hostelName = $(this).attr('hostelName');
      console.log(year);
      console.log('dddd');
      $('#exampleModal').on('shown.bs.modal', function () {
      // $('#myInput').trigger('focus')
      $("#semester-label").text(semester);
      $("#year-label").text(year);
      $(".amount-label").text(amount);
      const amountDes =  ` (${amount /6}X6)`;
      $(".amount-label-des").text(amountDes);

      $("#student_id").val(stid);
      $("#student_hostel_name").val(hostelName);
      $("#total_amount").val(amount);
      $("#room_fee").val(roomFee);
      $("#payment_semester").val(semester);
      $("#year").val(year);


      }).modal("show");
    })

    // $('#paymentByAdmin').submit(function(event) { 
    //   $( "#paymentByAdmin" ).on( "submit", function(e) {
    //     e.preventDefault();
    //     $('#exampleModal').modal('toggle');
    //     var formValues= $(this).serialize();
    //     // alert(formValues); return false;
    //     $.ajax({
    //       type: 'POST',
    //       url: "<?php echo $search_url; ?>",
    //       data: formValues,
    //       success: function(resultData) {
    //           // resultData = jQuery.parseJSON(resultData);
    //           // var student_id = $('#edit_student_id1').val();
    //           // var hostel_code = resultData.hostel_code + '_' + student_id;

    //           // $('#edit_hostel_code').val(resultData.hostel_code);
    //           // $('#edit_hostel_id').val(hostel_code);
    //           // $('#edit_hostel_id11').val(hostel_code);
    //           // $('#edit_hostel_id').prop('readonly', true);
    //           // $('#edit_hostel_code').prop('readonly', true);
    //           console.log('resultData');
    //       }

    //   });
      
    // });

     $( "#submitButton" ).click(function() {
      // $('#addRoomDivTable').show();
      $('#exampleModal').modal('toggle');
      $( "#paymentByAdmin" ).submit();
    });
    
});

</script>



