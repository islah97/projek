<?php

include '../config/database.php';

// function login
if (isset($_POST['login'])) {

	// var_dump($_POST);die;

	$username = mysqli_real_escape_string($db, $_POST['username']);
	$enteredPassword = mysqli_real_escape_string($db, $_POST['password']);
	$login_at = date('Y-m-d H:i');

	$query = "SELECT * FROM user WHERE `user`.`user_staff_id` = '$username'";
	$result = mysqli_query($db, $query) or die(mysqli_error($db));

	if (mysqli_num_rows($result) > 0) {

		$row = mysqli_fetch_array($result);
		$current_password = $row['user_password'];
		$status = $row['user_status'];
		$roleid = $row['user_role'];
		$rolename = ($roleid==0) ? 'Administrator' : (($roleid==1) ? 'Staff' : 'Superadmin');

		if ($status == 1) {
			if (password_verify($enteredPassword, $current_password)) {
				session_start();
				$_SESSION['userID'] = $row['user_id'];
				$_SESSION['fullname'] = $row['user_name'];
				$_SESSION['roleID'] = $roleid;
				$_SESSION['roleName'] = $rolename;
				$_SESSION['isLoggedIn'] = TRUE;

				if (!empty($_SESSION['isLoggedIn'])) {
					$data['status'] = '200';
					$data['redirectUrl'] = 'dashboard';
				}else{
					$data['status'] = '400';
					$data['message'] = 'Username or Password don\'t match';
					$data['redirectUrl'] = 'login';
				}

				echo json_encode($data);

			} else {
				$data['status'] = '400';
				$data['message'] = 'Username or Password don\'t match';
				echo json_encode($data);
			}
		} else if ($status == 0) {

			$data['status'] = '400';
			$data['message'] = 'Your account currently inactive.';

			echo json_encode($data);

		}else if ($status == 2) {

			$data['status'] = '400';
			$data['message'] = 'Your account have been blocked.';

			echo json_encode($data);

		}
	}else {
		$data['status'] = '400';
		$data['message'] = 'Username or Password don\'t match';
		echo json_encode($data);
	}
}
