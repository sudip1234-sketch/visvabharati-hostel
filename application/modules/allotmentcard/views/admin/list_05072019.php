<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }

            function PrintCard(type) { 
            if(type=='front'){
              var divToPrint = document.getElementById('printFrontCard');
            }else{
              var divToPrint = document.getElementById('printBackCard');
            }   
       
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }

 </script>


<div class="" id="allotment" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Allotment Card</h4>
                  </div>
                  <div class="col">
                    <!-- <a href="#" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#allotment-data" style="margin-left: 15px;">Add</a> -->
                   <!--  <a href="#" class="btn btn-secondary btn-sm float-right">Download</a> -->
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="allotment-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Allotment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-3">
                              <a href="#" class="img-profile">
                                <img src="images/blank-profile-pic.jpg" alt="" class="img-thumbnail img-fluid">
                                <span class="edit-img-profile" style="display: block;">Add Profile Image</span>
                              </a>
                            </div>
                            <div class="col-md-9">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>ID No.</label>
                                  <input type="text" class="form-control" placeholder="Enter ID no.">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Full Name</label>
                                  <input type="text" class="form-control" placeholder="Enter full name">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Name of Department</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option value="">Benagali</option>
                                    <option value="">Chinese</option>
                                    <option value="">Botany</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Bhavana</label>
                                  <input type="text" class="form-control" placeholder="Enter bhavana name">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Academic Year</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option value="">2016</option>
                                    <option value="">2017</option>
                                    <option value="">2018</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Course</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option  value="">UG[Prep]</option>
                                    <option value="">PG</option>
                                    <option value="">M.Phil</option>
                                    <option value="">P.hd</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Date of Allotment</label>
                                  <input class="form-control datepicker" id="datepicker3" placeholder="Select date">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Date of Vacating</label>
                                  <input class="form-control datepicker" id="datepicker4" placeholder="Select date">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Blood Group</label>
                                  <input type="text" class="form-control" placeholder="Enter blood group">
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Caste</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline15" name="customRadioInline15" class="custom-control-input" checked>
                                  <label class="custom-control-label" for="customRadioInline15">GEN</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline16" name="customRadioInline15" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline16">SC</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline17" name="customRadioInline15" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline17">ST</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline18" name="customRadioInline15" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline18">OBC</label>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Hostel</label>
                                  <input type="text" class="form-control" placeholder="Enter hostel name">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Room No.</label>
                                  <input type="text" class="form-control" placeholder="Enter room no.">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Email Id</label>
                                  <input type="text" class="form-control" placeholder="Enter email id">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Mobile No</label>
                                  <input type="text" class="form-control" placeholder="Enter mobile no.">
                                </div>  
                              </div>
                              <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Enter address">
                              </div>
                              <div class="form-group">
                                <label>Name of Gurdian</label>
                                <input type="text" class="form-control" placeholder="Enter gurdian name">
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Gurdian Email Id</label>
                                  <input type="text" class="form-control" placeholder="Enter gurdian email id">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Gurdian Contact No</label>
                                  <input type="text" class="form-control" placeholder="Enter gurdian contact no.">
                                </div> 
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <button type="button" class="btn btn-danger">Add Allotment</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="table-responsive">
                 <table id="example1" class="table table-striped"  style="font-size: 14px;">
                    <thead>
                      <tr>
                        <th scope="col" width="5px">Sl No</th>
                        <th scope="col">Student ID No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Final Score</th>
                        <th scope="col">Rank</th>
                        <th scope="col">Department</th>
                        
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                   <?php if(!empty($all_data)){

                
                    $i =1;
                    foreach($all_data as $student)
                    { ?>
                      <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <th scope="row"><?php echo $student->student_id; ?></th>
                        <td><?php echo $student->full_name; ?></td>
                        <td><?php if($student->profile_image!=''){ ?><img src="<?php echo base_url(); ?>assets/student_pics/<?php echo $student->profile_image; ?>" alt="" width="50px" style="border: 3px solid #fff"><?php }else{ ?><img src="<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg" alt="" width="50px" style="border: 3px solid #fff"><?php } ?></td>
                       
                        <td><?php echo ucfirst($student->final_score); ?></td>
                        <td><?php echo ucfirst($student->rank); ?></td>
                        <td><?php echo ucfirst($student->department_name); ?></td>
                      
                        <td>
                           <a href="#" name="edit_allotment" class="edit_button btn btn-secondary btn-sm" ad_id="<?php echo $student->id; ?>" data-toggle="modal" data-target="#edit-allotment-data">Allotment Card</a>  
                        </td>

                        <td>
                           <a href="#" name="edit_hostel_card" class="view_hostel_card btn btn-secondary btn-sm" ad_id="<?php echo $student->id; ?>" data-toggle="modal" data-target="#edit-hostel-card-data">Hostel Card</a>  
                        </td>

                      </tr>

                          <?php
                          $i++;
                           }

                      } ?>
                   
                    </tbody>
                  </table>
                </div>



                 <?php

                 $html = '<table cellpadding="0" cellspacing="0" border="0" style="width: 1600px; margin-top:-8px; margin-left:-10px; background-color: #eee809; font-family: Times New Roman; font-size: 15px; border-bottom: solid 8px #eee809; overflow: hidden;">
  <tr>
    <td style="padding: 4%; width: 42%; vertical-align: top; border-bottom: solid 8px #eee809; border-right: solid 0px #000;">
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
        <tr>
          <td style="text-align: center; vertical-align: top; width: 80%; font-size: 18pt; text-transform: uppercase; font-weight: bold;"><u>Allotment of Hostel Seat</u></td>
          <td id="replace_image" style="text-align: right; vertical-align: top; width: 20%;">
            <span style="display: block; width: 150px; height: 170px; overflow:hidden; text-align: center; border: solid 1px #222; float: right; text-transform: uppercase;">
              <span style="display: block; margin:65px 0;" id="passport_photo">Paste<br>Passprot Size Photograph</span>
              <span id="add_image"></span>
            </span>
            
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
        <tr>
          <td style="padding: 10px;">&nbsp;</td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 10%;">
            ID NO. :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 15%;">
            <span id="print_student_id"></span>
          </td>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 15%;">
            Hostel ID. :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 24%;">
            <span id="print_hostel_id"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 11%;">
            Name :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 57%;">
            <span id="print_student_name"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 18%;">
            Department :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 36%;">
            <span id="print_department"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 16%;">
            Bhavana
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 30%;">
            <span id="print_institute"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 22%;">
            Academic Year
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 24%;">
            <span id="print_academic_year"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 12%;">
            Course
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 42%;">
            <span id="print_course_name"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 27%;">
            Date of Allotment :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 23%;">
            <span id="print_date_of_allotment"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 27%;">
            Date of Vacating :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 23%;">
            <span id="print_date_of_vacating"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 20%;">
            Blood Group :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 25%;">
            <span id="print_blood_group"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 15%;">
            Caste :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 40%;">
            <span id="print_caste"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 12%;">
            Hostel :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 45%;">
            <span id="print_hostel_name"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 15%;">
            Block No. :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 28%;">
            <span id="print_block_no"></span>
          </td>
        </tr>

        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 12%;">
            Floor No. :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 45%;">
            <span id="print_floor_no"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 15%;">
            Room No. :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 28%;">
            <span id="print_room_no"></span>
          </td>
        </tr>


      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 13%;">
            Email Id :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 47%;">
            <span id="print_email_id"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 18%;">
            Mobile No. :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 22%;">
            <span id="print_mobile_no"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 100%; height: 90px;">
            Address for Correspondence : <span id="print_address_of_correspondence"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 35%;">
            Name of Father / Mother :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 65%;">
            <span id="print_guardian_name"></span>
          </td>
        </tr>
      </table>      
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 35%;">
            Email id (<span style="text-transform: initial;">of Parent/Guardian</span>) :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 65%;">
            <span id="print_guardian_email_id"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px transparent; width: 45%;">
            Mobile/Land No. (<span style="text-transform: initial;">of Parent/Guardian</span>) :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 16px; border-bottom: solid 1px #000; width: 55%;">
            <span id="print_guardian_contact"></span>
          </td>
        </tr>
      </table>      
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 100%; height: 50px;">
            &nbsp;
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 80%;">
            &nbsp;
          </td>
          <td style="text-align: center; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 20%;">
            <span style="display: block;">Proctor</span>
            <span style="display: block;">Visva-Bharati</span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px; margin-top: 10px;">
        <tr>
          <td style="text-align: center; text-transform: uppercase; vertical-align: top; font-weight: bold; padding:15px 0; font-size: 16px; border-bottom: solid 1px transparent; width: 100%;">
            <u>General Rules & Regulation</u>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            1
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Allotment of a hostel room/seat-shall not confer on the allottee (student) any right to tenancy or subletting and the University shall have every right to have accommodation vacated/evicted in the event of breach of rules by the allottee.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            2
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 0px 0;">The residents should be back in their respective hostels latest by 9 p.m. or by half an hour after time for library closing, whichever is later. Students who are found outside their respective hostels </p>
          </td>
        </tr>
      </table>
    </td>
    <td style="padding: 4%; width: 42%; vertical-align: top; border-bottom: solid 8px #eee809;">
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 16px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            &nbsp;
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">premises after the stipulated time and involving in any violence or otherwise disturbing the peace in campus and privacy of V.B community, will be evicted from the hostel forthwith apart from any other disciplinary action by the University.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            3
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">No non-resident visitor shall be permitted to stay in the rooms of the residents after 9 p.m.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            4
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Male visitors including male students or guests shall not be allowed in ladies hostels as well as in the dining galls of ladies’ hostel.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            5
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Only male guests can stay in a Boy’s hostel and only female guest can stay in Girl’s hostel provided there is guest room in the said hostels and with prior permission of the Proctor. </p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            6
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">The residents shall make payment of all hostel dues like Caution Money (one time), seat rent and Mess Charges for entire semester before the semester starts.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            7
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Any resident lodging any unauthorised person shall be liable to fine and such other disciplinary action as may be decided by the warden or higher authorities. The relevant amount is reproduced below. The hostel resident(s) on account of harbouring unauthorised person(s) in his/her room would be fined in the first instance Rs.1000/- . If found guilty second time, the fine will be Rs.2000/- and if found for the 3rd time he/she will be evicted from the hostel.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            8
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">The residents will be given furniture in their rooms according to the prescribed scale and he will sign the kit inventory. Demand for additional furniture will not be entertained.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            9
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Any damage or loss of hostel property by the resident(s) will be charged therefore, individually or collectively, as the case may be, and they will also be liable to disciplinary action. The decision of the warden/Chief Warden/Proctor in this regard is final.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            10
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Anyone found burning heater or immersion rod shall be levied fine Rs.500/- by the warden. Warden shall intimate the Account Officer through Proctor.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            11
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">If anyone found removing the furniture from the Dining Hall, or Common Room the Warden (Mess) can levy fine Rs 500/- to the student(s).</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            12
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">The residents must not tamper with the electrical fixtures in their rooms in the hostel premises or use any unauthorised electrical gadgets. Any violation will amount to breach of hostel riles and me by levied with fine by the warden. Residents are authorized to use 30 units electricity per month. Any excess consumption of electricity shall be apportioned to all the students of the hostels per month.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            13
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Cooking of food in the rooms including in the pantry is prohibited and fine Rs 500/- shall be levied by the Warden(s).</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            14
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">The residents should take care of their personal belongings and use their own locks in the rooms. The University shall not be responsible for any loss or damage of the personal belongings of the students. </p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 5%;">
            15
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 16px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 0px 0;">No resident is permitted to take away his belongings from the hostel premises without a proper gate pass issues by the Chief Warden.</p>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  <tr>
    <td style="padding: 4% 4.2%; width: 42%; vertical-align: top; border-right: solid 0px #000;">
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 10px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 5%;">
            16
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Use of narcotics, consumption of alcoholic beverages and gambling in the hostel are strictly prohibited.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 5%;">
            17
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 5px 0;">The residents shall not hold any religious or political function in the hostel premises. However, meeting related to student activities can be conducted with prior written permission or the Proctor. The hostel administration reserves the right to take disciplinary action, including eviction from the hostel, for violation of any of the rules.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 5%;">
            18
          </td>
          <td style="text-align: justify;line-height: 23px; text-transform: initial; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 5px 0;">The Principal, Chief Warden, Warden, DSW and Proctor of any officer of the University directed by Registrar can inspect the hostel rooms at any time. </p>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: center; vertical-align: middle; font-weight: bold; font-size: 15px; border-bottom: solid 1px transparent; width: 100%; padding: 25px;">
            <u>Declaration</u>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: justify;line-height: 23px; vertical-align: top; font-size: 15px; border-bottom: solid 1px transparent; width: 100%;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I shall be abide by all the rules mentioned in the Hostel Manual as well as all the rules mentioned above. If I violate any rules, I shall be liable for any disciplinary action imposed by the competent authority. 
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin: 40px 0;">
        <tr>
          <td style="text-align: left; vertical-align: middle; font-size: 15px; border-bottom: solid 1px transparent; width: 50%; padding: 30px 0;">
            Date :
          </td>
          <td style="text-align: right; vertical-align: middle; font-size: 15px; border-bottom: solid 1px transparent; width: 50%; padding: 30px;">
            Student\'s Signature
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 10px;">
        <tr>
          <td style="text-align: center; text-transform: uppercase; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 100%; font-weight: bold; padding: 5px 0 15px;">
            <u>RESPONSIBILTIES OF HOSTEL AUTHORITY</u><br><u>AS PER HOSTEL MANUAL’S PARA 2.3.5</u>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 10px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 5%;">
            (a)
          </td>
          <td style="text-align: justify;line-height: 20px; text-transform: initial; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Ensure that the concerned student has deposited the hostel dues, before he/she is allowed entry into the hostel room/seat.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 5%;">
            (b)
          </td>
          <td style="text-align: justify;line-height: 20px; text-transform: initial; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Fill in the name in the list of the students Register of Residents against the room allotted.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 5%;">
            (c)
          </td>
          <td style="text-align: justify;line-height: 20px; text-transform: initial; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Obtain an acknowledgement from the student in prescribed form (to be decided by concerned Bhavana responsible for maintaining the hostel) listing the furniture and fixtures handed over.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 5%;">
            (d)
          </td>
          <td style="text-align: justify;line-height: 20px; text-transform: initial; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Hand over the key of the room to the student.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 5%;">
            (e)
          </td>
          <td style="text-align: justify;line-height: 20px; text-transform: initial; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Inform the mess Warden/Mess Supervisor of the new hostler whose name is added to the Mess Register; and newly admitted student put his signature against his name. He also signs the Mess Rule Form and deposits the same to the office for keeping the personal file.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 5%;">
            (f)
          </td>
          <td style="text-align: justify;line-height: 20px; text-transform: initial; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Hostel caretaker shall prepare and maintain personal/individual file of the student.</p>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-top: 160px; margin-bottom: 5px;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 80%;">
            &nbsp;
          </td>
          <td style="text-align: center; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 20%;">
            <span style="display: block;">Proctor</span>
            <span style="display: block;">Visva-Bharati</span>
          </td>
        </tr>
      </table>
    </td>
    <td style="padding: 4% 4.2%; width: 42%; vertical-align: top;">
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; border: solid 2px #000;">
        <tr>
          <td style="padding: 170px 0 100px 0; vertical-align: middle; text-align: center; font-weight: bold; font-size: 30px;">
            <img src="./assets/front/images/V-Logo.jpg" alt="LOGO" style="width: 130px;">
          </td>
        </tr>
        <tr>
          <td style="padding: 78px 0; vertical-align: middle; text-align: center; font-weight: bold; font-size: 30px;">
            <h2 style="text-transform: uppercase; color: #000; font-size: 30px; margin: 5px;">Hostel Allotment Card</h2>
            <span style="display: block; font-size: 18px;">(Student\'s Copy)</span>
          </td>
        </tr>
        <tr>
          <td style="padding: 120px 0 170px 0; vertical-align: middle; text-align: center; font-weight: bold; font-size: 30px;">
            <h3 style="text-transform: uppercase; color: #000; font-size: 24px; margin: 5px;">
              Proctors Office<br>Visva-Bharati
            </h3>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
                 ';

                            ?>





                  <!-- Modal -->
                <div class="modal fade" id="edit-allotment-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Allotment</h5>

                        &nbsp;&nbsp;
                        <div id="divToPrint" style="display:none;">
                          <div style="">
                                   <?php echo $html; ?>      
                          </div>
                        </div>
                        <div>
                          <input type="button" class="btn btn-secondary btn-sm float-right" value="PRINT" onclick="PrintDiv();" />
                        </div>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form novalidate method="post" action="<?php echo base_url('admin-update-allotment'); ?>" name="add-form" id="editform" enctype="multipart/form-data"> 
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-3">
                              <!-- <a href="#" class="img-profile"> -->
                                <img id="edit_profile_image" src="" alt="" class="img-thumbnail img-fluid">
                                <!-- <span class="edit-img-profile" style="display: block;">Add Profile Image</span> -->
                              <!-- </a> -->
                              <br>
                              <img id="student_signature_image" src="" alt="" class="img-thumbnail img-fluid">
                            </div>

                          

                            <div class="col-md-9">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>ID No.</label>
                                  <input type="text" id="edit_student_id" name="student_id" class="form-control" placeholder="Enter ID no." value="" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Full Name</label>
                                  <input type="text" id="edit_full_name" name="full_name" class="form-control" placeholder="Enter full name" value="" disabled>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Name of Department</label>
                                  <input type="text" class="form-control" name="department_id" id="edit_department_id" disabled>                                  
                                   <!--  <select class="custom-select" name="department_id" id="edit_department_id" disabled > -->
                                    
                                    <?php

                                   // if($all_departments){
                                     // foreach($all_departments as $department)
                                      //{
                                        ?>
                                        <!-- <option value="<?php //echo $department->id; ?>"><?php //echo $department->department_name; ?></option> -->
                                    <?php  //}

                                    //}
                                     ?>

                                   
                                   
                                  <!-- </select> -->
                                </div>
                                <div class="form-group col-md-6">
                                 <!--  <label>Bhavana</label>
                                  <input type="text" id="edit_institute_" class="form-control" placeholder="Enter bhavana name"> -->


                                  <label>Name of Bhavana (Institute)</label>
                                  <select class="custom-select" name="institue_id" id="edit_institute_id" disabled >
                                    <!-- <option selected>Choose...</option> -->

                                    <?php

                                    if($all_institutes){
                                      foreach($all_institutes as $institute)
                                      {
                                        ?>
                                        <option value="<?php echo $institute->id; ?>"><?php echo $institute->institute_name; ?></option>
                                    <?php  }

                                    }
                                     ?>

                                   <!--  <option value="">Bhasa</option>
                                    <option value="">Siksha</option> -->
                                  </select>
                                
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Academic Year</label>
                                  <select class="custom-select" name="academic_year" id="edit_academic_year" disabled>
                                    <!-- <option selected>Choose...</option> -->
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                 <label>Course Type</label>
                                  <select class="custom-select" name="course_id" id="edit_course_id" disabled>
                                    <!-- <option selected>Choose...</option> -->

                                    <?php

                                    if(!empty($all_courses))
                                    {
                                      foreach($all_courses as $course)
                                      { ?>

                                        <option  value="<?php echo $course->id; ?>"><?php echo $course->course_name; ?></option>


                                     <?php }
                                    }

                                    ?>


                                    <!-- <option  value="">UG[Prep]</option>
                                    <option value="">PG</option>
                                    <option value="">M.Phil</option>
                                    <option value="">P.hd</option> -->
                                  </select>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                 <label>Date of Admission/Allotment</label>
                                  <input class="form-control datepicker" name="date_of_allotment" id="edit_date_of_allotment" placeholder="Select date" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Vacating Year</label>
                                  <select class="custom-select" name="vacating_year" id="edit_vacating_year" disabled>
                                    
                                    <!-- <option selected>Choose...</option> -->
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                  
                                  </select>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Blood Group</label>
                                  <input type="text" name="blood_group" id="edit_blood_group" class="form-control" placeholder="Enter blood group" disabled>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Caste</label><br>
                                 <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="caste_type_1" name="caste_type" class="edit_caste custom-control-input" value="general" disabled>
                                  <label class="custom-control-label" for="customRadioInline3">GEN</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="caste_type_2" name="caste_type" class="edit_caste custom-control-input" value="SC" disabled>
                                  <label class="custom-control-label" for="customRadioInline4">SC</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="caste_type_3" name="caste_type" class="edit_caste custom-control-input" value="ST" disabled>
                                  <label class="custom-control-label" for="customRadioInline13">ST</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="caste_type_4" name="caste_type" class="edit_caste custom-control-input" value="OBC" disabled>
                                  <label class="custom-control-label" for="customRadioInline14">OBC</label>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Hostel Name</label>
                                  <input type="text" class="form-control" name="hostel_name" id="edit_hostel_name" placeholder="Enter hostel name" value="" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Room No.</label>
                                  <input type="text" class="form-control" name="room_no" id="edit_room_no" placeholder="Enter room no." value="" disabled>
                                </div>
                              </div>
                            <!--   <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Room No.</label>
                                  <input type="text" class="form-control" name="room_no" id="edit_room_no" placeholder="Enter room no." value="">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Hostel Wing/Block</label>
                                  <input type="text" class="form-control" name="hostel_wing" id="edit_hostel_wing" placeholder="Enter hostel wing/block" value="">
                                </div>
                              </div>
                               -->
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                   <label>Email Id</label>
                                  <input type="text" class="form-control" name="email_id" id="edit_email_id" placeholder="Enter email id" value="" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Mobile No</label>
                                  <input type="text" class="form-control" name="contact_no" id="edit_contact_no" placeholder="Enter Contact No." value="" disabled>
                                </div>  
                              </div>
                              <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" id="edit_address" class="form-control" placeholder="Enter address" disabled>
                              </div>
                              <div class="form-group">
                                <label>Name Of Guardian</label>
                                <input type="text" class="form-control" name="guardian_name" id="edit_guardian_name" placeholder="Enter Guardian name" disabled>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Guardian Email Id</label>
                                  <input type="text" class="form-control" name="guardian_email_id" id="edit_guardian_email_id"  placeholder="Enter Guardian email id" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Guardian Contact No</label>
                                 <input type="text" class="form-control" name="guardian_contact_no" id="edit_guardian_contact_no" placeholder="Enter Guardian contact no." disabled>
                                </div> 
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="student_id" id="student_id" value="">
                          <input type="hidden" name="student_profile_image" id="student_profile_image" value="">
                          <!-- <input type="submit" name="edit_student" id="edit_student" class="btn btn-danger" value=" Allotment Assign" /> -->
                        </div>
                      </form>
                    </div>
                  </div>
                </div>






                  <!-- Modal -->
                <div class="modal fade" id="edit-hostel-card-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                        Hostel Card</h5>&nbsp;&nbsp;
                        <div id="PrintCardDiv">
                          <input type="button" class="btn btn-secondary btn-sm float-right" value="PRINT" onclick="PrintCard('front');" />
                        </div>


                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                   
                        <div class="modal-body">

                  <!-- <div class="row">
                  <div class="col-md-6">
                    <div style="margin-bottom: 20px;">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                        <label class="custom-control-label" for="customCheck1" style="font-size: 1rem;">Front</label>
                      </div>
                    </div>
                    <div style="margin-bottom: 20px;">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2" style="font-size: 1rem;">Back</label>
                      </div>
                    </div>
                  </div>
                </div> -->

                  <div class="row">
                  <div class="col-md-12" id="hostel_card_frontcover">
                  
                    <div class="hostel-id front-side" style="width: 100%; background-color: #f3f3f3; padding: 30px 0 0; position: relative;">
                      <img src="<?php echo base_url(); ?>assets/admin/images/Visva_bharati_logo.jpg" alt="" width="80px" style="position: absolute; top: 0; right: 30px;">
                      <h2 class="text-uppercase" style="font-weight: bold; background-color: #003399; color: #fff; margin: 0; padding: 10px; text-align: center;">Visva-Bharati</h2>
                      <h4 class="subheading-text" style="font-weight: 600; background-color: #003366; color: #fff; margin: 0; padding: 10px; text-align: center;"><span id="student_hostel_name"></span></h4>
                      <div style="padding: 30px;">
                        <div class="row">
                          <div class="col">
                            <img id="studentcard_profile_image" src="<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg" alt="" class="img-thumbnail">
                          </div>
                          <div class="col">
                            <h5>Valid from</h5>
                            <h6><span id="student_academic_year"></span></h6>
                            <br>
                            <h5>Valid upto</h5>
                            <h6><span id="student_vacating_year"></span></h6>
                            <br>
                            <h5>Date of Birth</h5>
                            <h6><span id="student_date_of_birth"></span></h6>
                            <br>
                            <h5>Blood Group</h5>
                            <h6><span id="student_blood_group"></span></h6>
                            <!-- <h6>B+</h6> -->
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col">
                            <h4>Name:</h4>
                          </div>
                          <div class="col">
                            <h4><span id="student_full_name"></span></h4>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col">
                            <h5>Course:</h5>
                          </div>
                          <div class="col">
                            <h5><span id="student_course_name"></span></h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <h5>Department:</h5>
                          </div>
                          <div class="col">
                            <h5><span id="student_department_name"></span></h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <h5>Bhavana:</h5>
                          </div>
                          <div class="col">
                            <h5><span id="student_institute_name"></span></h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <h5>Email:</h5>
                          </div>
                          <div class="col">
                            <h5><span id="student_email"></span></h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <h5>Phone No:</h5>
                          </div>
                          <div class="col">
                            <h5><span id="student_contact_no"></span></h5>
                          </div>
                        </div>
                         <div class="row">
                          <div class="col">
                            <h5>Address:</h5>
                          </div>
                          <div class="col">
                            <h5><span id="student_address"></span></h5>
                          </div>
                        </div>
                        <div class="row" style="margin-top: 120px;">
                          <div class="col">
                          <div align="center"><img style="width: 50%;" id="show_student_signature" src="<?php echo base_url(); ?>assets/admin/images/barcode.jpg" alt=""></div>
                            <hr style="margin: .5rem 0;">
                            
                            <p style="text-align: center;">Signature of the Student</p>
                             <br>
                              <br>
                          </div>
                          <div class="col">
                          <div align="center"><img style="width: 50%;" src="<?php echo base_url(); ?>assets/front/images/proctor_img.jpg" alt=""></div>
                            <hr style="margin: .5rem 0;">
                            <p style="text-align: right;">
                              Proctor, Visva-Bharati
                              <br>
                              Tel: +91(3463) 262751 (6 lines)
                              <br>
                              Email: info@visva-bharati.ac.in
                            </p>
                          </div>
                        </div>
                      </div>
                      <h3 class="text-uppercase" style="font-weight: bold; background-color: #003399; color: #fff; margin: 0; padding: 10px; text-align: center;">Id No: <span id="student_hostel_id"></span></h3>
                      <div style=" position: absolute; top: 35%; right: -227px; transform: translateY(-50%);">
                        <h6 id="emergency_no" style="transform: rotate(90deg); transform-origin: left top 0;"></h6>
                      </div>
                    </div>
                  </div>

                  <!-- print html front -->
                  <div id="printFrontCard" style="display: none;">
                  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Visvabharati</title>
   </head>
   <body>

      <table width="412" border="0" cellspacing="0" cellpadding="0" style="font-family:sans-serif; font-size:11px; margin: 0 auto;">
         <tbody>
            <tr>
               <td style="vertical-align: top;">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tbody>
                        <tr>
                           <td style="background: #F3F3F3; padding-top: 10px; padding-bottom: 10px;">&nbsp;</td>
                           <td rowspan="2" style="text-align: center; background: #F3F3F3; width: 70px;">
                              <img src="<?php echo base_url(); ?>assets/admin/images/Visva_bharati_logo.jpg" alt="Logo" style="width: 70px;">
                           </td>
                           <td style="background: #F3F3F3; width: 30px; padding-top: 10px; padding-bottom: 10px;">&nbsp;</td>
                        </tr>
                        <tr>
                           <td class="text-uppercase" style="background: #003399; font-size:20px; padding-left: 88px; font-weight: bold; color: #fff; text-align: center; padding-top: 10px; padding-bottom: 10px; text-transform: uppercase; ">
                              VISVA-BHARATI
                           </td>
                           <td class="text-uppercase" style="background: #003399; width: 30px; padding-top: 10px; padding-bottom: 10px;">&nbsp;</td>
                        </tr>
                        <tr>
                           <td colspan="3" class="subheading-text" style="background: #003366; font-size:16px; font-weight: bold; color: #fff; text-align: center; padding-top: 10px; padding-bottom: 10px; " id="student_hostel_name1">
                              
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td style="vertical-align: top; background: #f3f3f3;">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tbody>
                        <tr>
                           <td style="vertical-align: top; padding: 20px 15px;">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                 <tbody>
                                    <tr>
                                       <td rowspan="3" style="vertical-align: top; padding: 5px 5px 20px 0px; width: 170px;">
                                          <img id="studentcard_profile_image1" src="<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg" alt="User Image" style="width: 130px; padding: 5px; border: solid 1px #dddddd; background: #fff;">
                                       </td>
                                       <td style="vertical-align: top; padding: 5px; width: 236px;">
                                          <p style="margin: 0 0 5px 0; font-size:15px; font-weight: bold;">
                                             Valid from
                                          </p>
                                          <p style="margin: 0 0 5px 0; font-size:13px;" id="student_academic_year1">
                                             
                                          </p>
                                       </td>
                                       
                                    </tr>
                                    <tr>
                                       <td style="vertical-align: top; padding: 5px;">
                                          <p style="margin: 0 0 5px 0; font-size:15px; font-weight: bold;">
                                             Valid upto
                                          </p>
                                          <p style="margin: 0 0 5px 0; font-size:13px;" id="student_vacating_year1">
                                             
                                          </p>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="vertical-align: top; padding: 5px;">
                                          <p style="margin: 0 0 5px 0; font-size:15px; font-weight: bold;">
                                             Date of Birth
                                          </p>
                                          <p style="margin: 0 0 5px 0; font-size:13px;" id="student_date_of_birth1">
                                             
                                          </p>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="vertical-align: top; padding: 5px;">
                                          <p style="margin: 0 0 5px 0; font-size:15px; font-weight: bold;">
                                             Blood Group
                                          </p>
                                          <p style="margin: 0 0 5px 0; font-size:13px;" id="student_blood_group1">
                                             
                                          </p>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;">
                                          Name:
                                       </td>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;" id="student_full_name1">
                                          
                                       </td>
                                    </tr>                                    
                                    <tr>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;">
                                          Course:
                                       </td>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;" id="student_course_name1">
                                          
                                       </td>
                                    </tr>                                   
                                    <tr>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;">
                                          Department:
                                       </td>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;" id="student_department_name1">
                                          
                                       </td>
                                    </tr>                                   
                                    <tr>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;">
                                          Bhavana:
                                       </td>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;" id="student_institute_name1">
                                          
                                       </td>
                                    </tr>  
                                    <tr>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;">
                                          Email:
                                       </td>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;" id="student_email1">
                                          
                                       </td>
                                    </tr> 
                                    <tr>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;">
                                          Phone No:
                                       </td>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;" id="student_contact_no1">
                                          
                                       </td>
                                    </tr>  
                                     <tr>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;">
                                          Address:
                                       </td>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;" id="student_address1">
                                          
                                       </td>
                                    </tr>                               
                                    <tr>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;">
                                          Emergency No:
                                       </td>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:15px; font-weight: bold;">
                                          +91(3463) 262751
                                       </td>
                                    </tr>                                   
                                    <tr>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:13px; font-weight: bold;">
                                          &nbsp;
                                       </td>
                                       <td style="vertical-align: top; padding: 5px 5px 5px 0; font-size:13px; font-weight: bold;">
                                          &nbsp;
                                       </td>
                                    </tr> 
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td style="vertical-align: top; background: #f3f3f3; padding: 20px;">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top: solid 1px #ccc; border-bottom: solid 1px #ccc;">
                     <tbody>
                        <tr>
                           <td style="vertical-align: middle; padding: 20px; min-height: 80px; text-align: center; font-size: 14px; background: #ffffff;">
                              <img id="show_student_signature1" src="<?php echo base_url(); ?>assets/admin/images/barcode.jpg" alt="Signature" style="width: 200px; margin: 0 auto; ">
                           </td>
                        </tr>
                        <tr>
                           <td style="vertical-align: middle; padding: 20px; text-align: center; font-size: 14px;">
                              Signature of the Student
                           </td>
                        </tr>
                    
                        <tr>
                           <td style="vertical-align: middle; padding: 8px; text-align: center; font-size: 14px;"></td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td style="vertical-align: middle; background: #f3f3f3; padding: 0 20px 20px; text-align: right; font-size: 14px;">
                  <p style="margin:0;">Proctor, Visva-Bharati </p>
                  <p style="margin:0;">Tel: +91(3463) 262751 (6 lines) </p>
                  <p style="margin:0;">Email: info@visva-bharati.ac.in</p>
               </td>
            </tr>
            <tr>
               <td class="subheading-text" style="vertical-align: middle; background: #003399; padding: 15px; text-align: center; font-size: 20px; font-weight: bold; color: #fff;">
                  ID NO: <span id="student_hostel_id1"></span>
               </td>
            </tr>
          </tbody>
        </table>      
   </body>
</html>
                  </div>
                   <!-- end print html front -->






                  <div class="col-md-12" id="hostel_card_backcover">
                    
                    <div class="hostel-id back-side" style="width: 100%; background-image: url(images/inside-visva-bharati.png); background-repeat: no-repeat; background-position: center; background-size: cover; background-color: #f3f3f3; padding: 30px 0 0; position: relative;">
                      <img src="<?php echo base_url(); ?>assets/admin/images/Visva_bharati_logo.jpg" alt="" width="80px" style="position: absolute; top: 0; left: 30px;">
                      <h2 class="text-uppercase" style="font-weight: bold; background-color: #003399; color: #fff; margin: 0; padding: 10px; text-align: center;">Visva-Bharati</h2>
                      <h4 class="subheading-text" style="font-weight: 600; background-color: #003366; color: #fff; margin: 0; padding: 10px; text-align: center;"><span id="student_hostel_name_for_back"></span></h4>
                      <br>
                      <h5 style="text-align: center;">Santiniketan, West Bengal, India, 731204</h5>
                      <hr>
                      <div style="padding: 10px 30px 42px;">
                        <h5 style="margin-bottom: 15px;">Rules & Regulations</h5>
                        <ul style="font-size: 1rem; font-weight: 500;">

                        <?php
                        if(!empty($setting)){
                          $setting1 = $setting;
                        }else{
                          $setting1 = '';
                        }
                        $nav = str_replace('<ul>','',$setting1);
                        $nav = str_replace('</ul>','',$nav);

                         echo $nav;
                         ?>
                         
                        </ul>
                      </div>
                      <h3 class="text-uppercase" style="font-weight: bold; background-color: #003399; color: #fff; margin: 0; padding: 10px; text-align: center;">Id No:<span id="back_student_hostel_id"></span></h3>
            </div>
        </div>



        <!-- print html back -->
        <div id="printBackCard" style="display: none;">
                 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Visvabharati</title>
   </head>
   <body>

      <table width="412" border="0" cellspacing="0" cellpadding="0" style="font-family:sans-serif; font-size:11px; margin: 0 auto;">
         <tbody>
            <tr>
               <td style="vertical-align: top;">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tbody>
                        <tr>
                           <td style="background: #F3F3F3; padding-top: 10px; padding-bottom: 10px;">&nbsp;</td>
                           <td rowspan="2" style="text-align: center; background: #F3F3F3; width: 70px;">
                              <img src="<?php echo base_url(); ?>assets/admin/images/Visva_bharati_logo.jpg" alt="Logo" style="width: 70px;">
                           </td>
                           <td style="background: #F3F3F3; width: 30px; padding-top: 10px; padding-bottom: 10px;">&nbsp;</td>
                        </tr>
                        <tr>
                           <td class="text-uppercase" style="background: #003399; font-size:20px; padding-left: 88px; font-weight: bold; color: #fff; text-align: center; padding-top: 10px; padding-bottom: 10px; text-transform: uppercase; ">
                              VISVA-BHARATI
                           </td>
                           <td class="text-uppercase" style="background: #003399; width: 30px; padding-top: 10px; padding-bottom: 10px;">&nbsp;</td>
                        </tr>
                        <tr>
                           <td class="subheading-text" colspan="3" style="background: #003366; font-size:16px; font-weight: bold; color: #fff; text-align: center; padding-top: 10px; padding-bottom: 10px; " id="student_hostel_name_for_back1">
                              
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td style="vertical-align: middle; background: #f3f3f3; padding: 20px; border-bottom: solid 1px #ccc; text-align: center; font-size: 17px;">
                  Santiniketan, West Bengal, India, 731204
               </td>
            </tr>
            <tr>
               <td style="vertical-align: middle; background: #f3f3f3; padding: 30px 10px 10px 30px; text-align: left; font-size: 17px;">
                  Rules & Regulations
               </td>
            </tr>
            <tr>
               <td style="vertical-align: middle; background: #f3f3f3; padding: 0 20px 40px 20px; text-align: left; font-size: 14px;">
                  <ul style="margin: 0; padding: 0 0 0 35px;">
                   <?php
                        if(!empty($setting)){
                          $setting1 = $setting;
                        }else{
                          $setting1 = '';
                        }
                        $nav = str_replace('<ul>','',$setting1);
                        $nav = str_replace('</ul>','',$nav);
                        $nav = str_replace('<li>','<li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">',$nav);

                         echo $nav;
                         ?>

                     <!-- <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Aliquam tincidunt mauris eu risus.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Vestibulum auctor dapibus neque.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Nunc dignissim risus id metus.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Cras ornare tristique elit.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Vivamus vestibulum ntulla nec ante.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Praesent placerat risus quis eros.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Fusce pellentesque suscipit nibh.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Integer vitae libero ac risus egestas placerat.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Vestibulum commodo felis quis tortor.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Ut aliquam sollicitudin leo.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Cras iaculis ultricies nulla.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Donec quis dui at dolor tempor interdum.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        Aliquam tincidunt mauris eu risus.
                     </li>
                     <li style="list-style-type: circle; margin-bottom: 5px; padding-left:5px;">
                        We are providing accomodation.
                     </li> -->
                  </ul>
               </td>
            </tr>
            <tr>
               <td class="subheading-text" style="vertical-align: middle; background: #003399; padding: 15px; text-align: center; font-size: 20px; font-weight: bold; color: #fff;">
                  ID NO: <span id="back_student_hostel_id1"></span>
               </td>
            </tr>
          </tbody>
        </table>

        
      
   </body>
</html>
                  </div>
        <!-- end print html back -->


    </div>
                         
                        </div>
                        <div class="modal-footer">
                         
                        </div>
                     
                    </div>
                  </div>
                </div>

               <!--  <hr>
                <nav class="float-right">
                  <ul class="pagination pagination-sm">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav> -->
                <div class="clearfix"></div>
              </div>




 <script>

 


  $("document").ready(function(){

    $('#hostel_card_backcover').hide();
    
    $('#customCheck1').click(function() {
      var ddiv = "'front'";

        if($( "#customCheck1" ).prop( "checked", true ))
        {
          $( "#customCheck2" ).prop( "checked", false );
          $('#hostel_card_frontcover').show();
          $('#hostel_card_backcover').hide();
          $('#PrintCardDiv').html('<input type="button" class="btn btn-secondary btn-sm float-right" value="PRINT" onclick="PrintCard('+ddiv+');" />');
        }
        
    });

    $('#customCheck2').click(function() {
    var ddiv = "'back'";
      if($( "#customCheck2" ).prop( "checked", true ))
      {
        $( "#customCheck1" ).prop( "checked", false );
        $('#hostel_card_frontcover').hide();
        $('#hostel_card_backcover').show();
        $('#PrintCardDiv').html('<input type="button" class="btn btn-secondary btn-sm float-right" value="PRINT" onclick="PrintCard('+ddiv+');" />');
      }
      
    });


      $('.edit_button').click(function() {
                
                var ad_id = $(this).attr('ad_id');

                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-allotmentcard-student-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
 
                          //alert(resultData);
                         // console.log(resultData);
                          resultData = jQuery.parseJSON(resultData);
                          //var src = '<?php echo base_url(); ?>assets/student_pics/'+resultData.profile_image;
                          //$("#edit_profile_image").attr("src",src);

                          var src = '<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg';
                          var srcSig = '';

                          if(resultData.profile_image)
                          {
                            src = '<?php echo base_url(); ?>assets/student_pics/'+resultData.profile_image;
                          }


                          if(resultData.student_signature)
                          {
                            srcSig = '<?php echo base_url(); ?>assets/student_signature/'+resultData.student_signature;
                          }
                          
                         $("#stu_id").val(resultData.id);
                          $("#edit_profile_image").attr("src",src);

                          $("#student_signature_image").attr("src",srcSig);



                          $('#edit_student_id').val(resultData.student_id);
                          $('#edit_full_name').val(resultData.full_name);

                          $('#edit_department_id').val(resultData.department_name);
                          //alert($('#edit_department_id').val());
                          // $('#edit_department_id').filter(function() { 

                          //     return ($(this).val() == resultData.department_id); //To select Institute
                          // }).prop('selected', true);


                          $('#edit_institute_id').filter(function() { 

                              return ($(this).val() == resultData.institute_id); //To select Institute
                          }).prop('selected', true);

                          $('#edit_contact_no').val(resultData.contact_no);
                          $('#edit_email_id').val(resultData.email_id);
                          $('#edit_university_id').val(resultData.university_id);
                          $('#edit_hostel_id').val(resultData.hostel_id);
                          $('#edit_hostel_name').val(resultData.hostel_name);
                          $('#edit_hostel_code').val(resultData.hostel_code);
                          $('#edit_room_no').val(resultData.room_no);
                          $('#edit_hostel_wing').val(resultData.hostel_wing);
                          $('#edit_blood_group').val(resultData.blood_group);
                          //$('#edit_course_id').val(resultData.course_id);
                         // alert(resultData.date_of_allotment);
                          $('#edit_date_of_allotment').val(resultData.date_of_allotment);

                          var dob = new Date(resultData.date_of_birth);
                          var newDob = dob.toString('dd-MM-yy');
                          $('#edit_date_of_birth').val(newDob);


                          if($(".edit_pwd").val() == '0')
                          {

                            $("#customRadioInline12").prop("checked", true);
                          }
                          else
                          {
                            $("#customRadioInline13").prop("checked", true);
                          }

                          if($(".edit_gender").val() == 'female')
                          {

                            $("#customRadioInline10").prop("checked", true);
                          }
                          else
                          {
                           
                            $("#customRadioInline11").prop("checked", true);
                          }
                          

                          $('#edit_course_id').filter(function() { 

                              return ($(this).val() == resultData.course_id); //To select Institute
                          }).prop('selected', true);

                        

                          if($(".edit_gender").val() == 'male')
                          {

                            $("#customRadioInline10").prop("checked", true);
                          }
                          else
                          {
                            $("#customRadioInline11").prop("checked", true);
                          }


                          if($(".edit_caste").val() == 'general')
                          {

                            $("#caste_type_1").prop("checked", true);
                          }
                          else if($(".edit_caste").val() == 'SC')
                          {
                            $("#caste_type_2").prop("checked", true);
                          }
                          else if($(".edit_caste").val() == 'ST')
                          {
                            $("#caste_type_3").prop("checked", true);
                          }
                          else if($(".edit_caste").val() == 'OBC')
                          {
                            $("#caste_type_4").prop("checked", true);
                          }

                          $('#edit_vb_reg_id').val(resultData.vb_reg_id);
                          $('#edit_aadhar_card_no').val(resultData.aadhar_card_no);
                          $('#edit_address').val(resultData.address);
                          $('#edit_city').val(resultData.city);
                          $('#edit_pincode').val(resultData.pincode);
                          $('#edit_guardian_name').val(resultData.guardian_name);
                          $('#edit_relation_with_guardian').val(resultData.relation_with_guardian);
                          $('#edit_guardian_contact_no').val(resultData.guardian_contact_no);
                          $('#edit_guardian_email_id').val(resultData.guardian_email_id);
                          $('#edit_guardian_address').val(resultData.guardian_address);


                          $('#edit_distance_frm').val(resultData.distance_frm);
                          $('#student_profile_image').val(resultData.profile_image);

                          $('#print_student_id').html(resultData.student_id);
                          $('#print_hostel_id').html(resultData.hostel_id);
                          $('#print_student_name').html(resultData.full_name);
                          $('#print_department').html(resultData.department_name);
                          $('#print_institute').html(resultData.institute_name);
                          $('#print_academic_year').html(resultData.academic_year);
                          $('#print_course_name').html(resultData.course_name);
                          $('#print_date_of_allotment').html(resultData.date_of_allotment);
                          $('#print_date_of_vacating').html(resultData.vacating_year);
                          $('#print_blood_group').html(resultData.blood_group);
                          $('#print_caste').html(resultData.caste_type);
                          $('#print_hostel_name').html(resultData.hostel_name);
                          $('#print_block_no').html(resultData.block_name);
                          $('#print_floor_no').html(resultData.floor_name);
                          $('#print_room_no').html(resultData.room_no);
                          $('#print_email_id').html(resultData.email_id);
                          $('#print_mobile_no').html('+91 '+resultData.contact_no);

                          var address = '';
                          if(resultData.address)
                          {
                            var address = resultData.address+','+resultData.city+','+resultData.pincode;
                          }
                          
                          $('#print_address_of_correspondence').html(address);
                          $('#print_guardian_name').html(resultData.guardian_name);
                          $('#print_guardian_email_id').html(resultData.guardian_email_id);

                          var guardian_contact_no = '';
                          if(resultData.guardian_contact_no)
                          {
                            var guardian_contact_no = '+91 '+resultData.guardian_contact_no;
                          }
                           
                          $('#print_guardian_contact').html(guardian_contact_no);
                          $('td#replace_image span#passport_photo').remove();
                          $('td#replace_image span#add_image').append("<img src='"+src+"' height='200px' width='150px' >")
                          $('#student_id').val(resultData.id);

                          
                  }
                
                });

               // saveData.error(function() { alert("Something went wrong"); });

});



