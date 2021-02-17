<?php
    $search_url = base_url('admin-allotmentcard-list');
?>

<script type="text/javascript">
    function PrintDiv() {
        var params = [
            'height='+screen.height,
            'width='+screen.width,
            'fullscreen=yes'
        ].join(',');
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', params);
        popupWin.document.open();
        popupWin.document.write('<html><body style="margin: 0; padding: 0"; onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }

    function PrintCard(type) {
        var params = [
            'height='+screen.height,
            'width='+screen.width,
            'fullscreen=yes'
        ].join(',');

        if (type == 'front') {
            var divToPrint = document.getElementById('printFrontCard');
        } else {
            var divToPrint = document.getElementById('printBackCard');
        }

        var popupWin = window.open('', '_blank', params);
        popupWin.document.open();
        popupWin.document.write('<html><body style="margin: 0; padding: 0"; onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
 </script>

<style>
    @media print {
        -webkit-print-color-adjust: exact;
    }
</style>
  <style>         
    @media print {
        @page{size:54mm 86mm; margin: 0; padding: 0}
        .printme{
            width: 54mm;
            height: 86mm;
            padding: 0;
            margin: 0
        }
    }
 </style>

<div class="" id="allotment" role="tabpanel">
                <div class="row">
                    <h4>Allotment Card</h4>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <form name="frm" id="frm" method="get" action="<?php echo $search_url; ?>">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <input type="text" class="form-control" id="search_keyword" name="search_keyword" style="width: 80%; float: left;" placeholder="Enter student id or student name">
                                  <button type="submit" class="btn btn-primary" style="width: 19%; float: right;">Search</button>
                              </div>
                          </div>
                    </form>
                  </div>
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
                                  <label>ID No</label>
                                  <input type="text" class="form-control" placeholder="Enter ID no">
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
                                  <label>Room No</label>
                                  <input type="text" class="form-control" placeholder="Enter room no">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Email Id</label>
                                  <input type="text" class="form-control" placeholder="Enter email id">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Mobile No</label>
                                  <input type="text" class="form-control" placeholder="Enter mobile no">
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
                                  <input type="text" class="form-control" placeholder="Enter gurdian contact no">
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

                 $html = '
<div style="width:297mm; height: 200mm; overflow: hidden;">
<table cellpadding="0" cellspacing="0" border="0" style="width: 297mm; height:210mm; font-family: Times New Roman; font-size: 12px;">
  <tr>
    <td style="width: 48%; padding-right: 2%; vertical-align: top; border-right: solid 0px #000;">
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
        <tr>
          <td style="text-align: center; vertical-align: top; width: 80%; font-size: 1.2em; text-transform: uppercase; font-weight: bold;"><u>Allotment of Hostel Seat</u></td>
          <td id="replace_image" style="text-align: right; vertical-align: top; width: 20%;">
            <span style="display: block; width: 100px; height: 140px; overflow:hidden; text-align: center; border: solid 1px #222; float: right; text-transform: uppercase;">
              <span style="display: block; margin:65px 0;" id="passport_photo">Paste<br>Passprot Size Photograph</span>
              <span id="add_image"></span>
            </span>
            
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
        <tr>
          <td style="padding: 7px;">&nbsp;</td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 10%;">
            ID NO :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 15%;">
            <span id="print_student_id"></span>
          </td>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 15%;">
            Hostel ID. :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 24%;">
            <span id="print_hostel_id"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 11%;">
            Name :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 57%;">
            <span id="print_student_name"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 18%;">
            Department :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 36%;">
            <span id="print_department"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 16%;">
            Bhavana :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 30%;">
            <span id="print_institute"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 22%;">
            Academic Year
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 24%;">
            <span id="print_academic_year"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 12%;">
            Course
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 42%;">
            <span id="print_course_name"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 27%;">
            Date of allotment :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 23%;">
            <span id="print_date_of_allotment"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 27%;">
            Date of Vacating :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 23%;">
            <span id="print_date_of_vacating"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 20%;">
            Blood Group :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 25%;">
            <span id="print_blood_group"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 15%;">
            Caste :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 40%;">
            <span id="print_caste"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 12%;">
            Hostel :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 45%;">
            <span id="print_hostel_name"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 15%;">
            Block No :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 28%;">
            <span id="print_block_no"></span>
          </td>
        </tr>

        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 15%;">
            Floor No :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 45%;">
            <span id="print_floor_no"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 15%;">
            Room No :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 28%;">
            <span id="print_room_no"></span>
          </td>
        </tr>


      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 13%;">
            Email Id :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 47%;">
            <span id="print_email_id"></span>
          </td>
          <td style="text-align: center; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 18%;">
            Mobile No :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 22%;">
            <span id="print_mobile_no"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 100%; padding-bottom: 15px">
            Address for Correspondence : <span id="print_address_of_correspondence"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 35%;">
            Name of Father / Mother :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 65%;">
            <span id="print_guardian_name"></span>
          </td>
        </tr>
      </table>      
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 35%;">
            Email id (<span style="text-transform: initial;">of Parent/Guardian</span>) :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 65%;">
            <span id="print_guardian_email_id"></span>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px transparent; width: 45%;">
            Mobile/Land No (<span style="text-transform: initial;">of Parent/Guardian</span>) :
          </td>
          <td style="text-align: left; vertical-align: middle;  font-size: 9pt; border-bottom: solid 1px #000; width: 55%;">
            <span id="print_guardian_contact"></span>
          </td>
        </tr>
      </table>      
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 100%;">
            &nbsp;
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: right; vertical-align: top;  font-size: 15px; border-bottom: solid 1px transparent; width: 100%;">
            <div class="sign_prof  d-block">
                <img src="'. base_url() .'assets/front/images/proctor_img.jpg" alt="" style="width: 150px;">                                    
            </div>
              <p style="text-align: right;">
                Proctor, Visva-Bharati
                <br>
                Tel: +91(3463) 262751 (6 lines)
                <br>
                Email: proctor@visva-bharati.ac.in
              </p>
          </td>
        </tr>
      </table>
    </td>
    <td style="padding-left: 2%; width: 48%; vertical-align: top;">
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt; margin-top: 0;">
        <tr>
          <td style="text-align: center; text-transform: uppercase; vertical-align: top; font-weight: bold; padding:0 15px 0; font-size: 9pt; border-bottom: solid 1px transparent; width: 100%;">
            <u>General Rules & Regulation</u>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            1
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Allotment of a hostel room/seat-shall not confer on the allottee (student) any right to tenancy or subletting and the University shall have every right to have accommodation vacated/evicted in the event of breach of rules by the allottee.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            2
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 0px 0;">The residents should be back in their respective hostels latest by 9 p.m. or by half an hour after time for library closing, whichever is later. Students who are found outside their respective hostels premises after the stipulated time and involving in any violence or otherwise disturbing the peace in campus and privacy of V.B community, will be evicted from the hostel forthwith apart from any other disciplinary action by the <University class=""></University></p>
          </td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-bottom: 9pt;">
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            3
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">No non-resident visitor shall be permitted to stay in the rooms of the residents after 9 p.m.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            4
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Male visitors including male students or guests shall not be allowed in ladies hostels as well as in the dining galls of ladies’ hostel.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            5
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Only male guests can stay in a Boy’s hostel and only female guest can stay in Girl’s hostel provided there is guest room in the said hostels and with prior permission of the Proctor. </p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            6
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">The residents shall make payment of all hostel dues like Caution Money (one time), seat rent and Mess Charges for entire semester before the semester starts.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            7
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Any resident lodging any unauthorised person shall be liable to fine and such other disciplinary action as may be decided by the warden or higher authorities. The relevant amount is reproduced below. The hostel resident(s) on account of harbouring unauthorised person(s) in his/her room would be fined in the first instance Rs.1000/- . If found guilty second time, the fine will be Rs.2000/- and if found for the 3rd time he/she will be evicted from the hostel.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            8
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">The residents will be given furniture in their rooms according to the prescribed scale and he will sign the kit inventory. Demand for additional furniture will not be entertained.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            9
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Any damage or loss of hostel property by the resident(s) will be charged therefore, individually or collectively, as the case may be, and they will also be liable to disciplinary action. The decision of the warden/Chief Warden/Proctor in this regard is final.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            10
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Anyone found burning heater or immersion rod shall be levied fine Rs.500/- by the warden. Warden shall intimate the Account Officer through Proctor.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            11
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">If anyone found removing the furniture from the Dining Hall, or Common Room the Warden (Mess) can levy fine Rs 500/- to the student(s).</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            12
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">The residents must not tamper with the electrical fixtures in their rooms in the hostel premises or use any unauthorised electrical gadgets. Any violation will amount to breach of hostel riles and me by levied with fine by the warden. Residents are authorized to use 30 units electricity per month. Any excess consumption of electricity shall be apportioned to all the students of the hostels per month.</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            13
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">Cooking of food in the rooms including in the pantry is prohibited and fine Rs 500/- shall be levied by the Warden(s).</p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            14
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 10px 0;">The residents should take care of their personal belongings and use their own locks in the rooms. The University shall not be responsible for any loss or damage of the personal belongings of the students. </p>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; text-transform: uppercase; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 5%;">
            15
          </td>
          <td style="text-align: justify;line-height: 11pt; text-transform: initial; vertical-align: top;  font-size: 9pt; border-bottom: solid 1px transparent; width: 95%;">
            <p style="margin: 0 0 0px 0;">No resident is permitted to take away his belongings from the hostel premises without a proper gate pass issues by the Chief Warden.</p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</div>
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
                                   <?php echo $html; ?>
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
                                  <label>ID No</label>
                                  <input type="text" id="edit_student_id" name="student_id" class="form-control" placeholder="Enter ID no" value="" disabled>
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
                                  <label>Room No</label>
                                  <input type="text" class="form-control" name="room_no" id="edit_room_no" placeholder="Enter room no" value="" disabled>
                                </div>
                              </div>
                            <!--   <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Room No</label>
                                  <input type="text" class="form-control" name="room_no" id="edit_room_no" placeholder="Enter room no" value="">
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
                                  <input type="text" class="form-control" name="contact_no" id="edit_contact_no" placeholder="Enter Contact No" value="" disabled>
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
                                 <input type="text" class="form-control" name="guardian_contact_no" id="edit_guardian_contact_no" placeholder="Enter Guardian contact no" disabled>
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
                      <div style="padding: 30px; position: relative" class="d-block">
                        <div class="row">
                          <div class="col">
                            <img id="studentcard_profile_image" src="<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg" alt="" class="img-thumbnail">
                          </div>
                          <div class="col">
                            <h5>Valid from</h5>
                            <h6><span id="student_allotment_year"></span></h6>
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
                        <div class="row signatures" style="margin-top: 120px;">
                            <div class="col-6">
                                <div class="sign_student d-block">
                                    <img id="show_student_signature" src="<?php echo base_url(); ?>assets/admin/images/barcode.jpg" alt="">                                    
                                </div>
                                <p style="text-align: left;">Signature of the Student</p>
                            </div>
                            <div class="col-6">
                                <div class="sign_prof  d-block">
                                    <img src="<?php echo base_url(); ?>assets/front/images/proctor_img.jpg" alt="">                                    
                                </div>
                                <p style="text-align: right;">
                                        Proctor, Visva-Bharati
                                        <br>
                                        Tel: +91(3463) 262751 (6 lines)
                                        <br>
                                        Email: proctor@visva-bharati.ac.in
                                      </p>
                            </div>
                        </div>
                      </div>
                      <h3 class="text-uppercase" style="font-weight: bold; background-color: #003399; color: #fff; margin: 0; padding: 10px; text-align: center;">Id No: <span id="student_hostel_id"></span></h3>
                      <div class="emergency_no">
                        <h6 id="emergency_no"></h6>
                      </div>
                    </div>
                  </div>

                  <!-- print html front -->
                  <!-- <div id="printFrontCard" style="display: none;">
                      <div style="width:54mm; height: 85.6mm; overflow: hidden; font-weight: bold; font-family: sans-serif; padding: 2px">
                        <div class="card-header text-uppercase" style="overflow: hidden;">
                          <div style="width: 43.45mm; float: left;">
                            <div class="university-name text-uppercase" style="font-size: 12px; font-weight: bold;; text-align: center; padding: 5px; background-color: rgb(153, 0, 140); color: rgb(255, 255, 255) !important;">
                              VISVA-BHARATI
                            </div>
                            <div class="subheading-text" style="background-color: rgb(102, 0, 101); font-size: 10px; font-weight: bold; color: rgb(255, 255, 255); text-align: center; padding: 5px;" id="student_hostel_name1">Vinay Bhavana Girls Hostel
                            </div>
                          </div>
                          <div class="logo" style="width: 10.55mm; float: right;">
                            <img src="<?php echo base_url(); ?>/assets/admin/images/Visva_bharati_logo.jpg" alt="Logo" style="width: 100%; height: auto">
                          </div>
                        </div>
                        <div class="card-body" style="font-size: 9px; line-height: 13px; font-weight: bold; color: black; height: 55mm; overflow: hidden;">
                          <div class="validity" style="background: white; font-size:10px; text-align: center;  width: 100%">
                            <span>VALID FROM </span>
                            <span id="student_allotment_year1" ></span>

                            <span> TO </span>
                            <span id="student_vacating_year1"></span>
                          </div>

                          <div class="profile-pic" style="padding: 5px; width: 16mm; height: 23mm; float: left;">
                            <img id="studentcard_profile_image1" src="<?php echo base_url(); ?>/assets/student_pics/f7162db74e7937500f4a50e4da00eb8b.jpg" alt="User Image" style="width: 100%; height: 100%; border: solid 1px #fff;">
                          </div> 

                          <div class="name" id="student_full_name1" style="width: 32mm; float: left; padding: 5px; font-size: 16px; font-weight: bold; line-height: 16px; padding-left: 0; font-family: sans-serif;">
                            
                          </div>
                          <div class="dob" style="width: 32mm; float: left;">
                            <span>DOB : </span>
                            <span id="student_date_of_birth1"></span>
                          </div>
                          <div class="blood-group" style="width: 32mm; float: left;">
                              <span>Blood Group : </span>
                              <span id="student_blood_group1"></span>
                          </div>
                          <div class="course" style="width: 32mm; float: left;">
                              <span>Course : </span>
                              <span id="student_course_name1"></span>
                          </div>
                          <div class="department" style="width: 32mm; float: left;">
                              <span>Dept : </span>
                              <span id="student_department_name1"></span>
                          </div>

                          <div style="clear: both"></div>

                          <div class="email" style="width: 90%; padding-left: 5px; padding-right: 5%">
                              <span>Email: </span>
                              <span id="student_email1"></span>
                          </div>
                          <div class="phone" style="width: 90%; padding-left: 5px; padding-right: 5%">
                              <span>Phone No: </span>
                              <span id="student_contact_no1"></span>
                          </div>
                          <div class="emergency" style="width: 90%; padding-left: 5px; padding-right: 5%">
                              <span>Emergency No: </span>
                              <span id="emergency_no1"></span>
                          </div>

                          <div class="address" style="width: 90%; padding: 5px;">
                              <span>Address: </span>
                              <span id="student_address1"></span>
                          </div>
                        </div>

                        <div class="card-footer" style="font-size: 8px">
                          <div class="student-signature" style="width: 48%; float: left;">
                            <div style="border-bottom: solid 1px #ccc">
                              <img id="show_student_signature1" src="#" style="height:24px; min-width: 100px; max-width: 100%; width:auto; margin-bottom: 5px; border:0!important">
                            </div>
                            Signature of the Student
                          </div>
                          <div class="proctor-signature" style="width: 52%; float: left;">
                            <div style="text-align: right; border-bottom: solid 1px #ccc ">
                              <img src="<?php echo base_url(); ?>assets/front/images/proctor_img.jpg" style="height:24px; min-width: 100px; max-width: 100% width:auto; margin-bottom: 5px; ">
                            </div>
                            Proctor, Visva-Bharati <br>
                            +91(3463) 262751 (6 lines) <br>
                            proctor@visva-bharati.ac.in
                          </div>
                          <div class="subheading-text" style="background-color: rgb(102, 0, 101); clear: both; padding: 3px; text-align: center; font-size: 8px; font-weight: bold; color: rgb(255, 255, 255);">
                            ID NO:
                            <span id="student_hostel_id1"></span>
                          </div>
                        </div>
                      </div>
                  </div> -->
                  <div id="printFrontCard" style="display: none;">
                      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml">
                           <head>
                              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                <title>Visvabharati</title>
                                <style>         
                                    @media print {
                                        @page{size:54mm 86mm; margin: 0; padding: 0}
                                        body{
                                            width: 54mm;
                                            height: 86mm;
                                            padding: 0;
                                            margin: 0
                                        }
                                    }
                                </style>
                           </head>
                           
                           <body style="font-family: sans-serif; -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 0; margin: 0">        
                                    <div id="printBill" class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 250px; padding: 0; margin: 0 auto; position: relative">                                        
                                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; font-family: Arial; font-size: 8px;">
                                            <tr>
                                                <td style="vertical-align: top; box-sizing: border-box; padding:  8px 0 0 0; border: 0;">
                                                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; line-height: 1">
                                                        <tr>
                                                            <td style="padding:0; line-height: 1; height: 3mm"></td>
                                                            <td class="id_header_1" valign="bottom" rowspan="2" style="background: #9d0088 /*#5674ba*/; width: 9mm; padding:0; line-height: 1"><img src="<?php echo base_url(); ?>assets/admin/images/Visva_bharati_logo.jpg" alt="" style="padding:0; margin: 0;width:100%; height: auto"></td>
                                                            <td style="width:2.5mm;padding:0; line-height: 0;"></td>
                                                        </tr>
                                                        <!--bg-color-1/1-->
                                                        <tr>
                                                            <td class="id_header_1" style="background:#9d0088 /*#5674ba*/; text-align: center;padding:0; line-height: 1"><h1 style="font-family: Verdana; padding: 0; margin: 0; color: #fff; font-size: 15px">VISVA-BHARATI</h1></td>
                                                            <td class="id_header_1" style="background: #9d0088 /*#5674ba*/;padding:0; line-height: 1"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!--bg-color-2/1-->
                                            <tr>
                                                <td class="id_header_2" id="student_hostel_name1" style="vertical-align: top; box-sizing: border-box; padding:  0; border: 0; background: #690062 /*#014a81*/; color: #fff; text-align: center; font-size: 11px; padding: 4px 0">
                                                    
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: bottom; box-sizing: border-box; padding:  6px 0; border: 0; text-align: center">
                                                    <h2 style="font-family: Verdana; padding: 0; margin: 0; color: #000; font-size: 10px; line-height: 1">BOARDER'S ID CARD</h2>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top; box-sizing: border-box; padding:  1px 10px 4px; border: 0">
                                                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; line-height: 1;font-family: Arial; font-size: 8px">
                                                        <tr>
                                                            <td rowspan="5" style="width:65px; padding: 0; text-align: center; vertical-align: middle">
                                                                <img id="studentcard_profile_image1" src="<?php echo base_url(); ?>assets/admin/images/blank-profile-pic.jpg" alt="" style="width:100%; height: auto; border: 1px solid #555;">
                                                            </td>
                                                            <td style="width:10px;">&nbsp;</td>
                                                            <td style="width:40px;">Valid from</td>
                                                            <td> : &nbsp; <strong><span  id="student_allotment_year1"></span></strong></td>                                                            
                                                        </tr>                                                       
                                                        <tr>
                                                            <td></td>
                                                            <td>Valid Upto</td>
                                                            <td> : &nbsp; <strong><span  id="student_vacating_year1"></span></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Date of Birth</td>
                                                            <td> : &nbsp; <strong><span id="student_date_of_birth1"></span></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Blood Group</td>
                                                            <td> : &nbsp; <strong><span id="student_blood_group1"></span></strong></td>
                                                        </tr>                                                        
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top; box-sizing: border-box; padding:  2px 10px; border: 0">
                                                    Name : <strong><span id="student_full_name1"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top; box-sizing: border-box; padding:  2px 10px; border: 0">
                                                    Course : <strong><span id="student_course_name1"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top; box-sizing: border-box; padding:  2px 10px; border: 0">
                                                 Department : <strong><span id="student_department_name1"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top; box-sizing: border-box; padding:  2px 10px; border: 0">
                                                 Bhavana : <strong><span id="student_institute_name1"></span></strong>
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td style="vertical-align: top; box-sizing: border-box; padding:  2px 10px; border: 0">
                                                    Contact No: <strong><span id="student_contact_no1"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top; box-sizing: border-box; padding:  2px 10px; border: 0" class="emergency_no">
                                                    Emergency No: <strong><span id="emergency_no1"></span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top; box-sizing: border-box; padding:  6px 10px; border: 0">
                                                   <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; line-height: 1">
                                                        <tr>
                                                            <td style="width:40%; padding: 0; text-align: left; vertical-align: bottom; line-height: 1">
                                                                <img id="show_student_signature1" src="<?php echo base_url(); ?>assets/admin/images/barcode.jpg" alt="" style="height:18px; display: block; width: auto;max-width: 90px; margin: 0 auto">
                                                                <span style="display: inline-block; height: 1px; width: 70px; border-top:1px solid #555; margin: 0"></span>
                                                            </td>
                                                            <td style="width:60%; padding: 0; text-align: right; vertical-align: bottom">
                                                                <img src="<?php echo base_url(); ?>assets/front/images/proctor_img.jpg" alt="" style="height:18px;  display: block; width: auto; max-width: 90px; margin: 0 0 0 auto">
                                                                <span style="display: inline-block; height: 1px; width: 75px; border-top:1px solid #555; margin: 0 auto"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 0; text-align: left; vertical-align: middle">
                                                              
                                                            </td>
                                                            <td style="padding: 0; text-align: right; vertical-align: middle; font-size: 7px; line-height: 1.2">
                                                                Proctor, Visva-Bharati<br>
                                                                Tel: 03463-262932<br>
                                                                proctor@visva-bharati.ac.in
                                                            </td>
                                                        </tr>
                                                   </table>
                                                </td>
                                            </tr>
                                            <!--bg-color-2/2-->
                                            <tr>
                                                <td class="id_header_3" style="vertical-align: bottom; box-sizing: border-box; border: 0; background:#9d0088 /*#014a81*/; color: #fff; text-align: center;padding: 4px 0 0">
                                                    <h1 style="font-family: Verdana; padding: 0; margin: 0; color: #fff; font-size: 8px; line-height: 12px; margin-bottom: -6px">BOARDER'S ID : <span id="student_hostel_id1"></span></h1>
                                                </td>
                                            </tr>
                                            <!--bg-color-1/2-->
                                            <tr>
                                                <td class="id_header_4" style="vertical-align: top; box-sizing: border-box; padding:  0; border: 0; background: #9d0088 /*#5674ba*/; height: 2.5mm"></td>
                                            </tr>                
                                        </table>
                                    </div>

                                </body>
                 
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
                <div class="clearfix"></div>
              </div>


 <script>

 
  function format_date(date) {
    var dd = String(date.getDate()).padStart(2, '0');
    var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = date.getFullYear();
    return dd + '/' + mm + '/' + yyyy;
  }

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
                          $('#print_academic_year').html("" + resultData.hostel_assign_date.slice(0, 4) + "-" + resultData.vacating_year);
                          $('#print_course_name').html(resultData.course_name);
                          var allotment_date = new Date(resultData.hostel_assign_date.slice(0, 10) + 'Z')
                          $('#print_date_of_allotment').html(format_date(allotment_date));
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
                          $('td#replace_image span#add_image').append("<img src='"+src+"' height='140px' width='100px' >")
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
                          const allotment_year = resultData.hostel_assign_date.slice(0, 4);
                          const allotment_month = parseInt(resultData.hostel_assign_date.slice(5, 7))-1;
                          const vacating_month = (resultData.vacating_month-1);

                          $('#student_allotment_year').html(monthNames[allotment_month]+' '+allotment_year);
                          $('#student_allotment_year1').html(monthNames[allotment_month]+' '+allotment_year);
                          
                          $('#student_vacating_year').html(monthNames[vacating_month]+' '+resultData.vacating_year);
                          $('#student_vacating_year1').html(monthNames[vacating_month]+' '+resultData.vacating_year);

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
                          $('#emergency_no').html("Emergency No:" + "+91 " + resultData.guardian_contact_no);
                          $('#emergency_no1').html(resultData.guardian_contact_no);
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
                          if(resultData.gender.toLowerCase() == 'male'){
                              $('.id_header_1').css('background','#5674ba');
                              $('.id_header_2').css('background','#014a81');
                              $('.id_header_3').css('background','#014a81');
                              $('.id_header_4').css('background','#5674ba');
                          }else{
                            $('.id_header_1').css('background','#9d0088');
                            $('.id_header_2').css('background','#690062');
                            $('.id_header_3').css('background','#9d0088');
                            $('.id_header_4').css('background','#9d0088');
                          }
                         


                  }
                
                });

                saveData.error(function() { alert("Something went wrong"); });

});

});


$(function() {
   
    setTimeout(function() {
        $(".show_message").hide('blind', {}, 300)
    }, 3000);
});

</script>
