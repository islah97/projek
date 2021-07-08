<?php

// include '../config/session.php';
include '../config/database.php';

// api (ajax)
if (isset($_GET['action'])) {

	$action = mysqli_real_escape_string($db, $_GET['action']);

	// function to get all user data
	if ($action == '1') {

		$result = mysqli_query($db,"SELECT * FROM user") or die(mysqli_error($db));

		foreach ($result as $row) {

			$data[] = array(
				'user_id' => $row['user_id'],
				'user_name' => $row['user_name'],
				'user_password' => $row['user_password'],
				'user_staff_id' => $row['user_staff_id'],
				'user_phoneNo' => $row['user_phoneNo'],
				'user_role' => $row['user_role'],
				'user_status' => $row['user_status']
			);
		}

		echo json_encode($data);
	}

	// check user exist
	else if ($action == '2') {

		$id = mysqli_real_escape_string($db, $_POST['id']);

		$query = "SELECT * FROM user WHERE user_staff_id = '$id'";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));

		if (mysqli_num_rows($result) > 0) {
			$data = 400;
		}else{
			$data = 200;
		}
		
		echo json_encode($data);
	}

	// get user update data
	else if ($action == '3') {

		$id = mysqli_real_escape_string($db, $_POST['id']);

		$query = "SELECT * FROM user WHERE user_id = '$id'";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);

			$data = array(
				'user_name' => $row['user_name'],
				'user_password' => $row['user_password'],
				'user_staff_id' => $row['user_staff_id'],
				'user_phoneNo' => $row['user_phoneNo'],
				'department_id' => $row['department_id'],
				'user_role' => $row['user_role'],
				'user_status' => $row['user_status']
			);

		}else{
			$data = 400;
		}
		
		echo json_encode($data);
	}
	// get Total user
	else if ($action == '4'){

		$id = mysqli_real_escape_string($db, $_GET['id']);

		if ($id == 0) {
			$query = "SELECT COUNT(*) AS total FROM user";
		}else{
			$query = "SELECT COUNT(*) AS total FROM user WHERE user_role = '$id'";
		}

		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		$row = mysqli_fetch_array($result);
		$total = $row['total'];

		$data = array('total' => $total);

		echo json_encode($data);
	}

	else if ($action == 'delete'){

		$userID = mysqli_real_escape_string($db, $_GET['id']);
		$query = "DELETE FROM user WHERE user_id = '$userID'";
		$result = mysqli_query($db, $query) or die(mysqli_error($db)); 

		if ($result) {
			$data['status'] = '200';
		}else{
			$data['status'] = '400';
		}

		echo json_encode($data);
	}

}

// function register & update user
if (isset($_POST['typeForm'])) {

	$typeForm = mysqli_real_escape_string($db, $_POST['typeForm']);

	$user_name = mysqli_real_escape_string($db, $_POST['user_name']);
	$user_password = mysqli_real_escape_string($db, $_POST['user_password']);
	$user_staff_id = mysqli_real_escape_string($db, $_POST['user_staff_id']);
	$user_phoneNo = mysqli_real_escape_string($db, $_POST['user_phoneNo']);
	$department_id = mysqli_real_escape_string($db, $_POST['department_id']);
	$user_role =  (isset($_POST['user_role'])) ? $_POST['user_role'] : '2';
	$user_status =  (isset($_POST['user_status'])) ? $_POST['user_status'] : '1';

	$timestamp = date('Y-m-d H:i');

	if ($typeForm == 'register') {

		$user_password =  password_hash($user_password, PASSWORD_DEFAULT);
		$query = "INSERT INTO user (user_name, user_password, user_staff_id, user_phoneNo, department_id, user_role, user_status, created_at)
				VALUES ('$user_name', '$user_password', '$user_staff_id', '$user_phoneNo','$department_id', '$user_role', '$user_status', '$timestamp')";
	}else{

		// for update
		$user_id = mysqli_real_escape_string($db, $_POST['user_id']);

		// checking password
		$queryCheck = "SELECT * FROM user WHERE user_id = '$user_id'";
		$resultCheck = mysqli_query($db, $queryCheck) or die(mysqli_error($db));
		$rowData = mysqli_fetch_array($resultCheck);
		$dbpassword = $rowData['user_password'];

		if ($user_password != $dbpassword) {
		  $user_password =  password_hash($user_password, PASSWORD_DEFAULT);
		}

		$query =  "UPDATE user SET user_name = '$user_name',  user_password =  '$user_password', user_staff_id ='$user_staff_id', user_phoneNo='$user_phoneNo', department_id = '$department_id', user_role = '$user_role', user_status = '$user_status', updated_at = '$timestamp' WHERE user_id = '$user_id'";
	}
	
	$result = mysqli_query($db, $query) or die(mysqli_error($db)); 

	if ($result) {
		$data['status'] = '200';
		$data['redirectUrl'] = 'login';
	}else{
		$data['status'] = '400';
		$data['message'] = 'Staff already registered';
		// $data['redirectUrl'] = 'login';
	}

	echo json_encode($data);
}



// function delete
// if (isset($_GET['delete'])) {

	

// }

