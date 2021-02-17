<div class="" id="allotment-card" role="tabpanel">
  <div class="row">
    <div class="col-auto">
      <h4>Manage Seats</h4>
    </div>
    <div class="col">     
    </div>
  </div>
   <hr>
         
  <form novalidate method="post" action="<?php echo base_url('admin-add-seat'); ?>" name="add-form" id="addform" enctype="multipart/form-data"> 
  <input type="hidden" name="seatIdsForSave" id="seatIdsForSave" value="">
  <div class="row">
    <div class="col-sm-7 col-md-8 col-lg-12">
      <div class="form-row">
        <div class="form-group col-md-6">
         <label>Hostel Name</label>
           <select class="custom-select" name="hostel_name" id="hostel_name"  >
            <option value="">Choose...</option>
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
          <span class="hostel_name_err clsred"></span> 
        </div>
      </div>


      <div class="form-row">
      <div class="form-group col-md-6">
        <label>Total Seats</label>
        <input type="text" name="total_seats" id="total_seats" class="form-control number" placeholder="Enter Total Seats" value="" >
        <span class="total_seats_err clsred"></span> 
        <input type="hidden" name="total_seats_final" id="total_seats_final" value="">
      </div>
      <div class="addRoomEditDiv" style="display: none;">
        <a class="btn btn-info"  onclick="addRoomEdit();" style="margin-left: 25px;
    margin-top: 21px;">Add Rooms, Seats & Beds</a>
      </div>
    </div>

    <div class="form-row addRoomDivForm1">
      <div class="form-group col-md-6">
        <label>Add Rooms, Seats & Beds</label>
          <i class="fa fa-plus clsred" aria-hidden="true" onclick="addRoomDiv();"></i>
      </div>
    </div>

    <div id="addRoomDivForm" style="display: none;">
        <div class="form-row">
          <div class="form-group col-md-3">
            <label>Block Name</label>
            <select name="block_id" id="block_id" class="form-control">
              <?php if(!empty($blockNo)){
                      foreach ($blockNo as $value) { ?>
                        <option value="<?php echo $value->id; ?>"><?php echo $value->block_name; ?></option>
               <?php  }  } ?>
            </select> 
            <span class="block_id_err clsred"></span>         
          </div>


          <div class="form-group col-md-3">
            <label>Floor</label>
            <select name="floor_id" id="floor_id" class="form-control">
              <?php if(!empty($floorNo)){
                      foreach ($floorNo as $value) { ?>
                        <option value="<?php echo $value->id; ?>"><?php echo $value->floor_name; ?></option>
               <?php  }  } ?>
            </select> 
            <span class="floor_id_err clsred"></span>         
          </div>


          <div class="form-group col-md-3">
            <label>Room No.</label>
            <input type="text" name="room_no" id="room_no" class="form-control roomRoom" placeholder="Enter Room No." value="" >  
            <span class="room_no_err clsred"></span>         
          </div>

          <div class="form-group col-md-3">
            <label>Room Fee for Indian</label>
            <input type="text" name="room_fee" id="room_fee" class="form-control roomFee number" placeholder="Enter Room Fee" value="">  
            <span class="room_fee_err clsred"></span>         
          </div>

          <div class="form-group col-md-3">
            <label>Room Fee for Foreigner</label>
            <input type="text" name="room_fee_foreigner" id="room_fee_foreigner" class="form-control roomFeeFore number" placeholder="Enter Room Fee for Foreigner" value="">  
            <span class="room_fee_foreigner_err clsred"></span>         
          </div>
          

          <div class="form-group col-md-3">
            <label>No. of Seats</label>
            <input type="text" name="no_of_seats" id="no_of_seats" class="form-control number" placeholder="Enter No. of Seats" value="" onkeyup="getbeds(this.value);" >    
            <span class="no_of_seats_err clsred"></span>             
          </div>

          <div class="form-group col-md-3">
            <label>Room Block</label>
            <input type="checkbox" name="seat_block" id="seat_block" value="1" >
          </div>

          <div class="form-group col-md-12">
            <label>Beds</label>
            <div class="allBednos">
            </div>
            <span class="beds_nos_err_all clsred" style="display: block;"></span>
          </div>
          

          <div class="form-group col-md-12">
          <label></label>
            <input onclick="saveRoomSeat();" type="button" name="Save" class="roomsave save_button" value="Save" >
          </div>

          </div>

          

       </div>


       <div id="addRoomDivTable" style="display: none;">
        <div class="form-row">
          <div class="form-group">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Sl No</th>
                  <th scope="col">Block No.</th>
                  <th scope="col">Floor</th>
                  <th scope="col">Room No.</th>
                  <th scope="col">Room Fee Indian</th>
                  <th scope="col">Room Fee Foreigner</th>
                  <th scope="col">No. of Seats</th>
                  <th scope="col">Bed No.</th>
                  <th scope="col">Block</th>
                </tr>
              </thead>
              <tbody id="addRoomDivTableBody">
                                  
              </tbody>
            </table>
          </div>
        </div>
       </div>

            
    <div id="roomPer" style="display: none;">
     <div class="form-row">
      <div class="form-group col-md-6">
        <label>Occupied Seats</label>
        <input type="text" name="total_seats_booked" id="total_seats_booked" class="form-control" placeholder="Enter Total Seats Booked" value="" disabled >
        <input type="hidden" name="seats_booked" id="seats_booked" value="">
      </div>
      <div class="form-group col-md-6">
        <label>Available Seats</label>
        <input type="text" name="total_seats_remaining" id="total_seats_remaining" class="form-control" placeholder="Enter Total Seats Remaining" value="" disabled >
        <input type="hidden" name="seats_remaining" id="seats_remaining" value="">
      </div>
    </div> 

     <div class="form-row">
      <div class="form-group col-md-6">
        <label>Release No Of Seats (%)</label>
        <input type="number" max="100" name="release_seats_in_percent" id="release_seats_in_percent" class="form-control" placeholder="Enter Percentage Of Seats To Release" value="" >
        <span id="release_seats_in_percent_err" style="color: red;"></span>
        <span id="release_seats_in_percent_save" style="color: green;"></span>
      </div>

      <div class="form-group col-md-6">
        <label>No of seats available after releasing </label>
        <input type="text" name="total_released_seats" id="total_released_seats" class="form-control" placeholder="Total Seats After Release" value="" disabled >
        <input type="hidden" name="seats_available_after_release" id="seats_available_after_release" value="">
      </div>
    </div> 

    </div>
             
    <input  style="display: none;" type="submit" name="add_admin" id="add_admin" class="btn btn-danger" value="Update" />

    </div>
  </div>
  </form>
