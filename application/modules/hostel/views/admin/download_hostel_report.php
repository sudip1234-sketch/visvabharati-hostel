<table>
  <tr>
    <th colspan="10"><?php echo @$all_data[0]['hostel_name'] .'('.@$all_data[0]['hostel_code'].')'; ?> ( <?php echo date('d-m-Y'); ?> )</th>
  </tr>
</table>
<table>

        <thead>
          <tr>
            <th>SL No</th>
            <th>Room No</th>
            <th>Bed No</th>
            <th>Block No</th>
            <th>Floor</th>
            <th>Name</th>
            <th>Student Id</th>
            <th>Hostel Id</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Department</th>
            <th>Institute</th>
          </tr>
        </thead>

                    <tbody>


                      <?php if(!empty($all_data)){
                          $i=1;
                          foreach($all_data as $ad)
                          { 
                           ?>

                            <tr>
                                <th><?php echo $i; ?></th>
                                <td><?php echo @$ad['room_no']; ?></td>
                                <td><?php echo @$ad['bed_no']; ?></td>
                                <td><?php echo @$ad['block_no']; ?></td>
                                <td><?php echo @$ad['floor_no']; ?></td>
                                <td><?php echo @$ad['full_name']; ?></td>
                                <td><?php echo @$ad['student_id']; ?></td>
                                <td><?php echo @$ad['hostel_id']; ?></td>
                                <td><?php echo @$ad['course_name']; ?></td>
                                <td><?php echo @$ad['semester']; ?></td>
                                <td><?php echo @$ad['department_name']; ?></td>
                                <td><?php echo @$ad['institute_name']; ?></td>
                                
                            </tr>

                          <?php 
                          $i++;
                        }

                      } ?>
                     
    </tbody>
    
</table>
