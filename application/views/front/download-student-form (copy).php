<!doctype html>
<html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Hostel Application Slip</title>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <style>
        body {
          font-family: -apple-system, BlinkMacSystemFont, "Segoe UI",
        "Roboto", "Oxygen", "Ubuntu", "Helvetica Neue", Arial, sans-serif;
        color: #333;
      }
      .page {
        background: white;
        display: block;
        margin: 0 auto;
        padding: .3cm 1cm;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
      }

      .page[size="A4"] {  
        width: 21cm;
        height: 29.7cm; 
      }

      .passport-img-area {
        width: 3.5cm;
        height: 4.5cm;
        border: 3px solid #ccc;
        position: relative;
        
      }

      .passport-img-area h2 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        margin: 0;
        text-align: center;
        color: #ccc;
      }

      .border-bottom-text-area {
        /*width: 3.7cm;*/
        border-bottom: 1px solid #ccc;
        margin: 5px 0;
      }

      .border-bottom-text-area p {
        margin: 0 0 2px;
      }

      table th, table td {
        padding: 2px;
      }

      body {
        width: 210mm;
        height: 296mm;
        margin: 0 auto;
        overflow-x: hidden;
        overflow-y: auto;
      }

      @media print {
        body, html, .page{
          margin: 0;
          box-shadow: none;
        }

        #print_button {
          display: none;
        }
      }
      </style>
    </head>

    <body>
      <div class="page">
        <h1 align="center">HOSTEL APPLICATION SLIP</h1>
        <table width="100%">
          <tr>
            <td valign="top">
              <img alt="logo.jpg" src="<?php echo base_url()?>assets/image/Visva-Bharati_University_Logo.png" width="165px">
              <p style="line-height: 1.2; font-weight: bold;">
                Proctor's Office<br>
                Visva-Bharati, Santiniketan<br>
                Birbhum, West Bengal, Pin-731235<br>
                (+91)-7908160981<br>
                vbhostel@visva-bharati.ac.in
              </p>
            </td>
            <td valign="top" align="right">
              <div class="passport-img-area">
                <!-- <h2>Passport Photo</h2> -->
                <?php if(!empty($student_details->profile_image)){ ?>
                  <img width="134px"; height="160px";  src="<?php echo base_url().'/assets/student_pics/'.$student_details->profile_image;?>">
                  <?php }else{ ?>
                  <img width="134px"; height="160px"; src="<?php echo base_url().'/assets/front/images/blank-profile-pic.jpg';?>">
                  <?php } ?>
                
              </div>
              <div class="border-bottom-text-area">
               <!--  <p><em>Signature</em></p> -->
               <?php if(!empty($student_details->student_signature)){ ?>
                  <img width="134px"; height="60px"; src="<?php echo base_url().'/assets/student_signature/'.$student_details->student_signature;?>">
                  <?php }else{ ?>
                  <img width="134px"; height="60px"; src="<?php echo base_url().'/assets/front/images/signeture.png';?>">
                  <?php } ?>
              </div>
              <div class="border-bottom-text-area">
                <p><em>Application Date : <?php echo ((!empty($student_details->created_date) && $student_details->created_date!=='' )? date('Y-m-d',strtotime($student_details->created_date)):'0000-00-00 00:00:00');?></em></p>
              </div>
              <div class="border-bottom-text-area">
                <p><em>Application Number : <?php echo (!empty($student_details->id)? $student_details->id:'');?></em></p>
              </div>
            </td>
          </tr>
        </table>
        <table width="100%">
         
          <tbody>
          <tr>
              <td align="left" width="40%" style="padding-bottom: 0;">
                <p style="border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-bottom: 0;">Application Details</p>
              </td>
              <td align="left" width="40%" style="padding-bottom: 0;">
                <p style="border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-bottom: 0;">Address</p>
              </td>
              <td align="left" width="20%" style="padding-bottom: 0;">
                <p style="border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-bottom: 0;">&nbsp;</p>
              </td>
            </tr>
            <tr>
              <td valign="top" style="padding-top: 0;">
                <em>Student Name: <?php echo (!empty($student_details->full_name)? $student_details->full_name:'');?></em><br>
                <em>Student ID:<?php echo (!empty($student_details->student_id)? $student_details->student_id:'');?></em><br>
                <em>Contact No:<?php echo (!empty($student_details->contact_no)? '+91 '.$student_details->contact_no:'');?></em><br>
                <em>Email ID:<?php echo (!empty($student_details->email_id)? $student_details->email_id:'');?></em><br>
                <em>Sex:<?php echo (!empty($student_details->gender)? $student_details->gender:'');?></em><br>
                <em>Blood Group:<?php echo (!empty($student_details->bloodgroupname)? $student_details->bloodgroupname:'');?></em><br>
                <em>Bhavana (Institute):<?php echo (!empty($student_details->institute_name)? $student_details->institute_name:'');?></em><br>
                <em>Department:<?php echo (!empty($student_details->department_name)? $student_details->department_name:'');?></em><br>
                <em>Course:<?php echo (!empty($student_details->course_name)? $student_details->course_name:'');?></em><br>
                <em>Date of Addmission:<?php echo (!empty($student_details->date_of_allotment)? date('d-m-Y',strtotime($student_details->date_of_allotment)):'');?></em><br>
                <em>Semester:<?php echo (!empty($student_details->semester)? $student_details->semester:'');?></em><br>
                <em>Academic Year:<?php echo (!empty($student_details->academic_year)? $student_details->academic_year:'');?></em><br>
                <em>VB Registration ID:<?php echo (!empty($student_details->student_id)? $student_details->student_id:'');?></em><br>
                <em>Date of Birth:<?php echo (!empty($student_details->date_of_birth)? date('d-m-Y',strtotime($student_details->date_of_birth)):'');?></em><br>
                <em>Category:<?php echo (!empty($student_details->caste_type)? $student_details->caste_type:'');?></em><br>
                <em>PWD Status:<?php echo (!empty($student_details->pwd_status)? $student_details->pwd_status:'');?></em><br>
              </td>
              <td valign="top" style="padding-top: 0;">
                <em>Line 1:<?php echo (!empty($student_details->address)? $student_details->address:'');?></em><br>
                <em>Dist:<?php echo (!empty($student_details->district)? $student_details->district:'');?></em><br>
                <em>State:<?php echo (!empty($state_name)? $state_name:'');?></em><br>
                <!-- <em>Country:</em><br> -->
                <em>PIN Code:<?php echo (!empty($student_details->pincode)? $student_details->pincode:'');?></em><br>
                <em>Nationality:<?php echo (!empty($student_details->nationality_type)? $student_details->nationality_type:'');?></em><br>
                <em>Aadhar Number <small>(For Indian Nationals)</small>:<?php echo (!empty($student_details->aadhar_card_no)? $student_details->aadhar_card_no:'');?></em><br>
               <!--  <em>Passport Number <small>(For Foreign Students)</small>:<?php echo (!empty($student_details->aadhar_card_no)? $student_details->aadhar_card_no:'');?></em><br> -->
              </td>
              <td valign="top" style="padding-top: 0;">
                <em>Renewal :  <?php echo ((!empty($student_details->renewal_option) && ($student_details->renewal_option==1))? 'Yes':'No');?></em><br>
                <em>Internal :<?php echo ((!empty($student_details->internal_student) && ($student_details->internal_student==1))? 'Yes':'No');?></em></br> 
              </td>
            </tr>
          </tbody>
        </table>
        <table align="center" width="100%" style="margin: 30px auto;">
          <tr>
            <td width="15%">CGPA : <?php echo (!empty($student_details->last_final_exam_score)? $student_details->last_final_exam_score:'');?></td>
            <td width="15%">Best of Five/500 : <?php echo (!empty($student_details->last_final_exam_score)? $student_details->last_final_exam_score:'');?></td>
            <td width="15%">Marks Score : <?php echo (!empty($student_details->final_score)? $student_details->final_score:'');?></td>
          </tr>
          <tr>
            <td>Distance/KM : <?php echo (!empty($student_details->distance_frm)? $student_details->distance_frm:'');?></td>
            <td>Distance Score : <?php echo (!empty($student_details->distance_score)? $student_details->distance_score:'');?></td>
            <td>Final Score : <?php echo (!empty($student_details->final_score)? $student_details->final_score:'');?></td>
          </tr>
          <!-- <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><h2 style="margin: 0;">9.8</h2></td>
          </tr> -->
        </table>
        <table align="center" width="100%" style="border-collapse: collapse;">
          <thead>
            <tr>
              <th align="center" style="background-color: #ccc; border: 1px solid #ccc;">Particulars</th>
              <th align="center" style="background-color: #ccc; border: 1px solid #ccc;">Payment Date</th>
              <th align="center" style="background-color: #ccc; border: 1px solid #ccc;">Payment ID</th>
              <th align="center" style="background-color: #ccc; border: 1px solid #ccc;">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="border: 1px solid #ccc;">Application Fee</td>
              <td style="border: 1px solid #ccc;">&nbsp;</td>
              <td style="border: 1px solid #ccc;">&nbsp;</td>
              <td align="right" style="border: 1px solid #ccc;">₹0</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right" style="border-bottom: 1px solid #666;">SUBTOTAL</td>
              <td align="right" style="border-bottom: 1px solid #666;">₹0</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right" style="border-bottom: 1px solid #666;"><h3 style="margin: 0;">Total</h3></td>
              <td align="right" style="border-bottom: 1px solid #666;"><h3 style="margin: 0;">₹0</h3></td>
            </tr>
            <tr>
              <td colspan="4" align="right">Total amount in words: <b>Nil</b></td>
            </tr>
          </tbody>
        </table>
        <hr style="margin: 20px 0 5px;">
        <h5 align="center">Application Verfication (For Office Use)</h5>
      </div>
      <!-- <a class="download-pdf" href="javascript:void(0)" class="btn btn-danger">Download Form</a> -->
      <!-- <a class="download-pdf" onclick="window.print()" href="javascript:void(0)" class="btn btn-danger">Download Form</a> -->
       <form id="print_button"> 
         <input type="button" value="Print" onclick="window.print()" /> 
      </form> 
    </body>
</html>
