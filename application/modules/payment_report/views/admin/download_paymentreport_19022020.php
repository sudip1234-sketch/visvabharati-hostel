<table>
  <tr>
    <th colspan="12">Visva bharati hostel fees payment report ( <?php echo date('d-m-Y'); ?> )</th>
  </tr>
</table>
<table>

        <thead>
          <tr>
            <th>SL No</th>
            <th>Student Id</th>
            <th>Name</th>
            <th >Institute</th>
            <th >Department</th>
            <th>Course</th>
            <th>Gender</th>
            <th>Caste</th>
            <th>Hostel Name</th>
            <th>Room No.</th>
            <th>Payment Date</th>
            <th>Total Paid (&#8377;)</th>
            <th>Mess Charge (&#8377;)</th>
            <th>Room Rent (&#8377;)</th>
            <th>Other Charge (&#8377;)</th>
            <th>Plan Month</th>
            <th>Plan Start Month</th>
            <th>Plan End Month</th>
          </tr>
        </thead>

                    <tbody>


                      <?php if(!empty($all_data)){
                          $i=1;
                          $due = 0;
                          $total_amount_paid = 0;
                          $total_amount_due = 0;
                      
                          foreach($all_data as $ad)
                          { //echo "<pre>"; print_r($ad); die;

                              $total_amount_paid = $total_amount_paid + $ad->total_paid;

                           ?>

                            <tr>
                                <th><?php echo $i; ?></th>
                                <td><?php echo $ad->stid; ?></td>
                                <td><?php echo $ad->full_name; ?></td>
                                <td><?php echo ucfirst($ad->institute_name); ?></td>
                                <td><?php echo ucfirst($ad->department_name); ?></td>
                                <td><?php echo ucfirst($ad->course_name); ?></td>
                                <td><?php echo ucfirst($ad->gender); ?></td>
                                <td><?php echo ucfirst($ad->caste_type); ?></td>
                                <td><?php echo $ad->hostel_name; ?></td> 
                                <td><?php echo $ad->room_no; ?></td> 
                                <td><?php echo date('j M Y H:i A',strtotime($ad->payment_date)); ?></td>
                                <td>
                                  <?php echo $ad->total_paid; ?>
                                 <!--    <a href="#" name="edit_ad" tooltip="View Details" class="edit_button" ad_id="<?php //echo $ad->id; ?>" data-toggle="modal" data-target="#edit-admin-data"><i class="fas fa-eye"></i></a> -->
                                  </td>
                                   <td>
                                  <?php echo $ad->plan_month_amount; ?>
                               
                                  </td>
                                  <td>
                                  <?php echo $ad->room_value; ?>
                               
                                  </td>
                                  <td>
                                  <?php echo $ad->other_value; ?>
                               
                                  </td>
                                <td><?php echo $ad->plan_month; ?>
                                  
                                </td>
                                <td><?php echo $ad->plan_month_start; ?></td>
                                <td><?php echo $ad->plan_month_end; ?></td>

                                
                            </tr>

                          <?php 
                          $i++;
                        }

                      } ?>
                     
    </tbody>
    
</table>
<!-- 
<table>
 <thead>
      <tr>
            <th></th>
            <th></th>
            <th></th>

            
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Total Paid:</th>
            <th><?php echo $total_amount_paid; ?></th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Total Due:</th>
            <th><?php echo $total_amount_due; ?></th>
          </tr>
    </thead>
</table> -->