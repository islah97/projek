<?php

include '../config/database.php';

// api (ajax)
if (isset($_GET['action'])) {

	$action = mysqli_real_escape_string($db, $_GET['action']);

	// function to get all department list
	if ($action == 1) {

		$query = "SELECT * FROM department";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));

		if (mysqli_num_rows($result) > 0) {
			echo "<option value=''> - Pilih Jabatan - </option>";
			foreach ($result as $row) {
				echo "<option value='".$row['department_id']."'> ".$row['department_name']." </option>";
			}
		}else{
			echo "<option value=''> - Pilih Jabatan - </option>";
		}

	}

}