</div>














<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Rooms, Seats & Beds</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form id="editSeatModel">

      <div class="form-row">
      <div class="form-group col-md-6">
        <label>Add Seats</label>
        <input type="text" name="total_seats_edit" id="total_seats_edit" class="form-control number" placeholder="Enter Seats" value="" onkeyup="addbedsDetails(this);" >
         <input type="hidden" name="total_seats_edit_edit" id="total_seats_edit_edit" value="">        
        <span class="total_seats_edit_err clsred"></span> 
      </div>
    </div>



        <div id="addRoomDivForm_edit" style="display: none;">
  <div class="form-row">
    <div class="form-group col-md-3">
      <label>Block Name</label>
      <select name="block_id_edit" id="block_id_edit" class="form-control">
      <?php if(!empty($blockNo)){
            foreach ($blockNo as $value) { ?>
              <option value="<?php echo $value->id; ?>"><?php echo $value->block_name; ?></option>
      <?php  }  } ?>
      </select> 
      <span class="block_id_edit_err clsred"></span>         
    </div>


    <div class="form-group col-md-3">
      <label>Floor</label>
      <select name="floor_id_edit" id="floor_id_edit" class="form-control">
      <?php if(!empty($floorNo)){
            foreach ($floorNo as $value) { ?>
              <option value="<?php echo $value->id; ?>"><?php echo $value->floor_name; ?></option>
      <?php  }  } ?>
      </select> 
      <span class="floor_id_edit_err clsred"></span>         
    </div>


    <div class="form-group col-md-3">
      <label>Room No.</label>
      <input type="text" name="room_no_edit" id="room_no_edit" class="form-control roomRoom" placeholder="Room No." value="" >  
      <span class="room_no_edit_err clsred"></span>         
    </div>

    <div class="form-group col-md-3">
      <label>Room Fee for Indian</label>
      <input type="text" name="room_fee_edit" id="room_fee_edit" class="form-control roomFee number" placeholder="Room Fee" value="" >  
      <span class="room_fee_edit_err clsred"></span>         
    </div>

    <div class="form-group col-md-3">
      <label>Room Fee for Foreigner</label>
      <input type="text" name="room_fee_foreigner_edit" id="room_fee_foreigner_edit" class="form-control roomFeeFore number" placeholder="Room Fee for Foreigner" value="" >  
      <span class="room_fee_foreigner_edit_err clsred"></span>         
    </div>

    <div class="form-group col-md-3">
      <label>No. of Seats</label>
      <input type="text" name="no_of_seats_edit" id="no_of_seats_edit" class="form-control number" placeholder="Enter No. of Seats" value="" onkeyup="getbeds_edit(this.value);" >
      <span class="no_of_seats_edit_err clsred"></span>             
    </div>

    <div class="form-group col-md-3">
      <label>Room Block</label>
      <input type="checkbox" name="seat_block_edit" id="seat_block_edit" value="1" >
    </div>

    <div class="form-group col-md-12">
      <label>Beds</label>
      <div class="allBednos_edit">
      </div>
      <span class="beds_nos_err_all_edit clsred" style="display: block;"></span>
    </div>    

    <div class="form-group col-md-12">
      <label></label>
      <input onclick="saveRoomSeat_edit();" type="button" name="Save" class="roomsave save_edit_button" value="Save" >
    </div>
  </div>   
</div>

<div id="addRoomDivTable_edit" style="display: none;">
        <div class="form-row">
          <div class="form-group">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Sl No</th>
                  <th scope="col">Block No.</th>
                  <th scope="col">Floor</th>
                  <th scope="col">Room No.</th>
                  <th scope="col">No. of Seats</th>
                  <th scope="col">Bed No.</th>
                  <th scope="col">Block</th>
                </tr>
              </thead>
              <tbody id="addRoomDivTableBody_edit">
                                  
              </tbody>
            </table>
          </div>
        </div>
       </div>


<input onclick="saveRooms_edit();"  style="display: none;" type="button" name="add_admin_edit" id="add_admin_edit" class="btn btn-danger" value="Update" />

</form>
      </div>

     

    </div>
  </div>
</div>



<script>
var page_edit = '0';


