<?php

// include '../config/session.php';
include '../config/database.php';

// api (ajax)
if (isset($_GET['action'])) {

	$action = mysqli_real_escape_string($db, $_GET['action']);

	// function to get all equipment data
	if ($action == '1') {

		$result = mysqli_query($db,"SELECT * FROM reservation") or die(mysqli_error($db));

		foreach ($result as $row) {

			$user_id = $row['user_id'];
			$query_user = mysqli_query($db,"SELECT * FROM user WHERE user_id = '$user_id'") or die(mysqli_error($db));
			$dataUser = mysqli_fetch_array($query_user);

			$data[] = array(
				'user_id' => $user_id,
				'user_name' => $dataUser['user_name'],
				'user_staff_id' => $dataUser['user_staff_id'],
				'reservation_id' => $row['reservation_id'],
				'reservation_date_pickup' => $row['reservation_date_pickup'],
				'reservation_time_pickup' => $row['reservation_time_pickup'],
				'reservation_date_return' => $row['reservation_date_return'],
				'reservation_time_return' => $row['reservation_time_return']
			);
		}

		echo json_encode($data);
	}

	// check equipment exist
	else if ($action == '2') {

		$id = mysqli_real_escape_string($db, $_POST['id']);

		$query = "SELECT * FROM reservation WHERE reservation_id = '$id'";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));

		if (mysqli_num_rows($result) > 0) {
			$data = 400;
		}else{
			$data = 200;
		}
		
		echo json_encode($data);
	}

	// get equipment update data
	// else if ($action == '3') {

	// 	$id = mysqli_real_escape_string($db, $_POST['id']);

	// 	$query = "SELECT * FROM equipment WHERE equipment_id = '$id'";
	// 	$result = mysqli_query($db, $query) or die(mysqli_error($db));

	// 	if (mysqli_num_rows($result) > 0) {
	// 		$row = mysqli_fetch_array($result);

	// 		$data = array(
	// 			'equipment_name' => $row['equipment_name'],
	// 			'equipment_serial_no' => $row['equipment_serial_no'],
	// 			'equipment_model' => $row['equipment_model'],
	// 			'equipment_type' => $row['equipment_type'],
	// 			'equipment_status' => $row['equipment_status']
	// 		);

	// 	}else{
	// 		$data = 400;
	// 	}
		
	// 	echo json_encode($data);
	// }

	else if ($action == '4'){

		$id = mysqli_real_escape_string($db, $_GET['id']);

		
			$query = "SELECT COUNT(*) AS total FROM equipment WHERE equipment_status = '$id'";
		

		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		$row = mysqli_fetch_array($result);
		$total = $row['total'];

		$data = array('total' => $total);

		echo json_encode($data);
	}

	else if ($action == 'delete'){

		$equipmentID = mysqli_real_escape_string($db, $_GET['id']);
		$query = "DELETE FROM equipment WHERE equipment_id = '$equipmentID'";
		$result = mysqli_query($db, $query) or die(mysqli_error($db)); 

		if ($result) {
			$data['status'] = '200';
		}else{
			$data['status'] = '400';
		}

		echo json_encode($data);
	}

}

// function register & update equipment
// if (isset($_POST['typeForm'])) {

// 	$typeForm = mysqli_real_escape_string($db, $_POST['typeForm']);

// 	$equipment_name = mysqli_real_escape_string($db, $_POST['equipment_name']);
// 	$equipment_serial_no = mysqli_real_escape_string($db, $_POST['equipment_serial_no']);
// 	$equipment_model = mysqli_real_escape_string($db, $_POST['equipment_model']);
// 	$equipment_type = mysqli_real_escape_string($db, $_POST['equipment_type']);
// 	$equipment_status = mysqli_real_escape_string($db, $_POST['equipment_status']);

// 	$timestamp = date('Y-m-d H:i');

// 	if ($typeForm == 'register') {

// 		$query = "INSERT INTO equipment (equipment_name, equipment_serial_no, equipment_model, equipment_type, equipment_status, created_at)
// 				VALUES ('$equipment_name', '$equipment_serial_no', '$equipment_model', '$equipment_type', '$equipment_status', '$timestamp')";
// 	}else{

// 		// for update
// 		$equipment_id = mysqli_real_escape_string($db, $_POST['equipment_id']);

// 		$query =  "UPDATE equipment SET equipment_name = '$equipment_name',  equipment_serial_no =  '$equipment_serial_no', equipment_model ='$equipment_model', equipment_type='$equipment_type', equipment_status='$equipment_status', updated_at = '$timestamp' WHERE equipment_id = '$equipment_id'";
// 	}
	
// 	$result = mysqli_query($db, $query) or die(mysqli_error($db)); 

// 	if ($result) {
// 		$data['status'] = '200';
// 	}else{
// 		$data['status'] = '400';
// 		$data['message'] = 'Equipment already registered';
// 	}

// 	echo json_encode($data);
// }


