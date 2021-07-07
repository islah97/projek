<?php

class User extends Controller
{
	protected $user_model;

	public function __construct()
	{
		$this->session();
		$this->db = new Database;
		$this->user_model = $this->model('User_model');
		$this->timestamp = date('Y-m-d H:i:s');
	}

	public function index()
	{
		// $data = [
		// 	'title' => 'Senarai Anggota',
		// 	// 'countAllUser' => $this->user_model->countAllUser(),
		// 	// 'countAllUserActive' => $this->user_model->countAllUserActive(1),
		// 	// 'countAllUserInActive' => $this->user_model->countAllUserInActive(2),
		// 	// 'countAllUserBlocked' => $this->user_model->countAllUserBlocked(3),
		// 	'user' => $this->user_model->getAllUser(),
		// 	// 'schools' => $this->school_model->getAllSchool(),
		// 	'currentSidebar' => 'user',
		// 	'currentSubSidebar' => NULL
		// ];

		$data = [
			'title' => 'Senarai Pekerja',
			'currentSidebar' => 'user',
			'currentSubSidebar' => 'listAll'
		];

		$this->render('user/list', $data);
	}

	public function getListUser()
	{
		$this->jsonResult($this->user_model->getAllUser());
	}

	public function getList()
	{
		$type = $this->db->escape($_POST['type']);
		// $this->jsonResult($this->user_model->getDashboardUser($type));
		echo $this->user_model->getDashboardUser($type);
	}

	public function countUser()
	{
		$type = $this->db->escape($_POST['typeData']);
		$this->jsonResult($this->user_model->getDashboardCountUser($type));
	}

	public function removeAllTickUser()
	{
		$this->jsonResult($this->user_model->bulkDelete($_POST));
	}

	public function create()
	{
		$resCode = $this->user_model->insert($_POST);
		$data = array(
	      "type" => 'create',
	      "resCode" => $resCode,
		);
		$this->jsonResult($data);
	}

	public function update()
	{
		$resCode = $this->user_model->update($_POST);
		$data = array(
	      "type" => 'update',
	      "resCode" => $resCode,
		);
		$this->jsonResult($data);
	}

	public function getupdate()
	{
		$this->jsonResult($this->user_model->getUserByID($_POST['id']));
	}

	public function delete()
	{
		$this->jsonResult($this->user_model->delete($_POST['id']));
	}
}