$(document).ready(function(){



       $( "#hostel_name" ).change(function() {
        var hostel_id = $(this).val();
        var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-hostel-seat-details');?>",
                    data: {  "id": hostel_id},
                    dataType: "text",
                    success: function(resultData) { 
                      //console.log(resultData);
                      resultData = jQuery.parseJSON(resultData);
                      //console.log(resultData);
                      var seats_available = resultData.seats_available;
                      var hostel_rooms_seats = resultData.hostel_rooms_seats;
                      if(seats_available && hostel_rooms_seats.length > 0)
                      {
                        page_edit = '1';
                        $('.addRoomEditDiv').show();

                        $('#total_seats').val(seats_available.total_seats);
                        $('#total_seats_booked').val(seats_available.total_seats_booked);
                        $("#seats_remaining").val(seats_available.total_seats_remaining);
                        $('#total_seats_remaining').val(seats_available.total_seats_remaining);
                        $("#release_seats_in_percent").val(seats_available.release_seats_in_percent);
                        $("#seats_not_released").val(seats_available.seats_not_released);
                        $("#total_released_seats").val(seats_available.seats_available_after_release);
                        $("#seats_available_after_release").val(seats_available.seats_available_after_release);


                        $('#total_seats').attr('disabled',true);
                        $('.addRoomDivForm1').hide();
                        //$('#add_admin').show();
                        $('#roomPer').show();


                      }
                      else
                      {

                        page_edit = '0';
                        $('.addRoomEditDiv').hide();

                        $('#total_seats').val('');
                        $('#total_seats_booked').val('');
                        $('#seats_booked').val('');
                        $("#seats_remaining").val('');
                        $('#total_seats_remaining').val('');
                        $("#release_seats_in_percent").val('');
                        $("#seats_not_released").val('');
                        $("#total_released_seats").val('');
                        $("#seats_available_after_release").val('');

                        $('#total_seats').attr('disabled',false);
                        $('.addRoomDivForm1').show();
                        //$('#add_admin').hide();
                        $('#roomPer').hide();

                      }



                      if(hostel_rooms_seats.length > 0)
                      {

                        page_edit = '1';
                        $('.addRoomEditDiv').show();

                        var tbodyRooms = '';
                        var iii;
                        for (iii = 0; iii <hostel_rooms_seats.length; iii++) { 
                            //console.log(hostel_rooms_seats[iii]); 
                             if(hostel_rooms_seats[iii]["block"]==1){
                                  var seatt = 'Blocked';
                              }else{
                                  var seatt = '-';
                              }

                            var bed_comma = hostel_rooms_seats[iii]["beds_nos"];
                            var bed_arr = bed_comma.split(", ");
                            var beddd = "'"+bed_arr.join('##')+"'";

                            var booked_bed_arr = [];
                            if(hostel_rooms_seats[iii]["booked_bed_nos"]){
                               var booked_bed_comma = hostel_rooms_seats[iii]["booked_bed_nos"];
                            var booked_bed_arr = booked_bed_comma.split(",");

                            }

                            var booked_beddd = "'"+booked_bed_arr.join('##')+"'";
                            //console.log(bed_arr); 

                        var tdBed = '';
                        var iiiBed;
                        for (iiiBed = 0; iiiBed < bed_arr.length; iiiBed++) {
                          var chk_booked = booked_bed_arr.indexOf(bed_arr[iiiBed]);
                          //console.log(chk_booked);
                          if(chk_booked==-1){
                            tdBed += '<span class="tdbedSpan">'+bed_arr[iiiBed]+'</span>';
                          }else{
                            tdBed += '<a target="_blank" class="tdbedAhref" href="<?php echo base_url(); ?>admin-show-current-student?hostel='+hostel_rooms_seats[iii]["hostel_id"]+'&block='+hostel_rooms_seats[iii]["block_id"]+'&floor='+hostel_rooms_seats[iii]["floor_id"]+'&room='+hostel_rooms_seats[iii]["room_no"]+'&bed='+bed_arr[iiiBed]+'&seatId='+hostel_rooms_seats[iii]["id"]+'">'+bed_arr[iiiBed]+'</a>';
                          }
                          
                        }

                        //console.log(tdBed); 

                            tbodyRooms += '<tr id="'+hostel_rooms_seats[iii]["id"]+'"><th scope="row">'+(iii+1)+'</th><td id="block_id_'+hostel_rooms_seats[iii]["id"]+'">'+hostel_rooms_seats[iii]["block_name"]+'</td><td id="floor_id_'+hostel_rooms_seats[iii]["id"]+'">'+hostel_rooms_seats[iii]["floor_name"]+'</td><td id="room_'+hostel_rooms_seats[iii]["id"]+'">'+hostel_rooms_seats[iii]["room_no"]+'</td><td id="roomFee_'+hostel_rooms_seats[iii]["id"]+'">'+hostel_rooms_seats[iii]["room_fee"]+'</td><td id="roomFeeFore_'+hostel_rooms_seats[iii]["id"]+'">'+hostel_rooms_seats[iii]["room_fee_foreigner"]+'</td><td>'+hostel_rooms_seats[iii]["no_of_seats"]+'</td><td id="bed_'+hostel_rooms_seats[iii]["id"]+'">'+tdBed+'</td><td id="blockk_'+hostel_rooms_seats[iii]["id"]+'">'+seatt+'</td><td id="edit_'+hostel_rooms_seats[iii]["id"]+'"><i onclick="editBed('+hostel_rooms_seats[iii]["id"]+','+hostel_rooms_seats[iii]["block"]+','+beddd+','+booked_beddd+','+hostel_rooms_seats[iii]["hostel_id"]+');" class="far fa-edit clsred"></i></td></tr>';
                        }
                        $('#addRoomDivTable').show();
                        $('#addRoomDivTable').html('<div class="form-row"><div class="form-group"><table class="table table-striped"><thead><tr><th scope="col">Sl No</th><th scope="col">Block No.</th><th scope="col">Floor</th><th scope="col">Room No.</th><th scope="col">Room Fee Indian</th><th scope="col">Room Fee Foreigner</th><th scope="col">No. of Seats</th><th scope="col">Bed No.</th><th scope="col">Block</th><th scope="col">Action</th></tr></thead><tbody>'+tbodyRooms+'</tbody></table></div></div>');
                      }else{
                        $('#addRoomDivTable').hide();
                        $('#addRoomDivTable').html('');
                      }

                    }
          });

        //saveData.error(function() { alert("Something went wrong"); });
      });

  });


