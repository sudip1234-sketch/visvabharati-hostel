<?php

function semesterCal($student_id, $payment_number, $admission_date){
	$ad_year = $rest = substr($student_id, -4, 2);
    $ad_date = $rest = $ad_year.'-07-01';
    $from = new DateTime($ad_date);
    $to   = new DateTime('today');
    $total_year =  $from->diff($to)->y;
    $month = date('m');
    $current_sem = '';
    $total_sec =  $total_year * 2;

    $actual_total_year =  date_diff(date_create('2019-07-01'), date_create('today'))->y;
    $actual_payment_number = $actual_total_year * 2;

    
    // actual semester calculation 
    if($month < 7){
       $current_sem = $total_sec + 2;
       $actual_payment_number += 2;
    } else {
       $current_sem = $total_sec + 1;
       $actual_payment_number += 1;
    }



    // have no payment till now
    $date1=strtotime('01-01-2020');
    $admi_date=strtotime($admission_date);
    if($date1 > $admi_date){
       if($payment_number == 0){ 
        $current_sem -= 1;
     } 
    }
     // if($payment_number == 0 && ){ 
     //    $current_sem -= 1;
     // }

     //if student payment current semester rent or more than
     if($payment_number >= $actual_payment_number){
        $current_sem += (($payment_number - $actual_payment_number)+ 1);
     }

     return $current_sem;
}