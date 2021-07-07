<?php

class Reservation extends Controller
{
	private $db;
	protected $reservation_model;

	public function __construct()
	{
		$this->session();
		$this->db = new Database;
		$this->reservation_model = $this->model('Reservation_model');
		$this->user_model = $this->model('User_model');
		$this->timestamp = date('Y-m-d H:i:s');
	}

	public function index()
	{
		// Empty function
	}

	public function getUpdateData()
	{
	  $id = $this->db->escape($_POST['id']);
	  $result = $this->reservation_model->getReserveByID($id);

	  $data = array(
	      "reservation_id" => $result['reservation_id'],
	      "reservation_date_pickup" => $result['reservation_date_pickup'],
	      "reservation_time_pickup" => $result['reservation_time_pickup'],
	      "reservation_date_return" => $result['reservation_date_return'],
	      "reservation_time_return" => $result['reservation_time_return'],
	      "reservation_time_return" => $result['reservation_time_return'],
	      "reservation_status" => $result['reservation_status'],
	      "user_id" => $result['user_id'],
	  );

	  $this->jsonResult($data);
	}

	public function getList()
	{
		$this->jsonResult($this->reservation_model->getListData());
		// echo $this->reservation_model->getListData();
	}

	public function create()
	{
		$resCode = $this->reservation_model->insert($_POST);
		$data = array(
	      "type" => 'create',
	      "resCode" => $resCode,
		);
		$this->jsonResult($data);
	}

	public function update()
	{
		$resCode = $this->reservation_model->update($_POST);
		$data = array(
	      "type" => 'update',
	      "resCode" => $resCode,
		);

		$this->jsonResult($data);
	}

	public function delete()
	{
		$result = $this->reservation_model->delete($_POST['id']);
		$this->jsonResult($result);
	}

}