/***************************************************/
var totalSeats = 0;
$( "#total_seats" ).keyup(function() {
  totalSeats = $(this).val();
  $("#total_seats_final").val(totalSeats);
});

function addRoomDiv(){
  $('.hostel_name_err').html('');
  $('.total_seats_err').html('');
  if($("#hostel_name").val() === ''){
    $('.hostel_name_err').html('Enter Hotel Name');
  }else if($("#total_seats").val() === ''){
    $('.total_seats_err').html('Enter Total Rooms');
  }else{
    totalSeats = $("#total_seats").val();
    $('#total_seats').attr('disabled',true);
    $("#addRoomDivForm").show();
    $(".addRoomDivForm1").hide();
  }
  
}

function saveRoomSeat(){
  var room_no = $("#room_no").val();
  var room_fee = $("#room_fee").val();
  var room_fee_foreigner = $("#room_fee_foreigner").val();
  var no_of_seats = $("#no_of_seats").val();
  var seat_block = 0;
  var beds_nos = [];

  $('.room_no_err').html('');
  $('.room_fee_err').html('');
  $('.room_fee_foreigner_err').html('');
  $('.no_of_seats_err').html('');

// check bed no
      
    var ii
    for (ii = 1; ii <=no_of_seats; ii++) { 
        if($("#seat_"+ii).val()==''){
         $('#seat_'+ii).css('border-color', 'red');
        }else{
          beds_nos.push($("#seat_"+ii).val()); 
          $('#seat_'+ii).css('border-color', '');
        }
    }
//console.log(totalSeats);

  if(room_no ==''){
    $('.room_no_err').html('Enter Room NO.');
  }else if(room_fee ==''){
    $('.room_fee_err').html('Enter Room Fee');
  }else if(room_fee_foreigner ==''){
    $('.room_fee_foreigner_err').html('Enter Room Fee for Foreigner');
  }else if(no_of_seats ==''){
    $('.no_of_seats_err').html('Enter NO. of Seats');
  }else if(parseInt(no_of_seats) > parseInt(totalSeats)){
    $('.no_of_seats_err').html('Total Seats exceeds');
  }else if(beds_nos.length != parseInt(no_of_seats)){
    //$('.beds_nos_err_all').html('Enter Bed Nos.');

    $(".bedsNos").each(function() {
      if($(this).val()==''){
        $(this).css('border-color', 'red');
      }
    });


  }else{
    if($("#seat_block").prop('checked') == true){
     seat_block = 1;
    }     

    var block_id = $('#block_id').val();
    var floor_id = $('#floor_id').val();

    //save
    $.post("<?php echo base_url(); ?>admin-save-RoomSeats", {room_no: room_no,no_of_seats: no_of_seats,seat_block: seat_block,hostel_id:$("#hostel_name").val(),beds_nos:beds_nos,block_id:block_id,floor_id:floor_id,room_fee:room_fee,room_fee_foreigner:room_fee_foreigner}, function(result){
        //console.log(result);

        var res = result.split("##"); 
        $('#addRoomDivTable').show();
        $('#addRoomDivTable').html('<div class="form-row"><div class="form-group"><table class="table table-striped"><thead><tr><th scope="col">Sl No</th><th scope="col">Block No.</th><th scope="col">Floor</th><th scope="col">Room No.</th><th scope="col">Room Fee Indian</th><th scope="col">Room Fee Foreigner</th><th scope="col">No. of Seats</th><th scope="col">Bed No.</th><th scope="col">Block</th></tr></thead><tbody>'+res[0]+'</tbody></table></div></div>');
        //$('#addRoomDivTableBody').html(res[0]);
        
        $("#room_no").val('');
        $("#room_fee").val('');
        $("#room_fee_foreigner").val('');
        $("#no_of_seats").val('');
        $('#seat_block').prop('checked', false);
        $(".allBednos").html('');

        $("#block_id").val($("#block_id option:first").val());

        $("#floor_id").val($("#floor_id option:first").val());

        $("#seatIdsForSave").val(res[3]);

        totalSeats = (totalSeats-no_of_seats);

        // check rooms count  
        if(totalSeats == 0){
          $("#addRoomDivForm").hide();
          $('#add_admin').show();

          $('#roomPer').show();

          $('#total_seats_booked').val(res[1]);
          $('#total_seats_remaining').val(res[2]);

          $('#seats_booked').val(res[1]);
          $('#seats_remaining').val(res[2]);

        }


    });   


  }

}


$("#release_seats_in_percent").keyup(function(){

  if ($(this).val() > 100){
    $('#release_seats_in_percent_err').html("Numbers not above 100");
    $(this).val('100');
  }


    var tot_available_seats = $("#total_seats_remaining").val();
    var percent_of_seats_to_be_released = $("#release_seats_in_percent").val();         
    var seats_released = parseInt((tot_available_seats * percent_of_seats_to_be_released)/100);
    $("#total_released_seats").val(seats_released);
    $('#seats_available_after_release').val(seats_released);

    if(page_edit=='1'){
      // save per
      $('.addRoomEditDiv').show();
      var total_seats_booked1 = $("#total_seats_booked").val();
      var total_seats_remaining1 = $("#total_seats_remaining").val();
      var release_seats_in_percent1 = $("#release_seats_in_percent").val();
      var total_released_seats1 = $("#total_released_seats").val();
      var total_seats1 = $("#total_seats").val();

      $.post("<?php echo base_url('admin-savePer');?>", {total_seats_booked: total_seats_booked1,total_seats_remaining:total_seats_remaining1,release_seats_in_percent:release_seats_in_percent1,total_released_seats:total_released_seats1,hostel_id:$("#hostel_name").val(),total_seats:total_seats1}, function(result){
        //console.log(result);
        $("#release_seats_in_percent_save").html('Release No Of Seats Changed.')

    });
    }
});


