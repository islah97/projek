<?php

class Item extends Controller
{
	private $db;
	protected $item_model;

	public function __construct()
	{
		$this->session();
		$this->db = new Database;
		$this->item_model = $this->model('Item_model');
		$this->reservation_model = $this->model('reservation_model');
		$this->equipment_model = $this->model('equipment_model');
		$this->timestamp = date('Y-m-d H:i:s');
	}

	public function index()
	{
		// Empty function
	}

	public function getUpdateData()
	{
	  $id = $this->db->escape($_POST['id']);
	  $result = $this->item_model->getItemByID($id);

	  $data = array(
	      "item_id " => $result['item_id '],
	      "reservation_date" => $result['reservation_date'],
	      "reservation_id" => $result['reservation_id'],
	      "equipment_id" => $result['equipment_id'],
	  );

	  $this->jsonResult($data);
	}

	public function getList()
	{
		$this->jsonResult($this->item_model->getListData());
		// echo $this->item_model->getListData();
	}

	public function create()
	{
		$resCode = $this->item_model->insert($_POST);
		$data = array(
	      "type" => 'create',
	      "resCode" => $resCode,
		);
		$this->jsonResult($data);
	}

	public function update()
	{
		$resCode = $this->item_model->update($_POST);
		$data = array(
	      "type" => 'update',
	      "resCode" => $resCode,
		);

		$this->jsonResult($data);
	}

	public function delete()
	{
		$result = $this->item_model->delete($_POST['id']);
		$this->jsonResult($result);
	}

}
