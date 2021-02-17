<!DOCTYPE html>
<!-- saved from url=(0049)http://lab-3.sketchdemos.com/payslip/payslip.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">

        <title>Visvabharati Hostel : : Application Slip</title>
        <script type="text/javascript">
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>

        <style>         
            @media print {
                @page{size:210mm 297mm;}
                body{
                    width: 210mm;
                    height: 297mm;
                    padding:10mm 10mm 10mm 8mm;
                }
            }
        </style>


    </head>
    <body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <center><input type="button" value="PRINT" onclick="printDiv('printBill');" style="border:1px solid #d00; background: #c00; color:#fff; padding: 8px 20px; margin-bottom: 20px;" /></center>        
    <div id="printBill" class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 100%; padding: 10px; border: 4px solid #eee">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; font-family: Arial; font-size: 12px; line-height: 25px">
            <tr>
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 0; border: 0px solid #555; text-align: center" colspan="6">
                    <h1 style="margin:0; color: #000; font-weight: normal">HOSTEL APPLICATION SLIP</h1>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; box-sizing: border-box; padding: 0 10px 0 0; border: 0px solid #555; text-align: left">
                    <img src="<?php echo base_url()?>assets/image/Visva-Bharati_University_Logo.png" alt="" width="90px" height="auto">
                </td>
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 0px solid #555" colspan="4">
                    &nbsp;
                </td>
                <td style="vertical-align: top; box-sizing: border-box; padding: 0; border: 0px solid #555; text-align: center">
                    <div style="width:90px;max-height: 120px;overflow: hidden; display: block; margin: 0 auto; padding: 1px; border: 1px solid #999; line-height: 1">
                        <?php if(!empty($student_details->profile_image)){ ?>
                            <img src="<?php echo base_url().'/assets/student_pics/'.$student_details->profile_image;?>" alt="" width="100%" height="auto">
                        <?php }else{ ?>
                            <img src="<?php echo base_url().'/assets/front/images/blank-profile-pic.jpg';?>" alt="" width="100%" height="auto">
                        <?php  } ?>
                        
                    </div>
                    <div style="width:90px;max-height: 35px;overflow: hidden; display: block; margin: 3px auto 0; line-height: 1">

                        <?php if(!empty($student_details->student_signature)){ ?>
                            <img src="<?php echo base_url().'/assets/student_signature/'.$student_details->student_signature;?>" alt="" width="100%" height="auto">
                        <?php }else{ ?>
                            <img src="<?php echo base_url().'/assets/front/images/signeture.png';?>" alt="" width="100%" height="auto">
                        <?php } ?>
                        
                    </div>                        
                </td>
            </tr>
            <tr>
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px 5px 0; border: 0px solid #555;line-height: 20px" colspan="5">
                    Proctor's Office<br>
                    Visva-Bharati, Santiniketan<br>
                    Birbhum, West Bengal, Pin-731235<br>
                    (+91)-7908160981<br>
                    vbhostel@visva-bharati.ac.in
                </td>
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 0 5px 10px; border: 0px solid #999;  text-align: center; line-height: 25px">                        
                    <span style="border-bottom:1px solid #999;font-weight: bold;">Application Date</span><br>
                    <?php echo ((!empty($student_details->created_date) && $student_details->created_date!=='' )? date('Y-m-d',strtotime($student_details->created_date)):'0000-00-00 00:00:00');?><br>
                    <span style="border-bottom:1px solid #999;font-weight: bold;">Application Number</span><br>
                    <?php echo (!empty($student_details->id)? $student_details->id:'');?>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px 15px 0; width: 52%" colspan="3">
                    <p style="border-bottom: 1px solid #999; font-weight: bold; padding: 0 0 3px 0; margin: 0">Application Detail</p>
                </td>
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px;" colspan="2">
                    <p style="border-bottom: 1px solid #999; font-weight: bold; padding: 0 0 3px 0; margin: 0">Address</p>
                </td>
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 0 15px 10px;" colspan="1">

                </td>
            </tr>
            <tr>
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px 15px 0; border: 0px solid #555; line-height: 20px" colspan="3">
                    Student Name: <strong><?php echo (!empty($student_details->full_name)? $student_details->full_name:'');?></strong><br>
                    Student ID: <strong><?php echo (!empty($student_details->student_id)? $student_details->student_id:'');?></strong><br>
                    Contact ID: <strong><?php echo (!empty($student_details->contact_no)? '+91 '.$student_details->contact_no:'');?></strong><br>
                    Email ID: <strong><?php echo (!empty($student_details->email_id)? $student_details->email_id:'');?></strong><br>
                    Sex: <strong><?php echo (!empty($student_details->gender)? $student_details->gender:'');?></strong><br>
                    Blood Group: <strong><?php echo (!empty($student_details->bloodgroupname)? $student_details->bloodgroupname:'');?></strong><br>
                    Bhavana (Institute): <strong><?php echo (!empty($student_details->institute_name)? $student_details->institute_name:'');?></strong><br>
                    Department: <strong><?php echo (!empty($student_details->department_name)? $student_details->department_name:'');?></strong><br>
                    Course : <strong><?php echo (!empty($student_details->course_name)? $student_details->course_name:'');?></strong> 

                </td>
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 0px solid #555;line-height: 20px" colspan="2">
                    <strong><?php echo (!empty($student_details->address)? $student_details->address:'');?></strong><br>
                    <!-- Line 2 <br> -->
                    Dist.: <strong><?php echo (!empty($student_details->district)? $student_details->district:'');?></strong><br>
                    State: <strong><?php echo (!empty($state_name)? $state_name:'');?></strong><br>
                    <!-- Country: <br> -->
                    PIN: <strong><?php echo (!empty($student_details->pincode)? $student_details->pincode:'');?></strong><br>
                    Nationality: <strong><?php echo (!empty($student_details->nationality_type)? $student_details->nationality_type:'');?></strong><br>
                    Aadhar No. : <strong><?php echo (!empty($student_details->aadhar_card_no)? $student_details->aadhar_card_no:'');?></strong><br>
                    <!-- Passport No.: -->
                </td>
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 0 15px 10px; border: 0px solid #555;line-height: 20px" colspan="1">
                    Renewal : <strong><?php echo ((!empty($student_details->renewal_option) && ($student_details->renewal_option==1))? 'Yes':'No');?></strong>: <br>
                    Internal : <strong><?php echo ((!empty($student_details->internal_student) && ($student_details->internal_student==1))? 'Yes':'No');?></strong>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px 15px 0; border: 0px solid #555; line-height: 20px" colspan="3">
                    Date of Admission: <strong><?php echo (!empty($student_details->date_of_allotment)? date('d-m-Y',strtotime($student_details->date_of_allotment)):'');?></strong><br>
                    Semester: <strong><?php echo (!empty($student_details->semester)? $student_details->semester:'');?></strong><br>
                    Academic year: <strong><?php echo (!empty($student_details->academic_year)? $student_details->academic_year:'');?></strong><br>
                    <!-- VB Registration ID: <strong><?php echo (!empty($student_details->student_id)? $student_details->student_id:'');?></strong><br> -->
                    Date of Birth: <strong><?php echo (!empty($student_details->date_of_birth)? date('d-m-Y',strtotime($student_details->date_of_birth)):'');?></strong><br>
                    Category: <strong><?php echo (!empty($student_details->caste_type)? $student_details->caste_type:'');?></strong><br>
                    PWD status: <strong><?php echo (!empty($student_details->pwd_status)? $student_details->pwd_status:'');?></strong><br>
                </td>
                <!-- <td style="vertical-align: top; box-sizing: border-box; padding:  5px 0 15px 10px; border: 0px solid #555;line-height: 20px" colspan="3">                        
                    CGPA: <strong><?php echo (!empty($student_details->last_final_exam_score)? $student_details->last_final_exam_score:'');?></strong><br>
                    Best of Five/500: <strong><?php echo (!empty($student_details->last_final_exam_score)? $student_details->last_final_exam_score:'');?></strong><br>
                    Marks Score: <strong><?php echo (!empty($student_details->final_score)? $student_details->final_score:'');?></strong><br>
                    Distance/KM: <strong><?php echo (!empty($student_details->distance_frm)? $student_details->distance_frm:'');?></strong><br> 
                    Distance Score: <strong><?php echo (!empty($student_details->distance_score)? $student_details->distance_score:'');?></strong><br>  
                    Final Score: <span style="font-size:20px;"><?php echo (!empty($student_details->final_score)? $student_details->final_score:'');?></span>
                </td> -->   
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 0 15px 10px; border: 0px solid #555;line-height: 20px" colspan="3">                        
                    CGPA: <strong><?php echo (!empty($student_details->cgpa)? $student_details->cgpa:'');?></strong><br>
                    Best of Five/500: <strong><?php echo (!empty($student_details->best_of_five)? $student_details->best_of_five:'');?></strong><br>
                   
                </td>                  
            </tr>

            <tr>
                <td style="vertical-align: middle; box-sizing: border-box; padding: 5px 10px; border: 1px solid #555; background: #ddd; font-weight: bold" colspan="3">
                    Particulars
                </td>
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555; border-left: 0; background: #ddd; font-weight: bold; text-align: center" width="100">
                    Payment Date
                </td>
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555; border-left: 0; background: #ddd; font-weight: bold; text-align: right" width="100">
                    Payment ID
                </td>
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555; border-left: 0; background: #ddd; font-weight: bold; text-align: right" width="100">
                    TOTAL
                </td>
            </tr>

            <tr>
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-top: 0;height: 26px" colspan="3">
                    Application Fee 
                </td>
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: center">

                </td>
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: right">

                </td>
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: right;">
                    ₹ 50.00
                </td>
            </tr>                

            <!-- SUB-TOTAL-->
            <tr>
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-top: 0; height: 26px;  text-align: right" colspan="5">
                    SUBTOTAL
                </td>                    
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: right;">
                    ₹ 50.00
                </td>
            </tr>
            <!-- PAID -->
            <tr>
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-top: 0; height: 26px;  text-align: right; font-size: 16px; font-weight: bold" colspan="5">
                    Paid
                </td>                    
                <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: right; font-size: 16px; font-weight: bold">
                    ₹ 50.00
                </td>
            </tr>
            <!-- in words -->
            <tr>
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-top: 0; height: 26px; " colspan="6">
                    Total amount In words: <strong>Fifty only.</strong>
                </td>                   
            </tr>
            <tr>
                <td style="vertical-align: middle; box-sizing: border-box; padding: 5px 10px; border: 1px solid #555; border-top:0; border-bottom: 0; background: #ddd; font-weight: bold" colspan="6">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; box-sizing: border-box; padding: 5px 10px; border: 1px solid #555; border-bottom: 0; font-weight: bold; text-align: center; height: 70px" colspan="6">            
                    Application Verification (For Office Use)
                </td>
            </tr>

            <tr>
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border-left: 1px solid #555; border-bottom: 1px solid #555;   line-height: 1.5; text-align: center; width: 33%" colspan="2">
                    <span style="border-top:1px solid #555; padding-top: 5px; min-width: 120px; display: inline-block">Checked & Verified</span><br>
                    <strong>(Address & Marks)</strong>
                </td>                   
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border-bottom: 1px solid #555;  line-height: 1.5; text-align: center" colspan="2">
                    <span style="border-top:1px solid #555; padding-top: 5px; min-width: 120px; display: inline-block">Checked & Verified</span><br>
                    <strong>(Payment Status)</strong>
                </td>                   
                <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border-right: 1px solid #555;  border-bottom: 1px solid #555;  line-height: 1.5; text-align: center;width: 33%" colspan="2">
                    <span style="border-top:1px solid #555; padding-top: 5px; min-width: 120px; display: inline-block">Card Issued</span><br>
                    <strong></strong>
                </td>                   
            </tr>

        </table>
    </div>

    <center><input type="button" value="PRINT" onclick="printDiv('printBill');" style="border:1px solid #d00; background: #c00; color:#fff; padding: 8px 20px; margin-top: 20px;" /></center>

</body>
</html>