function getbeds(noSeatsVal){
   $(".allBednos").html('');   
   $('.no_of_seats_err').html('');

    if(noSeatsVal!='' && noSeatsVal!=0){
      if(parseInt(noSeatsVal) > parseInt(totalSeats)){
        $('.no_of_seats_err').html('Total Seats exceeds');
    }else{
      var i;
      for (i = 1; i <=noSeatsVal; i++) { 
          $(".allBednos").append('<input type="text" name="beds_nos['+i+']" class="form-control beds_nos bedsNos" value="'+i+'" id="seat_'+i+'" style="float: left; width: 10%;" >');
      }
    }

    
  }

}


$('.number').keypress(function(event) {
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
});



function editBed(bedId,blockOrNot,bednosAll,bookedbednos,hostelId){
  var room1 = $('#room_'+bedId).html();
  var roomfee1 = $('#roomFee_'+bedId).html();
  var roomfeefore1 = $('#roomFeeFore_'+bedId).html();
  var bed1 = bednosAll; //$('#bed_'+bedId).html();
  var blockk1 = $('#blockk_'+bedId).html();

  var block_id_html = $('#block_id_'+bedId).html();
  var floor_id_html = $('#floor_id_'+bedId).html();

  if(blockOrNot==1){
    var checked1 = 'checked';
  }else{
    var checked1 = '';
  }

  var allBednosTD = '';
  var bed1Arr = bed1.split("##"); //bed1.split(", ");
  var bookedbednos1 = bookedbednos.split("##"); 
  var bookedbednos2 = "'"+bookedbednos1.join('##')+"'";



  var iu;
      for (iu = 0; iu < bed1Arr.length; iu++) { 
        var chk_booked_beds = bookedbednos1.indexOf(bed1Arr[iu]);
        if(chk_booked_beds==-1){
          allBednosTD += '<input type="text" name="beds_nos['+iu+']" class="form-control beds_nos EditNOs" value="'+bed1Arr[iu]+'" id="seat_'+iu+'" style="float: left; width: 15%;" >';
      }else{
        allBednosTD += '<input disabled type="text" name="beds_nos['+iu+']" class="form-control beds_nos EditNOs" value="'+bed1Arr[iu]+'" id="seat_'+iu+'" style="float: left; width: 15%;" >';
      } }

  $('#room_'+bedId).html('<input type="text" id="EditRoom_'+bedId+'" name="room" class="form-control" value="'+room1+'" onkeyup="chkEditRoom('+bedId+');" > <span class="clsred" id="EditRoomErr_'+bedId+'"></span>');

  $('#roomFee_'+bedId).html('<input type="text" id="EditRoomFee_'+bedId+'" name="roomfeeVal" class="form-control number" value="'+roomfee1+'" > <span class="clsred" id="EditRoomFeeErr_'+bedId+'"></span>');

  $('#roomFeeFore_'+bedId).html('<input type="text" id="EditRoomFeeFore_'+bedId+'" name="roomfeeForeVal" class="form-control number" value="'+roomfeefore1+'" > <span class="clsred" id="EditRoomFeeForeErr_'+bedId+'"></span>');



  $('#bed_'+bedId).html(allBednosTD);
  $('#blockk_'+bedId).html('<input id="EditBlock_'+bedId+'" '+checked1+' type="checkbox" name="seat_block" class="form-control" value="1" >');
   $('#edit_'+bedId).html('<input onclick="EditRoomSeat('+bedId+','+bookedbednos2+','+hostelId+');" type="button" name="Edit" class="roomsave" value="Edit" id="editbtn_'+bedId+'" >'); 

   
   $.post("<?php echo base_url('admin-get-selected-blockNo');?>", {block_name: block_id_html,bedId:bedId}, function(result){
        $("#block_id_"+bedId).html(result);
    });

   $.post("<?php echo base_url('admin-get-selected-floorNo');?>", {floor_name: floor_id_html,bedId:bedId}, function(result){
        $("#floor_id_"+bedId).html(result);
    });
}