$('.view_hostel_card').click(function() {
                
                var ad_id = $(this).attr('ad_id');

                
                var saveData = $.ajax({ 
                    type: 'POST',
                    url: "<?php echo base_url('admin-allotmentcard-student-details');?>",
                    data: {  "id": ad_id},
                    dataType: "text",
                    success: function(resultData) { 
                          // console.log(resultData);
                          // alert(resultData);
                          resultData  = jQuery.parseJSON(resultData);

                          //alert(resultData.gender);

                          if(resultData.gender == 'female')
                          {
                              $(".text-uppercase").css("background-color", "#99008c");
                              $(".subheading-text").css("background-color", "#660065");

                          }

                          if(resultData.gender == 'male')
                          {
                              $(".text-uppercase").css("background-color", "#003399");
                              $(".subheading-text").css("background-color", "#003366");

                          }

                          if(resultData.profile_image)
                          {
                            var src = '<?php echo base_url(); ?>assets/student_pics/'+resultData.profile_image;
                          }else{
                            var src = '<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg';
                          }

                          if(resultData.student_signature)
                          {
                            var srcSig = '<?php echo base_url(); ?>assets/student_signature/'+resultData.student_signature;
                          }else{
                            var srcSig = '';
                          }

                          $("#show_student_signature").attr("src",srcSig);
                          $("#show_student_signature1").attr("src",srcSig);
                          $("#studentcard_profile_image").attr("src",src);
                          $("#studentcard_profile_image1").attr("src",src);
                          $('#student_hostel_name').html(resultData.hostel_name);
                          $('#student_hostel_name1').html(resultData.hostel_name);



                          $('#student_hostel_name_for_back').html(resultData.hostel_name);
                          $('#student_hostel_name_for_back1').html(resultData.hostel_name);


                          const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                            "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
                          ];

                          const d = new Date();
                          const academic_year = resultData.date_of_allotment.slice(6, 10);
                          const academic_month = parseInt(resultData.date_of_allotment.slice(3, 5))-1;
                          const vacating_month = (resultData.vacating_month-1);
                          // console.log(resultData.date_of_allotment)

                          $('#student_academic_year').html(monthNames[academic_month]+' / '+academic_year);
                          $('#student_academic_year1').html(monthNames[academic_month]+' / '+academic_year);
                          
                          $('#student_vacating_year').html(monthNames[vacating_month]+' / '+resultData.vacating_year);
                          $('#student_vacating_year1').html(monthNames[vacating_month]+' / '+resultData.vacating_year);

                          var dob     = new Date(resultData.date_of_birth);
                          var newDob  = dob.toString('dd-MM-yy');
                          $('#student_date_of_birth').html(resultData.date_of_birth);
                          $('#student_date_of_birth1').html(resultData.date_of_birth);
                          $('#student_blood_group').html(resultData.blood_group);
                          $('#student_blood_group1').html(resultData.blood_group);
                          $('#student_full_name').html(resultData.full_name);
                          $('#student_full_name1').html(resultData.full_name);

                          $('#student_email').html(resultData.email_id);
                          $('#student_email1').html(resultData.email_id);

                          $('#student_contact_no').html(resultData.contact_no);
                          $('#student_contact_no1').html(resultData.contact_no);
                          $('#emergency_no').html(`Emergency No: +91 ${resultData.guardian_contact_no}`);
                          // $('#student_contact_no1').html(resultData.guardian_contact_no);

                          $('#student_address').html(`${resultData.address}, ${resultData.pincode}`);
                          $('#student_address1').html(`${resultData.address}, ${resultData.pincode}`);

                          $('#student_course_name').html(resultData.course_name);
                          $('#student_course_name1').html(resultData.course_name);
                          $('#student_department_name').html(resultData.department_name);
                          $('#student_department_name1').html(resultData.department_name);
                          $('#student_institute_name').html(resultData.institute_name);
                          $('#student_institute_name1').html(resultData.institute_name);
                          $('#student_hostel_id').html(resultData.hostel_id);
                          $('#student_hostel_id1').html(resultData.hostel_id);
                          $('#back_student_hostel_id').html(resultData.hostel_id);
                          $('#back_student_hostel_id1').html(resultData.hostel_id);


                  }
                
                });

                saveData.error(function() { alert("Something went wrong"); });

});

});
</script>

<script>


$(document).ready(function() {
    $('#example1').DataTable({
      
        dom: 'Bfrtip',
        buttons: [
            //'copy', 'csv', 'excel', 'pdf', 'print'
            'excel'
        ]
    });
} );


$(function() {
   
    setTimeout(function() {
        $(".show_message").hide('blind', {}, 300)
    }, 3000);
});

</script>
