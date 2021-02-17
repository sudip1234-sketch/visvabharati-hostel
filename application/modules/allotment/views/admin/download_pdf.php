<thead>
  <tr>
    <th>Sl No.</th>
	<th>Name</th>
	<th>Student Id</th>
	<th>Department</th>
	<th>Bhavana</th>
	<th>Status</th>
  </tr>
</thead>
<tbody>
  <?php if(!empty($all_data)){ $i =1;foreach($all_data as $val){ ?>
<tr>
<td align="right"><?php echo $i; ?></td>
<td><?php echo @$val->full_name; ?></td>
<td><?php echo @$val->student_id; ?></td>
<td><?php echo @$val->department_name; ?></td>
<td><?php echo @$val->institute_name; ?></td>
<td><?php echo ((@$val->allotment_assigned== 0) ? "Pending" : "Alloted"); ?></td>
</tr>
<?php $i++; } }else{ echo '<tr><td colspan="6" style="text-align: center; font-size: 14px; vertical-align: top; background-color: #ffffff; color: #000000; padding: 5px; border-right: solid 1px #222222; border-bottom: solid 1px #222222;">No Data Found</td></tr>'; } ?>  
</tbody>