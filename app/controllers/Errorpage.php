<?php

class Errorpage extends Controller
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
		$this->session = new \Configuration\SessionManager();
	}

	public function index()
	{
		$this->error('403');
	}

	public function err_404()
	{
		$this->error('403');
	}

	public function err_403()
	{
		$this->error('403');
	}
}
