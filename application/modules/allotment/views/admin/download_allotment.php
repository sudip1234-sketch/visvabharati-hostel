<table>
  <thead>
    <tr>
      <th>Sl No.</th>        
      <th>Name</th>
      <th>Student Id</th>
      <th>Hostel ID</th>
      <th>Bed Number</th>
      <th>Room No</th>
      <th>Block No</th>
      <th>Floor No</th>
      <th>Course Type</th>
      <th>Semester</th>
      <th>Department</th>
      <th>BHAVANA</th>
      <th>Date of Allotment</th>
      <th>Academic Year</th>
      <th>Category</th>
      <th>PWD</th>
      <th>Nationality</th>
      <th>CONTACT</th>
      <th>EMAIL</th>
      <th>DOB</th>
      <th>BLOOD GROUP</th>
      <th>RELIGION</th>
      <th>ADDRESS1</th>
      <th>ADDRESS2</th>
      <th>DISTRICT</th>
      <th>STATE</th>
      <th>PINCODE</th>
      <th>UID</th>
      <th>Gurdian Name</th>
      <th>Gurdian email ID</th>
      <th>Gurdian Contact Number</th>      
    </tr>
  </thead>
  <tbody>
 <?php if(!empty($all_data)){                
  $i =1;
  foreach($all_data as $student)
  {
    if($student->hostel_name!=''){
    $hostel_name_row = $this->Allotmentmodel->get_row_result('hostel', ['id' => $student->hostel_name]);
  }else{
    $hostel_name_row = array();
  }

  $state = $this->Allotmentmodel->get_row_result('state', ['id' => $student->state_id]);
   ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $student->full_name; ?></td>
      <td><?php echo $student->student_id; ?></td>     
      <td><?php echo $student->hostel_id; ?></td>
      <td><?php echo $student->bed_no; ?></td>
      <td><?php echo $student->room_no; ?></td>
      <td><?php echo $student->block_no; ?></td>
      <td><?php echo $student->floor_no; ?></td>
      <td><?php echo $student->course_name; ?></td>
      <td><?php ''; ?></td> <!-- Semester --> 
      <td><?php echo $student->department_name; ?></td>
      <td><?php echo $student->institute_name; ?></td>
      <td><?php echo date('d-m-Y',strtotime($student->date_of_allotment)); ?></td>
      <td><?php echo $student->academic_year.'-'.$student->vacating_year; ?></td>
      <td><?php echo $student->caste_type; ?></td>
      <td><?php echo (!empty($student->pwd_status && $student->pwd_status == 1 )?'Yes':'No'); ?></td>
      <td><?php echo $student->nationality_type; ?></td>
      <td><?php echo $student->contact_no; ?></td>
      <td><?php echo $student->email_id; ?></td>
      <td><?php echo date('d-m-Y',strtotime($student->date_of_birth)); ?></td>
      <td><?php echo $student->bloodgroupname; ?></td>
      <td><?php echo ''; ?></td>   <!-- RELIGION -->
      <td><?php echo $student->address; ?></td>
      <td><?php echo ''; ?></td>   <!-- ADDRESS2 -->
      <td><?php echo ''; ?></td>   <!-- DISTRICT -->
      <td><?php echo @$state->name; ?></td>
      <td><?php echo $student->pincode; ?></td>
      <td><?php echo $student->aadhar_card_no; ?></td>
      <td><?php echo $student->guardian_name; ?></td>
      <td><?php echo $student->guardian_email_id; ?></td>
      <td><?php echo $student->guardian_contact_no; ?></td> 
    </tr>
    <?php
        $i++;
         }

    } ?> 
  </tbody>
</table>