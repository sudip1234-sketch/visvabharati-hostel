<?php
$servername = "visvabharati-hostel.com";
$username = "visvabha_user";
$password = "Y]{;3(kSOqXH";
$dbname = "visvabha_visvabharati";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "vbh";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (($handle = fopen("test.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 10000, "\t")) !== FALSE) {
        $student_id = $data[0];
		
		if(preg_match('/^(F)?([0-9]{2})([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})$/', $student_id, $matches)) {
            $institute_id = $matches[2];
            $course_id = $matches[3];
            $department_id = $matches[4];			
			
			$result = $conn->query("SELECT id FROM vb_course WHERE course_code='$course_id' LIMIT 1");
			$row = $result->fetch_assoc();
			$course_id = $row['id'];
			
			$result = $conn->query("SELECT id FROM vb_department WHERE subject_code='$department_id' LIMIT 1");
			$row = $result->fetch_assoc();
			$department_id = $row['id'];
			
			$sql = "UPDATE vb_student SET course_id='$course_id', institute_id=$institute_id, department_id=$department_id WHERE student_id='$data[0]'";
			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
			echo $sql . '<br>';
		} else {
			echo $student_id ;
			echo '<br>';
		}
    }
    fclose($handle);
}

$conn->close();
?>