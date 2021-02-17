<script type="text/javascript">
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
            
</script>
<a onclick="return PrintDiv();" style="background:#fffcc7; border:#ff0000 1px solid; padding:5px 8px; margin-right:5px; color:#fa8c1b; text-decoration:none">
                    <strong>Print</strong>
                  </a>
                 

<div id="divToPrint" style="width: 700px; margin: 0 auto; font-size: 12px; border: 1px solid #ccc; padding: 10px;">
    <table style="border-collapse:collapse; background: #fff; font-family:'Open Sans',Arial,Helvetica,sans-serif;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
        <tr>
            <td align="center"><img src="<?php echo base_url(); ?>assets/front/images/Visva_bharati_logo.jpg" alt="" width="100"></td>
        </tr>
    </table>
   
   <table style="border-collapse:collapse; background: #fff; font-family:'Open Sans',Arial,Helvetica,sans-serif;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">                        
                        <tr>                            
                            <td style=" padding: 5px; font-size: 13px; width: 33.33%;">
                                To<br>
The Joint Registrar (Accounts)<br>
Visva-Bharati

                            </td>
                        </tr>
                    </table>
                    <table style="border-collapse:collapse; background: #fff; font-family:'Open Sans',Arial,Helvetica,sans-serif;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">                        
                        <tr>  
                                             
                            <td style=" padding: 5px; font-size: 13px; width: 100%; text-align: right;">
                               Kindly accept Application Fee <br>
                               <?php if($payment_details->gender=='male'){ ?> Sri <?php }else{ echo "Smt." ; } ?>  ----------------<?php echo @$payment_details->stName ; ?>------------------------------a <?php echo @$payment_details->course_name ; ?> 
student for <?php if($payment_details->gender=='male'){ ?> his <?php }else{ echo "her" ; } ?> hostel accommodation.

                            </td>
                        </tr>                       
                    </table>
   
   <p style=" font-family:'Open Sans',Arial,Helvetica,sans-serif; padding: 5px; font-size: 20px; text-align: center;"><strong>The details of charges are given below :</strong></p>
    <table style="border-collapse:collapse; background: #fff; font-family:'Open Sans',Arial,Helvetica,sans-serif; font-size: 11px;" width="100%" cellspacing="0" cellpadding="0" border="1" align="center">                        
                        <tr>                            
                            <th style=" padding: 5px; font-size: 13px; font-size: 14px;">SL No</th>
                            <th style=" padding: 5px; font-size: 13px; font-size: 14px;">Type</th>
                            <th style=" padding: 5px; font-size: 13px; font-size: 14px;">Amount </th>
                            <th style=" padding: 5px; font-size: 13px; font-size: 14px;">Amount to be paid<br> by the student</th>
                        </tr>
                         <tr>                            
                            <th style=" padding: 5px; font-size: 13px; font-size: 13px;" valign="top">1</th>
                            <td style=" padding: 5px; font-size: 13px; font-size: 13px;">
                                <table style="border-collapse:collapse; background: #fff; font-family:'Open Sans',Arial,Helvetica,sans-serif;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <td style=" padding: 5px; font-size: 13px; font-size: 13px;">Application Fee </td>                                        
                                    </tr> 

                                </table>
                            </td>
                            <td style=" padding: 5px; font-size: 13px; font-size: 13px;">
                                <table style="border-collapse:collapse; background: #fff; font-family:'Open Sans',Arial,Helvetica,sans-serif;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <td style=" padding: 5px; font-size: 13px; font-size: 13px;"><?php echo @$payment_details->total_amount; ?></td>                                        
                                    </tr>                                                                     
                                </table>
                            </td>                            
                            <td  style=" padding: 5px; font-size: 13px; font-size: 13px; text-align: center; vertical-align: top;"><?php echo @$payment_details->total_amount ; ?></td>
                            
                        </tr>
                       
                        <tr>                            
                            <td style=" padding: 5px; font-size: 16px; text-align: center;" colspan="2"><strong>Total</strong></td>
                           
                           <td style=" padding: 5px; font-size: 16px; font-size: 13px; text-align: center;"> </td>                           
                            <td style=" padding: 5px; font-size: 16px; font-size: 13px; text-align: center;"> <strong><?php echo @$payment_details->total_amount ; ?></strong></td>
                            
                        </tr>
                        
                    </table>
                    <table>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                     <table style="border-collapse:collapse; background: #fff; font-family:'Open Sans',Arial,Helvetica,sans-serif;" width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style=" padding: 5px; font-size: 13px; font-size: 13px; text-align: left;">
                                (in words : Rupees <?php echo @$price_word; ?>)
                            </td>
                        </tr>
                        <tr>
                            <td style=" padding: 5px; font-size: 13px; font-size: 13px; text-align: left;">
                                Memo No. P-<?php echo @$payment_details->id ; ?>/<?php echo date('Y',strtotime($payment_details->date_of_allotment)) ; ?>-<?php echo @$payment_details->vacating_year ; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style=" padding: 5px; font-size: 13px; font-size: 13px; text-align: left;">
                                Dated : <?php echo date('d/m/Y',strtotime($payment_details->payment_date)) ; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style=" padding: 5px; font-size: 13px; font-size: 13px; text-align: right;">
                                Proctor / Dy.Proctor / Dy.Registrar
                            </td>
                        </tr>                        
                     </table>
                </div>