function EditRoomSeat(bedEditID,bookedbednos,hostelId){
  var bookedbednos1 = bookedbednos.split("##"); 
  var bookedbednos2 = "'"+bookedbednos1.join('##')+"'";

  var flgg = 1;

  var E_room1 = $('#EditRoom_'+bedEditID).val(); 
  var E_roomFee1 = $('#EditRoomFee_'+bedEditID).val();  
  var E_roomFeeFore1 = $('#EditRoomFeeFore_'+bedEditID).val();  
  var E_blockk1 = 0;
  var E_blockk1_text = '-';
  if($("#EditBlock_"+bedEditID).prop('checked') == true){
     E_blockk1 = 1;
     E_blockk1_text = 'Blocked';
  } 
  var E_bed1 = [];
  $(".EditNOs").each(function() {
    if($(this).val()!=''){
     E_bed1.push($(this).val());
    }else{
      flgg = 0;
      $(this).css('border-color', 'red');
    }
  });

  if(E_room1==''){
    $('#EditRoom_'+bedEditID).css('border-color', 'red');
  }else if(E_roomFee1==''){
    $('#EditRoomFee_'+bedEditID).css('border-color', 'red');
  }else if(E_roomFeeFore1==''){
    $('#EditRoomFeeFore_'+bedEditID).css('border-color', 'red');
  }else if(flgg==0){    
      $(".EditNOs").each(function() {
      if($(this).val()==''){
        flgg = 0;
        $(this).css('border-color', 'red');
      }
    });


  }else{
    E_bed1 = E_bed1.join(", ");


    var block_id_edit = $('#block_id_edit_'+bedEditID).val(); 
    var floor_id_edit = $('#floor_id_edit_'+bedEditID).val(); 

    var block_id_edit_text = $('#block_id_edit_'+bedEditID+' option:selected').text(); 
    var floor_id_edit_text = $('#floor_id_edit_'+bedEditID+' option:selected').text(); 

   // console.log(E_bed1);
    
    // save
    $.post("<?php echo base_url(); ?>admin-edit-RoomSeats", {room_no: E_room1,seat_block: E_blockk1,beds_nos:E_bed1,bedId:bedEditID,hostel_id:$("#hostel_name").val(),block_id_edit:block_id_edit,floor_id_edit:floor_id_edit,room_fee:E_roomFee1,room_fee_foreigner:E_roomFeeFore1}, function(result){
        //console.log(result);


        var res = result.split("##");
          $('#total_seats_booked').val(res[0]);
          $('#total_seats_remaining').val(res[1]);
          $('#seats_booked').val(res[0]);
          $('#seats_remaining').val(res[1]);

          var seats_released1 = parseInt((res[1] * $('#release_seats_in_percent').val())/100);
          $("#total_released_seats").val(seats_released1);
          $('#seats_available_after_release').val(seats_released1);

        $('#room_'+bedEditID).html(E_room1);
        $('#roomFee_'+bedEditID).html(E_roomFee1);
        $('#roomFeeFore_'+bedEditID).html(E_roomFeeFore1);

       // $('#bed_'+bedEditID).html(E_bed1); 
      // console.log(E_bed1);
       var bed_arr1 = E_bed1.split(", ");
       var beddd11 = "'"+bed_arr1.join('##')+"'";
 
      var tdBed = '';
      var iiiBed;
      for (iiiBed = 0; iiiBed < bed_arr1.length; iiiBed++) {
        var chk_booked = bookedbednos1.indexOf(bed_arr1[iiiBed]);
        //console.log(chk_booked);
        if(chk_booked==-1){
          tdBed += '<span class="tdbedSpan">'+bed_arr1[iiiBed]+'</span>';
        }else{
          tdBed += '<a target="_blank" class="tdbedAhref" href="<?php echo base_url(); ?>admin-show-current-student?hostel='+hostelId+'&block='+block_id_edit+'&floor='+floor_id_edit+'&room='+E_room1+'&bed='+bed_arr1[iiiBed]+'&seatId='+bedEditID+'">'+bed_arr1[iiiBed]+'</a>';
        } 
        
      }

      $('#bed_'+bedEditID).html(tdBed); 



        $('#blockk_'+bedEditID).html(E_blockk1_text);


        $('#block_id_'+bedEditID).html(block_id_edit_text);
        $('#floor_id_'+bedEditID).html(floor_id_edit_text);

       // $('#edit_'+bedEditID).html('<i onclick="editBed('+bedEditID+','+E_blockk1+');" class="far fa-edit clsred"></i>');  

        $('#edit_'+bedEditID).html('<i onclick="editBed('+bedEditID+','+E_blockk1+','+beddd11+','+bookedbednos2+','+hostelId+');" class="far fa-edit clsred"></i>');



    });  
  }





}
function addRoomEdit(){
  $("#editSeatModel")[0].reset();
  $("#addRoomDivForm_edit").hide();
  $("#addRoomDivTable_edit").hide();
  $("#add_admin_edit").hide();
  $(".allBednos_edit").html('');
  $("#myModal").show();
}

$(".close").click(function(){
    $("#myModal").hide();
});


function addbedsDetails(all){
  var seat_edit = $(all).val();
  if(seat_edit!=''){
    $("#addRoomDivForm_edit").show();
    $("#total_seats_edit_edit").val(seat_edit);
  }
 

}

function getbeds_edit(noSeatsVal_edit){
   $(".allBednos_edit").html('');   
   $('.no_of_seats_edit_err').html('');
   var totalSeats_edit = $("#total_seats_edit_edit").val();

    if(noSeatsVal_edit!='' && noSeatsVal_edit!=0){
      if(parseInt(noSeatsVal_edit) > parseInt(totalSeats_edit)){
        $('.no_of_seats_edit_err').html('Total Seats exceeds');
    }else{
      var i;
      for (i = 1; i <=noSeatsVal_edit; i++) { 
          $(".allBednos_edit").append('<input type="text" name="beds_nos_edit['+i+']" class="form-control beds_nos bedsNos_edit" value="'+i+'" id="seat_edit_'+i+'" style="float: left; width: 10%;" >');
      }
    }

    
  }

}




