<?php

class Dashboard extends Controller
{
	private $db;
	protected $user_model;

	public function __construct()
	{
		$this->session();
		$this->db = new Database;
		$this->user_model = $this->model('User_model');
	}

	public function index()
	{
		$data = [
			'title' => 'Laman Utama',
			// 'countTotalAll' => $this->user_model->getDashboardCountUser(),
			// 'countTotalAdmin' => $this->user_model->getDashboardCountUser(1),
			// 'countTotalStaff' => $this->user_model->getDashboardCountUser(2),
			'currentSidebar' => 'dashboard',
			'currentSubSidebar' => NULL
		];

		// dd($this->session->get('roleID'));

		if ($this->session->get('roleID') == 1) {
			$this->render('dashboard/admin', $data);
		} else if ($this->session->get('roleID') == 2) {
			$this->render('dashboard/staff', $data);
		} else {
			$this->render('dashboard/guest', $data);
		}
	}
}
