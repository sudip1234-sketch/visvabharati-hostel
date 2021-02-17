<!DOCTYPE html>
<!-- saved from url=(0049)http://lab-3.sketchdemos.com/payslip/payslip.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">

        <title>Visvabharati Hostel : : Payment-Receipt</title>
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
            -webkit-print-color-adjust: exact;     
            @page {size:A3}
        }
    
     </style>


    </head>
    <body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; margin: 20px; padding: 20px; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        
    <center><input type="button" value="PRINT" onclick="printDiv('printBill');" style="border:1px solid #d00; background: #c00; color:#fff; padding: 8px 20px; margin-bottom: 20px;" /></center>
        
        <div id="printBill" class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 750px; padding: 10px; border: 4px solid #eee">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; font-family: Arial; font-size: 12px; line-height: 25px">
                <tr>
                    <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 0px solid #555" colspan="5">
                        <h1 style="margin:0; color: #000; font-weight: normal">PAYMENT RECEIPT</h1>
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding: 0; border: 0px solid #555; text-align: center">
                        <img src="https://www.visvabharati-hostel.com//assets/front/images/Visva_bharati_logo.jpg" alt="" width="90px" height="auto">
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 0px solid #555;line-height: 20px" colspan="5">
                        Proctor's Office<br>
                        Visva-Bharati, Santiniketan<br>
                        Birbhum, West Bengal, Pin-731235<br>
                        (+91)-7908160981<br>
                        vbhostel@visva-bharati.ac.in
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 0px solid #999;  text-align: center; line-height: 25px">
                        <span style="border-bottom:1px solid #999;font-weight: bold;">PAYMENT DATE</span><br>
                        <?php echo date('d/m/Y', strtotime($invoice_details->payment_date));?><br>
                        <span style="border-bottom:1px solid #999;font-weight: bold;">RECEIPT NO.</span><br>
                        <?php echo $invoice_details->ref_id;?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; width: 52%" colspan="3">
                        <p style="border-bottom: 1px solid #999; font-weight: bold; padding: 0 0 3px 0; margin: 0">BILL TO</p>
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px;" colspan="3">
                    <p style="border-bottom: 1px solid #999; font-weight: bold; padding: 0 0 3px 0; margin: 0">Payment  Detail</p>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px 15px 10px; border: 0px solid #555; line-height: 20px" colspan="3">
                        Student Name: <?php echo $invoice_details->stName;?><br>
                        Student ID: <?php echo $invoice_details->stId;?><br>
                        Course Semester: <?php echo $invoice_details->course_name;?><br>
                        Hostel/Room No. <?php echo $invoice_details->HostelName.'/'.$invoice_details->room_no;?><br>
                        Phone: <?php echo $invoice_details->contact_no;?><br>
                        Email: <?php echo $invoice_details->email_id;?>
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px 15px 10px; border: 0px solid #555;line-height: 20px" colspan="3">
                        Bank Name: State Bank of India<br>
                        Payment Card No/Mathod<br>
                        Time: <?php echo date('h:m', strtotime($invoice_details->payment_date));?><br>
                        Transaction id: <?php echo $invoice_details->transaction_id;?>
                    </td>
                </tr>
                 <tr>
                    <td style="vertical-align: middle; box-sizing: border-box; padding: 5px 10px; border: 1px solid #555; background: #ddd; font-weight: bold" colspan="3">
                        Room Rent
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555; border-left: 0; background: #ddd; font-weight: bold; text-align: center" width="100">
                        Months
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555; border-left: 0; background: #ddd; font-weight: bold; text-align: right" width="100">
                        Rent per Month
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555; border-left: 0; background: #ddd; font-weight: bold; text-align: right" width="100">
                        TOTAL
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-top: 0;height: 26px" colspan="3">
                       Residential Fee (for the semester: <?php echo $semister; ?> )
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: center">
                        6
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: right">
                        ₹ <?php 
                            $room_value = json_decode($invoice_details->room_value_json);
                            if($invoice_details->nationality_type != 'indian'){
                              echo $room_value->room_fee_foreigner;
                              }else{
                                if($invoice_details->caste_type == 'SC' || $invoice_details->caste_type == 'ST' || $invoice_details->pwd_status == 1){
                                  echo 0.00 ;
                                }else{
                                  echo number_format((float)$room_value->room_fee, 2, '.', '');
                                }
                              }

                          ?>
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: right;">
                        ₹ <?php echo number_format((float) ($room_value->room_fee * 6), 2, '.', '');?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-top: 0; height: 26px" colspan="3">
                        
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: center">
                        
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: right">
                        
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: right;">
                        
                    </td>
                </tr>
                
                <!--OTHER-->
                <?php if($index == 1) { ?>
                <tr>
                    <td style="vertical-align: middle; box-sizing: border-box; padding: 5px 10px; border: 1px solid #555; border-top:0; background: #ddd; font-weight: bold" colspan="3">
                        Other
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555; border-top:0; border-left: 0; background: #ddd; font-weight: bold; text-align: center" width="100">
                        QTY.
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-top:0;border-left: 0; background: #ddd; font-weight: bold; text-align: right" width="100">
                        Rent per Month
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-top:0; border-left: 0; background: #ddd; font-weight: bold; text-align: right" width="100">
                        TOTAL
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-top: 0;height: 26px" colspan="3">
                       Infrastructure Development Fee (one time)    
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: center">
                        1
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: right">
                        ₹ 50.00
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: right;">
                        ₹ 50.00
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-top: 0; height: 26px" colspan="3">
                        Allotment Card and ID Card Printing Fee (one time)  
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: center">
                        1
                    </td>
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: right">
                        ₹ 50.00
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
                        ₹ <?php echo $invoice_details->other_value;?>
                    </td>
                </tr>
                <?php } ?>
                <!-- PAID -->
                <tr>
                    <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-top: 0; height: 26px;  text-align: right; font-size: 16px; font-weight: bold" colspan="5">
                        Total
                    </td>                    
                    <td style="vertical-align: top; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-left: 0;  border-top: 0; text-align: right; font-size: 16px; font-weight: bold">
                        ₹ <?php echo $invoice_details->total_paid;?>
                    </td>
                </tr>
                <!-- in words -->
                <!-- <tr>
                    <td style="vertical-align: middle; box-sizing: border-box; padding:  5px 10px; border: 1px solid #555;  border-top: 0; height: 26px; " colspan="6">
                        Total amount In words: <strong>One thoushand nine hundred fifty only.</strong>
                    </td>                   
                </tr> -->
                
            </table>
        </div>

    <center><input type="button" value="PRINT" onclick="printDiv('printBill');" style="border:1px solid #d00; background: #c00; color:#fff; padding: 8px 20px; margin-top: 20px;" /></center>

    </body>
</html>