function saveRoomSeat_edit(){
  var totalSeats_edit = $("#total_seats_edit_edit").val();

  var room_no_edit = $("#room_no_edit").val();
  var room_fee_edit = $("#room_fee_edit").val();
  var room_fee_foreigner_edit = $("#room_fee_foreigner_edit").val();
  var no_of_seats_edit = $("#no_of_seats_edit").val();
  var seat_block_edit = 0;
  var beds_nos_edit = [];

  $('.room_no_edit_err').html('');
  $('.room_fee_edit_err').html('');
  $('.room_fee_foreigner_edit_err').html('');
  $('.no_of_seats_edit_err').html('');

// check bed no
      
    var ii;
    for (ii = 1; ii <=no_of_seats_edit; ii++) { 
        if($("#seat_edit_"+ii).val()==''){
         $('#seat_edit_'+ii).css('border-color', 'red');
        }else{
          beds_nos_edit.push($("#seat_edit_"+ii).val()); 
          $('#seat_edit_'+ii).css('border-color', '');
        }
    }
//console.log(totalSeats);

  if(room_no_edit ==''){
    $('.room_no_edit_err').html('Enter Room NO.');
  }else if(room_fee_edit ==''){
    $('.room_fee_edit_err').html('Enter Room Fee');
  }else if(room_fee_foreigner_edit ==''){
    $('.room_fee_foreigner_edit_err').html('Enter Room Fee');
  }else if(no_of_seats_edit ==''){
    $('.no_of_seats_edit_err').html('Enter NO. of Seats');
  }else if(parseInt(no_of_seats_edit) > parseInt(totalSeats_edit)){
    $('.no_of_seats_edit_err').html('Total Seats exceeds');
  }else if(beds_nos_edit.length != parseInt(no_of_seats_edit)){
   
    $(".bedsNos_edit").each(function() {
      if($(this).val()==''){
        $(this).css('border-color', 'red');
      }
    });


  }else{
    if($("#seat_block_edit").prop('checked') == true){
     seat_block_edit = 1;
    }     

    var block_id_edit = $('#block_id_edit').val();
    var floor_id_edit= $('#floor_id_edit').val();

    //save
    $.post("<?php echo base_url(); ?>admin-save-RoomSeats", {room_no: room_no_edit,no_of_seats: no_of_seats_edit,seat_block: seat_block_edit,hostel_id:$("#hostel_name").val(),beds_nos:beds_nos_edit,block_id:block_id_edit,floor_id:floor_id_edit,room_fee:room_fee_edit,room_fee_foreigner:room_fee_foreigner_edit}, function(result_edit){
       // console.log(result_edit);

        var res_edit = result_edit.split("##");
        $('#addRoomDivTable_edit').show();
        $('#addRoomDivTable_edit').html('<div class="form-row"><div class="form-group"><table class="table table-striped"><thead><tr><th scope="col">Sl No</th><th scope="col">Block No.</th><th scope="col">Floor</th><th scope="col">Room No.</th><th scope="col">Room Fee Indian</th><th scope="col">Room Fee Foreigner</th><th scope="col">No. of Seats</th><th scope="col">Bed No.</th><th scope="col">Block</th></tr></thead><tbody>'+res_edit[0]+'</tbody></table></div></div>');
        
        $("#room_no_edit").val('');
        $("#room_fee_edit").val('');
        $("#room_fee_foreigner_edit").val('');
        $("#no_of_seats_edit").val('');
        $('#seat_block_edit').prop('checked', false);
        $(".allBednos_edit").html('');

        $("#block_id_edit").val($("#block_id_edit option:first").val());

        $("#floor_id_edit").val($("#floor_id_edit option:first").val());

        $("#seatIdsForSave_edit").val(res_edit[3]);
       
        totalSeats_edit = (totalSeats_edit-no_of_seats_edit);
        $("#total_seats_edit_edit").val(totalSeats_edit);
        // check rooms count  
        if(totalSeats_edit == 0){
          $("#addRoomDivForm_edit").hide();
          $('#add_admin_edit').show();
        }
    });   
  }

}

