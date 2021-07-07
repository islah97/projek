<?php

class Auth extends Controller
{
	private $db;
	protected $model,$department_model;

	public function __construct()
	{
		$this->db = new Database;
		$this->model = $this->model('User_model');
		$this->department_model = $this->model('Department_model');
		$this->session = new \Configuration\SessionManager();
	}

	public function index()
	{
		$data = [
			'title' => 'Log Masuk',
			'currentSidebar' => 'login',
			'currentSubSidebar' => NULL
		];

		$this->view('auth/login', $data);
	}

	public function login()
	{
		$this->view('auth/login');
	}

	public function register()
	{
		$this->view('auth/register');
	}

	public function authorize()
	{
		$username = $this->db->escape($_POST['username']);
		$enteredPassword = $this->db->escape($_POST['password']);

		$data = $this->model->getUserLogin($username);

		$redirectUrl = '';

		if (!empty($data)) {

			$status = $data['user_status'];
			$roleid = $data['user_role'];
			$deptid = $data['department_id'];
			$current_password = $data['user_password'];
			$rolename = ($data['user_role'] == 1) ? 'Administrator' : 'Staff';

			// department
			$dept = $this->department_model->getDeptByID($deptid);
			$deptName = $dept['department_name'];

			$result = $this->passDecrypt($current_password, $enteredPassword);

			if ($result) {
				if ($status == '1') {

					// Set session a USING SESSION MANAGER
					$this->session->set('userID', $data['user_id']);
					$this->session->set('userNo', $data['user_staff_id']);
					$this->session->set('fullname', $data['user_name']);
					$this->session->set('roleID', $roleid);
					$this->session->set('roleName', $rolename);
					$this->session->set('deptName', $deptName);
					$this->session->set('avatar', '');
					$this->session->set('isLoggedIn', TRUE);

					// Setting a COOKIE
					// $cookie_name = "userID";
					// $cookie_value = $_SESSION['userID'];
					// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

					$response = 200;
				    $message = 'Log masuk berjaya';
				    $redirectUrl = 'dashboard';

				} else {
					$response = 400;
    				$message = 'Akaun anda telah dinyahaktifkan.';
				}
			} else {

				$response = 400;
    			$message = 'Nama pengguna atau kata laluan tidak sah.';
			}
		} else {
			 $response = 400;
    		 $message = 'Nama pengguna atau kata laluan tidak sah.';
		}

		$data = array(
	      "response" => $response,
	      "message" => $message,
	      "redirectUrl" => $redirectUrl
		);

		$this->jsonResult($data);
	}

	private function passDecrypt($dbpass, $enterpass)
	{
		if (password_verify($enterpass, $dbpass)) {
			return true;
		} else {
			return false;
		}
	}

	public function logout()
	{
		$this->session->clear();
		header('Location: ' . base_url .'auth');
		exit;
	}
}