function saveRooms_edit(){
 var id_arr = new Array();
  $(".idDetails").each(function(){
    id_arr.push($(this).attr("data-id"));
    });
//console.log(id_arr);
  $.post("<?php echo base_url(); ?>admin-save-RoomSeats-edit", {ids:id_arr,hostel_id:$("#hostel_name").val()}, function(result_edit){
        //console.log(result_edit);
          $("#myModal").hide();
        if(result_edit!='none'){
        var resultData = jQuery.parseJSON(result_edit);
                     //console.log(resultData);
                      var seats_available = resultData.seats_available;
                      var hostel_rooms_seats = resultData.hostel_rooms_seats;
                      if(seats_available && hostel_rooms_seats.length > 0)
                      {
                        $('#total_seats').val(seats_available.total_seats);
                        $('#total_seats_booked').val(seats_available.total_seats_booked);
                        $("#seats_remaining").val(seats_available.total_seats_remaining);
                        $('#total_seats_remaining').val(seats_available.total_seats_remaining);
                        $("#release_seats_in_percent").val(seats_available.release_seats_in_percent);
                        $("#seats_not_released").val(seats_available.seats_not_released);
                        $("#total_released_seats").val(seats_available.seats_available_after_release);
                        $("#seats_available_after_release").val(seats_available.seats_available_after_release);


                        $('#total_seats').attr('disabled',true);
                        $('.addRoomDivForm1').hide();
                        //$('#add_admin').show();
                        $('#roomPer').show();

                      }



                      if(hostel_rooms_seats.length > 0)
                      {
                        var tbodyRooms = '';
                        var iii;
                        for (iii = 0; iii <hostel_rooms_seats.length; iii++) { 
                            //console.log(hostel_rooms_seats[iii]); 
                             if(hostel_rooms_seats[iii]["block"]==1){
                                  var seatt = 'Blocked';
                              }else{
                                  var seatt = '-';
                              }


                              var bed_comma = hostel_rooms_seats[iii]["beds_nos"];
                            var bed_arr = bed_comma.split(", ");
                            var beddd = "'"+bed_arr.join('##')+"'";

                            var booked_bed_arr = [];
                            if(hostel_rooms_seats[iii]["booked_bed_nos"]){
                               var booked_bed_comma = hostel_rooms_seats[iii]["booked_bed_nos"];
                            var booked_bed_arr = booked_bed_comma.split(",");

                            }

                            var booked_beddd = "'"+booked_bed_arr.join('##')+"'";
                            //console.log(bed_arr); 

                        var tdBed = '';
                        var iiiBed;
                        for (iiiBed = 0; iiiBed < bed_arr.length; iiiBed++) {
                          var chk_booked = booked_bed_arr.indexOf(bed_arr[iiiBed]);
                          //console.log(chk_booked);
                          if(chk_booked==-1){
                            tdBed += '<span class="tdbedSpan">'+bed_arr[iiiBed]+'</span>';
                          }else{
                            tdBed += '<a target="_blank" class="tdbedAhref" href="<?php echo base_url(); ?>admin-show-current-student?hostel='+hostel_rooms_seats[iii]["hostel_id"]+'&block='+hostel_rooms_seats[iii]["block_id"]+'&floor='+hostel_rooms_seats[iii]["floor_id"]+'&room='+hostel_rooms_seats[iii]["room_no"]+'&bed='+bed_arr[iiiBed]+'&seatId='+hostel_rooms_seats[iii]["id"]+'">'+bed_arr[iiiBed]+'</a>';
                          }
                          
                        }
                         
                          tbodyRooms += '<tr id="'+hostel_rooms_seats[iii]["id"]+'"><th scope="row">'+(iii+1)+'</th><td id="block_id_'+hostel_rooms_seats[iii]["id"]+'">'+hostel_rooms_seats[iii]["block_name"]+'</td><td id="floor_id_'+hostel_rooms_seats[iii]["id"]+'">'+hostel_rooms_seats[iii]["floor_name"]+'</td><td id="room_'+hostel_rooms_seats[iii]["id"]+'">'+hostel_rooms_seats[iii]["room_no"]+'</td><td id="roomFee_'+hostel_rooms_seats[iii]["id"]+'">'+hostel_rooms_seats[iii]["room_fee"]+'</td><td id="roomFeeFore_'+hostel_rooms_seats[iii]["id"]+'">'+hostel_rooms_seats[iii]["room_fee_foreigner"]+'</td><td>'+hostel_rooms_seats[iii]["no_of_seats"]+'</td><td id="bed_'+hostel_rooms_seats[iii]["id"]+'">'+tdBed+'</td><td id="blockk_'+hostel_rooms_seats[iii]["id"]+'">'+seatt+'</td><td id="edit_'+hostel_rooms_seats[iii]["id"]+'"><i onclick="editBed('+hostel_rooms_seats[iii]["id"]+','+hostel_rooms_seats[iii]["block"]+','+beddd+','+booked_beddd+','+hostel_rooms_seats[iii]["hostel_id"]+');" class="far fa-edit clsred"></i></td></tr>';


                        }
                        $('#addRoomDivTable').show();
                        $('#addRoomDivTable').html('<div class="form-row"><div class="form-group"><table class="table table-striped"><thead><tr><th scope="col">Sl No</th><th scope="col">Block No.</th><th scope="col">Floor</th><th scope="col">Room No.</th><th scope="col">Room Fee Indian</th><th scope="col">Room Fee Foreigner</th><th scope="col">No. of Seats</th><th scope="col">Bed No.</th><th scope="col">Block</th><th scope="col">Action</th></tr></thead><tbody>'+tbodyRooms+'</tbody></table></div></div>');
                      }else{
                        $('#addRoomDivTable').hide();
                        $('#addRoomDivTable').html('');
                      }

                  }
       

    }); 

}



$( ".roomRoom" ).keyup(function() {
  //console.log($(this).val());
  $('.room_no_err').html('');
  $('.room_no_edit_err').html('');

if(page_edit==0){
  var block_id = $("#block_id").val();
  var floor_id = $("#floor_id").val();
}else{
  var block_id = $("#block_id_edit").val();
  var floor_id = $("#floor_id_edit").val();
}
  



  $.post("<?php echo base_url(); ?>admin-check-RoomNo", {room_no:$(this).val(),hostel_id:$("#hostel_name").val(),block_id:block_id,floor_id:floor_id,edit:''}, function(result){
        //console.log(result);
        if(page_edit==0){
        if(result=='ok'){
          $('.room_no_err').html('');
          $('.save_button').attr('disabled',false);
        }else{
          $('.room_no_err').html('Room No. alreay exist');
           $('.save_button').attr('disabled',true);
        }
      }else{
        if(result=='ok'){
          $('.room_no_edit_err').html('');
          $('.save_edit_button').attr('disabled',false);
        }else{
          $('.room_no_edit_err').html('Room No. alreay exist');
          $('.save_edit_button').attr('disabled',true);
        }
      }

      });
});


function chkEditRoom(bedidd){

  $("#EditRoomErr_"+bedidd).html('');
  var block_id = $("#block_id_edit_"+bedidd).val();
  var floor_id = $("#floor_id_edit_"+bedidd).val();
  var room_no = $("#EditRoom_"+bedidd).val();

   $.post("<?php echo base_url(); ?>admin-check-RoomNo", {room_no:room_no,hostel_id:$("#hostel_name").val(),block_id:block_id,floor_id:floor_id,edit:bedidd}, function(result){
        //console.log(result);
        if(result=='ok'){
          $("#EditRoomErr_"+bedidd).html('');
          $('#editbtn_'+bedidd).attr('disabled',false);
        }else{
          $("#EditRoomErr_"+bedidd).html('Room No. alreay exist');
          $('#editbtn_'+bedidd).attr('disabled',true);
        }

      });
}
</script>
<style type="text/css">
  .roomsave{
    display: block;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #fcfeff;
    background-color: #2196F3;
    background-clip: padding-box;
    border: 1px solid #6695c3;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.clsred{
  color: red;
}
.tdbedSpan{
    display: inline-block;
    background-color: #ccc;
    text-align: center;
    padding: 3px 10px;
    margin: 0 2px;
}
.tdbedAhref{
    display: inline-block;
    background-color: red;
    color: #fff !important;
    text-align: center;
    padding: 3px 10px;
    margin: 0 2px;
}
</style>